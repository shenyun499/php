CREATE TABLE `room_type` (
  `rtype_id` char(10) NOT NULL,
  `rtype_name` char(10) DEFAULT NULL,
  `rarea` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`rtype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

