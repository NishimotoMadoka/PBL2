CREATE TABLE article_list(
    article_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    title VARCHAR(50),
    diary VARCHAR(3500),
    good int NOT NULL DEFAULT 0,
    date_time DATETIME NOT NULL,
    article_image VARCHAR(70),
    -- 記事の公開・非公開　0が公開、1が非公開
    article_public BOOLEAN NOT NULL DEFAULT 0,
    INDEX article_list_index(
        article_id,
        title,
        good,
        date_time,
        article_image
        article_public
    ),
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);