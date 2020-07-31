CREATE TABLE `users` (
	`user_email` VARCHAR(128) NOT NULL,
	`user_name` VARCHAR(128) NOT NULL,
	`password` TEXT NOT NULL,
	`bio` TEXT,
	`pic` TEXT,
	PRIMARY KEY (`user_email`, `user_name`)
) ENGINE=InnoDB;