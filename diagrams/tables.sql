USE `edukit`;

CREATE TABLE AdmissionPlan
(
	id_admission_plan    INTEGER NOT NULL,
	id_specialty         INTEGER NOT NULL,
	admission_year       INTEGER NOT NULL,
	count_person         INTEGER NOT NULL,
	PRIMARY KEY (id_admission_plan)
);



CREATE TABLE CollegeInformation
(
	id_college_information INTEGER NOT NULL,
	full_name            varchar(255) NOT NULL,
	short_name           varchar(255) NOT NULL,
	address              varchar(255) NOT NULL,
	PRIMARY KEY (id_college_information)
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



CREATE TABLE EducationStatement
(
	id_education_statement INTEGER NOT NULL,
	chairman_cyclic_comission VARCHAR(20) NOT NULL,
	deputy_education_part VARCHAR(20) NOT NULL,
	id_subject_attestation_type INTEGER NULL,
	id_education_subject INTEGER NULL,
	semestr              VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_education_statement)
);



CREATE TABLE EducationStatementResult
(
	id_education_statement_result INTEGER NOT NULL,
	id_education_statement INTEGER NULL,
	id_student           INTEGER NULL,
	id_mark_type         INTEGER NULL,
	PRIMARY KEY (id_education_statement_result)
);



CREATE TABLE EducationSubject
(
	id_education_subject INTEGER NOT NULL,
	full_caption         VARCHAR(20) NOT NULL,
	short_caption        VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_education_subject)
);



CREATE TABLE EducationTeacher
(
	id_teacher           INTEGER NOT NULL,
	second_name          VARCHAR(20) NOT NULL,
	first_name           VARCHAR(20) NOT NULL,
	patronymic           VARCHAR(20) NOT NULL,
	id_sex               INTEGER NULL,
	date_birthday        DATE NOT NULL,
	info                 VARCHAR(20) NOT NULL,
	photo                BLOB NOT NULL,
	PRIMARY KEY (id_teacher)
);



CREATE TABLE EducationTeacherSubject
(
	id_teacher           INTEGER NOT NULL,
	id_education_subject INTEGER NOT NULL,
	PRIMARY KEY (id_teacher,id_education_subject)
);



CREATE TABLE IEPAccount
(
	id_iep_account       INTEGER NOT NULL,
	email                VARCHAR(20) NOT NULL,
	passwd               VARCHAR(20) NOT NULL,
	id_user_type         INTEGER NULL,
	PRIMARY KEY (id_iep_account)
);



CREATE TABLE IEPNews
(
	id_iep_news          INTEGER NOT NULL,
	title                VARCHAR(20) NOT NULL,
	content              VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_iep_news)
);



CREATE TABLE IEPScheduleChange
(
	id_schedule_change   INTEGER NOT NULL,
	change_day           DATE NOT NULL,
	id_education_pair    INTEGER NULL,
	id_education_subject INTEGER NULL,
	id_group             INTEGER NULL,
	PRIMARY KEY (id_schedule_change)
);



CREATE TABLE IEPScheduleCourse
(
	id_scheudle_course   INTEGER NOT NULL,
	id_education_day     INTEGER NULL,
	time_start           VARCHAR(20) NOT NULL,
	time_end             VARCHAR(20) NOT NULL,
	course               VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_scheudle_course)
);



CREATE TABLE IEPScheduleGeneral
(
	id_education_schedule_general INTEGER NOT NULL,
	id_education_pair    INTEGER NULL,
	id_education_day     INTEGER NULL,
	id_education_subject INTEGER NULL,
	id_group             INTEGER NULL,
	PRIMARY KEY (id_education_schedule_general)
);



CREATE TABLE JournalCall
(
	id_journal_call      INTEGER NOT NULL,
	id_family            INTEGER NULL,
	reason               VARCHAR(20) NOT NULL,
	theme                VARCHAR(20) NOT NULL,
	call_date            DATE NOT NULL,
	PRIMARY KEY (id_journal_call)
);



CREATE TABLE JournalReference
(
	id_journal_reference INTEGER NOT NULL,
	id_student           INTEGER NULL,
	id_reference_type    INTEGER NULL,
	reason               VARCHAR(20) NOT NULL,
	date_issue           DATE NOT NULL,
	PRIMARY KEY (id_journal_reference)
);



