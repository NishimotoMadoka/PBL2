<?php
    require_once __DIR__.'/pre.php';
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="<?=$home_css?>">
        <title>FACT(仮)</title>
    </head>

    <body>
        <header>
                <h1><a href="<?= $home_php?>">FACT(仮)</a></h1>
                <nav>
                    <ul>
                        <li><a href="<?= $AAA_php?>">AAA</a></li>
                        <li><a href="<?= $BBB_php?>">BBB</a></li>
                        <?php
                //セッションuser_idの有無で表示を変える
                    if(isset($_SESSION['user_id'])){echo"<li><a class='a_header' href=".$logout_php.">ログアウト</a></li><li><a class='a_header' href=".$plof_php.">プロフィール</a></li>";}
                        else{echo"<li><a class='a_header' href=".$signup_php.">ログイン</a></li>";}
                ?> 
                    </ul>
                </nav>
        </header>
    
    </body>
</html> 