use `iep`;

DROP PROCEDURE IF EXISTS addRelation;
DROP PROCEDURE IF EXISTS removeRelation;
DROP PROCEDURE IF EXISTS getAllRelations;

DELIMITER //

CREATE PROCEDURE addRelation(descp CHAR(255))
BEGIN
	INSERT INTO `relations` (`description`) VALUES (descp);
END;

CREATE PROCEDURE removeRelation(relation_id int)
BEGIN
	DELETE FROM `relations` WHERE `id_relation`=relation_id;
END;

CREATE PROCEDURE getAllRelations()
BEGIN
	SELECT * FROM `v_Relations`;
END;

//

DELIMITER ;