if(Time!==null){
  var Time = [];
  var Label = [];//グラフの中身
}



function addData() {//グラフに入力された情報をグラフ反映用に処理して追加する

    let label = document.getElementById('item_name');
    let Stime = document.getElementById('s_time');
    let Etime = document.getElementById('e_time');//StimeとEtimeはグラフ用に差を計算してから追加する

    let time = Etime - Stime;//時間の計算（もっといじる

    Time.push(time);
    Label.push(label);//配列に追加

    console.log(Time);
}

document.getElementById('btn').onclick = function(){
  if(Chart){
   myChart.destroy(); 
  }
  darwChart();
}

//ページが読み込まれたら円グラフ表示
function darwChart() {

  var context = document.getElementById("#sample_circle").getContext('2d')

    window.myChart = new Chart(context, {
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
