<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $formCount = isset($_POST['form_count']) ? $_POST['form_count'] : 1;

  // 各フィールドの値を取得
  $items = $_POST['items'];
  $startTimes = $_POST['start_times'];
  $endTimes = $_POST['end_times'];

  // 受け取ったデータの処理
  for ($i = 0; $i < $formCount; $i++) {
    $item = $items[$i];
    $startTime = $startTimes[$i];
    $endTime = $endTimes[$i];

    // 受け取ったデータを利用して何らかの処理を行う
    // 例: データベースに保存する、別のファイルに書き込む、など
    // ここでは単に出力しています
    echo "項目: " . $item . ", 開始時間: " . $startTime . ", 終了時間: " . $endTime . "<br>";
  }
}
?>
