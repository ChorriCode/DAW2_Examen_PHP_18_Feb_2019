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
DROP DATABASE IF  EXISTS `bdfinalphp` ;
CREATE DATABASE IF NOT EXISTS `bdfinalphp` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `bdfinalphp`;

-- Volcando estructura para tabla bdfinalphp.equipos
CREATE TABLE IF NOT EXISTS `equipos` (
  `id` mediumint NOT NULL AUTO_INCREMENT,
  `nombreCorto` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `pg` tinyint(4) NOT NULL DEFAULT '0',
  `pe` tinyint(4) NOT NULL DEFAULT '0',
  `pp` tinyint(4) NOT NULL DEFAULT '0',
  `gf` tinyint(4) NOT NULL DEFAULT '0',
  `gc` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla bdfinalphp.partidos
CREATE TABLE IF NOT EXISTS `partidos` (
  `id` mediumint NOT NULL AUTO_INCREMENT,
  `jornada` tinyint(4) NOT NULL DEFAULT '0',
  `eL` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `gL` tinyint(4) NOT NULL DEFAULT '0',
  `eV` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `gV` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
