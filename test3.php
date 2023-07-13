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


<script src="js/test2.js"></script>

<!-- グラフ描画エリア -->
<div style="width:100%">
  <canvas id="canvas"></canvas>
</div>
<canvas id="my-chart"></canvas>
<!--グラフの色変更用-->
<p>選択した色 <span id="span1"></span></p>
<form name="form1">
<label><input type="radio" name="color1" value="red">赤</label>
<label><input type="radio" name="color1" value="blue">青</label>
<label><input type="radio" name="color1" value="yellow">黄</label>
</from>
<input type="button" value="ボタン" onclick="clickBtn1()"/>

<!-- グラフ更新ボタン -->

<script>

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