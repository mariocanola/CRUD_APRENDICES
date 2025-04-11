-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS crud_aprendices CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE crud_aprendices;

-- Tabla: tipo_documento
CREATE TABLE tipo_documento (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL
);

-- Tabla: tipo_sangre
CREATE TABLE tipo_sangre (
    id_sanguineo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(4) NOT NULL,
    factor_sanguineo TINYINT NOT NULL
);

-- Tabla: persona
CREATE TABLE persona (
    id INT AUTO_INCREMENT PRIMARY KEY,
    primer_nombre VARCHAR(50) NOT NULL,
    segundo_nombre VARCHAR(50),
    primer_apellido VARCHAR(50) NOT NULL,
    segundo_apellido VARCHAR(50),
    id_tipo_documento INT NOT NULL,
    documento VARCHAR(10) NOT NULL UNIQUE,
    sexo VARCHAR(1) NOT NULL,
    id_factor_sanguineo INT NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_tipo_documento) REFERENCES tipo_documento(id),
    FOREIGN KEY (id_factor_sanguineo) REFERENCES tipo_sangre(id_sanguineo)
);

-- Tabla: aprendiz
CREATE TABLE aprendiz (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_persona INT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_persona) REFERENCES persona(id)
);

-- Tabla: programa_formacion
CREATE TABLE programa_formacion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    programa VARCHAR(25) NOT NULL
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla: aprendiz_programa (relación N:M)
CREATE TABLE aprendiz_programa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_aprendiz INT NOT NULL,
    id_programa_ficha INT NOT NULL,
    fecha_inicio DATE NOT NULL,
    fecha_fin DATE NOT NULL,
    FOREIGN KEY (id_aprendiz) REFERENCES aprendiz(id),
    FOREIGN KEY (id_programa_ficha) REFERENCES programa_formacion(id)
);