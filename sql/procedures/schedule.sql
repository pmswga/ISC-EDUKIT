use `iep`;

DROP PROCEDURE IF EXISTS addScheduleEntry;
DROP PROCEDURE IF EXISTS getScheduleGroup;

DELIMITER //

CREATE PROCEDURE IF NOT EXISTS addScheduleEntry(grp int, d char(2), pair int, subject int)
BEGIN
  INSERT INTO `schedule` (`id_grp`, `day`, `pair`, `subject`) VALUES (grp, d, pair, subject);
END;

CREATE PROCEDURE IF NOT EXISTS getScheduleGroup(grp int)
BEGIN
  SELECT s.day, 
		 g.description as 'group', 
         s.pair, 
         sb.description as 'subject'
  FROM `schedule` s
	INNER JOIN `groups` g ON s.id_grp=g.grp
	INNER JOIN `subjects` sb ON s.subject=sb.id_subject
  WHERE s.id_grp=grp
  ORDER BY s.pair;
END;


//

DELIMITER ;