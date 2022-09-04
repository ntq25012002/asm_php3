@extends('admin.layouts.main')

@section('content')
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<div class="page-title-breadcrumb">
					<div class=" pull-left">
						<div class="page-title">Add Room Details</div>
					</div>
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
								href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li><a class="parent-item" href="#">Rooms</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li class="active">Add Room Details</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box">
						<div class="card-head">
							<header>Add Room Details</header>
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
						<div class="card-body row">
							<div class="col-lg-6 p-t-20">
								<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" id="txtRoomNo">
									<label class="mdl-textfield__label">Loại phòng</label>
								</div>
							</div>
							
							<div class="col-lg-3 p-t-20">
								<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" id="txtRoomNo">
									<label class="mdl-textfield__label">Số lượng người lớn</label>
								</div>
							</div>
							<div class="col-lg-3 p-t-20">
								<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" id="txtRoomNo">
									<label class="mdl-textfield__label">Số lượng trẻ em</label>
								</div>
							</div>
							<div class="col-lg-3 ">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width"
									style="padding-top:25px">
									<select name="role_id" class="mdl-textfield__input " id="txtConfirmPwd">
										<option value=""></option>
										@foreach ($equipments as $equipment)
											<option class="form-control form-control-sm px-2" {{old('equipment_id') == $equipment->id ? 'selected' : ''}}
												value="{{ $equipment->id }}">{{ $equipment->name }}</option>
										@endforeach
									</select>
									<label class="mdl-textfield__label">Giường</label>
								</div>
								@error('equipment_id')
									<span style="color: tomato">
										{{$message}}
									</span>
								@enderror
							</div>

							<div class="col-lg-3 p-t-20">
								<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" id="text8">
									<label class="mdl-textfield__label" for="text8">Số lượng thiết bị</label>
								</div>
							</div>
							
							<div class="col-lg-12 p-t-20 text-center">
								<a href="{{route('room-type.index')}}"
									class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Danh sách</a>
								<button type="button"
									class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Thêm</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
		