<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../classes/user.php';
$user = new User();
$user_id=$_SESSION['user_id'];
?>
<main>
<body>
    <div class="">
    <div class="logo_img"><img src=<?php echo $logo_img ?>></div><br>
    <div class="title">リストを作成</div>        
        <form method="POST" action="./member_register.php" enctype="multipart/form-data">
            <div class="icon-title">アイコン画像を選択<input type="file" name="list_image" accept="image/*"></div>
            <table>
            <tr>
            <td>名前</td>
                <label for="name"></label>
            </tr>
            <tr>
                <td><input type="text" class="formbox" name="list_name" required placeholder="リスト名を入力"></input></td>
            </tr>
            <input type="submit" class="" value="次ページへ"></input>
            </table>
        </form>
</body>
</main>

<?php
require_once __DIR__.'/../footer.php';
