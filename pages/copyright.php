<?php
require_once '../includes/config.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $config['title']; ?></title>

    <!-- Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>

<body>

    <div id="wrapper">

        <?php require_once '../includes/header.php'; ?>

        <div id="content">
            <div class="container">
                <div class="row">
                    <section class="content__left col-md-8">
                        <div class="block">
                            <h3>Копирайт</h3>
                            <div class="block__content">
                                <div class="full-text">
                                    Текст о копирайте
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="content__right col-md-4">
                        <!-- sidebar -->
                        <?php require_once '../includes/sidebar.php'; ?>

                        <div class="block">
                            <h3>Комментарии</h3>
                            <div class="block__content">
                                <div class="articles articles__vertical">

                                    <article class="article">
                                        <div class="article__image" style="background-image: url(/media/images/post-image.jpg);"></div>
                                        <div class="article__info">
                                            <a href="#">Jonny Flame</a>
                                            <div class="article__info__meta">
                                                <small><a href="#">Название статьи #1</a></small>
                                            </div>
                                            <div class="article__info__preview">Бла бла бла бла бла бла бла, и думаю еще что бла бла бла бла бла бла бла ...</div>
                                        </div>
                                    </article>

                                    <article class="article">
                                        <div class="article__image" style="background-image: url(/media/images/post-image.jpg);"></div>
                                        <div class="article__info">
                                            <a href="#">Jonny Flame</a>
                                            <div class="article__info__meta">
                                                <small><a href="#">Название статьи #1</a></small>
                                            </div>
                                            <div class="article__info__preview">Бла бла бла бла бла бла бла, и думаю еще что бла бла бла бла бла бла бла ...</div>
                                        </div>
                                    </article>

                                    <article class="article">
                                        <div class="article__image" style="background-image: url(/media/images/post-image.jpg);"></div>
                                        <div class="article__info">
                                            <a href="#">Jonny Flame</a>
                                            <div class="article__info__meta">
                                                <small><a href="#">Название статьи #1</a></small>
                                            </div>
                                            <div class="article__info__preview">Бла бла бла бла бла бла бла, и думаю еще что бла бла бла бла бла бла бла ...</div>
                                        </div>
                                    </article>

                                    <article class="article">
                                        <div class="article__image" style="background-image: url(/media/images/post-image.jpg);"></div>
                                        <div class="article__info">
                                            <a href="#">Jonny Flame</a>
                                            <div class="article__info__meta">
                                                <small><a href="#">Название статьи #1</a></small>
                                            </div>
                                            <div class="article__info__preview">Бла бла бла бла бла бла бла, и думаю еще что бла бла бла бла бла бла бла ...</div>
                                        </div>
                                    </article>

                                    <article class="article">
                                        <div class="article__image" style="background-image: url(/media/images/post-image.jpg);"></div>
                                        <div class="article__info">
                                            <a href="#">Jonny Flame</a>
                                            <div class="article__info__meta">
                                                <small><a href="#">Название статьи #1</a></small>
                                            </div>
                                            <div class="article__info__preview">Бла бла бла бла бла бла бла, и думаю еще что бла бла бла бла бла бла бла ...</div>
                                        </div>
                                    </article>

                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <?php require_once 'footer.php'; ?>

    </div>

</body>

</html>