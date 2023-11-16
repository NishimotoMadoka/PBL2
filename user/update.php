<!-- 登録情報の変更 -->
<?php
session_start();
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../classes/user.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ユーザー情報変更</title>
    <link rel="stylesheet" href="<?= $up_css?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
</head>
<?php
$user_id=$_SESSION['user_id'];
$user = new User();
$user_plofile = $user->detailsUser($user_id);

    $name=$user_plofile['name'];
    $mail=$user_plofile['mail'];
    $profile_comment = $user_plofile['profile_comment'];
    $password=$user_plofile['password'];
            
    if (isset($_SESSION['update_error'])) {
        $update_error="<script type='text/javascript'>alert('". $_SESSION['update_error'] ."');</script>";
        echo $update_error;
        // echo '<p class="error_message">' . $_SESSION['update_error'] . '</p>';
        unset($_SESSION['update_error']);
    }
?>
<body>
<div class="box"> 
<form method="POST" action="<?=$update_db_php?>">
  <h1>プロフィール編集</h1>
    <hr>
  <div>
    <table>
        <tr><th>名前</th><th><input value="<?= $name ?>" type="name" name="newname"></th></tr>
        <tr><th>メールアドレス</th><th><input value="<?= $mail ?>" type="mail" name="newmail"></th></tr>
        <tr><th>ひとこと</th><th><input value="<?= $profile_comment ?>" type="textarea" name="newprofile_comment"></th></tr>
        <tr><th>現在のパスワード</th><th><input type="password" name="password" required></th></tr>
        <tr><th>新しいパスワード</th><th><input type="password" name="newpassword"></th></tr>
        <tr><th>新しいパスワードの再入力</th><th><input type="password" name="newpassword_conf"></th></tr>
    </table>
    <br>
    <div>
    <div>
        <input type="submit"  value="変更" class="btn">
    </div>
    </div>
    <br>
    <a href="./plofile.php" class="back">ユーザー詳細へ戻る</a>
  </div>
</form>
</div>
  </div>
</body>
</html>
