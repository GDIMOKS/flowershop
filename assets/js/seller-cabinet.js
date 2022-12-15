import {
    clearErrors,
    checkName,
    changeColor,
    generateErrors,
    redirect,
    hide_areas
} from "./functions.js";

$(function () {
    let areas = [$('.add-product-form'), $('.delete-product-area'), $('.update-product-area'), $('.update-status-area')];

    $('.add-product').on('click', function (e) {
        e.preventDefault();

        hide_areas(areas, '.add-product-form');

        $('.add-product-form').toggleClass('none');
    });

    $('.delete-product').on('click', function (e) {
        e.preventDefault();

        hide_areas(areas, '.delete-product');

        $('.delete-product-area').toggleClass('none');
    });

    $('.update-product').on('click', function (e) {
        e.preventDefault();

        hide_areas(areas, '.update-product-area');

        $('.update-product-area').toggleClass('none');
    });

    $('.delete-from-db').on('click', function (e) {
        e.preventDefault();

        let id = $(this).data('id');

        $.ajax({
            url: '/assets/includes/profile-functions/seller-actions.php',
            type: 'POST',
            data: {seller_action: 'delete', id: id},
            dataType: 'json',
            success: function (result) {
                if (result.code == 'ok') {
                    $('#del-prod-'+id).remove();
                } else {
                    alert(result.answer);
                }

            },
            error: function () {
                console.log('Error!');
            }
        });
    });

    let image = false;

    $('input[name="image"]').change(function (e) {
       image = e.target.files[0];
       console.log(image.name);
    });

    $('.add-product-form').on('submit', function (e) {
        e.preventDefault();
        let addErrorsBlock = this.querySelector('.errors_block');

        clearErrors(this);
        check_inputs(this, addErrorsBlock);

        if (addErrorsBlock.innerHTML == ''){
            let checkboxes = $('input[name="categories[]"]');
            let title = this.querySelector('input[name="title"]').value;
            let price = this.querySelector('input[name="price"]').value;

            let formData = new FormData();
            formData.append('title', title);
            formData.append('image', image);
            formData.append('price', price);
            formData.append('seller_action', 'add');
            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    formData.append('categories[]', checkboxes[i].value);
                }
            }

            $.ajax({
                url: '/assets/includes/profile-functions/seller-actions.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    if (result.code == 'ok') {
                        addErrorsBlock.innerHTML += '<p class="errors_block_good">' + result.message + '</p>';

                        setTimeout(redirect, 1000, '../pages/profile.php');
                    } else {
                        addErrorsBlock.innerHTML += '<p class="errors_block_bad">' + result.message + '</p>';
                    }

                },
                error: function () {
                    console.log('Error!');
                }
            });
        }
    });

    $('.product_row').on('submit', function (e) {
        e.preventDefault();
        let updErrorsBlock = this.querySelector('.errors_block');
        let form = this;
        clearErrors(form);
        check_inputs(form, updErrorsBlock);

        if (updErrorsBlock.innerHTML == ''){
            let checkboxes = $('input[name="categories[]"]');
            let title = form.querySelector('input[name="title"]').value;
            let price = form.querySelector('input[name="price"]').value;
            let id = form.querySelector('input[name="id"]').value;


            let formData = new FormData();

            let upd_image = $(form).find('input[name="upd-image"]')[0].files[0];

            if (upd_image == undefined) {
                upd_image = $(form).find('input[name="upd-image"]').attr('value');
                if (upd_image != "") {
                    formData.append('image', upd_image);
                }
            } else {
                formData.append('upd-image', upd_image);
            }

            formData.append('id', id);
            formData.append('title', title);
            formData.append('price', price);
            formData.append('seller_action', 'update');

            for (let i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    formData.append('categories[]', checkboxes[i].value);
                }
            }

            $.ajax({
                url: '/assets/includes/profile-functions/seller-actions.php',
                type: 'POST',
                data: formData,
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                success: function (result) {
                    if (result.code == 'ok') {
                        updErrorsBlock.innerHTML += '<p class="errors_block_good">' + result.message + '</p>';
                        $(form).find('img')[0].src = result.image;
                        // setTimeout(redirect, 1000, '../pages/profile.php');
                    } else {
                        updErrorsBlock.innerHTML += '<p class="errors_block_bad">' + result.message + '</p>';
                    }

                },
                error: function () {
                    console.log('Error!');
                }
            });
        }
    });
});



function checkPrice(price, errors){
    let priceErrors = [];

    if (price.value.length == 0) {
        priceErrors.push('Не указана цена');
    } else {
        if (Number.parseFloat(+price.value) < 0 ){
            priceErrors.push('Отрицательная цена');
        }
        if (!Number.isInteger(+price.value) && !Number.parseFloat(+price.value)){
            priceErrors.push('Некорректный ввод цены');
        }
    }

    errors = changeColor(price, priceErrors, errors);

    return errors;
}

let check_inputs = function (addForm, addErrorsBlock) {
    let errors = [];

    let title = addForm.querySelector('[name=title]');
    let price = addForm.querySelector('[name=price]');

    checkName(title, errors);
    checkPrice(price, errors);

    generateErrors(addErrorsBlock, errors);

}