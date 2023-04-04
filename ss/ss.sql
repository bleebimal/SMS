-- Adminer 4.2.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `providers`;
CREATE TABLE `providers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shortname` varchar(50) NOT NULL,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `providers` (`id`, `shortname`, `name`) VALUES
(1,	'shankar',	'Shankar Bhattarai'),
(2,	'dinesh',	'Dinesh K. Roy');

DROP TABLE IF EXISTS `servers`;
CREATE TABLE `servers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provider` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `passkey` varchar(200) NOT NULL,
  `rrdstep` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `servers` (`id`, `provider`, `name`, `passkey`, `rrdstep`) VALUES
(1,	1,	'vaio',	'ab69137a60ec019a1ccec2ca0a3897595280b7cf',	300),
(2,	2,	'dinesh',	'7a2b3a7f079948aba665a220b24e4c728480ee24',	300);

DROP TABLE IF EXISTS `stats_current`;
CREATE TABLE `stats_current` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serverid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `uptime` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `memtotal` int(11) NOT NULL,
  `memused` int(11) NOT NULL,
  `memfree` int(11) NOT NULL,
  `membuffers` int(11) NOT NULL,
  `disktotal` int(11) NOT NULL,
  `diskused` int(11) NOT NULL,
  `diskfree` int(11) NOT NULL,
  `load1` float NOT NULL,
  `load5` float NOT NULL,
  `load15` float NOT NULL,
  `interfaces` text NOT NULL,
  `processes` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serverid_uniq` (`serverid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `stats_current` (`id`, `serverid`, `time`, `uptime`, `status`, `memtotal`, `memused`, `memfree`, `membuffers`, `disktotal`, `diskused`, `diskfree`, `load1`, `load5`, `load15`, `interfaces`, `processes`) VALUES
(1,	1,	1438692661,	'3:05',	1,	5870,	5556,	313,	3949,	136,	78,	62,	0.25,	0.32,	0.29,	'{\"eth0\":[1354800012,1054293,0,0,0,0,0,0,151008853,821903,0,0,0,0,0,0]}',	'{\"runsvc\":2,\"allsvc\":3,\"svcs\":{\"\\/usr\\/sbin\\/mysqld\":true,\"\\/usr\\/sbin\\/sshd\":true,\"\\/usr\\/sbin\\/httpd\":false},\"allps\":256}');

DROP TABLE IF EXISTS `stats_history`;
CREATE TABLE `stats_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serverid` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `uptime` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `memtotal` int(11) NOT NULL,
  `memused` int(11) NOT NULL,
  `memfree` int(11) NOT NULL,
  `membuffers` int(11) NOT NULL,
  `disktotal` int(11) NOT NULL,
  `diskused` int(11) NOT NULL,
  `diskfree` int(11) NOT NULL,
  `load1` float NOT NULL,
  `load5` float NOT NULL,
  `load15` float NOT NULL,
  `interfaces` text NOT NULL,
  `processes` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `time_uniq` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO `stats_history` (`id`, `serverid`, `time`, `uptime`, `status`, `memtotal`, `memused`, `memfree`, `membuffers`, `disktotal`, `diskused`, `diskfree`, `load1`, `load5`, `load15`, `interfaces`, `processes`) VALUES
(1,	1,	1438692394,	'3:01',	1,	5870,	5707,	162,	3946,	136,	78,	62,	0.17,	0.28,	0.27,	'{\"eth0\":[1338782412,1040537,0,0,0,0,0,0,149162456,811777,0,0,0,0,0,0]}',	'{\"runsvc\":2,\"allsvc\":3,\"svcs\":{\"\\/usr\\/sbin\\/mysqld\":true,\"\\/usr\\/sbin\\/sshd\":true,\"\\/usr\\/sbin\\/httpd\":false},\"allps\":254}'),
(2,	1,	1438692422,	'3:01',	1,	5870,	5729,	141,	3946,	136,	78,	62,	0.19,	0.27,	0.26,	'{\"eth0\":[1338799726,1040654,0,0,0,0,0,0,149180942,811895,0,0,0,0,0,0]}',	'{\"runsvc\":2,\"allsvc\":3,\"svcs\":{\"\\/usr\\/sbin\\/mysqld\":true,\"\\/usr\\/sbin\\/sshd\":true,\"\\/usr\\/sbin\\/httpd\":false},\"allps\":257}'),
(3,	1,	1438692481,	'3:02',	1,	5870,	5706,	164,	3942,	136,	78,	62,	0.44,	0.32,	0.28,	'{\"eth0\":[1338827665,1040847,0,0,0,0,0,0,149209853,812086,0,0,0,0,0,0]}',	'{\"runsvc\":2,\"allsvc\":3,\"svcs\":{\"\\/usr\\/sbin\\/mysqld\":true,\"\\/usr\\/sbin\\/sshd\":true,\"\\/usr\\/sbin\\/httpd\":false},\"allps\":255}'),
(4,	1,	1438692542,	'3:03',	1,	5870,	5545,	325,	3938,	136,	78,	62,	0.58,	0.38,	0.3,	'{\"eth0\":[1338884960,1041163,0,0,0,0,0,0,149250217,812388,0,0,0,0,0,0]}',	'{\"runsvc\":2,\"allsvc\":3,\"svcs\":{\"\\/usr\\/sbin\\/mysqld\":true,\"\\/usr\\/sbin\\/sshd\":true,\"\\/usr\\/sbin\\/httpd\":false},\"allps\":255}'),
(5,	1,	1438692601,	'3:04',	1,	5870,	5545,	325,	3939,	136,	78,	62,	0.39,	0.36,	0.3,	'{\"eth0\":[1340822198,1043141,0,0,0,0,0,0,149387513,813756,0,0,0,0,0,0]}',	'{\"runsvc\":2,\"allsvc\":3,\"svcs\":{\"\\/usr\\/sbin\\/mysqld\":true,\"\\/usr\\/sbin\\/sshd\":true,\"\\/usr\\/sbin\\/httpd\":false},\"allps\":255}'),
(6,	1,	1438692661,	'3:05',	1,	5870,	5556,	313,	3949,	136,	78,	62,	0.25,	0.32,	0.29,	'{\"eth0\":[1354800012,1054293,0,0,0,0,0,0,151008853,821903,0,0,0,0,0,0]}',	'{\"runsvc\":2,\"allsvc\":3,\"svcs\":{\"\\/usr\\/sbin\\/mysqld\":true,\"\\/usr\\/sbin\\/sshd\":true,\"\\/usr\\/sbin\\/httpd\":false},\"allps\":256}');

-- 2015-08-04 12:51:17
