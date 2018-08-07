<?php

namespace App\Http\Controllers;

use App\BountyTarget;
use App\BountyCategory;
use App\RewardType;
use App\Client;
use App\HeaderBounty;
use App\Submission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Hash;
use Validator;

class BountyController extends Controller
{
    private $category_grouping, $table;

    function __construct(array $attributes = array()) {
        $this->table = Config::get('constants.tables.bounty.header.name');
        $this->category_grouping = DB::table($this->table)->select('header_bounties.category_id', 'bounty_categories.name', DB::raw('count(*) as total'))->join('bounty_categories', 'bounty_categories.category_id', '=', 'header_bounties.category_id')->groupBy('category_id')->get();
    }

    public function fetchAllBounties() {
        $bounties = HeaderBounty::where('is_running', '=', '1')->get();
        // dd($bounties[0]->rewardTypes->reward_id);
        if(Auth::check()) {
            return view('hunters.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
        else if(Auth::guard('client')->check()) {
            return view('clients.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
        else {
            return view('bounty.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
    }

    public function fetchServerBounties() {
        $bounties = HeaderBounty::where('category_id', '=', 'SI')->where('is_running', '=', 1)->get();
        if(Auth::check()) {
            return view('hunters.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
        else if(Auth::guard('client')->check()) {
            return view('clients.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
        else {
            return view('bounty.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
    }

    public function fetchWebBounties() {
        $bounties = HeaderBounty::where('category_id', '=', 'WS')->where('is_running', '=', 1)->get();
        if(Auth::check()) {
            return view('hunters.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
        else if(Auth::guard('client')->check()) {
            return view('clients.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
        else {
            return view('bounty.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
    }

    public function fetchAndroidBounties() {
        $bounties = HeaderBounty::where('category_id', '=', 'AS')->where('is_running', '=', 1)->get();
        if(Auth::check()) {
            return view('hunters.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
        else if(Auth::guard('client')->check()) {
            return view('clients.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
        else {
            return view('bounty.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
    }

    public function fetchiOSBounties() {
        $bounties = HeaderBounty::where('category_id', '=', 'iOS')->where('is_running', '=', 1)->get();
        if(Auth::check()) {
            return view('hunter.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
        else if(Auth::guard('client')->check()) {
            return view('client.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
        else {
            return view('bounty.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
    }

    public function fetchNetworkBounties() {
        $bounties = HeaderBounty::where('category_id', '=', 'NS')->where('is_running', '=', 1)->get();
        if(Auth::check()) {
            return view('hunter.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
        else if(Auth::guard('client')->check()) {
            return view('client.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
        else {
            return view('bounty.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
        }
    }

    public function getSubmissionRecords() {
        $hunter_id = Auth::user()->hunter_id;
        $records = Submission::where('hunter_id', '=', $hunter_id)->get();
        return view('bounty.activity', ['records' => $records]);
    }

    public function getReportSubmissionPage($hash) {
        if(Auth::check()) {
            $headerbounty = HeaderBounty::where('hash', '=', $hash)->first();
            return view('bounty.submit', ['program' => $headerbounty]);
        }
    }

    public function handleReportSubmission(Request $request, $hash) {
        $categorize = Config::get('constants.category');
        
        $headerbounty = HeaderBounty::where('hash', '=', $hash)->first();
        $title = $request->input('report-title');
        $category = $headerbounty->category_id;
        $report = $request->file('file-submission');
        $extension = $report->getClientOriginalExtension();
        $submission_date_time = Carbon::now()->toDateString();

        $hunter = Auth::user();

        $client_id = $headerbounty->client_id;
        $client = Client::find($client_id);
        // dd($categorize[$category]);

        // format: $catInit[] _[date]_[username]_[title]_[company].[extension]
        $directory = 'reports/';
        $filename = sprintf("%s_%s_%s_%s_%s_[%s].%s", $headerbounty->category_id, $headerbounty->bounty_id, $submission_date_time, $hunter->username, $client->email, $title, $extension);
        // dd($filename);
        $report->move($directory, $filename);

        $sub = new Submission;
        $sub->bounty_id = $headerbounty->bounty_id;
        $sub->hunter_id = $hunter->hunter_id;
        $sub->title = $title;
        $sub->description = $request->description;
        $sub->stored_report_path = $directory .  $filename;
        $sub->submitted_datetime = $submission_date_time;
        $sub->is_approved_as_bug = 1; //0: decline, 1: submitted, 2: reviewed, 3: accepted
        $sub->hash = md5($headerbounty->category_id . "/" . $headerbounty->bounty_id . "/" . $hunter->hunter_id);

        $sub->save();
        return redirect()->route('hunter.dashboard');
    }

    public function fetchBountyDetail($hash) {
        $program = HeaderBounty::where('hash', '=', $hash)->first();
        $bountytarget = BountyTarget::where('bounty_id', '=', $program->bounty_id)->get();
        $reward = RewardType::where('reward_id', $program->reward_id)->first();
        if(Auth::check()) {
            return view('hunters.bountyDetail', ['program' => $program, 'bountytarget' => $bountytarget, 'reward' => $reward]);
        }
        else if(Auth::guard('client')->check()) {
            return view('clients.bountyDetail', ['program' => $program, 'bountytarget' => $bountytarget, 'reward' => $reward]);
        }
        else {
            return view('bounty.bountyDetail', ['program' => $program, 'bountytarget' => $bountytarget, 'reward' => $reward]);
        }
    }

    public function showProgramCreatorPage(){
        $categories = BountyCategory::all();
        return view('bounty.addProgram', ['categories' => $categories]);
   }

    public function storeBountyProgram(Request $request){
        $headerbounty = new HeaderBounty;

        $client = Auth::guard('client')->user();

        $headerbounty->client_id = $client->client_id;
        $headerbounty->category_id = $request->category_id;
        $headerbounty->title = $request->title;
        $headerbounty->scope_description = $request->scope_description;
        $headerbounty->hash = md5($client->client_id . "/" . $request->category_id);

        $headerbounty->save();

        foreach (explode(', ', $request->test_targets) as $target) {
            $bountytarget = new BountyTarget;
            $bountytarget->bounty_id = $headerbounty->bounty_id;
            $bountytarget->target_string = $target;
            $bountytarget->save();
        }

        $request->session()->put('new_bounty_id', $headerbounty->bounty_id);
        return redirect()->route('client.create.reward');
    }

    public function showRewardCreatorPage(Request $request) {
        if($request->session()->has('new_bounty_id')) {
            return view('bounty.setReward');
        }
        else {
            return redirect()->route('client.dashboard');
        }
    }

    public function storeProgramReward(Request $request) {
        if($request->session()->has('new_bounty_id')) {
            // dd($request);
            switch($request->reward_type) {
                case 1:
                $client = Auth::guard('client')->user();
                $validator = Validator::make($request->all(), [
                    'min_reward' => sprintf('required|integer|min:%d|max:%d', 0, $client->balance),
                    'max_reward' => sprintf('required|integer|min:%d|max:%d', $request->min_reward, $client->balance),
                    'password' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect()->route('client.create.reward')->withErrors($validator);
                }
                else if(!Hash::check($request->password, $client->password)) {
                    return redirect()->route('client.create.reward')->withErrors(['message' => 'Your ID or password is invalid']);
                }
                else {
                    $headerbounty = HeaderBounty::find($request->session()->get('new_bounty_id'));
                    $headerbounty->minimum_reward = $request->min_reward;
                    $headerbounty->maximum_reward = $request->max_reward;
                    $headerbounty->up_since = Carbon::now()->toDateTimeString();
                    $headerbounty->is_running = 1;
                    $headerbounty->reward_id = $request->reward_type;
                    $headerbounty->save();
                    $request->session()->flash('status', 'New Program Added!');
                    return redirect()->route('client.dashboard');
                }
                break;
            }
        }
        else {
            return redirect()->route('client.dashboard');
        }
    }
    
    public function manageProgram(){
        $user = Auth::guard('client')->user();
        $programs = DB::table('header_bounties')
            ->leftjoin('submissions', 'header_bounties.bounty_id', '=', 'submissions.bounty_id')
            ->select('header_bounties.bounty_id', 'header_bounties.title', 'deadline', DB::raw('count(submissions.bounty_id) as sub_count'), 'submission_id', 'category_id', 'header_bounties.hash')
            ->where('client_id', '=', $user->client_id)
	        ->groupBy('header_bounties.bounty_id', 'header_bounties.title', 'deadline', 'category_id', 'header_bounties.hash')
            ->get();
        // dd($programs);
        return view('clients.manage', ['user' => $user, 'programs' => $programs]);
    }

    public function editProgramPage(Request $request){
        $user = Auth::guard('client')->user();
        $program = HeaderBounty::where('bounty_id', $request->input('bounty_id'))->get()->first();
        $categories = BountyCategory::all();
        $request->session()->put('new_bounty_id', $program->bounty_id);
        return view('bounty.editProgram', ['user' => $user, 'program' => $program, 'categories' => $categories]);
    }

    public function editBountyProgram(Request $request){
        // $validator = Validator::make($request->all(), [
        //     // 'category_id' => 'required|integer',
        //     'title' => 'required|string',
        //     'scope_description' => 'required|string',

        // ]);
        // if ($validator->fails()) {
        //     return redirect()->route('client.edit.program')->withErrors($validator);
        // }
        $headerbounty = HeaderBounty::find($request->session()->get('new_bounty_id'));

        $client = Auth::guard('client')->user();

        $headerbounty->client_id = $client->client_id;
        $headerbounty->category_id = $request->category_id;
        $headerbounty->title = $request->title;
        $headerbounty->scope_description = $request->scope_description;
        $headerbounty->hash = md5($client->client_id . "/" . $request->category_id);

        $headerbounty->save();
        $bountytarget = BountyTarget::select('target_id')->where('bounty_id',$request->session()->get('new_bounty_id'))->get()->pluck('target_id')->toArray();
        $target = BountyTarget::whereIn('target_id',$bountytarget)->delete();
        foreach (explode(', ', $request->test_targets) as $target) {
            $bountytarget = new BountyTarget;
            $bountytarget->bounty_id = $headerbounty->bounty_id;
            $bountytarget->target_string = $target;
            $bountytarget->save();
        }

        return redirect()->route('client.create.reward');
    }
}
