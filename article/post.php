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
<div class="form-wrapper">
<form method="post" action="./post_db.php"  enctype="multipart/form-data">
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
  <?php } ?>


  <input type="hidden" name="form_count" value="<?php echo $formCount; ?>">
    <div class="image_select">
      今日の画像：<input type="file" name="up_image" accept="image/*">
    </div>
    <div class="button-panel-1">
      <input type="submit" class="button-1" name="add_form" value="+ 項目を追加">
    </div>
    <div class="button-panel">
      <input type="submit" class="button" value="送信"><input type="reset" value="リセット" class="button">
    </div>
</form>
</main>

<script>
  // プラスボタンが押されたらフォームを追加
  document.querySelector('input[name="add_form"]').addEventListener('click', function (e) {
    e.preventDefault();
    var formCountInput = document.querySelector('input[name="form_count"]');
    var formCount = parseInt(formCountInput.value);
    formCount++;
    formCountInput.value = formCount;

    var container = document.querySelector('form');
    var div = document.createElement('div');
    div.innerHTML = `
    <div class="form-item">
    <div class="item">
      <input type="text" name="items[]" placeholder="項目" required>
    </div>
    <div class="title">開始時間</div>
      <input type="time" name="start_times[]" required>
      <div class="title">終了時間</div>
      <input type="time" name="end_times[]" required>
    </div>
    `;
    container.appendChild(div);
  });
</script>
<?php
require_once __DIR__ . '/../footer.php';
?>
