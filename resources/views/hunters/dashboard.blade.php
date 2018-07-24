@extends('layouts.hunter.panel')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            {{--<small>Optional description</small>--}}
        </h1>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
        <div class="col-md-5">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username">{{ $user->username }}</h3>
                    <h5 class="widget-user-desc">Hack Newborn</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="{{ asset($user->profile_image) }}" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ $user->getRankPosition() }}</h5>
                                <span class="description-text">Rank</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ $user->points }}</h5>
                                <span class="description-text">Points</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">Rp. {{ $user->balance }}</h5>
                                <span class="description-text">Balance</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.widget-user -->
        </div>
        <div class="col-md-7">
        <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Recent Hacks</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Hash</th>
                    <th>Title</th>
                    <th>Program</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($records as $record)
                    <tr>
                        <td><a href="{{ url("/hunter/submission/{$record->hash}") }}">{{ $record->hash }}</a></td>
                        <td>{{ $record->title }}</td>
                        <td>{{ $record->headerbounties->title }}</td>
                        <td><span class="label label-success">Pending for Review</span></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="{{ route('hunter.activity') }}" class="btn btn-sm btn-default btn-flat pull-right">View All</a>
            </div>
            <!-- /.box-footer -->
          </div>
        </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            <div class="small-box bg-aqua-active">
                <div class="inner">
                    <h3>1</h3>
                    <p>BugHunted</p>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="small-box bg-aqua-active">
                <div class="inner">
                    <h3>13</h3>
                    <p>Report Submission This Month</p>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="small-box bg-aqua-active">
                <div class="inner">
                    <h3>0.0</h3>
                    <p>Performance</p>
                </div>
            </div>
            </div>
        </div>
    </section>
@endsection