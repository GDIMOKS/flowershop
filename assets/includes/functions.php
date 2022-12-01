<?php
    function generateSalt() {
        $salt = '';
        $saltLength = 60; //длина соли
        for($i = 0; $i < $saltLength; $i++) {
            $salt .= chr(mt_rand(33, 126)); //символ из ASCII-table
        }
        return $salt;
    }

    function updateCookie($connection) {
        session_start();

        $key = generateSalt();
        setcookie('login', $_SESSION['user']['email'], time() + 86400);
        setcookie('key', $key,  time() + 86400);

        $query = "UPDATE `user` SET `cookie`='".$key."' WHERE `email`='".$_SESSION['user']['email']."'";
        mysqli_query($connection, $query);
    }