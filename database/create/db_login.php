CREATE TABLE IF NOT EXISTS $table (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `username` VARCHAR(20) NOT NULL,
    `password` VARCHAR(64) NOT NULL,
    `password_salt` VARCHAR(20) NOT NULL,
    `email` tinytext NOT NULL,
    PRIMARY KEY(`id`)
)ENGINE=MyISAM AUTO_INCREMENT=1"