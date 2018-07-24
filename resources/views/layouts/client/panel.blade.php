<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BeeHunter 2.4</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ URL::asset('panel/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('panel/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('panel/bower_components/Ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('panel/dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('panel/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('panel/css/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('panel/css/pages/dashboard.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('panel/css/submission.css') }}">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="{{ URL::asset('panel/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('panel/bower_components/fastclick/lib/fastclick.js') }}"></script>
    <script src="{{ URL::asset('panel/dist/js/adminlte.min.js') }}"></script>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">
  <header class="main-header">
      @include('layouts.client.nav')
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset(\Illuminate\Support\Facades\Auth::guard('client')->user()->image_profile) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ \Illuminate\Support\Facades\Auth::guard('client')->user()->name }}</p>
          <!-- Status -->
          <a href="#">Stakeholder</a>
        </div>
      </div>

      {{--<!-- search form (Optional) -->--}}
      {{--<form action="#" method="get" class="sidebar-form">--}}
        {{--<div class="input-group">--}}
          {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
          {{--<span class="input-group-btn">--}}
              {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
              {{--</button>--}}
            {{--</span>--}}
        {{--</div>--}}
      {{--</form>--}}
      {{--<!-- /.search form -->--}}

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
          <li class="header">HackGrid</li>
              <!-- Optionally, you can add icons to the links -->
              <li class="{{ Route::currentRouteNamed('client.dashboard') ? 'active' : '' }}"><a href="{{ route('client.dashboard') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
              <li class="treeview">
              <a><i class="fa fa-bug"></i><span>Programs</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li class="{{ Route::currentRouteNamed('client.create.program') ? 'active' : '' }}"><a href="{{ route('client.create.program') }}"><span>Create Program</span></a></li>
              <li class="{{ Route::currentRouteNamed('client.create.program') ? 'active' : '' }}"><a href="{{ route('client.create.program') }}"><span>Manage Programs</span></a></li>
            </ul>
          </li>
            <li class="{{ Route::currentRouteNamed('client.reports') ? 'active' : '' }}"><a href="{{ route('client.reports') }}"><i class="fa fa-cogs"></i><span>Reports</span></a></li>
            {{--<li class="{{ Route::currentRouteNamed('settings') ? 'active' : '' }}"><a href="{{ route('settings') }}"><i class="fa fa-cogs"></i><span>Settings</span></a></li>--}}
        <li class="header">Explore</li>
        <li class="treeview">
            <a><i class="fa fa-bug"></i> <span>Bounty Programs</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{ route('explore_everything') }}">Explore Everything</a></li>
              <li><a href="{{ route('explore_server') }}"><i class="fa fa-server"></i>Server Integrity</a></li>
              <li><a href="{{ route('explore_web') }}"><i class="fa fa-globe"></i>Web Application</a></li>
              <li><a href="{{ route('explore_android') }}"><i class="fa fa-android"></i>Android Application</a></li>
              <li><a href="{{ route('explore_ios') }}"><i class="fa fa-apple"></i>iOS Application</a></li>
              <li><a href="{{ route('explore_network') }}"><i class="fa fa-sitemap"></i>Network Security</a></li>
              <li><a href="#">Disclosure Terms</a></li>
              <li><a href="#">Submission Guidelines</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <!-- Full Width Column -->
  <div class="content-wrapper">
        @yield('content')
    <!-- /.container -->
  </div>
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Bina Nusantara University
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="{{ route('client.dashboard') }}">BeeHunter Project</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
{{--<script>--}}
    {{--$('li > a').click(function() {--}}
        {{--$('li').removeClass('active');--}}
        {{--$(this).parent().addClass('active');--}}
    {{--});--}}
{{--</script>--}}
</body>
</html>