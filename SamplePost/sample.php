<?php
    try{
        $db = new PDO('mysql:dbname=test;host=localhost;charset=utf8','test','takuchan');

        if(isset($_POST['text'])){
            $updata = $db->exec('INSERT INTO answer SET answer="'.$_POST['text'].'",datetime = NOW(),userName="'.$_POST['userName'].'"');
        }
    }
    catch(PDOException $e){
        echo'DB接続エラー'.$e->getMessage();
    }
    $entry = $db->query('SELECT*FROM answer ORDER BY datetime desc');
    //ここのSQL分を書き換えて表示内容を決める
?>

<html>
    <head>
  
    </head>
    <body>
        <main>
    
            <form action="sample.php" method="post">
            <textarea name="userName" cols="40" rows="3" placeholder="回答を入力"></textarea><br>
            <textarea name="text" cols="40" rows="3" placeholder="回答を入力"></textarea><br>
            <button type="submit" name="button">送信</button>
        </form>
       
        <?php 

        //$rtn_content ='';//初期化
        //$count = 0;//初期化

        while($resister = $entry->fetch()):
            //投稿内容を表示

            //$count++;//ループ回数＃円グラフをいっぱい出すため
        ?>
        
        


        <p><?php print($resister['datetime']);?> <?php print($resister['userName']); ?>さん</p>
        <p><?php print(mb_substr($resister['answer'],0,50)); ?></p>
        <hr size='3' color="#a9a9a9" width="450" align="senter">
        
       

        <?php 
        
        endwhile; 
        
        ?>
        </main>
        
    </body>
</html>