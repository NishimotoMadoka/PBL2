var chartVal = []; // グラフデータ（描画するデータ）
var Labels = ['朝','昼','晩'];//ここにデータベースから持ってくる

// グラフデータをランダムに生成（消す予定
function getRandom() {
    chartVal = []; // 配列を初期化
    var length = 3;
    for (i = 0; i < length; i++) {
      chartVal.push(Math.floor(Math.random() * 20));
    }
  }

//DBから持ってきたデータをグラフデータに入れる
function getdata()

  // グラフ描画処理
  function drawChart() {
    var ctx = document.getElementById('canvas').getContext('2d');
    window.myChart = new Chart(ctx, { // インスタンスをグローバル変数で生成
      type: 'pie',
      data: { // ラベルとデータセット
        labels: Labels,
        datasets: [{
            data: chartVal, // グラフデータ
            backgroundColor: 'rgb(0, 134, 197, 0.7)', // 棒の塗りつぶし色
            borderColor: 'rgba(0, 134, 197, 1)', // 棒の枠線の色
            borderWidth: 1, // 枠線の太さ
        }],
      },
      options: {
        legend: {
          display: false, // 凡例を非表示
        }
      }
    });
  }