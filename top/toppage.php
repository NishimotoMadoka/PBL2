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
      <!-- <h1>トップページ</h1> -->
      <?php
      $i=0;
      if(!empty($friends_users_id)){
        $friends_articles_array=array();
        foreach ($friends_users_id as $friend_user_id) {
            $friend_user_id=$friend_user_id['friend_user_id'];
            $friends_articles = $article->friendsArticles($friend_user_id);
            // これ入れる場所変えないとです
            require_once __DIR__ . '/../paging/paging_controller.php';

            foreach ($friends_articles as $friend_article) {
              $friend_article_array = array();
              $friend_article_array = array();
              
              // $friend_article.$i=$friend_article;
              $friend_article_array=array("user_id"=>$friend_article['user_id'] ,
                                        "user_icon"=>$friend_article['icon'],
                                        "article_id"=>$friend_article['article_id'],
                                        "post_date"=>$friend_article['post_date'],
                                        "start_time"=>$friend_article['start_time'],
                                        "end_time"=>$friend_article['end_time'],
                                        "item_name"=>$friend_article['item_name'],
                                        "color"=>$friend_article['color'],
                                        "title"=>$friend_article['title'],
                                        "diary"=>$friend_article['diary'],
                                        // "good"=>$friend_article['good']
                                      );
                            
                if($friend_article['icon']==""){
                    $friend_article['icon']="default.jpg";
                }
                ?>

                <br>
  
<div class="madop">
<form method="POST" action="./../user/userpage.php">
    <input type="hidden" name="user_id" value="<?=$friend_article['user_id']?>">
    <input type="image" img class="user-icon" src="../icon_image/<?= $friend_article['icon'] ?>">
</form>
<div class="iti">
  <table>
  <tr><?=$friend_article['name']?></tr><br>
  <tr><?=$friend_article['time_date']?></tr><br><br>
  <tr><?=$friend_article['post_date']?></tr><br>
  <tr><?=$friend_article['title']?></tr><br>
  <tr><?= $friend_article['diary'] ?></tr><br>
  <?php
    if ($friend_article['article_image'] != "") {
  ?>
    <img class="" src="../article_image/<?= $friend_article['article_image'] ?>" alt=""></a>
  <?php
    }
  ?>
</table>

<!-- いいねボタン -->
<?php
$article_id=$friend_article['article_id'];
$post_user_id=$friend_article['user_id'];

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
<input type="hidden" name="starttime" value="<?= $friend_article['start_time']?>"> 
<input type="hidden" name="endtime" value="<?= $friend_article['end_time']?>"> 
<input type="hidden" name="item" value="<?= $friend_article['item_name']?>"> 
<input type="hidden" name="color" value="<?= $friend_article['color']?>"> 
<div class="button-panel">
<input type="submit" name="button" value="円グラフを表示" class="button">
</div>
</form>
<br>

<?php
  require_once __DIR__ . '/../paging/paging.php';

            }
        }
      }

  $date_array = array();
// foreach( $friends_articles_array as $value) {
//   $date_array[] = array_keys($value, 'post_date');
// }
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