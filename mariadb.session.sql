-- Crear la tabla jugadores
CREATE TABLE jugadores (
    id INT(11) NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    posicion VARCHAR(50) NOT NULL,
    partidos INT(150) NOT NULL,
    puntos DECIMAL(10,2) NOT NULL,
    rebotes DECIMAL(10,2) NOT NULL,
    asistencias DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id)
);

-- Insertar los datos en la tabla jugadores
INSERT INTO jugadores (id, nombre, posicion, partidos, puntos, rebotes, asistencias) VALUES
(1, 'Valero', 'Base', 24, 5.20, 1.70, 9.80),
(5, 'Montilla', 'Escolta', 19, 11.70, 2.70, 2.40),
(6, 'Stipes', 'Escolta', 31, 8.50, 3.10, 0.90),
(7, 'Montes', 'Alero', 32, 13.10, 4.60, 4.10),
(8, 'Volkov', 'Ala Pivot', 11, 4.30, 5.60, 1.30),
(9, 'Suarez', 'Ala Pivot', 24, 6.90, 4.80, 4.50),
(10, 'Carter', 'Ala Pivot', 26, 26.10, 9.10, 1.80),
(11, 'Graham', 'Pivot', 17, 2.10, 8.40, 0.20),
(12, 'Cesar', 'Pivot', 8, 3.10, 6.80, 0.70),
(14, 'Juanfran', 'Base', 29, 6.10, 0.80, 5.80),
(15, 'Rodriguez', 'Escolta', 23, 17.10, 1.80, 3.70),
(16, 'Pepo', 'Escolta', 0, 0.00, 0.00, 0.00);

CREATE TABLE notas (
    id INT(11) NOT NULL AUTO_INCREMENT,
    dni VARCHAR(20) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    grupo VARCHAR(50) NOT NULL,
    fecha_hora DATETIME NOT NULL,
    asignatura VARCHAR(100) NOT NULL,
    nota FLOAT NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO notas (id, dni, nombre, grupo, fecha_hora, asignatura, nota) VALUES
(1, '12345A', 'Victor', '1', '2024-11-06 12:20:00', 'PHP', 10),
(2, '67890B', 'Silvia', '2', '2024-11-07 12:28:00', 'JavaScript', 10),
(3, '12345678A', 'María García', 'Grupo A', '2024-11-06 10:00:00', 'PHP', 8.5),
(4, '12345678A', 'María García', 'Grupo A', '2024-11-06 11:00:00', 'JavaScript', 7),
(5, '12345678A', 'María García', 'Grupo A', '2024-11-06 12:00:00', 'HTML', 9.2),
(6, '23456789B', 'Juan Pérez', 'Grupo B', '2024-11-06 13:00:00', 'PHP', 6.8),
(7, '23456789B', 'Juan Pérez', 'Grupo B', '2024-11-06 14:00:00', 'JavaScript', 7.5),
(8, '23456789B', 'Juan Pérez', 'Grupo B', '2024-11-06 15:00:00', 'HTML', 8),
(9, '34567890C', 'Ana López', 'Grupo A', '2024-11-06 16:00:00', 'PHP', 9),
(10, '34567890C', 'Ana López', 'Grupo A', '2024-11-06 17:00:00', 'JavaScript', 6.5),
(11, '34567890C', 'Ana López', 'Grupo A', '2024-11-06 18:00:00', 'HTML', 8.7),
(12, '45678901D', 'Luis Martínez', 'Grupo C', '2024-11-06 19:00:00', 'PHP', 7.8),
(13, '45678901D', 'Luis Martínez', 'Grupo C', '2024-11-06 20:00:00', 'JavaScript', 9.1),
(14, '45678901D', 'Luis Martínez', 'Grupo C', '2024-11-06 21:00:00', 'HTML', 8.3),
(15, '56789012E', 'Carmen Fernández', 'Grupo B', '2024-11-06 22:00:00', 'PHP', 7.6),
(16, '56789012E', 'Carmen Fernández', 'Grupo B', '2024-11-06 23:00:00', 'JavaScript', 8.9),
(17, '56789012E', 'Carmen Fernández', 'Grupo B', '2024-11-07 00:00:00', 'HTML', 9.4);

CREATE TABLE precios (
    id INT(11) NOT NULL AUTO_INCREMENT,
    fruta VARCHAR(50) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    temporada VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO precios (id, fruta, precio, temporada) VALUES
(1, 'Judias', 3.50, 'primavera'),
(2, 'Melocoton', 2.50, 'Verano'),
(3, 'Carambola', 6.00, 'Otoño'),
(4, 'Pera', 1.30, 'anual'),
(5, 'guanabana', 13.30, 'anual'),
(6, 'Melocoton', 2.50, 'Verano'),
(7, 'Carambola', 6.00, 'Otoño'),
(8, 'Pera', 1.30, 'anual'),
(9, 'guanabana', 13.30, 'anual');

CREATE TABLE tipos_cambio (
    id INT(11) NOT NULL AUTO_INCREMENT,
    moneda_origen VARCHAR(3) NOT NULL,
    moneda_destino VARCHAR(3) NOT NULL,
    tipo_cambio DECIMAL(10, 6) NOT NULL,
    PRIMARY KEY (id),
    KEY moneda_origen (moneda_origen)
);

INSERT INTO tipos_cambio (id, moneda_origen, moneda_destino, tipo_cambio) VALUES
(1, 'USD', 'EUR', 0.850000),
(2, 'EUR', 'USD', 1.180000),
(3, 'USD', 'GBP', 0.750000),
(4, 'GBP', 'USD', 1.330000);

CREATE TABLE transfer (
    id INT(11) NOT NULL AUTO_INCREMENT,
    codtransfer VARCHAR(10) NOT NULL,
    cantidad DECIMAL(10,2) NOT NULL,
    fecha_hora DATETIME NOT NULL,
    sujeto VARCHAR(50) NOT NULL,
    reclamar TINYINT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (id)
);

INSERT INTO transfer (id, codtransfer, cantidad, fecha_hora, sujeto, reclamar) VALUES
(1, '123', 100.00, '2024-11-06 14:36:00', 'pepo', 0);