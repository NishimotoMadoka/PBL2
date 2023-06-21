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

<main class="">
  <div class="">
    <article class="">
      <h1>友達の日常</h1>
      <?php
      $i=0;
      if(!empty($friends_users_id)){
        foreach ($friends_users_id as $friend_user_id) {
            $friend_user_id=$friend_user_id['friend_user_id'];
            $friends_articles = $article->friendsArticles($friend_user_id);
            foreach ($friends_articles as $friend_article) {
              // var_dump($friend_article);
              // $friends_article_array="";
              // $friend_article.$i=$friend_article;
              $friends_articles_array=[];
              $friends_articles_array=array($friends_articles_array,$friend_article);
              // array_push($friends_article_array,$friend_article);
              // $friends_articles_array[]+=$friend_article;
                // if(!empty($friends_articles)){
            }
        }
      }
      // array_multisort(array_column($friends_articles_array,'post_date'),SORT_ASC,$friends_articles_array);
      var_dump($friends_articles_array);
      $sampleOutput = "";
      for ( $indexA = 0; $indexA < is_countable( $friends_articles_array ); $indexA++ ) {
        for ( $indexB = 0; $indexB < is_countable( $friends_articles_array[$indexA] ); $indexB++ ) {
            $sampleOutput .= "{$friends_articles_array[$indexA][$indexB]},";
            // if ( $indexB == count( $friends_articles_array[$indexA] ) - 1  ) {
            //     $sampleOutput .= "<br />\n";
            // }
        }
      }
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
    </article>
  </div>
</main>
<?php
require_once __DIR__ . '/../footer.php';
?>