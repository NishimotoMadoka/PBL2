<?php
// require_once __DIR__ . '/../header.php';
require_once __DIR__ .'/../pre.php';
if(!isset($_SESSION)){
    session_start();
}

$user_id = $_SESSION['user_id'];
$mail_num=$_SESSION['mail_num'];
$date=$_POST['date'];
$item_name="";
$start_time="";
$end_time="";
for($i=1;$i<11;$i++){
    $item=$_POST['item_name'.$i];
    $time_start=$_POST['start_time'.$i];
    $time_end=$_POST['end_time'.$i];
    if($item==""){
        $item_name.=",";
    }else{
        $item_name.=$item.",";
    }

    if($time_start==""){
        $start_time.=",";
    }else{
        $start_time.=$time_start.",";
    }

    if($time_end==""){
        $end_time.=",";
    }else{
        $end_time.=$time_end.",";
    }
}
echo $item_name;
echo $start_time;
echo $end_time;

// $article_image = $_FILES['up_image']['name'];

// if ($article_image!=""){
//     $article_image=$mail_num.$article_image;
// }
// //画像を保存
// move_uploaded_file($_FILES['up_image']['tmp_name'], '../article_image/' . $article_image);


// if (mb_strlen($title) > 50) {
//     $_SESSION['diary_error'] = '50文字以下でタイトルをつけてください';
//     header('Location: diary.php');
//     exit();
// }
// if (preg_match('/[&"\'<>]/', $title)) {
//     $_SESSION['diary_error'] = '使用できない文字が含まれています';
//     header('Location: diary.php');
//     exit();
// }
// if (preg_match('/[&"\'<>]/', $diary)) {
//     $_SESSION['diary_error'] = '使用できない文字が含まれています';
//     header('Location: diary.php');
//     exit();
// }

// if (mb_strlen($diary) > 3500) {
//     $_SESSION['diary_error'] = '3500文字以下で夢日記を入力してください';
//     header('Location: diary.php');
//     exit();
// }


// require_once __DIR__ . '/../classes/article_list.php';

// $article = new Article();
// $result = $article->insertArticle($user_id, $title, $diary, $date_time,$article_image);


// if ($result !== '') {
//     $_SESSION['diary_error'] = $result;
//     header('Location: diary.php');
//     exit();
// }


// $_SESSION['title'] = $title;
// $_SESSION['diary'] = $diary;

// header('Location:' . $toppage_php);
// // require_once __DIR__ . '/../footer.php';
