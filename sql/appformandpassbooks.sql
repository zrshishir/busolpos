DROP TABLE IF EXISTS `appformandpassbooks`;
CREATE TABLE IF NOT EXISTS `appformandpassbooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` int(11) DEFAULT NULL,
  `member_name` varchar(500) DEFAULT NULL,
  `member_id` varchar(500) DEFAULT NULL,
  `mobile_no` varchar(500) DEFAULT NULL,
  `date` varchar(500) DEFAULT NULL,
  `app_form` varchar(500) DEFAULT NULL,
  `passbook` int(11) DEFAULT NULL,
  `share_number` int(11) DEFAULT NULL,
  `share_amount` int(11) DEFAULT NULL,
  `saving_amount` int(11) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `unitprice` decimal(10,2) DEFAULT '0.00',
  `created_by` varchar(500) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
 
  PRIMARY KEY (`id`),
  FULLTEXT KEY `idx_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;