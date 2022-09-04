	var imageDetails = [];
	let btnRemove;
	// Dropzone.options.dropzone =
  //        {
  //           maxFilesize: 12,
  //           renameFile: function(file) {
  //               var dt = new Date();
  //               var time = dt.getTime();
  //              return time+file.name;
  //           },
  //           acceptedFiles: ".jpeg,.jpg,.png,.gif",
  //           addRemoveLinks: true,
  //           timeout: 50000,
  //           success: function(file, response) 
  //           {
	// 			      imageDetails.push(file);

  //               console.log(response);
  //           },
  //           error: function(file, response)
  //           {
  //             imageDetails.push(file);
  //             // console.log(file);
  //             btnRemove = $('.dz-remove');
  //             // if(btnRemove.length > 0) {
  //             // 	for (let index = 0; index < btnRemove.length; index++) {
  //             // 		btnRemove[index].remove();
  //             // 	}
  //             // }
  //              return false;
  //           }
	// 	};
		

		$(document).on('click','.btn-submit', function(e) {
			e.preventDefault();
			var list = new DataTransfer();
			var inputImages = $('#images');
			
			for (let i = 0; i < imageDetails.length; i++) {
				const element = imageDetails[i];
				list.items.add(element);
			}

			let myFileList = list.files;
			console.log(myFileList);
			document.querySelector('#images').files = myFileList
			console.log(document.querySelector('#images').files);

			// document.querySelector('#form-add').submit();
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
