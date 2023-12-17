<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../classes/user.php';
$user = new User();
$user_id=$_SESSION['user_id'];
// フレンドリストを最新から取得
$friends_user_id = $user -> getFriends($user_id);


if (isset($_SESSION['friend_register_error'])) {
    $friend_register_error="<script type='text/javascript'>alert('". $_SESSION['friend_register_error'] ."');</script>";
    echo $friend_register_error;
    // echo  $_SESSION['friend_register_error'] ;
    unset($_SESSION['friend_register_error']);
} 
?>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
</head>
<link rel="stylesheet" href="<?=$friendlist_css?>">
<h1>フレンドリスト</h1>

<!-- <link rel="stylesheet" href="<?=$friend_register_css?>"> -->
<main>
    
    <form  method="POST" action="./friend_register_db.php">
    <div class="b">
        <input class="fricode" type="text" name="friend_code" required="required" placeholder="フレンドコードを入力">
        <input type="submit" class="btn" title="追加" value="追加">
        </div>
    </form>
</main>

<?php
foreach($friends_user_id as $friend_user_id){
    $friend_user_id=$friend_user_id['friend_user_id'];
    $friend_details=$user->detailsUser($friend_user_id);
    ?>
<main>
    <div class="iti">
        <?php
        if ($friend_details['icon'] != "") {
        ?>
        
        <form method="POST" action="./../user/userpage.php">
            <input type="hidden" img class="user-icon" name="user_id" value="<?=$friend_details['user_id']?>">
            <input type="image" img class="user-icon" src="../icon_image/<?= $friend_details['icon'] ?>">
        </form>
        <?php
        } else {
        ?>
        <form method="POST" action="./../user/userpage.php">
            <input type="hidden" img class="user-icon" name="user_id" value="<?=$friend_details['user_id']?>">
            <input type="image" img class="user-icon" src="<?= $default_icon ?>">
        </form>
        <?php
        }
        
        ?>
                <div class="name2">      
            <?= $friend_details['name'] ?>
        </div>
        <div class="mes">
            <?= $friend_details['profile_comment'] ?>
        </div>
        <form class="syousai" method="POST" action="./../user/userpage.php">
            <input type="hidden" img class="user-icon" name="user_id" value="<?=$friend_details['user_id']?>">
            <!-- <input type="image" img class="user-icon" src="../icon_image/<?= $friend_details['icon'] ?>"> -->
            <a href="./../user/userpage.php"><input class="btn" type="submit" value="投稿を見る"></a>
        </form>
       
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