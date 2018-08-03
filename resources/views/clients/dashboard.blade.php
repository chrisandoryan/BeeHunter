@extends('layouts.client.panel')

@section('content')
@includeWhen(Session::has('success'), 'layouts.success', Session::get('success'))
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
                    <h3 class="widget-user-username">{{ $user->name }}</h3>
                    <!-- <h5 class="widget-user-desc">Hack Newborn</h5> -->
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="{{ asset($user->image_profile) }}" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                            <h5 class="description-header">{{$bc}}</h5>
                                <span class="description-text">Programs</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">0.0</h5>
                                <span class="description-text">Rate</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">0</h5>
                                <span class="description-text">BugSolved</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Bug Bounty Programs</h3>
        
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="table-responsive">
                        <table class="table no-margin">
                          <thead>
                          <tr>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Deadline</th>
                          </tr>
                          </thead>
                          <tbody>
                            @foreach($bounties as $bounty)
                            <tr>
                                <td><a href="{{ url("/explore/programs/{$bounty->category_id}/{$bounty->bounty_id}") }}">{{ $bounty->title }}</a></td>
                                <td><span class="label label-{{ \Illuminate\Support\Facades\Config::get('constants.status.bounty-label')[$bounty->is_running] }}">{{ \Illuminate\Support\Facades\Config::get('constants.status.bounty-status')[$bounty->is_running] }}</span></td>
                                <td>{{$bounty->deadline}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    {{-- <div class="box-footer clearfix">
                      <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                      <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                    </div> --}}
                    <!-- /.box-footer -->
                  </div>
            <!-- /.widget-user -->
        </div>
        
        </div>
    </section>
@endsection