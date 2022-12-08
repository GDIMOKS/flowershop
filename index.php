<?php
    session_start();
    require_once "assets/includes/config.php";
    include_once "assets/includes/cookie.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $config['title']; ?></title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="assets/css/product.css">

    <meta charset="UTF-8">

    <script type="text/javascript" src="/assets/js/jquery-3.6.1.min.js"></script>

</head>
    <body>
        <?php
        include "assets/includes/header.php";
        ?>
        <div class="grid_area">

            <div class="products">


                    <?php

                        $query = "SELECT * FROM `product`";
                        $products = mysqli_query($connection, $query);

                        while ($product = mysqli_fetch_assoc($products)) {
                            ?>
                            <div class="product">
                                <div class="product_image" style="background-image: url(/assets/media/<?php echo $product['image'] ?>);">
                                </div>

                                <div class="product_info">
                                    <a class="product_name" href="#"><?php echo $product['name'] ?></a>

                                    <div class="product_price">
                                        <?php echo $product['sell_price'] ?> ₽
                                    </div>

                                    <a class="product_button" onclick="<?php addToCart($product); ?>">Добавить в корзину</a>
                                </div>




                            </div>
                    <?php
                        }
                    ?>
            </div>



        </div>

        <?php
        include "assets/includes/footer.php";
        ?>

    </body>

</html>
<?php

    mysqli_close($connection);

?>
