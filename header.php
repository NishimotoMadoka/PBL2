<?php
require_once __DIR__ . '/pre.php';
$url = $_SERVER['REQUEST_URI'];
// if (($name == "no_login" && !strstr($url, 'login.php')) && ($name == "no_login" && !strstr($url, 'signup.php'))) {
//   header("Location:$login_php");
// }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <header class="ng"></header>
  <meta charset="UTF-8">
  <title>FACT</title>
  <link rel="stylesheet" href="<?= $frame_css ?>">
  <link rel="stylesheet" href="<?= $anime_css ?>">
  
</head>

<body>
  <!-- header部分 -->
  <header class="ng"></header>
  <header id="scrollArea">
  <div class="top-info">
      <a href="<?= $toppage_php ?>">
        <div class="logo_img"><img src=<?php echo $logo_img ?> alt="FACT"></div>
      </a>
    </div>
    <nav>
      <ul class="nav-list">
        
          <?php
          if ($name == "") {
            echo '<li class="nav-list-item"><a class="fa-solid fa-user-plus" href="' . $signup_php . '"> 新規登録</a></li>';
            echo '<li class="nav-list-item"><a class="fa-solid fa-right-to-bracket" href="' . $login_php . '"> ログイン</a></li>';
          } else {
            echo '<li class="nav-list-item"><a class="fa-solid fa-address-card" href="' . $good_notification_php . '"> 🔔</a></li>';
            echo '<li class="nav-list-item"><a class="fa-solid fa-user-plus" href="' . $friend_list_php . '"> フレンド</a></li>';
            echo '<li class="nav-list-item"><a class="fa-solid fa-address-card" href="' . $mypage_php . '"> マイページ</a></li>';
            echo '<li class="nav-list-item"><a class="fa-solid fa-pen" href="' . $post_php . '"> 投稿</a></li>';
            echo '<li class="nav-list-item"><a class="fa-solid fa-right-from-bracket" href="' . $logout_php . '"> ログアウト</a></li>';
          }
          ?>
        
      </ul>
    </nav>
  </header>
  <script>
    var startPos = 0, winScrollTop = 0;
// scrollイベントを設定
window.addEventListener('scroll', function () {
    winScrollTop = this.scrollY;
    if (winScrollTop >= startPos) {
        // 下にスクロールされた時
        if (winScrollTop >= 200) {
            // 下に200pxスクロールされたら隠す
            document.getElementById('scrollArea').classList.add('hide');
        }
    } else {
        // 上にスクロールされた時
        document.getElementById('scrollArea').classList.remove('hide');
    }
    startPos = winScrollTop;
});
  </script>
</body>
