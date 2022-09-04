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