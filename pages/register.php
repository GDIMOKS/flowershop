<?php
    require "../includes/config.php";

    $firstname = $_POST['first_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['password_2'];


    $result = mysqli_query($connection, "INSERT INTO `user` (`first_name`, `role_id`, `email`, `password`) VALUES ('$firstname', '2', '$email', '$password')");

    echo "INSERT INTO `user` (`first_name`, `role_id`, `email`, `password`) VALUES ($firstname, 2, $email, $password)";
?>


// авторизация, сессия и куки, шифрование пароля, проверка на символы и инъекции