CREATE TABLE `order_log` (
  `order_id` char(10) NOT NULL,
  `cust_id` char(20) DEFAULT NULL,
  `plan_enter_date` datetime DEFAULT NULL,
  `plan_leave_date` datetime DEFAULT NULL,
  `enter_date` datetime DEFAULT NULL,
  `leave_date` datetime DEFAULT NULL,
  `order_money` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `aa` (`cust_id`),
  CONSTRAINT `aa` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

