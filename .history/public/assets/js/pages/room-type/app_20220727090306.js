$(document).ready(function() {
    // $('.equipment').prop("checked",false)
    console.log($('.equipment:checked' ).length);



    $(document).on('change','.equipment',function() {
        let main = this.parentElement.parentElement;
        // console.log($(this).prop("checked") == true);
        if(main) {
            if($(this).prop("checked") == true) {
                let childElement = document.createElement('div');
                childElement.classList.add('col-lg-10', 'quantity_equipment')
                childElement.innerHTML = `<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width ">
                                                <input class="mdl-textfield__input " style="margin:0 -12px 0 12px; outline:none" name="quantity_equipments[]" type="text" id="text8">
                                                <label class="mdl-textfield__label " style="margin:0 -12px 0 12px" for="text8">Số lượng </label>
                                            </div>`
                main.appendChild(childElement)
            }else{
                // console.log($(this).parent().parent());
                $(this).parent().parent().find('.quantity_equipment').remove();
            }
        }
    })
})

