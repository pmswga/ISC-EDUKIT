use `iep`;

DROP PROCEDURE IF EXISTS addGroup;
DROP PROCEDURE IF EXISTS removeGroup;
DROP PROCEDURE IF EXISTS changeDescriptionGroup;
DROP PROCEDURE IF EXISTS changeSpecGroup;
DROP PROCEDURE IF EXISTS upCourse;
DROP PROCEDURE IF EXISTS getAllGroups;

DELIMITER //

CREATE PROCEDURE addGroup(descp char(255), id_spec int, year_edu date, is_budget int)
BEGIN
	INSERT INTO `groups` (`spec_id`, `description`, `edu_year`, `is_budget`) VALUES (id_spec, descp, year_edu, is_budget);
END;

CREATE PROCEDURE removeGroup(id_grp int)
BEGIN
	DELETE FROM `groups` WHERE `grp`=id_grp;
END;

CREATE PROCEDURE changeDescriptionGroup(grp_id int, new_descp char(255))
BEGIN
	UPDATE `groups` SET `description`=new_descp WHERE `id_grp`=grp_id;
END;

CREATE PROCEDURE changeSpecGroup(grp_id int, new_spec_id int)
BEGIN
	UPDATE `groups` SET `spec_id`=new_spec_id WHERE `id_grp`=grp_id;
END;

CREATE PROCEDURE upCourse()
BEGIN
	/*
		ОЖИДАЕТ РЕАЛИЗАЦИИ
	*/
END;

CREATE PROCEDURE getAllGroups()
BEGIN
  SELECT * FROM `v_Groups`;
END;

//

DELIMITER ;