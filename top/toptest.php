<?php
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../classes/article_list.php';
require_once __DIR__ . '/../classes/user.php';
$article = new Article();
$user = new User();
if(!isset($_SESSION)){
    session_start();
}





$user_id=$_SESSION['user_id'];

$friends_users_id=$user->getFriends($user_id);

require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';

if($friends_users_id==null){
  ?>
    <!-- フレンド登録 -->
  <link rel="stylesheet" href="<?=$friend_register_css?>">
  <div class="button-panel">
  <div class="form-item">
    <form method="POST" action="../friend/friend_register_db.php">
      <input type="text" name="friend_code" required="required" placeholder="フレンドコードを入力">
        <div class="button-panel">
        <!-- <input type="submit" value="追加" class="fbtn" class="button"></td> -->
      <input type="submit" class="button" title="追加" value="追加"></input>
      </tr>
    </form>
  </div>
  <?php
      if (isset($_SESSION['friend_register_error'])) {
      $friend_register_error="<script type='text/javascript'>alert('". $_SESSION['friend_register_error'] ."');</script>";
      echo $friend_register_error;
      // echo  $_SESSION['friend_register_error'] ;
      unset($_SESSION['friend_register_error']);
  } 
  }
?>
<link rel="stylesheet" href="<?= $toppage_css ?>">
<main class="">
  <div class="">
    <article class="">
      <?php
    //   投稿の取得と配列化
      $article_count=0;
      if(!empty($friends_users_id)){
        foreach ($friends_users_id as $friend_user_id) {
            $friend_user_id=$friend_user_id['friend_user_id'];
            $friends_articles = $article->friendsArticles($friend_user_id);
            
            $friends_articles_array[$article_count]['article_id']=$friends_articles['article_id'];
            $friends_articles_array[$article_count]['user_id']=$friends_articles['user_id'];
            $friends_articles_array[$article_count]['start_time']=$friends_articles['start_time'];
            $friends_articles_array[$article_count]['end_time']=$friends_articles['end_time'];
            $friends_articles_array[$article_count]['item_name']=$friends_articles['item_name'];
            $friends_articles_array[$article_count]['color']=$friends_articles['color'];
            $friends_articles_array[$article_count]['title']=$friends_articles['title'];
            $friends_articles_array[$article_count]['diary']=$friends_articles['diary'];
            $friends_articles_array[$article_count]['post_date']=$friends_articles['post_date'];
            $friends_articles_array[$article_count]['time_date']=$friends_articles['time_date'];
            $friends_articles_array[$article_count]['article_image']=$friends_articles['article_image'];
            $friends_articles_array[$article_count]['article_public']=$friends_articles['article_public'];

            $article_count++;
        }
      }

    // 投稿のソート
    $keyArray = array_column($friends_articles_array, 'time_date');
    array_multisort($keyArray, SORT_DESC, $friends_articles_array);

    // これ入れる場所変えないとです
    require_once __DIR__ . '/../paging/paging_controller.php';
for($i=0;$i<$article_count;$i++){
    // var_dump($friends_articles_array[$i]['user_id']);exit(0);
    $friend_user_id=$friends_articles_array[$i]['user_id'];
    // echo $friend_user_id;exit(0);
    $friend_details=$user->detailsUser($friend_user_id);

    if($friend_details['icon']==""){
        $friend_details['icon']="default.jpg";
    }
?>
  <div class="madop">
  <form method="POST" action="./../user/userpage.php">
    <input type="hidden" name="user_id" value="<?=$friend_user_id?>">
    <input type="image" img class="user-icon" src="../icon_image/<?= $friend_details['icon'] ?>">
  </form>
  <div class="iti">
  <table>
  <tr><?=$friend_details['name']?></tr><br>
  <tr><?=$friends_articles_array[$i]['time_date']?></tr><br><br>
  <tr><?=$friends_articles_array[$i]['post_date']?></tr><br>
  <tr><?=$friends_articles_array[$i]['title']?></tr><br>
  <tr><?= $friends_articles_array[$i]['diary'] ?></tr><br>
  <?php
    if ($friends_articles_array[$i]['article_image'] != "") {
  ?>
    <img class="" src="../article_image/<?= $friends_articles_array[$i]['article_image'] ?>" alt=""></a>
  <?php
    }
  ?>
  </table>


  <!-- いいねボタン -->
<?php
$article_id=$friends_articles_array[$i]['article_id'];
$post_user_id=$friend_user_id;

//ユーザーIDと投稿IDを元にいいね値の重複チェック（これいらんかも？？？）
$favorite=$article->checkGood_duplicate($user_id,$post_user_id,$article_id);
?>
<!-- ボタン表示部分 -->
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
</form>

</div>
</div>
<form action="info.php" method="POST">
<input type="hidden" name="starttime" value="<?= $friends_articles_array[$i]['start_time']?>"> 
<input type="hidden" name="endtime" value="<?= $friends_articles_array[$i]['end_time']?>"> 
<input type="hidden" name="item" value="<?= $friends_articles_array[$i]['item_name']?>"> 
<input type="hidden" name="color" value="<?= $friends_articles_array[$i]['color']?>"> 
<div class="button-panel">
<input type="submit" name="button" value="円グラフを表示" class="button">
</div>
</form>
<br>

<?php
}   //for文ループここまで
require_once __DIR__ . '/../paging/paging.php';
?>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./like.js?version=<?php echo time(); ?>"></script>
    <script>
      var user_id = <?php echo json_encode($_SESSION['user_id']); ?>;
    </script>

    </article>
  </div>
</main>

<?php
require_once __DIR__ . '/../footer.php';
?>