<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use Auth;

class adminloginController extends Controller
{
	public function __construct(){

		$this->middleware('guest:admin');
	}

	public function showLoginForm(){

		return view('auth.admin-login');
	}

    //

    public function Login(Request $request){

		//Validate the form data

		$this->validate($request, [
    	'email'=> 'required|email',
    	'password'=>'required|min:6'

    	]);
		

		//attempt to log the user in
		if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){
			//if successful then redirect to  their location


			return redirect()->intended(route('admin.dashboard'));

		}

		


		//if unsuccessful, then redirect back to login with the form data
		
		return redirect()->back()->withInput($request->only('email','remember'));
	}

}