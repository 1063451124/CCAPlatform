/*name:root pwd：root port:3306*/ 
CREATE DATABASE `cca` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
CREATE TABLE `coach` (
  `name` varchar(64) NOT NULL DEFAULT 'Name',
  `industries` varchar(128) DEFAULT '',
  `detail` text,
  `img` blob,
  PRIMARY KEY (`name`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `timeslots` (
  `date_timeslot` varchar(64) NOT NULL DEFAULT '199901010930' COMMENT '主键 ',
  `date` varchar(64) DEFAULT '19990101' COMMENT '日期',
  `timeslot` varchar(64) DEFAULT '0930' COMMENT '时间段（以左端点记录 每段45分钟）',
  `coach` varchar(45) DEFAULT NULL COMMENT 'coach 名字',
  `booker` varchar(45) DEFAULT NULL COMMENT '预定学生学号',
  `last_modify_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`date_timeslot`),
  UNIQUE KEY `date_timeslot_UNIQUE` (`date_timeslot`),
  KEY `date` (`date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;