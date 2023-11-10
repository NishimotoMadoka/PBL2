<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="./like.js"></script>

<?php
error_log('like.php was executed');
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../classes/article_list.php';

// セッションの開始
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$article = new Article();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['article_id'], $_POST['post_user_id'], $_POST['user_id']) && !empty($_POST['article_id']) && !empty($_POST['post_user_id']) && !empty($_POST['user_id'])) {
      $article_id = $_POST['article_id'];
      $post_user_id = $_POST['post_user_id'];
      $user_id = $_POST['user_id'];
      $good_time = $_POST['good_time'];
      // いいねした時間の取得処理こっちでする
      $good_time=date("Y-m-d H:i:s");


        //いいね処理
        $favorite = $article->checkGood_duplicate($user_id, $post_user_id, $article_id);

        if ($favorite) {
            $action = '解除';
            $delete = $article->delete_Good($user_id, $post_user_id, $article_id);
        } else {
            $action = '登録';
            $insert = $article->insert_Good($user_id, $post_user_id, $article_id,$good_time);
        }

        // ここでデータベースクエリがエラーを返す可能性があるため、エラーハンドリング
        if ($favorite === false || ($favorite !== false && ($delete !== false || $insert !== false))) {
          // 成功時のレスポンス
          echo json_encode(['status' => 'success']);
      } else {
          // エラー時のレスポンス
          echo json_encode(['status' => 'error', 'message' => 'Database error']);
      }
  } else {
      // リクエストパラメータが足りない場合の処理
      echo json_encode(['status' => 'error', 'message' => 'Missing or empty parameters']);
  }
}
?>
