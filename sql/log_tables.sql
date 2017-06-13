USE `iep`;

/*
	
	tbl:
		users
		admins
		teachers
		students
		parents
		
		typeUsers
		
		groups
		news
		specialty
		subjects
		
		student_traffic
		relations
	
		tests
		questions
		answers
		
*/

CREATE TABLE IF NOT EXISTS `logs` (
	id_log int AUTO_INCREMENT PRIMARY KEY,
	tbl char(255) NOT NULL,
	msg text NOT NULL
) ENGINE = InnoDB CHARACTER SET = UTF8;

