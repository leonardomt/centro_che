-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-06-2021 a las 02:30:42
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sitio_che`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

DROP TABLE IF EXISTS `archivo`;
CREATE TABLE IF NOT EXISTS `archivo` (
  `id_archivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `titulo_archivo` varchar(124) COLLATE utf8_bin NOT NULL,
  `tipo_archivo` int(11) NOT NULL,
  `autor_archivo` varchar(64) COLLATE utf8_bin NOT NULL,
  `fuente` mediumtext COLLATE utf8_bin NOT NULL,
  `etiqueta` mediumtext COLLATE utf8_bin,
  `descripcion_archivo` text COLLATE utf8_bin NOT NULL,
  `url_archivo` varchar(256) COLLATE utf8_bin NOT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_archivo`),
  UNIQUE KEY `id_archivo` (`id_archivo`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`id_archivo`, `revisado`, `titulo_archivo`, `tipo_archivo`, `autor_archivo`, `fuente`, `etiqueta`, `descripcion_archivo`, `url_archivo`, `fecha`) VALUES
(57, 1, 'Página del Cuaderno Filosófico', 1, 'Ernesto Guevara', '', 'Che, Escritos, Cuaderno', 'Página del Cuaderno filosófico,que según su propio testimonio comenzó a redactar a los 17 aсos, como un método de estudio reiterado a lo largo de su existencia. En su contenido se aprecia su preferencia por la Filosofía general y el acercamiento a sus primeras lecturas marxistas.', 'uploads/Página del Cuaderno Filosófico.jpg', NULL),
(58, 1, 'Carné de Médico', 1, 'Ministerio de Salud Pública de Argentina', '', 'Che, Carné, Médico', 'Carné de Médico emitido por el Ministerio de Salud Pública de Argentina, con fecha 24 de junio \r\nde 1953, con la firma del Sub-Director General de Asuntos Profesionales.', 'uploads/Carné de Médico.jpg', '1953-06-24'),
(59, 0, 'Páginas del Diario de un combatiente ', 1, 'Ernesto Guevara', '', 'Che, Escritos, Diario, Diario de un combatiente', 'Páginas de los cuadernos empleados por el Che en la redacción de Diario de un combatiente, nombre dado por el Che a sus apuntes de la guerra. ', 'uploads/Páginas del Diario de un combatiente .jpg', NULL),
(60, 0, 'Ciudadano Cubano', 1, 'Subsecretario de Estado de la República de Cuba', 'Gaceta Oficial de Cuba', 'Che, Identificaión, Ciudadano, Nacionalidad', 'Documento emitido por la Gaceta Oficial de Cuba declarando al Comandante del Ejército Rebelde, Dr. Ernesto Che Guevara, ciudadano cubano. ', 'uploads/Ciudadano Cubano.jpg', '1959-11-26'),
(61, 0, 'Páginas del Diario de Bolivia', 1, 'Ernesto Guevara', 'Diario de Bolivia', 'Che, Escritos, Diario, Diario de Bolivia', 'Facsimilar del original del Diario de Bolivia,donde se reproduce la primera página iniciada el 7 de noviembre de 1966.', 'uploads/Páginas del Diario de Bolivia.jpg', '1966-11-07'),
(62, 0, 'Che Cámara', 1, '', '', 'Che, Foto Che, Fotógrafo, Che Fotógrafo', 'Che tomando fotografía.', 'uploads/Che Cámara.jpg', NULL),
(63, 1, 'Imagen de Portada Provisional', 1, 'Provisional', '', 'Provisional', 'Imagen patra Portada Provisional', 'uploads/Imagen de Portada Provisional.jpg', NULL),
(64, 1, 'Guerra de Guerrillas: Un Método', 1, 'Ernesto Guevara', 'Cuba Socialista', 'Che, Artículo', 'Artículo Publicado', 'uploads/Guerra de Guerrillas Un Método.jpg', '1963-06-04'),
(65, 0, 'Postal desde Hiroshima 1', 1, 'Ernesto Guevara', '', 'Che, Postal, Viajes', 'Postal desde Hiroshima', 'uploads/Postal desde Hiroshima 1.jpg', '2021-06-12'),
(66, 0, 'Postal desde Hiroshima 2', 1, 'Ernesto Guevara', '', 'Che, Postal, Viajes', 'Postal', 'uploads/Postal desde Hiroshima 2.jpg', '1959-06-25'),
(67, 0, 'Diplomáticos', 1, '', '', 'Che, Relaciones Internacionales', 'URSS, 1959', 'uploads/Diplomáticos.jpg', NULL),
(68, 0, 'Taller de Ajedrez 1', 1, '', '', 'Talle, Proyectos Comunitarios, Ajedrez', 'Taller de Ajedrez', 'uploads/Taller de Ajedrez 1.jpg', NULL),
(69, 0, 'Taller de Ajedrez 2', 1, 'Provisional', '', 'Taller, Proyectos Comunitarios, Ajedrez', 'Taller de Ajedrez', 'uploads/Taller de Ajedrez 2.jpg', NULL),
(71, 1, 'Taller de Ajedrez 4', 1, 'Provisional', '', 'Taller, Proyectos Comunitarios, Ajedrez', 'Taller de Ajedrez', 'uploads/Taller de Ajedrez 3.jpg', NULL),
(72, 1, 'Taller de Fotografía 1', 1, 'Provisional', '', 'Taller, Proyectos Comunitarios, Fotografía', 'Taller de Fotografía', 'uploads/Taller de Fotografía 1.jpg', NULL),
(73, 0, 'Taller de Fotografía', 1, 'Provisional', '', 'Taller, Proyectos Comunitarios, Fotografía', 'Taller de Fotografía', 'uploads/Taller de Fotografía.jpg', NULL),
(74, 1, 'Imagen de Galería', 1, 'Provisional', 'Provisional', 'Galería, Exposición', 'Galería', 'uploads/Imagen de Galería.jpg', '2018-09-20'),
(75, 1, 'La Piedra', 1, 'Ernesto Guevara', 'Archivo', 'Escrito, La Piedra', 'Relato', 'uploads/La Piedra.jpg', '1965-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

DROP TABLE IF EXISTS `articulo`;
CREATE TABLE IF NOT EXISTS `articulo` (
  `id_articulo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_bin NOT NULL,
  `autor` varchar(200) COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL,
  `resumen` mediumtext COLLATE utf8_bin NOT NULL,
  `palabras_clave` mediumtext COLLATE utf8_bin NOT NULL,
  `id_investigacion` int(11) DEFAULT NULL,
  `abstract` mediumtext COLLATE utf8_bin,
  `keywords` mediumtext COLLATE utf8_bin,
  `cuerpo` mediumtext COLLATE utf8_bin,
  PRIMARY KEY (`id_articulo`),
  UNIQUE KEY `id_articulo` (`id_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `revisado`, `publico`, `titulo`, `autor`, `fecha`, `resumen`, `palabras_clave`, `id_investigacion`, `abstract`, `keywords`, `cuerpo`) VALUES
(8, 1, 1, 'Artículo 1', 'John Doe', '2020-12-01', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '', 3, NULL, NULL, NULL),
(9, 1, 0, 'Artículo 2', 'Jane Doe', '2020-12-02', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '', 2, NULL, NULL, NULL),
(10, 1, 1, 'Artículo 3', 'Jane Doe', '2020-12-03', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '', 3, NULL, NULL, NULL),
(17, 1, 1, 'Articulo 4', 'Pedro', '2020-12-22', 'Esta es la descripcion', '', 2, NULL, NULL, NULL),
(18, 1, 1, 'Testimonio', 'Juan', '2021-01-29', 'Testimonio', '', 8, NULL, NULL, NULL),
(19, 0, 0, 'Articulo 4', 'Juan', '2021-03-17', 'sdgfs', 'sdfdg', 2, NULL, NULL, NULL),
(20, 0, 0, 'Articulo 5', 'Juan', '2021-03-17', 'sdgfs', 'sdfdg', 2, NULL, NULL, NULL),
(21, 0, 0, 'dwaerstrdtyfuygih', 'sdfyug', '2021-05-26', 'aesdfg', 'aestdrytfyghj', NULL, 'esdtfghk', 'afsdtfgkhj', 'waestrdtyfygh'),
(22, 0, 0, 'rtyuitr', 'asertyuiop', '2021-05-05', 'kjl;hjlkghjkghjfghdgf', 'glfkgjxghdfgdfsd', 5, 'gfdfutdyr', 'ryuygyijhrdg', 'ertyuty'),
(23, 0, 0, 'OIUYHTGRFED', 'ASDFGH', '2021-05-18', 'LKJHGFDSSDFGHJ', 'HGFDFGHJHGFDSDFGHGFD', NULL, 'JHGFDFGHJHGF', 'JHGFGHHGFGH', 'MNBVCVBNNBVCVBNBV');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_archivo`
--

DROP TABLE IF EXISTS `articulo_archivo`;
CREATE TABLE IF NOT EXISTS `articulo_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_articulo` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` mediumtext COLLATE utf8_bin,
  `portada` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_articulo_archivo` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=REDUNDANT;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_comentario`
--

DROP TABLE IF EXISTS `articulo_comentario`;
CREATE TABLE IF NOT EXISTS `articulo_comentario` (
  `id_articulo_comentario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `autor` varchar(64) COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL,
  `comentario` mediumtext COLLATE utf8_bin NOT NULL,
  `id_articulo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_articulo_comentario`),
  UNIQUE KEY `id_articulo_comentario` (`id_articulo_comentario`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `articulo_comentario`
--

INSERT INTO `articulo_comentario` (`id_articulo_comentario`, `revisado`, `publico`, `autor`, `fecha`, `comentario`, `id_articulo`) VALUES
(2, 1, 1, 'Pedro', '2020-12-17', 'Este es mi primer comentario', 8),
(5, 1, 1, 'Juana', '2020-12-29', 'Like', 8),
(6, 0, 0, 'Alberto', '2121-01-07', 'El Artículo ino es bueno', 8),
(7, 0, 0, 'Juan', '2121-02-08', 'este', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrador', '11', NULL),
('administrador', '4', NULL),
('administrador', '8', NULL),
('coordinador-cientifico', '7', NULL),
('gestionar-revista', '6', NULL),
('publicador', '10', NULL),
('revisar', '7', NULL),
('superadministrador', '4', NULL),
('superadministrador', '5', NULL),
('superadministrador', '6', NULL),
('superadministrador', '9', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `type` int(11) NOT NULL,
  `description` text CHARACTER SET utf8,
  `rule_name` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `data` text CHARACTER SET utf8,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('administrador', 1, 'El Administrador puede gestionar las cuentas de usuario y la seguridad del sitio web', NULL, NULL, NULL, NULL),
('coordinador-cientifico', 1, 'Usuario encargado de gestionar el contenido de la seccion vida y obra (Hecho, Etapa, Mapa, Correspondencia, Investigacion, Linea de Investigacion, Noticia)', NULL, NULL, NULL, NULL),
('coordinador-proyecto-alternativo', 1, 'Encargado de gestionar todo el contenido referente a los proyectos alternativos (exposicion, cursos online)', NULL, NULL, NULL, NULL),
('coordinador-taller', 1, 'Permite al usuario gestionar los talleres', NULL, NULL, NULL, NULL),
('especialista', 1, 'Encargado de gestionar y revisar toda la información referente tanto al centro de estudios como a la vida y obra del Che.', NULL, NULL, NULL, NULL),
('especialista-articulo', 1, 'Permite al usuario gestionar los articulos', NULL, NULL, NULL, NULL),
('gestionar-actualidad', 2, 'Permite gestionar artículos de actualidad', NULL, NULL, NULL, NULL),
('gestionar-archivo', 2, 'Permite al usuario gestionar los archivos', NULL, NULL, NULL, NULL),
('gestionar-articulo', 2, 'Permite al usuario gestionar articulos', NULL, NULL, NULL, NULL),
('gestionar-articulo-noticia', 2, 'Permite gestionar artículos que sean noticias', NULL, NULL, NULL, NULL),
('gestionar-coleccion-documental', 2, 'Permite al usuario gestionar colecciones documentales', NULL, NULL, NULL, NULL),
('gestionar-comentario', 2, 'Permite al usuario gestionar los comentarios', NULL, NULL, NULL, NULL),
('gestionar-correspondencia', 2, 'Permite al usuario gestionar las correspondencias', NULL, NULL, NULL, NULL),
('gestionar-curso-online', 2, 'Permite al usuario gestionar los cursos online', NULL, NULL, NULL, NULL),
('gestionar-discurso', 2, 'Permite gestionar discurso', NULL, NULL, NULL, NULL),
('gestionar-entrevista', 2, 'Permite gestionar entrevistas', NULL, NULL, NULL, NULL),
('gestionar-escrito', 2, 'Permite gestionar escritos', NULL, NULL, NULL, NULL),
('gestionar-exposicion', 2, 'Permite al usuario gestionar las exposiciones', NULL, NULL, NULL, NULL),
('gestionar-galeriavo', 2, NULL, NULL, NULL, NULL, NULL),
('gestionar-hecho', 2, 'Permite al usuario gestionar los hechos', NULL, NULL, NULL, NULL),
('gestionar-homenaje', 2, 'Permite al usuario gestionar los homenajes', NULL, NULL, NULL, NULL),
('gestionar-investigacion', 2, 'Permite al usuario gestionar las investigaciones', NULL, NULL, NULL, NULL),
('gestionar-linea-investigacion', 2, 'Permite al usuario gestionar las lineas de investigacion', NULL, NULL, NULL, NULL),
('gestionar-noticia', 2, 'Permite al usuario gestionar las noticias', NULL, NULL, NULL, NULL),
('gestionar-producto-audiovisual', 2, 'Permite al usuario gestionar los productos audiovisuales', NULL, NULL, NULL, NULL),
('gestionar-proyecto', 2, 'Permite al usuario gestionar los proyectos', NULL, NULL, NULL, NULL),
('gestionar-revista', 2, 'Permite al usuario gestionar las revistas', NULL, NULL, NULL, NULL),
('gestionar-taller', 2, 'Permite al usuario gestionar los talleres', NULL, NULL, NULL, NULL),
('gestionar-testimoio', 2, NULL, NULL, NULL, NULL, NULL),
('gestionar-testimonio', 2, 'Permite gestionar testimonios', NULL, NULL, NULL, NULL),
('gestionar-tipo-articulo', 2, 'Permite al usuario gestionar los tipos de articulos', NULL, NULL, NULL, NULL),
('gestionar-tipo-homenaje', 2, 'Permite al usuario gestionar los tipos de homenajes', NULL, NULL, NULL, NULL),
('gestionar-usuarios', 2, 'Permite al usuario gestionar las cuentas de usuario', NULL, NULL, NULL, NULL),
('publicador', 1, 'Encargado de publicar la información para que esta sea visible a todos los visitantes', NULL, NULL, NULL, NULL),
('publicar', 2, 'Publicar Informacion', NULL, NULL, NULL, NULL),
('responsable-editorial', 1, 'Permite al usuario gestionar la revista', NULL, NULL, NULL, NULL),
('revisar', 2, 'Permite al usuario aprobar o no el contenido', NULL, NULL, NULL, NULL),
('superadministrador', 1, 'El superadministrador puede gestionar todo el sitio web. Está concebido para facilitar el trabajo de desarrollo pero si el cliente lo desea se puede mantener este tipo de perfil.', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8 NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('superadministrador', 'administrador'),
('superadministrador', 'coordinador-cientifico'),
('superadministrador', 'coordinador-proyecto-alternativo'),
('superadministrador', 'coordinador-taller'),
('superadministrador', 'especialista'),
('superadministrador', 'gestionar-actualidad'),
('administrador', 'gestionar-archivo'),
('especialista', 'gestionar-archivo'),
('publicador', 'gestionar-archivo'),
('especialista', 'gestionar-articulo'),
('especialista-articulo', 'gestionar-articulo'),
('publicador', 'gestionar-articulo'),
('superadministrador', 'gestionar-articulo'),
('superadministrador', 'gestionar-articulo-noticia'),
('especialista', 'gestionar-coleccion-documental'),
('publicador', 'gestionar-coleccion-documental'),
('superadministrador', 'gestionar-coleccion-documental'),
('publicador', 'gestionar-comentario'),
('superadministrador', 'gestionar-comentario'),
('coordinador-cientifico', 'gestionar-correspondencia'),
('especialista', 'gestionar-correspondencia'),
('publicador', 'gestionar-correspondencia'),
('superadministrador', 'gestionar-correspondencia'),
('coordinador-proyecto-alternativo', 'gestionar-curso-online'),
('especialista', 'gestionar-curso-online'),
('publicador', 'gestionar-curso-online'),
('superadministrador', 'gestionar-curso-online'),
('superadministrador', 'gestionar-discurso'),
('superadministrador', 'gestionar-entrevista'),
('superadministrador', 'gestionar-escrito'),
('coordinador-proyecto-alternativo', 'gestionar-exposicion'),
('especialista', 'gestionar-exposicion'),
('publicador', 'gestionar-exposicion'),
('superadministrador', 'gestionar-exposicion'),
('coordinador-cientifico', 'gestionar-galeriavo'),
('coordinador-cientifico', 'gestionar-hecho'),
('especialista', 'gestionar-hecho'),
('publicador', 'gestionar-hecho'),
('superadministrador', 'gestionar-hecho'),
('coordinador-proyecto-alternativo', 'gestionar-homenaje'),
('especialista', 'gestionar-homenaje'),
('publicador', 'gestionar-homenaje'),
('superadministrador', 'gestionar-homenaje'),
('coordinador-cientifico', 'gestionar-investigacion'),
('especialista', 'gestionar-investigacion'),
('publicador', 'gestionar-investigacion'),
('superadministrador', 'gestionar-investigacion'),
('coordinador-cientifico', 'gestionar-linea-investigacion'),
('especialista', 'gestionar-linea-investigacion'),
('publicador', 'gestionar-linea-investigacion'),
('superadministrador', 'gestionar-linea-investigacion'),
('coordinador-cientifico', 'gestionar-noticia'),
('especialista', 'gestionar-noticia'),
('publicador', 'gestionar-noticia'),
('superadministrador', 'gestionar-noticia'),
('especialista', 'gestionar-producto-audiovisual'),
('publicador', 'gestionar-producto-audiovisual'),
('superadministrador', 'gestionar-proyecto'),
('especialista', 'gestionar-revista'),
('publicador', 'gestionar-revista'),
('responsable-editorial', 'gestionar-revista'),
('superadministrador', 'gestionar-revista'),
('coordinador-taller', 'gestionar-taller'),
('especialista', 'gestionar-taller'),
('publicador', 'gestionar-taller'),
('coordinador-cientifico', 'gestionar-testimoio'),
('superadministrador', 'gestionar-testimonio'),
('especialista', 'gestionar-tipo-articulo'),
('publicador', 'gestionar-tipo-articulo'),
('coordinador-proyecto-alternativo', 'gestionar-tipo-homenaje'),
('especialista', 'gestionar-tipo-homenaje'),
('publicador', 'gestionar-tipo-homenaje'),
('administrador', 'gestionar-usuarios'),
('superadministrador', 'publicador'),
('publicador', 'publicar'),
('superadministrador', 'publicar'),
('especialista', 'revisar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `data` text CHARACTER SET utf8,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel`
--

DROP TABLE IF EXISTS `carrusel`;
CREATE TABLE IF NOT EXISTS `carrusel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text CHARACTER SET utf8mb4 NOT NULL,
  `extra` text CHARACTER SET utf8mb4,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `carrusel`
--

INSERT INTO `carrusel` (`id`, `url`, `extra`) VALUES
(2, 'carrusel/.png', NULL),
(5, 'carrusel/88059.png', NULL),
(6, 'carrusel/38258.png', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coleccion_documental`
--

DROP TABLE IF EXISTS `coleccion_documental`;
CREATE TABLE IF NOT EXISTS `coleccion_documental` (
  `id_coleccion_documental` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `etiquetas` text CHARACTER SET latin1 NOT NULL,
  `tipologia` text CHARACTER SET latin1,
  `fecha` date DEFAULT NULL,
  `autor` text CHARACTER SET latin1,
  PRIMARY KEY (`id_coleccion_documental`),
  UNIQUE KEY `id_coleccion_documental` (`id_coleccion_documental`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `coleccion_documental`
--

INSERT INTO `coleccion_documental` (`id_coleccion_documental`, `revisado`, `publico`, `titulo`, `descripcion`, `etiquetas`, `tipologia`, `fecha`, `autor`) VALUES
(5, 1, 1, 'Carné de Médico', 'Carné de Médico emitido por el Ministerio de Salud Pública de Argentina, con fecha 24 de junio de 1953, con la firma del Sub-Director General de Asuntos Profesionales.', 'Che, Carné, Médico', 'Documentos Testimoniales o Probatorios', '1953-06-24', 'Ministerio de Salud Pública de Argentina'),
(6, 1, 1, 'Ciudadano Cubano', 'Documento emitido por la Gaceta Oficial de Cuba declarando al Comandante del Ejército Rebelde, Dr. Ernesto Che Guevara, ciudadano cubano.', 'Che, Identificaión, Ciudadano, Nacionalidad, Cuba', 'Documentos Testimoniales o Probatorios', '1959-11-26', 'Subsecretario de Estado de la República de Cuba'),
(7, 1, 1, 'Páginas del Diario de Bolivia', 'Facsimilar del original del Diario de Bolivia,donde se reproduce la primera página iniciada el 7 de noviembre de 1966.', 'Che, Escritos, Diario, Diario de Bolivia', 'Testimonial', '1966-11-07', '	Ernesto Guevara');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coleccion_documental_archivo`
--

DROP TABLE IF EXISTS `coleccion_documental_archivo`;
CREATE TABLE IF NOT EXISTS `coleccion_documental_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_coleccion_documental` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `portada` tinyint(4) DEFAULT NULL,
  `nota` text CHARACTER SET latin1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_coleccion_documental_archivo` (`id`),
  KEY `fk_coleccion_documental` (`id_coleccion_documental`),
  KEY `fk_archivo` (`id_archivo`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `coleccion_documental_archivo`
--

INSERT INTO `coleccion_documental_archivo` (`id`, `id_coleccion_documental`, `id_archivo`, `portada`, `nota`) VALUES
(11, 5, 58, 1, ''),
(13, 7, 61, 1, ''),
(12, 6, 60, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coleccion_documental_comentario`
--

DROP TABLE IF EXISTS `coleccion_documental_comentario`;
CREATE TABLE IF NOT EXISTS `coleccion_documental_comentario` (
  `id_coleccion_documental_comentario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `autor` varchar(64) CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text CHARACTER SET latin1 NOT NULL,
  `id_coleccion_documental` int(11) NOT NULL,
  PRIMARY KEY (`id_coleccion_documental_comentario`),
  UNIQUE KEY `id_coleccion_documental_comentario` (`id_coleccion_documental_comentario`),
  KEY `fk_coleccion_documental_comentario` (`id_coleccion_documental`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

DROP TABLE IF EXISTS `contacto`;
CREATE TABLE IF NOT EXISTS `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `direccion` text CHARACTER SET utf8mb4 NOT NULL,
  `telefono1` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `telefono2` varchar(64) CHARACTER SET utf8mb4 DEFAULT NULL,
  `correo` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `direccion`, `telefono1`, `telefono2`, `correo`) VALUES
(1, 'Dirección del centro', '2345676543', '', 'centro@correo.cu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correspondencia`
--

DROP TABLE IF EXISTS `correspondencia`;
CREATE TABLE IF NOT EXISTS `correspondencia` (
  `id_correspondencia` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  `destinatario` text CHARACTER SET latin1 NOT NULL,
  `remitente` text CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_correspondencia`),
  UNIQUE KEY `id_correspondencia` (`id_correspondencia`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `correspondencia`
--

INSERT INTO `correspondencia` (`id_correspondencia`, `revisado`, `publico`, `titulo`, `descripcion`, `cuerpo`, `destinatario`, `remitente`, `fecha`) VALUES
(4, 1, 1, 'Correspondencia 1', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '', 'Jane Doe', 'John Doe', '1969-03-03'),
(5, 1, 1, 'Correspondencia 2', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '', 'John Doe', 'Jane doe', '1950-03-03'),
(6, 1, 1, 'Correspondencia 3', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '', 'Jane Doe', 'John Doe', '1969-03-03'),
(7, 1, 1, 'sgs', 'sdgf', 'dsgsfd', 'asfasf', 'asdfsd', '2021-04-01'),
(9, 1, 1, 'sdfghj', 'sdfghj', 'dfghjk', 'fghjkl', 'sdfghjk', '2021-04-08'),
(10, 0, 0, 'trwert', 'ewrye', 'weryewr', 'wery', 'werwery', '2021-04-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correspondencia_archivo`
--

DROP TABLE IF EXISTS `correspondencia_archivo`;
CREATE TABLE IF NOT EXISTS `correspondencia_archivo` (
  `id_correspondencia_archivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_correspondencia` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 NOT NULL,
  `portada` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_correspondencia_archivo`),
  UNIQUE KEY `id_correspondencia_archivo` (`id_correspondencia_archivo`),
  KEY `fk_correspondencia` (`id_correspondencia`),
  KEY `fk_archivo` (`id_archivo`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_online`
--

DROP TABLE IF EXISTS `curso_online`;
CREATE TABLE IF NOT EXISTS `curso_online` (
  `id_curso` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `contacto` text CHARACTER SET latin1 NOT NULL,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_curso`),
  UNIQUE KEY `id_curso` (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `curso_online`
--

INSERT INTO `curso_online` (`id_curso`, `revisado`, `publico`, `contacto`, `titulo`, `descripcion`, `cuerpo`) VALUES
(4, 1, 1, 'correo@cujae.com', 'Curso 1', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', ''),
(5, 1, 1, 'correo@cujae.com', 'Curso 2', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', ''),
(6, 1, 1, 'correo@cujae.com', 'Curso 3', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_online_archivo`
--

DROP TABLE IF EXISTS `curso_online_archivo`;
CREATE TABLE IF NOT EXISTS `curso_online_archivo` (
  `id_curso_online_archivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_curso_online` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  PRIMARY KEY (`id_curso_online_archivo`),
  UNIQUE KEY `id_curso_online_archivo` (`id_curso_online_archivo`),
  KEY `fk_curso_online` (`id_curso_online`),
  KEY `fk_archivo` (`id_archivo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_online_comentario`
--

DROP TABLE IF EXISTS `curso_online_comentario`;
CREATE TABLE IF NOT EXISTS `curso_online_comentario` (
  `id_curso_online_comentario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `autor` varchar(64) CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text CHARACTER SET latin1 NOT NULL,
  `id_curso_online` int(11) NOT NULL,
  PRIMARY KEY (`id_curso_online_comentario`),
  UNIQUE KEY `id_curso_online_comentario` (`id_curso_online_comentario`),
  KEY `fk_curso_online_comentario` (`id_curso_online`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discurso`
--

DROP TABLE IF EXISTS `discurso`;
CREATE TABLE IF NOT EXISTS `discurso` (
  `id_discurso` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `lugar` text CHARACTER SET latin1 NOT NULL,
  `medio` varchar(1024) CHARACTER SET latin1 NOT NULL,
  `entrevistador` text CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_discurso`),
  UNIQUE KEY `id_discurso` (`id_discurso`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discurso_archivo`
--

DROP TABLE IF EXISTS `discurso_archivo`;
CREATE TABLE IF NOT EXISTS `discurso_archivo` (
  `id_discurso_archivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_discurso` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 NOT NULL,
  `portada` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_discurso_archivo`),
  UNIQUE KEY `id_discurso_archivo` (`id_discurso_archivo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `discurso_archivo`
--

INSERT INTO `discurso_archivo` (`id_discurso_archivo`, `id_discurso`, `id_archivo`, `nota`, `portada`) VALUES
(1, 1, 44, 'sgsdfg', 0),
(2, 1, 49, 'sdgfsd', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escrito`
--

DROP TABLE IF EXISTS `escrito`;
CREATE TABLE IF NOT EXISTS `escrito` (
  `id_escrito` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo` varchar(256) CHARACTER SET latin1 NOT NULL,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `cuerpo` text COLLATE utf8_bin NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_escrito`),
  UNIQUE KEY `id_escrito` (`id_escrito`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `escrito`
--

INSERT INTO `escrito` (`id_escrito`, `tipo`, `titulo`, `descripcion`, `cuerpo`, `revisado`, `publico`) VALUES
(9, 'Artículo', 'Guerra de Guerrillas: Un Método', 'La guerra de guerrillas ha sido utilizada innumeras veces en la historia en condiciones diferentes y persiguiendo distintos fines. Últimamente ha sido usada en diversas guerras populares de liberación donde la vanguardia del pueblo eligió el camino de la lucha armada irregular contra enemigos de mayor potencial bélico. Asia, África y América han sido escenario de estas acciones cuando se trataba de lograr el poder en lucha contra la explotación feudal, neocolonial o colonial. En Europa se la empleo como complemento de los ejércitos regulares propios o aliados', 'La guerra de guerrillas ha sido utilizada innumeras veces en la historia en condiciones diferentes y\r\npersiguiendo distintos fines. Últimamente ha sido usada en diversas guerras populares de liberación\r\ndonde la vanguardia del pueblo eligió el camino de la lucha armada irregular contra enemigos de\r\nmayor potencial bélico. Asia, África y América han sido escenario de estas acciones cuando se\r\ntrataba de lograr el poder en lucha contra la explotación feudal, neocolonial o colonial. En Europa\r\nse la empleo como complemento de los ejércitos regulares propios o aliados.\r\nEn América se ha recurrido a la guerra de guerrillas en diversas oportunidades. Como antecedente\r\nmediato más cercano puede anotarse la experiencia de Cesar Augusto Sandino, luchando contra las\r\nfuerzas expedicionarias yanquis en la Segovia nicaragüense. Y, recientemente, la guerra\r\nrevolucionaria de Cuba. A partir de entonces, en América se han planteado los problemas de la\r\nguerra de guerrillas en las discusiones teóricas de los partidos progresistas del Continente y la\r\nposibilidad y conveniencia de su utilización es materia de polémicas encontradas.\r\nEstas notas trataran de expresar nuestras ideas sobre la guerra de guerrillas y cuál sería su\r\nutilización correcta.\r\nAnte todo hay que precisar que esta modalidad de lucha es un método; un método para lograr un\r\nfin. Ese fin, indispensable, ineludible para todo revolucionario, es la conquista del poder político.\r\nPor tanto, en los análisis de las situaciones especificas de los distintos países de América, debe\r\nemplearse el concepto de guerrilla reducido a la simple categoría de método de lucha para lograr\r\naquel fin casi inmediatamente surge la pregunta: ¿EI método de la guerra de guerrillas es la fórmula\r\núnica para la toma del poder en la América entera; o será, en todo caso, la forma predominante?; o,\r\nsimplemente, ¿será una fórmula más entre todas las usadas para la lucha? y, en último extremo, se\r\npreguntan, ¿será aplicable a otras realidades continentales el ejemplo de Cuba? Por el camino de la\r\npolémica, suele criticarse a aquellos que quieren hacer la guerra de guerrillas, aduciendo que se\r\nolvidan de la lucha de masas, casi como si fueran métodos contrapuestos. Nosotros rechazamos el\r\nconcepto que encierra esa posición; la guerra de guerrillas es una guerra de pueblo, es una lucha de\r\nmasas. Pretender realizar este tipo de guerra sin el apoyo de la población, es el preludio de un\r\ndesastre inevitable.La guerrilla es la vanguardia combativa del pueblo, situada en un lugar determinado de algún\r\nterritorio dado, armada, dispuesta a desarrollar una serie de acciones bélicas tendientes al único fin\r\nestratégico posible: la toma del poder.\r\nEstá apoyada por las masas campesinas y obreras de la zona y de todo el territorio de que se trate.\r\nSin esas premisas no se puede admitir la guerra de guerrillas.\r\n«En nuestra situación americana, consideramos que tres aportaciones fundamentales hizo la\r\nRevolución Cubana a la mecánica de los movimientos revolucionarios en América; Son ellas:\r\nPrimero: las fuerzas populares pueden ganar una guerra contra el ejercito. Segundo: no siempre hay\r\nque esperar a que se den todas las condiciones para la revolución; el foco insurreccional puede\r\ncrearlas. Tercero: en la América subdesarrollada, el terreno de la lucha armada debe ser\r\nfundamentalmente el campo». («La Guerra de Guerrillas»)\r\nTales son las aportaciones para el desarrollo de la lucha revolucionaria en América, y pueden\r\naplicarse a cualquiera de los países de nuestro Continente en los cuales se vaya a desarrollar una\r\nguerra de guerrillas.\r\nLa Segunda Declaración de La Habana señala: «En nuestros países se juntan las circunstancias de\r\nuna industria subdesarrollada con un régimen agrario de carácter feudal.\r\nEs por eso que, con todo lo duras que son las condiciones de vida de los obreros urbanos, la\r\npoblación rural vive aun en las más horribles condiciones de opresión y explotación; pero es\r\ntambién, salvo excepciones, el sector absolutamente mayoritario, en proporciones que a veces\r\nsobrepasan el setenta por ciento de las poblaciones latinoamericanas.\r\n«Descontando los terratenientes, que muchas veces residen en las ciudades, el resto de esa gran\r\nmasa libra su sustento trabajando como peones en las haciendas por salarios misérrimos, o labran la\r\ntierra en condiciones de explotación que nada tienen que envidiar a la Edad Media. Estas\r\ncircunstancias son las que determinan que en América Latina la población pobre del campo\r\nconstituya una tremenda fuerza revolucionaria potencial.\r\n«Los ejércitos, estructurados y equipados para la guerra convencional, que son la fuerza en que se\r\nsustenta el poder de las clases explotadoras, cuando tienen que enfrentarse a la lucha irregular de\r\nlos campesinos en el escenario natural de estos, resultan absolutamente impotentes; pierden diez\r\nhombres por cada combatiente revolucionario que cae, y la desmoralización cunde rápidamente en\r\nellos al tener que enfrentarse a un enemigo invisible e invencible que no les ofrece ocasión de lucirsus tácticas de academia y sus fanfarrias de guerra, de las que tanto alarde hacen para reprimir a los\r\nobreros y a los estudiantes en las ciudades.\r\n«La lucha inicial de reducidos núcleos combatientes se nutre incesantemente de nuevas fueras, el\r\nmovimiento de masas comienza a desatarse, el viejo orden se resquebraja poco a poco en mil\r\npedazos, y es entonces el momento en que la clase obrera y las masas urbanas deciden la batalla.\r\n«¿Qué es lo que desde el comienzo mismo de la lucha de esos primeros núcleos los hace\r\ninvencibles, independientemente del número, el poder y los recursos de sus enemigos? El apoyo del\r\npueblo, y con ese apoyo de las masas contarán en grado cada vez mayor.\r\n«Pero el campesino es una clase que, por el estado de incultura en que lo mantienen y el\r\naislamiento en que vive, necesita la dirección revolucionaria y política de la clase obrera y los\r\nintelectuales revolucionarios, sin la cual no podría por sí sola lanzarse a la lucha y conquistar la\r\nvictoria.\r\n«En las actuales condiciones históricas de América Latina, la burguesía nacional no puede\r\nencabezar la lucha antifeudal y antimperialista. La experiencia demuestra que en nuestras naciones\r\nesa clase, aun cuando sus intereses son contradictorios con los del imperialismo yanqui, ha sido\r\nincapaz de enfrentarse a este, paralizada por el miedo a la revolución social y asustada por el\r\nclamor de las masas explotadas» (Segunda Declaración de La Habana)\r\nCompletando el alcance de estas afirmaciones que constituyen el nudo de la declaración\r\nrevolucionaria de América, la Segunda Declaración de La Habana expresa en otros párrafos lo\r\nsiguiente: «Las condiciones subjetivas de cada país, es decir, el factor conciencia, organización,\r\ndirección, puede acelerar o retrasar la revolución, según su mayor menor grado de desarrollo; pero\r\ntarde o temprano en cada época histórica, cuando las condiciones objetivas maduran, la conciencia\r\nse adquiere, la organización se logra, la dirección surge y la revolución se produce, «Que ésta tenga\r\nlugar por cauces pacíficos o nazca al mundo después de un parto doloroso, no depende de los\r\nrevolucionarios; depende de las fuerzas reaccionarias de la vieja sociedad, que se resisten a dejar\r\nnacer la sociedad nueva, que es engendrada por las contradicciones que lleva en su seno la vieja\r\nsociedad. La revolución es en la historia como el médico que asiste al nacimiento de una, nueva\r\nvida. No usa sin necesidad los aparatos de fuerza; pero los usa sin vacilaciones cada vez que sea\r\nnecesario para ayudar al parto. Parto que trae a as masas esclavizadas y explotadas las esperanza de\r\nuna vida mejor.«En muchos países de América Latina la revolución es hoy inevitable. Ese hecho no lo determina la\r\nvoluntad de nadie. Está determinado por las espantosas condiciones de explotación en que vive el\r\nhombre americano, el desarrollo de la conciencia revolucionaria de las masas, la crisis mundial, del\r\nimperialismo y el movimiento universal de lucha de los pueblos subyugados» (Segunda\r\nDeclaración de La Habana)\r\nPartiremos de estas bases para el análisis de toda la cuestión guerrillera en América.\r\nEstablecimos que es un método de lucha para obtener un fin. Lo que interesa, primero, es analizar\r\nel fin y ver si se puede lograr la conquista del poder de otra manera que por la lucha armada, aquí\r\nen América.\r\nLa lucha, pacífica puede llevarse a cabo mediante movimientos de masas y obligar -en situaciones\r\nespeciales de crisis- ceder a los gobiernos, ocupando eventualmente el poder las fuerzas populares\r\nque establecerían la dictadura proletaria. Correcto teóricamente. Al analizar lo anterior en el\r\npanorama de América tenemos que llegar a las siguientes conclusiones: En este Continente existen\r\nen general condiciones objetivas que impulsan a las masas a acciones violentas contra los\r\ngobiernos burgueses y terratenientes, existen crisis de poder en muchos otros países y algunas\r\ncondiciones subjetivas también. Claro está que, en los países en que todas las condiciones estén\r\ndadas, sería hasta criminal no actuar para la toma del poder. En aquellos otros en que esto no ocurre\r\nes lícito que aparezcan distintas alternativas y que de la discusión teórica surja la decisión aplicable\r\na cada país. Lo único que la historia no admite es que los analistas y ejecutores de la política del\r\nproletariado se equivoquen. Nadie puede solicitar el cargo de partido de vanguardia como un\r\ndiploma oficial dado por la Universidad. Ser partido de vanguardia es estar al frente de la clase\r\nobrera en la lucha por la toma del poder, saber guiarla a su captura, conducirla por los atajos,\r\nincluso. Esa es la misión de nuestros partidos revolucionarios y el análisis debe ser profundo y\r\nexhaustivo para que no haya equivocación.\r\nHoy por hoy, se ve en América un estado de equilibrio inestable entre la dictadura oligárquica y la\r\npresión popular. La denominamos con la palabra oligárquica pretendiendo definir la alianza\r\nreaccionaria entre las burguesías de cada país y sus clases de terratenientes, con mayor o menor\r\npreponderancia de las estructuras feudales. Estas dictaduras transcurren dentro de ciertos marcos de\r\nlegalidad que se adjudicaron ellas mismas para su mejor trabajo durante todo el período irrestricto\r\nde dominación de clase, pero pasamos por una etapa en que las presiones populares son muy\r\nfuertes; están llamando a las puertas de la legalidad burguesa y ésta debe ser violada por suspropios autores para detener el impulso de las masas. Sólo que las violaciones descaradas,\r\ncontrarias a toda legislación preestablecida – o legislación establecida a posteriori para santificar el\r\nhecho - ponen en mayor tensión a las fuerzas del pueblo. Por ello, la dictadura oligárquica trata de\r\nutilizar los viejos ordenamientos legales para cambiar la constitucionalidad y ahogar más al\r\nproletariado, sin que el choque sea frontal. No obstante, aquí es donde se produce la contradicción.\r\nEl pueblo ya no soporta las antiguas y, menos aún, las nuevas medidas coercitivas establecidas por\r\nla dictadura, y trata de romperlas. No debemos de olvidar nunca el carácter clasista, autoritario y\r\nrestrictivo del Estado burgués. Lenin se refiere a él así: “El Estado es producto y manifestación del\r\ncarácter irreconciliable de las contradicciones de clase. El Estado surge en el sitio en el momento y\r\nen el grado en que las contradicciones de clase no pueden, objetivamente, conciliarse. Y viceversa:\r\nla existencia del Estado demuestra que las contradicciones de clase son irreconciliables”. (“El\r\nEstado y la Revolución”)\r\nEs decir, no debemos admitir que la palabra democracia, utilizada en forma apologética para\r\nrepresentar la dictadura de las clases explotadoras, pierda su profundidad de concepto y adquiera el\r\nde ciertas libertades más o menos óptimas dadas al ciudadano.\r\nLuchar solamente por conseguir la restauración de cierta legalidad burguesa sin plantearse, en\r\ncambio, el problema del poder revolucionario, es luchar por retornar a cierto orden dictatorial\r\npreestablecido por las clases sociales dominantes; es, en todo caso, luchar por el establecimiento de\r\nunos grilletes que tengan en su punta una bola menos pesada para el presidiario.\r\nEn estas condiciones de conflicto, la oligarquía rompe sus propios contratos, su propia apariencia\r\nde «democracia» y ataca al pueblo, aunque siempre trate de utilizar los métodos de la\r\nsuperestructura, que ha formado para la opresión. Se vuelve a plantearen ese momento el dilema:\r\n¿Qué hacer? Nosotros contestamos: La violencia no es patrimonio de los explotadores, la pueden\r\nusar los explotados y más aun la deben usar en su momento. Martí decía: «Es criminal quien\r\npromueve en un país la guerra que se le puede evitar; y quien deja de promover la guerra\r\ninevitable»\r\nLenin, por otra parte, expresaba: «La social-democracia no ha mirado nunca ni mira la guerra desde\r\nun punto de vista sentimental. Condena en absoluto la guerra como recurso feroz para dilucidar las\r\ndiferencias entre los hombres, pero sabe que las guerras son inevitables mientras la sociedad este\r\ndividida en clases, mientras exista la explotación del hombre por el hombre. Y para acabar con esa\r\nexplotación no podemos prescindir de la guerra que empiezan siempre y en todos los sitios lasmismas clases explotadoras, dominantes y opresoras”. Esto lo decía en el año 1905; después, en «El\r\nprograma militar de la revolución proletaria”, analizando profundamente el carácter de la lucha de\r\nclases, afirmaba: “Quien admita la lucha de clases no puede menos que admitir las guerras civiles,\r\nque en toda sociedad de clase representan la continuación, el desarrollo y el recrudecimiento -\r\nnaturales y en determinadas circunstancias inevitables- de la lucha de clases. Todas las grandes\r\nrevoluciones lo confirman. Negar las guerras civiles u olvidarlas sería caer en un oportunismo\r\nextremo y renegar de la revolución socialista”.\r\nEs decir, no debemos temer a la violencia, la partera las sociedades nuevas; solo que esa violencia\r\ndebe desatarse exactamente en el momento preciso en que los conductores del pueblo hayan\r\nencontrado las circunstancias más favorables.\r\n¿Cuales serán éstas? Dependen, en lo subjetivo de dos factores que se complementan y que a su vez\r\nse van profundizando en el transcurso de la lucha: la conciencia de la necesidad del cambio y la\r\ncerteza de la posibilidad de este cambio revolucionario; los que, unidos a las condiciones objetivas\r\n-que son grandemente favorables en casi toda América para el desarrollo de la lucha-, a la firmeza\r\nen la voluntad de lograrlo y a las nuevas correlaciones de fuerzas en el mundo, condicionan un\r\nmodo de actuar.\r\nPor lejanos que estén los países socialistas, siempre se hará sentir su influencia bienhechora sobre\r\nlos pueblos en lucha, y su ejemplo educador les dará más fuerza. Fidel Castro decía el último 26 de\r\njulio: “Y el deber de los revolucionarios, sobre todo en este instante, es saber percibir, saber captar\r\nlos cambios de correlación de fuerzas que han tenido lugar en el mundo, y comprender que ese\r\ncambio facilita la lucha de los pueblos”. El deber de los revolucionarios, de los revolucionarios\r\nlatinoamericanos, no está en esperar que el cambio de correlación de fuerzas produzca el milagro\r\nde las revoluciones sociales en América Latina, sino aprovechar cabalmente todo lo que favorece al\r\nmovimiento revolucionario ese cambio de correlación de fuerzas ¡y hacer las revoluciones!”\r\nHay quienes dicen «admitamos la guerra revolucionaria como el medio adecuado, en ciertos casos\r\nespecíficos, para llegar a la toma del poder político; ¿de dónde sacamos los grandes conductores,\r\nlos Fidel Castro que nos llevan al triunfo?» Fidel Castro, como todo ser humano, es un producto de\r\nla historia. Los jefes militares y políticos, que dirijan las luchas insurreccionales en América,\r\nunidos, si fuera posible, en una sola persona, aprenderán el arte de la guerra en el ejercicio de la\r\nguerra misma. No hay oficio ni profesión que se pueda aprender solamente en libros de texto. Lalucha, en este caso, es la gran maestra. Claro que no será sencilla la tarea ni exenta de graves\r\namenazas en todo su transcurso.\r\nDurante el desarrollo de la lucha armada aparecen dos momentos de extremo peligro para el futuro\r\nde la revolución.\r\nEl primero de ellos surge en la etapa preparatoria y la forma en que se resuelva da la medida de la\r\ndecisión de lucha y claridad de fines que tengan las fueras populares.\r\nCuando el Estado burgués avanza contra las posiciones del pueblo, evidentemente tiene que\r\nproducirse un proceso de defensa contra el enemigo que, en ese momento de superioridad, ataca. Si\r\nya se han desarrollado las condiciones objetivas y subjetivas mínimas, la defensa debe ser armada,\r\npero de tal tipo que no se conviertan las fuerzas populares en meros receptores de los golpes del\r\nenemigo; no dejar tampoco que el escenario de la defensa armada simplemente se transforme en un\r\nrefugio extremo de los perseguidos.\r\nLa guerrilla, movimiento defensivo del pueblo en un momento dado, lleva en sí, y constantemente\r\ndebe desarrollarla, su capacidad de ataque sobre el enemigo. Esta capacidad es la que va\r\ndeterminando con el tiempo su carácter de catalizador de las fuerzas populares. Vale decir, la\r\nguerrilla no es autodefensa pasiva, es defensa con ataque y, desde el momento en que se plantea\r\ncomo tal, tiene como perspectiva final la conquista del poder político.\r\nEste momento es importante. En los procesos sociales la diferencia entre violencia y no violencia\r\nno puede medirse por las cantidades de tiros intercambiados; responde a situaciones concretas y\r\nfluctuantes y hay que saber ver el instante en que las fuerzas populares, conscientes de su debilidad\r\nrelativa, pero al mismo tiempo de su fuerza estratégica, deben obligar al enemigo a que dé los pasos\r\nnecesarios para que la situación no retroceda. Hay que violentar el equilibrio dictadura oligárquica￾presión popular.\r\nLa dictadura trata constantemente de ejercerse sin el uso aparatoso de la fuerza; el obligar a\r\npresentarse sin disfraz, es decir, en su aspecto verdadero de dictadura violenta de las clases\r\nreaccionarias, contribuirá a su desenmascaramiento, lo que profundizara la lucha hasta extremos\r\ntales que ya no se pueda regresar. De cómo cumplan su función las fuerzas del pueblo abocadas a la\r\ntarea de obligar a definiciones a la dictadura -retroceder o desencadenar la lucha-, depende el\r\ncomienzo firme de una acción armada de largo alcance.\r\nSortear el otro momento peligroso depende del poder del desarrollo ascendente que tengan las\r\nfuerzas populares.Marx recomendaba siempre que, una vez comenzado el proceso revolucionario, el proletariado\r\ntenía que golpear y golpear sin descanso. Revolución que no se profundice constantemente es\r\nrevolución que regresa. Los combatientes, cansados, empiezan a perder la fe y puede fructificar\r\nentonces alguna de las maniobras a que la burguesía nos tiene tan acostumbrados. Estas pueden ser\r\nelecciones con la entrega del poder a otro señor de voz más meliflua y cara más angelical que el\r\ndictador de turno, o un golpe dado por los reaccionarios, encabezados, en general, por el ejército y\r\napoyándose, directa o indirectamente, en las fuerzas progresistas. Caben otras, pero no es nuestra\r\nintención analizar estratagemas tácticas.\r\nLlamamos la atención principalmente sobre la maniobra del golpe militar apuntada arriba. ¿Qué\r\npueden dar los militares a la verdadera democracia? ¿Qué lealtad se les puede pedir si son meros\r\ninstrumentos de dominación de las clases reaccionarias y de los monopolios imperialistas y como\r\ncasta, que vale en razón de las armas que posee, aspiran solamente a mantener sus prerrogativas?\r\nCuando, en situaciones difíciles para los opresores, conspiren los militares y derroquen a un\r\ndictador, de hecho vencido, hay que suponer que lo hacen porque aquel no es capaz de preservar\r\nsus prerrogativas de clase sin violencia extrema, cosa que, en general, no conviene en los actuales\r\nmomentos a los intereses de las oligarquías.\r\nEsta afirmación no significa, de ningún modo, que se deseche la utilización de los militares como\r\nluchadores individuales, separados del medio social en que han actuado y, de hecho, rebelados\r\ncontra él. Y esta utilización debe hacerse en el marco de la dirección revolucionaria a la que\r\npertenecerán como luchadores y no como representantes de una casta.\r\nEn tiempos ya lejanos, en el prefacio de la tercera edición de «La Guerra Civil en Francia», Engels\r\ndecía: “Los obreros, después de cada revolución, estaban armados; por eso el desarme de los\r\nobreros era el primer mandamiento de los burgueses que se hallaban al frente del Estado. De ahí\r\nque, después de cada revolución ganada por los obreros se llevara a cabo una nueva lucha que\r\nacababa con la derrota de estos...” ( cita de Lenin, «El Estado y la Revolución»)\r\nEste juego de luchas continuas en que se logra un cambio formal de cualquier tipo y se retrocede\r\nestratégicamente, se ha repetido durante decenas de años en el mundo capitalista. Pero aun, el\r\nengaño permanente al proletariado en este aspecto lleva más de un siglo de producirse\r\nperiódicamente.\r\nEs peligroso también que, llevados por el deseo de mantener durante algún tiempo condiciones más\r\nfavorables para la acción revolucionaria mediante el uso de ciertos aspectos de la legalidadburguesa, los dirigentes de los partidos progresistas confundan los términos, cosa que es muy\r\ncomún en el curso de la acción, y se olviden del objetivo estratégico definitivo: la toma del poder.\r\nEstos dos momentos difíciles de la revolución, que hemos analizado someramente, se obvian\r\ncuando los partidos dirigentes marxistas-leninistas son capaces de ver claro las implicaciones del\r\nmomento y de movilizar las masas al máximo, llevándolas por el camino justo de la resolución de\r\nlas contradicciones fundamentales.\r\nEn el desarrollo del tema hemos supuesto que eventualmente se aceptara la idea de la lucha armada\r\ny también la fórmula de la guerra de guerrillas como método de combate. ¿Por qué estimamos que,\r\nen las condiciones actuales de América, la guerra de guerrillas es la vía correcta? Hay argumentos\r\nfundamentales que, en nuestro concepto, determinan la necesidad de la acción guerrillera en\r\nAmérica como eje central de la lucha.\r\nPrimero: aceptando como verdad que el enemigo luchará por mantenerse en el poder, hay que\r\npensar en la destrucción del ejercito opresor; para destruirlo hay que oponerle un ejercito popular\r\nenfrente. Ese ejercito no nace espontáneamente, tiene que armarse en el arsenal que brinda su\r\nenemigo, y esto condiciona una lucha dura y muy larga, en la que las fuerzas populares y sus\r\ndirigentes estarían expuestos siempre al ataque de fuerzas superiores sin adecuadas condiciones de\r\ndefensa y maniobrabilidad.\r\nEn cambio, el núcleo guerrillero, asentado en terrenos favorables a la lucha, garantiza la seguridad\r\ny permanencia del mando revolucionario. Las fuerzas urbanas, dirigidas desde el estado mayor del\r\nejercito del pueblo, pueden realizar acciones de incalculable importancia. La eventual destrucción\r\nde estos grupos no haría morir el alma de la revolución, su jefatura, que, desde la fortaleza rural,\r\nseguiría catalizando el espíritu revolucionario de las masas y organizando nuevas fuerzas para otras\r\nbatallas.\r\nAdemás, en esta zona comienza la estructuración del futuro aparato estatal encargado de dirigir\r\neficientemente la dictadura de clase durante todo el periodo de transición.\r\nCuanto más larga sea la lucha, más grandes y complejos serán los problemas administrativos y en\r\nsu solución se entrenaran los cuadros para la difícil tarea de la consolidación del poder y el\r\ndesarrollo económico, en una etapa futura.\r\nSegundo: La situación general del campesinado latinoamericano y el carácter cada vez más\r\nexplosivo de su lucha contra las estructuras feudales, en el marco de una situación social de alianza\r\nentre explotadores locales extranjeros.Volviendo a la Segunda Declaración de La Habana: «Los pueblos de América se liberaron del\r\ncoloniaje español a principios del siglo pasado, pero no se liberaron de la explotación. Los\r\nterratenientes feudales asumieron la autoridad de los gobernantes españoles, los indios continuaron\r\nen penosa servidumbre, el hombre latinoamericano en una u otra forma siguió esclavo y las\r\nmínimas esperanzas de los pueblos sucumben bajo el poder de las oligarquías y la coyunda del\r\ncapital extranjero. Esta ha sido la verdad de América, con uno u otro matiz, con alguna que otra\r\nvariante. Hoy América Latina yace bajo un imperialismo mucho más feroz, mucho más poderoso y\r\nmás despiadado que el imperialismo colonial español.\r\n«Y ante la realidad objetiva e históricamente inexorable de la revolución latinoamericana, ¿cuál es\r\nla actitud del imperialismo yanqui? Disponerse a librar una guerra colonial con los pueblos de\r\nAmérica Latina; crear el aparato de fuerza, los pretextos políticos y los instrumentos pseudolegales\r\nsuscritos con los representantes de las oligarquías reaccionarias para reprimir a sangre y fuego la\r\nlucha de los pueblos latinoamericanos»\r\nEsta situación objetiva nos muestra la fuerza que duerme, desaprovechada, en nuestros campesinos\r\ny la necesidad de utilizarla para la liberación de América.\r\nTercero: El carácter continental de la lucha.\r\n¿Podría concebirse esta nueva etapa de la emancipación de América como el cotejo de dos fuerzas\r\nlocales luchando por el poder en un territorio dado? Difícilmente. La lucha será a muerte entre\r\ntodas las fuerzas populares y todas las fuerzas de represión. Los párrafos arriba citados también lo\r\npredicen.\r\nLos yanquis intervendrán por solidaridad de intereses y porque la lucha en América es decisiva. De\r\nhecho, ya intervienen en la preparación de las fuerzas represivas y la organización de un aparato\r\ncontinental de lucha. Pero, de ahora en adelante, lo harán con todas sus energías; castigaran a las\r\nfuerzas populares con todas las armas de destrucción a su alcance; no dejaran consolidarse al poder\r\nrevolucionario y, si alguno llegara a hacerlo, volverán a atacar, no lo reconocerán, tratarán de\r\ndividir las fuerzas revolucionarias, introducirán saboteadores de todo tipo, crearán problemas\r\nfronterizos, lanzaran a otros Estados reaccionarios en su contra, intentaran ahogar económicamente\r\nal nuevo Estado, aniquilarlo, en una palabra.\r\nDado este panorama americano, se hace difícil que la victoria se logre y consolide en un país\r\naislado. A la unión de las fuerzas represivas debe contestarse con la unión de las fuerzas populares.\r\nEn todos los países en que la opresión llegue a niveles insostenibles, debe alarse la bandera de larebelión, y esta bandera tendrá, por necesidad histórica, caracteres continentales. La Cordillera de\r\nlos Andes esta llamada a ser la Sierra Maestra de América, como dijera Fidel, y todos los inmensos\r\nterritorios que abarca este Continente están llamados a ser escenarios de la lucha a muerte contra el\r\npoder imperialista.\r\nNo podemos decir cuándo alcanzará estas características continentales, ni cuánto tiempo durara la\r\nlucha; pero podemos predecir su advenimiento y su triunfo, porque es resultado de circunstancias\r\nhistóricas, económicas y políticas inevitables y su rumbo no se puede torcer. Iniciarla cuando las\r\ncondiciones estén dadas, independientemente de la situación de otros países, es la tarea de la fuerza\r\nrevolucionaria en cada país. El desarrollo de la lucha irá condicionando la estrategia general; la\r\npredicción sobre el carácter continental es fruto del análisis de las fuerzas de cada contendiente,\r\npero esto no excluye, ni mucho menos, el estallido independiente Así como la iniciación de la lucha\r\nen un punto de un país está destinada a desarrollarla en todo su ámbito, la iniciación de la guerra\r\nrevolucionaria contribuye a desarrollar nuevas condiciones en los países vecinos.\r\nEl desarrollo de las revoluciones se ha producido normalmente por flujos y reflujos inversamente\r\nproporcionales; al flujo revolucionario corresponde el reflujo contrarrevolucionario y, viceversa, en\r\nlos momentos de descenso revolucionario hay un ascenso contrarrevolucionario. En estos instantes,\r\nla situación de las fuerzas populares se torna difícil y deben recurrir a los mejores medios de\r\ndefensa para sufrir los daños menores. El enemigo es extremadamente fuerte, continental. Por ello\r\nno se pueden analizar las debilidades relativas de las burguesías locales con vistas a tomar\r\ndecisiones de ámbitos restringidos. Menos podría pensarse en la eventual alianza de estas\r\noligarquías con el pueblo en armas. La Revolución Cubana ha dado el campanazo de alarma. La\r\ndolarización de fuerzas llegara a ser total: explotadores de un lado y explotados de otro; la masa de\r\nla pequeña burguesía se inclinara a uno u otro bando, de acuerdo con sus intereses y el acierto\r\npolítico conque se la trate; la neutralidad constituirá una excepción. Así Serra la guerra\r\nrevolucionaria.\r\nPensemos como podría comenzar un foco guerrillero.\r\nNúcleos relativamente pequeños de personas eligen lugares, favorables para la guerra de guerrillas,\r\nya sea con la intención de desatar un contraataque o para capear el vendaval, y allí comienzan a\r\nactuar. Hay que establecer bien claro lo siguiente: en el primer momento, la debilidad relativa de la\r\nguerrilla es tal que solamente debe trabajar para fijarse al terreno, para ir conociendo el medio,estableciendo conexiones con la población y reforzando los lugares que eventualmente se\r\nconvertirán en su base de apoyo.\r\nHay tres condiciones de supervivencia de una guerrilla que comience su desarrollo bajo las\r\npremisas expresadas aquí:\r\nMovilidad constante, vigilancia constante, desconfianza constante. Sin el uso adecuado de estos\r\ntres elementos de la táctica militar, la guerrilla difícilmente sobrevivirá.\r\nHay que recordar que la heroicidad del guerrillero, en estos momentos, consiste en la amplitud del\r\nfin planeado y la enorme serie de sacrificios que deberá realizar para cumplimentarlo.\r\nEstos sacrificios no serán el combate diario, la lucha cara a cara con el enemigo; adquirirán formas\r\nmás sutiles y más difíciles de resistir para el cuerpo y la mente del individuo que está en la\r\nguerrilla.\r\nSerán quizás castigados duramente por los ejércitos enemigos; divididos en grupos, a veces;\r\nmartirizados los que cayeren prisioneros; perseguidos como animales acosados en las zonas que\r\nhayan elegido para actuar; con la inquietud, constante de tener enemigos sobre los pasos de la\r\nguerrilla; con la desconfianza constante frente a todo, ya que los campesinos atemorizados los\r\nentregarán, en algunos casos, para quitarse de encima, con la desaparición del pretexto, a las tropas\r\nrepresivas; sin otra alternativa que la muerte o la victoria, en momentos en que la muerte es un\r\nconcepto mil veces presente y la victoria el mito que sólo un revolucionario puede soñar.\r\nEsa es la heroicidad de la guerrilla; por eso se dice que caminar también es una forma de combatir,\r\nque rehuir el combate en un momento dado no es sino una forma de combatir. El planteamiento es,\r\nfrente a la superioridad general del enemigo, encontrar la forma táctica de lograr una superioridad\r\nrelativa en un punto elegido, ya sea poder concentrar más efectivos que este, y a asegurar ventajas\r\nen el aprovechamiento del terreno que vuelque la correlación de fuerzas. En estas condiciones se\r\nasegura la victoria táctica; si no está clara la superioridad relativa, es preferible no actuar. No se\r\ndebe dar combate que no produzca una victoria, mientras se pueda elegir el «cómo» y el «cuándo»\r\nEn el marco de la gran acción político-militar, del cual es un elemento, la guerrilla irá creciendo y\r\nconsolidándose; se irán formando entonces las bases de apoyo, elemento fundamental para que el\r\nejército guerrillero pueda prosperar. Estas bases de apoyo son puntos en los cuales el ejército\r\nenemigo solo puede penetrar a costa de grandes pérdidas, bastiones de la revolución, refugio y\r\nresorte de la guerrilla para incursiones cada vez más lejanas y atrevidas.A este momento se llega si se han superado simultáneamente las dificultades de orden táctico y\r\npolítico. Los guerrilleros no pueden olvidar nunca su función de vanguardia del pueblo, el mandato\r\nque encarnan, y por tanto, deben crear las condiciones políticas necesarias para el establecimiento\r\ndel poder revolucionario basado en el apoyo total de las masas. Las grandes reivindicaciones del\r\ncampesinado deben ser satisfechas en la medida y forma que las circunstancias aconsejen, haciendo\r\nde toda la población un conglomerado compacto y decidido.\r\nSi difícil será la situación militar de los primeros momentos, no menos delicada será la política; y si\r\nun solo error militar puede liquidar la guerrilla, un error político puede frenar su desarrollo durante\r\ngrandes períodos.\r\nPolítico-militar es la lucha, así hay que desarrollarla por lo tanto, entenderla.\r\nLa guerrilla, en su proceso de crecimiento, llega a un instante en que su capacidad de acción cubre\r\nuna determinada región para cuyas medidas sobran hombres y hay demasiada concentración en la\r\nzona. Allí comienza el efecto de colmena, en el cual uno de los jefes, guerrillero distinguido, salta a\r\notra región y va repitiendo la cadena de desarrollo de la guerra de guerrillas, sujeto, eso sí, a un\r\nmando central.\r\nAhora bien, es preciso apuntar que no se puede aspirar a la victoria sin la formación de un ejército\r\npopular. Las fuerzas guerrilleras podrán extenderse hasta determinada magnitud; las fuerzas\r\npopulares, en las ciudades y en otras zonas permeables del enemigo, podrán causarle estragos, pero\r\nel potencial militar de la reacción todavía estaría intacto. Hay que tener siempre presente que el\r\nresultado final debe ser el aniquilamiento del adversario. Para ello, todas estas zonas nuevas que se\r\ncrean, más las zonas de perforación del enemigo detrás de sus líneas, más las fuerzas que operan en\r\nlas ciudades principales, deben tener una relación de dependencia en el mando. No se podrá\r\npretender que exista la cerrada ordenación jerárquica que caracteriza a un ejército, pero sí una\r\nordenación estratégica. Dentro de determinadas condiciones de libertad de acción, las guerrillas\r\ndeben de cumplir todas las ordenes estratégicas del mando central, instalado en alguna de las zonas,\r\nla más segura, la más fuerte, preparando las condiciones para la unión de las fuerzas en un\r\nmomento dado.\r\n¿Habrá otras posibilidades menos cruentas?\r\nLa guerra de guerrillas o guerra de liberación tendrá en general tres momentos: el primero, de la\r\ndefensiva estratégica, donde la pequeña fuerza que, huye muerde al enemigo; no está refugiada\r\npara hacer una defensa pasiva en un círculo pequeño, sino que su defensa consiste en los ataqueslimitados que pueda realizar. Pasado esto, se llega a un punto de equilibrio en que se estabilizan las\r\nposibilidades de acción del enemigo y de la guerrilla y, luego, el momento final de desbordamiento\r\ndel ejercito represivo que llevará a la toma de las grandes ciudades, a los grandes encuentros\r\ndecisivos, al aniquilamiento total del adversario.\r\nDespués de logrado el punto de equilibrio, donde ambas fuerzas se respetan entre sí, al seguir su\r\ndesarrollo, la guerra de guerrillas adquiere características nuevas. Empieza a introducirse el\r\nconcepto de la maniobra; columnas grandes que atacan puntos fuertes; guerra de movimientos con\r\ntraslación de fuerzas y medios de ataque de relativa potencia. Pero, debido a la capacidad de\r\nresistencia y contraataque que todavía conserva el enemigo, esta guerra de maniobra no sustituye\r\ndefinitivamente a las guerrillas; es solamente una forma de actuar de las mismas; una magnitud\r\nsuperior de las fuerzas guerrilleras, hasta que, por fin, cristaliza en un ejército popular con cuerpos\r\nde ejércitos. Aún en este instante, marchando delante de las acciones de las fuerzas principales, irán\r\nlas guerrillas en su estado de «pureza», liquidando las comunicaciones, saboteando todo el aparato\r\ndefensivo del enemigo.\r\nHabíamos predicho que la guerra seria continental. Esto significa también que será prolongada;\r\nhabrá muchos frentes, costara mucha sangre, innumeras vidas durante largo tiempo. Pero, algo más,\r\nlos fenómenos de dolarización de fuerzas que están ocurriendo en América, la clara división entre\r\nexplotadores y explotados que existirá en las guerras revolucionarias futuras, significan que al\r\nproducirse la toma del poder por la vanguardia armada del pueblo, el país, o los países, que lo\r\nconsigan, habrán liquidado simultáneamente, en el opresor, a los imperialistas y a los explotadores\r\nnacionales. Habrá cristalizado la primera etapa de la revolución socialista; estarán listos los pueblos\r\npara restañar sus heridas e iniciar la construcción del socialismo.\r\n¿Habrá otras pasibilidades menos cruentas?\r\nHace tiempo que se realizo el último reparto del mundo en el cual a los Estados Unidos le tocó la\r\nparte del león de nuestro Continente; hoy se están desarrollando nuevamente los imperialistas del\r\nviejo mundo y la pujanza del mercado común europeo atemoriza a los mismos norteamericanos.\r\nTodo esto podría hacer pensar que existiera la posibilidad de asistir como espectadores a la pugna\r\ninterimperialista para luego lograr avances, quizás en alianza con las burguesías nacionales más\r\nfuertes. Sin contar conque la política pasiva nunca trae buenos resultados en la lucha de clases y las\r\nalianzas con la burguesía, por revolucionaria que esta luzca en un momento dado, sólo tienen\r\ncarácter transitorio, hay razones de tiempo que inducen a tomar otro partido. La agudización de lacontradicción fundamental luce ser tan rápida en América que molesta el «normal» desarrollo de\r\nlas contradicciones del campo imperialista en su lucha por los mercados.\r\nLas burguesías nacionales se han unido al imperialismo norteamericano, en su gran mayoría, y\r\ndeben correr la misma suerte que este en cada país. Aún en los casos en que se producen pactos o\r\ncoincidencias de contradicciones entre la burguesía nacional y otros imperialismos con el\r\nnorteamericano, esto sucede en el marco de una lucha fundamental que englobara necesariamente\r\nen el curso de su desarrollo, a todos los explotados y a todos los explotadores. La polarización de\r\nfuerzas antagónicas de adversarios de clases es, hasta ahora, más veloz que el desarrollo de las\r\ncontradicciones entre explotadores por el reparto del botín. Los campos son dos: la alternativa se\r\nvuelve más clara para cada quien individual y para cada capa especial de la población.\r\nLa Alianza para el Progreso es un intento de refrenar lo irrefrenable.\r\nPero si el avance del mercado común europeo o cualquier otro grupo imperialista sobre los\r\nmercados americanos, fuera más veloz que el desarrollo de la contradicción fundamental, sólo\r\nrestaría introducir las fuerzas populares como cuña, en la brecha abierta, conduciendo estas toda la\r\nlucha y utilizando a los nuevos intrusos con clara conciencia de cuáles son sus intenciones finales.\r\nNo se debe entregar ni una posición, ni un arma, ni un secreto al enemigo de clase, so pena de\r\nperderlo todo.\r\nDe hecho, la eclosión de la lucha americana se ha producido. ¿Estará su vórtice en Venezuela\r\nGuatemala, Colombia, Perú, Ecuador? ¿Serán estas escaramuzas actuales solo manifestaciones de\r\nuna inquietud que no ha fructificado? No importa cuál sea el resultado de las luchas de hoy. No\r\nimporta, para el resultado final, que uno u otro movimiento sea transitoriamente derrotado. Lo\r\ndefinitivo es la decisión de lucha que madura día a día; la conciencia de la necesidad del cambio\r\nrevolucionario, la certeza de su posibilidad.\r\nEs una predicción. La hacemos con el convencimiento de que la historia nos dará la razón. El\r\nanálisis de los factores objetivos y subjetivos de América y del mundo imperialista, nos indica la\r\ncerteza de estas aseveraciones basadas en la Segunda Declaración de La Habana.', 1, 1),
(10, 'Correspondencia', 'Postal desde Hiroshima', 'Postal desde Hiroshima', 'Mi querida:\r\nHoy va desde Hiroshima, la de la bomba. En el catafalco que ves hay los nombres de 78 mil personas muertas, se estima el total en 180 mil.\r\nEs bueno visitar esto para luchar con energía por la paz.\r\nUn abrazo,\r\nChe\r\n', 1, 1);
INSERT INTO `escrito` (`id_escrito`, `tipo`, `titulo`, `descripcion`, `cuerpo`, `revisado`, `publico`) VALUES
(11, 'Relato', 'La Piedra', 'Este es un impactante relato testimonial escrito por el Che en el Congo. Ocupa su versión original, de la que fue tomado, diez caras de su libreta de apuntes, y está escrito allí directamente, con pocas correcciones en sus páginas.', 'Me lo dijo como se deben decir estas cosas a un hombre fuerte, a un responsable, y lo agradecí. No me mintió preocupación o dolor y traté de no mostrar ni lo uno ni lo otro. ¡Fue tan simple! \r\n\r\nAdemás había que esperar la confirmación para estar oficialmente triste. Me pregunté si se podía llorar un poquito. No, no debía ser, porque el jefe es impersonal; no es que se le niegue el derecho a sentir, simplemente, no debe mostrar que siente lo de él; lo de sus soldados, tal vez. \r\n\r\n-Fue un amigo de la familia, le telefonearon avisándole que estaba muy grave, pero yo salí ese día. \r\n\r\n-Grave, ¿de muerte? \r\n\r\n-Sí. \r\n\r\n-No dejes de avisarme cualquier cosa. \r\n\r\nEn cuanto lo sepa, pero no hay esperanzas. Creo. \r\n\r\nYa se había ido el mensajero de la muerte y no tenía confirmación. Esperar era todo lo que cabía. Con la noticia oficial decidiría si tenía derecho o no a mostrar mi tristeza. Me inclinaba a creer que no. \r\n\r\nEl sol mañanero golpeaba fuerte después de la lluvia. No había nada extraño en ello; todos los días llovía y después salía el sol y apretaba y expulsaba la humedad. Por la tarde, el arroyo sería otra vez cristalino, aunque ese día no había caído mucha agua en las montañas; estaba casi normal. \r\n\r\n-Decían que el 20 de mayo dejaba de llover y hasta octubre no caía una gota de agua. \r\n\r\n-Decían... pero dicen tantas cosas que no son ciertas. \r\n\r\n-¿La naturaleza se guiará por el calendario? No me importaba si la naturaleza se guiaba o no por el calendario. En general, podía decir que no me importaba nada de nada, ni esa inactividad forzada, ni esta guerra idiota, sin objetivos. Bueno, sin objetivo no; solo que estaba tan vago, tan diluido, que parecía inalcanzable, como un infierno surrealista donde el eterno castigo fuera el tedio. Y, además, me importaba. Claro que me importaba. \r\n\r\nHay que encontrar la manera de romper esto, pensé. Y era fácil pensarlo; uno podía hacer mil planes, a cual más tentador, luego seleccionar los mejores, fundir dos o tres en uno, simplificarlo, verterlo al papel y entregarlo. Allí acababa todo y había que empezar de nuevo. Una burocracia más inteligente que lo normal; en vez de archivar, lo desaparecían. Mis hombres decían que se lo fumaban, todo pedazo de papel puede fumarse, si hay algo dentro. Era una ventaja, lo que no me gustara podía cambiarlo en el próximo plan. Nadie lo notaría. Parecía que eso seguiría hasta el infinito. \r\nTenía deseos de fumar y saqué la pipa. Estaba, como siempre, en mi bolsillo. Yo no perdía mis pipas, como los soldados. Es que era muy importante para mí tenerla. En los caminos del humo se puede remontar cualquier distancia, diría que se pueden creer los propios planes y soñar con la victoria sin que parezca un sueño; solo una realidad vaporosa por la distancia y las brumas que hay siempre en los caminos del humo. Muy buena compañera es la pipa; ¿cómo perder una cosa tan necesaria? Qué brutos.\r\n\r\nNo eran tan brutos; tenían actividad y cansancio de actividad. No hace falta pensar entonces y ¿para qué sirve una pipa sin pensar? Pero se puede soñar. Sí, se puede soñar, pero la pipa es importante cuando se sueña a lo lejos; hacia un futuro cuyo único camino es el humo o un pasado tan lejano que hay necesidad de usar el mismo sendero. Pero los anhelos cercanos se sienten con otra parte del cuerpo, tienen pies vigorosos y vista joven; no necesitan el auxilio del humo. Ellos la perdían porque no les era imprescindible, no se pierden las cosas imprescindibles. \r\n\r\n¿Tendría algo más de ese tipo? El pañuelo de gasa. Eso era distinto; me lo dio ella por si me herían en un brazo, sería un cabestrillo amoroso. La dificultad estaba en usarlo si me partían el carapacho. En realidad había una solución fácil, que me lo pusiera en la cabeza para aguantarme la quijada y me iría con él a la tumba. Leal hasta en la muerte. Si quedaba tendido en un monte o me recogían los otros no habría pañuelito de gasa; me descompondría entre las hierbas o me exhibirían y tal vez saldría en el Life con una mirada agónica y desesperada fija en el instante del supremo miedo. Porque se tiene miedo, a qué negarlo.\r\n\r\nPor el humo, anduve mis viejos caminos y llegué a los rincones íntimos de mis miedos, siempre ligados a la muerte como esa nada turbadora e inexplicable, por más que nosotros, marxistas-leninistas explicamos muy bien la muerte como la nada. Y, ¿qué es esa nada? Nada. Explicación más sencilla y convincente imposible. La nada es nada; cierra tu cerebro, ponle un manto negro, si quieres, con un cielo de estrellas distante, y esa es la nada-nada; equivalente: infinito. \r\n\r\nUno sobrevive en la especie, en la historia, que es una forma mistificada de vida en la especie; en esos actos, en aquellos recuerdos. ¿Nunca has sentido un escalofrío en el espinazo leyendo las cargas al machete de Maceo?: eso es la vida después de la nada. Los hijos; también. No quisiera sobrevivirme en mis hijos: ni me conocen; soy un cuerpo extraño que perturba a veces su tranquilidad, que se interpone entre ellos y la madre. \r\n\r\nMe imaginé a mi hijo grande y ella canosa, diciéndole, en tono de reproche: tu padre no hubiera hecho tal cosa, o tal otra. Sentí dentro de mí, hijo de mi padre yo, una rebeldía tremenda. Yo hijo no sabría si era verdad o no que yo padre no hubiera hecho tal o cual cosa mala, pero me sentiría vejado, traicionado por ese recuerdo de yo padre que me refregaran a cada instante por la cara. Mi hijo debía ser un hombre; nada más, mejor o peor, pero un hombre. Le agradecía a mi padre su cariño dulce y volandero sin ejemplos. ¿Y mi madre? La pobre vieja. Oficialmente no tenía derecho todavía, debía esperar la confirmación. \r\n\r\nAsí andaba, por mis rutas del humo cuando me interrumpió, gozoso de ser útil, un soldado. \r\n\r\n-¿No se le perdió nada? \r\n-Nada -dije, asociándola a la otra de mi ensueño. \r\n\r\n-Piense bien.\r\n\r\nPalpé mis bolsillos; todo en orden. \r\n\r\n-Nada. \r\n\r\n-¿Y esta piedrecita? Yo se la vi en el llavero. \r\n\r\n-Ah, carajo. \r\n\r\nEntonces me golpeó el reproche con fuerza salvaje. No se pierde nada necesario, vitalmente necesario. Y, ¿se vive si no se es necesario? Vegetativamente sí, un ser moral no, creo que no, al menos. \r\n\r\nHasta sentí el chapuzón en el recuerdo y me vi palpando los bolsillos con rigurosa meticulosidad, mientras el arroyo, pardo de tierra montañera, me ocultaba su secreto. La pipa, primero la pipa; allí estaba. Los papeles o el pañuelo hubieran flotado. El vaporizador, presente; las plumas aquí; las libretas en su forro de nylon, sí; la fosforera, presente también, todo en orden. Se disolvió el chapuzón. \r\n\r\nSolo dos recuerdos pequeños llevé a la lucha; el pañuelo de gasa, de mi mujer y el llavero con la piedra, de mi madre, muy barato este, ordinario; la piedra se despegó y la guardé en el bolsillo. \r\n\r\n¿Era clemente o vengativo, o solo impersonal como un jefe, el arroyo? ¿No se llora porque no se debe o porque no se puede? ¿No hay derecho a olvidar, aún en la guerra? ¿Es necesario disfrazar de macho al hielo? \r\n\r\nQué se yo. De veras, no sé. Solo sé que tengo una necesidad física de que aparezca mi madre y yo recline mi cabeza en su regazo magro y ella me diga: \"mi viejo\", con una ternura seca y plena y sentir en el pelo su mano desmañada, acariciándome a saltos, como un muñeco de cuerda, como si la ternura le saliera por los ojos y la voz, porque los conductores rotos no la hacen llegar a las extremidades. Y las manos se estremecen y palpan más que acarician, pero la ternura resbala por fuera y las rodea y uno se siente tan bien, tan pequeñito y tan fuerte. No es necesario pedirle perdón; ella lo comprende todo; uno lo sabe cuando escucha ese \"mi viejo\"... \r\n\r\n-¿Está fuerte? A mí también me hace efecto; ayer casi me caigo cuando me iba a levantar. Es que no lo dejan secar bien parece. \r\n\r\n-Es una mierda, estoy esperando el pedido a ver si traen picadura como la gente. Uno tiene derecho a fumarse aunque sea una pipa, tranquilo y sabroso ¿no?...\r\n', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escrito_archivo`
--

DROP TABLE IF EXISTS `escrito_archivo`;
CREATE TABLE IF NOT EXISTS `escrito_archivo` (
  `id_escrito_archivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_escrito` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 NOT NULL,
  `portada` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_escrito_archivo`),
  UNIQUE KEY `id_escrito_archivo` (`id_escrito_archivo`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `escrito_archivo`
--

INSERT INTO `escrito_archivo` (`id_escrito_archivo`, `id_escrito`, `id_archivo`, `nota`, `portada`) VALUES
(26, 10, 66, '', 0),
(24, 9, 64, '', 1),
(25, 10, 65, '', 0),
(27, 11, 75, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exposicion`
--

DROP TABLE IF EXISTS `exposicion`;
CREATE TABLE IF NOT EXISTS `exposicion` (
  `id_exposicion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  `enlace` varchar(512) CHARACTER SET latin1 NOT NULL,
  `tipo_fecha` smallint(6) NOT NULL,
  `fecha` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `entidad` text CHARACTER SET latin1 NOT NULL,
  `autor` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_exposicion`),
  UNIQUE KEY `id_exposicion` (`id_exposicion`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `exposicion`
--

INSERT INTO `exposicion` (`id_exposicion`, `revisado`, `publico`, `titulo`, `descripcion`, `cuerpo`, `enlace`, `tipo_fecha`, `fecha`, `fecha_fin`, `entidad`, `autor`) VALUES
(4, 1, 1, 'Exposición 1', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '', 'http://localhost/centro_che/backend/web/index', 0, NULL, NULL, '', ''),
(5, 1, 1, 'Exposición 2', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '', 'http://localhost/centro_che/backend/web/index', 0, NULL, NULL, '', ''),
(6, 1, 1, 'Exposición 3', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '', 'http://localhost/centro_che/backend/web/index', 0, NULL, NULL, '', ''),
(7, 0, 1, 'erwe', 'qewe', 'qwerqw', 'erqwe', 2, '2021-05-20', '2021-05-21', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exposicion_archivo`
--

DROP TABLE IF EXISTS `exposicion_archivo`;
CREATE TABLE IF NOT EXISTS `exposicion_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_exposicion` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1,
  `portada` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_exposicion_archivo` (`id`),
  KEY `fk_exposicion` (`id_exposicion`),
  KEY `fk_archivo` (`id_archivo`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `exposicion_archivo`
--

INSERT INTO `exposicion_archivo` (`id`, `id_exposicion`, `id_archivo`, `nota`, `portada`) VALUES
(8, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exposicion_comentario`
--

DROP TABLE IF EXISTS `exposicion_comentario`;
CREATE TABLE IF NOT EXISTS `exposicion_comentario` (
  `id_exposicion_comentario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `autor` varchar(64) CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text CHARACTER SET latin1 NOT NULL,
  `id_exposicion` int(11) NOT NULL,
  PRIMARY KEY (`id_exposicion_comentario`),
  UNIQUE KEY `id_exposicion_comentario` (`id_exposicion_comentario`),
  KEY `fk_exposicion_comentario` (`id_exposicion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_vo`
--

DROP TABLE IF EXISTS `galeria_vo`;
CREATE TABLE IF NOT EXISTS `galeria_vo` (
  `id_galeria_vo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_archivo` int(11) NOT NULL,
  `tipo` varchar(512) CHARACTER SET latin1 NOT NULL,
  `genero` varchar(512) CHARACTER SET latin1 NOT NULL,
  `nota` text CHARACTER SET latin1 NOT NULL,
  `publico` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_galeria_vo`),
  UNIQUE KEY `id_galeria_vo` (`id_galeria_vo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_documental`
--

DROP TABLE IF EXISTS `gestion_documental`;
CREATE TABLE IF NOT EXISTS `gestion_documental` (
  `id_gestion_documental` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id_gestion_documental`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `gestion_documental`
--

INSERT INTO `gestion_documental` (`id_gestion_documental`, `descripcion`) VALUES
(1, 'Nueva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_documental_archivo`
--

DROP TABLE IF EXISTS `gestion_documental_archivo`;
CREATE TABLE IF NOT EXISTS `gestion_documental_archivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `gestion_documental_archivo`
--

INSERT INTO `gestion_documental_archivo` (`id`, `url`) VALUES
(4, 'coleccion_carrusel/13849.jpg'),
(5, 'coleccion_carrusel/123.jpg\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hecho`
--

DROP TABLE IF EXISTS `hecho`;
CREATE TABLE IF NOT EXISTS `hecho` (
  `id_hecho` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_hecho`),
  UNIQUE KEY `id_hecho` (`id_hecho`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `hecho`
--

INSERT INTO `hecho` (`id_hecho`, `revisado`, `publico`, `titulo`, `descripcion`, `cuerpo`, `fecha`) VALUES
(4, 1, 1, 'Hecho 1', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '', '1951-04-05'),
(5, 1, 1, 'Hecho 2', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '', '1951-04-06'),
(6, 1, 1, 'Hecho 3', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '', '1951-04-07'),
(8, 1, 0, 'Check', 'sadgfsdf', 'dsfhdfghdf', '2021-04-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hecho_archivo`
--

DROP TABLE IF EXISTS `hecho_archivo`;
CREATE TABLE IF NOT EXISTS `hecho_archivo` (
  `id_hecho_archivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_hecho` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 NOT NULL,
  `portada` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_hecho_archivo`),
  UNIQUE KEY `id_hecho_archivo` (`id_hecho_archivo`),
  KEY `fk_hecho` (`id_hecho`),
  KEY `fk_archivo` (`id_archivo`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `homenaje`
--

DROP TABLE IF EXISTS `homenaje`;
CREATE TABLE IF NOT EXISTS `homenaje` (
  `id_homenaje` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  `id_tipo_homenaje` int(11) NOT NULL,
  PRIMARY KEY (`id_homenaje`),
  UNIQUE KEY `id_homenaje` (`id_homenaje`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `homenaje`
--

INSERT INTO `homenaje` (`id_homenaje`, `revisado`, `publico`, `titulo`, `descripcion`, `cuerpo`, `id_tipo_homenaje`) VALUES
(4, 1, 1, 'Homenaje', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '', 1),
(5, 1, 1, 'Homenaje 2', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '', 1),
(6, 1, 1, 'Homenaje 3', 'Build responsive, mobile-first projects on the web with the world’s most popular front-end component library.\r\n\r\nBootstrap is an open source toolkit for developing with HTML, CSS, and JS. Quickly prototype your ideas or build your entire app with our Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful plugins built on jQuery.', '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `homenaje_archivo`
--

DROP TABLE IF EXISTS `homenaje_archivo`;
CREATE TABLE IF NOT EXISTS `homenaje_archivo` (
  `id_homenaje_archivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_homenaje` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  PRIMARY KEY (`id_homenaje_archivo`),
  UNIQUE KEY `id_homenaje_archivo` (`id_homenaje_archivo`),
  KEY `fk_homenaje` (`id_homenaje`),
  KEY `fk_archivo` (`id_archivo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigacion`
--

DROP TABLE IF EXISTS `investigacion`;
CREATE TABLE IF NOT EXISTS `investigacion` (
  `id_investigacion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo_investigacion` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  `autor` text CHARACTER SET latin1 NOT NULL,
  `id_linea_investigacion` int(11) NOT NULL,
  `entidad` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_investigacion`),
  UNIQUE KEY `id_investigacion` (`id_investigacion`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `investigacion`
--

INSERT INTO `investigacion` (`id_investigacion`, `revisado`, `publico`, `titulo_investigacion`, `descripcion`, `cuerpo`, `autor`, `id_linea_investigacion`, `entidad`, `fecha`) VALUES
(10, 1, 1, 'El lente en la mirada', 'El primer acercamiento del niño y el joven Ernesto al mundo de las imágenes, sería tras el click de la máquina de fotos y del ronroneo de la filmadora que manejaba Ernesto Guevara Lynch, su padre, en el intento de perpetuar para la posteridad los recuerdos de la familia. En esas fotos, como en una narración en instantáneas, puede seguirse todo el crecimiento de Ernesto y de sus hermanos. El pasatiempo, cultivado a la par de las escenas familiares, habla del peculiar ambiente donde él se formaría.', 'Educando la mirada. Antecedentes formativos.\r\n\r\nEl primer acercamiento del niño y el joven Ernesto al mundo de las imágenes, sería tras el click de la máquina de fotos y del ronroneo de la filmadora que manejaba Ernesto Guevara Lynch, su padre, en el intento de perpetuar para la posteridad los recuerdos de la familia. En esas fotos, como en una narración en instantáneas, puede seguirse todo el crecimiento de Ernesto y de sus hermanos. El pasatiempo, cultivado a la par de las escenas familiares, habla del peculiar ambiente donde él se formaría.\r\nEl matrimonio Guevara de la Serna provenía de familias aristocráticas argentinas venidas a menos ya para las décadas del veinte y el treinta, pero poseedor de una educación privilegiada para la época. Don Ernesto había comenzado los estudios universitarios de arquitectura sin llegar a terminarlos y Celia, la madre, huérfana desde su niñez, había estudiado durante toda su vida en un colegio religioso francés, donde alcanzó una esmerada formación que volcaría en su hijo. \r\nY es precisamente en el seno del hogar donde comenzarán a cultivarse las raíces de su humanismo, un hilo que teje toda su existencia y que también tuvo su expresión en su obra fotográfica. En ello, mucho tuvo que ver la educación recibida; la interpretación y el modo en que vivenció desde su entorno importantes acontecimientos históricos  como la Guerra Civil Española y la Segunda Guerra Mundial; el ambiente ideológico de sus años de vida estudiantil en Córdoba permeado por los aires de la Reforma Universitaria, y el desarrollo de un método de estudio que al tiempo que amplía su universo cultural, contribuye a la formación de una visión propia del mundo.\r\nDe los primeros pasos autodidactas de Ernesto en el mundo del conocimiento han quedado como evidencia sus libretas de apuntes que él mismo tituló Índice de Libros y Diccionario Filosófico (Cuadernos Filosóficos). La primera recoge una extensa lista de los títulos leídos en su adolescencia y primera juventud, incluidos algunos en francés.\r\n\r\nLas notas de sus estudios de filosofía son una expresión de la búsqueda y del crecimiento intelectual de este joven. A lo largo de diez años engrosará varios cuadernos con conceptos, datos biográficos, corrientes filosóficas hasta acumular el número de 1265 páginas en su versión manuscrita con índice temático y autoral al final de cada libreta. \r\n\r\nIdeas sobre la libertad, el entusiasmo, la justicia, la voluntad, la ética, el dogmatismo, la bondad, la vida, el amor, la mujer, el patriotismo, la conciencia, entre otras muchas, llenan esas miles de páginas que conforman su Diccionario aprehendidas desde la noción de diversos autores procedentes de disímiles culturas. De modo que concepciones de José Ingenieros pueden seguir a relatos e historias de la cultura budista de Jawaharlal Nehru y citas de Lenin pueden dialogar con otras de Adolfo Hitler o Ducatillon cuando intenta comprender qué es el marxismo.\r\n\r\nErnesto es un lector impenitente con ansias infinitas de aclarar todas las dudas que en el contexto cultural en que se desarrolla su adolescencia y su juventud es capaz de distinguir. Sin aferrarse a escuela de pensamiento o grupo político alguno tiene la capacidad de percatarse de cuáles son los ejes sobre los que gira su entorno e intenta formarse un sistema ¿¿ de pensamiento y una concepción\r\ndel mundo propias. Y en ese reto autodidacta, transita de una búsqueda general, heterogénea, dispersa aunque marcada por intereses específicos, hasta su identificación teórica y científica, años más tarde y después de muchas lecturas y experiencias vitales devenidas históricas y reconocidas por él como tales, con el marxismo. Revisar redacción.\r\n\r\nEstas menciones biográficas resultan esenciales para seguir más adelante las escenas, los momentos, los personajes, las historias donde su lente decide descansar. Es imposible comprender la obra en su totalidad si antes se desconoce al hombre que la crea.\r\n\r\n\r\nEn el alba de una obra fotográfica\r\n\r\nTras la imagen de un joven risueño y desenfado se perfila un universitario inquieto, inteligente y osado. Es el Ernesto que divide su tiempo entre los estudios de medicina, el deporte, y otras aficiones como escribir para una revista deportiva que ha creado y titula Tackle. En ella firma con el seudónimo de Chang-Cho e ilustra sus artículos con caricaturas o fotografías, sin embargo es tan arriesgado asegurar como descartar que, alguna de ellas, fuese de su propia autoría. (Hay testimonios que afirman que efectivamente es autor de algunas de esas fotos, pero no se sabe cuales son)\r\n\r\nEn algunos de estos años que van de 1947 a 1953*, se ha de ubicar la obra fotográfica inicial de Ernesto, pero muy pocas fotos se conservan, o al menos han sido reconocidas y dadas a la luz bajo su autoría. El periodista argentino Hugo Gambini, quien escribió la primera biografía del Che luego de su asesinato en octubre de 1967, recoge el testimonio de familiares cercanos a Ernesto que recuerdan su afición por la fotografía.\r\n*No se puede ser categorico porque no sabemos si antes hiciera algo al respecto y te sugiero que mejor es no llamarlo los inicios de una “obra”  fotog .\r\nEn algún momento de su relato biográfico, comentando los pasatiempos del joven, lo sitúa en uno de los barrios pobres de Buenos Aires:\r\n“Entonces descubrió el Puente Alsina y las calles Pompeya, lo suficiente para imaginarse una niñez distinta de la suya, en esos barrios donde chicos no tienen cerros para trepar. Tomó varias fotografías (era su segundo hobby, después del ajedrez) y se llevó en la cámara la graciosa silueta de un carro repleto de chicos, que le recordaba a su madre cuando los cargaba a todos en La Catramina.” \r\n\r\nLa referencia biográfica posee el valor de ubicar en el tiempo esos primeros intentos y fijar un referente de interés que seguirá repitiéndose. El periodista apunta además que en la casa había acondicionado un espacio a manera de laboratorio para revelar las fotografías.\r\n\r\nDe esos años se conservan algunas fotos en las que el joven Guevara parece establecer un juego entre el fotógrafo y la cámara y también algunos autorretratos con miembros de la familia que revelan su interés y su búsqueda,; al parecer se había convertido en el fotógrafo de los encuentros familiares y de amigos, pero ¿cuándo la afición dejó de ser solo un entretenimiento para convertirse ante los ojos de Ernesto en el modo de fijar los acontecimientos que lo impactarían y marcarían como ser humano?\r\nSi ese fuere el propósito principal y ¿si no fuese así qué?\r\nEntre los títulos que referencia en su Índice de Libros no hay siquiera uno relacionado con la técnica o la creación fotográfica. Tampoco es posible discernir si se mantenía al tanto del panorama artístico fotográfico en Argentina y en especial del de Buenos Aires, donde a mediados de la década del treinta comienzan a distinguirse algunos artistas vinculados por su formación y por su obra a los inicios de la modernidad del lenguaje fotográfico. En estos años la fotografía artística se vería favorecida en ese país con la creación de fotoclubs y con el incipiente desarrollo de una industria fotográfica.\r\nEra un momento fecundo para el desarrollo de la fotografía en todo el mundo: la publicidad se servía cada vez más de este medio de expresión, se crearon revistas fotográficas profesionales, cobró notoriedad la fotografía live, surgieron colecciones o secciones fotográficas en los museos, en el mundo editorial irrumpieron monografías de obras de célebres fotógrafos con las inevitables críticas en secciones artísticas de periódicos y revistas.\r\nEn todo el orbe el interés por las formas de vida, de cultura y el ansia de acercarse a otros pueblos motivó a los jóvenes a emprender viajes para conocer el mundo, sobre todo después de los años de guerra. Esa actitud ante la vida tuvo también su reflejo en la fotografía, que se convirtió en un amplio campo de manifestaciones creativas bajo el denominador común del human interest, cuya popularidad preparó una amplia base para la publicación de esas fotos en las grandes revistas ilustradas. \r\nTal vez motivado por el espíritu de la época y por sus propios intereses, Ernesto parece adherirse a esa alternativa como opción atrayente para abrirse a nuevos escenarios. El primer día de enero de 1950 parte a conocer el norte de su país en una bicicleta a la que acopla un motor MICROM. A su indumentaria de viajero añade una cámara Kodak, de aquellas que se abrían con un fuelle, recuerda su amigo Alberto Granado, con quien comparte una parte del raid. De ese recorrido por doce provincias argentinas apenas se conservan medica decena de instantáneas.\r\nJunto a las fotos, lo más interesante de esa experiencia lo constituye el primer texto narrativo que se conoce del joven Guevara. Se trata de fragmentos de un diario de viaje  que comienza a escribir retrospectivamente después de haber vencido su pretensión inicial con el arribo a la ciudad de Córdoba y en el que terminará por apuntar los acontecimientos más significativos de su periplo. En él no asienta referencia alguna sobre sus fotografías, pero las notas revelan un modo particularmente gráfico de observar y de escribir, cualidad de su vocación como escritor.\r\nEn este episodio de vida quedan definidos los que serán rasgos distintivos durante toda su existencia*: la necesidad de plasmar sobre el papel sus experiencias de vida y aquella otra de documentar, cámara en mano, el ángulo de la realidad hasta donde su mirada incisiva logra penetrar; un par que traza una estética de vida. La sensibilidad ante todas esas novedades que le sorprenden se vuelcan en las hojas de su diario entre figuras metafóricas y sinestésicas. * Es muy posible, al menos, se sabe que hizo fotos en su viaje en bisicicleta, aunque no haya pruebas y esta sería en realidad la primera vez, aunque demostrable sería solo el viaje con Granado. Como no se puede asegurar pieneso que una mención sería recomendable\r\nEl artista e intelectual cubano, Víctor Casaus, quien compiló uno de los más bellos textos dedicados al Che, llama la atención sobre…\r\n“una manera de mirar (…) que irá abriéndose con el tiempo y los caminos andados y desandados, hacia los horizontes del mundo y de las gentes que lo pueblan porque (…) comienza a percibir –con una claridad que irá creciendo de viaje en viaje- los matices de la trama social que habita ese mundo abierto antes sus ojos.” \r\nIdénticas motivaciones impulsan a Ernesto casi dos años después, a finales de diciembre de 1951, a iniciar junto a su amigo Alberto Granado un nuevo viaje a través de América Latina, que asumido en sus comienzos como “aventura” terminará por transformarlo. Los sucesos de esas jornadas de descubrimiento de la realidad de nuestro continente, Ernesto las guardó primero en su diario personal y luego, considerando que hubo “momentos que tal vez interesen a otras personas, con el relato indiscriminado” de esas experiencias, elaboró sus Notas de Viaje. Cintio Vitier, quien prologó el texto décadas después destaca entre las características del estilo literario del joven Guevara:\r\n“la prosa de los ojos, de gran visualidad, dibujante hasta donde la vista alcanza. (…) Las imágenes generalmente irrumpen con la plenitud y mudez propias del mundo del ver. Precisa con ejemplos de alguna escena que no obstante aludirse a la voz y al tono (…) parece muda o como vista de muy lejos, pero sobre todo vista.” \r\nEste es un rasgo del estilo narrativo de Ernesto del que él mismo es consciente y así lo revela en la página que con el nombre de Entendámonos escribe como especie de nota preliminar: \r\n“El hombre, medida de todas las cosas, habla aquí por mi boca y relata en mi lenguaje lo que mis ojos vieron; a lo mejor sobre diez ‘caras’ posibles sólo vi una ‘seca’, o viceversa, es probable y no hay atenuantes, mi boca narra lo que mis ojos le contaron.” \r\nUn poco más adelante utiliza la visualidad que le ofrecen las metáforas fotográficas para comunicarse y, al mismo tiempo, aclarar que lo que tendrán ante sí ya ha sido connotado antes por él mismo: \r\n“En cualquier libro de técnica fotográfica se puede ver la imagen de un paisaje nocturno en el que brilla la luna llena y cuyo texto explicativo nos revela esa oscuridad a pleno sol, pero la naturaleza del baño sensitivo con que está cubierta mi retina no es bien conocida por el lector, apenas la intuyo yo, de modo que no se pueden hacer correcciones sobre la placa para averiguar el momento en que fue sacada. Si presento un nocturno créanlo o revienten, poco importa, que si no conocen personalmente el paisaje fotográfico por mis notas, difícilmente conocerán otra verdad que la que les cuento aquí…” \r\nSus palabras son también reflejo de estudios de estética fotográfica pues describe en este juego de frases el efecto de manipulación visual en el momento de la toma conocido como “noche americana”. Para entonces ya es también consciente que la escena presentada por el fotógrafo deviene realidad para otros.\r\nAlgunas de las fotos de este viaje se conservan y a través del registro literario pueden conocerse las circunstancias y las impresiones bajo las que el obturador de su Kodak Retina fue presionado. El valor de esas imágenes recae sobre todo en el registro documental, pues a través de ellas se descubren los ángulos de la realidad enfocados por el autor y que pasado el tiempo permiten reconstruir los espacios en los que decidió penetrar y que incidirían en su formación cultural y en sus proyecciones futuras. \r\nAl referirse a una de esas fotos, tomadas por Alberto mientras él sufría hospitalizado las consecuencias de una gripe mal cuidada, deja constancia de la significación que atribuye a este otro modo de patentizar los hechos: “Lástima que la fotografía no fuera buena, era un documento de la variación de nuestra manera de vivir, de los nuevos horizontes buscados, libres de las trabas de la ‘civilización.” \r\nEn otras impresiones fotográficas se verá a los jóvenes mientras se deslizan en la nieve de la Patagonia argentina, ascienden el Cerro Santa Lucía para admirar desde las alturas la ciudad de Santiago de Chile, la necesidad los obligue a trabajar en un barco como auxiliares de limpieza y cocina; pero también, estremecidos ante los vestigios de las ciudades incaicas o ante las muestras de calor humano en un sanatorio para enfermos de lepra en el Amazonas peruano. \r\nLas crónicas donde Ernesto relata estas y otras experiencias están matizados con poemas, referencias a hechos y personajes históricos, así como con criterios políticos y sociales de las condiciones de vida del ciudadano común de estas tierras. Por otra parte, la percepción del contraste entre la creación del inca y la del colonizador español suscitaron en el joven valoraciones de carácter artístico, enriquecidas con toda seguridad por las visitas a museos y bibliotecas que aun en medio de la penuria económica, los viajeros disfrutan y priorizan. \r\nTal es el caso del testimonio visual y literario de su paso por el Cuzco, Lima y otros pueblos peruanos. A poco de arribar a ese país andino, en Tarata, escribe sobre las manifestaciones de mestizaje en el arte religioso que encuentran allí: “Su iglesia colonial debe ser una joya arqueológica porque en ella además de su vejez se nota la conjunción del arte europeo importado con el espíritu del indio de estas tierras.” Y ya en el Cuzco, la Catedral de María Angola, emplazada en el centro de la ciudad con “la típica reciedumbre de la época” se le… \r\n“asemeja a una fortaleza más que a un templo. En su interior brilla el oropel que es el reflejo de su pasada grandeza; los cuadros grandes que reposan en las paredes laterales, sin un valor artístico acorde con las riquezas que encierra el recinto, no desentonan, sin embargo, un san Cristóbal saliendo del agua tiene, a mi entender, bastante categoría. (…) Donde adquiere verdadera categoría artística la catedral es en el coro hecho todo de madera tallada por artífices indios o mestizos que mezclan el espíritu de la iglesia católica con el alma enigmática de los pobladores del Ande en el cedro en que está hecha la representación del santoral católico. (…) Toda la ciudad es un muestrario inmenso: las iglesias, por supuesto, pero hasta cada casa, cada balcón asomado en una calle cualquiera, es un instrumento de evocación de un tiempo ido. (…) en Cuzco no hay que ir a mirar tal o cual obra de arte: ella entera es la que da la impresión sosegada, aunque a veces un poco inquietante, de una civilización que ha muerto.” \r\nEn Lima, la capital, su opinión varía, pues…\r\n“su magnífica catedral, tan diferente a esa mole pesada del Cuzco, donde los conquistadores plasmaron el sentido toscamente monumental de su propia grandeza. Aquí el arte se ha estilizado, casi diría afeminado algo; sus torres son altas, esbeltas, casi las más esbeltas de las catedrales de la colonia, la suntuosidad ha dejado el trabajo maravilloso de las tallas cuzqueñas para tomar el camino del oro; sus naves son claras, en contraste con aquellas hostiles cuevas de la ciudad incaica; sus cuadros son claros, casi jocundos y de escuelas posteriores a la de los mestizos herméticos que pintaron los santos con furia encadenada y oscura. Todas las iglesias muestran la gama completa del churrigueresco en sus fachadas y altares que destilan oro.” \r\nPero realmente el encantamiento por ese pasado americano interrumpido en su ciclo vital con la llegada del conquistador, colmó a Ernesto en las ruinas de Machu Picchu y la fortaleza de Ollantaytambo. \r\nUn año después de su regreso y ya graduado como médico, inicia su segundo recorrido por América y durante su estancia en Panamá, en números de noviembre y diciembre de la revistas Panamá América y Siete, publica dos artículos periodísticos con imágenes tomadas por él y guardadas en su reducido equipaje de viajero durante todos los meses transcurridos entre el recorrido con Granado y el comienzo del segundo. El primer trabajo lo publica con el título Un vistazo a las márgenes del gigante de los ríos, y el segundo, lo identifica como Machu Picchu, enigma de piedra en América. Las imágenes del viajero pretenden dejar constancia de sus experiencias en el más puro estilo informativo-documental.\r\nTerminando el (primer) viaje, en los cerros de la ciudad de Caracas, impresionado por las paradojas que la modernidad del capitalismo trajo a nuestras tierras y que allí en la capital venezolana todavía parecen más notables, Ernesto testimonia en sus relatos una de sus experiencias como fotógrafo. La crónica la titula Este extraño siglo XX y en uno de sus fragmentos describe:\r\n“(…) es una pieza separada a medias por un tabique donde está el fogón y una mesa, unos montones de paja en el suelo parecen constituir las camas; varios gatos esqueléticos y un perro sarnoso juegan con tres negritos completamente desnudos. Del fogón sale un humo acre que llena todo el ambiente. La negra madre, de pelo ensortijado y tetas lacias, hace la comida ayudada por una negrita quinceañera que está vestida. (…) al rato les pido que posen para una foto pero se niegan terminantemente a menos que se la entregue en el acto; en vano les explico que hay que revelarlas antes, o se las entrego allí o no hay caso. Al fin les prometo dárselas enseguida pero ya han entrado en sospechas y no quieren saber nada. Uno de los negritos se escabulle y se va a jugar con los amigos mientras yo sigo discutiendo con la familia, al final me pongo de guardia en la puerta con la máquina cargada y amenazo a todos los que asoman la cabeza, así jugamos un rato hasta que veo el negrito huido que se acerca despreocupadamente montando una bicicleta nueva; apunto y disparo al bulto pero el efecto es feroz: para eludir la foto el negrito se inclina y se viene al suelo, soltando el moco al instante; inmediatamente todos pierden el miedo a la cámara y salen atropelladamente a insultarme. Me alejo con cierto desasosiego (…).” \r\nLamentablemente no existe el registro impreso de esta fotografía, apenas solo una decena de las tomadas durante el viaje llegan hasta el presente, pero son una muestra de su costumbre de dejar sentadas sobre el papel, ya fuese en forma de diarios, relatos, poemas, artículos periodísticos o cartas, sus impresiones y al mismo tiempo, llevarlas a sus fotografías, de tal modo que es posible relacionar las dos estructuras, pues la realidad percibida, según fue connotada por el joven, es referente para la creación en ambos lenguajes.\r\n\r\nCaminos cruzados: el viaje definitivo.\r\nLas fotos realizadas por Ernesto Guevara durante su segundo viaje por América Latina, con más rigor en Guatemala y en México, serán las que permitan, pasado el tiempo, comenzar a definirlo como fotógrafo*. A partir de aquí es posible percatarse de la evolución en sus modos de enfoque, del perfeccionamiento en los métodos compositivos y del nivel de resolución técnica de sus encuadres, en esencia lo que el crítico cubano David Mateo denomina tránsito gradual de un tipo de foto realista, descriptiva, hacia otra de altos poderes de sugestión y matices elucubrativos. \r\n*Si ya se reconoce que no tenemos pruebas de lo que hiciera anteriormente, entonces se debe tener en cuenta esto antes de afirmar algo así. Otra cosa  que supongo debe ser considerado (no se si aquí o en otro lugar del texto) es que nunca tuvo posibilidades de tener equipamiento adecuado y medios sufcientes para trabajar de forma idónea, esto muchas veces marca una gran diferencia.\r\nEtapa rica en experiencias personales, las fotos, como ningún otro texto (creo que está sobredimensinada esa afirmación), revelan la mirada de Ernesto sobre su realidad y el modo en que la percibe, al punto de que pudiera establecerse una especie de biografía o diario visual y el resultado sería el mismo que si se consultasen las notas de su diario o sus cartas, textos que junto a los poemas, las reseñas literarias, sus apuntes filosóficos y un proyectado libro sobre la función social del médico en América Latina, resultan esenciales para indagar en su crecimiento personal e intelectual durante estos años.\r\nParticularizando en la fotografía podrían distinguirse cuatro temas esenciales en la obra de Ernesto durante estos años que corren desde 1953 hasta 1956: la arquitectura, de construcciones religiosas, en específico de iglesias católicas y de ruinas indígenas, especialmente mayas; aquellas con un marcado carácter humanista; las domésticas y las paisajísticas. En el caso de las dos primeras, muchas pudieran inscribirse en otro gran tópico, la antropología.\r\nEl 7 de julio de 1953, (el hilo conductor tiene saltos inconexos) con su título de médico ya en mano, marcó la partida del ya doctor Guevara de la Serna junto a su amigo Carlos (Calica) Ferrer de Buenos Aires hacia La Paz. En relación con las fotografías tomadas durante su estancia en Bolivia solo es posible  tener una idea de ellas a través de las anotaciones que hiciera en las páginas finales de su diario Otra Vez  como un hecho necesario entre el acto de toma y el proceso de revelado. \r\nEn un primer listado que identifica como “Sobre No”  relaciona trece instantáneas, de las cuales las nueve primeras corresponden a acontecimientos vividos todavía en Buenos Aires y las cuatro últimas se vinculan con este viaje, la primera de ellas tomada en La Quiaca, pueblo argentino fronterizo con Bolivia; otra con un amigo de la infancia que ha encontrado allí, y las dos últimas son vistas de La Puna y La Paz. En otra lista que Ernesto clasifica como “Negativos Tambor Kodak No.1” inscribe treinta y seis instantáneas, todas correspondientes a su estadía en Bolivia y en las que predominan vistas de paisajes, de iglesias y de las ruinas incas en el Lago del Sol , algunas con la acotación del uso de filtro rojo. Este detalle dio la certeza a la curadora y artista plástica cubana Lesbia Vent Dumois de que la fotografía en la vida de Ernesto iba más allá del simple pasatiempo de un aficionado.* Me parece falta un hilo conductor o explicación, aunque lo haya afirmado Lesbia.\r\n*Esto se pudiera enfocar de otra forma ya que el uso de filtros por una persona que este aprendiendo es también posible, sobre todo en esa época, creo que el hecho habla de que intenta contrastar tonos, para eso era usado este tipo de filtro, lo afirmado es sujetivo, respetable porque viene de una artista reconocida y ducha en la materia, pero no es infalible, pienso que la sistematicidad y la conhincidencia del propósito de cada foto con el resultado alcanzado, es lo que indica que se superó un estadio primario. Ten en cuenta además que puede darse, que un fotógrafo especializado en un área determinada no sea, precisamente, un conocedor de la composición artística, el conocimiento de esta es esencial para elevar la obra a esta condición. “Una técnica sencilla subordinada íntegramente a una composición metódica da como resultado fotos de notable valor”\r\nCalica Ferrer apunta entre las memorias de este recorrido que de todo el equipaje de Ernesto lo más importante era su “maquinita fotográfica”, considerada objeto sagrado. De camino al Lago Titicaca, cuando se trasladaban en el compartimento de carga de un camión y después de andar cinco horas, Ernesto se percató de que había olvidado la cámara, y se lanzó del camión para regresar a la capital en su busca. Al día siguiente el joven aparecía en Copacabana con su cámara a cuestas, lista para registrar su aventura en el cruce del lago y los templos y monolitos incas que allí encontrará. \r\nEn el mes que transcurre en Bolivia lo más trascendente en su historia fotográfica será el encuentro con el fotógrafo Gustavo Thorlichen, un artista alemán formado en las artes del dibujo y la pintura en la Academia de Bellas Artes de Hamburgo, la de Bellas Artes de Leipzig y la Academie de la Grande Chaumiere en París y más tarde, influenciado por las vanguardias rusas, en particular por el constructivismo de Rodchenko, se había iniciado en la fotografía. \r\nLas circunstancias en las que se conocieron Ernesto y el creador europeo son dudosas, algunas fuentes se refieren a una exposición del artista alemán en La Paz, otras a un encuentro casual en un café, Ernesto solo precisa en su diario que…\r\n“Gustavo Thorlichen es un gran artista como fotógrafo. Además de una exposición pública y de sus trabajos particulares tuve oportunidad de ver su manera de trabajar. Una técnica sencilla subordinada íntegramente a una composición metódica da como resultado fotos de notable valor. Con él hicimos un recorrido…”    \r\nAl examinar las fotografías publicadas por el alemán salta a la vista la coincidencia de los lugares visitados por ambos y aunque la mirada de aquel va desde la impresión por la inmensidad hasta el detalle de lo típicamente argentino, se perciben algunas coincidencias en el trabajo de ambos, sobre todo aquellos rasgos que Ernesto señalara. \r\nSe desconoce si hasta ese momento Guevara había tenido la oportunidad de intercambiar directamente con un fotógrafo de experiencia como es el caso de Thorlichen. Revisando entre las cartas publicadas por don Ernesto, se ha encontrado el nombre de un amigo de su hijo, Rodolfo, sobre el que, a pie de página, aclara ejercía la profesión de fotógrafo. Pero ciertamente las fotos que logre más adelante marcarán una diferencia notable en cuanto a técnica y calidad artística de las logradas hasta ese momento, no obstante los temas de su preferencia seguirán siendo los mismos. Redactar mejor.\r\nCreo que esto es lo mismo que ya dije sobre lo de sugerir o afirmar cosas de esa índole sin conocer la “obra” anterior. Pudieras mostrar algunos ejemplos de textos del viaje con bicicleta en que describe muy fotográficamente un entorno deterinado, son fotos habladas, eso sustentaría más tu propia tesis.\r\nDurante el recorrido por Perú y Ecuador hay un vacío en la producción fotográfica del joven argentino, incluso en sus notas. Ello coincide con sus menguados recursos financieros. Después de un periplo por los países centroamericanos, en que la penuria económica lo obliga a deshacerse de uno de sus objetos más preciados: la cámara fotográfica, la cual debe empeñar sin poder recuperarla, arribará a Guatemala, paréntesis obligado en la vida de Ernesto por el nivel de ascenso que representa en su evolución intelectual y política.  (No es solo por eso)\r\nDesde su llegada allí en los últimos días de diciembre de 1953 una de sus necesidades más apremiantes es conseguir un “laburu” como médico, incluso en las regiones más inhóspitas del país, “los meses de selva sólo servirán para dejarme sin deuda y con una máquina fotográfica”, escribe en su diario. \r\nLas imágenes que se conservan de su estadía en Guatemala y que pudo lograr con una máquina propiedad del profesor norteamericano Harold White, (aclarar quién es) están realizadas con un sentido antropológico. Ernesto deja que su lente descubra a los pobladores en sus quehaceres diarios, con sus indumentarias comunes, captados al acecho. Sobresalen por las acciones que ejecutan los personajes, por el peso que cargan sobre sí, elementos que los distingue de otros pueblos de la región. \r\nUna de esas instantáneas despunta por la calidad de su composición y por su valor documental y humano. La foto, que muestra a un indio cargando sobre sus espaldas un ramo de ánforas de barro y más allá un grupo de hombres echados a la orilla de la calle que conversan sin que la escena les cause asombro, recuerda la reflexión del fotógrafo Ken Heyman cuando argumentaba que “una fotografía excelente no es consecuencia del casual “clic” del obturador, sino de la interpretación que se da a una escena (…) Esa interpretación, además de pasar por la cámara, pasó por los ojos y el cerebro del fotógrafo.” \r\nAlgunos versos escritos por Ernesto se antojan inspirados en aquella escena detenida en su lente: \r\n“La ciencia que muestra un microscopio negro\r\nes un médico almidonado frente a una regristradora\r\nel arte, todo lo que el arte muestra,\r\nes la estéril mecánica de una Leica,\r\nun indio cargado de penas y temores y\r\ntambién de añoranzas, \r\npor aquello que fue, \r\naunque no fuera  y\r\ncuyo retorno anhela,\r\nuna sonrisa estúpida de coca, alcohol y hambre.” \r\nEn Chichicastenango, “donde sí [encontró] cosas de real interés en la vida de los indios y sobre todo en sus ritos” logra una tetralogía de instantáneas con un marcado sentido antropológico en los alrededores de la Capilla de El Calvario donde la actividad propia del mercado se confunde con los rituales mayas. En ellas la composición se supedita al contenido de la escena, a la vida del indio que pasa vendiendo telas, frutas, incienso…\r\nOtra fotografía tomada en la costa de San José, destaca por su bella composición panorámica. Como un maestro del género, recrea con el lente la profundidad del paisaje: tierra, costa y horizonte se dibujan y enmarcan entre las líneas y los matices de los tonos negro y blanco. Tres de los aspectos esenciales para lograr excelentes panoramas aparecen aquí: la elección de un cercano punto de referencia que destaque la distancia, el uso de alguna persona u objeto fácil de identificar para dar escala y la proporción y la luz posterior para el máximo impacto. \r\nA partir de su llegada a México el 18 de septiembre de 1954 y de los resultados que obtendrá allí en el ejercicio de su vocación, incluso con un carácter comercial, comenzaría otra etapa distintiva por su “interdisciplinariedad visual” . Claro que el tránsito no se sucede de manera inmediata y en ello mucho tienen que ver las limitaciones que las condiciones económicas  de Ernesto impondrán a su vovación.\r\nCamino a la capital mexicana visita las ruinas de Mitla, cerca de Oaxaca, y aunque su mirada de “experto” en la materia le hace notar que no hay allí “ni la imponencia de Machu Picchu, ni la bellezas y sugestión de Quiriguá, ni siquiera la emotividad de las ruinas salvadoreñas”, sí cree que “presentan cosas interesantes y un anticipo de lo que será el conocimiento de todas las maravillas de por aquí”. Como evidencia de su paso se registra en sus archivos una fotografía que ha sido clasificada como autorretrato y que lo muestra extasiado en el centro de las Sala de las Columnas. La cámara fue ubicada en un lugar privilegiado para abarcar todo el perímetro de la habitación, recortadas por la claridad del cielo las piedras de sus muros centenarios.\r\nEn su diario Ernesto anuncia que ha visitado también las ruinas de Teotihuacan y que irá “a visitarlas de nuevo con tiempo y detallaré entonces lo que vea pues (…) compré unas Zeiss IKon 1:35 de 35 exposiciones” , una cámara de compleja manipulación, pero por fin tiene entre sus manos el tan anhelado instrumento-extensión memorística y lupa de su mirada. Demorará todavía la ocasión para darle el uso deseado. \r\nEntre tanto ha de procurarse el modo de hallar un sustento para vivir y lo encontrará agenciándose un puesto de fotógrafo en los parques de Ciudad México. ¿Cómo se engendró esta idea? Ni en su diario ni en sus cartas abunda en detalles al respecto, sin embargo, la iniciativa revela que Ernesto es consciente del peso de sus conocimientos fotográficos, al menos los imprescindibles como para ganarse la vida decentemente junto a su amigo guatemalteco Julio Roberto Cáceres. Mientras, la práctica diario contribuirá notablemente a su perfectibilidad en el oficio. \r\nCon el estilo desenfadado que le caracteriza pone también al corriente a su “Vieja” de los malabares que concibe para salvar su situación económica: \r\n“Sigo en la fotografía pero dedicándome a cosas más importantes como ‘estudios’, y algunas cositas raras que salen por estos lados. (…) y si la suerte me ayuda pondremos una pequeña fotografía al final del año que viene (principio quise decir). Contra lo que pudieras creer, no soy más malo que la mayoría de los fotógrafos y sí el mejor del grupo de compañeros, eso sí, en este grupo no se necesita ser tuerto para la corona.” \r\nDe los cientos de fotos que realizó en las calles de México solo una ha llegado hasta nuestros días, aquella donde dos enamorados posan sobre un césped, ¿solo esta fue guardada por Ernesto de los cientos que realizó en la urbe azteca? ¿sería la elección una prueba más del sentido crítico con que evaluaba su propio trabajo? Interrogantes que una vez más asaltan a quien indague en este ámbito de su existencia. \r\nSospecho, por lo que nos dijo Calica una vez, que no tuvo la intención de guardar fotos que quizás no estuviera en condiciones de protegerlas, por lo accidentado de sus viajes, lo importante es que pueden haber mil razones validas, se debería mencionar esto, al menos, de pasada\r\nAgobiado porque su “vida intelectual es nula, salvo que leo de noche y unas gotitas de estudio diario”  y en cuestiones médicas trabaja alternando entre el Hospital General y el Infantil, Ernesto continúa por un buen tiempo ganándose “los garbanzos retratando mocosos en la plaza” . \r\nEn medio de esas circunstancias obtiene su primer puesto profesional como fotógrafo en la Agencia Latina, servicio noticioso financiado por el gobierno argentino. Poco después encontrará casualmente en la calle al jefe del medio “que es médico y simpatizó conmigo y me nombró corresponsal provisorio”.  ¿Cómo logró Ernesto este puesto? ¿Hubo de presentar una muestra de su obra que evidenciara sus habilidades para ejercer el oficio en un medio que se distingue por la calidad técnica y profesional de los trabajos fotográficos? Otras preguntas que quedan sin explicación definitiva. \r\nPero la celebración en marzo de 1955 de los II Juegos Panamericanos en Ciudad México devendrá oportunidad para que el joven argentino exhiba sus cualidades como foto-reportero. En carta que escribiera a su amiga Tita Infante resume la dinámica de aquellas jornadas: “Mi trabajo fue agotador en todo sentido de la palabra, pues debía hacer de copilador de noticias, redactor fotográfico y cicerone de los periodistas. Yo era también el que revelaba y copiaba las fotografías”. \r\nSeverino Rosell, un cubano que a causa de su participación en las acciones del 26 de julio de 1953 se encontraba exiliado en Costa Rica donde Ernesto lo conoció, lo acompañaría en este nuevo reto. Rossell recuerda que…\r\n“cuando lo designan como reportero gráfico y periodístico (…) nos consiguió a mí y a otro compañero (…) trabajo como fotógrafos. El Che sabía tirar buenas fotos, y como el otro también sabía y tenía una ampliadora y un cuartito oscuro en su apartamento, y yo tenía algunas nociones de ese trabajo, hicimos una especie de pequeña cooperativa fotográfica para cubrir las competencias que eran muchas a la vez. (…) El Che decía el juego que le tocaba a cada uno todos los días. Entonces nosotros tomábamos notas y tirábamos las fotos y después por la noche las revelábamos, lo que terminábamos de hacer en horas avanzadas de la madrugada. En esos días dormimos bastante poco, sobre todo Che, que era quien hacía las crónicas de cada competencia y escribía a máquina por la parte trasera lo relacionado con las tomas.” \r\nLas fotos de los Juegos Panamericanos corroboran cuánto había ganado Ernesto en maestría, como prueba, el seguimiento que realiza al argentino Juan Carlos Miranda en la carrera de los 1500 metros planos. Esta serie admite el más riguroso análisis de la sintaxis como procedimiento de connotación según lo definió Roland Barthes. Ernesto persigue al atleta desde la arrancada, sigue su desempeño cuando viniendo del fondo se alza con la victoria y es coronado en el podio. En la concatenación de cada una de las instantáneas el espectador significa íntegramente el suceso percibido por el fotógrafo y valora, en suma, el esfuerzo del corredor para alcanzar la gloria. \r\nErnesto pudo percatarse de la singularidad de esta ocasión para mostrar sus competencias: “me entregué a la benemérita tarea de informar detalladamente al público latinoamericano sobre el desarrollo de los eventos, además de proporcionarles bellas fotografías en las que se aunaban la oportunidad y la belleza.” \r\nOtro elemento notorio de su trabajo durante los Juegos es el uso del flash, algo que no es usual en sus fotografías y que puede explicarse cuando se estudian los modos de hacer de la época dominados por el trabajo de la Agencia Magnum y el pensamiento de Henri Cartier-Bresson. \r\nEsos aires que intentan mostrar la vida tal como sucede, recorrerán la producción fotográfica de Ernesto. Sus prácticas de alpinismo en los volcanes cercanos a Ciudad México también las aprovecha como referente fotográfico: \r\n“como acontecimiento deportivo, debo señalar el ascenso al Popocatépelt, labio inferior por un grupo de esforzados andinistas improvisados, entre los que me encontraba. Es maravilloso y lo quiero repetir con alguna frecuencia , \r\nescribe luego del primer intento, y en otra ocasión, cuando sus esfuerzos se ven coronados con el éxito, agrega: “por fin, llegué a la cima del Popo (…) no pude sacar fotos adecuadas debido a la niebla que cubría todo.” Me quede *****************\r\nEn esta serie, primero el paisaje y después el hombre como peldaño, tenso en la proyección de su estática, aterido por el frío o apenas visible entre la claridad de la nieve, deviene pretexto para el ejercicio compositivo desde arriesgados planos en picado y contrapicado que recuerdan la obra de Rodchenko y confirman esa búsqueda experimental, típica en alguien que intenta formarse una semántica propia dentro del medio. Tengo dudas de desconocimiento: estás apoyándote en autores que sentaron criterios técnicos, y no sé si lo pones como explicación y apoyo o pretendes decir que el Che conoció algo de eso ¿?)\r\nEn los últimos meses de 1955 en compañía de su esposa Hilda Gadea, realiza su “tan cacareada ronda circunvalatoria por el sureste mexicano, alcanzando a cubrir superficialmente el área maya.”  Los pobladores de esta región, sus paisajes, sus construcciones religiosas y sin faltar, por supuesto, las ruinas mayas, serán fijadas por el lente de Ernesto. Aquí la diversidad compositiva y temática enriquece su acervo creativo. Como ejemplo podría citarse una serie de cuatro instantáneas tomadas desde la cubierta de un ferry que se antojan experimento visual. \r\nAdemás de la crítica social que estas fotografías pudiesen inspirar, poseen también, junto al deseo de mostrar, de llamar la atención sobre cierto modo de vivir, un sentido de la belleza y la necesidad de convertirlo en expresión artística. En ellas comienza a dibujarse la prestancia con que Ernesto logrará estructurar en sus encuadres el espacio, muestra de la inconsciente habilidad con que maneja su cámara.*\r\n*Esto esá de truco, además ya se ha dicho que anteriormente el tiene cominzos en este sentido, pienso que debes revisar esto.\r\nIdénticos propósitos reclamará su mirada ante las construcciones mayas. Ernesto recorre las ruinas de Palenque, Uxmal y  Chichén Itzá cámara en mano y desde lejos, cuando todavía la selva las circunda, va resguardándolas del paso del tiempo en sus películas. La arquitectura misma, usada como objeto para connotar, prevalece en esta parte de su obra. Toma distancia de las construcciones, las hace aparecer entre el follaje y poco a poco va acercándose a sus decorados escultóricos. La cosmovisión de sus originarios pobladores se refleja en cada imagen. A veces la presencia de algún ser humano entre las moles de piedra sirve incluso como referente para denotar la majestuosidad constructiva del indio americano. \r\nValoraciones de estudiosos sobre este segmento de la obra fotográfica de Ernesto Guevara coinciden en señalar la calidad y belleza de las imágenes. La composición, el encuadre, el edificio como referente, los contrapicados, el contraluz, las angulaciones muestran su maestría.\r\nAficionado al estudio de la arqueología americana, la fotografía de estos monumentos responde también a su curiosidad de autodidacta y no está de más recordar cuánto se ha servido la arqueología de la fotografía como técnica auxiliar de aquella. Sin embargo, Ernesto trasciende su interés científico, o lo complementa, con criterios estéticos. De modo que una imagen de El cuadrángulo de las Monjas no muestra solo el arco falso de los mayas, sino la creatividad inherente a la visualidad del fotógrafo para dibujar con el claroscuro y exhibir en un único cuadro dos elementos arquitectónicos situados en perspectivas diferentes desde su ángulo visual.\r\nEn relación con las fotografías a color que toma durante este recorrido, aunque el *tiempo y la ausencia de condiciones adecuadas para su conservación han opacado en alguna medida su estado original, aun así los tonos grises, verdes y amarillos sobre todo, colorean la mirada nostálgica y romántica del joven. Tanto las fotografías de espacios abiertos como aquellas con un campo visual más ajustado, se benefician de una elección policromática armoniosa, con el equilibrio justo para realzar lo que constituye el interés esencial de Ernesto: las ruinas. Cuando el color toma sus tonos más oscuros es la presencia de la espesa selva, cercando las figuras, quien se dibuja, rasgo distintivo en las fotografías de Palenque, en las que prefirió ubicar las construcciones en el halo de su entorno paisajístico. Sin embrago, en aquellas que tomara en Chichén-Itzá, el fotógrafo se recrea en los detalles figurativos, en las estatuas, las columnas y las vistas de las construcciones son más cerradas. El color, juntándose con las líneas que intentan rebasar el marco bidimensional de la representación visual y dinamizan la imagen desde su disposición diagonal; reforzando la textura de la piedra para hacerla todavía más imperecedera ante los ojos y el tacto; distribuyendo con sus tonalidades más oscuras o más claras el peso dentro de la imagen, termina entonces por vivificar la atmósfera sensitiva de los espacios descubiertos a través del lente.\r\n*Ten en cuenta que estas fotos como ya dices están maltratadas por el tiempo, la la gama cromática entonces no es la autentica y ningún fotógrafo puede saber de antemano como se deteriorara el color pasado los años, por tanto no es un  merito.\r\nPara completar su percepción americana han de tenerse en cuenta además los escritos al respecto. Esa predilección por reflejar en varios lenguajes su pensamiento, en las ruinas de Palenque se muestra de modo excepcional. De allí son parte de sus mejores fotografías, pero también le dedica una poesía y en su diario escribe una crónica.\r\nPero además de la fotografía otros intereses han ido marcando la vida de Ernesto. Palpar la realidad de nuestras tierras, junto a un enraizado y genuino sistema de pensamiento en el que la condición de latinoamericano y antiimperialista forman parte de un mismo par, explican su total adhesión al proyecto libertador de Fidel Castro. En él y en el Movimiento Revolucionario 26 de Julio, Ernesto había encontrado materializadas sus concepciones revolucionarias. Los lazos con sus miembros se harán más fuertes cuando a causa de una delación los jóvenes cubanos y también el joven argentino, sean hechos prisioneros a fines de junio de 1956. En los meses de cárcel su identificación con los compañeros de causa llega a ser total, él mismo se explica cuando en misiva a doña Celia patentiza que “el concepto yo había desaparecido totalmente para dar lugar al concepto nosotros.” \r\nDe esos días encarcelado en la Estación Migratoria de la Secretaría de Gobernación en la calle Miguel Schultz, data uno de sus escasos retratos, realizado a contraluz. Un hombre mestizo, retenido por las rejas, fuma un cigarro. Más allá los altos muros circundan el patio diluyendo cualquier intento de escape. La mirada, perdida en algún punto del espacio, resulta inaccesible para el fotógrafo. Pero el hombre, combatiente, pareciera dispuesto a lanzarse tras el humo de su cigarrillo, más allá de la vida, más allá de la muerte, más allá de la adversidad de sus circunstancias actuales*. \r\nFue Calixto el compañero retratado, pero esta afirmación o como le llamen, es bastante sujetiva, sería mejor decir que aparentemente esta ensimismado, y digo aparentemente porque es muy posible que haya posado, nadie lo sabe, por tanto este tipo de aceveraciones le resta seriedad al trabajo.\r\nEs el humanismo, rasgo distintivo de su vida y de su obra, quien penetra por cada una de las cuadrículas de las rejillas que la combinación del negro y blanco descubre sobre el papel. El mismo que le ha permitido ver la pose relajada y desafiante, romántica en todo el sentido de la palabra de una pareja singular en un parque de México; la risa inocente de su primogénita; al indio americano “cargado de penas, temores y añoranzas”; al alpinista queriendo ascender empinadas cumbres y que lo revela también a él, fotógrafo. \r\nUno de los referentes más sensibles para la creación lo halló Ernesto en sus hijos. De este periodo, las fotos a su primera hija Hilda Beatriz Gadea traspasan al papel la ternura que el padre, fotógrafo, inspira y descubre para la posteridad como ser de su orgullo y pretexto para su obra.\r\nEste fin que no dice nada de tu tesis a manera de conclusión pudieras aprovecharlo en tal sentido, fíjate bien en estos dos últimos párrafos. \r\nLas últimas líneas de su diario Otra vez apenas sintetizan la vorágine de los meses más próximos a su partida definitiva antes de entrar a la historia. Ernesto expone los acontecimientos que a lo largo de los meses más recientes han marcado su vida, el hecho de haberse convertido en padre es el primero de ellos. Las conclusiones van en escueta nota: “Me metí de camarógrafo con una pequeña compañía. Mis progresos en el arte cinematográficos son rápidos…”  ¿Acaso esa mirada dispuesta para el instante le habría servido de igual modo para adentrarse en los secretos del séptimo arte? Quién sabe. Esa página quedó sin escribir en los intersticios de su vida y solo estos escuetos comentarios en su Diario revelan sus intentos para vincularse al mundo del cine. Y termina así el párrafo… “Mis proyectos para el futuro son nebulosos, pero espero terminar un par de trabajos de investigación. Este año puede ser importante para mi futuro. Ya me fui de los hospitales. Escribiré con más detalles.”  Ese texto no sé si será evasión, porque ya su proyecto inmediato tenía expresión real.\r\nEl 25 de noviembre de 1956 partirá como médico junto a otros 81 expedicionarios en el yate Granma rumbo a Cuba. En lo adelante ejercerá la profesión de revolucionario. Como testimonio de los caminos andados hasta entonces permanecerán sus escritos y sus fotografías. \r\n', 'Daily Pérez Guillén', 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigacion_archivo`
--

DROP TABLE IF EXISTS `investigacion_archivo`;
CREATE TABLE IF NOT EXISTS `investigacion_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_investigacion` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1,
  `portada` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_investigacion_archivo` (`id`),
  KEY `fk_investigacion` (`id_investigacion`),
  KEY `fk_archivo` (`id_archivo`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `investigacion_archivo`
--

INSERT INTO `investigacion_archivo` (`id`, `id_investigacion`, `id_archivo`, `nota`, `portada`) VALUES
(11, 10, 62, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

DROP TABLE IF EXISTS `libro`;
CREATE TABLE IF NOT EXISTS `libro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(4) NOT NULL,
  `publico` tinyint(4) NOT NULL,
  `fecha` date NOT NULL,
  `titulo` varchar(512) CHARACTER SET utf8mb4 NOT NULL,
  `autor` varchar(512) CHARACTER SET utf8mb4 NOT NULL,
  `compilador` varchar(512) CHARACTER SET utf8mb4 NOT NULL,
  `linea` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `palabras_clave` varchar(512) CHARACTER SET utf8mb4 NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_archivo`
--

DROP TABLE IF EXISTS `libro_archivo`;
CREATE TABLE IF NOT EXISTS `libro_archivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_archivo` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `nota` text CHARACTER SET utf8mb4,
  `portada` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_investigacion`
--

DROP TABLE IF EXISTS `linea_investigacion`;
CREATE TABLE IF NOT EXISTS `linea_investigacion` (
  `id_linea_investigacion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `nombre_linea` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_linea_investigacion`),
  UNIQUE KEY `id_linea_investigacion` (`id_linea_investigacion`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `linea_investigacion`
--

INSERT INTO `linea_investigacion` (`id_linea_investigacion`, `revisado`, `publico`, `nombre_linea`, `descripcion`) VALUES
(9, 1, 1, 'Sistema de pensamiento filosófico, económico, socio-político e histórico.', 'Sistema de pensamiento filosófico, económico, socio-político e histórico.'),
(10, 1, 1, 'Búsqueda de los restos de los combatientes caídos en Bolivia.', 'Búsqueda de los restos de los combatientes caídos en Bolivia.'),
(11, 1, 1, 'Lucha insurreccional en Cuba.', 'Lucha insurreccional en Cuba.'),
(12, 1, 1, 'Estudios ético-psicológicos sobre la educación en valores.', 'Estudios ético-psicológicos sobre la educación en valores.'),
(13, 1, 1, 'Estudios socioculturales ', 'Estudios socioculturales '),
(14, 1, 1, 'Otras', 'Otras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_investigacion_archivo`
--

DROP TABLE IF EXISTS `linea_investigacion_archivo`;
CREATE TABLE IF NOT EXISTS `linea_investigacion_archivo` (
  `id_linea_investigacion_archivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_linea_investigacion` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1,
  `portada` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_linea_investigacion_archivo`),
  UNIQUE KEY `id_linea_investigacion_archivo` (`id_linea_investigacion_archivo`),
  KEY `fk_linea_investigacion` (`id_linea_investigacion`),
  KEY `fk_archivo` (`id_archivo`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `linea_investigacion_archivo`
--

INSERT INTO `linea_investigacion_archivo` (`id_linea_investigacion_archivo`, `id_linea_investigacion`, `id_archivo`, `nota`, `portada`) VALUES
(9, 11, 63, NULL, 1),
(8, 10, 63, NULL, 1),
(7, 9, 63, NULL, 1),
(10, 12, 63, NULL, 1),
(11, 13, 63, NULL, 1),
(12, 14, 63, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) CHARACTER SET latin1 NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1567625510),
('m130524_201442_init', 1567625613),
('m190124_110200_add_verification_token_column_to_user_table', 1567625614),
('m210505_154018_create_tipo_taller_table', 1620231860),
('m210505_191648_create_tipo_producto_table', 1620242336),
('m210520_160242_gestion_documental_table', 1621527415),
('m210520_161752_gestion_documental_arachivo_table', 1621527591),
('m210525_152640_create_otros_table', 1621956496),
('m210525_153539_create_otros_archivo_table', 1621956964),
('m210602_140505_create_carrusel_table', 1622642808),
('m210602_160209_create_paradigma_table', 1622649795),
('m210602_161215_create_paradigma_archivo_table', 1622650399),
('m210602_180120_create_quienes_table', 1622656950),
('m210602_180137_create_quienes_archivo_table', 1622656950),
('m210602_182224_create_contacto_table', 1622658244),
('m210602_182241_create_trabajador_table', 1622658244),
('m210603_160706_create_libro_table', 1622736493),
('m210603_160721_create_libro_archivo_table', 1622736493);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE IF NOT EXISTS `noticia` (
  `id_noticia` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo_noticia` mediumtext COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL,
  `referencia` text COLLATE utf8_bin NOT NULL,
  `descripcion` mediumtext COLLATE utf8_bin NOT NULL,
  `cuerpo` mediumtext COLLATE utf8_bin NOT NULL,
  `etiqueta` mediumtext COLLATE utf8_bin NOT NULL,
  `autor` mediumtext COLLATE utf8_bin NOT NULL,
  `contacto` mediumtext COLLATE utf8_bin NOT NULL,
  `fuente` mediumtext COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_noticia`),
  UNIQUE KEY `id_noticia` (`id_noticia`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id_noticia`, `revisado`, `publico`, `titulo_noticia`, `fecha`, `referencia`, `descripcion`, `cuerpo`, `etiqueta`, `autor`, `contacto`, `fuente`) VALUES
(43, 1, 1, 'Artículo Museo Digital Camilo', '2021-06-02', 'Provisional', 'El trabajo del Centro de Estudios Che Guevara se divide, en la práctica, en dos áreas principales, una científica, dedicada a la investigación y todo aquello que concierne al mundo académico, y otra divulgativa, que obtiene primordialmente de la primera los contenidos para llevar a cabo todos los proyectos que le atañen.  ', 'El trabajo del Centro de Estudios Che Guevara se divide, en la práctica, en dos áreas principales, una científica, dedicada a la investigación y todo aquello que concierne al mundo académico, y otra divulgativa, que obtiene primordialmente de la primera los contenidos para llevar a cabo todos los proyectos que le atañen.  \r\nLa divulgación es un acto que necesita de constante renovación y esfuerzos, porque los tiempos y los medios son muy cambiantes y para llegar adecuadamente a un posible interesado, que vive una nueva época repleta de tentaciones, muchas de ellas, vanas, hay que llegar de forma más directa, por lo que muchas veces se debe ser un tanto agresivo y se debe tratar de generar un material auténtico, audaz y revolucionario.\r\nPor tal motivo, desde hace algún tiempo el Centro de Estudios Che Guevara ha estado enfrascado en la búsqueda de colaboradores potenciales para la realización de proyectos divulgativos sobre el pensamiento, la obra y la vida del Comandante Ernesto Che Guevara, que utilicen las técnicas más avanzadas de la informática y el mundo digital con el fin de entregarle al espectador ya sea estudioso, simpatizante o simplemente una persona curiosa, con ánimos de conocimientos, una fuente de información fidedigna organizada con rigor científico y basada, principalmente, en los documentos que el Centro de Estudios atesora en sus archivos.\r\nNo es vano recordar que estos documentos son los mismos que constituyeron el núcleo del “Archivo Personal del Comandante Ernesto Che Guevara”, génesis del hoy instituido Centro de Estudios, cuyos fondos fueron reconocidos por la UNESCO en el Programa “Memoria del Mundo” en su categoría internacional. \r\nLa precariedad económica en la que el mundo está inmerso desde hace bastante tiempo, nos obligaba a presentar un proyecto viable, digno y sostenible, cuyo atractivo más significativo fuera el lenguaje estético y, por supuesto, la autenticidad de las diferentes fuentes a utilizar, unida a una cantidad nada despreciable de información inédita —o muy poco divulgada por las razones que fueren―, a lo que se añade una probada metodología de investigación y la pericia y prestigio adquiridos por los investigadores de nuestro Centro, todo lo cual aporta una contribución sustantiva al contenido de la propuesta y al proyecto en sí. Seguidamente nos dimos a la tarea de encontrar a las entidades o personas adecuadas que lo asumieran como una concepción factible y merecedora de apoyo.\r\nTomando como antecedente los inicios de una experiencia similar con la empresa italiana Studio-Azurro, se decidió que la cuestión estética y de diseño corriera a cargo de Simmetrico, sociedad italiana convertida en uno de nuestros compañeros de aventura, que junto a la empresa cubana RTV Comercial, adscrita al ICRT, y la entidad productora ALMA —creada expresamente para administrar y dirigir esta sustantiva empresa y que, en estos momentos, ya tiene la responsabilidad de llevar a buen puerto la muestra—, han sido verdaderos baluartes en ese proyecto. \r\nAsí las cosas, se dieron una serie de encuentros donde se discutieron propuestas que conjugaban las diferentes visones e intereses de las partes. Debido a la urgente necesidad de concretar una de las tantas posibilidades que brindan este tipo de tecnologías, se acordó la creación de un espacio digital cerrado que no es más que una especie de base de datos muy completa a cuyo contenido el espectador puede acceder interactuando con diversos programas inteligentes en un escenario integrado a un fondo sugerente y coherente que, a la vez, contextualiza. En suma, sería como visitar una galería de arte o un museo que concentra la atención en la obra, la vida y el pensamiento del Che. En este sentido, entre las ventajas de un montaje en su mayoría virtual, se encuentra indiscutiblemente el hecho de que permite hacer de la muestra un proyecto itinerante, con lo que se suma a la exposición Che fotógrafo —también coordinada por nuestro Centro―, en ese empeño de llevar el legado del Che a los más disímiles lugares y públicos. \r\nLa exposición\r\nLuego de más de dos años de intenso trabajo y en un contexto que hemos considerado puente entre una fecha estremecedora como lo fue el aniversario 50 del asesinato del Che en Bolivia y la víspera de las celebraciones por los 90 años de su natalicio, el pasado 5 de diciembre se inauguró la muestra en “La Fábrica del Vapor” de Milán, Italia, bajo el sugerente título «Tú y todos», fragmento extraído de un poema que el Che escribiera a su compañera Aleida March ante su inminente partida a Bolivia. De esta manera comenzó la exposición su periplo por el mundo. \r\nCon este título, que funciona además como interpelación al espectador, la muestra busca la interacción constante, pues la profusión y diversidad de la información que se brinda requiere en gran medida de la búsqueda y la curiosidad del visitante. Como es lógico imaginar, la responsabilidad en la organización y selección del contenido recayó mayormente sobre los hombros del Centro de Estudios Che Guevara, que concentró el mismo fundamentalmente en los documentos históricos que guardan los archivos que nos prestigian — con énfasis en elementos que resultan inéditos o muy poco conocidos, en este último caso por el limitado alcance que han tenido sus publicaciones o el espacio reducido en el que se han dado a conocer―, en los materiales obtenidos de la colaboración de un número indeterminado de entidades cubanas y extranjeras y en la experiencia acumulada en los años de investigación minuciosa del legado guevariano. Asimismo, participaron las universidades de Milán y La Habana que hicieron función de consultantes, sobre todo, en lo referente a la contextualización del marco histórico en el que se desarrolló la vida y obra del Che.\r\nLa historia del Che es enigmática y sorprendente, por eso tiene garantizado la expectación del público en cualquier proyecto que la presente parcial o, como en este caso, sin escatimar en detalles. El actual proyecto es sumamente interesante, sobre todo, porque traza diáfanamente el recuento de una vida que surge desde un punto muy común y se va perfilando en una manera de ser muy singular. Este camino muchas veces mostrado por el mismo Ernesto o Che, según sea la etapa que se trate, nos lleva de la mano a caminar por la intimidad, por el pensamiento más profundo, por la epopeya más gloriosa y nos permite trascender el tiempo y acompañar a nuestro anfitrión por este museo de su vida, la que inspira a tantos.\r\nAmén de la intensidad del contenido, organizado digamos desde una perspectiva cronológica, gracias a la estética cuidadosa con que ha sido diseñada la muestra, hay un equilibrio entre lo histórico — sustentado por los hechos descritos a través de documentos, imágenes, videos y audios― y lo emotivo, que se concentra en los diferentes registros de voces, testimonios o narraciones que fluyen en una atmósfera donde la música, como banda sonora, juega un papel relevante. La carga emocional converge, fundamentalmente, en tres estancias que remiten, de un modo más íntimo, al desarrollo interior del pensamiento del Che. \r\nComo colofón, el recorrido desemboca en una base de datos complementaria, organizada temáticamente de acuerdo a la estética y funcionalidad de un archivo tradicional, en el que el espectador puede profundizar con más detenimiento y detalles en la información que brinda la muestra, ya sea por un interés particular o porque, debido a cuestiones curatoriales, quedaron fuera de la exposición central, pero para nada carecen de interés histórico. La necesidad de este espacio permite hacerse una idea de las dimensiones de la documentación aportada por el Centro de Estudios y las instituciones convocadas por este. A dicha sala la acompaña además una sala de proyecciones que proyecta continuamente, a manera de collage, clips de videos relacionados con momentos cumbres de la Revolución Cubana, íntimamente unidos al accionar revolucionario del Che y su participación en la construcción de la sociedad nueva, que acercan al espectador al entusiasmo y la movilización colectiva que signaron los años posteriores al triunfo de 1959 en Cuba. \r\nNo es ocioso insistir en la significación de este proyecto en tanto deja al alcance de todos, una fuente auténtica y fidedigna de conocimiento acerca de la vida y obra del Che, lo que permite, haciendo buen uso de ella, aclarar muchas dudas no pocas veces creadas artificiosamente y de mala fe para denigrar las causas defendidas por el Che y, por lo tanto, su persona.\r\nLa inauguración el pasado 5 de diciembre está lejos, sin embargo, de ser el fin del proyecto, en tanto la exposición está concebida como un producto inacabado, pues otra de las ventajas que brinda el soporte digital es la de ir modificando el esquema expositivo en la medida en que la interacción con el espectador así lo muestre necesario o se decidan incluir nuevos fondos documentales o, incluso, porque quiera enfatizarse determinada arista de la vida y obra del Che en función de la fecha y el lugar en que se exponga.\r\nPerspectivas \r\nUna importancia innegable de esta exposición, es el hecho de servir de base, antecedente o punto de partida a proyectos similares que, recalcamos, son prioridad del Centro de Estudios pues permiten una comprensión más íntegra y profunda de la vida y la impronta del Che — que, naturalmente, es imposible de separar y difícil de entender sin la circunstancia que significó la Revolución Cubana― sobre todo para las más jóvenes generaciones, por lo que representa en la lucha por alcanzar la emancipación de los seres humanos. \r\nPor ello este Centro de Estudios hace énfasis en el tema y busca la ayuda de las tecnologías más modernas. Entendemos que hay una enorme gama de posibilidades y, aunque no renunciamos a ninguna, por fuerza, nos vemos en la obligación de priorizar proyectos determinados. En estos momentos estamos a la espera de nuevas propuestas y nos interesaría explorar con urgencia la realidad virtual o aumentada, los juegos didácticos tecnológicamente avanzados, animados y series documentales, las diversas formas de publicaciones en formatos no clásicos, etc.\r\nPara nuestro país esta pudiera ser también una oportunidad de estudiar con seriedad las posibilidades reales que brindan estos medios a la educación y la influencia o alcance que pudieran tener sobre la conducta y el estado socioemocional de los que interactúan con dichas tecnologías. Los resultados nos permitirían saber con mayor seguridad si es o no un acierto.\r\nEsperamos continuar este interesante capítulo que hemos abierto con el proyecto “Tú y Todos” en aras de perpetuar el estudio y conocimiento de la obra imperecedera del Che, yendo por caminos poco trillados y bajo el estímulo de la curiosidad científica para sondear nuevas formas y contribuir con el desarrollo de la sociedad a la manera inconforme y siempre racional del Che, quien nos empuja cada día por estos horizontes, con todas sus razones.\r\n', 'Artículo, Camilo, Museo', 'Provisional', 'ariet@enet.cu', 'Provisional'),
(44, 1, 1, 'Artículo Museo Digital Camilo', '2021-06-02', 'Provisional', 'El trabajo del Centro de Estudios Che Guevara se divide, en la práctica, en dos áreas principales, una científica, dedicada a la investigación y todo aquello que concierne al mundo académico, y otra divulgativa, que obtiene primordialmente de la primera los contenidos para llevar a cabo todos los proyectos que le atañen.  ', 'El trabajo del Centro de Estudios Che Guevara se divide, en la práctica, en dos áreas principales, una científica, dedicada a la investigación y todo aquello que concierne al mundo académico, y otra divulgativa, que obtiene primordialmente de la primera los contenidos para llevar a cabo todos los proyectos que le atañen.  \r\nLa divulgación es un acto que necesita de constante renovación y esfuerzos, porque los tiempos y los medios son muy cambiantes y para llegar adecuadamente a un posible interesado, que vive una nueva época repleta de tentaciones, muchas de ellas, vanas, hay que llegar de forma más directa, por lo que muchas veces se debe ser un tanto agresivo y se debe tratar de generar un material auténtico, audaz y revolucionario.\r\nPor tal motivo, desde hace algún tiempo el Centro de Estudios Che Guevara ha estado enfrascado en la búsqueda de colaboradores potenciales para la realización de proyectos divulgativos sobre el pensamiento, la obra y la vida del Comandante Ernesto Che Guevara, que utilicen las técnicas más avanzadas de la informática y el mundo digital con el fin de entregarle al espectador ya sea estudioso, simpatizante o simplemente una persona curiosa, con ánimos de conocimientos, una fuente de información fidedigna organizada con rigor científico y basada, principalmente, en los documentos que el Centro de Estudios atesora en sus archivos.\r\nNo es vano recordar que estos documentos son los mismos que constituyeron el núcleo del “Archivo Personal del Comandante Ernesto Che Guevara”, génesis del hoy instituido Centro de Estudios, cuyos fondos fueron reconocidos por la UNESCO en el Programa “Memoria del Mundo” en su categoría internacional. \r\nLa precariedad económica en la que el mundo está inmerso desde hace bastante tiempo, nos obligaba a presentar un proyecto viable, digno y sostenible, cuyo atractivo más significativo fuera el lenguaje estético y, por supuesto, la autenticidad de las diferentes fuentes a utilizar, unida a una cantidad nada despreciable de información inédita —o muy poco divulgada por las razones que fueren―, a lo que se añade una probada metodología de investigación y la pericia y prestigio adquiridos por los investigadores de nuestro Centro, todo lo cual aporta una contribución sustantiva al contenido de la propuesta y al proyecto en sí. Seguidamente nos dimos a la tarea de encontrar a las entidades o personas adecuadas que lo asumieran como una concepción factible y merecedora de apoyo.\r\nTomando como antecedente los inicios de una experiencia similar con la empresa italiana Studio-Azurro, se decidió que la cuestión estética y de diseño corriera a cargo de Simmetrico, sociedad italiana convertida en uno de nuestros compañeros de aventura, que junto a la empresa cubana RTV Comercial, adscrita al ICRT, y la entidad productora ALMA —creada expresamente para administrar y dirigir esta sustantiva empresa y que, en estos momentos, ya tiene la responsabilidad de llevar a buen puerto la muestra—, han sido verdaderos baluartes en ese proyecto. \r\nAsí las cosas, se dieron una serie de encuentros donde se discutieron propuestas que conjugaban las diferentes visones e intereses de las partes. Debido a la urgente necesidad de concretar una de las tantas posibilidades que brindan este tipo de tecnologías, se acordó la creación de un espacio digital cerrado que no es más que una especie de base de datos muy completa a cuyo contenido el espectador puede acceder interactuando con diversos programas inteligentes en un escenario integrado a un fondo sugerente y coherente que, a la vez, contextualiza. En suma, sería como visitar una galería de arte o un museo que concentra la atención en la obra, la vida y el pensamiento del Che. En este sentido, entre las ventajas de un montaje en su mayoría virtual, se encuentra indiscutiblemente el hecho de que permite hacer de la muestra un proyecto itinerante, con lo que se suma a la exposición Che fotógrafo —también coordinada por nuestro Centro―, en ese empeño de llevar el legado del Che a los más disímiles lugares y públicos. \r\nLa exposición\r\nLuego de más de dos años de intenso trabajo y en un contexto que hemos considerado puente entre una fecha estremecedora como lo fue el aniversario 50 del asesinato del Che en Bolivia y la víspera de las celebraciones por los 90 años de su natalicio, el pasado 5 de diciembre se inauguró la muestra en “La Fábrica del Vapor” de Milán, Italia, bajo el sugerente título «Tú y todos», fragmento extraído de un poema que el Che escribiera a su compañera Aleida March ante su inminente partida a Bolivia. De esta manera comenzó la exposición su periplo por el mundo. \r\nCon este título, que funciona además como interpelación al espectador, la muestra busca la interacción constante, pues la profusión y diversidad de la información que se brinda requiere en gran medida de la búsqueda y la curiosidad del visitante. Como es lógico imaginar, la responsabilidad en la organización y selección del contenido recayó mayormente sobre los hombros del Centro de Estudios Che Guevara, que concentró el mismo fundamentalmente en los documentos históricos que guardan los archivos que nos prestigian — con énfasis en elementos que resultan inéditos o muy poco conocidos, en este último caso por el limitado alcance que han tenido sus publicaciones o el espacio reducido en el que se han dado a conocer―, en los materiales obtenidos de la colaboración de un número indeterminado de entidades cubanas y extranjeras y en la experiencia acumulada en los años de investigación minuciosa del legado guevariano. Asimismo, participaron las universidades de Milán y La Habana que hicieron función de consultantes, sobre todo, en lo referente a la contextualización del marco histórico en el que se desarrolló la vida y obra del Che.\r\nLa historia del Che es enigmática y sorprendente, por eso tiene garantizado la expectación del público en cualquier proyecto que la presente parcial o, como en este caso, sin escatimar en detalles. El actual proyecto es sumamente interesante, sobre todo, porque traza diáfanamente el recuento de una vida que surge desde un punto muy común y se va perfilando en una manera de ser muy singular. Este camino muchas veces mostrado por el mismo Ernesto o Che, según sea la etapa que se trate, nos lleva de la mano a caminar por la intimidad, por el pensamiento más profundo, por la epopeya más gloriosa y nos permite trascender el tiempo y acompañar a nuestro anfitrión por este museo de su vida, la que inspira a tantos.\r\nAmén de la intensidad del contenido, organizado digamos desde una perspectiva cronológica, gracias a la estética cuidadosa con que ha sido diseñada la muestra, hay un equilibrio entre lo histórico — sustentado por los hechos descritos a través de documentos, imágenes, videos y audios― y lo emotivo, que se concentra en los diferentes registros de voces, testimonios o narraciones que fluyen en una atmósfera donde la música, como banda sonora, juega un papel relevante. La carga emocional converge, fundamentalmente, en tres estancias que remiten, de un modo más íntimo, al desarrollo interior del pensamiento del Che. \r\nComo colofón, el recorrido desemboca en una base de datos complementaria, organizada temáticamente de acuerdo a la estética y funcionalidad de un archivo tradicional, en el que el espectador puede profundizar con más detenimiento y detalles en la información que brinda la muestra, ya sea por un interés particular o porque, debido a cuestiones curatoriales, quedaron fuera de la exposición central, pero para nada carecen de interés histórico. La necesidad de este espacio permite hacerse una idea de las dimensiones de la documentación aportada por el Centro de Estudios y las instituciones convocadas por este. A dicha sala la acompaña además una sala de proyecciones que proyecta continuamente, a manera de collage, clips de videos relacionados con momentos cumbres de la Revolución Cubana, íntimamente unidos al accionar revolucionario del Che y su participación en la construcción de la sociedad nueva, que acercan al espectador al entusiasmo y la movilización colectiva que signaron los años posteriores al triunfo de 1959 en Cuba. \r\nNo es ocioso insistir en la significación de este proyecto en tanto deja al alcance de todos, una fuente auténtica y fidedigna de conocimiento acerca de la vida y obra del Che, lo que permite, haciendo buen uso de ella, aclarar muchas dudas no pocas veces creadas artificiosamente y de mala fe para denigrar las causas defendidas por el Che y, por lo tanto, su persona.\r\nLa inauguración el pasado 5 de diciembre está lejos, sin embargo, de ser el fin del proyecto, en tanto la exposición está concebida como un producto inacabado, pues otra de las ventajas que brinda el soporte digital es la de ir modificando el esquema expositivo en la medida en que la interacción con el espectador así lo muestre necesario o se decidan incluir nuevos fondos documentales o, incluso, porque quiera enfatizarse determinada arista de la vida y obra del Che en función de la fecha y el lugar en que se exponga.\r\nPerspectivas \r\nUna importancia innegable de esta exposición, es el hecho de servir de base, antecedente o punto de partida a proyectos similares que, recalcamos, son prioridad del Centro de Estudios pues permiten una comprensión más íntegra y profunda de la vida y la impronta del Che — que, naturalmente, es imposible de separar y difícil de entender sin la circunstancia que significó la Revolución Cubana― sobre todo para las más jóvenes generaciones, por lo que representa en la lucha por alcanzar la emancipación de los seres humanos. \r\nPor ello este Centro de Estudios hace énfasis en el tema y busca la ayuda de las tecnologías más modernas. Entendemos que hay una enorme gama de posibilidades y, aunque no renunciamos a ninguna, por fuerza, nos vemos en la obligación de priorizar proyectos determinados. En estos momentos estamos a la espera de nuevas propuestas y nos interesaría explorar con urgencia la realidad virtual o aumentada, los juegos didácticos tecnológicamente avanzados, animados y series documentales, las diversas formas de publicaciones en formatos no clásicos, etc.\r\nPara nuestro país esta pudiera ser también una oportunidad de estudiar con seriedad las posibilidades reales que brindan estos medios a la educación y la influencia o alcance que pudieran tener sobre la conducta y el estado socioemocional de los que interactúan con dichas tecnologías. Los resultados nos permitirían saber con mayor seguridad si es o no un acierto.\r\nEsperamos continuar este interesante capítulo que hemos abierto con el proyecto “Tú y Todos” en aras de perpetuar el estudio y conocimiento de la obra imperecedera del Che, yendo por caminos poco trillados y bajo el estímulo de la curiosidad científica para sondear nuevas formas y contribuir con el desarrollo de la sociedad a la manera inconforme y siempre racional del Che, quien nos empuja cada día por estos horizontes, con todas sus razones.\r\n', 'Artículo, Camilo, Museo', 'Provisional', 'ariet@enet.cu', 'Provisional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia_archivo`
--

DROP TABLE IF EXISTS `noticia_archivo`;
CREATE TABLE IF NOT EXISTS `noticia_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_noticia` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 NOT NULL,
  `portada` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_noticia_archivo` (`id`),
  KEY `fk_noticia` (`id_noticia`),
  KEY `fk_archivo` (`id_archivo`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `noticia_archivo`
--

INSERT INTO `noticia_archivo` (`id`, `id_noticia`, `id_archivo`, `nota`, `portada`) VALUES
(16, 43, 74, '', 1),
(17, 43, 74, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia_comentario`
--

DROP TABLE IF EXISTS `noticia_comentario`;
CREATE TABLE IF NOT EXISTS `noticia_comentario` (
  `id_noticia_comentario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `autor` varchar(64) CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text CHARACTER SET latin1 NOT NULL,
  `id_noticia` int(11) NOT NULL,
  PRIMARY KEY (`id_noticia_comentario`),
  UNIQUE KEY `id_noticia_comentario` (`id_noticia_comentario`),
  KEY `fk_noticia_comentario` (`id_noticia`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros`
--

DROP TABLE IF EXISTS `otros`;
CREATE TABLE IF NOT EXISTS `otros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(4) NOT NULL,
  `publico` tinyint(4) NOT NULL,
  `titulo` varchar(512) CHARACTER SET utf8mb4 NOT NULL,
  `autor` varchar(512) CHARACTER SET utf8mb4 NOT NULL,
  `tipo` varchar(512) CHARACTER SET utf8mb4 NOT NULL,
  `enlace` varchar(1024) CHARACTER SET utf8mb4 DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `otros`
--

INSERT INTO `otros` (`id`, `revisado`, `publico`, `titulo`, `autor`, `tipo`, `enlace`, `descripcion`) VALUES
(2, 1, 0, 'asdfghjk', 'sdfghjkoiuytr', 'rtyuiopoiuytre', 'rtyuioppoiuytre', 'ertyuioppoiuytre'),
(3, 0, 0, 'sdfghjk', 'fghjkl', 'dfghjkk', 'asdfgh', 'sdfghjjhg'),
(4, 0, 1, 'jfhdgsfad', 'gfhdgsfadas', 'ljklhjkghjgff', 'jkhjghjgff', 'lj.khj,gfndfbdf'),
(5, 0, 0, 'asf', 'asf', 'dfghjkk', 'dsfsdf', 'asfas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros_archivo`
--

DROP TABLE IF EXISTS `otros_archivo`;
CREATE TABLE IF NOT EXISTS `otros_archivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_otros` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `portada` tinyint(4) NOT NULL,
  `nota` text CHARACTER SET utf8mb4,
  PRIMARY KEY (`id`),
  KEY `fk_otros_archivo` (`id_otros`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `otros_archivo`
--

INSERT INTO `otros_archivo` (`id`, `id_otros`, `id_archivo`, `portada`, `nota`) VALUES
(1, 2, 44, 1, ''),
(2, 3, 44, 1, ''),
(4, 4, 51, 1, ''),
(5, 5, 44, 1, NULL),
(6, 5, 48, 0, NULL),
(7, 5, 51, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paradigma`
--

DROP TABLE IF EXISTS `paradigma`;
CREATE TABLE IF NOT EXISTS `paradigma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text CHARACTER SET utf8mb4 NOT NULL,
  `enlace` text CHARACTER SET utf8mb4,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `paradigma`
--

INSERT INTO `paradigma` (`id`, `descripcion`, `enlace`) VALUES
(1, 'Esta es la descripción que se va a mostrar, solamente puede ser modificada, no eliminada ni creada.', 'Campo 100% opcionar, en estos momentos no está creada la página con la revista online, por tanto no es necessario rellenar este campo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paradigma_archivo`
--

DROP TABLE IF EXISTS `paradigma_archivo`;
CREATE TABLE IF NOT EXISTS `paradigma_archivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `paradigma_archivo`
--

INSERT INTO `paradigma_archivo` (`id`, `url`) VALUES
(1, 'paradigma/14031.png'),
(2, 'paradigma/20239.png'),
(3, 'paradigma/67304.png'),
(4, 'paradigma/67766.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_audiovisual`
--

DROP TABLE IF EXISTS `producto_audiovisual`;
CREATE TABLE IF NOT EXISTS `producto_audiovisual` (
  `id_producto_audiovisual` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  `productora` text CHARACTER SET latin1 NOT NULL,
  `autor` text CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id_producto_audiovisual`),
  UNIQUE KEY `id_producto_audiovisual` (`id_producto_audiovisual`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `producto_audiovisual`
--

INSERT INTO `producto_audiovisual` (`id_producto_audiovisual`, `revisado`, `publico`, `titulo`, `descripcion`, `cuerpo`, `productora`, `autor`, `fecha`, `tipo`) VALUES
(1, 1, 0, 'asdgdas', 'asdg', 'asdg', 'asdg', 'asdg', '2021-05-05', 2),
(2, 1, 0, 'qwerr', 'qwetq', 'wetqwe', 'qwet', 'qwer', '2021-05-21', 1),
(3, 0, 1, 'qwef', 'qwerqwer', '', 'wqefqw', 'fagg', '2021-05-27', 2),
(4, 0, 1, 'qwef', 'qwerqwer', '', 'wqefqw', 'fagg', '2021-05-27', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_audiovisual_archivo`
--

DROP TABLE IF EXISTS `producto_audiovisual_archivo`;
CREATE TABLE IF NOT EXISTS `producto_audiovisual_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_producto_audiovisual` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `portada` tinyint(4) NOT NULL,
  `nota` text CHARACTER SET latin1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_producto_audiovisual_archivo` (`id`),
  KEY `fk_producto_audiovisual` (`id_producto_audiovisual`),
  KEY `fk_archivo` (`id_archivo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `producto_audiovisual_archivo`
--

INSERT INTO `producto_audiovisual_archivo` (`id`, `id_producto_audiovisual`, `id_archivo`, `portada`, `nota`) VALUES
(1, 1, 46, 0, ''),
(2, 2, 44, 0, 'qwet'),
(3, 3, 44, 0, NULL),
(4, 4, 44, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
CREATE TABLE IF NOT EXISTS `proyecto` (
  `id_proyecto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `enlace` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_proyecto`),
  UNIQUE KEY `id_proyecto` (`id_proyecto`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `descripcion`, `enlace`) VALUES
(1, 'Nuevo', 'Nuevo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_archivo`
--

DROP TABLE IF EXISTS `proyecto_archivo`;
CREATE TABLE IF NOT EXISTS `proyecto_archivo` (
  `id_proyecto_archivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_archivo` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  PRIMARY KEY (`id_proyecto_archivo`),
  UNIQUE KEY `id_proyecto_archivo` (`id_proyecto_archivo`),
  KEY `fk_archivo` (`id_archivo`),
  KEY `fk_proyecto` (`id_proyecto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_comentario`
--

DROP TABLE IF EXISTS `proyecto_comentario`;
CREATE TABLE IF NOT EXISTS `proyecto_comentario` (
  `id_proyecto_comentario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `autor` text CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text CHARACTER SET latin1 NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  PRIMARY KEY (`id_proyecto_comentario`),
  UNIQUE KEY `id_proyecto_comentario` (`id_proyecto_comentario`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quienes`
--

DROP TABLE IF EXISTS `quienes`;
CREATE TABLE IF NOT EXISTS `quienes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text CHARACTER SET utf8mb4 NOT NULL,
  `extra` text CHARACTER SET utf8mb4,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `quienes`
--

INSERT INTO `quienes` (`id`, `descripcion`, `extra`) VALUES
(1, 'Descripción General Nueva', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quienes_archivo`
--

DROP TABLE IF EXISTS `quienes_archivo`;
CREATE TABLE IF NOT EXISTS `quienes_archivo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` text CHARACTER SET utf8mb4 NOT NULL,
  `extra` text CHARACTER SET utf8mb4,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `quienes_archivo`
--

INSERT INTO `quienes_archivo` (`id`, `url`, `extra`) VALUES
(1, 'quienes_somos/80216.png', NULL),
(2, 'quienes_somos/5206.png', NULL),
(3, 'quienes_somos/27317.png', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revista`
--

DROP TABLE IF EXISTS `revista`;
CREATE TABLE IF NOT EXISTS `revista` (
  `id_revista` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo` varchar(256) CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `enlace` text CHARACTER SET latin1 NOT NULL,
  `numero` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `volumen` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id_revista`),
  UNIQUE KEY `id_revista` (`id_revista`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `revista`
--

INSERT INTO `revista` (`id_revista`, `revisado`, `publico`, `titulo`, `descripcion`, `enlace`, `numero`, `volumen`, `fecha`) VALUES
(9, 1, 0, 'dfghjkl', 'adsdfghjhgfd', 'dfgfds', '2019', 'X', '2021-06-09'),
(10, 1, 1, 'asdfghjk', 'asdfgtyuio', 'ertyuiop', '2020', 'XI', '2021-06-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revista_archivo`
--

DROP TABLE IF EXISTS `revista_archivo`;
CREATE TABLE IF NOT EXISTS `revista_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_revista` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_revista_archivo` (`id`),
  KEY `fk_revista` (`id_revista`),
  KEY `fk_archivo` (`id_archivo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revista_comentario`
--

DROP TABLE IF EXISTS `revista_comentario`;
CREATE TABLE IF NOT EXISTS `revista_comentario` (
  `id_revista_comentario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `autor` varchar(64) CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text CHARACTER SET latin1 NOT NULL,
  `id_revista` int(11) NOT NULL,
  PRIMARY KEY (`id_revista_comentario`),
  UNIQUE KEY `id_revista_comentario` (`id_revista_comentario`),
  KEY `fk_revista_comentario` (`id_revista`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

DROP TABLE IF EXISTS `taller`;
CREATE TABLE IF NOT EXISTS `taller` (
  `id_taller` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `publico` tinyint(4) NOT NULL,
  `revisado` tinyint(4) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `contacto` text CHARACTER SET latin1,
  `encargado` text CHARACTER SET latin1 NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id_taller`),
  UNIQUE KEY `id_taller` (`id_taller`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`id_taller`, `publico`, `revisado`, `nombre`, `descripcion`, `contacto`, `encargado`, `tipo`) VALUES
(13, 1, 1, 'Taller de Ajedrez', 'Fue otras de las aficiones preferidas por Ernesto desde su infancia.\r\nA partir de enero de 1959 se convierte en el dirigente revolucionario que más lo impulsa en el paнs.\r\nOrganiza competencias nacionales e internacionales.\r\nApuesta por su estudio desde edades tempranas.', 'ariet@enet.cu', 'John Doe', 1),
(14, 1, 1, 'Taller de Fotografía', 'Se apoya en la obra fotogrбfica desarrollada por el propio Che desde sus aсos de juventud y que ampliara con posterioridad a enero de 1959 de manera consustancial a sus deberes como dirigente.', 'ariet@enet.cu', 'Provisional', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller_archivo`
--

DROP TABLE IF EXISTS `taller_archivo`;
CREATE TABLE IF NOT EXISTS `taller_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_taller` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1,
  `portada` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_taller_archivo` (`id`),
  KEY `fk_taller` (`id_taller`),
  KEY `fk_archivo` (`id_archivo`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `taller_archivo`
--

INSERT INTO `taller_archivo` (`id`, `id_taller`, `id_archivo`, `nota`, `portada`) VALUES
(11, 13, 68, '', 0),
(12, 13, 71, NULL, NULL),
(13, 13, 69, NULL, NULL),
(14, 14, 72, '', 0),
(15, 14, 73, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller_comentario`
--

DROP TABLE IF EXISTS `taller_comentario`;
CREATE TABLE IF NOT EXISTS `taller_comentario` (
  `id_taller_comentario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `autor` varchar(64) CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text CHARACTER SET latin1 NOT NULL,
  `id_taller` int(11) NOT NULL,
  PRIMARY KEY (`id_taller_comentario`),
  UNIQUE KEY `id_taller_comentario` (`id_taller_comentario`),
  KEY `fk_taller_comentario` (`id_taller`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonio`
--

DROP TABLE IF EXISTS `testimonio`;
CREATE TABLE IF NOT EXISTS `testimonio` (
  `id_testimonio` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` text COLLATE utf8_bin NOT NULL,
  `autor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `cuerpo` text COLLATE utf8_bin NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_testimonio`),
  UNIQUE KEY `id_testimonio` (`id_testimonio`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `testimonio`
--

INSERT INTO `testimonio` (`id_testimonio`, `titulo`, `autor`, `fecha`, `descripcion`, `cuerpo`, `revisado`, `publico`) VALUES
(9, 'Activa y revolucionaria diplomacia. Nuestros días junto al Che', 'Héctor Rodríguez Llompart; Benigno Regueiro; Arnol Rodríguez Camps; José Fernández de Cossío Rodríguez', '1959-12-16', 'Palabras expresadas por uno de los testimoniantes y descritas en sus memorias acerca de las experiencias vividas junto al Che, en momentos significativos de la Revolución. Héctor Rodríguez Llompart y Benigno Regueiro explican detalles sobre sus vivencias en un histórico viaje que marcaría nuestro futuro: el establecimiento de relaciones diplomáticas y comerciales con los países socialistas y la firma de los primeros convenios en 1960. ', 'Otro de los testimonios nos lleva de la mano a través de lo narrado por Arnol Rodríguez Camps, quien en los años 60 fuera Viceministro de Relaciones Exteriores, coincidiendo con el Che en el recorrido que este hiciera por África en 1965, antes de emprender la lucha internacionalista en el Congo.  \r\nFinalmente, el testimonio de José Fernández de Cossío Rodríguez, como miembro de la delegación cubana a la sesión de la XIX Asamblea General de la ONU.\r\nMatizados por circunstancias y diferencias en los propósitos que se debían alcanzar, sin dudas el contenido de las valoraciones expuestas forma parte de una Memoria histórica sustancial dentro de la nueva diplomacia instaurada por la Revolución Cubana.\r\nMisión económica a los países socialistas\r\nCómo conocimos al Che\r\nRodríguez Llompart: Yo conocí al Comandante Guevara en La Cabaña, en los primeros días del triunfo de la Revolución. Lo vi un día y lo único que se me ocurrió decirle es que a su paso por Matanzas para trasladarse a La Habana me hubiera gustado saludarlo, pero no pude por la premura de la marcha, solo alcancé a saludar a Camilo. Por supuesto, con la ironía que lo caracterizaba, me dijo que no me había perdido mucho, así entre mi nerviosismo y su tranquilidad se produjo nuestro primer contacto, sin pena ni gloria.\r\nCon posterioridad, comencé a trabajar en el entonces Ministerio de Estado, actual Ministerio de Relaciones Exteriores, primero como Jefe de Despacho y después como Viceministro, donde por lógica mantuve más contactos con el Che. En noviembre de 1959 fui llamado a Palacio para realizar una misión en México y entrevistarme con el Primer Viceministro de la URSS, Anastas Mikoyan, quien se encontraba en Ciudad México al frente de una exposición sobre la técnica y la ciencia soviética. En esa reunión participó el Che. \r\nLlevaba conmigo una carta de invitación firmada por el Comandante en Jefe, Fidel Castro, pidiéndole que trajera la exposición a Cuba. La respuesta fue positiva a partir de las consultas realizadas por Mikoyan a su Gobierno y al Partido de su país.\r\nAl llegar a La Habana me personé en Palacio, donde de nuevo se encontraba el Che. De inmediato recibí instrucciones de retornar a México para pedirle a Mikoyan posponer su llegada a Cuba porque en esos día se iba a celebrar un congreso eucarístico nacional y su presencia podía interpretarse como una provocación de la Revolución. Esas razones fueron aceptadas por Mikoyan sin ningún contratiempo, el 4 de febrero de 1960 llegaba y al día siguiente se inauguraba la exposición, para dar paso con posterioridad, a la firma del primer convenio cubano-soviético suscrito, a los que sucederían otros en la medida que se recrudecían las represalias de Estados Unidos por las medidas radicales adoptadas por la Revolución, además de establecer relaciones diplomáticas con la casi totalidad de los países socialistas. \r\nEn octubre de ese año, recibí una llamada del Banco Nacional con el objetivo de prepararme para salir con una delegación presidida por el Che a los países socialistas. No recuerdo haberme entrevistado con el Che antes de partir.\r\nBenigno Regueiro: A mediados de 1959 me incorporo a la delegación cubana que viajaba al Festival de la Juventud y los Estudiantes celebrado en Viena, de ahí me invitan a la URSS y de regreso, sin imaginarlo, tuve mi primer contacto con el Che. Regresamos por España para tomar el avión de Cubana de Aviación y allí nos comunican que hasta dentro de 15 días no había vuelos. Sin dinero acudimos a la Embajada de Cuba para hablar con el embajador, personaje célebre de la dictadura, el que se negó a ayudarnos.\r\nPara nuestra suerte, en esos momentos el Che regresaba de su recorrido por países del Pacto de Bandung y lo fuimos a ver. De inmediato llamó al embajador para exigirle que debía asumir los gastos de nuestra estancia. Así se produjo mi primer contacto con el Che, al que no pensaba volver a ver, sin embargo, cuando regresé me habían expulsado de mi trabajo por comunista, era profesor de la Havanna Business Academy.\r\nAl quedarme sin empleo, contacto con compañeros de la juventud socialista, quienes me propusieron trabajar en el Departamento de Industrialización del INRA, dirigido por el Che, aunque aún no estaba nombrado oficialmente. \r\nComienzo en la secretaría del Comandante y aunque me utilizaban para muchas tareas, fundamentalmente el Che me empleaba como traductor de inglés en las innumerables visitas que recibía y en otras de recorrido por provincias con acompañantes de interés.\r\nCon posterioridad, a fines de 1959 o principios de 1960, me nombra Director del Banco de Comercio Exterior del Departamento de Industrialización. Recuerdo que un día me pregunta cómo se desarrollaban las reuniones, lo que se hacía y le explico que después se almorzaba. Ahí me interroga cómo era el almuerzo, le contesté que lo traían de un restaurante y ahí se acabó todo, diciéndome que con mi condescendencia había perjudicado a los compañeros.\r\nDespués, fui nombrado subdirector administrativo del Instituto Cubano de la Minería, del que no sabía nada, pero tenía la orden de coordinar el trabajo entre los cubanos y los soviéticos que estaban arribando para asesorar en la planta de níquel del norte del oriente del país. Encontrándome en ese trabajo me informan que se estaba organizando un grupo que iba a acompañar al Che en un viaje por los países socialistas y que había sido seleccionado para formar parte de la delegación como representante del Instituto Cubano de la Minería y, además, como secretario de la delegación, lo que fundamentalmente hice porque de minería no sabía nada.\r\nColaboración y primeros convenios con los países socialistas\r\nRodríguez Llompart: La misión económica del Gobierno cubano fue designada mediante un decreto firmado por el Presidente Osvaldo Dorticós, Fidel y el ministro de Relaciones Exteriores, en la que se precisaban los países a recorrer y la composición de la delegación presidida por el Che. En  nuestro caso en particular, a mí me designan como Subsecretario Técnico del MINREX y a Benigno como Subdirector Administrativo del Instituto Cubano de la Minería y como secretario de la Misión. Por supuesto, estaba compuesta por ministros, funcionarios y asesores de diversas instituciones, todos con rango de embajadores extraordinarios y plenipotenciarios.\r\nEl objetivo esencial de la Misión era lograr compromisos de compra por parte de la URSS y otros países socialistas debido a las represalias asumidas por el gobierno de Estados Unidos de no comprar el azúcar cubano y de impedir la entrada de suministros. Para conocer el monto de las necesidades de importación y las especificaciones técnicas de los productos se dio orden al compañero Rafael Moré, trabajador del Departamento de Industrialización del INRA. La orden del Che de elaborar con carácter urgente la lista de necesidades de importación para un año, con la debida discreción.\r\nSe logró, a través de los anuarios Estadísticos de Comercio, la relación de productos que se adquirían en el exterior y en la Aduana de la República se obtuvieron las facturas con las especificaciones técnicas. No obstante, fue difícil conciliar los datos, muchos de los cuales llegaban alterados además de la premura en su confección, elementos que causaron situaciones complejas a lo que se unió el desconocimiento de términos usados en nuestro idioma por parte de los especialistas a los cuales presentamos nuestras demandas.\r\nSalimos rumbo a Moscú el 21 de octubre de 1960, con escala en Praga. Al llegar a Moscú se había convocado a una reunión en la que se contó con la casi totalidad de los ministros de Comercio Exterior de los países socialistas. En esa reunión, el Che planteó la grave situación que enfrentaba la Revolución Cubana ante la agresión imperialista y como tema central la necesidad de colocar en esos mercados el azúcar que Estados Unidos se negaba a comprarnos, además de adquirir productos de importación necesarios a nuestra economía.\r\nDe Moscú nos trasladamos a la República Popular China donde se sostuvieron conversaciones con Mao Tse-tung, Chou En-lai y otros dirigentes. Por limitaciones de tiempo, en Beijing, el Che decide que él visitaría Corea y yo, con parte de la delegación, continuaría hacia Vietnam y posteriormente hacia Mongolia. Como resultado de esas visitas se firmó el establecimiento de relaciones diplomáticas y convenios comerciales, de asistencia técnica y de pagos.\r\nAl finalizar el recorrido, nos volvimos a reunir en Moscú con el Che, donde se concluyeron algunos aspectos pendientes, para trasladarnos a la RDA. En ese trayecto ya el Che debía retornar a La Habana, pero antes realizó una corta visita a Hungría, y a mí, junto con parte de la delegación no orientó continuar hacia Polonia, Hungría, Rumanía, Bulgaria y Albania, con la encomienda de suscribir protocolos de comercio para 1961 y años posteriores.    \r\nDel viaje en su conjunto tenemos anécdotas variadas, unas simpáticas, otras educativas y críticas, pero siempre estimulantes. Encontrándonos en Moscú, el Che insistía en tratar de contratar la mayor cantidad de alimentos y hacía especial énfasis en la carne rusa en lata, por lo que en un momento determinado la degustamos y para la mayoría eran incomibles, unas tenían poca sal o demasiada grasa acorde con nuestro paladar.\r\nEl Comandante oyó con clama nuestras explicaciones y finalmente insistió en contratarlas, advirtiendo que nos sabrían muy bien cuando estuviéramos en las trincheras movilizados. Sin dudas, una observación premonitoria porque muchos tuvimos que comerla en esas condiciones ya que no había otro alimento y nos sabía muy bien.\r\nPuedo agregar una experiencia no tan anecdótica, relacionada con mis funciones dentro de la delegación. Yo era el responsable de revisar los protocolos que se iban a suscribir y al ir a firmar uno de esos documentos en la embajada de Rumania, la traductora se da cuenta de que había errores y que faltaba un párrafo, hubo que suspender la firma para el otro día después de someterlo a revisión y se suspendió el festín que tenían preparado los rumanos. Al salir de la embajada el Che me llamó para que lo acompañara, ni que decir de lo apenado que estaba por lo sucedido, nunca se me olvidará la palabra y el tono que empleó, «fauna», además de las otras cosas que me dijo, yo no sabía qué responder y hasta pensé que me podía enviar de regreso a Cuba.\r\nContinuamos en Moscú unos días hasta que la delegación partiera para Leningrado, yo me vestí, pero al llegar al elevador el Che estaba dentro y me pregunta que a dónde iba, yo por supuesto que le respondo que a Leningrado, pero de inmediato me dice que no yo no iba porque primero tenía que aprender a trabajar. Con esa lección por delante, unos días después la delegación salía para Stalingrado, pero con las cosas que me había dicho pensé que no iba y me quedé durmiendo, de pronto sentí que me halaban la frazada, me molesté, dije unas cuantas malas palabras y cuando me viro me encuentro que el Che estaba frente a mí preguntando si no iba, salí corriendo, me vestí y fui con toda la delegación.\r\nPara finalizar no quisiera omitir algo de lo que me sentí muy orgulloso como cubano, fue exactamente el 7 de noviembre, cuando se celebró en el Kremlin una recepción. Al salir del hotel todos íbamos vestido con nuestros respectivos trajes y el Che salió con su habitual vestimenta y con el pantalón dentro de las botas, se le acerca Alberto Mora para decirle que íbamos para una recepción y el Che le contesta: «Verdad Albertico, esto es protocolo», se sacó el pantalón por fuera y fuimos para la recepción.\r\nEn la recepción había muchos dirigentes de países comunistas, pero en realidad la figura principal fue el Che y la Revolución Cubana, desde que llegamos lo aplaudían, me sentía orgulloso de ser cubano y de estar junto al Comandante, de representar a Cuba y de lo que significaba Fidel para el mundo.\r\nNuestro regreso se produjo un mes después de partir el Che para La Habana, el 21 de enero, culminando una experiencia inolvidable.\r\nBenigno Regueiro: Como ha explicado Héctor, los preparativos fueron muchos y muy intensos, organizando la documentación, basándonos en las estadísticas que existían e incluso se solicitó información a las empresas aun cuando podían proponernos cosas, engañarnos y crearnos problemas en las negociaciones.\r\nEn el viaje recuerdo que me sorprendió y al grupo también oír al Che cantando tangos en el avión antes de llegar a Praga, incluso me atreví a decirle que no cantaba bien, era un ambiente agradable y muy fraternal.\r\nAl llegar a Checoslovaquia recuerdo una anécdota que demuestra la calidad humana del Che, me había dado instrucciones que la dieta era de dos dólares diarios para un café o un refresco. Sin embargo, había un compañero en la delegación que me decía que quería llevarse un pulsito de balas calibre 45 añorado por él toda la vida y que con ese dinero no le alcanzaba para comprarlo. Al principio cuando se lo dije al Che se puso bravo y no quería pero al final lo aceptó como una excepción, advirtiendo que no se hiciera un hábito.\r\nTanto en Checoslovaquia como en Moscú surgieron muchas dificultades con la traducciones del listado de productos, había muchas confusiones, no se entendían las cosas para poder analizar y compatibilizarlas con sus producciones, en verdad pasamos mucho trabajo. \r\nEran experiencias distintas y aunque disfrutábamos la adaptación al frío era muy difícil, cuando fuimos a Leningrado visitamos lugares históricos y hermosos como el Ermitage, el crucero Aurora, en fin una ciudad preciosa que al Che le impresionó mucho.\r\nEn general, el tratamiento a la delegación resultó extraordinario. En Moscú participamos en el desfile del 7 de noviembre y al Che lo situaron en la tribuna donde se ubicaban a los miembros del Buró Político, los jefes militares y representantes del campo socialista. Visitamos también el mausoleo de Lenin y Stalin y presenciamos al ballet ruso.\r\nCon posterioridad, nos dirigimos a China donde nos recibieron masivamente, para todos era algo impresionante, sobre todo al Che le llamaba la atención los niños que se acercaban con ramos de flores, lo abrazaban con muestras de cariño y respeto.\r\nDentro de las visitas que se organizaron recuerdo las intervenciones públicas que hizo el Che con militantes, obreros de diversos sectores. Me pidió que le hiciera la traducción simultánea al inglés, cuando de pronto el Che me mira y no decía nada, pero por la noche me pidió que fuera a su habitación y que le explicara por qué él hablaba tanto y yo solo pronunciaba unas breves palabras. De esa forma le explico que en inglés se acortan más las frases e inmediatamente me dice que con él las cosas no eran así, que le tenía que traducir literalmente y que desde ese momento lo íbamos a escribir, lo que me costó madrugadas enteras dictándome en español y yo traduciendo al inglés, para después leérselo.\r\nVisitamos las comunas apreciando el esfuerzo que realizaban para resolver sus problemas a pesar de lo atrasado de sus tecnologías. Fuimos también a la Gran Muralla y participamos de la recepción ofrecida en Palacio por Chou En-lai y su discurso para ayudar a Cuba a resolver la alimentación, sobre todo en el arroz, al plantear que si cada chino ahorraba una cucharada se garantizaba nuestro consumo. \r\nMención aparte fue la entrevista con Mao Tse-tung, muy fraternal, impresionaba el vasto conocimiento que poseía.\r\nDe China nos dirigimos a Corea, cuya recepción fue mayor, íbamos en un carro descubierto y el pueblo aglomerado a ambos lados del camino. En ese trayecto al Che le impresionó los enormes cráteres a los lados de la carretera a consecuencia de las bombas de la aviación enemiga. Nos llevaron a un lugar donde bajamos por una enorme escalera, un subterráneo, donde se encontraba la dirección en tiempo de guerra, la dirección del partido y el gobierno, para protegerse del enemigo.\r\nDe todo lo presenciado, el Che estaba muy impactado por el espíritu de victoria, por crear las mejores condiciones para el pueblo, se notaba alegría, bailaban e hicieron bailar al Che sus danzas típicas.\r\nDe regreso a Moscú nos trasladamos a la RDA, ya en esos momentos se había construido el muro, era un objetivo de los norteamericanos invertir al otro lado para demostrar las diferencias. \r\nA nuestro regreso se elaboró el informe final del viaje, según mi impresión con los objetivos cumplidos, apoyado en la enorme visión del Che por alcanzar la cooperación con el entonces campo socialista.\r\nMisiones específicas encomendadas por el Che\r\nRodríguez Llompart: Con la disposición y el convencimiento del Che acerca de los resultados que debíamos obtener en la misión encomendada, salimos de Cuba dispuestos a dar lo mejor de nosotros y a sentirnos satisfechos del pequeño aporte que realizamos, sobre todo en haber cumplido los objetivos que llevaba la delegación y todo lo conseguido en los protocolos firmados.\r\nEn mi experiencia personal, a partir de algunas tareas encomendadas por el Che con parte de la delegación mientras él se dirigía a otros países. Recuerdo, creo que fue en Mongolia, que se firma un protocolo por el cual nos compraban mil toneladas de azúcar, en general todos los países de manera simbólica lo hicieron ante el inminente cese de las compras por parte de Estados Unidos.\r\nComo expresé anteriormente, en China el Che me planteó que yo debía viajar a Vietnam para establecer relaciones diplomáticas con ese país, acompañándome en esa misión el Comandante Suñol y Maldonado, en ese momento trabajador del Banco de Comercio Exterior.\r\nEn Vietnam fuimos acogidos de manera formidable por parte del pueblo, incluso me ponen en un aprieto al tener que pasar revista a las tropas. Desde el avión habíamos visto el destacamento y le pedí a Suñol que pasara revista en su condición de militar, pero se negó porque era a mí al que el Che había responsabilizado con la delegación. Fuimos acompañados por el Primer Ministro Phan Van Dom y finalmente establecimos relaciones diplomáticas y suscribimos protocolos de carácter comercial y científico-técnico.\r\nRegresamos a China mientras el Che estaba en Corea, cumpliendo sus orientaciones de proseguir las conversaciones, especialmente con Mao y Chou En-lai, sumándose el ministro de Relaciones Exteriores.\r\nEncontrándome en China recibo la orden del Che de trasladarme a Mongolia con el objetivo de establecer relaciones con ese país al igual que lo estipulado con Vietnam. De Mongolia regresamos a Moscú donde se encontraba el Che esperando con el resto de la delegación. \r\nEncontrándonos en la RDA el Che me comunica que tendría que pasar por Hungría e ir como presidente de la delegación a Polonia, Bulgaria, Rumanía y Albania, además de la visita a Hungría.\r\nMe orientó que en Polonia debía plantear la necesidad de la construcción de un astillero y el crédito para su compra. Le pregunto si había algo más y me dijo: «Si tú no lo supieras no te mandaba». De esa forma visitamos esos países, firmamos los protocolos igual que como lo habíamos aprendido con él, sabíamos cuáles eran sus ideas, sus criterios, y finalmente visitamos Albania, con el que establecimos relaciones tal y como me lo había indicado el Che.\r\nBenigno Regueiro: Comparto con el Che el criterio que ofreció en conferencia por la televisión después de realizado el viaje, de que a pesar de la magnitud de la tarea fueron llevadas con facilidad debido al espíritu con que los gobernantes de los países socialistas lo hicieron, no por motivos económicos sino como un motivo político.\r\nYo diría, como impresión general, a partir de lo que me correspondió realizar como secretario de la misión bajo las órdenes del Che, es que tuvo una visión muy clara acerca de lo que debíamos lograr con el campo socialista para poder llevar acabo nuestro proyecto revolucionario. Su gran visión y la forma en que planteaba garantizar lo más posible que pudiéramos obtener para crear una base que nos permitiera un desarrollo y garantizar al mismo tiempo el suministro de combustible y de alimentos a pesar de nuestras críticas sobre la carne rusa. Me atrevería a decir que sin esa cooperación y sin la visión del Che y Fidel para hacerlas realidad hubiera sido muy difícil mantener la Revolución.\r\nUna vez más reiterar que para todos los que participamos en esa misión, la experiencia fue inolvidable bajo el recuerdo y la entrañable admiración que sentimos por el Che, artífice de esos sucesos de nuestra historia reciente.\r\nUnos días junto al Che\r\nArnol Rodríguez Camps: En febrero de 1965, siendo viceministro de Relaciones Exteriores, sostuve en Argel una reunión con nuestros embajadores acreditados en África, coincidiendo en aquella ciudad con el Che, que había regresado de China para participar en el Segundo Seminario de Solidaridad Afroasiático. El Che veía aquel Seminario con sumo interés por su temario y porque tendría ocasión para dialogar y hermanarse con sus hermanos representantes de aquellas tierras que sentía suyas. Preparaba su discurso con esmerada dedicación, y era que Cuba, como dijera al iniciar sus palabras ante el Seminario, venía a «elevar por sí sola la voz de los pueblos de América».\r\nY aquella voz, voz de América, habría de exponer de un tirón, como quien anda de prisa, aunque sin desespero, análisis y definiciones que estremecieron aquel auditorio y fuera de allí. Habló aquel 24 de febrero en su francés para que lo entendieran mejor: \r\nNo hay fronteras en esta lucha a muerte, no podemos permanecer indiferentes a lo que ocurre en cualquier parte del mundo; una victoria de cualquier país es una victoria nuestra, como la derrota de una nación cualquiera es una derrota de todos.\r\nMartilló aquella sala uncida a sus palabras con un verdadero y novedoso ideario. Fijó nuevas reglas económicas, políticas y sociales, y aseveró: \r\n…deben ponerse en tensión las fuerzas de los países subdesarrollados y tomar firmemente la ruta de la construcción de una sociedad nueva —póngasele el nombre que se le ponga― donde la máquina, instrumento de trabajo, no sea instrumento de explotación del hombre por el hombre.\r\nHabló de la ayuda a los países dependientes, de cómo trillar el camino de los pueblos que inician la liberación, del llamado beneficioso mutuo basado en los precios de la ley del valor y su consiguiente desigualdad en las relaciones internacionales, de los créditos a largo plazo para desarrollar industrias básicas, de la conquista de la técnica, etc.\r\nPresentó un mundo nuevo a surgir en unas más honestas relaciones entre los países. Un mundo por el que debiera estarse dispuesto a entregar la vida. Ese mundo que comenzó a forjar y del que es precursor.\r\nSus palabras en el Segundo Seminario Económico de Argel no pasaron, se sembraron, y hoy sedimentan con su pensamiento y acción, su vida y su muerte, la ideología y la práctica de los revolucionarios más avanzados.\r\nEn los días del Seminario hizo tiempo para reunirse con los embajadores cubanos destacados en África que por esa fecha se habían concentrado allí. La reunión de aquella mañana fue una formidable sesión de trabajo en la que todos aprendimos. A cada uno le describió las características más acentuadas de su trabajo y de su persona y le mostró aciertos y debilidades, y señaló funciones a mejorarse o emprenderse. Se refirió a la necesidad de vincular periódicamente a los diplomáticos con la producción directa. Fustigó, estimuló, fortaleció, en una palabra: educó.\r\nSeguía las sesiones del Seminario con metódica aplicación y a la vez charló con múltiples delegados una y otra vez.\r\nRealizó una activa y revolucionaria diplomacia. Fueron frecuentes sus entrevistas con dirigentes argelinos. Recorrió las calles de Argel como un ciudadano común y en más de una ocasión utilizó máquina de alquiler para trasladarse de un lugar a otro. Ante esos hechos que creíamos riesgosos para su persona, y planteándome como decirle nuestra preocupación, se me ocurrió entrarle en forma indirecta y comentarle que por lo visto Argelia había alcanzado una estabilidad política superior a la nuestra, y que allí existía más seguridad para él que en La Habana.\r\nMe miró extrañado y antes de que hiciera alguna acotación, le aclaré: «aquí lo vemos utilizar automóvil de alquiler y andar completamente solo, lo que en Cuba no hace». Cambiando de expresión, y con particular reticencia, sin prestar importancia, comento: «los que pudieran querer hacer algo no tienen condiciones propicias y los que pueden hacerlo, no creo tengan interés. Pienso que se refería a los norteamericanos y a los franceses».\r\nVisitó poblaciones y centros petrolíferos, confraternizando con los hombres del desierto y tomando con ellos su apreciada y sabrosa leche de camella. No perdía ocasión para dar o recibir alguna experiencia y fijar determinada idea.\r\nRememoró cuando antes los paneles automatizados de un centro petrolífero en pleno Sahara argelino, un joven y entusiasta ingeniero nacional que nos explicaba las características de aquella magnífica instalación francesa, nos decía satisfecho: «Comandante, ¿qué les parece todo esto?», a lo que el Che respondió: «me parece que va siendo hora que agarren esto y lo tengan en sus manos, eso sí, con productividad». Hablaba con pasión de la automatización y sus efectos psicológicos en los hombres y del obrero de la era automatizada.\r\nRecuerdo las ocasiones en que, sentados junto a la larga mesa, a la hora de almuerzo o comida de la embajada de Cuba, disfrutando los comentarios y rica imaginación de nuestro embajador, el compañero Papito Serguera, veíamos al Che arreglárselas para desde su asiento, o parándose, servirse él mismo. Y es que procuraba no utilizar a nadie en cosas que él mismo pudiera resolver.\r\nTodos los que estaban a su lado, y con los que se llevaba fraternalmente, procuraban, dentro de la manera habitual de comportarse de cada uno, el conducirse un poco mejor en su derredor y era que la actitud con la que el Che se proyectaba ante todo, sin ningún rasgo de exhibicionismo, en forma simplemente natural, irradiaba una especie de compromiso tácito que inducía a los que le rodeaban a mantenerse más exigentes con uno mismo.\r\nDe Argelia salió para la República Árabe Unida acompañado de José Manuel Manresa, su jefe de despacho, y yo. Me había hecho el propósito de ser lo más útil posible, estar siempre atento y evitar que sus exigencias e ironías, que las tenía, tuvieran motivos en nuestro proceder, lo que lamentablemente sucedió, ya que al llegar al aeropuerto de Argel me vio que llevaba en una mano el portafolio y el sobretodo; en la otra el maletín. Airado me dijo: «qué manera de viajar es esa, como rayos tienes las dos manos ocupadas». «Es para evitar el exceso de equipaje», respondí. «Así no es la cosa, hay que llevar el peso reglamentario y viajar correctamente». Al minuto habíamos salvado la situación y embarcado el maletín junto al resto de las maletas sin necesidad de pagar exceso. Al poco rato me miró con otra expresión en el rostro. « ¿Qué, resolviste?, Ya ves», irónicamente dijo: «ahora como buen diplomático podrás darle la mano sin dificultad a tus colegas en El Cairo».\r\n […]       \r\nEn el Cairo desplegó una intensa actividad. De Nasser hacia abajo fueron muchos los dirigentes egipcios con los que cambió impresiones; el Primer Ministro y varios de los miembros de su gabinete ministerial. Dialogó con representantes de movimientos revolucionarios; visitó embajadores acreditados allí; conversó con científicos, periodistas, escritores; sostuvo reuniones por separado y en grupo…\r\nFue hasta Luxor, junto al Nilo; visitó distintas fábricas y dos centrales azucareros. En uno de ellos el recibimiento fue extraordinario, se repetían las exclamaciones a Fidel, Nasser, Cuba, al Che. Se le veía satisfecho del cariño de los trabajadores. Vimos cortar caña bajo un sol abrasador, sin camisa y con los pies descalzos. Y nos habló del esfuerzo de aquellos macheteros y de los nuestros; del salvaje trabajo que es el corte de la caña y de la necesidad de la mecanización. Se recreó y dio vuelos a su imaginación ante las ruinas antiquísimas de aquellos parajes en donde vimos la tumba de Tutankamón.\r\nAnalizó la portentosa construcción de la presa de Assam, su hidroeléctrica, la moderna fábrica de fertilizantes y precisó detalles de todo el plan que culminaría aquella obra capital de la RAU, y habló repetidas veces del talento y la energía del compañero que estaba al frente de todo aquello, con el que charló animadamente. Se interesó por los monumentos históricos cambiados de lugar por la expansión del Nilo debido a la presa.\r\nPermaneció todo un día con el presidente Nasser, al que acompañara durante un acto de campaña electoral presidencial. Invitado a hablar, manifestó:\r\nMañana tal vez vuelva a pasar la primera línea de fuego por la República Árabe Unida, o por Cuba. Tenemos los enemigos cerca y están siempre preparados para agredirnos […]. Y si esta agresión se produce, tengan ustedes la seguridad, amigos de Egipto, que en el otro lado del mar hay una pequeña Isla muy débil, sin fuerzas para poder enviar una ayuda material a sus hermanos en lucha, pero que vibra con cada injusticia que se produce en el mundo y es capaz de transmitir, a través de los mares, su solidaridad combatiente, su furor para que se junte al furor con que defienden los pueblos su libertad, se junten al valor del pueblo egipcio, ayudarlo a defender lo que tanto sacrificio ha costado.\r\nRegresó de aquel acto realmente emocionado por el entusiasmo del pueblo y el amor demostrado a Cuba.\r\nRecibió múltiples regalos, los cuales enseguida entregaba más adelante; es que no los veía como cosa personal. Solamente lo vimos encariñarse con un regalo, un soberbio gajo repleto de higos que recibió en el desierto y lo trajo personalmente y a mano hasta Cuba, para Fidel. Cuidaba celosamente no se despilfarrara nada, no importa lo que fuere. No concebía se dejaran tabacos a medio fumar.\r\nDe El Cairo salió para La Habana vía Praga. En el aeropuerto de Shanon permaneció dos días por desperfectos en el avión.\r\n […]. \r\nDurante las largas horas del regreso a La Habana, en coloquio conmigo mismo por la lectura que hice durante el vuelo de la carta al director del semanario Marcha, de Montevideo, escrito que había redactado en aquel viaje y que hoy conocemos por «El socialismo y el hombre en Cuba» y por la vivencia de aquellos momentos en su compañía, me percaté que había entrado, más conscientemente, en el conocimiento de un hombre distinto, de apariencia difícil y a la vez sencillo, audaz y algo tímido.\r\nEnemigo acérrimo de todo convencionalismo, de fina educación y que sabía ser protocolar cuando se lo proponía. De una voluntad de granito, de carácter férreo y de sentimientos genuinamente humanos. De un hombre que, sencillamente, era lo que se había propuesto ser, un centelleante y aguerrido beligerante por el imperio de la justicia, que le dolía y revelaba con el dolor en cuerpo ajeno. Que todo lo que proclamaba tenía el mismo punto de partida: la exigencia rigurosa consigo mismo. De una austeridad desconcertante. Viéndole de cerca se sabía por qué se le admiraba y, entonces, se le quería para siempre por encima de cualquier circunstancia.\r\nNo se pertenecía, o por lo contrario se pertenecía, completamente para entregarse a plenitud por su lucha, sin ninguna cortapisa. Viéndole se sabía lo que era un sacerdocio revolucionario en acción, medularmente íntegro, en donde palabras y hechos coreaban a la vez, tanto en lo externo y trascendente, como en lo íntimo y aparentemente trivial.\r\nY es que para él todo tenía valor y estaba en función de lo mismo: la formación del hombre. Todo lo sostenía sobre el mismo pedestal: la honestidad y la valentía. Fue exponente vivo, de pensamiento y acción en estrecha comunión. Y sigue siéndolo con fuerza brutal.\r\nSu enseñanza, que es más que su ejemplo, si es que acaso eso es posible, ¡cuánta falta nos hace! Y que enorme vigencia alcanza su manera de ser y hacer, en estos históricos y difíciles momentos que vivimos y cuando nuestro pueblo, dirigido por Fidel, se empina y engrandece, por encima de todo, en defensa de la Revolución.\r\nMomento fugaz e inolvidable \r\nJosé Fernández de Cossío Rodríguez: El periodo ordinario de la Asamblea General de Naciones Unidas del año 1964 comenzó con retraso y lastrado por una crisis financiera y funcional de origen político que impedía el ejercicio del voto para la adopción de decisiones.\r\nLa Unión Soviética y demás miembros del Pacto de Varsovia, junto a Cuba y otros países No Alineados, se negaban a contribuir con las cuotas extraordinarias asignadas para sufragar las muy cuestionadas actividades de las Fuerzas de Paz desplegadas en el ex Congo belga y otros sitios. En consecuencia, solo se adoptaban decisiones por unanimidad y en el Plenario de la Asamblea. Las Comisiones, por requerir el ejercicio del voto, no pudieron constituirse. \r\nEse año la delegación cubana la integraban el Representante Permanente recién designado, embajador Fernando Álvarez-Tabío, el Representante Alterno, embajador Arturo Barber, José Fernández de Cossío, director de Organismos Internacionales, Alba Griñán, jefa del Departamento de Naciones Unidas del MINREX y dos funcionarios de la pequeña plantilla de la Misión, consejero Miguel Alfonso y primer secretario, Pedro Álvarez-Tabío.\r\nYa comenzadas las labores de la Asamblea General, el embajador Álvarez-Tabío recibió un mensaje del MINREX comunicando que el 9 de diciembre y en un vuelo chárter de Cubana de Aviación llegaría a Nueva York, para encabezar nuestra delegación, el Comandante Ernesto Che Guevara, Ministro de Industrias y miembro de la Dirección Nacional del Partido Unido de la Revolución Socialista. De inmediato, y según la práctica establecida, se iniciaron los trámites ante la Misión de Estados Unidos para la obtención de los permisos de sobrevuelo y aterrizaje de la aeronave cubana y las correspondientes visas del Che y sus acompañantes, Enio Leyva, director de Seguridad Personal y José Manuel Manresa, secretario personal y un alto oficial de la Dirección de Cifras del MININT. También se procedió a efectuar la correspondiente acreditación ante el Secretario de Naciones Unidas y a gestionar el turno más favorable para usar la palabra.\r\nEn horas tempranas de una otoñal y fría tarde tocó pista en el Aeropuerto J. F. Kennedy el Britania transportando al Comandante y sus pocos acompañantes. En la placa lo esperábamos todos los integrantes de la delegación. Al timón del Chevrolet alquilado para los desplazamientos del Comandante, el joven agregado diplomático de la Misión, Otto Marrero. El avión se detuvo, la puerta se abrió, y enfundado en un sobretodo militar verde olivo, con su característica boina negra, apareció el Comandante Che Guevara. Con rostro severo y andar pausado, avanzó saludando a cada uno de nosotros y al dignatario de las Naciones Unidas que a nombre del Secretario General le dio la bienvenida. \r\nEl Che y su mínima comitiva se alojaron en el edificio de nuestra Misión Diplomática, en el número 6 de la calle 67 a 5ta. Avenida y el Parque Central.\r\nNo bien arribamos al edificio de la Misión, el Che convocó a la primera reunión  de trabajo, para actualizarse respecto a la crisis funcional de la organización y del estado de las negociaciones en curso para encontrar una salida al dilema. También pidió información respecto a los líderes y personalidades que ya habían llegado para encabezar las diferentes delegaciones. Se puso a su consideración los tres días y horas diferentes que se habían reservado con la presidencia de la Asamblea General como opciones para hacer su intervención central en el momento más conveniente.\r\nPor decisión del Comandante, todo el dispositivo de seguridad, fuera de nuestra Misión, quedó a cargo del FBI. \r\nCon base a sus indicaciones comenzaron las diligencias para sus encuentros bilaterales con el Secretario General de Naciones Unidas, con Gromyko, ministro de Relaciones Exteriores de la Unión Soviética, y otros jefes de delegaciones de países amigos. De América Latina, sólo con México teníamos relaciones diplomáticas. Varias personalidades norteamericanas conociendo de la presencia del Che en la ciudad, hicieron saber su interés por entrevistarse con él; entre ellos, el periodista y escritor Tad Shultz; el periodista de TV Bob Taber, los conocidos pensadores y escritores marxistas Leo Huberman y Paul Zweezy, etc. Estas y otras citas fueron coordinadas de inmediato.\r\nRazones obvias de seguridad determinaron que el FBI planificara los desplazamientos hacia  la sede de Naciones Unidas y otros sitios de la ciudad por vías diferentes e irregulares, muchas veces en contra del tránsito, creándose por ello un verdadero caos en las rutas seguidas por la comitiva. La única objeción planteada por el Che a la organización de sus movimientos fue contra la propuesta de emplear las salidas traseras del edificio de Naciones Unidas, que da al Roosevelt Boulevard, para retirarse de Naciones Unidas. Ante los argumentos del jefe del equipo del FBI, alegando que cuando Jruschov visitó New York había aceptado ese camino, el Che categóricamente dijo «a Jruschov lo habrán sacado por ahí pero yo entro y salgo por la puerta principal de los delegados», y así ocurrió cada día.\r\nA unos 50 metros del edificio de la Misión cubana, en la esquina de la calle 67 y 5ta. Avenida la Policía newyorkina autorizó el emplazamiento de un piquete de contrarrevolucionarios cubanos que con sus pancartas y profiriendo insultos y amenazas se mantuvo permanentemente mientras duró la estancia del Che en Nueva York, sin que esas furibundas expresiones de hostilidad, en ningún momento alteraran su total desdén. \r\nAlgo más grave ocurrió el 11 de diciembre, en el momento en que el Che pronunciaba su discurso ante el plenario. Desde la orilla opuesta del río del este, en los muelles de Brooklyn, elementos contrarrevolucionarios efectuaron un disparo de mortero contra el edificio de Naciones Unidas, cayendo el proyectil sobre una isleta en medio del río. La fuerte explosión retumbó con claridad en el recinto del plenario pero, sin inmutarse, el Che prosiguió con su discurso. Al concluir una cerrada ovación acogió sus palabras y gran número de delegados se acercaron a la banca de Cuba para felicitarlo.\r\nEl Comandante recibió un mensaje de Babu, ministro del nuevo gobierno revolucionario de Tanzania-Zanzibar, quien presidía la delegación de ese país, proponiéndole cenar en el apartamento de un funcionario de la Misión de Tanzania. El Che dispuso que le acompañáramos los embajadores Álvarez-Tabío, Barber y yo. Él llevó como regalo para Babu una pistola fabricada por un taller del Ministerio de Industrias. \r\nLa  cena discurrió en un ambiente cordial e informal propicio para que ambos dirigentes sostuvieran un intenso intercambio sobre los temas fundamentales del acontecer internacional y en particular, respecto al proceso político que tenía lugar con la unión de Tanzania-Zanzibar. En ese diálogo me correspondió compartir con el diplomático tanzano, Ali Fun, la tarea de intérprete. \r\nA mediados de la cena inesperadamente llegó el líder negro norteamericano Malcolm X, quien habiéndose enterado de que el Che estaría allí, vino a conocerle y saludarle. Entre los dos se produjo una amena pero breve conversación, en la cual el dirigente negro se expresó con pasión y entusiasmo respecto a la movilización política que venía fomentándose en el seno de la población negra del país en reclamo de sus derechos sociales, económicos y políticos. Explicó la labor en que él estaba empeñado por organizar, cohesionar y radicalizar la batalla para conquistar la igualdad y demás derechos históricamente conculcados.\r\nPasados unos cuarenta minutos, Malcolm X se excusó de no poder permanecer mucho más tiempo junto a nosotros, ya que esa noche, en Harlem, y en un acto de masas, haría uso de la palabra. Seguidamente, dijo que le honraría mucho poder leer a esa concurrencia un saludo del Che. En respuesta, el Che escribió un breve mensaje, que me pidió traducir al inglés. En pocas oraciones inequívocamente se identificaba con la causa de los negros norteamericanos, víctimas de discriminación, explotación y privados de sus más elementales derechos, situación que alcanzaba su expresión más escandalosa en los estados del sur donde un verdadero apartheid se practicaba. Entregado el texto de saludo y aliento a la lucha de los negros norteamericanos, ambos dirigentes se abrazaron y alguien tomó varias fotos como constancia de ese fugaz, pero inolvidable encuentro de dos combatientes por la causa de la justicia social y la dignidad plena del hombre.\r\n', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonio_archivo`
--

DROP TABLE IF EXISTS `testimonio_archivo`;
CREATE TABLE IF NOT EXISTS `testimonio_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_testimonio` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 NOT NULL,
  `portada` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_testimonio_archivo` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `testimonio_archivo`
--

INSERT INTO `testimonio_archivo` (`id`, `id_testimonio`, `id_archivo`, `nota`, `portada`) VALUES
(7, 9, 67, 'Nota', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_archivo`
--

DROP TABLE IF EXISTS `tipo_archivo`;
CREATE TABLE IF NOT EXISTS `tipo_archivo` (
  `id_tipo_archivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo_archivo` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_tipo_archivo`),
  UNIQUE KEY `id_tipo_archivo` (`id_tipo_archivo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo_archivo`
--

INSERT INTO `tipo_archivo` (`id_tipo_archivo`, `tipo_archivo`) VALUES
(1, 'Imagen'),
(2, 'Audio'),
(3, 'Video');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_articulo`
--

DROP TABLE IF EXISTS `tipo_articulo`;
CREATE TABLE IF NOT EXISTS `tipo_articulo` (
  `id_tipo_articulo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo_articulo` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_tipo_articulo`),
  UNIQUE KEY `id_tipo_articulo` (`id_tipo_articulo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo_articulo`
--

INSERT INTO `tipo_articulo` (`id_tipo_articulo`, `tipo_articulo`) VALUES
(2, 'Artículo'),
(3, 'Actualidad'),
(4, 'Noticia'),
(6, 'General'),
(8, 'Testimonio'),
(9, 'Escrito'),
(10, 'Discurso'),
(11, 'Entrevista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_homenaje`
--

DROP TABLE IF EXISTS `tipo_homenaje`;
CREATE TABLE IF NOT EXISTS `tipo_homenaje` (
  `id_tipo_homenaje` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tipo_homenaje` text CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_tipo_homenaje`),
  UNIQUE KEY `id_tipo_homenaje` (`id_tipo_homenaje`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo_homenaje`
--

INSERT INTO `tipo_homenaje` (`id_tipo_homenaje`, `tipo_homenaje`) VALUES
(1, 'Pintura'),
(2, 'Musica'),
(3, 'Video');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

DROP TABLE IF EXISTS `tipo_producto`;
CREATE TABLE IF NOT EXISTS `tipo_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_producto` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo_producto`
--

INSERT INTO `tipo_producto` (`id`, `tipo_producto`) VALUES
(1, 'Nuevo'),
(2, 'Nuevo'),
(3, 'Este es otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_taller`
--

DROP TABLE IF EXISTS `tipo_taller`;
CREATE TABLE IF NOT EXISTS `tipo_taller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo_taller`
--

INSERT INTO `tipo_taller` (`id`, `tipo`) VALUES
(1, 'Ajedrez'),
(2, 'Ejemplo'),
(3, 'Pintura'),
(4, 'Nuevo'),
(6, 'Nombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

DROP TABLE IF EXISTS `trabajador`;
CREATE TABLE IF NOT EXISTS `trabajador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `cargo` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `correo` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `area` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id`, `nombre`, `cargo`, `correo`, `area`) VALUES
(2, 'Juan García García', 'Cargo', 'juan@correo.cu', 'Coordinación Académica'),
(3, 'Juan García González', 'teryrr', 'sdfghjuytr', 'Coordinación de Proyectos Alternativos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(180) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`) VALUES
(4, 'Arelis', 'Gonzalez Garcia', 'Arelis', 'juV9LSKug98jXZlJm-xbWa6j0RcZ3Uhf', '$2y$13$1ElIDf7..5Aninj6i7UxLOiYA4TCuWapk9mgQ41M7PR6sBcybCtSu', NULL, 'arelisgonzalez@gmail.com', 10, 1567637991, 1567637991, 'U49V2RdpP6OzG2Oqyeo0GFVjs6Ll-L17_1567637991'),
(5, 'Leonardo', 'Mancebo', 'Leonardo', 'hzJMNguSPbQaJrQW1edrkIYOsF-DUaZt', '$2y$13$4sOfry41IkQZFSlE6Fn1D.RHKGrOh2oFBoR1kZ071qt..jJiJN8q2', NULL, 'mancebotejera@yahoo.com', 10, 1599005445, 1599005445, 'GPWQVtM_seznDrcXs7ly9XEI14rGd-IM_1599005445'),
(6, 'Osvaldo', 'Garcia', 'osvaldo', 'nLnQlrhmbpZW3eq_BmpNFYcJOMKNGp4_', '$2y$13$uWwbrfihRPLyENREfRRGre9ZxXxV4G6wji4Pwb1vHdvJVnbZur8sa', NULL, 'osvlado@gmail.com', 10, 1599147501, 1599147501, '32snh3U2jWn6vohekewuRB4lXWxVoGmb_1599147501'),
(7, 'Coordinador', 'Cientifico', 'Coordinador', '9fpL_Ycxw2okbpnTH4dBOn2KU0nR4sBz', '$2y$13$lzoERbfn5CCySss6WiIRt.WZzl.cNPjycPwfb7G3Q2Q6V714pGDua', NULL, 'coordinador@yahoo.com', 10, 1599429640, 1599429640, 'pMceUtKbdd54Ax6wtZhjEdGGxXaOVt04_1599429640'),
(8, 'Administrador', 'Borrar', 'Administrador', 'O3y8sOiUfJ3h5oZXQ620IW6GYlBwOxhW', '$2y$13$N/1O2unOcg3i2TcNOyG2S.K3oedwz3KjsnNOhVJ5.9yfuLx29IPqi', NULL, 'mancebotejera1@yahoo.com', 10, 1603412329, 1603412329, '7-rEbv7y7wkmcwBVXge3bG_-Oivjy4Qi_1603412329'),
(9, 'Super', 'Admin', 'Superadministrador', 'ATOPSMI0lQQs7ynhayhTczGIKdtM72DF', '$2y$13$lFmqOkYG0Wc9O.TCSWVL7eX64kTaVBcliit6ZPpEOamBKU2p8wf.y', NULL, 'superadministrador@yahoo.com', 10, 1603412455, 1603412455, '3wyjSvIZu_lThAJEbG9OOmY4cy-AsuLZ_1603412455'),
(10, 'Publicador', 'Borrar', 'Publicador', '956JyQAfpfhqiKx_SiGQbhg8w0Yhfo1I', '$2y$13$8mOJiqqZZlljUSExpUZQD.wKicFK1IF2JI4OedTmlkUsoh58SAAcO', NULL, 'publicador@yahoo.com', 10, 1603419814, 1603419814, 'kiZMbGf4anCJlYwWHh_6bMvOscJzcKzu_1603419814'),
(11, 'Javier', 'Admin', 'Javier', 'zHYLOmKiShdLFazwPC6HRS7xtXZ739JV', '$2y$13$vmnf5u4.cCTzN2o47YSTK.MdleXfKa/1qwQtmt0U8wVbeCdBhWGHq', NULL, 'javier@cambiar.com', 10, 1609303122, 1609303122, 'AEZprCbIbqyyguxfXa022sLFeig9t46w_1609303122'),
(12, 'Ana', 'Bolena', 'Ana', 'RQ8ii5nNVajrczWSDgCDLNSSQ9dIzKZp', '$2y$13$BqYdVK6a83oAYP/I0avHPOLrZxYXpDdlu6mjwQ7Viv7h.4puI5ud6', NULL, 'ana@gmail.com', 10, 1611122832, 1611122832, 'SinRFBFvIXp4gTKboJ9LEmUQrhb06VCs_1611122832'),
(13, 'Eliminar', 'Perez', 'eliminar', 'Tx9rfGMZaCw-1S3paOL2WnpqdaPxl32J', '$2y$13$yOLpRZRxTniOi/NZrgLDBOHvi6vQxXxzAFZEMrm8hH5mdzvYttpKm', NULL, 'eliminar@gmail.com', 9, 1611122991, 1611122991, 'D_PnFLyogfqtyAxCiydmtMA05XVotOk__1611122991'),
(14, 'Eliminar 2', 'Bolena', 'eliminar 2', '05R3AmXoJnh4gjzj4r55q7EHcMe59xi-', '$2y$13$0EETTVKZL/JgKXeFsMs48eWsacxn9bkRd5jey0nk3H.dSP91azfVa', NULL, 'eliminar2@gmail.com', 10, 1611126268, 1611126268, '3dG7ZJu2SFMIW_M2jW25eHlJWqAzT977_1611126268'),
(15, 'Eliminar 2', 'Bolena', 'eliminar 3', 'EO2YhVnmg7MPzTpbtlQ2uBxUGqtCtZoe', '$2y$13$Pli1bGH.pNlI86FhWwLvru6doimprL11mo3lWcg93kwn.LV9dVmHq', NULL, 'eliminar3@gmail.com', 10, 1611126367, 1611126367, 'zLumgMbVsW0OEOnRttdbD32yaz8goGVl_1611126367');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `otros_archivo`
--
ALTER TABLE `otros_archivo`
  ADD CONSTRAINT `fk_otros_archivo` FOREIGN KEY (`id_otros`) REFERENCES `otros` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
