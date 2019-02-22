-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para bdfinalphp
DROP DATABASE IF EXISTS `bdfinalphp`;
CREATE DATABASE IF NOT EXISTS `bdfinalphp` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `bdfinalphp`;

-- Volcando estructura para tabla bdfinalphp.equipos
DROP TABLE IF EXISTS `equipos`;
CREATE TABLE IF NOT EXISTS `equipos` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `nombreCorto` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `pg` tinyint(4) NOT NULL DEFAULT '0',
  `pe` tinyint(4) NOT NULL DEFAULT '0',
  `pp` tinyint(4) NOT NULL DEFAULT '0',
  `gf` tinyint(4) NOT NULL DEFAULT '0',
  `gc` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla bdfinalphp.equipos: ~19 rows (aproximadamente)
DELETE FROM `equipos`;
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
INSERT INTO `equipos` (`id`, `nombreCorto`, `nombre`, `pg`, `pe`, `pp`, `gf`, `gc`) VALUES
	(1, 'ALV', 'DEPORTIVO ALAVES\r\n', 0, 0, 0, 0, 0),
	(2, 'ATH', 'ATHLETIC CLUB\r\n', 0, 0, 0, 0, 0),
	(3, 'ATL', 'ATLETICO MADRID\r\n', 0, 0, 0, 0, 0),
	(4, 'BCN', 'BARCELONA\r\n', 0, 0, 0, 0, 0),
	(5, 'CLV', 'CELTA DE VIGO\r\n', 0, 0, 0, 0, 0),
	(6, 'EIB', 'EIBAR\r\n', 0, 0, 0, 0, 0),
	(7, 'ESP', 'REAL CLUB DEPORTIVO ESPAÑOL\r\n', 0, 0, 0, 0, 0),
	(8, 'GET', 'GETAFE\r\n', 0, 0, 0, 0, 0),
	(9, 'GIR', 'GIRONA\r\n', 0, 0, 0, 0, 0),
	(10, 'HSC', 'HUESCA\r\n', 0, 0, 0, 0, 0),
	(11, 'LEG', 'LEGANES\r\n', 0, 0, 0, 0, 0),
	(12, 'LEV', 'LEVANTE\r\n', 0, 0, 0, 0, 0),
	(13, 'RVY', 'RAYO VALLECANO\r\n', 0, 0, 0, 0, 0),
	(14, 'BET', 'REAL BETIS\r\n', 0, 0, 0, 0, 0),
	(15, 'RMA', 'REAL MADRID\r\n', 0, 0, 0, 0, 0),
	(16, 'RSO', 'REAL SOCIEDAD\r\n', 0, 0, 0, 0, 0),
	(17, 'RVA', 'REAL VALLADOLID\r\n', 0, 0, 0, 0, 0),
	(18, 'SEV', 'SEVILLA\r\n', 0, 0, 0, 0, 0),
	(19, 'VAL', 'VALENCIA\r\n', 0, 0, 0, 0, 0);
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;

-- Volcando estructura para tabla bdfinalphp.partidos
DROP TABLE IF EXISTS `partidos`;
CREATE TABLE IF NOT EXISTS `partidos` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `jornada` tinyint(4) NOT NULL DEFAULT '0',
  `eL` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `gL` tinyint(4) NOT NULL DEFAULT '0',
  `eV` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `gV` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=221 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla bdfinalphp.partidos: ~220 rows (aproximadamente)
