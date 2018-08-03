@extends('layouts.client.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Activity
            {{--<small>Optional description</small>--}}
        </h1>
    </section>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
            <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Time Submission</h3>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Hash</th>
                  <th>Program</th>
                  <th>Submission Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                @foreach($reports as $report)
                <tr>
                  <td><a href="{{ url("client/reports/".$report->submission_id)}}">{{ md5($report->submission_id) }}</a></td>
                  <td><a href="{{ url("/explore/programs/{$report->headerbounties->category_id}/{$report->headerbounties->bounty_id}") }}">{{ $report->headerbounties->title }}</a></td>
                  <td>{{ $report->submitted_datetime }}</a></td>
                  <td><span class="label label-{{ \Illuminate\Support\Facades\Config::get('constants.status.label')[$report->is_approved_as_bug] }}">{{ \Illuminate\Support\Facades\Config::get('constants.status.submission')[$report->is_approved_as_bug] }}</span></td>
                  <td><a href="{{ $report->stored_report_path }}" class="btn btn-sm btn-default btn-flat pull-right">Download</a></td>
                </tr>
                @endforeach
              </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">Refresh</a>
            </div>
          </div>
        </div>
        </div>
    </section>
@endsection