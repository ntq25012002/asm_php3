<header class="main_header_area">
    <div class="header-content">
    <div class="container">
    <div class="links links-left">
    <ul>
        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> quanntph18231@gmail.com</a></li>
        <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> 0964540635</a></li>
    
    </ul>
    </div>
    <div class="links links-right pull-right">
    <ul>
    <li><a href="#" data-toggle="modal" data-target="#login"><i class="fa fa-user" aria-hidden="true"></i> Đăng nhập</a></li>
    <li><a href="#" data-toggle="modal" data-target="#register"><i class="fa fa-pen" aria-hidden="true"></i> Đăng ký</a></li>
    <li>
    <ul class="social-links">
    <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
    <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
    <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
    <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
    </ul>
    </li>
    </ul>
    </div>
    </div>
    </div>
    
    <div class="header_menu affix-top">
    <nav class="navbar navbar-default">
    <div class="container">
    
    <div class="navbar-header">
    <a class="navbar-brand" href="index.html">
    <img alt="logo1" src="{{asset('client/images/logo-black.png')}}" class="logo-black">
    </a>
    </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav" id="responsive-menu">
    <li class="dropdown  active">
        <a href="index.html" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">Trang chủ</a>
    </li>
    <li class=" dropdown">
        <a href="{{route('room-list')}}" class="dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false">Phòng</i></a>
    </li>
    
    <li class="submenu dropdown">
        <a href="restaurant.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Loại phòng<i class="fa fa-angle-down" aria-hidden="true"></i></a>
        <ul class="dropdown-menu">
            <li><a href="restaurant.html">Home</a></li>
            <li><a href="restaurant-about.html">About Us</a></li>
        </ul>
    </li>
    <li class="submenu dropdown">
        <a href="restaurant.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Liên hệ</a>
    </li>
   
    {{-- @if(Auth::user()->role_id != 1)
        <li class="submenu dropdown">
            <a href="restaurant.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Trang quản trị</a>
        </li>
    @endif --}}
   
    <li class="dropdown submenu">
    <a href="cart.html" class="mt_cart"><i class="fa fa-shopping-cart"></i><span class="number-cart">1</span></a>
    </li>
    </ul>
    <div class="nav-btn">
    <a href="#" class="btn btn-orange">Đặt ngay</a>
    </div>
    </div>
    </div>
    <div id="slicknav-mobile"></div>
    </nav>
    </div>
    
    </header>