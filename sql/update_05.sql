CREATE TABLE `top_pages` (
	`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	`controller` VARCHAR(50) NOT NULL DEFAULT 'top_default' COLLATE 'utf8_general_ci',
	`title` VARCHAR(50) NOT NULL DEFAULT 'top_default' COLLATE 'utf8_general_ci',
	`content` VARCHAR(1000) NOT NULL DEFAULT 'top_default',
	PRIMARY KEY (`id`),
	UNIQUE INDEX `controller` (`controller`)
)
COLLATE='utf32_general_ci'
ENGINE=InnoDB;
SELECT `DEFAULT_COLLATION_NAME` FROM `information_schema`.`SCHEMATA` WHERE `SCHEMA_NAME`='top100';
SHOW TABLE STATUS FROM `top100`;
SHOW FUNCTION STATUS WHERE `Db`='top100';
SHOW PROCEDURE STATUS WHERE `Db`='top100';
SHOW TRIGGERS FROM `top100`;
SHOW EVENTS FROM `top100`;
SHOW CREATE TABLE `top100`.`top_pages`;