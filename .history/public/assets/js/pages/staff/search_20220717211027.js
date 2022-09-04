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
        // let sort = $(this).data('sort');
        if($(this).data('sort') == 'desc') {
            $(this).data('sort') = 'asc';
        }
        let urlSort = $(this).data('url');
        console.log(sort,urlSearch);
    })

})
