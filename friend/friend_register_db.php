<?php
require_once __DIR__ .'/../pre.php';
require_once __DIR__ .'/../classes/user.php';
$user = new User();
if(!isset($_SESSION)){
    session_start();
}
$friend_code=$_POST['friend_code'];
$user_id=$_SESSION['user_id'];

// 自分のフレンドコード
$user_details=$user->detailsUser($user_id);
$user_code=$user_details['friend_code'];
// 自分のフレンドコードを入力したときのエラー
if($user_code==$friend_code){
    $_SESSION['friend_register_error'] = "このフレンドコードは登録できません。";
    header('Location: ../user/mypage.php');
    exit();
}

// 現在のフレンド取ってくる
$friends_users_id=$user->getFriends($user_id);
// フレンドのuser_id取ってくる
$friend_user=$user->getFriend_id($friend_code);
$friend_user_id=$friend_user['user_id'];

// フレンドがすでに登録されているか
if($friends_users_id!=null){
    foreach($friends_users_id as $friendlist_user_id){
        if($friendlist_user_id['friend_user_id']==$friend_user_id){
            $_SESSION['friend_register_error'] = "すでに登録されています。";
            header('Location: ../user/mypage.php');
            exit();
        }
    }
}

// 取ってきたフレンドのuser_id使ってDBfriends_listに登録
$result=$user->insertFriend($user_id,$friend_user_id);
if ($result !== '') {
    $_SESSION['friend_register_error'] = $result;
    header('Location: ../user/mypage.php');
    exit();
}
header('Location: friend_list.php');
require_once __DIR__ . '/../header.php';
