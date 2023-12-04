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

<link rel="stylesheet" href="<?= $post_css ?>">
<form  method="post" action="./post_db.php"  enctype="multipart/form-data">
  <?php for ($i = 0; $i < $formCount; $i++) { ?>
    <div>日付</div> 
    <input type="date" name="date" placeholder="日付" required><br>
    </div>
    <div">
      <input type="text" name="items[]" placeholder="項目" required>
    </div>
    <div>開始時間</div>
      <input type="time" name="start_times[]" required>
      <div>終了時間</div> 
      <input type="time" name="end_times[]" required>
    </div>

    <div>色</div>
    
    
    <input type="checkbox" name="color[]" id="radio" value="#000000" require>
    <input type="color"  id="color" list="colors" onchange="radioColor()">
    
    <!-- 色変更ラジオボタン -->
    <input type="checkbox" name="color[]" value="#FF0000" require>赤
    <input type="checkbox" name="color[]" value="#0000FF" require>青
    <input type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input type="checkbox" name="color[]" value="#008000" require>緑
    <input type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input type="checkbox" name="color[]" value="#000000" require>黒
    <!-- ここまで -->
  <?php } ?>

    <div id ="kbkb">
        今日の画像：<input type="file" name="up_image" accept="image/*">
    </div>
    <input type="hidden" name="form_count" value="<?php echo $formCount; ?>">
  <input type="submit" name="add_form" value="+　項目を追加" id="delete" onclick="addform()">
        <input type="submit" value="送信">
        <input type="reset" value="リセット">
    </div>
