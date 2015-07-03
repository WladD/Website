CREATE TABLE `aticles` (
	`category` VARCHAR(10) NOT NULL,
	`title` VARCHAR(50) NOT NULL,
	`texr` TEXT NOT NULL,
	`picture` TEXT NOT NULL
)
COLLATE='utf8_general_ci'
ENGINE=InnoDB
;
DELIMITER $$
CREATE PROCEDURE prepare_data()
BEGIN
  DECLARE i INT DEFAULT 1;
  WHILE i < 3 DO
    INSERT INTO aticles (category, title, texr, picture) VALUES ("Onas", "Lorem ipsum", "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat", "Lorem-Ipsum.jpg");
    SET i = i + 1;
  END WHILE;
  SET i=1;
  WHILE i < 15 DO
    INSERT INTO aticles (category, title, texr, picture) VALUES ("Newsy", "Lorem ipsum", "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat", "Lorem-Ipsum.jpg");
    SET i = i + 1;
  END WHILE;
  SET i=1;
  WHILE i < 10 DO
    INSERT INTO aticles (category, title, texr, picture) VALUES ("Galeria", "Lorem ipsum", "Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat", "Lorem-Ipsum.jpg");
    SET i = i + 1;
  END WHILE;
END$$
DELIMITER ;

CALL prepare_data();