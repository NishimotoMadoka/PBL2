<?php
require_once __DIR__ . '/../classes/user.php';

$name = $_POST['name'];
$mail = $_POST['mail'];
$profile_comment=$_POST['profile_comment'];
$password = $_POST['password'];
$password_conf=$_POST['password_conf'];
$icon = $_FILES['icon']['name'];
if($icon!==""){
// メアドの@以前を切り出してアイコン名の前につけて保存
$mail_num=strstr($mail,'@',true);
$icon_name=$mail_num.$icon;
move_uploaded_file($_FILES['icon']['tmp_name'], '../icon_image/' . $icon_name);
}else{
    $icon_name="";
}

if(strpos($password, $password_conf) !== 0){
    $_SESSION['signup_error'] = 'パスワードが一致しません。';
    header('Location: signup.php');
    exit();
}

//画像を保存
// $icon_image_path="C:\xampp\htdocs\pbl2\icon_image";

if(!isset($_SESSION)){
    session_start();
}


// 名前2文字制限設ける？？
if (mb_strlen($name) >= 21) {
    $_SESSION['signup_error'] = '名前は20文字以下で入力してください。';
    header('Location: signup.php');
    exit();
}
// メールアドレスチェック　文字制限設ける？？
 if (!filter_var($mail, FILTER_VALIDATE_EMAIL) || mb_strlen($mail) >= 51 ) {
    $_SESSION['signup_error'] = '正しいメールアドレスを入力してください。';
    header('Location: signup.php');
    exit();
}

// パスワード文字制限設ける？？
if(mb_strlen($password)>=41 || mb_strlen($password)<=4){
    $_SESSION['signup_error']='パスワードは5文字以上40文字以下で入力してください。';
    header('Location: signup.php');
    exit();
}

// ふれんどこーどてきなやつ(9けた)
$str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
$friend_code = substr(str_shuffle($str), 0, 9);
$user = new User();
$password=password_hash($password,PASSWORD_DEFAULT);
$result = $user->signup($name, $mail, $profile_comment,$friend_code,$icon_name, $password);

if ($result !== '') {
    $_SESSION['signup_error'] = $result;
    header('Location: signup.php');
    exit();
}

require_once __DIR__ . '/../header.php';
?>

<?php
require_once __DIR__.'/../pre.php';
header('Location:'.$login_php);
require_once __DIR__ . '/../footer.php';
?>