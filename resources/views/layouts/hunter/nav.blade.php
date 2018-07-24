{{--<!-- Logo -->--}}
{{--<a href="{{ route('dashboard') }}" class="logo-black">--}}
  {{--<!-- mini logo for sidebar mini 50x50 pixels -->--}}
  {{--<span class="logo-mini"><b>B</b>3H</span>--}}
  {{--<!-- logo for regular state and mobile devices -->--}}
  {{--<span class="logo-lg"><b>Bee</b>Hunter</span>--}}
{{--</a>--}}
<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  <!-- Navbar Right Menu -->
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Notifications Menu -->
      <li class="dropdown notifications-menu">
        <!-- Menu toggle button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-bell-o"></i>
          <span class="label label-warning">1</span>
        </a>
        <ul class="dropdown-menu">
          <li class="header">What we think you miss</li>
          <li>
            <!-- Inner Menu: contains the notifications -->
            <ul class="menu">
              <li><!-- start notification -->
                <a href="#">
                  <i class="fa fa-users text-aqua"></i> Google LLC has reviewed your report on June 27
                </a>
              </li>
              <!-- end notification -->
            </ul>
          </li>
          <!-- <li class="footer"><a href="#">View all</a></li> -->
        </ul>
      </li>
      <!-- User Account Menu -->
      <li class="dropdown user user-menu">
        <!-- Menu Toggle Button -->
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <!-- The user image in the navbar-->
          <img src="{{ asset(\Illuminate\Support\Facades\Auth::user()->profile_image) }}" class="user-image" alt="User Image">
          <!-- hidden-xs hides the username on small devices so only the image appears. -->
          <span class="hidden-xs">{{ \Illuminate\Support\Facades\Auth::user()->username }}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- The user image in the menu -->
          <li class="user-header">
            <img src="{{ asset(\Illuminate\Support\Facades\Auth::user()->profile_image) }}" class="img-circle" alt="User Image">
            <p>
              {{ \Illuminate\Support\Facades\Auth::user()->username }}
              <small>Member since Nov. 2012</small>
            </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            <div class="row">
              <div class="col-xs-4 text-center">
                <a href="#">Followers</a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#">Sales</a>
              </div>
              <div class="col-xs-4 text-center">
                <a href="#">Friends</a>
              </div>
              {{--<div class="col-xs-5">--}}
                {{--<div class="box box-default collapsed-box">--}}
                  {{--<div class="box-header with-border">--}}
                    {{--<p>Personal</p>--}}
                    {{--<div class="box-tools pull-right">--}}
                      {{--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>--}}
                      {{--</button>--}}
                    {{--</div>--}}
                    {{--<!-- /.box-tools -->--}}
                  {{--</div>--}}
                  {{--<!-- /.box-header -->--}}
                  {{--<div class="box-body" style="display: none;">--}}
                    {{--The body of the box--}}
                  {{--</div>--}}
                  {{--<!-- /.box-body -->--}}
                {{--</div>--}}
                {{--<!-- /.box -->--}}
              {{--</div>--}}
            </div>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            {{--<div class="pull-left">--}}
              {{--<a href="#" class="btn btn-sm btn-default btn-flat">Profile</a>--}}
            {{--</div>--}}
            <div class="pull-right">
              <form action="{{ route('logout') }}" method="POST">
                  {{ csrf_field() }}
                  <button class="btn btn-sm btn-default btn-flat">Sign out</button>
              </form>
            </div>
          </li>
        </ul>
      </li>
      <!-- Control Sidebar Toggle Button -->
      <li>
        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
      </li>
    </ul>
  </div>
