<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class HunterController extends Controller
{
//    /*public function __construct() {
//        $this->middleware('auth');
//    }*/

    public function profile() {
       
        return view('hunters.profile');
    }

    public function mailbox() {
       
        return view('hunters.mailbox');
    }

    public function compose() {
       
        return view('hunters.compose');
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('hunters.dashboard', ['user' => $user]);
    }

}
