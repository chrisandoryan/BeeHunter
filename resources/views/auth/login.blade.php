    <div class="box box-primary login-box">
            <div class="login-box-header box-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
            </div>
            <div class="login-box-body box-body">
            <table>
                <form method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                    <tr>
                        <div class="logo-auth">
                            <img src="{{asset("images/general/beehunter-2.svg")}}" alt="">
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