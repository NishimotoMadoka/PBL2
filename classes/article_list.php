<?php
require_once __DIR__ . '/dbdata.php';

class Article extends DbData
{
    // 日記投稿
    public function insertDiary($title, $diary, $article_id)
    {
        $sql = "update article_list set title=?, diary=? WHERE article_id=?";
        $result = $this->exec($sql, [$title, $diary, $article_id]);

        if ($result) {
            return '';
        } else {
            // 何らかの原因で失敗した場合 
            return '投稿できませんでした。管理者にお問い合わせください。';
        }
    }
    // 生活時間投稿
    public function insertArticle($article_id, $user_id, $start_time, $end_time, $item_name, $color, $title, $diary, $post_date,$time_date,$article_image)
    {
        $sql = "insert into article_list(article_id,user_id,start_time,end_time,item_name,color,title,diary,post_date,time_date,article_image) values(?,?,?,?,?,?,?,?,?,?,?)";
        $result = $this->exec($sql, [$article_id, $user_id, $start_time, $end_time, $item_name, $color, $title, $diary, $post_date,$time_date,$article_image]);

        if ($result) {
            return '';
        } else {
            // 何らかの原因で失敗した場合 
            return '投稿できませんでした。管理者にお問い合わせください。';
        }
    }

    // 投稿編集機能
    public function editArticle($article_id,$user_id,$start_time,$end_time,$item_name,$color,$title,$diary,$post_date,$article_image){
        $sql = "update article_list set start_time=?,end_time=?,item_name=?,color=?,title=?,diary=?,post_date=?,article_image=? where article_id=? and user_id=?";
        $result = $this->exec($sql, [$start_time,$end_time,$item_name,$color,$title,$diary,$post_date,$article_image,$article_id,$user_id]);
        if($result){
            return'';
        }else{
            return'更新できませんでした。管理者にお問い合わせください。';
        }
    }
    // article_id、user_idで投稿の内容を取ってくる
    public function getArticle($user_id,$article_id){
        $sql="select * from article_list where user_id=? and article_id=?";
        $stmt = $this->query($sql,[$user_id,$article_id]);
        return $stmt->fetch();
    }

    // public function getArticle($get_user_id,$post_date){
    //     $sql = "select * from article_list join users on article_list.user_id = users.user_id where article_list.user_id = ? and article_list.post_date = ?";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute([$get_user_id,$post_date]);
    //     $life_article = $stmt->fetchAll();
    //     return $life_article;
    // }

    //  友達の投稿を取ってくるやつ
    // public  function  friendsArticles($friend_user_id)
    // {
    //     $sql = "select * from article_list join users on article_list.user_id = users.user_id where article_list.user_id = ? order by article_list.post_date desc";
    //     $stmt = $this->pdo->prepare($sql);
    //     $stmt->execute([$friend_user_id]);
    //     $friends_articles = $stmt->fetchAll();
    //     return $friends_articles;
    // }
    public  function  friendsArticles($friend_user_id)
    {
        $sql = "select * from article_list where user_id=?";
        $stmt = $this->query($sql, [$friend_user_id]);
        return $stmt->fetch();
    }

    // 投稿を取ってくるやつ　変更するかも
    public function selectArticle($user_id,$title, $diary,$date_time){
        $sql = "select * from article_list where user_id=? and title=? and diary=? and date_time=?";
        $stmt = $this->query($sql, [$user_id,$title, $diary,$date_time]);
        return $stmt->fetch();
    }
    // 取ってきたやつ$result[取ってきたいカラム]でいけるとおもう
    // （例）$result['article_id']で投稿id

    // ユーザーの記事を取り出す(プロフィール画面でつかうかな？？)
    public function userArticles($user_id)
    {
        $sql = "select * from article_list join users on article_list.user_id = users.user_id where article_list.user_id = ? order by article_list.article_id desc";
        $stmt = $this->query($sql, [$user_id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    // 投稿記事の非公開
    public function privateArticle($article_id)
    {
        $sql = "update article_list set article_public=true where article_id=?";
        $result = $this->exec($sql, [$article_id]);
    }

    // 投稿記事の再公開
    public function publicArticle($article_id)
    {
        $sql = "update article_list set article_public=false where article_id=?";
        $result = $this->exec($sql, [$article_id]);
    }

    // いいね機能　ボタン押したらカウントが1増える処理
    public function updateGood($article_id)
    {
        $sql = "select good from article_list where article_id=?";
        $stmt = $this->query($sql, [$article_id]);
        $good = $stmt->fetch();

        $sql = "update article_list set good=? where article_id=?";
        $result = $this->exec($sql, [$good[0]+1,$article_id]);

        if ($result) {
            return ''; // ここも空文字を返すので「''」はシングルクォーテーションが２つ
        } else {
            // 何らかの原因で失敗した場合 
            return 's登録できませんでした。管理者にお問い合わせください。';
        }
    }

    // ユーザーのいいねリストに登録
    public function Updategood_list($user_id,$article_id){
        // $sql = "select good_list from users where user_id=?";
        // $stmt = $this->query($sql,[$user_id]);
        // $good_list = $stmt->fetch();

        $sql = "update good_list set good concat('good_list','article_id=?') where user_id=?";
        $result = $this->exec($sql,[$article_id,$user_id]);
        if ($result) {
            return ''; // ここも空文字を返すので「''」はシングルクォーテーションが２つ
        } else {
            // 何らかの原因で失敗した場合 
            return '登録できませんでした。管理者にお問い合わせください。';
        }
    }

    // いいねリストを取得
    public function checkGood_list($user_id){
        $sql = "select good_list from users where user_id=?";
        $stmt = $this->query($sql, [$user_id]);
        return $stmt->fetch();
    }

    // 投稿のいいねの数を取得するやつ
    public function getGood($article_id)
    {
        $sql = "select good from article_list where article_id=? ";
        $stmt = $this->query($sql, [$article_id]);
        return $stmt->fetch();
    }

    public function checkGood_duplicate($user_id,$post_user_id,$article_id){
        $sql = "select * from good where user_id=? and post_user_id=? and article_id=?";
        $stmt = $this->query($sql,[$user_id,$post_user_id,$article_id]);
        return $stmt->fetch();
    }

    public function delete_Good($user_id,$post_user_id,$article_id){
        $sql = "delete from good where user_id=? and post_user_id=? and article_id=?";
        $stmt = $this->query($sql,[$user_id,$post_user_id,$article_id]);
        return $stmt;
    }

    public function insert_Good($user_id,$post_user_id,$article_id,$good_time){
        $sql = "insert into good(user_id,post_user_id,article_id,good_time) values (?,?,?,?)";
        $result = $this->exec($sql, [$user_id,$post_user_id,$article_id,$good_time]);

        if ($result) {
            return '';
        } else {
            // 何らかの原因で失敗した場合 
            return '投稿できませんでした。管理者にお問い合わせください。';
        }
    }

    public function good_Notification($post_user_id){
        $sql = "select * from good where post_user_id=?";
        $stmt = $this->query($sql, [$post_user_id]);
        return $stmt->fetchAll();
    }

    public function get_Good($article_id){
        $sql = "select count(*) as likeCount from good where article_id = ?";
        $likeCount = $this->query($sql,[$article_id]);
        return $likeCount->fetch();
    }
 
}