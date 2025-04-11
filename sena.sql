CREATE DATABASE IF NOT EXISTS `crud_aprendices`;
USE `crud_aprendices`;

--Tabla aprendices--
CREATE TABLE IF NOT EXISTS `aprendices` (
  `id` int NOT NULL AUTO_INCREMENT,
  `primer_nombre` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `segundo_nombre` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `primer_apellido` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `segundo_apellido` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `documento` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `id_tipo_documento` int DEFAULT NULL,
  `id_programa` int DEFAULT NULL,
  `id_sanguineo` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `documento` (`documento`),
  KEY `fk_tipo_documento` (`id_tipo_documento`),
  KEY `fk_programa` (`id_programa`),
  KEY `fk_tipo_sangre` (`id_sanguineo`),
  CONSTRAINT `fk_programa` FOREIGN KEY (`id_programa`) REFERENCES `programa` (`id_programa`),
  CONSTRAINT `fk_tipo_documento` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipo_documento` (`id`),
  CONSTRAINT `fk_tipo_sangre` FOREIGN KEY (`id_sanguineo`) REFERENCES `tipo_sangre` (`id_sanguineo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- insertar datos de prueba
INSERT IGNORE INTO `aprendices` (`id`, `primer_nombre`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `documento`, `id_tipo_documento`, `id_programa`, `id_sanguineo`) VALUES
	(2, 'Carlos', 'Andrés', 'Pérez', 'Gómez', '1001234567', 1, 1, 3),
	(3, 'Laura', 'Marcela', 'Ríos', 'Torres', '1002234567', 2, 2, 2),
	(4, 'Andrés', 'Felipe', 'Mejía', 'Ramírez', '1003234567', 1, 3, 1),
	(5, 'Sandra', 'Milena', 'Ortiz', 'Pineda', '1004234567', 3, 4, 4),
	(6, 'Julián', 'Esteban', 'López', 'Moreno', '1005234567', 2, 1, 1);

-- tabla de programas
CREATE TABLE IF NOT EXISTS `programa` (
  `id_programa` int NOT NULL AUTO_INCREMENT,
  `nombre_programa` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- insertar datos 
INSERT IGNORE INTO `programa` (`id_programa`, `nombre_programa`) VALUES
	(1, 'Análisis y Desarrollo de Software'),
	(2, 'Gestión Empresarial'),
	(3, 'Mecatrónica'),
	(4, 'Contabilidad y Finanzas'),
	(5, 'Seguridad y Salud en el Trabajo');

-- tabla de tipo de documento 
CREATE TABLE IF NOT EXISTS `tipo_documento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_documento` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- insertar datos de tipo de documento
INSERT IGNORE INTO `tipo_documento` (`id`, `nombre_documento`) VALUES
	(1, 'Cédula de Ciudadanía'),
	(2, 'Tarjeta de Identidad'),
	(3, 'Cédula de Extranjería'),
	(4, 'Pasaporte');

-- tabla de tipo sanguíneo
CREATE TABLE IF NOT EXISTS `tipo_sangre` (
  `id_sanguineo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  `factor_sanguineo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_sanguineo`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- insertar datos de tipo sanguíneo
INSERT IGNORE INTO `tipo_sangre` (`id_sanguineo`, `nombre`, `factor_sanguineo`) VALUES
	(1, 'O', 1),
	(2, 'A', 1),
	(3, 'B', 1),
	(4, 'AB', 1),
	(5, 'O', 0),
	(6, 'A', 0),
	(7, 'B', 0),
	(8, 'AB', 0);

