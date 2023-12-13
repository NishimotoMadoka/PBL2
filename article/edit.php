<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../classes/article_list.php';

$article_id=$_POST['article_id'];


$article=new Article();
$article_deteils=$article->getArticle($user_id,$article_id);

?>

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
</head>

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


<link rel="stylesheet" href="<?= $edit_css ?>">
<form  method="post" action="./edit_db.php"  enctype="multipart/form-data">
  <?php

  $title=$article_deteils['title'];
  $diary=$article_deteils['diary'];
  $article_image=$article_deteils['article_image'];
  $item_name_data = $article_deteils['item_name'];
  $start_time_data = $article_deteils['start_time'];
  $end_time_data = $article_deteils['end_time'];
  $color_data = $article_deteils['color'];
  $article_image = $article_deteils['article_image'];

  $item_name_array = explode(',', $item_name_data);
  $start_time_array = explode(',', $start_time_data);
  $end_time_array = explode(',', $end_time_data);
  $color_array = explode(',', $color_data);

  $item_formCount = count($item_name_array);
  $start_formCount = count($start_time_array);
  $end_formCount = count($end_time_array);
  $color_formCount = count($color_array);

  ?>

<div class="box">
  日付　　　 <input type="date" name="date" placeholder="日付" value="<?php echo $article_deteils['post_date'];?>" required><br>

  <?php

  for($i=0;$i<$item_formCount;$i++){
    if($item_name_array[$i]=="#"){
      break;
    }else{
      $item_name[$i]=$item_name_array[$i];
    }
  }
  for($i=0;$i<$start_formCount;$i++){
    if($start_time_array[$i]=="#"){
      break;
    }else{
      $start_time[$i]=$start_time_array[$i];
    }
  }
  for($i=0;$i<$end_formCount;$i++){
    if($end_time_array[$i]=="#"){
      break;
    }else{
      $end_time[$i]=$end_time_array[$i];
    }
  }
  for($i=0;$i<$color_formCount;$i++){
    if($color_array[$i]=="#"){
      break;
    }else{
      $color[$i]=$color_array[$i];
    }
  }

  $formCount=count($item_name);
  
  
  for ($i = 0; $i < $formCount; $i++) { 
  //   $item_name = isset($item_name_array[$i]) ? $item_name_array[$i] : '';
  //   $start_time = isset($start_time_array[$i]) ? $start_time_array[$i] : '';
  //   $end_time = isset($end_time_array[$i]) ? $end_time_array[$i] : '';

  //   if ($item_name !=='#'&& $start_time !=='#' && $end_time !=='#') {
  //   ?>
    <!-- <div class="form-item">
    <div class="title">日付</div> 
    <input type="date" name="date" placeholder="日付" value="<?php echo $article_deteils['post_date'];?>" required><br>
    </div> -->
      <input type="hidden" name="article_id" value="<?=$article_id?>">
      <input type="hidden" name="article_image" value="<?=$article_image?>">
      項目　　　 <input type="text" name="items[]" placeholder="項目" value="<?php echo $item_name[$i];?>"><br>
      開始時間　
      <input type="time" name="start_times[]" value="<?php echo $start_time[$i];?>" required> ～ 
      終了時間　
      <input type="time" name="end_times[]" value="<?php echo $end_time[$i];?>" required>
  
    <?php
    if($color[$i]=="#FF0000"){
    ?>

    <div class="color">色　
    <input class="c0" type="checkbox" class="colorclass" name="color[]" id="radio" value="#000000" require>
    <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
    <input class="c1" type="checkbox" class="colorclass" name="color[]" id="red" value="#FF0000" checked require>赤
    <input class="c2" type="checkbox" class="colorclass" name="color[]" id="bulue" value="#0000FF" require>青
    <input class="c3" type="checkbox" class="colorclass" name="color[]" id="yellow" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" class="colorclass" name="color[]" id="green" value="#008000" require>緑
    <input class="c5" type="checkbox" class="colorclass" name="color[]" id="white" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" class="colorclass" name="color[]" id="black" value="#000000" require>黒
    </div>
    <?php
    }else if($color[$i]=="#0000FF"){
    ?>
    <div class="color">色　
    <input class="c0" type="checkbox" class="colorclass" name="color[]" id="radio" value="#000000" require>
    <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
    <input class="c1" type="checkbox" class="colorclass" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" class="colorclass" name="color[]" value="#0000FF" checked require>青
    <input class="c3" type="checkbox" class="colorclass" name="color[]" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" class="colorclass" name="color[]" value="#008000" require>緑
    <input class="c5" type="checkbox" class="colorclass" name="color[]" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" class="colorclass" name="color[]" value="#000000" require>黒
    </div>
    <?php
    }else if($color[$i]=="#FFFF00"){
    ?>
    <div class="color">色　
    <input class="c0" type="checkbox" class="colorclass" name="color[]" id="radio" value="#000000" require>
    <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
    <input class="c1" type="checkbox" class="colorclass" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" class="colorclass" name="color[]" value="#0000FF" require>青
    <input class="c3" type="checkbox" class="colorclass" name="color[]" value="#FFFF00" checked require>黄
    <input class="c4" type="checkbox" class="colorclass" name="color[]" value="#008000" require>緑
    <input class="c5" type="checkbox" class="colorclass" name="color[]" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" class="colorclass" name="color[]" value="#000000" require>黒
    </div>
    <?php
    }else if($color[$i]=="#008000"){
    ?>
    <div class="color">色　
    <input class="c0" type="checkbox" class="colorclass" name="color[]" id="radio" value="#000000" require>
    <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
    <input class="c1" type="checkbox" class="colorclass" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" class="colorclass" name="color[]" value="#0000FF" require>青
    <input class="c3" type="checkbox" class="colorclass" name="color[]" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" class="colorclass" name="color[]" value="#008000" checked require>緑
    <input class="c5" type="checkbox" class="colorclass" name="color[]" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" class="colorclass" name="color[]" value="#000000" require>黒
    </div>
    <?php
    }else if($color[$i]=="#FFFFFF"){
    ?>
    <div class="color">色　
    <input class="c0" type="checkbox" class="colorclass" name="color[]" id="radio" value="#000000" require>
    <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
    <input class="c1" type="checkbox" class="colorclass" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" class="colorclass" name="color[]" value="#0000FF" require>青
    <input class="c3" type="checkbox" class="colorclass" name="color[]" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" class="colorclass" name="color[]" value="#008000" require>緑
    <input class="c5" type="checkbox" class="colorclass" name="color[]" value="#FFFFFF" checked require>白
    <input class="c6" type="checkbox" class="colorclass" name="color[]" value="#000000" require>黒
    </div>
    <?php
    }else if($color[$i]=="#000000"){
    ?>
    <div class="color">色　
    <input class="c0" type="checkbox" class="colorclass" name="color[]" id="radio" value="#000000" require>
    <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
    <input class="c1" type="checkbox" class="colorclass" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" class="colorclass" name="color[]" value="#0000FF" require>青
    <input class="c3" type="checkbox" class="colorclass" name="color[]" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" class="colorclass" name="color[]" value="#008000" require>緑
    <input class="c5" type="checkbox" class="colorclass" name="color[]" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" class="colorclass" name="color[]" value="#000000" checked require>黒
    </div>
    <?php
    }else{
    ?>
    <div class="color">色　
    <input class="c0" type="checkbox" class="colorclass" name="color[]" id="radio" value="#000000" checked require>
    <input class="c0" type="color"  id="color" list="colors" onchange="radioColor()">
    <input class="c1" type="checkbox" class="colorclass" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" class="colorclass" name="color[]" value="#0000FF" require>青
    <input class="c3" type="checkbox" class="colorclass" name="color[]" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" class="colorclass" name="color[]" value="#008000" require>緑
    <input class="c5" type="checkbox" class="colorclass" name="color[]" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" class="colorclass" name="color[]" value="#000000" require>黒
    </div>
    <hr class="line">
    <?php
    }
    ?>
    
<?php
  } 
  ?>
