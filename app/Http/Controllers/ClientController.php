<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\BountyCategory;
use App\HeaderBounty;
use App\Submission;
use App\Hunter;
use Validator;

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

    public function getReportDetail($hash) {
        //get data dari identifier (base64)
        $report = Submission::select('submission_id','bounty_id','title','description','submitted_datetime','stored_report_path','is_approved_as_bug')->where('hash', $hash)->get()->first();
        $bounty_program = HeaderBounty::select('title', 'is_paid_reward', 'minimum_reward', 'maximum_reward', 'rewards_description')->where('bounty_id', '=', $report->bounty_id)->get()->first();
        // dd($bounty_program->is_paid_reward);
        if($bounty_program->is_paid_reward == 1){
            $reward = array('min_reward' => $bounty_program->minimum_reward, 
                            'max_reward' => $bounty_program->maximum_reward
                            );
        }
        else{
            $reward = 0;
        }
        session(['SubId' => $report->submission_id, 'BountyId' => $report->bounty_id, 'Reward' => $reward]);
        return view('clients.detailReport', ['report' => $report, 'bounty_program' => $bounty_program, 'hash' => $hash]);
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

    public function revSub(){
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

    public function payReward(Request $request){
        if($request->session()->has('SubId') && $request->session()->has('BountyId')) {
            // dd($request);
            $client = Auth::guard('client')->user();
            $validator = Validator::make($request->all(), [
                'paid_reward' => sprintf('required|integer|min:%d|max:%d', session()->pull('Reward->min_reward'), session()->pull('Reward->max_reward')),
                'password' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->route('client.pay.reward')->withErrors($validator);
            }
            else if(!Hash::check($request->password, $client->password)) {
                return redirect()->route('client.pay.reward')->withErrors(['message' => 'Your ID or password is invalid']);
            }
            else {
                $submission = Submission::find(session()->get('SubId'));
                $submission->is_rewarded = 1;
                $submission->is_approved_as_bug = 3;
                $bounty = HeaderBounty::find(session()->get('BountyId'));
                $bounty->is_running = 0;
                if(session()->pull('Reward') != 0){
                    $hunter = Hunter::find(session()->get('SubId'));
                    $hunter->balance += $request->input('paid_reward');
                    $client->balance -= $request->input('paid_reward');
                    $request->session()->flash('status', 'Payment succeeded!');
                }
                return redirect()->route('client.reports');
            }
            
        }
        else {
            return redirect()->route('client.dashboard');
        }
    }
}
