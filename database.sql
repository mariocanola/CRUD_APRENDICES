-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: localhost    Database: crud_aprendices
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `aprendiz`
--

DROP TABLE IF EXISTS `aprendiz`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aprendiz` (
  `id_aprendiz` int NOT NULL AUTO_INCREMENT,
  `id_persona` int NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_aprendiz`),
  KEY `aprendiz_ibfk_1` (`id_persona`),
  CONSTRAINT `aprendiz_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aprendiz`
--

LOCK TABLES `aprendiz` WRITE;
/*!40000 ALTER TABLE `aprendiz` DISABLE KEYS */;
/*!40000 ALTER TABLE `aprendiz` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aprendiz_programa`
--

DROP TABLE IF EXISTS `aprendiz_programa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `aprendiz_programa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_programa` int NOT NULL,
  `id_aprendiz` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_programa` (`id_programa`),
  KEY `aprendiz_programa_ibfk_2` (`id_aprendiz`),
  CONSTRAINT `aprendiz_programa_ibfk_1` FOREIGN KEY (`id_programa`) REFERENCES `programa` (`id_programa`),
  CONSTRAINT `aprendiz_programa_ibfk_2` FOREIGN KEY (`id_aprendiz`) REFERENCES `aprendiz` (`id_aprendiz`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aprendiz_programa`
--

LOCK TABLES `aprendiz_programa` WRITE;
/*!40000 ALTER TABLE `aprendiz_programa` DISABLE KEYS */;
/*!40000 ALTER TABLE `aprendiz_programa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `id_persona` int NOT NULL AUTO_INCREMENT,
  `primer_nombre` varchar(100) NOT NULL,
  `segundo_nombre` varchar(100) DEFAULT NULL,
  `primer_apellido` varchar(100) NOT NULL,
  `segundo_apellido` varchar(100) DEFAULT NULL,
  `id_tipo_documento` int NOT NULL,
  `documento` varchar(100) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'Juan','Carlos','Pérez','Gómez',1,'12345678','1990-05-15',1,1,'2025-04-22 01:51:20','2025-04-22 01:51:20'),(2,'María','José','Lopez','Martínez',2,'87654321','1985-08-22',2,2,'2025-04-22 01:51:20','2025-04-22 01:51:20'),(3,'Juan','Carlos','Pérez','Gómez',1,'12345678','1990-05-15',1,1,'2025-04-22 01:51:25','2025-04-22 01:51:25'),(4,'María','José','Lopez','Martínez',2,'87654321','1985-08-22',2,2,'2025-04-22 01:51:25','2025-04-22 01:51:25'),(5,'mario','alexandra','cañala','cana',2,'1120564168','8444-05-12',3,2,'2025-04-22 02:22:19','2025-04-22 02:22:19'),(6,'mario','alexandra','cañala','cana',2,'1120564168','8444-05-12',3,2,'2025-04-22 02:22:44','2025-04-22 02:22:44'),(7,'cristian','alexandra','camacho','cana',2,'1123338478','2025-04-22',7,1,'2025-04-22 05:25:01','2025-04-22 05:25:01');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programa`
--

DROP TABLE IF EXISTS `programa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `programa` (
  `id_programa` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `actualizado` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_programa`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programa`
--

LOCK TABLES `programa` WRITE;
/*!40000 ALTER TABLE `programa` DISABLE KEYS */;
INSERT INTO `programa` VALUES (1,'Programación','2025-04-22 01:24:06','2025-04-22 01:24:06'),(2,'Diseño Gráfico','2025-04-22 01:24:06','2025-04-22 01:24:06'),(3,'Arquitectura','2025-04-22 01:24:06','2025-04-22 01:24:06'),(4,'Marketing','2025-04-22 01:24:06','2025-04-22 01:24:06');
/*!40000 ALTER TABLE `programa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Aprendiz'),(2,'Instructor');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol_persona`
--

DROP TABLE IF EXISTS `rol_persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol_persona` (
  `id_rol_persona` int NOT NULL AUTO_INCREMENT,
  `id_persona` int NOT NULL,
  `id_rol` int NOT NULL,
  PRIMARY KEY (`id_rol_persona`),
  KEY `id_persona` (`id_persona`),
  KEY `id_rol` (`id_rol`),
  CONSTRAINT `rol_persona_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`),
  CONSTRAINT `rol_persona_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_persona`
--

LOCK TABLES `rol_persona` WRITE;
/*!40000 ALTER TABLE `rol_persona` DISABLE KEYS */;
INSERT INTO `rol_persona` VALUES (2,1,1),(3,2,1),(4,3,1);
/*!40000 ALTER TABLE `rol_persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sexo`
--

DROP TABLE IF EXISTS `sexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sexo` (
  `id_sexo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(10) NOT NULL,
  PRIMARY KEY (`id_sexo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sexo`
--

LOCK TABLES `sexo` WRITE;
/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
INSERT INTO `sexo` VALUES (1,'Masculino'),(2,'Femenino');
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_documento`
--

DROP TABLE IF EXISTS `tipo_documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_documento` (
  `id_tipo_documento` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_documento`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_documento`
--

LOCK TABLES `tipo_documento` WRITE;
/*!40000 ALTER TABLE `tipo_documento` DISABLE KEYS */;
INSERT INTO `tipo_documento` VALUES (1,'Pasaporte'),(2,'Cédula de Identidad'),(3,'Tarjeta de Identidad');
/*!40000 ALTER TABLE `tipo_documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_sangre`
--

DROP TABLE IF EXISTS `tipo_sangre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_sangre` (
  `id_sanguineo` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `factor_sanguineo` enum('+','-') NOT NULL,
  `descripcion` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id_sanguineo`),
  UNIQUE KEY `descripcion` (`descripcion`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_sangre`
--

LOCK TABLES `tipo_sangre` WRITE;
/*!40000 ALTER TABLE `tipo_sangre` DISABLE KEYS */;
INSERT INTO `tipo_sangre` VALUES (1,'A','+','A+'),(2,'A','-','A-'),(3,'B','+','B+'),(4,'B','-','B-'),(5,'AB','+','AB+'),(6,'AB','-','AB-'),(7,'O','+','O+'),(8,'O','-','O-');
/*!40000 ALTER TABLE `tipo_sangre` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-22  0:28:38
