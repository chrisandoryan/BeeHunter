<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Rewardment;

class AdminController extends Controller
{
    // public function __construct() {
    //     $this->middleware('admin');
    // }
    
    public function dashboard() {
        $rewardment = Rewardment::get();
        return view('admin.dashboard', ['rewardment' => $rewardment ]);
    }

    public function RewardValidation(Request $request) {
        $this->validate($request,[
            'status' => 'required|integer',
            'reward_id' => 'required|integer'
        ]);
        $rewardment = Rewardment::find($request->reward_id);
        $rewardment->validated = $request->status;
        $rewardment->save();

        return redirect()->route('admin.dashboard');
    }

}