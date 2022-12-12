<?php
    session_start();
    require_once "../includes/config.php";
    require_once "../includes/functions.php";
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/header.css">

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

    </body>
</html>

<?php
    mysqli_close($connection);
?>