</form>

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
    <div class="form-item">
    <div class="item">
      <input type="text" name="items[]" placeholder="項目" required>
    </div>
    <div class="title">開始時間</div>
      <input type="time" name="start_times[]" required>
      <div class="title">終了時間</div>
      <input type="time" name="end_times[]" required>
    </div>
    <div class="title">色</div>
    <input type="checkbox" name="color[]" id="radio1"  value="#" require>
    <input type="color" id="color1" list="colors" onchange="radioColor1()">

    <input type="checkbox" name="color[]" value="#FF0000" require>赤
    <input type="checkbox" name="color[]" value="#0000FF" require>青
    <input type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input type="checkbox" name="color[]" value="#008000" require>緑
    <input type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input type="checkbox" name="color[]" value="#000000" require>黒
    `);
    console.log(count);
        break;
      
      case 2:
        clickBtn.insertAdjacentHTML('beforebegin',`
    <div class="form-item">
    <div class="item">
      <input type="text" name="items[]" placeholder="項目" required>
    </div>
    <div class="title">開始時間</div>
      <input type="time" name="start_times[]" required>
      <div class="title">終了時間</div>
      <input type="time" name="end_times[]" required>
    </div>
    <div class="title">色</div>
    <input type="checkbox" name="color[]" id="radio2"  value="#" require>
    <input type="color" id="color2" list="colors" onchange="radioColor2()">

    <input type="checkbox" name="color[]" value="#FF0000" require>赤
    <input type="checkbox" name="color[]" value="#0000FF" require>青
    <input type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input type="checkbox" name="color[]" value="#008000" require>緑
    <input type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input type="checkbox" name="color[]" value="#000000" require>黒
    `);
    console.log(count);
        break;
      
      case 3:
        clickBtn.insertAdjacentHTML('beforebegin',`
    <div class="form-item">
    <div class="item">
      <input type="text" name="items[]" placeholder="項目" required>
    </div>
    <div class="title">開始時間</div>
      <input type="time" name="start_times[]" required>
      <div class="title">終了時間</div>
      <input type="time" name="end_times[]" required>
    </div>
    <div class="title">色</div>
    <input type="checkbox" name="color[]" id="radio3"  value="#" require>
    <input type="color" id="color3" list="colors" onchange="radioColor3()">

    <input type="checkbox" name="color[]" value="#FF0000" require>赤
    <input type="checkbox" name="color[]" value="#0000FF" require>青
    <input type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input type="checkbox" name="color[]" value="#008000" require>緑
    <input type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input type="checkbox" name="color[]" value="#000000" require>黒
    `);
    console.log(count);
        break;
      
      case 4:
        clickBtn.insertAdjacentHTML('beforebegin',`
    <div class="form-item">
    <div class="item">
      <input type="text" name="items[]" placeholder="項目" required>
    </div>
    <div class="title">開始時間</div>
      <input type="time" name="start_times[]" required>
      <div class="title">終了時間</div>
      <input type="time" name="end_times[]" required>
    </div>
    <div class="title">色</div>
    <input type="checkbox" name="color[]" id="radio4"  value="#" require>
    <input type="color" id="color4" list="colors" onchange="radioColor4()">

    <input type="checkbox" name="color[]" value="#FF0000" require>赤
    <input type="checkbox" name="color[]" value="#0000FF" require>青
    <input type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input type="checkbox" name="color[]" value="#008000" require>緑
    <input type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input type="checkbox" name="color[]" value="#000000" require>黒
    `);
    console.log(count);
        break;
      
      case 5:
        clickBtn.insertAdjacentHTML('beforebegin',`
    <div class="form-item">
    <div class="item">
      <input type="text" name="items[]" placeholder="項目" required>
    </div>
    <div class="title">開始時間</div>
      <input type="time" name="start_times[]" required>
      <div class="title">終了時間</div>
      <input type="time" name="end_times[]" required>
    </div>
    <div class="title">色</div>
    <input type="checkbox" name="color[]" id="radio5"  value="#" require>
    <input type="color" id="color5" list="colors" onchange="radioColor5()">

    <input type="checkbox" name="color[]" value="#FF0000" require>赤
    <input type="checkbox" name="color[]" value="#0000FF" require>青
    <input type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input type="checkbox" name="color[]" value="#008000" require>緑
    <input type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input type="checkbox" name="color[]" value="#000000" require>黒
    `);
    console.log(count);
        break;
      
      case 6:
        clickBtn.insertAdjacentHTML('beforebegin',`
    <div class="form-item">
    <div class="item">
      <input type="text" name="items[]" placeholder="項目" required>
    </div>
    <div class="title">開始時間</div>
      <input type="time" name="start_times[]" required>
      <div class="title">終了時間</div>
      <input type="time" name="end_times[]" required>
    </div>
    <div class="title">色</div>
    <input type="checkbox" name="color[]" id="radio6"  value="#" require>
    <input type="color" id="color6" list="colors" onchange="radioColor6()">

    <input type="checkbox" name="color[]" value="#FF0000" require>赤
    <input type="checkbox" name="color[]" value="#0000FF" require>青
    <input type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input type="checkbox" name="color[]" value="#008000" require>緑
    <input type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input type="checkbox" name="color[]" value="#000000" require>黒
    `);
    console.log(count);
        break;
      
      case 7:
        clickBtn.insertAdjacentHTML('beforebegin',`
    <div class="form-item">
    <div class="item">
      <input type="text" name="items[]" placeholder="項目" required>
    </div>
    <div class="title">開始時間</div>
      <input type="time" name="start_times[]" required>
      <div class="title">終了時間</div>
      <input type="time" name="end_times[]" required>
    </div>
    <div class="title">色</div>
    <input type="checkbox" name="color[]" id="radio7"  value="#" require>
    <input type="color" id="color7" list="colors" onchange="radioColor7()">

    <input type="checkbox" name="color[]" value="#FF0000" require>赤
    <input type="checkbox" name="color[]" value="#0000FF" require>青
    <input type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input type="checkbox" name="color[]" value="#008000" require>緑
    <input type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input type="checkbox" name="color[]" value="#000000" require>黒
    `);
    console.log(count);
        break;
      
      case 8:
        clickBtn.insertAdjacentHTML('beforebegin',`
    <div class="form-item">
    <div class="item">
      <input type="text" name="items[]" placeholder="項目" required>
    </div>
    <div class="title">開始時間</div>
      <input type="time" name="start_times[]" required>
      <div class="title">終了時間</div>
      <input type="time" name="end_times[]" required>
    </div>
    <div class="title">色</div>
    <input type="checkbox" name="color[]" id="radio8"  value="#" require>
    <input type="color" id="color8" list="colors" onchange="radioColor8()">

    <input type="checkbox" name="color[]" value="#FF0000" require>赤
    <input type="checkbox" name="color[]" value="#0000FF" require>青
    <input type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input type="checkbox" name="color[]" value="#008000" require>緑
    <input type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input type="checkbox" name="color[]" value="#000000" require>黒
    `);
    console.log(count);
        break;

      case 9:
        clickBtn.insertAdjacentHTML('beforebegin',`
    <div class="form-item">
    <div class="item">
      <input type="text" name="items[]" placeholder="項目" required>
    </div>
    <div class="title">開始時間</div>
      <input type="time" name="start_times[]" required>
      <div class="title">終了時間</div>
      <input type="time" name="end_times[]" required>
    </div>
    <div class="title">色</div>
    <input type="checkbox" name="color[]" id="radio9"  value="#" require>
    <input type="color" id="color9" list="colors" onchange="radioColor9()">

    <input type="checkbox" name="color[]" value="#FF0000" require>赤
    <input type="checkbox" name="color[]" value="#0000FF" require>青
    <input type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input type="checkbox" name="color[]" value="#008000" require>緑
    <input type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input type="checkbox" name="color[]" value="#000000" require>黒
    `);
    console.log(count);
        break;

      
      
      default:
        clickBtn.insertAdjacentHTML('beforebegin',`
    <div class="form-item">
    <div class="item">
      <input type="text" name="items[]" placeholder="項目" required>
    </div>
    <div class="title">開始時間</div>
      <input type="time" name="start_times[]" required>
      <div class="title">終了時間</div>
      <input type="time" name="end_times[]" required>
    </div>
    <div class="title">色</div>
    <input type="checkbox" name="color[]" id="radio"  value="#" require>
    <input type="color" id="color" list="colors" onchange="radioColor()">

    <input type="checkbox" name="color[]" value="#FF0000" require>赤
    <input type="checkbox" name="color[]" value="#0000FF" require>青
    <input type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input type="checkbox" name="color[]" value="#008000" require>緑
    <input type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input type="checkbox" name="color[]" value="#000000" require>黒
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