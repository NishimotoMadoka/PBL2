<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../classes/user.php';

$user_id=$_SESSION['user_id'];
$list_name = $_POST['list_name'];
$list_image = $_FILES['list_image']['name'];
 

$user = new User();
// フレンドリストを最新から取得
$friends = $user -> getFriends($user_id);
// ログインユーザーのユーザー情報取り出し
$user_plofile = $user->detailsUser($user_id);

// 名前20文字制限
if (mb_strlen($name) >= 21) {
    $_SESSION['list_error'] = '名前は20文字以下で入力してください。';
    header('Location: list_register.php');
    exit();
}

// リストアイコン画像の処理
if($list_image!==""){
    // メアドの@以前を切り出してアイコン名の前につけて保存
    $mail_num=strstr($user_plofile['mail'],'@',true);
    $list_image=$mail_num.$list_image;
    move_uploaded_file($_FILES['list_image']['tmp_name'], '../icon_image/' . $list_image);
    }else{
        $list_image="";
    }

if($friends!==null){
?>
<link rel="stylesheet"  href="<?= $member_register_css ?>">
<div class="box">
    <form  method="post" action="./list_register_db.php"  enctype="multipart/form-data">
<?php
    foreach($friends as $friend){
        $friend_details=$user->detailsUser($friend['friend_user_id']);
?>
    
        <label for="checkbox1"><?=$friend_details['name']?></label>
        <input type="checkbox" name="member_user_id[]" value="<?=$friend_details['user_id']?>"> <br>
     
<?php
        // echo $mylist_id['list_name'];
    }
?>
    <input type="hidden" name="list_name" value="<?=$list_name?>">
    <input type="hidden" name="list_image" value="<?=$list_image?>">
    <input type="submit" class="btn value="登録">

    </div>
<?php
}


require_once __DIR__.'/../footer.php';


