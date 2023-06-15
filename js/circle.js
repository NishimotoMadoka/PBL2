//円グラフ表示
window.onload = function () {
    let context = document.querySelector("#sushi_circle").getContext('2d')
    new Chart(context, {
      type: 'doughnut',
      data: {
        labels: ["サーモン", "ハマチ", "マグロ", "サバ", "エンガワ"],
        datasets: [{
          data: [60, 20, 15, 10, 5]
        }]
      },
      options: {
        responsive: false,
      }
    });
  }

function post_LabelAndTime(){
  let Time = [];//グラフに反映する
  let Label = [];//

  Time.push(document.getElementById("input_time").value);
  document.getElementById("outoput_test").innerHTML = Time;
}