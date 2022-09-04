$(document).ready(function() {
    $(document).on('keyup','#keyword',function() {
        let keyword = $(this).val();
        let urlSearch =  $(this).data('url');
        console.log(keyword,urlSearch);
        $.ajax({
            type: 'GET',
            url: urlSearch
        })
    })
})