@extends('layouts.client.panel')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Self Information
            {{--<small>Optional description</small>--}}
        </h1>
    </section>
    <!-- Main content -->
    <section class="content container-fluid">
        <div class="row">
        <div class="col-md-3">
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ asset($user->image_profile) }}" alt="User profile picture">
              <h3 class="profile-username text-center"> {{ $user->name }}</h3>
              <p class="text-muted text-center">Company</p>
              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                    <b>Bounties</b> <a class="pull-right">{{ $bounty_count }}</a>
                </li>
                <li class="list-group-item">
                    <b>Bounties Solved</b> <a class="pull-right">{{ $bounties_solved }}</a>
                </li>
                <li class="list-group-item">
                    <b>Performance</b> <a class="pull-right">{{ $user->credibility_rate }}</a>
                </li>
                <li class="list-group-item">
                    <b>Member Since</b> <a class="pull-right">{{ $user->join_at }}</a>
                </li>
              </ul>
            <!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-6">
            <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Company Description</strong>
              <p class="text-muted">
                {{$user->company_description}}
              </p>
              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                <p class="text-muted">{{$user->address}}</p>
              <hr>
              <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                <p class="text-muted">{{$user->email}}</p>
              <hr>
              <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>
                <p class="text-muted">{{$user->phone}}</p>
              <hr>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
          </div>
        </div>
        </div>
    </section>
@endsection 