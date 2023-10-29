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
</table>
<?php
$article_id=$friend_article['article_id'];


//ユーザーIDと投稿IDを元にいいね値の重複チェックを行っています
$favorite=$article->checkGood_duplicate($user_id,$article_id);

?>
<form class="favorite_count" action="#" method="post">
    <input type="hidden" name="article_id" value="<?php echo $article_id;?>">
    <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
    <button type="button" name="favorite" class="favorite_btn" data-user_id="<?php echo $user_id;?>" data-article_id="<?php echo $article_id;?>">
        <?php if (!$favorite): ?>
            いいね
        <?php else: ?>
            いいね解除
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

            
            // $friends_articles_array= array_merge_recursive($friends_articles_array,$friend_article_array);
              // $friends_articles_array=array($friends_articles_array,$friend_article);
              // array_push($friends_article_array,$friend_article);
              // $friends_articles_array[]+=$friend_article;
                // if(!empty($friends_articles)){
            }
        }
       // var_dump($friends_articles_array);
      }
    //   var_dump($friends_articles_array);
      // array_multisort( array_map( "strtotime", array_column( $friends_articles_array, "A" ) ), SORT_ASC, $friends_articles_array ) ;
     // array_multisort(array_column($friends_articles_array,'post_date'),SORT_DESC,$friends_articles_array);
     //array_multisort(array_map("strtotime", array_column($friends_articles_array,"post_date")),SORT_DESC,$friends_articles_array);
     //array_multisort(array_map("strtotime", array_column($friends_articles_array,"post_date")),SORT_DESC,$friends_articles_array);
     // $sampleOutput = "";



     $date_array = array();
foreach( $friends_articles_array as $value) {
  $date_array[] = array_keys($value, 'post_date');
}

// var_dump($date_array);

// ソート実行
// array_multisort( $date_array, SORT_ASC, $friends_articles_array);

// var_dump ($friends_articles_array);

      // foreach($friends_articles_array as  $key=>$vals){
        //echo $key. '.' $vals[0].;

      //echo '<br>';
       //}
      //for ( $indexA = 0; $indexA < is_countable( $friends_articles_array ); $indexA++ ) {
       // for ( $indexB = 0; $indexB < is_countable( $friends_articles_array[$indexA] ); $indexB++ ) {
            //$sampleOutput .= "{$friends_articles_array[$indexA][$indexB]},";
            // if ( $indexB == count( $friends_articles_array[$indexA] ) - 1  ) {
            //     $sampleOutput .= "<br />\n";
            // }
        //}
      //}
      ?>
      
        <!-- <a href="article/article_show.php?article_id=<?= $friend_article['article_id'] ?>">
        
        
        <article class="article-one">
        <p class="article-user"><object><a href=<?= $user_php ?>?user_id=<?= $friend_article['user_id'] ?>><?= $friend_article['name'] ?></a></object></p>
        <h2 class="article-title"><object><a href="article/article_show.php?article_id=<?= $friend_article['article_id'] ?>"><?= $friend_article['title'] ?></a></object></h2>
        <h2 class="diary"><object><?=$friend_article['diary']?></object></h2>
        <p class="article-date"><?= date('Y年m月d日', strtotime($friend_article['date_time'])) ?></p>
        <span class="heart">♥</span>
        <span class="article-like"><?= $friend_article['good'] ?></span>
            
          </article>
        </a> -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./like.js?version=<?php echo time(); ?>"></script>
  <!-- toppage.phpの適切な場所に以下のコードを追加してください -->
<script>
var user_id = <?php echo json_encode($_SESSION['user_id']); ?>;
</script>

    </article>
  </div>
</main>

<?php
require_once __DIR__ . '/../footer.php';
?>