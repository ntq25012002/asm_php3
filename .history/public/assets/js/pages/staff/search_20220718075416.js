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
        let sort;
        // console.log(sort);

        if($(this).data('sortType') == 'desc') {
            sort = 'desc';
            $(this).data('sortType','asc') 
        }else{
            sort = 'asc';
            $(this).data('sortType','desc') 
        }
        console.log(sort);
        
    })

})
