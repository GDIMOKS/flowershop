<?php
    session_start();
    require_once '../config.php';
    require_once '../functions.php';

    error_reporting(-1);
//
//    if (empty($_SESSION['user']['role_id']) || $_SESSION['user']['role_id'] != '3') {
//        header('Location: /assets/pages/profile.php');
//        debug($_SESSION['user']['role_id']);
//    }

    if (isset($_POST['seller_action'])) {
        switch ($_POST['seller_action']) {
            case 'delete':
                $query = "DELETE FROM `products` WHERE `id` =" . $_POST['id'];

                if ($result = !mysqli_query($connection, $query)) {
                    echo json_encode(['code' => 'error', 'answer' => $result]);

                } else {
                    echo json_encode(['code' => 'ok']);
                }
                break;

            case 'add':

                if (!empty($_FILES['image'])) {
                    $file_name = time() . $_FILES['image']['name'];
                    move_uploaded_file($_FILES['image']['tmp_name'], '../../media/' . $file_name);
                } else {
                    $file_name = 'no_image.jpg';
                }
                $title = $_POST['title'];
                $price = $_POST['price'];

                $query = "INSERT INTO `products` (`name`, `image`, `price`) VALUES ('$title', '$file_name', '$price')";

                $is_exist = get_objects_query("SELECT COUNT('id') AS `total_count` FROM `products` WHERE (`name` = '$title')");

                if ($is_exist[0]['total_count'] != 0) {
                    echo json_encode(['code' => 'error', 'message' => 'Такой товар уже существует!']);
                } else if ($result = !mysqli_query($connection, $query)) {
                    echo json_encode(['code' => 'error', 'message' => 'Ошибка во время добавления товара!']);

                } else {
                    $query = "SELECT * FROM `products` WHERE `name` = '$title'";
                    $result = get_objects_query($query);
                    foreach ($_POST['categories'] as $category) {
                        mysqli_query($connection, "INSERT INTO `product_category` (`product_id`, `category_id`) VALUES ('".$result['0']['id']."', '$category')");
                    }
                    echo json_encode(['code' => 'ok', 'message' => 'Товар успешно добавлен!']);
                }
                break;

            case 'update':

                break;
        }
    }

    mysqli_close($connection);
?>




