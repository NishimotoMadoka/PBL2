<!-- 新規登録 -->
<?php
// へっだー
// require_once __DIR__ . '/../header.php';
require_once __DIR__ . '/../pre.php';
?>
<link rel="stylesheet" href="<?=$login_css?>">

<main>
    <?php
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
    $name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
    $mail = isset($_SESSION['mail']) ? $_SESSION['mail'] : '';
    $profile_comment=isset($_SESSION['profile_comment']) ? $_SESSION['profile_comment']:'';
    $password = isset($_SESSION['password']) ? $_SESSION['password'] : '';

    if (isset($_SESSION['signup_error'])) {
        echo '<p class="error_message">' . $_SESSION['signup_error'] . '</p>';
        unset($_SESSION['signup_error']);
    } else {
        // echo '<p class="user-form">' . "新規登録" . '</p>';
    }

    ?>



    <!-- <div class=signup>
        <form method="POST" action="./signup_db.php" enctype="multipart/form-data">
            <h3>アイコン変更</h3>
            <!-- <div> -->
                <!-- <dl class="inline"> -->
                <!-- <dd>アイコン：<input type="file" name="icon" accept="image/*"></dd> -->
                <!-- </dl> -->
                <!-- <br> -->
            <!-- </div> -->
            <!-- <table> -->
                <!-- <form method="POST" action="./signup_db.php"> -->
                <!-- <tr> -->
                    <!-- <td>名前</td> -->
                    <!-- <td><input type="text" name="name" value="<?= $name ?>" required></td> -->
                <!-- </tr> -->
                <!-- <tr> -->
                    <!-- <td>メールアドレス</td> -->
                    <!-- <td><input type="email" name="mail" value="<?= $mail ?>" required></td> -->
                <!-- </tr> -->
                <!-- <tr> -->
                    <!-- <td>自己紹介</td> -->
                    <!-- <td><input type="text" name="profile_comment" value="<?= $profile_comment ?>"></td> -->
                <!-- </tr> -->
                <!-- <tr> -->
                    <!-- <td>パスワード</td> -->
                    <!-- <td><input type="password" name="password" required></td> -->
                <!-- </tr> -->
                <!-- <tr> -->
                    <!-- <td colspan="2"><input class="btn" type="submit" value="送信"></td> -->
                <!-- </tr> -->
            <!-- </table> --> 

            <body>
   <div class="form-wrapper">
     <h1>新規登録</h1>

     <form method="POST" action="./signup_db.php" enctype="multipart/form-data">
            <div class="form-item">
                <div class="inline">
                <div class="icon-title">アイコン画像を選択<input type="file" name="icon" accept="image/*"></div>
            </div>
            </div>    
          


     <form method="post" action="./signup_db.php">
       <div class="form-item">
         <label for="name"></label>
         <input type="text" name="name" value="<?= $name ?>" required placeholder="名前"></input>
       </div>

       <div class="form-item">
         <label for="password"></label>
         <input type="email" name="mail" value="<?= $mail ?>" required placeholder="メールアドレス"></input>
       </div>


       <div class="form-item">
         <label for="password"></label>
         <input type="text" name="profile_comment"  value="<?= $profile_comment ?>" required placeholder="自己紹介"></input>
       </div>

       
       <div class="form-item">
         <label for="password"></label>
         <input type="password" name="password" required="required" placeholder="パスワード"></input>
       </div>


       <div class="button-panel">
         <input type="submit" class="button" title="Login" value="sign up"></input>
       </div>
     </form>
   </div>
 </body>



        </form>
    </div>
</main>
<?php
// ふったー
// require_once __DIR__ . '/../footer.php';
?>