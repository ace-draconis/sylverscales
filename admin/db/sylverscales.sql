-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2016 at 11:42 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `arrange`, `banner`, `caps`, `enable`) VALUES
(1, 1, '/attached/image/banner/01.jpg', 'What we do?', 1),
(2, 2, '/attached/image/banner/03.jpg', 'Sylver Scales CMS', 1);

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
(1, 'ace@sylverweb.com.my', '9385-M, Taman Ayer Molek, Melaka', 'Sylver Web', '<h3 class="title">\r\n	Contact Us\r\n</h3>\r\n<div id="map" style="text-align:center;">\r\n	<br />\r\n<br />\r\n<br />\r\n<span style="color:#E53333;font-size:32px;">Map only visible on website</span> \r\n</div>\r\n<h5>\r\n	MAIN OFFICE\r\n</h5>\r\n<p>\r\n	No. 9385-M, Jalan Ayer Molek, \r\nTaman Ayer Molek, <br />\r\nAyer Molek, \r\n75460 Melaka\r\n</p>\r\n<ul class="unorderedList">\r\n	<li>\r\n		<strong>Tel:</strong> +6018 - 7719177\r\n	</li>\r\n	<li>\r\n		<strong>Email:</strong> enquiry@sylverweb.com.my\r\n	</li>\r\n	<li>\r\n		<strong>Website:</strong> www.sylverweb.com.my\r\n	</li>\r\n</ul>');

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `filter`
--

