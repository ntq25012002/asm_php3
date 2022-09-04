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
                <div class="col-sm-12">
                    <div class="card-box">
                        <div class="card-head">
                            <header>Thông tin</header>
                            <button id="panel-button" class="mdl-button mdl-js-button mdl-button--icon pull-right"
                                data-upgraded=",MaterialButton">
                                <i class="material-icons">more_vert</i>
                            </button>
                            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                                data-mdl-for="panel-button">
                                <li class="mdl-menu__item"><i class="material-icons">assistant_photo</i>Action
                                </li>
                                <li class="mdl-menu__item"><i class="material-icons">print</i>Another action
                                </li>
                                <li class="mdl-menu__item"><i class="material-icons">favorite</i>Something else
                                    here</li>
                            </ul>
                        </div>
                        <form action="{{ route('booking.update') }}" method="post" enctype="multipart/form-data">
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
                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                                <div class="col-lg-4 ">
                                    <div>
                                        Khách hàng: {{$booking->customer->name}}
                                    </div>
                                    <div>
                                        Email: {{$booking->customer->email}}
                                    </div>
                                    <div>
                                        Số điện thoại: {{$booking->customer->phone}}
                                    </div>
                                    <div>
                                        Địa chỉ: {{$booking->customer->address}}
                                    </div>
                                    <div>
                                        Thời gian đặt: {{ date('H:i:s d/m/Y', strtotime($booking->customer->created_at))}}
                                    </div>
                                </div>
                                <div class="col-lg-4 ">
                                    <div>
                                        Mã: {{$booking->code}}
                                    </div>
                                    <div>
                                        Tên phòng: {{$booking->rooms->name}}
                                    </div>
                                    <div>
                                        Checkin: {{date('d/m/Y', strtotime($booking->checkin))}}
                                    </div>
                                    <div>
                                        Checkout: {{date('d/m/Y', strtotime($booking->checkout))}}
                                    </div>
                                    <div>
                                        Tổng tiền: {{number_format($booking->price,'0',',','.')}} đ
                                    </div>
                                    <div>
                                        Trạng thái:
                                        {{-- @if ($booking->payment == 2) --}}
                                            <input type="radio" name="payment" value="2" {{$booking->payment == 2? 'checked':''}}><label for="">Chưa thanh toán </label> 
                                        {{-- @else --}}
                                        <input type="radio" name="payment" value="1" {{$booking->payment == 1? 'checked':''}}><label for="">Đã thanh toán </label> 
                                        {{-- @endif --}}
                                    </div>
                                    <div>
                                        Ghi chú: {{$booking->note}}
                                    </div>
                                </div>
                                
                                <div class="col-lg-12 pt-5 text-center">
                                    <a href="{{route('booking.index')}}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-r-20 m-b-10 btn-success">Danh
                                        sách</a>
                                    <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10  btn-pink">Cập nhật</button>
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
