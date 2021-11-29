
-- Uncomment to reset database!
-- DROP DATABASE `database`;


CREATE DATABASE `database`;
USE `database`;

SET time_zone = "+07:00";   -- VN time


-- Tables without Foreign Keys

CREATE TABLE `Contact` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` varchar(40),
    `email` varchar(50),
    `message` varchar(1000),
   PRIMARY KEY(`id`)
);

CREATE TABLE `about` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `address` varchar(200) DEFAULT NULL,
    `email` varchar(200) DEFAULT NULL,
    `phone` varchar(200) DEFAULT NULL,
    `description` varchar(200) DEFAULT NULL,
    `value` varchar(200) DEFAULT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE `User` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `is_admin` int(1) NOT NULL DEFAULT 0,
    `name` varchar(30) NOT NULL,
    `password` varchar(32) NOT NULL,
    `email` varchar(255) NOT NULL,
    `phone` varchar(15) DEFAULT NULL,
    `birthday` date DEFAULT NULL,
    `img_path` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
);


CREATE TABLE `Car` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL UNIQUE, 
    `brand` varchar(20) NOT NULL, 
    `year` year NOT NULL, 
    `seats` int(2) NOT NULL, 
    `color` varchar(10) NOT NULL, 
    `transmission` varchar(6) NOT NULL, -- `manual`/`auto`
    `engine` float(1) NOT NULL, 	    -- 1.5, 2.0,... L
    `price` int(11) NOT NULL,
    `warranty` int(2),                  -- years
    `description` varchar(2048),
    `car_img1` varchar(255),
    `car_img2` varchar(255),
    `car_img3` varchar(255),
    PRIMARY KEY (`id`)
);


-- News

CREATE TABLE `tblcategory` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `CategoryName` varchar(200) DEFAULT NULL,
    `Description` mediumtext DEFAULT NULL,
    `PostingDate` timestamp NULL DEFAULT current_timestamp(),
    `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
    `Is_Active` int(1) DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `tblsubcategory` (
    `SubCategoryId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `CategoryId` int(11) DEFAULT NULL,
    `Subcategory` varchar(255) DEFAULT NULL,
    `SubCatDescription` mediumtext DEFAULT NULL,
    `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
    `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
    `Is_Active` int(1) DEFAULT NULL,
    PRIMARY KEY (`SubCategoryId`)
);

CREATE TABLE `tblposts` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `PostTitle` longtext DEFAULT NULL,
    `CategoryId` int(11) DEFAULT NULL,
    `SubCategoryId` int(11) DEFAULT NULL,
    `PostDetails` longtext CHARACTER SET utf8 DEFAULT NULL,
    `PostingDate` timestamp NULL DEFAULT current_timestamp(),
    `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
    `Is_Active` int(1) DEFAULT NULL,
    `PostUrl` mediumtext DEFAULT NULL,
    `PostImage` varchar(255) DEFAULT NULL,
    `viewCounter` int(11) DEFAULT NULL,
    `postedBy` varchar(255) DEFAULT NULL,
    `lastUpdatedBy` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE `tblcomments` (
    `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `postId` int(11) DEFAULT NULL,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `comment` mediumtext DEFAULT NULL,
    `postingDate` timestamp NULL DEFAULT current_timestamp(),
    `img_path` varchar(255) NOT NULL,
    `status` int(11) NOT NULL,
    PRIMARY KEY (`id`)
);



-- Tables with Foreign Keys

CREATE TABLE `Order` (
    `user_id` int(11) UNSIGNED NOT NULL,
    `car_id` int(11) UNSIGNED NOT NULL,
    `quantity` int(11) UNSIGNED NOT NULL,
    FOREIGN KEY (`user_id`) REFERENCES `User`(`id`),
    FOREIGN KEY (`car_id`) REFERENCES `Car`(`id`),
    PRIMARY KEY (`user_id`, `car_id`)
);

CREATE TABLE `CarReview` (
    `review_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id` int(11) UNSIGNED NOT NULL,
    `car_id` int(11) UNSIGNED NOT NULL,
    `review` varchar(256) NOT NULL,
    `rating` int(2) UNSIGNED,
    `date_posted` datetime,
    FOREIGN KEY (`user_id`) REFERENCES `User`(`id`),
    FOREIGN KEY (`car_id`) REFERENCES `Car`(`id`),
    PRIMARY KEY (`review_id`)
);