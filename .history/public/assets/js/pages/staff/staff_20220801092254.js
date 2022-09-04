$(document).ready(function() {

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


   

})