use `iep`;

DROP PROCEDURE IF EXISTS addNews;
DROP PROCEDURE IF EXISTS addAdminNews;
DROP PROCEDURE IF EXISTS removeAdminNews;
DROP PROCEDURE IF EXISTS removeNews;
DROP PROCEDURE IF EXISTS changeCaptionNews;
DROP PROCEDURE IF EXISTS changeContentNews;
DROP PROCEDURE IF EXISTS getNews;
DROP PROCEDURE IF EXISTS getAllNews;
DROP PROCEDURE IF EXISTS getAdminNews;
DROP PROCEDURE IF EXISTS clearAllNews;

DELIMITER //

CREATE PROCEDURE addNews(n_caption char(255), n_content text, emailTeacher char(30), n_date datetime)
BEGIN
	INSERT INTO `news` (`caption`, `content`, `id_author`, `date_publication`) VALUES (n_caption, n_content, getTeacherId(emailTeacher), n_date);
END;

CREATE PROCEDURE addAdminNews(n_caption char(255), n_content text, emailTeacher char(30), n_date datetime)
BEGIN
	INSERT INTO `admin_news` (`caption`, `content`, `id_author`, `date_publication`) VALUES (n_caption, n_content, getAdminId(emailTeacher), n_date);
END;

CREATE PROCEDURE removeAdminNews(news_id int)
BEGIN
	DELETE FROM `admin_news` WHERE `id_news`=news_id;
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

CREATE PROCEDURE getAllNews()
BEGIN
	(SELECT `id_news`, `caption`, `content`, CONCAT(u.sn, ' ', LEFT(u.fn, 1), '. ', LEFT(u.pt, 1), '.') as author, `date_publication` as dp 
		FROM `admin_news` as an 
			INNER JOIN `admins` u ON an.id_author=u.id_admin
	)
	union all
	(SELECT `id_news`, `caption`, `content`, `author`, `dp` FROM `v_News`)
    ORDER BY `dp` DESC;
END;

CREATE PROCEDURE getAdminNews(author CHAR(255)) /* Для вывода в панели администратора */
BEGIN
	SELECT  an.id_news,
			an.caption,
            an.content,
            an.date_publication as dp
    FROM `admin_news` an
	WHERE an.id_author=getAdminId(author)
    ORDER BY `date_publication`;
END;

CREATE PROCEDURE clearAllNews()
BEGIN
	DELETE FROM `news`;
END;

//

DELIMITER ;