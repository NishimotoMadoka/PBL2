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
        <label class="label_left" for="number">日付</label>
        <input class="form-text" type="date" name="date" id="item_name" placeholder="日付"><br>
    </div>
    <?php
        $count=1;
        for($count=1; $count<11 ;$count++){
    ?>
            <div class="item">
                <label class="label_left" for="number">項目</label>
                <input class="form-text" type="text" name="item_name<?=$count?>" id="item_name" placeholder="項目" maxlength="8"><br>
            </div>
            <div class="item">
                <label class="label_left" for="number">開始時間</label>
                <input class="form-text" type="time" step="300" name="start_time<?=$count?>" id="start_time" placeholder="開始時間"><br>
            </div>
            <div class="item">
                <label class="label_left" for="number">終了時間</label>
                <input class="form-text" type="time" step="300" name="end_time<?=$count?>" id="end_time" placeholder="終了時間"><br>
            </div>
    <?php
        }
    ?>
    <!-- 時間とか投稿する方に移植する -->
    <div class="image_select">
        今日の画像：<input type="file" name="up_image" accept="image/*">
    </div>
    <div class="item">
        <input type="submit" value="送信" class="button"><input type="reset" value="リセット" class="button">
    </div>
</form>
</main>
<?php
require_once __DIR__ . '/../footer.php';
?>