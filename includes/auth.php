<?php
    require "../includes/config.php";

    $email =  htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);

    $query = "SELECT * FROM `user` WHERE `email` = '$email'";
    $user = mysqli_query($connection, $query);
    $userResult = mysqli_fetch_assoc($user);

    $dbPassword = $userResult['password'];
    $output = [];

    if (password_verify($password, $dbPassword)) {
        $output = ['status' => 'OK', 'message' => 'Здравствуйте, '.$userResult['first_name'].'!'];
    } else {
        $output = ['status' => 'ERROR', 'message' => 'Неправильные логин или пароль!'];
    }

    exit(json_encode($output));

?>