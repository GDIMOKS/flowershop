<?php
    require "../includes/config.php";
    session_start();
if ($_SESSION['user'])
{
//    header('Location: profile.php');
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Авторизация</title>

        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/header.css">


    </head>
    <body>
        <?php
            include "../includes/header.php";
        ?>

        <div class="grid_area">
            <div>
                <form name="auth_form">


                    <label>Электронная почта</label>
                    <input type="email" name="email" placeholder="Введите свой email" autofocus>

                    <label>Пароль</label>
                    <input type="password" name="password" placeholder="Введите пароль">


                    <button type="submit">Авторизоваться</button>

                    <p class="p_reg">
                        У вас нет аккаунта? - <a href="signup.php" class="a_reg">зарегистрируйтесь</a>!
                    </p>

                    <div class="errors_block">
                        <?php
//                        if ($_SESSION['message'])
//                        {
//                            echo '<p class="errors_block_good">'.$_SESSION['message']. '</p>';
//                        }
                        unset($_SESSION['message']);
                        ?>
                    </div>

                </form>

            </div>


        </div>

        <script type="module" src="../js/auth.js"></script>
    </body>
</html>
