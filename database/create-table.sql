create database gtracker_db;

use gtracker_db;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NULL,
  `user_password` varchar(100) NULL,
  `user_username` varchar(100) NULL,
  `user_fname` varchar(100) NULL,
  `user_lname` varchar(100) NULL,
  `user_birthdate` int(11) NULL,
  `user_gender` varchar(100) NULL,
  `user_contact_num` varchar(100) NULL,
  `user_address` varchar(1000) NULL,
  `user_city` varchar(100) NULL,
  `user_country` varchar(100) NULL,
  `user_photo` longblob NULL,
  `user_type` varchar(100) NULL,
  PRIMARY KEY (`user_id`)
);

CREATE TABLE `mentor` (
  `mentor_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`mentor_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `mentor_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
);

CREATE TABLE `mentee` (
  `mentee_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `mentor_id` int(11) NULL,
  PRIMARY KEY (`mentee_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `mentor_id` (`mentor_id`),
  CONSTRAINT `mentee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `mentee_ibfk_2` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`mentor_id`)
); 

CREATE TABLE `goal` (
  `goal_id` int(11) NOT NULL AUTO_INCREMENT,
  `goal_title` varchar(100) NOT NULL,
  `goal_description` varchar(1000) NOT NULL,
  `goal_specific` varchar(1000) NOT NULL,
  `goal_measurable` varchar(1000) NOT NULL,
  `goal_achievable` varchar(1000) NOT NULL,
  `goal_realistic` varchar(1000) NOT NULL,
  `goal_start_date` date NOT NULL,
  `goal_completion_date` date NOT NULL,
  `goal_progress` int(11) DEFAULT 0,
  `goal_completion_flag` tinyint(1) DEFAULT 0,
  `mentee_id` int(11) NOT NULL,
  PRIMARY KEY (`goal_id`),
  KEY `mentee_id` (`mentee_id`),
  CONSTRAINT `goal_ibfk_1` FOREIGN KEY (`mentee_id`) REFERENCES `mentee` (`mentee_id`)
);

CREATE TABLE `activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_name` varchar(100) NOT NULL,
  `activity_description` varchar(1000) NOT NULL,
  `activity_location` varchar(100) NOT NULL,
  `activity_time` time NOT NULL,
  `activity_completion_date` date NOT NULL,
  `activity_completion_flag` tinyint(1) DEFAULT 0,
  `mentee_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `mentee_id` (`mentee_id`),
  KEY `activity_completion_date` (`activity_completion_date`),
  KEY `goal_id` (`goal_id`),
  CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`goal_id`) REFERENCES `goal` (`goal_id`),
  CONSTRAINT `activity_ibfk_2` FOREIGN KEY (`mentee_id`) REFERENCES `mentee` (`mentee_id`)
); 

CREATE TABLE `alert` (
  `alert_id` int(11) NOT NULL AUTO_INCREMENT,
  `alert_date` date NOT NULL,
  `alert_time` time NOT NULL,
  `alert_notes` text NOT NULL,
  `activity_id` int(11) NOT NULL,
  `mentee_id` int(11) NOT NULL,
  PRIMARY KEY (`alert_id`),
  KEY `mentee_id` (`mentee_id`),
  KEY `activity_id` (`activity_id`),
  CONSTRAINT `alert_ibfk_1` FOREIGN KEY (`mentee_id`) REFERENCES `mentee` (`mentee_id`),
  CONSTRAINT `alert_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`activity_id`)
);

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_id` int(11) NOT NULL,
  `mentee_id` int(11) NOT NULL,
  `feedback_message` varchar(1000) NOT NULL,
  `feedback_date` date NOT NULL,
  `goal_id` int(11) NOT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `mentee_id` (`mentee_id`),
  KEY `mentor_id` (`mentor_id`),
  KEY `goal_id` (`goal_id`),
  CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`mentor_id`),
  CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`mentee_id`) REFERENCES `mentee` (`mentee_id`),
  CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`goal_id`) REFERENCES `goal` (`goal_id`)
); 

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL,
  `user_type` varchar(100) NOT NULL,
  PRIMARY KEY (`key`),
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

