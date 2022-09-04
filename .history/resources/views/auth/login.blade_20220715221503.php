<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<meta name="description" content="Responsive Admin Template" />
	<meta name="author" content="SmartUniversity" />
	<title>Spice Hotel | Đăng nhập</title>
	<!-- icons -->
	<link href="{{asset('assets/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{asset('assets/plugins/iconic/css/material-design-iconic-font.min.css')}}">
	<!-- bootstrap -->
	<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- style -->
	<link rel="stylesheet" href="{{asset('assets/css/pages/extra_pages.css')}}">
	<!-- favicon -->
	<link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" />
</head>

<body>
	<div class="limiter">
		<div class="container-login100 page-background">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<div class="login100-form-logo">
						<i class="fa fa-asterisk"></i>
						{{-- <img src="{{asset('assets/img/logo.png')}}" alt=""> --}}
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>
					{{-- <div class="text-center p-t-40">
						<a class="txt1" href="#">
							Forgot Password?
						</a>
					</div> --}}
				</form>
			</div>
		</div>
	</div>
	<!-- start js include path -->
	<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/pages/extra_pages/login.js')}}"></script>
	<!-- end js include path -->
</body>

</html>