<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;
use Carbon\Carbon;

class userDashboardController extends Controller
{	

	public function __construct(){
    	$this->middleware('auth:web');
    }

	//show dashboard
	public function userDashboard(){
    $user_no= Auth::guard('web')->user()->user_no;
    
        $sp_cancel_count = DB::table('cancelded_sp_orders')->where('user_no',$user_no)->count();
            if ($sp_cancel_count >0) {
        		$cancled_sp_order = DB::table('cancelded_sp_orders')->where('user_no',$user_no)->get();
    	    	foreach ($cancled_sp_order as $object){
    			   $sp_cancel_order_no = $object->canceled_order_no;
    	    	}
        	}else{
    		$sp_cancel_order_no = "";
    	}
    	
        $sp_Cnew_request = DB::table('cat_wise_users')
              ->leftJoin('service_requests','service_requests.category_no','cat_wise_users.category_no')
              ->where([
                    ['service_requests.is_assigned',0],
                    ['service_requests.canceled_by_customer',0],
                    ['cat_wise_users.user_no',$user_no],
                    ['service_requests.service_request_no','!=',$sp_cancel_order_no]
                  ])
              ->count();
      $sp_C_comp_order = DB::table('service_requests')
                ->where([
                    ['order_status_no',3],
                    ['assigned_sp_no',$user_no]
                  ])
              ->count();
      $sp_C_canc_order = DB::table('cancelded_sp_orders')
              ->where([
                    ['user_no',$user_no]
                  ])
              ->count();

      //user
      $user_c_pend_order = DB::table('service_requests')
                ->where([
                    ['order_status_no',1],
                    ['user_no',$user_no]
                  ])
              ->count();
      $user_c_proc_order = DB::table('service_requests')
                ->where([
                    ['order_status_no',2],
                    ['user_no',$user_no]
                  ])
              ->count();
      $user_c_comp_order = DB::table('service_requests')
                ->where([
                    ['order_status_no',3],
                    ['user_no',$user_no]
                  ])
              ->count();
      $user_c_canc_order = DB::table('service_requests')
                ->where([
                    ['canceled_by_customer',1],
                    ['user_no',$user_no]
                  ])
              ->count();
      $user_total_order = DB::table('service_requests')
                ->where([
                    ['user_no',$user_no]
                  ])
              ->count();

      $sp_total_earning = DB::table('earning_master')->sum('sp_earning');
      $user_order_list = DB::table('service_requests')
                  ->leftJoin('services','service_requests.service_no','services.service_no')
                  ->leftJoin('categories','service_requests.category_no','categories.category_no')
                  ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
                  ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                  ->leftJoin('order_stauts','service_requests.order_status_no','order_stauts.order_status_no')
                  ->select('service_requests.*','services.service_name','services.service_slug','services.service_details','services.service_charge','services.service_image','categories.category_name','subcategories.sub_category_name','service_types.service_type_name','order_stauts.order_status')
                  ->where([
                    ['service_requests.user_no',$user_no]
                  ])
                  ->orderBy('service_requests.service_request_no', 'DESC')
                ->get();
                
        
        
        $sp_new_request_list = DB::table('cat_wise_users')
              ->leftJoin('service_requests','service_requests.category_no','cat_wise_users.category_no')
              ->leftJoin('services','service_requests.service_no','services.service_no')
              ->leftJoin('categories','service_requests.category_no','categories.category_no')
              ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
              ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
              ->leftJoin('order_stauts','service_requests.order_status_no','order_stauts.order_status_no')
              ->select('service_requests.*','services.service_name','services.service_slug','services.service_details','services.service_charge','services.service_image','categories.category_name','subcategories.sub_category_name','service_types.service_type_name','order_stauts.order_status')
              
              ->where([
                    ['service_requests.is_assigned',0],
                    ['service_requests.canceled_by_customer',0],
                    ['cat_wise_users.user_no',$user_no],
                    ['service_requests.order_status_no','!=',4],
                    ['service_requests.service_request_no','!=',$sp_cancel_order_no]
                  ])
                ->orderBy('service_requests.service_request_no','DESC')
              ->get();
    	
		return view('website.dashboard.dashboard',compact('sp_Cnew_request','sp_C_comp_order','sp_C_canc_order','user_c_pend_order','user_c_proc_order','user_c_comp_order','user_c_canc_order','user_total_order','user_order_list','sp_new_request_list','sp_total_earning'));
	}
	
