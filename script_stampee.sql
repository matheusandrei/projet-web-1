-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema stampee
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema stampee
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `stampee` DEFAULT CHARACTER SET utf8mb4 ;
USE `stampee` ;

-- -----------------------------------------------------
-- Table `stampee`.`stampee_privilege`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stampee`.`stampee_privilege` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `privilege` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `stampee`.`stampee_utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stampee`.`stampee_utilisateur` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `mot_de_passe` VARCHAR(100) NOT NULL,
  `privilege_stampee_id` INT(11) NOT NULL,
  `username` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_utilisateur_stampee_privilege_stampee_idx` (`privilege_stampee_id` ASC) ,
  CONSTRAINT `fk_utilisateur_stampee_privilege_stampee`
    FOREIGN KEY (`privilege_stampee_id`)
    REFERENCES `stampee`.`stampee_privilege` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `stampee`.`stampee_timbre`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stampee`.`stampee_timbre` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(100) NOT NULL,
  `date` DATE NOT NULL,
  `couleur` VARCHAR(45) NULL DEFAULT NULL,
  `description` VARCHAR(250) NOT NULL,
  `pays` VARCHAR(45) NULL DEFAULT NULL,
  `dimensions` VARCHAR(45) NULL DEFAULT NULL,
  `certifie` TINYINT(4) NOT NULL,
  `categorie` VARCHAR(45) NOT NULL,
  `stampee_utilisateur_id` INT(11) NOT NULL,
  `etat` VARCHAR(45) NOT NULL,
  `prix` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_stampee_timbre_stampee_utilisateur1_idx` (`stampee_utilisateur_id` ASC) ,
  CONSTRAINT `fk_stampee_timbre_stampee_utilisateur1`
    FOREIGN KEY (`stampee_utilisateur_id`)
    REFERENCES `stampee`.`stampee_utilisateur` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 50
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `stampee`.`stampee_enchere`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stampee`.`stampee_enchere` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `prix_courrant` INT(11) NOT NULL,
  `date_debut` DATE NOT NULL,
  `date_fin` DATE NOT NULL,
  `actif` TINYINT(4) NOT NULL,
  `coup_de_coeur` TINYINT(4) NOT NULL,
  `stampee_timbre_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_stampee_enchere_stampee_timbre1_idx` (`stampee_timbre_id` ASC) ,
  CONSTRAINT `fk_stampee_enchere_stampee_timbre1`
    FOREIGN KEY (`stampee_timbre_id`)
    REFERENCES `stampee`.`stampee_timbre` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `stampee`.`favoris_stampee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stampee`.`favoris_stampee` (
  `stampee_utilisateur_id` INT(11) NOT NULL,
  `stampee_enchere_id` INT(11) NOT NULL,
   `favoris` TINYINT(4) NOT NULL,
  PRIMARY KEY (`stampee_utilisateur_id`, `stampee_enchere_id`),
  INDEX `fk_stampee_utilisateur_has_stampee_enchere_stampee_enchere2_idx` (`stampee_enchere_id` ASC) ,
  INDEX `fk_stampee_utilisateur_has_stampee_enchere_stampee_utilisat_idx` (`stampee_utilisateur_id` ASC) ,
  CONSTRAINT `fk_stampee_utilisateur_has_stampee_enchere_stampee_enchere2`
    FOREIGN KEY (`stampee_enchere_id`)
    REFERENCES `stampee`.`stampee_enchere` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stampee_utilisateur_has_stampee_enchere_stampee_utilisateur2`
    FOREIGN KEY (`stampee_utilisateur_id`)
    REFERENCES `stampee`.`stampee_utilisateur` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `stampee`.`image_stampee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stampee`.`image_stampee` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `image_principale` VARCHAR(250) NOT NULL,
  `stampee_timbre_id` INT(11) NOT NULL,
  `image_secondaire` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_image_stampee_timbre1_idx` (`stampee_timbre_id` ASC) ,
  CONSTRAINT `fk_image_stampee_timbre1`
    FOREIGN KEY (`stampee_timbre_id`)
    REFERENCES `stampee`.`stampee_timbre` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 30
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `stampee`.`mise_stampee`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `stampee`.`mise_stampee` (
  `stampee_utilisateur_id` INT(11) NOT NULL,
  `stampee_enchere_id` INT(11) NOT NULL,
  `date` DATE NULL DEFAULT NULL,
  `heure` DATETIME NULL DEFAULT NULL,
  `prix` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`stampee_utilisateur_id`, `stampee_enchere_id`),
  INDEX `fk_stampee_utilisateur_has_stampee_enchere_stampee_enchere1_idx` (`stampee_enchere_id` ASC) ,
  INDEX `fk_stampee_utilisateur_has_stampee_enchere_stampee_utilisat_idx` (`stampee_utilisateur_id` ASC) ,
  CONSTRAINT `fk_stampee_utilisateur_has_stampee_enchere_stampee_enchere1`
    FOREIGN KEY (`stampee_enchere_id`)
    REFERENCES `stampee`.`stampee_enchere` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_stampee_utilisateur_has_stampee_enchere_stampee_utilisateur1`
    FOREIGN KEY (`stampee_utilisateur_id`)
    REFERENCES `stampee`.`stampee_utilisateur` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
