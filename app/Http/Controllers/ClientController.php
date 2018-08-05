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
        $bounties = HeaderBounty::where('client_id', '=', $user->client_id)->get();
        $bounty_count = HeaderBounty::count();
        return view('clients.dashboard', ['user' => $user, 'bounties' => $bounties, 'bc' => $bounty_count]);
    }

    public function displayReport() {
        $user = Auth::guard('client')->user();
        $bounty_ids = HeaderBounty::where('client_id', '=', $user->client_id)->get()->pluck('bounty_id');
        $reports = Submission::whereIn('bounty_id', $bounty_ids)->get();
        // dd($reports);
        return view('clients.report', ['user' => $user, 'reports' => $reports]);
   }

    public function getReportDetail($subId) {
        //get data dari identifier (base64)
        $report = Submission::select('bounty_id','title','description','submitted_datetime','stored_report_path')->where('submission_id', $subId)->get()->first();
        // dd($report);
        $bounty_program = HeaderBounty::select('title')->where('bounty_id', '=', $report->bounty_id)->get()->pluck('title')->toArray();
        session(['SubId' => $subId, 'BountyId' => $report->bounty_id]);

        return view('clients.detailReport', ['report' => $report, 'bp' => implode($bounty_program)]);
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

    public function accSub(){
        $submission = Submission::find(session()->pull('SubId'));
        $submission->is_approved_as_bug=2;
        $submission->save();
        $bounty = HeaderBounty::find(session()->pull('BountyId'));
        $bounty->is_running=0;
        $bounty->save();
        return redirect()->route('client.reports');
    }

    public function decSub(){
        return view('clients.profile');
    }

    public function topup(){
        $user = Auth::guard('client')->user();
        return view('clients.topup', ['user' => $user]);
    }

    public function storetopup(Request $request){
        $user = Auth::guard('client')->user();
        if($request->input('balance') >= 100000){
            $balance = $user->balance;
            $user->balance = $request->input('balance') + $balance;
            $user->save();
        }
        return view('clients.topup', ['user' => $user]);
    }
}
