CREATE TABLE `users` (
	`user_email` VARCHAR(128) NOT NULL,
	`user_name` TEXT NOT NULL,
	`password` TEXT NOT NULL,
	`bio` TEXT,
	`pic` TEXT
	PRIMARY KEY (`user_email`)
) ENGINE=InnoDB;