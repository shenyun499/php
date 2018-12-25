CREATE TABLE `customer` (
  `cust_id` char(20) NOT NULL,
  `ptype_id` char(10) DEFAULT NULL,
  `cust_name` char(10) DEFAULT NULL,
  `sex` char(1) DEFAULT NULL,
  `phone` char(11) DEFAULT NULL,
  PRIMARY KEY (`cust_id`),
  KEY `ptype_id` (`ptype_id`),
  CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`ptype_id`) REFERENCES `paper_type` (`ptype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

