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
    password VARCHAR(40) NOT NULL,
    INDEX users_index(
        user_id,
        name,
        mail,
        profile_comment,
        friend_code,
        icon
    )
);

# テーブルusersへデータを入力

INSERT INTO `users`(`user_id`, `name`, `mail`, `profile_comment`, `friend_code`, `icon`, `password`)
 VALUES ('1','まどちゃん','madokan@iclound.com','よろしくおねがいします','6tJQOTsvY','madokapush2.gif','madoka1125');

INSERT INTO `users`(`user_id`, `name`, `mail`, `profile_comment`, `friend_code`, `icon`, `password`)
 VALUES ('2','かなみ','kanakana@st.kobedenshi.ac.jp','よろしくおねがいします','7HKmZUp6i','kanakanapaper20230605.jpg','kanami');

INSERT INTO `users`(`user_id`, `name`, `mail`, `profile_comment`, `friend_code`, `icon`, `password`)
 VALUES ('3','たくちゃん','takuchandayo@icloud.com','たくちゃんだヨ','RdzLvkrHD','takuchandayo27893617_1828729520479480_203621153796...','takuchan');


#テーブルdiary_listの作成
drop table if exists diary_list; # 既にテーブルdiary_listがあれば削除する
CREATE TABLE diary_list(
    article_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    title VARCHAR(50),
    diary VARCHAR(3500),
    diary_date DATE NOT NULL,
    INDEX article_list_index(
        article_id,
        title,
        diary_date
    ),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

 # テーブルdiary_listへデータを入力
INSERT INTO `diary_list`(`article_id`, `user_id`, `title`, `diary`, `diary_date`) 
 VALUES ('1','1','岡先生について','岡先生はなんでBばっか見るんですか。','2023-06-01');

INSERT INTO `diary_list`(`article_id`, `user_id`, `title`, `diary`, `diary_date`) 
 VALUES ('2','3','式先生のスマートウォッチ','今日式先生にスマートウォッチを見してもらいました。
フォッシルというやつでした。かっこよかったです...','2023-06-03');

#テーブルarticle_listの作成
drop table if exists article_list; # 既にテーブルarticle_listがあれば削除する
CREATE TABLE article_list(
    article_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    start_time VARCHAR(500),
    end_time VARCHAR(500),
    item_name VARCHAR(850),
    good int NOT NULL DEFAULT 0,
    post_date DATE NOT NULL,
    article_image VARCHAR(70),
    #記事の公開・非公開　0が公開、1が非公開
    article_public BOOLEAN NOT NULL DEFAULT 0,
    INDEX article_list_index(
        article_id,
        good,
        post_date,
        article_image,
        article_public
    ),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

 # テーブルarticles_listへデータを入力
INSERT INTO `article_list`(`article_id`, `user_id`, `start_time`, `end_time`, `item_name`,
`good`, `post_date`, `article_image`, `article_public`)
 VALUES ('1','1','00:00,08:00,08:15,,,,,,,,','08:00,08:15,08:40,,,,,,,,',
 '睡眠,ごはん,準備,,,,,,,,','0','2023-06-01','madokan210615-480x280.jpg','0');


INSERT INTO `article_list`(`article_id`, `user_id`, `start_time`, `end_time`, `item_name`,
`good`, `post_date`, `article_image`, `article_public`)
 VALUES ('2','3','01:00,09:00,10:00,,,,,,,,','09:00,10:00,11:30,,,,,,,,',
 '睡眠,朝ごはん,筋トレ,,,,,,,,','0','2023-06-03','madokan210615-480x280.jpg','0');


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

 # テーブルfriend_listへデータを入力
INSERT INTO `friends_list`(`login_user_id`, `friend_user_id`) VALUES ('2','1');

INSERT INTO `friends_list`(`login_user_id`, `friend_user_id`) VALUES ('2','3');

INSERT INTO `friends_list`(`login_user_id`, `friend_user_id`) VALUES ('3','2');


