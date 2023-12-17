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
$notification_user_array=array();

$post_user_id=$user_id;
$goods_notification=$article->good_Notification($post_user_id);
array_multisort( array_map( "strtotime", array_column( $goods_notification, "good_time" ) ), SORT_ASC, $goods_notification );

if($goods_notification!==null){
foreach($goods_notification as $good_notification){
    $user_id=$good_notification['user_id'];
    $notification_user=$user->detailsUser($user_id);
?>

<head>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="<?=$good_notification_css?>">
</head>

<!-- ここcssお願いします！！！！！！！！！ -->
<div class="iti">
  <form method="POST" action="./../user/userpage.php">
    <input type="hidden" name="user_id" value="<?=$notification_user['user_id']?>">
    <input type="image" img class="user-icon" src="../icon_image/<?=$notification_user['icon']?>">
  </form>
  <div class="com">
      <span class="name"><?=$notification_user['name']?></span>さんがあなたの投稿にいいねしました
</div>
</div>
<?php
}
}else{
  
    echo "通知はまだありません";
}

require_once __DIR__ . '/../footer.php';
?>