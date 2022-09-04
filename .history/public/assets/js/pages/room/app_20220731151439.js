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
		
    var uploadDrop = new Dropzone("#dropzone", {
      acceptedFiles: ".jpeg,.jpg,.png,.gif",
      url: "${g.createLink(controller:'perfil',action: 'saveFile')}",
      //  maxFiles: 1, // Number of files at a time
       maxFilesize: 12, //in MB
       autoProcessQueue: false,
       maxfilesexceeded: function(file){
           alert('You have uploaded more than 1 Image. Only the first file will be uploaded!');
       },
       init: function(){
           this.on("addedfile", function() {
               if (this.files[1]!=null){
                   this.removeFile(this.files[0]);
               }

           });
       },
         thumbnail: function(file, dataUrl) {
           // Display the image in your file.previewElement
           $(file.previewElement).removeClass("dz-file-preview").addClass("dz-image-preview");
           $(file.previewElement).find(".dz-image img").attr("src",dataUrl);
           $("#preview").attr("src",dataUrl);
         },
       success: function (response) {
           var x = JSON.parse(response.xhr.responseText);
           var message=x.data.message;
          if (message.pass) {
              originalLogoName=x.data.data.logoName
                     pasoPorSubida=true;
              simpleMessage(message.title, message.body, "success");
           this.removeAllFiles(); // This removes all files after upload to reset dropzone for next upload
          } else {
              simpleMessage(message.title, message.body, "error");
          }
       },
       addRemoveLinks: true,
       removedfile: function(file) {
           var _ref; // Remove file on clicking the 'Remove file' button
           if(!success){
               $("#preview").attr("src",originalLogoUrl+"/"+originalLogoName);
           }else{
               success=false;
           }
           return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
       }
   });  


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
