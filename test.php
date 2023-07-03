<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Chart.jsでボタンをクリックしてグラフを更新するサンプル</title>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
</head>
<body>

<script src="js/test.js"></script>

<!-- グラフ描画エリア -->
<div style="width:100%">
  <canvas id="canvas"></canvas>
</div>

<!-- グラフ更新ボタン -->
<button type="button" id="btn">グラフを更新</button>

<script>
<?php 
  $_start = '2:00,4:40,#,#,11:00,13:15,20:37,23:00';
  $_end = '3:00,5:40,#,#,12:00,14:15,22:37,24:00';
  $_label ='1,2,3,4,5,6,7,8';//DBから来た値

  $_start = json_encode($_start);
  $_end = json_encode($_end);
  $_label = json_encode($_label);//phpからきた、値をjavascriptに変換
?>

const sample1 = <?php echo $_start;?>;
const sample2 = <?php echo $_end;?>;
const sample3 = <?php echo $_label;?>;

  // ページ読み込み時にグラフを描画
  //getRandom(); // グラフデータにランダムな値を格納
  drawChart(); // グラフ描画処理を呼び出す

  // ボタンをクリックしたら、グラフを再描画
 document.getElementById('btn').onclick = function() {
  // すでにグラフ（インスタンス）が生成されている場合は、グラフを破棄する
  if (myChart) {
    myChart.destroy();
  }
  getdata();
  //getRandom(); // グラフデータにランダムな値を格納
  drawChart(); // グラフを再描画
}
</script>
</body>
</html>