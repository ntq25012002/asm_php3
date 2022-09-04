@extends('admin.layouts.main')

@section('content')
	<div class="page-content-wrapper">
		<div class="page-content">
			<div class="page-bar">
				<div class="page-title-breadcrumb">
					<div class=" pull-left">
						<div class="page-title">Thêm loại phòng</div>
					</div>
					<ol class="breadcrumb page-breadcrumb pull-right">
						<li><i class="fa fa-home"></i>&nbsp;<a class="parent-item"
								href="index.html">Home</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li><a class="parent-item" href="{{route('room-type.index')}}">Loại phòng</a>&nbsp;<i class="fa fa-angle-right"></i>
						</li>
						<li class="active">Thêm loại phòng</li>
					</ol>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="card-box">
						<div class="card-head">
							<header>Thêm loại phòng</header>
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
						<form action="{{route('room-type.store')}}" method="post" enctype="multipart/form-data">
							<div class="card-body row">
								@csrf
								<div class="col-lg-6 p-t-20">
									<div
										class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" name="name" type="text" id="txtRoomNo">
										<label class="mdl-textfield__label">Loại phòng</label>
									</div>
								</div>
								<div class="col-lg-6 p-t-20">
									<div
										class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" name="adults" type="text" id="txtRoomNo">
										<label class="mdl-textfield__label">Số lượng người lớn</label>
									</div>
								</div>
								<div class="col-lg-6 ">
									@foreach ($equipments as $equipment)
										<div class="d-flex">
											<div class="col-lg-2 " style="padding: 22px 0;color: #aaaaaa !important; font-size: 14px">
												<input type="checkbox" class="equipment" id="equipment_{{$equipment->id}}" {{old('equipment_id') == $equipment->id ? 'checked' : ''}}
													value="{{ $equipment->id }}"/>
												<label  for="equipment_{{$equipment->id}}">{{$equipment->name}}</label>
											</div>
											{{-- <div class="col-lg-10">
												<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width ">
													<input class="mdl-textfield__input" style="margin-left:12px" name="quantity_equipment_{{$equipment->id}}" type="text" id="text8">
													<label class="mdl-textfield__label" style="margin-left:12px" for="text8">Số lượng {{strtolower($equipment->name)}}</label>
												</div>
											</div> --}}
										</div>
									@endforeach
									
								</div>
								<div class="col-lg-6 ">
									<div
										class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
										<input class="mdl-textfield__input" name="children" type="text" id="txtRoomNo">
										<label class="mdl-textfield__label">Số lượng trẻ em</label>
									</div>
								</div>
								<div class="col-lg-6 ">
                                    <div
                                        class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
                                        <label style="color: #aaaaaa !important; font-size: 12px">
                                            Ảnh
                                        </label>
                                        <input class="mdl-textfield__input" name="image" type="file" >
                                    </div>
                                </div>
								<div class="col-lg-12 p-t-20">
									<div class="mdl-textfield mdl-js-textfield txt-full-width">
										<textarea class="mdl-textfield__input" name="description" rows="4" id="text7" name="description"></textarea>
										<label class="mdl-textfield__label" for="text7">Mô tả</label>
									</div>
								</div>
								<div class="col-lg-12 p-t-20 text-center">
									<a href="{{route('room-type.index')}}"
										class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-success">Danh sách</a>
									<button type="submit"
										class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-pink">Thêm</button>
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
	{{-- <div class="col-lg-10">
		<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width ">
			<input class="mdl-textfield__input" style="margin-left:12px" name="quantity_equipment_{{$equipment->id}}" type="text" id="text8">
			<label class="mdl-textfield__label" style="margin-left:12px" for="text8">Số lượng {{strtolower($equipment->name)}}</label>
		</div>
	</div> --}}
	<script>
		$(document).ready(function() {
			$(document).on('change','input[type="checkbox"]',function() {
				// console.log($(this));
				const equipmentChecked = document.querySelectorAll('.equipment input[type="checkbox"]:checked');
				console.log(equipmentChecked);
			})
		})
	</script>
@endsection
		