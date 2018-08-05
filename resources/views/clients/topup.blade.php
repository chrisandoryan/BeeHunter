@extends('layouts.client.panel')

@section('content')
@includeWhen(Session::has('success'), 'layouts.success', Session::get('success'))
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Top Up Page
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
                
            </div>
            <div class="box box-info">
                    <div class="box-header with-border">
                      <h2 class="box-title">BeeBalance</h3>
                      <h3> Current : {{ $user->balance }}</h3>
        
                      <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                      </div>
                    </div>
                    <!-- /.box-header -->
                    <form action="{{ route('client.storetopup') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="input-group">
                                <input class="form-control" type="number" name="balance" placeholder="Rp. ">
                            </div>
                        <br>
                        <button type="submit" class="btn btn-primary">TopUp!</button>
                        <!-- /input-group -->
                        </div>
                    </form>
            <!-- /.widget-user -->
        </div>
        
        </div>
    </section>
@endsection