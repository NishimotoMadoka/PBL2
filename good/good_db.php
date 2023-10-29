<?php
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../classes/article_list.php';
$article_id =(int) 53;
$article = new Article();
$result = $article->updateGood($article_id);


if ($result !== '') {
    header('Location: good.php');
    exit();
}
header("Location:./good.php");

require_once __DIR__ . '/../footer.php';
?>