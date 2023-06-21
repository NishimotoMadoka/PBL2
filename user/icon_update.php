<?php
session_start();
require_once __DIR__ . '/../header.php';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>アイコン変更</title>
    <link rel="stylesheet" href="<?= $update_css ?>">
</head>

<div class="profile" align="center">
<form method="POST" action="./icon_update_db.php" enctype="multipart/form-data">
  <h3>アイコン変更</h3>
  <div>
    <dl class="inline">
    <dd>アイコン：<input type="file" name="up_icon" accept="image/*"></dd>
    </dl>
    <br>
    <div class="update">
        <input type="submit" value="変更" class="button">
    </div>
    <br>
    <a href="../user/user_show.php">ユーザー詳細へ戻る</a>
  </div>
</form>
</div>
</html>