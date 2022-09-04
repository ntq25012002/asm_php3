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
                sortType: sortType
            },
            dataType: 'json',
            success: function(response) {

            },
            fail: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus);
            }
        })
        
    })

})
