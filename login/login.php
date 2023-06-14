<?php
// へっだー
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
?>
<main>
    <?php
    if (isset($_SESSION['login_error'])) {
        echo '<p class="error_message">' . $_SESSION['login_error'] . '</p>';
        unset($_SESSION['login_error']);
    } else {
        echo '<p class="user-form">ログインしてください。</p>';
    }
    ?>
    <div class="login-form">
        <form method="POST" action="./login_db.php">
            <table>
                <tr>
                    <th>メールアドレス：</th>
                    <td><input type="text" name="mail"></td>
                </tr>
                <tr>
                    <th>パスワード：</th>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="ログイン"></td>
                </tr>
            </table>
        </form>

        <!-- 新規ユーザー登録ボタン -->
        <p><a href="./signup.php">新規ユーザー登録</a></p>
    </div>
</main>
<?php
// ふったー
require_once __DIR__ . '/../footer.php';
?>