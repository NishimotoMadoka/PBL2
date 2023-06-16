let Time = [];//グラフの時刻
let Label = [];//項目名

//円グラフ表示
window.onload = function () {
    let context = document.querySelector("#sushi_circle").getContext('2d')
    new Chart(context, {
      type: 'doughnut',
      data: {
        labels: Label,
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