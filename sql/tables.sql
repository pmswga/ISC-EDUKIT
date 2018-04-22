/*!
	File name: "tables.sql"
	Description: Создаёт таблицы в базе данных DBC
	Author: Басыров С.А.
*/

IF 
	(EXISTS (SELECT name FROM master.dbo.sysdatabases WHERE name='DBC'))
BEGIN
	USE DBC;
	
	PRINT '';
	PRINT '[Create code dictionaries]';
	PRINT '';

	/*! ----------------[Создание категории таблиц "Кодовые словари"]---------------- */

	IF NOT (EXISTS (SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME='ListSex')) 
	BEGIN

		-- Кодовый словарь "Список полов"
		CREATE TABLE ListSex (
			id_sex  INT PRIMARY KEY IDENTITY(1, 1),
			caption VARCHAR(255)	
		);

		PRINT 'Create table "ListSex"...';
	END
	ELSE
	BEGIN
		PRINT 'Table "ListSex" is EXIST';
	END
	
	
	IF NOT (EXISTS (SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME='ListSocialStatus')) 
	BEGIN

		-- Кодовый словарь "Список социальных статусов"
		CREATE TABLE ListSocialStatus (
			id_social_status INT PRIMARY KEY IDENTITY(1, 1),
			caption			 VARCHAR(255) NOT NULL
		);

		PRINT 'Create table "ListSocialStatus"...';
	END
	ELSE
	BEGIN
		PRINT 'Table "ListSocialStatus" is EXIST';
	END

	
	IF NOT (EXISTS (SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME='ListTypeDocument')) 
	BEGIN

		-- Кодовый словарь "Список типов документов"
		CREATE TABLE ListTypeDocument (
			id_type_document INT PRIMARY KEY IDENTITY(1, 1),
			caption			 VARCHAR(255) NOT NULL
		);

		PRINT 'Create table "ListTypeDocument"...';
	END
	ELSE
	BEGIN
		PRINT 'Table "ListTypeDocument" is EXIST';
	END

	
	IF NOT (EXISTS (SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME='ListTypeContact')) 
	BEGIN

		-- Кодовый словарь "Список типов контактов"
		CREATE TABLE ListTypeContact (
			id_type_contact INT PRIMARY KEY IDENTITY(1, 1),
			caption			 VARCHAR(255) NOT NULL
		);

		PRINT 'Create table "ListTypeContact"...';
	END
	ELSE
	BEGIN
		PRINT 'Table "ListTypeContact" is EXIST';
	END
	
	
	PRINT '';
	PRINT '[Create general tables]';
	PRINT '';

	/*! ----------------[Создание категории таблиц "Общие данные"]---------------- */
	
	IF NOT (EXISTS (SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME='Person')) 
	BEGIN

		-- Таблица "Персона"
		CREATE TABLE Person (
			id_person        INT PRIMARY KEY IDENTITY(1, 1),
			second_name      VARCHAR(50) NOT NULL,
			first_name       VARCHAR(50) NOT NULL,
			patronymic       VARCHAR(50) NOT NULL,
			date_birthday    DATE NOT NULL,
			id_sex           INT NOT NULL,
			id_social_status INT NOT NULL
		);
		
		PRINT 'Create table "Person"...';

		CREATE INDEX Person_id_sex_index ON Person
		( 
			id_sex       ASC
		);

		CREATE INDEX Person_id_social_status_index ON Person 
		(
			id_social_status ASC
		);

	END
	ELSE
	BEGIN
		PRINT 'Table "Person" is EXIST';
	END
	
	IF NOT (EXISTS (SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME='PersonDocument')) 
	BEGIN

		CREATE TABLE PersonDocument (
			id_person_document INT PRIMARY KEY IDENTITY(1, 1),
			id_person INT NOT NULL,
			id_type_document INT NOT NULL,
			series varchar(255) NOT NULL,
			number varchar(255) NOT NULL,
			code varchar(255) NOT NULL,
			issued_by varchar(255) NOT NULL,
			date_issue varchar(255) NOT NULL
		);

		CREATE INDEX PersonDocument_id_person_index ON PersonDocument
		(
			id_person ASC
		);

		CREATE INDEX PersonDocument_id_type_document ON PersonDocument
		(
			id_type_document ASC
		);

	END
	ELSE
	BEGIN
		PRINT 'Table "PersonDocument" is EXIST'
	END

	/*! ----------------[Связываение таблиц]----------------[ */

	PRINT '';
	PRINT '[Create constraints]';
	PRINT '';

	IF NOT EXISTS (SELECT * FROM [DBC].INFORMATION_SCHEMA.REFERENTIAL_CONSTRAINTS WHERE CONSTRAINT_NAME='R_1')
	BEGIN

		ALTER TABLE Person
			ADD CONSTRAINT R_1 FOREIGN KEY (id_sex) REFERENCES ListSex(id_sex)
				ON DELETE CASCADE
				ON UPDATE CASCADE
	
		PRINT 'Link "ListSex" -----> "Person"';
	END
	ELSE
	BEGIN
		PRINT 'Constraint R_1 is EXIST';
	END;
	
	IF NOT EXISTS (SELECT * FROM [DBC].INFORMATION_SCHEMA.REFERENTIAL_CONSTRAINTS WHERE CONSTRAINT_NAME='R_2')
	BEGIN

		ALTER TABLE PersonDocument
			ADD CONSTRAINT R_2 FOREIGN KEY (id_person) REFERENCES Person(id_person)
				ON DELETE CASCADE
				ON UPDATE CASCADE

		PRINT 'Link "Person" -----> "PersonDocument"';
	END
	ELSE
	BEGIN
		PRINT 'Constraint R_2 is EXIST';
	END;

	



END
ELSE 
BEGIN
	PRINT 'DATABASE "DBC" NOT EXIST';
END
GO

