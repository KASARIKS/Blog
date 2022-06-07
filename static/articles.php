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
                            <a href="/articles.php">Все записи</a>
                            <h3>Все статьи</h3>
                            <div class="block__content">
                                <div class="articles articles__horizontal">

                                    <?php
                                    // Pagination
                                    $per_page = 4;
                                    $page = 1;

                                    if (isset($_GET['id'])) {
                                        $page = (int) $_GET['id'];
                                    }

                                    $total_count_q = mysqli_query($conn, 'select count(`id`) as `total_count` from `articles`');
                                    $total_count = mysqli_fetch_assoc($total_count_q);
                                    $total_count = $total_count['total_count'];

                                    $total_pages = ceil($total_count / $per_page);
                                    if ($page <= 1 || $page > $total_pages) {
                                        $page = 1;
                                    }

                                    // Main formul
                                    $offset = ($per_page * $page) - $per_page;
                                    ?>

                                    <?php
                                    $articles = mysqli_query($conn, "select * from `articles` order by `id` desc limit $offset, $per_page");
                                    ?>

                                    <?php

                                    // Posts output
                                    $articles_exist = true;
                                    if (mysqli_num_rows($articles) <= 0) {
                                        echo 'Неть(';
                                        $articles_exist = false;
                                    }
                                    while ($article = mysqli_fetch_assoc($articles)) {
                                    ?>
                                        <article class="article">
                                            <div class="article__image" style="background-image: url(/static/images/<?php echo $article['image_path'] ?>);"></div>
                                            <div class="article__info">
                                                <a href="static/article.php?id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a>
                                                <div class="article__info__meta">
                                                    <small>Категория: <a href="/articles.php?id=<?php echo $article['categories_id']; ?>"><?php echo $categories_id[$article['categories_id']]; ?></a></small>
                                                </div>
                                                <div class="article__info__preview"><?php echo mb_substr(strip_tags($article['text']), 0, 9999999999, 'utf-8'); ?></div>
                                            </div>
                                        </article>
                                    <?php
                                    }

                                    ?>

                                </div>
                                <?php
                                if ($articles_exist) {
                                    echo '<div class="paginator">';
                                    if ($page > 1) {
                                        echo '<a href="articles.php?id=' . ($page - 1) . '">Прошлая страница</a>';
                                    }

                                    if ($page < $total_pages) {
                                        echo '<a href="articles.php?id=' . ($page + 1) . '">Следующая страница</a>';
                                    }

                                    echo '</div>';
                                }
                                ?>
                            </div>
                        </div>

                    </section>
                    <section class="content__right col-md-4">
                        <?php require_once '../includes/sidebar.php'; ?>


                    </section>
                </div>
            </div>
        </div>

        <?php require_once '../pages/footer.php'; ?>

    </div>

</body>

</html>