import {checkEmail, clearErrors, generateErrors, changeColor, redirect} from "./reg_and_auth.js";

let authForm = document.querySelector('[name=auth_form]');
let authErrorsBlock = authForm.querySelector('.errors_block');

let checkPassword = function (password, errors) {
    let passwordErrors = [];

    if (password.value.length == 0) {
        passwordErrors.push('Не указан пароль');
    }

    errors = changeColor(password, passwordErrors, errors);

    return errors;
}

let checkAuthInputs = function () {
    let errors = [];

    let email = authForm.querySelector('[name=email]');
    let password = authForm.querySelector('[name=password]');

    errors = (checkEmail(email, errors));
    errors = (checkPassword(password, errors));

    generateErrors(authErrorsBlock, errors);

}

authForm.addEventListener('submit', (event) => {
    event.preventDefault();
    clearErrors(authForm);

    checkAuthInputs();
    console.log(1);
    let captcha = grecaptcha.getResponse();
    console.log(1);
    console.log(captcha);
    console.log(1);

    if (!captcha.length)
    {
        authErrorsBlock.push('Вы не прошли проверку "Я не робот"');
    } else{

    }

    if (authErrorsBlock.innerHTML == ''){
        let formData = new FormData(authForm);
        let request = new XMLHttpRequest();

        if (captcha.length) {
            formData.append('g-recaptcha-response', captcha);
        }


        request.open('POST', '../includes/auth.php');
        request.responseType = 'json';
        request.onload = () => {
            if (request.status !== 200) {

                return;
            }

            let response = request.response;

            if (response.status == 'ERROR') {
                grecaptcha.reset();
                authErrorsBlock.innerHTML += '<p class="errors_block_bad">' + response.message + '</p>';
            }
            else
            {

                authErrorsBlock.innerHTML += '<p class="errors_block_good">'+ response.message + '</p>';
                setTimeout(redirect, 1000, '/')

                //перенаправление с обновлением кнопки входа
            }

        }

        request.send(formData);
    }


});