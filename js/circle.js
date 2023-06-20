//ここからsample2

var Time = [4, 15, 6, 3, 18, 19, 11, 9, 18, 7, 4, 8];//グラフの時刻
let Label = [];//項目名

//円グラフ表示
window.onload = function () {
    let context = document.querySelector("#sushi_circle").getContext('2d')
    new Chart(context, {
      type: 'doughnut',
      data: {
        labels: ['January','February','March','April','May','June','July','August','September','October','November','December'],
        datasets: [{
          data: Time
        }]
      },
      options: {
        responsive: false,
      }
    });
  }

//データ受け取り
function post_LabelAndTime(){
  Time.push(document.getElementById("input_time").value);
  Label.push(document.getElementById("input_label").value);
}


//ここからsample3
function drawChart(){
  var ctx = document.getElementById('canvas').getContext('2d');
  window.myChart = new Chart(ctx, {
    type: 'bar',
    data://ラベルと値
     {
        labels: Label[1],//ここにラベル
        datasets: [{
          Time:[1]
        }],
    },
    options:{
      legend:{
        display: false,
      }
    }
  });
}

var chartVal = []; // グラフデータ（描画するデータ）

function getRandom() {
  chartVal = []; // グラフデータを初期化
  var length = 12;
  for (i = 0; i < length; i++) {
    chartVal.push(Math.floor(Math.random() * 20));
  }
}


// ボタンをクリックしたら、グラフを再描画
document.getElementById('btn').onclick = function() {
  // すでにグラフ（インスタンス）が生成されている場合は、グラフを破棄する
  if (myChart) {
    myChart.destroy();
  }
  getRandom();
  // グラフデータに値を格納
  drawChart(); // グラフを再描画
}