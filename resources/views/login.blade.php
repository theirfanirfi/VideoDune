@extends('Frontend._PublicLayout')
 @section('content')

                 <!--Start of Latest Area-->
                 <div class="latest-area text-left ptb-90">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">

 <!-- /.login-logo -->
  <div class="login-box-body">

@include('Frontend.includes.alert')
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="{{ route('signin') }}" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      @csrf
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</div>s
                    </div>
                </div>
            </div>
@endsection
