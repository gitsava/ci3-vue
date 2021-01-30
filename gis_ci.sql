SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

CREATE TABLE IF NOT EXISTS `tb_district` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tb_subdistrict` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `district_id` int(11) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `zone` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_RELATIONSHIP_2` (`district_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tb_home` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subdistrict_id` int(11) DEFAULT NULL,
  `lat` float(10,6) DEFAULT NULL,
  `lng` float(10,6) DEFAULT NULL,
  `address` varchar(240) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_RELATIONSHIP_1` (`subdistrict_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;