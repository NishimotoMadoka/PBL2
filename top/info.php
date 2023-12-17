<?php
require_once __DIR__ . '/../header.php';
?>
<head>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-piechart-outlabels"></script>
  <script src="../js/TT.js"></script>
</head>
<?php 
  $_start = $_POST['starttime'];//$_POST で受け取る
  $_end = $_POST['endtime'];
  $_label = $_POST['item'];//DBから来た値
  $_color = $_POST['color'];//色
  $_label = $_POST['item'];//DBから来た値
  $_postdate = $_POST['postdate'];
  $_articleimg = $_POST['article_image'];
  // $_color = $_POST['color'];

    
  $_start = json_encode($_start);
  $_end = json_encode($_end);
  $_label = json_encode($_label);//phpからきた、値をjavascriptに変換
  $_color = json_encode($_color);
  $_postdate = json_encode($_postdate);
  // $_color = json_encode($_color);

?>
<div style="display: flex;">
<div style="width:100%">
  <canvas id="canvas" style="display: block; height: 600px; width: 600px; margin:auto;" width="700px" height="700px"></canvas>
</div>
<div style="width: 100%">
  <h1 style="text-align:center;">今日の画像</h1>
  <?php
   if ($_POST['article_image'] != "") {
  ?>
  <img src="../article_image/<?=$_articleimg?>" style="display:block; margin: auto; height: 450px; width: 450px;">
  <?php
   } else {
  ?>
  <img src="../img/ushi.png" style="display:block; margin:auto; height: 450px; width: 450px;">
  <?php
   }
  ?>
</div>
</div>
 <!-- <script src="../js/script.js"></script> -->
<script>
     console.log(<?php echo $_start;?>);
     console.log(<?php echo $_end;?>);
     console.log(<?php echo $_label;?>);
     console.log(<?php echo$_color; ?>);
     console.log(<?php echo $_postdate;?>);
    // exit(0);

const sample1 = <?php echo $_start;?>;
const sample2 = <?php echo $_end;?>;
const sample3 = <?php echo $_label;?>;
const color = <?php echo $_color;?>;
const postdate = <?php echo $_postdate;?>;

console.log(sample1);
console.log(sample2);
console.log(sample3);
// ページ読み込み時にグラフを描画
 window.addEventListener('DOMContentLoaded', function() {
 
  getdata2();
  drawChart(); // グラフを再描画
  
});



</script>