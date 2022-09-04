@extends('admin.layouts.main')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Thêm nhân viên</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="#">Nhân viên</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Thêm nhân viên</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Thông tin khách hàng</header>
                            {{-- <button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                data-upgraded=",MaterialButton">
                                <i class="material-icons">more_vert</i>
                            </button> --}}
                            {{-- <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                data-mdl-for="panel-button">
                                <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
                                </li>
                                <li class="mdl-menu__item"><i class="material-icons">print</i>Another action
                                </li>
                                <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
                                    here</li>
                            </ul> --}}
                        </div>
                      
                            <div class="card-body row">
                                @if(session('msg'))
                                    <div class="alert alert-success" >
                                        {{session('msg')}}
                                    </div>
                                @endif
                                @if(session('err'))
                                    <div class="alert alert-danger" >
                                        {{session('err')}}
                                    </div>
                                @endif
                                
                                <div class="col-lg-12 ">
                                    <div class="pb-3">
                                        Khách hàng: {{$booking->customer->name}}
                                    </div>
                                    <div class="pb-3">
                                        Email: <a href="mailto:{{$booking->customer->email}}">{{$booking->customer->email}}</a>
                                    </div>
                                    <div class="pb-3">
                                        Số điện thoại: <a href="tel:0{{$booking->customer->phone}}">0{{$booking->customer->phone}}</a>
                                    </div>
                                    <div class="pb-3">
                                        Địa chỉ: {{$booking->customer->address}}
                                    </div>
                                    <div class="pb-3">
                                        Thời gian đặt: {{ date('H:i:s d/m/Y', strtotime($booking->customer->created_at))}}
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Thông tin đặt phòng</header>
                            {{-- <button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                data-upgraded=",MaterialButton">
                                <i class="material-icons">more_vert</i>
                            </button> --}}
                            {{-- <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                data-mdl-for="panel-button">
                                <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
                                </li>
                                <li class="mdl-menu__item"><i class="material-icons">print</i>Another action
                                </li>
                                <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
                                    here</li>
                            </ul> --}}
                        </div>
                        <form action="{{ route('booking.update',['id' => $booking->id]) }}" method="post" enctype="multipart/form-data">
							@csrf
                            <div class="card-body row">
                                @if(session('msg'))
                                    <div class="alert alert-success" >
                                        {{session('msg')}}
                                    </div>
                                @endif
                                @if(session('err'))
                                    <div class="alert alert-danger" >
                                        {{session('err')}}
                                    </div>
                                @endif
                                
                                <div class="col-lg-12 ">
                                    <div class="pb-3">
                                        Mã: {{$booking->code}}
                                    </div>
                                    <div class="pb-3">
                                        Tên phòng: {{$booking->rooms->name}}
                                    </div>
                                    @php
                                        $checkin = strtotime($booking->checkin);
                                        $checkout = strtotime($booking->checkout);
                                        $datediff = abs($checkin - $checkout);
                                        $nights = 1 + $datediff / (60*60*24);
                                    @endphp
                                    <div class="pb-3">
                                        Checkin: {{date('d/m/Y', strtotime($booking->checkin))}}
                                    </div>
                                    <div class="pb-3">
                                        Checkout: {{date('d/m/Y', strtotime($booking->checkout))}}
                                    </div>
                                    <div class="pb-3">
                                        Đêm: {{$nights}}
                                    </div>
                                    <div class="pb-3">
                                        Tổng tiền: {{number_format($booking->price,'0',',','.')}} đ
                                    </div>
                                    <div class="pb-3">
                                        Trạng thái:
                                        <input type="radio" name="payment"  value="2" id="unpaid" {{$booking->payment == 2? 'checked':''}}><label class="px-1"
                                         for="unpaid">Chưa thanh toán </label> 
                                        <input type="radio" name="payment"  value="1" id="paid" {{$booking->payment == 1? 'checked':''}}><label class="px-1" for="paid">Đã thanh toán </label> 
                                    </div>
                                    <div class="pb-3">
                                        Ghi chú: {{$booking->note}}
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 pt-3 text-center">
                                    <a href="{{route('booking.index')}}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-r-20 m-b-10 btn-success">Danh
                                        sách</a>
                                    <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10  btn-pink">Lưu</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
	<script src="{{asset('assets/js/pages/staff/add-staff.js')}}"></script>
    
@endsection
