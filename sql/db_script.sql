-- Archivo: create_tables.sql

CREATE DATABASE IF NOT EXISTS startup_online_courses;
USE startup_online_courses;

-- Tabla de recursos comunes
CREATE TABLE IF NOT EXISTS resources (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    tipo ENUM('clase','examen') NOT NULL
);

-- Tabla para detalles de clases
CREATE TABLE IF NOT EXISTS clases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    resource_id INT NOT NULL,
    ponderacion TINYINT NOT NULL,
    FOREIGN KEY (resource_id) REFERENCES resources(id) ON DELETE CASCADE
);

-- Tabla para detalles de exámenes
CREATE TABLE IF NOT EXISTS examenes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    resource_id INT NOT NULL,
    tipo_examen ENUM('selección','pregunta y respuesta','completación') NOT NULL,
    FOREIGN KEY (resource_id) REFERENCES resources(id) ON DELETE CASCADE
);


-- Inserción de registros para Clases

INSERT INTO resources (nombre, tipo) VALUES ('Inglés Básico', 'clase');
SET @id1 = LAST_INSERT_ID();
INSERT INTO clases (resource_id, ponderacion) VALUES (@id1, 4);

INSERT INTO resources (nombre, tipo) VALUES ('Conversaciones de Trabajo en Inglés', 'clase');
SET @id2 = LAST_INSERT_ID();
INSERT INTO clases (resource_id, ponderacion) VALUES (@id2, 5);

INSERT INTO resources (nombre, tipo) VALUES ('Vocabulario sobre Trabajo en Inglés', 'clase');
SET @id3 = LAST_INSERT_ID();
INSERT INTO clases (resource_id, ponderacion) VALUES (@id3, 5);

INSERT INTO resources (nombre, tipo) VALUES ('Gramática Avanzada en Español', 'clase');
SET @id4 = LAST_INSERT_ID();
INSERT INTO clases (resource_id, ponderacion) VALUES (@id4, 3);

INSERT INTO resources (nombre, tipo) VALUES ('Introducción a Francés', 'clase');
SET @id5 = LAST_INSERT_ID();
INSERT INTO clases (resource_id, ponderacion) VALUES (@id5, 4);

INSERT INTO resources (nombre, tipo) VALUES ('Pronunciación y Conversación en Alemán', 'clase');
SET @id6 = LAST_INSERT_ID();
INSERT INTO clases (resource_id, ponderacion) VALUES (@id6, 3);

-- Inserción de registros para Exámenes

INSERT INTO resources (nombre, tipo) VALUES ('Trabajos y ocupaciones en Inglés', 'examen');
SET @id7 = LAST_INSERT_ID();
INSERT INTO examenes (resource_id, tipo_examen) VALUES (@id7, 'selección');

INSERT INTO resources (nombre, tipo) VALUES ('Prueba de gramática en Español', 'examen');
SET @id8 = LAST_INSERT_ID();
INSERT INTO examenes (resource_id, tipo_examen) VALUES (@id8, 'pregunta y respuesta');

INSERT INTO resources (nombre, tipo) VALUES ('Examen de vocabulario en Francés', 'examen');
SET @id9 = LAST_INSERT_ID();
INSERT INTO examenes (resource_id, tipo_examen) VALUES (@id9, 'completación');

INSERT INTO resources (nombre, tipo) VALUES ('Evaluación de pronunciación en Alemán', 'examen');
SET @id10 = LAST_INSERT_ID();
INSERT INTO examenes (resource_id, tipo_examen) VALUES (@id10, 'selección');
