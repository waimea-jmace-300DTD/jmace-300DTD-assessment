-- Adminer 4.8.4 MySQL 8.0.39-0ubuntu0.22.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `date` datetime NOT NULL,
  `id` bigint NOT NULL AUTO_INCREMENT,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vet_id` int DEFAULT NULL,
  `pref_vet` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Any',
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `done` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vet_id` (`vet_id`),
  CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`vet_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `bookings` (`date`, `id`, `address`, `name`, `vet_id`, `pref_vet`, `description`, `done`) VALUES
('2024-08-04 10:49:00',	2,	'42 Carlyon road',	'jayden',	4,	'luke scammal',	'big cut on my cat and he\'s stuck up a tree',	1),
('2024-08-02 12:49:00',	3,	'65',	'jayden',	5,	'john mace',	'dog dying on the ground come quick',	1),
('2024-08-18 15:06:00',	4,	'23447yethrs',	'Tom ',	4,	'tom Bing',	'Hes bad with cats ',	1),
('2024-08-09 10:40:00',	5,	'123bing st',	'bing',	2,	'john mace',	'bing chilling ',	NULL),
('2024-08-17 12:30:00',	6,	'26 wesly read',	'sam',	5,	'tom Bing',	'my dog has strange lump',	NULL),
('2024-08-31 15:00:00',	7,	'sheppard',	'kate',	4,	'tom Bing',	'my sheep are dying by the hour',	NULL),
('2024-08-16 16:00:00',	8,	'34 34lan',	'Tom ',	5,	'linda minda',	'cats on the run',	NULL);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `forename` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `surname` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `specialities` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `manager` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `users` (`id`, `username`, `hash`, `forename`, `surname`, `description`, `specialities`, `manager`) VALUES
(1,	'jmace',	'$2y$10$43uWYwKZSN5oAfta/Sj6Pubj93EKbokx6kNpPKvsOsDGxUr1uqrmO',	'Jayden',	'Mace',	'Centre Manager',	NULL,	1),
(2,	'jcmace',	'$2y$10$s9BzZ.3TGBpFPI5BxprRGeLiyERYru2kPaxSObnC8f37ewUB2fVFW',	'john',	'mace',	'Vet',	'Large farm animals',	0),
(4,	'TMTL',	'$2y$10$z9myHdXWuE3jF4Wg0/eMeeSGy1ZLJ1FMcnhdnG2xwSv3shr6oFsCG',	'tom',	'Bing',	'Vet',	'he can talk to sheep (hes on shrooms)',	0),
(5,	'lminda',	'$2y$10$4hg8i9U7Y59x7EPLPaeSo.Kfsb8HvV3wFv.t/x8fcd5mjfww4gzEe',	'linda',	'minda',	'Vet ',	'shes good with small animals',	0),
(6,	'bford',	'$2y$10$GH/KaPOuRd6DBsSFxr9Jne.EalqJc8aMwRQGJw0orvCncHf8V5X6i',	'bailey',	'ford',	'vet trainee ',	NULL,	0),
(7,	'camman',	'$2y$10$2mdI72Lo3TEmrK.nugxqAeBIHki2Np7qyJYU80oL2Txdr5YcoPUoa',	'computer',	'man',	'teck guy',	NULL,	0),
(9,	'admin',	'$2y$10$fMqB/KKe/RyZB25LChGGB.td1r/xSt6eUYBRt7YOiyXHsJHWp/PIG',	'admin',	'admin',	'admin',	NULL,	1),
(10,	'test',	'$2y$10$t.H6C1igAaXWB3cejngFXu8HVPfBP1f.wCwCO.jficAcf8hF3uHA6',	'test',	'test',	'test',	'test',	0);

-- 2024-09-02 23:28:41
