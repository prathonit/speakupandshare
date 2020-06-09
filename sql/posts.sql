CREATE TABLE `posts` (
	`post_id` BIGINT NOT NULL AUTO_INCREMENT,
	`post_user_email` TEXT NOT NULL,
	`post_text` TEXT NOT NULL,
	`post_time` TEXT NOT NULL,
	`post_upvotes` BIGINT NOT NULL DEFAULT '0',
	`post_c` INT NOT NULL DEFAULT '0',
	PRIMARY KEY (`post_id`)
) ENGINE=InnoDB;