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
      if(!empty($friends_users_id)){
        foreach ($friends_users_id as $friend_user_id) {
            $friend_user_id=$friend_user_id['friend_user_id'];
            $friends_articles = $article->friendsArticles($friend_user_id);
            foreach ($friends_articles as $friend_article) {
                if(!empty($friends_articles)){
      ?>
        <a href="article/article_show.php?article_id=<?= $friend_article['article_id'] ?>">
        <article class="article-one">
        <p class="article-user"><object><a href=<?= $user_php ?>?user_id=<?= $friend_article['user_id'] ?>><?= $friend_article['name'] ?></a></object></p>
        <h2 class="article-title"><object><a href="article/article_show.php?article_id=<?= $friend_article['article_id'] ?>"><?= $friend_article['title'] ?></a></object></h2>
        <h2 class="diary"><object><?=$friend_article['diary']?></object></h2>
      <?php
                }
            }
        }
      }
      ?>
            <br>
            
            <p class="article-date"><?= date('Y年m月d日', strtotime($friend_article['date_time'])) ?></p>
            <span class="heart">♥</span>
            <span class="article-like"><?= $friend_article['good'] ?></span>
            

          </article>
        </a>
    </article>
  </div>
</main>
<?php
require_once __DIR__ . '/../footer.php';
?><?php
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
      if(!empty($friends_users_id)){
        foreach ($friends_users_id as $friend_user_id) {
            $friend_user_id=$friend_user_id['friend_user_id'];
            $friends_articles = $article->friendsArticles($friend_user_id);
            foreach ($friends_articles as $friend_article) {
                // if(!empty($friends_articles)){
      ?>
        <a href="article/article_show.php?article_id=<?= $friend_article['article_id'] ?>">
        <article class="article-one">
        <p class="article-user"><object><a href=<?= $user_php ?>?user_id=<?= $friend_article['user_id'] ?>><?= $friend_article['name'] ?></a></object></p>
        <h2 class="article-title"><object><a href="article/article_show.php?article_id=<?= $friend_article['article_id'] ?>"><?= $friend_article['title'] ?></a></object></h2>
        <h2 class="diary"><object><?=$friend_article['diary']?></object></h2>
        <p class="article-date"><?= date('Y年m月d日', strtotime($friend_article['date_time'])) ?></p>
        <span class="heart">♥</span>
        <span class="article-like"><?= $friend_article['good'] ?></span>
      <?php
                }
            }
        }
    //   }
      ?>
            

          </article>
        </a>
    </article>
  </div>
</main>
<?php
require_once __DIR__ . '/../footer.php';
?>