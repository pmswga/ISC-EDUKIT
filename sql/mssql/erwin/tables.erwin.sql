
CREATE DATABASE DBC
go




ALTER DATABASE DBC
SET 
ANSI_NULLS ON
go

USE DBC;
GO


CREATE TYPE Bool
	FROM BIT NOT NULL
go



CREATE TABLE ListContactType
( 
	id_contact_type      integer IDENTITY ( 1,1 ) ,
	caption              varchar(max)  NOT NULL ,
	CONSTRAINT XPKListContactType PRIMARY KEY  CLUSTERED (id_contact_type ASC)
)
go



CREATE TABLE ListSex
( 
	id_sex               integer IDENTITY ( 1,1 ) ,
	caption              varchar(20)  NOT NULL ,
	CONSTRAINT XPKListSex PRIMARY KEY  CLUSTERED (id_sex ASC)
)
go



CREATE TABLE ListSocialStatus
( 
	id_social_status     integer IDENTITY ( 1,1 ) ,
	caption              varchar(max)  NOT NULL ,
	CONSTRAINT XPKListSocialStatus PRIMARY KEY  CLUSTERED (id_social_status ASC)
)
go



CREATE TABLE ListEducationStatus
( 
	id_education_status  integer IDENTITY ( 1,1 ) ,
	caption              varchar(max)  NOT NULL ,
	CONSTRAINT XPKListEducationStatus PRIMARY KEY  CLUSTERED (id_education_status ASC)
)
go



CREATE TABLE ListCitizenship
( 
	id_citizenship       integer IDENTITY ( 1,1 ) ,
	caption              varchar(20)  NOT NULL ,
	CONSTRAINT XPKListCitizenship PRIMARY KEY  CLUSTERED (id_citizenship ASC)
)
go



CREATE TABLE StudentGeneralInformation
( 
	second_name          varchar(max)  NOT NULL ,
	first_name           varchar(max)  NOT NULL ,
	patronymic           varchar(max)  NULL ,
	id_sex               integer  NOT NULL ,
	date_birthday        datetime  NOT NULL ,
	id_social_status     integer  NOT NULL ,
	id_education_status  integer  NOT NULL ,
	id_student_general_information integer IDENTITY ( 1,1 ) ,
	actual_address       varchar(max)  NOT NULL ,
	id_citizenship       integer  NOT NULL ,
	CONSTRAINT XPKStudentGeneralInformation PRIMARY KEY  CLUSTERED (id_student_general_information ASC),
	CONSTRAINT R_1 FOREIGN KEY (id_sex) REFERENCES ListSex(id_sex)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
CONSTRAINT R_3 FOREIGN KEY (id_social_status) REFERENCES ListSocialStatus(id_social_status)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
CONSTRAINT R_8 FOREIGN KEY (id_education_status) REFERENCES ListEducationStatus(id_education_status)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
CONSTRAINT R_13 FOREIGN KEY (id_citizenship) REFERENCES ListCitizenship(id_citizenship)
		ON DELETE CASCADE
		ON UPDATE CASCADE
)
go



CREATE TABLE StudentContactInformation
( 
	id_person_contact    integer IDENTITY ( 1,1 ) ,
	id_contact_type      integer  NOT NULL ,
	value                varchar(255)  NOT NULL ,
	comment              varchar(255)  NULL ,
	id_student_general_information integer  NOT NULL ,
	CONSTRAINT XPKStudentContactInformation PRIMARY KEY  CLUSTERED (id_person_contact ASC),
	CONSTRAINT R_6 FOREIGN KEY (id_contact_type) REFERENCES ListContactType(id_contact_type)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
CONSTRAINT R_9 FOREIGN KEY (id_student_general_information) REFERENCES StudentGeneralInformation(id_student_general_information)
		ON DELETE CASCADE
		ON UPDATE CASCADE
)
go



