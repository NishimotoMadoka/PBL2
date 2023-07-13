<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $formCount = isset($_POST['form_count']) ? $_POST['form_count'] : 1;
} else {
  $formCount = 1;
}
?>

<form method="post" action="post_dbtest.php">
  <!-- <input type="hidden" name="form_count" value="<?php echo min($formCount + 1, 10); ?>"> -->
  
  <?php for ($i = 0; $i < $formCount; $i++) { ?>
    <div>
      <label>項目:</label>
      <input type="text" name="items[]" required>

      <label>開始時間:</label>
      <input type="time" name="start_times[]" required>

      <label>終了時間:</label>
      <input type="time" name="end_times[]" required>
    </div>
  <?php } ?>
  
  <input type="submit" name="add_form" value="プラスボタン">
  <div id="kbkb" class="image_select">
    今日の画像：<input type="file" name="up_image" accept="image/*">
  </div>
  <div  class="button-panel">
      <input type="hidden" name="form_count" value="<?php echo $formCount; ?>">

    <input type="hidden" name="date" value="<?=$post_date?>" readonly>
    <input type="hidden" name="article_id" value="<?=$article_id?>" readonly>
    <input type="submit" class="button" value="送信"><input type="reset" value="リセット" class="button">
  </div>
</form>

<script>
  // プラスボタンが押されたらフォームを追加
  document.querySelector('input[name="add_form"]').addEventListener('click', function (e) {
    e.preventDefault();
    var formCountInput = document.querySelector('input[name="form_count"]');
    var formCount = parseInt(formCountInput.value);
    if (formCount < 10) {
      formCount++;
      formCountInput.value = formCount;

      var container = document.querySelector('form');
      var div = document.createElement('div');
      div.innerHTML = `
        <label>項目:</label>
        <input type="text" name="items[]" required>

        <label>開始時間:</label>
        <input type="time" name="start_times[]" required>

        <label>終了時間:</label>
        <input type="time" name="end_times[]" required>
      `;
      container.insertBefore(div, document.querySelector('.button-panel'));
    }
  });
</script>
