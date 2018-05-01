/*!
	File name: "db.sql"
	Description: Создаёт базу данных DBC
	Author: Басыров С.А.
*/

IF NOT (EXISTS (SELECT name FROM master.dbo.sysdatabases WHERE name='DBC'))
BEGIN
	CREATE DATABASE DBC;

	PRINT 'Create database "DBC"...';
END
ELSE
BEGIN
	PRINT 'DATABASE "DBC" IS EXIST'
END
GO