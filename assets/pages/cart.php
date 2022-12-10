<?php
    session_start();
    require_once "../includes/config.php";
//    include "../includes/cookie.php";
    require_once "../includes/functions.php";
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/header.css">

<!--        <script type="text/javascript" src="/assets/js/jquery-3.6.1.min.js"></script>-->


        <title>Корзина</title>
    </head>
    <body>
        <?php
            include "../includes/header.php";
        ?>

        <div class="grid_area">
            <?php
                debug($_SESSION['cart']);
            ?>
        </div>
<!--        <script type="text/javascript" src="/assets/js/cart.js"></script>-->
    </body>
</html>