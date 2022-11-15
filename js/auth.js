let form = document.querySelector('.auth_form');
let validateBtn = document.querySelector('.validate_button');


let errorsblock = document.querySelector('.errors_block');


let fields = form.querySelectorAll('input');

let name = form.querySelector('input[name=first_name]');
let email = form.querySelector('input[name=email]');
let password = form.querySelector('input[name=password]');
let confpassword = form.querySelector('input[name=password_2]');


let clearErrors = function ()
{
    errors = form.querySelectorAll('.error');

    for (let i = 0; i < errors.length; i++)
        errors[i].remove();
}


let addUser = function() {
    let errors = [];

    if (name.value.length == 0) {
        errors.push('Не указано имя');
    }

    if (email.value.length == 0) {
        errors.push('Не указана электронная почта');
    }

    if (password.value.length == 0) {
        errors.push('Не указан пароль');
    } else if (password.value.length < 8) {
        errors.push('Пароль не должен быть короче 8 символов');
    } else if (password.value != confpassword.value) {
        errors.push('Повторный ввод пароля неверный');
    }

    errorsblock.innerHTML = '';

    for (let i = 0; i < errors.length; i++)
    {
        errorsblock.innerHTML += '<p style="color:red">' + errors[i] + '</p>';
    }

    if (errorsblock.innerHTML == '')
    {
        // $(document).ready(function(){
        //     $('.auth_form').submit(function (e) {
        //         e.preventDefault();
        if (errors.length <= 0)
        {
            //validateBtn.setAttribute('disabled', '');
            $.ajax({
                // async: false,
                type: 'POST',
                url: '../includes/reg.php',
                data: {first_name: name.value, email: email.value, password: password.value},
                success: function (response)
                {
                    // var jsonData = JSON.parse(response);
                    //
                    // // user is logged in successfully in the back-end
                    // // let's redirect
                    // if (jsonData.success == "1")
                    // {
                    //     location.href = '../index.php';
                    // }
                    // else
                    // {
                    //     alert('Invalid Credentials!');
                    // }
                }
                //     });
                // });
            });
        }

    }
}

form.addEventListener('submit', function(event) {
    event.preventDefault();

    clearErrors();

    addUser();


})