<?php
require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
require_once __DIR__ . '/../classes/user.php';
$user = new User();
$user_id=$_SESSION['user_id'];
?>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
</head>

<link rel="stylesheet" href="<?= $list_css ?>">

<main>
<body>
    <div class="box">
        <h1>リストを作成</h1>        
        <form method="POST" action="./member_register.php" enctype="multipart/form-data">

            名前
            <label for="name"></label>
            <input type="text" class="formbox" name="list_name" required placeholder="リスト名を入力"></input><br>

            <div class="icon-title">アイコン画像を選択<input type="file" name="list_image" accept="image/*"></div>

            <input type="submit" class="btn" value="次ページへ"></input>
            
        </form>
    </div>
</body>
</main>

<?php
require_once __DIR__.'/../footer.php';
