@extends('client.layouts.main')

@section('css')
    <style>
        .btn-submit{
            background: #ffa801;
            color: #fff;
            border-radius: 0;
            font-size: 18px;
            padding: 8px 32px;
        }
        .btn-submit:hover {
            background-color: transparent;
            border: 1px solid #ffa801;
            color: #ffa801;
            transition: 0.3s linear;
        }
    </style>
@endsection

@section('banner')
<section class="banner">
    <div class="slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide" style="background-image:url({{asset($slider->image)}})">
                        <div class="swiper-content">
                            <h3 data-animation="animated fadeInUp">{{$slider->description}}</h3>
                            <h1 data-animation="animated fadeInUp">{{$slider->title}}</h1>
                            <a href="#" data-animation="animated fadeInUp" class="slider-btn btn-or mar-right-10">Xem thêm</a>
                        </div>
                    </div>
                @endforeach
                
            </div>
    
            <div class="swiper-pagination"></div>
        </div>
        <div class="overlay"></div>
    </div>
    
    <div class="banner-form">
        <div class="container">
            <form action=""  class="form-content">
                <div class="table-item">
                    <label>Check In</label>
                    <div class="form-group">
                        <div class="date-range-inner-wrapper">
                            <input id="date-range2" name="checkin" class="form-control" value="yyyy-mm-dd">
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
                            <input id="date-range3" name="checkout" class="form-control" value="yyyy-mm-dd">
                            <span class="input-group-addon">
                                <i class="fa fa-calendar" aria-hidden="true"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="table-item">
                    <label>Loại phòng</label>
                    <div class="form-group">
                        <select name="room_type">
                            <option value="">--- Loại phòng ---</option>
                            @foreach ($roomTypes as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="table-item">
                    <label>Giá</label>
                    <div class="form-group">
                        <select name="price" >
                            <option value="">--- Giá ---</option>
                            <option value="0-500000" {{request()->price=='0-500000'?'selected':''}}>Dưới 500.000đ</option>
                            <option value="500000-999000" {{request()->price=='500000-999000'?'selected':''}}>500.000 - 999.000đ</option>
                            <option value="1000000-1499000" {{request()->price=='1000000-1499000'?'selected':''}}>1.000.000 - 1.499.000đ</option>
                            <option value="1500000-2000000" {{request()->price=='1500000-2000000'?'selected':''}}>1.500.000 - 2.000.000đ</option>
                            <option value="2000000" {{request()->price=='2000000'?'selected':''}}>Trên 2.000.000đ</option>
                        </select>
                    </div>
                </div>
                <div class="table-item">
                    <div class="form-btn mar-top-35">
                        <button type="submit" class="btn btn-orange btn-submit">Kiểm tra</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</section>
@endsection

@section('content')

<section class="about-us" style="padding-bottom: 0">
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
    </div>
</section>

<section class="related-rooms" style="padding-top: 0">
    <div class="container">
        <div class="top-title">
            <div class="row display-flex">
                <div class="col-md-8 ">
                    <h2>Loại phòng <span>khách sạn</span></h2>
                </div>
            </div>
        </div>
        <div class="room-outer">
        <div class="row team-slider">
            @foreach ($roomTypes as $item)
                <div class="col-md-4">
                    <div class="room-item">
                    <div class="room-image">
                        <img src="{{asset($item->image)}}" alt="image">
                    </div>
                    <div class="room-content">
                    <div class="room-title">
                    <h4>{{$item->name}}</h4>
                
                    </div>
                    <div class="room-services mar-bottom-15">
                    <div class="row">
                    <div class="col-md-7 col-sm-6 col-xs-6">
                        @foreach ($item->equipments as $equipment)
                            <span>
                                <i class="fa fa-bed text-black" aria-hidden="true"> </i> <span> {{$equipment->pivot->quantity_equipment}}  </span>
                                {{$equipment->name}}
                            </span>
                        @endforeach
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-6">
                        <i class="fa fa-wifi" aria-hidden="true"></i> Wifi miễn phí
                    </div>
                    </div>
                    </div>
                    <p>{{$item->description}}</p>
                    <div class="room-btns">
                        <a href="{{route('list-room-type',['id' => $item->id])}}" class="btn btn-black mar-right-10">XEM CHI TIẾT</a>
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
    
<section class="top-hotel">
    <div class="container">
        <div class="top-title">
            <div class="row display-flex">
                <div class="col-md-8 ">
                    <h2>Một số phòng <span>khách sạn</span></h2>
                    <p class="mar-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
                </div>
                <div class="col-md-4">
                    <a href="{{route('room-list')}}" class="btn btn-black pull-right">Khám phá nhiều hơn</a>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($rooms as $room)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="room-item">
                        <div class="room-image">
                            <img src="{{asset('storage/room/feature-image/'.$room->feature_image)}}" alt="image">
                        </div>
                        <div class="room-content">
                            <div class="room-title">
                                <h4>{{$room->roomType->name}}</h4>
                                <p class="price-ft"><i class="fa fa-tags"></i>{{number_format($room->price,'0',',','.')}}đ<span>/ Đêm</span></p>
                            </div>
                            <div class="room-services mar-bottom-15">
                                <ul>
                                    <li>
                                        <i class="fas fa-users"></i>
                                        <span>{{$room->roomType->adults}} Người lớn - {{$room->roomType->children}} Trẻ em</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-wifi" aria-hidden="true"></i> Wifi miễn phí
                                        {{-- @if ($room->air_condition == 1)
                                            <i class="far fa-air-conditioner"></i> Điều hòa 
                                        @endif --}}
                                    </li>
                                </ul>
                            </div>
                            <div class="room-btns mar-top-20">
                                <a href="{{route('room-detail',['id' => $room->id])}}" class="btn btn-black mar-right-10">XEM CHI TIẾT</a>
                                <a href="{{route('room-detail',['id' => $room->id])}}" class="btn btn-orange">ĐẶT NGAY</a>
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
            <h3>Khám phá <span>Tiện nghi</span></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ex neque, sodales accumsan sapien et, auctor vulputate quam donec vitae consectetur turpis</p>
        </div>
        <div class="amenities-content">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <i class="fa fa-glass" aria-hidden="true"></i>
                        </div>
                        <h4>Quán bar</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <i class="fa fa-car" aria-hidden="true"></i>
                        </div>
                        <h4>Di chuyển</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <i class="fa fa-wifi" aria-hidden="true"></i>
                        </div>
                        <h4>Wifi miễn phí</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item mar-bottom-30">
                        <div class="amt-icon">
                            <i class="fa fa-bath" aria-hidden="true"></i>
                        </div>
                        <h4>Dịch vụ giặt ủi</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                        </div>
                        <h4>Dịch vụ nhanh</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                        </div>
                        <h4>Bản đồ thành phố</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-life-ring" aria-hidden="true"></i>
                        </div>
                        <h4>Bể bơi</h4>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="amt-item">
                        <div class="amt-icon">
                            <i class="fa fa-bolt" aria-hidden="true"></i>
                        </div>
                        <h4>Không hút thuốc lá</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection