CREATE TABLE `coreshop_country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `isoCode` varchar(2) NULL,
  `active` int(1) DEFAULT 0,
  `currency__id` int(1),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8