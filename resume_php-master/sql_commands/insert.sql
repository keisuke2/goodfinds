INSERT INTO tweets (username, content, created)
VALUES ('saji', 'Goodfindのセミナーなう',  NOW());

INSERT INTO tweets (username, content, created)
VALUES ('kotaki', '遊んでるなう', NOW());

INSERT INTO follows (followed_name, follower_name, created)
VALUES ('kotaki', 'saji',  NOW());

INSERT INTO users (username, password, created)
VALUES ('saji', 'saji', NOW());

INSERT INTO users (username, password, created)
VALUES ('kotaki', 'kotaki', NOW());
