DROP DATABASE IF EXISTS `docnology`;
CREATE DATABASE IF NOT EXISTS `docnology`;

use docnology;

CREATE TABLE `users`(
    `id` int (11) NOT NULL AUTO_INCREMENT,
    `username` varchar(255) NOT NULL,
    `email` varchar (255) NOT NULL,
    `upassword` varchar  (255) NOT NULL,

    PRIMARY KEY (`id`)
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `patients`(
    `pID` int (11) NOT NULL AUTO_INCREMENT,
    `id` int (11) NOT NULL, 
    `fullname` char (255) NOT NULL,
    `sex` char (255) NOT NULL,
    `uaddress` varchar (100) NOT NULL,
    `uweight` int (3) NOT NULL,
    `uheight` float (3) NOT NULL, 
    `DOB` date NOT NULL,
    `phone_number` varchar (10) NOT NULL,
    `bloodtype` char (2) NOT NULL,
    `medical_conditions` LONGTEXT NOT NULL,
    `econtact` varchar (10) NOT NULL,
    `past_history` varchar (255) NOT NULL,

    PRIMARY KEY (`pID`),
    FOREIGN KEY (`id`) REFERENCES `users`(`id`)
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `doctors`(
    `dID` int (11) NOT NULL AUTO_INCREMENT,
    `id` int (11) NOT NULL, 
    `fullname` char (255) NOT NULL,
    `gender` char (1) NOT NULL,
    `aboutme` char (255) NOT NULL,
    `dob` date NOT NULL,
    `phone_number` varchar (10) NOT NULL,
    `contact_email` varchar (50) NOT NULL,
    `image` varchar(255),
    `availability` JSON,
    `years_of_practice` int (2) NOT NULL,
    `specialty` varchar (255) NOT NULL,
    `certification` varbinary(10) NOT NULL,
    `licence_number` varchar (10) NOT NULL,
    `approval_status` char(10) NOT NULL,

    PRIMARY KEY (`dID`),
    FOREIGN KEY (`id`) REFERENCES `users`(`id`)

) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL, 
  `msg` varchar(1000) NOT NULL,

  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `appointment`(
    `pID` int (11) NOT NULL AUTO_INCREMENT,
    `dID` int (11) NOT NULL AUTO_INCREMENT,
    `phone_number` varchar (10) NOT NULL,
    `application_description` char (255) NOT NULL,





)

INSERT INTO `users` (`username`, `email`, `upassword`) VALUES
('admin', 'admin@docnology.com', MD5('password'));
