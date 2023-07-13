<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $formCount = isset($_POST['form_count']) ? $_POST['form_count'] : 1;
    require_once __DIR__ .'/../pre.php';
    require_once __DIR__ . '/../header.php';
    if(!isset($_SESSION)){
        session_start();
    }
    $item_name=array();
    $start_time=array();
    $end_time=array();
    // 各フィールドの値を取得
    $items = $_POST['items'];
    $start_times = $_POST['start_times'];
    $end_times = $_POST['end_times'];
    $user_id = $_SESSION['user_id'];
    // $mail_num=$_SESSION['mail_num'];
    $title="";
    $diary="";
    // 日付
    $post_date=$_POST['date'];
    $str = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPUQRSTUVWXYZ';
    $article_id = substr(str_shuffle($str), 0, 9);
    $time_date=date("Y-m-d H:i:s"); //投稿した日時

    for($i = 0; $i < $formCount; $i++){
        $item = $items[$i];
        $time_start = $start_times[$i];
        $time_end = $end_times[$i];

        // if($time_start == $time_end){
        if(strtotime($time_start)==strtotime($time_end)){
            $_SESSION['post_error']='開始時間と終了時間は違うはずだよね？？？？';
            header('Location: post.php');
            exit();
        }
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
        if(strtotime($time_start) > strtotime($time_end)){
            $_SESSION['post_error']='終了時間は開始時間よりおそいはずだよね？？？？';
            header('Location: post.php');
            exit();
        }
        
    
        if (mb_strlen($item) > 8) {
            $_SESSION['post_error'] = '8文字以下で項目名を入力してください';
            header('Location: post.php');
            exit();
        }
        if (preg_match('/[&"\'<>]/', $item)) {
            $_SESSION['post_error'] = '使用できない文字が含まれています';
            header('Location: post.php');
            exit();
        }
        // 配列に追加
        // array_push($item_name,$item);
        // array_push($start_time,$time_start);
        // array_push($end_time,$time_end);

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

    $item_name = implode(',', $item_name);
    $start_time = implode(',', $start_time);
    $end_time = implode(',', $end_time);

    // echo $item_name;
    // echo $start_time;
    // echo $end_time;
    // exit(0);
    // 画像の受け取り、加工
    $article_image = $_FILES['up_image']['name'];

    if ($article_image!=""){
        $article_image=$article_id.$article_image;
    }
    //画像を保存
    move_uploaded_file($_FILES['up_image']['tmp_name'], '../article_image/' . $article_image);

    // DBに保存
    require_once __DIR__ . '/../classes/article_list.php';
    $article = new Article();
    $result = $article->insertArticle($article_id,$user_id, $start_time, $end_time, $item_name,$title,$diary,$post_date,$time_date,$article_image);


if ($result !== '') {
    $_SESSION['post_error'] = $result;
    header('Location: post.php');
    exit();
}


// $_SESSION['title'] = $title;
// $_SESSION['diary'] = $diary;
?>
<form method="post" action="./diary.php">
    <input type="hidden" name="date" value="<?=$post_date?>" readonly>
    <input type="hidden" name="article_id" value="<?=$article_id?>" readonly>
    <!-- <input type="submit" name="button" value="夢日記へ"> -->
</form>
<?php
require_once __DIR__ . '/../footer.php';
}

?>
