@php
    // $roomBooking = Session::get('roomBooking');
    $dCheckin=strtotime($booking['checkin']);
    $dCheckout=strtotime($booking['checkout']);

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

@section('content')
<section class="breadcrumb-outer">
    <div class="container">
    <div class="breadcrumb-content">
    <h2>Confirmation</h2>
    <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Confirmation</li>
    </ul>
    </nav>
    </div>
    </div>
</section>


<section class="content reservation-main">
    <div class="container">
    
    <div class="success-notify">
        <div class="success-icon">
            <i class="fa fa-check"></i>
        </div>
        <div class="success-content">
            <h4 class="white mar-bottom-5">Payment Confirmed</h4>
            <p class="white mar-0">Thank you, your payment has been successful and your booking is now confirmed.A confirmation email has been sent to <a href="https://htmldesigntemplates.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a7c4dec4cbc8c9c289d3cfc2cac2d4e7c0cac6cecb89c4c8ca89">[email&#160;protected]</a></p>
        </div>
        <div class="cancel-icon">
            <i class="fa fa-times"></i>
        </div>
    </div>
    <div class="confirmation booking-content mar-top-60">
        <div class="row">
            <div class="col-md-8">
                <div class="confirmation-content">
                    <div class="booking-image">
                        <img src="{{asset('storage/room/feature-image/'.$room->feature_image)}}" alt="image">
                        <div class="booking-title">
                            <div class="title-left">
                                <h3>{{$roomType->name}}</h3>
                            </div>
                            <div class="title-right pull-right">
                                <div class="title-price">
                                    <h4 class="pad-top-15">
                                        <a href="#">{{number_format($room->price,'0',',','.')}}<span>/Đêm</span></a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="other-details detail-table mar-top-50">
                        <h4 class="mar-bottom-30">Chi tiết đơn đặt phòng</h4>
                        <table class="table">
                            <tr>
                                <td>Mã:</td>
                                <td>{{$booking['code']}}</td>
                            </tr>
                            <tr>
                                <td>Họ tên:</td>
                                <td>{{$customer->name}}</td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><a href="mailto:{{$customer->email}}">{{$customer->email}}</a></td>
                            </tr>
                            <tr>
                                <td>Checkin:</td>
                                <td>{{date('d/m/Y', strtotime($booking['checkin']))}}</td>
                            </tr>
                            <tr>
                                <td>Checkout:</td>
                                <td>{{date('d/m/Y', strtotime($booking['checkout']))}}</td>
                            </tr>
                            <tr>
                                <td>Số điện thoại:</td>
                                <td><a href="tel:{{$customer->phone}}">{{$customer->phone}}</a></td>
                            </tr>
                            <tr>
                                <td>Số đêm:</td>
                                <td>{{$booking['nights']}}</td>
                            </tr>
                            <tr>
                                <td>Địa chỉ:</td>
                                <td>{{$customer->address}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="extra-services mar-top-50">
                        <h4 class="mar-bottom-30">Dịch vụ</h4>
                        <ul>
                            <li><i class="fa fa-bed" aria-hidden="true"></i> 3 Bedrooms</li>
                            <li><i class="fa fa-wifi" aria-hidden="true"></i> Wifi</li>
                            <li><i class="fa fa-bed" aria-hidden="true"></i> Television</li>
                            <li><i class="fa fa-wifi" aria-hidden="true"></i> Hot Water</li>
                            <li><i class="fa fa-bed" aria-hidden="true"></i> Dinner</li>
                            <li><i class="fa fa-wifi" aria-hidden="true"></i> AC</li>
                            <li><i class="fa fa-bed" aria-hidden="true"></i> Airport Taxi</li>
                            <li><i class="fa fa-wifi" aria-hidden="true"></i> Quick Service</li>
                        </ul>
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
                                    <p class="bold">{{$booking['nights']}}</p>
                                    <p>Đêm</p>
                                </div>
                            </div>
                        </div>
                        <table class="reservation-table table">
                            <tbody>
                                <tr>
                                    <td>1 Phòng x {{$booking['nights']}} Đêm</td>
                                    <td>{{number_format($booking['nights'] * $room->price,'0',',','.')}}đ</td>
                                </tr>
                                {{-- <tr>
                                    <td>Tax</td>
                                    <td>$80</td>
                                </tr> --}}
                            </tbody>
                        <tfoot>
                            <tr>
                                <td>Tổng</td>
                                <td>{{number_format($booking['nights'] * $room->price,'0',',','.')}}đ</td>
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