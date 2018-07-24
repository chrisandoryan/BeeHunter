<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('panel/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('panel/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ URL::asset('panel/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('panel/dist/css/AdminLTE.min.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('plugins/iCheck/square/blue.css')}}">
    <title>Secure Everything Made of Binaries, Collectively :)</title>
</head>
<body class="hold-transition login-page">
<div method="post">
    <div class="box box-primary login-box">
            <div class="login-box-body box-body">
            <table>
                <form method="POST" action="{{ route('client.login.submit') }}">
                {{ csrf_field() }}
                    <tr>
                    <div class="logo-auth">
                            <img src="{{asset("images/general/beeclient.svg")}}" alt="">
                        </div>
                    </tr>
                    <tr>
                        <td></td>
                    <div class="form-group has-feedback">
                        <input type="text" name="email" class="form-control" placeholder="Email">
                       <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    </tr>
                    <tr>
                        <td></td>
                        <div class="form-group has-feedback">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                    </tr>
                    <tr>
                        <td></td>
                        <div class="form-group has-feedback">
                            <input type="checkbox" id="rememberMe">
                            <label for="rememberMe">
                                Remember Me
                            </label>
                        </div>
                    </tr>
                    <tr>
                        <td></td>
                        <div>
                            <input type="submit" class="btn btn-primary btn-block btn-flat" value="Login">
                        </div>
                    </tr>
                </form>
            </table>
        </div>
    </div>
</div>
</body>