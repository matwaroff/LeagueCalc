-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for lol
CREATE DATABASE IF NOT EXISTS `lol` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lol`;


-- Dumping structure for table lol.players
CREATE TABLE IF NOT EXISTS `players` (
  `Player_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Player_Name` tinytext NOT NULL,
  `KDA` float DEFAULT NULL,
  `KillParticipation` float DEFAULT NULL,
  `GoldAvg` float DEFAULT NULL,
  `GPM` float DEFAULT NULL,
  `KillShare` float DEFAULT NULL,
  PRIMARY KEY (`Player_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=854 DEFAULT CHARSET=utf16 COMMENT='Table of all players';

-- Dumping data for table lol.players: ~98 rows (approximately)
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` (`Player_ID`, `Player_Name`, `KDA`, `KillParticipation`, `GoldAvg`, `GPM`, `KillShare`) VALUES
	(20, 'Regi', 2.01, 32.2, 7.3, 176, 10.55),
	(25, 'WhiteLotus', 3.14, 73.3, 15.88, 383, 41.1),
	(32, 'brTT', 5.57, 70.87, 5.15, 128.33, 30.73),
	(43, 'esA', 8.08, 73.47, 5.19, 141.67, 31),
	(53, 'Kami', 8.47, 77.23, 5.31, 132.33, 32.4),
	(57, 'Leko', 3.46, 64.5, 0, 0, 15.83),
	(59, 'Loop', 5.33, 75.06, 1.76, 51.4, 7.08),
	(66, 'Mylon', 3.81, 63.73, 4.77, 118.83, 19.48),
	(77, 'Rakin', 1.13, 72.7, 9.5, 319, 27.3),
	(80, 'Revolta', 6.23, 61.23, 1.79, 52.33, 12.52),
	(88, 'SirT', 5.28, 75.35, 3.87, 96.33, 12.53),
	(113, 'Altec', 4.55, 73.68, 14.39, 386.75, 32.2),
	(116, 'Bodydrop', 3.34, 65.4, 8.51, 244, 4.23),
	(117, 'Captain Ziploc', 0, 0, 0, 0, 0),
	(120, 'CloudNguyen', 1.8, 68.55, 10.85, 282.5, 11.7),
	(122, 'DontMashMe', 6.97, 68.58, 14.47, 386.2, 32.24),
	(131, 'Innox', 6.79, 70.88, 14.48, 393, 30.68),
	(140, 'Mysterious', 2.71, 79.2, 12, 321, 29.2),
	(146, 'PorpoisePops', 3.65, 76.25, 11.34, 287.5, 13.65),
	(148, 'Sheep', 2.55, 67.56, 8.35, 214.71, 6.03),
	(149, 'Shiphtur', 4.52, 67.48, 13.62, 355.5, 28.08),
	(150, 'Smoothie', 3.07, 72.45, 8.43, 224.75, 6.28),
	(157, 'WildTurtle', 3.52, 77.17, 14.52, 386, 33.23),
	(163, 'BearJew', 2.3, 36.1, 4.45, 107.5, 0),
	(170, 'Helior', 1.57, 25.55, 6.11, 147, 7.2),
	(171, 'Juliostito', 2.32, 33.35, 5.63, 135.5, 11.65),
	(190, 'MYM AxKhan', 0, 0, 0, 0, 0),
	(202, 'Cris', 4.16, 65.9, 13.2, 345.4, 18.24),
	(221, 'Abou222', 1.73, 79.2, 12, 321, 29.2),
	(222, 'Adrian', 3.93, 71.84, 8.58, 238.6, 5.06),
	(227, 'Aphromoo', 3.63, 75.72, 8.33, 233.4, 8.12),
	(235, 'Azingy', 3.4, 62.9, 10.64, 269.2, 12.44),
	(236, 'Baby', 0.79, 42.3, 8.33, 185, 7.7),
	(240, 'Benny', 4.33, 76.5, 12.25, 319, 17.6),
	(244, 'Bubbadub', 2.03, 61.15, 9.25, 221, 3.5),
	(252, 'Cop', 4.95, 70.5, 15.21, 410.67, 33.53),
	(257, 'Dan Dinh', 0, 0, 0, 0, 0),
	(265, 'Doublelift', 4.52, 75.38, 14.93, 419, 33.36),
	(266, 'Dyrus', 2.85, 60.02, 11.92, 316, 14.58),
	(274, 'Flaresz', 2.65, 55.98, 12.57, 337.6, 17.44),
	(278, 'Gleeb', 3.61, 71.3, 8.7, 227.5, 3.3),
	(280, 'Goldenglue', 3, 64.35, 13.66, 369, 21.1),
	(283, 'Hai', 2.91, 66.48, 11.89, 331.8, 20.16),
	(285, 'Hauntzer', 3.25, 73.62, 12.24, 335.8, 19.74),
	(292, 'IWillDominate', 3.87, 73.72, 12.1, 305.8, 18.3),
	(294, 'Indivisible', 2.56, 65.2, 8.23, 228.67, 6.13),
	(297, 'KEITH', 5.16, 75.43, 15.54, 342.67, 20.37),
	(298, 'KeNNy', 2.22, 61.45, 10.32, 269.5, 9.65),
	(300, 'Kez', 3.66, 67.6, 10.91, 285.5, 13.88),
	(301, 'KiWiKiD', 2.75, 65.68, 7.95, 207.25, 4.63),
	(311, 'LemonNation', 3.12, 73.96, 8.28, 231, 4.9),
	(313, 'Link', 3.3, 73.87, 13.25, 360, 28.97),
	(314, 'Lohpally', 4.9, 62, 8, 241, 6.3),
	(316, 'MabreyBABY', 4.1, 68.45, 13.2, 372.5, 33.15),
	(317, 'mancloud', 2.64, 72.5, 14.67, 347, 30),
	(320, 'Meteos', 4.2, 75.8, 11.48, 311.67, 11.23),
	(327, 'Nien', 4.01, 75.93, 16.04, 402.67, 42.23),
	(336, 'otter', 2.72, 61.75, 12.03, 367.5, 28.1),
	(337, 'PR0LLY', 2.6, 77.75, 14.45, 344.5, 26.7),
	(343, 'Pobelter', 4.19, 70.05, 13.3, 377.17, 27.42),
	(344, 'Prototype White', 0, 0, 0, 0, 0),
	(346, 'ROBERTxLEE', 2.2, 73.35, 15.1, 361, 41),
	(350, 'Rhux', 3.35, 64.65, 11.97, 340, 26.85),
	(352, 'Rule18', 2.65, 75.4, 9.57, 249, 7.6),
	(355, 'Saintvicious', 2.98, 71.63, 11.43, 308.5, 15.55),
	(360, 'ShorterACE', 1.87, 62.35, 10.48, 270.5, 8.35),
	(363, 'Slooshi', 2.98, 67.9, 14.52, 362.67, 28.23),
	(365, 'Sneaky', 4.28, 73.36, 14.07, 392.2, 34.5),
	(371, 'stuntopolis', 1, 81.8, 6, 202, 9.1),
	(373, 'Swain Gretzky', 0, 0, 0, 0, 0),
	(389, 'Westrice', 2.74, 62.5, 13.1, 342, 21.7),
	(395, 'Xpecial', 3.34, 72.88, 8.82, 222.6, 5.64),
	(402, 'ZionSpartan', 3.8, 62.9, 11.6, 325.6, 19.42),
	(410, 'Crumbz', 0.73, 57.9, 8.95, 236, 5.3),
	(412, 'Quas', 4.03, 70.84, 12.62, 318.8, 15.54),
	(829, 'Incarnati0n', 3.48, 69.9, 13.56, 384.33, 30.17),
	(830, 'Balls', 2.76, 66.54, 11.69, 326.4, 18.32),
	(831, 'Xmithie', 4.06, 72.92, 10.74, 301, 12.68),
	(832, 'Santorin', 6.29, 72.83, 10.87, 292.86, 15.94),
	(833, 'Bjergsen', 5.37, 79.72, 15.24, 386.6, 34.46),
	(835, 'Lustboy', 3.73, 75.52, 8.51, 225.33, 5.05),
	(837, 'FeniX', 4.76, 75.26, 15.23, 383.6, 29.02),
	(838, 'Piglet', 5.36, 72.26, 14.98, 380.6, 30.6),
	(839, 'MaRin', 5.23, 61.52, 14.3, 393.4, 20.44),
	(840, 'Bengi', 5.53, 68.46, 11.69, 314, 14.12),
	(841, 'Faker', 6.9, 67.5, 14.95, 414, 33.44),
	(842, 'Bang', 9.04, 69.32, 15.12, 415.8, 28.78),
	(843, 'Wolf_(Lee_Jae-wan)', 5.98, 68.98, 9.03, 246.6, 4.64),
	(844, 'Huni', 3.31, 56.62, 13.19, 371.83, 18.18),
	(845, 'Reignover', 4.27, 66.13, 11.84, 333.67, 18.57),
	(846, 'Febiven', 8.55, 58.06, 13.81, 390.75, 24.64),
	(847, 'Rekkles', 11.38, 70.55, 15.52, 423.25, 31.83),
	(848, 'YellOwStaR', 8.01, 69.07, 8.92, 251.33, 5.65),
	(849, 'Smeb', 3.83, 52.56, 10.51, 281, 19.8),
	(850, 'Hojin', 5.7, 53.68, 8.14, 223.25, 9.83),
	(851, 'Wisdom', 2.77, 73.25, 11.41, 287, 17),
	(852, 'KurO', 5.12, 59.74, 11.29, 301.4, 25.48),
	(853, 'PraY', 4.89, 57.72, 11.31, 302, 19.48);
/*!40000 ALTER TABLE `players` ENABLE KEYS */;


-- Dumping structure for table lol.player_match
CREATE TABLE IF NOT EXISTS `player_match` (
  `matchID` int(11) NOT NULL AUTO_INCREMENT,
  `Player1` int(11) NOT NULL DEFAULT '0',
  `Player2` int(11) NOT NULL DEFAULT '0',
  `score1` double NOT NULL DEFAULT '0',
  `score2` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`matchID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table lol.player_match: ~0 rows (approximately)
