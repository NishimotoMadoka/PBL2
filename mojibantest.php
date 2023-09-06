<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Chart.jsでボタンをクリックしてグラフを更新するサンプル</title>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<script src="https://rawgit.com/beaver71/Chart.PieceLabel.js/master/build/Chart.PieceLabel.min.js"></script>
</head>
<body>


<script src="js/mojibantest.js"></script>

<!-- グラフ描画エリア -->
<div style="width:100%">
  <canvas id="canvas"></canvas>
</div>
<canvas id="my-chart"></canvas>
<script>
var ctx = document.getElementById('canvas').getContext('2d');
var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["データなし"],
        datasets: [{
            data: [24],
            backgroundColor: ['red'],
            borderWidth: 1,
        }]
    },
options: {
    responsive: true,
    maintainAspectRation: false,
    legend: {
        display: false
    }
}
});
</script>
<!--グラフの色変更用-->
<p>選択した色 <span id="span1"></span></p>
<form name="form1">
<label><input type="radio" name="color1" value="red">赤</label>
<label><input type="radio" name="color1" value="blue">青</label>
<label><input type="radio" name="color1" value="yellow">黄</label>
</from>
<input type="button" value="ボタン" onclick="clickBtn1()" />

<!-- グラフ更新ボタン -->
<button type="button" id="btn">グラフを更新</button>

<script>
<?php 
  $_start = '2:11,4:40,#,#,11:00,13:15,20:37,23:00';//$_POST で受け取る
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

function clickBtn1(){
    let str = "";
    const color1 =document.form1.color1;

    for(let i = 0; i<color1.length; i++){
      if (color1[i].checked){
        str =color1[i].value;
        break;
      }
    }
    document.getElementById("span1").textContent = str;
  }
//グラフの表示をいじるよう
//表示変更ここまで

</script>
</body>
</html>