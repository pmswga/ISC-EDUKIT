/*
  
  VIEW Parents
  VIEW Parents-childs
  
  VIEW Students
  VIEW Teachers
  
  VIEW Teacher-subjects
  VIEW Teacher-tests
  
  VIEW Specialtys-groups
  
*/

CREATE VIEW v_Parents (second_name, first_name, patronymic, email, password, age, education, work_place, post, home_phone, cell_phone)
as (
  SELECT u.second_name, u.first_name, u.patronymic, u.email, u.password, p.age, p.education, p.work_place, p.post, p.home_phone, p.cell_phone FROM `users` u INNER JOIN `parents` p ON u.id_user=p.id_parent
);