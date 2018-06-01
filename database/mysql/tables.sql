DROP DATABASE IF EXISTS `edukit`;
CREATE DATABASE IF NOT EXISTS `edukit` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `edukit`;



CREATE TABLE ListSex
(
	id_sex               INTEGER NOT NULL,
	caption              VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_sex)
);



CREATE TABLE ListSocialStatus
(
	id_social_status     INTEGER NOT NULL,
	caption              VARCHAR(4000) NOT NULL,
	PRIMARY KEY (id_social_status)
);



CREATE TABLE ListCitizenship
(
	id_citizenship       INTEGER NOT NULL,
	caption              VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_citizenship)
);



CREATE TABLE StudentGeneralInformation
(
	second_name          VARCHAR(4000) NOT NULL,
	first_name           VARCHAR(4000) NOT NULL,
	patronymic           VARCHAR(4000) NOT NULL,
	id_sex               INTEGER NOT NULL,
	date_birthday        DATE NOT NULL,
	id_social_status     INTEGER NOT NULL,
	actual_address       VARCHAR(4000) NOT NULL,
	id_student_general_information INTEGER NOT NULL,
	id_citizenship       INTEGER NOT NULL,
	reg_address          VARCHAR(20) NOT NULL,
	reg_2_address        VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_student_general_information),
	FOREIGN KEY R_1 (id_sex) REFERENCES ListSex (id_sex)
		ON DELETE CASCADE,
	FOREIGN KEY R_3 (id_social_status) REFERENCES ListSocialStatus (id_social_status)
		ON DELETE CASCADE,
	FOREIGN KEY R_13 (id_citizenship) REFERENCES ListCitizenship (id_citizenship)
		ON DELETE CASCADE
);



CREATE TABLE StudentMilitrayInformation
(
	military_commissariat_full_caption VARCHAR(4000) NOT NULL,
	military_commissariat_adress VARCHAR(4000) NOT NULL,
	is_served            boolean NOT NULL,
	id_student_general_information INTEGER NOT NULL,
	military_commissariat_short_caption VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_student_general_information),
	FOREIGN KEY R_12 (id_student_general_information) REFERENCES StudentGeneralInformation (id_student_general_information)
		ON DELETE CASCADE
);



CREATE TABLE CollegeInformation
(
	id_college_information INTEGER NOT NULL,
	full_name            varchar(255) NOT NULL,
	short_name           varchar(255) NOT NULL,
	address              varchar(255) NOT NULL,
	PRIMARY KEY (id_college_information)
);



CREATE TABLE ListEducationStatus
(
	id_education_status  INTEGER NOT NULL,
	caption              VARCHAR(4000) NOT NULL,
	PRIMARY KEY (id_education_status)
);



CREATE TABLE StudentAttendance
(
	id_student_attendance INTEGER NOT NULL,
	attendance_date      DATE NOT NULL,
	count_pair           INTEGER NOT NULL,
	count_pass           INTEGER NOT NULL,
	id_student_general_information INTEGER NULL,
	PRIMARY KEY (id_student_attendance),
	FOREIGN KEY R_42 (id_student_general_information) REFERENCES StudentGeneralInformation (id_student_general_information)
);



CREATE TABLE EducationGroup
(
	id_group             INTEGER NOT NULL,
	caption              VARCHAR(4000) NOT NULL,
	education_year       INTEGER NOT NULL,
	PRIMARY KEY (id_group)
);



CREATE TABLE EducationSpecialty
(
	id_specialty         INTEGER NOT NULL,
	code                 VARCHAR(4000) NOT NULL,
	spec_file            BLOB NOT NULL,
	PRIMARY KEY (id_specialty)
);



CREATE TABLE ListPaymentType
(
	id_payment_type      INTEGER NOT NULL,
	caption              varchar(255) NOT NULL,
	PRIMARY KEY (id_payment_type)
);



CREATE TABLE ListEducationForm
(
	id_education_form    INTEGER NOT NULL,
	caption              VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_education_form)
);



