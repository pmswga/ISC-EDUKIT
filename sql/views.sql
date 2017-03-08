/*
  
  VIEW Parents
  VIEW Parents-childs
  
  VIEW Students
  VIEW Teachers
  
  VIEW Teacher-subjects
  VIEW Teacher-tests
  
  VIEW Specialtys-groups
  
*/
use iep;

DROP VIEW IF EXISTS v_Users;
DROP VIEW IF EXISTS v_Students;
DROP VIEW IF EXISTS v_Teachers;
DROP VIEW IF EXISTS v_Parents;
DROP VIEW IF EXISTS v_Groups;
DROP VIEW IF EXISTS v_Specialtyes;
DROP VIEW IF EXISTS v_Subjects;
DROP VIEW IF EXISTS v_Relations;
DROP VIEW IF EXISTS v_News;

CREATE VIEW v_Users (sn, fn, pt, email, paswd, type_user) as
	SELECT `second_name`, `first_name`, `patronymic`, `password`, `email`, `id_type_user` 
	FROM `users` 
	ORDER BY `second_name`, `first_name`, `patronymic`;
	
CREATE VIEW v_Students (sn, fn, pt, email, paswd, home_address, cell_phone, grp) as
	SELECT u.second_name, u.first_name, u.patronymic, u.email, u.password, s.home_address, s.cell_phone, g.description 
	FROM `users` u 
		INNER JOIN `students` s ON u.id_user=s.id_student
		INNER JOIN `groups` g ON s.grp=g.grp
	WHERE u.id_type_user=4
	ORDER BY u.second_name, u.first_name, u.patronymic;

CREATE VIEW v_Parents (sn, fn, pt, email, paswd, age, education, work_place, post, home_phone, cell_phone) as
  SELECT u.second_name, u.first_name, u.patronymic, u.email, u.password, p.age, p.education, p.work_place, p.post, p.home_phone, p.cell_phone 
  FROM `users` u 
		INNER JOIN `parents` p ON u.id_user=p.id_parent
  WHERE u.id_type_user=5
  ORDER BY u.second_name, u.first_name, u.patronymic;

CREATE VIEW v_Teachers (sn, fn, pt, email, paswd, info) as
	SELECT u.second_name, u.first_name, u.patronymic, u.email, u.password, t.info
	FROM `users` u
		INNER JOIN `teachers` t ON u.id_user=t.id_teacher
  WHERE u.id_type_user=2
  ORDER BY u.second_name, u.first_name, u.patronymic;
	

CREATE VIEW v_Groups (grp, spec, budget) as
	SELECT g.description, s.description, g.is_budget 
	FROM `groups` g 
		INNER JOIN `specialty` s ON g.code_spec=s.id_spec
	ORDER BY g.description;

CREATE VIEW v_Specialtyes (descp, pdf) as
	SELECT `description`, `pdf_file`
	FROM `specialty`
	ORDER BY `description`;

CREATE VIEW v_Subjects (descp) as
	SELECT `description`
	FROM `subjects`
	ORDER BY `description`;
	
CREATE VIEW v_Relations (descp) as
	SELECT `description`
	FROM `relations`
	ORDER BY `description`;
	
CREATE VIEW v_News (caption, content, author, email, dp) as
	SELECT n.caption, n.content, CONCAT(u.second_name, ' ', LEFT(u.first_name, 1), '. ', LEFT(u.patronymic, 1), '.') as author, u.email, n.date_publication
	FROM `news` n
		INNER JOIN `users` u ON n.id_author=u.id_user
	ORDER BY n.date_publication;

