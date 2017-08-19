DROP TABLE IF EXISTS `accountopens`;
CREATE TABLE IF NOT EXISTS `accountopens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `VoutcherId` int(11) DEFAULT NULL,
  `MemberId` varchar(500) NOT NULL,
  `DomainName` varchar(500) DEFAULT NULL,
  `ZoneId` varchar(500) DEFAULT NULL,
  `AreaId` varchar(500) DEFAULT NULL,
  `BranchId` varchar(500) DEFAULT NULL,
  `AccountType` varchar(500) DEFAULT NULL,
  `AccountNo` varchar(500) DEFAULT NULL,
  `duration` varchar(500) DEFAULT NULL,
  `MonthlyInstallment` varchar(500) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;