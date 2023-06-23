var chartVal = []; // グラフデータ（描画するデータ）
var Labels = [];//ここにデータベースから持ってくる

// グラフデータをランダムに生成（消す予定
function getRandom() {
    chartVal = []; // 配列を初期化
    var length = 3;
    for (i = 0; i < length; i++) {
      chartVal.push(Math.floor(Math.random() * 20));
    }
  }


//DBから持ってきたデータをグラフデータに入れる＆時間の処理
function getdata(){

  if (myChart) {
    chartVal = [];
    Labels = [];//グラフのデータを初期化
    myChart.destroy();//グラフがあったら消す
  }
    

    const sample1 = "2:00,4:40,#,#,23:00,23:15,23:37";//これをDBからとってきたのに変える
    const sample2 = "朝,昼,晩";//こｋもＤＢから

    const s1 = sample1.split(":");//時間から：を抜いて配列に
    const s2 = sample2.split(",");//項目から、を抜いて配列に(項目の処理終わり)
    let s3="";//時間から：を抜いた文字列
    
    for(let l = 0; l< s1.length; l++){
      s3 = s3.concat(s1[l]);//s3に；抜きの時間をいれる
    }

    const s4 = s3.split(",");//s3を配列に変更

    for(let i = 0; i < s1.length; i++){
       chartVal.push(s4[i]);
       Labels.push(s2[i]);
    }
}

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