<hr class="line">
    <div class="image_select" id ="kbkb">
      <div class="example">
        <img src="../article_image/<?php echo $article_image; ?>"><br>
      </div>
        今日の画像：<input type="file" name="up_image" accept="image/*">
    </div>
   
    <input type="hidden" name="form_count" value="<?php echo $formCount; ?>">
    <table>
      <tr><td><input type="submit" class="btn-p" name="add_form" value="+　項目を追加" id="delete" onclick="addform()"></td><td><input type="reset" class="btn-r" value="リセット"></tr></td>
      <td colspan="2" class="tablesbm"><input type="submit" class="btn" value="送信　→"></td>
    </table>
</form>
<!-- echo $formCount;exit(0); -->

</main>
</div>
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
      項目　　　 <input type="text" name="items[]" required><br>
      開始時間　
      <input type="time" name="start_times[]" required> ～ 
     終了時間　
      <input type="time" name="end_times[]" required>
    <div class="color">色　
    <input class="c0" type="checkbox" name="color[]" id="radio1"  value="#" require>
    <input class="c0" type="color" id="color1" list="colors" onchange="radioColor1()">

    <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
    <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
    <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
    </div>
    <hr class="line">
    `);
    console.log(count);
        break;
      
      case 2:
        clickBtn.insertAdjacentHTML('beforebegin',`
        項目　　　 <input type="text" name="items[]" required><br>
      開始時間　
      <input type="time" name="start_times[]" required> ～ 
     終了時間　
      <input type="time" name="end_times[]" required>
    <div class="color">色　
    <input class="c0" type="checkbox" name="color[]" id="radio2"  value="#" require>
    <input class="c0" type="color" id="color2" list="colors" onchange="radioColor2()">

    <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
    <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
    <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
    </div>
    <hr class="line">
    `);
    console.log(count);
        break;
      
      case 3:
        clickBtn.insertAdjacentHTML('beforebegin',`
        項目　　　 <input type="text" name="items[]" required><br>
      開始時間　
      <input type="time" name="start_times[]" required> ～ 
     終了時間　
      <input type="time" name="end_times[]" required>
    <div class="color">色　
    <input class="c0" type="checkbox" name="color[]" id="radio3"  value="#" require>
    <input class="c0" type="color" id="color3" list="colors" onchange="radioColor3()">

    <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
    <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
    <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
    </div>
    <hr class="line">
    `);
    console.log(count);
        break;
      
      case 4:
        clickBtn.insertAdjacentHTML('beforebegin',`
        項目　　　 <input type="text" name="items[]" required><br>
      開始時間　
      <input type="time" name="start_times[]" required> ～ 
     終了時間　
      <input type="time" name="end_times[]" required>
    <div class="color">色　
    <input class="c0" type="checkbox" name="color[]" id="radio4"  value="#" require>
    <input class="c0" type="color" id="color4" list="colors" onchange="radioColor4()">

    <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
    <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
    <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
    </div>
    <hr class="line">
    `);
    console.log(count);
        break;
      
      case 5:
        clickBtn.insertAdjacentHTML('beforebegin',`
        項目　　　 <input type="text" name="items[]" required><br>
      開始時間　
      <input type="time" name="start_times[]" required> ～ 
     終了時間　
      <input type="time" name="end_times[]" required>
    <div class="color">色　
    <input class="c0" type="checkbox" name="color[]" id="radio5"  value="#" require>
    <input class="c0" type="color" id="color5" list="colors" onchange="radioColor5()">

    <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
    <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
    <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
    </div>
    <hr class="line">
    
    `);
    console.log(count);
        break;
      
      case 6:
        clickBtn.insertAdjacentHTML('beforebegin',`
        項目　　　 <input type="text" name="items[]" required><br>
      開始時間　
      <input type="time" name="start_times[]" required> ～ 
     終了時間　
      <input type="time" name="end_times[]" required>
    <div class="color">色　
    <input class="c0" type="checkbox" name="color[]" id="radio6"  value="#" require>
    <input class="c0" type="color" id="color6" list="colors" onchange="radioColor6()">

    <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
    <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
    <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
    </div>
    <hr class="line">
    `);
    console.log(count);
        break;
      
      case 7:
        clickBtn.insertAdjacentHTML('beforebegin',`
        項目　　　 <input type="text" name="items[]" required><br>
      開始時間　
      <input type="time" name="start_times[]" required> ～ 
     終了時間　
      <input type="time" name="end_times[]" required>
    <div class="color">色　
    <input class="c0" type="checkbox" name="color[]" id="radio7"  value="#" require>
    <input class="c0" type="color" id="color7" list="colors" onchange="radioColor7()">

    <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
    <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
    <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
    </div>
    <hr class="line">
    `);
    console.log(count);
        break;
      
      case 8:
        clickBtn.insertAdjacentHTML('beforebegin',`
        項目　　　 <input type="text" name="items[]" required><br>
      開始時間　
      <input type="time" name="start_times[]" required> ～ 
     終了時間　
      <input type="time" name="end_times[]" required>
    <div class="color">色　
    <input class="c0" type="checkbox" name="color[]" id="radio8"  value="#" require>
    <input class="c0" type="color" id="color8" list="colors" onchange="radioColor8()">

    <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
    <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
    <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
    </div>
    <hr class="line">
    `);
    console.log(count);
        break;

      case 9:
        clickBtn.insertAdjacentHTML('beforebegin',`
        項目　　　 <input type="text" name="items[]" required><br>
      開始時間　
      <input type="time" name="start_times[]" required> ～ 
     終了時間　
      <input type="time" name="end_times[]" required>
    <div class="color">色　
    <input class="c0" type="checkbox" name="color[]" id="radio9"  value="#" require>
    <input class="c0" type="color" id="color9" list="colors" onchange="radioColor9()">

    <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
    <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
    <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
    </div>
    <hr class="line">
    `);
    console.log(count);
        break;

      
      
      default:
        clickBtn.insertAdjacentHTML('beforebegin',`
        項目　　　 <input type="text" name="items[]" required><br>
      開始時間　
      <input type="time" name="start_times[]" required> ～ 
     終了時間　
      <input type="time" name="end_times[]" required>
    <div class="color">色　
    <input class="c0" type="checkbox" name="color[]" id="radio"  value="#" require>
    <input class="c0" type="color" id="color" list="colors" onchange="radioColor()">

    <input class="c1" type="checkbox" name="color[]" value="#FF0000" require>赤
    <input class="c2" type="checkbox" name="color[]" value="#0000FF" require>青
    <input class="c3" type="checkbox" name="color[]" value="#FFFF00" require>黄
    <input class="c4" type="checkbox" name="color[]" value="#008000" require>緑
    <input class="c5" type="checkbox" name="color[]" value="#FFFFFF" require>白
    <input class="c6" type="checkbox" name="color[]" value="#000000" require>黒
    </div>
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


</script>
<?php
require_once __DIR__ . '/../footer.php';
?>