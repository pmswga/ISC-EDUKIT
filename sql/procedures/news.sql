use `iep`;

DROP PROCEDURE IF EXISTS addNews;
DROP PROCEDURE IF EXISTS removeNews;
DROP PROCEDURE IF EXISTS changeCaptionNews;
DROP PROCEDURE IF EXISTS changeContentNews;
DROP PROCEDURE IF EXISTS getNews;
DROP PROCEDURE IF EXISTS getAllNews;
DROP PROCEDURE IF EXISTS clearAllNews;

DELIMITER //

CREATE PROCEDURE addNews(n_caption char(255), n_content text, emailTeacher char(30), n_date date)
BEGIN
	INSERT INTO `news` (`caption`, `content`, `id_author`, `date_publication`) VALUES (n_caption, n_content, getTeacherId(emailTeacher), n_date);
END;

CREATE PROCEDURE removeNews(id_news INT)
BEGIN
	DELETE n FROM `news` n
    INNER JOIN `users` u ON n.id_author=u.id_user
  WHERE n.id_news=id_news;
END;

CREATE PROCEDURE changeCaptionNews(news_id int, new_caption char(255))
BEGIN
	UPDATE `news` SET `caption`=new_caption WHERE `id_news`=news_id;
END;

CREATE PROCEDURE changeContentNews(news_id int, new_content text)
BEGIN
	UPDATE `news` SET `content`=new_content WHERE `id_news`=news_id;
END;

CREATE PROCEDURE getNews(n_author_email CHAR(30)) /* Для вывода новостей в его аккаунте */
BEGIN
	SELECT * FROM `v_News` WHERE `email`=n_author_email;
END;

CREATE PROCEDURE getAllNews() /* Для вывода в панели администратора */
BEGIN
	SELECT * FROM `v_News`;
END;

CREATE PROCEDURE clearAllNews()
BEGIN
	DELETE FROM `news`;
END;

//

DELIMITER ;