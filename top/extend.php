<?php
require_once __DIR__ . '/../header.php';
?>

<div>
  <table>
    <tr>
      <th>項目名</th>
      <td><input type="text" name="items[]" placeholder="項目" required></td>
      <th>開始時間</th>
      <td><input type="time" name="start_times[]" required></td>
      <th>終了時間</th>
      <td><input type="time" name="end_times[]" required></td>
      <th>色</th>
      <td><input type="color" name="color[]" required></td>
    </tr>
  </table>
</div>