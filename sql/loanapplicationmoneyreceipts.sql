DROP TABLE IF EXISTS `loanapplicationmoneyreceipts`;
CREATE TABLE IF NOT EXISTS `loanapplicationmoneyreceipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(100) DEFAULT NULL,
  `member_name` varchar(100) DEFAULT NULL,
  `member_id` varchar(100) DEFAULT NULL,
  `mobile_no` varchar(100) DEFAULT NULL,
  `form_fee` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;