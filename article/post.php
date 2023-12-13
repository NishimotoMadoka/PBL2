<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
?>
<main>
<?php
if (isset($_SESSION['post_error'])) {
    $post_error="<script type='text/javascript'>alert('". $_SESSION['post_error'] ."');</script>";
    echo $post_error;
    // echo '<p class="error_class">' . $_SESSION['post_error'] . '</p>';
    unset($_SESSION['post_error']);
}
?>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $formCount = isset($_POST['form_count']) ? $_POST['form_count'] : 1;
} else {
  $formCount = 1;
}
?>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
</head>

<link rel="stylesheet" href="<?= $post_css ?>">
<form  method="post" action="./post_db.php"  enctype="multipart/form-data">
  <?php for ($i = 0; $i < $formCount; $i++) { ?>

    <div class="box">
      日付　　　<input type="date" name="date" placeholder="日付" required><br>
      項目　　　<input type="text" name="items[]" placeholder="例:バイト" required><br>
      開始時間　</td><td><input type="time" name="start_times[]" required> ～ 終了時間　<input type="time" name="end_times[]" required><br>
      
      <div class="color">
        色　
        <input class="c0" type="checkbox" name="color[]" id="radio" value="#000000" require>
        <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
        <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
        <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
        <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
        <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
        <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
        <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
      </div>
      <?php } ?>

      <hr class="line">

        <div id ="kbkb">
          今日の画像：<input type="file" name="up_image" accept="image/*">
        </div>

        <input type="hidden" name="form_count" value="<?php echo $formCount; ?>">
        <table>
          <tr><td><input type="submit" class="btn-p" name="add_form" value="＋　項目を追加" id="delete" onclick="addform()"></td><td><input class="btn-r" type="reset" value="リセット"></td></tr>
          <td colspan="2" class="tablesbm"><input class="btn" type="submit" value="送信　→"></td>
      </table>
      </div>
   </div>
</form>
  </div>
</main>
<script>

  //色を変更のradioとcolorを連動させる部分

  function radioColor(){
    var Color = document.getElementById("color");
    var radio = document.getElementById("radio");

    radio.value=Color.value;
    console.log(count);
    console.log(radio.value);
  }

  function radioColor1(){
    var Color = document.getElementById("color1");
    var radio = document.getElementById("radio1");

    radio.value=Color.value;
    console.log(count);
    console.log(radio.value);
  }

  function radioColor2(){
    var Color = document.getElementById("color2");
    var radio = document.getElementById("radio2");

    radio.value=Color.value;
    console.log(count);
    console.log(radio.value);
  }

  function radioColor3(){
    var Color = document.getElementById("color3");
    var radio = document.getElementById("radio3");

    radio.value=Color.value;
    console.log(count);
    console.log(radio.value);
  }

  function radioColor4(){
    var Color = document.getElementById("color4");
    var radio = document.getElementById("radio4");

    radio.value=Color.value;
    console.log(count);
    console.log(radio.value);
  }

  function radioColor5(){
    var Color = document.getElementById("color5");
    var radio = document.getElementById("radio5");

    radio.value=Color.value;
    console.log(count);
    console.log(radio.value);
  }

  function radioColor6(){
    var Color = document.getElementById("color6");
    var radio = document.getElementById("radio6");

    radio.value=Color.value;
    console.log(count);
    console.log(radio.value);
  }

  function radioColor7(){
    var Color = document.getElementById("color7");
    var radio = document.getElementById("radio7");

    radio.value=Color.value;
    console.log(count);
    console.log(radio.value);
  }

  function radioColor8(){
    var Color = document.getElementById("color8");
    var radio = document.getElementById("radio8");

    radio.value=Color.value;
    console.log(count);
    console.log(radio.value);
  }

  function radioColor9(){
    var Color = document.getElementById("colo9r");
    var radio = document.getElementById("radio9");

    radio.value=Color.value;
    console.log(count);
    console.log(radio.value);
  }
  //ここまで

//kbkbが書いたフォーム追加するやつ




