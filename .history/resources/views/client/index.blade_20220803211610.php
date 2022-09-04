@extends('client.layouts.main')

@section('banner')
<section class="banner">
    <div class="slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image:url(images/slider/slider3.jpg)">
                    <div class="swiper-content">
                        <h3 data-animation="animated fadeInUp">Room Availability Checker & Booking</h3>
                        <h1 data-animation="animated fadeInUp">Book Early <span>Save</span> More</h1>
                        <a href="#" data-animation="animated fadeInUp" class="slider-btn btn-or mar-right-10">Explore Our Rooms</a>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image:url(images/slider/slider2.jpg)">
                    <div class="swiper-content">
                        <h3 data-animation="animated fadeInUp">The lap of Luxury</h3>
                        <h1 data-animation="animated fadeInUp">Quality <span>Holiday</span> With Us</h1>
                        <a href="#" data-animation="animated fadeInUp" class="slider-btn btn-or">Book A Room Now</a>
                    </div>
                </div>
                <div class="swiper-slide" style="background-image:url(images/slider/slider1.jpg)">
                    <div class="swiper-content">
                        <h3 data-animation="animated fadeInUp">As We Like to Keep It That Way</h3>
                        <h1 data-animation="animated fadeInUp">A <span>Five Star</span> Hotel</h1>
                        <a href="#" data-animation="animated fadeInUp" class="slider-btn btn-or mar-right-10">Explore Our Rooms</a>
                        <a href="#" data-animation="animated fadeInUp" class="slider-btn btn-wt">Book A Room Now</a>
                    </div>
                </div>
            </div>
    
            <div class="swiper-pagination"></div>
        </div>
        <div class="overlay"></div>
    </div>
    
    <div class="banner-form">
        <div class="container">
            <div class="form-content">
                <div class="table-item">
                    <label>Check In</label>
                    <div class="form-group">
                        <div class="date-range-inner-wrapper">
                            <input id="date-range2" class="form-control" value="yyyy-mm-dd">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="table-item">
                    <label>Check Out</label>
                    <div class="form-group">
                        <div class="date-range-inner-wrapper">
                        <input id="date-range3" class="form-control" value="yyyy-mm-dd">
                        <span class="input-group-addon">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                        </span>
                        </div>
                    </div>
                </div>
                <div class="table-item">
                    <label>Guests</label>
                    <div class="form-group">
                        <select>
                            <option value="1">0</option>
                            <option value="2">1</option>
                            <option value="3">2</option>
                            <option value="4">3</option>
                            <option value="5">4</option>
                        </select>
                    </div>
                </div>
                <div class="table-item">
                    <label>Nights</label>
                    <div class="form-group">
                        <select>
                            <option value="1">0</option>
                            <option value="2">1</option>
                            <option value="3">2</option>
                            <option value="4">3</option>
                            <option value="5">4</option>
                        </select>
                    </div>
                </div>
                <div class="table-item">
                    <div class="form-btn mar-top-35">
                        <a class="btn btn-orange">Check Availability</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
@endsection

@section('content')

