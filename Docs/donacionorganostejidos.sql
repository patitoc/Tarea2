-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2023 a las 22:20:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `donacionorganostejidos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacion`
--

CREATE TABLE `donacion` (
  `CodDonacion` varchar(255) NOT NULL,
  `TipoDonacion` text NOT NULL,
  `OrganoOTejido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donante`
--

CREATE TABLE `donante` (
  `CodDonante` varchar(30) NOT NULL,
  `NombreDonante` text NOT NULL,
  `Cedula` int(11) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Genero` varchar(20) NOT NULL,
  `GrupoSanguineo` varchar(20) NOT NULL,
  `UnidadDetectora` varchar(200) NOT NULL,
  `TipoDeMuerte` varchar(100) NOT NULL,
  `TipoDonante` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `donante`
--

INSERT INTO `donante` (`CodDonante`, `NombreDonante`, `Cedula`, `Edad`, `Genero`, `GrupoSanguineo`, `UnidadDetectora`, `TipoDeMuerte`, `TipoDonante`) VALUES
('DNNT001', 'Aracely Cadena', 2100136972, 14, 'Femenino', 'ABP', 'Hospital Eugenio Espejo', 'Muerte encefálica', 'Donante efectivo de órganos');


INSERT INTO `donante` (`CodDonante`, `NombreDonante`, `Cedula`, `Edad`, `Genero`, `GrupoSanguineo`, `UnidadDetectora`, `TipoDeMuerte`, `TipoDonante`) VALUES ('DNNT002', 'Juan Carlos Castillo Badillo', '0603149428', '39', 'Masculino', 'OP', 'Hospital de Especialidades de las Fuerzas Armadas', 'Muerte encef�lica', 'Donante efectivo de organos');
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioId` int(11) NOT NULL,
  `Cedula` varchar(17) NOT NULL,
  `Nombres` varchar(100) NOT NULL,
  `Apellidos` varchar(100) NOT NULL,
  `Telefono` varchar(17) NOT NULL,
  `Correo` varchar(150) NOT NULL,
  `Contrasenia` text NOT NULL,
  `Rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UsuarioId`, `Cedula`, `Nombres`, `Apellidos`, `Telefono`, `Correo`, `Contrasenia`, `Rol`) VALUES
(1, '1803971371', 'Luis Antonio', 'Llerena OcaÃ±a', '0987654321', 'lleroc1@gmail.com', '123', 'Administrador'),
(2, '1234567890', 'Otro Luis', 'Otro Llerena', '0987654321', 'correo@gmail.com', '123', 'Vendedor'),
(4, '1803971330', 'Luis Antonio', 'Llerena OcaÃ±a', '0981030167', 'lleroc@gmail.com', '123', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `donacion`
--
ALTER TABLE `donacion`
  ADD PRIMARY KEY (`CodDonacion`(50));

--
-- Indices de la tabla `donante`
--
ALTER TABLE `donante`
  ADD PRIMARY KEY (`CodDonante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
