<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $formCount = isset($_POST['form_count']) ? $_POST['form_count'] : 1;
    require_once __DIR__ .'/../pre.php';
    require_once __DIR__ . '/../header.php';
    if(!isset($_SESSION)){
        session_start();
    }
    // echo $formCount;
    // exit(0);
    $item_name=array();
    $start_time=array();
    $end_time=array();
    // 各フィールドの値を取得
    $items = $_POST['items'];
    $start_times = $_POST['start_times'];
    $end_times = $_POST['end_times'];
    $color = $_POST['color'];
    $user_id = $_SESSION['user_id'];
    $article_id=$_POST['article_id'];
    $article_image=$_POST['article_image'];
    // $mail_num=$_SESSION['mail_num'];
    $title="";
    $diary="";
    // 日付
    $post_date=$_POST['date'];
    $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
    // $article_id = substr(str_shuffle($str), 0, 9);
    $time_date=date("Y-m-d H:i:s"); //投稿した日時


    // ループで一個ずつ取り出して、エラー処理してる気がする
    for($i = 0; $i < $formCount; $i++){
        $item = $items[$i];
        $time_start = $start_times[$i];
        $time_end = $end_times[$i];

        // エラーメッセージ表示
        // if(strtotime($time_start)==strtotime($time_end)){
        //     $_SESSION['post_error']='開始時間と終了時間は違うはずだよね？？？？';
        //     header('Location: post.php');
        //     exit();
        // }
        // if($i>1){
        //     echo $_POST['end_time'.$i-1];
        //     echo $time_start;
        //     exit(0);
        //     if(strtotime($_POST['end_time'.$i-1]) > strtotime($time_start)){
        //         $_SESSION['post_error']='開始時間は前のタスクの終了時間以降で入力してください';
        //         header('Location: post.php');
        //         exit();
        //     }
        // }
        // if(strtotime($time_start) > strtotime($time_end)){
        //     $_SESSION['post_error']='終了時間は開始時間よりおそいはずだよね？？？？';
        //     header('Location: post.php');
        //     exit();
        // }
        
    
        // if (mb_strlen($item) > 8) {
        //     $_SESSION['post_error'] = '8文字以下で項目名を入力してください';
        //     header('Location: post.php');
        //     exit();
        // }
        // if (preg_match('/[&"\'<>]/', $item)) {
        //     $_SESSION['post_error'] = '使用できない文字が含まれています';
        //     header('Location: post.php');
        //     exit();
        // }
        // 配列に追加
        // array_push($item_name,$item);
        // array_push($start_time,$time_start);
        // array_push($end_time,$time_end);

        // 多分ここでまた配列に戻してる？？？？
        $item_name[$i]=$item;
        $start_time[$i]=$time_start;
        $end_time[$i]=$time_end;

        // if($item==""){
        //     $item_name.="#,";
        // }else{
        //     $item_name.=$item.",";
        // }
    
        // if($time_start==""){
        //     $start_time.="#,";
        // }else{
        //     $start_time.=$time_start.",";
        // }
    
        // if($time_end==""){
        //     $end_time.="#,";
        // }else{
        //     $end_time.=$time_end.",";
        // }
    }

    // 配列の要素数カウント
    $item_count=count($item_name);
    $start_count=count($start_time);
    $end_count=count($end_time);
    $color_count=count($color);


    // 要素数が10以下だったら#で埋める
    if($item_count<10){
        for($i=10-$item_count;$i>=1;$i--){
            $h=count($item_name);
            array_push($item_name,"#");
        }
    }
    if($start_count<10){
        for($i=10-$start_count;$i>=1;$i--){
            $h=count($start_time);
            array_push($start_time,"#");
        }
    }
    if($end_count<10){
        for($i=10-$end_count;$i>=1;$i--){
            $h=count($end_time);
            array_push($end_time,"#");
        }
    }
    if($color_count<10){
        for($i=10-$color_count;$i>=1;$i--){
            $h=count($color);
            array_push($color,"#");
        }
    }

    // 要素を結合して「,」区切りの文字列に変換してるのかな？？？？
    $item_name = implode(',', $item_name);
    $start_time = implode(',', $start_time);
    $end_time = implode(',', $end_time);
    $color=implode(',',$color);
    

    if (!empty($_FILES['up_image']['name'])) {
        $article_image = $article_id . $_FILES['up_image']['name'];

        move_uploaded_file($_FILES['up_image']['tmp_name'], '../article_image/' . $article_image);
    } 
    

    // DBに保存
    require_once __DIR__ . '/../classes/article_list.php';
    $article = new Article();
    

    $result = $article->editArticle($start_time,$end_time,$item_name,$color,$post_date,$article_image,$article_id,$user_id);


if ($result !== '') {
    $_SESSION['post_error'] = $result;
    header('Location: post.php');
    exit();
}

?>

<?php
require_once __DIR__ . '/../header.php';
?>
<link rel="stylesheet" href="<?= $post_db_css ?>">
<form method="post" action="./diary.php">
    <input type="hidden" name="date" value="<?=$post_date?>" readonly>
    <input type="hidden" name="article_id" value="<?=$article_id?>" readonly>
    <div class="button-panel">
    <input class="button" type="submit" name="button" value="夢日記へ">
    </div>
</form>
<?php
require_once __DIR__ . '/../footer.php';
}

?>