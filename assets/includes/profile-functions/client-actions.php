<?php
    session_start();
    require_once '../config.php';
    require_once '../functions.php';

    error_reporting(-1);

    if (isset($_POST['client_action'])) {
        switch ($_POST['client_action']) {
            case 'show':



                $begin_date = date("Y.m.d", strtotime($_POST['begin-date']));
                $end_date = date("Y.m.d", strtotime($_POST['end-date']));
                $query = "";

                if (empty($begin_date) && empty($end_date)) {
                    $query = "SELECT * FROM `orders` WHERE `client_id` = ". $_SESSION['user']['id'];
                    debug('1');
                } elseif (empty($begin_date) && !empty($end_date)) {
                    $query = "SELECT * FROM `orders` WHERE `client_id` = ". $_SESSION['user']['id']." AND `ordering_time` <= '$end_date'";
                    debug('2');
                } elseif (empty($end_date) && !empty($begin_date)) {
                    $query = "SELECT * FROM `orders` WHERE `client_id` = ". $_SESSION['user']['id']." AND `ordering_time` >= '$begin_date'";
                    debug('3');
                } else {
                    $query = "SELECT * FROM `orders` WHERE `client_id` = ". $_SESSION['user']['id']." AND `ordering_time` BETWEEN '$begin_date' AND '$end_date'";
                    debug('4');
                }

                $result = mysqli_query($connection, $query);
                if ($result) {
                    $orders = mysqli_fetch_assoc($result);


                }



                break;

            case 'edit':


                break;

        }
    }

    mysqli_close($connection);
?>


