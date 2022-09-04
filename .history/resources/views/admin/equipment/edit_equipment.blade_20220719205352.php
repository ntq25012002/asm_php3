@extends('admin.layouts.main')

@section('content')
    <div class="page-content-wrapper">
        <div class="page-content">
            <div class="page-bar">
                <div class="page-title-breadcrumb">
                    <div class=" pull-left">
                        <div class="page-title">Sửa thông tin thiết bị</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a class="parent-item" href="index.html">Home</a>&nbsp;<i
                                class="fa fa-angle-right"></i>
                        </li>
                        <li><a class="parent-item" href="#">Thiết bị</a>&nbsp;<i class="fa fa-angle-right"></i>
                        </li>
                        <li class="active">Sửa thông tin thiết bị</li>
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
                        <form action="{{ route('equipment.update',['id' => $equipment->id]) }}" method="post" enctype="multipart/form-data">
							@csrf
                            <div class="card-body row">

                                <div class="col-lg-6 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <input class="mdl-textfield__input" name="name" type="text" id="txtFirstName" value="{{old('name') ?? $equipment->name }}">
                                        <label class="mdl-textfield__label">Thiết bị</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-t-20">
                                    <div class="mdl-textfield mdl-js-textfield txt-full-width">
                                        <textarea class="mdl-textfield__input" rows="4" id="text7" name="description">{{old('name') ?? $equipment->name }}</textarea>
                                        <label class="mdl-textfield__label" for="text7">Mô tả</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 p-t-20">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <label style="color: #aaaaaa !important; font-size: 12px">
                                            Hình ảnh
                                        </label>
                                        <input class="mdl-textfield__input" name="image" type="file" id="dateOfBirth">
                                    </div>
									<img src="{{asset($equipment->image)}}" alt="">
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
