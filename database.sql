-- For the database configuration, paste the code below to PHPMyAdmin to test the register & login feature

create database gtracker_db;

use gtracker_db;

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_usernme` varchar(100) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_birthdate` int(11) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  `user_contact_num` int(11) NOT NULL,
  `user_address` varchar(1000) NOT NULL,
  `user_city` varchar(100) NOT NULL,
  `user_country` varchar(100) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
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
  `mentor_id` int(11) NOT NULL,
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
  `goal_status` varchar(100) NOT NULL,
  `goal_progress` int(11) NOT NULL,
  `goal_completion_flag` tinyint(1) NOT NULL,
  `mentee_id` int(11) NOT NULL,
  PRIMARY KEY (`goal_id`),
  KEY `mentee_id` (`mentee_id`),
  CONSTRAINT `goal_ibfk_1` FOREIGN KEY (`mentee_id`) REFERENCES `mentee` (`mentee_id`)
);

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `mentor_id` int(11) NOT NULL,
  `mentee_id` int(11) NOT NULL,
  `feedback_message` varchar(1000) NOT NULL,
  `feedback_date` date NOT NULL,
  PRIMARY KEY (`feedback_id`),
  KEY `mentee_id` (`mentee_id`),
  KEY `mentor_id` (`mentor_id`),
  CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`mentor_id`) REFERENCES `mentor` (`mentor_id`),
  CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`mentee_id`) REFERENCES `mentee` (`mentee_id`)
); 

CREATE TABLE `activity` (
  `acitivity_id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_name` varchar(100) NOT NULL,
  `activity_description` varchar(1000) NOT NULL,
  `activity_location` varchar(100) NOT NULL,
  `activity_start_date` date NOT NULL,
  `activity_completion_date` date NOT NULL,
  `activity_completion_flag` tinyint(1) NOT NULL,
  `mentee_id` int(11) NOT NULL,
  `goal_id` int(11) NOT NULL,
  PRIMARY KEY (`acitivity_id`),
  KEY `mentee_id` (`mentee_id`),
  KEY `activity_completion_date` (`activity_completion_date`),
  KEY `goal_id` (`goal_id`),
  FOREIGN KEY (`goal_id`) REFERENCES `goal` (`goal_id`),
  FOREIGN KEY (`mentee_id`) REFERENCES `mentee` (`mentee_id`)
);

CREATE TABLE `alert` (
  `alert_id` int(11) NOT NULL AUTO_INCREMENT,
  `alert_date_time` datetime NOT NULL,
  `activity_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`alert_id`),
  KEY `user_id` (`user_id`),
  KEY `activity_id` (`activity_id`),
  CONSTRAINT `alert_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `alert_ibfk_2` FOREIGN KEY (`activity_id`) REFERENCES `activity` (`acitivity_id`)
); 


CREATE TABLE `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `message_date_time` datetime NOT NULL,
  `message_title` varchar(100) NOT NULL,
  `message_description` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`message_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
);

CREATE TABLE `password_reset_temp` (
  `email` varchar(250) NOT NULL,
  `key` varchar(250) NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- After this, go to include/config.php