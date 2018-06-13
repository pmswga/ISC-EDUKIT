

CREATE TABLE IF NOT EXISTS `IEPDB`.`IEPAccount` (
  `id_account` INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `passwd` VARCHAR(255) NOT NULL,
  `remember_token` VARCHAR(255) NULL,
  `created_at` timestamp NULL,
  `updated_at` timestamp NULL
) ENGINE = InnoDB
