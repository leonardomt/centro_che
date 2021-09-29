-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2021 a las 01:40:58
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `archivo` (
  `id_archivo` bigint(20) UNSIGNED NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `titulo_archivo` text COLLATE utf8_bin NOT NULL,
  `tipo_archivo` int(11) NOT NULL,
  `autor_archivo` text COLLATE utf8_bin NOT NULL,
  `fuente` mediumtext COLLATE utf8_bin NOT NULL,
  `etiqueta` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `descripcion_archivo` text COLLATE utf8_bin NOT NULL,
  `url_archivo` text COLLATE utf8_bin NOT NULL,
  `fecha` date DEFAULT NULL,
  `etapa` varchar(64) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`id_archivo`, `revisado`, `titulo_archivo`, `tipo_archivo`, `autor_archivo`, `fuente`, `etiqueta`, `descripcion_archivo`, `url_archivo`, `fecha`, `etapa`) VALUES
(79, 1, 'Leo', 1, 'Leo', '', 'Leo', 'Leo', 'uploads/Leo.jpg', NULL, 'No definida'),
(80, 1, 'Eric', 1, 'Eric', 'Eric', 'Eric', 'Eric se te quedaron los audifonos', 'uploads/Eric.png', '2021-08-03', 'Posterior a 1967'),
(81, 1, 'Presentación Centro', 1, 'Centro Che Cuba', 'Archivo Centro', 'institucional', 'Presentación donde se explica la visión, misión y objeto social del Cento de Estudios Che Guevara. ', 'uploads/Presentación Centro.jpg', '2021-06-14', 'Posterior a 1967'),
(83, 1, 'Teletrabajo', 1, 'Centro Che Cuba', 'Archivo Centro', 'institucional', 'Jóvenes del Centro de Estudios Che Guevara aprovechan las ventajas de las nuevas tecnologías y continúan desarrolando proyectos a pesar de las limitaciones por COVID. ', 'uploads/Teletrabajo.png', '2021-08-15', 'Posterior a 1967'),
(85, 1, 'hgfds', 1, 'hgfds', 'gfd', 'hgfd, fghj, ghjk', 'afsdf', 'uploads/hgfds.jpg', '2021-09-02', 'Posterior a 1967'),
(87, 1, 'Che', 1, 'Korda', '', 'foto', 'La foto de korda!!!!', 'uploads/Che.jpg', '1962-03-04', 'Adulto'),
(99, 0, '123', 1, '123', '123', 'nueva ;', '123', 'uploads/2021-09-2929563.jpg', '1800-05-01', 'Anterior a 1928'),
(100, 0, 'Trasteando', 1, 'Autor probando', 'Fuente Prueba', 'nueva ; prueba ;', 'Descrip Probando', 'uploads/2021-09-2979091.jpeg', '1800-04-01', 'Anterior a 1928');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` bigint(20) UNSIGNED NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo` varchar(200) COLLATE utf8_bin NOT NULL,
  `autor` varchar(200) COLLATE utf8_bin NOT NULL,
  `fecha` date NOT NULL,
  `resumen` mediumtext COLLATE utf8_bin NOT NULL,
  `palabras_clave` mediumtext COLLATE utf8_bin NOT NULL,
  `id_investigacion` int(11) DEFAULT NULL,
  `abstract` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `keywords` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `cuerpo` mediumtext COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `revisado`, `publico`, `titulo`, `autor`, `fecha`, `resumen`, `palabras_clave`, `id_investigacion`, `abstract`, `keywords`, `cuerpo`) VALUES
