<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    protected $guard = 'admin';

    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    
    public function showLoginForm() {
        return view('auth.adminLogin');
    }

    public function logout() {
        session(['admin' => false]);
        return view('auth.adminLogin');
    }

    public function submitLogin(Request $request){
		
    	$this->validate($request,[
    		'email' => 'required|email',
    		'password' => 'required'
        ]);
		if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember));
		{
            session(['admin' => true]);
    		return redirect()->intended(route('admin.dashboard'));
    	}

    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }

}