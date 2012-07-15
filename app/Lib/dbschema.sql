CREATE TABLE IF NOT EXISTS `survey` (
  `user_id` bigint(10) unsigned NOT NULL,
  `1` varchar(254) NOT NULL DEFAULT '',
  `2` varchar(254) NOT NULL DEFAULT '',
  `3` varchar(254) NOT NULL DEFAULT '',
  `4` varchar(254) NOT NULL DEFAULT '',
  `5` varchar(254) NOT NULL DEFAULT '',
  `6` varchar(254) NOT NULL DEFAULT '',
  `7` varchar(254) NOT NULL DEFAULT '',
  `8` varchar(254) NOT NULL DEFAULT '',
  `9` varchar(254) NOT NULL DEFAULT '',
  `10` varchar(254) NOT NULL DEFAULT '',
  `11` varchar(254) NOT NULL DEFAULT '',
  `12` varchar(254) NOT NULL DEFAULT '',
  `13` varchar(254) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `answers` (
  `module_id` bigint(10) unsigned NOT NULL,
  `series` int(10) unsigned NOT NULL,
  `time_taken` time NOT NULL,
  `correct` bit(1) NOT NULL,
  PRIMARY KEY (`module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `modules` (
  `module_id` bigint(10) unsigned NOT NULL,
  `user_id` bigint(10) unsigned NOT NULL,
  `study_id` bigint(10) unsigned NOT NULL,
  `question_id` bigint(10) unsigned NOT NULL,
  `completed` bit(1) NOT NULL DEFAULT b'0',
  `correct` int(10) NOT NULL,
  `payment` int(11) NOT NULL,
  `confidence` enum('high','low','none') NOT NULL DEFAULT 'none',
  `start_time` time NOT NULL,
  PRIMARY KEY (`module_id`),
  KEY `study_id` (`study_id`,`question_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `rank` (
  `study_id` bigint(10) unsigned NOT NULL,
  `rank_array` tinytext NOT NULL,
  PRIMARY KEY (`study_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `robot_link` (
  `user_id` bigint(10) unsigned NOT NULL,
  `robot_rank` int(10) unsigned NOT NULL,
  `user_rank` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `study` (
  `study_id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` time NOT NULL,
  `treatment_group` enum('select','no-select','') NOT NULL DEFAULT '',
  `participants` tinytext NOT NULL,
  PRIMARY KEY (`study_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `team_link` (
  `team_id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_1` int(10) unsigned NOT NULL,
  `user_2` int(10) unsigned NOT NULL,
  PRIMARY KEY (`team_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
