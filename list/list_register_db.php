<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formCount = isset($_POST['form_count']) ? $_POST['form_count'] : 1;
require_once __DIR__ .'/../pre.php';
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../classes/user.php';
if(!isset($_SESSION)){
    session_start();
}
$user = new User();


$list_name = $_POST['list_name'];
$list_image = $_POST['list_image'];
$member_user_id=$_POST['member_user_id'];

// リストID 0-9,a-z,A-Zのランダム9桁
$str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
$list_id = substr(str_shuffle($str), 0, 9);

// 要素を結合して「,」区切りの文字列に変換してるのかな？？？？
$member_user_id = implode(',', $member_user_id);

// リスト登録
$result = $user->insertToplist($user_id,$list_id,$list_name,$member_user_id,$list_image);

if ($result !== '') {
    $_SESSION['list_error'] = $result;
    header('Location: list_register.php');
    exit();
}

require_once __DIR__ . '/../header.php';
?>

<?php
require_once __DIR__.'/../pre.php';
header('Location:./../top/toppage.php');
require_once __DIR__ . '/../footer.php';
}
?>
