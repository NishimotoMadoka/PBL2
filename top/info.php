<?php
require_once __DIR__ . '/../header.php';
?>
<head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
  <script src="../js/test.js"></script>
</head>
<?php 
//chart.js3.7に変えた
  $_start = $_POST['starttime'];//$_POST で受け取る
  $_end = $_POST['endtime'];
  $_label =$_POST['item'];//DBから来た値
    
  $_start = json_encode($_start);
  $_end = json_encode($_end);
  $_label = json_encode($_label);//phpからきた、値をjavascriptに変換

?>
<div style="width:100%">
  <canvas id="canvas"></canvas>
</div>
<script>
    // console.log(<?php echo $_start;?>);
    // console.log(<?php echo $_end;?>);
    // console.log(<?php echo $_label;?>);
    // exit(0);

const sample1 = <?php echo $_start;?>;
const sample2 = <?php echo $_end;?>;
const sample3 = <?php echo $_label;?>;
// ページ読み込み時にグラフを描画
  
  drawChart(); // グラフ描画処理を呼び出す

  // ボタンをクリックしたら、グラフを再描画
 //document.getElementById('btn').onclick 
 window.addEventListener('DOMContentLoaded', function() {
  // すでにグラフ（インスタンス）が生成されている場合は、グラフを破棄する
  if (myChart) {
    myChart.destroy();
  }
  getdata();
  
  drawChart(); // グラフを再描画
});
</script>
<!DOCTYPE html>
<html lang="ja">

<section>
    <h2>詳細</h2>
    


</section>
</html>