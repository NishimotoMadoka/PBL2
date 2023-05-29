<?php
require_once __DIR__ . '/../classes/user.php';

$name = $_POST['name'];
$mail = $_POST['mail'];
$profile_comment=$_POST['profile_comment'];
$password = $_POST['password'];
$icon = $_FILES['icon']['name'];

$mail_num=strstr($mail,'@',true);
$icon_name=$mail_num.$icon;

//画像を保存
// $icon_image_path="C:\xampp\htdocs\pbl2\icon_image";
move_uploaded_file($_FILES['icon']['tmp_name'], '../icon_image/' . $icon);


session_start();

// 名前2文字制限設ける？？
if (mb_strlen($name) >= 21) {
    $_SESSION['signup_error'] = '名前は20文字以下で入力してください。';
    header('Location: register.php');
    exit();
}
// メールアドレスチェック　文字制限設ける？？
 if (!filter_var($mail, FILTER_VALIDATE_EMAIL) || mb_strlen($mail) >= 51 ) {
    $_SESSION['signup_error'] = '正しいメールアドレスを入力してください。';
    header('Location: register.php');
    exit();
}

// パスワード文字制限設ける？？
if(mb_strlen($password)>=41 || mb_strlen($password)<=4){
    $_SESSION['signup_error']='パスワードは5文字以上40文字以下で入力してください。';
    header('Location: register.php');
    exit();
}

$user = new User();
// $hash=password_hash($_POST[$password],PASSWORD_DEFAULT);　にしもとのメモ　いったん無視しといてください
$result = $user->signup($name, $mail, $profile_comment, $password);

if ($result !== '') {
    $_SESSION['signup_error'] = $result;
    header('Location: signup.php');
    exit();
}

$user = new User();
$result = $user->authUser($mail, $password);

$_SESSION['user_id']=$result['user_id'];
$_SESSION['name'] = $name;
$_SESSION['mail'] = $mail;
$_SESSION['profile_comment']=$profile_comment;
// sessionにパスワードいれる？？
// $_SESSION['password']=$password;



// cookieの設定　後で変更したい
setcookie("user_id", $result['user_id'],time()+60*60*24*14,'/');
setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');

// header.php作ったら下のコメントアウト外して
// require_once __DIR__ . '/../header.php';
?>

<?php
// headerlocationの先を変更する
// header('Location:' . $saisyonopeage_php);
// footer.php作ったら下のコメントアウト外して
// require_once __DIR__ . '/../footer.php';
?>