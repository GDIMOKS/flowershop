<?php
    session_start();
    require_once "assets/includes/config.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $config['title']; ?></title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <meta charset="UTF-8">

    <script type="text/javascript" src="/assets/js/jquery-3.6.1.min.js"></script>

</head>
    <body>
        <?php
        include "assets/includes/header.php";
        ?>
        <div class="grid_area">
        </div>

        <?php
        include "assets/includes/footer.php";
        ?>

    </body>

</html>
<?php

    $result = mysqli_query($connection, "SELECT * FROM `role`");

    $r1 = mysqli_fetch_assoc($result);

    mysqli_close($connection);

?>
