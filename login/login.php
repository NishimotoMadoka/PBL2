<?php
// へっだー
// require_once __DIR__ . '/../header.php'; 
require_once __DIR__ . '/../pre.php';
?>

<link rel="stylesheet" href="<?=$login_css?>">

<main>
    <?php
    if (isset($_SESSION['login_error'])) {
        $login_error="<script type='text/javascript'>alert('". $_SESSION['login_error'] ."');</script>";
        echo $login_error;
        // echo '<p class="error_message">' . $_SESSION['login_error'] . '</p>';
        unset($_SESSION['login_error']);
    } else {
        // echo '<p>利用するにはログインしてください。</p>';
    }
    ?>
    <haed>
        <!-- レスポンシブ -->
        <meta name="viewport" content="width=device-width,initial-scale=1">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    </head>
    <body>
        <div class="loginbox">
            <div class="logo_img"><img src=<?php echo $logo_img ?>></div><br>
                <div class="title">ログイン</div>
                    <form method="post" action="./login_db.php">
                        <table>
                            <tr>
                                <label for="name"></label>
                                <td>メールアドレス</td>
                            </tr>
                            <tr>
                                <td></label><input type="text" class="formbox" name="mail" required="required" placeholder="example@Jagaimo.com"></input></td>
                            </tr>
                            <tr>
                            <tr>
                                <label for="password"></label>
                                <td>パスワード</td>
                            </tr>
                            <tr>
                                <td></label><input type="password" class="formbox" name="password" required="required" placeholder="半角英数字6文字以上"></input></td>
                            </tr>
                        </table>
                        <input type="submit" class="btn" title="Login" value="ログイン"></input>
                    </form>
                    <hr>
                <!-- 新規ユーザー登録ボタン -->
                <div class="signup"><a href="signup.php">新規登録はこちら</a></div>
        </div>
    </body>
</main>
<?php
// ふったー
// require_once __DIR__ . '/../footer.php';
?>