<?php
require_once __DIR__ . '/../classes/user.php';
require_once __DIR__ . '/../pre.php';

$mail = $_POST['mail'];
$password = $_POST['password'];

$user = new User();
$result = $user->authUser($mail);
if(!isset($_SESSION)){
    session_start();
}

// 入力せずにログインボタンを押したらエラーメッセージ
// if (empty($result['mail'])) {
//     $_SESSION['login_error'] = 'メールアドレス、パスワードを入力してください。';
//     header('Location:'.$login_php);
//     exit();
// }

$hash_password=$result['password'];

if(password_verify($password,$hash_password)==false){

    $_SESSION['login_error'] = 'メールアドレス、パスワードが違います。';
    header('Location:'.$logout_php);
    exit();
}

    $name=$result['name'];
    header('Location:'.$toppage_php);
    // クッキー設定後で変更したい
    // setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');
    // setcookie("user_id", $user_id, time() + 60 * 60 * 24 * 14, '/');
    
    // header('Location:'.$toppage_php);

require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../footer.php';
?>