let count=1;//formの数を数える
function addform(){//form追加関数

  let clickBtn = document.getElementById('kbkb');

  if(count<10){
    
    var formCountInput = document.querySelector('input[name="form_count"]');
    var formCount = parseInt(formCountInput.value);
    formCount++;
    formCountInput.value = formCount;

    var container = document.querySelector('form');
    var div = document.createElement('div');

    //もともとあった場所

    switch(count){
      case 1:
          clickBtn.insertAdjacentHTML('beforebegin',`
      項目　　　<input type="text" name="items[]" placeholder="例:バイト" required><br>
      開始時間　</td><td><input type="time" name="start_times[]" required> ～ 終了時間　<input type="time" name="end_times[]" required><br>
      <div class="color">色　
      <input class="c0" type="checkbox" name="color[]" id="radio" value="#000000" require>
      <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
      <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
      <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
      <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
      <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
      <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
      <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
      <hr class="line">
    `);
    console.log(count);
        break;
      
      case 2:
        clickBtn.insertAdjacentHTML('beforebegin',`
        
      項目　　　<input type="text" name="items[]" placeholder="例:バイト" required><br>
      開始時間　</td><td><input type="time" name="start_times[]" required> ～ 終了時間　<input type="time" name="end_times[]" required><br>
      <div class="color">色　
      <input class="c0" type="checkbox" name="color[]" id="radio" value="#000000" require>
      <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
      <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
      <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
      <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
      <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
      <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
      <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
      <hr class="line">
    `);
    console.log(count);
        break;
      
      case 3:
        clickBtn.insertAdjacentHTML('beforebegin',`
      項目　　　<input type="text" name="items[]" placeholder="例:バイト" required><br>
      開始時間　</td><td><input type="time" name="start_times[]" required> ～ 終了時間　<input type="time" name="end_times[]" required><br>
      <div class="color">色　
      <input class="c0" type="checkbox" name="color[]" id="radio" value="#000000" require>
      <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
      <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
      <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
      <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
      <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
      <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
      <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
      <hr class="line">
     `);
    console.log(count);
        break;
      
      case 4:
        clickBtn.insertAdjacentHTML('beforebegin',`
      項目　　　<input type="text" name="items[]" placeholder="例:バイト" required><br>
      開始時間　</td><td><input type="time" name="start_times[]" required> ～ 終了時間　<input type="time" name="end_times[]" required><br>
      <div class="color">色　
      <input class="c0" type="checkbox" name="color[]" id="radio" value="#000000" require>
      <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
      <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
      <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
      <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
      <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
      <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
      <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
      <hr class="line">
      `);
    console.log(count);
        break;
      
      case 5:
        clickBtn.insertAdjacentHTML('beforebegin',`
      項目　　　<input type="text" name="items[]" placeholder="例:バイト" required><br>
      開始時間　</td><td><input type="time" name="start_times[]" required> ～ 終了時間　<input type="time" name="end_times[]" required><br>
      <div class="color">色　
      <input class="c0" type="checkbox" name="color[]" id="radio" value="#000000" require>
      <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
      <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
      <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
      <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
      <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
      <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
      <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
      <hr class="line">
      `);
    console.log(count);
        break;
      
      case 6:
        clickBtn.insertAdjacentHTML('beforebegin',`
      項目　　　<input type="text" name="items[]" placeholder="例:バイト" required><br>
      開始時間　</td><td><input type="time" name="start_times[]" required> ～ 終了時間　<input type="time" name="end_times[]" required><br>
      色<br>
      <<hr class="line">
      項目　　　<input type="text" name="items[]" placeholder="例:バイト" required><br>
      開始時間　</td><td><input type="time" name="start_times[]" required> ～ 終了時間　<input type="time" name="end_times[]" required><br>
      <div class="color">色　
      <input class="c0" type="checkbox" name="color[]" id="radio" value="#000000" require>
      <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
      <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
      <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
      <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
      <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
      <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
      <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
      <hr class="line">
      `);
    console.log(count);
        break;
      
      case 7:
        clickBtn.insertAdjacentHTML('beforebegin',`
      項目　　　<input type="text" name="items[]" placeholder="例:バイト" required><br>
      開始時間　</td><td><input type="time" name="start_times[]" required> ～ 終了時間　<input type="time" name="end_times[]" required><br>
      <div class="color">色　
      <input class="c0" type="checkbox" name="color[]" id="radio" value="#000000" require>
      <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
      <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
      <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
      <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
      <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
      <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
      <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
      <hr class="line">
      `);
    console.log(count);
        break;
      
      case 8:
        clickBtn.insertAdjacentHTML('beforebegin',`
      項目　　　<input type="text" name="items[]" placeholder="例:バイト" required><br>
      開始時間　</td><td><input type="time" name="start_times[]" required> ～ 終了時間　<input type="time" name="end_times[]" required><br>
      <div class="color">色　
      <input class="c0" type="checkbox" name="color[]" id="radio" value="#000000" require>
      <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
      <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
      <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
      <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
      <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
      <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
      <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
      <hr class="line">
      `);
    console.log(count);
        break;

      case 9:
        clickBtn.insertAdjacentHTML('beforebegin',`
      項目　　　<input type="text" name="items[]" placeholder="例:バイト" required><br>
      開始時間　</td><td><input type="time" name="start_times[]" required> ～ 終了時間　<input type="time" name="end_times[]" required><br>
      <div class="color">色　
      <input class="c0" type="checkbox" name="color[]" id="radio" value="#000000" require>
      <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
      <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
      <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
      <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
      <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
      <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
      <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
      <hr class="line">
      `);
    console.log(count);
        break;

      
      
      default:
        clickBtn.insertAdjacentHTML('beforebegin',`
      項目　　　<input type="text" name="items[]" placeholder="例:バイト" required><br>
      開始時間　</td><td><input type="time" name="start_times[]" required> ～ 終了時間　<input type="time" name="end_times[]" required><br>
      <div class="color">色　
      <input class="c0" type="checkbox" name="color[]" id="radio" value="#000000" require>
      <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
      <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
      <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
      <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
      <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
      <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
      <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
      <hr class="line">
     `);
    
    console.log('default');
    console.log(count);
    }
    
  }else{
    //>10のときボタン削除
    const element = document.getElementById('delete'); 
    element.remove(radio.value);

  }

 count++;
}




//ここまでkbkbが書きました。

  // プラスボタンが押されたらフォームを追加
  // document.querySelector('input[name="add_form"]').addEventListener('click', function (e) {
  //   e.preventDefault();
  //   var formCountInput = document.querySelector('input[name="form_count"]');
  //   var formCount = parseInt(formCountInput.value);
  //   formCount++;
  //   formCountInput.value = formCount;

  //   var container = document.querySelector('form');
  //   var div = document.createElement('div');


  //   div.innerHTML = `
  //   <div class="form-item">
  //   <div class="item">
  //     <input type="text" name="items[]" placeholder="項目" required>
  //   </div>
  //   <div class="title">開始時間</div>
  //     <input type="time" name="start_times[]" required>
  //     <div class="title">終了時間</div>
  //     <input type="time" name="end_times[]" required>
  //   </div>
  //   `;
  //   container.insertBefore(div, document.querySelector('.button-panel'));
  // });
</script>
<?php
require_once __DIR__ . '/../footer.php';
?>