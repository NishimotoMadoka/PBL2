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

$post_user_id=$user_id;
$goods_notification=$article->good_Notification($post_user_id);
if($goods_notification!==null){
foreach($goods_notification as $good_notification){
    $user_id=$good_notification['user_id'];
    $notification_user=$user->detailsUser($user_id);
    echo "{$notification_user['name']}さんが投稿をいいねしました。";
}
}else{
    echo "通知はまだありません";
}
    

require_once __DIR__ . '/../footer.php';
?>