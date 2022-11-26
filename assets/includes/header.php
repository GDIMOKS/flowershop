
<header>
        <div class="header_up">
            <nav>

            </nav>
        </div>

        <div class="header_middle">
            <nav>
                <ul>
                    <li>
                        <a href="/">
                            <p class="logo">
                                МАГАЗИН ЦВЕТОВ
                            </p>
                        </a>
                    </li>

                    <li>
                        <p class="header_middle_text">
                            Принимаем заказы круглосуточно!
                        </p>
                    </li >

                    <li>
                        <?php
                            if ($_SESSION['user'])
                            {
                        ?>
                        <div class="dropdown">
                            <a class="cabinet_button" onclick="showMenu()">
                                <p class="cabinet_button_text">
                                    <?php echo $_SESSION['user']['first_name']; ?>
                                </p>
                                <img src="/assets/media/cabinet_ico.svg" class="cabinet_button_image">
                            </a>
                            <div id="menu" class="dropdown-content">
                                <a href="/assets/pages/profile.php">Личный кабинет</a>
                                <a href="/assets/includes/logout.php">Выйти из аккаунта</a>
                            </div>
                        </div>

                        <?php
                            } else {
                        ?>
                        <a class="cabinet_button" href="/assets/pages/signin.php">
                            <p class="cabinet_button_text">
                                Войти
                            </p>
                            <img src="/assets/media/cabinet_ico.svg" class="cabinet_button_image" >
                        </a>
                        <?php
                            }
                        ?>
                    </li>
                </ul>
            </nav>
        </div>

        <?php
            $categories_q = mysqli_query($connection, "SELECT * FROM `category` ");
        ?>
        <div class="header_down">

            <nav>
                <ul class="my_ul">
                    <?php
                    while ($category = mysqli_fetch_assoc($categories_q))
                    {
                        ?>
                        <li class="my_li">
                            <a class="header_text" href="/"><?php echo $category['name'] ?></a>
                        </li>
                        <?php

                    }
                    ?>

                </ul>
            </nav>

        </div>



</header>
<script type="text/javascript" src="/assets/js/dropdownMenu.js"></script>