/*!40000 ALTER TABLE `player_match` DISABLE KEYS */;
/*!40000 ALTER TABLE `player_match` ENABLE KEYS */;


-- Dumping structure for table lol.teams
CREATE TABLE IF NOT EXISTS `teams` (
  `Team_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TeamName` varchar(50) NOT NULL,
  `TopID` int(11) NOT NULL,
  `JunglerID` int(11) NOT NULL,
  `MidID` int(11) NOT NULL,
  `ADCID` int(11) NOT NULL,
  `SupportID` int(11) NOT NULL,
  `WLRecord` double NOT NULL DEFAULT '0',
  `WinPerAdv10` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`Team_ID`),
  KEY `Index 2` (`MidID`,`JunglerID`,`ADCID`,`SupportID`,`TopID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COMMENT='Table of teams';

-- Dumping data for table lol.teams: ~12 rows (approximately)
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` (`Team_ID`, `TeamName`, `TopID`, `JunglerID`, `MidID`, `ADCID`, `SupportID`, `WLRecord`, `WinPerAdv10`) VALUES
	(1, 'Cloud9', 830, 283, 829, 365, 311, 0, 0),
	(2, 'Counter Logic Gaming', 402, 831, 343, 265, 227, 0, 0),
	(3, 'Enemy', 0, 0, 0, 0, 0, 0, 0),
	(4, 'Gravity', 0, 0, 0, 0, 0, 0, 0),
	(6, 'Team Dignitas', 0, 0, 0, 0, 0, 0, 0),
	(7, 'Team Dragon Knights', 0, 0, 0, 0, 0, 0, 0),
	(8, 'Team Impulse', 0, 0, 0, 0, 0, 0, 0),
	(9, 'Team SoloMid', 266, 832, 833, 157, 835, 0, 0),
	(30, 'Team Liquid', 412, 292, 837, 838, 395, 0, 0),
	(31, 'SK Telecom T1', 839, 840, 841, 842, 843, 0, 0),
	(32, 'Fnatic', 844, 845, 846, 847, 848, 0, 0),
	(33, 'KOO Tigers', 0, 0, 0, 0, 0, 0, 0);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
