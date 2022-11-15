let form = document.querySelector('[name=reg_form]');
let errorsBlock = document.querySelector('.errors_block');

let clearErrors = function ()
{
    errors = form.querySelectorAll('.error');

    for (let i = 0; i < errors.length; i++)
        errors[i].remove();
}

let checkInputs = function () {
    let errors = [];
    let firstname = form.querySelector('[name=first_name]');
    let email = form.querySelector('[name=email]');
    let password = form.querySelector('[name=password]');
    let confirmPassword = form.querySelector('[name=password_2]');

    if (firstname.value.length == 0) {
        errors.push('Не указано имя');
    }

    if (email.value.length == 0) {
        errors.push('Не указана электронная почта');
    }

    if (password.value.length == 0) {
        errors.push('Не указан пароль');
    } else if (password.value.length < 8) {
        errors.push('Пароль не должен быть короче 8 символов');
    } else if (password.value != confirmPassword.value) {
        errors.push('Повторный ввод пароля неверный');
    }

    errorsBlock.innerHTML = '';

    for (let i = 0; i < errors.length; i++)
    {
        errorsBlock.innerHTML += '<p style="color:red">' + errors[i] + '</p>';
    }

}

form.addEventListener('submit', (event) => {
    event.preventDefault();
    clearErrors();

    checkInputs();

    if (errorsBlock.innerHTML == ''){
        let formData = new FormData(form);
        let request = new XMLHttpRequest();

        request.open('POST', '../pages/register.php');

        request.send(formData);
    }
});


