#userテーブル
CREATE TABLE users(
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20) NOT NULL,
    mail VARCHAR(50) UNIQUE NOT NULL,
    profile_comment VARCHAR(140),
    friend_code VARCHAR(10),
    icon VARCHAR(70),
    password VARCHAR(40) NOT NULL,
    INDEX current_users_index(
        user_id,
        name,
        mail,
        profile_comment,
        friend_code,
        icon
    )
);