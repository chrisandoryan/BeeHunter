     <div class="box box-primary register-box">
        <div class="login-box-header box-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
        </div>
        <div class="register-box-body box-body">
            <table>
                <form method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <tr>
                    <div class="logo-auth">
                        <img src="{{asset("images/general/beehunter-2.svg")}}" alt="">
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