(34, 0, 0, 'Che: experiencias comunicativas en torno a su vida y obra', 'Camilo Guevara', '2021-09-01', 'El trabajo del Centro de Estudios Che Guevara se divide, en la práctica, en dos áreas principales, una científica, dedicada a la investigación y todo aquello que concierne al mundo académico.', 'mundo académico', 16, 'mundo académico', 'mundo académico', 'El trabajo del Centro de Estudios Che Guevara se divide, en la práctica, en dos áreas principales, una científica, dedicada a la investigación y todo aquello que concierne al mundo académico, y otra divulgativa,  que obtiene primordialmente de la primera los contenidos para llevar a cabo todos los proyectos que le atañen.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo_archivo`
--

CREATE TABLE `articulo_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` mediumtext COLLATE utf8_bin DEFAULT NULL,
  `portada` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin ROW_FORMAT=REDUNDANT;

--
-- Volcado de datos para la tabla `articulo_archivo`
--

INSERT INTO `articulo_archivo` (`id`, `id_articulo`, `id_archivo`, `nota`, `portada`) VALUES
(28, 34, 79, '', 0),
(33, 39, 80, '', 1),
(34, 40, 79, '', 1),
(35, 40, 80, '', 0),
(36, 41, 81, '', 1),
(38, 42, 85, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `user_id` varchar(64) CHARACTER SET utf8 NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrador', '5', NULL),
('administrador', '56', NULL),
('catedra', '62', NULL),
('coordinador-academico', '60', NULL),
('coordinador-de-proyectos-alternativos', '57', NULL),
('coordinador-de-proyectos-alternativos', '61', NULL),
('gestor-de-contenidos', '59', NULL),
('no ahi', '63', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `type` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 DEFAULT NULL,
  `rule_name` varchar(64) CHARACTER SET utf8 DEFAULT NULL,
  `data` text CHARACTER SET utf8 DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('administrador', 1, 'Administrador', NULL, NULL, NULL, NULL),
('catedra', 1, 'Cátedras', NULL, NULL, NULL, NULL),
('coordinador-academico', 1, 'Coordinador Académico', NULL, NULL, NULL, NULL),
('coordinador-de-proyectos-alternativos', 1, 'Coordinador de Proyectos Alternativos', NULL, NULL, NULL, NULL),
('gestionar-archivo', 2, 'Gestionar Archivos', NULL, NULL, NULL, NULL),
('gestionar-comentario', 2, 'Moderar Comentarios', NULL, NULL, NULL, NULL),
('gestionar-coordinacion', 2, 'Gestión de Contenido en Coordinación Académica', NULL, NULL, NULL, NULL),
('gestionar-inicio', 2, 'Gestión de Contenido en Inicio', NULL, NULL, NULL, NULL),
('gestionar-mapa', 2, 'Gestionar Mapa', NULL, NULL, NULL, NULL),
('gestionar-nomencladores', 2, 'Gestionar Nomencladores', NULL, NULL, NULL, NULL),
('gestionar-noticia', 2, 'Gestionar Noticias', NULL, NULL, NULL, NULL),
('gestionar-proyectos', 2, 'Gestión de Contenidos en Proyectos Alternativos', NULL, NULL, NULL, NULL),
('gestionar-roles', 2, 'Gestionar Roles', NULL, NULL, NULL, NULL),
('gestionar-traza', 2, 'Gestionar Trazabilidad', NULL, NULL, NULL, NULL),
('gestionar-usuarios', 2, 'Gestionar Usuarios', NULL, NULL, NULL, NULL),
('gestionar-vida-obra', 2, 'Gestión de contenidos en Vida y Obra', NULL, NULL, NULL, NULL),
('gestor-de-contenidos', 1, 'Gestor de contenidos', NULL, NULL, NULL, NULL),
('no ahi', 1, 'no ahi', NULL, NULL, NULL, NULL),
('publicar', 2, 'Publicar', NULL, NULL, NULL, NULL),
('revisar', 2, 'Revisar', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) CHARACTER SET utf8 NOT NULL,
  `child` varchar(64) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('administrador', 'gestionar-archivo'),
('administrador', 'gestionar-comentario'),
('administrador', 'gestionar-coordinacion'),
('administrador', 'gestionar-inicio'),
('administrador', 'gestionar-mapa'),
('administrador', 'gestionar-nomencladores'),
('administrador', 'gestionar-noticia'),
('administrador', 'gestionar-proyectos'),
('administrador', 'gestionar-roles'),
('administrador', 'gestionar-traza'),
('administrador', 'gestionar-usuarios'),
('administrador', 'gestionar-vida-obra'),
('administrador', 'publicar'),
('administrador', 'revisar'),
('catedra', 'gestionar-archivo'),
('catedra', 'gestionar-mapa'),
('catedra', 'gestionar-noticia'),
('coordinador-academico', 'gestionar-archivo'),
('coordinador-academico', 'gestionar-coordinacion'),
('coordinador-academico', 'gestionar-inicio'),
('coordinador-academico', 'gestionar-mapa'),
('coordinador-academico', 'gestionar-noticia'),
('coordinador-academico', 'gestionar-vida-obra'),
('coordinador-academico', 'publicar'),
('coordinador-academico', 'revisar'),
('coordinador-de-proyectos-alternativos', 'gestionar-archivo'),
('coordinador-de-proyectos-alternativos', 'gestionar-inicio'),
('coordinador-de-proyectos-alternativos', 'gestionar-proyectos'),
('coordinador-de-proyectos-alternativos', 'gestionar-vida-obra'),
('coordinador-de-proyectos-alternativos', 'publicar'),
('coordinador-de-proyectos-alternativos', 'revisar'),
('gestor-de-contenidos', 'gestionar-archivo'),
('gestor-de-contenidos', 'gestionar-coordinacion'),
('gestor-de-contenidos', 'gestionar-inicio'),
('gestor-de-contenidos', 'gestionar-mapa'),
('gestor-de-contenidos', 'gestionar-noticia'),
('gestor-de-contenidos', 'gestionar-proyectos'),
('gestor-de-contenidos', 'gestionar-vida-obra'),
('no ahi', 'gestionar-comentario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) CHARACTER SET utf8 NOT NULL,
  `data` text CHARACTER SET utf8 DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrusel`
--

CREATE TABLE `carrusel` (
  `id` int(11) NOT NULL,
  `url` text CHARACTER SET utf8mb4 NOT NULL,
  `extra` text CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `id` int(11) NOT NULL,
  `titulo` varchar(1024) NOT NULL,
  `profesor` varchar(1024) NOT NULL,
  `descripcion` text NOT NULL,
  `enlace` text NOT NULL,
  `revisado` tinyint(4) NOT NULL,
  `publico` tinyint(4) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`id`, `titulo`, `profesor`, `descripcion`, `enlace`, `revisado`, `publico`, `id_curso`) VALUES
(8, '2', '2', '2', '2', 1, 1, 15),
(10, '3', '3', '3', '3', 1, 1, 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coleccion_documental`
--

CREATE TABLE `coleccion_documental` (
  `id_coleccion_documental` bigint(20) UNSIGNED NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `etiquetas` text CHARACTER SET latin1 NOT NULL,
  `tipologia` text CHARACTER SET latin1 DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `autor` text CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `coleccion_documental`
--

INSERT INTO `coleccion_documental` (`id_coleccion_documental`, `revisado`, `publico`, `titulo`, `descripcion`, `etiquetas`, `tipologia`, `fecha`, `autor`) VALUES
(20, 0, 0, 'Nuevo Documento', 'Documento', 'nueva ; prueba ;', 'Documento', '1800-01-01', 'Documento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coleccion_documental_archivo`
--

CREATE TABLE `coleccion_documental_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_coleccion_documental` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `portada` tinyint(4) DEFAULT NULL,
  `nota` text CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `coleccion_documental_archivo`
--

INSERT INTO `coleccion_documental_archivo` (`id`, `id_coleccion_documental`, `id_archivo`, `portada`, `nota`) VALUES
(39, 20, 79, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `alias` varchar(256) NOT NULL,
  `correo` varchar(512) NOT NULL,
  `comentario` text NOT NULL,
  `seccion` varchar(256) NOT NULL,
  `tabla` varchar(128) NOT NULL,
  `id_tabla` int(11) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `respuesta` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `fecha`, `alias`, `correo`, `comentario`, `seccion`, `tabla`, `id_tabla`, `publico`, `revisado`, `respuesta`) VALUES
(33, '2021-09-02 13:31:54', 'Juana', 'juana@mail.com', 'juana@mail.com', 'Coordinación Académica', 'articulo', 34, 1, 1, 0),
(34, '2021-09-02 16:22:03', 'Pedro', 'pedro@mail.com', 'pedro@mail.com', 'Coordinación Académica', 'comentario', 33, 1, 1, 0),
(35, '2021-09-02 16:22:03', ' Arelis Gonzalez Garcia', 'juana@mail.com', 'Comentario de la institucion\r\n', 'Coordinación Académica', 'comentario', 34, 1, 1, 1),
(36, '2021-09-02 16:28:48', ' Arelis Gonzalez Garcia', 'pedro@mail.com', 'wqerwert', 'Coordinación Académica', 'comentario', 34, 1, 1, 1),
(37, '2021-09-02 19:44:06', 'Juana', 'pedro@mail.com', 'sdgd', 'Coordinación Académica', 'articulo', 34, 1, 1, 0),
(38, '2021-09-02 19:44:06', 'Centro Che Cuba', 'pedro@mail.com', 'asdss', 'Coordinación Académica', 'comentario', 37, 1, 1, 1),
(39, '2021-09-02 20:13:04', 'assda', 'asf@zxc.com', 'asfa', 'Coordinación Académica', 'articulo', 34, 0, 0, 0),
(40, '2021-09-02 20:13:06', 'assda', 'asf@zxc.com', 'asfa', 'Coordinación Académica', 'articulo', 34, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `direccion` text CHARACTER SET utf8mb4 NOT NULL,
  `telefono1` varchar(64) CHARACTER SET utf8mb4 NOT NULL,
  `telefono2` varchar(64) CHARACTER SET utf8mb4 DEFAULT NULL,
  `correo` varchar(256) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `direccion`, `telefono1`, `telefono2`, `correo`) VALUES
(1, 'Dirección del centro', '2345676543', '', 'centroche@cubarte.cult.cu');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correspondencia`
--

CREATE TABLE `correspondencia` (
  `id_correspondencia` bigint(20) UNSIGNED NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  `destinatario` text CHARACTER SET latin1 NOT NULL,
  `remitente` text CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `correspondencia`
--

INSERT INTO `correspondencia` (`id_correspondencia`, `revisado`, `publico`, `titulo`, `descripcion`, `cuerpo`, `destinatario`, `remitente`, `fecha`) VALUES
(12, 1, 1, 'Carta de Calixto García al Che', 'Carta enviada desde la Sierra MAestra al Che Guevara por el comandante Calixto García', 'En la semana en que celebramos el #DíaInternacionalDeLosMuseos compartimos esta entrevista realizada por Alejandro Pico de @Radio La Minga a quien fue fundador del primer Museo dedicado al Che en Argentina y Suramérica, Eladio González. \r\nTras una visita a Cuba en 1992 en la que quedaron enamorados de la isla y su gente, él y su inseparable esposa Irene Perpiñal se empeñaron en ayudar del modo en que fuera posible a la lucha del pueblo cubano contra el bloqueo impuesto por el gobierno de Estados Unidos. \r\n(Estrellitas)\r\nEntre los acontecimientos ocurridos durante su estancia en Cuba, y que los marcaría para siempre, estuvieron los sucesos de Tarará: un grupo de seis criminales que trataban de salir ilegalmente del país había acribillados a tres oficiales de guardafronteras y herido de gravedad a un joven policía que acudió en auxilio de sus compañeros. Eladio donó su sangre a Rolando Pérez Quintosa, el joven sobreviviente, y entregó al padre de este una carta para cuando se recuperara. Lamentablemente unos días después Rolando murió, sin embargo la carta de Eladio fue publicada en la prensa cubana y las respuestas no  tardaron en llegar desde todas partes del país. En total Eladio e Irene recibieron 5000 cartas. \r\nConmovidos por lo que habían vivido se empeñaron en reunir toda la ayuda posible y fue así como enviaron a Cuba los primeros kilogramos de donaciones que, tras ser incluida su experiencia en el libro “Cuba existe es socialista y no está en coma” del arquitecto argentino Rodolfo Livingston, se incrementó a 3 toneladas por mes. A este proyecto le dieron el nombre de Chaubloqueo. \r\n(Estrellitas)\r\nEn 1996 fundaron en su casa de Caballito, Buenos Aires, el primer @Museo Che Guevara de Suramérica que, a manera de pintoresco y sui generis bazar, se dedica a divulgar la vida y la obra del rosarino heroico, y a difundir la tragedia que es el bloqueo impuesto a Cuba. En este pequeño espacio atesoran una amplia colección de fotografías, esculturas, artesanías, objetos personales, pósters, banderas… donadas por visitantes de todas partes del mundo, que muestran el modo en que el Che y su ejemplo se han integrado al imaginario colectivo y cotidiano de muchos. \r\nLos invitamos a escuchar esta apasionada entrevista con la que se comprende que  conservar la memoria es la mejor forma de mantenerla viva. (Manito y link)\r\n', 'Ernesto Che Guevara', 'Calixto García', '1958-06-14'),
(13, 0, 0, '1', '123', '123', '123', '123', '1800-02-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correspondencia_archivo`
--

CREATE TABLE `correspondencia_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_correspondencia` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 NOT NULL,
  `portada` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `correspondencia_archivo`
--

INSERT INTO `correspondencia_archivo` (`id`, `id_correspondencia`, `id_archivo`, `nota`, `portada`) VALUES
(15, 12, 83, '', 1),
(16, 13, 83, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_online`
--

CREATE TABLE `curso_online` (
  `id_curso` bigint(20) UNSIGNED NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `enlace` text CHARACTER SET latin1 NOT NULL,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `coordinador` text CHARACTER SET latin1 NOT NULL,
  `pdf` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `curso_online`
--

INSERT INTO `curso_online` (`id_curso`, `revisado`, `publico`, `enlace`, `titulo`, `descripcion`, `coordinador`, `pdf`) VALUES
(15, 0, 0, 'sdfgsdfg', 'gdsf', 'gsdfg', 'gsdfgsdf', 'pdf/gdsf.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_online_archivo`
--

CREATE TABLE `curso_online_archivo` (
  `id_curso_online_archivo` bigint(20) UNSIGNED NOT NULL,
  `id_curso_online` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discurso`
--

CREATE TABLE `discurso` (
  `id_discurso` bigint(20) UNSIGNED NOT NULL,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `lugar` text CHARACTER SET latin1 NOT NULL,
  `medio` varchar(1024) CHARACTER SET latin1 NOT NULL,
  `entrevistador` text CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `identificador` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `discurso`
--

INSERT INTO `discurso` (`id_discurso`, `titulo`, `fecha`, `descripcion`, `lugar`, `medio`, `entrevistador`, `cuerpo`, `revisado`, `publico`, `identificador`) VALUES
(5, 'Borrar', '2021-08-31', 'Borrar', 'Borrar', 'Borrar', 'Borrar', 'Borrar', 0, 0, 0),
(6, 'Entrevista al Che por Jorge Ricardo Masetti', '1958-04-10', 'Entrevista al Che realizada por el periodista argentino Jorge Ricardo Masetti desde la Sierra Maestra', 'Sierra Maestra', '', 'Jorge Ricardo Masetti', 'En la semana en que celebramos el #DíaInternacionalDeLosMuseos compartimos esta entrevista realizada por Alejandro Pico de @Radio La Minga a quien fue fundador del primer Museo dedicado al Che en Argentina y Suramérica, Eladio González. \r\nTras una visita a Cuba en 1992 en la que quedaron enamorados de la isla y su gente, él y su inseparable esposa Irene Perpiñal se empeñaron en ayudar del modo en que fuera posible a la lucha del pueblo cubano contra el bloqueo impuesto por el gobierno de Estados Unidos. \r\n(Estrellitas)\r\nEntre los acontecimientos ocurridos durante su estancia en Cuba, y que los marcaría para siempre, estuvieron los sucesos de Tarará: un grupo de seis criminales que trataban de salir ilegalmente del país había acribillados a tres oficiales de guardafronteras y herido de gravedad a un joven policía que acudió en auxilio de sus compañeros. Eladio donó su sangre a Rolando Pérez Quintosa, el joven sobreviviente, y entregó al padre de este una carta para cuando se recuperara. Lamentablemente unos días después Rolando murió, sin embargo la carta de Eladio fue publicada en la prensa cubana y las respuestas no  tardaron en llegar desde todas partes del país. En total Eladio e Irene recibieron 5000 cartas. \r\nConmovidos por lo que habían vivido se empeñaron en reunir toda la ayuda posible y fue así como enviaron a Cuba los primeros kilogramos de donaciones que, tras ser incluida su experiencia en el libro “Cuba existe es socialista y no está en coma” del arquitecto argentino Rodolfo Livingston, se incrementó a 3 toneladas por mes. A este proyecto le dieron el nombre de Chaubloqueo. \r\n(Estrellitas)\r\nEn 1996 fundaron en su casa de Caballito, Buenos Aires, el primer @Museo Che Guevara de Suramérica que, a manera de pintoresco y sui generis bazar, se dedica a divulgar la vida y la obra del rosarino heroico, y a difundir la tragedia que es el bloqueo impuesto a Cuba. En este pequeño espacio atesoran una amplia colección de fotografías, esculturas, artesanías, objetos personales, pósters, banderas… donadas por visitantes de todas partes del mundo, que muestran el modo en que el Che y su ejemplo se han integrado al imaginario colectivo y cotidiano de muchos. \r\nLos invitamos a escuchar esta apasionada entrevista con la que se comprende que  conservar la memoria es la mejor forma de mantenerla viva. (Manito y link)\r\n', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discurso_archivo`
--

CREATE TABLE `discurso_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_discurso` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 NOT NULL,
  `portada` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `discurso_archivo`
--

INSERT INTO `discurso_archivo` (`id`, `id_discurso`, `id_archivo`, `nota`, `portada`) VALUES
(10, 5, 79, '', 1),
(9, 6, 80, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escrito`
--

CREATE TABLE `escrito` (
  `id_escrito` bigint(20) UNSIGNED NOT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `cuerpo` text DEFAULT NULL,
  `revisado` tinyint(4) DEFAULT NULL,
  `publico` tinyint(4) DEFAULT NULL,
  `autor` text DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `escrito`
--

INSERT INTO `escrito` (`id_escrito`, `tipo`, `titulo`, `descripcion`, `cuerpo`, `revisado`, `publico`, `autor`, `fecha`) VALUES
(1, 'Crónica', 'asdf', 'asdf', 'asdf', 0, 0, 'Ernesto Guevara de la Serna', '2021-08-31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escrito_archivo`
--

CREATE TABLE `escrito_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_escrito` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 NOT NULL,
  `portada` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `escrito_archivo`
--

INSERT INTO `escrito_archivo` (`id`, `id_escrito`, `id_archivo`, `nota`, `portada`) VALUES
(33, 1, 85, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta`
--

CREATE TABLE `etiqueta` (
  `id` int(11) NOT NULL,
  `etiqueta` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `etiqueta`
--

INSERT INTO `etiqueta` (`id`, `etiqueta`) VALUES
(4, 'nueva'),
(5, 'otra'),
(6, 'prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta_archivo`
--

CREATE TABLE `etiqueta_archivo` (
  `id` int(11) NOT NULL,
  `id_etiqueta` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `etiqueta_archivo`
--

INSERT INTO `etiqueta_archivo` (`id`, `id_etiqueta`, `id_archivo`) VALUES
(5, 4, 89),
(12, 4, 101),
(13, 5, 101),
(14, 4, 100),
(15, 6, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiqueta_coleccion_documental`
--

CREATE TABLE `etiqueta_coleccion_documental` (
  `id` int(11) NOT NULL,
  `id_etiqueta` int(11) NOT NULL,
  `id_coleccion_documental` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `etiqueta_coleccion_documental`
--

INSERT INTO `etiqueta_coleccion_documental` (`id`, `id_etiqueta`, `id_coleccion_documental`) VALUES
(19, 4, 20),
(20, 6, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exposicion`
--

CREATE TABLE `exposicion` (
  `id_exposicion` bigint(20) UNSIGNED NOT NULL,
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
  `autor` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `exposicion`
--

INSERT INTO `exposicion` (`id_exposicion`, `revisado`, `publico`, `titulo`, `descripcion`, `cuerpo`, `enlace`, `tipo_fecha`, `fecha`, `fecha_fin`, `entidad`, `autor`) VALUES
(10, 0, 0, 'asdf', 'asd', 'asd', 'asd', 1, '2017-01-01', '2021-01-01', 'asd', 'asdf'),
(11, 0, 0, 'asf', 'asd', 'asd', 'asd', 0, '2021-09-09', NULL, 'asd', 'asd'),
(12, 0, 0, '1', '1', '1', '1', 0, '1800-01-01', NULL, '1', '1'),
(13, 0, 0, '1', '1', '1', '1', 0, '1800-02-02', NULL, '1', '1'),
(14, 0, 0, '2', '2', '2', '2', 0, '1801-04-01', NULL, '2', '2'),
(15, 0, 0, '3', '3', '3', '3', 2, '1804-01-01', NULL, '3', '3'),
(16, 0, 0, 'mes', 'mes', 'mes', 'mes', 3, '1999-03-01', NULL, 'mes', 'mes'),
(17, 0, 0, 'rango', 'rango', 'rango', 'rango', 1, '1800-02-02', '1803-06-03', 'rango', 'rango');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exposicion_archivo`
--

CREATE TABLE `exposicion_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_exposicion` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 DEFAULT NULL,
  `portada` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `exposicion_archivo`
--

INSERT INTO `exposicion_archivo` (`id`, `id_exposicion`, `id_archivo`, `nota`, `portada`) VALUES
(22, 10, 81, '', 1),
(15, 11, 80, '', 1),
(16, 12, 79, '', 1),
(17, 13, 79, '1', 1),
(18, 14, 79, '', 1),
(19, 15, 80, '', 1),
(20, 16, 80, '', 1),
(21, 17, 80, '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_vo`
--

CREATE TABLE `galeria_vo` (
  `id_galeria_vo` bigint(20) UNSIGNED NOT NULL,
  `id_archivo` varchar(2048) COLLATE utf8_bin DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `genero` varchar(512) CHARACTER SET latin1 DEFAULT NULL,
  `tipo_archivo` int(3) DEFAULT NULL,
  `publico` tinyint(1) NOT NULL,
  `nota` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria_vo_archivo`
--

CREATE TABLE `galeria_vo_archivo` (
  `id` int(11) NOT NULL,
  `id_galeria_vo` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_documental`
--

CREATE TABLE `gestion_documental` (
  `id_gestion_documental` int(11) NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `gestion_documental`
--

INSERT INTO `gestion_documental` (`id_gestion_documental`, `descripcion`) VALUES
(1, 'Nueva Descripcion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_documental_archivo`
--

CREATE TABLE `gestion_documental_archivo` (
  `id` int(11) NOT NULL,
  `url` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `gestion_documental_archivo`
--

INSERT INTO `gestion_documental_archivo` (`id`, `url`) VALUES
(12, 'paradigma/2021-09-1057400.jpg'),
(13, 'paradigma/2021-09-1047088.jpg'),
(14, 'paradigma/2021-09-1077435.jpg'),
(15, 'paradigma/2021-09-2246220.png'),
(16, 'paradigma/2021-09-2214097.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hecho`
--

CREATE TABLE `hecho` (
  `id_hecho` bigint(20) UNSIGNED NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `etapa` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `hecho`
--

INSERT INTO `hecho` (`id_hecho`, `revisado`, `publico`, `titulo`, `descripcion`, `cuerpo`, `fecha`, `etapa`) VALUES
(10, 0, 0, '1', '1', '1', '2019-09-01', 'Posterior a 1967');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hecho_archivo`
--

CREATE TABLE `hecho_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_hecho` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 NOT NULL,
  `portada` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `hecho_archivo`
--

INSERT INTO `hecho_archivo` (`id`, `id_hecho`, `id_archivo`, `nota`, `portada`) VALUES
(17, 10, 81, '2', 0),
(16, 10, 79, '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `homenaje`
--

CREATE TABLE `homenaje` (
  `id_homenaje` bigint(20) UNSIGNED NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  `id_tipo_homenaje` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `homenaje_archivo`
--

CREATE TABLE `homenaje_archivo` (
  `id_homenaje_archivo` bigint(20) UNSIGNED NOT NULL,
  `id_homenaje` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigacion`
--

CREATE TABLE `investigacion` (
  `id_investigacion` bigint(20) UNSIGNED NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo_investigacion` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  `autor` text CHARACTER SET latin1 NOT NULL,
  `id_linea_investigacion` int(11) NOT NULL,
  `entidad` varchar(256) CHARACTER SET latin1 DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `investigacion`
--

INSERT INTO `investigacion` (`id_investigacion`, `revisado`, `publico`, `titulo_investigacion`, `descripcion`, `cuerpo`, `autor`, `id_linea_investigacion`, `entidad`, `fecha`) VALUES
(16, 0, 0, 'Nueva', 'Nueva', 'Borrar', 'Juan', 9, 'Nueva', '2021-08-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `investigacion_archivo`
--

CREATE TABLE `investigacion_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_investigacion` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 DEFAULT NULL,
  `portada` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `investigacion_archivo`
--

INSERT INTO `investigacion_archivo` (`id`, `id_investigacion`, `id_archivo`, `nota`, `portada`) VALUES
(19, 16, 81, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id` int(11) NOT NULL,
  `revisado` tinyint(4) NOT NULL,
  `publico` tinyint(4) NOT NULL,
  `fecha` date NOT NULL,
  `titulo` varchar(512) CHARACTER SET utf8mb4 NOT NULL,
  `autor` varchar(512) CHARACTER SET utf8mb4 NOT NULL,
  `compilador` varchar(512) CHARACTER SET utf8mb4 NOT NULL,
  `linea` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `palabras_clave` varchar(512) CHARACTER SET utf8mb4 NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `revisado`, `publico`, `fecha`, `titulo`, `autor`, `compilador`, `linea`, `palabras_clave`, `descripcion`) VALUES
(2, 0, 0, '2018-08-20', 'Che Presente', 'María del Carmen Ariet', 'Maria del Carmen Ariet', 'Memoria Histórica', 'centro che, vida y obra, Che Guevara', 'Antologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_archivo`
--

CREATE TABLE `libro_archivo` (
  `id` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `nota` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `portada` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `libro_archivo`
--

INSERT INTO `libro_archivo` (`id`, `id_archivo`, `id_libro`, `nota`, `portada`) VALUES
(2, 87, 2, 'Portada del libro', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_investigacion`
--

CREATE TABLE `linea_investigacion` (
  `id_linea_investigacion` bigint(20) UNSIGNED NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `nombre_linea` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `linea_investigacion`
--

INSERT INTO `linea_investigacion` (`id_linea_investigacion`, `revisado`, `publico`, `nombre_linea`, `descripcion`) VALUES
(9, 0, 0, 'Sistema de pensamiento filosófico, económico, socio-político e histórico.', 'Sistema de pensamiento filosófico, económico, socio-político e histórico.'),
(10, 1, 1, 'Búsqueda de los restos de los combatientes caídos en Bolivia.', 'Búsqueda de los restos de los combatientes caídos en Bolivia.'),
(11, 1, 1, 'Lucha insurreccional en Cuba.', 'Lucha insurreccional en Cuba.'),
(12, 1, 1, 'Estudios ético-psicológicos sobre la educación en valores.', 'Estudios ético-psicológicos sobre la educación en valores.'),
(13, 1, 1, 'Estudios socioculturales ', 'Estudios socioculturales '),
(14, 1, 1, 'Otras', 'Otras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea_investigacion_archivo`
--

CREATE TABLE `linea_investigacion_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_linea_investigacion` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 DEFAULT NULL,
  `portada` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `linea_investigacion_archivo`
--

INSERT INTO `linea_investigacion_archivo` (`id`, `id_linea_investigacion`, `id_archivo`, `nota`, `portada`) VALUES
(14, 9, 80, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) CHARACTER SET latin1 NOT NULL,
  `apply_time` int(11) DEFAULT NULL
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

CREATE TABLE `noticia` (
  `id_noticia` bigint(20) UNSIGNED NOT NULL,
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
  `fuente` mediumtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`id_noticia`, `revisado`, `publico`, `titulo_noticia`, `fecha`, `referencia`, `descripcion`, `cuerpo`, `etiqueta`, `autor`, `contacto`, `fuente`) VALUES
(45, 1, 1, 'Leo termina la tesis', '2021-05-17', 'leo', 'leo', 'leo termina la tesis!!!! Yei Leo!!!', 'leo', 'leo', 'leo', 'leo'),
(46, 1, 1, 'Inicia Centro Che Cuba talleres para niños ', '2021-10-13', '', 'Tras un año sin poder realizarse debido a la pandemia se retoman los talleres de creación infantil coordinados por Centro Che Cuba en sus predios. ', 'En la semana en que celebramos el #DíaInternacionalDeLosMuseos compartimos esta entrevista realizada por Alejandro Pico de @Radio La Minga a quien fue fundador del primer Museo dedicado al Che en Argentina y Suramérica, Eladio González. \r\nTras una visita a Cuba en 1992 en la que quedaron enamorados de la isla y su gente, él y su inseparable esposa Irene Perpiñal se empeñaron en ayudar del modo en que fuera posible a la lucha del pueblo cubano contra el bloqueo impuesto por el gobierno de Estados Unidos. \r\n(Estrellitas)\r\nEntre los acontecimientos ocurridos durante su estancia en Cuba, y que los marcaría para siempre, estuvieron los sucesos de Tarará: un grupo de seis criminales que trataban de salir ilegalmente del país había acribillados a tres oficiales de guardafronteras y herido de gravedad a un joven policía que acudió en auxilio de sus compañeros. Eladio donó su sangre a Rolando Pérez Quintosa, el joven sobreviviente, y entregó al padre de este una carta para cuando se recuperara. Lamentablemente unos días después Rolando murió, sin embargo la carta de Eladio fue publicada en la prensa cubana y las respuestas no  tardaron en llegar desde todas partes del país. En total Eladio e Irene recibieron 5000 cartas. \r\nConmovidos por lo que habían vivido se empeñaron en reunir toda la ayuda posible y fue así como enviaron a Cuba los primeros kilogramos de donaciones que, tras ser incluida su experiencia en el libro “Cuba existe es socialista y no está en coma” del arquitecto argentino Rodolfo Livingston, se incrementó a 3 toneladas por mes. A este proyecto le dieron el nombre de Chaubloqueo. \r\n(Estrellitas)\r\nEn 1996 fundaron en su casa de Caballito, Buenos Aires, el primer @Museo Che Guevara de Suramérica que, a manera de pintoresco y sui generis bazar, se dedica a divulgar la vida y la obra del rosarino heroico, y a difundir la tragedia que es el bloqueo impuesto a Cuba. En este pequeño espacio atesoran una amplia colección de fotografías, esculturas, artesanías, objetos personales, pósters, banderas… donadas por visitantes de todas partes del mundo, que muestran el modo en que el Che y su ejemplo se han integrado al imaginario colectivo y cotidiano de muchos. \r\nLos invitamos a escuchar esta apasionada entrevista con la que se comprende que  conservar la memoria es la mejor forma de mantenerla viva. (Manito y link)\r\n (Estrellitas)\r\nOtros museos de Argentina dedicados al Che son \r\n(manito y etiquetar a los siguientes)\r\nMuseo Casa del Che en Alta Gracia\r\nLa Pastera Museo del Che en San Martín de Los Andes\r\nHogar Misionero del Che en Misiones \r\nCentro de Estudios Latinoamericanos del Che en Rosario\r\nNota: En los hashtags incluir #TrasLosPasosDelChe ', 'talleres ', 'Liset Valdés Veitía ', 'liset@gmail.com', 'Archivo Centro Che '),
(47, 1, 1, 'El Centro Che Cuba implementa teletrabajo', '2021-11-18', '', 'El Centro de Estudios Che Guevara implementa estrategias de teletrabajo y trabajo a distancia para cumplir los objetivos propuestos en 2021, a pesar de las limitaciones impuestas por la pandemia. ', 'En la semana en que celebramos el #DíaInternacionalDeLosMuseos compartimos esta entrevista realizada por Alejandro Pico de @Radio La Minga a quien fue fundador del primer Museo dedicado al Che en Argentina y Suramérica, Eladio González. \r\nTras una visita a Cuba en 1992 en la que quedaron enamorados de la isla y su gente, él y su inseparable esposa Irene Perpiñal se empeñaron en ayudar del modo en que fuera posible a la lucha del pueblo cubano contra el bloqueo impuesto por el gobierno de Estados Unidos. \r\n(Estrellitas)\r\nEntre los acontecimientos ocurridos durante su estancia en Cuba, y que los marcaría para siempre, estuvieron los sucesos de Tarará: un grupo de seis criminales que trataban de salir ilegalmente del país había acribillados a tres oficiales de guardafronteras y herido de gravedad a un joven policía que acudió en auxilio de sus compañeros. Eladio donó su sangre a Rolando Pérez Quintosa, el joven sobreviviente, y entregó al padre de este una carta para cuando se recuperara. Lamentablemente unos días después Rolando murió, sin embargo la carta de Eladio fue publicada en la prensa cubana y las respuestas no  tardaron en llegar desde todas partes del país. En total Eladio e Irene recibieron 5000 cartas. \r\nConmovidos por lo que habían vivido se empeñaron en reunir toda la ayuda posible y fue así como enviaron a Cuba los primeros kilogramos de donaciones que, tras ser incluida su experiencia en el libro “Cuba existe es socialista y no está en coma” del arquitecto argentino Rodolfo Livingston, se incrementó a 3 toneladas por mes. A este proyecto le dieron el nombre de Chaubloqueo. \r\n(Estrellitas)\r\nEn 1996 fundaron en su casa de Caballito, Buenos Aires, el primer @Museo Che Guevara de Suramérica que, a manera de pintoresco y sui generis bazar, se dedica a divulgar la vida y la obra del rosarino heroico, y a difundir la tragedia que es el bloqueo impuesto a Cuba. En este pequeño espacio atesoran una amplia colección de fotografías, esculturas, artesanías, objetos personales, pósters, banderas… donadas por visitantes de todas partes del mundo, que muestran el modo en que el Che y su ejemplo se han integrado al imaginario colectivo y cotidiano de muchos. \r\nLos invitamos a escuchar esta apasionada entrevista con la que se comprende que  conservar la memoria es la mejor forma de mantenerla viva. (Manito y link)\r\n (Estrellitas)\r\nOtros museos de Argentina dedicados al Che son \r\n(manito y etiquetar a los siguientes)\r\nMuseo Casa del Che en Alta Gracia\r\nLa Pastera Museo del Che en San Martín de Los Andes\r\nHogar Misionero del Che en Misiones \r\nCentro de Estudios Latinoamericanos del Che en Rosario\r\nNota: En los hashtags incluir #TrasLosPasosDelChe ', 'teletrabajo', 'Amanda Terrero', 'amanda.cult.cu ', 'Archivo Centro Che '),
(48, 1, 1, 's', '2021-09-02', '', 's', 'd', 's', 's', '', ''),
(49, 1, 1, 'Taller de Animación', '2021-08-30', '', 'Inicia taller de animación en el Centro de Estudios Che Guevara. ', 'En la semana en que celebramos el #DíaInternacionalDeLosMuseos compartimos esta entrevista realizada por Alejandro Pico de @Radio La Minga a quien fue fundador del primer Museo dedicado al Che en Argentina y Suramérica, Eladio González. \r\nTras una visita a Cuba en 1992 en la que quedaron enamorados de la isla y su gente, él y su inseparable esposa Irene Perpiñal se empeñaron en ayudar del modo en que fuera posible a la lucha del pueblo cubano contra el bloqueo impuesto por el gobierno de Estados Unidos. \r\n(Estrellitas)\r\nEntre los acontecimientos ocurridos durante su estancia en Cuba, y que los marcaría para siempre, estuvieron los sucesos de Tarará: un grupo de seis criminales que trataban de salir ilegalmente del país había acribillados a tres oficiales de guardafronteras y herido de gravedad a un joven policía que acudió en auxilio de sus compañeros. Eladio donó su sangre a Rolando Pérez Quintosa, el joven sobreviviente, y entregó al padre de este una carta para cuando se recuperara. Lamentablemente unos días después Rolando murió, sin embargo la carta de Eladio fue publicada en la prensa cubana y las respuestas no  tardaron en llegar desde todas partes del país. En total Eladio e Irene recibieron 5000 cartas. \r\nConmovidos por lo que habían vivido se empeñaron en reunir toda la ayuda posible y fue así como enviaron a Cuba los primeros kilogramos de donaciones que, tras ser incluida su experiencia en el libro “Cuba existe es socialista y no está en coma” del arquitecto argentino Rodolfo Livingston, se incrementó a 3 toneladas por mes. A este proyecto le dieron el nombre de Chaubloqueo. \r\n(Estrellitas)\r\nEn 1996 fundaron en su casa de Caballito, Buenos Aires, el primer @Museo Che Guevara de Suramérica que, a manera de pintoresco y sui generis bazar, se dedica a divulgar la vida y la obra del rosarino heroico, y a difundir la tragedia que es el bloqueo impuesto a Cuba. En este pequeño espacio atesoran una amplia colección de fotografías, esculturas, artesanías, objetos personales, pósters, banderas… donadas por visitantes de todas partes del mundo, que muestran el modo en que el Che y su ejemplo se han integrado al imaginario colectivo y cotidiano de muchos. \r\nLos invitamos a escuchar esta apasionada entrevista con la que se comprende que  conservar la memoria es la mejor forma de mantenerla viva. (Manito y link)', 'Proyecto Comunitario', 'Juan', '', ''),
(50, 0, 0, 'asfdsfgdghfjk', '2021-09-08', 'asdf', 'asdf', 'asdf', 'asdf', 'adfs', 'asdf', 'asdf'),
(51, 0, 0, 'asfdsfgdghfjk', '2021-08-31', 'asdf', 'sadf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf'),
(52, 0, 0, 'asdf', '2021-09-08', 'asdf', 'asdf', 'asf', 'asdf', 'asdf', 'asdf', 'asdf'),
(53, 0, 0, 'asdf', '2021-08-31', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf'),
(54, 0, 0, 'Taller de Animación', '2021-08-31', 'sdfghh', 'asd', 'sdfg', 'Proyecto Comunitario', 'Juan', 'rstrdhfhj', 'dfgh'),
(55, 0, 0, 'asdf', '2021-09-01', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf', 'asdf'),
(56, 0, 0, 'gsdfgsdf', '2021-09-07', 'sdfgsd', 'sdfgsd', 'sdfgd', 'sdfg', 'sdfgsdf', 'sdfg', 'sdfgds'),
(57, 0, 0, '1', '1902-08-29', '1', '1', '1', '1', '1', '1', '1'),
(58, 0, 0, 'La buena', '2021-08-31', 'La buena', 'La buena', 'La buena', 'La buena', 'La buena', 'La buena', 'La buena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia_archivo`
--

CREATE TABLE `noticia_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_noticia` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 NOT NULL,
  `portada` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `noticia_archivo`
--

INSERT INTO `noticia_archivo` (`id`, `id_noticia`, `id_archivo`, `nota`, `portada`) VALUES
(18, 45, 81, '', 1),
(66, 46, 80, '3', 0),
(21, 47, 83, 'Jóvenes del Centro Che implementan el teletrabajo ', 1),
(22, 48, 80, '', 1),
(23, 49, 81, '', 1),
(24, 50, 83, '', 1),
(25, 51, 83, '', 1),
(26, 52, 81, '', 1),
(27, 53, 81, '', 1),
(28, 54, 81, '', 1),
(29, 55, 81, '', 1),
(30, 56, 83, 'hf33333', 0),
(31, 56, 79, 'gfjh222', 0),
(74, 57, 79, '1', 0),
(75, 57, 81, '3', 0),
(73, 57, 80, '2', 1),
(72, 58, 81, '3', 0),
(65, 46, 81, '2', 0),
(64, 46, 79, '1', 1),
(71, 58, 80, '2', 0),
(70, 58, 79, '1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia_comentario`
--

CREATE TABLE `noticia_comentario` (
  `id_noticia_comentario` bigint(20) UNSIGNED NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `autor` varchar(64) CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text CHARACTER SET latin1 NOT NULL,
  `id_noticia` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros`
--

CREATE TABLE `otros` (
  `id` int(11) NOT NULL,
  `revisado` tinyint(4) NOT NULL,
  `publico` tinyint(4) NOT NULL,
  `titulo` varchar(512) CHARACTER SET utf8mb4 NOT NULL,
  `autor` varchar(512) CHARACTER SET utf8mb4 NOT NULL,
  `tipo` varchar(512) CHARACTER SET utf8mb4 NOT NULL,
  `enlace` varchar(1024) CHARACTER SET utf8mb4 DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros_archivo`
--

CREATE TABLE `otros_archivo` (
  `id` int(11) NOT NULL,
  `id_otros` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `portada` tinyint(4) NOT NULL,
  `nota` text CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paradigma`
--

CREATE TABLE `paradigma` (
  `id` int(11) NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 NOT NULL,
  `enlace` text CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `paradigma`
--

INSERT INTO `paradigma` (`id`, `descripcion`, `enlace`) VALUES
(1, 'DescripciónDescripción\r\nDescripciónDescripción\r\nDescripciónDescripciónDescripción\r\nDescripciónDescripciónDescripciónDescripción', 'UrlDescripciónDescripciónDescripciónDescripciónDescripción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paradigma_archivo`
--

CREATE TABLE `paradigma_archivo` (
  `id` int(11) NOT NULL,
  `url` text CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `paradigma_archivo`
--

INSERT INTO `paradigma_archivo` (`id`, `url`) VALUES
(8, 'paradigma/43896.png'),
(9, 'paradigma/78536.png'),
(10, 'paradigma/71107.jpg'),
(11, 'paradigma/2021-09-0227742.jpg'),
(12, 'paradigma/2021-09-2259191.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_audiovisual`
--

CREATE TABLE `producto_audiovisual` (
  `id_producto_audiovisual` bigint(20) UNSIGNED NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `cuerpo` text CHARACTER SET latin1 NOT NULL,
  `productora` text CHARACTER SET latin1 NOT NULL,
  `autor` text CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_audiovisual_archivo`
--

CREATE TABLE `producto_audiovisual_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_producto_audiovisual` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `portada` tinyint(4) NOT NULL,
  `nota` text CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programacion`
--

CREATE TABLE `programacion` (
  `id` int(11) NOT NULL,
  `revisado` tinyint(4) DEFAULT NULL,
  `publico` tinyint(4) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `lugar` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `hora` varchar(100) DEFAULT NULL,
  `tipo_fecha` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programacion`
--

INSERT INTO `programacion` (`id`, `revisado`, `publico`, `titulo`, `descripcion`, `lugar`, `fecha`, `fecha_fin`, `hora`, `tipo_fecha`) VALUES
(1, 1, 1, '123', '123', 'Sala de Exposiciones transitorias \"Haydée Santamaría\"', '1801-02-23', NULL, NULL, 0),
(2, 0, 0, '321', '321', 'Sala de Proyecciones \"Santiago Álvarez\"', '1800-01-01', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programacion_archivo`
--

CREATE TABLE `programacion_archivo` (
  `id` int(11) NOT NULL,
  `id_programacion` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `portada` tinyint(4) NOT NULL,
  `nota` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programacion_archivo`
--

INSERT INTO `programacion_archivo` (`id`, `id_programacion`, `id_archivo`, `portada`, `nota`) VALUES
(4, 1, 79, 1, ''),
(5, 2, 79, 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `enlace` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `descripcion`, `enlace`) VALUES
(1, 'El proyecto editorial Che Guevara es una colaboración entre el Centro de Estudios Che Guevara y la editorial Ocean Sur', 'cheguevaralibros.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_archivo`
--

CREATE TABLE `proyecto_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `proyecto_archivo`
--

INSERT INTO `proyecto_archivo` (`id`, `url`) VALUES
(2, 'proyecto/2021-09-2290877.png'),
(3, 'proyecto/2021-09-2282600.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_comentario`
--

CREATE TABLE `proyecto_comentario` (
  `id_proyecto_comentario` bigint(20) UNSIGNED NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `autor` text CHARACTER SET latin1 NOT NULL,
  `fecha` date NOT NULL,
  `comentario` text CHARACTER SET latin1 NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quienes`
--

CREATE TABLE `quienes` (
  `id` int(11) NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 NOT NULL,
  `extra` text CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `quienes`
--

INSERT INTO `quienes` (`id`, `descripcion`, `extra`) VALUES
(1, 'Leo me estas....', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quienes_archivo`
--

CREATE TABLE `quienes_archivo` (
  `id` int(11) NOT NULL,
  `url` text CHARACTER SET utf8mb4 NOT NULL,
  `extra` text CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `quienes_archivo`
--

INSERT INTO `quienes_archivo` (`id`, `url`, `extra`) VALUES
(6, 'quienes_somos/75111.png', NULL),
(7, 'quienes_somos/16025.jpg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quienes_detalle`
--

CREATE TABLE `quienes_detalle` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `extra` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `quienes_detalle`
--

INSERT INTO `quienes_detalle` (`id`, `descripcion`, `extra`) VALUES
(1, 'asd', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quienes_detalle_archivo`
--

CREATE TABLE `quienes_detalle_archivo` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revista`
--

CREATE TABLE `revista` (
  `id_revista` bigint(20) UNSIGNED NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL,
  `titulo` varchar(256) CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET latin1 NOT NULL,
  `enlace` text CHARACTER SET latin1 NOT NULL,
  `numero` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `volumen` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `anno` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `revista`
--

INSERT INTO `revista` (`id_revista`, `revisado`, `publico`, `titulo`, `descripcion`, `enlace`, `numero`, `volumen`, `mes`, `anno`, `fecha`) VALUES
(12, 1, 1, 'Paradigma 1', 'Hace un recuento biográfico por la vida y obra del Che ', 'dfDFSDSD', '1', 'I', 1, 2000, '2021-08-25'),
(13, 1, 1, 'El Che y Fidel', 'El Che y Fidel', '', '1', '3', 1, 2000, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revista_archivo`
--

CREATE TABLE `revista_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_revista` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `revista_archivo`
--

INSERT INTO `revista_archivo` (`id`, `id_revista`, `id_archivo`) VALUES
(9, 12, 81),
(10, 13, 81);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `id_taller` bigint(20) UNSIGNED NOT NULL,
  `publico` tinyint(4) NOT NULL,
  `revisado` tinyint(4) NOT NULL,
  `nombre` text CHARACTER SET latin1 NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `contacto` text CHARACTER SET latin1 DEFAULT NULL,
  `encargado` text CHARACTER SET latin1 NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`id_taller`, `publico`, `revisado`, `nombre`, `descripcion`, `contacto`, `encargado`, `tipo`) VALUES
(16, 1, 1, 'Cerámica hoy', 'Taller comunitario infantil de cerámica', '764906620', 'Vega', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller_archivo`
--

CREATE TABLE `taller_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_taller` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 DEFAULT NULL,
  `portada` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `taller_archivo`
--

INSERT INTO `taller_archivo` (`id`, `id_taller`, `id_archivo`, `nota`, `portada`) VALUES
(17, 16, 81, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_audit_entry`
--

CREATE TABLE `tbl_audit_entry` (
  `audit_entry_id` int(11) NOT NULL,
  `audit_entry_timestamp` varchar(100) CHARACTER SET latin1 NOT NULL,
  `audit_entry_model_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `audit_entry_model_id` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `audit_entry_operation` varchar(100) CHARACTER SET latin1 NOT NULL,
  `audit_entry_field_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `audit_entry_old_value` text CHARACTER SET latin1 DEFAULT NULL,
  `audit_entry_new_value` text CHARACTER SET latin1 NOT NULL,
  `audit_entry_user_id` varchar(100) CHARACTER SET latin1 NOT NULL,
  `audit_entry_ip` varchar(100) CHARACTER SET latin1 NOT NULL,
  `audit_entry_user_name` varchar(256) CHARACTER SET latin1 NOT NULL,
  `place` varchar(512) COLLATE utf8_bin NOT NULL,
  `title` varchar(1024) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tbl_audit_entry`
--

INSERT INTO `tbl_audit_entry` (`audit_entry_id`, `audit_entry_timestamp`, `audit_entry_model_name`, `audit_entry_model_id`, `audit_entry_operation`, `audit_entry_field_name`, `audit_entry_old_value`, `audit_entry_new_value`, `audit_entry_user_id`, `audit_entry_ip`, `audit_entry_user_name`, `place`, `title`) VALUES
(12, '2021-09-28 18:08:59', 'Archivo', 'N/A', '', 'id_archivo', 'N/A', '99', '5', '::1', 'Leonardo', 'Archivo', ''),
(13, '2021-09-28 18:09:00', 'Archivo', 'N/A', '', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Archivo', ''),
(14, '2021-09-28 18:09:00', 'Archivo', 'N/A', '', 'titulo_archivo', 'N/A', '123', '5', '::1', 'Leonardo', 'Archivo', ''),
(15, '2021-09-28 18:09:00', 'Archivo', 'N/A', '', 'tipo_archivo', 'N/A', '1', '5', '::1', 'Leonardo', 'Archivo', ''),
(16, '2021-09-28 18:09:00', 'Archivo', 'N/A', '', 'autor_archivo', 'N/A', '123', '5', '::1', 'Leonardo', 'Archivo', ''),
(17, '2021-09-28 18:09:00', 'Archivo', 'N/A', '', 'fuente', 'N/A', '123', '5', '::1', 'Leonardo', 'Archivo', ''),
(18, '2021-09-28 18:09:00', 'Archivo', 'N/A', '', 'etiqueta', 'N/A', 'nueva ;', '5', '::1', 'Leonardo', 'Archivo', ''),
(19, '2021-09-28 18:09:00', 'Archivo', 'N/A', '', 'descripcion_archivo', 'N/A', '123', '5', '::1', 'Leonardo', 'Archivo', ''),
(20, '2021-09-28 18:09:00', 'Archivo', 'N/A', '', 'url_archivo', 'N/A', 'uploads/2021-09-2929563.jpg', '5', '::1', 'Leonardo', 'Archivo', ''),
(21, '2021-09-28 18:09:01', 'Archivo', 'N/A', '', 'fecha', 'N/A', '1800-05-1', '5', '::1', 'Leonardo', 'Archivo', ''),
(22, '2021-09-28 18:09:01', 'Archivo', 'N/A', '', 'etapa', 'N/A', 'Anterior a 1928', '5', '::1', 'Leonardo', 'Archivo', ''),
(23, '2021-09-28 18:21:09', 'backend\\models\\Archivo\\Archivo', '101', 'Insertar', 'id_archivo', 'N/A', '101', '5', '::1', 'Leonardo', 'new', ''),
(24, '2021-09-28 18:21:09', 'backend\\models\\Archivo\\Archivo', '101', 'Insertar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'new', ''),
(25, '2021-09-28 18:21:09', 'backend\\models\\Archivo\\Archivo', '101', 'Insertar', 'titulo_archivo', 'N/A', 'new', '5', '::1', 'Leonardo', 'new', ''),
(26, '2021-09-28 18:21:09', 'backend\\models\\Archivo\\Archivo', '101', 'Insertar', 'tipo_archivo', 'N/A', '1', '5', '::1', 'Leonardo', 'new', ''),
(27, '2021-09-28 18:21:09', 'backend\\models\\Archivo\\Archivo', '101', 'Insertar', 'autor_archivo', 'N/A', 'new', '5', '::1', 'Leonardo', 'new', ''),
(28, '2021-09-28 18:21:09', 'backend\\models\\Archivo\\Archivo', '101', 'Insertar', 'fuente', 'N/A', 'new', '5', '::1', 'Leonardo', 'new', ''),
(29, '2021-09-28 18:21:09', 'backend\\models\\Archivo\\Archivo', '101', 'Insertar', 'etiqueta', 'N/A', 'nueva ;', '5', '::1', 'Leonardo', 'new', ''),
(30, '2021-09-28 18:21:09', 'backend\\models\\Archivo\\Archivo', '101', 'Insertar', 'descripcion_archivo', 'N/A', 'new', '5', '::1', 'Leonardo', 'new', ''),
(31, '2021-09-28 18:21:09', 'backend\\models\\Archivo\\Archivo', '101', 'Insertar', 'url_archivo', 'N/A', 'uploads/2021-09-2917253.jpeg', '5', '::1', 'Leonardo', 'new', ''),
(32, '2021-09-28 18:21:09', 'backend\\models\\Archivo\\Archivo', '101', 'Insertar', 'fecha', 'N/A', '1800-05-1', '5', '::1', 'Leonardo', 'new', ''),
(33, '2021-09-28 18:21:09', 'backend\\models\\Archivo\\Archivo', '101', 'Insertar', 'etapa', 'N/A', 'Anterior a 1928', '5', '::1', 'Leonardo', 'new', ''),
(34, '2021-09-28 18:44:30', 'backend\\models\\Archivo\\Archivo', '101', 'Modificar', 'id_archivo', '101', '101', '5', '::1', 'Leonardo', 'Archivo', 'new otra 123'),
(35, '2021-09-28 18:44:30', 'backend\\models\\Archivo\\Archivo', '101', 'Modificar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Archivo', 'new otra 123'),
(36, '2021-09-28 18:44:30', 'backend\\models\\Archivo\\Archivo', '101', 'Modificar', 'titulo_archivo', 'new otra', 'new otra 123', '5', '::1', 'Leonardo', 'Archivo', 'new otra 123'),
(37, '2021-09-28 18:44:30', 'backend\\models\\Archivo\\Archivo', '101', 'Modificar', 'tipo_archivo', '1', '1', '5', '::1', 'Leonardo', 'Archivo', 'new otra 123'),
(38, '2021-09-28 18:44:30', 'backend\\models\\Archivo\\Archivo', '101', 'Modificar', 'autor_archivo', 'new and old que hay', 'new and old que hay 123', '5', '::1', 'Leonardo', 'Archivo', 'new otra 123'),
(39, '2021-09-28 18:44:30', 'backend\\models\\Archivo\\Archivo', '101', 'Modificar', 'fuente', 'new', 'new 123', '5', '::1', 'Leonardo', 'Archivo', 'new otra 123'),
(40, '2021-09-28 18:44:30', 'backend\\models\\Archivo\\Archivo', '101', 'Modificar', 'etiqueta', 'nueva ; otra ;', 'nueva ; otra ;', '5', '::1', 'Leonardo', 'Archivo', 'new otra 123'),
(41, '2021-09-28 18:44:31', 'backend\\models\\Archivo\\Archivo', '101', 'Modificar', 'descripcion_archivo', 'new', 'new 123', '5', '::1', 'Leonardo', 'Archivo', 'new otra 123'),
(42, '2021-09-28 18:44:31', 'backend\\models\\Archivo\\Archivo', '101', 'Modificar', 'url_archivo', 'uploads/2021-09-2917253.jpeg', 'uploads/2021-09-2917253.jpeg', '5', '::1', 'Leonardo', 'Archivo', 'new otra 123'),
(43, '2021-09-28 18:44:31', 'backend\\models\\Archivo\\Archivo', '101', 'Modificar', 'fecha', '2013-05-01', '2013-05-5', '5', '::1', 'Leonardo', 'Archivo', 'new otra 123'),
(44, '2021-09-28 18:44:31', 'backend\\models\\Archivo\\Archivo', '101', 'Modificar', 'etapa', 'Posterior a 1967', 'Posterior a 1967', '5', '::1', 'Leonardo', 'Archivo', 'new otra 123'),
(45, '2021-09-28 18:49:24', 'backend\\models\\Archivo\\Archivo', '101', 'Eliminar', 'N/A', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Archivo', 'new otra 123'),
(46, '2021-09-28 18:50:15', 'backend\\models\\Archivo\\Archivo', '100', 'Modificar', 'id_archivo', '100', '100', '5', '::1', 'Leonardo', 'Archivo', 'Trasteando'),
(47, '2021-09-28 18:50:15', 'backend\\models\\Archivo\\Archivo', '100', 'Modificar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Archivo', 'Trasteando'),
(48, '2021-09-28 18:50:15', 'backend\\models\\Archivo\\Archivo', '100', 'Modificar', 'titulo_archivo', 'Trasteando', 'Trasteando', '5', '::1', 'Leonardo', 'Archivo', 'Trasteando'),
(49, '2021-09-28 18:50:15', 'backend\\models\\Archivo\\Archivo', '100', 'Modificar', 'tipo_archivo', '1', '1', '5', '::1', 'Leonardo', 'Archivo', 'Trasteando'),
(50, '2021-09-28 18:50:15', 'backend\\models\\Archivo\\Archivo', '100', 'Modificar', 'autor_archivo', 'Autor probando', 'Autor probando', '5', '::1', 'Leonardo', 'Archivo', 'Trasteando'),
(51, '2021-09-28 18:50:16', 'backend\\models\\Archivo\\Archivo', '100', 'Modificar', 'fuente', 'Fuente Prueba', 'Fuente Prueba', '5', '::1', 'Leonardo', 'Archivo', 'Trasteando'),
(52, '2021-09-28 18:50:16', 'backend\\models\\Archivo\\Archivo', '100', 'Modificar', 'etiqueta', 'nueva ; prueba ;', 'nueva ; prueba ;', '5', '::1', 'Leonardo', 'Archivo', 'Trasteando'),
(53, '2021-09-28 18:50:16', 'backend\\models\\Archivo\\Archivo', '100', 'Modificar', 'descripcion_archivo', 'Descrip Probando', 'Descrip Probando', '5', '::1', 'Leonardo', 'Archivo', 'Trasteando'),
(54, '2021-09-28 18:50:16', 'backend\\models\\Archivo\\Archivo', '100', 'Modificar', 'url_archivo', 'uploads/2021-09-2979091.jpeg', 'uploads/2021-09-2979091.jpeg', '5', '::1', 'Leonardo', 'Archivo', 'Trasteando'),
(55, '2021-09-28 18:50:16', 'backend\\models\\Archivo\\Archivo', '100', 'Modificar', 'fecha', '1800-04-01', '1800-04-01', '5', '::1', 'Leonardo', 'Archivo', 'Trasteando'),
(56, '2021-09-28 18:50:17', 'backend\\models\\Archivo\\Archivo', '100', 'Modificar', 'etapa', 'Anterior a 1928', 'Anterior a 1928', '5', '::1', 'Leonardo', 'Archivo', 'Trasteando'),
(57, '2021-09-28 20:45:03', 'AuthItem', 'N/A', 'Insertar', 'type', NULL, '1', '5', '::1', 'Leonardo', '', ''),
(58, '2021-09-28 20:45:03', 'AuthItem', 'N/A', 'Insertar', 'description', NULL, 'no ahi', '5', '::1', 'Leonardo', '', ''),
(59, '2021-09-28 20:45:03', 'AuthItem', 'N/A', 'Insertar', 'name', NULL, 'no ahi', '5', '::1', 'Leonardo', '', ''),
(60, '2021-09-28 20:45:03', 'AuthItemChild', 'N/A', 'Insertar', 'parent', NULL, 'no ahi', '5', '::1', 'Leonardo', '', ''),
(61, '2021-09-28 20:45:03', 'AuthItemChild', 'N/A', 'Insertar', 'child', NULL, 'gestionar-comentario', '5', '::1', 'Leonardo', '', ''),
(62, '2021-09-28 20:45:39', 'User', 'N/A', 'Insertar', 'first_name', NULL, 'uno ', '5', '::1', 'Leonardo', '', ''),
(63, '2021-09-28 20:45:39', 'User', 'N/A', 'Insertar', 'last_name', NULL, 'uno ', '5', '::1', 'Leonardo', '', ''),
(64, '2021-09-28 20:45:39', 'User', 'N/A', 'Insertar', 'username', NULL, 'comentario', '5', '::1', 'Leonardo', '', ''),
(65, '2021-09-28 20:45:39', 'User', 'N/A', 'Insertar', 'email', NULL, 'uno@dos.tres', '5', '::1', 'Leonardo', '', ''),
(66, '2021-09-28 20:45:39', 'User', 'N/A', 'Insertar', 'status', NULL, '10', '5', '::1', 'Leonardo', '', ''),
(67, '2021-09-28 20:45:39', 'User', 'N/A', 'Insertar', 'password_hash', NULL, '$2y$13$JQ6oBxefr6lMN2XgDdDo2OGIUMrFGDsTfhh3fhd3cfLOt.2TWIyMO', '5', '::1', 'Leonardo', '', ''),
(68, '2021-09-28 20:45:39', 'User', 'N/A', 'Insertar', 'auth_key', NULL, 'f7esHBUBbJtkKhKl_U_DfXO2DO4ahyYF', '5', '::1', 'Leonardo', '', ''),
(69, '2021-09-28 20:45:39', 'User', 'N/A', 'Insertar', 'verification_token', NULL, '-u55xmJgEuy9gIfpMTeNxNytd8sr_7ty_1632876339', '5', '::1', 'Leonardo', '', ''),
(70, '2021-09-28 20:45:39', 'User', 'N/A', 'Insertar', 'id', NULL, '63', '5', '::1', 'Leonardo', '', ''),
(71, '2021-09-28 20:45:45', 'AuthAssignment', 'N/A', 'Insertar', 'user_id', NULL, '63', '5', '::1', 'Leonardo', '', ''),
(72, '2021-09-28 20:45:45', 'AuthAssignment', 'N/A', 'Insertar', 'item_name', NULL, 'no ahi', '5', '::1', 'Leonardo', '', ''),
(73, '2021-09-28 20:45:45', 'User', 'N/A', 'Insertar', 'type', '', 'no ahi', '5', '::1', 'Leonardo', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonio`
--

CREATE TABLE `testimonio` (
  `id_testimonio` bigint(20) UNSIGNED NOT NULL,
  `titulo` text COLLATE utf8_bin NOT NULL,
  `autor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `cuerpo` text COLLATE utf8_bin NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `testimonio`
--

INSERT INTO `testimonio` (`id_testimonio`, `titulo`, `autor`, `fecha`, `descripcion`, `cuerpo`, `revisado`, `publico`) VALUES
(11, 'El Che un amigo hasta las últimas consecuencias ', 'Oscar Fernández Mel', '2021-02-27', 'Testimonio tomado del archivo documental del Centro de Estudios Che Guevara ', 'En la semana en que celebramos el #DíaInternacionalDeLosMuseos compartimos esta entrevista realizada por Alejandro Pico de @Radio La Minga a quien fue fundador del primer Museo dedicado al Che en Argentina y Suramérica, Eladio González. \r\nTras una visita a Cuba en 1992 en la que quedaron enamorados de la isla y su gente, él y su inseparable esposa Irene Perpiñal se empeñaron en ayudar del modo en que fuera posible a la lucha del pueblo cubano contra el bloqueo impuesto por el gobierno de Estados Unidos. \r\n(Estrellitas)\r\nEntre los acontecimientos ocurridos durante su estancia en Cuba, y que los marcaría para siempre, estuvieron los sucesos de Tarará: un grupo de seis criminales que trataban de salir ilegalmente del país había acribillados a tres oficiales de guardafronteras y herido de gravedad a un joven policía que acudió en auxilio de sus compañeros. Eladio donó su sangre a Rolando Pérez Quintosa, el joven sobreviviente, y entregó al padre de este una carta para cuando se recuperara. Lamentablemente unos días después Rolando murió, sin embargo la carta de Eladio fue publicada en la prensa cubana y las respuestas no  tardaron en llegar desde todas partes del país. En total Eladio e Irene recibieron 5000 cartas. \r\nConmovidos por lo que habían vivido se empeñaron en reunir toda la ayuda posible y fue así como enviaron a Cuba los primeros kilogramos de donaciones que, tras ser incluida su experiencia en el libro “Cuba existe es socialista y no está en coma” del arquitecto argentino Rodolfo Livingston, se incrementó a 3 toneladas por mes. A este proyecto le dieron el nombre de Chaubloqueo. \r\n(Estrellitas)\r\nEn 1996 fundaron en su casa de Caballito, Buenos Aires, el primer @Museo Che Guevara de Suramérica que, a manera de pintoresco y sui generis bazar, se dedica a divulgar la vida y la obra del rosarino heroico, y a difundir la tragedia que es el bloqueo impuesto a Cuba. En este pequeño espacio atesoran una amplia colección de fotografías, esculturas, artesanías, objetos personales, pósters, banderas… donadas por visitantes de todas partes del mundo, que muestran el modo en que el Che y su ejemplo se han integrado al imaginario colectivo y cotidiano de muchos. \r\nLos invitamos a escuchar esta apasionada entrevista con la que se comprende que  conservar la memoria es la mejor forma de mantenerla viva. (Manito y link)', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonio_archivo`
--

CREATE TABLE `testimonio_archivo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_testimonio` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `nota` text CHARACTER SET latin1 NOT NULL,
  `portada` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `testimonio_archivo`
--

INSERT INTO `testimonio_archivo` (`id`, `id_testimonio`, `id_archivo`, `nota`, `portada`) VALUES
(19, 11, 81, '', 1),
(21, 12, 81, '123\r\n123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_archivo`
--

CREATE TABLE `tipo_archivo` (
  `id_tipo_archivo` bigint(20) UNSIGNED NOT NULL,
  `tipo_archivo` text CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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

CREATE TABLE `tipo_articulo` (
  `id_tipo_articulo` bigint(20) UNSIGNED NOT NULL,
  `tipo_articulo` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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

CREATE TABLE `tipo_homenaje` (
  `id_tipo_homenaje` bigint(20) UNSIGNED NOT NULL,
  `tipo_homenaje` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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

CREATE TABLE `tipo_producto` (
  `id` int(11) NOT NULL,
  `tipo_producto` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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

CREATE TABLE `tipo_taller` (
  `id` int(11) NOT NULL,
  `tipo` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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

CREATE TABLE `trabajador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `cargo` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `correo` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `area` varchar(128) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`id`, `nombre`, `cargo`, `correo`, `area`) VALUES
(4, 'Aleida March de la Torre', 'Directora', 'aleida.cu', 'Dirección'),
(6, 'Amanda Terrero', 'Investigadora', 'amanda.com', 'Coordinación Académica'),
(7, 'Camilo Guevara March', 'Coordinador de Proyectos Alternativos ', 'camilo@cubarte.cult.cu', 'Coordinación de Proyectos Alternativos'),
(8, 'Patricia Durán Rigali', 'Diseñadora', 'patricia@cubarte.cult.cu', 'Coordinación de Proyectos Alternativos'),
(9, 'Daína Rodríguez González', 'Investigadora', 'daina@cubarte.cult.cu', 'Coordinación de Proyectos Alternativos'),
(11, 'Lisette vaaldés Veitía ', 'Investigadora', 'liset@cubarte.cult.cu', 'Coordinación de Proyectos Alternativos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(180) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(128) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `verification_token`, `type`) VALUES
(5, 'Leonardo', 'Mancebo', 'Leonardo', 'cT6bAltRWdq1DNQ3cqZypnaoaO5YK5N6', '$2y$13$JboMP02dnzm/4oenJAkpQ.s8oEgBItQCYqzcO7jQ72j.530UDXeEa', NULL, 'mancebotejera@yahoo.com', 10, 1599005445, 1628731916, 'wKJzDeUdSC5EAxM7lSwhvtw8ihr96tAG_1628731908', 'administrador'),
(56, 'Administrador', 'Centro Che', 'Administrador', 'Eo90fUI9pNG1Gir3EQxAEltLNifxRYB4', '$2y$13$1.KcNGqL1nYU5Y.UoUE.uu4xU3LT61szoW/XAIZPYSNSNuK439ZXu', NULL, 'administrador@admin.cu', 10, 0, 0, 'oaSWLxYJ0MW5Cvbm7hwRjTXFJsQ9C5Qy_1632145995', 'administrador'),
(57, 'Coordinador', 'Centro Che', 'Coordinador', 'JjOm2RUPlLoyiRmDjN_O6PS2Cv6sIifb', '$2y$13$uvRc7NzqVpXtdmPgHCPD7.4bG7rpKiI4sWZg8Zo240uFaYWrzYm2S', NULL, 'Coordinador@admin.cu', 10, 0, 0, 'eI4UkDzFujgDQBLEi_d2Rdoz-QApxc98_1632146036', 'coordinador-de-proyectos-alternativos'),
(58, 'Borrar', 'Borrar', 'Borrar', 'ehzGNlYPD1Y3HRlnoc0QGqu643RtvaUp', '$2y$13$C6TNREXkeMeJYMD9WfD1ee/f1ic3lqEIqsslz8y6IlC/wQUg/1xJy', NULL, 'Janito@gmail.com', 9, 0, 0, 'r_YjMN49jYnlJxNvsfec848i9H7aCCVn_1632326894', 'Más ñoñerías no puedo poner'),
(59, 'Amanda', 'Terrero', 'Amanda', 'g3Lu4eeFbsSP_sDo1OSfWJ9pjyQTZEyU', '$2y$13$UYOxWXcCuViB8rLkNjBhfONAqFGqyu5V3Dw.KHc25GuLHYs2Ks1.y', NULL, 'amanda@gmail.com', 10, 0, 0, 'ByrF5Lrgo2ywMqX8xWIs0XaHJbr78Xkr_1632324687', 'gestor-de-contenidos'),
(60, 'María del Carmen', 'Ariet García', 'María del Carmen', 'xjNybssgE7uxNUfjJQzz1M0KbK8WwBJO', '$2y$13$dA3PL3113ROR9/xIyjcciO4pSQKjIE5NwdS2n85QOvdIJuqDsBrKG', NULL, 'maria@gmail.com', 10, 0, 0, '3E-Lg5fJXuPE3vEWt5HPaoAgd_DxHiE-_1632325300', 'coordinador-academico'),
(61, 'Camilo', 'Guevara March', 'Camilo', 'yKoAIKTBpfQGd9-13jPBAj6jM1yJTMrI', '$2y$13$fdnhGvSBPK/rma12afxwDuhy9hJy5oipPuu3H75t0FcMngLBMi5ym', NULL, 'Camilo@gmail.com', 10, 0, 0, 'P5gtSjuE3RdHLmsYxxtu4jwN5Dasvu53_1632325491', 'coordinador-de-proyectos-alternativos'),
(62, 'Darling', 'Rodríguez', 'Cátedra Camagüey', 'zUfBq6KCvkfa4ZuzyZdWkJE_46nDD_HY', '$2y$13$gtKaDVSqmJH1EIqrii3PeOLM.Uc73P6KCfGDCxHiD3kphyTDiIyNS', NULL, 'darling@gmail.com', 10, 0, 0, 'BPzJ6S0xAIQm4a15fPmqm-WHsR3rDOYD_1632325685', 'catedra'),
(63, 'uno ', 'uno ', 'comentario', 'f7esHBUBbJtkKhKl_U_DfXO2DO4ahyYF', '$2y$13$JQ6oBxefr6lMN2XgDdDo2OGIUMrFGDsTfhh3fhd3cfLOt.2TWIyMO', NULL, 'uno@dos.tres', 10, 0, 0, '-u55xmJgEuy9gIfpMTeNxNytd8sr_7ty_1632876339', 'no ahi');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`id_archivo`),
  ADD UNIQUE KEY `id_archivo` (`id_archivo`);

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`),
  ADD UNIQUE KEY `id_articulo` (`id_articulo`);

--
-- Indices de la tabla `articulo_archivo`
--
ALTER TABLE `articulo_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_articulo_archivo` (`id`);

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coleccion_documental`
--
ALTER TABLE `coleccion_documental`
  ADD PRIMARY KEY (`id_coleccion_documental`),
  ADD UNIQUE KEY `id_coleccion_documental` (`id_coleccion_documental`);

--
-- Indices de la tabla `coleccion_documental_archivo`
--
ALTER TABLE `coleccion_documental_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_coleccion_documental_archivo` (`id`),
  ADD KEY `fk_coleccion_documental` (`id_coleccion_documental`),
  ADD KEY `fk_archivo` (`id_archivo`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `correspondencia`
--
ALTER TABLE `correspondencia`
  ADD PRIMARY KEY (`id_correspondencia`),
  ADD UNIQUE KEY `id_correspondencia` (`id_correspondencia`);

--
-- Indices de la tabla `correspondencia_archivo`
--
ALTER TABLE `correspondencia_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_correspondencia_archivo` (`id`),
  ADD KEY `fk_correspondencia` (`id_correspondencia`),
  ADD KEY `fk_archivo` (`id_archivo`);

--
-- Indices de la tabla `curso_online`
--
ALTER TABLE `curso_online`
  ADD PRIMARY KEY (`id_curso`),
  ADD UNIQUE KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `curso_online_archivo`
--
ALTER TABLE `curso_online_archivo`
  ADD PRIMARY KEY (`id_curso_online_archivo`),
  ADD UNIQUE KEY `id_curso_online_archivo` (`id_curso_online_archivo`),
  ADD KEY `fk_curso_online` (`id_curso_online`),
  ADD KEY `fk_archivo` (`id_archivo`);

--
-- Indices de la tabla `discurso`
--
ALTER TABLE `discurso`
  ADD PRIMARY KEY (`id_discurso`),
  ADD UNIQUE KEY `id_discurso` (`id_discurso`);

--
-- Indices de la tabla `discurso_archivo`
--
ALTER TABLE `discurso_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_discurso_archivo` (`id`);

--
-- Indices de la tabla `escrito`
--
ALTER TABLE `escrito`
  ADD PRIMARY KEY (`id_escrito`),
  ADD UNIQUE KEY `id_escrito` (`id_escrito`);

--
-- Indices de la tabla `escrito_archivo`
--
ALTER TABLE `escrito_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_escrito_archivo` (`id`),
  ADD KEY `fk_escrito` (`id_escrito`);

--
-- Indices de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `etiqueta_archivo`
--
ALTER TABLE `etiqueta_archivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `etiqueta_coleccion_documental`
--
ALTER TABLE `etiqueta_coleccion_documental`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `exposicion`
--
ALTER TABLE `exposicion`
  ADD PRIMARY KEY (`id_exposicion`),
  ADD UNIQUE KEY `id_exposicion` (`id_exposicion`);

--
-- Indices de la tabla `exposicion_archivo`
--
ALTER TABLE `exposicion_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_exposicion_archivo` (`id`),
  ADD KEY `fk_exposicion` (`id_exposicion`),
  ADD KEY `fk_archivo` (`id_archivo`);

--
-- Indices de la tabla `galeria_vo`
--
ALTER TABLE `galeria_vo`
  ADD PRIMARY KEY (`id_galeria_vo`),
  ADD UNIQUE KEY `id_galeria_vo` (`id_galeria_vo`);

--
-- Indices de la tabla `galeria_vo_archivo`
--
ALTER TABLE `galeria_vo_archivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gestion_documental`
--
ALTER TABLE `gestion_documental`
  ADD PRIMARY KEY (`id_gestion_documental`);

--
-- Indices de la tabla `gestion_documental_archivo`
--
ALTER TABLE `gestion_documental_archivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hecho`
--
ALTER TABLE `hecho`
  ADD PRIMARY KEY (`id_hecho`),
  ADD UNIQUE KEY `id_hecho` (`id_hecho`);

--
-- Indices de la tabla `hecho_archivo`
--
ALTER TABLE `hecho_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_hecho_archivo` (`id`),
  ADD KEY `fk_hecho` (`id_hecho`),
  ADD KEY `fk_archivo` (`id_archivo`);

--
-- Indices de la tabla `homenaje`
--
ALTER TABLE `homenaje`
  ADD PRIMARY KEY (`id_homenaje`),
  ADD UNIQUE KEY `id_homenaje` (`id_homenaje`);

--
-- Indices de la tabla `homenaje_archivo`
--
ALTER TABLE `homenaje_archivo`
  ADD PRIMARY KEY (`id_homenaje_archivo`),
  ADD UNIQUE KEY `id_homenaje_archivo` (`id_homenaje_archivo`),
  ADD KEY `fk_homenaje` (`id_homenaje`),
  ADD KEY `fk_archivo` (`id_archivo`);

--
-- Indices de la tabla `investigacion`
--
ALTER TABLE `investigacion`
  ADD PRIMARY KEY (`id_investigacion`),
  ADD UNIQUE KEY `id_investigacion` (`id_investigacion`);

--
-- Indices de la tabla `investigacion_archivo`
--
ALTER TABLE `investigacion_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_investigacion_archivo` (`id`),
  ADD KEY `fk_investigacion` (`id_investigacion`),
  ADD KEY `fk_archivo` (`id_archivo`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libro_archivo`
--
ALTER TABLE `libro_archivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `linea_investigacion`
--
ALTER TABLE `linea_investigacion`
  ADD PRIMARY KEY (`id_linea_investigacion`),
  ADD UNIQUE KEY `id_linea_investigacion` (`id_linea_investigacion`);

--
-- Indices de la tabla `linea_investigacion_archivo`
--
ALTER TABLE `linea_investigacion_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_linea_investigacion_archivo` (`id`),
  ADD KEY `fk_linea_investigacion` (`id_linea_investigacion`),
  ADD KEY `fk_archivo` (`id_archivo`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`),
  ADD UNIQUE KEY `id_noticia` (`id_noticia`);

--
-- Indices de la tabla `noticia_archivo`
--
ALTER TABLE `noticia_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_noticia_archivo` (`id`),
  ADD KEY `fk_noticia` (`id_noticia`),
  ADD KEY `fk_archivo` (`id_archivo`);

--
-- Indices de la tabla `noticia_comentario`
--
ALTER TABLE `noticia_comentario`
  ADD PRIMARY KEY (`id_noticia_comentario`),
  ADD UNIQUE KEY `id_noticia_comentario` (`id_noticia_comentario`),
  ADD KEY `fk_noticia_comentario` (`id_noticia`);

--
-- Indices de la tabla `otros`
--
ALTER TABLE `otros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `otros_archivo`
--
ALTER TABLE `otros_archivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_otros_archivo` (`id_otros`);

--
-- Indices de la tabla `paradigma`
--
ALTER TABLE `paradigma`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paradigma_archivo`
--
ALTER TABLE `paradigma_archivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto_audiovisual`
--
ALTER TABLE `producto_audiovisual`
  ADD PRIMARY KEY (`id_producto_audiovisual`),
  ADD UNIQUE KEY `id_producto_audiovisual` (`id_producto_audiovisual`);

--
-- Indices de la tabla `producto_audiovisual_archivo`
--
ALTER TABLE `producto_audiovisual_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_producto_audiovisual_archivo` (`id`),
  ADD KEY `fk_producto_audiovisual` (`id_producto_audiovisual`),
  ADD KEY `fk_archivo` (`id_archivo`);

--
-- Indices de la tabla `programacion`
--
ALTER TABLE `programacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `programacion_archivo`
--
ALTER TABLE `programacion_archivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_programacion` (`id_programacion`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indices de la tabla `proyecto_archivo`
--
ALTER TABLE `proyecto_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_proyecto_archivo` (`id`);

--
-- Indices de la tabla `proyecto_comentario`
--
ALTER TABLE `proyecto_comentario`
  ADD PRIMARY KEY (`id_proyecto_comentario`),
  ADD UNIQUE KEY `id_proyecto_comentario` (`id_proyecto_comentario`);

--
-- Indices de la tabla `quienes`
--
ALTER TABLE `quienes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quienes_archivo`
--
ALTER TABLE `quienes_archivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `quienes_detalle`
--
ALTER TABLE `quienes_detalle`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `revista`
--
ALTER TABLE `revista`
  ADD PRIMARY KEY (`id_revista`),
  ADD UNIQUE KEY `id_revista` (`id_revista`);

--
-- Indices de la tabla `revista_archivo`
--
ALTER TABLE `revista_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_revista_archivo` (`id`),
  ADD KEY `fk_revista` (`id_revista`),
  ADD KEY `fk_archivo` (`id_archivo`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`id_taller`),
  ADD UNIQUE KEY `id_taller` (`id_taller`);

--
-- Indices de la tabla `taller_archivo`
--
ALTER TABLE `taller_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_taller_archivo` (`id`),
  ADD KEY `fk_taller` (`id_taller`),
  ADD KEY `fk_archivo` (`id_archivo`);

--
-- Indices de la tabla `tbl_audit_entry`
--
ALTER TABLE `tbl_audit_entry`
  ADD PRIMARY KEY (`audit_entry_id`),
  ADD UNIQUE KEY `audit_entry_id` (`audit_entry_id`) USING BTREE;

--
-- Indices de la tabla `testimonio`
--
ALTER TABLE `testimonio`
  ADD PRIMARY KEY (`id_testimonio`),
  ADD UNIQUE KEY `id_testimonio` (`id_testimonio`);

--
-- Indices de la tabla `testimonio_archivo`
--
ALTER TABLE `testimonio_archivo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_testimonio_archivo` (`id`);

--
-- Indices de la tabla `tipo_archivo`
--
ALTER TABLE `tipo_archivo`
  ADD PRIMARY KEY (`id_tipo_archivo`),
  ADD UNIQUE KEY `id_tipo_archivo` (`id_tipo_archivo`);

--
-- Indices de la tabla `tipo_articulo`
--
ALTER TABLE `tipo_articulo`
  ADD PRIMARY KEY (`id_tipo_articulo`),
  ADD UNIQUE KEY `id_tipo_articulo` (`id_tipo_articulo`);

--
-- Indices de la tabla `tipo_homenaje`
--
ALTER TABLE `tipo_homenaje`
  ADD PRIMARY KEY (`id_tipo_homenaje`),
  ADD UNIQUE KEY `id_tipo_homenaje` (`id_tipo_homenaje`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_taller`
--
ALTER TABLE `tipo_taller`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `id_archivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `articulo_archivo`
--
ALTER TABLE `articulo_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `carrusel`
--
ALTER TABLE `carrusel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `coleccion_documental`
--
ALTER TABLE `coleccion_documental`
  MODIFY `id_coleccion_documental` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `coleccion_documental_archivo`
--
ALTER TABLE `coleccion_documental_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `correspondencia`
--
ALTER TABLE `correspondencia`
  MODIFY `id_correspondencia` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `correspondencia_archivo`
--
ALTER TABLE `correspondencia_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `curso_online`
--
ALTER TABLE `curso_online`
  MODIFY `id_curso` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `curso_online_archivo`
--
ALTER TABLE `curso_online_archivo`
  MODIFY `id_curso_online_archivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `discurso`
--
ALTER TABLE `discurso`
  MODIFY `id_discurso` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `discurso_archivo`
--
ALTER TABLE `discurso_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `escrito`
--
ALTER TABLE `escrito`
  MODIFY `id_escrito` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `escrito_archivo`
--
ALTER TABLE `escrito_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `etiqueta`
--
ALTER TABLE `etiqueta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `etiqueta_archivo`
--
ALTER TABLE `etiqueta_archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `etiqueta_coleccion_documental`
--
ALTER TABLE `etiqueta_coleccion_documental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `exposicion`
--
ALTER TABLE `exposicion`
  MODIFY `id_exposicion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `exposicion_archivo`
--
ALTER TABLE `exposicion_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `galeria_vo`
--
ALTER TABLE `galeria_vo`
  MODIFY `id_galeria_vo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `galeria_vo_archivo`
--
ALTER TABLE `galeria_vo_archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `gestion_documental`
--
ALTER TABLE `gestion_documental`
  MODIFY `id_gestion_documental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `gestion_documental_archivo`
--
ALTER TABLE `gestion_documental_archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `hecho`
--
ALTER TABLE `hecho`
  MODIFY `id_hecho` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `hecho_archivo`
--
ALTER TABLE `hecho_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `homenaje`
--
ALTER TABLE `homenaje`
  MODIFY `id_homenaje` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `homenaje_archivo`
--
ALTER TABLE `homenaje_archivo`
  MODIFY `id_homenaje_archivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `investigacion`
--
ALTER TABLE `investigacion`
  MODIFY `id_investigacion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `investigacion_archivo`
--
ALTER TABLE `investigacion_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `libro_archivo`
--
ALTER TABLE `libro_archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `linea_investigacion`
--
ALTER TABLE `linea_investigacion`
  MODIFY `id_linea_investigacion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `linea_investigacion_archivo`
--
ALTER TABLE `linea_investigacion_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `noticia_archivo`
--
ALTER TABLE `noticia_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `noticia_comentario`
--
ALTER TABLE `noticia_comentario`
  MODIFY `id_noticia_comentario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `otros`
--
ALTER TABLE `otros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `otros_archivo`
--
ALTER TABLE `otros_archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `paradigma`
--
ALTER TABLE `paradigma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paradigma_archivo`
--
ALTER TABLE `paradigma_archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `producto_audiovisual`
--
ALTER TABLE `producto_audiovisual`
  MODIFY `id_producto_audiovisual` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `producto_audiovisual_archivo`
--
ALTER TABLE `producto_audiovisual_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `programacion`
--
ALTER TABLE `programacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `programacion_archivo`
--
ALTER TABLE `programacion_archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proyecto_archivo`
--
ALTER TABLE `proyecto_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proyecto_comentario`
--
ALTER TABLE `proyecto_comentario`
  MODIFY `id_proyecto_comentario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `quienes`
--
ALTER TABLE `quienes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `quienes_archivo`
--
ALTER TABLE `quienes_archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `revista`
--
ALTER TABLE `revista`
  MODIFY `id_revista` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `revista_archivo`
--
ALTER TABLE `revista_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `id_taller` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `taller_archivo`
--
ALTER TABLE `taller_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `tbl_audit_entry`
--
ALTER TABLE `tbl_audit_entry`
  MODIFY `audit_entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `testimonio`
--
ALTER TABLE `testimonio`
  MODIFY `id_testimonio` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `testimonio_archivo`
--
ALTER TABLE `testimonio_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tipo_archivo`
--
ALTER TABLE `tipo_archivo`
  MODIFY `id_tipo_archivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_articulo`
--
ALTER TABLE `tipo_articulo`
  MODIFY `id_tipo_articulo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tipo_homenaje`
--
ALTER TABLE `tipo_homenaje`
  MODIFY `id_tipo_homenaje` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_taller`
--
ALTER TABLE `tipo_taller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
