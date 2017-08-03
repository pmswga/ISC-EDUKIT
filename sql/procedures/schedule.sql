use `iep`;

DROP PROCEDURE IF EXISTS addScheduleEntry;
DROP PROCEDURE IF EXISTS getScheduleGroup;

DELIMITER //

CREATE PROCEDURE IF NOT EXISTS addScheduleEntry(grp int, d int, pair int, subject int)
BEGIN
  INSERT INTO `schedule` (`id_grp`, `day`, `pair`, `subject`) VALUES (grp, d, pair, subject);
END;

CREATE PROCEDURE IF NOT EXISTS getScheduleGroup(grp int)
BEGIN
  SELECT *
  FROM `schedule`
  WHERE `id_grp`=getGroupId(grp);
END;


//

DELIMITER ;