CREATE TABLE ListAcademicLeaveReason
(
	id_academic_leave_reason INTEGER AUTO_INCREMENT,
	caption              VARCHAR(255) NOT NULL

	PRIMARY KEY (id_academic_leave_reason)
);



CREATE TABLE ListCitizenship
(
	id_citizenship       INTEGER AUTO_INCREMENT,
	caption              VARCHAR(255) NOT NULL

	PRIMARY KEY (id_citizenship)
);



CREATE TABLE ListContactType
(
	id_contact_type      INTEGER AUTO_INCREMENT,
	caption              VARCHAR(255) NOT NULL

	PRIMARY KEY (id_contact_type)
);



CREATE TABLE ListDocumentType
(
	id_document_type     INTEGER AUTO_INCREMENT,
	caption              VARCHAR(255) NOT NULL

	PRIMARY KEY (id_document_type)
);



CREATE TABLE ListEducationDay
(
	id_education_day     INTEGER AUTO_INCREMENT,
	number_day           INTEGER NOT NULL,
	text_day             VARCHAR(20) NOT NULL,
	text_short_day       VARCHAR(2) NOT NULL

	PRIMARY KEY (id_education_day)
);



CREATE TABLE ListEducationForm
(
	id_education_form    INTEGER AUTO_INCREMENT,
	caption              VARCHAR(255) NOT NULL

	PRIMARY KEY (id_education_form)
);



CREATE TABLE ListEducationPair
(
	id_education_pair    INTEGER AUTO_INCREMENT,
	number_pair          INTEGER NOT NULL,
	text_pair            VARCHAR(20) NOT NULL,
	time_start           VARCHAR(5) NOT NULL,
	time_end             VARCHAR(5) NOT NULL

	PRIMARY KEY (id_education_pair)
);



CREATE TABLE ListEducationStatus
(
	id_education_status  INTEGER AUTO_INCREMENT,
	caption              VARCHAR(255) NOT NULL

	PRIMARY KEY (id_education_status)
);



CREATE TABLE ListEducationType
(
	id_education_type    INTEGER AUTO_INCREMENT,
	caption              VARCHAR(255) NOT NULL

	PRIMARY KEY (id_education_type)
);



CREATE TABLE ListMarkType
(
	id_mark_type         INTEGER AUTO_INCREMENT,
	number_mark          INTEGER NOT NULL,
	text_mark            VARCHAR(10) NOT NULL,
	full_mark_caption    VARCHAR(20) NOT NULL,
	short_mark_caption   VARCHAR(10) NOT NULL

	PRIMARY KEY (id_mark_type)
);



CREATE TABLE ListParentRelation
(
	id_relation          INTEGER AUTO_INCREMENT,
	caption              VARCHAR(255) NOT NULL

	PRIMARY KEY (id_relation)
);



CREATE TABLE ListPaymentType
(
	id_payment_type      INTEGER AUTO_INCREMENT,
	caption              varchar(255) NOT NULL

	PRIMARY KEY (id_payment_type)
);



CREATE TABLE ListPreviousEducationType
(
	id_previous_education_type INTEGER AUTO_INCREMENT,
	caption              VARCHAR(255) NOT NULL
 AUTO_INCREMENT = ,
	PRIMARY KEY (id_previous_education_type)
);



CREATE TABLE ListReferenceType
(
	id_reference_type    INTEGER AUTO_INCREMENT,
	caption              VARCHAR(255) NOT NULL

	PRIMARY KEY (id_reference_type)
);



CREATE TABLE ListSex
(
	id_sex               INTEGER AUTO_INCREMENT,
	caption              VARCHAR(255) NOT NULL

	PRIMARY KEY (id_sex)
);



CREATE TABLE ListSocialStatus
(
	id_social_status     INTEGER AUTO_INCREMENT,
	caption              VARCHAR(255) NOT NULL

	PRIMARY KEY (id_social_status)
);



