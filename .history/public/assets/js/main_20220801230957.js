$(document).ready(function() {
    // select show 
    $(document).on('change','#room_type_id',function() {
        let roomTypeId = $(this).val();
        let status = $('#status').val();
        let url = $(this).data('url');
        let keyword = $('#keyword').val();
        
        console.log(roomTypeId, url);
        $.ajax({
            type: 'GET',
            url: url,
            data:{
                room_type_id: roomTypeId,
                status: status,
                keyword: keyword,
            },
            dataType: 'json',
            success: function(response) {
                $('#list_staff').html(response)
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        })
    })

    // Search name
    $(document).on('keyup','#keyword',function() {
        let keyword = $(this).val();
        let roomTypeId = $('#room_type_id').val();
        let status = $('#status').val();
        let urlSearch =  $(this).data('url');
        console.log(keyword,urlSearch);
        console.log($('#list'));
        $.ajax({
            type: 'get',
            url: urlSearch,
            data: {
                keyword: keyword,
                status: status,
                room_type_id: roomTypeId
            },
            dataType: 'json',
            success: function(response) {
                console.log( response);
                $('#list').html(response)
            }
        })
    })
 // Delete 
 
    $(document).on('click','.btn-delete', function(e) {
        e.preventDefault();
        let _this = $(this);
        let urlDelete = $(this).data('url');
        let name = $(this).data('name');
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
                        if(response.code === 200) {
                            _this.parent().parent().remove();
                            // console.log($(this).parent().parent());
                        }
                        Swal.fire(
                            'Đã xóa!',
                            'Bạn đã xóa thành công.',
                            'success'
                        )
                    }
                })
            }
        })
    })
    
    const checkAll = document.querySelector('#check_all');
    const itemsCheckbox = document.querySelectorAll('input[name="ids[]"]');
    const deleteBtn = document.querySelector('.delete_btn');
    itemsCheckbox.forEach(function(item) {
        item.onchange = function() {
            const checked = document.querySelectorAll('input[name="ids[]"]:checked')
            const isCheckedAll = checked.length === itemsCheckbox.length;
            const isDelete = checked.length === 0;
            if (isCheckedAll) {
                checkAll.checked = isCheckedAll;
            }
            checkAll.checked = isCheckedAll;
    
            if (isDelete) {
                deleteBtn.disabled = isDelete;
            }
            deleteBtn.disabled = isDelete;
        }
    })
    checkAll.onchange = function() {
        if (checkAll.checked) {
            deleteBtn.disabled = false;
            itemsCheckbox.forEach(function(item) {
                item.checked = true;
            })
        } else {
            deleteBtn.disabled = true;
            itemsCheckbox.forEach(function(item) {
                item.checked = false;
            })
        }
    }
    
    $(document).on('click','.delete_btn', function(e) {
        e.preventDefault();
        if(document.querySelectorAll('input[name="ids[]"]:checked').length > 0) {
        let data = [];
        const checked = document.querySelectorAll('input[name="ids[]"]:checked')
        for (let i = 0; i < checked.length; i++) {
            const item = checked[i];
            data.push(item.value);
        }
        let _this = $(this);
        let urlDelete = $(this).data('url');
        // let token = $('meta[name="_token"]').attr('content');
        Swal.fire({
            title: 'Bạn chắc chắn muốn xóa',
            text: "Bạn sẽ xóa các mục đã chọn !",
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
                    data: {
                        ids: data
                    },
                    dataType: 'JSON',
                    // contentType: false,
                    // cache: false,
                    // processData: false,
                    success: function (response) {
                        if(response.code === 200) {
                            for (let i = 0; i < checked.length; i++) {
                                const item = checked[i];
                                item.parentElement.parentElement.remove()
                            }
                            checkAll.checked = false;
                        }
                        Swal.fire(
                            'Đã xóa!',
                            'Bạn đã xóa thành công.',
                            'success'
                        )
                    },
                    error: function(response) {
                        console.log(response);
                    }
                })
            }
        })
        }else{
        Swal.fire({
            icon: 'error',
            title: 'Lỗi...',
            text: 'Bạn chưa chọn mục nào!',
            // footer: '<p>Why do I have this issue?</p>'
        })
        }
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

    

})
