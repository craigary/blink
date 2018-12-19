# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.23)
# Database: blog
# Generation Time: 2018-12-19 10:43:51 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table blink_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blink_categories`;

CREATE TABLE `blink_categories` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `type` varchar(32) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `order` int(10) unsigned DEFAULT '0',
  `parent` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`mid`),
  KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

LOCK TABLES `blink_categories` WRITE;
/*!40000 ALTER TABLE `blink_categories` DISABLE KEYS */;

INSERT INTO `blink_categories` (`mid`, `name`, `slug`, `type`, `description`, `count`, `order`, `parent`)
VALUES
	(1,'默认分类','default','category','只是一个默认分类',1,1,0);

/*!40000 ALTER TABLE `blink_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table blink_contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blink_contents`;

CREATE TABLE `blink_contents` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `categories` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `text` longtext,
  `authorId` int(10) unsigned DEFAULT '0',
  `status` varchar(16) DEFAULT 'publish',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

LOCK TABLES `blink_contents` WRITE;
/*!40000 ALTER TABLE `blink_contents` DISABLE KEYS */;

INSERT INTO `blink_contents` (`cid`, `description`, `created`, `modified`, `categories`, `title`, `text`, `authorId`, `status`)
VALUES
	(8,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2017-08-16 03:30:12','2017-08-16 03:30:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(7,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2017-08-10 02:55:12','2017-08-10 02:55:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(5,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2016-08-16 18:20:12','2016-08-16 18:20:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(4,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2016-08-14 18:15:12','2016-08-14 18:15:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(3,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2016-08-11 16:50:12','2016-08-11 16:50:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(2,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2016-07-31 16:05:46','2016-07-31 16:05:46',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(1,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2016-06-13 16:00:46','2016-06-13 16:00:46',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(6,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2017-07-20 02:45:12','2017-07-20 02:45:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(9,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2017-09-27 04:05:12','2017-09-27 04:05:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(10,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2017-10-10 04:15:12','2017-10-10 04:15:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(11,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2017-10-11 07:45:12','2017-10-11 07:45:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(12,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2017-10-17 08:20:12','2017-10-17 08:20:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(13,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2017-10-22 08:30:12','2017-10-22 08:30:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(14,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2017-11-10 09:55:12','2017-11-10 09:55:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(15,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2017-11-17 11:05:12','2017-11-17 11:05:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(16,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2017-11-28 11:40:46','2017-11-28 11:40:46',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(17,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2017-11-29 12:40:46','2017-11-29 12:40:46',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(18,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2017-12-25 13:05:46','2017-12-25 13:05:46',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(19,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2018-02-15 13:20:46','2018-02-15 13:20:46',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(20,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2018-03-05 14:40:46','2018-03-05 14:40:46',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(21,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2018-03-21 14:45:46','2018-03-21 14:45:46',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(22,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2018-04-12 14:50:46','2018-04-12 14:50:46',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(23,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2018-05-10 15:25:46','2018-05-10 15:25:46',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(24,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2018-06-13 16:00:46','2018-06-13 16:00:46',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(25,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2018-07-31 16:05:46','2018-07-31 16:05:46',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(26,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2018-08-11 16:50:12','2018-08-11 16:50:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(27,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2018-08-14 18:15:12','2018-08-14 18:15:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(28,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2018-08-16 18:20:12','2018-08-16 18:20:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(29,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2018-10-10 21:25:12','2018-10-10 21:25:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish'),
	(30,'如果您看到这篇文章,表示你的 blog 已经安装成功.','2018-10-11 22:00:12','2018-10-11 22:00:12',1,'欢迎使用 Blink','本页面由 Blink 创建, 这只是个测试页面.',1,'publish');

/*!40000 ALTER TABLE `blink_contents` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table blink_options
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blink_options`;

CREATE TABLE `blink_options` (
  `name` varchar(32) NOT NULL,
  `user` int(10) unsigned NOT NULL DEFAULT '0',
  `value` text,
  PRIMARY KEY (`name`,`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `blink_options` WRITE;
/*!40000 ALTER TABLE `blink_options` DISABLE KEYS */;

INSERT INTO `blink_options` (`name`, `user`, `value`)
VALUES
	('theme',0,'default'),
	('theme:default',0,'a:2:{s:7:\"logoUrl\";N;s:12:\"sidebarBlock\";a:5:{i:0;s:15:\"ShowRecentPosts\";i:1;s:18:\"ShowRecentComments\";i:2;s:12:\"ShowCategory\";i:3;s:11:\"ShowArchive\";i:4;s:9:\"ShowOther\";}}'),
	('timezone',0,'28800'),
	('lang',0,'zh_CN'),
	('charset',0,'UTF-8'),
	('contentType',0,'text/html'),
	('gzip',0,'0'),
	('generator',0,'Typecho 1.1/17.10.30'),
	('title',0,'Hello World'),
	('description',0,'Just So So ...'),
	('keywords',0,'typecho,php,blog'),
	('rewrite',0,'0'),
	('frontPage',0,'recent'),
	('frontArchive',0,'0'),
	('commentsRequireMail',0,'1'),
	('commentsWhitelist',0,'0'),
	('commentsRequireURL',0,'0'),
	('commentsRequireModeration',0,'0'),
	('plugins',0,'a:0:{}'),
	('commentDateFormat',0,'F jS, Y \\a\\t h:i a'),
	('siteUrl',0,'http://localhost:8888'),
	('defaultCategory',0,'1'),
	('allowRegister',0,'0'),
	('defaultAllowComment',0,'1'),
	('defaultAllowPing',0,'1'),
	('defaultAllowFeed',0,'1'),
	('pageSize',0,'5'),
	('postsListSize',0,'10'),
	('commentsListSize',0,'10'),
	('commentsHTMLTagAllowed',0,NULL),
	('postDateFormat',0,'Y-m-d'),
	('feedFullText',0,'1'),
	('editorSize',0,'350'),
	('autoSave',0,'0'),
	('markdown',0,'1'),
	('xmlrpcMarkdown',0,'0'),
	('commentsMaxNestingLevels',0,'5'),
	('commentsPostTimeout',0,'2592000'),
	('commentsUrlNofollow',0,'1'),
	('commentsShowUrl',0,'1'),
	('commentsMarkdown',0,'0'),
	('commentsPageBreak',0,'0'),
	('commentsThreaded',0,'1'),
	('commentsPageSize',0,'20'),
	('commentsPageDisplay',0,'last'),
	('commentsOrder',0,'ASC'),
	('commentsCheckReferer',0,'1'),
	('commentsAutoClose',0,'0'),
	('commentsPostIntervalEnable',0,'1'),
	('commentsPostInterval',0,'60'),
	('commentsShowCommentOnly',0,'0'),
	('commentsAvatar',0,'1'),
	('commentsAvatarRating',0,'G'),
	('commentsAntiSpam',0,'1'),
	('routingTable',0,'a:26:{i:0;a:25:{s:5:\"index\";a:6:{s:3:\"url\";s:1:\"/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:8:\"|^[/]?$|\";s:6:\"format\";s:1:\"/\";s:6:\"params\";a:0:{}}s:7:\"archive\";a:6:{s:3:\"url\";s:6:\"/blog/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:13:\"|^/blog[/]?$|\";s:6:\"format\";s:6:\"/blog/\";s:6:\"params\";a:0:{}}s:2:\"do\";a:6:{s:3:\"url\";s:22:\"/action/[action:alpha]\";s:6:\"widget\";s:9:\"Widget_Do\";s:6:\"action\";s:6:\"action\";s:4:\"regx\";s:32:\"|^/action/([_0-9a-zA-Z-]+)[/]?$|\";s:6:\"format\";s:10:\"/action/%s\";s:6:\"params\";a:1:{i:0;s:6:\"action\";}}s:4:\"post\";a:6:{s:3:\"url\";s:24:\"/archives/[cid:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:26:\"|^/archives/([0-9]+)[/]?$|\";s:6:\"format\";s:13:\"/archives/%s/\";s:6:\"params\";a:1:{i:0;s:3:\"cid\";}}s:10:\"attachment\";a:6:{s:3:\"url\";s:26:\"/attachment/[cid:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:28:\"|^/attachment/([0-9]+)[/]?$|\";s:6:\"format\";s:15:\"/attachment/%s/\";s:6:\"params\";a:1:{i:0;s:3:\"cid\";}}s:8:\"category\";a:6:{s:3:\"url\";s:17:\"/category/[slug]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:25:\"|^/category/([^/]+)[/]?$|\";s:6:\"format\";s:13:\"/category/%s/\";s:6:\"params\";a:1:{i:0;s:4:\"slug\";}}s:3:\"tag\";a:6:{s:3:\"url\";s:12:\"/tag/[slug]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:20:\"|^/tag/([^/]+)[/]?$|\";s:6:\"format\";s:8:\"/tag/%s/\";s:6:\"params\";a:1:{i:0;s:4:\"slug\";}}s:6:\"author\";a:6:{s:3:\"url\";s:22:\"/author/[uid:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:24:\"|^/author/([0-9]+)[/]?$|\";s:6:\"format\";s:11:\"/author/%s/\";s:6:\"params\";a:1:{i:0;s:3:\"uid\";}}s:6:\"search\";a:6:{s:3:\"url\";s:19:\"/search/[keywords]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:23:\"|^/search/([^/]+)[/]?$|\";s:6:\"format\";s:11:\"/search/%s/\";s:6:\"params\";a:1:{i:0;s:8:\"keywords\";}}s:10:\"index_page\";a:6:{s:3:\"url\";s:21:\"/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:22:\"|^/page/([0-9]+)[/]?$|\";s:6:\"format\";s:9:\"/page/%s/\";s:6:\"params\";a:1:{i:0;s:4:\"page\";}}s:12:\"archive_page\";a:6:{s:3:\"url\";s:26:\"/blog/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:27:\"|^/blog/page/([0-9]+)[/]?$|\";s:6:\"format\";s:14:\"/blog/page/%s/\";s:6:\"params\";a:1:{i:0;s:4:\"page\";}}s:13:\"category_page\";a:6:{s:3:\"url\";s:32:\"/category/[slug]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:34:\"|^/category/([^/]+)/([0-9]+)[/]?$|\";s:6:\"format\";s:16:\"/category/%s/%s/\";s:6:\"params\";a:2:{i:0;s:4:\"slug\";i:1;s:4:\"page\";}}s:8:\"tag_page\";a:6:{s:3:\"url\";s:27:\"/tag/[slug]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:29:\"|^/tag/([^/]+)/([0-9]+)[/]?$|\";s:6:\"format\";s:11:\"/tag/%s/%s/\";s:6:\"params\";a:2:{i:0;s:4:\"slug\";i:1;s:4:\"page\";}}s:11:\"author_page\";a:6:{s:3:\"url\";s:37:\"/author/[uid:digital]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:33:\"|^/author/([0-9]+)/([0-9]+)[/]?$|\";s:6:\"format\";s:14:\"/author/%s/%s/\";s:6:\"params\";a:2:{i:0;s:3:\"uid\";i:1;s:4:\"page\";}}s:11:\"search_page\";a:6:{s:3:\"url\";s:34:\"/search/[keywords]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:32:\"|^/search/([^/]+)/([0-9]+)[/]?$|\";s:6:\"format\";s:14:\"/search/%s/%s/\";s:6:\"params\";a:2:{i:0;s:8:\"keywords\";i:1;s:4:\"page\";}}s:12:\"archive_year\";a:6:{s:3:\"url\";s:18:\"/[year:digital:4]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:19:\"|^/([0-9]{4})[/]?$|\";s:6:\"format\";s:4:\"/%s/\";s:6:\"params\";a:1:{i:0;s:4:\"year\";}}s:13:\"archive_month\";a:6:{s:3:\"url\";s:36:\"/[year:digital:4]/[month:digital:2]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:30:\"|^/([0-9]{4})/([0-9]{2})[/]?$|\";s:6:\"format\";s:7:\"/%s/%s/\";s:6:\"params\";a:2:{i:0;s:4:\"year\";i:1;s:5:\"month\";}}s:11:\"archive_day\";a:6:{s:3:\"url\";s:52:\"/[year:digital:4]/[month:digital:2]/[day:digital:2]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:41:\"|^/([0-9]{4})/([0-9]{2})/([0-9]{2})[/]?$|\";s:6:\"format\";s:10:\"/%s/%s/%s/\";s:6:\"params\";a:3:{i:0;s:4:\"year\";i:1;s:5:\"month\";i:2;s:3:\"day\";}}s:17:\"archive_year_page\";a:6:{s:3:\"url\";s:38:\"/[year:digital:4]/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:33:\"|^/([0-9]{4})/page/([0-9]+)[/]?$|\";s:6:\"format\";s:12:\"/%s/page/%s/\";s:6:\"params\";a:2:{i:0;s:4:\"year\";i:1;s:4:\"page\";}}s:18:\"archive_month_page\";a:6:{s:3:\"url\";s:56:\"/[year:digital:4]/[month:digital:2]/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:44:\"|^/([0-9]{4})/([0-9]{2})/page/([0-9]+)[/]?$|\";s:6:\"format\";s:15:\"/%s/%s/page/%s/\";s:6:\"params\";a:3:{i:0;s:4:\"year\";i:1;s:5:\"month\";i:2;s:4:\"page\";}}s:16:\"archive_day_page\";a:6:{s:3:\"url\";s:72:\"/[year:digital:4]/[month:digital:2]/[day:digital:2]/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:55:\"|^/([0-9]{4})/([0-9]{2})/([0-9]{2})/page/([0-9]+)[/]?$|\";s:6:\"format\";s:18:\"/%s/%s/%s/page/%s/\";s:6:\"params\";a:4:{i:0;s:4:\"year\";i:1;s:5:\"month\";i:2;s:3:\"day\";i:3;s:4:\"page\";}}s:12:\"comment_page\";a:6:{s:3:\"url\";s:53:\"[permalink:string]/comment-page-[commentPage:digital]\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:36:\"|^(.+)/comment\\-page\\-([0-9]+)[/]?$|\";s:6:\"format\";s:18:\"%s/comment-page-%s\";s:6:\"params\";a:2:{i:0;s:9:\"permalink\";i:1;s:11:\"commentPage\";}}s:4:\"feed\";a:6:{s:3:\"url\";s:20:\"/feed[feed:string:0]\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:4:\"feed\";s:4:\"regx\";s:17:\"|^/feed(.*)[/]?$|\";s:6:\"format\";s:7:\"/feed%s\";s:6:\"params\";a:1:{i:0;s:4:\"feed\";}}s:8:\"feedback\";a:6:{s:3:\"url\";s:31:\"[permalink:string]/[type:alpha]\";s:6:\"widget\";s:15:\"Widget_Feedback\";s:6:\"action\";s:6:\"action\";s:4:\"regx\";s:29:\"|^(.+)/([_0-9a-zA-Z-]+)[/]?$|\";s:6:\"format\";s:5:\"%s/%s\";s:6:\"params\";a:2:{i:0;s:9:\"permalink\";i:1;s:4:\"type\";}}s:4:\"page\";a:6:{s:3:\"url\";s:12:\"/[slug].html\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";s:4:\"regx\";s:22:\"|^/([^/]+)\\.html[/]?$|\";s:6:\"format\";s:8:\"/%s.html\";s:6:\"params\";a:1:{i:0;s:4:\"slug\";}}}s:5:\"index\";a:3:{s:3:\"url\";s:1:\"/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:7:\"archive\";a:3:{s:3:\"url\";s:6:\"/blog/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:2:\"do\";a:3:{s:3:\"url\";s:22:\"/action/[action:alpha]\";s:6:\"widget\";s:9:\"Widget_Do\";s:6:\"action\";s:6:\"action\";}s:4:\"post\";a:3:{s:3:\"url\";s:24:\"/archives/[cid:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:10:\"attachment\";a:3:{s:3:\"url\";s:26:\"/attachment/[cid:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:8:\"category\";a:3:{s:3:\"url\";s:17:\"/category/[slug]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:3:\"tag\";a:3:{s:3:\"url\";s:12:\"/tag/[slug]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:6:\"author\";a:3:{s:3:\"url\";s:22:\"/author/[uid:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:6:\"search\";a:3:{s:3:\"url\";s:19:\"/search/[keywords]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:10:\"index_page\";a:3:{s:3:\"url\";s:21:\"/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:12:\"archive_page\";a:3:{s:3:\"url\";s:26:\"/blog/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:13:\"category_page\";a:3:{s:3:\"url\";s:32:\"/category/[slug]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:8:\"tag_page\";a:3:{s:3:\"url\";s:27:\"/tag/[slug]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:11:\"author_page\";a:3:{s:3:\"url\";s:37:\"/author/[uid:digital]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:11:\"search_page\";a:3:{s:3:\"url\";s:34:\"/search/[keywords]/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:12:\"archive_year\";a:3:{s:3:\"url\";s:18:\"/[year:digital:4]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:13:\"archive_month\";a:3:{s:3:\"url\";s:36:\"/[year:digital:4]/[month:digital:2]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:11:\"archive_day\";a:3:{s:3:\"url\";s:52:\"/[year:digital:4]/[month:digital:2]/[day:digital:2]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:17:\"archive_year_page\";a:3:{s:3:\"url\";s:38:\"/[year:digital:4]/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:18:\"archive_month_page\";a:3:{s:3:\"url\";s:56:\"/[year:digital:4]/[month:digital:2]/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:16:\"archive_day_page\";a:3:{s:3:\"url\";s:72:\"/[year:digital:4]/[month:digital:2]/[day:digital:2]/page/[page:digital]/\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:12:\"comment_page\";a:3:{s:3:\"url\";s:53:\"[permalink:string]/comment-page-[commentPage:digital]\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}s:4:\"feed\";a:3:{s:3:\"url\";s:20:\"/feed[feed:string:0]\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:4:\"feed\";}s:8:\"feedback\";a:3:{s:3:\"url\";s:31:\"[permalink:string]/[type:alpha]\";s:6:\"widget\";s:15:\"Widget_Feedback\";s:6:\"action\";s:6:\"action\";}s:4:\"page\";a:3:{s:3:\"url\";s:12:\"/[slug].html\";s:6:\"widget\";s:14:\"Widget_Archive\";s:6:\"action\";s:6:\"render\";}}'),
	('actionTable',0,'a:0:{}'),
	('panelTable',0,'a:0:{}'),
	('attachmentTypes',0,'@image@'),
	('secret',0,'HIjtu(^Xqo9Tum##OphtUPe0P0pmpZ%0'),
	('installed',0,'1'),
	('allowXmlRpc',0,'2');

/*!40000 ALTER TABLE `blink_options` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table blink_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blink_users`;

CREATE TABLE `blink_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `screenName` varchar(32) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `mail` varchar(200) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `group` int(1) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

LOCK TABLES `blink_users` WRITE;
/*!40000 ALTER TABLE `blink_users` DISABLE KEYS */;

INSERT INTO `blink_users` (`uid`, `name`, `screenName`, `password`, `mail`, `created`, `group`)
VALUES
	(1,'craig','Craig Hart',NULL,'i@craigary.net','2018-12-19 10:02:18',NULL);

/*!40000 ALTER TABLE `blink_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
