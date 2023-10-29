<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../classes/user.php';
require_once __DIR__ . '/../classes/article_list.php';
require_once __DIR__ . '/../pre.php';


$goodcount = $_POST['good_count'];
$article_id = $_POST['article_id'];
$good = new Article();
$goodupdate = $good->updateGood($article_id);

header("Location:../top/toppage.php");
require_once __DIR__ . '/../footer.php';