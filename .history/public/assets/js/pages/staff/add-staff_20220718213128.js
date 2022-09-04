$(document).ready(function() {

    if($('.alert-success').html() != '' ){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Your work has been saved',
            showConfirmButton: false,
            timer: 1500
          })
    }

})