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
    public function insertArticle($article_id, $user_id, $start_time, $end_time, $item_name, $title, $diary, $post_date,$article_image)
    {
        $sql = "insert into article_list(article_id,user_id,start_time,end_time,item_name,title,diary,post_date,article_image) values(?,?,?,?,?,?,?,?,?)";
        $result = $this->exec($sql, [$article_id, $user_id, $start_time, $end_time, $item_name, $title, $diary, $post_date,$article_image]);

        if ($result) {
            return '';
        } else {
            // 何らかの原因で失敗した場合 
            return '投稿できませんでした。管理者にお問い合わせください。';
        }
    }

    public function getArticle($get_user_id,$post_date){
        $sql = "select * from article_list join users on article_list.user_id = users.user_id where article_list.user_id = ? and article_list.post_date = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$get_user_id,$post_date]);
        $life_article = $stmt->fetchAll();
        return $life_article;
    }

    //  友達の投稿を取ってくるやつ
    public  function  friendsArticles($friend_user_id)
    {
        $sql = "select * from article_list join users on article_list.user_id = users.user_id where article_list.user_id = ? order by article_list.post_date desc";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$friend_user_id]);
        $friends_articles = $stmt->fetchAll();
        return $friends_articles;
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
}