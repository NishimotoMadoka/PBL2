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
<div class="form-wrapper">
<form class="form" method="POST" action="./post_db.php"  enctype="multipart/form-data">
    
<div class="form-item">
        <div class="title">日付</div> 
        <input type="date" name="date" placeholder="日付"><br>
    </div>
    <?php
        $count=1;
        for($count=1; $count<11 ;$count++){
    ?>

<div class="form-item">
            <div class="item">
                <!-- <div class="title">項目</div> -->
                <input type="text" name="item_name<?=$count?>"  placeholder="項目" ></br>
            </div>
            <div class="item">
            <div class="title">開始時間</div>
                <input type="time" name="start_time<?=$count?>"  placeholder="開始時間"><br>
            </div>
            <div class="item">
            <div class="title">終了時間</div>
                <input  type="time"  name="end_time<?=$count?>"  placeholder="終了時間"><br>
            </div>
            <div class="end"></div>

    <?php
        }
    ?>
    <!-- 時間とか投稿する方に移植する -->
    <div class="image_select">
        今日の画像：<input type="file" name="up_image" accept="image/*">
    </div>
    <div class="button-panel">
        <input type="submit" class="button" value="送信"><input type="reset" value="リセット" class="button">
    </div>
</form>
</main>
<?php
require_once __DIR__ . '/../footer.php';
?>
