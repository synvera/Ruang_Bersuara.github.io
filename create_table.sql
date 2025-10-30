-- SQL to create the database and table for Ruang_Bersuara
-- Import this in phpMyAdmin or run via mysql client

CREATE DATABASE IF NOT EXISTS `ruang_bersuara` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `ruang_bersuara`;

CREATE TABLE IF NOT EXISTS `submissions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `story` TEXT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- table untuk menyimpan nama pengguna dari Tahap1
CREATE TABLE IF NOT EXISTS `users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
