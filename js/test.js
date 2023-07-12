var chartVal = []; // グラフデータ（描画するデータ）
var Labels = [];//ここにデータベースから持ってくる
var st = [];
var en = [];
var ti = [];

// グラフデータをランダムに生成（消す予定
function getRandom() {
    chartVal = []; // 配列を初期化
    var length = 3;
    for (i = 0; i < length; i++) {
      chartVal.push(Math.floor(Math.random() * 20));
    }
  }


//DBから持ってきたデータをグラフデータに入れる＆時間の処理
function getdata(){

  if (myChart) {
    chartVal = [];
    Labels = [];//グラフのデータを初期化
    myChart.destroy();//グラフがあったら消す
  }
    

    //const sample1 = '2:00,4:40,#,#,11:00,13:15,20:37,23:00';//開始時間
    //const sample2 = '3:00,5:40,#,#,12:00,14:15,22:37,24:00';//終了時間
    //const sample3 = '1,2,3,4,5,6,7,8';//項目

    const t1 = sample1.split(",");
    const t2 = sample2.split(",");

    for(let i = 0; i < t1.length; i++){//#を前後の数字と置き換える
      if(t1[i]=="#"){
        t1[i] = t2[i-1];
      }

      if(t2[i]=="#"){
        t2[i] = t1[i+1];
      }
  }

    for(let i = 0; i < t1.length; i++){
      st.push(t1[i]);
      en.push(t2[i]);
   }
   
   for(let i = 0; i<st.length;i++){
    ti[i] = st[i]+'～'+en[i];
   }


    const s1 = sample1.split(":");//時間から：を抜いて配列に
    const s11 = sample2.split(":");//
    const s2 = sample3.split(",");//項目から、を抜いて配列に(項目の処理終わり)
    let s3='';//時間から：を抜いた文字列
    let s33='';
    
    for(let i = 0; i< s1.length; i++){
      s3 = s3.concat(s1[i]);//s3に；抜きの時間をいれる
      s33 = s33.concat(s11[i]);
    }

    const s4 = s3.split(",");//s3を配列に変更
    const s44 = s33.split(",");

   for(let i = 0; i < s4.length; i++){//#を前後の数字と置き換える
      if(s4[i]=="#"){
        s4[i] = s4[i-1];
        s4[i+1] = s4[i+2];
      }


      if(s44[i]=="#"){
        s44[i] = s44[i-1];
        s44[i+1] = s44[i+2];
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

   for(let i = 0; i < s2.length; i++){
    chartVal.push(s5[i]);
    Labels.push(s2[i]);
 }
 
  }
  
  
   

  // グラフ描画処理
  function drawChart() {
    var ctx = document.getElementById('canvas').getContext('2d');
    window.myChart = new Chart(ctx, { // インスタンスをグローバル変数で生成
      type: 'pie',
      data: { // ラベルとデータセット
        labels: Labels,
        labels:["睡眠","ごはん","運動","といれ","風呂","バスケ","野球","サッカー"],
        afterLabel:["aaaa","bbbbb","cccc","dddd","eeee","ffff","gggg","hhhh"],
        datasets: [{
            data: chartVal, // グラフデータ
            backgroundColor: ["rgb(255,99,132)","rgb(255,159,64)","rgb(240,240,240)","rgb(54,162,235)","rgb(235,222,127)","rgb(128,119,234)","rgb(217,11,100)","rgb(80,200,120)"], // 棒の塗りつぶし色
            borderColor: '#000', // 棒の枠線の色
            borderWidth: 1, // 枠線の太さ
        }],
      },
      options: {
        responsive: false,
        maintainAspectRatio: false,
        plugins: {
          outlabels: {
            text: ti,
            color: '#000',
            backgroundColor: null,
            lineWidth: 4,
            stretch: 20,
            font: {
              resizable: false,
              size: 20,
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
          display: true, // 凡例を非表示
        }
      }
    });
  }
