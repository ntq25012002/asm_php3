 
let alertSuccess = document.querySelector('.alert-success');
let alertError = document.querySelector('.alert-danger');
if(alertSuccess.innerHTML != '') {
  Swal.fire(
    'Thành công!',
    'Sửa thông tin thành công!',
    'success'
  )
}
if(alertError.innerHTML != '') {
  Swal.fire({
    icon: 'error',
    title: 'Lỗi...',
    text: 'Thêm mới thất bại!',
  })
}

