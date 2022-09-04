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
            <h3>{{number_format($room->price,'0',',','.')}}đ<span>/Đêm</span></h3>
        </div>
    </div>
    </div>
    <div class="detail-overview">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="overview-outer">
                    <div class="price-table ">
                        <h4>Giá (/Đêm)</h4>
                        <table class="table table-bordered mar-0">
                            <thead>
                                <tr>
                                    <td>Thứ 2</td>
                                    <td>Thứ 3</td>
                                    <td>Thứ 4</td>
                                    <td>Thứ 5</td>
                                    <td>Thứ 6</td>
                                    <td>Thứ 7</td>
                                    <td>Chủ nhật</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{number_format($room->price,'0',',','.')}}đ</td>
                                    <td>{{number_format($room->price,'0',',','.')}}đ</td>
                                    <td>{{number_format($room->price,'0',',','.')}}đ</td>
                                    <td>{{number_format($room->price,'0',',','.')}}đ</td>
                                    <td>{{number_format($room->price,'0',',','.')}}đ</td>
                                    <td>{{number_format($room->price,'0',',','.')}}đ</td>
                                    <td>{{number_format($room->price,'0',',','.')}}đ</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="overview-content mar-bottom-30" style="margin: 20px 0 0">
                        <h4>Mô tả phòng</h4>
                        {!! $room->description !!}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="sidebar-support">
                    <h3>Help and Support</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ut arnare</p>
                    <p><i class="fa fa-phone"></i> 977 - 222 - 444 - 666</p>
                </div>
                <div class="sidebar-room">
                    <div class="sr-image">
                    <img src="{{asset('storage/room/feature-image/'.$room->feature_image)}}" alt="image">
                    </div>
                    <div class="room-title sr-content">
                        <h3>{{$room->roomType->name}}</h3>
                        <p>{{number_format($room->price,'0',',','.')}}đ / <span>Đêm</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    
<section class="content reservation-main">
    <form action="{{route('check-calendar',['id' => $room->id])}}" method="post" id="form-calendar">
        @csrf
        <div class="container">
            <div class="reservation-links text-center">
                <h2 class="mar-bottom-60 text-capitalize">Chọn thời gian đặt phòng</h2>
                
            </div>
            
            <div class="calendar-range mar-top-80">
                <div class="date-range-inner-wrapper">
                    <input id="date-range12" class="form-control hidden">
                    <div id="date-range12-container"></div>
                </div>
            </div>

            <input type="text" name="check_in" id="check_in" hidden>
            <input type="text" name="check_out" id="check_out" hidden>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-orange btn-check pull-right" style="background: #ffa801;color: #fff;border-radius: 0;font-size: 16px;padding: 13px 55px;">Đặt phòng</button>
            </div>

        </div>
    </form>
</section>
    
<section class="amenities">
    <div class="container">
        <div class="section-title">
            <h3>Khám phá <span>Tiện ích</span></h3>
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
            <h4>Không hút thuốc</h4>
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
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/jquery-3.3.1.min.js"></script>
    <script src="{{asset('client/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('client/js/plugin.js')}}"></script>
    <script src="{{asset('client/js/main.js')}}"></script>
    <script src="{{asset('client/js/custom-nav.js')}}"></script>
    <script src="{{asset('client/js/custom-date.js')}}"></script>
    <script>(function(){var js = "window['__CF$cv$params']={r:'734f45c66b17a02f',m:'zZpLKw_ItxEZgMbQGMw73GKpPR_ozKulrkt0497kNBk-1659532007-0-ASy5x/5ZsoU5fOyWrsT7qOcssjkncp+Z3ckoVseuHVffVA+YBo4bWkUw37Ci+2dbRCAirKuEG+aZMu0+xqia/HhqK4I81SqmRNQFVNbQAJ+QO1OEqIZpeT2SocuiTl60wIdgMWQQ3zvkVOK22wuQ/kk=',s:[0xc8afa2cd27,0x6eefb25f1f],u:'/cdn-cgi/challenge-platform/h/b'};var now=Date.now()/1000,offset=14400,ts=''+(Math.floor(now)-Math.floor(now%offset)),_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../../cdn-cgi/challenge-platform/h/b/scripts/alpha/invisible5615.js?ts='+ts,document.getElementsByTagName('head')[0].appendChild(_cpo);";var _0xh = document.createElement('iframe');_0xh.height = 1;_0xh.width = 1;_0xh.style.position = 'absolute';_0xh.style.top = 0;_0xh.style.left = 0;_0xh.style.border = 'none';_0xh.style.visibility = 'hidden';document.body.appendChild(_0xh);function handler() {var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;if (_0xi) {var _0xj = _0xi.createElement('script');_0xj.nonce = '';_0xj.innerHTML = js;_0xi.getElementsByTagName('head')[0].appendChild(_0xj);}}if (document.readyState !== 'loading') {handler();} else if (window.addEventListener) {document.addEventListener('DOMContentLoaded', handler);} else {var prev = document.onreadystatechange || function () {};document.onreadystatechange = function (e) {prev(e);if (document.readyState !== 'loading') {document.onreadystatechange = prev;handler();}};}})();</script></body>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-check', function(e) {
                    e.preventDefault();
                    let firstDate = $('.first-date-selected').html();
                    let firstMonth = $('.first-date-selected').parent().parent().parent().parent().find('.month-name').html();
                    let lastDate = $('.last-date-selected').html();
                    let lastMonth = $('.last-date-selected').parent().parent().parent().parent().find('.month-name').html();
                    
                    if(firstMonth && firstMonth != '') {
                        const firstMonthYear = firstMonth.split(' ');
                        firstMonthYear.unshift(firstDate);
                        const stringDate = firstMonthYear.join(' ');
                        const a = new Date(stringDate);
                        $('#check_in').val(a.getFullYear() + '-' +a.getMonth() + '-'+a.getDate())
                        console.log(firstMonthYear);
                    }
                    if(lastMonth && lastMonth != '') {
                        const lastMonthYear = lastMonth.split(' ');
                        lastMonthYear.unshift(lastDate);
                        const stringLastDate = lastMonthYear.join(' ');
                        const a = new Date(stringLastDate);
                        $('#check_out').val(a.getFullYear() + '-' +a.getMonth() + '-'+a.getDate())
                        console.log(lastMonthYear);
                    }
                $('#form-calendar').submit();
            })
           
        })
    </script>
@endsection