<?php
require_once __DIR__ . '/../header.php';
?>
<head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
  <script src="./test.js"></script>
</head>
<?php 
  $_start = $_POST['starttime'];//$_POST で受け取る
  $_end = $_POST['endtime'];
  $_label =$_POST['item'];//DBから来た値
    // echo $_start;
    // echo $_end;
    // echo $_label;
    // exit(0);
  $_start = json_encode($_start);
  $_end = json_encode($_end);
  $_label = json_encode($_label);//phpからきた、値をjavascriptに変換
//    echo $_start;
//     echo $_end;
//     echo $_label;

//     exit(0);
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
  //getRandom(); // グラフデータにランダムな値を格納
  drawChart(); // グラフ描画処理を呼び出す

  // ボタンをクリックしたら、グラフを再描画
 //document.getElementById('btn').onclick 
 window.addEventListener('DOMContentLoaded', function() {
  // すでにグラフ（インスタンス）が生成されている場合は、グラフを破棄する
  if (myChart) {
    myChart.destroy();
  }
  getdata();
  //getRandom(); // グラフデータにランダムな値を格納
  drawChart(); // グラフを再描画
});
</script>
<!DOCTYPE html>
<html lang="ja">

<section>
    <h2>詳細</h2>
    


</section>
</html>