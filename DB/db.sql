
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