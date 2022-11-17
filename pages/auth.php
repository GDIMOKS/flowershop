<?php
    require "../includes/config.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Авторизация</title>

        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/header.css">
<!--        <link rel="stylesheet" href="../css/auth.css">-->
        <meta charset="UTF-8">

    </head>
    <body>
        <?php
            include "../includes/header.php";
        ?>

        <div class="grid_area">
            <div>
                <form name="auth_form">
                    <div class="errors_block">

                    </div>

                    <p>
                    <p><strong>Электронная почта</strong></p>
                    <input type="email" name="email">
                    </p>

                    <p>
                    <p><strong>Пароль</strong></p>
                    <input type="password" name="password">
                    </p>


                    <button type="submit">Авторизоваться</button>


                </form>
                <a href="signup.php">
                    <button>Зарегистрироваться</button>
                </a>
            </div>

        </div>

<!--        <script type="text/javascript" src="../js/reg_and_auth.js"></script>-->
        <script type="module" src="../js/auth.js"></script>
    </body>
</html>
