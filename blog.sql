DROP DATABASE IF EXISTS `blog`;
CREATE DATABASE `blog` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
DROP USER 'blog_user'@'localhost';
CREATE USER 'kadiy'@'localhost' IDENTIFIED BY 'kadiy';
GRANT ALL PRIVILEGES ON `ktoure_blog`.* TO 'kadiy'@'localhost';
USE `blog`;
CREATE TABLE `billets` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR (255),
    `author` VARCHAR (255),
    `content` TEXT,
    `date_creation` DATETIME
);
CREATE TABLE `comments` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `id_billet` INT,
    `author` VARCHAR (255),
    `comment` TEXT,
    `date_comment` DATETIME
);