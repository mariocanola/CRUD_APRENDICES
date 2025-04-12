-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS crud_aprendices;
USE crud_aprendices;

-- Tabla: tipo_sangre
CREATE TABLE IF NOT EXISTS tipo_sangre (
    id_sanguineo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    factor_sanguineo ENUM('+', '-') NOT NULL
);

--tabla de sexo
CREATE TABLE IF NOT EXISTS sexo (
    id_sexo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(10) NOT NULL
);

-- Tabla: tipo_documento
CREATE TABLE IF NOT EXISTS tipo_documento (
    id_tipo_documento INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

-- Tabla: persona (ya sin referencia a ficha_formacion)
CREATE TABLE IF NOT EXISTS persona (
    id_persona INT AUTO_INCREMENT PRIMARY KEY,
    primer_nombre VARCHAR(100) NOT NULL,
    segundo_nombre VARCHAR(100),
    primer_apellido VARCHAR(100) NOT NULL,
    segundo_apellido VARCHAR(100),
    id_tipo_documento INT NOT NULL,
    documento VARCHAR(100) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    id_sanguineo INT NOT NULL,
    id_sexo INT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_tipo_documento) REFERENCES tipo_documento(id_tipo_documento),
    FOREIGN KEY (id_sanguineo) REFERENCES tipo_sangre(id_sanguineo),
    FOREIGN KEY (id_sexo) REFERENCES sexo(id_sexo)
);

-- Tabla: rol
CREATE TABLE IF NOT EXISTS rol (
    id_rol INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

-- Tabla intermedia: rol_persona
CREATE TABLE IF NOT EXISTS rol_persona (
    id_rol_persona INT AUTO_INCREMENT PRIMARY KEY,
    id_persona INT NOT NULL,
    id_rol INT NOT NULL,

    FOREIGN KEY (id_persona) REFERENCES persona(id_persona),
    FOREIGN KEY (id_rol) REFERENCES rol(id_rol)
);

-- Tabla: aprendiz
CREATE TABLE IF NOT EXISTS aprendiz (
    id_aprendiz INT AUTO_INCREMENT PRIMARY KEY,
    id_persona INT NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (id_persona) REFERENCES persona(id_persona)
);

-- Tabla: programa
CREATE TABLE IF NOT EXISTS programa (
    id_programa INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    actualizado TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP    
);

-- Tabla intermedia: aprendiz_programa
CREATE TABLE IF NOT EXISTS aprendiz_programa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_programa INT NOT NULL,
    id_aprendiz INT NOT NULL,
    FOREIGN KEY (id_programa) REFERENCES programa(id_programa),
    FOREIGN KEY (id_aprendiz) REFERENCES aprendiz(id_aprendiz)
);
