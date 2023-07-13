var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['A', 'B', 'C', 'D', 'E'],
        datasets: [{
            data: [10, 20, 30, 15, 25],
            backgroundColor: ['red', 'blue', 'green', 'yellow', 'orange']
        }]
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

        var radius = Math.min(width, height) /1.9;
        var centerX = width / 2;
        var centerY = height / 1.8;

        for (var i = 0; i < 24; i++) {
            var angle = Math.PI * 2 / 24 * i - Math.PI / 2;
            var x = centerX + (radius - 20) * Math.cos(angle);
            var y = centerY + (radius - 20) * Math.sin(angle);

            var hour = i.toString().padStart(2, '0'); // 0埋めされた2桁の時刻表記

            ctx.fillText(hour, x, y);
        }

        // 円グラフのセクターを描画
        // for (var j = 0; j < chart.data.datasets[0].data.length; j++) {
        //     var data = chart.data.datasets[0].data;
        //     var total = data.reduce((acc, val) => acc + val, 0);
        //     var angle = Math.PI * 2 / total * data[j] - Math.PI / 2;

        //     ctx.beginPath();
        //     ctx.moveTo(centerX, centerY);
        //     ctx.arc(centerX, centerY, radius, angle, angle + Math.PI * 2 / total, false);
        //     ctx.closePath();
        //     ctx.fillStyle = chart.data.datasets[0].backgroundColor[j];
        //     ctx.fill();
        // }

        ctx.save();
    }
});
