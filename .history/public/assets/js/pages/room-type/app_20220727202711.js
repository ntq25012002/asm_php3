$(document).ready(function() {
    const check = $('.equipment:checked' );
    const activePage = window.location.pathname
    console.log(activePage);
    // if(activePage.includes('/room-type/edit')) {
    
    if(check.length > 0) {
        console.log(1);
        for (let i = 0; i < check.length; i++) {
            const element = check[i];
            // const valueInput =  element.dataset();
            console.log(element);
            const main = element.parentElement.parentElement;
            if(main) {
                let childElement = document.createElement('div');
                childElement.classList.add('col-lg-10', 'quantity_equipment')
                childElement.innerHTML = `<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label txt-full-width ">
                                                <input class="mdl-textfield__input " style="margin:0 -12px 0 12px; outline:none" name="quantity_equipments[]" type="text" id="text8">
                                                <label class="mdl-textfield__label " style="margin:0 -12px 0 12px" for="text8">Số lượng </label>
                                            </div>`
                main.appendChild(childElement)
            }
        }
    }
    // }

    $(document).on('change','.equipment',function() {
        const check = $('.equipment:checked' ).length;
        console.log(check);
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
                $(this).parent().parent().find('.quantity_equipment').remove();
            }
        }
    })
})

