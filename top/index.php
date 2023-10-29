<!-- ここから記事ループ -->
<?php foreach ($articles as $article) : ?>
    <article>
        <!-- 記事の内容を表示 -->

        <!-- いいねボタン -->
        <button name="like" data-article-id="<?php echo $article['article_id']; ?>">いいね</button>
        <!-- <span class="like-count">いいね数: <?php echo $article['likeCount']; ?></span> -->
    </article>
<?php endforeach; ?>
<!-- 記事ループ終了 -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="like.js"></script>
