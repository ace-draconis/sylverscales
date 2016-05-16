-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2016 at 04:52 PM
-- Server version: 5.7.9
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sylverscales3`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `arrange` int(11) NOT NULL,
  `banner` text CHARACTER SET utf8 NOT NULL,
  `caps` text CHARACTER SET utf8 NOT NULL,
  `enable` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `arrange`, `banner`, `caps`, `enable`) VALUES
(1, 1, '/attached/image/banner/01.jpg', 'What we do?', 1),
(2, 2, '/attached/image/banner/02.jpg', 'Sylver Hyve CMS', 1),
(3, 3, '/attached/image/banner/03.jpg', 'Sylver Scales CMS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL,
  `email` text COLLATE latin1_general_ci NOT NULL,
  `address` text COLLATE latin1_general_ci NOT NULL,
  `label` text COLLATE latin1_general_ci NOT NULL,
  `content` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `address`, `label`, `content`) VALUES
(1, 'enquiry@sylverweb.com.my', '9385-M, Taman Ayer Molek, Melaka', 'Sylver Web', '<h3 class="title">\r\n	Contact Us\r\n</h3>\r\n<div id="map" style="text-align:center;">\r\n	<br />\r\n<br />\r\n<br />\r\n<span style="color:#E53333;font-size:32px;">Map only visible on website</span> \r\n</div>\r\n<h5>\r\n	MAIN OFFICE\r\n</h5>\r\n<p>\r\n	No. 9385-M, Jalan Ayer Molek, \r\nTaman Ayer Molek, <br />\r\nAyer Molek, \r\n75460 Melaka\r\n</p>\r\n<ul class="unorderedList">\r\n	<li>\r\n		<strong>Tel:</strong> +6018 - 7719177\r\n	</li>\r\n	<li>\r\n		<strong>Email:</strong> enquiry@sylverweb.com.my\r\n	</li>\r\n	<li>\r\n		<strong>Website:</strong> www.sylverweb.com.my\r\n	</li>\r\n</ul>');

-- --------------------------------------------------------

--
-- Table structure for table `filter`
--

DROP TABLE IF EXISTS `filter`;
CREATE TABLE IF NOT EXISTS `filter` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `arrange` int(11) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `name` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `filter`
--

INSERT INTO `filter` (`id`, `arrange`, `enable`, `name`) VALUES
(1, 1, 1, 'Website'),
(2, 2, 1, 'Design'),
(3, 3, 1, 'Drawing'),
(4, 4, 1, 'Video'),
(5, 5, 1, 'System'),
(6, 6, 1, 'Audio');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `arrange` int(11) NOT NULL,
  `enable` tinyint(1) NOT NULL,
  `filter` text COLLATE latin1_general_ci NOT NULL,
  `type` text COLLATE latin1_general_ci NOT NULL,
  `content` text COLLATE latin1_general_ci NOT NULL,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `descr` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `arrange`, `enable`, `filter`, `type`, `content`, `title`, `descr`) VALUES
(1, 1, 1, 'Video', 'youtube', 'http://www.youtube.com/embed/XyQLzwSu1d8', 'UN-BEAR-ABLE', 'A short clay animation project that use the stop motion techniques and clay models for our short semester multimedia course''s assignments.'),
(2, 2, 1, 'Video', 'video', '/attached/media/20141023052413_74552.mp4', 'Big Buck Bunny', 'Sample video'),
(3, 3, 1, 'Design', 'flash', '/attached/media/20141023060547_48243.swf', 'I Love You', 'Sample flash Animation'),
(4, 4, 1, 'Audio', 'audio', '/attached/media/20141023060458_44024.mp3', 'Lonely Dance', 'Sample Audio'),
(5, 5, 1, 'Website', 'image', '/attached/image/20151115/20151115175243_51226.jpg', 'HONDA (M) SDN BHD', 'HONDA Corporate Governance Checklist System. A system that can utilize and manipulate Microsoft Excel documents using PHPExcel library. '),
(6, 6, 1, 'Website', 'image', '/attached/image/20151115/20151115174335_76343.jpg', 'Messrs Gan Rao & Chuah', 'Fully Responsive Parallax website for an active and law firm in Malacca, Malaysia.<br>\r\nURL: <a href="http://www.ganraochuah.com" target="_blank">http://www.ganraochuah.com</a>'),
(7, 7, 1, 'Video', 'vimeo', 'http://player.vimeo.com/video/93146259', 'ASUS Padfone Mini', 'Sample Vimeo video'),
(8, 8, 1, 'System', 'image', '/attached/image/20151115/20151115162747_64063.jpg', 'Sylver Hyve CMS', 'Our company''s pride. The first & second prototype of our Custom Website CMS released as an open source under the MIT License : <a href="https://github.com/ace-draconis/sylverhyve2"  target="_blank">Link</a>  '),
(9, 9, 1, 'System', 'image', '/attached/image/20151115/20151115163044_18882.jpg', 'Sylver Scales CMS', 'The predecessor of SylverHyve CMS. It offers new MVC framework, gallery module, new features and new themes. <a href="https://github.com/ace-draconis" target="_blank">Link</a>'),
(10, 10, 1, 'Website', 'image', '/attached/image/20151115/20151115170932_84119.jpg', 'Messrs RAO & CO', 'Fully Responsive Parallax website for a legal firm in Malacca, Malaysia. V1<br>\r\nURL: <a href="http://v1.sraoco.com/" target="_blank">http://v1.sraoco.com/</a>'),
(11, 11, 0, 'System', 'image', '/attached/image/20151115/20151115175121_98893.jpg', 'Messrs RAO & CO', 'A system that can track the law firm''s case filing, client''s records, case progress, court proceedings diary, and staff''s case assignments. '),
(12, 12, 1, 'System', 'image', '/attached/image/20151115/20151115175853_26149.jpg', 'RABBIT HOLE', 'A system that manage an initiative committee that breeds rabbit as pets. It can track rabbit''s  breeding programs and manage rabbit''s cages & placing. '),
(13, 13, 0, 'Drawing', 'image', '/attached/image/20151115/20151115181331_36015.jpg', '', ''),
(14, 14, 1, 'Website', 'image', '/attached/image/20151115/20151115171238_81227.jpg', 'Messrs RAO & CO.', 'Fully Responsive Horizontal Sliding website for a legal firm in Malacca, Malaysia. V2<br>\r\nURL: <a href="http://www.sraoco.com/" target="_blank">http://www.sraoco.com/</a>'),
(15, 15, 1, 'Website', 'image', '/attached/image/20151115/20151115172427_86780.jpg', 'ICSEWR 2015', 'Website for INTERNATIONAL CONFERENCE ON SUSTAINABLE\r\nENVIRONMENT & WATER RESEARCH 2015<br>\r\nURL: <a href="http://icsewr.uthm.edu.my/" target="_blank">http://icsewr.uthm.edu.my/</a>'),
(16, 16, 1, 'System', 'image', '/attached/image/20151115/20151115173730_60630.jpg', 'Sylver Fang CMS', 'The predecessor of SylverScales CMS. It offers new MVC framework and new themes. Under Development, no plan to release as an open source yet.');

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

DROP TABLE IF EXISTS `general`;
CREATE TABLE IF NOT EXISTS `general` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `enable` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `urlable` int(11) NOT NULL,
  `url` text NOT NULL,
  `target` tinytext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general`
