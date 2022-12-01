<?php
    session_start();
    session_destroy();

    setcookie('login', '', time() - 86400);
    setcookie('key', '',  time() - 86400);

    header('Location: /index.php');
?>
