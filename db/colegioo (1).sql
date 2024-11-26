


CREATE TABLE profesor (
    profesor_id INT AUTO_INCREMENT,
    profesor_nombre VARCHAR(50),
    profesor_email VARCHAR(100),
    profesor_departamento VARCHAR(50),
    PRIMARY KEY (profesor_id)
);

CREATE TABLE estudiante (
    est_id INT AUTO_INCREMENT,
    est_nombre VARCHAR(30),
    est_apellido VARCHAR(30),
    est_fecha_nac DATE,
    est_genero CHAR(1),
    est_email VARCHAR(50),
    est_telefono VARCHAR(20),
    est_direccion VARCHAR(100),
    est_promedio DECIMAL(4, 2), 
    est_ciudad VARCHAR(60), 
    est_contraseña VARCHAR(255),
    PRIMARY KEY (est_id)
);

CREATE TABLE matricula (
    mat_id INT AUTO_INCREMENT,
    mat_fecha DATE,
    est_id INT, -- Relación con estudiante
    curso_nombre VARCHAR(50), -- Materia
    estado VARCHAR(20), -- Aprobado/Pendiente
    PRIMARY KEY (mat_id),
    FOREIGN KEY (est_id) REFERENCES estudiante(est_id) ON DELETE CASCADE
);

-- Inserciones de datos iniciales
INSERT INTO profesor (profesor_nombre, profesor_email, profesor_departamento) VALUES
('Laura Martínez', 'laura.martinez@colegio.com', 'Matemáticas'),
('Carlos Gómez', 'carlos.gomez@colegio.com', 'Ciencias'),
('María Torres', 'maria.torres@colegio.com', 'Historia'),
('Luis Fernández', 'luis.fernandez@colegio.com', 'Inglés'),
('Ana López', 'ana.lopez@colegio.com', 'Arte');


INSERT INTO estudiante (est_nombre, est_apellido, est_fecha_nac, est_genero, est_email, est_telefono, est_direccion, est_promedio, est_ciudad, est_contraseña) VALUES
('Juan', 'Perez', '2005-03-15', 'M', 'juan.perez@example.com', '3214567890', 'Calle 123', 4.5, 'Bogotá', '9919'),
('Maria', 'Lopez', '2004-07-22', 'F', 'maria.lopez@example.com', '3209876543', 'Carrera 45', 4.8, 'Medellín', '1011'),
('Carlos', 'Garcia', '2003-12-11', 'M', 'carlos.garcia@example.com', '3101234567', 'Avenida 10', 4.2, 'Bogotá', '1110'),
('Ana', 'Ramirez', '2004-05-21', 'F', 'ana.ramirez@example.com', '3123456789', 'Calle 67', 4.6, 'Bogotá', '1234'),
('Luis', 'Martinez', '2005-02-28', 'M', 'luis.martinez@example.com', '3119876543', 'Carrera 20', 4.7, 'Bogotá', '4567'),

('Sofia', 'Gonzalez', '2006-09-13', 'F', 'sofia.gonzalez@example.com', '3204561230', 'Calle 90', 4.9, 'Bogotá', '6789'),
('Miguel', 'Torres', '2005-11-25', 'M', 'miguel.torres@example.com', '3007654321', 'Carrera 56', 4.3, 'Cali', '9876'),
('Laura', 'Moreno', '2003-05-14', 'F', 'laura.moreno@example.com', '3101238765', 'Calle 12', 4.6, 'Medellín', '5555'),
('Andres', 'Gutierrez', '2004-12-08', 'M', 'andres.gutierrez@example.com', '3119086543', 'Avenida 23', 4.2, 'Bogotá', '4321'),
('Camila', 'Vargas', '2005-04-22', 'F', 'camila.vargas@example.com', '3127896543', 'Carrera 5', 4.7, 'Bogotá', '8765');

-- Asignación de matrículas
INSERT INTO matricula (mat_fecha, est_id, curso_nombre, estado) VALUES
('2023-01-10', 1, 'Matemáticas', 'Aprobado'), 
('2023-02-15', 2, 'Ciencias', 'Pendiente'),
('2023-03-20', 3, 'Historia', 'Aprobado'), 
('2023-01-12', 4, 'Matemáticas', 'Pendiente'), 
('2023-04-20', 5, 'Matemáticas', 'Aprobado'),

('2023-01-15', 6, 'Matemáticas', 'Aprobado'),
('2023-02-10', 7, 'Ciencias', 'Pendiente'),
('2023-03-05', 8, 'Historia', 'Aprobado'),
('2023-04-22', 9, 'Matemáticas', 'Pendiente'), 
('2023-05-11', 10, 'Matemáticas', 'Aprobado'); 

-- -- Consulta con las tres condiciones: promedio, estado y curso
SELECT 
    m.mat_id, 
    e.est_nombre AS estudiante, 
    e.est_apellido AS apellido, 
    e.est_promedio AS promedio, 
    m.curso_nombre AS materia, 
    m.estado AS estado
FROM estudiante e
JOIN matricula m ON e.est_id = m.est_id
WHERE m.curso_nombre = 'Matemáticas' -- Condición por materia
  AND e.est_promedio > 4.0 -- Condición por promedio
  AND (m.estado = 'Pendiente' OR m.estado = 'Aprobado'); -- Condición por estado