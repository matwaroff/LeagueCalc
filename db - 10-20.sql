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
  PRIMARY KEY (`Player_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=829 DEFAULT CHARSET=utf16 COMMENT='Table of all players';

-- Dumping data for table lol.players: ~75 rows (approximately)
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
INSERT INTO `players` (`Player_ID`, `Player_Name`, `KDA`, `KillParticipation`, `GoldAvg`, `GPM`) VALUES
	(20, 'Regi', 2.91, 70.35, 7.3, 176),
	(25, 'WhiteLotus', 5.07, 72.25, 7.94, 191.5),
	(32, 'brTT', 5.64, 71.48, 5.15, 128.33),
	(43, 'esA', 9, 77.75, 0, 0),
	(53, 'Kami', 6.91, 78.8, 0, 0),
	(57, 'Leko', 3.46, 64.5, 0, 0),
	(59, 'Loop', 5.12, 74.95, 0, 0),
	(66, 'Mylon', 3.74, 63, 4.77, 118.83),
	(77, 'Rakin', 1.13, 72.7, 9.5, 319),
	(80, 'Revolta', 5.64, 73.425, 0, 0),
	(88, 'SirT', 5.26, 75.2167, 3.87, 96.33),
	(113, 'Altec', 5.37, 70, 14.57, 399.6),
	(116, 'Bodydrop', 1.73, 67.7, 7.92, 210),
	(117, 'Captain Ziploc', 0, 0, 0, 0),
	(120, 'CloudNguyen', 1.8, 68.55, 10.85, 282.5),
	(122, 'DontMashMe', 6.55, 60.8333, 13.19, 396),
	(131, 'Innox', 3.65, 67.4, 13.52, 378.5),
	(140, 'Mysterious', 2.71, 79.2, 12, 321),
	(146, 'PorpoisePops', 4.32, 76.6, 11.7, 286.67),
	(148, 'Sheep', 5.66, 70.7333, 7.86, 235.67),
	(149, 'Shiphtur', 3.41, 68.5, 13.54, 355.33),
	(150, 'Smoothie', 2.31, 71.8, 8.72, 210),
	(157, 'WildTurtle', 3.52, 63.35, 14.53, 386.33),
	(163, 'BearJew', 4.32, 77.65, 4.45, 107.5),
	(170, 'Helior', 2.77, 56.05, 6.11, 147),
	(171, 'Juliostito', 3.46, 73.2, 5.63, 135.5),
	(190, 'MYM AxKhan', 0, 0, 0, 0),
	(202, 'Cris', 19.64, 64.3, 11.92, 345.33),
	(221, 'Abou222', 1.73, 79.2, 12, 321),
	(222, 'Adrian', 3.93, 71.84, 8.58, 238.6),
	(227, 'Aphromoo', 3.6, 74.8333, 8.44, 234.17),
	(235, 'Azingy', 3.34, 61.3333, 10.31, 264),
	(236, 'Baby', 0.79, 42.3, 8.33, 185),
	(240, 'Benny', 4.33, 76.5, 12.25, 319),
	(244, 'Bubbadub', 2.03, 61.15, 9.25, 221),
	(252, 'Cop', 12, 71.8, 14.24, 413.67),
	(257, 'Dan Dinh', 0, 0, 0, 0),
	(265, 'Doublelift', 4.76, 75.7833, 15.18, 421.33),
	(266, 'Dyrus', 2.85, 50.9667, 11.91, 315.83),
	(274, 'Flaresz', 1.82, 54.9, 12.1, 315.5),
	(278, 'Gleeb', 5.14, 78.7, 8.71, 235),
	(280, 'Goldenglue', 3, 64.35, 13.63, 368),
	(283, 'Hai', 2.91, 66.48, 11.91, 332.4),
	(285, 'Hauntzer', 3.42, 73.25, 12.2, 342.5),
	(292, 'IWillDominate', 4.38, 75.2333, 12.07, 305.33),
	(294, 'Indivisible', 2.33, 58.3, 8.5, 227),
	(297, 'KEITH', 5.67, 85, 21, 385),
	(298, 'KeNNy', 2.8, 60.9, 12, 301),
	(300, 'Kez', 3.69, 64.7333, 11.21, 283.67),
	(301, 'KiWiKiD', 2.28, 64.7333, 7.71, 202.33),
	(311, 'LemonNation', 3.12, 73.96, 8.27, 231),
	(313, 'Link', 3.3, 73.8667, 13.25, 360),
	(314, 'Lohpally', 4.9, 62, 8, 241),
	(316, 'MabreyBABY', 4.1, 68.45, 13.2, 372.5),
	(317, 'mancloud', 2.64, 72.5, 14.67, 347),
	(320, 'Meteos', 4.2, 75.8, 11.48, 311.67),
	(327, 'Nien', 3.31, 82, 15.21, 379),
	(336, 'otter', 2.49, 68.8, 13.56, 360),
	(337, 'PR0LLY', 2.6, 77.75, 14.45, 344.5),
	(343, 'Pobelter', 4.4, 70.18, 13.56, 382.6),
	(344, 'Prototype White', 0, 0, 0, 0),
	(346, 'ROBERTxLEE', 2.2, 73.35, 15.1, 361),
	(350, 'Rhux', 3.35, 64.65, 11.97, 340),
	(352, 'Rule18', 2.65, 75.4, 9.57, 249),
	(355, 'Saintvicious', 3.41, 73.75, 10.99, 313.5),
	(360, 'ShorterACE', 1.87, 62.35, 10.48, 270.5),
	(363, 'Slooshi', 2.98, 67.9, 14.52, 362.67),
	(365, 'Sneaky', 4.28, 73.36, 14.07, 392.2),
	(371, 'stuntopolis', 1, 81.8, 6, 202),
	(373, 'Swain Gretzky', 0, 0, 0, 0),
	(389, 'Westrice', 2.74, 62.5, 13.1, 342),
	(395, 'Xpecial', 3.34, 72.92, 8.84, 223),
	(402, 'ZionSpartan', 3.8, 62.9, 11.6, 325.6),
	(410, 'Crumbz', 0.73, 57.9, 8.95, 236),
	(412, 'Quas', 4.09, 70.88, 12.62, 319);
/*!40000 ALTER TABLE `players` ENABLE KEYS */;


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
  PRIMARY KEY (`Team_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1 COMMENT='Table of teams';

-- Dumping data for table lol.teams: ~29 rows (approximately)
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` (`Team_ID`, `TeamName`, `TopID`, `JunglerID`, `MidID`, `ADCID`, `SupportID`, `WLRecord`, `WinPerAdv10`) VALUES
	(1, 'Cloud9', 0, 0, 0, 0, 0, 0, 0),
	(2, 'Counter Logic Gaming', 0, 0, 0, 0, 0, 0, 0),
	(3, 'Enemy', 0, 0, 0, 0, 0, 0, 0),
	(4, 'Gravity', 0, 0, 0, 0, 0, 0, 0),
	(5, 'Immortals', 0, 0, 0, 0, 0, 0, 0),
	(6, 'Team Dignitas', 0, 0, 0, 0, 0, 0, 0),
	(7, 'Team Dragon Knights', 0, 0, 0, 0, 0, 0, 0),
	(8, 'Team Impulse', 0, 0, 0, 0, 0, 0, 0),
	(9, 'Team SoloMid', 0, 0, 0, 0, 0, 0, 0),
	(10, 'CNB e-Sports Club', 0, 0, 0, 0, 0, 0, 0),
	(11, 'g3nerationX', 0, 0, 0, 0, 0, 0, 0),
	(12, 'INTZ e-Sports', 0, 0, 0, 0, 0, 0, 0),
	(13, 'INTZ Red', 0, 0, 0, 0, 0, 0, 0),
	(14, 'KaBuM! Black', 0, 0, 0, 0, 0, 0, 0),
	(15, 'KaBuM! Orange', 0, 0, 0, 0, 0, 0, 0),
	(16, 'Keyd Stars', 0, 0, 0, 0, 0, 0, 0),
	(17, 'paiN Gaming', 0, 0, 0, 0, 0, 0, 0),
	(18, 'Dash9 Gaming', 0, 0, 0, 0, 0, 0, 0),
	(19, 'Galactic Gamers', 0, 0, 0, 0, 0, 0, 0),
	(20, 'Havoks Gaming', 0, 0, 0, 0, 0, 0, 0),
	(21, 'Lyon Gaming', 0, 0, 0, 0, 0, 0, 0),
	(22, 'MeetYourMakers.LAN', 0, 0, 0, 0, 0, 0, 0),
	(23, 'Revenge eSports', 0, 0, 0, 0, 0, 0, 0),
	(24, 'Furious Gaming', 0, 0, 0, 0, 0, 0, 0),
	(25, 'Hafnet eSports', 0, 0, 0, 0, 0, 0, 0),
	(26, 'Isurus Gaming', 0, 0, 0, 0, 0, 0, 0),
	(27, 'Kaos Latin Gamers', 0, 0, 0, 0, 0, 0, 0),
	(28, 'Last Kings', 0, 0, 0, 0, 0, 0, 0),
	(29, 'Rebirth eSports Fate', 0, 0, 0, 0, 0, 0, 0);
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
