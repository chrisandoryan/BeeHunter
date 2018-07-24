<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ClientLoginController extends Controller
{
	public function __construct()
    {
        $this->middleware('guest:client');
	}
	
	public function showLoginForm(){
		return view('auth.clientLogin');
	}

    public function doActionLogin(Request $request){
		
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password' => 'required'
    	]);

		if(Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember));
		{
    		return redirect()->intended(route('client.dashboard'));
    	}

    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
