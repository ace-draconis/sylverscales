CREATE TABLE IF NOT EXISTS banner (
  id int(5) NOT NULL AUTO_INCREMENT,
  arrange int(11) NOT NULL,
  banner text CHARACTER SET utf8 NOT NULL,
  caps text CHARACTER SET utf8 NOT NULL,
  enable int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

GO

INSERT INTO banner (id, arrange, banner, caps, enable) VALUES
(1, 3, /attached/image/20150726/20150726060825_37207.png, Sylver Scales CMS, 1),
(2, 1, /sylverscales/attached/image/banner/01.jpg, What we do?, 1),
(3, 2, /sylverscales/attached/image/banner/02.jpg, Sylver Hyve CMS, 1);