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
                <h1><a href="<?= $toppage_php?>">FACT(仮)</a></h1>
                <nav>
                    <ul>
                        <li><a href="<?= $logout_php?>">ログアウト</a></li>
                        <li><a href="<?= $post_php?>">夢日記</a></li>
                        <?php
                //セッションuser_idの有無で表示を変える
                    if(isset($_SESSION['user_id'])){echo"<li><a class='a_header' href=".$logout_php.">ログアウト</a></li><li><a class='a_header' href=".$plof_php.">プロフィール</a></li>";}
                        else{echo"<li><a class='a_header' href=".$login_php.">ログイン</a></li>";}
                ?> 
                    </ul>
                </nav>
        </header>
    
    </body>
</html> 