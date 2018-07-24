<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BeeHunter 2.4</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ URL::asset('panel/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('panel/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('panel/bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('panel/dist/css/AdminLTE.min.css')}}">
  <link rel="stylesheet" href="{{ URL::asset('panel/dist/css/skins/_all-skins.min.css')}}">
  <link href="{{ URL::asset('panel/css/font-awesome.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('panel/css/style.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('panel/css/pages/dashboard.css') }}" rel="stylesheet">
  <link href="{{ URL::asset('panel/css/submission.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ URL::asset('plugins/iCheck/square/blue.css')}}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/css/inputmask.min.css">
  <!-- jQuery 3 -->
  <script src="{{ URL::asset('panel/bower_components/jquery/dist/jquery.min.js')}}"></script>
  <!-- Content Delivery Network -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.extensions.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.date.extensions.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/jquery.inputmask.min.js"></script>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

  <header class="main-header" style="padding:0px;">
   @include('layouts.public.nav')
  </header>
  <!-- Full Width Column -->
  <div class="content-wrapper">
        @yield('content')
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="container">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.4.0
      </div>
      <strong>Copyright &copy; 2018-2019 <a href="https://adminlte.io">BeeHunter</a>.</strong> All rights
      reserved.
    </div>
    <!-- /.container -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::asset('panel/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('panel/bower_components/fastclick/lib/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('panel/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{--<script src="{{ URL::asset('panel/dist/js/demo.js')}}"></script>--}}
</body>
</html>

