 <nav class="navbar navbar-static-top fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="{{ route('explore_everything') }}" class="navbar-brand"><b>Bee</b>Hunter</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
              <li><a href="{{ route('explore_everything') }}"><span>Bounty Programs</span></a></li>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div>
          </form>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <li>
                <a class="btn"  data-toggle="modal" data-target="#modal-login">
                    <i class="glyphicon glyphicon-user"></i> <span>Sign in</span>
                </a>
            </li>
            <li>
                <a class="btn" data-toggle="modal" data-target="#modal-register">
                    <i class="glyphicon glyphicon-registration-mark"></i> <span>Register</span>
                </a>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
     <div class="modal modal-info fade" id="modal-login" style="display: none;">
         <div class="modal-dialog">
             <div class="modal-content">
                 @include('auth.login')
             </div>
             <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
     </div>
     <div class="modal modal-info fade" id="modal-register" style="display: none;">
         <div class="modal-dialog">
             <div class="modal-content">
                 @include('auth.register')
             </div>
             <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
     </div>
     <script>
        $(document).ready(function() {
            $('.datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
        })
     </script>
 </nav>
