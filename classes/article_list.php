<?php
require_once __DIR__ . '/dbdata.php';

class Article extends DbData
{
    // 投稿登録
    public function insertArticle($user_id, $title, $diary, $date_time)
    {
        $sql = "insert into article_list(user_id,title,diary,date_time) values(?,?,?,?,)";
        $result = $this->exec($sql, [$user_id, $title, $diary, $date_time]);

        if ($result) {
            return '';
        } else {
            // 何らかの原因で失敗した場合 
            return '投稿できませんでした。管理者にお問い合わせください。';
        }
    }

    //  toppagenoyatu  tabunnerrorderu youhennkou!!
    public  function  friendsArticles($friend_users)
    {
        $sql  =  "select * from article_list join users on article_list.user_id = users.user_id where article_list.article_public=false and user_id=? order by article_list.article_id desc";
        $stmt = $this->pdo->prepare($sql[$friend_users]);
        $stmt->execute();
        $articles = $stmt->fetchAll();
        return  $articles;
    }
    // 投稿を取ってくるやつ　変更するかも
    public function selectArticle($user_id,$title, $diary,$date_time){
        $sql = "select * from article_list where userid=? and title=? and diary=? and date_time=?";
        $stmt = $this->query($sql, [$user_id,$title, $diary,$date_time]);
        return $stmt->fetch();
    }
    // 取ってきたやつ$result[取ってきたいカラム]でいけるとおもう
    // （例）$result['article_id']で投稿id

    // ユーザーの記事を取り出す(プロフィール画面でつかうかな？？)
    public function userArticles($usersshow_id)
    {
        $sql = "select * from article_list join users on article_list.user_id = users.user_id where article_list.user_id = ? order by article_list.article_id desc";
        $stmt = $this->query($sql, [$usersshow_id]);
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