<section class="about-us">
    <div class="container">
    <div class="why-us-box mar-bottom-80">
    <div class="row">
    <div class="col-md-4">
    <div class="why-us-item text-center">
    <div class="why-us-icon">
    <i class="fa fa-tags"></i>
    </div>
    <div class="why-us-content">
    <h4>Competetive Pricing</h4>
    <p>With 500+ suppliers and the purchasing power of 300 million members</p>
    </div>
    </div>
    </div>
    <div class="col-md-4">
    <div class="why-us-item text-center">
    <div class="why-us-icon">
    <i class="fa fa-award"></i>
    </div>
    <div class="why-us-content">
    <h4>Award Winning Service</h4>
    <p>Travel worry free knowing that we're here if you need us, 24 hours a day</p>
    </div>
    </div>
    </div>
    <div class="col-md-4">
    <div class="why-us-item text-center">
    <div class="why-us-icon">
    <i class="fa fa-globe"></i>
    </div>
    <div class="why-us-content">
    <h4>Worldwide Coverage</h4>
    <p>Over 1,200,000 hotels in more than 200 countries and regions.</p>
    </div>
    </div>
    </div>
    </div>
    </div>
    <div class="about-outer">
    <div class="row">
    <div class="col-md-6">
    <div class="about-content">
    <h2 class="mar-bottom-30">Redefines the <span>luxury hospitality</span> experience.</h2>
    <p>This charming private 19th century mansion, which originally belonged to the family, has been completely renovated with care & passion while respecting the spirit of place.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius iaculis gravida. Nunc vel maximus libero. Quisque ligula nisi, hendrerit et scelerisque et, scelerisque vitae magna. Integer sollicitudin, ex auctor iaculis tempor, mauris odio accumsan odio.</p>
    <a class="btn btn-orange mar-top-25">KNOW MORE ABOUT US <i class="fas fa-angle-double-right"></i></a>
    </div>
    </div>
    <div class="col-md-6">
    <div class="about-image">
    <div class="image-box">
    <div class="image-1 abt-image">
    <img src="images/about1.jpg" alt="image">
    </div>
    <div class="image-2 abt-image">
    <img src="images/about2.jpg" alt="image">
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    
    
    <section class="rooms">
    <div class="container">
    <div class="row display-flex">
    <div class="col-md-4">
    <div class="section-title">
    <h5>DISCOVER OUR ROOMS</h5>
    <h2>Explore <span>Rooms & Suits</span></h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis<br><br>
    To start the day in the best way, enjoying the extraordinary buffet breakfast in the quiet of our courtyard caressed by the</p>
    <a href="#" class="btn btn-black mar-top-30">Explore More Rooms</a>
    </div>
    </div>
    <div class="col-md-8">
    <div class="room-outer">
    <div class="row room-slider">
    <div class="col-md-4 col-sm-6 col-xs-6">
    <div class="room-item">
    <div class="room-image">
    <img src="images/room-b1.jpg" alt="image">
    <a href="#"><i class="fa fa-heart"></i></a>
    </div>
    <div class="room-content">
    <div class="room-title">
    <h4>Super Deluxe</h4>
    <p class="price-ft">$2010 <span>/ per Night</span></p>
    <div class="deal-rating">
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    </div>
    </div>
    <div class="room-services mar-bottom-15">
    <ul>
    <li><i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms</li>
    <li><i class="fa fa-wifi" aria-hidden="true"></i> Wifi</li>
    </ul>
    </div>
    <div class="room-btns mar-top-20">
    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
    <a href="#" class="btn btn-orange">BOOK NOW</a>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-6">
    <div class="room-item">
    <div class="room-image">
    <img src="images/room-b2.jpg" alt="image">
    <a href="#"><i class="fa fa-heart"></i></a>
    </div>
    <div class="room-content">
    <div class="room-title">
    <h4>Junior Suite</h4>
    <p class="price-ft">$2010 <span>/ per Night</span></p>
    <div class="deal-rating">
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    </div>
    </div>
    <div class="room-services mar-bottom-15">
    <ul>
    <li><i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms</li>
    <li><i class="fa fa-wifi" aria-hidden="true"></i> Wifi</li>
    </ul>
    </div>
    <div class="room-btns mar-top-20">
    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
    <a href="#" class="btn btn-orange">BOOK NOW</a>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-4 col-sm-12 col-xs-12">
    <div class="room-item">
    <div class="room-image">
    <img src="images/room-b3.jpg" alt="image">
    <a href="#"><i class="fa fa-heart"></i></a>
    </div>
    <div class="room-content">
    <div class="room-title">
    <h4>Executive Suite</h4>
    <p class="price-ft">$2010 <span>/ per Night</span></p>
    <div class="deal-rating">
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    </div>
    </div>
    <div class="room-services mar-bottom-15">
    <ul>
    <li><i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms</li>
    <li><i class="fa fa-wifi" aria-hidden="true"></i> Wifi</li>
    </ul>
    </div>
    <div class="room-btns mar-top-20">
    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
    <a href="#" class="btn btn-orange">BOOK NOW</a>
    </div>
    </div>
    </div>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-6">
    <div class="room-item">
    <div class="room-image">
    <img src="images/room-b4.jpg" alt="image">
    <a href="#"><i class="fa fa-heart"></i></a>
    </div>
    <div class="room-content">
    <div class="room-title">
    <h4>Royal Deluxe</h4>
    <p class="price-ft">$2010 <span>/ per Night</span></p>
    <div class="deal-rating">
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    <span class="fa fa-star checked"></span>
    </div>
    </div>
    <div class="room-services mar-bottom-15">
    <ul>
    <li><i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms</li>
    <li><i class="fa fa-wifi" aria-hidden="true"></i> Wifi</li>
    </ul>
    </div>
    <div class="room-btns mar-top-20">
    <a href="#" class="btn btn-black mar-right-10">VIEW DETAILS</a>
    <a href="#" class="btn btn-orange">BOOK NOW</a>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    
    
    <section class="top-hotel">
    <div class="container">
    <div class="top-title">
    <div class="row display-flex">
    <div class="col-md-8 ">
    <h2>top <span>Hotels</span></h2>
    <p class="mar-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
    </div>
    <div class="col-md-4">
    <a href="#" class="btn btn-black pull-right">Explore More</a>
    </div>
    </div>
    </div>
    <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="top-hotels-ii">
    <img src="images/dt-1.jpg" alt="hotel-image">
    <h4>Maldives</h4>
    <div class="pp-details yellow">
    <span class="pull-left">40 Hotels</span>
    <span class="pp-tour-ar">
    <a href="#"><i class="fa fa-angle-right pad-0"></i></a>
    </span>
    </div>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="top-hotels-ii">
    <img src="images/dt-2.jpg" alt="hotel-image">
    <h4>Africa</h4>
    <div class="pp-details yellow">
    <span class="pull-left">40 Hotels</span>
    <span class="pp-tour-ar">
    <a href="#"><i class="fa fa-angle-right pad-0"></i></a>
    </span>
    </div>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="top-hotels-ii">
    <img src="images/dt-3.jpg" alt="hotel-image">
    <h4>Egypt</h4>
    <div class="pp-details yellow">
    <span class="pull-left">40 Hotels</span>
    <span class="pp-tour-ar">
    <a href="#"><i class="fa fa-angle-right pad-0"></i></a>
    </span>
    </div>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="top-hotels-ii">
    <img src="images/dt-4.jpg" alt="hotel-image">
    <h4>Africa</h4>
    <div class="pp-details yellow">
    <span class="pull-left">40 Hotels</span>
    <span class="pp-tour-ar">
    <a href="#"><i class="fa fa-angle-right pad-0"></i></a>
    </span>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    
    
    <section class="call-to-action">
    <div class="container">
    <div class="call-content text-center">
    <h2 class="white mar-bottom-25">Voted <span>"Top 100 Hotels in the World 2019"</span> by Hotel Association</h2>
    <div class="call-button mar-top-50">
    <button type="button" class="play-btn js-video-button" data-video-id="152879427" data-channel="vimeo"><i class="fa fa-play"></i></button>
    </div>
    <div class="video-figure"></div>
    </div>
    </div>
    </section>
    
    
    <section class="main-counter">
    <div class="container">
    <div class="counter-inner">
    <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="main-counter-item">
    <h3 class="room">487</h3>
    <span>Rooms</span>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="main-counter-item">
    <h3 class="staff">1256</h3>
    <span>Staffs</span>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="main-counter-item">
    <h3 class="restaurant">16</h3>
    <span>Restaurant</span>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="main-counter-item">
    <h3 class="award">117</h3>
    <span>Awards</span>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    
    
    <section class="amenities">
    <div class="container">
    <div class="section-title">
    <h3>Explore <span>Amenities</span></h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
    </div>
    <div class="amenities-content">
    <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item mar-bottom-30">
    <div class="amt-icon">
    <i class="fa fa-glass" aria-hidden="true"></i>
    </div>
    <h4>Private bar</h4>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item mar-bottom-30">
    <div class="amt-icon">
    <i class="fa fa-car" aria-hidden="true"></i>
    </div>
    <h4>Transport</h4>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item mar-bottom-30">
    <div class="amt-icon">
    <i class="fa fa-wifi" aria-hidden="true"></i>
    </div>
    <h4>Free wifi</h4>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item mar-bottom-30">
    <div class="amt-icon">
    <i class="fa fa-bath" aria-hidden="true"></i>
    </div>
    <h4>Laundry service</h4>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item">
    <div class="amt-icon">
    <i class="fa fa-cogs" aria-hidden="true"></i>
    </div>
    <h4>Quick service</h4>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item">
    <div class="amt-icon">
    <i class="fa fa-map-marker" aria-hidden="true"></i>
    </div>
    <h4>City map</h4>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item">
    <div class="amt-icon">
    <i class="fa fa-life-ring" aria-hidden="true"></i>
    </div>
    <h4>Swimming pool</h4>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item">
    <div class="amt-icon">
    <i class="fa fa-bolt" aria-hidden="true"></i>
    </div>
    <h4>Smoking free</h4>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    
    
    <section class="content gallery gallery1">
    <div class="container">
    <div class="section-title title-white">
    <h4 class="yellow">Our Gallery</h4>
    <h2 class="mar-0">Beautiful View of Gautama Hotel</h2>
    </div>
    </div>
    <div class="gallery-main gallery-slider">
    <div class="gallery-image">
    <img src="images/gallery/gallery1.jpg" alt="1">
    </div>
    <div class="gallery-image">
    <img src="images/gallery/gallery2.jpg" alt="1">
    </div>
    <div class="gallery-image">
    <img src="images/gallery/gallery3.jpg" alt="1">
    </div>
    <div class="gallery-image">
    <img src="images/gallery/gallery4.jpg" alt="1">
    </div>
    <div class="gallery-image">
    <img src="images/gallery/gallery5.jpg" alt="1">
    </div>
    <div class="gallery-image">
    <img src="images/gallery/gallery6.jpg" alt="1">
    </div>
    <div class="gallery-image">
    <img src="images/gallery/gallery7.jpg" alt="1">
    </div>
    </div>
    </section>
    
    
    
    
     <section class="newsletter">
    <div class="container">
    <div class="newsletter-main">
    <div class="row">
    <div class="col-md-7">
    <div class="section-title">
    <h2>Subscribe to our <span>Newsletter</span></h2>
    <p class="mar-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
    </div>
    </div>
    <div class="col-md-5">
    <div class="newsletter-form mar-top-25">
    <form>
    <input type="email" placeholder="Enter your email">
    <a href="#" class="btn btn-orange">SIGN UP</a>
    </form>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
@endsection