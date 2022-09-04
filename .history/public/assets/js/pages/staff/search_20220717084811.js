$(document).ready(function() {
    $(document).on('keyup','#keyword',function() {
        let keyword = $(this).val();
        let urlSearch =  $(this).data('url');
        console.log(keyword,urlSearch);
        $.ajax({
            type: 'GET',
            url: urlSearch,
            data: {
                keyword: keyword,
            },
            dataType: 'json',
            success: function(response) {
                $('#list_staff').html(response)
            }
        })
    })
})