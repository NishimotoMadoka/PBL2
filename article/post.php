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
<div  class="form-wrapper">
<form  method="post" action="./post_db.php"  enctype="multipart/form-data">
  <?php for ($i = 0; $i < $formCount; $i++) { ?>
    <div class="form-item">
    <div class="title">日付</div> 
    <input type="date" name="date" placeholder="日付" required><br>
    </div>
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
    <input type="color" name="color" require>
  <?php } ?>

    <div class="image_select" id ="kbkb">
        今日の画像：<input type="file" name="up_image" accept="image/*">
    </div>
    <div  class="button-panel">
    <input type="hidden" name="form_count" value="<?php echo $formCount; ?>">
  <input type="submit" class="button" name="add_form" value="+　項目を追加" id="delete" onclick="addform()">
        <input type="submit" class="button" value="送信">
        <input type="reset" class="button-r" value="リセット">
    </div>
</form>

</main>

<script>

//kbkbが書いたフォーム追加するやつ
let count=0;//formの数を数える
function addform(){//form追加関数

  let clickBtn = document.getElementById('kbkb');

   

  if(count<10){
    
    var formCountInput = document.querySelector('input[name="form_count"]');
    var formCount = parseInt(formCountInput.value);
    formCount++;
    formCountInput.value = formCount;

    var container = document.querySelector('form');
    var div = document.createElement('div');

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
    <input type="color" name="color[]" require>
    `);
  }else{
    //>10のときボタン削除
    const element = document.getElementById('delete'); 
    element.remove();

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