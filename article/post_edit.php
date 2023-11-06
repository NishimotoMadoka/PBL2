<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../classes/article_list.php';

// 遷移元からarticle_idをPOST送信する
$article_id=$_POST['article_id'];

$article=new Article();
$article_deteils=$article->getArticle($user_id,$article_id);
echo $article_deteils['start_time'];
exit(0);
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
    <input type="radio" name="color[]" id="radio"  require>
    <input type="color" name="color[]" id="color" onchange="radioColor()">
    
    <!-- 色変更ラジオボタン -->
    <input type="radio" name="color[]" value="#FF0000" require>赤
    <input type="radio" name="color[]" value="#0000FF" require>青
    <input type="radio" name="color[]" value="#FFFF00" require>黄
    <input type="radio" name="color[]" value="#008000" require>緑
    <input type="radio" name="color[]" value="#FFFFFF" require>白
    <input type="radio" name="color[]" value="#000000" require>黒
    <!-- ここまで -->    
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
    <input type="radio" name="color[]" id="radio"  require>
    <input type="color" name="color[]" id="color" onchange="radioColor()">
    
    <!-- 色変更ラジオボタン -->
    <input type="radio" name="color[]" value="#FF0000" require>赤
    <input type="radio" name="color[]" value="#0000FF" require>青
    <input type="radio" name="color[]" value="#FFFF00" require>黄
    <input type="radio" name="color[]" value="#008000" require>緑
    <input type="radio" name="color[]" value="#FFFFFF" require>白
    <input type="radio" name="color[]" value="#000000" require>黒
    <!-- ここまで -->
    `);
  }else{
    //>10のときボタン削除
    const element = document.getElementById('delete'); 
    element.remove();

  }
  
 count++;
}
</script>
<?php
require_once __DIR__ . '/../footer.php';
?>