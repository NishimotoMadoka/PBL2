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

</head>
<main>
 <div class="form-wrapper-icon">
  <!-- <div class="icon">  -->
    <?php
    if ($user_plofile['icon'] != "") {
    ?>
      <a href="./icon_update.php"><><img class="user-icon" src="../icon_image/<?= $user_plofile['icon'] ?>" alt="">
    <?php
    } else {
    ?>
      <img class="user-icon" src="../icon_image/default.png" alt="">
    <?php
    }
    ?>
    <!-- <div class="icon-update">
      <a href="./icon_update.php">
        <input type="submit" value="アイコン変更" class="icon_button">
      </a>
    </div> -->
  </div>
  <!-- ユーザー情報 -->
  <div class="form-wrapper">
  <div class="profile" align="center">

    <h3>プロフィール</h3>
    <div>
      <dl class="inline">
      <div class="form-item">
        <table>
        <tr>名前 ： <?= $user_plofile['name'] ?></tr><br>
        <tr>メールアドレス ： <?= $user_plofile['mail'] ?></tr><br>
        <tr>ひとこと ： <?= $user_plofile['profile_comment'] ?></tr><br>
        <tr>フレンドコード ： <?= $user_plofile['friend_code'] ?></tr><br>
  </table>
      </dl>
    </div>
  </div>


  <?php
  if (!isset($_GET['user_id'])) {
  ?>
    <div class="update">
    <div class="button-panel">
      <a href="<?=$update_php?>">
        <input type="submit" value="プロフィール編集" class="button">
      </a>
    </div>

    <!-- <div class="button-panel">
      <a href="./icon_update.php">
        <input type="submit" value="アイコン変更" class="button">
      </a>
    </div> -->

    <div class="friend">
    <div class="button-panel">
      <a href="<?=$friend_register_php?>">
        <input type="submit" value="フレンド登録" class="button">
      </a>
    </div>

  <?php
  }
  ?>

</div>
</div>
</div><!--form-wrapper-->



  <!-- 投稿記事 -->

  <div class="index-style">
   <article class="article-style">
   <h1>投稿</h1>
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