CREATE VIEW ViewStudentContactInformation(Тип_контакта,Значение_контакта,Комментарий,Идентификатор_студента)
AS
SELECT ListContactType.caption,StudentContactInformation.value,StudentContactInformation.comment,StudentContactInformation.id_student_general_information
	FROM StudentContactInformation,ListContactType
go



CREATE TABLE CollegeInformation
( 
	id_college_information integer IDENTITY ( 1,1 ) ,
	full_name            varchar(255)  NOT NULL ,
	short_name           varchar(255)  NOT NULL ,
	address              varchar(255)  NOT NULL ,
	CONSTRAINT XPKCollegeInformation PRIMARY KEY  CLUSTERED (id_college_information ASC)
)
go



CREATE VIEW ViewListEducationStatus(Идентификатор,Наименование)
AS
SELECT ListEducationStatus.id_education_status,ListEducationStatus.caption
	FROM ListEducationStatus
go



CREATE VIEW ViewListSocialStatus(Идентификатор,Наименование)
AS
SELECT ListSocialStatus.id_social_status,ListSocialStatus.caption
	FROM ListSocialStatus
go



CREATE VIEW ViewListSex(Идентификатор,Наименование)
AS
SELECT ListSex.id_sex,ListSex.caption
	FROM ListSex
go



CREATE VIEW ViewListCitizenship(Идентификатор,Наименование)
AS
SELECT ListCitizenship.id_citizenship,ListCitizenship.caption
	FROM ListCitizenship
go



CREATE TABLE StudentMilitrayInformation
( 
	military_commissariat_caption varchar(max)  NOT NULL ,
	military_commissariat_adress varchar(max)  NOT NULL ,
	is_served            Bool ,
	id_student_general_information integer  NOT NULL ,
	CONSTRAINT XPKStudentMilitrayInformation PRIMARY KEY  CLUSTERED (id_student_general_information ASC),
	CONSTRAINT R_12 FOREIGN KEY (id_student_general_information) REFERENCES StudentGeneralInformation(id_student_general_information)
		ON DELETE CASCADE
		ON UPDATE CASCADE
)
go



CREATE TABLE EducationGroup
( 
	id_group             integer IDENTITY ( 1,1 ) ,
	caption              varchar(max)  NOT NULL ,
	education_year       integer  NOT NULL ,
	CONSTRAINT XPKEducationGroup PRIMARY KEY  CLUSTERED (id_group ASC)
)
go



CREATE TABLE EducationSpecialty
( 
	id_specialty         integer IDENTITY ( 1,1 ) ,
	code                 varchar(max)  NOT NULL ,
	spec_file            varbinary  NULL ,
	CONSTRAINT XPKEducationSpecialty PRIMARY KEY  CLUSTERED (id_specialty ASC)
)
go



CREATE TABLE StudentStudyInformation
( 
	id_payment_type      integer  NOT NULL ,
	id_group             integer  NOT NULL ,
	id_specialty         integer  NOT NULL ,
	id_student_general_information integer  NOT NULL ,
	receipt_year         integer  NULL ,
	graduation_year      integer  NULL ,
	CONSTRAINT XPKStudentStudyInformation PRIMARY KEY  CLUSTERED (id_student_general_information ASC),
	CONSTRAINT R_4 FOREIGN KEY (id_group) REFERENCES EducationGroup(id_group)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
CONSTRAINT R_5 FOREIGN KEY (id_specialty) REFERENCES EducationSpecialty(id_specialty)
		ON DELETE CASCADE
		ON UPDATE CASCADE,
CONSTRAINT R_11 FOREIGN KEY (id_student_general_information) REFERENCES StudentGeneralInformation(id_student_general_information)
		ON DELETE CASCADE
		ON UPDATE CASCADE
)
go




CREATE PROCEDURE addSocialStatus @caption varchar(255)   
   
 AS BEGIN
    INSERT INTO ListSex (caption) VALUES (@caption)
END
go
