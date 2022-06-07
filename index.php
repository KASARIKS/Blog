<?php
require_once 'includes/config.php';
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
    <?php require_once 'includes/header.php'; ?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a href="/static/articles.php">Все записи</a>
              <h3>Новейшее_в_блоге</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php
                  $articles = mysqli_query($conn, 'select * from `articles` order by `id` desc limit 10');
                  ?>

                  <?php

                  // Posts output
                  while ($article = mysqli_fetch_assoc($articles)) {
                  ?>
                    <article class="article">
                      <div class="article__image" style="background-image: url(/static/images/<?php echo $article['image_path'] ?>);"></div>
                      <div class="article__info">
                        <a href="static/article.php?id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a>
                        <div class="article__info__meta">
                          <small>Категория: <a href="/articles.php?id=<?php echo $article['categories_id']; ?>"><?php echo $categories_id[$article['categories_id']]; ?></a></small>
                        </div>
                        <div class="article__info__preview"><?php echo mb_substr(strip_tags($article['text']), 0, 50, 'utf-8'); ?></div>
                      </div>
                    </article>
                  <?php
                  }
                  ?>

                </div>
              </div>
            </div>

            <div class="block">
              <a href="/articles.php?id=4">Все записи</a>
              <h3>Безопасность [Новейшее]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php
                  $articles = mysqli_query($conn, 'select * from `articles` where `categories_id` = 4 order by `id` desc limit 10');

                  // Posts output with security categorie
                  while ($article = mysqli_fetch_assoc($articles)) {
                  ?>
                    <article class="article">
                      <div class="article__image" style="background-image: url(/static/images/<?php echo $article['image_path'] ?>);"></div>
                      <div class="article__info">
                        <a href="static/article.php?id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a>
                        <div class="article__info__meta">
                          <small>Категория: <a href="/articles.php?id=<?php echo $article['categories_id']; ?>"><?php echo $categories_id[$article['categories_id']]; ?></a></small>
                        </div>
                        <div class="article__info__preview"><?php echo mb_substr(strip_tags($article['text']), 0, 50, 'utf-8'); ?></div>
                      </div>
                    </article>
                  <?php
                  }
                  ?>

                </div>
              </div>
            </div>

            <div class="block">
              <a href="/articles.php?id=2">Все записи</a>
              <h3>Программирование [Новейшее]</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                  <?php
                  $articles = mysqli_query($conn, "select * from `articles` where `categories_id` = 2 order by `id` desc limit 10");

                  // Posts output with programming categorie
                  while ($article = mysqli_fetch_assoc($articles)) {
                  ?>
                    <article class="article">
                      <div class="article__image" style="background-image: url(/static/images/<?php echo $article['image_path'] ?>);"></div>
                      <div class="article__info">
                        <a href="static/article.php?id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a>
                        <div class="article__info__meta">
                          <small>Категория: <a href="/articles.php?id=<?php echo $article['categories_id']; ?>"><?php echo $categories_id[$article['categories_id']]; ?></a></small>
                        </div>
                        <div class="article__info__preview"><?php echo mb_substr(strip_tags($article['text']), 0, 50, 'utf-8'); ?></div>
                      </div>
                    </article>
                  <?php
                  }
                  ?>

                </div>
              </div>
            </div>
          </section>
          <section class="content__right col-md-4">
            <?php require_once 'includes/sidebar.php'; ?>

            
          </section>
        </div>
      </div>
    </div>

    <?php require_once 'pages/footer.php'; ?>

  </div>

</body>

</html>