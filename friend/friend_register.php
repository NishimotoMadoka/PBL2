<?php
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../header.php';

if (isset($_SESSION['friend_register_error'])) {
    echo  $_SESSION['friend_register_error'] ;
    unset($_SESSION['friend_register_error']);
} 
?>

<main>
    <div class="friend-form">
        <form method="POST" action="./friend_register_db.php">
            <table>
                <tr>
                    <th>フレンドコード：</th>
                    <td><input type="text" name="friend_code" maxlength="9" required></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" value="追加"></td>
                </tr>
            </table>
        </form>
    </div>
</main>
<?php
require_once __DIR__ . '/../footer.php';
?>