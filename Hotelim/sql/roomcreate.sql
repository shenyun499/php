CREATE TABLE `room` (
  `room_id` char(10) NOT NULL,
  `rtype_id` char(10) DEFAULT NULL,
  `rprice` int(11) DEFAULT NULL,
  `rdeposit` int(11) DEFAULT NULL,
  `rstate` char(10) DEFAULT NULL,
  PRIMARY KEY (`room_id`),
  KEY `rtype_id` (`rtype_id`),
  CONSTRAINT `room_ibfk_1` FOREIGN KEY (`rtype_id`) REFERENCES `room_type` (`rtype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

