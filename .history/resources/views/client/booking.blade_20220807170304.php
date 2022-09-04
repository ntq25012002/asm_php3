@extends('client.layouts.main')

@section('content')
<section class="breadcrumb-outer">
    <div class="container">
    <div class="breadcrumb-content">
    <h2>Booking</h2>
    <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Booking</li>
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
                        <h4 class="mar-bottom-30">Thông tin</h4>
                    </div>
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" placeholder="Last Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" placeholder="DOB">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" placeholder="Country">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" placeholder="Phone">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mar-0">
                                <textarea>Message</textarea>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
                <div class="card-info mar-top-50">
                <div class="form-title">
                <span>2</span>
                <h4 class="mar-bottom-30">Payment Information</h4>
                </div>
                <form>
                <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                <input type="text" placeholder="Card Type">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <input type="text" placeholder="Card Number">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <input type="text" placeholder="Card Holder Name">
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                <input type="text" placeholder="CVC">
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <input type="text" placeholder="Expiry Month">
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group">
                <input type="text" placeholder="Expiry Year">
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group radio-group">
                <input type="radio">Via Credit Card
                </div>
                </div>
                <div class="col-md-3">
                <div class="form-group radio-group">
                <input type="radio">Via Paypal
                </div>
                </div>
                <div class="col-md-12 mar-top-15">
                <div class="form-group mar-bottom-30">
                <input type="checkbox"> I agree to the <a href="#">Terms and Conditions</a>
                </div>
                <div class="card-btn">
                <a href="#" class="btn btn-orange">CONFIRM BOOKING</a>
                </div>
                </div>
                </div>
                </form>
                </div>
                </div>
                </div>
                <div class="col-md-4">
                <div class="detail-sidebar">
                <div class="sidebar-reservation">
                <h3>Đặt phòng</h3>
                <div class="reservation-detail">
                <div class="rd-top">
                <div class="rd-box">
                <label>Check in</label>
                <p class="bold">{{$checkin['tm_mday']}}</p>
                <p>{{$checkin['tm_mon']}} - {{$checkin['tm_year'] + 1970}}<br>{{$checkin['tm_wday']+1 == 8? 'Chủ nhật':'Thứ '.$checkin['tm_wday']+1}}</p>
                </div>
                <div class="rd-box">
                <label>Check out</label>
                <p class="bold">13</p>
                <p>August, 2019<br>Wednesday</p>
                </div>
                </div>
                <div class="rd-top">
                <div class="rd-box">
                <p class="bold">03</p>
                <p>Guest</p>
                </div>
                <div class="rd-box">
                <p class="bold">10</p>
                <p>Night</p>
                </div>
                </div>
                </div>
                <table class="reservation-table table">
                    <tbody>
                        <tr>
                            <td>1 Phòng x {{Session::get('nights')}} Đêm</td>
                            <td>$12000</td>
                        </tr>
                        <tr>
                            <td>Tax</td>
                            <td>$80</td>
                        </tr>
                    </tbody>
                <tfoot>
                    <tr>
                        <td>Total</td>
                        <td>$12080</td>
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