-- -----------------------------------------------------
-- Schema fluffy
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `fluffy` ;

-- -----------------------------------------------------
-- Schema fluffy
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `fluffy` ;
USE `fluffy` ;

-- -----------------------------------------------------
-- Table `sexo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sexo` ;

CREATE TABLE IF NOT EXISTS `sexo` (
  `id_sexo` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_sexo`));

-- -----------------------------------------------------
-- Table `ubicacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ubicacion` ;

CREATE TABLE IF NOT EXISTS `ubicacion` (
  `id_ubicacion` INT NOT NULL,
  `latitud` VARCHAR(200) NULL,
  `altitud` VARCHAR(200) NULL,
  PRIMARY KEY (`id_ubicacion`));


-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuario` ;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `id_ubicacion` INT NULL,
  `id_sexo` INT NULL,
  `telefono` VARCHAR(20) NULL,
  `id_domicilio` INT NULL,
  `e_mail` VARCHAR(45) NOT NULL,
  `fecha_nacimiento` DATE NULL,
  `ultima_conexion` DATETIME NULL,
  `contrasenia` VARCHAR(100) NULL,
  `nombre_usuario` VARCHAR(100) NULL,
  `apellido` VARCHAR(100) NULL,
  PRIMARY KEY (`id_usuario`),
  CONSTRAINT `id_sexo`
    FOREIGN KEY (`id_sexo`)
    REFERENCES `sexo` (`id_sexo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `id_ubicacion`
    FOREIGN KEY (`id_ubicacion`)
    REFERENCES `ubicacion` (`id_ubicacion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table `muro_mascota`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `muro_mascota` ;

CREATE TABLE IF NOT EXISTS `muro_mascota` (
  `id_muro_mascota` INT NOT NULL AUTO_INCREMENT,
  `adopcion` TINYINT(1) NULL,
  `cita` TINYINT(1) NULL,
  `perdido` TINYINT(1) NULL,
  PRIMARY KEY (`id_muro_mascota`));


-- -----------------------------------------------------
-- Table `animal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `animal` ;

CREATE TABLE IF NOT EXISTS `animal` (
  `id_animal` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(50) NULL,
  `tipo_valoracion` VARCHAR(10) NULL,
  PRIMARY KEY (`id_animal`));
-- -----------------------------------------------------
-- Table `raza`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `raza` ;

CREATE TABLE IF NOT EXISTS `raza` (
  `id_raza` INT NOT NULL AUTO_INCREMENT,
  `id_animal` INT NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  PRIMARY KEY (`id_raza`, `id_animal`),
  CONSTRAINT `fk_raza_animal1`
    FOREIGN KEY (`id_animal`)
    REFERENCES `animal` (`id_animal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `mascota`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mascota` ;

CREATE TABLE IF NOT EXISTS `mascota` (
  `id_mascota` INT NOT NULL AUTO_INCREMENT,
  `id_usuario` INT NOT NULL,
  `id_sexo` INT NULL,
  `fecha_nacimiento` DATE NULL,
  `url_lite` VARCHAR(200) NULL,
  `nombre` VARCHAR(45) NULL,
  `id_muro_mascota` INT NOT NULL,
  `id_raza` INT NOT NULL,
  `id_animal` INT NOT NULL,
  PRIMARY KEY (`id_mascota`, `id_usuario`),
  CONSTRAINT `fk_mascota_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mascota_sexo`
    FOREIGN KEY (`id_sexo`)
    REFERENCES `sexo` (`id_sexo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_id_muro_mascota`
    FOREIGN KEY (`id_muro_mascota`)
    REFERENCES `muro_mascota` (`id_muro_mascota`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_mascota_raza1`
    FOREIGN KEY (`id_raza` , `id_animal`)
    REFERENCES `raza` (`id_raza` , `id_animal`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `experiencia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `experiencia` ;

CREATE TABLE IF NOT EXISTS `experiencia` (
  `id_experiencia` INT NOT NULL AUTO_INCREMENT,
  `fecha_experiencia` DATETIME NULL,
  `foto_experiencia` VARCHAR(200) NULL,
  `video_experiencia` VARCHAR(200) NULL,
  `comentario_experiencia` VARCHAR(500) NULL,
  `valoracion` INT NULL,
  `id_muro_mascota` INT NOT NULL,
  PRIMARY KEY (`id_experiencia`),
  CONSTRAINT `fk_experiencia_muro_mascota1`
    FOREIGN KEY (`id_muro_mascota`)
    REFERENCES `muro_mascota` (`id_muro_mascota`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `comentario_externo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `comentario_externo` ;

CREATE TABLE IF NOT EXISTS `comentario_externo` (
  `id_comentario_externo` INT NOT NULL,
  `id_usuario` INT NOT NULL,
  `id_experiencia` INT NOT NULL,
  `comentario` VARCHAR(250) NULL,
  PRIMARY KEY (`id_comentario_externo`),
  CONSTRAINT `fk_comentario_externo_experiencia`
    FOREIGN KEY (`id_experiencia`)
    REFERENCES `experiencia` (`id_experiencia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentario_externo_usuario`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Table `seguimiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `seguimiento` ;

CREATE TABLE IF NOT EXISTS `seguimiento` (
  `id_usuario` INT NOT NULL,
  `id_mascota` INT NOT NULL,
  `id_usuario_mascota` INT NOT NULL,
  `fecha_seguimiento` DATE NULL,
  PRIMARY KEY (`id_usuario`, `id_mascota`, `id_usuario_mascota`),
  CONSTRAINT `fk_usuario_has_mascota_usuario1`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_mascota_mascota1`
    FOREIGN KEY (`id_mascota` , `id_usuario_mascota`)
    REFERENCES `mascota` (`id_mascota` , `id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- -----------------------------------------------------
-- Data for table `sexo`
-- -----------------------------------------------------
START TRANSACTION;
USE `fluffy`;
INSERT INTO `sexo` (`id_sexo`, `descripcion`) VALUES (1, 'Masculino');
INSERT INTO `sexo` (`id_sexo`, `descripcion`) VALUES (2, 'Femenino');
INSERT INTO `sexo` (`id_sexo`, `descripcion`) VALUES (3, 'Macho');
INSERT INTO `sexo` (`id_sexo`, `descripcion`) VALUES (4, 'Hembra');

COMMIT;


-- -----------------------------------------------------
-- Data for table `sexo`
-- -----------------------------------------------------
START TRANSACTION;
USE `fluffy`;
INSERT INTO `sexo` (`id_sexo`, `descripcion`) VALUES (1, 'Masculino');
INSERT INTO `sexo` (`id_sexo`, `descripcion`) VALUES (2, 'Femenino');
INSERT INTO `sexo` (`id_sexo`, `descripcion`) VALUES (3, 'Macho');
INSERT INTO `sexo` (`id_sexo`, `descripcion`) VALUES (4, 'Hembra');

COMMIT;


-- -----------------------------------------------------
-- Data for table `usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `fluffy`;
INSERT INTO `usuario` (`id_usuario`, `nombre`, `id_ubicacion`, `id_sexo`, `telefono`, `id_domicilio`, `e_mail`, `fecha_nacimiento`, `ultima_conexion`, `contrasenia`, `nombre_usuario`, `apellido`) VALUES (1, 'nombre', NULL, 1, NULL, NULL, 'pruebaMail1', NULL, NULL, '1234', 'user1', 'berto');
INSERT INTO `usuario` (`id_usuario`, `nombre`, `id_ubicacion`, `id_sexo`, `telefono`, `id_domicilio`, `e_mail`, `fecha_nacimiento`, `ultima_conexion`, `contrasenia`, `nombre_usuario`, `apellido`) VALUES (2, 'nombre2', NULL, 2, NULL, NULL, 'pruebaMail2', NULL, NULL, '1234', 'user2', 'bertoli');
INSERT INTO `usuario` (`id_usuario`, `nombre`, `id_ubicacion`, `id_sexo`, `telefono`, `id_domicilio`, `e_mail`, `fecha_nacimiento`, `ultima_conexion`, `contrasenia`, `nombre_usuario`, `apellido`) VALUES (3, 'nombre3', NULL, 1, NULL, NULL, 'pruebaMail3', NULL, NULL, '1234', 'user3', 'sarasa');
INSERT INTO `usuario` (`id_usuario`, `nombre`, `id_ubicacion`, `id_sexo`, `telefono`, `id_domicilio`, `e_mail`, `fecha_nacimiento`, `ultima_conexion`, `contrasenia`, `nombre_usuario`, `apellido`) VALUES (4, 'nombre4', NULL, 2, NULL, NULL, 'pruebaMail4', NULL, NULL, '1234', 'user4', 'pepito');

COMMIT;


-- -----------------------------------------------------
-- Data for table `muro_mascota`
-- -----------------------------------------------------
START TRANSACTION;
USE `fluffy`;
INSERT INTO `muro_mascota` (`id_muro_mascota`, `adopcion`, `cita`, `perdido`) VALUES (1, 0, 0, 0);
INSERT INTO `muro_mascota` (`id_muro_mascota`, `adopcion`, `cita`, `perdido`) VALUES (2, 0, 0, 0);
INSERT INTO `muro_mascota` (`id_muro_mascota`, `adopcion`, `cita`, `perdido`) VALUES (3, 0, 0, 0);

COMMIT;


-- -----------------------------------------------------
-- Data for table `animal`
-- -----------------------------------------------------
START TRANSACTION;
USE `fluffy`;
INSERT INTO `animal` (`id_animal`, `descripcion`, `tipo_valoracion`) VALUES (1, 'Perro', 'Guaus');
INSERT INTO `animal` (`id_animal`, `descripcion`, `tipo_valoracion`) VALUES (2, 'Gato', 'Miaus');

COMMIT;


-- -----------------------------------------------------
-- Data for table `raza`
-- -----------------------------------------------------
START TRANSACTION;
USE `fluffy`;
INSERT INTO `raza` (`id_raza`, `id_animal`, `descripcion`) VALUES (1, 1, 'Sin Raza');
INSERT INTO `raza` (`id_raza`, `id_animal`, `descripcion`) VALUES (2, 2, 'Sin Raza');
INSERT INTO `raza` (`id_raza`, `id_animal`, `descripcion`) VALUES (100, 1, 'Ovejero Aleman');

COMMIT;


-- -----------------------------------------------------
-- Data for table `mascota`
-- -----------------------------------------------------
START TRANSACTION;
USE `fluffy`;
INSERT INTO `mascota` (`id_mascota`, `id_usuario`, `id_sexo`, `fecha_nacimiento`, `url_lite`, `nombre`, `id_muro_mascota`, `id_raza`, `id_animal`) VALUES (1, 1, 3, NULL, NULL, 'nombreMascota1', 1, 1, 1);
INSERT INTO `mascota` (`id_mascota`, `id_usuario`, `id_sexo`, `fecha_nacimiento`, `url_lite`, `nombre`, `id_muro_mascota`, `id_raza`, `id_animal`) VALUES (2, 1, 4, NULL, NULL, 'nombreMascota2', 2, 2, 2);
INSERT INTO `mascota` (`id_mascota`, `id_usuario`, `id_sexo`, `fecha_nacimiento`, `url_lite`, `nombre`, `id_muro_mascota`, `id_raza`, `id_animal`) VALUES (1, 2, 3, NULL, NULL, 'Chatran', 3, 1, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `experiencia`
-- -----------------------------------------------------
START TRANSACTION;
USE `fluffy`;
INSERT INTO `experiencia` (`id_experiencia`, `id_muro_mascota`, `fecha_experiencia`, `foto_experiencia`, `video_experiencia`, `comentario_experiencia`, `valoracion`) VALUES (1, 1, '2017-06-08 12:00', NULL, NULL, 'Comentario de prueba', 1);
INSERT INTO `experiencia` (`id_experiencia`, `id_muro_mascota`, `fecha_experiencia`, `foto_experiencia`, `video_experiencia`, `comentario_experiencia`, `valoracion`) VALUES (2, 1, '2017-06-08 12:00', NULL, NULL, 'Comentario de prueba2', 1);
INSERT INTO `experiencia` (`id_experiencia`, `id_muro_mascota`, `fecha_experiencia`, `foto_experiencia`, `video_experiencia`, `comentario_experiencia`, `valoracion`) VALUES (3, 2, '2017-06-08 12:00', NULL, NULL, 'Comentario de prueba3', 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `comentario_externo`
-- -----------------------------------------------------
START TRANSACTION;
USE `fluffy`;
INSERT INTO `comentario_externo` (`id_comentario_externo`, `id_usuario`, `id_experiencia`, `comentario`) VALUES (1, 2, 1, 'Yo hago un comentario loco a lo chatran');
INSERT INTO `comentario_externo` (`id_comentario_externo`, `id_usuario`, `id_experiencia`, `comentario`) VALUES (2, 2, 1, 'Hago otro comentario xq estoy re loco');
INSERT INTO `comentario_externo` (`id_comentario_externo`, `id_usuario`, `id_experiencia`, `comentario`) VALUES (3, 3, 1, 'Yo soy otro usuario comentando cosas locas');
INSERT INTO `comentario_externo` (`id_comentario_externo`, `id_usuario`, `id_experiencia`, `comentario`) VALUES (4, 1, 1, 'puto el que lee');

COMMIT;


-- -----------------------------------------------------
-- Data for table `seguimiento`
-- -----------------------------------------------------
START TRANSACTION;
USE `fluffy`;
INSERT INTO `seguimiento` (`id_usuario`, `id_mascota`, `id_usuario_mascota`, `fecha_seguimiento`) VALUES (2, 1, 1, '2017-06-08');

COMMIT;
