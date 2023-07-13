<!DOCTYPE HTML>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>Chart.jsでボタンをクリックしてグラフを更新するサンプル</title>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
<<<<<<< HEAD
=======
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-piechart-outlabels"></script>
>>>>>>> 5be97497f7e0fd016fdba92ecb6ab8c543ff0d0b
</head>
<body>

<script src="js/test.js"></script>

<!-- グラフ描画エリア -->
<div style="width:100%">
<<<<<<< HEAD
  <canvas id="canvas"></canvas>
=======
  <canvas id="canvas" style="display: block; height: 500px; width: 500px; margin: auto;" width="700px" height="700px"></canvas>
>>>>>>> 5be97497f7e0fd016fdba92ecb6ab8c543ff0d0b
</div>

<!-- グラフ更新ボタン -->
<button type="button" id="btn">グラフを更新</button>

<<<<<<< HEAD
<script>
<?php 
  $_start = '2:11,4:40,#,#,11:00,13:15,20:37,23:00';//$_POST で受け取る
  $_end = '3:00,5:40,#,#,12:00,14:15,22:37,24:00';
=======
<!-- <canvas id="js-graph" class = "graph"></canvas> -->

<div style="width:100%; text-align:center;">
  <canvas id="myCanvas" width="100px" height="100px" style="background-color:#ffffff;">
  </canvas>
</div>
<script type="text/javascript">
// 時計を描画する関数。
// 定期的に呼び出すことで、アナログ時計の動きを表現する。
var drawClock = function(){

  // 各種情報を変数に格納する。
  var canvas = document.getElementById("myCanvas");
  var c      = canvas.getContext("2d");
  var w      = canvas.width;
  var h      = canvas.height;
  var center = {x : w / 2, y : h / 2};
  var lw     = w * 0.8 / 2; // needle width.

  // Canvasの色やフォントを指定する。
  c.fillStyle   = "#000000";
  c.strokeStyle = "#000000";
  c.font        = "10px 'ＭＳ Ｐゴシック'";

  // Canvasに表示している内容をクリアする。
  c.clearRect(0, 0, w, h);

  // 時計盤の文字列を描画する。
  for (var i = 0; i < 12; i++) {
    var radian = (360 / 12) * i * Math.PI / 180;
    var x = center.x + lw * Math.sin(radian);
    var y = center.y - lw * Math.cos(radian);
    var text = "" + (i == 0 ? "12" : i);
    c.fillText(text, x, y);
  }

  // 時計の針を描画する。
  // 現在時刻を取得して、針の角度(radian)を求める。
  var now = new Date();
  var hh = now.getHours();
  var mm = now.getMinutes();
  var ss = now.getSeconds();
  var hh_radian = (360 * hh / 12 + ((360 / 12) * mm / 60)) * Math.PI / 180;
  var mm_radian = (360 * mm / 60 + ((360 / 60) * ss / 60)) * Math.PI / 180;
  var ss_radian = (360 * ss / 60) * Math.PI / 180;

  // 求めた角度から線を引く座標を計算する。
  var pos_h = _calcPoint(center, (lw * 0.75), hh_radian);
  var pos_m = _calcPoint(center, lw, mm_radian);
  var pos_s = _calcPoint(center, lw, ss_radian);

  // 時針を描画する。
  c.beginPath();
  c.moveTo(center.x, center.y);
  c.lineTo((pos_h.x), (pos_h.y));
  c.stroke();
  
  // 分針を描画する。
  c.beginPath();
  c.moveTo(center.x, center.y);
  c.lineTo(pos_m.x, pos_m.y);
  c.stroke();

  // 秒針を描画する。
  // 秒針は赤色にしてみた。
  c.strokeStyle = "#ff0000";
  c.beginPath();
  c.moveTo(center.x, center.y);
  c.lineTo(pos_s.x, pos_s.y);
  c.stroke();

}

// 始点、長さ、角度から針の先端の座標を計算する。
var _calcPoint = function(center, lineWidth, radian) {
  var pos = {
    x : center.x + lineWidth * Math.sin(radian), 
    y : center.y - lineWidth * Math.cos(radian)
  };
  return pos;
}

