-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-12-2020 a las 23:59:49
-- Versión del servidor: 10.4.16-MariaDB
-- Versión de PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto-tis`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(50) NOT NULL,
  `rut_encargado` int(11) NOT NULL,
  `rut_administrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`, `rut_encargado`, `rut_administrador`) VALUES
(34, 'departamento de transporte', 123456789, 999999999),
(37, 'departamento de educacion', 222222222, 999999999);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responde`
--

CREATE TABLE `responde` (
  `rut_usuario` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL,
  `hora` time NOT NULL,
  `fecha` date NOT NULL,
  `respuesta` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `responde`
--

INSERT INTO `responde` (`rut_usuario`, `id_solicitud`, `hora`, `fecha`, `respuesta`) VALUES
(123456789, 156, '11:52:29', '2020-12-03', '        Respuesta'),
(123456789, 157, '02:39:55', '2020-12-17', '        a'),
(123456789, 159, '21:49:48', '2020-12-14', '        Que significa esto? XD Wena mono'),
(123456789, 160, '21:48:44', '2020-12-14', '        Te acabo de probar'),
(123456789, 161, '02:42:07', '2020-12-17', '        asd'),
(123456789, 163, '02:42:41', '2020-12-17', '        TE PRUEBO CUANDO QUIERO'),
(123456789, 170, '02:44:21', '2020-12-17', '        TE PRUEBO CUANDO QUIERO'),
(123456789, 171, '12:24:16', '2020-12-14', '        el tiempo es 21 grados celsius soleado. ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicita`
--

CREATE TABLE `solicita` (
  `id_solicitud` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicita`
--

INSERT INTO `solicita` (`id_solicitud`, `id_departamento`) VALUES
(156, 34),
(157, 34),
(159, 34),
(160, 34),
(161, 34),
(162, 34),
(163, 34),
(167, 34),
(168, 34),
(169, 34),
(170, 34),
(171, 34),
(172, 34),
(173, 34),
(174, 34),
(175, 34),
(176, 34),
(177, 34),
(178, 34),
(179, 34),
(180, 34),
(182, 34),
(183, 34),
(184, 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `solicitud` set('felicitacion','reclamo','sugerencia') NOT NULL,
  `informacion_consulta` varchar(10000) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `nombre_ciudadano` varchar(30) NOT NULL,
  `email_ciudadano` varchar(50) NOT NULL,
  `rut` int(11) NOT NULL,
  `apellido_ciudadano` varchar(30) NOT NULL,
  `estado` set('terminado','en proceso') NOT NULL,
  `codigo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_solicitud`, `solicitud`, `informacion_consulta`, `fecha`, `hora`, `nombre_ciudadano`, `email_ciudadano`, `rut`, `apellido_ciudadano`, `estado`, `codigo`) VALUES
(156, 'reclamo', '¿Qué es Lorem Ipsum? Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.  ¿Por qué lo usamos? Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario d', '2020-12-03', '11:50:45', 'Paz', 'pepito@gmail.com', 19416421, 'Ortega', 'terminado', 'hax2gefsgm'),
(157, 'felicitacion', '¿Qué es Lorem Ipsum? Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.  ¿Por qué lo usamos? Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario d', '2020-12-12', '22:09:41', 'Francisco', 'bombo@fica.com', 19416421, 'Salazar', 'terminado', 'qeqbz7v0jw'),
(159, 'felicitacion', '¿Qué es Lorem Ipsum? Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.  ¿Por qué lo usamos? Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario d', '2020-12-14', '01:32:22', 'Cristofer', 'calarconu@ing.ucsc.cl', 222222222, 'Alarcon', 'terminado', 'zrq9faprr0'),
(160, 'felicitacion', 'Me estan usando como prueba loco', '2020-12-14', '01:33:22', 'Felipe', 'espina_abismal@hotmail.com', 19416421, 'Espinoza', 'terminado', '77765uagxv'),
(161, 'felicitacion', 'queria consultar algo', '2020-12-14', '02:11:29', 'Felipe', 'espina_abismal@hotmail.com', 19416421, 'Espinoza', 'terminado', 'urx2iuzws9'),
(162, 'felicitacion', '¿Qué es Lorem Ipsum? Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.  ¿Por qué lo usamos? Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario d', '2020-12-14', '02:15:50', 'Felipe', 'espina_abismal@hotmail.com', 19416421, 'Espinoza', 'en proceso', 'q5lavlsj1x'),
(163, 'reclamo', 'Me estan usando como prueba loco', '2020-12-14', '02:16:20', 'Cristofer', 'calarconu@ing.ucsc.cl', 99999999, 'Alarcon', 'terminado', 'vnygib8buq'),
(167, 'felicitacion', '¿Qué es Lorem Ipsum? Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.  ¿Por qué lo usamos? Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario d', '2020-12-14', '02:35:27', 'Felipe', 'espina_abismal@hotmail.com', 19416421, 'Espinoza', 'en proceso', 'm6bh31ue8y'),
(168, 'felicitacion', '¿Qué es Lorem Ipsum? Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.  ¿Por qué lo usamos? Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario d', '2020-12-14', '02:36:30', 'Felipe', 'espina_abismal@hotmail.com', 19416421, 'Espinoza', 'en proceso', 'jethd1w9u6'),
(169, 'reclamo', 'Me estan usando como prueba loco', '2020-12-14', '02:36:55', 'Cristofer', 'calarconu@ing.ucsc.cl', 19416421, 'Alarcon', 'en proceso', 'wp816q2fzr'),
(170, 'sugerencia', 'Me estan usando como prueba loco AYUDAAAAA', '2020-12-14', '02:45:33', 'Francisco', 'fsalazarg@ing.ucsc.cl', 19416421, 'Salazar', 'terminado', 'jprynrjkvz'),
(171, 'felicitacion', 'el clima de hoy', '2020-12-14', '12:14:11', 'Francisca', 'santibanezfrancisca1@gmail.com', 20439733, 'Santibanez', 'terminado', '885bhpkylp'),
(172, 'felicitacion', '¿Qué es Lorem Ipsum? Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.  ¿Por qué lo usamos? Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario d', '2020-12-14', '19:36:33', 'Felipe', 'espina_abismal@hotmail.com', 19416421, 'Espinoza', 'en proceso', 'r3bpz04jx1'),
(173, 'felicitacion', '¿Qué es Lorem Ipsum? Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.  ¿Por qué lo usamos? Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario d', '2020-12-14', '19:37:15', 'Felipe', 'espina_abismal@hotmail.com', 19416421, 'Espinoza', 'en proceso', 'n1jt7ututj'),
(174, 'felicitacion', '¿Qué es Lorem Ipsum? Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.  ¿Por qué lo usamos? Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario d', '2020-12-14', '19:39:23', 'Felipe', 'espina_abismal@hotmail.com', 19416421, 'Espinoza', 'en proceso', 'z6moq9j4s0'),
(175, 'felicitacion', '¿Qué es Lorem Ipsum? Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.  ¿Por qué lo usamos? Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario d', '2020-12-14', '19:42:08', 'Felipe', 'espina_abismal@hotmail.com', 19416421, 'Espinoza', 'en proceso', '430sibchn6'),
(176, 'felicitacion', '¿Qué es Lorem Ipsum? Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.  ¿Por qué lo usamos? Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario d', '2020-12-14', '19:44:48', 'Felipe', 'espina_abismal@hotmail.com', 19416421, 'Espinoza', 'en proceso', 'y1jemarker'),
(177, 'felicitacion', '¿Qué es Lorem Ipsum? Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.  ¿Por qué lo usamos? Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario d', '2020-12-14', '19:47:14', 'Felipe', 'espina_abismal@hotmail.com', 19416421, 'Espinoza', 'en proceso', '1fcriq4eoa'),
(178, 'sugerencia', 'Me estan usando como prueba loco AYUDAAAAA', '2020-12-14', '19:51:44', 'Francisca', 'santibanezfrancisca1@gmail.com', 20439733, 'Santibanez', 'en proceso', 'mc9cz2ai7h'),
(179, 'felicitacion', '¿Qué es Lorem Ipsum? Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.  ¿Por qué lo usamos? Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario d', '2020-12-14', '19:55:10', 'Felipe', 'espina_abismal@hotmail.com', 19416421, 'Espinoza', 'en proceso', 'ill33rf1pq'),
(180, 'felicitacion', 'queria consultar algo', '2020-12-14', '20:00:11', 'Francisco', 'espina_abismal@hotmail.com', 19416421, 'Salazar', 'en proceso', '798q6c3v57'),
(181, 'felicitacion', 'Me estan usando como prueba loco', '2020-12-14', '20:01:33', 'Felipe', 'espina_abismal@hotmail.com', 19416421, 'Espinoza', 'en proceso', 's5oj0swqcf'),
(182, 'felicitacion', 'queria consultar algo', '2020-12-17', '12:06:49', 'Paz', 'espina_abismal@hotmail.com', 19416421, 'Ortega', 'en proceso', '2j9dlvlr9o'),
(183, 'reclamo', '¿Qué es Lorem Ipsum? Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas \"Letraset\", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.  ¿Por qué lo usamos? Es un hecho establecido hace demasiado tiempo que un lector se distraerá con el contenido del texto de un sitio mientras que mira su diseño. El punto de usar Lorem Ipsum es que tiene una distribución más o menos normal de las letras, al contrario d', '2020-12-17', '12:41:18', 'Paz', 'calarconu@ing.ucsc.cl', 19416421, 'Ortega', 'en proceso', 'nin10skro9'),
(184, 'felicitacion', '        aaa                ', '2020-12-21', '23:24:04', 'Paz', 'asd@gmail.com', 19416421, 'Ortega', 'en proceso', 'agfbc8061a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `rut_usuario` int(11) NOT NULL,
  `contrasena_usuario` longtext NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `apellido_usuario` varchar(30) NOT NULL,
  `tipo_usuario` set('encargado','administrador') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`rut_usuario`, `contrasena_usuario`, `nombre_usuario`, `apellido_usuario`, `tipo_usuario`) VALUES
(123456789, 'ea507189e74fc492367d01ce077e01fc', 'Paz', 'Ortega', 'encargado'),
(222222222, 'ea507189e74fc492367d01ce077e01fc', 'Liquid', 'Snake', 'encargado'),
(999999999, 'ea507189e74fc492367d01ce077e01fc', 'Solid', 'Snake', 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`),
  ADD KEY `id_encargado` (`rut_encargado`),
  ADD KEY `departamento_administrado` (`rut_administrador`);

--
-- Indices de la tabla `responde`
--
ALTER TABLE `responde`
  ADD PRIMARY KEY (`rut_usuario`,`id_solicitud`),
  ADD KEY `id-solicitud` (`id_solicitud`);

--
-- Indices de la tabla `solicita`
--
ALTER TABLE `solicita`
  ADD PRIMARY KEY (`id_solicitud`,`id_departamento`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id_solicitud`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`rut_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=185;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD CONSTRAINT `departamento_administrado` FOREIGN KEY (`rut_administrador`) REFERENCES `usuario` (`rut_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `departamento_encargado` FOREIGN KEY (`rut_encargado`) REFERENCES `usuario` (`rut_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `responde`
--
ALTER TABLE `responde`
  ADD CONSTRAINT `responde_ciudadano` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicita`
--
ALTER TABLE `solicita`
  ADD CONSTRAINT `solicida_solicitud` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`id_solicitud`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `solicita_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
