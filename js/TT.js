var chartVal = []; // グラフデータ（描画するデータ）
var Labels = [];//ここにデータベースから持ってくる
var chartcolor = [];

const STime=[];
const ETime=[];
const LLabels=[];
const cchartcolor =[];



//ここから間を埋めたバージョン
function getdata2(){
  chartVal = [];
  Labels = [];//グラフのデータを初期化
  chartcolor = [];
  
  getColor();
  let i = 0;
  let i2 = 0;//i はfor文で使うよ
  const s1 = sample1.split(":");//時間から：を抜いて配列に
  const s11 = sample2.split(":");//
  const s2 = sample3.split(",");//項目から、を抜いて配列に(項目の処理終わり)
  let s3='';//時間から：を抜いた文字列
  let s33='';

  console.log(s3);
  console.log(s1);
  
  for(i = 0; i< s1.length; i++){
    s3 = s3.concat(s1[i]);//s3に；抜きの時間をいれる
    s33 = s33.concat(s11[i]);
    console.log(s3);
    console.log(s33);
  }

  const s4 = s3.split(",");//s3を配列に変更
  const s44 = s33.split(",");

  console.log(s4);
  console.log(s44);


 if(s4[0]!='0000'){
  ETime[0] = s4[0];
  STime[0] = '0000';
  LLabels[0] = '???';
  cchartcolor[0] = '#F0F0F0';

  for (i=1; i<s4.length; i++){
    STime[i] = s4[i-1];
    ETime[i] = s44[i-1];
    LLabels[i] = s2[i-1]; 
    cchartcolor[i] = chartcolor[i-1];
  }
 }else{
  for (i=0; i<s4.length; i++){
    STime[i] = s4[i];
    ETime[i] = s44[i];
    LLabels[i] = s2[i]; 
    cchartcolor[i] = chartcolor[i];
  }
 }

  
 
console.log(LLabels);



  for(i = 0; i < STime.length; i++){//#を前後の数字と置き換える 12/04改造するよ
    if(STime[i]=="#"){
      STime[i] = ETime[i-1];
      ETime[i] = '2359';
    }
    if(LLabels[i]=="#"){
      LLabels[i] = '???';
    }
    if(cchartcolor[i]=="#"){
      cchartcolor[i] = '#F0F0F0';
      break;
    }
   console.log(STime);
   console.log(ETime);
   console.log(LLabels);
}

let SC=0;
let EC=0;
let CC=0;

for(i = 0; i < STime.length; i++){//#消す
  if(STime[i]=="#"){
   SC++; 
  }
  if(LLabels[i]=="#"){
    EC++;
  }
  if(cchartcolor[i]=="#"){
    CC++;
  }

}
for(i=SC; i>0; i--){
  STime.pop();
  ETime.pop();
  LLabels.pop();
  cchartcolor.pop();
}


//分単位変換
for( i = 0; i<LLabels.length; i++){
  let count =0;
  let S = 0;
    while(ETime[i]>=100){
      
      ETime[i]-=100;
      count = count+100;
    }
    S = ETime[i]+count;

    
   ETime[i] += count*0.6;
    
 }

 for( i = 0; i<LLabels.length; i++){
  let count =0;
  let S = 0;
    while(STime[i]>=100){
      
      STime[i]-=100;
      count = count+100;
    }
    S = STime[i]+count;

    
   STime[i] += count*0.6;
    
 }
//ここまで分単位変換

var s5 =[];//最終的にcharvalに入れるデータ

 for(let i = 0; i<LLabels.length; i++){
  s5[i] = ETime[i] -STime[i];
 }

 
 for(let i = 0; i < LLabels.length; i++){

 
    chartVal.push(s5[i]);
    Labels.push(LLabels[i]);
    
}

//chartcolor = A;

//console.log(c1);
console.log(chartVal);
console.log(LLabels);
console.log(cchartcolor);
}
//ここまで

 function getColor(){
  let a=color;
  let A = a.split(',');
  
  for(let count=0;count<=10;++count){


    
    
      chartcolor.push(A[count]);
    
  }
}
  
 



