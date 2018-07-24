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
                            <h5 class="description-header">0</h5>
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
            <!-- /.widget-user -->
        </div>
        </div>
    </section>
@endsection