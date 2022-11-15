<?php
    require "../includes/config.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Авторизация</title>

        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/auth.css">
        <meta charset="UTF-8">

    </head>
    <body>
        <?php
            include "../includes/header.php";
        ?>

        <div class="grid_area">
            <div class="auth_form">
                <form action="/login.php" method="POST">
                    <p>
                    <p><strong>Ваш email</strong></p>
                    <input type="text" name="email">
                    </p>

                    <p>
                    <p><strong>Ваш пароль</strong></p>
                    <input type="text" name="password">
                    </p>

                    <p>
                        <button type="submit">Авторизироваться</button>
                    </p>

                </form>
                <a href="signup.php">
                    <button>Зарегистрироваться</button>
                </a>
            </div>

        </div>


    </body>
</html>
