<?php
session_start();
require "../includes/config.php";

if ($_SESSION['user'])
{
    header('Location: profile.php');
}
?>
<pre>
    <?php
    print_r($_SESSION[user]);
    ?>
</pre>

<!DOCTYPE html>
<html>
    <head>
        <title>Регистрация</title>

        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/header.css">

        <meta charset="UTF-8">
        <script src="../js/jquery-3.6.1.min.js"></script>
    </head>
    <body>
    <?php
        include "../includes/header.php";
    ?>

        <div class="grid_area">
            <form name="reg_form">
                <div class="errors_block">

                </div>
                <label>Имя</label>
                <input type="text" name="first_name" placeholder="Введите своё имя" autofocus>

                <label>Электронная почта</label>
                <input type="email" name="email" placeholder="Введите адрес своей электронной почты">

                <label>Пароль</label>
                <input type="password" name="password" placeholder="Введите пароль">

                <label>Подтверждение пароля</label>
                <input type="password" name="password_2" placeholder="Повторно введите пароль">
                </p>

                <button type="submit">Зарегистрироваться</button>
                <p class="p_reg">
                    У вас уже есть аккаунт? - <a href="signin.php" class="a_reg">авторизуйтесь</a>!
                </p>
            </form>

        </div>

    <script type="module" src="../js/reg.js"></script>

    </body>
</html>