<header class="main_header_area">
    <div class="header-content">
    <div class="container">
    <div class="links links-left">
    <ul>
    <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> <span class="__cf_email__" data-cfemail="3c55525a537c5b5d49485d515d125f5351">[email&#160;protected]</span></a></li>
    <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> 977-222-333-444</a></li>
    <li>
    <select>
    <option>Eng</option>
    <option>Fra</option>
    <option>Esp</option>
    </select>
    </li>
    </ul>
    </div>
    <div class="links links-right pull-right">
    <ul>
    <li><a href="#" data-toggle="modal" data-target="#login"><i class="fa fa-user" aria-hidden="true"></i> Login</a></li>
    <li><a href="#" data-toggle="modal" data-target="#register"><i class="fa fa-pen" aria-hidden="true"></i> Register</a></li>
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
    <img alt="logo1" src="images/logo-black.png" class="logo-black">
    </a>
    </div>
    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav" id="responsive-menu">
    <li class="dropdown submenu active">
        <a href="index.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Trang chủ</a>
    </li>
    <li class="submenu dropdown">
        <a href="roomlist-2.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Phòng</i></a>
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
   
    @if(Auth::user()->role_id != 1)
        <li class="submenu dropdown">
            <a href="restaurant.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Trang quản trị</a>
        </li>
    @endif
   
    <li class="dropdown submenu">
    <a href="cart.html" class="mt_cart"><i class="fa fa-shopping-cart"></i><span class="number-cart">1</span></a>
    </li>
    </ul>
    <div class="nav-btn">
    <a href="#" class="btn btn-orange">Book Now</a>
    </div>
    </div>
    </div>
    <div id="slicknav-mobile"></div>
    </nav>
    </div>
    
    </header>