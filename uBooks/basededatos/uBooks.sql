-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 22-02-2018 a las 16:08:41
-- Versión del servidor: 5.7.21-0ubuntu0.17.10.1
-- Versión de PHP: 7.1.11-0ubuntu0.17.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uBooks`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `idAutor` int(11) NOT NULL,
  `nombreAutor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`idAutor`, `nombreAutor`) VALUES
(1, 'J.K Rowling'),
(2, 'Isaac Asimov'),
(3, 'Abraham Silberschatz'),
(4, 'Stephen King'),
(5, 'George R.R Martin'),
(6, 'Elisabet Benavent'),
(7, 'Noah Gordon'),
(8, 'Señorita Puri'),
(9, 'Dolores Redondo'),
(10, 'Caroline Alexander');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nomCategoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nomCategoria`) VALUES
(1, 'Juvenil'),
(2, 'Informática'),
(3, 'Fantástico'),
(4, 'Erótica'),
(5, 'Humor'),
(6, 'Policíaca'),
(7, 'Histórica'),
(8, 'Romántica'),
(9, 'Terror'),
(10, 'Ciencia Ficción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `editoras`
--

CREATE TABLE `editoras` (
  `idEditora` int(11) NOT NULL,
  `nomEditora` varchar(50) NOT NULL,
  `coleccion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `editoras`
--

INSERT INTO `editoras` (`idEditora`, `nomEditora`, `coleccion`) VALUES
(1, 'Salamandra', NULL),
(2, 'Debolsillo', NULL),
(3, 'Plaza & Janes', NULL),
(4, 'Suma', NULL),
(5, 'Espasa Libros', NULL),
(6, 'El Acantilado', NULL),
(7, 'Planeta', NULL),
(8, 'Rocabolsillo', NULL),
(9, 'Gigamesh', NULL),
(10, 'McGraw-Hill', NULL),
(11, 'Destino', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idLibro` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `anoLanz` int(11) NOT NULL,
  `paginas` int(11) DEFAULT NULL,
  `encuadernacion` varchar(50) NOT NULL,
  `unidades` int(11) NOT NULL,
  `sinopsis` varchar(500) DEFAULT NULL,
  `autores_idAutor` int(11) DEFAULT NULL,
  `editoras_idEditora` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`idLibro`, `titulo`, `anoLanz`, `paginas`, `encuadernacion`, `unidades`, `sinopsis`, `autores_idAutor`, `editoras_idEditora`) VALUES
(1, 'Harry Potter y La Piedra Filosofal', 2011, 250, 'Tapa dura', 10, NULL, 1, 11),
(2, 'Bovedas de Acero', 2016, 272, 'Tapa blanda', 25, NULL, 2, 2),
(3, 'Fundamentos de Bases de Datos', 2014, 976, 'Tapa blanda', 3, NULL, 3, 10),
(4, 'El Resplandor', 2017, 688, 'Tapa blanda', 7, NULL, 4, 2),
(5, 'Juego de Tronos Canción de Hielo y Fuego I', 2012, 800, 'Tapa blanda bolsillo', 30, NULL, 5, 9),
(6, 'Fuimos Canciones (Canciones y Recuerdos 1)', 2018, 400, 'Tapa blanda', 15, NULL, 6, 4),
(7, 'El Medico', 2008, 800, 'Tapa blanda', 23, NULL, 7, 8),
(8, 'Te dejo es jodete al reves', 2013, 240, 'Tapa blanda', 8, NULL, 8, 5),
(9, 'Ofrenda a la tormenta', 2016, 560, 'Tapa blanda', 14, NULL, 9, 11),
(10, 'Atrapados en el hielo', 2003, 320, 'Tapa blanda', 44, NULL, 10, 7),
(16, 'Harry Potter y la Camara Secreta', 2010, 288, 'Tapa blanda', 12, NULL, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_has_categorias`
--

CREATE TABLE `libros_has_categorias` (
  `libros_idLibro` int(11) NOT NULL,
  `categorias_idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `libros_has_categorias`
--

INSERT INTO `libros_has_categorias` (`libros_idLibro`, `categorias_idCategoria`) VALUES
(1, 1),
(3, 2),
(5, 3),
(8, 5),
(9, 6),
(7, 7),
(10, 7),
(6, 8),
(4, 9),
(2, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasenia` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `correo`, `contrasenia`, `hash`, `admin`) VALUES
(3, 'rafael', 'gallardo', 'rafaga@gmail.com', '$2y$10$fxe72s.uVOLNJ5MACvMAvOyvCtN4lMGPLYSeLBDYiqD6wKLddNhpe', 'f9a40a4780f5e1306c46f1c8daecee3b', 0),
(4, 'Isaias', 'Montiel', 'isamon@gmail.com', '$2y$10$PopULBjojyGtxzetj7LOtuU0sCZ1ASyA.7Afjd1ewJA.UOVDOHPom', 'c06d06da9666a219db15cf575aff2824', 0),
(5, 'Lucas', 'Lobato', 'llobatobot@gmail.com', '$2y$10$z1x/X0.x3nIR8XSY2pnyp.3liiYDUi.oxY6iAFhHsz35zRPtiZASe', '73278a4a86960eeb576a8fd4c9ec6997', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `editoras`
--
ALTER TABLE `editoras`
  ADD PRIMARY KEY (`idEditora`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `fk_libros_autores_idx` (`autores_idAutor`),
  ADD KEY `fk_libros_editoras1_idx` (`editoras_idEditora`);

--
-- Indices de la tabla `libros_has_categorias`
--
ALTER TABLE `libros_has_categorias`
  ADD PRIMARY KEY (`libros_idLibro`,`categorias_idCategoria`),
  ADD KEY `fk_libros_has_categorias_categorias1_idx` (`categorias_idCategoria`),
  ADD KEY `fk_libros_has_categorias_libros1_idx` (`libros_idLibro`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `editoras`
--
ALTER TABLE `editoras`
  MODIFY `idEditora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idLibro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `fk_libros_autores` FOREIGN KEY (`autores_idAutor`) REFERENCES `autores` (`idAutor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_libros_editoras1` FOREIGN KEY (`editoras_idEditora`) REFERENCES `editoras` (`idEditora`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `libros_has_categorias`
--
ALTER TABLE `libros_has_categorias`
  ADD CONSTRAINT `fk_libros_has_categorias_categorias1` FOREIGN KEY (`categorias_idCategoria`) REFERENCES `categorias` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_libros_has_categorias_libros1` FOREIGN KEY (`libros_idLibro`) REFERENCES `libros` (`idLibro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