</nav>
{{--<nav class="navbar navbar-static-top fixed-top">--}}
  {{--<div class="container">--}}
    {{--<div class="navbar-header">--}}
      {{--<a href="{{ route('dashboard') }}" class="navbar-brand"><b>Bee</b>Hunter</a>--}}
      {{--<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">--}}
        {{--<i class="fa fa-bars"></i>--}}
      {{--</button>--}}
    {{--</div>--}}

    {{--<!-- Collect the nav links, forms, and other content for toggling -->--}}
    {{--<div class="collapse navbar-collapse pull-left" id="navbar-collapse">--}}
      {{--<ul class="nav navbar-nav">--}}
        {{--<li>--}}
          {{--<a href="{{ route('explore') }}">--}}
            {{--<i class="glyphicon glyphicon-briefcase"></i> <span>Bounty Programs</span>--}}
          {{--</a>--}}
        {{--</li>--}}
      {{--</ul>--}}
      {{--<form class="navbar-form navbar-left" role="search">--}}
        {{--<div class="form-group">--}}
          {{--<input type="text" class="form-control" id="navbar-search-input" placeholder="Search">--}}
        {{--</div>--}}
      {{--</form>--}}
    {{--</div>--}}
    {{--<!-- /.navbar-collapse -->--}}
    {{--<!-- Navbar Right Menu -->--}}
    {{--<div class="navbar-custom-menu">--}}
      {{--<ul class="nav navbar-nav">--}}

        {{--<!-- User Account Menu -->--}}
        {{--<li class="dropdown user user-menu">--}}
          {{--<!-- Menu Toggle Button -->--}}
          {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
            {{--<!-- The user image in the navbar-->--}}
            {{--<img src="{{ asset(\Illuminate\Support\Facades\Auth::user()->profile_image) }}" class="user-image" alt="User Image">--}}
            {{--<!-- hidden-xs hides the username on small devices so only the image appears. -->--}}
            {{--<span class="hidden-xs">--}}
                          {{--{{ \Illuminate\Support\Facades\Auth::user()->username }}--}}
                      {{--</span>--}}
          {{--</a>--}}
          {{--<ul class="dropdown-menu">--}}
            {{--<!-- The user image in the menu -->--}}
            {{--<li class="user-header">--}}
              {{--<img src="{{ asset(\Illuminate\Support\Facades\Auth::user()->profile_image) }}" class="img-circle" alt="User Image">--}}
              {{--<p>--}}
                {{--{{ \Illuminate\Support\Facades\Auth::user()->username }} - Web Developer--}}
                {{--<small>Member since Nov. 2012</small>--}}
              {{--</p>--}}
            {{--</li>--}}
            {{--<!-- Menu Body -->--}}
            {{--<li>--}}
              {{--<a href="{{ route('dashboard') }}">--}}
                {{--<i class="fa fa-dashboard"></i> <span>Dashboard</span>--}}
              {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
              {{--<a href="#">--}}
                {{--<i class="glyphicon glyphicon-usd"></i>--}}
                {{--<span>Finance</span>--}}
              {{--</a>--}}
            {{--</li>--}}
            {{--<li>--}}
              {{--<a href="{{ route('mailbox') }}">--}}
                {{--<i class="fa fa-envelope"></i> <span>Mailbox</span>--}}
                {{--<span class="pull-right-container">--}}
                                  {{--<small class="label pull-right bg-green">16</small>--}}
                              {{--</span>--}}
              {{--</a>--}}
            {{--</li>--}}
            {{--<!-- Menu Footer-->--}}
            {{--<li class="user-footer">--}}
              {{--<div class="pull-left">--}}
                {{--<a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>--}}
              {{--</div>--}}
              {{--<div class="pull-right">--}}
                {{--<a href="#" class="btn btn-default btn-flat">Sign out</a>--}}
              {{--</div>--}}
            {{--</li>--}}
          {{--</ul>--}}
        {{--</li>--}}
      {{--</ul>--}}
    {{--</div>--}}
    {{--<!-- /.navbar-custom-menu -->--}}
  {{--</div>--}}
  {{--<!-- /.container-fluid -->--}}
{{--</nav>--}}