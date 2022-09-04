 
let alertSuccess = document.querySelector('.alert-success');
let alertError = document.querySelector('.alert-danger');
if(alertSuccess.innerHTML != '') {
  Swal.fire(
    'Thành công!',
    alertSuccess.innerHTML,
    'success'
  )
}
if(alertError.innerHTML != '') {
  Swal.fire({
    icon: 'error',
    title: 'Lỗi...',
    text: 'Sửa thông tin thất bại!',
  })
}

