SET FOREIGN_KEY_CHECKS = 0;

-- Table `comments` 
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
`id` int(11) NOT NULL auto_increment,
`entry_id` int(11) NOT NULL,
`body` text NOT NULL,
`author` varchar(255) NOT NULL,
`date` date DEFAULT '0000-00-00' NOT NULL,
  PRIMARY KEY  (`id`)
);

-- Table `config` 
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
`site_title` text NOT NULL,
`slogan` text NOT NULL,
`keywords` text NOT NULL,
`description` text NOT NULL,
`google_analytics` longtext NOT NULL,
`onpage` int(11) NOT NULL
);

-- Table `entries` 
DROP TABLE IF EXISTS `entries`;
CREATE TABLE `entries` (
`id` int(11) NOT NULL auto_increment,
`title` varchar(255) NOT NULL,
`small_body` text NOT NULL,
`body` text NOT NULL,
`date` date DEFAULT '0000-00-00' NOT NULL,
  PRIMARY KEY  (`id`)
);

-- Table `pages` 
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
`id` int(11) NOT NULL auto_increment,
`url` varchar(255) NOT NULL,
`title` varchar(128) NOT NULL,
`body` text NOT NULL,
`date` date DEFAULT '0000-00-00' NOT NULL,
`template` varchar(255) NOT NULL,
`show` int(1) NOT NULL,
  PRIMARY KEY  (`id`)
);

-- Table `users` 
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
`id` int(11) NOT NULL auto_increment,
`login` varchar(255) NOT NULL,
`password` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
);

-- Table `comments` 
INSERT INTO `comments` (`id`, `entry_id`, `body`, `author`, `date`) VALUES ('1','1','test','max','0000-00-00');
INSERT INTO `comments` (`id`, `entry_id`, `body`, `author`, `date`) VALUES ('2','1','max another comment','max','0000-00-00');
INSERT INTO `comments` (`id`, `entry_id`, `body`, `author`, `date`) VALUES ('3','1','ололо пыщь пыщь...текст ','тестер','0000-00-00');
INSERT INTO `comments` (`id`, `entry_id`, `body`, `author`, `date`) VALUES ('9','1','дефолт чарсет ин хтаксесс энаблед...','супер тестер','0000-00-00');
INSERT INTO `comments` (`id`, `entry_id`, `body`, `author`, `date`) VALUES ('10','1','тест времени','время','2011-03-19');
INSERT INTO `comments` (`id`, `entry_id`, `body`, `author`, `date`) VALUES ('15','1','sdfsdf','sdf','2011-03-20');
INSERT INTO `comments` (`id`, `entry_id`, `body`, `author`, `date`) VALUES ('16','1','<p><strong>sdfd</strong>sf s<span style="text-decoration: underline;">dfsdf</span></p>','sdf','2011-03-21');


-- Table `config` 
INSERT INTO `config` (`site_title`, `slogan`, `keywords`, `description`, `google_analytics`, `onpage`) VALUES ('My test site!','just test... but it\'ll be more.','keywords, etc','description, etc','UA-1111111111','3');


-- Table `entries` 
INSERT INTO `entries` (`id`, `title`, `small_body`, `body`, `date`) VALUES ('1','first blog post','<p>1</p>','<p>text of post 111</p>','2011-03-19');
INSERT INTO `entries` (`id`, `title`, `small_body`, `body`, `date`) VALUES ('2','second blog post','2','text of post 23','2011-03-19');
INSERT INTO `entries` (`id`, `title`, `small_body`, `body`, `date`) VALUES ('3','Welcome to CodeIgniter','3','CodeIgniter is an Application Development Framework - a toolkit - for people who build web sites using PHP. Its goal is to enable you to develop projects much faster than you could if you were writing code from scratch, by providing a rich set of libraries for commonly needed tasks, as well as a simple interface and logical structure to access these libraries. CodeIgniter lets you creatively focus on your project by minimizing the amount of code needed for a given task.','2011-03-19');
INSERT INTO `entries` (`id`, `title`, `small_body`, `body`, `date`) VALUES ('7','post','4','<div id="content">\r\n\n<p>CodeIgniter is an Application Development Framework - a toolkit - for people who build web sites using PHP. Its goal is to enable you to develop projects much faster than you could if you were writing code from scratch, by providing a rich set of libraries for commonly needed tasks, as well as a simple interface and logical structure to access these libraries. CodeIgniter lets you creatively focus on your project by minimizing the amount of code needed for a given task.</p>\r\n\n<h2>Who is CodeIgniter For?</h2>\r\n\n<p>CodeIgniter is right for you if:</p>\r\n\n<ul>\r\n\n<li>You want a framework with a small footprint.</li>\r\n\n<li>You need exceptional performance.</li>\r\n\n<li>You need broad compatibility with standard hosting accounts that run a variety of PHP versions and configurations.</li>\r\n\n<li>You want a framework that requires nearly zero configuration.</li>\r\n\n<li>You want a framework that does not require you to use the command line.</li>\r\n\n<li>You want a framework that does not require you to adhere to restrictive coding rules.</li>\r\n\n<li>You are not interested in large-scale monolithic libraries like PEAR.</li>\r\n\n<li>You do not want to be forced to learn a templating language (although a template parser is optionally available if you desire one).</li>\r\n\n<li>You eschew complexity, favoring simple solutions.</li>\r\n\n<li>You need clear, thorough documentation.</li>\r\n\n</ul>\r\n\n</div>','2011-03-24');
INSERT INTO `entries` (`id`, `title`, `small_body`, `body`, `date`) VALUES ('10','asd','5','<p>asd</p>','2011-03-25');


-- Table `pages` 
INSERT INTO `pages` (`id`, `url`, `title`, `body`, `date`, `template`, `show`) VALUES ('1','test_page','my test page','<p>my text</p>','2011-03-28','pages.html','0');
INSERT INTO `pages` (`id`, `url`, `title`, `body`, `date`, `template`, `show`) VALUES ('2','contacts','contacts','our contacts','2011-03-26','pages.html','1');
INSERT INTO `pages` (`id`, `url`, `title`, `body`, `date`, `template`, `show`) VALUES ('5','superpage','Page','<p>А из нашего окошка</p>\r\n\n<p>ололо, пыщь-пыщь немножко!</p>','2011-03-26','pages.html','0');
INSERT INTO `pages` (`id`, `url`, `title`, `body`, `date`, `template`, `show`) VALUES ('8','123123123','123','<p>12312</p>','2011-03-28','pages.html','0');


-- Table `users` 
INSERT INTO `users` (`id`, `login`, `password`, `email`) VALUES ('1','admin','202cb962ac59075b964b07152d234b70','admin@code.xx');
INSERT INTO `users` (`id`, `login`, `password`, `email`) VALUES ('3','tester','202cb962ac59075b964b07152d234b70','123@123.ru');


SET FOREIGN_KEY_CHECKS = 1;

