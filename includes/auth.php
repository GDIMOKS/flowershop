<?php
    session_start();
    require "../includes/config.php";

    $email =  htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);

    $query = "SELECT * FROM `user` WHERE `email` = '$email'";
    $user = mysqli_query($connection, $query);
    $userResult = mysqli_fetch_assoc($user);

    $dbPassword = $userResult['password'];
    $output = [];

    if (password_verify($password, $dbPassword)) {
        $_SESSION['user'] =[
            "id" => $userResult['id'],
            "first_name" => $userResult['first_name'],
            "last_name" => $userResult['last_name'],
            "patronymic_name" => $userResult['patronymic_name'],
            "role_id" => $userResult['role_id'],
            "email" => $userResult['email'],
            "phone" => $userResult['phone'],
            "birthday" => $userResult['birthday']
        ];
        $_SESSION['message'] = 'Здравствуйте, ' . $_SESSION['first_name'] . '!';
        $output = ['status' => 'OK', 'message' => $_SESSION['message']];
    } else {
        $_SESSION['message'] = 'Неправильные логин или пароль!';
        $output = ['status' => 'ERROR', 'message' => $_SESSION['message']];
    }

    exit(json_encode($output));

?>