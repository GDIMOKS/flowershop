export let clearErrors = function (form) {
    let errors = form.querySelectorAll('.error');

    for (let i = 0; i < errors.length; i++)
        errors[i].remove();
}

export let checkName = function (firstname, errors) {
    let nameErrors = [];

    if (firstname.value.length == 0) {
        nameErrors.push('Не указано имя');
    } else {
        let regExp = /^[А-Яа-яЁё' .(),-]+$/g;
        if (!regExp.exec(firstname.value)) {

            nameErrors.push('Имя может содержать только кириллицу, пробел и следующие символы: \' , \( \) \. -');
        }
    }

    errors = changeColor(firstname, nameErrors, errors);

    return errors;
}

export let changeColor = function (element, elementErrors, errors) {
    if (elementErrors.length == 0) {
        element.style.borderColor = '#e3e3e3';
        element.style.backgroundColor = '#fcfcfc';
    } else {
        errors.push(elementErrors);
        element.style.borderColor = 'red';
        element.style.backgroundColor = '#FF000009  ';
    }

    return errors;
}

export let checkEmail = function (email, errors) {
    let emailErrors = [];

    if (email.value.length == 0) {
        emailErrors.push('Не указана электронная почта');
    }

    errors = changeColor(email, emailErrors, errors);

    return errors;
}



export let generateErrors = function (errorsBlock, errors) {
    errorsBlock.innerHTML = '';

    for (let i = 0; i < errors.length; i++)
    {
        errorsBlock.innerHTML += '<p style="color:red">' + errors[i] + '</p>';
    }
}