--

INSERT INTO `general` (`id`, `enable`, `title`, `content`, `urlable`, `url`, `target`) VALUES
(1, 1, 'Sylver Scales', '<div class="row">\n	<div class="span4 services">\n		<img src="/attached/image/20151117/20151117053838_89475.jpg" width="" height="" title="" align="" alt="" /> <article class="content content2">\n		<h5>\n			Sylver Scales CMS\n		</h5>\n		<p>\n			Major upgrade from SylverHyve CMS which have ceased its development on 28th of August 2014. Aside from the major changes in its core framework, Sylver Scales CMS is imbued with new features, themes, and GUI. Sylver Scales CMS is another step forward towards a better web design engineering and development.\n		</p>\n</article>\n	</div>\n	<div class="span4 services">\n		<div class="serv_icon hi-icon-effect-9 hi-icon-effect-9a">\n			<span class="hi-icon"><img src="/attached/image/content/031831_99925.png" width="" height="" title="" align="" alt="" /></span> \n		</div>\n<article class="content content2">\n		<h5>\n			What''s new?\n		</h5>\n		<ul>\n			<li>\n				Gallery module that can support image, audio, video, YouTube and Vimeo.\n			</li>\n			<li>\n				New Graphical User Interface (GUI).\n			</li>\n			<li>\n				New themes.\n			</li>\n			<li>\n				New and updated plugins.\n			</li>\n		</ul>\n</article>\n	</div>\n	<div class="span4 services">\n		<div class="serv_icon hi-icon-effect-9 hi-icon-effect-9a">\n			<span class="hi-icon"><img src="/attached/image/content/031747_31261.png" width="" height="" title="" align="" alt="" /></span> \n		</div>\n<article class="content content2">\n		<h5>\n			Downloads\n		</h5>\n		<ul>\n			<li>\n				Sylver Scales CMS V 1.0 : <a href="https://github.com/ace-draconis/sylverscales/archive/master.zip" target="_blank">Click here</a> \n			</li>\n		</ul>\n		<center>\n			<a href="https://github.com/ace-draconis" target="_blank"><img src="/attached/image/content/031703_70221.png" width="" height="" title="" align="" alt="" /></a> \n		</center>\n</article>\n	</div>\n	<div class="span12">\n		<br />\n	</div>\n	<div class="span8">\n		<div class="content" style="margin-bottom:20px;">\n			<h4>\n				<img src="/attached/image/content/workflow.png" alt="" width="" height="" title="" align="" /> \n			</h4>\n		</div>\n	</div>\n	<div class="span4 services">\n		<div class="serv_icon hi-icon-effect-9 hi-icon-effect-9a">\n			<span class="hi-icon"><img src="/attached/image/content/031722_52118.png" width="" height="" title="" align="" alt="" /></span> \n		</div>\n<article class="content content2">\n		<h5>\n			Notice\n		</h5>\n		<ul>\n			<li>\n				Sylver Hyve CMS and Sylver Scales CMS was released as an Open Source software under the <a href="http://opensource.org/licenses/mit-license.php" target="_blank">The MIT License (MIT)</a>.\n			</li>\n		</ul>\n		<h5>\n			Fund this project\n		</h5>\n		<center>\n			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">\n				<input type="hidden" name="cmd" value="_s-xclick" /> <input type="hidden" name="hosted_button_id" value="Z75EPYBGLH4UL" /> <input type="image" src="http://www.pomyc.org/images/donate-btn.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" /> <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1" /> \n			</form>\n		</center>\n</article>\n	</div>\n</div>', 0, '', '_self'),
(2, 1, 'Table', '<div class="row">\r\n	<div class="span6">\r\n		<h3 class="title">\r\n			Table\r\n		</h3>\r\n		<table>\r\n			<tbody>\r\n				<tr class="success">\r\n					<th>\r\n						Lorem\r\n					</th>\r\n					<th>\r\n						Ipsum\r\n					</th>\r\n					<th>\r\n						Dolor\r\n					</th>\r\n					<th>\r\n						Amet\r\n					</th>\r\n				</tr>\r\n				<tr>\r\n					<td>\r\n						1\r\n					</td>\r\n					<td>\r\n						2\r\n					</td>\r\n					<td>\r\n						3\r\n					</td>\r\n					<td>\r\n						4\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td>\r\n						1\r\n					</td>\r\n					<td>\r\n						2\r\n					</td>\r\n					<td>\r\n						3\r\n					</td>\r\n					<td>\r\n						4\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td>\r\n						1\r\n					</td>\r\n					<td>\r\n						2\r\n					</td>\r\n					<td>\r\n						3\r\n					</td>\r\n					<td>\r\n						4\r\n					</td>\r\n				</tr>\r\n				<tr>\r\n					<td>\r\n						1\r\n					</td>\r\n					<td>\r\n						2\r\n					</td>\r\n					<td>\r\n						3\r\n					</td>\r\n					<td>\r\n						4\r\n					</td>\r\n				</tr>\r\n			</tbody>\r\n			<tbody>\r\n				<tr>\r\n					<td>\r\n						1\r\n					</td>\r\n					<td>\r\n						2\r\n					</td>\r\n					<td>\r\n						3\r\n					</td>\r\n					<td>\r\n						4\r\n					</td>\r\n				</tr>\r\n			</tbody>\r\n		</table>\r\n	</div>\r\n	<div class="span6">\r\n		<h3 class="title">\r\n			Alerts\r\n		</h3>\r\n		<div class="alert alert-info">\r\n			<button class="close" data-dismiss="alert">x</button><b>Heads up!</b> This alert needs your attention, but it''''s not super important.\r\n		</div>\r\n		<div class="alert alert-success">\r\n			<button class="close" data-dismiss="alert">x</button><b>Well done!</b> You successfully read this important alert message.\r\n		</div>\r\n		<div class="alert">\r\n			<button class="close" data-dismiss="alert">x</button> <b>Warning!</b> Best check yo self, you''''re not looking too good.\r\n		</div>\r\n		<div class="alert alert-error">\r\n			<button class="close" data-dismiss="alert">x</button><b>Oh snap!</b> Change a few things up and try submitting again.\r\n		</div>\r\n	</div>\r\n	<div class="span8">\r\n		<h3 class="title">\r\n			Buttons\r\n		</h3>\r\n		<h5>\r\n			Large Button\r\n		</h5>\r\n<button class="btn btn-large">Default</button> <button class="btn btn-large btn-primary">Primary</button> <button class="btn btn-large btn-info">Info</button> <button class="btn btn-large btn-success">Success</button> <button class="btn btn-large btn-warning">Warning</button> <button class="btn btn-large btn-danger">Danger</button> <button class="btn btn-large btn-inverse">Inverse</button> \r\n		<h5>\r\n			Default Button\r\n		</h5>\r\n<button class="btn">Default</button> <button class="btn btn-primary">Primary</button> <button class="btn btn-info">Info</button> <button class="btn btn-success">Success</button> <button class="btn btn-warning">Warning</button> <button class="btn btn-danger">Danger</button> <button class="btn btn-inverse">Inverse</button> \r\n		<h5>\r\n			Small Button\r\n		</h5>\r\n<button class="btn btn-small">Default</button> <button class="btn btn-small btn-primary">Primary</button> <button class="btn btn-small btn-info">Info</button> <button class="btn btn-small btn-success">Success</button> <button class="btn btn-small btn-warning">Warning</button> <button class="btn btn-small btn-danger">Danger</button> <button class="btn btn-small btn-inverse">Inverse</button> \r\n		<h5>\r\n			Mini Button\r\n		</h5>\r\n<button class="btn btn-mini">Default</button> <button class="btn btn-mini btn-primary">Primary</button> <button class="btn btn-mini btn-info">Info</button> <button class="btn btn-mini btn-success">Success</button> <button class="btn btn-mini btn-warning">Warning</button> <button class="btn btn-mini btn-danger">Danger</button> <button class="btn btn-mini btn-inverse">Inverse</button> \r\n	</div>\r\n	<div class="span4">\r\n		<h3 class="title">\r\n			Container\r\n		</h3>\r\n		<div class="services">\r\n			<div>\r\n				<img src="/attached/image/content/20150726065713_81726.jpg" alt="" width="" height="" title="" align="" /> \r\n			</div>\r\n<article class="content">\r\n				<span class="strip"></span> \r\n			<h4>\r\n				Proin Fringilla\r\n			</h4>\r\n			<p>\r\n				Mattis lacinia tristique nulla a mattis. Proin fringilla turpis sit amet nunc blandit vehicula. Nulla quis purus ut erat luctus turpis.\r\n			</p>\r\n</article>\r\n		</div>\r\n	</div>\r\n</div>', 0, 'google.com', '_blank'),
(3, 1, 'Paragraph', '<div class="row">\r\n	<div class="span12">\r\n		<h3 class="title">\r\n			Paragraphs\r\n		</h3>\r\n		<p>\r\n			I am a web developer and web designer that love to play and experiments with web technologies. I enjoy exploring new ideas, developing websites &amp; open-source web-based applications. I am fluent in PHP, MySQL, HTML, CSS, Ajax, &amp; jQuery. I love developing and designing modern mobile-ready website that is fully responsive, have fluid layout and contents, using single page parallax style, make full use of grid layout design and contains a lot of interactive and intuitive contents. My focus are narrowed down more on research &amp; development. I welcome anyone who are interested in contributing their ideas, comments &amp; feedback to improve projects.\r\n		</p>\r\n		<p>\r\n			My career as freelance web designers &amp; developers begin back in the early 2006. I started out without any proper educations &amp; training in web technologies. I begin experimenting with web design when I work as a legal clerk in a local law firm in town. My debut website is the law firm''s website where I work at and I even develop an online system that helps them managing the cases and clients. My masters are the two respectable and experienced lawyers there. They are very supportive &amp; admirable they made me who I am today. After many years I finally decided to setup my own company the Sylver Web and currently, I am furthering my studies in Web Technologies so that I can enhance my knowledge &amp; expands my researches.\r\n		</p>\r\n	</div>\r\n	<div class="span6">\r\n		<h3 class="title">\r\n			Headings\r\n		</h3>\r\n		<h1>\r\n			H1 : LOREM IPSUM\r\n		</h1>\r\n		<h2>\r\n			H2 : LOREM IPSUM\r\n		</h2>\r\n		<h3>\r\n			H3 : LOREM IPSUM\r\n		</h3>\r\n		<h4>\r\n			H4 : LOREM IPSUM\r\n		</h4>\r\n		<h5>\r\n			H5 : LOREM IPSUM\r\n		</h5>\r\n		<h6>\r\n			H6 : LOREM IPSUM\r\n		</h6>\r\n	</div>\r\n	<div class="span6">\r\n		<h3 class="title">\r\n			Quotes\r\n		</h3>\r\n		<blockquote>\r\n			<p>\r\n				"Mauris turpis diam, mollis eget vulputate nec, suscipit sit amet nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean sodales vulputate sapien sit amet vehicula. Nam quis turpis in lectus facilisis fermentum. Mauris ut eros nulla."\r\n			</p>\r\n		</blockquote>\r\n		<blockquote>\r\n			"Mauris turpis diam, mollis eget vulputate nec, suscipit sit amet nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean sodales vulputate sapien sit amet vehicula. Nam quis turpis in lectus facilisis fermentum. Mauris ut eros nulla."\r\n		</blockquote>\r\n		<blockquote>\r\n			<small> "Mauris turpis diam, mollis eget vulputate nec, suscipit sit amet nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean sodales vulputate sapien sit amet vehicula. Nam quis turpis in lectus facilisis fermentum. Mauris ut eros nulla."</small> \r\n		</blockquote>\r\n	</div>\r\n	<div class="span12">\r\n		<h3 class="title">\r\n			Columns\r\n		</h3>\r\n	</div>\r\n	<div class="span6">\r\n		Curabitur dui sapien, mollis ac luctus in, pulvinar quis est. Fusce ullamcorper, orci in molestie dictum, mauris dolor consectetur libero, et congue ante arcu sit amet lectus. Cras cursus nulla ac eros euismod ac malesuada lectus aliquam. Nunc consectetur velit dictum risus adipiscing ullamcorper.\r\n	</div>\r\n	<div class="span6">\r\n		Curabitur dui sapien, mollis ac luctus in, pulvinar quis est. Fusce ullamcorper, orci in molestie dictum, mauris dolor consectetur libero, et congue ante arcu sit amet lectus. Cras cursus nulla ac eros euismod ac malesuada lectus aliquam. Nunc consectetur velit dictum risus adipiscing ullamcorper.\r\n	</div>\r\n	<div class="span12">\r\n		<br />\r\n	</div>\r\n	<div class="span4">\r\n		Nunc posuere bibendum venenatis. Curabitur sagittis nulla id leo adipiscing rutrum. Nam vitae ligula vel ipsum tempus volutpat. Praesent eu ante id lacus pellentesque aliquet sit amet sed urna.\r\n	</div>\r\n	<div class="span4">\r\n		Nunc posuere bibendum venenatis. Curabitur sagittis nulla id leo adipiscing rutrum. Nam vitae ligula vel ipsum tempus volutpat. Praesent eu ante id lacus pellentesque aliquet sit amet sed urna.\r\n	</div>\r\n	<div class="span4">\r\n		Nunc posuere bibendum venenatis. Curabitur sagittis nulla id leo adipiscing rutrum. Nam vitae ligula vel ipsum tempus volutpat. Praesent eu ante id lacus pellentesque aliquet sit amet sed urna.\r\n	</div>\r\n	<div class="span12">\r\n		<br />\r\n	</div>\r\n	<div class="span3">\r\n		Quisque id nisl non quam sagittis tincidunt non ac nisi.Vivamus hendrerit dui sodales augue laoreet ac bibendum turpis blandit.\r\n	</div>\r\n	<div class="span3">\r\n		Quisque id nisl non quam sagittis tincidunt non ac nisi.Vivamus hendrerit dui sodales augue laoreet ac bibendum turpis blandit.\r\n	</div>\r\n	<div class="span3">\r\n		Quisque id nisl non quam sagittis tincidunt non ac nisi.Vivamus hendrerit dui sodales augue laoreet ac bibendum turpis blandit.\r\n	</div>\r\n	<div class="span3">\r\n		Quisque id nisl non quam sagittis tincidunt non ac nisi.Vivamus hendrerit dui sodales augue laoreet ac bibendum turpis blandit.\r\n	</div>\r\n	<div class="span12">\r\n		<br />\r\n	</div>\r\n	<div class="span2">\r\n		Fusce a neque at velit hendrerit bibendum. Morbi malesuada luctus lectus.\r\n	</div>\r\n	<div class="span2">\r\n		Fusce a neque at velit hendrerit bibendum. Morbi malesuada luctus lectus.\r\n	</div>\r\n	<div class="span2">\r\n		Fusce a neque at velit hendrerit bibendum. Morbi malesuada luctus lectus.\r\n	</div>\r\n	<div class="span2">\r\n		Fusce a neque at velit hendrerit bibendum. Morbi malesuada luctus lectus.\r\n	</div>\r\n	<div class="span2">\r\n		Fusce a neque at velit hendrerit bibendum. Morbi malesuada luctus lectus.\r\n	</div>\r\n	<div class="span2">\r\n		Fusce a neque at velit hendrerit bibendum. Morbi malesuada luctus lectus.\r\n	</div>\r\n</div>', 0, '', '_self'),
(4, 1, 'Lists', '<div class="row">\n	<div class="span12">\n		<h3 class="title">\n			Lists Style\n		</h3>\n	</div>\n	<div class="span4">\n		<h4>\n			Unordered list:\n		</h4>\n		<ul class="unorderedList">\n			<li>\n				corporis suscipit laboriosam\n			</li>\n			<li>\n				labore et dolore magnam\n			</li>\n			<li>\n				quaerat voluptatem\n			</li>\n			<li>\n				architecto beatae\n			</li>\n			<li>\n				quis nostrum exercitationem\n			</li>\n		</ul>\n	</div>\n	<div class="span4">\n		<h4>\n			Ordered list:\n		</h4>\n		<ol class="orderedList">\n			<li>\n				corporis suscipit laboriosam\n			</li>\n			<li>\n				labore et dolore magnam\n			</li>\n			<li>\n				quaerat voluptatem\n			</li>\n			<li>\n				architecto beatae\n			</li>\n			<li>\n				quis nostrum exercitationem\n			</li>\n		</ol>\n	</div>\n	<div class="span4">\n		<h4>\n			Custom list:\n		</h4>\n		<ul class="customList">\n			<li class="checked">\n				corporis suscipit laboriosam\n			</li>\n			<li class="unchecked">\n				labore et dolore magnam\n			</li>\n			<li class="checked">\n				quaerat voluptatem\n			</li>\n			<li class="checked">\n				architecto beatae\n			</li>\n			<li class="checked">\n				quis nostrum exercitationem\n			</li>\n		</ul>\n	</div>\n	<div class="span12">\n		<h3 class="title">\n			Progress Bar\n		</h3>\n	</div>\n	<div class="span4">\n		<h5 class="title">\n			Progress Bar Striped Active\n		</h5>\n		<div class="progress progress-info progress-striped active">\n			<div class="bar" style="width:89%;">\n				<span>Info 89%</span> \n			</div>\n		</div>\n		<div class="progress progress-success progress-striped active">\n			<div class="bar" style="width:93%;">\n				<span>Success 93%</span> \n			</div>\n		</div>\n		<div class="progress progress-warning progress-striped active">\n			<div class="bar" style="width:75%;">\n				<span>Warning75%</span> \n			</div>\n		</div>\n		<div class="progress progress-danger progress-striped active">\n			<div class="bar" style="width:96%;">\n				<span>Danger 96%</span> \n			</div>\n		</div>\n	</div>\n	<div class="span4">\n		<h5 class="title">\n			Progress Bar Striped\n		</h5>\n		<div class="progress progress-info progress-striped">\n			<div class="bar" style="width:89%;">\n				<span>Info 89%</span> \n			</div>\n		</div>\n		<div class="progress progress-success progress-striped">\n			<div class="bar" style="width:93%;">\n				<span>Success 93%</span> \n			</div>\n		</div>\n		<div class="progress progress-warning progress-striped">\n			<div class="bar" style="width:75%;">\n				<span>Warning75%</span> \n			</div>\n		</div>\n		<div class="progress progress-danger progress-striped">\n			<div class="bar" style="width:96%;">\n				<span>Danger 96%</span> \n			</div>\n		</div>\n	</div>\n	<div class="span4">\n		<h5 class="title">\n			Progress Bar\n		</h5>\n		<div class="progress progress-info">\n			<div class="bar" style="width:89%;">\n				<span>Info 89%</span> \n			</div>\n		</div>\n		<div class="progress progress-success">\n			<div class="bar" style="width:93%;">\n				<span>Success 93%</span> \n			</div>\n		</div>\n		<div class="progress progress-warning">\n			<div class="bar" style="width:75%;">\n				<span>Warning75%</span> \n			</div>\n		</div>\n		<div class="progress progress-danger">\n			<div class="bar" style="width:96%;">\n				<span>Danger 96%</span> \n			</div>\n		</div>\n	</div>\n</div>', 0, '#', '_self'),
(5, 1, 'About Me', '<div class="row">\r\n	<div class="span12">\r\n		<h3 class="title">\r\n			The Mastermind\r\n		</h3>\r\n	</div>\r\n	<div class="span4">\r\n		<!--**Team Wrapper**-->\r\n		<div class="team-wrapper">\r\n			<h4>\r\n				REVOLUTIONIST\r\n			</h4>\r\n			<h5 class="title">\r\n				Ace Vincent Draconis\r\n			</h5>\r\n<br />\r\n			<div class="rounded-image">\r\n				<span><img src="/attached/image/20151115/20151115161825_47054.jpg" alt="" width="" height="" title="" align="" /></span> \r\n			</div>\r\n			<div class="social-share grey">\r\n				<a href="https://www.facebook.com/vincent.draconis" target="_blank" class="facebook"></a> <a href="https://twitter.com/sylverduzt" target="_blank" class="twitter"></a> <a href="https://www.google.com/+AceDraconis" target="_blank" class="google"></a> \r\n			</div>\r\n			<div class="cont">\r\n				<h5>\r\n					I''m a\r\n				</h5>\r\nWeb Designer <span> + </span> Web Developer <span> + </span> UI/UX Designer <span> + </span> Graphic Designer <span>+ </span> Optimist <span> + </span> Idealist <span> + </span> Realist <span> +</span> Rebel <br />\r\n<br />\r\n				<h5>\r\n					I''m good with\r\n				</h5>\r\nPHP <span> + </span> MySql <span> + </span> HTML <span> + </span> CSS <span> + </span> jQuery <span> + </span> AJAX <span> + </span> UI/UX <span> + </span> Grids <span> + </span> Minimalist <span> + </span> Fluid <span> + </span> Fully-Responsive (Mobile-ready) <span> + </span> Single-Page Website\r\n			</div>\r\n		</div>\r\n<!--**Team Wrapper - End**-->\r\n	</div>\r\n	<div class="span4">\r\n		<!--**Team Wrapper**-->\r\n		<div class="team-wrapper">\r\n			<h4>\r\n				SKILL SET\r\n			</h4>\r\n			<h5 class="title">\r\n				Web Design Proficiency\r\n			</h5>\r\n<br />\r\n<br />\r\n			<div class="progress progress-01">\r\n				<div class="bar" style="width:89%;">\r\n					PHP + MYSQL<span>89%</span> \r\n				</div>\r\n			</div>\r\n			<div class="progress progress-02">\r\n				<div class="bar" style="width:93%;">\r\n					HTML + CSS<span> 93%</span> \r\n				</div>\r\n			</div>\r\n			<div class="progress progress-03">\r\n				<div class="bar" style="width:83%;">\r\n					JAVASCRIPT + JQUERY + AJAX<span>83%</span> \r\n				</div>\r\n			</div>\r\n			<div class="progress progress-04">\r\n				<div class="bar" style="width:85%;">\r\n					GRAPHIC + UI/UX DESIGN<span>85%</span> \r\n				</div>\r\n			</div>\r\n			<h5 class="title">\r\n				Software Proficiency<br />\r\n<br />\r\n			</h5>\r\n<img src="/attached/image/content/20140919160148_50827.png" alt="" width="" height="" title="" align="" class="icn" /> <img src="/attached/image/content/20140919154949_56724.png" width="" height="" alt="" title="" align="" class="icn" /> <img src="/attached/image/content/20140919160245_12502.png" alt="" width="" height="" title="" align="" class="icn" /> <img src="/attached/image/content/20140919160352_59295.png" alt="" width="" height="" title="" align="" class="icn" /> <img src="/attached/image/content/20140919160420_22757.png" alt="" width="" height="" title="" align="" class="icn" /> <img src="/attached/image/content/20140919160507_43733.png" alt="" width="" height="" title="" align="" class="icn" /> <br />\r\n<br />\r\n			<div class="progress progress-05">\r\n				<div class="bar" style="width:89%;">\r\n					WeBuilder + Dreamweaver<span>89%</span> \r\n				</div>\r\n			</div>\r\n			<div class="progress progress-06">\r\n				<div class="bar" style="width:82%;">\r\n					Photoshop + Fireworks<span> 82%</span> \r\n				</div>\r\n			</div>\r\n			<div class="progress progress-07">\r\n				<div class="bar" style="width:75%;">\r\n					Illustrator<span>75%</span> \r\n				</div>\r\n			</div>\r\n			<div class="progress progress-08" style="margin-bottom:5px;">\r\n				<div class="bar" style="width:45%;">\r\n					Flash<span>45%</span> \r\n				</div>\r\n			</div>\r\n		</div>\r\n<!--**Team Wrapper - End**-->\r\n	</div>\r\n	<div class="span4">\r\n		<!--**Team Wrapper**-->\r\n		<div class="team-wrapper">\r\n			<h4>\r\n				EXPERIENCES\r\n			</h4>\r\n			<div class="cont">\r\n				<h5 class="title">\r\n					2011-2012\r\n				</h5>\r\n<br />\r\n<strong>VISHTECH, DYNAMIC IT SOLUTION</strong><br />\r\nWeb Designer &amp; Developer, Head of R&amp;D Dept. <br />\r\n				<h5 class="title">\r\n					2009-2013\r\n				</h5>\r\n<br />\r\n<strong>GAN RAO &amp; CHUAH </strong> <span>+</span> <strong>RAO &amp; CO</strong><br />\r\nWeb Designer &amp; Developer, Head of IT Dept. <br />\r\n				<h5 class="title">\r\n					2013-RECENT\r\n				</h5>\r\n<br />\r\n<strong>Sylver Web, Web Engineering</strong><br />\r\nCEO &amp; FOUNDER, Web Designer &amp; Developer.\r\n			</div>\r\n			<h4>\r\n				EDUCATION\r\n			</h4>\r\n			<div class="cont">\r\n				<h5 class="title">\r\n					2004-2009\r\n				</h5>\r\n<br />\r\n<strong>Universiti Teknologi Malaysia (UTMKL), Malaysia</strong> Diploma in Computer Science (Multimedia) <br />\r\n				<h5 class="title">\r\n					2009\r\n				</h5>\r\n<br />\r\n<strong>Microsoft Certified Technology Specialist (MCTS)</strong><br />\r\n.NET Framework, Web Applications Development<br />\r\n				<h5 class="title">\r\n					2013-NOW\r\n				</h5>\r\n<br />\r\n<strong>Universiti Tun Hussein Onn (UTHM), Malaysia</strong> BCompSc (Web Technology)\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>', 0, '', '_self');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arrange` int(11) NOT NULL,
  `mode` text NOT NULL,
  `ref` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `arrange`, `mode`, `ref`) VALUES
(1, 1, 'page', 1),
(2, 2, 'page', 2),
(3, 3, 'page', 3),
(4, 4, 'page', 4),
(5, 5, 'page', 5),
(6, 6, 'module', 4);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

DROP TABLE IF EXISTS `module`;
CREATE TABLE IF NOT EXISTS `module` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arrange` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `url` text CHARACTER SET utf8 NOT NULL,
  `enable` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `arrange`, `name`, `url`, `enable`) VALUES
