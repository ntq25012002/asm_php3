$(document).ready(function() {
    $(document).on('click','.btn-delete', function(e) {
        e.preventDefault();
        let urlDelete = $(this).data('url');
        let name = $(this).data('name_staff');
        console.log(urlDelete,name);
        Swal.fire({
            title: 'Bạn chắc chắn muốn xóa',
            text: "Bạn sẽ xóa " + name + "!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Xác  nhận xóa'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    method: 'get',
                    url: urlDelete,
                    success: function (response) {
                        Swal.fire(
                            'Xóa!',
                            'Bạn đã xóa thành công.',
                            'success'
                          )
                    }
                })
            }
          })
    })

})