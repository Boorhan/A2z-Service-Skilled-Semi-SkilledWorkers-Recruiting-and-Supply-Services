<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use Image;
use App\User;
use Carbon\Carbon;

class ServiceProviderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showSpRegForm()
    {
    	$id_types = DB::table('id_types')->get();
        return view('admin.sp.sp',compact('id_types'));
    }


    //create service provider

    public function createSP(Request $request){

    	$messages = [
		    'phone.required' => "Please enter a valid & unique phone number,it will be the SP's username.",
		    'user_nid.required' => "Please enter a valid NID number.",
		    'user_address.required' => "Please enter service provider's address.",
		  ];
    	$validatedData = $request->validate([
    		'name' => 'required',
    		'phone' => 'required|unique:users',
	        'user_nid' => 'required|unique:users',
	        'user_address' => 'required',
	        'password' => 'required|string|min:6|confirmed',
	        'user_photo' => 'mimes:jpeg,jpg,png,PNG|max:2048',
	        'user_nid_photo' => 'mimes:jpeg,jpg,png,PNG|max:2048',
	    ], $messages);
	    $data =new User;
	    $data->name= $request->name;
		$data->email= $request->email;
		$data->phone= $request->phone;
		$data->user_type= 1;
		$data->user_nid= $request->user_nid;
		$data->educational_qualification= $request->educational_qualification;
		$data->user_details= $request->user_details;
		$data->id_type_no= $request->id_type_no;
		$data->additional_id_num= $request->additional_id_num;
		$data->user_address= $request->user_address;
		$data->is_approved= 1;
		$data->password = Hash::make($request->password);
		$data->created_by= Auth::guard('admin')->user()->admin_no;
		$data->user_photo= '';
		$data->user_nid_photo ='';
		$data->created_at= Carbon::now()->toDatetimeString();

		if($request->hasFile('user_photo')){
			$image=$request->file('user_photo');
			$random = mt_rand(1000000, 9999999);
	        $imageName='img_'.$random.time().'.'.$image->getClientOriginalExtension();
	        Image::make($image)->resize(100,100)->save('uploads/'.$imageName);
	        $data->user_photo = $imageName;
		}else{
			$data->user_photo= "default-user.png";
		}

		if($request->hasFile('user_nid_photo')){
			$image=$request->file('user_nid_photo');
			$random = mt_rand(1000000, 9999999);
	        $imageName='nid_'.$random.time().'.'.$image->getClientOriginalExtension();
	        Image::make($image)->resize(100,100)->save('public/uploads/'.$imageName);
	        $data->user_nid_photo = $imageName;
		}else{
			$data->user_nid_photo= "default.png";
		}

		$insert=$data->save();

		if($insert){
	        $notification=array(
	            'messege'=>'Service Provider created successfully',
	            'alert-type'=>'success'
	        );
	        return Redirect()->route('sp.all')->with($notification);
	     }else{
	        $notification=array(
	            'messege'=>'Service Provider creation failed',
	            'alert-type'=>'error'
	        );
	        return Redirect()->back()->with($notification);
	     }
    }

    //all sp
    public function getAllSPs(){
    	$allSP = DB::table('users')
    					->leftJoin('admins','users.created_by','admins.admin_no')
                        ->leftJoin('id_types','users.id_type_no','id_types.id_type_no')
    					->select('users.*','admins.admin_name','id_types.id_type_name')
    					->where([
						    ['users.user_type',1],
						])
    					->get();
    	return view('admin.sp.all-sp',compact('allSP'));
    }


    //inactivate sp
    public function inactivateSP($id){
        $data = User::findOrFail($id);
        $data->is_active = 0;
        $inactivate=$data->save();
        if($inactivate){
            $notification=array(
                'messege'=>'Inactivated successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('sp.all')->with($notification);
         }else{
            $notification=array(
                'messege'=>'Inactivate failed',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
         }
    }


    //activate admin
    public function ActivateSP($id){
        $data = User::findOrFail($id);
        $data->is_active = 1;
        $inactivate=$data->save();
        if($inactivate){
            $notification=array(
                'messege'=>'Activated successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('sp.all')->with($notification);
         }else{
            $notification=array(
                'messege'=>'Activate failed',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
         }
    }

    //show update form
    protected function getUpdateSPForm($id){
        $get_sp = User::where('user_no',$id)->first();
        $id_types = DB::table('id_types')->get();
        return view('admin.sp.edit-sp',compact('get_sp','id_types'));
    }


    //update service provider

    // public function UpdateSP(Request $request,$id){

    //     $messages = [
    //         'phone.required' => "Please enter a valid & unique phone number,it will be the SP's username.",
    //         'user_nid.required' => "Please enter a valid NID number.",
    //         'user_address.required' => "Please enter service provider's address.",
    //       ];
    //     $validatedData = $request->validate([
    //         'name' => 'required',
    //         'phone' => "required",
    //         'user_nid' => 'required',
    //         'user_address' => 'required',
    //         'password' => 'required|string|min:6|confirmed',
    //         'user_photo' => 'mimes:jpeg,jpg,png,PNG|max:2048',
    //         'user_nid_photo' => 'mimes:jpeg,jpg,png,PNG|max:2048',
    //     ], $messages);
    //     $data =array();
    //     $data['name']= $request->name;
    //     $data['email']= $request->email;
    //     $data['phone']= $request->phone;
    //     $data['user_nid']= $request->user_nid;
    //     $data['educational_qualification']= $request->educational_qualification;
    //     $data['user_details']= $request->user_details;
    //     $data['id_type_no']= $request->id_type_no;
    //     $data['additional_id_num']= $request->additional_id_num;
    //     $data['user_address']= $request->user_address;
    //     $data['password'] = Hash::make($request->password);
    //     $data['user_photo']= '';
    //     $data['user_nid_photo'] ='';
    //     $data['updated_at']= Carbon::now()->toDatetimeString();

    //     if($request->hasFile('user_photo')){
    //         $image=$request->file('user_photo');
    //         $random = mt_rand(1000000, 9999999);
    //         $imageName='img_'.$random.time().'.'.$image->getClientOriginalExtension();
    //         Image::make($image)->resize(100,100)->save('uploads/'.$imageName);
    //         $data['user_photo'] = $imageName;
    //     }else{
    //         $data['user_photo']= $request->user_photo;;
    //     }

    //     if($request->hasFile('user_nid_photo')){
    //         $image=$request->file('user_nid_photo');
    //         $random = mt_rand(1000000, 9999999);
    //         $imageName='nid_'.$random.time().'.'.$image->getClientOriginalExtension();
    //         Image::make($image)->resize(100,100)->save('uploads/'.$imageName);
    //         $data['user_nid_photo'] = $imageName;
    //     }else{
    //         $data['user_nid_photo']= $request->user_nid_photo;;
    //     }

    //     $update=DB::table('users')->where('user_no',$id)->update($data);

    //     if($update){
    //         $notification=array(
    //             'messege'=>'Service Provider update successfully',
    //             'alert-type'=>'success'
    //         );
    //         return Redirect()->route('sp.all')->with($notification);
    //      }else{
    //         $notification=array(
    //             'messege'=>'Service Provider update failed',
    //             'alert-type'=>'error'
    //         );
    //         return Redirect()->back()->with($notification);
    //      }
    // }




    /*show cat wise sp form*/
    public function showCatWiseSpForm()
    {
        $get_Cat = DB::table('categories')
                 ->where('categories.is_deleted',0)
                 ->get();
        $get_sp = User::where([
                    ['is_active',1],
                    ['user_type',1]
                ])->get();
        return view('admin.sp.cat-wise-sp',compact('get_Cat','get_sp'));
    }


        //insert cat wise service provider
        public function createCatWiseSp(Request $request){
            $messages = [
                'category_no.required' => 'Please select a category',
                'subcategory_no.required' => 'Please select a subcategory',
                'user_no.required' => 'Please select a service provider',
              ];
            $validatedData = $request->validate([
                'category_no' => 'required|not_in:0',
                'subcategory_no' => 'required|not_in:0',
                'user_no' => 'required|not_in:0',
            ], $messages);
            $data =array();
            $data['category_no']= $request->category_no;
            $data['subcategory_no']= $request->subcategory_no;
            $data['user_no']= $request->user_no;
            $data['created_by']= Auth::guard('admin')->user()->admin_no;
            $data['created_at']= Carbon::now()->toDatetimeString();

            $count= DB::table('cat_wise_users')
                    ->where([
                        ['category_no',$data['category_no']],
                        ['subcategory_no',$data['subcategory_no']],
                        ['user_no',$data['user_no']],
                        ['cat_wise_users.is_deleted',0],
                    ])
                    ->first();
            if (!$count) {
                $insert_cat_wiseSP=DB::table('cat_wise_users')->insert($data);  

                if($insert_cat_wiseSP){
                    $notification=array(
                        'messege'=>'Data Inserted successfully',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('AllCatWiseSPs.all')->with($notification);
                 }else{
                    $notification=array(
                        'messege'=>'Data insertion failed',
                        'alert-type'=>'error'
                    );
                    return Redirect()->back()->with($notification);
                 }
            }else{
                $notification=array(
                        'messege'=>'Duplicate Entry',
                        'alert-type'=>'error'
                    );
                    return Redirect()->back()->with($notification);
            }

                
        }


    /*show all cat wise sp list */
    public function getAllCatWiseSPs()
    {
        $get_cat_wiseSP = DB::table('cat_wise_users')
                ->leftJoin('users','cat_wise_users.user_no','users.user_no')
                ->leftJoin('admins','cat_wise_users.created_by','admins.admin_no')
                ->leftJoin('categories','cat_wise_users.category_no','categories.category_no')
                ->leftJoin('subcategories','cat_wise_users.subcategory_no','subcategories.subcategory_no')
                ->select('cat_wise_users.*','users.name','admins.admin_name','categories.category_name','subcategories.sub_category_name')
                ->where([
                    ['cat_wise_users.is_deleted',0],
                    ['categories.is_deleted',0],
                    ['subcategories.is_deleted',0],
                    ['admins.is_active',1],
                ])
                ->get();
        return view('admin.sp.cat-wise-sp-list',compact('get_cat_wiseSP'));
    }


    //delete cat wise service provider
    public function deleteCatWiseSp($id){
        $data =array();
        $data['is_deleted']= 1;

        $delete_cat_wiseSP = DB::table('cat_wise_users')->where('cat_wise_sp_no',$id)->update($data);
        if($delete_cat_wiseSP){
            $notification=array(
                'messege'=>'Data deleted successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('AllCatWiseSPs.all')->with($notification);
         }else{
            $notification=array(
                'messege'=>'Data delete failed',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
         }
    }

}
