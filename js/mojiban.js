var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        // labels: ['A', 'B', 'C', 'D', 'E'],
        datasets: [{
            data: [10, 20, 30, 15, 25],
            backgroundColor: ['red', 'blue', 'green', 'yellow', 'orange']
        }]
    },
option: {
    responsive: true,
    maintainAspectRation: false
}
});

Chart.plugins.register({
    afterDraw: function(chart) {
        var ctx = chart.ctx;
        var width = chart.width;
        var height = chart.height;

        ctx.save();
        ctx.font = '16px Arial';
        ctx.fillStyle = 'black';
        ctx.textBaseline = 'middle';
        ctx.textAlign = 'center';

        var radius = Math.min(width, height) /2;
        var centerX = width / 2;
        var centerY = height / 1.98;

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
    }
});
