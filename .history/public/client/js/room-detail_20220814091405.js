$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });
    $(document).on('click', '.btn-check', function(e) {
        e.preventDefault();
        const url = $(this).data('url');
        const redirectLocation = $(this).attr('href');
        const token = $('meta[name="_token"]').attr('content');
        let firstDate = $('.first-date-selected').attr('time');
        let lastDate = $('.last-date-selected').attr('time');

        let checkin = new Date(Number(firstDate));
        let checkout = new Date(Number(lastDate));
        let checkinMonth = Number(checkin.getMonth())+1
        let checkoutMonth = Number(checkout.getMonth())+1
        // $('#checkin').val(checkin.getFullYear() + '-' + checkinMonth + '-'+checkin.getDate())
        // $('#checkout').val(checkout.getFullYear() + '-' + checkoutMonth + '-'+checkout.getDate())
        let checkIn = checkin.getFullYear() + '-' + checkinMonth + '-'+checkin.getDate();
        let checkOut = checkout.getFullYear() + '-' + checkoutMonth + '-'+checkout.getDate();
        console.log(typeof checkIn,checkOut);
        console.log(checkIn!=='NaN-NaN-NaN' ? checkIn : '');
        $.ajax({
            method: 'POST',
            url: url,
            data: {
                checkin: checkIn!=='NaN-NaN-NaN' ? checkIn : '',
                checkout: checkOut!=='NaN-NaN-NaN' ? checkOut : checkIn,
                _token: token,
            },
            dataType: 'JSON',
            
            success: function (response) {
                if(response.code === 200) {
                    window.location = redirectLocation;                      
                } 
            },
            error: function(response) {
                if(response.code === 500) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Bạn chưa chọn thời gian đặt phòng!',
                        text: 'Vui lòng lựa chọn khoảng thời gian đặt phòng!',
                        // footer: '<a href="">Why do I have this issue?</a>'
                    })
                }else{
                    Swal.fire({
                        icon: 'warning',
                        title: 'Phòng đã có người đặt trong khoảng thời gian này!',
                        text: 'Vui lòng lựa chọn khoảng thời gian khác!',
                        // footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            }
        })

    })
    
})