<?php

namespace App\Http\Controllers;

use App\BountyCategory;
use App\Client;
use App\HeaderBounty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class BountyController extends Controller
{
    private $category_grouping, $table;

    function __construct(array $attributes = array()) {
        $this->table = Config::get('constants.tables.bounty.header.name');
        $this->category_grouping = DB::table($this->table)->select('header_bounties.category_id', 'bounty_categories.name', DB::raw('count(*) as total'))->join('bounty_categories', 'bounty_categories.category_id', '=', 'header_bounties.category_id')->groupBy('category_id')->get();
    }

    public function fetchAllBounties() {
        $bounties = HeaderBounty::where('is_running', '=', '1')->get();
//        dd($grouping);
//        dd($bounties[0]->clients());
//        return view('bounty.list')->with('bounties', $bounties);
        return view('bounty.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
    }

    public function fetchServerBounties() {
        $bounties = HeaderBounty::where('category_id', '=', 'SI')->where('is_running', '=', 1)->get();
        return view('bounty.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
    }

    public function fetchWebBounties() {
        $bounties = HeaderBounty::where('category_id', '=', 'WS')->where('is_running', '=', 1)->get();
        return view('bounty.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
    }

    public function fetchAndroidBounties() {
        $bounties = HeaderBounty::where('category_id', '=', 'AS')->where('is_running', '=', 1)->get();
        return view('bounty.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
    }

    public function fetchiOSBounties() {
        $bounties = HeaderBounty::where('category_id', '=', 'iOS')->where('is_running', '=', 1)->get();
        return view('bounty.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
    }

    public function fetchNetworkBounties() {
        $bounties = HeaderBounty::where('category_id', '=', 'NS')->where('is_running', '=', 1)->get();
        return view('bounty.explore', ['bounties' => $bounties, 'grouping' => $this->category_grouping]);
    }

    public function handleSubmission(Request $request, $cat_id, $pid) {
        $categorize = Config::get('constants.category');

        $title = $request->input('report-title');
        $category = $cat_id;
        $report = $request->file('file-submission');
        $extension = $report->getClientOriginalExtension();

        $submission_date_time = Carbon::now()->toFormattedDateString();

        $hunter = Auth::user();
        $client = Client::find($pid);

        //format: $catInit[] _[date]_[username]_[title]_[company].[extension]
        $directory = 'reports/';
        $filename = sprintf("%s_%s_%s_%s_%s.%s", $categorize[$category], $submission_date_time, $hunter, $title, $client, $extension);
        $report->move($directory, $filename);
    }

    public function fetchBountyDetail($cat_id, $b_id) {
        $program = HeaderBounty::where('category_id', '=', $cat_id)->find($b_id);

        return view('bounty.detail', ['program' => $program]);
    }

}
