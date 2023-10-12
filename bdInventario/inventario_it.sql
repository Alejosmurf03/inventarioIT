-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2019 a las 06:20:41
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario_it`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acta`
--

CREATE TABLE `acta` (
  `ID_acta` int(11) NOT NULL,
  `Archivo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `base`
--

CREATE TABLE `base` (
  `ID_base` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `base`
--

INSERT INTO `base` (`ID_base`, `nombre`) VALUES
(1, 'Bogota'),
(2, 'Neiva'),
(3, 'Yopal'),
(4, 'Barranca'),
(5, 'Villavicencio'),
(6, 'Cota'),
(7, 'Peru');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disposal`
--

CREATE TABLE `disposal` (
  `ID_disposal` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_Material` int(11) NOT NULL,
  `observacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE `entrega` (
  `ID_entrega` int(11) NOT NULL,
  `fecha_entrega` datetime DEFAULT NULL,
  `ID_usuario` int(50) DEFAULT NULL,
  `observacion_entrega` varchar(200) DEFAULT NULL,
  `H_Usuariorecibe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_detalle`
--

CREATE TABLE `entrega_detalle` (
  `ID_envio` int(11) NOT NULL,
  `ID_material` int(11) NOT NULL,
  `grfs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_detalle_temp`
--

CREATE TABLE `entrega_detalle_temp` (
  `ID_temp` date NOT NULL,
  `ID_material` int(11) NOT NULL,
  `grfs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE `envio` (
  `ID_envio` int(11) NOT NULL,
  `Numero_guia` int(11) NOT NULL,
  `fecha_envio` date DEFAULT NULL,
  `ID_base_destino` int(11) DEFAULT NULL,
  `observa_envio` varchar(45) DEFAULT NULL,
  `ID_usuario` int(15) NOT NULL,
  `Husuario_envia` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio_detalle`
--

CREATE TABLE `envio_detalle` (
  `ID_envio` int(11) NOT NULL,
  `ID_material` int(11) NOT NULL,
  `grfs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio_detalle_temp`
--

CREATE TABLE `envio_detalle_temp` (
  `ID_temp` date NOT NULL,
  `ID_material` int(11) NOT NULL,
  `grfs` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `ID_matenimiento` int(11) NOT NULL,
  `numero_ticket` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_retorno` date NOT NULL,
  `observacion_fallo` text NOT NULL,
  `observacion_entrega` text NOT NULL,
  `ID_material` int(11) NOT NULL,
  `ID_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `ID_material` int(11) NOT NULL,
  `cod_barras` int(11) NOT NULL,
  `ID_usuario` int(15) DEFAULT NULL,
  `serial_equipo` varchar(50) DEFAULT NULL,
  `ID_base` int(11) DEFAULT NULL,
  `ID_tipo` int(11) DEFAULT NULL,
  `costo_grfs` varchar(50) DEFAULT NULL,
  `fecha_ingreso` date NOT NULL,
  `caracteristicas` varchar(200) NOT NULL,
  `estado` enum('Activo','Enviado','Recibido','Asignado','Prestado','Inactivo','Mantenimiento') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`ID_material`, `cod_barras`, `ID_usuario`, `serial_equipo`, `ID_base`, `ID_tipo`, `costo_grfs`, `fecha_ingreso`, `caracteristicas`, `estado`) VALUES
(47, 123, 1, '5788', 1, 5, '5678', '2019-10-23', 'tiene 500 de disco', 'Activo'),
(53, 789, 3, '', 2, 10, '3434', '2019-10-23', 'Mouse alambrico', 'Activo'),
(55, 76543, 3, '6655', 1, 5, '6787', '2019-10-23', 'tiene 4 de ram y 256 de disco', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `ID_prestamo` int(11) NOT NULL,
  `H_usuarioPresta` varchar(15) DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `descripcionPrestamo` text,
  `descripcionEntrega` varchar(100) NOT NULL,
  `ID_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo_has_material`
--

CREATE TABLE `prestamo_has_material` (
  `ID_prestamo_has_material` int(11) NOT NULL,
  `ID_prestamo` int(11) NOT NULL,
  `ID_material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recibir_envio`
--

CREATE TABLE `recibir_envio` (
  `ID_entrega_envio` int(11) NOT NULL,
  `ID_envio` int(11) NOT NULL,
  `ID_usuario` int(11) NOT NULL,
  `fecha_recibe` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_rol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_rol`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_material`
--

CREATE TABLE `tipo_material` (
  `ID_tipo_material` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_material`
--

INSERT INTO `tipo_material` (`ID_tipo_material`, `nombre`) VALUES
(1, 'Laptop HP EliteBook 8470P'),
(2, 'Laptop HP EliteBook 840 G1'),
(3, 'Laptop HP EliteBook 840 G3'),
(4, 'Laptop HP EliteBook 840 G5'),
(5, 'Laptop HP ZBook 15u G5'),
(6, 'Laptop HP ZBook 15u G1'),
(7, 'Laptop HP EliteBook 830'),
(8, 'Laptop HP EliteBook 800 G5'),
(9, 'Laptop HP EliteBook 800 G3'),
(10, 'Mouse'),
(11, 'Teclado'),
(12, 'Ram');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(11) NOT NULL,
  `ID_H` varchar(15) NOT NULL,
  `pass` char(20) DEFAULT NULL,
  `nombre_compl` varchar(30) DEFAULT NULL,
  `ID_rol` int(11) DEFAULT NULL,
  `ID_base` int(11) DEFAULT NULL,
  `Estado` enum('Activo','Inactivo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `ID_H`, `pass`, `nombre_compl`, `ID_rol`, `ID_base`, `Estado`) VALUES
(1, 'H234512', 'Manuel123', 'Manuel Vega', 2, 1, 'Activo'),
(2, 'H238461', '12345', 'Tania Losada', 2, 2, 'Activo'),
(3, 'HBB5522', 'Root#2019', 'Delvis Hernandez', 1, 1, 'Activo'),
(6, 'H124181', 'Edgardo.2019', 'Edgardo Perdomo Trujillo', 2, 2, 'Activo'),
(7, 'H193000', 'Septiembre.2019', 'Willie Ramirez', 1, 1, 'Activo'),
(8, 'H195859', 'Halliburton.2019', 'Mauricio Gallo', 1, 1, 'Activo'),
(9, 'HB59476', 'Yise2019', 'Yisela Maria Maiguel', 1, 1, 'Activo'),
(10, 'H199523', 'LuGuz.2019', 'Luisa Guzman', 2, 1, 'Activo'),
(11, 'H184075', 'Diego.201910', 'Diego Vargas', 2, 1, 'Activo'),
(12, 'H242568', 'Bricelio.201901', 'Bricelio Lopez', 2, 3, 'Activo'),
(13, 'H242885', 'Jonier.2019', 'Jonier Gutierrez', 2, 4, 'Activo'),
(14, 'H230322', 'JuanGarcia.2019', 'Juan Garcia', 2, 5, 'Activo'),
(15, 'H186112', 'Edu.201910', 'Edwin Giraldo', 2, 6, 'Activo'),
(16, 'IT_COLOMBIA_SUP', 'Yei.201910', 'Yeimara ', 2, 6, 'Activo'),
(17, 'H234416', 'Jaime.102019', 'Jaime Montejo', 2, 6, 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acta`
--
ALTER TABLE `acta`
  ADD PRIMARY KEY (`ID_acta`);

--
-- Indices de la tabla `base`
--
ALTER TABLE `base`
  ADD PRIMARY KEY (`ID_base`);

--
-- Indices de la tabla `disposal`
--
ALTER TABLE `disposal`
  ADD PRIMARY KEY (`ID_disposal`),
  ADD KEY `id_Material` (`id_Material`);

--
-- Indices de la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD PRIMARY KEY (`ID_entrega`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `entrega_detalle`
--
ALTER TABLE `entrega_detalle`
  ADD KEY `ID_envio` (`ID_envio`),
  ADD KEY `ID_material` (`ID_material`);

--
-- Indices de la tabla `entrega_detalle_temp`
--
ALTER TABLE `entrega_detalle_temp`
  ADD KEY `ID_material` (`ID_material`);

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
  ADD PRIMARY KEY (`ID_envio`),
  ADD KEY `ID_base_destino` (`ID_base_destino`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `envio_detalle`
--
ALTER TABLE `envio_detalle`
  ADD KEY `envio_has_material_ibfk_1` (`ID_envio`),
  ADD KEY `ID_material` (`ID_material`);

--
-- Indices de la tabla `envio_detalle_temp`
--
ALTER TABLE `envio_detalle_temp`
  ADD KEY `ID_material` (`ID_material`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`ID_matenimiento`),
  ADD KEY `ID_material` (`ID_material`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`ID_material`),
  ADD KEY `ID_base` (`ID_base`),
  ADD KEY `ID_tipo` (`ID_tipo`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`ID_prestamo`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `prestamo_has_material`
--
ALTER TABLE `prestamo_has_material`
  ADD PRIMARY KEY (`ID_prestamo_has_material`),
  ADD KEY `prestamo_has_material_ibfk_1` (`ID_material`),
  ADD KEY `prestamo_has_material_ibfk_2` (`ID_prestamo`);

--
-- Indices de la tabla `recibir_envio`
--
ALTER TABLE `recibir_envio`
  ADD PRIMARY KEY (`ID_entrega_envio`),
  ADD KEY `ID_envio` (`ID_envio`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_rol`);

--
-- Indices de la tabla `tipo_material`
--
ALTER TABLE `tipo_material`
  ADD PRIMARY KEY (`ID_tipo_material`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD KEY `ID_rol` (`ID_rol`),
  ADD KEY `ID_base` (`ID_base`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acta`
--
ALTER TABLE `acta`
  MODIFY `ID_acta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `base`
--
ALTER TABLE `base`
  MODIFY `ID_base` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `disposal`
--
ALTER TABLE `disposal`
  MODIFY `ID_disposal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `entrega`
--
ALTER TABLE `entrega`
  MODIFY `ID_entrega` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
  MODIFY `ID_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `ID_matenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `ID_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `ID_prestamo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `prestamo_has_material`
--
ALTER TABLE `prestamo_has_material`
  MODIFY `ID_prestamo_has_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `recibir_envio`
--
ALTER TABLE `recibir_envio`
  MODIFY `ID_entrega_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_material`
--
ALTER TABLE `tipo_material`
  MODIFY `ID_tipo_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `disposal`
--
ALTER TABLE `disposal`
  ADD CONSTRAINT `disposal_ibfk_1` FOREIGN KEY (`id_Material`) REFERENCES `material` (`ID_material`);

--
-- Filtros para la tabla `entrega`
--
ALTER TABLE `entrega`
  ADD CONSTRAINT `entrega_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`);

--
-- Filtros para la tabla `entrega_detalle`
--
ALTER TABLE `entrega_detalle`
  ADD CONSTRAINT `entrega_detalle_ibfk_1` FOREIGN KEY (`ID_envio`) REFERENCES `envio` (`ID_envio`),
  ADD CONSTRAINT `entrega_detalle_ibfk_2` FOREIGN KEY (`ID_material`) REFERENCES `material` (`ID_material`);

--
-- Filtros para la tabla `entrega_detalle_temp`
--
ALTER TABLE `entrega_detalle_temp`
  ADD CONSTRAINT `entrega_detalle_temp_ibfk_1` FOREIGN KEY (`ID_material`) REFERENCES `material` (`ID_material`);

--
-- Filtros para la tabla `envio`
--
ALTER TABLE `envio`
  ADD CONSTRAINT `envio_ibfk_1` FOREIGN KEY (`ID_base_destino`) REFERENCES `base` (`ID_base`),
  ADD CONSTRAINT `envio_ibfk_2` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`);

--
-- Filtros para la tabla `envio_detalle`
--
ALTER TABLE `envio_detalle`
  ADD CONSTRAINT `envio_detalle_ibfk_1` FOREIGN KEY (`ID_envio`) REFERENCES `envio` (`ID_envio`),
  ADD CONSTRAINT `envio_detalle_ibfk_2` FOREIGN KEY (`ID_material`) REFERENCES `material` (`ID_material`);

--
-- Filtros para la tabla `envio_detalle_temp`
--
ALTER TABLE `envio_detalle_temp`
  ADD CONSTRAINT `envio_detalle_temp_ibfk_1` FOREIGN KEY (`ID_material`) REFERENCES `material` (`ID_material`);

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`ID_material`) REFERENCES `material` (`ID_material`),
  ADD CONSTRAINT `mantenimiento_ibfk_2` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`);

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`ID_base`) REFERENCES `base` (`ID_base`),
  ADD CONSTRAINT `material_ibfk_2` FOREIGN KEY (`ID_tipo`) REFERENCES `tipo_material` (`ID_tipo_material`),
  ADD CONSTRAINT `material_ibfk_3` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`);

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`);

--
-- Filtros para la tabla `prestamo_has_material`
--
ALTER TABLE `prestamo_has_material`
  ADD CONSTRAINT `prestamo_has_material_ibfk_1` FOREIGN KEY (`ID_material`) REFERENCES `material` (`ID_material`),
  ADD CONSTRAINT `prestamo_has_material_ibfk_2` FOREIGN KEY (`ID_prestamo`) REFERENCES `prestamo` (`ID_prestamo`);

--
-- Filtros para la tabla `recibir_envio`
--
ALTER TABLE `recibir_envio`
  ADD CONSTRAINT `recibir_envio_ibfk_1` FOREIGN KEY (`ID_envio`) REFERENCES `envio` (`ID_envio`),
  ADD CONSTRAINT `recibir_envio_ibfk_3` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`ID_usuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_rol`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`ID_base`) REFERENCES `base` (`ID_base`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
