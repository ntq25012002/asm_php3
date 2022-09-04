@extends('admin.layouts.main')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
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
					<form action="{{route('room.store')}}" id="form-add" method="post" enctype="multipart/form-data">
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
											<label class="mdl-textfield__label" for="text7">Giá / Đêm (đ)</label>
											<span class="mdl-textfield__error">Number required!</span>
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
												<img src="" id="img-preview" alt="" >
											</div>
										</div>
									</div>
									<input type="text" multiple name="images" id="images" >
									<input type="file" name="images2[]" id="" multiple>
								</div>
								
							
						</div>

						<div class="card-box">
							<div class="card-head">
								<header>Mô tả</header>
							</div>
							<div class="card-body">
								<div class="col-lg-12 p-t-20">
									<textarea name="content" class="form-control my-editor" ></textarea>
								</div>
							</div>
						</div>
					</form>

					<div class="card-box">
						<div class="card-head">
							<header>Thêm hình ảnh chi tiết</header>
						</div>
						<div class="card-body">
							<div class="col-lg-12 p-t-20">
								{{-- <label class="control-label col-md-3">Thêm hình ảnh phòng</label> --}}
								<form method="post" action="{{route('room.store')}}" enctype="multipart/form-data" 
								class="dropzone" id="dropzone">
									@csrf
									<div class="dz-message">
										<div class="dropIcon">
											<i class="material-icons">cloud_upload</i>
										</div>
										<h3>Thả tệp vào đây hoặc nhấp chuột để tải lên</h3>
									</div>
								</form>
							</div>

						</div>

						<div class="col-lg-12 p-t-20 text-center">
							<button type="button"
							 class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-r-20 m-b-20 btn-success">Danh sách</button>
							<button type="button"
								class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect m-b-20 btn-pink btn-submit">Thêm phòng</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script type="text/javascript">
	var imageDetails = [];
	Dropzone.options.dropzone =
		{
			maxFilesize: 12,
			renameFile: function(file) {
				var dt = new Date();
				var time = dt.getTime();
				return time+file.name;
			},
			acceptedFiles: ".jpeg,.jpg,.png,.gif",
			addRemoveLinks: true,
			timeout: 50000,
			removedfile: function(file) 
			{
				var name = file.upload.filename;
				$.ajax({
					headers: {
								'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
							},
					type: 'POST',
					url: '{{ url("image/delete") }}',
					data: {filename: name},
					success: function (data){
						console.log("File has been successfully removed!!");
					},
					error: function(e) {
						console.log(e);
					}});
					var fileRef;
					return (fileRef = file.previewElement) != null ? 
					fileRef.parentNode.removeChild(file.previewElement) : void 0;
			},
		
			success: function(file, response) 
			{
				console.log(response);
			},
			error: function(file, response)
			{
				imageDetails.push(file);
				// console.log(imageDetails);
				return false;
			}
		};

	
	$(document).on('click','.btn-submit', function(e) {
		e.preventDefault();
		var dataFilename = document.querySelectorAll('.dz-filename')
		var arr = [];
		// var inputImages = document.querySelector('#images');
		var inputImages = $('#images');
		for (let i = 0; i < imageDetails.length; i++) {
			const element = imageDetails[i];

			var fileData = {
				modified: element.lastModifiedDate,
				name: element.name,
				size: element.size,
				type: element.type
			}
			// console.log(JSON.stringify(fileData));
			arr[i] = fileData;
		}
		
		inputImages.val(arr)
		console.log(inputImages.val());

		document.querySelector('#form-add').submit();
	})


	const img = document.querySelector('#fileFeatureImage');
	function previewImage() {
		const file = img.files[0];
		console.log(file);
		const preview = document.getElementById('img-preview');
		const reader = new FileReader();
		reader.addEventListener('load', function() {
			preview.src = reader.result;
		}, false);

		if (file) {
			reader.readAsDataURL(file);
		}
	}
</script>


<script src="https://cdn.tiny.cloud/1/d9jmiwsqfuat7aku5t7j2hc9sv46qp2sfcflce1eyscm7wno/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
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


@endsection
		