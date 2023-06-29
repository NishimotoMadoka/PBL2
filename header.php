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
        
          <?php
          if ($name == "no_login") {
            echo '<li class="nav-list-item"><a class="fa-solid fa-user-plus" href="' . $signup_php . '"> 新規登録</a></li>';
            echo '<li class="nav-list-item"><a class="fa-solid fa-right-to-bracket" href="' . $login_php . '"> ログイン</a></li>';
          } else {
            echo '<li class="nav-list-item"><a class="fa-solid fa-address-card" href="' . $mypage_php . '"> マイページ</a></li>';
            echo '<li class="nav-list-item"><a class="fa-solid fa-pen" href="' . $post_php . '"> 投稿</a></li>';
            echo '<li class="nav-list-item"><a class="fa-solid fa-right-from-bracket" href="' . $logout_php . '"> ログアウト</a></li>';
          }
          ?>
        
      </ul>
    </nav>
  </header>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script>
    var beforePos = 0;//スクロールの値の比較用の設定

//スクロール途中でヘッダーが消え、上にスクロールすると復活する設定を関数にまとめる
function ScrollAnime() {
    var elemTop = $('#area-2').offset().top;//#area-2の位置まできたら
  var scroll = $(window).scrollTop();
    //ヘッダーの出し入れをする
    if(scroll == beforePos) {
    //IE11対策で処理を入れない
    }else if(elemTop > scroll || 0 > scroll - beforePos){
    //ヘッダーが上から出現する
    $('#header').removeClass('UpMove'); //#headerにUpMoveというクラス名を除き
    $('#header').addClass('DownMove');//#headerにDownMoveのクラス名を追加
    }else {
    //ヘッダーが上に消える
        $('#header').removeClass('DownMove');//#headerにDownMoveというクラス名を除き
    $('#header').addClass('UpMove');//#headerにUpMoveのクラス名を追加
    }
    
    beforePos = scroll;//現在のスクロール値を比較用のbeforePosに格納
}


// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
  ScrollAnime();//スクロール途中でヘッダーが消え、上にスクロールすると復活する関数を呼ぶ
});

// ページが読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function () {
  ScrollAnime();//スクロール途中でヘッダーが消え、上にスクロールすると復活する関数を呼ぶ
});




//リンク先のidまでスムーススクロール
//※ページ内リンクを行わない場合は不必要なので削除してください
    var headerH = $("#header").outerHeight(true);//headerの高さを取得    
    $('#g-navi li a').click(function () {
  var elmHash = $(this).attr('href'); 
  var pos = $(elmHash).offset().top-headerH;//header分の高さを引いた高さまでスクロール
  $('body,html').animate({scrollTop: pos}, 1000);
  return false;
});
  </script>
</body>
