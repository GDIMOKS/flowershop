<?php

    $connection = mysqli_connect('localhost', 'root', 'root', 'flowershop');

    if ($connection == false)
    {
        echo 'Не удалось подключиться к базе данных';
        echo mysqli_connect_error();
        exit();
    }

    $result = mysqli_query($connection, "SELECT * FROM `role`");

    $r1 = mysqli_fetch_assoc($result);

    while ( ($record = mysqli_fetch_assoc($result)) )
    {
        print_r($r1);
        echo '<hr>';
    }
    mysqli_close($connection);

    mail('gdimoks@mail.ru', 'test', 'test');
?>
