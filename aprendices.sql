-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para crud_aprendices
CREATE DATABASE IF NOT EXISTS `crud_aprendices` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `crud_aprendices`;

-- Volcando estructura para tabla crud_aprendices.aprendiz
CREATE TABLE IF NOT EXISTS `aprendiz` (
  `id_aprendiz` int NOT NULL AUTO_INCREMENT,
  `id_persona` int NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_aprendiz`),
  KEY `fk_aprendiz_persona` (`id_persona`),
  CONSTRAINT `aprendiz_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla crud_aprendices.aprendiz: ~3 rows (aproximadamente)
INSERT IGNORE INTO `aprendiz` (`id_aprendiz`, `id_persona`, `fecha_creacion`, `actualizado`) VALUES
	(1, 1, '2025-04-21 21:34:35', '2025-04-21 21:34:35'),
	(2, 2, '2025-04-21 21:59:47', '2025-04-21 21:59:47'),
	(3, 3, '2025-04-21 22:00:34', '2025-04-21 22:00:34');

-- Volcando estructura para tabla crud_aprendices.aprendiz_programa
CREATE TABLE IF NOT EXISTS `aprendiz_programa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_programa` int NOT NULL,
  `id_aprendiz` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_programa` (`id_programa`),
  KEY `id_aprendiz` (`id_aprendiz`),
  CONSTRAINT `aprendiz_programa_ibfk_1` FOREIGN KEY (`id_programa`) REFERENCES `programa` (`id_programa`),
  CONSTRAINT `aprendiz_programa_ibfk_2` FOREIGN KEY (`id_aprendiz`) REFERENCES `aprendiz` (`id_aprendiz`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla crud_aprendices.aprendiz_programa: ~3 rows (aproximadamente)
INSERT IGNORE INTO `aprendiz_programa` (`id`, `id_programa`, `id_aprendiz`) VALUES
	(1, 1, 1),
	(2, 1, 2),
	(3, 2, 3);

-- Volcando estructura para tabla crud_aprendices.persona
CREATE TABLE IF NOT EXISTS `persona` (
  `id_persona` int NOT NULL AUTO_INCREMENT,
  `primer_nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `segundo_nombre` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `primer_apellido` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `segundo_apellido` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_tipo_documento` int NOT NULL,
  `documento` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `id_sanguineo` int NOT NULL,
  `id_sexo` int NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_persona`),
  KEY `id_tipo_documento` (`id_tipo_documento`),
  KEY `id_sanguineo` (`id_sanguineo`),
  KEY `id_sexo` (`id_sexo`),
  CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id_tipo_documento`),
  CONSTRAINT `persona_ibfk_2` FOREIGN KEY (`id_sanguineo`) REFERENCES `tipo_sangre` (`id_sanguineo`),
  CONSTRAINT `persona_ibfk_3` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla crud_aprendices.persona: ~3 rows (aproximadamente)
INSERT IGNORE INTO `persona` (`id_persona`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `id_tipo_documento`, `documento`, `fecha_nacimiento`, `id_sanguineo`, `id_sexo`, `fecha_creacion`, `actualizado`) VALUES
	(1, 'Mario', 'cañola', 'NuevoApellido', 'NuevoSegundoApellido', 2, '123456789', '2000-01-01', 3, 1, '2025-04-21 21:34:35', '2025-04-22 03:52:33'),
	(2, 'Jeferson', 'Alexander', 'Alvarez', 'Rodriguez', 1, '1120558047', '2025-04-21', 1, 1, '2025-04-21 21:59:47', '2025-04-21 21:59:47'),
	(3, 'Jeferson', 'Alexander', 'Alvarez', 'Rodriguez', 1, '1120212584', '2025-04-21', 1, 1, '2025-04-21 22:00:34', '2025-04-21 22:00:34');

-- Volcando estructura para tabla crud_aprendices.programa
CREATE TABLE IF NOT EXISTS `programa` (
  `id_programa` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla crud_aprendices.programa: ~2 rows (aproximadamente)
INSERT IGNORE INTO `programa` (`id_programa`, `nombre`, `fecha_creacion`, `actualizado`) VALUES
	(1, 'ADSO', '2025-04-12 04:07:58', '2025-04-12 04:07:58'),
	(2, 'MAF', '2025-04-14 00:00:56', '2025-04-14 00:00:56');

-- Volcando estructura para tabla crud_aprendices.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla crud_aprendices.rol: ~2 rows (aproximadamente)
INSERT IGNORE INTO `rol` (`id_rol`, `nombre`) VALUES
	(1, 'Aprendiz'),
	(2, 'Instructor');

-- Volcando estructura para tabla crud_aprendices.rol_persona
CREATE TABLE IF NOT EXISTS `rol_persona` (
  `id_rol_persona` int NOT NULL AUTO_INCREMENT,
  `id_persona` int NOT NULL,
  `id_rol` int NOT NULL,
  PRIMARY KEY (`id_rol_persona`),
  KEY `id_persona` (`id_persona`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `rol_persona_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`),
  CONSTRAINT `rol_persona_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla crud_aprendices.rol_persona: ~3 rows (aproximadamente)
INSERT IGNORE INTO `rol_persona` (`id_rol_persona`, `id_persona`, `id_rol`) VALUES
	(1, 1, 1),
	(2, 2, 1),
	(3, 3, 1);

-- Volcando estructura para tabla crud_aprendices.sexo
CREATE TABLE IF NOT EXISTS `sexo` (
  `id_sexo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_sexo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla crud_aprendices.sexo: ~2 rows (aproximadamente)
INSERT IGNORE INTO `sexo` (`id_sexo`, `nombre`) VALUES
	(1, 'Masculino'),
	(2, 'Femenino');

-- Volcando estructura para tabla crud_aprendices.tipo_documento
CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `id_tipo_documento` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla crud_aprendices.tipo_documento: ~3 rows (aproximadamente)
INSERT IGNORE INTO `tipo_documento` (`id_tipo_documento`, `nombre`) VALUES
	(1, 'cc'),
	(2, 'TI'),
	(3, 'Pasaporte');

-- Volcando estructura para tabla crud_aprendices.tipo_sangre
CREATE TABLE IF NOT EXISTS `tipo_sangre` (
  `id_sanguineo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_sanguineo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla crud_aprendices.tipo_sangre: ~8 rows (aproximadamente)
INSERT IGNORE INTO `tipo_sangre` (`id_sanguineo`, `nombre`) VALUES
	(1, 'A+'),
	(2, 'A-'),
	(3, 'B+'),
	(4, 'B-'),
	(5, 'AB+'),
	(6, 'AB-'),
	(7, 'O+'),
	(8, 'O-');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