	//user all orders
	
	public function myOrders(){
	    $user_no= Auth::guard('web')->user()->user_no;
	    $user_total_order = DB::table('service_requests')
                ->where([
                    ['user_no',$user_no]
                  ])
              ->count();
	    $user_order_list = DB::table('service_requests')
                  ->leftJoin('services','service_requests.service_no','services.service_no')
                  ->leftJoin('categories','service_requests.category_no','categories.category_no')
                  ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
                  ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                  ->leftJoin('order_stauts','service_requests.order_status_no','order_stauts.order_status_no')
                  ->select('service_requests.*','services.service_name','services.service_slug','services.service_details','services.service_charge','services.service_image','categories.category_name','subcategories.sub_category_name','service_types.service_type_name','order_stauts.order_status')
                  ->where([
                    ['service_requests.user_no',$user_no]
                  ])
                  ->orderBy('service_requests.service_request_no', 'DESC')
                ->get();
		return view('website.dashboard.my-orders',compact('user_order_list','user_total_order'));
	}
	
	
  // user order details

  public function myOrderDlt($slug,$id){
    $user_no= Auth::guard('web')->user()->user_no;
    $sp_allCancled_order_count = DB::table('cancelded_sp_orders')
            ->where([
                ['user_no',$user_no],
                ['canceled_order_no',$id]
              ])
          ->count();

    $order_dlt = DB::table('service_requests')
                  ->leftJoin('services','service_requests.service_no','services.service_no')
                  ->leftJoin('categories','service_requests.category_no','categories.category_no')
                  ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
                  ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                  ->leftJoin('users','service_requests.assigned_sp_no','users.user_no')
                  ->leftJoin('order_stauts','service_requests.order_status_no','order_stauts.order_status_no')
                  ->select('service_requests.*','services.service_name','services.service_details','services.service_charge','services.service_percent_amount','services.service_image','services.what_included','services.what_excluded','services.terms_condition','categories.category_name','subcategories.sub_category_name','service_types.service_type_name','users.name','users.phone','order_stauts.order_status')
                  ->where([
                    ['service_requests.service_request_no',$id]
                  ])
                ->first();
    return view('website.dashboard.order-details',compact('order_dlt','sp_allCancled_order_count'));
  }


//cancle user order

    public function cancelUserOrder($slug,$id){
	    	$data =array();
    		$data['canceled_by_customer']= 1;
    		$decline = DB::table('service_requests')->where('service_request_no',$id)->update($data);

	        if($decline){
	            $notification=array(
	                'messege'=>'Order canceled successfully',
	                'alert-type'=>'success'
	            );
	            return Redirect()->route('user.dashboard')->with($notification);
	         }else{
	            $notification=array(
	                'messege'=>'Order cancelation failed',
	                'alert-type'=>'error'
	            );
	            return Redirect()->back()->with($notification);
	         }
	    }


//cancel sp order

    public function cancelSpOrder($slug,$id){
            $user_no= Auth::guard('web')->user()->user_no;
            $data =array();
            $data['user_no']= $user_no;
    		$data['canceled_order_no']= $id;
    		$data['created_at']= Carbon::now()->toDatetimeString();
    		$decline = DB::table('cancelded_sp_orders')->insert($data);

	        if($decline){
	            $notification=array(
	                'messege'=>'Order canceled successfully',
	                'alert-type'=>'success'
	            );
	            return Redirect()->route('user.dashboard')->with($notification);
	         }else{
	            $notification=array(
	                'messege'=>'Order cancelation failed',
	                'alert-type'=>'error'
	            );
	            return Redirect()->back()->with($notification);
	         }
    }
    
