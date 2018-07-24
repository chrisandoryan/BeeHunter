@extends('layouts.hunter.panel')

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
                  <th>Title</th>
                  <th>Program</th>
                  <th>Submission Date</th>
                  <th>Status</th>
                  <th>Note</th>
                </tr>
                @foreach($records as $record)
                <tr>
                  <td><a href="{{ url("/hunter/submission/{$record->hash}") }}">{{ $record->hash }}</a></td>
                  <td>{{ $record->title }}</td>
                  <td><a href="{{ url("/explore/programs/{$record->headerbounties->hash}") }}">{{ $record->headerbounties->title }}</a></td>
                  <td>{{ $record->submitted_datetime }}</a></td>
                  <td><span class="label label-{{ \Illuminate\Support\Facades\Config::get('constants.status.label')[$record->is_approved_as_bug] }}">{{ \Illuminate\Support\Facades\Config::get('constants.status.submission')[$record->is_approved_as_bug] }}</span></td>
                  <td>You have submitted a report</td>
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