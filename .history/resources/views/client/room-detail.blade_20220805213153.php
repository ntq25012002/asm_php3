@extends('client.layouts.main')

@section('content')
    
<section class="breadcrumb-outer">
    <div class="container">
        <div class="breadcrumb-content">
        <h2>Chi tiết phòng</h2>
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="{{route('home')}}"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Chi tiết phòng</li>
            </ul>
        </nav>
        </div>
    </div>
</section>


<section class="details">
    <div class="container">
    <div class="detail-slider">
        <div class="slider-1 slider-for">
            <div class="detail-slider-item">
                <img src="{{asset('storage/room/feature-image/'.$room->feature_image)}}" alt="image">
            </div>
            @foreach ($images as $item)
                <div class="detail-slider-item">
                    <img src="{{asset('storage/room/detail-images/'.$item)}}" alt="image">
                </div>
            @endforeach
        </div>
        <div class="slider-1 slider-nav">
            <div class="detail-slider-item">
                <img src="{{asset('storage/room/feature-image/'.$room->feature_image)}}" alt="image">
            </div>
            @foreach ($images as $item)
                <div class="detail-slider-item">
                    <img src="{{asset('storage/room/detail-images/'.$item)}}" alt="image">
                </div>
            @endforeach
        </div>
    </div>
    <div class="detail-content">
    <div class="detail-title">
    <div class="title-left">
    <h3>{{$room->roomType->name}}</h3>
    
    </div>
    <div class="title-right pull-right">
        <ul>
            <li class="facebook"><i class="fab fa-facebook"></i></li>
            <li class="twitter"><i class="fab fa-twitter"></i></li>
            <li class="linkedin"><i class="fab fa-linkedin"></i></li>
            <li class="pinterest"><i class="fab fa-pinterest"></i></li>
        </ul>
        <div class="title-price">
            <h3>{{$room->price}}<span>/Đêm</span></h3>
        </div>
    </div>
    </div>
    <div class="detail-overview">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="overview-outer">
                    <div class="overview-content mar-bottom-30">
                        <h4>Mô tả phòng</h4>
                        {!! $room->description !!}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    
    <section class="content reservation-main">
        <div class="container">
        <div class="reservation-links text-center">
        <h2 class="mar-bottom-60 text-capitalize">Make Your Reservation</h2>
        <div class="reservation-links-content">
        <div class="res-item">
        <a href="availability.html" class="active">1</a>
        <p>Check Availability</p>
        </div>
        <div class="res-item">
        <a href="room-select.html">2</a>
        <p>Select Room</p>
        </div>
        <div class="res-item">
        <a href="booking.html">3</a>
        <p>Booking</p>
        </div>
        <div class="res-item">
        <a href="confirmation.html">4</a>
        <p>Confirmation</p>
        </div>
        </div>
        </div>
        <div class="banner-form form-style-1">
        <div class="form-content">
        <div class="table-item">
        <label>Check In</label>
        <div class="form-group">
        <select class="niceSelect">
        <option value="1">05/Jan</option>
        <option value="2">06/Jan</option>
        <option value="3">07/Jan</option>
        <option value="4">08/Jan</option>
        <option value="5">09/Jan</option>
        </select>
        </div>
        </div>
        <div class="table-item">
        <label>Check Out</label>
        <div class="form-group">
        <select class="niceSelect">
        <option value="1">05/Jan</option>
        <option value="2">06/Jan</option>
        <option value="3">07/Jan</option>
        <option value="4">08/Jan</option>
        <option value="5">09/Jan</option>
        </select>
        </div>
        </div>
        <div class="table-item">
        <label>Guests</label>
        <div class="form-group">
        <select class="niceSelect">
        <option value="1">01</option>
        <option value="2">02</option>
        <option value="3">03</option>
        <option value="4">04</option>
        <option value="5">05</option>
         </select>
        </div>
        </div>
        <div class="table-item">
        <label>Nights</label>
        <div class="form-group">
        <select class="niceSelect">
        <option value="1">05</option>
        <option value="2">06</option>
        <option value="3">07</option>
        <option value="4">08</option>
        <option value="5">09</option>
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
        <div class="calendar-range mar-top-80">
        <div class="date-range-inner-wrapper">
        <input id="date-range12" class="form-control hidden">
        <div id="date-range12-container"></div>
        </div>
        </div>
        </div>
</section>
    
    <section class="amenities">
    <div class="container">
    <div class="section-title">
    <h3>Explore <span>Amenities</span></h3>
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
    

<section class="related-rooms">
    <div class="container">
        <div class="section-title">
            <h2>Phòng <span>cùng loại</span></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
        </div>
    <div class="room-outer">
    <div class="row team-slider">
        @foreach ($relateRooms as $item)
            <div class="col-md-4">
                <div class="room-item">
                    <div class="room-image">
                        <img src="{{asset('storage/room/feature-image/'.$item->feature_image)}}" alt="image">
                    </div>
                    <div class="room-content">
                        <div class="room-title">
                            <h4>{{$item->roomType->name}}</h4>
                            <p><i class="fa fa-tag"></i> {{number_format($item->price,'0',',','.')}}/Đêm</p>
                        </div>
                        <div class="room-services mar-bottom-15">
                            <div class="row">
                                <div class="col-md-7 col-sm-6 col-xs-6">
                                    <i class="fa fa-users"></i> {{$item->roomType->adults}} Người lớn - {{$item->roomType->adults}} Trẻ em
                                </div>
                                <div class="col-md-5 col-sm-6 col-xs-6">
                                    <i class="fa fa-wifi" aria-hidden="true"></i> Wifi miễn phí
                                </div>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum orci nulla, fermentum in faucibus a, interdum eu nibh.</p>
                        <div class="room-btns">
                            <a href="{{route('room-detail',['id' => $item->id])}}" class="btn btn-black mar-right-10">XEM CHI TIẾT</a>
                            <a href="#" class="btn btn-orange">ĐẶT NGAY</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    
    </div>
    </div>
    </div>
</section>
@endsection

@section('scripts')

<script src="{{asset('client/js/map.js')}}js/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4JwWo5VPt9WyNp3Ne2uc2FMGEePHpqJ8&amp;callback=initMap" async defer></script>
<script>(function(){var js = "window['__CF$cv$params']={r:'734f45bedd7da02f',m:'wAG.4w4dVZTtd5D_QaDtaih81nysKS3kPfJVWsgqCnk-1659532006-0-AVGIbxni7/RXG8ow2lMFF2mfJoXlmQCeXt/4OLOi7U6N+/1eSiHWvrzGrqKGVfBwFm5EcU0/Ya5QbseV9iWYYBhkicQhrlRaz0l0mxhdwL9Z1lyY+vF/p2NyAjSKJvLEL2EvTxGJejFeyQYsUR/cX0w=',s:[0x05f31356e3,0x22ed707f58],u:'/cdn-cgi/challenge-platform/h/b'};var now=Date.now()/1000,offset=14400,ts=''+(Math.floor(now)-Math.floor(now%offset)),_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../../cdn-cgi/challenge-platform/h/b/scripts/alpha/invisible5615.js?ts='+ts,document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.nonce = '';_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};}})();</script></body>

@endsection