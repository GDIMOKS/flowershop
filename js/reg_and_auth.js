export let clearErrors = function (form) {
    let errors = form.querySelectorAll('.error');

    for (let i = 0; i < errors.length; i++)
        errors[i].remove();
}

export let checkName = function (firstname) {
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

export let checkEmail = function (email) {
    let errors = [];

    if (email.length == 0) {
        errors.push('Не указана электронная почта');
    }
    return errors;
}

export let checkPassword = function (password, confirmPassword) {
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

export let generateErrors = function (errorsBlock, errors) {
    errorsBlock.innerHTML = '';

    for (let i = 0; i < errors.length; i++)
    {
        errorsBlock.innerHTML += '<p style="color:red">' + errors[i] + '</p>';
    }
}








