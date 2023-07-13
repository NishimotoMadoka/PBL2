<?php
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../header.php';

// Postクラス、Userクラス
require_once __DIR__ . '/../classes/article_list.php';
require_once __DIR__ . '/../classes/user.php';
// if (isset($_GET['user_id'])) {
//   $user_id = $_GET['user_id'];
// } else {
//   $user_id = $_SESSION['user_id'];
// }
$friend_user_id=$_POST['user_id'];
if($friend_user_id==$_SESSION['user_id']){
    header('Location: mypage.php');
    exit();
}
$article = new Article();
$user = new User();


// ユーザー情報、投稿の抽出
$user_plofile = $user->detailsUser($friend_user_id);
$user_articles = $article->userArticles($friend_user_id);

?>

<head>
  <link rel="stylesheet" href="<?= $userpage_css ?>">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
  <script src="../js/test.js"></script>
</head>
<main>
 <div class="form-wrapper-icon">
  <!-- <div class="icon">  -->
    <?php
    if ($user_plofile['icon'] != "") {
    ?>
      <a href="./icon_update.php"><img class="user-icon" src="../icon_image/<?= $user_plofile['icon'] ?>" alt=""></a>
    <?php
    } else {
    ?>
      <img class="user-icon" src="<?=$default_icon?>" alt="">
    <?php
    }
    ?>
  </div>
  <!-- ユーザー情報 -->
  <div class="form-wrapper">
  <div class="profile" align="center">

    <h3>プロフィール</h3>
    <div>
      <dl class="inline">
      <div class="form-item">
        <table>
        <tr><th>名前</th><td><?= $user_plofile['name'] ?></td></tr>
        <tr><th>メールアドレス</th><td><?= $user_plofile['mail'] ?></td></tr>
        <tr><th>ひとこと</th><td><?= $user_plofile['profile_comment'] ?></td></tr>
        <!-- <tr><th>フレンドコード</th><td><?= $user_plofile['friend_code'] ?></td></tr> -->
  </table>
      </dl>
    </div>
  </div>


  <?php
//   if (!isset($_GET['user_id'])) {
  ?>
    <!-- <div class="update"> -->
    <!-- <div class="button-panel">
      <a href="<?=$update_php?>">
        <input type="submit" value="プロフィール編集" class="button">
      </a>
    </div> -->

    <!-- <div class="button-panel">
      <a href="./icon_update.php">
        <input type="submit" value="アイコン変更" class="button">
      </a>
    </div> -->

    <!-- <div class="friend"> -->
    <!-- <div class="button-panel">
      <a href="<?=$friend_register_php?>">
        <input type="submit" value="フレンド登録" class="button">
      </a>
    </div> -->

    <!-- <div class="friend_list"> -->
    <!-- <div class="button-panel">
      <a href="<?=$friend_list_php?>">
      <div class="button-panel">
        <input type="submit" value="フレンドリスト" class="button">
      </a>
    </div> -->

  <?php
//   }
  ?>

</div>
</div>
 </div><!--form-wrapper -->



  <!-- 投稿記事 -->

  <div class="index-style">
   <article class="article-style">
   <h1>投稿</h1>
<!--円グラフ-->
<div style="width:100%">
  <canvas id="canvas"></canvas>
</div>
<!--<button type="button" id="btn">グラフを更新</button>-->
<script>
<?php 
  $_start = '2:11,4:40,#,#,11:00,13:15,20:37,23:00';//$_POST で受け取る
  $_end = '3:00,5:40,#,#,12:00,14:15,22:37,24:00';
  $_label ='1,2,3,4,5,6,7,8';//DBから来た値

  $_start = json_encode($_start);
  $_end = json_encode($_end);
  $_label = json_encode($_label);//phpからきた、値をjavascriptに変換
?>

const sample1 = <?php echo $_start;?>;
const sample2 = <?php echo $_end;?>;
const sample3 = <?php echo $_label;?>;

  // ページ読み込み時にグラフを描画
  //getRandom(); // グラフデータにランダムな値を格納
  drawChart(); // グラフ描画処理を呼び出す

  // ボタンをクリックしたら、グラフを再描画
 //document.getElementById('btn').onclick 
 window.addEventListener('DOMContentLoaded', function() {
  // すでにグラフ（インスタンス）が生成されている場合は、グラフを破棄する
  if (myChart) {
    myChart.destroy();
  }
  getdata();
  //getRandom(); // グラフデータにランダムな値を格納
  drawChart(); // グラフを再描画
});
</script>
<!--ここまで円グラフ-->
      <?php
      foreach ($user_articles as $user_article) {
      ?>
        <a href=<?= $article_show_php ?>?article_id=<?= $userarticle['article_id'] ?>>
          <article class="article-one">
            <p class="article-user"><object><a href=<?= $user_php ?>?user_id=<?= $user_article['user_id'] ?>><?= $user_article['name'] ?></a></object></p>
            <h2 class="article-title"><object><a href=<?= $article_show_php ?>?article_id=<?= $user_article['article_id'] ?>><?= $user_article['title'] ?></a></object></h2>
            <br>
            <p class="article-date"><?= date('Y年m月d日', strtotime($userarticle['diary_date'])) ?></p>
            <span class="heart">♥</span>
            <span class="article-like"><?= $userarticle['like_count'] ?></span>
          </article>
        </a>
      <?php
      }
      ?>
    </article>
  </div>
</main>

<?php
require_once __DIR__ . '/../footer.php';
?>