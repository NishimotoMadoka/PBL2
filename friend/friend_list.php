<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../classes/user.php';
$user = new User();
$user_id=$_SESSION['user_id'];
// フレンドリストを最新から取得
$friends_user_id = $user -> getFriends($user_id);

?>

<link rel="stylesheet" href="<?=$friendlist_css?>">

<h1>フレンドリスト</h1>
<?php
foreach($friends_user_id as $friend_user_id){
    $friend_user_id=$friend_user_id['friend_user_id'];
    $friend_details=$user->detailsUser($friend_user_id);
    ?>
    <hr while="70%">
    <main>
    <div class="iti">
        <?php
        if ($friend_details['icon'] != "") {
        ?>
        <form method="POST" action="./../user/userpage.php">
            <input type="hidden" img class="user-icon" name="user_id" value="<?=$friend_details['user_id']?>">
            <input type="image" img class="user-icon" src="../icon_image/<?= $friend_details['icon'] ?>">
        </form>
        <!-- <img class="user-icon" src="../icon_image/<?= $friend_details['icon'] ?>" alt=""> -->
        <?php
        } else {
        ?>
        <form method="POST" action="./../user/userpage.php">
            <input type="hidden" img class="user-icon" name="user_id" value="<?=$friend_details['user_id']?>">
            <input type="image" img class="user-icon" src="<?= $default_icon ?>">
        </form>
        <!-- <img class="" src="<?=$default_icon?>" alt=""> -->
        <?php
        }
        ?>
            <dl>
                <!-- <dt>名前　　</dt> -->
                <!-- <form method="POST" action="./../user/userpage.php">
                    <input type="hidden" name="user_id" value="<?=$friend_details['user_id']?>">
                    <input type="text" >
                </form> -->
                <h1><dd><?= $friend_details['name'] ?></dd></h1>
                </dd>
                <!-- <dt>ひとこと</dt> -->
                <!-- <dd><?= $friend_details['profile_comment'] ?></dd> -->
            </dl>

    </div>
    </main>

<hr>
<?php
}
require_once __DIR__.'/../footer.php';

// function echo_friends(){
//     echo '<table>';
//     echo '<tr><th>&nbsp;</th><th>フレンド名</th><th>ユーザーID</th></tr>';

// }


//     echo '<p>フレンド</p>';
//     //追加した最新順で表示する
//     echo_friends();
//     foreach($friends as $item){

// ?>
<!-- //     <tr> 
//         <td><img src="../icon_image/<?= $item['icon']?>"></td>
//         <td><?= $item['user_id']?></td>
//         <td><?= $item['name']?></td>
//         <td><?=$iteem['profile_comment']?></td>
//     </tr>

?>