CREATE TABLE ListSubjectAttestationType
(
	id_subject_attestation_type INTEGER AUTO_INCREMENT,
	caption              VARCHAR(255) NOT NULL

	PRIMARY KEY (id_subject_attestation_type)
);



CREATE TABLE ListUserType
(
	id_user_type         INTEGER AUTO_INCREMENT,
	caption              VARCHAR(255) NOT NULL

	PRIMARY KEY (id_user_type)
);



CREATE TABLE StudentAttendance
(
	id_attendance        INTEGER NOT NULL,
	attendance_date      DATE NOT NULL,
	count_pair           INTEGER NOT NULL,
	count_pass           INTEGER NOT NULL,
	id_student           INTEGER NULL,
	PRIMARY KEY (id_attendance)
);



CREATE TABLE StudentContactInformation
(
	id_contact           INTEGER NOT NULL,
	id_contact_type      INTEGER NOT NULL,
	value                varchar(255) NOT NULL,
	comment              varchar(255) NULL,
	id_student           INTEGER NOT NULL,
	PRIMARY KEY (id_contact)
);



CREATE TABLE StudentCurrStudyInformation
(
	id_payment_type      INTEGER NOT NULL,
	id_group             INTEGER NOT NULL,
	id_specialty         INTEGER NOT NULL,
	id_student           INTEGER NOT NULL,
	receipt_year         INTEGER NOT NULL,
	graduation_year      INTEGER NOT NULL,
	id_education_status  INTEGER NULL,
	id_education_form    INTEGER NULL,
	personal_number      INTEGER NOT NULL,
	PRIMARY KEY (id_student)
);



CREATE TABLE StudentDocumentInformation
(
	id_document          INTEGER NOT NULL,
	serial               VARCHAR(20) NOT NULL,
	number               VARCHAR(20) NOT NULL,
	date_issue           DATE NOT NULL,
	issued_by            VARCHAR(20) NOT NULL,
	id_document_type     INTEGER NULL,
	id_student           INTEGER NULL,
	code                 VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_document)
);



CREATE TABLE StudentEventAcademicLeave
(
	id_student_event_academic_leave INTEGER NOT NULL,
	out_date             DATE NOT NULL,
	in_date              DATE NOT NULL,
	order_number         VARCHAR(20) NOT NULL,
	order_date           DATE NOT NULL,
	id_student           INTEGER NULL,
	id_academic_leave_reason INTEGER NULL,
	PRIMARY KEY (id_student_event_academic_leave)
);



CREATE TABLE StudentFamilyInformation
(
	id_family            INTEGER NOT NULL,
	second_name          VARCHAR(20) NOT NULL,
	id_student           INTEGER NULL,
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
	PRIMARY KEY (id_family)
);



CREATE TABLE StudentGeneralInformation
(
	second_name          VARCHAR(30) NOT NULL,
	first_name           VARCHAR(30) NOT NULL,
	patronymic           VARCHAR(30) NOT NULL,
	id_sex               INTEGER NOT NULL,
	date_birthday        DATE NOT NULL,
	id_social_status     INTEGER NOT NULL,
	actual_address       VARCHAR(255) NOT NULL,
	id_student           INTEGER NOT NULL,
	id_citizenship       INTEGER NOT NULL,
	registration_address VARCHAR(255) NOT NULL,
	residence_address    VARCHAR(255) NOT NULL,
	PRIMARY KEY (id_student)
);



CREATE TABLE StudentMilitrayInformation
(
	military_commissariat_full_caption VARCHAR(4000) NOT NULL,
	military_commissariat_adress VARCHAR(4000) NOT NULL,
	is_served            boolean NOT NULL,
	id_student           INTEGER NOT NULL,
	military_commissariat_short_caption VARCHAR(20) NOT NULL,
	PRIMARY KEY (id_student)
);



CREATE TABLE StudentPrevStudyInformation
(
	id_previous_education_type INTEGER NULL,
	id_prev_study        INTEGER NOT NULL,
	serial_number        VARCHAR(20) NOT NULL,
	number               VARCHAR(20) NOT NULL,
	date_issue           DATE NOT NULL,
	issued_by            VARCHAR(20) NOT NULL,
	file_scan            BLOB NOT NULL,
	PRIMARY KEY (id_prev_study)
);
