<?php
require_once __DIR__ . '/../classes/user.php';
echo $_POST['mail'];
// session_start();
$user_show_id=$_SESSION['user_id'];
// $newuser_id=$_SESSION['user_id'];
// $name=$_SESSION['name'];
$newname = $_POST['newname'];
// $mail = $_SESSION['mail'];
$newmail=$_POST['newmail'];
// $profile_comment=$_SESSION['profile_comment'];
$newprofile_comment = $_POST['newprofile_comment'];
// $password = $_POST['password'];
$newpassword=$_POST['newpassword'];
$newpassword_conf=$_POST['newpassword_conf'];

$user=new User();
// $user_info=$user->detailsUser($user_show_id);
$user_plofile = $user->detailsUser($user_show_id);

$name=$user_plofile['name'];
$mail=$user_plofile['mail'];
$profile_comment=$user_plofile['profile_comment'];
$password=$user_plofile['password'];

if(strpos($newpassword, $newpassword_conf) !== 1){
    $_SESSION['signup_error'] = 'パスワードが一致しません。';
    header('Location: update.php');
    exit();
}

// パスワード5文字以上40文字以下
if(mb_strlen($newpassword)>=41 || mb_strlen($newpassword)<=4){
    $_SESSION['update_error']='パスワードは5文字以上40文字以下で入力してください。';
    header('Location: update.php');
    exit();
}

$result=$user->getUserinfo($user_show_id,$password);
if($result==''){
    if($newname!==''){
        $name=$newname;
    }
    if($newmail!==''){
        $mail=$newmail;
    }
    if($newprofile_comment!==''){
        $profile_comment=$newprofile_comment;
    }
    if($newpassword!==''){
        $password=$newpassword;
    }
    $user = new User();
    $result = $user->updateUser($name,$mail,$profile_comment,$password,$user_id);

    if ($result !== '') {
        $_SESSION['update_error'] = $result;
        // header('Location: update.php');
        exit();
    }

    $_SESSION['password']=$password;
}elseif($result!==''){
    $_SESSION['update_error']=$result;
    // header('Location: update.php');
    exit();
}


setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');
require_once __DIR__ . '/../header.php';
?>

<?php
//header('Location:./user_show.php');
require_once __DIR__ . '/../footer.php';
?>