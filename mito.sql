-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2021 a las 10:51:26
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Id_cliente` varchar(10) NOT NULL,
  `CIF` varchar(20) NOT NULL,
  `Nombre` text NOT NULL,
  `Direccion` text NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Num_Fax` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id_cliente`, `CIF`, `Nombre`, `Direccion`, `Telefono`, `Num_Fax`) VALUES
('12345', 'cif123', 'Miguel Angel Mejia ', 'San Sebastian Xhala', '555814756', 'fax123'),
('123456', 'cif123', 'Eduardo Ivan Maqueda Hernandez', 'cda juarez #1 tepotzotlan', '1324564887', 'fax123456'),
('1234567', 'cif123', 'Juan Maldonado Vazquez Lopez', 'San Sebastian Xhala', '5558741236', 'fax123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curriculum`
--

CREATE TABLE `curriculum` (
  `Id_Curriculum` int(11) NOT NULL,
  `Num_Titulaciones` int(11) NOT NULL,
  `Num_Titulo` int(11) NOT NULL,
  `Especialidad` text NOT NULL,
  `Universidad` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curriculum_demandante`
--

CREATE TABLE `curriculum_demandante` (
  `DNI` varchar(10) NOT NULL,
  `Id_Curriculum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `demandante`
--

CREATE TABLE `demandante` (
  `DNI` varchar(10) NOT NULL,
  `Nombre` text NOT NULL,
  `Direccion` text NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Carnet_Conduccion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia_profesional`
--

CREATE TABLE `experiencia_profesional` (
  `Nombre_Empresa` varchar(50) NOT NULL,
  `DNI` varchar(10) NOT NULL,
  `Duracion` varchar(30) NOT NULL,
  `Puesto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `Id_Perfil` int(11) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_cliente`
--

CREATE TABLE `perfil_cliente` (
  `Id_cliente` varchar(10) NOT NULL,
  `Id_Perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfil_cliente`
--

INSERT INTO `perfil_cliente` (`Id_cliente`, `Id_Perfil`) VALUES
('123', 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_demandante`
--

CREATE TABLE `perfil_demandante` (
  `DNI` varchar(10) NOT NULL,
  `Id_Perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_Usuario` int(11) NOT NULL,
  `Correo_Electronico` varchar(80) NOT NULL,
  `Contraseña` text NOT NULL,
  `Nombres` text NOT NULL,
  `Apellidos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_Usuario`, `Correo_Electronico`, `Contraseña`, `Nombres`, `Apellidos`) VALUES
(1, 'edu674@live.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Eduardo Ivan', 'Maqueda Hernandez'),
(2, 'mejia@live.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', '', 'Mejia Herrera'),
(3, 'LuisFernando@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Miguel Angel', 'Mejia Herrera'),
(4, 'mejia@gmail.com', '3c9909afec25354d551dae21590bb26e38d53f2173b8d3dc3eee4c047e7ab1c1eb8b85103e3be7ba613b31bb5c9c36214dc9f14a42fd7a2fdb84856bca5c44c2', 'Miguel Angel', 'Mejia Herrera');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`Id_cliente`);

--
-- Indices de la tabla `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`Id_Curriculum`);

--
-- Indices de la tabla `demandante`
--
ALTER TABLE `demandante`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `experiencia_profesional`
--
ALTER TABLE `experiencia_profesional`
  ADD PRIMARY KEY (`Nombre_Empresa`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`Id_Perfil`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `Id_Curriculum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1234568;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `Id_Perfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
