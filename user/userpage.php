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
<div class="box">
  <h1>プロフィール</h1>
  <hr>
  <?php
    if ($user_plofile['icon'] != "") {
  ?>
  <div class="table_block">
      <!-- <a href="./icon_update.php"><img class="user-icon" src="../icon_image/<?= $user_plofile['icon'] ?>" alt=""></a> -->
    <table>
	    <tbody>
	      <tr>
          <td>  
            <a href="./icon_update.php"><img class="user-icon-pro" src="../icon_image/<?= $user_plofile['icon'] ?>" alt=""></a>
          </th>
	        <td>
            <table>
              <tr><td class="name" colspan="2"><?= $user_plofile['name'] ?></td></tr>
              <tr><th>メールアドレス　</th><td><?= $user_plofile['mail'] ?></td></tr>
              <tr><th>ひとこと　</th><td><?= $user_plofile['profile_comment'] ?></td></tr>
              <tr><th>フレンドコード</th><td><?= $user_plofile['friend_code'] ?></td></tr>
            </table>
          </td>
	      </tr>
	    </tbody>
	  </table>
  </div>


  <?php
    } else {
  ?>
      <!-- <img class="user-icon" src="<?=$default_icon?>" alt=""> -->

  <div class="table_block">
    <table>
	    <tbody>
	      <tr>
          <th>  
            <img class="user-icon" src="<?=$default_icon?>" alt="">
          </th>
	        <td>
            <table>
              <tr><td  class="name" colspan="2"><?= $user_plofile['name'] ?></td></tr>
              <tr><th>メールアドレス</th><td><?= $user_plofile['mail'] ?></td></tr>
              <tr><th>ひとこと</th><td><?= $user_plofile['profile_comment'] ?></td></tr>
              <tr><th>フレンドコード</th><td><?= $user_plofile['friend_code'] ?></td></tr>
            </table>
          </td>
	      </tr>
	    </tbody>
	  </table>
  </div>

  <?php
    }
  ?>
</div>
  <!-- ユーザー情報 -->
  

    <!-- <h3>プロフィール</h3>
    <div>
      <dl class="inline">
      <div class="form-item">
        <table>
        <tr><th>名前</th><td><?= $user_plofile['name'] ?></td></tr>
        <tr><th>メールアドレス</th><td><?= $user_plofile['mail'] ?></td></tr>
        <tr><th>ひとこと</th><td><?= $user_plofile['profile_comment'] ?></td></tr>
  </table>
      </dl>
    </div>
  </div> -->

  <!-- 投稿記事 -->
  <div class="box">
   <h1>投稿</h1>
   <hr>

      <?php
      foreach ($user_articles as $user_article) {
      ?>
<form method="POST" action="./../user/userpage.php">
    <input type="hidden" name="user_id" value="<?=$user_article['user_id']?>">
</form>
<div class="yoko">
  <input type="hidden" name="user_id" value="<?=$$user_article['user_id']?>">
  <input type="image" img class="user-icon" src="../icon_image/<?=$user_article['icon']?>">
  <div class="yoko2"><?=$user_article['name']?></div>
  <div class="yoko3"><?=$user_article['title']?></div>
  <div class="yoko4"><?=$user_article['time_date']?></div>

<!-- いいねボタン -->
<?php
$article_id=$user_article['article_id'];
$post_user_id=$user_article['user_id'];

//ユーザーIDと投稿IDを元にいいね値の重複チェック（これいらんかも？？？）
$favorite=$article->checkGood_duplicate($user_id,$post_user_id,$article_id);
?>
<!-- ボタン表示部分 -->
<form class="good" action="#" method="post">
    <input type="hidden" name="article_id" value="<?php echo $article_id;?>">
    <input type="hidden" name="post_user_id" value="<?php echo $post_user_id;?>">
    <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
    <button type="button" name="favorite" class="favorite_btn" data-user_id="<?php echo $user_id;?>" data-post_user_id="<?php echo $post_user_id;?>" data-article_id="<?php echo $article_id;?>">
        <?php if (!$favorite): ?>
            🤍
        <?php else: ?>
            💗
        <?php endif; ?>
    </button>
</form>

</div>
<div class="yoko5"><?= $user_article['diary'] ?></div>
  <?php
    if ($user_article['article_image'] != "") {
  ?>
    <img class="" src="../article_image/<?= $user_article['article_image'] ?>" alt=""></a>
  <?php
    }
  ?>


<!-- いいねボタン 
<?php
$article_id=$user_article['article_id'];
$post_user_id=$user_article['user_id'];

//ユーザーIDと投稿IDを元にいいね値の重複チェック（これいらんかも？？？）
$favorite=$article->checkGood_duplicate($user_id,$post_user_id,$article_id);
?>
//ボタン表示部分 
<form class="favorite_count" action="#" method="post">
    <input type="hidden" name="article_id" value="<?php echo $article_id;?>">
    <input type="hidden" name="post_user_id" value="<?php echo $post_user_id;?>">
    <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
    <button type="button" name="favorite" class="favorite_btn" data-user_id="<?php echo $user_id;?>" data-post_user_id="<?php echo $post_user_id;?>" data-article_id="<?php echo $article_id;?>">
        <?php if (!$favorite): ?>
            🤍
        <?php else: ?>
            💗
        <?php endif; ?>
    </button>
</form>-->

<form action="../top/info.php" method="POST">
<input type="hidden" name="starttime" value="<?= $user_article['start_time']?>"> 
<input type="hidden" name="endtime" value="<?= $user_article['end_time']?>"> 
<input type="hidden" name="item" value="<?= $user_article['item_name']?>"> 
<input type="hidden" name="color" value="<?= $user_article['color']?>"> 
<input type="hidden" name="postdate" value="<?= $user_article['post_date']?>">
<input type="hidden" name="article_image" value="<?=$user_article['article_image']?>">
<div class="button-panel">
<input type="submit" name="button" value="円グラフを表示" class="enbtn">
</div>
<hr>
</form>
</button>
</form>




<?php
  }
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../top/like.js?version=<?php echo time(); ?>"></script>
<script>
  var user_id = <?php echo json_encode($_SESSION['user_id']); ?>;
</script>
    </article>

</div>
</main>
</div>
<?php
require_once __DIR__ . '/../footer.php';
?>