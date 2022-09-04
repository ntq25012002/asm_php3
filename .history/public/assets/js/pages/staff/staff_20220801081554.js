$(document).ready(function() {
    // Delete staff
    $(document).on('click','.btn-delete', function(e) {
        e.preventDefault();
        // console.log($(this).parent().parent());
        let _this = $(this);
        let urlDelete = $(this).data('url');
        let name = $(this).data('name_staff');
        // console.log(urlDelete,name);
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

    // select show 
    $(document).on('change','#show_role',function() {
        let roleId = $(this).val();
        let url = $(this).data('url');
        let keyword = $('#keyword').val();
      
        console.log(roleId, url);
        $.ajax({
            type: 'GET',
            url: url,
            data:{
                role_id: roleId,
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

    // Search name staff
    $(document).on('keyup','#keyword',function() {
        let keyword = $(this).val();
        let roleId = $('#show_role').val();
        let urlSearch =  $(this).data('url');
        console.log(keyword,urlSearch);
        console.log($('#list_staff'));
        $.ajax({
            type: 'get',
            url: urlSearch,
            data: {
                keyword: keyword,
                role_id: roleId
            },
            dataType: 'json',
            success: function(response) {
                console.log( response);
                $('#list_staff').html(response)
            }
        })
    })


    // Sort staff
    $(document).on('click', '#name', function() {
        let sortBy = $(this).data('sort_by');
        let urlSort = $(this).data('url');
        let keyword = $('#keyword').val();
        let sortType;
        let sortIcons = document.querySelectorAll('.sort-icon');
        let sortIconsJoin = document.querySelectorAll('.sort-icon-join');
        for(var i = 0; i <sortIconsJoin.length; i++) {
            sortIconsJoin[i].classList.remove('active');
        }
        $('.sort-icon-join-asc-desc').addClass('active');

        if($(this).data('sort_type') == 'desc') {
            sortType = 'desc';
            $(this).data('sort_type','asc') 
            // $('#joining_date').data('sort_type','asc') 

            for(var i = 0; i <sortIcons.length; i++) {
                sortIcons[i].classList.remove('active');
            }
            $('.sort-icon-asc').addClass('active')
        }else{
            sortType = 'asc';
            $(this).data('sort_type','desc') 
            // $('#joining_date').data('sort_type','desc') 
            for(var i = 0; i <sortIcons.length; i++) {
                sortIcons[i].classList.remove('active');
            }
            $('.sort-icon-desc').addClass('active')

        }
        // console.log(sortBy,sortType);
        $.ajax({
            type: 'GET',
            url: urlSort,
            data:{
                sortBy: sortBy,
                sortType: sortType,
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

    $(document).on('click', '#joining_date', function() {
        let sortBy = $(this).data('sort_by');
        let urlSort = $(this).data('url');
        let keyword = $('#keyword').val();
        let sortIconsJoin = document.querySelectorAll('.sort-icon-join');
        let sortIcons = document.querySelectorAll('.sort-icon');
        let sortType;
        for(var i = 0; i <sortIcons.length; i++) {
            sortIcons[i].classList.remove('active');
        }
        $('.sort-icon-asc-and-desc').addClass('active');
        if($(this).data('sort_type') == 'desc') {
            sortType = 'desc';
            $(this).data('sort_type','asc') 
            // $('#name').data('sort_type','asc') 
            for(var i = 0; i <sortIconsJoin.length; i++) {
                sortIconsJoin[i].classList.remove('active');
            }
            $('.sort-icon-join-asc').addClass('active');

          
        }else{
            sortType = 'asc';
            $(this).data('sort_type','desc');
            // $('#name').data('sort_type','desc') 

            for(var i = 0; i <sortIconsJoin.length; i++) {
                sortIconsJoin[i].classList.remove('active');
            }
            $('.sort-icon-join-desc').addClass('active')

        }
        console.log(sortBy,sortType);
        $.ajax({
            type: 'GET',
            url: urlSort,
            data:{
                sortBy: sortBy,
                keyword: keyword,
                sortType: sortType
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


    $(document).on('click','.delete_btn', function(e) {
        e.preventDefault();
        // console.log($(this).parent().parent());
        let data = [];
        const checked = document.querySelectorAll('input[name="ids[]"]:checked')
        for (let i = 0; i < checked.length; i++) {
            const item = checked[i];
            data.push(item.value);
        }
        let _this = $(this);
        let urlDelete = $(this).data('url');
        // console.log(urlDelete,name);

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
                    method: 'POST',
                    url: urlDelete,

                    data: data,
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        if(response.code === 200) {
                            // _this.parent().parent().remove();
                            for (let i = 0; i < checked.length; i++) {
                                const item = checked[i];
                                item.parentElement.parentElement.remove()
                            }
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
    


})