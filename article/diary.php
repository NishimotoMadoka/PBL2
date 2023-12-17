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

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
</head>

<link rel="stylesheet" href="<?= $diary_css ?>">
<div class="form-wrapper">
<form class="form" method="POST" action="./diary_db.php"  enctype="multipart/form-data">
        <input class="form-text" type="hidden" name="article_id" value="<?=$article_id?>" readonly><br>
    <div class="date-item">
        <input class="form-text-date" type="date" name="date" value="<?=$post_date?>" readonly><br>
    </div>
    <div class="item">
        <input class="form-text" type="text" name="title" id="title" placeholder="夢日記タイトル" maxlength="50"><br>
    </div>
    
    <div class="item">
        <textarea class="form-text1" id="" name="diary" placeholder="本夢日記本文" maxlength="5000" required></textarea>
    </div>
    <div class="button-panel">
        <input type="reset" value="リセット" class="btn-r">
        <input type="submit" value="送信　→" class="btn">
    </div>
<div>
</form>
</main>
<?php
require_once __DIR__ . '/../footer.php';
?>