// 初期のデータとラベルを設定します
let currentData = [1, 2, 3, 4, 5, 6, 3];//POSTで受け取る
var labels = ["朝", "トイレ", "昼", "おやつ", "遊び", "夜", "寝る"];//POSTで受け取る

var canvas = document.getElementById("myChart");
var updateButton = document.getElementById("updateButton");

var ctx = canvas.getContext('2d');
var myChart; // チャートオブジェクトをグローバルスコープで宣言

// 初期の円グラフを描画します
function createChart() {
    Chart = new myChart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: currentData,
                backgroundColor: ['red', 'blue', 'green', 'yellow', 'orange'],
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            legend: {
                display: false
            }
        }
    });


Chart.plugins.register({
    afterDraw: function(Chart) {
        var ctx = Chart.ctx;
        var width = Chart.width;
        var height = Chart.height;

        ctx.save();
        ctx.font = '16px Arial';
        ctx.fillStyle = 'black';
        ctx.textBaseline = 'middle';
        ctx.textAlign = 'center';

        var radius = Math.min(width, height) /1.8;
        var centerX = width / 2;
        var centerY = height / 2;

        for (var i = 0; i < 24; i++) {
            var angle = Math.PI * 2 / 24 * i - Math.PI / 2;
            var x = centerX + (radius - 20) * Math.cos(angle);
            var y = centerY + (radius - 20) * Math.sin(angle);

            var hour = i.toString().padStart(2, '0'); // 0埋めされた2桁の時刻表記

            ctx.fillText(hour, x, y);
        }

    // メモリを描画
    ctx.lineWidth = 2;
    ctx.strokeStyle = 'black';
    ctx.beginPath();
    for (var j = 0; j < 24; j++) {
      var angle = Math.PI * 2 / 24 * j - Math.PI / 2;
      var outerX = centerX + (radius - 30) * Math.cos(angle);
      var outerY = centerY + (radius - 30) * Math.sin(angle);
      var innerX = centerX + (radius - 50) * Math.cos(angle);
      var innerY = centerY + (radius - 50) * Math.sin(angle);

      ctx.moveTo(outerX, outerY);
      ctx.lineTo(innerX, innerY);
    }
    ctx.stroke();

    ctx.restore();
    },
});
}
createChart(); // 初期のチャートを作成

// 更新ボタンがクリックされたときの処理を追加します
updateButton.addEventListener("click", () => {
    // 新しいデータを生成します（ダミーデータを使用）
    const newData = generateRandomData();

    // チャートが存在するか確認してから更新します
    if (myChart) {
        myChart.data.datasets[0].data = newData;
        myChart.update();
    }
});

// ダミーデータの生成関数
function generateRandomData() {
    const newData = [];
    for (let i = 0; i < currentData.length; i++) {
        newData.push(Math.floor(Math.random() * 100)); // 0から100のランダムな数値を生成
    }
    return newData;
}

//ランダムに色を生成
function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}