$(document).ready(function() {
    $(document).on('change','.equipment',function() {
        let main = this.parentElement.parentElement;
        let childElement = document.createElement('div');
        childElement.classList.add('col-lg-10', 'quantity_equipment')
        console.log($(this).prop("checked") == true);
        if(main) {
            if($(this).prop("checked") == true) {
                childElement.innerHTML = `<div class="mdl-textfield mdl-js-textfield          mdl-textfield--floating-label txt-full-width ">
                                                <input class="mdl-textfield__input " style="margin:0 -12px 0 12px" name="quantity_equipments[]" type="text" id="text8">
                                                <label class="mdl-textfield__label " style="margin:0 -12px 0 12px" for="text8">Số lượng </label>
                                            </div>`
                main.appendChild(childElement)
            }else{
                console.log(main.querySelector('.quantity_equipment'));
                main.querySelector('.quantity_equipment').remove();
            }
        }

        console.log(main);
        // var isChecked = $(this).parent().parent().find('.quantity_equipment')
        // console.log(isChecked.length);
        // if(isChecked.length > 0) {
        //     $(this).parent().parent().find('.quantity_equipment').removeClass('hidden')
        // }else if(isChecked.length == 0){
        //     $(this).parent().parent().find('input[type="text"]').val(null)
        //     console.log($(this).parent().parent().find('input[type="text"]').val());
        //     $(this).parent().parent().find('.quantity_equipment').addClass('hidden')
        // }

        
    })
})
