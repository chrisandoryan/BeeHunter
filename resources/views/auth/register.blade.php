<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('panel/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ URL::asset('panel/bower_components/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('panel/bower_components/Ionicons/css/ionicons.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ URL::asset('panel/dist/css/AdminLTE.min.css') }}">
    <!-- Input Mask -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/css/inputmask.min.css">
    <!-- Content Delivery Network -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/jquery.inputmask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.date.extensions.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/inputmask/inputmask.extensions.min.js"></script>
    <title>Secure Everything Made of Binaries, Collectively :)</title>
</head>
<body class="hold-transition register-page">
    <div class="box box-primary register-box">
        <div class="register-box-body box-body">
            <table>
                <form method="POST">
                {{ csrf_field() }}
                <tr>
                    <div class="logo-auth">
                        <b>BEE</b>HUNTER
                    </div>
                </tr>
                <tr>
                    <td></td>
                    <div class="full-name-l">
                         <div class="form-group has-feedback">
                            <input type="text" name="first-name" class ="form-control name-input" placeholder="First Name">
                        </div>
                        <div class="form-group has-feedback">
                            <input type="text" name="last-name" class ="form-control name-input" placeholder="Last Name">
                        </div>
                    </div>
                </tr>
                <tr>
                    <td></td>
                    <div class="form-group has-feedback">
                        <input type="text" name="username" class ="form-control" placeholder="Username">
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                </tr>
                <tr>
                    <td></td>
                    <div class="form-group has-feedback">
                        <input type="text" name="email" class ="form-control" placeholder="Email"></td>
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
                        <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password">
                        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                    </div>
                </tr>
                <tr>
                    <td></td>
                    <div class="form-group has-feedback h-10">
                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" name="date" class="form-control datemask" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask="">
                        </div>
                    </div>
                </tr>
                <tr>
                    <td></td>
                    <div class="form-group has-feedback">
                        <input type="checkbox" id="terms" name="terms" value="tc-agree">
                        <label for="agree">I agree and have read the <a href="#">terms of use</a></label>
                    </div>
                </tr>
                <tr>
                    <td></td>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block btn-flat" value="Register">
                    </div>
                </tr>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h4><i class="icon fa fa-ban"></i>{{ $error }}</h4>
                                {{--{{ $error }}--}}
                            </div>
                        @endforeach
                    @endif
            </form>
        </table>
    </div>
</div>
</body>
<script>
    $(document).ready(function() {
        $('.datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
    })
</script>
</html>