    //approve sp order

    public function approveSpOrders($slug,$id){
            $user_no= Auth::guard('web')->user()->user_no;
            $data =array();
            $data['assigned_sp_no']= $user_no;
    		$data['is_assigned']= 1;
    		$approve = DB::table('service_requests')->where('service_request_no',$id)->update($data);
            
            $data2 =array();
            $data2['is_available']= 0;
            $lock_sp = DB::table('cat_wise_users')->where('user_no',$user_no)->update($data2);
	        if($approve){
	            $notification=array(
	                'messege'=>'Order approved successfully',
	                'alert-type'=>'success'
	            );
	            return Redirect()->route('user.dashboard')->with($notification);
	         }else{
	            $notification=array(
	                'messege'=>'Order approval failed',
	                'alert-type'=>'error'
	            );
	            return Redirect()->back()->with($notification);
	         }
    }
    
    //change sp order status to ongoing

    public function changeSpStatusOngoing($slug,$id){
            $user_no= Auth::guard('web')->user()->user_no;
            $data =array();
            $data['order_status_no']= 2;
    		$changeStatus = DB::table('service_requests')->where('service_request_no',$id)->update($data);
            if($changeStatus){
	            $notification=array(
	                'messege'=>'Order status updated successfully',
	                'alert-type'=>'success'
	            );
	            return Redirect()->route('spPendingOrder')->with($notification);
	         }else{
	            $notification=array(
	                'messege'=>'Order status update failed',
	                'alert-type'=>'error'
	            );
	            return Redirect()->back()->with($notification);
	         }
    }
    
    //change sp order status to complete

    public function changeSpStatusComplete($slug,$id){
      $user_no= Auth::guard('web')->user()->user_no;
      $data =array();
      $data['order_status_no']= 3;


      //payment generation
      $get_sevice_dlt = DB::table('service_requests')->where('service_request_no',$id)->first();
      $sp_no = Auth::guard('web')->user()->user_no;
      $count_earining_row = DB::table('earning_master')->where('user_no',$sp_no)->count();
      $get_earning_master = DB::table('earning_master')->where('user_no',$sp_no)->first();
      if ($count_earining_row >=1) {
        $data3 =array();
        $data3['total_service_amount']=$get_earning_master->total_service_amount + $get_sevice_dlt->total_service_cost;
        $data3['total_payable_amount']=$get_earning_master->total_payable_amount + $get_sevice_dlt->total_percentage_amt;
        $data3['sp_earning']= $get_earning_master->sp_earning + ($get_sevice_dlt->total_service_cost - $get_sevice_dlt->total_percentage_amt);
        $data3['due_amount']= $get_earning_master->due_amount + $get_sevice_dlt->total_percentage_amt;
        $data3['updated_at']= Carbon::now()->toDatetimeString();
        $update_earning_master =DB::table('earning_master')->where('user_no',$sp_no)->update($data3);


        $data6 = array();
        $data6['user_no']= $sp_no;
        $data6['service_request_no']= $get_sevice_dlt->service_request_no;
        $data6['service_no']= $get_sevice_dlt->service_no;
        $data6['earning_master_no']= $get_earning_master->earning_master_no;
        $data6['service_amt']= $get_sevice_dlt->total_service_cost;
        $data6['percent_amt']= $get_sevice_dlt->total_percentage_amt;
        $data6['sp_earned_amt']= $get_sevice_dlt->total_service_cost - $get_sevice_dlt->total_percentage_amt;
        $data6['created_at']= Carbon::now()->toDatetimeString();
        $add_earning6 =DB::table('earning_details')->insert($data6);


      }else{
        $data4 =array();
        $data4['user_no']= $sp_no;
        $data4['total_service_amount']= $get_sevice_dlt->total_service_cost;
        $data4['total_payable_amount']= $get_sevice_dlt->total_percentage_amt;
        $data4['sp_earning']= $get_sevice_dlt->total_service_cost - $get_sevice_dlt->total_percentage_amt;
        $data4['paid_amount']= 0;
        $data4['due_amount']= $get_sevice_dlt->total_percentage_amt;
        $data4['created_at']= Carbon::now()->toDatetimeString();
        $add_earning =DB::table('earning_master')->insert($data4);
        $last_earning_row = DB::table('earning_master')->latest('earning_master_no')->first();

        $data5 = array();
        $data5['user_no']= $sp_no;
        $data5['service_request_no']= $get_sevice_dlt->service_request_no;
        $data5['service_no']= $get_sevice_dlt->service_no;
        $data5['earning_master_no']= $last_earning_row->earning_master_no;
        $data5['service_amt']= $get_sevice_dlt->total_service_cost;
        $data5['percent_amt']= $get_sevice_dlt->total_percentage_amt;
        $data5['sp_earned_amt']= $get_sevice_dlt->total_service_cost - $get_sevice_dlt->total_percentage_amt;
        $data5['created_at']= Carbon::now()->toDatetimeString();
        $add_earning =DB::table('earning_details')->insert($data5);


      }
    


		$data2 =array();
        $data2['is_available']= 1;
        $unlock_sp = DB::table('cat_wise_users')->where('user_no',$user_no)->update($data2);

    $changeStatus = DB::table('service_requests')->where('service_request_no',$id)->update($data);
        if($changeStatus){
          $notification=array(
              'messege'=>'Order status updated successfully',
              'alert-type'=>'success'
          );
          return Redirect()->route('spPendingOrder')->with($notification);
       }else{
          $notification=array(
              'messege'=>'Order status update failed',
              'alert-type'=>'error'
          );
          return Redirect()->back()->with($notification);
       }
    }
    
