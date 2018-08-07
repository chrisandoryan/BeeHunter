@extends('layouts.public.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            {{ $program->title }}
            <small>up since {{ date('F jS, Y', strtotime($program->up_since)) }}</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-9">
                <!-- Custom Tabs -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#policy_tab" data-toggle="tab">Policy</a></li>
                        <li><a href="#company_tab" data-toggle="tab">Company Overview</a></li>
                        {{--<li class="dropdown">--}}
                            {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                                {{--Dropdown <span class="caret"></span>--}}
                            {{--</a>--}}
                            {{--<ul class="dropdown-menu">--}}
                                {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>--}}
                                {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>--}}
                                {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>--}}
                                {{--<li role="presentation" class="divider"></li>--}}
                                {{--<li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>--}}
                            {{--</ul>--}}
                        {{--</li>--}}
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="policy_tab">
                            <h3>Policy</h3>
                            <p>
                                {{--Exactly like the original bootstrap tabs except you should use--}}
                                {{--the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.--}}
                                {{--A wonderful serenity has taken possession of my entire soul,--}}
                                {{--like these sweet mornings of spring which I enjoy with my whole heart.--}}
                                {{--I am alone, and feel the charm of existence in this spot,--}}
                                {{--which was created for the bliss of souls like mine. I am so happy,--}}
                                {{--my dear friend, so absorbed in the exquisite sense of mere tranquil existence,--}}
                                {{--that I neglect my talents. I should be incapable of drawing a single stroke--}}
                                {{--at the present moment; and yet I feel that I never was a greater artist than now.--}}
                                {{ $program->disclosure_description }}
                            </p>
                            <h3>Rewards</h3>
                            <p>
                                {{--Exactly like the original bootstrap tabs except you should use--}}
                                {{--the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.--}}
                                {{--A wonderful serenity has taken possession of my entire soul,--}}
                                {{--like these sweet mornings of spring which I enjoy with my whole heart.--}}
                                {{--I am alone, and feel the charm of existence in this spot,--}}
                                {{--which was created for the bliss of souls like mine. I am so happy,--}}
                                {{--my dear friend, so absorbed in the exquisite sense of mere tranquil existence,--}}
                                {{--that I neglect my talents. I should be incapable of drawing a single stroke--}}
                                {{--at the present moment; and yet I feel that I never was a greater artist than now.--}}
                                <b>{{ $reward->reward_string }}</b>
                                @if($reward->reward_id == 1)
                                    <h5>Minimum Reward :</h5>
                                    {{ $program->minimum_reward }}
                                    <br>
                                    <h5>Maximum Reward :</h5>
                                    {{ $program->maximum_reward }}
                                @endif
                                <br>
                                {{ $program->rewards_description }}
                            </p>
                            <h3>Scope</h3>
                            <p>
                                {{--Exactly like the original bootstrap tabs except you should use--}}
                                {{--the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.--}}
                                {{--A wonderful serenity has taken possession of my entire soul,--}}
                                {{--like these sweet mornings of spring which I enjoy with my whole heart.--}}
                                {{--I am alone, and feel the charm of existence in this spot,--}}
                                {{--which was created for the bliss of souls like mine. I am so happy,--}}
                                {{--my dear friend, so absorbed in the exquisite sense of mere tranquil existence,--}}
                                {{--that I neglect my talents. I should be incapable of drawing a single stroke--}}
                                {{--at the present moment; and yet I feel that I never was a greater artist than now.--}}
                                {{ $program->scope_description }}
                            </p>
                            <h3>Test Target</h3>
                            <p>
                                {{--Exactly like the original bootstrap tabs except you should use
                                the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.
                                A wonderful serenity has taken possession of my entire soul,
                                like these sweet mornings of spring which I enjoy with my whole heart.
                                I am alone, and feel the charm of existence in this spot,
                                which was created for the bliss of souls like mine. I am so happy,
                                my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                                that I neglect my talents. I should be incapable of drawing a single stroke
                                at the present moment; and yet I feel that I never was a greater artist than now.--}}
                                @foreach($bountytarget as $bt)
                                {{ $bt->target_string }}
                                @endforeach
                            </p>
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="company_tab">
                            {{--The European languages are members of the same family. Their separate existence is a myth.--}}
                            {{--For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ--}}
                            {{--in their grammar, their pronunciation and their most common words. Everyone realizes why a--}}
                            {{--new common language would be desirable: one could refuse to pay expensive translators. To--}}
                            {{--achieve this, it would be necessary to have uniform grammar, pronunciation and more common--}}
                            {{--words. If several languages coalesce, the grammar of the resulting language is more simple--}}
                            {{--and regular than that of the individual languages.--}}
                            <h3>Overview</h3>
                            <p>{{ $program->clients->company_description }}</p>
                            <h3>Address</h3>
                            <p>{{ $program->clients->address }}</p>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- nav-tabs-custom -->
            </div>
        </div>
    </section>
@endsection