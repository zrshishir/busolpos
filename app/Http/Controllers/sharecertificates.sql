DROP TABLE if EXISTS `sharecertificates`;
CREATE TABLE if NOT EXISTS `sharecertificates`(
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` INT (11) not null,
  `member_name` VARCHAR (500) DEFAULT NULL ,
  `share_number` int(11) DEFAULT null,
  `share_amount` int(11) DEFAULT NULL ,

  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;