    //sp new order request
    public function spNewOrder(){
        $user_no= Auth::guard('web')->user()->user_no;
    
        $sp_cancel_count = DB::table('cancelded_sp_orders')->where('user_no',$user_no)->count();
            if ($sp_cancel_count >0) {
        		$cancled_sp_order = DB::table('cancelded_sp_orders')->where('user_no',$user_no)->get();
    	    	foreach ($cancled_sp_order as $object){
    			   $sp_cancel_order_no = $object->canceled_order_no;
    	    	}
        	}else{
    		$sp_cancel_order_no = "";
    	}
    	
    	$sp_Cnew_request = DB::table('cat_wise_users')
              ->leftJoin('service_requests','service_requests.category_no','cat_wise_users.category_no')
              ->where([
                    ['service_requests.is_assigned',0],
                    ['service_requests.canceled_by_customer',0],
                    ['cat_wise_users.user_no',$user_no],
                    ['service_requests.service_request_no','!=',$sp_cancel_order_no]
                  ])
              ->count();
              
    	$sp_new_request_list = DB::table('cat_wise_users')
              ->leftJoin('service_requests','service_requests.category_no','cat_wise_users.category_no')
              ->leftJoin('services','service_requests.service_no','services.service_no')
              ->leftJoin('categories','service_requests.category_no','categories.category_no')
              ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
              ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
              ->leftJoin('order_stauts','service_requests.order_status_no','order_stauts.order_status_no')
              ->select('service_requests.*','services.service_name','services.service_slug','services.service_details','services.service_charge','services.service_image','categories.category_name','subcategories.sub_category_name','service_types.service_type_name','order_stauts.order_status')
              
              ->where([
                    ['service_requests.is_assigned',0],
                    ['service_requests.canceled_by_customer',0],
                    ['cat_wise_users.user_no',$user_no],
                    ['service_requests.service_request_no','!=',$sp_cancel_order_no]
                  ])
                ->orderBy('service_requests.service_request_no','DESC')
              ->get();
            return view('website.dashboard.sp-new-request',compact('sp_new_request_list','sp_Cnew_request'));
    }
    
    
    //sp ongoing orders
    
