var Time = [];//グラフの時刻
let Label = [];//項目名

//円グラフ表示
window.onload = function () {
    let context = document.querySelector("#sample_circle").getContext('2d')
    new Chart(context, {
      type: 'pie',
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

function addData() {//グラフに入力された情報をグラフ反映用に処理して追加する
    let label = document.getElementById('item_name');
    let Stime = document.getElementById('s_time');
    let Etime = document.getElementById('e_time');//StimeとEtimeはグラフ用に差を計算してから追加する

    
    console.log(label);
    console.log(Stime);
    console.log(Etime);
}
