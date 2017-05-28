-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-05-2017 a las 15:25:34
-- Versión del servidor: 5.5.36-cll-lve
-- Versión de PHP: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u234618_karlosleon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistentes`
--

CREATE TABLE `asistentes` (
  `ida` int(11) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistentes`
--

INSERT INTO `asistentes` (`ida`, `nombre_completo`, `email`) VALUES
(51, 'Carlos Leon', 'karlos_eb1@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `ide` int(11) NOT NULL,
  `ubicacion` varchar(200) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `fecha_inicio` varchar(30) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `fecha_fin` varchar(30) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `usuarios_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`ide`, `ubicacion`, `id_tipo`, `nombre`, `titulo`, `fecha_inicio`, `hora_inicio`, `hora_fin`, `fecha_fin`, `imagen`, `descripcion`, `usuarios_id`) VALUES
(3, 'estero', 0, 'peda', 'lokera', '2017-05-18', '12:30:00', '02:00:00', '2017-05-25', '../uploads/-lecciones-vida-ens', 'hola', 'carlos'),
(4, 'estero', 1, 'putas', 'sex', '2017-05-21', '12:00:00', '01:00:00', '2017-05-24', '../uploads/-lecciones-vida-ens', 'hola', 'carlos'),
(6, 'lomas', 2, 'hacking', 'ofencivo', '2017-05-05', '12:30:00', '01:00:00', '2017-05-24', '../uploads/Create-a-website-wi', 'holaaaaaa', 'carlos'),
(7, 'fimaz', 3, 'dragon rojo', 'pistear', '2017-05-25', '12:30:00', '01:00:00', '2017-05-31', '../uploads/imagen.png', 'homero simsom', 'carlos'),
(9, 'mazatlan', 3, 'fin de semana', 'traigo 50 bolas', '2017-05-05', '01:00:00', '02:00:00', '2017-05-11', '../uploads/defenders2.jpg', 'saihdfhsdhvhsÃ±dvhksadvsvd', '4'),
(11, 'TURISMO', 1, 'no nos invitan', 'no nos quieren', '2017-05-02', '01:00:00', '01:30:00', '2017-05-05', '../uploads/arcade_red copia.png', 'dfndfn', ''),
(12, 'mi casa', 1, '', '', '', '00:00:00', '00:00:00', '', '../uploads/', '', ''),
(13, 'Calle Bernardo Vazquez, Estero, Mazatlan, Mexico', 1, 'amigos viejos', 'puteria', '2017-05-22', '05:30:00', '03:30:00', '2017-05-23', '../uploads/patrimonio natural.jpg', 'todo sano', '1'),
(14, 'La juarez Mazatlan Sinaloa', 1, 'Los borrachos', 'Pistear', '2017-05-26', '01:00:00', '12:30:00', '2017-05-31', '../uploads/1.jpg', 'Este evento se hace con el fin', '4'),
(15, 'lojv', 1, 'vfvd', 'vdfvf', '2017-05-11', '12:30:00', '01:30:00', '2017-05-26', '../uploads/Coffee-Coding-Devolutions-1024x640.png', 'gdgtrfg', '1'),
(16, 'Mazatlan Sinaloa', 3, 'Tardeada', 'Pistear otra vez', '2017-05-26', '02:00:00', '12:30:00', '2017-05-24', '../uploads/carnaval mazatlan 1910.jpg', 'llhqhhoqwhochoqwohchqohwcqwhch', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_evento`
--

CREATE TABLE `tipo_evento` (
  `id` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_evento`
--

INSERT INTO `tipo_evento` (`id`, `tipo`) VALUES
(1, 'Fiesta o reunion social'),
(2, 'Acampado,viaje o retiro'),
(3, 'Juego o competicion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idu` int(11) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pw` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idu`, `nombres`, `apellidos`, `email`, `pw`, `fecha_nacimiento`) VALUES
(1, 'carlos', 'leon', 'ryxploit@gmail.com', '12345', '0000-00-00'),
(2, 'dylan', 'leon', 'dylan@gmail.com', '12345', '0000-00-00'),
(4, 'Mario', 'Labrador Avila', 'mariolabrador95@hotmail.com', '12345', '0000-00-00'),
(5, 'hugo', 'alvarez', 'pelon@gmail.com', '12345', '2017-05-17'),
(6, 'fany', 'alaniz', 'fany@lu.com', '12345', '2017-05-23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistentes`
--
ALTER TABLE `asistentes`
  ADD PRIMARY KEY (`ida`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`ide`),
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `tipo_evento`
--
ALTER TABLE `tipo_evento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistentes`
--
ALTER TABLE `asistentes`
  MODIFY `ida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `ide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `tipo_evento`
--
ALTER TABLE `tipo_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
