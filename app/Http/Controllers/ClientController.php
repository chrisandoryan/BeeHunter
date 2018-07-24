<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\BountyCategory;
use App\HeaderBounty;
use App\Submission;

class ClientController extends Controller
{
    public function __construct() {
        $this->middleware('auth:client');
    }

    public function list() {
         return view('clients.list');
    }

    public function dashboard() {
         $user = Auth::guard('client')->user();
         return view('clients.dashboard', ['user' => $user]);
    }

    public function displayReport() {
        $user = Auth::guard('client')->user();
        $bounty_ids = HeaderBounty::where('client_id', '=', $user->client_id)->get()->pluck('bounty_id');
        $reports = Submission::whereIn('bounty_id', $bounty_ids)->get();
        // dd($reports);
        return view('clients.report', ['user' => $user, 'reports' => $reports]);
   }

    public function getReportDetail() {
        //get data dari identifier (base64)
        return view('clients.detailReport');
    }
    // public function store(Request $request){
    //     $this->validate($request,[
    //         'title' => 'required',
    //         'target' => 'required',
    //         'description' => 'required',
    //         'category' => 'required',
    //         // 'date' => 'required',
    //         'reward' => 'required'
    //     ]);

         // //create bounty
         // $post = new Bounty;
         // $post->IdBounty = auth()->user()->id;
         // $post->IdClient = auth()->user()->id;
         // $post->BountyTitle = $request->input('title');
         // $post->BountyCategory = $request->input('category');
         // $post->BountyTitle = $request->input('title');
         // $post->BountyTarget = $request->input('target');
         // $post->BountyDate = $request->input('date');
         // $post->Description = $request->input('description');
         // $post->save();;

    //     $id = Auth::user()->id;
    //     $input = $this->request->all();
    //     $input = array_merge(array('id'=>$id), $input);
    //     Bounty::create($input);
    //     return redirect()->back();
    // }

    public function profile(){
         return view('clients.profile');
    }

}
