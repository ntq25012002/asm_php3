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
                        <form action="{{ route('staff.store') }}" method="post" enctype="multipart/form-data">
							@csrf
                            <div class="card-body row">

                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" name="first_name" type="text" id="txtFirstName">
                                        <label class="mdl-textfield__label">Họ</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" name="last_name" type="text" id="txtLasttName">
                                        <label class="mdl-textfield__label">Tên</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" name="email" type="email" id="txtemail">
                                        <label class="mdl-textfield__label">Địa chỉ email</label>
                                        <span class="mdl-textfield__error">Chưa đúng định dạng email</span>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6 p-t-20">
							<div
								class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class="mdl-textfield__input" type="text" id="date">
								<label class="mdl-textfield__label">Joining Date</label>
							</div>
						</div> --}}
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" name="password" type="password" id="txtPwd">
                                        <label class="mdl-textfield__label">Mật khẩu</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" name="password_confirmation" type="password" id="txtConfirmPwd">
                                        <label class="mdl-textfield__label">Xác nhận mật khẩu</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width"
                                        style="padding-top:25px">
                                        <select name="role_id" class="mdl-textfield__input " id="txtConfirmPwd">
                                            <option value=""></option>
                                            @foreach ($roles as $role)
                                                <option class="form-control form-control-sm px-2"
                                                    value="{{ $role->id }}">{{ $role->display_name }}</option>
                                            @endforeach
                                        </select>
                                        <label class="mdl-textfield__label">Vai trò</label>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-6 p-t-20">
							<div
								class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
								<input class="mdl-textfield__input" type="text" id="designation">
								<label class="mdl-textfield__label">Designation</label>
							</div>
						</div> --}}
                                {{-- <div class="col-lg-6 p-t-20">
							<div
								class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label getmdl-select getmdl-select__fix-height txt-full-width">
								<input class="mdl-textfield__input" type="text" id="sample2" value=""
									readonly tabIndex="-1">
								<label for="sample2" class="pull-right margin-0">
									<i class="mdl-icon-toggle__label material-icons">keyboard_arrow_down</i>
								</label>
								<label for="sample2" class="mdl-textfield__label">Vai trò</label>
								<ul data-mdl-for="sample2"
									class="mdl-menu mdl-menu--bottom-left mdl-js-menu">
									<li value="1" class="mdl-menu__item" data-val="DE">Amin</li>
									<li value="2" class="mdl-menu__item" data-val="BY">Guest</li>
								</ul>
							</div>
						</div> --}}
                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" name="phone_number" type="text" pattern="-?[0-9]*(\.[0-9]+)?"
                                            id="text5">
                                        <label class="mdl-textfield__label" for="text5">Số điện thoại</label>
                                        <span class="mdl-textfield__error">Bắt buộc nhập số điện thoại</span>
                                    </div>
                                </div>
                                <div class="col-lg-6 p-t-20">
                                    <div class="mdl-textfield mdl-js-textfield txt-full-width">
                                        <input class="mdl-textfield__input" name="address"  id="text7">
                                        <label class="mdl-textfield__label" for="text7">Địa chỉ</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <label style="color: #aaaaaa !important; font-size: 12px">
                                            Ảnh đại diện
                                        </label>
                                        <input class="mdl-textfield__input" name="avatar" type="file" id="dateOfBirth">
                                    </div>
                                </div>
                                <div class="col-lg-12 p-t-20 text-center">
                                    <button type="button"
                                        class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-r-20 m-b-10 btn-success">Danh
                                        sách</button>
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
   
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('assets/plugins/popper/popper.min.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-blockui/jquery.blockui.min.js')}}"></script>
	<script src="{{asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<!-- bootstrap -->
	<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
	<!-- Common js-->
	<script src="{{asset('assets/js/app.js')}}"></script>
	<script src="{{asset('assets/js/layout.js')}}"></script>
	<script src="{{asset('assets/js/theme-color.js')}}"></script>
	<!-- Material -->
	<script src="{{asset('assets/plugins/material/material.min.js')}}"></script>
	<script src="{{asset('assets/js/pages/material_select/getmdl-select.js')}}"></script>
	<!-- animation -->
	<script src="{{asset('assets/js/pages/ui/animations.js')}}"></script>
	<!-- date and time 	 -->
    <script src="{{ asset('assets/plugins/flatpicker/flatpickr.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/datetime/datetime-data.js') }}"></script>
	<!-- end js include path -->
@endsection