    public function spPendingOrder(){
        $user_no= Auth::guard('web')->user()->user_no;
        $sp_C_pending_order = DB::table('service_requests')
                ->where([
                    ['order_status_no','<',3],
                    ['assigned_sp_no',$user_no]
                  ])
              ->count();
        $sp_pending_order_list= DB::table('service_requests')
              ->leftJoin('services','service_requests.service_no','services.service_no')
              ->leftJoin('categories','service_requests.category_no','categories.category_no')
              ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
              ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
              ->leftJoin('order_stauts','service_requests.order_status_no','order_stauts.order_status_no')
              ->select('service_requests.*','services.service_name','services.service_slug','services.service_details','services.service_charge','services.service_image','categories.category_name','subcategories.sub_category_name','service_types.service_type_name','order_stauts.order_status')
              
                ->where([
                    ['service_requests.order_status_no','<',3],
                    ['service_requests.assigned_sp_no',$user_no]
                  ])
                ->orderBy('service_requests.service_request_no','DESC')
              ->get();
            return view('website.dashboard.sp-pending-order',compact('sp_pending_order_list','sp_C_pending_order'));
    }
    
    
    //sp completed orders
    
    public function spCompletedOrder(){
        $user_no= Auth::guard('web')->user()->user_no;
        $sp_C_com_order = DB::table('service_requests')
                ->where([
                    ['order_status_no',3],
                    ['assigned_sp_no',$user_no]
                  ])
              ->count();
        $sp_completed_order_list= DB::table('service_requests')
              ->leftJoin('services','service_requests.service_no','services.service_no')
              ->leftJoin('categories','service_requests.category_no','categories.category_no')
              ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
              ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
              ->leftJoin('order_stauts','service_requests.order_status_no','order_stauts.order_status_no')
              ->select('service_requests.*','services.service_name','services.service_slug','services.service_details','services.service_charge','services.service_image','categories.category_name','subcategories.sub_category_name','service_types.service_type_name','order_stauts.order_status')
              
                ->where([
                    ['service_requests.order_status_no',3],
                    ['service_requests.assigned_sp_no',$user_no]
      
                  ])
                ->orderBy('service_requests.service_request_no','DESC')
              ->get();
            return view('website.dashboard.sp-completed-order',compact('sp_completed_order_list','sp_C_com_order'));
    }
    


    //sp canceled orders
    
    public function spAllCanceledOrders(){
        $user_no= Auth::guard('web')->user()->user_no;
        $sp_allCancled_order = DB::table('cancelded_sp_orders')
                ->where([
                    ['user_no',$user_no]
                  ])
              ->count();
        $sp_canceled_order_list= DB::table('cancelded_sp_orders')
              ->leftJoin('service_requests','cancelded_sp_orders.canceled_order_no','service_requests.service_request_no')
              ->leftJoin('services','service_requests.service_no','services.service_no')
              ->leftJoin('categories','service_requests.category_no','categories.category_no')
              ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
              ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
              ->select('service_requests.*','services.service_name','services.service_slug','services.service_details','services.service_charge','services.service_image','categories.category_name','subcategories.sub_category_name','service_types.service_type_name')
              
                ->where([
                    ['cancelded_sp_orders.user_no',$user_no]
      
                  ])
                ->orderBy('cancelded_sp_orders.id','DESC')
              ->get();
            return view('website.dashboard.sp-canceled-orders',compact('sp_canceled_order_list','sp_allCancled_order'));
    }


    //payment history
     public function spPaymentAll(){
      $user_no= Auth::guard('web')->user()->user_no;
        $payments = DB::table('payment_details')
                ->leftJoin('users','payment_details.user_no','users.user_no')
                ->leftJoin('admins','payment_details.received_by','admins.admin_no')
                ->select('payment_details.*','users.name','users.phone','admins.admin_name')
                ->where([
                    ['users.user_no',$user_no]
      
                  ])
                ->orderBy('payment_details.payment_no','DESC')
                ->get();
      return view('website.dashboard.all-payment',compact('payments'));
     }



    

