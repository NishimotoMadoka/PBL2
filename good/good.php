<?php
require_once __DIR__ . '/../header.php';
?>
<?php
require_once __DIR__ . '/../classes/article_list.php';
$user_id=$_SESSION['user_id'];
$article_id =(int) 53;
$article = new Article();
// $good_list=$article->checkGood_list($user_id);

$good = $article->get_Good($article_id);
var_dump($good);
?>
<form class="form" method="POST" action="./good_db.php">
        <input type="submit" value=<?=$article[0]?> class="button">
</form>

