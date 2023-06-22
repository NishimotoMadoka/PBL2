<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../classes/user.php';
$user = new User();
$user_id=$_SESSION['user_id'];
// フレンドリストを最新から取得
$friends_user_id = $user -> getFriends($user_id);

?>
<center><h1>フレンドリスト</h1></center>
<?php
foreach($friends_user_id as $friend_user_id){
    $friend_user_id=$friend_user_id['friend_user_id'];
    $friend_details=$user->detailsUser($friend_user_id);
    ?>
    <main>
    <div class="">
        <?php
        if ($friend_details['icon'] != "") {
        ?>
        <img class="" src="../icon_image/<?= $friend_details['icon'] ?>" alt="">
        <?php
        } else {
        ?>
        <img class="" src="<?=$default_icon?>" alt="">
        <?php
        }
        ?>
        <div class="" align="center">
            <div>
            <dl class="">
                <dt>名前</dt>
                <dd><?= $friend_details['name'] ?></dd>
                </dd>
                <dt>ひとこと</dt>
                <dd><?= $friend_details['profile_comment'] ?></dd>
            </dl>
            </div>
        </div>
    </div>
    </main>


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