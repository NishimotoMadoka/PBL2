# データベースPBL2の作成
set names utf8;
drop database if exists PBL2;
create database PBL2 character set utf8 collate utf8_general_ci;

# ユーザー'PBL2'に、パスワード'kobepbl2-f'を設定し、データベースPBL2に対するすべての権限を付与
grant all privileges on PBL2.* to PBL2@localhost identified by 'kobepbl2-f';

# データベースPBL2を使用する
use PBL2;

# テーブルusersの作成
drop table if exists users; # 既にテーブルusersがあれば削除する
CREATE TABLE users(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    mail VARCHAR(50) UNIQUE NOT NULL,
    profile_comment VARCHAR(100),
    icon VARCHAR(70),
    password VARCHAR(40) NOT NULL,
    INDEX current_users_index(
        user_id,
        name,
        mail,
        profile_comment,
        icon
    )
);
