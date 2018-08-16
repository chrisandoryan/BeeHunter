<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BountyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use App\Submission;

class HunterController extends Controller
{

    public function profile() {
        $user = Auth::user();
        return view('hunters.profile', ['user' => $user]);
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
        $records = Submission::where('hunter_id', '=', $user->hunter_id)->take(3)->get();
        return view('hunters.dashboard', ['user' => $user, 'records' => $records]);
    }

}
