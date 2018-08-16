@extends('layouts.hunter.panel')

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
              <img class="profile-user-img img-responsive img-circle" src="{{ asset($user->profile_image) }}" alt="User profile picture">

              <h3 class="profile-username text-center"> {{ $user->first_name }} {{ $user->last_name }}</h3>

              <p class="text-muted text-center">Hack Newborn</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Performance</b> <a class="pull-right">{{ $user->performance_rate }}</a>
                </li>
                <li class="list-group-item">
                  <b>HackScore</b> <a class="pull-right">{{ $user->score }}</a>
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
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Greet</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
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