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
    <!-- <link rel="stylesheet" href="<?= $update_css ?>"> -->
</head>
<?php
$user_show_id=$_SESSION['user_id'];
$user = new User();
$user_plofile = $user->detailsUser($user_show_id);

    $name=$user_plofile['name'];
    $mail=$user_plofile['mail'];
    $profile_comment = $user_plofile['profile_comment'];
    $password=$user_plofile['password'];
            
    if (isset($_SESSION['update_error'])) {
        echo '<p class="error_message">' . $_SESSION['update_error'] . '</p>';
        unset($_SESSION['update_error']);
    }
?>
<body>
<div class="profile" align="center">
<form method="POST" action="<?=$update_db_php?>">
  <h3>プロフィール</h3>
  <div>
    <dl class="inline">
      <dt>名前</dt>
      <dd><?= $name ?><br>
      <input type="name" name="newname"></dd>
      <dt>メールアドレス</dt>
      <dd>
        <td><?= $mail ?><br>
        <input type="mail" name="newmail">
      </dd>
      <dt>ひとこと</dt>
      <dd><?= $profile_comment ?><br>
      <input type="text" name="newprofile_comment">
    </dd>
      <dt>パスワード</dt>
      <dd>現在のパスワード：<input type="password" name="password" required><br>
      新しいパスワード：<input type="password" name="newpassword"></dd>
      新しいパスワード：<input type="password" name="newpassword_conf"></dd>
    </dl>
    <br>
    <div class="update">
        <input type="submit"  value="変更" class="button">
    </div>
    <br>
    <a href="./plofile.php">ユーザー詳細へ戻る</a>
  </div>
</form>
</div>
</body>
</html>