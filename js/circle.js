//円グラフ表示
window.onload = function () {
    let context = document.querySelector("#sushi_circle").getContext('2d')
    new Chart(context, {
      type: 'doughnut',
      data: {
        labels: Label[0],
        datasets: [{
          data: Time[0]
        }]
      },
      options: {
        responsive: false,
      }
    });
  }

//データ受け取り
function post_LabelAndTime(){
  let Time = [];//グラフに反映する
  let Label = [];//

  Time.push(document.getElementById("input_time").value);
  Label.push(document.getElementById("input_label").value);
}