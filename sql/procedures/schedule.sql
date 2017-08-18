use `iep`;

DROP PROCEDURE IF EXISTS addScheduleEntry;
DROP PROCEDURE IF EXISTS addChangeSchedule;
DROP PROCEDURE IF EXISTS getScheduleGroup;
DROP PROCEDURE IF EXISTS getChangeScheduleGroup;
DROP PROCEDURE IF EXISTS getAllScheduleGroup;
DROP PROCEDURE IF EXISTS getAllChangedSchedule;
DROP PROCEDURE IF EXISTS changePair;
DROP PROCEDURE IF EXISTS changeChangedSchedulePair;

DELIMITER //

CREATE PROCEDURE IF NOT EXISTS addScheduleEntry(grp int, d int, pair int, subject int)
BEGIN
  INSERT INTO `schedule` (`id_grp`, `_day`, `pair`, `subject`) VALUES (grp, d, pair, subject);
END;

CREATE PROCEDURE IF NOT EXISTS addChangeSchedule(g int, d datetime, p int, s int)
BEGIN
	INSERT INTO `changed_schedule` (`id_grp`, `_day`, `pair`, `subject`) VALUES (g, d, p, s);
END;

CREATE PROCEDURE IF NOT EXISTS getScheduleGroup(grp int)
BEGIN
  SELECT s._day, 
		 g.description as 'group',
         s.id_grp as 'id_grp',
         s.pair, 
         sb.description as 'subject'
  FROM `schedule` s
	INNER JOIN `groups` g ON s.id_grp=g.grp
	INNER JOIN `subjects` sb ON s.subject=sb.id_subject
  WHERE s.id_grp=grp
  ORDER BY s.pair;
END;

CREATE PROCEDURE IF NOT EXISTS getChangeScheduleGroup(grp int)
BEGIN
  SELECT s._day, 
		 g.description as 'group',
         s.id_grp as 'id_grp',
         s.pair, 
         sb.description as 'subject'
  FROM `changed_schedule` s
	INNER JOIN `groups` g ON s.id_grp=g.grp
	INNER JOIN `subjects` sb ON s.subject=sb.id_subject
  WHERE s.id_grp=grp
  ORDER BY s.pair;
END;

CREATE PROCEDURE IF NOT EXISTS getAllScheduleGroup()
BEGIN
  SELECT s._day, 
		 g.description as 'group',
         s.id_grp as 'id_grp',
         s.pair, 
         sb.description as 'subject'
  FROM `schedule` s
	INNER JOIN `groups` g ON s.id_grp=g.grp
	INNER JOIN `subjects` sb ON s.subject=sb.id_subject
  ORDER BY s._day, s.pair;
END;

CREATE PROCEDURE IF NOT EXISTS getAllChangedSchedule()
BEGIN
  SELECT s._day, 
		 g.description as 'group',
         s.id_grp as 'id_grp',
         s.pair, 
         sb.description as 'subject'
  FROM `changed_schedule` s
	INNER JOIN `groups` g ON s.id_grp=g.grp
	INNER JOIN `subjects` sb ON s.subject=sb.id_subject
  ORDER BY s._day, s.pair;
END;

CREATE PROCEDURE changePair(g int, d int, p int, s int)
BEGIN
	UPDATE `schedule`
    SET `subject`=s
    WHERE `id_grp`=g AND `pair`=p AND `_day`=d;
END;

CREATE PROCEDURE changeChangedSchedulePair(g int, d datetime, p int, s int)
BEGIN
	UPDATE `changed_schedule`
    SET `subject`=s
    WHERE `id_grp`=g AND `pair`=p AND `_day`=d;
END;

//

DELIMITER ;