

let regForm = document.querySelector('[name=reg_form]');
let regErrorsBlock = regForm.querySelector('.errors_block');

let clearErrors = function (form) {
    let errors = form.querySelectorAll('.error');

    for (let i = 0; i < errors.length; i++)
        errors[i].remove();
}

let checkName = function (firstname) {
    let errors = [];

    if (firstname.length == 0) {
        errors.push('Не указано имя');
    } else {
        let regExp = /^[А-Яа-яЁё' .(),-]+$/g;
        if (!regExp.exec(firstname)) {

            errors.push('Имя может содержать только кириллицу, пробел и следующие символы: \' , \( \) \. -');
        }
    }
    return errors;
}

let checkEmail = function (email) {
    let errors = [];

    if (email.length == 0) {
        errors.push('Не указана электронная почта');
    }
    return errors;
}

let checkPassword = function (password, confirmPassword) {
    let errors = [];

    if (password.length == 0) {
        errors.push('Не указан пароль');
    } else if (password.length < 8) {
        errors.push('Пароль не должен быть короче 8 символов');
    } else if (password != confirmPassword) {
        errors.push('Повторный ввод пароля неверный');
    } else {
        if (!/(?=.*[0-9])/g.exec(password)) {
            errors.push('Пароль должен содержать минимум одну цифру');
        }
        if (!/(?=.*[!@#$%^&*])/g.exec(password)) {
            errors.push('Пароль должен содержать один из следующих спецсимволов: !@#$%^&*');
        }
        if (!/(?=.*[a-z])(?=.*[A-Z])/g.exec(password)) {
            errors.push('Пароль должен содержать только латинские буквы');
        }
        if (!/(?=.*[a-z])/g.exec(password)) {
            errors.push('Пароль должен содержать как минимум одну строчную букву');
        }
        if (!/(?=.*[A-Z])/g.exec(password)) {
            errors.push('Пароль должен содержать как минимум одну прописную букву');
        }

    }
    return errors;
}

let generateErrors = function (errorsBlock, errors) {
    errorsBlock.innerHTML = '';

    for (let i = 0; i < errors.length; i++)
    {
        errorsBlock.innerHTML += '<p style="color:red">' + errors[i] + '</p>';
    }
}

let checkRegInputs = function () {
    let errors = [];

    let firstname = regForm.querySelector('[name=first_name]').value;
    let email = regForm.querySelector('[name=email]').value;
    let password = regForm.querySelector('[name=password]').value;
    let confirmPassword = regForm.querySelector('[name=password_2]').value;

    errors.push(checkName(firstname));

    errors.push(checkEmail(email));

    errors.push(checkPassword(password, confirmPassword));

    generateErrors(regErrorsBlock, errors);

}

regForm.addEventListener('submit', (event) => {
    event.preventDefault();
    clearErrors(regForm);

    checkRegInputs();

    if (regErrorsBlock.innerHTML == ''){
        let formData = new FormData(regForm);
        let request = new XMLHttpRequest();

        request.open('POST', '../includes/register.php');
        request.responseType = 'json';
        request.onload = () => {
            if (request.status !== 200) {
                return;
            }

            let response = request.response;

            if (response.status == 'ERROR') {
                regErrorsBlock.innerHTML += '<p style="color:red">Пользователь с email <b>' + response.email + '</b> уже существует! </p>';
            }
            else
            {
                alert("Пользователь с email " + response.email + " успешно зарегистрирован!");
                regErrorsBlock.innerHTML += '<p style="color:green">Пользователь с email <b>' + response.email + '</b> успешно зарегистрирован! </p>';
            }

        }
        console.log(formData);
        request.send(formData);
    }
});