//DBから持ってきたデータをグラフデータに入れる＆時間の処理
function getdata(){
  
    chartVal = [];
    Labels = [];//グラフのデータを初期化
    chartcolor = [];
    
    getColor();

    const s1 = sample1.split(":");//時間から：を抜いて配列に
    const s11 = sample2.split(":");//
    const s2 = sample3.split(",");//項目から、を抜いて配列に(項目の処理終わり)
    let s3='';//時間から：を抜いた文字列
    let s33='';

    console.log(s3);
    console.log(s1);
    
    for(let i = 0; i< s1.length; i++){
      s3 = s3.concat(s1[i]);//s3に；抜きの時間をいれる
      s33 = s33.concat(s11[i]);
    }

    const s4 = s3.split(",");//s3を配列に変更
    const s44 = s33.split(",");

    console.log(s4);
    console.log(s44);

   for(let i = 0; i < s4.length; i++){//#を前後の数字と置き換える
      if(s4[i]=="#"){
        s4[i] = s4[i-1];
      }


      if(s44[i]=="#"){
        s44[i] = s44[i-1];
      }
     
  }

  for(let i = 0; i<s44.length; i++){
    let count =0;
    let S = 0;
      while(s44[i]>=100){
        
        s44[i]-=100;
        count = count+100;
      }
      S = s44[i]+count;

      
     s44[i] += count*0.6;
      
   }

   for(let i = 0; i<s4.length; i++){
    let count =0;
    let S = 0;
      while(s4[i]>=100){
        
        s4[i]-=100;
        count = count+100;
      }
      S = s4[i]+count;

      
     s4[i] += count*0.6;
      
   }

 var s5 =[];//最終的にcharvalに入れるデータ

   for(let i = 0; i<s2.length; i++){
    s5[i] = s44[i] -s4[i];
   }

   var c1 =0;
   var c2 =0;
   for(let i = 0; i < s2.length; i++){

    if(s2[i]==='#'){
     c1 ++;
    }else{
      chartVal.push(s5[i]);
      Labels.push(s2[i]);
      //chartcolor.push(getColor());
    }
    //chartVal.push(s5[i]);
    //Labels.push(s2[i]);
 }
 
  //chartcolor = A;

//console.log(c1);
 console.log(chartVal);
 console.log(Labels);
 console.log(chartcolor);
  }
  
  function convertToTime(minutes){
    var hours=Math.floor(minutes/60);
    var remainingMinute=minutes%60;
    return hours+"時間"+remainingMinute+"分";
  }
   
  
  // グラフ描画処理
  function drawChart() {
    var ctx = document.getElementById('canvas').getContext('2d');
    window.myChart = new Chart(ctx, { // インスタンスをグローバル変数で生成
      type: 'doughnut',
      data: { // ラベルとデータセット
        labels: Labels,
        
        afterLabel:["aaaa","bbbbb","cccc","dddd","eeee","ffff","gggg","hhhh"],
        datasets: [{
            data: chartVal, // グラフデータ
            backgroundColor: cchartcolor, // 棒の塗りつぶし色
            borderColor: '#000', // 棒の枠線の色
            borderWidth: 1, // 枠線の太さ
            // hoverBackgroundColor: chartcolor,
        }],
      },
      options: {
        title: {
          display: true,
          text: postdate,
          fontSize: 30,
        },
        tooltips: {
          callbacks: {
            label: function(tooltipItem, data) {
              var dataset = data.datasets[tooltipItem.datasetIndex];
              var currentValue = dataset.data[tooltipItem.index];
              var timeValue = convertToTime(currentValue);
              return "時間："+timeValue;
            }
          }
        },
        responsive: false,
        maintainAspectRatio: false,
        plugins: {
          outlabels: {
            text: '%l\n%p',
            color: '#000',
            backgroundColor: null,
            lineWidth: 4,
            stretch: 50,
            font: {
              resizable: false,
              size: 30,
            }
          }
        },
        layout: {
          padding: {
            left: 150,
            right: 150,
          }
        },
        legend: {
          display: false, // 凡例を非表示
        },
        hover: {
          mode: null,
        }
      }
    });

    Chart.plugins.register({
      beforeDraw: function(chart) {
        var ctx = chart.ctx;
        var width = chart.width;
        var height = chart.height;

        var centerX = width / 2;
        var centerY = height / 1.9;
        var img = new Image();
        img.src = '../img/ushi.png';
        img.id = 'ushiImage';
        img.style.position = 'absolute';

        img.onload = function(){
          var imgWidth = 200;
          var imgHeight = 200;
          ctx.drawImage(img, centerX - imgWidth / 2, centerY - imgHeight / 2, imgWidth, imgHeight);
        }
      },

      afterDraw: function(chart) {
          var ctx = chart.ctx;
          var width = chart.width;
          var height = chart.height;
  
          ctx.save();
          ctx.font = '25px Times';
          ctx.fillStyle = 'black';
          ctx.textBaseline = 'middle';
          ctx.textAlign = 'center';
  
          var radius = Math.min(width, height) /3.05;
          var centerX = width / 2;
          var centerY = height / 1.84;
  
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

