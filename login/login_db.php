<?php
require_once __DIR__ . '/../classes/user.php';
require_once __DIR__ . '/../pre.php';

$mail = $_POST['mail'];
$password = $_POST['password'];

$user = new User();
$result = $user->authUser($mail, $password);

if(!isset($_SESSION)){
    session_start();
}

// 入力せずにログインボタンを押したらエラーメッセージ
if (empty($result['mail'])) {
    $_SESSION['login_error'] = 'ユーザID、パスワードを確認してください。';
    header('Location:./login.php');
    exit();
}

$name = $result['name'];
$user_id = $result['user_id'];
$_SESSION['user_id'] = $user_id;
$_SESSION['name'] = $name;
$_SESSION['password'] = $result['password'];
$_SESSION['mail'] = $mail;
$mail_num=strstr($mail,'@',true);
$_SESSION['mail_num']=$mail_num;
$_SESSION['profile_comment']=$profile_comment;

// クッキー設定後で変更したい
setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');
setcookie("user_id", $user_id, time() + 60 * 60 * 24 * 14, '/');

require_once __DIR__ . '/../header.php';

?>

<?php
header('Location:' . $toppage_php);

require_once __DIR__ . '/../footer.php';
?>