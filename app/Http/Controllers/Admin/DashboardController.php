<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:admin');
    }

    public function showAdminDashboard(){
    	$count_service = DB::table('services')->count();
    	$pending_order = DB::table('service_requests')->where('order_status_no',1)->count();
    	$processing_order = DB::table('service_requests')->where('order_status_no',2)->count();
    	$completed_order = DB::table('service_requests')->where('order_status_no',3)->count();
      $total_earning = DB::table('earning_master')->sum('total_service_amount');
      $our_earning = DB::table('earning_master')->sum('total_payable_amount');
      //user type 1== service provider
      //user type 2== customer.
    	$totalSP = DB::table('users')->where('user_type',1)->count();
    	$totalCustomer = DB::table('users')->where('user_type',2)->count();
    	$orderList = DB::table('service_requests')
                  ->leftJoin('services','service_requests.service_no','services.service_no')
                  ->leftJoin('users','service_requests.assigned_sp_no','users.user_no')
                  ->select('service_requests.*','services.service_name','services.service_details','services.service_charge','users.name','users.phone')
                  ->where([
                    ['service_requests.canceled_by_customer',0],
                    ['service_requests.order_status_no',1]
                  ])
                ->get();

    	return view('admin.dashboard',compact('count_service','pending_order','processing_order','completed_order','totalSP','totalCustomer','orderList','total_earning','our_earning'));
    }
}
