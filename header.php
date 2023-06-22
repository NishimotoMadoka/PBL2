<?php
require_once __DIR__ . '/pre.php';
$url = $_SERVER['REQUEST_URI'];
if (($name == "no_login" && !strstr($url, 'login.php')) && ($name == "no_login" && !strstr($url, 'signup.php'))) {
  header("Location:$login_php");
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>FACT</title>
  <link rel="stylesheet" href="<?= $frame_css ?>">
  <link rel="stylesheet" href="<?= $anime_css ?>">
</head>

<body>
  <!-- header部分 -->
  <header>
  <div class="top-info">
      <a href="<?= $toppage_php ?>">
        <div class="logo_img"><img src=<?php echo $logo_img ?> alt="FACT"></div>
      </a>
    </div>
    <nav>
      <ul class="nav-list">
        <li class="nav-list-item">
          <?php
          if ($name == "no_login") {
            echo '<li class="nav-list-item"><a class="fa-solid fa-user-plus" href="' . $signup_php . '"> 新規登録</a></li>';
            echo '<li class="nav-list-item"><a class="fa-solid fa-right-to-bracket" href="' . $login_php . '"> ログイン</a></li>';
          } else {
            echo '<li class="nav-list-item"><a class="fa-solid fa-address-card" href="' . $mypage_php . '"> マイページ</a></li>';
            echo '<li class="nav-list-item"><a class="fa-solid fa-pen" href="' . $post_php . '"> 記事・作品</a></li>';
            echo '<li class="nav-list-item"><a class="fa-solid fa-right-from-bracket" href="' . $logout_php . '"> ログアウト</a></li>';
          }
          ?>
        </li>
      </ul>
    </nav>
  </header>
