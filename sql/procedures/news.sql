use `iep`;



DROP PROCEDURE IF EXISTS addNews;
DROP PROCEDURE IF EXISTS removeNews;
DROP PROCEDURE IF EXISTS changeNews;
DROP PROCEDURE IF EXISTS getNews;
DROP PROCEDURE IF EXISTS getAllNews;
DROP PROCEDURE IF EXISTS clearAllNews;


DELIMITER //

CREATE PROCEDURE addNews(n_caption char(255), n_content text, emailTeacher char(30), n_date date)
BEGIN
	INSERT INTO `news` (`caption`, `content`, `id_author`, `date_publication`) VALUES (n_caption, n_content, (SELECT `id_user` FROM `users` WHERE `email`=emailTeacher AND `id_type_user`=2), n_date);
END;


CREATE PROCEDURE removeNews(id_news INT)
BEGIN
	DELETE n FROM `news` n
    INNER JOIN `users` u ON n.id_author=u.id_user
  WHERE n.id_news=id_news;
END;

/*

	 Думаю, надо разбить функцию changeNews на 
	 	changeCaptionNews(id_news, author)
	 	changeContentNews(id_news, author)

*/

CREATE PROCEDURE changeNews(n_author_email CHAR(30), old_caption CHAR(255), new_caption CHAR(255), old_content CHAR(255), new_content TEXT)
BEGIN
	UPDATE `news` n 
		INNER JOIN `users` u ON n.id_author=u.id_user 
	SET n.caption=new_caption, n.content=new_content	
	WHERE n.caption=old_caption OR n.content=old_content;
END;

CREATE PROCEDURE getNews(n_author_email CHAR(30)) /* Для вывода новостей в его аккаунте */
BEGIN
	SELECT * FROM `v_news` WHERE `email`=n_author_email;
END;

CREATE PROCEDURE getAllNews() /* Для вывода в панели администратора */
BEGIN
	SELECT * FROM `v_news`;
END;

CREATE PROCEDURE clearAllNews()
BEGIN
	DELETE FROM `news`;
END;





//

DELIMITER ;