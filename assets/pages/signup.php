<?php
    session_start();
    require "../includes/config.php";

    if($_POST){
        /*СОЗДАЕМ ФУНКЦИЮ КОТОРАЯ ДЕЛАЕТ ЗАПРОС НА GOOGLE СЕРВИС*/
        function getCaptcha($SecretKey) {
            $Response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$config['SECRET_KEY']."&response={$SecretKey}");
            $Return = json_decode($Response);
            return $Return;
        }

        /*ПРОИЗВОДИМ ЗАПРОС НА GOOGLE СЕРВИС И ЗАПИСЫВАЕМ ОТВЕТ*/
        $Return = getCaptcha($_POST['g-recaptcha-response']);
        /*ВЫВОДИМ НА ЭКРАН ПОЛУЧЕННЫЙ ОТВЕТ*/
        var_dump($Return);

        /*ЕСЛИ ЗАПРОС УДАЧНО ОТПРАВЛЕН И ЗНАЧЕНИЕ score БОЛЬШЕ 0,5 ВЫПОЛНЯЕМ КОД*/
        if($Return->success == true && $Return->score > 0.5){
            echo "Succes!";
        }
        else {
            echo "You are Robot";
        }
    }

    if ($_SESSION['user'])
    {
        //header('Location: /index.php');
        header('Location: /assets/pages/profile.php');
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Регистрация</title>

        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/header.css">

        <meta charset="UTF-8">
        <script src="../js/jquery-3.6.1.min.js"></script>
        <script src="https://www.google.com/recaptcha/enterprise.js?render=6LcrEkYjAAAAAMLRUgmMrD0-0wVgDFFjDaH7nLPR"></script>
        <script>
            grecaptcha.enterprise.ready(function() {
                grecaptcha.enterprise.execute('6LcrEkYjAAAAAMLRUgmMrD0-0wVgDFFjDaH7nLPR', {action: 'login'}).then(function(token) {
                ...
                });
            });
        </script>

    </head>
    <body>
    <?php
        include "../includes/header.php";
    ?>

        <div class="grid_area">
            <form name="reg_form">

                <label>Имя</label>
                <input type="text" name="first_name" placeholder="Введите своё имя" autofocus>

                <label>Электронная почта</label>
                <input type="email" name="email" placeholder="Введите адрес своей электронной почты">

                <label>Пароль</label>
                <input type="password" name="password" placeholder="Введите пароль">

                <label>Подтверждение пароля</label>
                <input type="password" name="password_2" placeholder="Повторно введите пароль">
                </p>

                <div class="g-recaptcha" data-sitekey="<?php echo $config['SITE_KEY'] ?>"></div>

                <button type="submit">Зарегистрироваться</button>
                <p class="p_reg">
                    У вас уже есть аккаунт? - <a href="signin.php" class="a_reg">авторизуйтесь</a>!
                </p>

                <div class="errors_block">

                </div>
            </form>

        </div>

    <script type="module" src="../js/reg.js"></script>

    </body>
</html>