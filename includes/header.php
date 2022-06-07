<header id="header">
    <div class="header__top">
        <div class="container">
            <div class="header__top__logo">
                <h1><?php echo $config['title']; ?></h1>
            </div>
            <nav class="header__top__menu">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/pages/about_me.php">Обо мне</a></li>
                    <li><a href=<?php echo $config['vk_url']; ?> target="_blank">Я Вконтакте</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <?php
        $categories = mysqli_query($conn, 'select * from `articles_categories`');

        // Need for defining post categorie 
        $categories_id = [];
    ?>

    <div class="header__bottom">
        <div class="container">
            <nav>
                <ul>
                    <?php

                        // Header categories output
                        while ($categorie = mysqli_fetch_assoc($categories)) {
                            echo "<li><a href='/articles.php?id={$categorie['id']}'>{$categorie['title']}</a></li>";
                            $categories_id[$categorie['id']] = $categorie['title'];
                        }
                    ?>
                </ul>
            </nav>
        </div>
    </div>
</header>