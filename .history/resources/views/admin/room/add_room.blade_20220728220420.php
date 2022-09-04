@extends('admin.layouts.main')
@section('css')
	
	<style>
		.tox.tox-tinymce{
			min-height:520px !important;
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
					<div class="card-box">
						<div class="card-head">
							<header>Thêm phòng</header>
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
									<input class="mdl-textfield__input" type="text" id="txtRoomNo" name="name">
									<label class="mdl-textfield__label">Tên phòng</label>
								</div>
							</div>
							<div class="col-lg-6 p-t-20 ">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width"
									style="padding-top:25px">
									<select name="room_type_id" class="mdl-textfield__input " id="txtConfirmPwd">
										<option value=""></option>
										@foreach ($roomTypes as $roomType)
											<option class="form-control form-control-sm px-2" {{old('room_type_id') == $roomType->id ? 'selected' : ''}}
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
							<div class="col-lg-6 p-t-20 ">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width"
									style="padding-top:25px">
									<select name="air_condition" class="mdl-textfield__input " id="txtConfirmPwd">
										<option value=""></option>
										<option class="form-control form-control-sm px-2" value="1">Có</option>
										<option class="form-control form-control-sm px-2" value="0">Không</option>
									</select>
									<label class="mdl-textfield__label">Điều hòa</label>
								</div>
								@error('air_condition')
									<span style="color: tomato">
										{{$message}}
									</span>
								@enderror
							</div>
							<div class="col-lg-6 p-t-20">
								<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text" id="txtRoomNo" name="area">
									<label class="mdl-textfield__label">Diện tích ( m <sup>2</sup> )</label>
								</div>
							</div>
							
							<div class="col-lg-6 p-t-20">
								<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text"
										pattern="-?[0-9]*(\.[0-9]+)?" id="text8">
									<label class="mdl-textfield__label" for="text8">Số điện thoại</label>
									<span class="mdl-textfield__error">Number required!</span>
								</div>
							</div>
							<div class="col-lg-6 p-t-20">
								<div
									class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width">
									<input class="mdl-textfield__input" type="text"
										pattern="-?[0-9]*(\.[0-9]+)?" id="text7">
									<label class="mdl-textfield__label" for="text7">Giá thuê / Đêm (đ)</label>
									<span class="mdl-textfield__error">Number required!</span>
								</div>
							</div>
							<div class="col-lg-12 p-t-20">
								<label class="control-label col-md-3">Upload Room Photos</label>
								<form id="id_dropzone" class="dropzone">
									<div class="dz-message">
										<div class="dropIcon">
											<i class="material-icons">cloud_upload</i>
										</div>
										<h3>Drop files here or click to upload.</h3>
										<em>(This is just a demo. Selected files are <strong>not</strong>
											actually uploaded.)
										</em>
									</div>
								</form>
							</div>
							<div class="col-lg-12 p-t-20">
								<textarea name="content" class="form-control my-editor" ></textarea>
								<form enctype="multipart/form-data" class="form-editor" method="post" id="fileinfo" name="fileinfo">
									<p>
									  <textarea id="editor"></textarea>
									</p>
								  </form>
							</div>
							<div class="col-lg-12 p-t-20 text-center">
								<button type="button"
									class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 m-r-20 btn-pink">Submit</button>
								<button type="button"
									class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-10 btn-default">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
<script>

<script src="https://cdn.tiny.cloud/1/d9jmiwsqfuat7aku5t7j2hc9sv46qp2sfcflce1eyscm7wno/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	

<script src="https://cdn.tiny.cloud/1/d9jmiwsqfuat7aku5t7j2hc9sv46qp2sfcflce1eyscm7wno/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	var editor_config = {
	path_absolute : "/",
	selector: 'textarea.my-editor',
	relative_urls: false,
	plugins: [
		"advlist autolink lists link image charmap print preview hr anchor pagebreak",
		"searchreplace wordcount visualblocks visualchars code fullscreen",
		"insertdatetime media nonbreaking save table directionality",
		"emoticons template paste textpattern"
	],
	toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
	file_picker_callback : function(callback, value, meta) {
		var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
		var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

		var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
		if (meta.filetype == 'image') {
		cmsURL = cmsURL + "&type=Images";
		} else {
		cmsURL = cmsURL + "&type=Files";
		}

		tinyMCE.activeEditor.windowManager.openUrl({
		url : cmsURL,
		title : 'Filemanager',
		width : x * 0.8,
		height : y * 0.8,
		resizable : "yes",
		close_previous : "no",
		onMessage: (api, message) => {
			callback(message.content);
		}
		});
	}
	};
	tinymce.init(editor_config);
	</script>

<script>
@endsection
		