INSERT INTO `filter` (`id`, `arrange`, `enable`, `name`) VALUES
(1, 1, 1, 'Website'),
(2, 2, 1, 'Video'),
(3, 3, 1, 'System');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `arrange`, `enable`, `filter`, `type`, `content`, `title`, `descr`) VALUES
(1, 8, 1, 'Video', 'youtube', 'http://www.youtube.com/embed/XyQLzwSu1d8', 'UN-BEAR-ABLE', 'A short clay animation project that use the stop motion techniques and clay models for our short semester multimedia course''s assignments.'),
(2, 7, 1, 'Website', 'image', '/attached/image/portfolio/20151115174335_76343.jpg', 'Messrs Gan Rao & Chuah', 'Fully Responsive Single-Page website for an active and law firm in Malacca, Malaysia.<br>\r\nURL: <a href="http://www.ganraochuah.com" target="_blank">http://www.ganraochuah.com</a>'),
(3, 1, 1, 'System', 'image', '/attached/image/portfolio/20151115162747_64063.jpg', 'Sylver Hyve CMS', 'Our company''s pride. The first prototype of our Custom Website CMS. Ceased its development on 28th of August 2014 and replaced with Sylver Scales CMS'),
(4, 2, 1, 'System', 'image', '/attached/image/portfolio/20151115163044_18882.jpg', 'Sylver Scales CMS', 'The successor of Sylver Hyve CMS. It offers new MVC framework, gallery module, new features and new themes. <a href="https://bitbucket.org/sylverduzt/sylverscales/downloads" target="_blank">Link</a>'),
(5, 6, 1, 'Website', 'image', '/attached/image/portfolio/20151115170932_84119.jpg', 'Messrs RAO & CO', 'Fully Responsive Single-Page website for a legal firm in Malacca, Malaysia. V1<br>\r\nURL: <a href="http://v1.sraoco.com/" target="_blank">http://v1.sraoco.com/</a>'),
(6, 5, 1, 'Website', 'image', '/attached/image/portfolio/20151115171238_81227.jpg', 'Messrs RAO & CO.', 'Fully Responsive Horizontal Sliding website for a legal firm in Malacca, Malaysia. V2<br>\r\nURL: <a href="http://www.sraoco.com/" target="_blank">http://www.sraoco.com/</a>'),
(7, 4, 1, 'Website', 'image', '/attached/image/portfolio/20151115172427_86780.jpg', 'ICSEWR 2015', 'Website for INTERNATIONAL CONFERENCE ON SUSTAINABLE\r\nENVIRONMENT & WATER RESEARCH 2015<br>\r\nURL: <a href="http://icsewr.uthm.edu.my/" target="_blank">http://icsewr.uthm.edu.my/</a>'),
(8, 3, 1, 'System', 'image', '/attached/image/portfolio/20151115173730_60630.jpg', 'Sylver Fang CMS', 'The successor of Sylver Scales CMS. It offers new MVC framework and new themes. Under Development, no plan for release yet.');

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
(1, 1, 'Sylver Scales', '<div class="row">\r\n	<div class="span4 services">\r\n		<img src="/attached/image/content/20151117053838_89475.jpg" width="" height="" title="" align="" alt="" /> <article class="content content2"><span class="strip"></span> \r\n		<h5>\r\n			Sylver Scales CMS?\r\n		</h5>\r\n		<p>\r\n			Sylver Scales is a <strong>website builder</strong> or <strong>website content management system</strong> that can create, modify and publish a fully responsive <strong>mobile-ready single-page website</strong> \r\n		</p>\r\n</article>\r\n	</div>\r\n	<div class="span4 services">\r\n		<div class="serv_icon hi-icon-effect-9 hi-icon-effect-9a">\r\n			<span class="hi-icon"><img src="/attached/image/content/031831_99925.png" width="" height="" title="" align="" alt="" /></span> \r\n		</div>\r\n<article class="content content2"><span class="strip"></span> \r\n		<h5>\r\n			What is Website CMS?\r\n		</h5>\r\n		<p>\r\n			WCMS is a program that can create, modify and&nbsp;publish website contents from a central interface. It simplify the complex task of writing numerous versions of codes and makes website development process more flexible.\r\n		</p>\r\n</article>\r\n	</div>\r\n	<div class="span4 services">\r\n		<div class="serv_icon hi-icon-effect-9 hi-icon-effect-9a">\r\n			<span class="hi-icon"><img src="/attached/image/content/idea.png" width="" height="" title="" align="" alt="" /></span> \r\n		</div>\r\n<article class="content content2"><span class="strip"></span> \r\n		<h5>\r\n			Why need it?\r\n		</h5>\r\n		<p>\r\n			Sylver Scales can speed up website development + produce high quality and modern website + easy to use + save time and cost + increase productivity\r\n		</p>\r\n</article>\r\n	</div>\r\n	<div class="span12">\r\n		<br />\r\n	</div>\r\n	<div class="span4 services">\r\n		<div class="serv_icon hi-icon-effect-9 hi-icon-effect-9a">\r\n			<span class="hi-icon"><img src="/attached/image/content/031840_85042.png" width="" height="" title="" align="" alt="" /></span> \r\n		</div>\r\n<article class="content content2"> <span class="strip"></span> \r\n		<h5>\r\n			Sylver Scales CMS Features\r\n		</h5>\r\n		<ul>\r\n			<li>\r\n				WYSIWYG editor with file manager.\r\n			</li>\r\n			<li>\r\n				Gallery module that can support image, audio, video.\r\n			</li>\r\n			<li>\r\n				Single-Page &amp; Mobile Ready themes.\r\n			</li>\r\n			<li>\r\n				SEO optimization module.\r\n			</li>\r\n		</ul>\r\n</article>\r\n	</div>\r\n	<div class="span4 services">\r\n		<div class="serv_icon hi-icon-effect-9 hi-icon-effect-9a">\r\n			<span class="hi-icon"><img src="/attached/image/content/031913_36856.png" width="" height="" title="" align="" alt="" /></span> \r\n		</div>\r\n<article class="content content2"> <span class="strip"></span> \r\n		<h5>\r\n			Simple, Fast &amp; Easy\r\n		</h5>\r\n		<ul>\r\n			<li>\r\n				Easy installation &amp; deployment\r\n			</li>\r\n			<li>\r\n				Pre-Installed themes &amp; sample contents.\r\n			</li>\r\n			<li>\r\n				Simple CMS features &amp; Easy to use.\r\n			</li>\r\n			<li>\r\n				Website rapid prototyping &amp; development.\r\n			</li>\r\n		</ul>\r\n</article>\r\n	</div>\r\n	<div class="span4 services">\r\n		<div class="serv_icon hi-icon-effect-9 hi-icon-effect-9a">\r\n			<span class="hi-icon"><img src="/attached/image/content/031934_21008.png" width="" height="" title="" align="" alt="" /></span> \r\n		</div>\r\n<article class="content content2"> <span class="strip"></span> \r\n		<h5>\r\n			Cuztomizable\r\n		</h5>\r\n		<ul>\r\n			<li>\r\n				Use PHP &amp; MySQL for easy development and modification.\r\n			</li>\r\n			<li>\r\n				Cuztomizable pre-installed themes.\r\n			</li>\r\n			<li>\r\n				Modular &amp; cuztomizable MVC framework.\r\n			</li>\r\n		</ul>\r\n</article>\r\n	</div>\r\n	<div class="span12">\r\n		<br />\r\n	</div>\r\n	<div class="span8">\r\n		<div class="content" style="margin-bottom:20px;">\r\n			<h4 style="text-align:center;">\r\n				<img src="/attached/image/content/workflow.png" alt="" width="80%" height="" title="" align="" /> \r\n			</h4>\r\n		</div>\r\n	</div>\r\n	<div class="span4 services">\r\n		<div class="serv_icon hi-icon-effect-9 hi-icon-effect-9a">\r\n			<span class="hi-icon"><img src="/attached/image/content/who.png" width="" height="" title="" align="" alt="" /></span> \r\n		</div>\r\n<article class="content content2"><span class="strip"></span> \r\n		<h5>\r\n			Who need it?\r\n		</h5>\r\n		<ul>\r\n			<li>\r\n				Sylver Scales is a perfect tool for web designers + web developers.\r\n			</li>\r\n			<li>\r\n				It is user friendly for non-technical users and suitable as educational materials\r\n			</li>\r\n			<li>\r\n				Suitable for company profile, personal website, online portfolio or online resume.\r\n			</li>\r\n		</ul>\r\n</article>\r\n	</div>\r\n	<div class="span12">\r\n		<br />\r\n	</div>\r\n	<div class="span4 services">\r\n		<div class="serv_icon hi-icon-effect-9 hi-icon-effect-9a">\r\n			<span class="hi-icon"><img src="/attached/image/content/031747_31261.png" width="" height="" title="" align="" alt="" /></span> \r\n		</div>\r\n<article class="content content2">\r\n		<h5>\r\n			Downloads\r\n		</h5>\r\n		<ul>\r\n			<li>\r\n				Sylver Scales CMS : <a href="https://bitbucket.org/sylverduzt/sylverscales/downloads" target="_blank">Click here</a> \r\n			</li>\r\n		</ul>\r\n		<center>\r\n			<a href="https://github.com/ace-draconis/sylverscales" target="_blank"><img src="/attached/image/content/031703_70221.png" width="" height="" title="" align="" alt="" /></a> \r\n		</center>\r\n</article>\r\n	</div>\r\n	<div class="span4 services">\r\n		<div class="serv_icon hi-icon-effect-9 hi-icon-effect-9a">\r\n			<span class="hi-icon"><img src="/attached/image/content/commercial.png" width="" height="" title="" align="" alt="" /></span> \r\n		</div>\r\n<article class="content content2">\r\n		<h5>\r\n			Fund this project\r\n		</h5>\r\n		<center>\r\n			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">\r\n				<input type="hidden" name="cmd" value="_s-xclick" /> <input type="hidden" name="hosted_button_id" value="Z75EPYBGLH4UL" /> <input type="image" src="http://www.pomyc.org/images/donate-btn.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" /> <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1" /> \r\n			</form>\r\n		</center>\r\n</article>\r\n	</div>\r\n	<div class="span4 services">\r\n		<div class="serv_icon hi-icon-effect-9 hi-icon-effect-9a">\r\n			<span class="hi-icon"><img src="/attached/image/content/031722_52118.png" width="" height="" title="" align="" alt="" /></span> \r\n		</div>\r\n<article class="content content2">\r\n		<h5>\r\n			Notice\r\n		</h5>\r\n		<ul>\r\n			<li>\r\n				Sylver Scales CMS was released as an Open Source software under the <a href="/admin/LICENSE.md" target="_blank" class="youtube">The MIT License (MIT)</a>.\r\n			</li>\r\n		</ul>\r\n</article>\r\n	</div>\r\n</div>', 0, '', '_self'),
(2, 1, 'Documentation', '<div class="row"><div class="span6"><div class="content"><iframe src="/ViewerJS/#../attached/file/SLIDESHOW.pdf" width="100%" height="480px" webkitallowfullscreen="webkitallowfullscreen" allowfullscreen="allowfullscreen"></iframe></div></div><div class="span6"><div class="content"><iframe src="/ViewerJS/#../attached/file/BOOKLET.pdf" width="100%" height="480px" webkitallowfullscreen="webkitallowfullscreen" allowfullscreen="allowfullscreen"></iframe></div></div></div>', 0, 'google.com', '_blank'),
(3, 0, 'Paragraph', '<div class="row">\r\n	<div class="span12">\r\n		<h3 class="title">\r\n			Paragraphs\r\n		</h3>\r\n		<p>\r\n			I am a web developer and web designer that love to play and experiments with web technologies. I enjoy exploring new ideas, developing websites &amp; open-source web-based applications. I am fluent in PHP, MySQL, HTML, CSS, Ajax, &amp; jQuery. I love developing and designing modern mobile-ready website that is fully responsive, have fluid layout and contents, using single page parallax style, make full use of grid layout design and contains a lot of interactive and intuitive contents. My focus are narrowed down more on research &amp; development. I welcome anyone who are interested in contributing their ideas, comments &amp; feedback to improve projects.\r\n		</p>\r\n		<p>\r\n			My career as freelance web designers &amp; developers begin back in the early 2006. I started out without any proper educations &amp; training in web technologies. I begin experimenting with web design when I work as a legal clerk in a local law firm in town. My debut website is the law firm''s website where I work at and I even develop an online system that helps them managing the cases and clients. My masters are the two respectable and experienced lawyers there. They are very supportive &amp; admirable they made me who I am today. After many years I finally decided to setup my own company the Sylver Web and currently, I am furthering my studies in Web Technologies so that I can enhance my knowledge &amp; expands my researches.\r\n		</p>\r\n	</div>\r\n	<div class="span6">\r\n		<h3 class="title">\r\n			Headings\r\n		</h3>\r\n		<h1>\r\n			H1 : LOREM IPSUM\r\n		</h1>\r\n		<h2>\r\n			H2 : LOREM IPSUM\r\n		</h2>\r\n		<h3>\r\n			H3 : LOREM IPSUM\r\n		</h3>\r\n		<h4>\r\n			H4 : LOREM IPSUM\r\n		</h4>\r\n		<h5>\r\n			H5 : LOREM IPSUM\r\n		</h5>\r\n		<h6>\r\n			H6 : LOREM IPSUM\r\n		</h6>\r\n	</div>\r\n	<div class="span6">\r\n		<h3 class="title">\r\n			Quotes\r\n		</h3>\r\n		<blockquote>\r\n			<p>\r\n				"Mauris turpis diam, mollis eget vulputate nec, suscipit sit amet nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean sodales vulputate sapien sit amet vehicula. Nam quis turpis in lectus facilisis fermentum. Mauris ut eros nulla."\r\n			</p>\r\n		</blockquote>\r\n		<blockquote>\r\n			"Mauris turpis diam, mollis eget vulputate nec, suscipit sit amet nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean sodales vulputate sapien sit amet vehicula. Nam quis turpis in lectus facilisis fermentum. Mauris ut eros nulla."\r\n		</blockquote>\r\n		<blockquote>\r\n			<small> "Mauris turpis diam, mollis eget vulputate nec, suscipit sit amet nulla. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Aenean sodales vulputate sapien sit amet vehicula. Nam quis turpis in lectus facilisis fermentum. Mauris ut eros nulla."</small> \r\n		</blockquote>\r\n	</div>\r\n	<div class="span12">\r\n		<h3 class="title">\r\n			Columns\r\n		</h3>\r\n	</div>\r\n	<div class="span6">\r\n		Curabitur dui sapien, mollis ac luctus in, pulvinar quis est. Fusce ullamcorper, orci in molestie dictum, mauris dolor consectetur libero, et congue ante arcu sit amet lectus. Cras cursus nulla ac eros euismod ac malesuada lectus aliquam. Nunc consectetur velit dictum risus adipiscing ullamcorper.\r\n	</div>\r\n	<div class="span6">\r\n		Curabitur dui sapien, mollis ac luctus in, pulvinar quis est. Fusce ullamcorper, orci in molestie dictum, mauris dolor consectetur libero, et congue ante arcu sit amet lectus. Cras cursus nulla ac eros euismod ac malesuada lectus aliquam. Nunc consectetur velit dictum risus adipiscing ullamcorper.\r\n	</div>\r\n	<div class="span12">\r\n		<br />\r\n	</div>\r\n	<div class="span4">\r\n		Nunc posuere bibendum venenatis. Curabitur sagittis nulla id leo adipiscing rutrum. Nam vitae ligula vel ipsum tempus volutpat. Praesent eu ante id lacus pellentesque aliquet sit amet sed urna.\r\n	</div>\r\n	<div class="span4">\r\n		Nunc posuere bibendum venenatis. Curabitur sagittis nulla id leo adipiscing rutrum. Nam vitae ligula vel ipsum tempus volutpat. Praesent eu ante id lacus pellentesque aliquet sit amet sed urna.\r\n	</div>\r\n	<div class="span4">\r\n		Nunc posuere bibendum venenatis. Curabitur sagittis nulla id leo adipiscing rutrum. Nam vitae ligula vel ipsum tempus volutpat. Praesent eu ante id lacus pellentesque aliquet sit amet sed urna.\r\n	</div>\r\n	<div class="span12">\r\n		<br />\r\n	</div>\r\n	<div class="span3">\r\n		Quisque id nisl non quam sagittis tincidunt non ac nisi.Vivamus hendrerit dui sodales augue laoreet ac bibendum turpis blandit.\r\n	</div>\r\n	<div class="span3">\r\n		Quisque id nisl non quam sagittis tincidunt non ac nisi.Vivamus hendrerit dui sodales augue laoreet ac bibendum turpis blandit.\r\n	</div>\r\n	<div class="span3">\r\n		Quisque id nisl non quam sagittis tincidunt non ac nisi.Vivamus hendrerit dui sodales augue laoreet ac bibendum turpis blandit.\r\n	</div>\r\n	<div class="span3">\r\n		Quisque id nisl non quam sagittis tincidunt non ac nisi.Vivamus hendrerit dui sodales augue laoreet ac bibendum turpis blandit.\r\n	</div>\r\n	<div class="span12">\r\n		<br />\r\n	</div>\r\n	<div class="span2">\r\n		Fusce a neque at velit hendrerit bibendum. Morbi malesuada luctus lectus.\r\n	</div>\r\n	<div class="span2">\r\n		Fusce a neque at velit hendrerit bibendum. Morbi malesuada luctus lectus.\r\n	</div>\r\n	<div class="span2">\r\n		Fusce a neque at velit hendrerit bibendum. Morbi malesuada luctus lectus.\r\n	</div>\r\n	<div class="span2">\r\n		Fusce a neque at velit hendrerit bibendum. Morbi malesuada luctus lectus.\r\n	</div>\r\n	<div class="span2">\r\n		Fusce a neque at velit hendrerit bibendum. Morbi malesuada luctus lectus.\r\n	</div>\r\n	<div class="span2">\r\n		Fusce a neque at velit hendrerit bibendum. Morbi malesuada luctus lectus.\r\n	</div>\r\n</div>', 0, '', '_self'),
(4, 0, 'Lists', '<div class="row">\n	<div class="span12">\n		<h3 class="title">\n			Lists Style\n		</h3>\n	</div>\n	<div class="span4">\n		<h4>\n			Unordered list:\n		</h4>\n		<ul class="unorderedList">\n			<li>\n				corporis suscipit laboriosam\n			</li>\n			<li>\n				labore et dolore magnam\n			</li>\n			<li>\n				quaerat voluptatem\n			</li>\n			<li>\n				architecto beatae\n			</li>\n			<li>\n				quis nostrum exercitationem\n			</li>\n		</ul>\n	</div>\n	<div class="span4">\n		<h4>\n			Ordered list:\n		</h4>\n		<ol class="orderedList">\n			<li>\n				corporis suscipit laboriosam\n			</li>\n			<li>\n				labore et dolore magnam\n			</li>\n			<li>\n				quaerat voluptatem\n			</li>\n			<li>\n				architecto beatae\n			</li>\n			<li>\n				quis nostrum exercitationem\n			</li>\n		</ol>\n	</div>\n	<div class="span4">\n		<h4>\n			Custom list:\n		</h4>\n		<ul class="customList">\n			<li class="checked">\n				corporis suscipit laboriosam\n			</li>\n			<li class="unchecked">\n				labore et dolore magnam\n			</li>\n			<li class="checked">\n				quaerat voluptatem\n			</li>\n			<li class="checked">\n				architecto beatae\n			</li>\n			<li class="checked">\n				quis nostrum exercitationem\n			</li>\n		</ul>\n	</div>\n	<div class="span12">\n		<h3 class="title">\n			Progress Bar\n		</h3>\n	</div>\n	<div class="span4">\n		<h5 class="title">\n			Progress Bar Striped Active\n		</h5>\n		<div class="progress progress-info progress-striped active">\n			<div class="bar" style="width:89%;">\n				<span>Info 89%</span> \n			</div>\n		</div>\n		<div class="progress progress-success progress-striped active">\n			<div class="bar" style="width:93%;">\n				<span>Success 93%</span> \n			</div>\n		</div>\n		<div class="progress progress-warning progress-striped active">\n			<div class="bar" style="width:75%;">\n				<span>Warning75%</span> \n			</div>\n		</div>\n		<div class="progress progress-danger progress-striped active">\n			<div class="bar" style="width:96%;">\n				<span>Danger 96%</span> \n			</div>\n		</div>\n	</div>\n	<div class="span4">\n		<h5 class="title">\n			Progress Bar Striped\n		</h5>\n		<div class="progress progress-info progress-striped">\n			<div class="bar" style="width:89%;">\n				<span>Info 89%</span> \n			</div>\n		</div>\n		<div class="progress progress-success progress-striped">\n			<div class="bar" style="width:93%;">\n				<span>Success 93%</span> \n			</div>\n		</div>\n		<div class="progress progress-warning progress-striped">\n			<div class="bar" style="width:75%;">\n				<span>Warning75%</span> \n			</div>\n		</div>\n		<div class="progress progress-danger progress-striped">\n			<div class="bar" style="width:96%;">\n				<span>Danger 96%</span> \n			</div>\n		</div>\n	</div>\n	<div class="span4">\n		<h5 class="title">\n			Progress Bar\n		</h5>\n		<div class="progress progress-info">\n			<div class="bar" style="width:89%;">\n				<span>Info 89%</span> \n			</div>\n		</div>\n		<div class="progress progress-success">\n			<div class="bar" style="width:93%;">\n				<span>Success 93%</span> \n			</div>\n		</div>\n		<div class="progress progress-warning">\n			<div class="bar" style="width:75%;">\n				<span>Warning75%</span> \n			</div>\n		</div>\n		<div class="progress progress-danger">\n			<div class="bar" style="width:96%;">\n				<span>Danger 96%</span> \n			</div>\n		</div>\n	</div>\n</div>', 0, '#', '_self'),
(5, 1, 'About Me', '<div class="row">\r\n	<div class="span12">\r\n		<h3 class="title">\r\n			The Mastermind\r\n		</h3>\r\n	</div>\r\n	<div class="span4">\r\n		<!--**Team Wrapper**-->\r\n		<div class="team-wrapper">\r\n			<h4>\r\n				REVOLUTIONIST\r\n			</h4>\r\n			<h5 class="title">\r\n				Ace Vincent Draconis\r\n			</h5>\r\n<br />\r\n			<div class="rounded-image">\r\n				<span><img src="/attached/image/content/20140919124248_99296.jpg" alt="" width="" height="" title="" align="" /></span> \r\n			</div>\r\n			<div class="social-share grey">\r\n				<a href="https://www.facebook.com/vincent.draconis" target="_blank" class="facebook"></a> <a href="https://twitter.com/sylverduzt" target="_blank" class="twitter"></a> <a href="https://www.google.com/+AceDraconis" target="_blank" class="google"></a> \r\n			</div>\r\n			<div class="cont">\r\n				<h5>\r\n					I''m a\r\n				</h5>\r\nWeb Designer <span> + </span> Web Developer <span> + </span> UI/UX Designer <span> + </span> Graphic Designer <span>+ </span> Optimist <span> + </span> Idealist <span> + </span> Realist <span> +</span> Rebel <br />\r\n<br />\r\n				<h5>\r\n					I''m good with\r\n				</h5>\r\nPHP <span> + </span> MySql <span> + </span> HTML <span> + </span> CSS <span> + </span> jQuery <span> + </span> AJAX <span> + </span> UI/UX <span> + </span> Grids <span> + </span> Minimalist <span> + </span> Fluid <span> + </span> Fully-Responsive (Mobile-ready) <span> + </span> Single-Page Website\r\n			</div>\r\n		</div>\r\n<!--**Team Wrapper - End**-->\r\n	</div>\r\n	<div class="span4">\r\n		<!--**Team Wrapper**-->\r\n		<div class="team-wrapper">\r\n			<h4>\r\n				SKILL SET\r\n			</h4>\r\n			<h5 class="title">\r\n				Web Design Proficiency\r\n			</h5>\r\n<br />\r\n<br />\r\n			<div class="progress progress-01">\r\n				<div class="bar" style="width:90%;">\r\n					PHP + MYSQL<span>90%</span> \r\n				</div>\r\n			</div>\r\n			<div class="progress progress-02">\r\n				<div class="bar" style="width:93%;">\r\n					HTML + CSS<span> 93%</span> \r\n				</div>\r\n			</div>\r\n			<div class="progress progress-03">\r\n				<div class="bar" style="width:83%;">\r\n					JAVASCRIPT + JQUERY + AJAX<span>83%</span> \r\n				</div>\r\n			</div>\r\n			<div class="progress progress-04">\r\n				<div class="bar" style="width:85%;">\r\n					GRAPHIC + UI/UX DESIGN<span>85%</span> \r\n				</div>\r\n			</div>\r\n			<h5 class="title">\r\n				Software Proficiency<br />\r\n<br />\r\n			</h5>\r\n<img src="/attached/image/content/20140919160148_50827.png" alt="" width="" height="" title="" align="" class="icn" /> <img src="/attached/image/content/20140919154949_56724.png" width="" height="" alt="" title="" align="" class="icn" /> <img src="/attached/image/content/20140919160245_12502.png" alt="" width="" height="" title="" align="" class="icn" /> <img src="/attached/image/content/20140919160352_59295.png" alt="" width="" height="" title="" align="" class="icn" /> <img src="/attached/image/content/20140919160420_22757.png" alt="" width="" height="" title="" align="" class="icn" /> <img src="/attached/image/content/20140919160507_43733.png" alt="" width="" height="" title="" align="" class="icn" /> <br />\r\n<br />\r\n			<div class="progress progress-05">\r\n				<div class="bar" style="width:89%;">\r\n					WeBuilder + Dreamweaver<span>89%</span> \r\n				</div>\r\n			</div>\r\n			<div class="progress progress-06">\r\n				<div class="bar" style="width:82%;">\r\n					Photoshop + Fireworks<span> 82%</span> \r\n				</div>\r\n			</div>\r\n			<div class="progress progress-07">\r\n				<div class="bar" style="width:75%;">\r\n					Illustrator<span>75%</span> \r\n				</div>\r\n			</div>\r\n			<div class="progress progress-08" style="margin-bottom:5px;">\r\n				<div class="bar" style="width:45%;">\r\n					Flash<span>45%</span> \r\n				</div>\r\n			</div>\r\n		</div>\r\n<!--**Team Wrapper - End**-->\r\n	</div>\r\n	<div class="span4">\r\n		<!--**Team Wrapper**-->\r\n		<div class="team-wrapper">\r\n			<h4>\r\n				EXPERIENCES\r\n			</h4>\r\n			<div class="cont">\r\n				<h5 class="title">\r\n					2011-2012\r\n				</h5>\r\n<br />\r\n<strong>VISHTECH, DYNAMIC IT SOLUTION</strong><br />\r\nWeb Designer &amp; Developer, Head of R&amp;D Dept. <br />\r\n				<h5 class="title">\r\n					2009-2013\r\n				</h5>\r\n<br />\r\n<strong>GAN RAO &amp; CHUAH </strong> <span>+</span> <strong>RAO &amp; CO</strong><br />\r\nWeb Designer &amp; Developer, Head of IT Dept. <br />\r\n				<h5 class="title">\r\n					2013-RECENT\r\n				</h5>\r\n<br />\r\n<strong>Sylver Web, Web Engineering</strong><br />\r\nCEO &amp; FOUNDER, Web Designer &amp; Developer.\r\n			</div>\r\n			<h4>\r\n				EDUCATION\r\n			</h4>\r\n			<div class="cont">\r\n				<h5 class="title">\r\n					2004-2009\r\n				</h5>\r\n<br />\r\n<strong>Universiti Teknologi Malaysia (UTMKL), Malaysia</strong> Diploma in Computer Science (Multimedia) <br />\r\n				<h5 class="title">\r\n					2009\r\n				</h5>\r\n<br />\r\n<strong>Microsoft Certified Technology Specialist (MCTS)</strong><br />\r\n.NET Framework, Web Applications Development<br />\r\n				<h5 class="title">\r\n					2013-NOW\r\n				</h5>\r\n<br />\r\n<strong>Universiti Tun Hussein Onn (UTHM), Malaysia</strong> BCompSc (Web Technology)\r\n			</div>\r\n		</div>\r\n	</div>\r\n</div>', 0, '', '_self');

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
(2, 4, 'page', 2),
(3, 5, 'page', 3),
(4, 6, 'page', 4),
(5, 2, 'page', 5),
(6, 3, 'module', 4);

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
(4, 4, 'Portfolio', 'gallery.php', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `name`, `enable`, `theme`, `vary`, `mode`) VALUES
(1, 'Alpha', 1, 'alpha', 'light', 'single');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
