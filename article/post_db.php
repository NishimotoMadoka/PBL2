<?php
// require_once __DIR__ . '/../header.php';
require_once __DIR__ .'/../pre.php';
if(!isset($_SESSION)){
    session_start();
}

$user_id = $_SESSION['user_id'];
$mail_num=$_SESSION['mail_num'];
// 日付
$post_date=$_POST['date'];
// 時間と項目名の受け取り、連結
$item_name="";
$start_time="";
$end_time="";
for($i=1;$i<11;$i++){
    $item=$_POST['item_name'.$i];
    $time_start=$_POST['start_time'.$i];
    $time_end=$_POST['end_time'.$i];

    if(var_dump($time_start == $time_end)){
    // if(strtotime($time_start)==strtotime($time_end)){
        $_SESSION['post_error']='開始時間と終了時間は違うはずだよね？？？？';
        header('Location: post.php');
        exit();
    }
    if($i>1){
        if(strtotime($_POST['end_time'.$i-1]) > strtotime($time_start)){
            $_SESSION['post_error']='開始時間は前のタスクの終了時間以降で入力してください';
            header('Location: post.php');
            exit();
        }
    }
    if(strtotime($time_start) > strtotime($time_end)){
        $_SESSION['post_error']='終了時間は開始時間よりおそいはずだよね？？？？';
        header('Location: post.php');
        exit();
    }
    

    if (mb_strlen($item) > 8) {
        $_SESSION['post_error'] = '8文字以下で項目名を入力してください';
        header('Location: post.php');
        exit();
    }
    if (preg_match('/[&"\'<>]/', $item)) {
        $_SESSION['post_error'] = '使用できない文字が含まれています';
        header('Location: post.php');
        exit();
    }

    if($item==""){
        $item_name.="#,";
    }else{
        $item_name.=$item.",";
    }

    if($time_start==""){
        $start_time.="#,";
    }else{
        $start_time.=$time_start.",";
    }

    if($time_end==""){
        $end_time.="#,";
    }else{
        $end_time.=$time_end.",";
    }
}

// 画像の受け取り、加工
$article_image = $_FILES['up_image']['name'];

if ($article_image!=""){
    $article_image=$mail_num.$article_image;
}
//画像を保存
move_uploaded_file($_FILES['up_image']['tmp_name'], '../article_image/' . $article_image);



require_once __DIR__ . '/../classes/article_list.php';

$article = new Article();
$result = $article->insertArticle($user_id, $start_time, $end_time, $item_name,$post_date,$article_image);


if ($result !== '') {
    $_SESSION['post_error'] = $result;
    header('Location: post.php');
    exit();
}


// $_SESSION['title'] = $title;
// $_SESSION['diary'] = $diary;

header('Location:' . $toppage_php);
require_once __DIR__ . '/../footer.php';
