<?php
    session_start();
    require "../includes/config.php";
    include "../includes/cookie.php";
    require_once "../includes/functions.php";

    if (empty($_SESSION['auth']) || $_SESSION['auth'] == false)
    {
        //header('Location: /index.php');
        header('Location: /assets/pages/signin.php');
    }
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/header.css">
    <title>Личный кабинет</title>
</head>
<body>
    <?php
    include "../includes/header.php";
    ?>

    <div class="grid_area">
        <?php
            debug($_SESSION);
        ?>

    </div>

</body>
</html>
