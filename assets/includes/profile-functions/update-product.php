<?php
    require_once '../config.php';
    require_once '../functions.php';


    $products = get_objects('products');
//    foreach ($products as $product) {
//        $query = "SELECT `categories`.`id`, `categories`.`name`, COALESCE(`product_category`.`product_id`, 0) AS product_id FROM `categories` LEFT OUTER JOIN `product_category` ON `categories`.`id` = `product_category`.`category_id` WHERE product_category.product_id = ".$product['id']." OR `product_category`.`product_id` IS NULL";
//
//        $result = mysqli_query($connection, $query);
////        print_r($result);
//        $categories = mysqli_fetch_assoc($result);
//
//            debug($categories);
//
//    }

$query = "SELECT `categories`.`id`, `categories`.`name`, COALESCE(`product_category`.`product_id`, 0) AS product_id FROM `categories` LEFT OUTER JOIN `product_category` ON `categories`.`id` = `product_category`.`category_id` WHERE `product_category`.`product_id` = '14' OR `product_category`.`product_id` IS NULL";

$result = mysqli_query($connection, $query);
//        print_r($result);
$categories = mysqli_fetch_assoc($result);

debug($categories);


?>


