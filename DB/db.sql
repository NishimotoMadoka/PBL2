# データベースpbl2の作成
set names utf8;
drop database if exists pbl2;
create database pbl2 character set utf8 collate utf8_general_ci;

# ユーザー'PBL2'に、パスワード'kobepbl2-f'を設定し、データベースpbl2に対するすべての権限を付与
grant all privileges on pbl2.* to PBL2@localhost identified by 'kobepbl2-f';

# データベースpbl2を使用する
use pbl2;

# テーブルusersの作成
drop table if exists users; # 既にテーブルusersがあれば削除する
CREATE TABLE users(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    mail VARCHAR(50) UNIQUE NOT NULL,
    profile_comment VARCHAR(140),
    friend_code VARCHAR(10),
    icon VARCHAR(70),
    password VARCHAR(80) NOT NULL,
    INDEX users_index(
        user_id,
        name,
        mail,
        profile_comment,
        friend_code,
        icon
    )
);

#テーブルdiary_listの作成
-- drop table if exists diary_list; # 既にテーブルdiary_listがあれば削除する
-- CREATE TABLE diary_list(
--     article_id INT PRIMARY KEY AUTO_INCREMENT,
--     user_id INT NOT NULL,
--     title VARCHAR(50),
--     diary VARCHAR(3500),
--     diary_date DATE NOT NULL,
--     INDEX article_list_index(
--         article_id,
--         title,
--         diary_date
--     ),
--     FOREIGN KEY (user_id) REFERENCES users(user_id)
-- );
#テーブルarticle_listの作成
drop table if exists article_list; # 既にテーブルarticle_listがあれば削除する
CREATE TABLE article_list(
    article_id VARCHAR(20),
    user_id INT NOT NULL,
    start_time VARCHAR(500),
    end_time VARCHAR(500),
    item_name VARCHAR(850),
    title VARCHAR(50),
    diary VARCHAR(3500),
    good int NOT NULL DEFAULT 0,
    post_date DATE NOT NULL,
    time_date DATETIME NOT NULL,
    article_image VARCHAR(70),
    #記事の公開・非公開　0が公開、1が非公開
    article_public BOOLEAN NOT NULL DEFAULT 0,
    INDEX article_list_index(
        article_id,
        title,
        good,
        post_date,
        time_date,
        article_image,
        article_public
    ),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

#テーブルfriends_listの作成
drop table if exists friends_list; # 既にテーブルfriends_listがあれば削除する
CREATE TABLE friends_list(
    login_user_id INT NOT NULL,
    friend_user_id INT NOT NULL,
    INDEX users_index(
        login_user_id,
        friend_user_id
    )
    -- FOREIGN KEY (friend_user_id) REFERENCES users(user_id)
);