
DROP USER IF EXISTS `iep`@`localhost`;

CREATE USER `iep`@`localhost`;

GRANT SELECT, INSERT, UPDATE, EXECUTE, REFERENCES ON iep.* TO `iep`@`localhost`;
