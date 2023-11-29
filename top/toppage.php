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
  <main>
    
    <form  method="POST" action="./../friend/friend_register_db.php">
    <div class="b">
        <input class="fricode" type="text" name="friend_code" required="required" placeholder="フレンドコードを入力">
        <input type="submit" class="btn" title="追加" value="追加">
        </div>
    </form>
</main>
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

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
</head>

<link rel="stylesheet" href="<?= $toppage_css ?>">
<!-- <div class="box"> -->
<main class="">
  <div class="">
    <article class="">
      <?php
    //   投稿の取得と配列化
      $article_count=0; //友達全員の投稿の数
      if(!empty($friends_users_id)){
        foreach ($friends_users_id as $friend_user_id) {
            $friend_user_id=$friend_user_id['friend_user_id'];
            $friends_articles = $article->friendsArticles($friend_user_id);
            $friend_article_count=count($friends_articles); //友達ごとの投稿の数
           
            for($h=0;$h<$friend_article_count;$h++){
            $friends_articles_array[$article_count]['article_id']=$friends_articles[$h]['article_id'];
            $friends_articles_array[$article_count]['user_id']=$friends_articles[$h]['user_id'];
            $friends_articles_array[$article_count]['start_time']=$friends_articles[$h]['start_time'];
            $friends_articles_array[$article_count]['end_time']=$friends_articles[$h]['end_time'];
            $friends_articles_array[$article_count]['item_name']=$friends_articles[$h]['item_name'];
            $friends_articles_array[$article_count]['color']=$friends_articles[$h]['color'];
            $friends_articles_array[$article_count]['title']=$friends_articles[$h]['title'];
            $friends_articles_array[$article_count]['diary']=$friends_articles[$h]['diary'];
            $friends_articles_array[$article_count]['post_date']=$friends_articles[$h]['post_date'];
            $friends_articles_array[$article_count]['time_date']=$friends_articles[$h]['time_date'];
            $friends_articles_array[$article_count]['article_image']=$friends_articles[$h]['article_image'];
            $friends_articles_array[$article_count]['article_public']=$friends_articles[$h]['article_public'];

            $article_count++;
            }
        }
        if(!empty($article_count)){
        // 投稿のソート
        $keyArray = array_column($friends_articles_array, 'time_date');
        array_multisort($keyArray, SORT_DESC, $friends_articles_array);
        }else{
          echo "まだ投稿がありません。";
        }
      }

    
    // これ入れる場所変えないとです
    require_once __DIR__ . '/../paging/paging_controller.php';
    for($i=0;$i<$article_count;$i++){
    $friend_user_id=$friends_articles_array[$i]['user_id'];
    $friend_details=$user->detailsUser($friend_user_id);

    if($friend_details['icon']==""){
        $friend_details['icon']="default.jpg";
    }
?>
<div class="box">
<div class="yoko">
  <form method="POST" action="./../user/userpage.php">
    <input type="hidden" name="user_id" value="<?=$friend_user_id?>">
    <input type="image" img class="user-icon" src="../icon_image/<?= $friend_details['icon'] ?>">
  </form>
  
  <div class="yoko2"><span class="name"><?=$friend_details['name']?></span></div>
  <div class="yoko3"><?=$friends_articles_array[$i]['title']?></div>
  <div class="yoko4"><?=$friends_articles_array[$i]['time_date']?></div>
  

  <?php
    if ($friends_articles_array[$i]['article_image'] != "") {
  ?>
    <img class="" src="../article_image/<?= $friends_articles_array[$i]['article_image'] ?>" alt=""></a>
  <?php
    }
  ?>
  

<!-- いいねボタン -->
<?php
$article_id=$friends_articles_array[$i]['article_id'];
$post_user_id=$friend_user_id;

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
<div class="yoko5"><?= $friends_articles_array[$i]['diary'] ?></div>
<!-- </div> -->
<form action="info.php" method="POST">
<input type="hidden" name="starttime" value="<?= $friends_articles_array[$i]['start_time']?>"> 
<input type="hidden" name="endtime" value="<?= $friends_articles_array[$i]['end_time']?>"> 
<input type="hidden" name="item" value="<?= $friends_articles_array[$i]['item_name']?>"> 
<input type="hidden" name="color" value="<?= $friends_articles_array[$i]['color']?>"> 
<input type="hidden" name="postdate" value="<?= $friends_articles_array[$i]['post_date']?>">
<div class="button-panel">
<input type="submit" name="button" value="円グラフを表示" class="enbtn">
</div>
</form>
<br>

        </div>

<div class="page">
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
</div>
</main>

<?php
require_once __DIR__ . '/../footer.php';
?>