CREATE TABLE StudentCurrStudyInformation
(
	id_payment_type      INTEGER NOT NULL,
	id_group             INTEGER NOT NULL,
	id_specialty         INTEGER NOT NULL,
	id_student_general_information INTEGER NOT NULL,
	receipt_year         INTEGER NOT NULL,
	graduation_year      INTEGER NOT NULL,
	id_education_status  INTEGER NULL,
	id_education_form    INTEGER NULL,
	student_ticket_number INTEGER NOT NULL,
	PRIMARY KEY (id_student_general_information),
	FOREIGN KEY R_4 (id_group) REFERENCES EducationGroup (id_group)
		ON DELETE CASCADE,
	FOREIGN KEY R_5 (id_specialty) REFERENCES EducationSpecialty (id_specialty)
		ON DELETE CASCADE,
	FOREIGN KEY R_23 (id_payment_type) REFERENCES ListPaymentType (id_payment_type),
	FOREIGN KEY R_11 (id_student_general_information) REFERENCES StudentGeneralInformation (id_student_general_information)
		ON DELETE CASCADE,
	FOREIGN KEY R_24 (id_education_status) REFERENCES ListEducationStatus (id_education_status),
	FOREIGN KEY R_25 (id_education_form) REFERENCES ListEducationForm (id_education_form)
);



CREATE TABLE ListContactType
(
	id_contact_type      INTEGER NOT NULL,
	caption              VARCHAR(4000) NOT NULL,
	PRIMARY KEY (id_contact_type)
);



CREATE TABLE StudentContactInformation
(
	id_person_contact    INTEGER NOT NULL,
	id_contact_type      INTEGER NOT NULL,
	value                varchar(255) NOT NULL,
	comment              varchar(255) NULL,
	id_student_general_information INTEGER NOT NULL,
	PRIMARY KEY (id_person_contact),
	FOREIGN KEY R_6 (id_contact_type) REFERENCES ListContactType (id_contact_type)
		ON DELETE CASCADE,
	FOREIGN KEY R_9 (id_student_general_information) REFERENCES StudentGeneralInformation (id_student_general_information)
		ON DELETE CASCADE
);



CREATE TABLE ListEducationPair
(
	id_education_pair    INTEGER NOT NULL,
	number_pair          INTEGER NOT NULL,
	text_pair            VARCHAR(20) NOT NULL,
	time_start           VARCHAR(20) NOT NULL,
	time_end             VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_education_pair)
);



CREATE TABLE EducationSubject
(
	id_education_subject INTEGER NOT NULL,
	full_caption         VARCHAR(20) NOT NULL,
	short_caption        VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_education_subject)
);



CREATE TABLE IEPScheduleChange
(
	id_schedule_change   INTEGER NOT NULL,
	change_day           DATE NOT NULL,
	id_education_pair    INTEGER NULL,
	id_education_subject INTEGER NULL,
	id_group             INTEGER NULL,
	PRIMARY KEY (id_schedule_change),
	FOREIGN KEY R_52 (id_education_pair) REFERENCES ListEducationPair (id_education_pair),
	FOREIGN KEY R_53 (id_education_subject) REFERENCES EducationSubject (id_education_subject),
	FOREIGN KEY R_55 (id_group) REFERENCES EducationGroup (id_group)
);



CREATE TABLE AdmissionPlan
(
	id_admission_plan    INTEGER NOT NULL,
	id_specialty         INTEGER NOT NULL,
	admission_year       INTEGER NOT NULL,
	count_person         INTEGER NOT NULL,
	PRIMARY KEY (id_admission_plan),
	FOREIGN KEY R_21 (id_specialty) REFERENCES EducationSpecialty (id_specialty)
);



CREATE TABLE ListSubjectAttestationType
(
	id_subject_attestation_type INTEGER NOT NULL,
	caption              VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_subject_attestation_type)
);



CREATE TABLE EducationStatement
(
	id_education_statement INTEGER NOT NULL,
	chairman_cyclic_comission VARCHAR(20) NOT NULL,
	deputy_education_part VARCHAR(20) NOT NULL,
	id_subject_attestation_type INTEGER NULL,
	PRIMARY KEY (id_education_statement),
	FOREIGN KEY R_50 (id_subject_attestation_type) REFERENCES ListSubjectAttestationType (id_subject_attestation_type)
);



