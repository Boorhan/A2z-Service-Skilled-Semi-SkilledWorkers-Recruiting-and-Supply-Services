<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:admin');
    }

    //order details
    public function orderDetails($id){
      $order_dlt = DB::table('service_requests')
                  ->leftJoin('services','service_requests.service_no','services.service_no')
                  ->leftJoin('categories','service_requests.category_no','categories.category_no')
                  ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
                  ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                  ->leftJoin('users','service_requests.assigned_sp_no','users.user_no')
                  ->leftJoin('order_stauts','service_requests.order_status_no','order_stauts.order_status_no')
                  ->select('service_requests.*','services.service_name','services.service_details','services.service_charge','services.service_image','categories.category_name','subcategories.sub_category_name','service_types.service_type_name','users.name','users.phone','order_stauts.order_status')
                  ->where([
                    ['service_requests.service_request_no',$id]
                  ])
                ->first();
        return view('admin.order.order-details',compact('order_dlt'));
    }

    //pending orders

    public function pendingOrders(){
    	$pending_order = DB::table('service_requests')
                  ->leftJoin('services','service_requests.service_no','services.service_no')
                  ->leftJoin('categories','service_requests.category_no','categories.category_no')
                  ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
                  ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                  ->leftJoin('users','service_requests.assigned_sp_no','users.user_no')
                  ->leftJoin('order_stauts','service_requests.order_status_no','order_stauts.order_status_no')
                  ->select('service_requests.*','services.service_name','services.service_details','services.service_charge','services.service_image','categories.category_name','subcategories.sub_category_name','service_types.service_type_name','users.name','users.phone','order_stauts.order_status')
                  ->where([
                    ['service_requests.canceled_by_customer',0],
                    ['service_requests.order_status_no',1]
                  ])
                  ->orderBy('service_requests.service_request_no', 'DESC')
                ->get();
        return view('admin.order.pending-orders',compact('pending_order'));
    }

    //processing orders

    public function processingOrders(){
    	$pending_order = DB::table('service_requests')
                  ->leftJoin('services','service_requests.service_no','services.service_no')
                  ->leftJoin('categories','service_requests.category_no','categories.category_no')
                  ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
                  ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                  ->leftJoin('users','service_requests.assigned_sp_no','users.user_no')
                  ->leftJoin('order_stauts','service_requests.order_status_no','order_stauts.order_status_no')
                  ->select('service_requests.*','services.service_name','services.service_details','services.service_charge','services.service_image','categories.category_name','subcategories.sub_category_name','service_types.service_type_name','users.name','users.phone','order_stauts.order_status')
                  ->where([
                    ['service_requests.canceled_by_customer',0],
                    ['service_requests.order_status_no',2]
                  ])
                  ->orderBy('service_requests.service_request_no', 'DESC')
                ->get();
        return view('admin.order.processing-orders',compact('pending_order'));
    }

    //completed orders

    public function completedOrders(){
    	$pending_order = DB::table('service_requests')
                  ->leftJoin('services','service_requests.service_no','services.service_no')
                  ->leftJoin('categories','service_requests.category_no','categories.category_no')
                  ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
                  ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                  ->leftJoin('users','service_requests.assigned_sp_no','users.user_no')
                  ->leftJoin('order_stauts','service_requests.order_status_no','order_stauts.order_status_no')
                  ->select('service_requests.*','services.service_name','services.service_details','services.service_charge','services.service_image','categories.category_name','subcategories.sub_category_name','service_types.service_type_name','users.name','users.phone','order_stauts.order_status')
                  ->where([
                    ['service_requests.canceled_by_customer',0],
                    ['service_requests.order_status_no',3]
                  ])
                  ->orderBy('service_requests.service_request_no', 'DESC')
                ->get();
        return view('admin.order.completed-orders',compact('pending_order'));
    }

    //users canceled orders

    public function userCanceledOrders(){
    	$pending_order = DB::table('service_requests')
                  ->leftJoin('services','service_requests.service_no','services.service_no')
                  ->leftJoin('categories','service_requests.category_no','categories.category_no')
                  ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
                  ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                  ->leftJoin('users','service_requests.assigned_sp_no','users.user_no')
                  ->leftJoin('order_stauts','service_requests.order_status_no','order_stauts.order_status_no')
                  ->select('service_requests.*','services.service_name','services.service_details','services.service_charge','services.service_image','categories.category_name','subcategories.sub_category_name','service_types.service_type_name','users.name','users.phone','order_stauts.order_status')
                  ->where([
                    ['service_requests.canceled_by_customer',1]
                  ])
                  ->orderBy('service_requests.service_request_no', 'DESC')
                ->get();
        return view('admin.order.user-canceled-orders',compact('pending_order'));
    }


    //admin canceled orders

    public function adminCanceledOrders(){
    	$pending_order = DB::table('service_requests')
                  ->leftJoin('services','service_requests.service_no','services.service_no')
                  ->leftJoin('categories','service_requests.category_no','categories.category_no')
                  ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
                  ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                  ->leftJoin('users','service_requests.assigned_sp_no','users.user_no')
                  ->leftJoin('order_stauts','service_requests.order_status_no','order_stauts.order_status_no')
                  ->leftJoin('admins','service_requests.canceled_by','admins.admin_no')
                  ->select('service_requests.*','services.service_name','services.service_details','services.service_charge','services.service_image','categories.category_name','subcategories.sub_category_name','service_types.service_type_name','users.name','users.phone','order_stauts.order_status','admins.admin_name')
                  ->where([
                    ['service_requests.canceled_by_customer',0],
                    ['service_requests.order_status_no',4]
                  ])
                ->get();
        return view('admin.order.admin-canceled-orders',compact('pending_order'));
    }


	 	//cancel order
	    public function cancelOrder($id){
	    	$data =array();
			  $data['order_status_no']= 4;
        $data['canceled_by'] = Auth::guard('admin')->user()->admin_no;
	        $decline = DB::table('service_requests')->where('service_request_no',$id)->update($data);

	        $data2 =array();
	        $get_sp = DB::table('service_requests')->where('service_request_no',$id)->first();
		    $sp_no= $get_sp->assigned_sp_no;
			   $data2['is_available']= 1;
			   $update_status =DB::table('cat_wise_users')->where('user_no',$sp_no)->update($data2);


	        if($decline){
	            $notification=array(
	                'messege'=>'Order canceled successfully',
	                'alert-type'=>'success'
	            );
	            return Redirect()->route('order.pending')->with($notification);
	         }else{
	            $notification=array(
	                'messege'=>'Order cancelation failed',
	                'alert-type'=>'error'
	            );
	            return Redirect()->back()->with($notification);
	         }
	    }  	


	    //show order status form

	    public function orderStatusForm($id){
	    	$order_status = DB::table('order_stauts')->get();
	    	$get_order = DB::table('service_requests')->where('service_request_no',$id)->first();
	    	return view('admin.order.change-status',compact('order_status','get_order'));
	    }


	    //change order status

    public function updateOrderStatus(Request $request,$id){
    	$data =array();
	    $data['order_status_no']= $request->order_status_no;
  		$data['admin_note']= $request->admin_note;
      //canceled_by is used as updated_by
  		$data['canceled_by'] = Auth::guard('admin')->user()->admin_no; 

		$data2 =array();
	    $status_no= $request->order_status_no;
	    $sp_no= $request->assigned_sp_no;
		$data2['is_available']= 1;
		if ($status_no == 3 || $status_no == 4) {
			$update_status =DB::table('cat_wise_users')->where('user_no',$sp_no)->update($data2);

		}


    //payment generation
    if ($status_no == 3){
      $get_sevice_dlt = DB::table('service_requests')->where('service_request_no',$id)->first();
      $sp_no = $get_sevice_dlt->assigned_sp_no;
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
    }

    $update_status =DB::table('service_requests')->where('service_request_no',$id)->update($data);
		
		if($update_status){
	        $notification=array(
	            'messege'=>'Order status updated successfully',
	            'alert-type'=>'success'
	        );
	        return Redirect()->back()->with($notification);
	     }else{
	        $notification=array(
	            'messege'=>'Order status update failed',
	            'alert-type'=>'error'
	        );
	        return Redirect()->back()->with($notification);
	     }
    }


    //show assign sp page

    public function assignSpForm($id){
    	// $count = DB::table('cancelded_sp_orders')->count();
     //  if ($count >0) {
    	// 	$cancled_sp = DB::table('cancelded_sp_orders')->where('canceled_order_no',$id)->get();
	    // 	foreach ($cancled_sp as $object){
			  //  $canceled_user = $object->user_no;
	    // 	}
    	// }else{
    	// 	$canceled_user = "";
    	// }
    	
    	$get_sp = DB::table('cat_wise_users')
                  ->leftJoin('service_requests','cat_wise_users.category_no','service_requests.category_no')
                  ->leftJoin('users','cat_wise_users.user_no','users.user_no')
                  ->leftJoin('cancelded_sp_orders','cat_wise_users.user_no','cancelded_sp_orders.user_no')
                  ->select('users.name','users.phone','users.user_no')
                  ->where([
                    ['service_requests.canceled_by_customer',0],
                    ['service_requests.order_status_no',1],
                    ['cat_wise_users.is_available',1],
                    ['users.user_type',1],
                    ['cancelded_sp_orders.canceled_order_no','!=',$id],
                    ['service_requests.service_request_no',$id],
                  ])
                ->get();
    	$get_order = DB::table('service_requests')->where('service_request_no',$id)->first();
	    return view('admin.order.assign-sp',compact('get_order','get_sp'));
    }


     //assign service providers

    public function assignSP(Request $request,$id){
    	$data =array();
	    $data['assigned_sp_no']= $request->assigned_sp_no;
		  $data['admin_note']= $request->admin_note;
      $data['is_assigned'] = 1;
		  $update_status =DB::table('service_requests')->where('service_request_no',$id)->update($data);

		$data2 =array();
	    $data2['is_available']= 0;
	    $update_status =DB::table('cat_wise_users')->where('user_no',$request->assigned_sp_no)->update($data2);


		if($update_status){
	        $notification=array(
	            'messege'=>'Service provider assigned successfully',
	            'alert-type'=>'success'
	        );
	        return Redirect()->route('order.pending')->with($notification);
	     }else{
	        $notification=array(
	            'messege'=>'Service provider assign failed',
	            'alert-type'=>'error'
	        );
	        return Redirect()->back()->with($notification);
	     }
    }
}
