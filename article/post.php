<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
?>

<main>

<?php
if (isset($_SESSION['post_error'])) {
    echo '<p class="error_class">' . $_SESSION['post_error'] . '</p>';
    unset($_SESSION['post_error']);
}
?>

<link rel="stylesheet" href="<?= $post_css ?>">
<form class="form" method="POST" action="./post_db.php"  enctype="multipart/form-data">
    <div class="item">
        <label class="label_left" for="num">タイトル</label>
        <input class="form-text" type="text" name="title" id="title" placeholder="夢日記タイトル" maxlength="50"><br>
    </div>
    
    <div class="item">
        <label class="label_left" for="num1">夢日記</label>
        <textarea class="form-text1" id="" name="diary" placeholder="本夢日記本文" maxlength="3500" required></textarea>
    </div>
    <!-- 時間とか投稿する方に移植する -->
    <!-- <div class="image_select">
        今日の画像：<input type="file" name="up_image" accept="image/*">
    </div> -->
    <div class="item">
        <input type="submit" value="送信" class="button"><input type="reset" value="リセット" class="button">
    </div>
</form>
</main>
<?php
require_once __DIR__ . '/../footer.php';
?>