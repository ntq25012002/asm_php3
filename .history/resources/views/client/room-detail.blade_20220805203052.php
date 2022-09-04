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
        <div class="row">
            <div class="col-md-8">
                <div class="detail-slider">
                    <div class="slider-1 slider-for">
                        @foreach ($images as $item)
                            <div class="detail-slider-item">
                                <img src="{{asset('storage/room/detail-images/'.$item)}}" alt="image">
                            </div>
                        @endforeach
                    
                    </div>
                <div class="slider-1 slider-nav">
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
                    <h3>Phòng {{$room->roomType->name}}</h3>
                </div>
                <div class="title-right pull-right">
                    <ul>
                        <li class="facebook"><i class="fab fa-facebook"></i></li>
                        <li class="twitter"><i class="fab fa-twitter"></i></li>
                        <li class="linkedin"><i class="fab fa-linkedin"></i></li>
                        <li class="pinterest"><i class="fab fa-pinterest"></i></li>
                    </ul>
                </div>
            </div>
            <div id="exTab1">
            <ul class="nav nav-pills">
                <li class="active"><a href="#1a" data-toggle="tab">Mô tả</a></li>
                <li><a href="#2a" data-toggle="tab">Price/Rate</a></li>
            </ul>
            <div class="tab-content clearfix">
            <div class="tab-pane active" id="1a">
            <div class="detail-overview detail-box">
                <h4>Mô tả chung về phòng</h4>
                {!! $room->description !!}
                <ul class="amenities">
                    <li><i class="fa fa-bed" aria-hidden="true"></i> Bedrooms</li>
                    <li><i class="fa fa-wifi" aria-hidden="true"></i> Wifi</li>
                    <li><i class="fa fa-tv" aria-hidden="true"></i> Telivision</li>
                    <li><i class="fa fa-bath" aria-hidden="true"></i> Hot Water</li>
                    <li><i class="fa fa-utensil-spoon" aria-hidden="true"></i> Dinner</li>
                    <li><i class="fa fa-cogs" aria-hidden="true"></i> Quick Service</li>
                    @if($room->air_condition == 1)
                        <li><i class="fa fa-thermometer" aria-hidden="true"></i> AC</li>
                    @endif
                    <li><i class="fa fa-bath" aria-hidden="true"></i> Laundry Service</li>
                    <li><i class="fa fa-car" aria-hidden="true"></i> Airport Taxi</li>
                </ul>
            </div>
            </div>
            
            <div class="tab-pane" id="3a">
            <div class="detail-places detail-box">
            <h4>Places Around</h4>
            <div class="service-outer">
            <div class="row">
            <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="service-item">
            <div class="service-image">
            <img src="images/service1.jpg" alt="Image">
            </div>
            <div class="service-content">
            <h3>Restaurant</h3>
            </div>
            </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="service-item">
            <div class="service-image">
            <img src="images/service2.jpg" alt="Image">
            </div>
            <div class="service-content">
            <h3>Massage</h3>
            </div>
            </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="service-item">
            <div class="service-image">
            <img src="images/service3.jpg" alt="Image">
            </div>
            <div class="service-content">
            <h3>Swimming Pool</h3>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
                <div class="tab-pane" id="4a">
                    <div class="detail-map detail-box">
                        <div class="detail-location">
                            <h4>Location and Map</h4>
                            <div class="location-item">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <p>445 Mount Eden Road, Sundarbasti, Chakrapath</p>
                            </div>
                            <div class="location-item">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <p>977- 222 - 444 - 666</p>
                                <p>977- 222 - 444 - 666</p>
                            </div>
                            <div class="location-item">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <p><a href="https://htmldesigntemplates.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="2e474048416e694f5b5a4f43004d414300405e">[email&#160;protected]</a></p>
                                <p><a href="https://htmldesigntemplates.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b0d8d5dcc0f0f7d1c5c4d1dd9ed3dfdd9edec0">[email&#160;protected]</a></p>
                            </div>
                        </div>
                        <div id="map" style="height: 357px; width: 100%;"></div>
                    </div>
                </div>
            
            </div>
            </div>
            </div>
            </div>
            <div class="col-md-4">
                <div class="detail-sidebar">
                    <div class="sidebar-form reservation-form">
                        <div class="form-price">
                            <div class="title-price">
                                <h2>{{number_format($room->price,'0',',','.')}}đ<span>/Đêm</span></h2>
                            </div>
                        </div>
                        <form action="{{route('booking')}}" method="POST"class="banner-form form-style-2">
                            @csrf
                            <div class="form-content">
                                <div class="form-content-inner">
                                    <div class="table-item">
                                        <label>Check In</label>
                                        <div class="form-group">
                                            <div class="date-range-inner-wrapper">
                                                <input id="date-range2" class="form-control" value="Check In">
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
                                                <input id="date-range3" class="form-control" value="Check Out">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="table-item">
                                        <label>Guests</label>
                                        <div class="form-group form-icon">
                                            <select>
                                                <option value="1">0</option>
                                                <option value="2">1</option>
                                                <option value="3">2</option>
                                                <option value="4">3</option>
                                                <option value="5">4</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="table-item">
                                        <label>Nights</label>
                                        <div class="form-group form-icon">
                                            <select>
                                                <option value="1">0</option>
                                                <option value="2">1</option>
                                                <option value="3">2</option>
                                                <option value="4">3</option>
                                                <option value="5">4</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="table-item">
                                        <div class="form-btn">
                                            <button type="submit" class="btn btn-orange">Đặt ngay</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-support">
                        <h3>Hỗ trợ</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut arnare</p>
                        <p><i class="fa fa-phone"></i> 0964.540.635</p>
                    </div>
                    <div class="sidebar-room">
                        <div class="sr-image">
                        <img src="{{asset('storage/room/feature-image/'.$room->feature_image)}}" alt="image">
                        </div>
                        <div class="room-title sr-content">
                            <h3>{{$room->roomType->name}}</h3>
                            <p>{{number_format($room->price,'0',',','.')}}/Đêm</p>
                            
                        </div>
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB4JwWo5VPt9WyNp3Ne2uc2FMGEePHpqJ8&amp;callback=initMap" async defer></script>
@endsection