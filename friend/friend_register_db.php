<?php
require_once __DIR__ .'/../pre.php';
require_once __DIR__ .'/../classes/user.php';
$user = new User();
if(!isset($_SESSION)){
    session_start();
}
$friend_code=$_POST['friend_code'];
$user_id=$_SESSION['user_id'];

// フレンドのuser_id取ってくる
$friend_user=$user->getFriend_id($friend_code);
$friend_user_id=$friend_user['user_id'];
// 取ってきたフレンドのuser_id使ってDBfriends_listに登録
$result=$user->insertFriend($user_id,$friend_user_id);
if ($result !== '') {
    $_SESSION['friend_register_error'] = $result;
    header('Location: friend_register.php');
    exit();
}

require_once __DIR__ . '/../header.php';
