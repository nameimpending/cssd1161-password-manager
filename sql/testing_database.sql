CREATE TABLE users (
	id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    pwd VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    PRIMARY KEY (id)
);

CREATE TABLE comments (
	id INT(11) NOT NULL AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    comment_text TEXT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIME,
    users_id INT(11),
    PRIMARY KEY (id),
    FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE SET NULL
);



INSERT INTO users(username, pwd, email) VALUES ('MyUsername', 'MyPassword', 'MyEmail@gmail.com');
UPDATE users SET username = 'MyChangedUser', pwd = 'MyChangedPwd' WHERE id = 2