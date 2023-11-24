<?php
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../header.php';

// Postクラス、Userクラス
require_once __DIR__ . '/../classes/article_list.php';
require_once __DIR__ . '/../classes/user.php';
if (isset($_GET['user_id'])) {
  $user_id = $_GET['user_id'];
} else {
  $user_id = $_SESSION['user_id'];
}

$article = new Article();
$user = new User();


// ユーザー情報、投稿の抽出
$user_plofile = $user->detailsUser($user_id);
$user_articles = $article->userArticles($user_id);

?>

<head>
  <link rel="stylesheet" href="<?= $userpage_css ?>">
  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
  <script src="../js/test.js"></script>



  <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
</head>
<main>  
  <!-- ユーザー情報 -->
  <div class="box">
    <h1>プロフィール</h1>
    <hr>    
      <?php
        if ($user_plofile['icon'] != "") {
      ?>
    <div class="table_block">
	    <table>
	      <tbody>
	        <tr>
            <th>  
              <a href="./icon_update.php"><img class="user-icon-pro" src="../icon_image/<?= $user_plofile['icon'] ?>" alt=""></a>
            </th>
	          <td>
              <table>
                <tr><td class="name" colspan="2"><?= $user_plofile['name'] ?></td></tr>
                <tr><th>メールアドレス　</th><td><?= $user_plofile['mail'] ?></td></tr>
                <tr><th>ひとこと　</th><td><?= $user_plofile['profile_comment'] ?></td></tr>
                <tr><th>フレンドコード　</th><td><?= $user_plofile['friend_code'] ?></td></tr>
              </table>
            </td>
	        </tr>
	        <tr>
	          <th align="center">
              <a href="./icon_update.php"><input class="btn" type="submit" value="アイコン変更"></a>
            </th>
	          <td align="center">
              <a href="<?=$update_php?>"><input class="btn" type="submit" value="プロフィール編集"></a>
            </td>
	        </tr>
	      </tbody>
	    </table>
    </div>
      <?php
        } else {
      ?> 
    <div class="table_block">
	    <table>
	      <tbody>
	        <tr>
	          <th>
              <img class="user-icon-pro" src="<?=$default_icon?>" alt="">
            </th>
	          <td>
              <table>
                <tr><td class="name" colspan="2"><?= $user_plofile['name'] ?></td></tr>
                <tr><th>メールアドレス　</th><td><?= $user_plofile['mail'] ?></td></tr>
                <tr><th>ひとこと　</th><td><?= $user_plofile['profile_comment'] ?></td></tr>
                <tr><th>フレンドコード　</th><td><?= $user_plofile['friend_code'] ?></td></tr>
              </table>
            </td>
	        </tr>
	        <tr>
	          <th class="inbtn" align="center">
              <a href="./icon_update.php"><input class="btn" type="submit" value="アイコン変更"></a>
            </th>
	          <td class="inbtn" align="center">
              <a href="<?=$update_php?>"><input type="submit" value="プロフィール編集"></a>
            </td>
	        </tr>
	      </tbody>
	    </table>
    </div>
      <?php
        }
      ?>
  </div>


          <!-- <img class="user-icon" src="<?=$default_icon?>" alt="">
          <a href="./icon_update.php"><input type="submit" value="アイコン変更"></a>
          <table>
            <tr><th>名前　　　　　　　　</th><td><?= $user_plofile['name'] ?></td></tr>
            <tr><th>メールアドレス　</th><td><?= $user_plofile['mail'] ?></td></tr>
            <tr><th>ひとこと　 　</th><td><?= $user_plofile['profile_comment'] ?></td></tr>
            <tr><th>フレンドコード　</th><td><?= $user_plofile['friend_code'] ?></td></tr>
          </table>
          <a href="<?=$update_php?>"><input type="submit" value="プロフィール編集"></a> -->

  <?php
  if (!isset($_GET['user_id'])) {
  ?>

  
      <!-- <a href="<?=$update_php?>">
        <input type="submit" value="プロフィール編集">
      </a>

      <a href="./icon_update.php">
        <input type="submit" value="アイコン変更">
      </a> -->
  
      <!-- <a href="<?=$friend_register_php?>">
        <input type="submit" value="フレンドコードをいれる">
      </a>

      <a href="<?=$friend_list_php?>">
        <input type="submit" value="フレンドリスト">
      </a> -->
   

  <?php
  }
  ?>



  <!-- 投稿記事 -->

  <!-- <div class="index-style"> -->
   <article class="article-style">
   <div class="box">
   <h1>投稿</h1>

<!--円グラフ-->
<!-- <div style="width:100%">
  <canvas id="canvas"></canvas>
</div> -->
<!--<button type="button" id="btn">グラフを更新</button>-->
<script>
<?php 
  // $_start = '2:11,4:40,#,#,11:00,13:15,20:37,23:00';//$_POST で受け取る
  // $_end = '3:00,5:40,#,#,12:00,14:15,22:37,24:00';
  // $_label ='1,2,3,4,5,6,7,8';//DBから来た値

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
<form method="POST" action="./../user/userpage.php">
    <input type="hidden" name="user_id" value="<?=$user_article['user_id']?>">
</form>
 <hr>
    <div class="yoko">
      <div class="yoko2"><tr><?=$user_article['post_date']?></div>
      <div class="yoko3"><?=$user_article['title']?></div>
      <div class="yoko4"><?=$user_article['time_date']?></div>
    </div>
    <div class="yoko5"><?= $user_article['diary'] ?></div>

  <form action="../top/info.php" method="POST">
    <input type="hidden" name="starttime" value="<?= $user_article['start_time']?>"> 
    <input type="hidden" name="endtime" value="<?= $user_article['end_time']?>"> 
    <input type="hidden" name="item" value="<?= $user_article['item_name']?>"> 
    <input type="hidden" name="color" value="<?= $user_article['color']?>"> 
    <input type="hidden" name="postdate" value="<?= $user_article['post_date']?>">
    <input type="submit" name="button" value="円グラフを表示" class="enbtn">
  </form>
  <form action="../article/edit.php" method="POST">
    <input type="hidden" name="article_id" value="<?=$user_article['article_id']?>">
    <input type="submit" name="button" value="投稿内容編集" class="enbtn">
  </form>

      <?php
      }
      ?>
    </article>
</main>
</div>
<?php
require_once __DIR__ . '/../footer.php';
?>