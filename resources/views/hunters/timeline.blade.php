@extends('layouts.hunter.panel')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Report Progress
        <small>Report Title on Program Name</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('hunter.dashboard') }}"><i class="fa fa-dashboard"></i>Dashboard</a></li>
        <li><a href="{{ route('explore_everything') }}">Bounty Programs</a></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
        <ul class="timeline">

        <!-- timeline time label -->
        <li class="time-label">
            <span class="bg-red">
                10 Feb. 2014
            </span>
        </li>
        <!-- /.timeline-label -->

        <!-- timeline item -->
        <li>
            <!-- timeline icon -->
            <i class="fa fa-envelope bg-blue"></i>
            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>
                <h3 class="timeline-header"><a href="#">You submitted a report</a></h3>
            </div>
        </li>
        <!-- END timeline item -->
        <!-- timeline item -->
        <li>
            <!-- timeline icon -->
            <i class="fa fa-envelope bg-blue"></i>
            <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>

                <div class="timeline-body">
                    ...
                    Content goes here
                </div>

                <div class="timeline-footer">
                    <a class="btn btn-primary btn-xs">...</a>
                </div>
            </div>
        </li>
        <!-- END timeline item -->
        </ul>
        </div>
    </div>
</section>
@endsection