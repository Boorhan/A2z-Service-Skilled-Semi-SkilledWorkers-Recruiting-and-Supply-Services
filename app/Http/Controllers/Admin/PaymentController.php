<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\Carbon;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function showPaymentForm()
    {
    	$getSP = DB::table('earning_master')
  					->leftJoin('users','earning_master.user_no','users.user_no')
                ->select('earning_master.*','users.name','users.phone')
                ->where([
                  ['earning_master.is_paid',0]
                ])
                ->get();
      return view('admin.payment.payment',compact('getSP'));
    }


    //insert payment

    public function createPayment(Request $request){
    	$messages = [
    		'user_no.required' => "Please select a service provider.",
		    'payment_amount.required' => "Paid Amount can't be empty."
		  ];
    	$validatedData = $request->validate([
    		'user_no' => 'required',
        'payment_amount' => 'required'
	    ], $messages);
	    $data =array();
			$data['user_no']= $request->user_no;
			$data['payment_amount']= $request->payment_amount;
			$data['transaction_id']= $request->transaction_id;
			$data['received_by']= Auth::guard('admin')->user()->admin_no;
			$data['created_at']= Carbon::now()->toDatetimeString();

			$data2 =array();
			$get_earning_master = DB::table('earning_master')->where('user_no',$request->user_no)->first();
			$data2['paid_amount']= $get_earning_master->paid_amount + $request->payment_amount;
			$data2['due_amount']=$get_earning_master->due_amount - $request->payment_amount;
				if ($get_earning_master->due_amount == $request->payment_amount) {
					$data2['is_paid']= 1;
				}
			$update_earning_master =DB::table('earning_master')->where('user_no',$request->user_no)->update($data2);

			$insert=DB::table('payment_details')->insert($data);	

			if($insert){
	        $notification=array(
	            'messege'=>'Pyament completed successfully',
	            'alert-type'=>'success'
	        );
	        return Redirect()->route('payment.all')->with($notification);
	     }else{
	        $notification=array(
	            'messege'=>'Payment failed',
	            'alert-type'=>'error'
	        );
	        return Redirect()->back()->with($notification);
	     }
    }

    //all payments
    public function getAllPayments(){
    	$payments = DB::table('payment_details')
    						->leftJoin('users','payment_details.user_no','users.user_no')
					    	->leftJoin('admins','payment_details.received_by','admins.admin_no')
					    	->select('payment_details.*','users.name','users.phone','admins.admin_name')
					    	->orderBy('payment_details.payment_no','DESC')
					    	->get();
    	return view('admin.payment.all-payment',compact('payments'));
    }
}
