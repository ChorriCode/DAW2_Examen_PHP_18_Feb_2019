drop table IF exists `partidos`;
CREATE TABLE IF NOT EXISTS `partidos` (
  `id` mediumint NOT NULL AUTO_INCREMENT,
  `jornada` tinyint(4) NOT NULL DEFAULT '0',
  `eL` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `gL` tinyint(4) NOT NULL DEFAULT '0',
  `eV` varchar(3) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `gV` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
