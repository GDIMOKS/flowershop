import {checkPassword, checkEmail, clearErrors, generateErrors} from "./reg_and_auth.js";


let authForm = document.querySelector('[name=auth_form]');
let authErrorsBlock = authForm.querySelector('.errors_block');

let checkAuthInputs = function () {
    let errors = [];

    let email = authForm.querySelector('[name=email]').value;
    let password = authForm.querySelector('[name=password]').value;

    errors.push(checkEmail(email));
    errors.push(checkPassword(password, password));

    generateErrors(authErrorsBlock, errors);

}

authForm.addEventListener('submit', (event) => {
    event.preventDefault();
    clearErrors(authForm);

    checkAuthInputs();

    if (authErrorsBlock.innerHTML == ''){
        let formData = new FormData(authForm);
        let request = new XMLHttpRequest();

        request.open('POST', '../includes/auth.php');
        request.responseType = 'json';
        request.onload = () => {
            if (request.status !== 200) {
                return;
            }

            let response = request.response;

            if (response.status == 'ERROR') {
                authErrorsBlock.innerHTML += '<p style="color:red">' + response.message + '</p>';
            }
            else
            {
                alert(response.message);
                authErrorsBlock.innerHTML += '<p style="color:green">'+ response.message + '</p>';
            }

        }

        request.send(formData);
    }
});