(1, 1, 'Theme', 'module/theme/theme.php', 1),
(2, 2, 'Banner', 'module/banner/banner.php ', 1),
(3, 3, 'Social Links', 'module/social/social.php', 1),
(4, 4, 'Gallery', 'gallery.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` text COLLATE latin1_general_ci NOT NULL,
  `domain` text COLLATE latin1_general_ci NOT NULL,
  `logo` text COLLATE latin1_general_ci NOT NULL,
  `title` text COLLATE latin1_general_ci NOT NULL,
  `description` text COLLATE latin1_general_ci NOT NULL,
  `keyword` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `company`, `domain`, `logo`, `title`, `description`, `keyword`) VALUES
(1, 'Sylver Web', '', '/attached/image/content/20150725145733_66769.png', 'Sylver Scales | CMS Engineering', 'Sylver Scales CMS | A Web Content Management System; an application used to upload, edit, and manage content displayed on a website. It can generate a fluid, mobile-ready, fully responsive, single page parallax website.', 'Content Management System, CMS, \r\nWebsite, Parallax, Mobile Ready, Fluid, Full \r\nResponsive, Free Content Management System, AJAX, PHP, Mysqli, Minimalist, Web Developer, Web Designer, Web Design, Modern Website, SEO, Search Engine Optimization, Best CMS, Web Development, Rapid Prototyping');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

