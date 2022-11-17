<?php
    require "./config.php";

    $firstname = trim($_POST['first_name']);
    $email =  htmlspecialchars(trim($_POST['email']));
    $password = trim($_POST['password']);
    $password = password_hash($password, PASSWORD_BCRYPT);

    $query = "SELECT COUNT(`id`) AS `total_count` 
                FROM `user` 
                WHERE (`email` = '$email')";

    $userExist = mysqli_query($connection, $query);
    $userCount = mysqli_fetch_assoc($userExist);
    $output = ['email' => $email];

    if ($userCount['total_count'] == 0) {
        $query = "INSERT INTO `user` (`first_name`, `role_id`, `email`, `password`) 
                    VALUES ('$firstname', '2', '$email', '$password')";

        $result = mysqli_query($connection, $query);
        $output += ['status' => 'OK'];
    } else {
        $output += ['status' => 'ERROR'];
    }
    exit(json_encode($output));
?>


// сессия и куки, капча
// авторизация, хеширование пароля, проверка на символы и инъекции