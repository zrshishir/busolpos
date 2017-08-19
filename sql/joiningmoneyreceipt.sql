DROP TABLE IF EXISTS `joiningmoneyreceipt`;
CREATE TABLE IF NOT EXISTS `joiningmoneyreceipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `SerialNo` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `CSMId` varchar(500) DEFAULT NULL,
  `Date` varchar(500) DEFAULT NULL,
  `MobileNo` varchar(500) DEFAULT NULL,
  `JoiningFormFee` varchar(500) DEFAULT NULL,
  `PassBookFee` varchar(500) DEFAULT NULL,
  `NoOfShare` varchar(500) DEFAULT NULL,
  `TotalShareAmount` varchar(500) DEFAULT NULL,
  `TotalAmount` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `idx_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;