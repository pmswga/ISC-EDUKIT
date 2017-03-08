
DROP USER IF EXISTS `iep`@`localhost`;

CREATE USER `iep`@`localhost`;

GRANT SELECT, INSERT, UPDATE ON iep.* TO `test`@`localhost`;