<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Hash;
use Auth;
use User;
use DB;
use Carbon\Carbon;

class userLoginController extends Controller
{
    use AuthenticatesUsers;

     public function __construct()
    {
        $this->middleware('guest:web')->except('logout', 'userLogout');
    }

    function showLoginForm(){
    	return view('website.login');
    }

    public function userLogin(Request $request)
    {
        
        $messages = [
            'phone.required' => "Phone number can't be empty.",
            'password.required' => "Password can't be empty."
          ];
        $validatedData = $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ], $messages);


        if (Auth::guard('web')->attempt(['phone' => $request->phone, 'password' => $request->password, 'is_active' => 1,])) {

            return redirect()->intended('/user/dashboard');
        }else{
            $notification=array(
                'messege'=>'Username or Password mismatched. Please try with valid username & password.',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
        //return back()->withInput($request->only('phone'));
    }

    public function userLogout(Request $request){
        Auth::guard('web')->logout();
        return redirect()->intended('/');

    }


    //registration
    function showRegForm(){
        return view('website.register');
    }


    public function userRegistration(Request $request){
        $messages = [
            'name.required' => "Please type your fullname.",
            'phone.required' => "Please type a valid & unique phone number."
          ];
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:4|confirmed'
        ], $messages);

        $data =array();
        $data['name']= $request->name;
        $data['phone']= $request->phone;
        $data['email']= $request->email;
        $data['user_address']= $request->user_address;
        $data['password']= Hash::make($request->password);
        $data['user_type']= 2;
        $data['created_at']= Carbon::now()->toDatetimeString();

        $insert=DB::table('users')->insert($data); 

        if($insert){
            $notification=array(
                'messege'=>'Registration completed successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('login')->with($notification);
         }else{
            $notification=array(
                'messege'=>'Registration failed',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
         }
    }
}
