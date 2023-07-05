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

<canvas id="js-graph" class = "graph"></canvas>

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

//ここからサンプル
const date = new Date();
const hour = date.getHours();
const graph = document.getElementById('js-graph');
const ctx = graph.getContext('2d');
const gWidth = graph.clientWidth * 2;
graph.width = gWidth;
graph.height = gWidth;
const gCenter = gWidth / 2;
const gRadius = gCenter * 0.77;
 
const data = [5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 5, 1, 2, 3, 5, 4, 5, 5, 5, 5, 5];
 
const LEVEL_1 = '#0157a8';
const LEVEL_2 = '#3a8dcc';
const LEVEL_3 = '#4c9c05';
const LEVEL_4 = '#e78200';
const LEVEL_5 = '#e7616c';
 
function drawPi(ctx, w, c, r, d) {
  // ここに描画内容を記述していく
  // 時計の部分描画
  ctx.save();
  for (let i=0;i<24;i++) {
    const angleRad = (Math.PI / 12 )* (i - 6);
    const x = (c * 0.84) * Math.cos(angleRad) + c;
    const y = (c * 0.84) * Math.sin(angleRad) + c;
    const txtX = (c * 0.92) * Math.cos(angleRad) + c;
    const txtY = (c * 0.92) * Math.sin(angleRad) + c;
    ctx.beginPath();
    ctx.moveTo(x, y);
    ctx.lineTo(c, c);
    ctx.closePath();
 
    ctx.restore();
    ctx.textAlign = 'center';
    if (i < hour) {
      ctx.strokeStyle = '#bbb';
      ctx.fillStyle = '#bbb';
    } else {
      ctx.strokeStyle = '#000';
      ctx.fillStyle = '#000';
    }
    ctx.font = '18px din-condensed';
    ctx.stroke();
    ctx.fillText(String(i)+'時', txtX, txtY + 4);
  }
 
  // 中心部分をクリアする
  ctx.globalCompositeOperation = 'destination-out';
  ctx.beginPath();
  ctx.arc(c, c, (c * 0.80), 0, Math.PI*2, false);
  ctx.fill();
  // データ描画
  ctx.globalCompositeOperation = 'source-over';
  ctx.save();
  for (let i=0;i<24;i++) {
    ctx.beginPath();
    ctx.arc(c, c, r, (Math.PI/12)* (i - 5), (Math.PI/12)*(i - 6), true);
    ctx.lineTo(c,c);
    ctx.closePath();
    ctx.restore();
    if(d[i]) {
      switch (d[i]) {
        case 1:
          ctx.strokeStyle = LEVEL_1;
          ctx.fillStyle = LEVEL_1;
          break;
        case 2:
          ctx.strokeStyle = LEVEL_2;
          ctx.fillStyle = LEVEL_2;
          break;
        case 3:
          ctx.strokeStyle = LEVEL_3;
          ctx.fillStyle = LEVEL_3;
          break;
        case 4:
          ctx.strokeStyle = LEVEL_4;
          ctx.fillStyle = LEVEL_4;
          break;
        case 5:
          ctx.strokeStyle = LEVEL_5;
          ctx.fillStyle = LEVEL_5;
          break;
        default:
          break;
      }
    } else {
      ctx.strokeStyle = '#ccc';
      ctx.fillStyle = '#ccc';
    }
    ctx.fill();
    ctx.stroke();
  }
}
drawPi(ctx, gWidth, gCenter, gRadius, data);
</script>
</body>
</html>