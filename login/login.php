<?php
// へっだー
require_once __DIR__ . '/../header.php'; 
require_once __DIR__ . '/../pre.php';
?>

<link rel="stylesheet" href="<?=$login_css?>">

<main>
    <?php
    if (isset($_SESSION['login_error'])) {
        echo '<p class="error_message">' . $_SESSION['login_error'] . '</p>';
        unset($_SESSION['login_error']);
    } else {
        echo '<p class="user-form">利用するにはログインしてください。</p>';
    }
    ?>
    <body>
    <div class="form-wrapper">
     <h1>ログイン</h1>
     <form method="post" action="./login_db.php">
       <div class="form-item">
         <label for="name"></label>
         <input type="text" name="mail" required="required" placeholder="メールアドレス"></input>
       </div>
       <div class="form-item">
         <label for="password"></label>
         <input type="password" name="password" required="required" placeholder="パスワード"></input>
       </div>
       <div class="button-panel">
         <input type="submit" class="button" title="Login" value="Login"></input>
       </div>
     </form>
    </div>
    </body>
    </form>
    <!-- 新規ユーザー登録ボタン -->
    <div class="signup-p"><a href="signup.php">新規ユーザー登録</a></div>
    </div>
</main>
<?php
// ふったー
require_once __DIR__ . '/../footer.php';
?>