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
