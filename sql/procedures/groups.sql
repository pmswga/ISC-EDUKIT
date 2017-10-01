use `iep`;

DROP PROCEDURE IF EXISTS addGroup;
DROP PROCEDURE IF EXISTS removeGroup;
DROP PROCEDURE IF EXISTS changeDescriptionGroup;
DROP PROCEDURE IF EXISTS changeSpecGroup;
/*DROP PROCEDURE IF EXISTS upCourse;*/
DROP PROCEDURE IF EXISTS getGroupsOfCurrentYear;
DROP PROCEDURE IF EXISTS getAllGroups;

DELIMITER //

CREATE PROCEDURE addGroup(descp char(255), id_spec int, year_edu char(10), is_budget int)
BEGIN
	INSERT INTO `groups` (`spec_id`, `description`, `edu_year`, `is_budget`) VALUES (id_spec, descp, year_edu, is_budget);
END;

CREATE PROCEDURE removeGroup(id_grp int)
BEGIN
	DELETE FROM `groups` WHERE `grp`=id_grp;
END;

CREATE PROCEDURE changeDescriptionGroup(grp_id int, new_descp char(255))
BEGIN
	UPDATE `groups` SET `description`=new_descp WHERE `grp`=grp_id;
END;

CREATE PROCEDURE changeSpecGroup(grp_id int, new_spec_id int)
BEGIN
	UPDATE `groups` SET `spec_id`=new_spec_id WHERE `grp`=grp_id;
END;
/*
CREATE PROCEDURE upCourse(grp_id int)
BEGIN
	DECLARE course int;
	DECLARE st char(5);
	DECLARE en char(5);
	
	SELECT CAST(LEFT(RIGHT(`description`, 3), 1) as int) INTO course FROM `groups` WHERE `grp`=grp_id;
	SELECT SUBSTRING_INDEX(`description`, '-', 1) INTO st FROM `groups` WHERE `grp`=grp_id;
	SELECT RIGHT(`description`, 2) INTO en FROM `groups` WHERE `grp`=grp_id;
	
	IF course < 4 THEN
		SET @new_number = CONCAT(st, '-', course+1, en);
		UPDATE `groups` SET `description`=@new_number WHERE `grp`=grp_id;
	END IF;
END;
*/

CREATE PROCEDURE getGroupsOfCurrentYear()
BEGIN
	SELECT * FROM `v_Groups` WHERE `edu_year`=CONCAT(YEAR(NOW()), '/', YEAR(NOW())+1);
END;

CREATE PROCEDURE getAllGroups()
BEGIN
  SELECT * FROM `v_Groups`;
END;

//

DELIMITER ;