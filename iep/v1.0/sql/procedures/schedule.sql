use `iep`;

DROP PROCEDURE IF EXISTS addScheduleEntry;
DROP PROCEDURE IF EXISTS addChangeSchedule;
DROP PROCEDURE IF EXISTS getScheduleGroup;
DROP PROCEDURE IF EXISTS getChangeScheduleGroup;
DROP PROCEDURE IF EXISTS getAllScheduleGroup;
DROP PROCEDURE IF EXISTS getAllChangedSchedule;
DROP PROCEDURE IF EXISTS changePair;
DROP PROCEDURE IF EXISTS changeChangedSchedulePair;
DROP PROCEDURE IF EXISTS deleteChangedSchedulePair;

DELIMITER //

CREATE PROCEDURE addScheduleEntry(grp int, d int, pair int, subj1 int, subj2 int)
BEGIN
  INSERT INTO `schedule` (`id_grp`, `_day`, `pair`, `subj_1`, `subj_2`) VALUES (grp, d, pair, subj1, subj2);
END;

CREATE PROCEDURE addChangeSchedule(g int, d datetime, p int, s int)
BEGIN
	INSERT INTO `changed_schedule` (`id_grp`, `_day`, `pair`, `subject`) VALUES (g, d, p, s);
END;

CREATE PROCEDURE getScheduleGroup(grp int)
BEGIN
	SELECT s._day, 
		g.description as 'group',
        g.edu_year,
		s.id_grp as 'id_grp',
		s.pair, 
		(SELECT `description` FROM `subjects` WHERE `id_subject`=s.subj_1) as 'subj_1',
		s.subj_1 as 'id_subj_1',
		(SELECT `description` FROM `subjects` WHERE `id_subject`=s.subj_2) as 'subj_2',
		s.subj_1 as 'id_subj_2'
	FROM `schedule` s
		INNER JOIN `groups` g ON s.id_grp=g.grp
	WHERE s.id_grp=grp
	ORDER BY s._day, s.pair;
END;

CREATE PROCEDURE getChangeScheduleGroup(grp int)
BEGIN
  SELECT s._day, 
		 g.description as 'group',
         g.edu_year,
         s.id_grp as 'id_grp',
         s.pair, 
         sb.description as 'subject'
  FROM `changed_schedule` s
	INNER JOIN `groups` g ON s.id_grp=g.grp
	INNER JOIN `subjects` sb ON s.subject=sb.id_subject
  WHERE s.id_grp=grp
  ORDER BY s.pair;
END;

CREATE PROCEDURE getAllScheduleGroup()
BEGIN  
	SELECT s._day, 
		g.description as 'group',
		s.id_grp as 'id_grp',
        g.edu_year,
		s.pair, 
		(SELECT `description` FROM `subjects` WHERE `id_subject`=s.subj_1) as 'subj_1',
		s.subj_1 as 'id_subj_1',
		(SELECT `description` FROM `subjects` WHERE `id_subject`=s.subj_2) as 'subj_2',
		s.subj_1 as 'id_subj_2'
	FROM `schedule` s
		INNER JOIN `groups` g ON s.id_grp=g.grp
	ORDER BY s._day, s.pair;
END;

CREATE PROCEDURE getAllChangedSchedule()
BEGIN
  SELECT s._day, 
		 g.description as 'group',
         g.edu_year,
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

CREATE PROCEDURE deleteChangedSchedulePair(g int, d datetime, p int, s int)
BEGIN
	DELETE FROM `changed_schedule`
    WHERE `id_grp`=g AND `_day`=d AND `pair`=p AND `subject`=s;
END;

//

DELIMITER ;