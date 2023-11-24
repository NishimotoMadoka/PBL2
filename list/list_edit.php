<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../classes/user.php';
$user = new User();
$user_id=$_SESSION['user_id'];
// フレンドリストを最新から取得
$mylists_id = $user -> getToplist($user_id);

if($mylists_id!==null){
    foreach($mylists_id as $mylist_id){
        echo $mylist_id['list_name'];
    }
}
?>
<form method="POST" action="./list_register.php">
    <input type="submit" name="button" value="新規リスト作成" class="button">
</form>
<?php
require_once __DIR__.'/../footer.php';
