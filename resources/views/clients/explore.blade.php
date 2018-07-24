@extends('layouts.client.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Bounty Programs
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('client.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
            <li><a href="{{ route('explore_everything') }}">Bounty Programs</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-sm-9">
                <ul class="list-group list-group-flush">
                    @foreach($bounties as $bounty_detail)
                        <li class="list-group-item">
                            <div class="row" style="padding-left:20px;">
                                <div class="col-sm-3" >
                                    <div class="row">
                                        <img src="{{ URL::asset($bounty_detail->clients->image_profile) }}" style="width:100px;height:100px;"/>
                                    </div>
                                    <div class="row" >
                                        <strong>{{ $bounty_detail->clients->name }}</strong>
                                    </div>
                                </div>
                                <div class="col-sm-5" >
                                    <div class="row">
                                        <a href="{{ url("/explore/programs/{$bounty_detail->category_id}/{$bounty_detail->bounty_id}") }}"><h3>{{ $bounty_detail->title }}</h3></a>
                                    </div>
                                    {{--<div class="row">--}}
                                        {{--<span class="label label-primary">{{ $bounty_detail->bountyCategories->name }}</span>--}}
									    {{--<span class="label label-success">{{ $bounty_detail->is_running == \Illuminate\Support\Facades\Config::get('constants.status.program.open') ? 'Open' : 'Closed' }}</span>--}}
                                    {{--</div>--}}
                                    <div class="row">
                                        <span class="label label-primary">{{ $bounty_detail->bountyCategories->name }}</span>
                                        <span class="label label-success">{{ $bounty_detail->is_running == \Illuminate\Support\Facades\Config::get('constants.status.program.open') ? 'Open' : 'Closed' }}</span>
                                        <div class="rewards-information">
                                            @if($bounty_detail->rewardTypes->reward_id == \Illuminate\Support\Facades\Config::get('constants.rewards.payment'))
                                                <span class="label label-info">up to {{ number_format($bounty_detail->maximum_reward, 0, '', ',') }} IDR</span>
                                            @else
                                                <span class="label label-info">{{ $bounty_detail->reward_string }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row" style="padding-top:20px;">
                                        <button type="button" class="btn btn-default"><a href="{{ url("/explore/programs/{$bounty_detail->hash}") }}">See Detail</a></button>&#09;
                                    </div>
                                    {{--<div class="row" style="padding-top:10px;">--}}
                                        {{--Attempt: <small class="label bg-blue">50</small>--}}
                                        {{--Accept: <small class="label bg-green">10</small>--}}
                                        {{--Reject: <small class="label bg-red">40</small>--}}
                                    {{--</div>--}}
                                    {{--<div class="row">--}}
									  {{--<span class="label label-success">--}}
										  {{--{{ $bounty_detail->program_status == \Illuminate\Support\Facades\Config::get('constants.status.program.open') ? 'Open' : 'Closed' }}--}}
									  {{--</span>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-sm-3">
                <ul class="list-group list-group-flush">
                    @foreach($grouping as $group)
                        <li class="list-group-item"><a href='{{ route(\Illuminate\Support\Facades\Config::get('constants.category.' . $group->category_id . '.route_name')) }}'>{{ $group->name }}</a>
                            <span class="pull-right-container">
					              <small class="label pull-right bg-red">{{ $group->total }}</small>
            				</span>
                        </li>
                    @endforeach
                    {{--<li class="list-group-item"><a href='#'>Server Security</a>--}}
                    {{--<span class="pull-right-container">--}}
                    {{--<small class="label pull-right bg-red">16</small>--}}
                    {{--</span>--}}
                    {{--</li>--}}
                    {{--<li class="list-group-item"><a href='#'>Web Application Security</a>--}}

                    {{--<span class="pull-right-container">--}}
                    {{--<small class="label pull-right bg-green">3</small>--}}
                    {{--</span>--}}

                    {{--</li>--}}
                    {{--<li class="list-group-item"><a href='#'>Android Application Security</a>--}}

                    {{--<span class="pull-right-container">--}}
                    {{--<small class="label pull-right bg-blue">10</small>--}}
                    {{--</span>--}}

                    {{--</li>--}}
                    {{--<li class="list-group-item"><a href='#'>iOS Application Security</a>--}}

                    {{--<span class="pull-right-container">--}}
                    {{--<small class="label pull-right bg-yellow">9</small>--}}
                    {{--</span>--}}

                    {{--</li>--}}
                    {{--<li class="list-group-item"><a href='#'>Network Security</a>--}}

                    {{--<span class="pull-right-container">--}}
                    {{--<small class="label pull-right bg-black">8</small>--}}
                    {{--</span>--}}

                    {{--</li>--}}
                </ul>
            </div>
        </div>
    </section>
@endsection