DELETE FROM `partidos`;
/*!40000 ALTER TABLE `partidos` DISABLE KEYS */;
INSERT INTO `partidos` (`id`, `jornada`, `eL`, `gL`, `eV`, `gV`) VALUES
	(1, 1, 'GIR', 0, 'RVA', 0),
	(2, 1, 'BET', 0, 'LEV', 3),
	(3, 1, 'CLV', 1, 'ESP', 1),
	(4, 1, 'VIL', 1, 'RSO', 2),
	(5, 1, 'BCN', 3, 'ALV', 0),
	(6, 1, 'EIB', 1, 'HSC', 2),
	(7, 1, 'RAY', 1, 'SEV', 4),
	(8, 1, 'RMA', 2, 'GET', 0),
	(9, 1, 'VAL', 1, 'ATL', 1),
	(10, 1, 'ATH', 2, 'LEG', 1),
	(11, 2, 'GET', 2, 'EIB', 0),
	(12, 2, 'LEG', 2, 'RSO', 2),
	(13, 2, 'ALV', 0, 'BET', 0),
	(14, 2, 'ATL', 1, 'RAY', 0),
	(15, 2, 'RVA', 0, 'BCN', 1),
	(16, 2, 'ESP', 2, 'VAL', 0),
	(17, 2, 'GIR', 1, 'RMA', 4),
	(18, 2, 'SEV', 0, 'VIL', 0),
	(19, 2, 'LEV', 1, 'CLV', 2),
	(20, 2, 'ATH', 2, 'HSC', 2),
	(21, 3, 'GET', 0, 'RVA', 0),
	(22, 3, 'EIB', 2, 'RSO', 1),
	(23, 3, 'VIL', 0, 'GIR', 1),
	(24, 3, 'CLV', 2, 'ATL', 0),
	(25, 3, 'RMA', 4, 'LEG', 1),
	(26, 3, 'LEV', 2, 'VAL', 2),
	(27, 3, 'ALV', 2, 'ESP', 1),
	(28, 3, 'BCN', 8, 'HSC', 2),
	(29, 3, 'BET', 1, 'SEV', 0),
	(30, 3, 'RAY', 1, 'ATH', 1),
	(31, 4, 'HSC', 0, 'RAY', 1),
	(32, 4, 'ATL', 1, 'EIB', 1),
	(33, 4, 'RSO', 1, 'BCN', 2),
	(34, 4, 'VAL', 0, 'BET', 0),
	(35, 4, 'ATH', 1, 'RMA', 1),
	(36, 4, 'LEG', 0, 'VIL', 1),
	(37, 4, 'ESP', 1, 'LEV', 0),
	(38, 4, 'RVA', 0, 'ALV', 1),
	(39, 4, 'SEV', 0, 'GET', 2),
	(40, 4, 'GIR', 3, 'CLV', 2),
	(41, 5, 'HSC', 0, 'RSO', 1),
	(42, 5, 'RAY', 1, 'ALV', 5),
	(43, 5, 'CLV', 3, 'RVA', 3),
	(44, 5, 'EIB', 1, 'LEG', 0),
	(45, 5, 'GET', 0, 'ATL', 2),
	(46, 5, 'RMA', 1, 'ESP', 0),
	(47, 5, 'LEV', 2, 'SEV', 6),
	(48, 5, 'VIL', 0, 'VAL', 0),
	(49, 5, 'BET', 2, 'ATH', 2),
	(50, 5, 'BCN', 2, 'GIR', 2),
	(51, 6, 'ESP', 1, 'EIB', 0),
	(52, 6, 'RSO', 2, 'RAY', 2),
	(53, 6, 'ATL', 3, 'HSC', 0),
	(54, 6, 'ATH', 0, 'VIL', 3),
	(55, 6, 'LEG', 2, 'BCN', 1),
	(56, 6, 'VAL', 1, 'CLV', 1),
	(57, 6, 'SEV', 3, 'RMA', 0),
	(58, 6, 'ALV', 1, 'GET', 1),
	(59, 6, 'RVA', 2, 'LEV', 1),
	(60, 6, 'GIR', 0, 'BET', 1),
	(61, 7, 'RAY', 2, 'ESP', 2),
	(62, 7, 'RSO', 0, 'VAL', 1),
	(63, 7, 'BCN', 1, 'ATH', 1),
	(64, 7, 'EIB', 1, 'SEV', 3),
	(65, 7, 'RMA', 0, 'ATL', 0),
	(66, 7, 'HSC', 1, 'GIR', 1),
	(67, 7, 'VIL', 0, 'RVA', 1),
	(68, 7, 'LEV', 2, 'ALV', 1),
	(69, 7, 'BET', 1, 'LEG', 0),
	(70, 7, 'CLV', 1, 'GET', 1),
	(71, 8, 'ATH', 1, 'RSO', 3),
	(72, 8, 'GIR', 2, 'EIB', 3),
	(73, 8, 'GET', 0, 'LEV', 1),
	(74, 8, 'ALV', 1, 'RMA', 0),
	(75, 8, 'LEG', 1, 'RAY', 0),
	(76, 8, 'RVA', 1, 'HSC', 0),
	(77, 8, 'ATL', 1, 'BET', 0),
	(78, 8, 'ESP', 3, 'VIL', 1),
	(79, 8, 'SEV', 2, 'CLV', 1),
	(80, 8, 'VAL', 1, 'BCN', 1),
	(81, 9, 'CLV', 0, 'ALV', 1),
	(82, 9, 'RMA', 1, 'LEV', 2),
	(83, 9, 'VAL', 1, 'LEG', 1),
	(84, 9, 'VIL', 1, 'ATL', 1),
	(85, 9, 'BCN', 4, 'SEV', 2),
	(86, 9, 'RAY', 1, 'GET', 2),
	(87, 9, 'EIB', 1, 'ATH', 1),
	(88, 9, 'HSC', 0, 'ESP', 2),
	(89, 9, 'BET', 0, 'RVA', 1),
	(90, 9, 'RSO', 0, 'GIR', 0),
	(91, 10, 'RVA', 1, 'ESP', 1),
	(92, 10, 'GIR', 2, 'RAY', 1),
	(93, 10, 'ATH', 0, 'VAL', 0),
	(94, 10, 'CLV', 4, 'EIB', 0),
	(95, 10, 'LEV', 2, 'LEG', 0),
	(96, 10, 'ATL', 2, 'RSO', 0),
	(97, 10, 'GET', 2, 'BET', 0),
	(98, 10, 'BCN', 5, 'RMA', 1),
	(99, 10, 'ALV', 2, 'VIL', 1),
	(100, 10, 'SEV', 2, 'HSC', 1),
	(101, 11, 'LEG', 1, 'ATL', 1),
	(102, 11, 'RMA', 2, 'RVA', 0),
	(103, 11, 'VAL', 0, 'GIR', 1),
	(104, 11, 'RAY', 2, 'BCN', 3),
	(105, 11, 'EIB', 2, 'ALV', 1),
	(106, 11, 'VIL', 1, 'LEV', 1),
	(107, 11, 'HSC', 1, 'GET', 1),
	(108, 11, 'RSO', 0, 'SEV', 0),
	(109, 11, 'BET', 3, 'CLV', 3),
	(110, 11, 'ESP', 1, 'ATH', 0),
	(111, 12, 'LEV', 1, 'RSO', 3),
	(112, 12, 'RVA', 0, 'EIB', 0),
	(113, 12, 'GET', 0, 'VAL', 1),
	(114, 12, 'ATL', 3, 'ATH', 2),
	(115, 12, 'GIR', 0, 'LEG', 0),
	(116, 12, 'ALV', 2, 'HSC', 1),
	(117, 12, 'BCN', 3, 'BET', 4),
	(118, 12, 'RAY', 2, 'VIL', 2),
	(119, 12, 'SEV', 2, 'ESP', 1),
	(120, 12, 'CLV', 2, 'RMA', 4),
	(121, 13, 'LEG', 1, 'ALV', 0),
	(122, 13, 'EIB', 3, 'RMA', 0),
	(123, 13, 'VAL', 3, 'RAY', 0),
	(124, 13, 'HSC', 2, 'LEV', 2),
	(125, 13, 'ATL', 1, 'BCN', 1),
	(126, 13, 'ATH', 1, 'GET', 1),
	(127, 13, 'SEV', 1, 'RVA', 0),
	(128, 13, 'ESP', 1, 'GIR', 3),
	(129, 13, 'VIL', 2, 'BET', 1),
	(130, 13, 'RSO', 2, 'CLV', 1),
	(131, 14, 'RAY', 1, 'EIB', 0),
	(132, 14, 'CLV', 2, 'HSC', 0),
	(133, 14, 'RVA', 2, 'LEG', 4),
	(134, 14, 'GET', 3, 'ESP', 0),
	(135, 14, 'RMA', 2, 'VAL', 0),
	(136, 14, 'BET', 1, 'RSO', 0),
	(137, 14, 'GIR', 1, 'ATL', 1),
	(138, 14, 'BCN', 2, 'VIL', 0),
	(139, 14, 'ALV', 1, 'SEV', 1),
	(140, 14, 'LEV', 3, 'ATH', 0),
	(141, 15, 'LEG', 1, 'GET', 1),
	(142, 15, 'ATL', 3, 'ALV', 0),
	(143, 15, 'VAL', 1, 'SEV', 1),
	(144, 15, 'VIL', 2, 'CLV', 3),
	(145, 15, 'ESP', 0, 'BCN', 4),
	(146, 15, 'EIB', 4, 'LEV', 4),
	(147, 15, 'HSC', 0, 'RMA', 1),
	(148, 15, 'RSO', 1, 'RVA', 2),
	(149, 15, 'BET', 2, 'RAY', 0),
	(150, 15, 'ATH', 1, 'GIR', 0),
	(151, 16, 'CLV', 0, 'LEG', 0),
	(152, 16, 'GET', 1, 'RSO', 0),
	(153, 16, 'RVA', 2, 'ATL', 3),
	(154, 16, 'RMA', 1, 'RAY', 0),
	(155, 16, 'EIB', 1, 'VAL', 1),
	(156, 16, 'SEV', 2, 'GIR', 0),
	(157, 16, 'ESP', 1, 'BET', 3),
	(158, 16, 'HSC', 2, 'VIL', 2),
	(159, 16, 'LEV', 0, 'BCN', 5),
	(160, 16, 'ALV', 0, 'ATH', 0),
	(161, 17, 'GIR', 1, 'GET', 1),
	(162, 17, 'RSO', 0, 'ALV', 1),
	(163, 17, 'BET', 1, 'EIB', 1),
	(164, 17, 'ATL', 1, 'ESP', 0),
	(165, 17, 'BCN', 2, 'CLV', 0),
	(166, 17, 'ATH', 1, 'RVA', 1),
	(167, 17, 'VAL', 2, 'HSC', 1),
	(168, 17, 'LEG', 1, 'SEV', 1),
	(169, 17, 'RAY', 2, 'LEV', 1),
	(170, 17, 'VIL', 2, 'RMA', 2),
	(171, 18, 'LEV', 2, 'GIR', 2),
	(172, 18, 'ESP', 1, 'LEG', 0),
	(173, 18, 'RVA', 0, 'RAY', 1),
	(174, 18, 'ALV', 2, 'VAL', 1),
	(175, 18, 'HSC', 2, 'BET', 1),
	(176, 18, 'EIB', 0, 'VIL', 0),
	(177, 18, 'SEV', 1, 'ATL', 1),
	(178, 18, 'RMA', 0, 'RSO', 2),
	(179, 18, 'GET', 1, 'BCN', 2),
	(180, 18, 'CLV', 1, 'ATH', 2),
	(181, 19, 'RAY', 4, 'CLV', 2),
	(182, 19, 'LEG', 1, 'HSC', 0),
	(183, 19, 'VAL', 1, 'RVA', 1),
	(184, 19, 'GIR', 1, 'ALV', 1),
	(185, 19, 'VIL', 1, 'GET', 2),
	(186, 19, 'ATL', 1, 'LEV', 0),
	(187, 19, 'ATH', 2, 'SEV', 0),
	(188, 19, 'BCN', 3, 'EIB', 0),
	(189, 19, 'BET', 1, 'RMA', 2),
	(190, 19, 'RSO', 3, 'ESP', 2),
	(191, 20, 'GET', 4, 'ALV', 0),
	(192, 20, 'RMA', 2, 'SEV', 0),
	(193, 20, 'HSC', 0, 'ATL', 3),
	(194, 20, 'CLV', 1, 'VAL', 2),
	(195, 20, 'BET', 3, 'GIR', 2),
	(196, 20, 'VIL', 1, 'ATH', 1),
	(197, 20, 'LEV', 2, 'RVA', 0),
	(198, 20, 'RAY', 2, 'RSO', 2),
	(199, 20, 'BCN', 3, 'LEG', 1),
	(200, 20, 'EIB', 3, 'ESP', 0),
	(201, 21, 'SEV', 5, 'LEV', 0),
	(202, 21, 'ATL', 2, 'GET', 0),
	(203, 21, 'LEG', 2, 'EIB', 2),
	(204, 21, 'ATH', 1, 'BET', 0),
	(205, 21, 'RVA', 2, 'CLV', 1),
	(206, 21, 'GIR', 0, 'BCN', 2),
	(207, 21, 'RSO', 0, 'HSC', 0),
	(208, 21, 'VAL', 3, 'VIL', 0),
	(209, 21, 'ESP', 2, 'RMA', 4),
	(210, 21, 'ALV', 0, 'RAY', 1),
	(211, 22, 'BCN', 2, 'VAL', 2),
	(212, 22, 'CLV', 1, 'SEV', 0),
	(213, 22, 'EIB', 3, 'GIR', 0),
	(214, 22, 'HSC', 4, 'RVA', 0),
	(215, 22, 'LEV', 0, 'GET', 0),
	(216, 22, 'RAY', 1, 'LEG', 2),
	(217, 22, 'BET', 1, 'ATL', 0),
	(218, 22, 'RMA', 3, 'ALV', 0),
	(219, 22, 'RSO', 2, 'ATH', 1),
	(220, 22, 'VIL', 2, 'ESP', 2);
/*!40000 ALTER TABLE `partidos` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
