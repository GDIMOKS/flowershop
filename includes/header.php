<header>
        <div class="header_up">
            <nav>

            </nav>
        </div>

        <div class="header_middle">
            <nav>
                <ul class="header_middle_ul">
                    <li class="header_middle_li">
                        <p class="logo">
                            МАГАЗИН ЦВЕТОВ
                        </p>

                    </li>

                    <li class="header_middle_li">
                        <p class="header_middle_text">
                            Принимаем заказы круглосуточно!
                        </p>

                    </li >

                    <li class="header_middle_li">
                        <a class="cabinet_button" href="../pages/signin.php">
                            <p class="cabinet_button_text">
                                Войти
                            </p>
                            <img src="../media/cabinet_ico.svg" class="cabinet_button_image" >
                        </a>
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