<?php
require_once __DIR__ . '/dbdata.php';

class User extends DbData
{
    #ログイン認証処理
    public function authUser($mail)
    {
        $sql = "select * from users where mail=?";
        $stmt = $this->query($sql, [$mail]);
        return $stmt->fetch();
    }

    #新規登録処理
    public function signup($name, $mail, $profile_comment,$friend_code,$icon_name, $password)
    {
        $sql = "select * from users where mail=?";
        $stmt = $this->query($sql, [$mail]);
        $result = $stmt->fetchAll();

        if ($result) {
            return 'この' . $mail . 'は既に登録されています。';
        }
        $sql = "insert into users(name,mail,profile_comment,friend_code,icon,password)values(?,?,?,?,?,?)";
        $result = $this->exec($sql, [$name, $mail, $profile_comment,$friend_code,$icon_name, $password]);

        if ($result) {
            return '';
        } else {
            return '新規登録できませんでした。管理者にお問い合わせください。';
        }
    }

    #ユーザー情報更新処理($a→新しいパスワードの変数名に変更してね)
    public function updateUser($name,$mail,$profile_comment,$password,$user_id)
    {
        $sql = "update users set name=?,mail=?,profile_comment=?,password=? where user_id=?";
        $result = $this->exec($sql, [$name,$mail,$profile_comment,$password,$user_id]);
        if($result){
            return'更新しました。';
        }else{
            return'更新できませんでした。管理者にお問い合わせください。';
        }
    }
    public function Icon_update($icon_name,$user_id)
    {
        $sql = "update users set icon=? where user_id=?";
        $result = $this->exec($sql, [ $icon_name,$user_id]);
        if($result){
            return'';
        }else{
            return'更新できませんでした。管理者にお問い合わせください。';
        }
    }

    public function getUserinfo($user_id, $password)
    {
        $sql = "select * from users where user_id=? and password=?";
        $stmt = $this->query($sql, [$user_id, $password]);
        return $stmt->fetch();
    }

    #パスワード認証(ユーザー情報変更のページで使えるかな？？)
    public function authPassword($password,$user_id)
    {
        $sql = "select password from users where password=? and user_id=?";
        $stmt = $this->query($sql, [$password,$user_id]);
        $result=$stmt->fetch();

        if($result){
            return '';
        }else{
            return 'パスワードが違います。';
        }
    }

    #他ユーザーの情報取得($i→取得したいユーザーのユーザーIDが入ってる変数に変えてね)
    public function detailsUser($user_id)
    {
        $sql = "select * from users where user_id=?";
        $userdetail = $this->query($sql, [$user_id]);
        return $userdetail->fetch();
    }

    #フレンドのユーザーID取得
    public function getFriend_id($friend_code){
        $sql = "select * from users where friend_code=?";
        $stmt = $this->query($sql,[$friend_code]);
        return $stmt->fetch();
    }
    #フレンド登録
    public function insertFriend($user_id,$friend_user_id){

        $sql = "insert into friends_list(login_user_id,friend_user_id)values(?,?)";
        $result = $this->exec($sql, [$user_id,$friend_user_id]);

        if ($result) {
             return '';
         } else {
            return 'フレンド登録できませんでした。管理者にお問い合わせください。';
        }
    }

    #フレンドのユーザーIDを取得
    public function getFriends($user_id){
        $sql = "select * from friends_list where login_user_id=?";
        $friend_list = $this->query($sql,[$user_id]);
        return $friend_list->fetchAll();
    }

    
}
