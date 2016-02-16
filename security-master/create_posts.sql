CREATE TABLE posts (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL default '',
    title VARCHAR(255) NOT NULL default '',
    content TEXT,
    pass VARCHAR(255) NOT NULL default '',
    postdate DATETIME NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB
