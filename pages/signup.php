<?php
require "../includes/config.php";
?>

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


    <form action="signup.php"method="POST" class="auth_form">
        <div class="errors_block">

        </div>
        <p>
            <p><strong>Имя</strong></p>
            <input type="text" name="first_name">
        </p>

        <p>
            <p><strong>Электронная почта</strong></p>
            <input type="text" name="email" >
        </p>

        <p>
            <p><strong>Пароль</strong></p>
            <input type="password" name="password" >
        </p>

        <p>
            <p><strong>Подтверждение пароля</strong></p>
            <input type="password" name="password_2" >
        </p>


            <button type="submit" name="do_signup" class="validate_button" >Зарегистрироваться</button>

    </form>
    <script type="text/javascript" src="../js/auth.js"></script>
</div>

?>
</body>
</html>