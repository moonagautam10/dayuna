<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dayuna :: Login Dashboard::</title>
  
    <!-- Bootstrap 4.1.3-->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_components/bootstrap/css/bootstrap.css') }}">
    
    <!-- Bootstrap-extend-->
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-extend.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_components/font-awesome/css/font-awesome.min.css') }}">

    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor_components/Ionicons/css/ionicons.min.css') }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/master_style.css') }}">

    <!-- Minimal-art Admin Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('admin/css/skins/_all-skins.css') }}"> 

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Dayuna </b>Admin</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>
    <p>
         @if(session()->has('status'))
                    <div class="alert alert-success">
                        {{session('status')}}
                    </div>
                    @endif
    </p>

    <form action="{{ route('admin.auth') }}" method="post" class="form-element">
        @csrf()
      <div class="form-group has-feedback">
         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address" autofocus>
        <span class="ion ion-email form-control-feedback"></span>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        <span class="ion ion-locked form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-6">
          <div class="checkbox">
             <input type="checkbox" name="remember" id="basic_checkbox_1" {{ old('remember') ? 'checked' : '' }}>
            <label for="basic_checkbox_1">Remember Me</label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-orange btn-block btn-flat margin-top-10">SIGN IN</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


    <!-- jQuery 3 -->
    <script src="{{ asset('admin/assets/vendor_components/jquery-3.3.1/jquery-3.3.1.js') }}"></script>
    
    <!-- popper -->
    <script src="{{ asset('admin/assets/vendor_components/popper/dist/popper.min.js') }}"></script>
    
    <!-- Bootstrap 4.1.3-->
    <script src="{{ asset('admin/assets/vendor_components/bootstrap/js/bootstrap.min.js') }}"></script>

</body>
</html>
