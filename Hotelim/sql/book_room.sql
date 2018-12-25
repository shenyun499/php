CREATE TABLE `book_room` (
  `order_id` char(10) DEFAULT NULL,
  `room_id` char(10) DEFAULT NULL,
  KEY `order_id` (`order_id`),
  KEY `room_id` (`room_id`),
  CONSTRAINT `book_room_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_log` (`order_id`),
  CONSTRAINT `book_room_ibfk_2` FOREIGN KEY (`room_id`) REFERENCES `room` (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

