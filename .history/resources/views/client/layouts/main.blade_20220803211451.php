<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<!-- Mirrored from htmldesigntemplates.com/html/gautama/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 13:06:34 GMT -->
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Default | Gautama</title>

{{-- Style --}}
@include('client.layouts._style')
@yield('css')

</head>
<body>

<div id="preloader">
<div id="status"></div>
</div>

{{-- Header --}}
@include('client.layouts._header')

@yield('banner')

@yield('content')


@include('client.layouts._footer')


<div id="back-to-top">
<a href="#"></a>
</div>

<div class="modal fade" id="login" role="dialog">
<div class="modal-dialog">
<div class="login-content">
<div class="login-image">
<img src="images/logo-black.png" alt="image">
</div>
<h3>Hello!Sign into your account</h3>
<form>
<div class="form-group">
<input type="email" placeholder="Enter email address">
</div>
<div class="form-group">
<input type="password" placeholder="Enter password">
</div>
<div class="form-group form-checkbox">
<input type="checkbox"> Remember Me
<a href="#">Forgot password?</a>
</div>
</form>
<div class="form-btn">
<a href="#" class="btn btn-orange">LOGIN</a>
<p>Need an Account?<a href="#"> Create your Gautama account</a></p>
</div>
<ul class="social-links">
<li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
</ul>
</div>
</div>
</div>
<div class="modal fade" id="register" role="dialog">
<div class="modal-dialog">
<div class="login-content">
<div class="login-image">
<img src="images/logo-black.png" alt="image">
</div>
<h3>Awesome! Create a Gautama Account</h3>
<form>
<div class="form-group">
<input type="text" placeholder="Enter username">
</div>
<div class="form-group">
<input type="email" placeholder="Enter email address">
</div>
<div class="form-group">
<input type="password" placeholder="Enter password">
</div>
<div class="form-group">
<input type="password" placeholder="Confirm password">
</div>
</form>
<div class="form-btn">
<a href="#" class="btn btn-orange">SIGN UP</a>
</div>
<ul class="social-links">
<li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fa-bed fa-twitter" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
<li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
</ul>
</div>
</div>
</div>

@include('client.layouts._script')
<!-- Mirrored from htmldesigntemplates.com/html/gautama/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 03 Aug 2022 13:07:42 GMT -->
</html>