// アナログ時計を描画する処理を1000ミリ秒毎に
// 実行するように設定する。
window.addEventListener("load", function(){
  setInterval(drawClock, 1000);
  }, false);

</script>

<script>
<?php 
  $_start = '2:11,4:40,#,10:30,11:00,13:15,20:37,23:00';//$_POST で受け取る
  $_end = '3:00,5:40,#,10:50,12:00,14:15,22:37,24:00';
>>>>>>> 5be97497f7e0fd016fdba92ecb6ab8c543ff0d0b
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
<<<<<<< HEAD
}
=======
  console.log(st)
}

//ここからサンプル
// const date = new Date();
// const hour = date.getHours();
// const graph = document.getElementById('js-graph');
// const ctx = graph.getContext('2d');
// const gWidth = graph.clientWidth * 2;
// graph.width = gWidth;
// graph.height = gWidth;
// const gCenter = gWidth / 2;
// const gRadius = gCenter * 0.77;
 
// const data = [5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 4, 5, 1, 2, 3, 5, 4, 5, 5, 5, 5, 5];
 
// const LEVEL_1 = '#0157a8';
// const LEVEL_2 = '#3a8dcc';
// const LEVEL_3 = '#4c9c05';
// const LEVEL_4 = '#e78200';
// const LEVEL_5 = '#e7616c';
 
// function drawPi(ctx, w, c, r, d) {
//   // ここに描画内容を記述していく
//   // 時計の部分描画
//   ctx.save();
//   for (let i=0;i<24;i++) {
//     const angleRad = (Math.PI / 12 )* (i - 6);
//     const x = (c * 0.84) * Math.cos(angleRad) + c;
//     const y = (c * 0.84) * Math.sin(angleRad) + c;
//     const txtX = (c * 0.92) * Math.cos(angleRad) + c;
//     const txtY = (c * 0.92) * Math.sin(angleRad) + c;
//     ctx.beginPath();
//     ctx.moveTo(x, y);
//     ctx.lineTo(c, c);
//     ctx.closePath();
 
//     ctx.restore();
//     ctx.textAlign = 'center';
//     if (i < hour) {
//       ctx.strokeStyle = '#bbb';
//       ctx.fillStyle = '#bbb';
//     } else {
//       ctx.strokeStyle = '#000';
//       ctx.fillStyle = '#000';
//     }
//     ctx.font = '18px din-condensed';
//     ctx.stroke();
//     ctx.fillText(String(i)+'時', txtX, txtY + 4);
//   }
 
//   // 中心部分をクリアする
//   ctx.globalCompositeOperation = 'destination-out';
//   ctx.beginPath();
//   ctx.arc(c, c, (c * 0.80), 0, Math.PI*2, false);
//   ctx.fill();
//   // データ描画
//   ctx.globalCompositeOperation = 'source-over';
//   ctx.save();
//   for (let i=0;i<24;i++) {
//     ctx.beginPath();
//     ctx.arc(c, c, r, (Math.PI/12)* (i - 5), (Math.PI/12)*(i - 6), true);
//     ctx.lineTo(c,c);
//     ctx.closePath();
//     ctx.restore();
//     if(d[i]) {
//       switch (d[i]) {
//         case 1:
//           ctx.strokeStyle = LEVEL_1;
//           ctx.fillStyle = LEVEL_1;
//           break;
//         case 2:
//           ctx.strokeStyle = LEVEL_2;
//           ctx.fillStyle = LEVEL_2;
//           break;
//         case 3:
//           ctx.strokeStyle = LEVEL_3;
//           ctx.fillStyle = LEVEL_3;
//           break;
//         case 4:
//           ctx.strokeStyle = LEVEL_4;
//           ctx.fillStyle = LEVEL_4;
//           break;
//         case 5:
//           ctx.strokeStyle = LEVEL_5;
//           ctx.fillStyle = LEVEL_5;
//           break;
//         default:
//           break;
//       }
//     } else {
//       ctx.strokeStyle = '#ccc';
//       ctx.fillStyle = '#ccc';
//     }
//     ctx.fill();
//     ctx.stroke();
//   }
// }
// drawPi(ctx, gWidth, gCenter, gRadius, data);
>>>>>>> 5be97497f7e0fd016fdba92ecb6ab8c543ff0d0b
</script>
</body>
</html>