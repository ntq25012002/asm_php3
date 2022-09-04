@extends('admin.layouts.main')
@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
	<link rel="stylesheet" href="{{asset('assets/css/pages/drag_drop_image.css')}}">
	<style>
		.tox.tox-tinymce{
			min-height:450px !important;
		}
	</style>
@endsection
@section('content')
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<div class="page-title-breadcrumb">
					<div class=" pull-left">
						<div class="page-title">Thêm phòng</div>
					</div>
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
								href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li><a class="parent-item" href="#">Phòng</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li class="active">Thêm phòng</li>
					</ol>
				</div>
			</div>
			
			<div class="row">
				<div class="col-sm-12">
					@if(session('msg'))
						<div class="alert alert-success">
							{{session('msg')}}
						</div>
					@endif

					@if(session('err'))
						<div class="alert alert-danger">
							{{session('msg')}}
						</div>
					@endif
					<form action="{{route('room.update', ['id' => $room->id])}}" id="form-add" method="post" enctype="multipart/form-data">
						<div class="card-box">
							<div class="card-head">
								<header>Thêm thông tin phòng</header>
								<button id="panel-button"
									class="mdl-button mdl-js-button mdl-button--icon pull-right"
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
								@csrf
								<div class="card-body row">
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtRoomNo" name="name" value="{{old('name') ?? $room->name }}">
											<label class="mdl-textfield__label">Tên phòng</label>
										</div>
										@error('name')
											<span style="color: tomato">
												{{$message}}
											</span>
										@enderror
									</div>
									<div class="col-lg-6 p-t-20 ">
										<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width"
											style="padding-top:25px">
											<select name="room_type_id" class="mdl-textfield__input " id="txtConfirmPwd">
												<option value=""></option>
												@foreach ($roomTypes as $roomType)
													<option class="form-control form-control-sm px-2" {{old('room_type_id') == $roomType->id ? 'selected' : ''}}
														{{$room->room_type_id == $roomType->id ? ' selected' : ''}}
														value="{{ $roomType->id }}">{{ $roomType->name }}</option>
												@endforeach
											</select>
											<label class="mdl-textfield__label">Loại phòng</label>
										</div>
										@error('room_type_id')
											<span style="color: tomato">
												{{$message}}
											</span>
										@enderror
									</div>
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text"
												pattern="-?[0-9]*(\.[0-9]+)?" id="text7" name="price" value="{{old('price') ?? $room->price }}">
											<label class="mdl-textfield__label" for="text7">Giá / Đêm (đ)</label>
											{{-- <span class="mdl-textfield__error">Number required!</span> --}}
										</div>
										@error('price')
											<span style="color: tomato">
												{{$message}}
											</span>
										@enderror
									</div>
									
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text" id="txtRoomNo" name="area" value="{{old('area') ?? $room->area }}">
											<label class="mdl-textfield__label">Diện tích ( m <sup>2</sup> )</label>
										</div>
										@error('area')
											<span style="color: tomato">
												{{$message}}
											</span>
										@enderror
									</div>
									
									<div class="col-lg-6 p-t-20">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<input class="mdl-textfield__input" type="text"
												pattern="-?[0-9]*(\.[0-9]+)?" id="text8" name="phone_number" value="0{{old('phone_number') ?? $room->phone }}">
											<label class="mdl-textfield__label" for="text8">Số điện thoại</label>
											{{-- <span class="mdl-textfield__error">Number required!</span> --}}
										</div>
										@error('phone_number')
											<span style="color: tomato">
												{{$message}}
											</span>
										@enderror
									</div>
									<div class="col-lg-6 p-t-20 d-flex">
										<div class="col-lg-6">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width"
												style="padding:25px 10px 0 0">
												<select name="air_condition" class="mdl-textfield__input " id="txtConfirmPwd">
													<option value=""></option>
													<option class="form-control form-control-sm px-2" {{$room->air_condition == 1 ? ' selected' : ''}}  value="1">Có</option>
													<option class="form-control form-control-sm px-2" {{$room->air_condition == 0 ? ' selected' : ''}} value="0">Không</option>
												</select>
												<label class="mdl-textfield__label">Điều hòa</label>
											</div>
											@error('air_condition')
												<span style="color: tomato">
													{{$message}}
												</span>
											@enderror
										</div>
										<div class="col-lg-6">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width"
												style="padding-top:25px">
												<select name="status" class="mdl-textfield__input " id="txtConfirmPwd">
													<option class="form-control form-control-sm px-2" value="1" {{$room->status == 1 ? 'selected':''}}>Hoạt động</option>
													<option class="form-control form-control-sm px-2" value="0" {{$room->status == 0 ? 'selected':''}}>Bảo trì</option>
												</select>
												<label class="mdl-textfield__label">Trạng thái phòng</label>
											</div>
											@error('status')
												<span style="color: tomato">
													{{$message}}
												</span>
											@enderror
										</div>
									</div>
									<div class="col-lg-12 ">
										<div
											class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
											<label style="color: #aaaaaa !important; font-size: 12px">
												Ảnh đại diện
											</label>
											<input class="mdl-textfield__input" id="fileFeatureImage" name="feature_image" type="file" id="dateOfBirth"  onchange="previewImage()">
											<div class="image-preview pt-3">
												<img src="{{asset('storage/room/feature-image/'.$room->feature_image)}}" id="img-preview" alt="ảnh đại diện"  >
											</div>
										</div>
									</div>
									<input type="text" id="images-old" name="data_image" class="form-control" value="{{$room->images}}" hidden>
									<input type="file" name="images[]" id="images" multiple hidden>
								</div>
								
						</div>

						<div class="card-box">
							<div class="card-head">
								<header>Mô tả</header>
							</div>
							<div class="card-body now">
								@error('content')
									<span style="color: tomato">
										{{$message}}
									</span>
								@enderror
								<div class="col-lg-12 p-t-20">
									<textarea name="content" class="form-control my-editor" >{{old('content') ?? $room->description }}</textarea>
								</div>
							</div>
						</div>
					</form>


					<div class="card-box">
						<div class="card-head">
							<header>Thêm hình ảnh chi tiết</header>
						</div>
						<div class="card-body now">
							<div class="col-lg-12 p-t-20">
								<form action="" method="post" class="form-data-image ">
									<div class="dz-message">
										<div class="dropIcon text-center">
											<i class="material-icons">cloud_upload</i>
										</div>
										<h4>Thả tệp vào đây hoặc  <span class="select">Browse</span></h4>
									</div>
									<input name="file" type="file" class="file" multiple  accept="image/png, image/jpeg"/>
								</form>
								<div class="list-image-preview"></div>
							</div>
						</div>

						<div class="col-lg-12 p-t-20 text-center">
							<button type="button"
							 class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-r-20 m-b-20 btn-success">Danh sách</button>
							<button type="button"
								class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-20 btn-pink btn-submit">Cập nhật</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script src="https://cdn.tiny.cloud/1/d9jmiwsqfuat7aku5t7j2hc9sv46qp2sfcflce1eyscm7wno/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script src="{{asset('assets/js/pages/room/app.js')}}"></script>
<script src="{{asset('assets/js/pages/room/edit.js')}}"></script>

@endsection
		