-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2019 a las 18:37:05
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sic`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id`, `nombre`, `fecha_creacion`) VALUES
(1, 'AIRES ACONDICIONADOS', '2019-07-23 20:07:34'),
(2, 'SISTEMAS', '2019-07-23 20:07:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) CHARACTER SET latin1 NOT NULL,
  `id_area` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `id_area`, `fecha_creacion`) VALUES
(1, 'CCTV', 2, '2019-10-14 18:02:24'),
(2, 'PORTATIL', 2, '2019-10-14 18:02:28'),
(3, 'AIRE ACONDICIONADO', 1, '2019-10-14 18:02:32'),
(4, 'TELÉFONOS IP', 2, '2019-10-14 18:02:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencia`
--

CREATE TABLE `dependencia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `descripcion` text CHARACTER SET latin1 DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dependencia`
--

INSERT INTO `dependencia` (`id`, `nombre`, `descripcion`, `fecha_creacion`) VALUES
(2, 'GERENCIA', 'Oficina gerencia ', '2019-07-03 18:44:56'),
(3, 'CONTABILIDAD', 'Oficina contabilidad', '2019-07-05 01:04:45'),
(6, 'SISTEMAS', 'Departamento de sistemas', '2019-07-23 21:40:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `det_ticket`
--

CREATE TABLE `det_ticket` (
  `id` int(11) NOT NULL,
  `codigo` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `descripcion` varchar(300) CHARACTER SET utf8mb4 NOT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_tipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_prioridad` int(11) NOT NULL,
  `id_estado_ticket` int(11) NOT NULL,
  `id_ticket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `nit` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `direccion` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `telefono` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id`, `nombre`, `nit`, `direccion`, `telefono`) VALUES
(1, 'UNIDAD CLÍNICA LA MAGDALENA SAS', '800038024-3', 'CALLE 50 # 24-37 BARRIO COLOMBIA', 6007000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
  `codigo` varchar(100) CHARACTER SET utf16 DEFAULT NULL,
  `id_marca` int(11) NOT NULL,
  `modelo` varchar(50) CHARACTER SET utf16 NOT NULL,
  `serial` varchar(50) CHARACTER SET utf16 DEFAULT NULL,
  `ip_equipo` varchar(15) CHARACTER SET utf16 DEFAULT NULL,
  `asignado` varchar(50) CHARACTER SET utf16 NOT NULL,
  `piso` int(1) NOT NULL,
  `id_dependencia` int(11) NOT NULL,
  `erp` varchar(15) CHARACTER SET utf16 DEFAULT NULL,
  `id_estado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `anexo` varchar(250) CHARACTER SET utf16 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `codigo`, `id_marca`, `modelo`, `serial`, `ip_equipo`, `asignado`, `piso`, `id_dependencia`, `erp`, `id_estado`, `id_usuario`, `id_area`, `id_categoria`, `fecha_registro`, `anexo`) VALUES
(22, 'CCT-101', 5, '123456', '12345', '10.1.0.25', 'helmer villarrea', 2, 6, '10.1.2.036', 1, 68, 2, 1, '2019-10-14 13:09:09', './vistas/documentos/CCT-101/425.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_equipo`
--

CREATE TABLE `estado_equipo` (
  `id_estado` int(11) NOT NULL,
  `descrip_estado` varchar(50) CHARACTER SET utf16 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado_equipo`
--

INSERT INTO `estado_equipo` (`id_estado`, `descrip_estado`) VALUES
(1, 'Activo'),
(2, 'De baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_ticket`
--

CREATE TABLE `estado_ticket` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estado_ticket`
--

INSERT INTO `estado_ticket` (`id`, `nombre`) VALUES
(1, 'Abierto'),
(2, 'Proceso'),
(3, 'Cerrado'),
(4, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `histo_equipo`
--

CREATE TABLE `histo_equipo` (
  `id_histo` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `observacion` varchar(1000) CHARACTER SET utf16 NOT NULL,
  `fecha_observacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `histo_equipo`
--

INSERT INTO `histo_equipo` (`id_histo`, `id_equipo`, `id_usuario`, `observacion`, `fecha_observacion`) VALUES
(107, 22, 68, 'ACTUALZIACIONDE FIREMWARE', '2019-10-14'),
(108, 22, 68, 'ACTUALZIACIONDE FIREMWARE', '2019-10-13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`, `fecha_creacion`) VALUES
(1, 'HP', '2019-07-05 01:03:53'),
(2, 'Toshiba', '2019-07-03 03:10:41'),
(5, 'GRANDSTREAM', '2019-07-23 21:35:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridad`
--

CREATE TABLE `prioridad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prioridad`
--

INSERT INTO `prioridad` (`id`, `nombre`) VALUES
(1, 'alta'),
(2, 'media'),
(3, 'baja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `codigo` varchar(100) CHARACTER SET utf16 DEFAULT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_actualizacion` datetime DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_tipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_prioridad` int(11) NOT NULL,
  `id_dependencia` int(11) NOT NULL,
  `id_estado_ticket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id`, `codigo`, `titulo`, `descripcion`, `fecha_actualizacion`, `fecha_registro`, `id_tipo`, `id_usuario`, `id_area`, `id_categoria`, `id_prioridad`, `id_dependencia`, `id_estado_ticket`) VALUES
(21, 'SIS-0001', 'Abierto error portatil', 'No enciende', NULL, '2019-10-30 17:24:30', 1, 68, 2, 1, 1, 6, 1),
(22, 'SIS-0002', 'Proceso error portatil', 'No enciende', NULL, '2019-10-30 17:23:31', 1, 68, 2, 1, 1, 6, 2),
(23, 'SIS-0003', 'Finalizado error portatil', 'No enciende', NULL, '2019-10-30 17:24:47', 1, 68, 2, 1, 1, 6, 3),
(24, 'SIS-0004', 'Cerrado error portatil', 'No enciende', NULL, '2019-10-30 17:24:24', 1, 69, 2, 1, 1, 6, 4),
(25, 'AIR-0001', 'Abierto asdf', 'asdf', NULL, '2019-10-30 17:24:36', 1, 69, 1, 3, 2, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`, `fecha_creacion`) VALUES
(1, 'Soporte', '2019-07-05 01:47:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tp_equipo`
--

CREATE TABLE `tp_equipo` (
  `id_tipo` int(11) NOT NULL,
  `descrip_tp_equipo` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `id_area` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` text CHARACTER SET latin1 DEFAULT NULL,
  `nombre` text CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(200) CHARACTER SET latin1 DEFAULT NULL,
  `contraseña` text CHARACTER SET latin1 DEFAULT NULL,
  `foto_usuario` text CHARACTER SET latin1 DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 0,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `id_area` int(11) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT current_timestamp(),
  `ultimo_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `email`, `contraseña`, `foto_usuario`, `estado`, `perfil`, `id_area`, `fecha_registro`, `ultimo_login`) VALUES
(68, 'admin', 'ADMINISTRADOR', 'sistemas@clinicalamagdalena.com', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'vistas/img/usuarios/admin/199.png', 1, '1', 1, '2019-07-22 02:32:18', '2019-10-30 17:28:09'),
(69, 'TORREA', 'TORRE A', 'TORREA@GMAIL.COM', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'vistas/img/usuarios/TORREA/389.png', 1, '3', 2, '2019-10-14 18:23:33', '2019-10-30 12:29:21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_area`);

--
-- Indices de la tabla `dependencia`
--
ALTER TABLE `dependencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `det_ticket`
--
ALTER TABLE `det_ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_prioridad` (`id_prioridad`),
  ADD KEY `id_estado_ticket` (`id_estado_ticket`),
  ADD KEY `id_rol` (`id_area`),
  ADD KEY `relacion` (`id_ticket`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `id_tp_equipo` (`id_dependencia`),
  ADD KEY `id_tipo_depen` (`id_dependencia`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_rol` (`id_area`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `equipo_ibfk_7` (`id_categoria`);

--
-- Indices de la tabla `estado_equipo`
--
ALTER TABLE `estado_equipo`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estado_ticket`
--
ALTER TABLE `estado_ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `histo_equipo`
--
ALTER TABLE `histo_equipo`
  ADD PRIMARY KEY (`id_histo`),
  ADD KEY `id_equipo` (`id_equipo`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_prioridad` (`id_prioridad`),
  ADD KEY `id_estado_ticket` (`id_estado_ticket`),
  ADD KEY `id_rol` (`id_area`),
  ADD KEY `id_dependencia` (`id_dependencia`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tp_equipo`
--
ALTER TABLE `tp_equipo`
  ADD PRIMARY KEY (`id_tipo`),
  ADD KEY `id_area` (`id_area`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_area`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `dependencia`
--
ALTER TABLE `dependencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `det_ticket`
--
ALTER TABLE `det_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `estado_equipo`
--
ALTER TABLE `estado_equipo`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estado_ticket`
--
ALTER TABLE `estado_ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `histo_equipo`
--
ALTER TABLE `histo_equipo`
  MODIFY `id_histo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `prioridad`
--
ALTER TABLE `prioridad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tp_equipo`
--
ALTER TABLE `tp_equipo`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `id_area` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `det_ticket`
--
ALTER TABLE `det_ticket`
  ADD CONSTRAINT `relacion` FOREIGN KEY (`id_ticket`) REFERENCES `ticket` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD CONSTRAINT `equipo_ibfk_2` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencia` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado_equipo` (`id_estado`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_ibfk_5` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_ibfk_6` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_ibfk_7` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `histo_equipo`
--
ALTER TABLE `histo_equipo`
  ADD CONSTRAINT `histo_equipo_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `histo_equipo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_4` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_5` FOREIGN KEY (`id_prioridad`) REFERENCES `prioridad` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_6` FOREIGN KEY (`id_estado_ticket`) REFERENCES `estado_ticket` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_7` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_ibfk_8` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencia` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tp_equipo`
--
ALTER TABLE `tp_equipo`
  ADD CONSTRAINT `relacion_areas` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `id_rol` FOREIGN KEY (`id_area`) REFERENCES `area` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
