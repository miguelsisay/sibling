SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `sib_jan01` DEFAULT CHARACTER SET utf8 ;
USE `sib_jan01` ;

-- -----------------------------------------------------
-- Table `sib_jan01`.`profiles`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sib_jan01`.`profiles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `birth` DATETIME NULL DEFAULT NULL ,
  `phone` VARCHAR(45) NULL ,
  `cellphone` VARCHAR(45) NULL DEFAULT NULL ,
  `adress` VARCHAR(255) NULL DEFAULT NULL ,
  `identification` VARCHAR(45) NULL DEFAULT NULL ,
  `sex` VARCHAR(45) NULL DEFAULT NULL ,
  `maritalstatus` VARCHAR(45) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;


-- -----------------------------------------------------
-- Table `sib_jan01`.`profile_education`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sib_jan01`.`profile_education` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `place` VARCHAR(45) NULL DEFAULT NULL ,
  `degree` VARCHAR(45) NULL DEFAULT NULL ,
  `datestart` VARCHAR(45) NULL DEFAULT NULL ,
  `dateend` VARCHAR(45) NULL DEFAULT NULL ,
  `created` VARCHAR(45) NULL DEFAULT NULL ,
  `modified` VARCHAR(45) NULL DEFAULT NULL ,
  `profiles_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_profile_education_profiles1_idx` (`profiles_id` ASC) ,
  CONSTRAINT `fk_profile_education_profiles1`
    FOREIGN KEY (`profiles_id` )
    REFERENCES `sib_jan01`.`profiles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sib_jan01`.`profile_work`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sib_jan01`.`profile_work` (
  `id` INT(11) NOT NULL AUTO_INCREMENT ,
  `place` VARCHAR(45) NULL ,
  `position` VARCHAR(45) NULL DEFAULT NULL ,
  `body` VARCHAR(45) NULL ,
  `datestart` DATETIME NULL DEFAULT NULL ,
  `dateend` DATETIME NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `profiles_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_profile_work_profiles_idx` (`profiles_id` ASC) ,
  CONSTRAINT `fk_profile_work_profiles`
    FOREIGN KEY (`profiles_id` )
    REFERENCES `sib_jan01`.`profiles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `sib_jan01`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `sib_jan01`.`users` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `username` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(255) NOT NULL ,
  `role` INT(10) NOT NULL DEFAULT '1' ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `profiles_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_users_profiles1_idx` (`profiles_id` ASC) ,
  CONSTRAINT `fk_users_profiles1`
    FOREIGN KEY (`profiles_id` )
    REFERENCES `sib_jan01`.`profiles` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;

USE `sib_jan01` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
