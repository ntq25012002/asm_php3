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
                                <div class="col-lg-6 ">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" name="name" type="text" id="txtLasttName" value="{{old('name')}}">
                                        <label class="mdl-textfield__label">Tên phòng</label>
                                    </div>
                                    @error('name')
                                        <span style="color: tomato">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 ">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" name="email" type="email" id="txtemail"  value="{{old('email')}}">
                                        <label class="mdl-textfield__label">Loại phòng</label>
                                    </div>
                                  
                                </div>
                               
                                {{-- <div class="col-lg-6 ">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width"
                                        style="padding-top:25px">
                                        <select name="role_id" class="mdl-textfield__input " id="txtConfirmPwd">
                                            <option value=""></option>
                                            @foreach ($roles as $role)
                                                <option class="form-control form-control-sm px-2" {{old('role_id') == $role->id ? 'selected' : ''}}
                                                    value="{{ $role->id }}">{{ $role->display_name }}</option>
                                            @endforeach
                                        </select>
                                        <label class="mdl-textfield__label">Vai trò</label>
                                    </div>
                                    @error('role_id')
                                        <span style="color: tomato">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div> --}}

                                <div class="col-lg-6 ">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" name="phone_number" type="text"value="{{old('phone_number')}}"
                                            id="text5">
                                        <label class="mdl-textfield__label" for="text5">Số điện thoại</label>
                                        {{-- <span class="mdl-textfield__error">Bắt buộc nhập số điện thoại</span> --}}
                                    </div>
                                    @error('phone_number')
                                        <span style="color: tomato">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-6 ">
                                    <div class="mdl-textfield mdl-js-textfield txt-full-width">
                                        <input class="mdl-textfield__input" name="address"  id="text7" value="{{old('address')}}">
                                        <label class="mdl-textfield__label" for="text7">Địa chỉ</label>
                                    </div>
                                    @error('address')
                                        <span style="color: tomato">
                                            {{$message}}
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="col-lg-12  text-center">
                                    <a href="{{route('staff.index')}}" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-r-20 m-b-10 btn-success">Danh
                                        sách</a>
                                    <button type="submit"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10  btn-pink">Thêm</button>
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
