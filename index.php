<?php
    require_once "includes/config.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $config['title']; ?></title>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/header.css">
    <meta charset="UTF-8">

</head>
    <body>
        <?php
        include "includes/header.php";
        ?>


        <?php
        include "includes/footer.php";
        ?>
    </body>
</html>
<?php

    $result = mysqli_query($connection, "SELECT * FROM `role`");

    $r1 = mysqli_fetch_assoc($result);

    mysqli_close($connection);

?>
