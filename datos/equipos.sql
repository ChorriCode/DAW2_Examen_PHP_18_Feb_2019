drop table IF exists `equipos`;
CREATE TABLE IF NOT EXISTS `equipos` (
  `id` mediumint NOT NULL AUTO_INCREMENT,
  `nombreCorto` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `puntos` tinyint(4) NOT NULL DEFAULT '0',
  `pg` tinyint(4) NOT NULL DEFAULT '0',
  `pe` tinyint(4) NOT NULL DEFAULT '0',
  `pp` tinyint(4) NOT NULL DEFAULT '0',
  `gf` tinyint(4) NOT NULL DEFAULT '0',
  `gc` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
