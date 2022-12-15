import {
    changeColor,
    generateErrors,
    hide_areas
} from "./functions.js";

$(function () {
    let areas = [$('.show-orders-form'), $('.update-info-form')];

    $('.show-orders').on('click', function (e) {
        e.preventDefault();

        hide_areas(areas, '.show-orders-form');

        $('.show-orders-form').toggleClass('none');
    });

    $('.edit-info').on('click', function (e) {
        e.preventDefault();

        hide_areas(areas, '.update-info-form');

        $('.update-info-form').toggleClass('none');
    });

    $('.show-orders-form').on('submit', function (e) {
        e.preventDefault();
        let form = this;

        let ordersErrorsBlock = form.querySelector('.errors_block');
        let begin_date = form.querySelector('input[name="begin-date"]');
        let end_date = form.querySelector('input[name="end-date"]');

        checkDateInputs(begin_date, end_date, ordersErrorsBlock);

        if (ordersErrorsBlock.innerHTML == ''){
            let formData = new FormData();
            formData.append('begin-date', begin_date.value);
            formData.append('end-date', end_date.value);
            formData.append('client_action', 'show');

            $.ajax({
                url: '/assets/includes/profile-functions/client-actions.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function (result) {
                    if (result.code == 'ok') {
                        ordersErrorsBlock.innerHTML += '<p class="errors_block_good">' + result.message + '</p>';
                        // $(form).find('img')[0].src = result.image;
                    } else {
                        ordersErrorsBlock.innerHTML += '<p class="errors_block_bad">' + result.message + '</p>';
                    }

                },
                error: function () {
                    console.log('Error!');
                }
            });
        }

    });
});

function checkDate(begin, end, errors) {
    let beginDateErrors = [];
    let endDateErrors = [];

    if (begin.value != '' && end.value != '') {
        if (begin.value > end.value) {
            endDateErrors.push('Конечная дата должна быть больше начальной');
            beginDateErrors.push('Начальная дата должна быть меньше конечной');
        }
    }


    errors = changeColor(begin, beginDateErrors, errors);
    errors = changeColor(end, endDateErrors, errors);

    return errors;
}

function checkDateInputs(begin_date, end_date, showErrorsBlock) {
    let errors = [];

    checkDate(begin_date, end_date, errors);

    generateErrors(showErrorsBlock, errors);

}