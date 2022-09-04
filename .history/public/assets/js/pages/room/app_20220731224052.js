
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





let files = [] // will be store images
let dataImages = document.querySelector('#images-old')
if(dataImages) {
  let arrDataImages = JSON.parse(dataImages.value);

}

console.log(files);
button = document.querySelector('.top button'), // upload button
form = document.querySelector('.form-data-image'), // form ( drag area )
container = document.querySelector('.list-image-preview'), // container in which image will be insert
// text = document.querySelector('.inner'), // inner text of form
browse = document.querySelector('.select'), // text option fto run input
input = document.querySelector('.form-data-image input'); // file input

browse.onclick = function() {
  $('.form-data-image input').trigger("click");
}
// input change event
input.addEventListener('change', () => {
	let file = input.files;
  
	for (let i = 0; i < file.length; i++) {
    if(dataImages) {
      console.log(arrDataImages);
      if(arrDataImages.length > 0) {
        if (files.every(e => e.name !== file[i].name) && arrDataImages.every(e => e !== file[i].name)) {
          files.push(file[i])
        } 
        else {
          alert('đã tồn tại file ảnh');
        }
      }
    }else{
      if (files.every(e => e.name !== file[i].name) ) {
        files.push(file[i])
      } 
      else {
        alert('đã tồn tại file ảnh');
      }
    }
	}
	form.reset();
	showImages();
})

const showImages = () => {
  let images = '';
 
  if(dataImages.value != '') {
    if(arrDataImages.length > 0) {
      arrDataImages.forEach((item,i) => {
        images += `<div class="image">
                    <img src="http://127.0.0.1:8000/storage/room/detail-images/${item}" alt="image">
                    <span onclick="deleteImage(${i})">&times;</span>
                  </div>`
      }) 
    }
  }
    files.forEach((e, i) => {
      images += `<div class="image">
            <img src="${URL.createObjectURL(e)}" alt="image">
            <span onclick="delImage(${i})">&times;</span>
          </div>`
    })  
    container.innerHTML = images;
} 

showImages()

const delImage = index => {
	files.splice(index, 1)
	showImages()
} 
const deleteImage = index => {
  arrDataImages.splice(index, 1)
	showImages()
}

// drag and drop 
form.addEventListener('dragover', e => {
	e.preventDefault()
	form.classList.add('dragover')
	// text.innerHTML = 'Drop images here'
})

form.addEventListener('dragleave', e => {
	e.preventDefault()
	form.classList.remove('dragover')
	// text.innerHTML = 'Drag & drop image here or <span class="select">Browse</span>'
})

form.addEventListener('drop', e => {
	e.preventDefault()
  form.classList.remove('dragover')
	// text.innerHTML = 'Drag & drop image here or <span class="select">Browse</span>'
	let file = e.dataTransfer.files;
	for (let i = 0; i < file.length; i++) {
		if (files.every(e => e.name !== file[i].name)) files.push(file[i])
	}
	showImages();
})


$(document).on('click','.btn-submit', function(e) {
  e.preventDefault();
  var list = new DataTransfer();
  for (let i = 0; i < files.length; i++) {
    const fileItem = files[i];
    list.items.add(fileItem);
  }

  let myFileList = list.files;
  document.querySelector('#images').files = myFileList
  dataImages.value = JSON.stringify(arrDataImages)
  document.querySelector('#form-add').submit();
})

//  Preview feature image
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


