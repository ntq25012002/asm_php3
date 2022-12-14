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
                        <a class="btn btn-orange">Ki???m tra</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
@endsection

@section('content')

    
<section class="rooms">
    <div class="container">
        <div class="row display-flex">
                <div class="col-md-4">
                    <div class="section-title">
                        <h5>Kh??m ph?? c??c lo???i ph??ng c???a ch??ng t??i</h5>
                        <h2>Kh??m ph?? <span>Lo???i Ph??ng</span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis<br><br>
                        To start the day in the best way, enjoying the extraordinary buffet breakfast in the quiet of our courtyard caressed by the</p>
                        <a href="#" class="btn btn-black mar-top-30">Xem th??m ph??ng</a>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="room-outer">
                        <div class="row room-slider">
                            @foreach ($roomTypes as $item)
                            {{-- {{dd($room->roomType->name)}} --}}

                                <div class="col-md-4 col-sm-6 col-xs-6">
                                    <div class="room-item">
                                        <div class="room-image">
                                            <img src="{{asset($item->image)}}" alt="image">
                                            {{-- <a href="#"><i class="fa fa-heart"></i></a> --}}
                                        </div>
                                        <div class="room-content">
                                            <div class="room-title">
                                                <h4>{{$item->name}}</h4>
                                                {{-- <span class="price-ft">{{number_format($room->price,0,',','.')}} ??</span> <span>/ ????m</span></p> --}}
                                            </div>
                                            <div class="room-services mar-bottom-15">
                                                <ul>
                                                    <li>
                                                        <i class="fa fa-bed" aria-hidden="true"></i> 
                                                        @foreach ($item->equipments as $equipment)
                                                            {{-- {{$item}} --}}
                                                            <span>
                                                                <span> {{$equipment->pivot->quantity_equipment}}  </span>
                                                                {{$equipment->name}}
                                                            </span>
                                                        @endforeach
                                                    </li>
                                                    <li><i class="fa fa-wifi" aria-hidden="true"></i> Wifi</li>
                                                </ul>
                                            </div>
                                            <div class="room-btns mar-top-20">
                                                <a href="#" class="btn btn-black mar-right-10">XEM CHI TI???T</a>
                                                <a href="#" class="btn btn-orange">?????T NGAY</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

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
                <h2>M???t s??? ph??ng <span>kh??ch s???n</span></h2>
                <p class="mar-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
                </div>
                <div class="col-md-4">
                <a href="#" class="btn btn-black pull-right">Kh??m ph?? nhi???u h??n</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($rooms as $room)
                {{-- <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="top-hotels-ii">
                    <img src="{{asset('storage/room/feature-image/'.$room->feature_image)}}" alt="hotel-image">
                    <h4>{{$room->name}}</h4>
                        <div class="pp-details yellow">
                            <span class="pull-left">40 Kh??ch s???n</span>
                            <span class="pp-tour-ar">
                            <a href="#"><i class="fa fa-angle-right pad-0"></i></a>
                            </span>
                        </div>
                    </div>
                </div> --}}
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="room-item">
                        <div class="room-image">
                            <img src="{{asset('storage/room/feature-image/'.$room->feature_image)}}" alt="image">
                            {{-- <a href="#"><i class="fa fa-heart"></i></a> --}}
                        </div>
                        <div class="room-content">
                            <div class="room-title">
                                <h4>{{$room->name}}</h4>
                                <span class="price-ft">{{number_format($room->price,0,',','.')}} ??</span> <span>/ ????m</span></p>
                            </div>
                            <div class="room-services mar-bottom-15">
                                <ul>
                                    <li>
                                        <i class="fas fa-bed-alt"></i>
                                        <span>{{$room->roomType->name}}</span>
                                    </li>
                                    <li><i class="fa fa-wifi" aria-hidden="true"></i> Wifi</li>
                                </ul>
                            </div>
                            <div class="room-btns mar-top-20">
                                <a href="#" class="btn btn-black mar-right-10">XEM CHI TI???T</a>
                                <a href="#" class="btn btn-orange">?????T NGAY</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
           
        </div>
    </div>
    </section>
    
    
    
    
    <section class="amenities">
    <div class="container">
    <div class="section-title">
    <h3>Kh??m ph?? <span>Ti???n nghi</span></h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
    </div>
    <div class="amenities-content">
    <div class="row">
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item mar-bottom-30">
    <div class="amt-icon">
    <i class="fa fa-glass" aria-hidden="true"></i>
    </div>
    <h4>Qu??n bar</h4>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item mar-bottom-30">
    <div class="amt-icon">
    <i class="fa fa-car" aria-hidden="true"></i>
    </div>
    <h4>Di chuy???n</h4>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item mar-bottom-30">
    <div class="amt-icon">
    <i class="fa fa-wifi" aria-hidden="true"></i>
    </div>
    <h4>Wifi mi???n ph??</h4>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item mar-bottom-30">
    <div class="amt-icon">
    <i class="fa fa-bath" aria-hidden="true"></i>
    </div>
    <h4>D???ch v??? gi???t ???i</h4>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item">
    <div class="amt-icon">
    <i class="fa fa-cogs" aria-hidden="true"></i>
    </div>
    <h4>D???ch v??? nhanh</h4>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item">
    <div class="amt-icon">
    <i class="fa fa-map-marker" aria-hidden="true"></i>
    </div>
    <h4>B???n ????? th??nh ph???</h4>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item">
    <div class="amt-icon">
    <i class="fa fa-life-ring" aria-hidden="true"></i>
    </div>
    <h4>B??? b??i</h4>
    </div>
    </div>
    <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="amt-item">
    <div class="amt-icon">
    <i class="fa fa-bolt" aria-hidden="true"></i>
    </div>
    <h4>Kh??ng h??t thu???c l??</h4>
    </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    
@endsection