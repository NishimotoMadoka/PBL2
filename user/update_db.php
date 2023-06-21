<?php
require_once __DIR__ . '/../classes/user.php';
// echo $_POST['mail'];
// session_start();
if(!isset($_SESSION)){
    session_start();
}
$user_id=$_SESSION['user_id'];
$user=new User();
$user_plofile = $user->detailsUser($user_id);
$password=$user_plofile['password'];
$result=$user->authPassword($password,$user_id);

if($_POST['newname']==''){
    $name=$user_plofile['name'];
}else{
    $name=$_POST['newname'];
}
if($_POST['newmail']==''){
    $mail=$user_plofile['mail'];
}else{
    $mail=$_POST['newmail'];
}if($_POST['newprofile_comment']==''){
    $profile_comment=$user_plofile['plofile_comment'];
}else{
    $profile_comment=$_POST['newprofile_comment'];
}if($_POST['newpassword']==''){
    $password=$user_plofile['password'];
}else{
    $password=$_POST['newpassword'];
    if(strpos($password, $_POST['newpassword_conf']) !== 1){
        $_SESSION['signup_error'] = 'パスワードが一致しません。';
        header('Location: update.php');
        exit();
    }
    
}

// パスワード5文字以上40文字以下
if(mb_strlen($password)>=41 || mb_strlen($password)<=4){
    $_SESSION['update_error']='パスワードは5文字以上40文字以下で入力してください。';
    header('Location: update.php');
    exit();
}

$user = new User();
    $result = $user->updateUser($name,$mail,$profile_comment,$password,$user_id);

    if ($result !== '') {
        $_SESSION['update_error'] = $result;
        header('Location: update.php');
        exit();
    }else{
        echo $result;
    }

setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');
require_once __DIR__ . '/../header.php';
?>

<?php
header('Location:./user_show.php');
require_once __DIR__ . '/../footer.php';
?>