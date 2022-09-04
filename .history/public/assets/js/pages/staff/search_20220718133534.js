$(document).ready(function() {

    $(document).on('keyup','#keyword',function() {
        let keyword = $(this).val();
        let urlSearch =  $(this).data('url');
        console.log(keyword,urlSearch);
        console.log($('#list_staff'));
        $.ajax({
            type: 'get',
            url: urlSearch,
            data: {
                keyword: keyword,
            },
            dataType: 'json',
            success: function(response) {
                console.log( response);
                $('#list_staff').html(response)
            }
        })
    })

    $(document).on('click', '#name', function() {
        let sortBy = $(this).data('sort_by');
        let urlSort = $(this).data('url');
        let keyword = $('#keyword').val();
        let sortType;

        let sortIcons = $('.sort-icon');
        console.log(sortIcons[i]);
        if($(this).data('sort_type') == 'desc') {
            sortType = 'desc';
            $(this).data('sort_type','asc') 
            for(var i = 0; i <sortIcons.length; i++) {
                sortIcons[i].removeClass('active');
            }
            $('.sort-icon-asc').addClass('active')
        }else{
            sortType = 'asc';
            $(this).data('sort_type','desc') 
            for(var i = 0; i <sortIcons.length; i++) {
                sortIcons[i].removeClass('active');
            }
            $('.sort-icon-desc').addClass('active')

        }
        console.log(sortBy,sortType);
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
       
        let sortType;
        if($(this).data('sort_type') == 'desc') {
            sortType = 'desc';
            $(this).data('sort_type','asc') 
        }else{
            sortType = 'asc';
            $(this).data('sort_type','desc') 
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
