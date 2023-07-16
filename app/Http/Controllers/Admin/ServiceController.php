<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use Auth;
use Image;
use Carbon\Carbon;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }



    //show service form
    public function showAddServiceForm()
    {
    	$get_Cat = DB::table('categories')
                 ->where('categories.is_deleted',0)
                 ->get();
        $get_sType = DB::table('service_types')
                 ->get();
        $servicePercent = DB::table('gen_service_percents')->first();
    	return view('admin.services.service',compact('get_Cat','get_sType','servicePercent'));
    }


    //create service

    public function createService(Request $request){

    	$messages = [
    		'service_name.required' => "Service Title is required.",
		    'category_no.required' => "Please select a service category.",
		    'subcategory_no.required' => "Please select a subcategory.",
            'service_type_no.required' => "Please select a service type.",
		  ];
    	$validatedData = $request->validate([
    		'service_name' => 'required | unique:services',
    		'service_slug' => 'required|unique:services',
	        'service_charge' => 'required',
            'service_percent_amount' => 'required',
            'service_type_no'=> 'required',
	        'category_no' => 'required',
	        'subcategory_no' => 'required',
	        'service_details' => 'required',
	        'what_included' => 'required',
	        'what_excluded' => 'required',
	        'terms_condition' => 'required',
	        'service_image' => 'mimes:jpeg,jpg,png,PNG|max:2048',
	    ], $messages);
	    $data =array();
	    $data['category_no']= $request->category_no;
		$data['subcategory_no']= $request->subcategory_no;
		$data['service_name']= $request->service_name;
		$data['service_slug']= $request->service_slug;
		$data['service_charge']= $request->service_charge;
        $data['service_percent_amount']= $request->service_percent_amount;
        $data['service_type_no']= $request->service_type_no;
		$data['payment_details']= $request->payment_details;
		$data['what_included']= $request->what_included;
		$data['what_excluded']= $request->what_excluded;
		$data['terms_condition']= $request->terms_condition;
		$data['service_details']= $request->service_details;
		$data['is_approved']= 1;
		$data['created_by']= Auth::guard('admin')->user()->admin_no;
		$data['service_image']= '';
		$data['created_at']= Carbon::now()->toDatetimeString();

		if($request->hasFile('service_image')){
			$image=$request->file('service_image');
			$random = mt_rand(1000000, 9999999);
	        $imageName='img_'.$random.time().'.'.$image->getClientOriginalExtension();
	        Image::make($image)->resize(960,800)->save('public/uploads/'.$imageName);
	        $data['service_image'] = $imageName;
		}else{
			$data['service_image'] = "default.png";
		}


		$insert=DB::table('services')->insert($data);	

		if($insert){
	        $notification=array(
	            'messege'=>'Service created successfully',
	            'alert-type'=>'success'
	        );
	        return Redirect()->route('service.all')->with($notification);
	     }else{
	        $notification=array(
	            'messege'=>'Service creation failed',
	            'alert-type'=>'error'
	        );
	        return Redirect()->back()->with($notification);
	     }
    }


    //all services
    public function allServices(){
    	$get_services = DB::table('services')
                ->leftJoin('admins','services.created_by','admins.admin_no')
                ->leftJoin('categories','services.category_no','categories.category_no')
                ->leftJoin('subcategories','services.subcategory_no','subcategories.subcategory_no')
                ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                ->select('services.*','admins.admin_name','categories.category_name','subcategories.sub_category_name','service_types.service_type_name')
                ->orderBy('services.service_no','DESC')
                ->where('services.is_deleted',0)
                ->get();
        return view('admin.services.all-services',compact('get_services'));
    }


     //decline service
    public function declineService($id){
    	$data =array();
		$data['is_approved']= 0;
        $decline = DB::table('services')->where('service_no',$id)->update($data);
        if($decline){
            $notification=array(
                'messege'=>'Service declined successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('service.all')->with($notification);
         }else{
            $notification=array(
                'messege'=>'Service declined failed',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
         }
    }

     //approve service
    public function approveService($id){
    	$data =array();
		$data['is_approved']= 1;
        $decline = DB::table('services')->where('service_no',$id)->update($data);
        if($decline){
            $notification=array(
                'messege'=>'Service approved successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('service.all')->with($notification);
         }else{
            $notification=array(
                'messege'=>'Service approval failed',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
         }
    }


    //delete service
    public function deleteService($id){
    	$data =array();
		$data['is_deleted']= 1;
        $decline = DB::table('services')->where('service_no',$id)->update($data);
        if($decline){
            $notification=array(
                'messege'=>'Service deleted successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('service.all')->with($notification);
         }else{
            $notification=array(
                'messege'=>'Service delete failed',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
         }
    }


    //get approved services
    public function getApprovedService(){
    	$approved_services = DB::table('services')
                ->leftJoin('admins','services.created_by','admins.admin_no')
                ->leftJoin('categories','services.category_no','categories.category_no')
                ->leftJoin('subcategories','services.subcategory_no','subcategories.subcategory_no')
                ->select('services.*','admins.admin_name','categories.category_name','subcategories.sub_category_name')
                ->where([
                    ['services.is_deleted',0],
                    ['services.is_approved',1],
                ])
                ->get();
        return view('admin.services.all-approved-services',compact('approved_services'));
    }

    //get declined services
    public function getDeclinedService(){
    	$declined_services = DB::table('services')
                ->leftJoin('admins','services.created_by','admins.admin_no')
                ->leftJoin('categories','services.category_no','categories.category_no')
                ->leftJoin('subcategories','services.subcategory_no','subcategories.subcategory_no')
                ->select('services.*','admins.admin_name','categories.category_name','subcategories.sub_category_name')
                ->where([
                    ['services.is_deleted',0],
                    ['services.is_approved',0],
                ])
                ->get();
        return view('admin.services.all-declined-services',compact('declined_services'));
    }



    //service percentage setup
    public function servicePercentForm(){
        $servicePercent = DB::table('gen_service_percents')->first();
        return view('admin.setup.service-percentage',compact('servicePercent'));
    }

    //update category

    public function updateServicePercent(Request $request,$id){
        $validatedData = $request->validate([
            'service_percentage' => 'required'
        ]);
        $data =array();
        $data['service_percentage']= $request->service_percentage;
        $data['created_at']= Carbon::now()->toDatetimeString();
        $updat_service_percentage =DB::table('gen_service_percents')->where('id',$id)->update($data);
        if($updat_service_percentage){
            $notification=array(
                'messege'=>'Service Percentage updated successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
         }else{
            $notification=array(
                'messege'=>'Service Percentage update failed',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
         }
    }
}
