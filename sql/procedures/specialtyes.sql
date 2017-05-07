use `iep`;

DROP PROCEDURE IF EXISTS addSpecialty;
DROP PROCEDURE IF EXISTS removeSpecialty;
DROP PROCEDURE IF EXISTS changeCodeSpecialty;
DROP PROCEDURE IF EXISTS changeDescriptionSpecialty;
DROP PROCEDURE IF EXISTS changePDFFileSpecialty;
DROP PROCEDURE IF EXISTS getAllSpecialty;


DELIMITER //

CREATE PROCEDURE addSpecialty(code_spec CHAR(10), descp CHAR(255), pdf_file CHAR(255))
BEGIN
	INSERT INTO `specialty` (`code_spec`, `description`, `pdf_file`) VALUES (code_spec, descp, pdf_file);
END;

CREATE PROCEDURE removeSpecialty(spec_id int)
BEGIN
	DELETE FROM `specialty` WHERE `id_spec`=spec_id;
END;

CREATE PROCEDURE changeCodeSpecialty(old_code_spec CHAR(255), new_code_spec CHAR(255))
BEGIN
	UPDATE `specialty` SET `code_spec`=new_code_spec WHERE `code_spec`=old_code_spec;
END;

CREATE PROCEDURE changeDescriptionSpecialty(old_descp CHAR(255), new_descp CHAR(255))
BEGIN
	UPDATE `specialty` SET `description`=new_descp WHERE `description`=old_descp;
END;

CREATE PROCEDURE changePDFFileSpecialty(old_pdf_file CHAR(255), new_pdf_file CHAR(255))
BEGIN
	UPDATE `specialty` SET `pdf_file`=new_pdf_file WHERE `pdf_file`=old_pdf_file;
END;

CREATE PROCEDURE getAllSpecialty()
BEGIN
	SELECT * FROM `v_Specialtyes` ORDER BY `descp`;
END;

//

DELIMITER ;