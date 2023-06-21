<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../classes/user.php';
$user = new User();

// フレンドリストを最新から取得
$friends = $user -> getFriends($_SESSION['user_id']);

function echo_friends(){
    echo '<table>';
    echo '<tr><th>&nbsp;</th><th>フレンド名</th><th>ユーザーID</th></tr>';

}


    echo '<p>フレンド</p>';
    //追加した最新順で表示する
    echo_friends();
    foreach($friends as $item){

?>
    <tr> 
        <td><img src="../icon_image/<?= $item['icon']?>"></td>
        <td><?= $item['user_id']?></td>
        <td><?= $item['name']?></td>
        <td><?=$iteem['profile_comment']?></td>
    </tr>



<?php
    }
?>