CREATE TABLE ListMarkType
(
	id_mark_type         INTEGER NOT NULL,
	number_mark          INTEGER NOT NULL,
	text_mark            VARCHAR(20) NOT NULL,
	full_mark_caption    VARCHAR(20) NOT NULL,
	short_mark_caption   VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_mark_type)
);



CREATE TABLE EducationStatementResult
(
	id_education_statement_result INTEGER NOT NULL,
	id_education_statement INTEGER NULL,
	id_student_general_information INTEGER NULL,
	id_mark_type         INTEGER NULL,
	PRIMARY KEY (id_education_statement_result),
	FOREIGN KEY R_48 (id_education_statement) REFERENCES EducationStatement (id_education_statement),
	FOREIGN KEY R_49 (id_student_general_information) REFERENCES StudentGeneralInformation (id_student_general_information),
	FOREIGN KEY R_51 (id_mark_type) REFERENCES ListMarkType (id_mark_type)
);



CREATE TABLE ListEducationDay
(
	id_education_day     INTEGER NOT NULL,
	number_day           INTEGER NOT NULL,
	text_day             VARCHAR(20) NOT NULL,
	text_short_day       VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_education_day)
);



CREATE TABLE IEPScheduleGeneral
(
	id_education_schedule_general INTEGER NOT NULL,
	id_education_pair    INTEGER NULL,
	id_education_day     INTEGER NULL,
	id_education_subject INTEGER NULL,
	id_group             INTEGER NULL,
	PRIMARY KEY (id_education_schedule_general),
	FOREIGN KEY R_43 (id_education_pair) REFERENCES ListEducationPair (id_education_pair),
	FOREIGN KEY R_44 (id_education_day) REFERENCES ListEducationDay (id_education_day),
	FOREIGN KEY R_45 (id_education_subject) REFERENCES EducationSubject (id_education_subject),
	FOREIGN KEY R_47 (id_education_subject) REFERENCES EducationSubject (id_education_subject),
	FOREIGN KEY R_54 (id_group) REFERENCES EducationGroup (id_group)
);



CREATE TABLE IEPScheduleCourse
(
	id_scheudle_course   INTEGER NOT NULL,
	id_education_day     INTEGER NULL,
	time_start           VARCHAR(20) NOT NULL,
	time_end             VARCHAR(20) NOT NULL,
	course               VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_scheudle_course),
	FOREIGN KEY R_56 (id_education_day) REFERENCES ListEducationDay (id_education_day)
);



CREATE TABLE ListAcademicLeaveReason
(
	id_academic_leave_reason INTEGER NOT NULL,
	caption              VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_academic_leave_reason)
);



CREATE TABLE StudentEventAcademicLeave
(
	id_student_event_academic_leave INTEGER NOT NULL,
	out_date             DATE NOT NULL,
	in_date              DATE NOT NULL,
	order_number         VARCHAR(20) NOT NULL,
	order_date           DATE NOT NULL,
	id_student_general_information INTEGER NULL,
	id_academic_leave_reason INTEGER NULL,
	PRIMARY KEY (id_student_event_academic_leave),
	FOREIGN KEY R_39 (id_student_general_information) REFERENCES StudentGeneralInformation (id_student_general_information),
	FOREIGN KEY R_40 (id_academic_leave_reason) REFERENCES ListAcademicLeaveReason (id_academic_leave_reason)
);



CREATE TABLE ListEducationType
(
	id_education_type    INTEGER NOT NULL,
	caption              VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_education_type)
);



CREATE TABLE ListParentRelation
(
	id_relation          INTEGER NOT NULL,
	caption              VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_relation)
);



