<?php
require_once __DIR__.'/../classes/dbdata.php'; // データベース接続ファイルをインクルード

session_start();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
} else {
    header('Location: login.php');
    exit;
}

if (isset($_POST['article_id'])) {
    $article_id = $_POST['article_id'];

    // goodテーブルにいいねを追加
    $stmt = $db->prepare("INSERT INTO good (user_id, article_id, flg) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $article_id, 1]);

    // いいね数を取得
    $stmt = $db->prepare("SELECT COUNT(*) AS likeCount FROM good WHERE article_id = ?");
    $stmt->execute([$article_id]);
    $result = $stmt->fetch();
    echo $result['likeCount']; // いいね数を返す
}