DROP TABLE IF EXISTS `social`;
CREATE TABLE IF NOT EXISTS `social` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `arrange` int(11) NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  `url` text CHARACTER SET utf8 NOT NULL,
  `target` text CHARACTER SET utf8 NOT NULL,
  `enable` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `arrange`, `name`, `url`, `target`, `enable`) VALUES
(1, 4, 'twitter-bird', '#', '_blank', 1),
(2, 3, 'dribble', '#', '_blank', 1),
(3, 10, 'rss', '#', '_blank', 1),
(4, 11, 'digg', ' #', '_blank', 1),
(5, 5, 'youtube', ' #', '_blank', 1),
(6, 12, 'vimeo', '#', '_blank', 1),
(7, 7, 'deviantart', '#', '_blank', 1),
(8, 1, 'google', '#', '_blank', 1),
(9, 6, 'twitter', '#', '_blank', 1),
(10, 9, 'picasa', '#', '_blank', 1),
(11, 2, 'facebook', '#', '_blank', 1),
(12, 8, 'skype', '#', '_blank', 1);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text COLLATE latin1_general_ci NOT NULL,
  `enable` int(11) NOT NULL,
  `theme` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `vary` text COLLATE latin1_general_ci,
  `mode` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `name`, `enable`, `theme`, `vary`, `mode`) VALUES
(1, 'Venom', 0, 'venom', 'light', ''),
(2, 'Alpha', 1, 'alpha', 'light', 'fade');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `post` int(11) NOT NULL,
  `enable` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