CREATE TABLE StudentFamilyInformation
(
	id_student_family_information INTEGER NOT NULL,
	second_name          VARCHAR(20) NOT NULL,
	id_student_general_information INTEGER NULL,
	first_name           VARCHAR(20) NOT NULL,
	patronymic           VARCHAR(20) NOT NULL,
	date_birthday        DATE NOT NULL,
	id_sex               INTEGER NULL,
	id_education_type    INTEGER NULL,
	work_place           VARCHAR(20) NOT NULL,
	work_post            VARCHAR(20) NOT NULL,
	home_phone           VARCHAR(20) NOT NULL,
	cell_phone           VARCHAR(20) NOT NULL,
	actual_address       VARCHAR(20) NOT NULL,
	id_relation          INTEGER NULL,
	PRIMARY KEY (id_student_family_information),
	FOREIGN KEY R_27 (id_student_general_information) REFERENCES StudentGeneralInformation (id_student_general_information),
	FOREIGN KEY R_28 (id_sex) REFERENCES ListSex (id_sex),
	FOREIGN KEY R_29 (id_education_type) REFERENCES ListEducationType (id_education_type),
	FOREIGN KEY R_30 (id_relation) REFERENCES ListParentRelation (id_relation)
);



CREATE TABLE JournalCall
(
	id_journal_call      INTEGER NOT NULL,
	id_student_family_information INTEGER NULL,
	reason               VARCHAR(20) NOT NULL,
	theme                VARCHAR(20) NOT NULL,
	call_date            DATE NOT NULL,
	PRIMARY KEY (id_journal_call),
	FOREIGN KEY R_38 (id_student_family_information) REFERENCES StudentFamilyInformation (id_student_family_information)
);



CREATE TABLE IEPNews
(
	id_iep_news          INTEGER NOT NULL,
	title                VARCHAR(20) NOT NULL,
	content              VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_iep_news)
);



CREATE TABLE ListUserType
(
	id_user_type         INTEGER NOT NULL,
	caption              VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_user_type)
);



CREATE TABLE IEPAccount
(
	id_iep_account       INTEGER NOT NULL,
	email                VARCHAR(20) NOT NULL,
	passwd               VARCHAR(20) NOT NULL,
	id_user_type         INTEGER NULL,
	PRIMARY KEY (id_iep_account),
	FOREIGN KEY R_37 (id_user_type) REFERENCES ListUserType (id_user_type)
);



CREATE TABLE ListReferenceType
(
	id_reference_type    INTEGER NOT NULL,
	caption              VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_reference_type)
);



CREATE TABLE JournalReference
(
	id_journal_reference INTEGER NOT NULL,
	id_student_general_information INTEGER NULL,
	id_reference_type    INTEGER NULL,
	reason               VARCHAR(20) NOT NULL,
	date_issue           DATE NOT NULL,
	PRIMARY KEY (id_journal_reference),
	FOREIGN KEY R_35 (id_student_general_information) REFERENCES StudentGeneralInformation (id_student_general_information),
	FOREIGN KEY R_36 (id_reference_type) REFERENCES ListReferenceType (id_reference_type)
);



CREATE TABLE ListDocumentType
(
	id_document_type     INTEGER NOT NULL,
	caption              VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_document_type)
);



CREATE TABLE StudentDocumentInformation
(
	id_student_document_information INTEGER NOT NULL,
	serial               VARCHAR(20) NOT NULL,
	number               VARCHAR(20) NOT NULL,
	date_issue           DATE NOT NULL,
	issued_by            VARCHAR(20) NOT NULL,
	id_document_type     INTEGER NULL,
	id_student_general_information INTEGER NULL,
	code                 VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_student_document_information),
	FOREIGN KEY R_31 (id_document_type) REFERENCES ListDocumentType (id_document_type),
	FOREIGN KEY R_32 (id_student_general_information) REFERENCES StudentGeneralInformation (id_student_general_information)
);



CREATE TABLE ListPreviousEducationType
(
	id_previous_education_type INTEGER NOT NULL,
	caption              VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_previous_education_type)
);



CREATE TABLE StudentPrevStudyInformation
(
	id_previous_education_type INTEGER NULL,
	id_student_prev_study_information INTEGER NOT NULL,
	serial_number        VARCHAR(20) NOT NULL,
	number               VARCHAR(20) NOT NULL,
	date_issue           DATE NOT NULL,
	issued_by            VARCHAR(20) NOT NULL,
	file_scan            BLOB NOT NULL,
	PRIMARY KEY (id_student_prev_study_information),
	FOREIGN KEY R_26 (id_previous_education_type) REFERENCES ListPreviousEducationType (id_previous_education_type)
);


