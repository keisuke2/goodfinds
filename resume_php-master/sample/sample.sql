# データベース作成
CREATE DATABASE IF NOT EXISTS `twitter` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

# tweetsテーブル作成
CREATE TABLE IF NOT EXISTS `twitter`.`tweets` (
    `id` INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(255) NOT NULL,
    `content` VARCHAR(255) NOT NULL,
    `created` DATETIME NULL DEFAULT NULL
) ENGINE = INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

# データベース指定
USE twitter;

# データ挿入
INSERT INTO tweets(username, content, created) VALUES ('hasebe', 'Goodfindのセミナーなう',  NOW());
