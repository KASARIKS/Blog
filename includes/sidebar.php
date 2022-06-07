<div class="block">
    <h3>Мы_знаем</h3>
    <div class="block__content">
        <script type="text/javascript" src="//ra.revolvermaps.com/0/0/6.js?i=02op3nb0crr&amp;m=7&amp;s=320&amp;c=e63100&amp;cr1=ffffff&amp;f=arial&amp;l=0&amp;bv=90&amp;lx=-420&amp;ly=420&amp;hi=20&amp;he=7&amp;hc=a8ddff&amp;rs=80" async="async"></script>
    </div>
</div>

<div class="block">
    <h3>Топ читаемых статей</h3>
    <div class="block__content">
        <div class="articles articles__vertical">

            <?php
            $articles = mysqli_query($conn, 'select * from `articles` order by `views` desc limit 5');
            ?>

            <?php

            // Posts output
            while ($article = mysqli_fetch_assoc($articles)) {
            ?>
                <article class="article">
                    <div class="article__image" style="background-image: url(/static/images/<?php echo $article['image_path'] ?>);"></div>
                    <div class="article__info">
                        <a href="../static/article.php?id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a>
                        <div class="article__info__meta">
                            <small>Категория: <a href="/articles.php?id=<?php echo $article['categories_id']; ?>"><?php echo $categories_id[$article['categories_id']]; ?></a></small>
                        </div>
                        <div class="article__info__preview"><?php echo mb_substr(strip_tags($article['text']), 0, 50, 'utf-8'); ?></div>
                    </div>
                </article>
            <?php
            }
            ?>

            <div class="block">
                <h3>Комментарии</h3>
                <div class="block__content">
                    <div class="articles articles__vertical">

                        <?php
                        $comments = mysqli_query($conn, "select * from `comments` order by `id` desc limit 5");

                        // Comments output
                        while ($comment = mysqli_fetch_assoc($comments)) {
                        ?>
                            <article class="article">
                                <div class="article__image"></div>
                                <div class="article__info">
                                    <h3><?php echo $comment['author']; ?></h3>
                                    <div class="article__info__meta"></div>
                                    <div class="article__info__preview"><?php echo mb_substr(strip_tags($comment['text']), 0, 50, 'utf-8'); ?></div>
                                </div>
                            </article>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>