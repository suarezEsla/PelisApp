-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-05-2021 a las 12:45:52
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `peliculasbd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peliculas`
--

CREATE TABLE `peliculas` (
  `codigo_pelicula` int(255) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `genero` varchar(25) NOT NULL,
  `director` varchar(25) NOT NULL,
  `imagen` varchar(25) NOT NULL,
  `alquiler` int(25) NOT NULL,
  `video` varchar(255) NOT NULL,
  `estrellas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `peliculas`
--

INSERT INTO `peliculas` (`codigo_pelicula`, `nombre`, `genero`, `director`, `imagen`, `alquiler`, `video`, `estrellas`) VALUES
(5, 'fsaf', 'dsdsg', 'dffsd', 'app/img/piratas3.jpg', 3, 'https://www.youtube.com/embed/oYFaMRk6D0Q', 4),
(7, 'aaaaa', 'aaaaaaa', 'aaaaaaaaaaaa', 'app/img/Los_pajaros.jpg', 1, 'https://www.youtube.com/embed/h-9RYiqyqjk', 4),
(9, 'Harry 1782763', 'kh', 'sff', 'app/img/harry.jpeg', 4, 'https://www.youtube.com/embed/oYFaMRk6D0Q', 4),
(14, 'Piratas888888', 'Aventuras', 'Desconocido', 'app/img/Samurai.gif', 2, 'https://www.youtube.com/embed/h-9RYiqyqjk', 4),
(17, '154545harry', 'lñhhg', 'lskjf', 'app/img/piratas3.jpg', 2, 'https://www.youtube.com/embed/oYFaMRk6D0Q', 4),
(19, 'Fargo', 'Drama', 'Nicky Swango', 'app/img/swango.gif', 3, 'https://www.youtube.com/embed/oYFaMRk6D0Q', 4),
(20, 'El Último Samurai', 'Drama', 'Desconocido', 'app/img/Samurai.gif', 2, 'https://www.youtube.com/embed/pcy7akchofw', 4),
(21, 'La chica del tren', 'Drama', 'Desconocido', 'app/img/harry.jpeg', 1, 'https://www.youtube.com/embed/pcy7akchofw', 4),
(22, 'fdfdfdffd', 'Drama', 'Desconocido', 'app/img/piratas3.jpg', 3, 'https://www.youtube.com/embed/oYFaMRk6D0Q', 4),
(23, 'El Último Samurai333', '333', '333', 'app/img/piratas3.jpg', 2, 'https://www.youtube.com/embed/3GJp6p_mgPo', 4),
(24, 'El hombre de la rosa', 'Drama', 'sad', 'app/img/El_golpe.jpg', 3, 'https://www.youtube.com/embed/h-9RYiqyqjk', 4),
(25, 'Lilo & Stitch', 'Dibuos', 'Desconocido', 'app/img/lilo.jpg', 6, 'https://www.youtube.com/embed/Prx_L4ykcWk', 4),
(26, 'fdfdfdffdssffs', 'Drama', 'Desconocido', 'app/img/harry.jpeg', 3, 'https://www.youtube.com/embed/pcy7akchofw', 0),
(27, 'Mi Vida Sin Mi', 'Drama', 'Desconocido', 'app/img/mividasinmi.gif', 4, 'https://www.youtube.com/embed/MnRuXmT5m5I', 0),
(28, 'fssdgfsa', 'sdggds', 'fdsg', 'app/img/Samurai.gif', 3, 'https://www.youtube.com/embed/pcy7akchofw', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre_usuario` varchar(25) NOT NULL,
  `apellidos` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre_usuario`, `apellidos`, `email`, `password`) VALUES
('esla', 'suarez', 'suarezesla@gmail.com', '12345'),
('adan ', 'suarez arquero', 'adan@gmail.com', '12345678+'),
('Among', 'Us', 'monjas@gmail.com', '123456789'),
('Gato', 'Gato', 'suarezesla@gmail.com', '123456'),
('fff', 'fff', 'suarezesla@gmail.com', '12345'),
('Frida', 'Khalo', 'dgg@gmail.com', '123456'),
('hhg', 'aghghg', 'sufdhhrezesla@gmail.com', '12345'),
('Kkkk', 'kkk', 'kkk@kkk.com', '123456'),
('dsff', 'kkk', 'kksffsfk@kkk.com', '12243554436'),
('dsff', 'kkk', 'kksffsfk@kkk.com', '12243554436'),
('dsfsdgff', 'kkk', 'kksffxgdgsfk@kkk.com', '24554'),
('dsfsdgff', 'kkk', 'kksffxgdgsfk@kkk.com', ''),
('Adrian', 'Lopez', 'lopez@gmail.com', '123456789'),
('Tom', 'Cruise', 'tom@actor.com', '123'),
('fdgd', 'Cruise', 'tom@actor.com', '21223323'),
('Marituerkas', 'Suarez', 'mari123@gmail.com', 'mari2019');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  ADD PRIMARY KEY (`codigo_pelicula`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `peliculas`
--
ALTER TABLE `peliculas`
  MODIFY `codigo_pelicula` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
