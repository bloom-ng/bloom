<x-dashboard-header>
<link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
</x-dashboard-header>

<div class="my-5 d-flex align-item-center justify-content-center">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary" >
    <div class="card-header text-center">
      <a href="/" class="h1"><img src="/images/oo.png" alt="logo" height="30px" width="40px"></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Enter credentials to login.</p>
       @if ($errors->has('credentials'))
           <p class="text-danger">{{$errors->first('credentials')  }} </p>
       @endif
      

      <form action="/dashboard/login" method="post">
      @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email"> 
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <br>
         
        </div>
        @if ($errors->has('email'))
           <p class="text-danger">{{$errors->first('email')  }} </p>
        @endif
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <br>
         
        </div>

        @if ($errors->has('password'))
           <p class="text-danger">{{$errors->first('password')  }} </p>
        @endif
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <br>
          
          <!-- /.col -->
        </div>

        <div class="my-5">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
      </form>

    

    
      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>




<x-dashboard-footer></x-dashboard-footer>