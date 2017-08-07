use `iep`;

DROP PROCEDURE IF EXISTS addScheduleEntry;
DROP PROCEDURE IF EXISTS getScheduleGroup;
DROP PROCEDURE IF EXISTS getAllScheduleGroup;
DROP PROCEDURE IF EXISTS changePair;

DELIMITER //

CREATE PROCEDURE IF NOT EXISTS addScheduleEntry(grp int, d int, pair int, subject int)
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

CREATE PROCEDURE IF NOT EXISTS getAllScheduleGroup()
BEGIN
  SELECT s.day, 
		 g.description as 'group',
         s.id_grp as 'id_grp',
         s.pair, 
         sb.description as 'subject'
  FROM `schedule` s
	INNER JOIN `groups` g ON s.id_grp=g.grp
	INNER JOIN `subjects` sb ON s.subject=sb.id_subject
  ORDER BY s.day, s.pair;
END;

CREATE PROCEDURE changePair(g int, d int, p int, s int)
BEGIN
	UPDATE `schedule`
    SET `subject`=s
    WHERE `id_grp`=g AND `pair`=p AND `day`=d;
END;

//

DELIMITER ;