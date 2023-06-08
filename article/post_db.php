<?php
// require_once __DIR__ . '/../header.php';
if(!isset($_SESSION)){
    session_start();
}

$user_id = $_SESSION['user_id'];
$mail_num=$_SESSION['mail_num'];
$title = $_POST['title']; //タイトル
$diary = $_POST['diary']; //本文
$date_time = date('Y-m-d ') . date('H:i:s');
// $article_image = $_FILES['up_image']['name'];

// if ($article_image!=""){
//     $article_image=$mail_num.$article_image;
// }
//   //画像を保存
// move_uploaded_file($_FILES['up_image']['tmp_name'], '../article_image/' . $article_image);


if (mb_strlen($title) > 50) {
    $_SESSION['post_error'] = '50文字以下でタイトルをつけてください';
    header('Location: post.php');
    exit();
}
if (preg_match('/[&"\'<>]/', $title)) {
    $_SESSION['post_error'] = '使用できない文字が含まれています';
    header('Location: post.php');
    exit();
}
if (preg_match('/[&"\'<>]/', $diary)) {
    $_SESSION['post_error'] = '使用できない文字が含まれています';
    header('Location: post.php');
    exit();
}

if (mb_strlen($diary) > 3500) {
    $_SESSION['post_error'] = '3500文字以下で夢日記を入力してください';
    header('Location: post.php');
    exit();
}


require_once __DIR__ . '/../classes/article_list.php';

$article = new Article();
$result = $article->insertArticle($user_id, $title, $diary, $date_time);


if ($result !== '') {
    $_SESSION['post_error'] = $result;
    header('Location: post.php');
    exit();
}


$_SESSION['title'] = $title;
$_SESSION['diary'] = $diary;


// require_once __DIR__ . '/../footer.php';
