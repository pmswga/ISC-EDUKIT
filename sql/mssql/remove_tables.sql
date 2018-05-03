/*!
	File name: "remove_tables.sql"
	Description: Удаляет все таблицы в базе данных DBC
	Author: Басыров С.А.
*/

IF 
	(EXISTS (SELECT name FROM master.dbo.sysdatabases WHERE name='DBC'))
BEGIN
	USE DBC;


	PRINT '';
	PRINT '[Delete constraints]';
	PRINT '';

	ALTER TABLE Person DROP CONSTRAINT R_1;



	DECLARE @count_tables INT;
	DECLARE @deleted_tables INT;

	SELECT @count_tables=COUNT(TABLE_NAME) FROM INFORMATION_SCHEMA.TABLES;

	/*! ----------------[Удаление категории таблиц "Кодовые словари"]---------------- */

	IF EXISTS (SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME='ListSex') 
	BEGIN

		DROP TABLE ListSex;
		
		PRINT 'Table "ListSex" deleted...';
		SET @deleted_tables = @deleted_tables + 1;
	END
	
	
	IF EXISTS (SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME='ListSocialStatus') 
	BEGIN

		DROP TABLE ListSocialStatus;
		
		PRINT 'Table "ListSocialStatus" deleted...';
		SET @deleted_tables = @deleted_tables + 1;
	END

	
	IF EXISTS (SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME='ListTypeContact') 
	BEGIN

		DROP TABLE ListTypeContact;
		
		PRINT 'Table "ListTypeContact" deleted...';
		SET @deleted_tables = @deleted_tables + 1;
	END

	
	IF EXISTS (SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME='ListTypeDocument') 
	BEGIN

		DROP TABLE ListTypeDocument;
		
		PRINT 'Table "ListTypeDocument" deleted...';
		SET @deleted_tables = @deleted_tables + 1;
	END
	


	/*! ----------------[Удаление категории таблиц "Общие данные"]---------------- */
	
	IF EXISTS (SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME='Person') 
	BEGIN

		DROP TABLE Person;

		PRINT 'Table "Person" deleted...';
		SET @deleted_tables = @deleted_tables + 1;
	END



	SELECT CONCAT('Deleted ', @deleted_tables, '/', @count_tables, ' tables');

END
ELSE 
BEGIN
	PRINT 'DATABASE "DBC" NOT EXIST';
END
GO

