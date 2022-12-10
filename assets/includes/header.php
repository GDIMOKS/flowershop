<header>
<!--        <div class="header_up">-->
<!--            <nav>-->
<!--                <a href="/assets/pages/cart.php">Корзина</a>-->
<!--            </nav>-->
<!--        </div>-->



    <div class="header_middle">
        <nav>
            <ul>
                <li>
                    <a href="/">
                        <p class="logo">
                            МАГАЗИН ЦВЕТОВ
                        </p>
                    </a>
                    <a href="/assets/pages/cart.php" class="cart-button">
                        <span>Корзина</span>
                        <span id="cart-num"><?= $_SESSION['cart.count'] ?? 0 ?></span>
                    </a>
                </li>

                <li>
                    <div>

                    </div>
                    <?php if($_SESSION['auth'] == true): ?>
                        <div class="dropdown">
                            <a class="cabinet_button" onclick="showMenu()">
                                <p class="cabinet_button_text">
                                    <?=$_SESSION['user']['first_name'] ?>
                                </p>
                                <img src="/assets/media/cabinet_ico.svg" class="cabinet_button_image">
                            </a>
                            <div id="menu" class="dropdown-content">
                                <a href="/assets/pages/profile.php">Личный кабинет</a>
                                <a href="/assets/includes/logout.php">Выйти из аккаунта</a>
                            </div>
                        </div>

                    <?php else: ?>
                        <a class="cabinet_button" href="/assets/pages/signin.php">
                            <p class="cabinet_button_text">
                                Войти
                            </p>
                            <img src="/assets/media/cabinet_ico.svg" class="cabinet_button_image" >
                        </a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </div>

    <?php
        $categories = get_objects('categories');
    ?>
    <div class="header_down">

        <nav>
            <ul class="my_ul">
                <?php foreach ($categories as $category): ?>
                    <li class="my_li">
                        <a class="header_text" href="/assets/pages/categories.php?category=<?=$category['id']?>"><?= $category['name'] ?></a>
                    </li>
                <?php endforeach; ?>

            </ul>
        </nav>

    </div>



</header>
<script type="text/javascript" src="/assets/js/dropdownMenu.js"></script>