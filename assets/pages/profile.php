<?php
    session_start();
    require "../includes/config.php";
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
        <pre>
            <?php
                print_r($_SESSION[user]);
            ?>
        </pre>

    </div>

</body>
</html>
