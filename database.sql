/*DROP TABLE IF EXISTS `users`;

CREATE TABLE users(
	username varchar(50) PRIMARY KEY,
	password varchar(100) NOT NULL);

LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES ('admin',password('trap3011'));
UNLOCK TABLES;*/

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
	postid int(50) PRIMARY KEY,
	title varchar(200) NOT NULL,
	content varchar(1000) NOT NULL,
	date datetime NOT NULL,
	`owner` varchar(50) NOT NULL,
	FOREIGN KEY(`owner`) REFERENCES `users`(`username`) ON DELETE CASCADE);