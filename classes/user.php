<?php
require_once __DIR__ . '/dbdata.php';

class User extends DbData
{
    #ログイン認証処理
    public function authUser($mail, $password)
    {
        $sql = "select * from users where mail=? and password=?";
        $stmt = $this->query($sql, [$mail, $password]);
        return $stmt->fetch();
    }

    #新規登録処理
    public function signup($name, $mail, $profile_comment,$icon_name, $password)
    {
        $sql = "select * from users where mail=?";
        $stmt = $this->query($sql, [$mail]);
        $result = $stmt->fetchAll();

        if ($result) {
            return 'この' . $mail . 'は既に登録されています。';
        }
        $sql = "insert into users(name,mail,profile_comment,icon,password)values(?,?,?,?,?)";
        $result = $this->exec($sql, [$name, $mail, $profile_comment,$icon_name, $password]);

        if ($result) {
            return '';
        } else {
            return '新規登録できませんでした。管理者にお問い合わせください。';
        }
    }

    #ユーザー情報更新処理($a→新しいパスワードの変数名に変更してね)
    public function updateUser($a,$mail)
    {
        $sql = "update users set password=? where mail=?";
        $result = $this->exec($sql, [ $a,$mail]);
        if($result){
            return'';
        }else{
            return'更新できませんでした。管理者にお問い合わせください。';
        }
    }
    public function Icon_update($icon,$mail)
    {
        $sql = "update users set icon=? where mail=?";
        $result = $this->exec($sql, [ $icon,$mail]);
        if($result){
            return'';
        }else{
            return'更新できませんでした。管理者にお問い合わせください。';
        }
    }

    #パスワード認証(ユーザー情報変更のページで使えるかな？？)
    public function authPassword($password,$userid)
    {
        $sql = "select password from users where password=? and user_id=?";
        $stmt = $this->query($sql, [$password,$userid]);
        $result=$stmt->fetch();

        if($result){
            return '';
        }else{
            return 'パスワードが違います。';
        }
    }

    #他ユーザーの情報取得($i→取得したいユーザーのユーザーIDが入ってる変数に変えてね)
    public function detailsUser($i)
    {
        $sql = "select * from users where user_id=?";
        $userdetail = $this->query($sql, [$i]);
        return $userdetail->fetch();
    }
}
