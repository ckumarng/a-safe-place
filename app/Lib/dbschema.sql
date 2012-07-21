-- updated: original
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
) ;
-- updated: original
CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_id` bigint(10) unsigned NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `time_taken` time NOT NULL,
  `correct` smallint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;
-- updated: 7/19/2012 4:50pm
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `module` bigint(10) unsigned NOT NULL,
  `user` bigint(10) unsigned NOT NULL,
  `study` bigint(10) unsigned NOT NULL,
  `completed` smallint(1) NOT NULL DEFAULT '0',
  `correct` int(10) NOT NULL DEFAULT '0',
  `payment` int(11) NOT NULL DEFAULT '0',
  `confidence` enum('high','low','none') NOT NULL DEFAULT 'none',
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user` (`user`)
);
-- updated: original
CREATE TABLE IF NOT EXISTS `rank` (
  `study_id` bigint(10) unsigned NOT NULL,
  `rank_array` tinytext NOT NULL,
  PRIMARY KEY (`study_id`)
) ;
-- updated: original
CREATE TABLE IF NOT EXISTS `robot_link` (
  `user_id` bigint(10) unsigned NOT NULL,
  `robot_rank` int(10) unsigned NOT NULL,
  `user_rank` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`)
) ;
-- updated: 7/20/2012 4:56pm
CREATE TABLE IF NOT EXISTS `studies` (
  `id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `treatment_group` enum('select','no-select','') NOT NULL DEFAULT '',
  `participants` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 ;
-- updated: original
CREATE TABLE IF NOT EXISTS `team_link` (
  `team_id` bigint(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_1` int(10) unsigned NOT NULL,
  `user_2` int(10) unsigned NOT NULL,
  PRIMARY KEY (`team_id`)
) AUTO_INCREMENT=1 ;
-- updated: original
CREATE TABLE IF NOT EXISTS `random_numbers` (
  `id` int(15) unsigned NOT NULL AUTO_INCREMENT,
  `first` smallint(1) unsigned NOT NULL,
  `second` smallint(3) unsigned NOT NULL,
  PRIMARY KEY (`id`)
);
-- updated: 7/20/2012 4:56pm
CREATE TABLE IF NOT EXISTS `logins` (
  `id` bigint(254) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(254) NOT NULL,
  `last_name` varchar(254) NOT NULL,
  `email` varchar(254) NOT NULL,
  `complete` tinyint(1) unsigned NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 ;
-- created: 7/20/2012 1:03pm
CREATE TABLE IF NOT EXISTS `variables` (
  `id` bigint(24) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(254) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=MyISAM AUTO_INCREMENT=1;

INSERT INTO `logins` (`first_name`, `last_name`, `email`) VALUES ('Some', 'Guy', 'someguy@some.email');