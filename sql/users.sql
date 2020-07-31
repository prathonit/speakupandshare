CREATE TABLE `users` (
	`user_email` VARCHAR(128) NOT NULL UNIQUE,
	`user_name` VARCHAR(128) NOT NULL UNIQUE,
	`password` TEXT NOT NULL,
	`bio` TEXT,
	`pic` TEXT,
	PRIMARY KEY (`user_email`)
) ENGINE=InnoDB;