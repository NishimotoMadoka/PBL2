<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ .'/../pre.php';
if(!isset($_SESSION)){
    session_start();
}

$user_id = $_SESSION['user_id'];
// $mail_num=$_SESSION['mail_num'];
// $diary_date=$_POST['date']; //日付
$title = $_POST['title']; //タイトル
$diary = $_POST['diary']; //本文
$post_date=$_POST['date']; //日付
$article_id=$_POST['article_id'];
// echo $article_id;
// exit(0);
// $diary_date = date('Y-m-d ') . date('H:i:s');


if (mb_strlen($title) > 50) {
    $_SESSION['diary_error'] = '50文字以下でタイトルをつけてください';
    header('Location: diary.php');
    exit();
}
if (preg_match('/[&"\'<>]/', $title)) {
    $_SESSION['diary_error'] = '使用できない文字が含まれています';
    header('Location: diary.php');
    exit();
}
if (preg_match('/[&"\'<>]/', $diary)) {
    $_SESSION['diary_error'] = '使用できない文字が含まれています';
    header('Location: diary.php');
    exit();
}

if (mb_strlen($diary) > 3500) {
    $_SESSION['diary_error'] = '3500文字以下で夢日記を入力してください';
    header('Location: diary.php');
    exit();
}


require_once __DIR__ . '/../classes/article_list.php';
$article = new Article();
$result = $article->insertDiary($title, $diary, $article_id);


if ($result !== '') {
    $_SESSION['diary_error'] = $result;
    header('Location: diary.php');
    exit();
}


// $_SESSION['title'] = $title;
// $_SESSION['diary'] = $diary;

header('Location:' . $toppage_php);
// require_once __DIR__ . '/../footer.php';
