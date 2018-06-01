use `iep`;

DROP PROCEDURE IF EXISTS addSpecialty;
DROP PROCEDURE IF EXISTS removeSpecialty;
DROP PROCEDURE IF EXISTS changeCodeSpecialty;
DROP PROCEDURE IF EXISTS changeDescriptionSpecialty;
DROP PROCEDURE IF EXISTS changeFileSpecialty;
DROP PROCEDURE IF EXISTS getAllSpecialty;

DELIMITER //

CREATE PROCEDURE addSpecialty(code_spec char(10), descp char(255), pdf_file char(255))
BEGIN
	INSERT INTO `specialty` (`code_spec`, `description`, `pdf_file`) VALUES (code_spec, descp, pdf_file);
END;

CREATE PROCEDURE removeSpecialty(spec_id int)
BEGIN
	DELETE FROM `specialty` WHERE `id_spec`=spec_id;
END;

CREATE PROCEDURE changeCodeSpecialty(spec_id int, new_code_spec char(255))
BEGIN
	UPDATE `specialty` SET `code_spec`=new_code_spec WHERE `id_spec`=spec_id;
END;

CREATE PROCEDURE changeDescriptionSpecialty(spec_id int, new_descp char(255))
BEGIN
	UPDATE `specialty` SET `description`=new_descp WHERE `id_spec`=spec_id;
END;

CREATE PROCEDURE changeFileSpecialty(spec_id int, new_file char(255))
BEGIN
	UPDATE `specialty` SET `pdf_file`=new_file WHERE `id_spec`=spec_id;
END;

CREATE PROCEDURE getAllSpecialty()
BEGIN
	SELECT * FROM `v_Specialtyes`;
END;

//

DELIMITER ;