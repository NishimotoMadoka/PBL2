<?php
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../header.php';
?>
<!-- link rel="stylesheet" href="<?=$login_css?>"> -->
<main>
    <body>
    <form method="post" action="./config_db.php">
    <div class="form-wrapper">
     <h1>パスワードを入力してください</h1>
     <dd>現在のパスワード：<input type="password" name="password" required><br>
     <input type="submit" class="button" title="config" value=""></input>
    </form>
    </body>
</main>

<?php
require_once __DIR__ . '/../footer.php';
?>