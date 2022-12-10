<?php
    session_start();
    require_once './config.php';
    require_once './functions.php';

    error_reporting(-1);

    if (isset($_GET['cart'])) {
        switch ($_GET['cart']) {
            case 'add':
                $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
                $product = get_product($id);

                if (!$product) {
                    echo json_encode(['code' => 'error', 'answer' => 'Error product']);

                } else {
                    add_to_cart($product);

                    echo json_encode(['code' => 'ok', 'answer' => $product, 'total_count' => $_SESSION['cart.count'], 'count' => $_SESSION['cart'][$product['id']]['count']]);

                }

                break;

            case 'delete':
                $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
                $product = get_product($id);

                if (!$product) {
                    echo json_encode(['code' => 'error', 'answer' => 'Error product']);

                } else {
                    del_from_cart($product);
                    $count = $_SESSION['cart'][$product['id']]['count'] ?? 0;
                    echo json_encode(['code' => 'ok', 'answer' => $product, 'total_count' => $_SESSION['cart.count'] ?? 0, 'count' => $count]);
                }
                break;
        }
    }

//    debug($_SESSION['cart']);
?>