    //show order page
    public function showOrderPage($slug,$id){

      $service_dlt = DB::table('services')
                  ->leftJoin('categories','services.category_no','categories.category_no')
                  ->leftJoin('subcategories','services.subcategory_no','subcategories.subcategory_no')
                  ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                  ->select('services.*','categories.category_name','subcategories.sub_category_name','service_types.service_type_name')
                  ->where([
                    ['services.is_deleted',0],
                    ['services.is_approved',1],
                    ['services.service_no',$id]
                  ])
                ->first();
    	return view('website.order',compact('service_dlt'));
    }


    //place order

    public function bookService(Request $request){
        $messages = [
            'order_date.required' => "Please select order date.",
            'order_time.required' => "Please select order time.",
            'order_address.required' => "Please type your address."
          ];
        $validatedData = $request->validate([
            'order_date' => 'required',
            'order_time' => 'required',
            'order_address' => 'required'
        ], $messages);

        $order_number ="";
        $count = DB::table('service_requests')->count();
        if ($count <=0) {
          $order_number ='az-'.'100001';
        }else{
          $last_row = DB::table('service_requests')->latest('service_request_no')->first();
          $order_num = $last_row->order_number;
          $order_nums = explode("-", $order_num);
          $order_number =$order_nums[0] ."-".($order_nums[1]+1);
        }

        $get_service = DB::table('services')->where('service_no',$request->service_no)->first();
        $service_percent_amount = $get_service->service_percent_amount;

        $data =array();
        $data['order_date']= $request->order_date;
        $data['order_time']= $request->order_time;
        $data['order_address']= $request->order_address;
        $data['customer_note']= $request->customer_note;
        $data['user_no']= Auth::guard('web')->user()->user_no;
        $data['customer_name']= Auth::guard('web')->user()->name;
        $data['customer_phone']= Auth::guard('web')->user()->phone;
        $data['customer_email']= Auth::guard('web')->user()->email;
        $data['order_number']= $order_number;
        $data['service_no']= $request->service_no;
        $data['category_no']= $request->category_no;
        $data['subcategory_no']= $request->subcategory_no;
        $data['service_hours']= $request->service_hours;
        $data['service_rate']= $request->serviceRate;
        if ($request->service_hours) {
          $data['total_service_cost']= $request->service_hours * $request->serviceRate;
          $data['total_percentage_amt'] = $request->service_hours * $service_percent_amount;
        }else{
          $data['total_service_cost']= $request->serviceRate;
          $data['total_percentage_amt'] = $service_percent_amount;
        }
        $data['order_status_no']= 1;
        $data['created_at']= Carbon::now()->toDatetimeString();

        $insert=DB::table('service_requests')->insert($data); 

        if($insert){
            $notification=array(
                'messege'=>'Order placed successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('order.booked')->with($notification);
         }else{
            $notification=array(
                'messege'=>'Order place failed',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
         }
    }

    public function bookServiceSuccess(){
      $last_row = DB::table('service_requests')->latest('service_request_no')->first();
      $id = $last_row->service_request_no;
      $service_dlt = DB::table('service_requests')
                  ->leftJoin('services','service_requests.service_no','services.service_no')
                  ->leftJoin('categories','service_requests.category_no','categories.category_no')
                  ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
                  ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                  ->select('service_requests.*','services.service_name','services.service_details','services.service_charge','categories.category_name','subcategories.sub_category_name','service_types.service_type_name')
                  ->where([
                    ['service_requests.canceled_by_customer',0],
                    ['service_requests.order_status_no','!=',4],
                    ['service_requests.service_request_no',$id]
                  ])
                ->first();
      return view('website.order-success',compact('service_dlt'));
    }
}
