<?php
require_once __DIR__ . '/../classes/user.php';
require_once __DIR__ . '/../pre.php';
// echo $_POST['mail'];
// session_start();
if(!isset($_SESSION)){
    session_start();
}
// echo "maichan";
// exit(0);
$user_id=$_SESSION['user_id'];
$user=new User();
$user_profile = $user->detailsUser($user_id);
$hash_password=$user_profile['password'];
$password=$_POST['password'];

// $result=$user->authUser($password,$user_id);

if(password_verify($password,$hash_password)==false){
    $_SESSION['update_error'] = 'パスワードが違います。';
    header('Location: update.php');
    exit();
}else{
    if($_POST['newname']==''){
        $name=$user_profile['name'];
    }else{
        $name=$_POST['newname'];
    }if($_POST['newmail']==''){
        $mail=$user_profile['mail'];
    }else{
        $mail=$_POST['newmail'];
    }if($_POST['newprofile_comment']==''){
        $profile_comment=$user_profile['profile_comment'];
    }else{
        $profile_comment=$_POST['newprofile_comment'];
    }
    
    if($_POST['newpassword']==''){
        $user = new User();
        $result = $user->updateUser($name,$mail,$profile_comment,$user_id);
        if ($result !== '') {
            $_SESSION['update_error'] = $result;
            header('Location: update.php');
            exit();
        }
    }else{
        $password=$_POST['newpassword'];
        // パスワード5文字以上40文字以下
        if(mb_strlen($password)>=41 || mb_strlen($password)<=4){
            $_SESSION['update_error']='パスワードは5文字以上40文字以下で入力してください。';
            header('Location: update.php');
            exit();
        }
        // if(strpos($password, $_POST['newpassword_conf']) !== 1){
        if($password!==$_POST['newpassword_conf']){
            $_SESSION['update_error'] = 'パスワードが一致しません。';
            header('Location: update.php');
            exit();
        }
        $password=password_hash($password,PASSWORD_DEFAULT); //ハッシュ化
        $user = new User();
        $result = $user->updateUserdetails($name,$mail,$profile_comment,$password,$user_id);
        if ($result !== '') {
            $_SESSION['update_error'] = $result;
            header('Location: update.php');
            exit();
        }
    }
}



// setcookie("name", $name, time() + 60 * 60 * 24 * 14, '/');
require_once __DIR__ . '/../header.php';
?>

<?php
header('Location:./mypage.php');
require_once __DIR__ . '/../footer.php';
?>