-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2021 a las 05:07:36
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `obtenerUsuarios` (IN `id_Usuario` INT(11))  BEGIN
    SELECT *
    FROM usuario
    WHERE id_Usuario = id_Usuario;
END$$

DELIMITER ;

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
('01', '23115689', 'Miguel', 'CALLE AGUSTIN LARA NO. 69-B', '5555555555', '559632145'),
('02', '23115689', 'arturo', 'CALLE AGUSTIN LARA NO. 69-A', '5578546312', '5623456321'),
('03', '23115689', 'Juan', 'CALLE AGUSTIN LARA NO. 69-C', '5578546894', '562345241'),
('04', '23115689', 'Damian', 'CALLE AGUSTIN LARA NO. 69-D', '5578234568', '5623456321'),
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

--
-- Volcado de datos para la tabla `curriculum`
--

INSERT INTO `curriculum` (`Id_Curriculum`, `Num_Titulaciones`, `Num_Titulo`, `Especialidad`, `Universidad`) VALUES
(1, 2, 2356, 'administracion', 'UAM'),
(2, 2, 2355, 'contabilidad', 'UNAM'),
(3, 2, 2357, 'administracion', 'UAM'),
(4, 1, 2356, 'informatica', 'IPN'),
(5, 1, 2358, 'informatica', 'UNAM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curriculum_demandante`
--

CREATE TABLE `curriculum_demandante` (
  `DNI` varchar(10) NOT NULL,
  `Id_Curriculum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curriculum_demandante`
--

INSERT INTO `curriculum_demandante` (`DNI`, `Id_Curriculum`) VALUES
('123', 4),
('123', 4),
('V12167961', 3),
('V12167962', 4),
('V12167963', 5),
('V12167963', 3),
('V12167968', 1),
('V12167965', 6);

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

--
-- Volcado de datos para la tabla `demandante`
--

INSERT INTO `demandante` (`DNI`, `Nombre`, `Direccion`, `Telefono`, `Carnet_Conduccion`) VALUES
('123', 'eduardo ivan', 'cda juarez', '5558741230', 'cdi123'),
('V12167961', 'Miguel', 'CALLE AGUSTIN LARA NO. 69-B', '5555555555', '6400000039009'),
('V12167962', 'arturo', 'CALLE AGUSTIN LARA NO. 69-B', '5578546312', '6400000039009'),
('V12167963', 'Damian', 'CALLE AGUSTIN LARA NO. 69-A', '5555555555', '6400000039009'),
('V12167965', 'Damian', 'CALLE AGUSTIN LARA NO. 69-C', '5578546312', '6400000039009'),
('V12167968', 'arturo', 'CALLE AGUSTIN LARA NO. 69-C', '5578546312', '6400000039009');

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

--
-- Volcado de datos para la tabla `experiencia_profesional`
--

INSERT INTO `experiencia_profesional` (`Nombre_Empresa`, `DNI`, `Duracion`, `Puesto`) VALUES
('	Walmart de México', 'V12167963', '5años', 'Tecnico mantenimiento'),
('Comisión Federal de Electricidad', 'V12167968', '4años', 'Capturista'),
('Grupo Coppel', 'V12167965', '3años', 'Gerente'),
('Grupo Financiero BBVA Bancomer', 'V12167968', '14años', 'cajero'),
('MATERIALES ACEROS TUCAN.S.A. DE C.V', 'V12167961', '5años', 'Gerente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `Id_Perfil` int(11) NOT NULL,
  `Descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`Id_Perfil`, `Descripcion`) VALUES
(1, 'controla, ejecuta, maneja, analiza, comunica, vincula, planifica, lidera, negocia, motiva y toma decisiones, entre muchas otras actividades, dentro de una organización, un área, rama, unidad o departamento de la misma, con el propósito de conseguir que se cumplan ciertos objetivos.'),
(2, 'está capacitado para organizar y dirigir el área de Sistemas de todo tipo de Organizaciones, así como para planificar, dirigir, relevar, analizar, diseñar, desarrollar e implementar proyectos de integración de Software, de e-business, de telecomunicaciones y redes y, en general, todo proyecto'),
(3, 'Diseña, gestiona y ejecuta las estrategias económicas y financieras de una empresa. Interpreta la información contable para el planeamiento, el control y la toma de decisiones. Forma parte de las decisiones gerenciales, en base a la interpretación de la información contable y financiera.'),
(4, 'Entre sus responsabilidades se encuentran: Diseñar e implantar la estrategia de RRHH teniendo en cuenta los valores y necesidades de la compañía. ... Definir y ejecutar el presupuesto del área de Recursos Humanos de una empresa. '),
(5, 'Entre sus responsabilidades se encuentran: Diseñar e implantar la estrategia de RRHH teniendo en cuenta los valores y necesidades de la compañía. ... Definir y ejecutar el presupuesto del área de Recursos Humanos de una empresa. ');

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
('123', 123),
('123', 123),
('01', 1),
('02', 2),
('03', 3),
('04', 4),
('05', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_demandante`
--

CREATE TABLE `perfil_demandante` (
  `DNI` varchar(10) NOT NULL,
  `Id_Perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfil_demandante`
--

INSERT INTO `perfil_demandante` (`DNI`, `Id_Perfil`) VALUES
('V12167962', 1),
('V12167963', 2),
('V12167968', 3),
('V12167961', 4),
('V12167965', 5);

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
  MODIFY `Id_Perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
