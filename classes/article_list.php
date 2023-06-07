<?php
require_once __DIR__ . '/dbdata.php';

class Article extends DbData
{
    // 投稿登録
    public function insertArticle($user_id, $title, $diary, $date_time,$article_image)
    {
        $sql = "insert into article_list(user_id,title,diary,date_time,article_image) values(?,?,?,?,?)";
        $result = $this->exec($sql, [$user_id, $title, $diary, $date_time,$article_image]);

        if ($result) {
            return '';
        } else {
            // 何らかの原因で失敗した場合 
            return '投稿できませんでした。管理者にお問い合わせください。';
        }
    }

    // 投稿を取ってくるやつ　変更するかも
    public function selectArticle($user_id,$title, $diary,$date_time){
        $sql = "select * from article_list where userid=? and title=? and diary=? and date_time=?";
        $stmt = $this->query($sql, [$user_id,$title, $diary,$date_time]);
        return $stmt->fetch();
    }
    // 取ってきたやつ$result[取ってきたいカラム]でいけるとおもう
    // （例）$result['article_id']で投稿id
}