DROP TABLE IF EXISTS `savingsmoneyreceipts`;
CREATE TABLE IF NOT EXISTS `savingsmoneyreceipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(500) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `CSMId` varchar(500) DEFAULT NULL,
  `mobile_no` varchar(500) DEFAULT NULL,
  `date` varchar(500) DEFAULT NULL,
  `saving_amount` bigint(20) DEFAULT NULL,
  `withdrawal_amount` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;