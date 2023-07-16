<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ReportController extends Controller
{
    public function __construct(){
    	$this->middleware('auth:admin');
    }


    //order report

    public function orderReport(){
    	$orders = DB::table('service_requests')
                  ->leftJoin('services','service_requests.service_no','services.service_no')
                  ->leftJoin('categories','service_requests.category_no','categories.category_no')
                  ->leftJoin('subcategories','service_requests.subcategory_no','subcategories.subcategory_no')
                  ->leftJoin('service_types','services.service_type_no','service_types.service_type_no')
                  ->leftJoin('users','service_requests.assigned_sp_no','users.user_no')
                  ->leftJoin('order_stauts','service_requests.order_status_no','order_stauts.order_status_no')
                  ->select('service_requests.*','services.service_name','services.service_details','services.service_charge','services.service_image','categories.category_name','subcategories.sub_category_name','service_types.service_type_name','users.name','users.phone','order_stauts.order_status')
                ->get();
        return view('admin.report.order-report',compact('orders'));
    }

    //earning report
    public function earningReport(){
    	$earning = DB::table('earning_details')
              ->leftJoin('services','earning_details.service_no','services.service_no')
                ->select('earning_details.*','services.service_name')
                ->get();
      return view('admin.report.earning-report',compact('earning'));
    }


    //sp earning report
    public function spEarningReport(){
    	$spearning = DB::table('earning_master')
              ->leftJoin('users','earning_master.user_no','users.user_no')
                ->select('earning_master.*','users.name')
                ->get();
      return view('admin.report.sp-earning-report',compact('spearning'));
    }
    //payments report
    public function paymentReport(){
    	$payments = DB::table('payment_details')
    						->leftJoin('users','payment_details.user_no','users.user_no')
					    	->leftJoin('admins','payment_details.received_by','admins.admin_no')
					    	->select('payment_details.*','users.name','users.phone','admins.admin_name')
					    	->orderBy('payment_details.payment_no','DESC')
					    	->get();
    	return view('admin.report.payment-report',compact('payments'));
   }

   //due report
    public function dueReport(){
    	$due = DB::table('earning_master')
              ->leftJoin('users','earning_master.user_no','users.user_no')
                ->select('earning_master.*','users.name')
               ->where([
                  ['earning_master.is_paid',0]
                ])
                ->get();
      return view('admin.report.due-report',compact('due'));
    }
}
