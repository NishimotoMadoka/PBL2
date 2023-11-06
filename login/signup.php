<!-- 新規登録 -->
<?php
// へっだー
// require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
?>
<link rel="stylesheet" href="<?=$signup_css?>">

<main>
    <?php
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
    $mail = isset($_SESSION['mail']) ? $_SESSION['mail'] : '';
    $profile_comment=isset($_SESSION['profile_comment']) ? $_SESSION['profile_comment']:'';
    $password = isset($_SESSION['password']) ? $_SESSION['password'] : '';

    if (isset($_SESSION['signup_error'])) {
        $signup_error="<script type='text/javascript'>alert('". $_SESSION['signup_error'] ."');</script>";
        echo $signup_error;
        // echo '<p class="error_message">' . $_SESSION['signup_error'] . '</p>';
        unset($_SESSION['signup_error']);
    } else {
        // echo '<p class="user-form">' . "新規登録" . '</p>';
    }

    ?>
    <head>
    <!-- レスポンシブ -->
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
    
    </head>
    <body>
        <div class="loginbox">
            <div class="logo_img"><img src=<?php echo $logo_img ?>></div><br>
                <div class="title">新規登録</div>
                
            <form method="POST" action="./signup_db.php" enctype="multipart/form-data">
                <div class="icon-title">アイコン画像を選択<input type="file" name="icon" accept="image/*"></div>
            <form method="post" action="./signup_db.php">
                <table>
                    <tr>
                        <td>お名前</td>
                        <label for="name"></label>
                    </tr>
                    <tr>
                        <td><input type="text" class="formbox" name="name" value="<?= $name ?>" required placeholder="電子　太郎"></input></td>
                    </tr>
                    <tr>
                        <td>メールアドレス</td>
                        <label for="password"></label>
                    </tr>
                    <tr>
                        <td><input type="email" class="formbox" name="mail" value="<?= $mail ?>" required placeholder="example@Jagaimo.com"></input></td>
                    </tr>
                    <tr>
                        <td>自己紹介</td>
                        <label for="password"></label>
                    </tr>
                    <tr>
                        <td><input type="text" class="formbox" name="profile_comment"  value="<?= $profile_comment ?>"  placeholder="自己紹介"></input></td>
                    </tr> 
                    <tr>
                        <td>パスワード</td>
                        <label for="password"></label>
                    </tr>
                    <tr>
                        <td><input type="password" class="formbox" name="password" required="required" placeholder="半角英数字6文字以上"></input></td>
                            <label for="password_conf"></label>
                    </tr>
                    <tr>
                    <td><input type="password" class="formbox" name="password_conf" required="required" placeholder="もう一度入力してください"></input></td>
                    </tr>
                </table>
         <input type="submit" class="btn" title="Login" value="登録する"></input>
    </form>
    </body>
    </form>
</main>

<?php
// ふったー
// require_once __DIR__ . '/../footer.php';
?>