CREATE TABLE `upvotes` (
	`post_id` BIGINT NOT NULL,
	`user_email` VARCHAR(128) NOT NULL,
	PRIMARY KEY (`post_id`,`user_email`)
) ENGINE=InnoDB;