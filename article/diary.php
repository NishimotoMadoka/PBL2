<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
?>

<main>

<?php
$post_date=$_POST['date'];
$article_id=$_POST['article_id'];
if (isset($_SESSION['diary_error'])) {
    $diary_error="<script type='text/javascript'>alert('". $_SESSION['diary_error'] ."');</script>";
    echo $diary_error;
    // echo '<p class="error_class">' . $_SESSION['diary_error'] . '</p>';
    unset($_SESSION['diary_error']);
}
?>

<link rel="stylesheet" href="<?= $post_css ?>">
<form class="form" method="POST" action="./diary_db.php"  enctype="multipart/form-data">
    <div class="item">
        <label class="label_left" for="number">投稿ID</label>
        <input class="form-text" type="text" name="article_id" value="<?=$article_id?>" readonly><br>
    </div>
    <div class="item">
        <label class="label_left" for="number">日付</label>
        <input class="form-text" type="date" name="date" value="<?=$post_date?>" readonly><br>
    </div>
    <div class="item">
        <label class="label_left" for="num">タイトル</label>
        <input class="form-text" type="text" name="title" id="title" placeholder="夢日記タイトル" maxlength="50"><br>
    </div>
    
    <div class="item">
        <label class="label_left" for="num1">夢日記</label>
        <textarea class="form-text1" id="" name="diary" placeholder="本夢日記本文" maxlength="3500" required></textarea>
    </div>
    <div class="item">
        <input type="submit" value="送信" class="button"><input type="reset" value="リセット" class="button">
    </div>
</form>
</main>
<?php
require_once __DIR__ . '/../footer.php';
?>