<!DOCTYPE HTML>
<html lang="ja">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.0/dist/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0"></script>  
    <script src="https://unpkg.com/chart.js-plugin-labels-dv@3.0.5/dist/chartjs-plugin-labels.min.js"></script>
    <canvas id="my-chart"></canvas>
    <script>
        function drawChart(){
            var data = {
                labels: ["6:00 AM", "6:15 AM", "6:20 AM"],

                datasets: [
                    {
                        labels: ["wake up", "have breakfast", "bursh teeth"],
                        backgroundColor: ["#FA8072","#FFFF66","#FFC0CB"],
                        data: [40, 60, 90],
                        borderWidth: 1,
                    }
                ]
            };
        }
    </script>
</html>