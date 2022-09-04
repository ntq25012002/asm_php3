$(document).ready(function() {
    $(document).on('change','.equipment',function() {
        // const equipmentChecked = $('.equipment:checked');
        var isChecked = $(this).parent().parent().find('.quantity_equipment.hidden')
        // console.log(isChecked.length);
        if(isChecked.length > 0) {
            console.log(1);
            $(this).parent().parent().find('.quantity_equipment').removeClass('hidden')
        }else{
            // $(this).parent().parent().find('.quantity_equipment').val(0)
            console.log( $(this).parent().parent().find('.quantity_equipment').val(0));
            $(this).parent().parent().find('.quantity_equipment').addClass('hidden')
        }
    })
})