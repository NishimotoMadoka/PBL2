<?php
    require_once __DIR__ . '/../header.php';
    require_once __DIR__ . '/../classes/user.php';
    $user_id = $_SESSION['user_id'];
    $user=new User();
    $user_plofile = $user->detailsUser($user_id);
    $icon = $_FILES['up_icon']['name'];
    $mail = $user_plofile['mail'];
    // メアドの@以前を切り出してアイコン名の前につけて保存
    $mail_num=strstr($mail,'@',true);
    $icon_name=$mail_num.$icon;

    
    //画像を保存
    move_uploaded_file($_FILES['icon']['tmp_name'], '../icon_image/' . $icon_name);

    $user = new User();
    $result = $user->Icon_update($icon_name,$user_id);


    if ($result !== '') {
        $_SESSION['icon_error'] = $result;
        header('Location: icon_update.php');
        exit();
    }
    header('Location:../user/mypage.php');

?>