/*name:root pwd：root port:3306*/ 
CREATE DATABASE `cca` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
use `cca`;
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
  `book_date` varchar(64) DEFAULT '19990101' COMMENT '日期',
  `timeslot` varchar(64) DEFAULT '0930' COMMENT '时间段（以左端点记录 每段45分钟）',
  `coach` varchar(45) DEFAULT NULL COMMENT 'coach 名字',
  `booker` varchar(45) DEFAULT NULL COMMENT '预定学生学号',
  `last_modify_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`date_timeslot`),
  UNIQUE KEY `date_timeslot_UNIQUE` (`date_timeslot`),
  KEY `book_date` (`book_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
CREATE TABLE `profile` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(64) DEFAULT NULL,
  `last_name` varchar(64) DEFAULT NULL,
  `hk_mobile_no` varchar(64) DEFAULT NULL,
  `cityu_email` varchar(64) DEFAULT NULL,
  `cv` blob,
  `work_location` varchar(64) DEFAULT NULL,
  `last_modify_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`student_id`),
  UNIQUE KEY `student_id_UNIQUE` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='student profile';
/* index左侧日历数据 SQL eg：select book_date,10 - sum(booker) as available from 
(SELECT book_date, case booker when booker then "1" else "0" end as booker FROM cca.timeslots) each_day  
group by book_date;*/
/* index右侧timeslot sql eg: SELECT coach, json_arrayagg(JSON_OBJECT('timeslot',timeslot,'booked',case booker when booker then "1" else "0" end)) as coach_arrange 
FROM cca.timeslots where date = "20230301" group by coach;
timeslots 部分数据 */
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303010930', '20230301', '0930', 'Leslie Yeung');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303011015', '20230301', '1015', 'Leslie Yeung');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303011100', '20230301', '1100', 'Leslie Yeung');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303011145', '20230301', '1145', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303011230', '20230301', '1230', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303011400', '20230301', '1400', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303011445', '20230301', '1445', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303011530', '20230301', '1530', 'Dr. Flora Leigh');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303011615', '20230301', '1615', 'Dr. Flora Leigh');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303011700', '20230301', '1700', 'Dr. Flora Leigh');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303060930', '20230306', '0930', 'Winnie Lee');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303061015', '20230306', '1015', 'Winnie Lee');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303061100', '20230306', '1100', 'Winnie Lee');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303061145', '20230306', '1145', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303061230', '20230306', '1230', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303061400', '20230306', '1400', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303061445', '20230306', '1445', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303061530', '20230306', '1530', 'Dr. Flora Leigh');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303061615', '20230306', '1615', 'Dr. Flora Leigh');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303061700', '20230306', '1700', 'Dr. Flora Leigh');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303100930', '20230310', '0930', 'Dr. Flora Leigh');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303101015', '20230310', '1015', 'Dr. Flora Leigh');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303101100', '20230310', '1100', 'Dr. Flora Leigh');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303101145', '20230310', '1145', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303101230', '20230310', '1230', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303101400', '20230310', '1400', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303101445', '20230310', '1445', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303101530', '20230310', '1530', 'Vanessa Lin');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303101615', '20230310', '1615', 'Vanessa Lin');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303101700', '20230310', '1700', 'Vanessa Lin');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303140930', '20230314', '0930', 'Amy Leung');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303141015', '20230314', '1015', 'Amy Leung');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303141100', '20230314', '1100', 'Amy Leung');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303141145', '20230314', '1145', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303141230', '20230314', '1230', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303141400', '20230314', '1400', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303141445', '20230314', '1445', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303141530', '20230314', '1530', 'Jenny Ho');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303141615', '20230314', '1615', 'Jenny Ho');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303141700', '20230314', '1700', 'Jenny Ho');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303210930', '20230321', '0930', 'Amy Leung');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303211015', '20230321', '1015', 'Amy Leung');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303211100', '20230321', '1100', 'Amy Leung');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303211145', '20230321', '1145', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303211230', '20230321', '1230', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303211400', '20230321', '1400', 'Steve Man');
INSERT INTO `cca`.`timeslots` (`date_timeslot`, `book_date`, `timeslot`, `coach`) VALUES ('202303211445', '20230321', '1445', 'Steve Man');
