<?php
require_once '../includes/config.php';
require_once '../includes/db.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $config['title']; ?></title>

    <!-- Bootstrap Grid -->
    <link rel="stylesheet" type="text/css" href="../media/assets/bootstrap-grid-only/css/grid12.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Custom -->
    <link rel="stylesheet" type="text/css" href="../media/css/style.css">
</head>

<body>

    <div id="wrapper">

        <?php require_once '../includes/header.php'; ?>

        <?php
        $article = mysqli_query($conn, 'select * from `articles` where `id` = ' . (int)$_GET['id']);

        if (mysqli_num_rows($article) <= 0) {
        ?>
            <div id="content">
                <div class="container">
                    <div class="row">
                        <section class="content__left col-md-8">
                            <div class="block">
                                <h3>Статья не найдена</h3>
                                <div class="block__content">
                                    <div class="full-text">
                                        Неть(
                                    </div>

                                </div>
                            </div>

                        </section>
                        <section class="content__right col-md-4">
                            <!-- sidebar -->
                            <?php require_once '../includes/sidebar.php'; ?>
                        </section>
                    </div>
                </div>
            </div>
        <?php
        } else {
            $art = mysqli_fetch_assoc($article);
            mysqli_query($conn, 'update `articles` set `views` = `views` + 1 where `id` = ' . (int) $art['id']);
        ?>
            <div id="content">
                <div class="container">
                    <div class="row">
                        <section class="content__left col-md-8">
                            <div class="block">
                                <h3><?php echo $art['title']; ?></h3>
                                <div class="block__content">
                                    <img src="images/<?php echo $art['image_path']; ?>" style="max-width: 100%;">
                                    <p>Views: <?php echo $art['views']; ?></p>
                                    <?php echo $art['text']; ?>
                                </div>
                            </div>

                        </section>
                        <section class="content__right col-md-4">
                            <!-- sidebar -->
                            <?php require_once '../includes/sidebar.php'; ?>
                        </section>
                    </div>
                </div>
            </div>

        <?php
        }
        ?>

        <div class="block">
            <h3>Комментарии</h3>
            <div class="block__content">
                <div class="articles articles__vertical">

                    <?php
                    $comments = mysqli_query($conn, "select * from `comments` where `article_id` = " . (int) $art['id'] . ' order by `id` desc');


                    // Comments output
                    while ($comment = mysqli_fetch_assoc($comments)) {
                    ?>
                        <article class="article">
                            <div class="article__image"></div>
                            <div class="article__info">
                                <h3><?php echo $comment['author']; ?></h3>
                                <div class="article__info__meta"></div>
                                <div class="article__info__preview"><?php echo $comment['text']; ?></div>
                            </div>
                        </article>
                        <hr>
                    <?php
                    }
                    ?>

                </div>
            </div>

            <div id="comment-add-form" class="block">
                <h3>Добавить комментарий</h3>
                <div class="block__content">
                    <form class="form" method="POST" action="article.php?id=<?php echo $art['id']; ?>#comment-add-form">
                        <?php
                        if (isset($_POST['do_post'])) {
                            $errors = [];
                            if ($_POST['name'] === '') {
                                $errors[] = 'Введите имя!';
                            }

                            if ($_POST['nickname'] === '') {
                                $errors[] = 'Введите никнейм!';
                            }

                            if ($_POST['email'] === '') {
                                $errors[] = 'Введите email!';
                            }

                            if ($_POST['text'] === '') {
                                $errors[] = 'Введите текст комментария!';
                            }

                            if (empty($errors)) {
                                // Add comment
                                mysqli_query($conn, "insert into `comments` (`author`, `text`, `article_id`) values ('{$_POST['nickname']}', '{$_POST['text']}', '{$art['id']}');");

                                echo "<span style='color: green;'>Комментарий добавлен!</span><hr>";
                                unset($_POST);
                            }
                            else {
                                // Output errors
                                echo "<span style='color: red;'>{$errors[0]}</span><hr>";
                            }
                        }
                        ?>
                        <div class="form__group">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="name" class="form__control" placeholder="Имя" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="nickname" class="form__control" placeholder="Никнейм" value="<?php if(isset($_POST['nickname'])) echo $_POST['nickname']; ?>">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="email" class="form__control" placeholder="Email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form__group">
                            <textarea class="form__control" name="text" placeholder="Текст комментария..."><?php if(isset($_POST['text'])) echo $_POST['text']; ?></textarea>
                        </div>
                        <div class="form__group">
                            <input type="submit" name="do_post" value="Добавить комментарий" class="form__control">
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <?php require_once '../pages/footer.php'; ?>

    </div>

</body>

</html>