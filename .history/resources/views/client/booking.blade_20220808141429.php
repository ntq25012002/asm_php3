@php
$roomBooking = Session::get('roomBooking');
$dCheckin=strtotime($roomBooking['checkin']);
$dCheckout=strtotime($roomBooking['checkout']);

$datediffCheckin = localtime($dCheckin,true);
$datediffCheckout = localtime($dCheckout,true);

$checkinD = $datediffCheckin['tm_mday'];
$checkoutD = $datediffCheckout['tm_mday'];
$checkinDW = $datediffCheckin['tm_wday'] == 0? 'Chủ nhật':'Thứ '.$datediffCheckin['tm_wday']+1;
$checkoutDW = $datediffCheckout['tm_wday'] == 0? 'Chủ nhật':'Thứ '.$datediffCheckout['tm_wday']+1;
$checkinMY = $datediffCheckin['tm_mon']+1 .'/'. $datediffCheckin['tm_year'] + 1900;
$checkoutMY = $datediffCheckout['tm_mon']+1 .'/'. $datediffCheckout['tm_year'] + 1900;
@endphp
@extends('client.layouts.main')

@section('css')
    <style>
        .btn-confirm-booking{
            background: #ffa801;
            color: #fff;
            border-radius: 0;
            font-size: 18px;
            padding: 12px 32px;
            margin: 10px 0;
        }
        .btn-confirm-booking:hover {
            background-color: transparent;
            border: 1px solid #ffa801;
            color: #ffa801;
            transition: 0.3s linear;
        }
    </style>
@endsection

@section('content')
<section class="breadcrumb-outer">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Đặt phòng</h2>
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Đặt phòng</li>
                </ul>
            </nav>
        </div>
    </div>
</section>
    
<section class="content reservation-main">
    <div class="container">
        <div class="booking">
            <div class="row">
                <div class="col-md-8">
                    @if (session('err'))
                        <div class="alert alert-danger">
                            {{session('err')}}
                        </div>
                    @endif
                <div class="booking-content">
                    <div class="booking-image">
                        <img src="{{asset('storage/room/feature-image/'.$room->feature_image)}}" alt="image">
                        <div class="booking-title">
                            <div class="title-left">
                                <h3>{{$room->roomType->name}}</h3>
                            
                            </div>
                            <div class="title-right pull-right">
                                <div class="title-price">
                                    <h4 class="pad-top-15"><a href="#">{{number_format($room->price,'0',',','.')}}<span>/Đêm</span></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="booking-desc mar-top-50">
                    <ul class="mar-bottom-15">
                        <li><i class="fa fa-bed" aria-hidden="true"></i> 3 Giường</li>
                        <li><i class="fa fa-wifi" aria-hidden="true"></i> Wifi</li>
                        <li><i class="fa fa-tv" aria-hidden="true"></i> Tivi</li>
                        <li><i class="fa fa-bath" aria-hidden="true"></i> Nước nóng</li>
                        <li><i class="fa fa-utensil-spoon" aria-hidden="true"></i> Dinner</li>
                        <li><i class="fa fa-cogs" aria-hidden="true"></i> Dịch vụ nhanh</li>
                        @if ($room->air_condition == 1)
                            <li><i class="fa fa-thermometer" aria-hidden="true"></i> Điều hòa</li>
                        @endif
                        <li><i class="fa fa-car" aria-hidden="true"></i> Di chuyển</li>
                    </ul>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent in quam urna. Sed eu suscipit augue. Duis sollicitudin euismod velit, a lobortis felis pretium a. In facilisis maximus elit, sed fermentum sem lobortis at. Ut luctus euismod metus, eu malesuada orci malesuada sit amet mauris vitae sapien.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ultrices felis est, vitae suscipit odio suscipit a. Integer sit amet eleifend nisi. Nam eu pulvinar eros. </p>
                </div>
                
                <div class="personal-info mar-top-50">
                    <div class="form-title">
                        {{-- <span>1</span> --}}
                        <h4 class="mar-bottom-30">Thông tin đặt phòng</h4>
                    </div>
                    <form action="" method="post" >
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Họ và tên">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="address" placeholder="Địa chỉ">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Số điện thoại">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mar-0">
                                    <textarea name="note" placeholder="Ghi chú"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-btn">
                            <button type="submit" class="btn btn-orange btn-confirm-booking">Xác nhận đặt phòng</button>
                        </div>
                    </form>
                </div>
               
                </div>
                </div>
                <div class="col-md-4">
                    <div class="detail-sidebar">
                        <div class="sidebar-reservation">
                            <h3>Đặt chỗ</h3>
                           
                            <div class="reservation-detail">
                                <div class="rd-top">
                                    <div class="rd-box">
                                        <label>Check in </label>
                                        <p class="bold">{{$checkinD}}</p>
                                        <p>{{$checkinMY}}<br>{{$checkinDW}}</p>
                                    </div>
                                    <div class="rd-box">
                                        <label>Check out</label>
                                        <p class="bold">{{$checkoutD}}</p>
                                        <p>{{$checkoutMY}}<br>{{$checkoutDW}}</p>
                                    </div>
                                </div>
                                <div class="rd-top">
                                    <div class="rd-box">
                                        <p class="bold">{{$roomType->adults + $roomType->children}}</p>
                                        <p>Người</p>
                                    </div>
                                    <div class="rd-box">
                                        <p class="bold">{{$roomBooking['nights']}}</p>
                                        <p>Đêm</p>
                                    </div>
                                </div>
                            </div>
                            <table class="reservation-table table">
                                <tbody>
                                    <tr>
                                        <td>1 Phòng x {{$roomBooking['nights']}} Đêm</td>
                                        <td>{{number_format($roomBooking['nights'] * $room->price,'0',',','.')}}đ</td>
                                    </tr>
                                    {{-- <tr>
                                        <td>Tax</td>
                                        <td>$80</td>
                                    </tr> --}}
                                </tbody>
                            <tfoot>
                                <tr>
                                    <td>Tổng</td>
                                    <td>{{number_format($roomBooking['nights'] * $room->price,'0',',','.')}}đ</td>
                                </tr>
                            </tfoot>
                            </table>
                        </div>
                        <div class="sidebar-support">
                            <h3>Hỗ trợ</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut arnare</p>
                            <p><i class="fa fa-phone"></i> 0964.540.635</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    
@endsection