-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2021 a las 02:02:03
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
  `fecha_fin` date DEFAULT NULL,
  `tipo_fecha` smallint(6) DEFAULT NULL,
  `etapa` varchar(64) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`id_archivo`, `revisado`, `titulo_archivo`, `tipo_archivo`, `autor_archivo`, `fuente`, `etiqueta`, `descripcion_archivo`, `url_archivo`, `fecha`, `fecha_fin`, `tipo_fecha`, `etapa`) VALUES
(79, 1, 'Portada', 1, 'Patricia Navarro', '', 'Portada ; Ernesto Guevara ; Centro Estudios ;', 'Aviador', 'uploads/Leo.jpg', NULL, NULL, NULL, 'No Definida'),
(80, 1, 'Galería', 1, 'Eric Janero', 'Eric', 'Che ; Centro Estudios ;', 'Galería de Pruebas', 'uploads/Eric.png', '2021-08-03', NULL, NULL, 'Posterior a 1967'),
(81, 1, 'Presentación Centro', 1, 'Centro Che Cuba', 'Archivo Centro', 'institucional', 'Presentación donde se explica la visión, misión y objeto social del Cento de Estudios Che Guevara. ', 'uploads/Presentación Centro.jpg', '2021-06-14', NULL, NULL, 'Posterior a 1967'),
(83, 1, 'Teletrabajo', 1, 'Centro Che Cuba', 'Archivo Centro', 'Centro Estudios ;', 'Jóvenes del Centro de Estudios Che Guevara aprovechan las ventajas de las nuevas tecnologías y continúan desarrollando proyectos a pesar de las limitaciones por COVID. ', 'uploads/Teletrabajo.png', '2021-08-15', NULL, NULL, 'Posterior a 1967'),
(85, 1, 'Aeroplano', 1, '', '', 'Che ; Ernesto Guevara ;', 'Aeroplano', 'uploads/hgfds.jpg', '1942-09-02', NULL, NULL, 'Infancia'),
(87, 1, 'Guerrillero Heroico', 1, 'Alberto Korda.', '', 'Ernesto Guevara ;', 'La foto de korda!!!!', 'uploads/Che.jpg', '1962-03-04', NULL, NULL, 'Adulto'),
(103, 0, 'Audio', 2, 'Juan', '', 'otra ;', 'Nuevo Audio', 'uploads/2021-10-2121633.mp3', '1950-03-02', NULL, NULL, 'Adolescencia'),
(105, 0, 'Video Tejetrabajo', 3, 'Centro Estudios', 'Centro Estudios', 'Centro Estudios ;', 'Demostrando las posibilidades del teletrabajo.', 'uploads/2021-10-2436775.mp4', '2021-05-01', NULL, NULL, 'Posterior a 1967');

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
  `fecha_fin` date DEFAULT NULL,
  `tipo_fecha` smallint(6) DEFAULT NULL,
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

INSERT INTO `articulo` (`id_articulo`, `revisado`, `publico`, `titulo`, `autor`, `fecha`, `fecha_fin`, `tipo_fecha`, `resumen`, `palabras_clave`, `id_investigacion`, `abstract`, `keywords`, `cuerpo`) VALUES
(34, 0, 1, 'Che Guevara: experiencias comunicativas en torno a su vida y obra', 'Camilo Guevara', '2020-10-01', NULL, NULL, 'El trabajo del Centro de Estudios Che Guevara se divide, en la práctica, en dos áreas principales, una científica, dedicada a la investigación y todo aquello que concierne al mundo académico.', 'mundo académico', 16, 'mundo académico', 'mundo académico', 'El trabajo del Centro de Estudios Che Guevara se divide, en la práctica, en dos áreas principales, una científica, dedicada a la investigación y todo aquello que concierne al mundo académico, y otra divulgativa,  que obtiene primordialmente de la primera los contenidos para llevar a cabo todos los proyectos que le atañen.');

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
(33, 39, 80, '', 1),
(34, 40, 79, '', 1),
(35, 40, 80, '', 0),
(36, 41, 81, '', 1),
(38, 42, 85, '', 1),
(47, 34, 83, 'Esta es la nota nueva', 1),
(48, 34, 80, 'Hola', 0);

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
('gestor-de-contenidos', '63', NULL);

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
('gestor-de-contenidos', 'gestionar-vida-obra');

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
  `fecha_fin` date DEFAULT NULL,
  `tipo_fecha` smallint(6) DEFAULT NULL,
  `autor` text CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `coleccion_documental`
--

INSERT INTO `coleccion_documental` (`id_coleccion_documental`, `revisado`, `publico`, `titulo`, `descripcion`, `etiquetas`, `tipologia`, `fecha`, `fecha_fin`, `tipo_fecha`, `autor`) VALUES
(20, 0, 0, 'Nuevo Documento', 'Documento', 'nueva ; prueba ;', 'Documento', '1800-01-01', NULL, NULL, 'Documento');

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
(40, '2021-09-02 20:13:06', 'assda', 'asf@zxc.com', 'asfa', 'Coordinación Académica', 'articulo', 34, 0, 0, 0),
(41, '2021-10-03 01:25:55', 'Administrador Centro Che', 'Nuevo@sfdf.com', 'asdf', 'Coordinación Académica', 'comentario', 39, 1, 1, 1),
(42, '2021-10-03 01:26:26', 'Administrador Centro Che', 'Nuevo@sfdf.com', 'asdf', 'Coordinación Académica', 'comentario', 39, 1, 1, 1);

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
  `fecha` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `tipo_fecha` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `correspondencia`
--

INSERT INTO `correspondencia` (`id_correspondencia`, `revisado`, `publico`, `titulo`, `descripcion`, `cuerpo`, `destinatario`, `remitente`, `fecha`, `fecha_fin`, `tipo_fecha`) VALUES
(12, 0, 1, 'Carta de Calixto García al Che', 'Carta enviada desde la Sierra MAestra al Che Guevara por el comandante Calixto García', 'En la semana en que celebramos el #DíaInternacionalDeLosMuseos compartimos esta entrevista realizada por Alejandro Pico de @Radio La Minga a quien fue fundador del primer Museo dedicado al Che en Argentina y Suramérica, Eladio González. \r\nTras una visita a Cuba en 1992 en la que quedaron enamorados de la isla y su gente, él y su inseparable esposa Irene Perpiñal se empeñaron en ayudar del modo en que fuera posible a la lucha del pueblo cubano contra el bloqueo impuesto por el gobierno de Estados Unidos. \r\n(Estrellitas)\r\nEntre los acontecimientos ocurridos durante su estancia en Cuba, y que los marcaría para siempre, estuvieron los sucesos de Tarará: un grupo de seis criminales que trataban de salir ilegalmente del país había acribillados a tres oficiales de guardafronteras y herido de gravedad a un joven policía que acudió en auxilio de sus compañeros. Eladio donó su sangre a Rolando Pérez Quintosa, el joven sobreviviente, y entregó al padre de este una carta para cuando se recuperara. Lamentablemente unos días después Rolando murió, sin embargo la carta de Eladio fue publicada en la prensa cubana y las respuestas no  tardaron en llegar desde todas partes del país. En total Eladio e Irene recibieron 5000 cartas. \r\nConmovidos por lo que habían vivido se empeñaron en reunir toda la ayuda posible y fue así como enviaron a Cuba los primeros kilogramos de donaciones que, tras ser incluida su experiencia en el libro “Cuba existe es socialista y no está en coma” del arquitecto argentino Rodolfo Livingston, se incrementó a 3 toneladas por mes. A este proyecto le dieron el nombre de Chaubloqueo. \r\n(Estrellitas)\r\nEn 1996 fundaron en su casa de Caballito, Buenos Aires, el primer @Museo Che Guevara de Suramérica que, a manera de pintoresco y sui generis bazar, se dedica a divulgar la vida y la obra del rosarino heroico, y a difundir la tragedia que es el bloqueo impuesto a Cuba. En este pequeño espacio atesoran una amplia colección de fotografías, esculturas, artesanías, objetos personales, pósters, banderas… donadas por visitantes de todas partes del mundo, que muestran el modo en que el Che y su ejemplo se han integrado al imaginario colectivo y cotidiano de muchos. \r\nLos invitamos a escuchar esta apasionada entrevista con la que se comprende que  conservar la memoria es la mejor forma de mantenerla viva. (Manito y link)\r\n', 'Ernesto Che Guevara', 'Calixto García', '1958-06-14', NULL, NULL);

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
(22, 12, 83, '', 1);

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
  `fecha_fin` date DEFAULT NULL,
  `tipo_fecha` smallint(6) DEFAULT NULL,
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

INSERT INTO `discurso` (`id_discurso`, `titulo`, `fecha`, `fecha_fin`, `tipo_fecha`, `descripcion`, `lugar`, `medio`, `entrevistador`, `cuerpo`, `revisado`, `publico`, `identificador`) VALUES
(6, 'Entrevista al Che por Jorge Ricardo Masetti', '1958-04-10', NULL, NULL, 'Entrevista al Che realizada por el periodista argentino Jorge Ricardo Masetti desde la Sierra Maestra', 'Sierra Maestra', 'Escrito', 'Jorge Ricardo Masetti', 'En la semana en que celebramos el #DíaInternacionalDeLosMuseos compartimos esta entrevista realizada por Alejandro Pico de @Radio La Minga a quien fue fundador del primer Museo dedicado al Che en Argentina y Suramérica, Eladio González. \r\nTras una visita a Cuba en 1992 en la que quedaron enamorados de la isla y su gente, él y su inseparable esposa Irene Perpiñal se empeñaron en ayudar del modo en que fuera posible a la lucha del pueblo cubano contra el bloqueo impuesto por el gobierno de Estados Unidos. \r\n(Estrellitas)\r\nEntre los acontecimientos ocurridos durante su estancia en Cuba, y que los marcaría para siempre, estuvieron los sucesos de Tarará: un grupo de seis criminales que trataban de salir ilegalmente del país había acribillados a tres oficiales de guardafronteras y herido de gravedad a un joven policía que acudió en auxilio de sus compañeros. Eladio donó su sangre a Rolando Pérez Quintosa, el joven sobreviviente, y entregó al padre de este una carta para cuando se recuperara. Lamentablemente unos días después Rolando murió, sin embargo la carta de Eladio fue publicada en la prensa cubana y las respuestas no  tardaron en llegar desde todas partes del país. En total Eladio e Irene recibieron 5000 cartas. \r\nConmovidos por lo que habían vivido se empeñaron en reunir toda la ayuda posible y fue así como enviaron a Cuba los primeros kilogramos de donaciones que, tras ser incluida su experiencia en el libro “Cuba existe es socialista y no está en coma” del arquitecto argentino Rodolfo Livingston, se incrementó a 3 toneladas por mes. A este proyecto le dieron el nombre de Chaubloqueo. \r\n(Estrellitas)\r\nEn 1996 fundaron en su casa de Caballito, Buenos Aires, el primer @Museo Che Guevara de Suramérica que, a manera de pintoresco y sui generis bazar, se dedica a divulgar la vida y la obra del rosarino heroico, y a difundir la tragedia que es el bloqueo impuesto a Cuba. En este pequeño espacio atesoran una amplia colección de fotografías, esculturas, artesanías, objetos personales, pósters, banderas… donadas por visitantes de todas partes del mundo, que muestran el modo en que el Che y su ejemplo se han integrado al imaginario colectivo y cotidiano de muchos. \r\nLos invitamos a escuchar esta apasionada entrevista con la que se comprende que  conservar la memoria es la mejor forma de mantenerla viva. (Manito y link)\r\n', 0, 1, 1);

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
(13, 6, 80, '', 1);

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
  `fecha` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `tipo_fecha` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(6, 'prueba'),
(7, 'Portada'),
(8, 'Che'),
(9, 'Ernesto Guevara'),
(10, 'Juventud'),
(11, 'Ernesto \"Che\" Guevara'),
(12, 'Centro Estudios'),
(13, 'Ministro de Economía');

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
(15, 6, 100),
(16, 5, 102),
(17, 6, 102),
(18, 6, 104),
(19, 7, 79),
(20, 9, 79),
(21, 12, 79),
(22, 8, 80),
(23, 12, 80),
(24, 8, 85),
(25, 9, 85),
(26, 9, 87),
(27, 12, 83);

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
(18, 0, 0, 'Nuevo', 'sdfg', 'sdfg', '', 2, '1999-01-01', NULL, 'sdfg', 'asd');

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
(32, 18, 79, '', 1);

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

--
-- Volcado de datos para la tabla `galeria_vo`
--

INSERT INTO `galeria_vo` (`id_galeria_vo`, `id_archivo`, `tipo`, `genero`, `tipo_archivo`, `publico`, `nota`) VALUES
(12, 'uploads/Eric.png', 1, NULL, 1, 1, NULL),
(13, 'uploads/2021-10-2436775.mp4', 3, NULL, 3, 1, NULL),
(14, 'uploads/2021-10-2121633.mp3', 2, NULL, 2, 1, NULL);

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

--
-- Volcado de datos para la tabla `galeria_vo_archivo`
--

INSERT INTO `galeria_vo_archivo` (`id`, `id_galeria_vo`, `id_archivo`, `nota`) VALUES
(10, 12, 80, ''),
(11, 13, 105, ''),
(12, 14, 103, '');

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
(1, 'Portada del la Colección Documental');

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
(17, 'paradigma/2021-10-2415269.jpg'),
(18, 'paradigma/2021-10-2436692.jpg'),
(19, 'paradigma/2021-10-2443191.jpg'),
(20, 'paradigma/2021-10-2439834.jpg'),
(21, 'paradigma/2021-10-2490596.jpg');

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
  `fecha_fin` date DEFAULT NULL,
  `tipo_fecha` smallint(6) NOT NULL,
  `etapa` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `hecho`
--

INSERT INTO `hecho` (`id_hecho`, `revisado`, `publico`, `titulo`, `descripcion`, `cuerpo`, `fecha`, `fecha_fin`, `tipo_fecha`, `etapa`) VALUES
(11, 0, 0, 'Nuevo', 'fg', 'jhfgj', '1889-02-01', '1999-02-09', 1, 'Anterior a 1928');

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
(19, 11, 81, '', 1);

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
  `fecha_fin` date DEFAULT NULL,
  `tipo_fecha` smallint(6) DEFAULT NULL,
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

INSERT INTO `libro` (`id`, `revisado`, `publico`, `fecha`, `fecha_fin`, `tipo_fecha`, `titulo`, `autor`, `compilador`, `linea`, `palabras_clave`, `descripcion`) VALUES
(2, 0, 0, '2018-08-20', NULL, NULL, 'Che Presente', 'María del Carmen Ariet', 'Maria del Carmen Ariet', 'Memoria Histórica', 'centro che, vida y obra, Che Guevara', 'Antologia');

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
  `fecha_fin` date DEFAULT NULL,
  `tipo_fecha` smallint(6) DEFAULT NULL,
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

INSERT INTO `noticia` (`id_noticia`, `revisado`, `publico`, `titulo_noticia`, `fecha`, `fecha_fin`, `tipo_fecha`, `referencia`, `descripcion`, `cuerpo`, `etiqueta`, `autor`, `contacto`, `fuente`) VALUES
(46, 1, 1, 'Inicia Centro Che Cuba talleres para niños ', '2021-10-13', NULL, NULL, '', 'Tras un año sin poder realizarse debido a la pandemia se retoman los talleres de creación infantil coordinados por Centro Che Cuba en sus predios. ', 'En la semana en que celebramos el #DíaInternacionalDeLosMuseos compartimos esta entrevista realizada por Alejandro Pico de @Radio La Minga a quien fue fundador del primer Museo dedicado al Che en Argentina y Suramérica, Eladio González. \r\nTras una visita a Cuba en 1992 en la que quedaron enamorados de la isla y su gente, él y su inseparable esposa Irene Perpiñal se empeñaron en ayudar del modo en que fuera posible a la lucha del pueblo cubano contra el bloqueo impuesto por el gobierno de Estados Unidos. \r\n(Estrellitas)\r\nEntre los acontecimientos ocurridos durante su estancia en Cuba, y que los marcaría para siempre, estuvieron los sucesos de Tarará: un grupo de seis criminales que trataban de salir ilegalmente del país había acribillados a tres oficiales de guardafronteras y herido de gravedad a un joven policía que acudió en auxilio de sus compañeros. Eladio donó su sangre a Rolando Pérez Quintosa, el joven sobreviviente, y entregó al padre de este una carta para cuando se recuperara. Lamentablemente unos días después Rolando murió, sin embargo la carta de Eladio fue publicada en la prensa cubana y las respuestas no  tardaron en llegar desde todas partes del país. En total Eladio e Irene recibieron 5000 cartas. \r\nConmovidos por lo que habían vivido se empeñaron en reunir toda la ayuda posible y fue así como enviaron a Cuba los primeros kilogramos de donaciones que, tras ser incluida su experiencia en el libro “Cuba existe es socialista y no está en coma” del arquitecto argentino Rodolfo Livingston, se incrementó a 3 toneladas por mes. A este proyecto le dieron el nombre de Chaubloqueo. \r\n(Estrellitas)\r\nEn 1996 fundaron en su casa de Caballito, Buenos Aires, el primer @Museo Che Guevara de Suramérica que, a manera de pintoresco y sui generis bazar, se dedica a divulgar la vida y la obra del rosarino heroico, y a difundir la tragedia que es el bloqueo impuesto a Cuba. En este pequeño espacio atesoran una amplia colección de fotografías, esculturas, artesanías, objetos personales, pósters, banderas… donadas por visitantes de todas partes del mundo, que muestran el modo en que el Che y su ejemplo se han integrado al imaginario colectivo y cotidiano de muchos. \r\nLos invitamos a escuchar esta apasionada entrevista con la que se comprende que  conservar la memoria es la mejor forma de mantenerla viva. (Manito y link)\r\n (Estrellitas)\r\nOtros museos de Argentina dedicados al Che son \r\n(manito y etiquetar a los siguientes)\r\nMuseo Casa del Che en Alta Gracia\r\nLa Pastera Museo del Che en San Martín de Los Andes\r\nHogar Misionero del Che en Misiones \r\nCentro de Estudios Latinoamericanos del Che en Rosario\r\nNota: En los hashtags incluir #TrasLosPasosDelChe ', 'talleres ', 'Liset Valdés Veitía ', 'liset@gmail.com', 'Archivo Centro Che '),
(47, 1, 1, 'El Centro Che Cuba implementa teletrabajo', '2021-11-18', NULL, NULL, '', 'El Centro de Estudios Che Guevara implementa estrategias de teletrabajo y trabajo a distancia para cumplir los objetivos propuestos en 2021, a pesar de las limitaciones impuestas por la pandemia. ', 'En la semana en que celebramos el #DíaInternacionalDeLosMuseos compartimos esta entrevista realizada por Alejandro Pico de @Radio La Minga a quien fue fundador del primer Museo dedicado al Che en Argentina y Suramérica, Eladio González. \r\nTras una visita a Cuba en 1992 en la que quedaron enamorados de la isla y su gente, él y su inseparable esposa Irene Perpiñal se empeñaron en ayudar del modo en que fuera posible a la lucha del pueblo cubano contra el bloqueo impuesto por el gobierno de Estados Unidos. \r\n(Estrellitas)\r\nEntre los acontecimientos ocurridos durante su estancia en Cuba, y que los marcaría para siempre, estuvieron los sucesos de Tarará: un grupo de seis criminales que trataban de salir ilegalmente del país había acribillados a tres oficiales de guardafronteras y herido de gravedad a un joven policía que acudió en auxilio de sus compañeros. Eladio donó su sangre a Rolando Pérez Quintosa, el joven sobreviviente, y entregó al padre de este una carta para cuando se recuperara. Lamentablemente unos días después Rolando murió, sin embargo la carta de Eladio fue publicada en la prensa cubana y las respuestas no  tardaron en llegar desde todas partes del país. En total Eladio e Irene recibieron 5000 cartas. \r\nConmovidos por lo que habían vivido se empeñaron en reunir toda la ayuda posible y fue así como enviaron a Cuba los primeros kilogramos de donaciones que, tras ser incluida su experiencia en el libro “Cuba existe es socialista y no está en coma” del arquitecto argentino Rodolfo Livingston, se incrementó a 3 toneladas por mes. A este proyecto le dieron el nombre de Chaubloqueo. \r\n(Estrellitas)\r\nEn 1996 fundaron en su casa de Caballito, Buenos Aires, el primer @Museo Che Guevara de Suramérica que, a manera de pintoresco y sui generis bazar, se dedica a divulgar la vida y la obra del rosarino heroico, y a difundir la tragedia que es el bloqueo impuesto a Cuba. En este pequeño espacio atesoran una amplia colección de fotografías, esculturas, artesanías, objetos personales, pósters, banderas… donadas por visitantes de todas partes del mundo, que muestran el modo en que el Che y su ejemplo se han integrado al imaginario colectivo y cotidiano de muchos. \r\nLos invitamos a escuchar esta apasionada entrevista con la que se comprende que  conservar la memoria es la mejor forma de mantenerla viva. (Manito y link)\r\n (Estrellitas)\r\nOtros museos de Argentina dedicados al Che son \r\n(manito y etiquetar a los siguientes)\r\nMuseo Casa del Che en Alta Gracia\r\nLa Pastera Museo del Che en San Martín de Los Andes\r\nHogar Misionero del Che en Misiones \r\nCentro de Estudios Latinoamericanos del Che en Rosario\r\nNota: En los hashtags incluir #TrasLosPasosDelChe ', 'teletrabajo', 'Amanda Terrero', 'amanda.cult.cu ', 'Archivo Centro Che '),
(49, 0, 0, 'Taller de Animación', '2021-08-30', NULL, NULL, '', 'Inicia taller de animación en el Centro de Estudios Che Guevara. ', 'En la semana en que celebramos el #DíaInternacionalDeLosMuseos compartimos esta entrevista realizada por Alejandro Pico de @Radio La Minga a quien fue fundador del primer Museo dedicado al Che en Argentina y Suramérica, Eladio González. \r\nTras una visita a Cuba en 1992 en la que quedaron enamorados de la isla y su gente, él y su inseparable esposa Irene Perpiñal se empeñaron en ayudar del modo en que fuera posible a la lucha del pueblo cubano contra el bloqueo impuesto por el gobierno de Estados Unidos. \r\n(Estrellitas)\r\nEntre los acontecimientos ocurridos durante su estancia en Cuba, y que los marcaría para siempre, estuvieron los sucesos de Tarará: un grupo de seis criminales que trataban de salir ilegalmente del país había acribillados a tres oficiales de guardafronteras y herido de gravedad a un joven policía que acudió en auxilio de sus compañeros. Eladio donó su sangre a Rolando Pérez Quintosa, el joven sobreviviente, y entregó al padre de este una carta para cuando se recuperara. Lamentablemente unos días después Rolando murió, sin embargo la carta de Eladio fue publicada en la prensa cubana y las respuestas no  tardaron en llegar desde todas partes del país. En total Eladio e Irene recibieron 5000 cartas. \r\nConmovidos por lo que habían vivido se empeñaron en reunir toda la ayuda posible y fue así como enviaron a Cuba los primeros kilogramos de donaciones que, tras ser incluida su experiencia en el libro “Cuba existe es socialista y no está en coma” del arquitecto argentino Rodolfo Livingston, se incrementó a 3 toneladas por mes. A este proyecto le dieron el nombre de Chaubloqueo. \r\n(Estrellitas)\r\nEn 1996 fundaron en su casa de Caballito, Buenos Aires, el primer @Museo Che Guevara de Suramérica que, a manera de pintoresco y sui generis bazar, se dedica a divulgar la vida y la obra del rosarino heroico, y a difundir la tragedia que es el bloqueo impuesto a Cuba. En este pequeño espacio atesoran una amplia colección de fotografías, esculturas, artesanías, objetos personales, pósters, banderas… donadas por visitantes de todas partes del mundo, que muestran el modo en que el Che y su ejemplo se han integrado al imaginario colectivo y cotidiano de muchos. \r\nLos invitamos a escuchar esta apasionada entrevista con la que se comprende que  conservar la memoria es la mejor forma de mantenerla viva. (Manito y link)', 'Proyecto Comunitario', 'Juan', '', '');

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
(66, 46, 80, '3', 0),
(21, 47, 83, 'Jóvenes del Centro Che implementan el teletrabajo ', 1),
(83, 49, 81, '', 1),
(65, 46, 81, '2', 0),
(64, 46, 79, '1', 1);

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
(1, 'Descripción de la sección Paradigma visible desde el home del sitio', 'https://localhost.com/centro_che/backend/web/index.php?r=paradigma%2Fupdate&id=1');

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
(13, 'paradigma/2021-10-241094.png'),
(14, 'paradigma/2021-10-2472116.png'),
(15, 'paradigma/2021-10-2492907.png'),
(16, 'paradigma/2021-10-243321.png'),
(17, 'paradigma/2021-10-2449847.png');

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
  `fecha_fin` date DEFAULT NULL,
  `tipo_fecha` smallint(6) DEFAULT NULL,
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

--
-- Volcado de datos para la tabla `producto_audiovisual_archivo`
--

INSERT INTO `producto_audiovisual_archivo` (`id`, `id_producto_audiovisual`, `id_archivo`, `portada`, `nota`) VALUES
(7, 8, 81, 0, ''),
(8, 9, 81, 0, '');

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
(1, 'El proyecto editorial Che Guevara es una colaboración entre el Centro de Estudios Che Guevara y la editorial Ocean Sur', 'https://cheguevaralibros.com/che');

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
(4, 'proyecto/2021-10-2469733.jpg'),
(5, 'proyecto/2021-10-242601.jpg');

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
(1, 'Descripción del quienes somos inicio visible desde el home del sitio.', '');

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
(8, 'quienes_somos/2021-10-2461196.jpg', NULL),
(9, 'quienes_somos/2021-10-2466818.jpg', NULL);

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
(1, 'Vista detallada del quiénes somos.', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quienes_detalle_archivo`
--

CREATE TABLE `quienes_detalle_archivo` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `quienes_detalle_archivo`
--

INSERT INTO `quienes_detalle_archivo` (`id`, `url`) VALUES
(0, 'quienes_somos/2021-10-2414170.jpg'),
(0, 'quienes_somos/2021-10-2436721.jpg'),
(0, 'quienes_somos/2021-10-2467063.jpg'),
(0, 'quienes_somos/2021-10-2466641.jpg');

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
(16, 0, 0, 'Cerámica hoy', 'Taller comunitario infantil de cerámica', '764906620', 'Vega', 1);

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
(18, 16, 81, '', NULL);

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
(73, '2021-09-28 20:45:45', 'User', 'N/A', 'Insertar', 'type', '', 'no ahi', '5', '::1', 'Leonardo', '', ''),
(74, '2021-10-02 19:12:11', 'backend\\models\\Archivo\\Archivo', '102', 'Insertar', 'id_archivo', 'N/A', '102', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'aaaa'),
(75, '2021-10-02 19:12:11', 'backend\\models\\Archivo\\Archivo', '102', 'Insertar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'aaaa'),
(76, '2021-10-02 19:12:12', 'backend\\models\\Archivo\\Archivo', '102', 'Insertar', 'titulo_archivo', 'N/A', 'aaaa', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'aaaa'),
(77, '2021-10-02 19:12:12', 'backend\\models\\Archivo\\Archivo', '102', 'Insertar', 'tipo_archivo', 'N/A', '1', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'aaaa'),
(78, '2021-10-02 19:12:12', 'backend\\models\\Archivo\\Archivo', '102', 'Insertar', 'autor_archivo', 'N/A', 'aaa', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'aaaa'),
(79, '2021-10-02 19:12:12', 'backend\\models\\Archivo\\Archivo', '102', 'Insertar', 'fuente', 'N/A', 'asd', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'aaaa'),
(80, '2021-10-02 19:12:12', 'backend\\models\\Archivo\\Archivo', '102', 'Insertar', 'etiqueta', 'N/A', 'nueva ;', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'aaaa'),
(81, '2021-10-02 19:12:12', 'backend\\models\\Archivo\\Archivo', '102', 'Insertar', 'descripcion_archivo', 'N/A', 'aaaa\r\n', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'aaaa'),
(82, '2021-10-02 19:12:12', 'backend\\models\\Archivo\\Archivo', '102', 'Insertar', 'url_archivo', 'N/A', 'uploads/2021-10-0382361.jpg', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'aaaa'),
(83, '2021-10-02 19:12:12', 'backend\\models\\Archivo\\Archivo', '102', 'Insertar', 'fecha', 'N/A', '1800-05-1', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'aaaa'),
(84, '2021-10-02 19:12:12', 'backend\\models\\Archivo\\Archivo', '102', 'Insertar', 'etapa', 'N/A', 'Anterior a 1928', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'aaaa'),
(85, '2021-10-02 21:25:55', 'Comentario', 'N/A', 'Insertar', 'alias', NULL, 'Administrador Centro Che', '56', '::1', 'Administrador', '', ''),
(86, '2021-10-02 21:25:55', 'Comentario', 'N/A', 'Insertar', 'correo', NULL, 'Nuevo@sfdf.com', '56', '::1', 'Administrador', '', ''),
(87, '2021-10-02 21:25:55', 'Comentario', 'N/A', 'Insertar', 'comentario', NULL, 'asdf', '56', '::1', 'Administrador', '', ''),
(88, '2021-10-02 21:25:55', 'Comentario', 'N/A', 'Insertar', 'tabla', NULL, 'comentario', '56', '::1', 'Administrador', '', ''),
(89, '2021-10-02 21:25:55', 'Comentario', 'N/A', 'Insertar', 'id_tabla', NULL, '39', '56', '::1', 'Administrador', '', ''),
(90, '2021-10-02 21:25:55', 'Comentario', 'N/A', 'Insertar', 'publico', NULL, '1', '56', '::1', 'Administrador', '', ''),
(91, '2021-10-02 21:25:55', 'Comentario', 'N/A', 'Insertar', 'revisado', NULL, '1', '56', '::1', 'Administrador', '', ''),
(92, '2021-10-02 21:25:55', 'Comentario', 'N/A', 'Insertar', 'fecha', NULL, '2021-10-02 21:25:55', '56', '::1', 'Administrador', '', ''),
(93, '2021-10-02 21:25:55', 'Comentario', 'N/A', 'Insertar', 'seccion', NULL, 'Coordinación Académica', '56', '::1', 'Administrador', '', ''),
(94, '2021-10-02 21:25:56', 'Comentario', 'N/A', 'Insertar', 'respuesta', NULL, '1', '56', '::1', 'Administrador', '', ''),
(95, '2021-10-02 21:25:56', 'Comentario', 'N/A', 'Insertar', 'id', NULL, '41', '56', '::1', 'Administrador', '', ''),
(96, '2021-10-02 21:26:26', 'Comentario', 'N/A', 'Insertar', 'alias', NULL, 'Administrador Centro Che', '56', '::1', 'Administrador', '', ''),
(97, '2021-10-02 21:26:26', 'Comentario', 'N/A', 'Insertar', 'correo', NULL, 'Nuevo@sfdf.com', '56', '::1', 'Administrador', '', ''),
(98, '2021-10-02 21:26:26', 'Comentario', 'N/A', 'Insertar', 'comentario', NULL, 'asdf', '56', '::1', 'Administrador', '', ''),
(99, '2021-10-02 21:26:26', 'Comentario', 'N/A', 'Insertar', 'tabla', NULL, 'comentario', '56', '::1', 'Administrador', '', ''),
(100, '2021-10-02 21:26:26', 'Comentario', 'N/A', 'Insertar', 'id_tabla', NULL, '39', '56', '::1', 'Administrador', '', ''),
(101, '2021-10-02 21:26:26', 'Comentario', 'N/A', 'Insertar', 'publico', NULL, '1', '56', '::1', 'Administrador', '', ''),
(102, '2021-10-02 21:26:26', 'Comentario', 'N/A', 'Insertar', 'revisado', NULL, '1', '56', '::1', 'Administrador', '', ''),
(103, '2021-10-02 21:26:27', 'Comentario', 'N/A', 'Insertar', 'fecha', NULL, '2021-10-02 21:26:27', '56', '::1', 'Administrador', '', ''),
(104, '2021-10-02 21:26:27', 'Comentario', 'N/A', 'Insertar', 'seccion', NULL, 'Coordinación Académica', '56', '::1', 'Administrador', '', ''),
(105, '2021-10-02 21:26:27', 'Comentario', 'N/A', 'Insertar', 'respuesta', NULL, '1', '56', '::1', 'Administrador', '', ''),
(106, '2021-10-02 21:26:27', 'Comentario', 'N/A', 'Insertar', 'id', NULL, '42', '56', '::1', 'Administrador', '', ''),
(107, '2021-10-02 21:26:27', 'backend\\models\\Comentario\\Comentario', '42', 'Insertar', 'id', 'N/A', '42', '56', '::1', 'Administrador', 'Comentarios / Responder como Institución', 'Administrador Centro Che'),
(108, '2021-10-02 21:26:27', 'backend\\models\\Comentario\\Comentario', '42', 'Insertar', 'fecha', 'N/A', '2021-10-02 21:26:27', '56', '::1', 'Administrador', 'Comentarios / Responder como Institución', 'Administrador Centro Che'),
(109, '2021-10-02 21:26:27', 'backend\\models\\Comentario\\Comentario', '42', 'Insertar', 'alias', 'N/A', 'Administrador Centro Che', '56', '::1', 'Administrador', 'Comentarios / Responder como Institución', 'Administrador Centro Che'),
(110, '2021-10-02 21:26:27', 'backend\\models\\Comentario\\Comentario', '42', 'Insertar', 'correo', 'N/A', 'Nuevo@sfdf.com', '56', '::1', 'Administrador', 'Comentarios / Responder como Institución', 'Administrador Centro Che'),
(111, '2021-10-02 21:26:28', 'backend\\models\\Comentario\\Comentario', '42', 'Insertar', 'comentario', 'N/A', 'asdf', '56', '::1', 'Administrador', 'Comentarios / Responder como Institución', 'Administrador Centro Che'),
(112, '2021-10-02 21:26:28', 'backend\\models\\Comentario\\Comentario', '42', 'Insertar', 'seccion', 'N/A', 'Coordinación Académica', '56', '::1', 'Administrador', 'Comentarios / Responder como Institución', 'Administrador Centro Che'),
(113, '2021-10-02 21:26:28', 'backend\\models\\Comentario\\Comentario', '42', 'Insertar', 'tabla', 'N/A', 'comentario', '56', '::1', 'Administrador', 'Comentarios / Responder como Institución', 'Administrador Centro Che'),
(114, '2021-10-02 21:26:28', 'backend\\models\\Comentario\\Comentario', '42', 'Insertar', 'id_tabla', 'N/A', '39', '56', '::1', 'Administrador', 'Comentarios / Responder como Institución', 'Administrador Centro Che'),
(115, '2021-10-02 21:26:28', 'backend\\models\\Comentario\\Comentario', '42', 'Insertar', 'publico', 'N/A', '1', '56', '::1', 'Administrador', 'Comentarios / Responder como Institución', 'Administrador Centro Che'),
(116, '2021-10-02 21:26:28', 'backend\\models\\Comentario\\Comentario', '42', 'Insertar', 'revisado', 'N/A', '1', '56', '::1', 'Administrador', 'Comentarios / Responder como Institución', 'Administrador Centro Che'),
(117, '2021-10-02 21:26:28', 'backend\\models\\Comentario\\Comentario', '42', 'Insertar', 'respuesta', 'N/A', '1', '56', '::1', 'Administrador', 'Comentarios / Responder como Institución', 'Administrador Centro Che'),
(118, '2021-10-02 21:47:19', 'Discurso', 'N/A', 'Insertar', 'medio', '', 'Escrito', '56', '::1', 'Administrador', '', ''),
(119, '2021-10-02 21:47:19', 'DiscursoArchivo', 'N/A', 'Insertar', 'id_archivo', NULL, '80', '56', '::1', 'Administrador', '', ''),
(120, '2021-10-02 21:47:19', 'DiscursoArchivo', 'N/A', 'Insertar', 'portada', NULL, '1', '56', '::1', 'Administrador', '', ''),
(121, '2021-10-02 21:47:19', 'DiscursoArchivo', 'N/A', 'Insertar', 'id_discurso', NULL, '6', '56', '::1', 'Administrador', '', ''),
(122, '2021-10-02 21:47:19', 'DiscursoArchivo', 'N/A', 'Insertar', 'id', NULL, '11', '56', '::1', 'Administrador', '', ''),
(123, '2021-10-02 21:47:19', 'backend\\models\\Discurso\\Discurso', '6', 'Modificar', 'medio', 'N/A', 'Escrito', '56', '::1', 'Administrador', 'Vida y Obra / Discursos y Entrevistas / Modificar Discurso o Entrevista', 'Entrevista al Che por Jorge Ricardo Masetti'),
(124, '2021-10-02 21:48:35', 'Discurso', 'N/A', 'Modificar', 'titulo', 'Borrar', 'Mira', '56', '::1', 'Administrador', '', ''),
(125, '2021-10-02 21:48:35', 'Discurso', 'N/A', 'Insertar', 'revisado', '0', '1', '56', '::1', 'Administrador', '', ''),
(126, '2021-10-02 21:48:35', 'Discurso', 'N/A', 'Insertar', 'publico', '0', '1', '56', '::1', 'Administrador', '', ''),
(127, '2021-10-02 21:48:35', 'DiscursoArchivo', 'N/A', 'Insertar', 'id_archivo', NULL, '79', '56', '::1', 'Administrador', '', ''),
(128, '2021-10-02 21:48:35', 'DiscursoArchivo', 'N/A', 'Insertar', 'portada', NULL, '1', '56', '::1', 'Administrador', '', ''),
(129, '2021-10-02 21:48:35', 'DiscursoArchivo', 'N/A', 'Insertar', 'id_discurso', NULL, '5', '56', '::1', 'Administrador', '', ''),
(130, '2021-10-02 21:48:35', 'DiscursoArchivo', 'N/A', 'Insertar', 'id', NULL, '12', '56', '::1', 'Administrador', '', ''),
(131, '2021-10-02 21:48:35', 'backend\\models\\Discurso\\Discurso', '5', 'Modificar', 'titulo', 'Borrar', 'Mira', '56', '::1', 'Administrador', 'Vida y Obra / Discursos y Entrevistas / Modificar Discurso o Entrevista', 'Mira'),
(132, '2021-10-02 21:48:35', 'backend\\models\\Discurso\\Discurso', '5', 'Modificar', 'revisado', 'N/A', '1', '56', '::1', 'Administrador', 'Vida y Obra / Discursos y Entrevistas / Modificar Discurso o Entrevista', 'Mira'),
(133, '2021-10-02 21:48:35', 'backend\\models\\Discurso\\Discurso', '5', 'Modificar', 'publico', 'N/A', '1', '56', '::1', 'Administrador', 'Vida y Obra / Discursos y Entrevistas / Modificar Discurso o Entrevista', 'Mira'),
(134, '2021-10-02 21:48:35', 'backend\\models\\Discurso\\Discurso', '5', 'Modificar', 'identificador', 'N/A', '0', '56', '::1', 'Administrador', 'Vida y Obra / Discursos y Entrevistas / Modificar Discurso o Entrevista', 'Mira'),
(135, '2021-10-02 23:49:21', 'Quienes', 'N/A', 'Modificar', 'descripcion', 'Leo me estas....', 'Descripci\'on del quienes somos inicio', '56', '::1', 'Administrador', '', ''),
(136, '2021-10-03 00:07:14', 'Quienes', 'N/A', 'Modificar', 'descripcion', 'Descripci\'on del quienes somos inicio', 'Descripción del quienes somos inicio', '56', '::1', 'Administrador', '', ''),
(137, '2021-10-03 00:07:14', 'backend\\models\\Quienes\\Quienes', '1', 'Modificar', 'descripcion', 'Descripci\'on del quienes somos inicio', 'Descripción del quienes somos inicio', '56', '::1', 'Administrador', 'Inicio / Quiénes Somos / Quiénes Somos - Inicio / Modificar Quiénes Somos - Inicio', 'Inicio'),
(138, '2021-10-03 00:07:14', 'backend\\models\\Quienes\\Quienes', '1', 'Modificar', 'extra', 'N/A', '', '56', '::1', 'Administrador', 'Inicio / Quiénes Somos / Quiénes Somos - Inicio / Modificar Quiénes Somos - Inicio', 'Inicio'),
(139, '2021-10-03 00:19:22', 'ProductoAudiovisual', 'N/A', 'Insertar', 'titulo', NULL, 'sadf', '56', '::1', 'Administrador', '', ''),
(140, '2021-10-03 00:19:22', 'ProductoAudiovisual', 'N/A', 'Insertar', 'autor', NULL, 'asdf', '56', '::1', 'Administrador', '', ''),
(141, '2021-10-03 00:19:22', 'ProductoAudiovisual', 'N/A', 'Insertar', 'tipo', NULL, '3', '56', '::1', 'Administrador', '', ''),
(142, '2021-10-03 00:19:22', 'ProductoAudiovisual', 'N/A', 'Insertar', 'productora', NULL, 'asdf', '56', '::1', 'Administrador', '', ''),
(143, '2021-10-03 00:19:22', 'ProductoAudiovisual', 'N/A', 'Insertar', 'descripcion', NULL, 'asdf', '56', '::1', 'Administrador', '', ''),
(144, '2021-10-03 00:19:22', 'ProductoAudiovisual', 'N/A', 'Insertar', 'revisado', NULL, '0', '56', '::1', 'Administrador', '', ''),
(145, '2021-10-03 00:19:22', 'ProductoAudiovisual', 'N/A', 'Insertar', 'publico', NULL, '0', '56', '::1', 'Administrador', '', ''),
(146, '2021-10-03 00:19:22', 'ProductoAudiovisual', 'N/A', 'Insertar', 'fecha', NULL, '1800-02-1', '56', '::1', 'Administrador', '', ''),
(147, '2021-10-03 00:19:22', 'ProductoAudiovisual', 'N/A', 'Insertar', 'id_producto_audiovisual', NULL, '8', '56', '::1', 'Administrador', '', ''),
(148, '2021-10-03 00:19:22', 'ProductoAudiovisualArchivo', 'N/A', 'Insertar', 'id_archivo', NULL, '81', '56', '::1', 'Administrador', '', ''),
(149, '2021-10-03 00:19:22', 'ProductoAudiovisualArchivo', 'N/A', 'Insertar', 'id_producto_audiovisual', NULL, '8', '56', '::1', 'Administrador', '', ''),
(150, '2021-10-03 00:19:22', 'ProductoAudiovisualArchivo', 'N/A', 'Insertar', 'id', NULL, '7', '56', '::1', 'Administrador', '', ''),
(151, '2021-10-03 00:19:23', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '8', 'Insertar', 'id_producto_audiovisual', 'N/A', '8', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Crear Producto Audiovisual', 'sadf'),
(152, '2021-10-03 00:19:23', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '8', 'Insertar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Crear Producto Audiovisual', 'sadf'),
(153, '2021-10-03 00:19:23', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '8', 'Insertar', 'publico', 'N/A', '0', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Crear Producto Audiovisual', 'sadf'),
(154, '2021-10-03 00:19:23', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '8', 'Insertar', 'titulo', 'N/A', 'sadf', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Crear Producto Audiovisual', 'sadf'),
(155, '2021-10-03 00:19:23', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '8', 'Insertar', 'descripcion', 'N/A', 'asdf', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Crear Producto Audiovisual', 'sadf'),
(156, '2021-10-03 00:23:33', 'ProductoAudiovisual', 'N/A', 'Insertar', 'titulo', NULL, 'sadf', '56', '::1', 'Administrador', '', ''),
(157, '2021-10-03 00:23:33', 'ProductoAudiovisual', 'N/A', 'Insertar', 'autor', NULL, 'asdf', '56', '::1', 'Administrador', '', ''),
(158, '2021-10-03 00:23:33', 'ProductoAudiovisual', 'N/A', 'Insertar', 'tipo', NULL, '3', '56', '::1', 'Administrador', '', ''),
(159, '2021-10-03 00:23:33', 'ProductoAudiovisual', 'N/A', 'Insertar', 'productora', NULL, 'asdf', '56', '::1', 'Administrador', '', ''),
(160, '2021-10-03 00:23:33', 'ProductoAudiovisual', 'N/A', 'Insertar', 'descripcion', NULL, 'asdf', '56', '::1', 'Administrador', '', ''),
(161, '2021-10-03 00:23:33', 'ProductoAudiovisual', 'N/A', 'Insertar', 'revisado', NULL, '0', '56', '::1', 'Administrador', '', ''),
(162, '2021-10-03 00:23:33', 'ProductoAudiovisual', 'N/A', 'Insertar', 'publico', NULL, '0', '56', '::1', 'Administrador', '', ''),
(163, '2021-10-03 00:23:33', 'ProductoAudiovisual', 'N/A', 'Insertar', 'fecha', NULL, '1800-02-1', '56', '::1', 'Administrador', '', ''),
(164, '2021-10-03 00:23:33', 'ProductoAudiovisual', 'N/A', 'Insertar', 'id_producto_audiovisual', NULL, '9', '56', '::1', 'Administrador', '', ''),
(165, '2021-10-03 00:23:33', 'ProductoAudiovisualArchivo', 'N/A', 'Insertar', 'id_archivo', NULL, '81', '56', '::1', 'Administrador', '', ''),
(166, '2021-10-03 00:23:33', 'ProductoAudiovisualArchivo', 'N/A', 'Insertar', 'id_producto_audiovisual', NULL, '9', '56', '::1', 'Administrador', '', ''),
(167, '2021-10-03 00:23:33', 'ProductoAudiovisualArchivo', 'N/A', 'Insertar', 'id', NULL, '8', '56', '::1', 'Administrador', '', ''),
(168, '2021-10-03 00:23:33', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '9', 'Insertar', 'id_producto_audiovisual', 'N/A', '9', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Crear Producto Audiovisual', 'sadf'),
(169, '2021-10-03 00:23:33', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '9', 'Insertar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Crear Producto Audiovisual', 'sadf'),
(170, '2021-10-03 00:23:33', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '9', 'Insertar', 'publico', 'N/A', '0', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Crear Producto Audiovisual', 'sadf'),
(171, '2021-10-03 00:23:33', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '9', 'Insertar', 'titulo', 'N/A', 'sadf', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Crear Producto Audiovisual', 'sadf'),
(172, '2021-10-03 00:23:34', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '9', 'Insertar', 'descripcion', 'N/A', 'asdf', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Crear Producto Audiovisual', 'sadf'),
(173, '2021-10-03 00:23:34', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '9', 'Insertar', 'cuerpo', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Crear Producto Audiovisual', 'sadf'),
(174, '2021-10-03 00:23:34', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '9', 'Insertar', 'productora', 'N/A', 'asdf', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Crear Producto Audiovisual', 'sadf'),
(175, '2021-10-03 00:23:34', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '9', 'Insertar', 'autor', 'N/A', 'asdf', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Crear Producto Audiovisual', 'sadf'),
(176, '2021-10-03 00:23:34', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '9', 'Insertar', 'fecha', 'N/A', '1800-02-1', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Crear Producto Audiovisual', 'sadf'),
(177, '2021-10-03 00:23:34', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '9', 'Insertar', 'tipo', 'N/A', '3', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Crear Producto Audiovisual', 'sadf'),
(178, '2021-10-03 09:44:37', 'Trabajador', 'N/A', 'Modificar', 'nombre', 'Lisette vaaldés Veitía ', 'Lisette Valdés Veitía ', '56', '::1', 'Administrador', '', ''),
(179, '2021-10-03 09:44:37', 'backend\\models\\Quienes\\Trabajador', '11', 'Modificar', 'nombre', 'Lisette vaaldés Veitía ', 'Lisette Valdés Veitía ', '56', '::1', 'Administrador', 'Inicio / Quiénes Somos / Quiénes Somos - Inicio / Modificar Trabajador', 'Lisette Valdés Veitía '),
(180, '2021-10-03 10:08:31', 'backend\\models\\User\\User', '63', 'Modificar', 'first_name', 'uno ', 'uno 1', '56', '::1', 'Administrador', 'Administración / Usuarios / Modificar Usuario', 'comentario'),
(181, '2021-10-03 10:11:25', 'backend\\models\\User\\AuthAssignment', '63', 'Modificar', 'item_name', 'no ahi', 'gestor-de-contenidos', '56', '::1', 'Administrador', 'Administración / Usuarios / Modificar Usuario / Asignar Rol', 'gestor-de-contenidos'),
(182, '2021-10-03 14:36:43', 'backend\\models\\Articulo\\Articulo', '39', 'Modificar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(183, '2021-10-03 14:36:43', 'backend\\models\\Articulo\\Articulo', '39', 'Modificar', 'publico', 'N/A', '0', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(184, '2021-10-03 14:36:43', 'backend\\models\\Articulo\\Articulo', '40', 'Modificar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(185, '2021-10-03 14:36:43', 'backend\\models\\Articulo\\Articulo', '40', 'Modificar', 'publico', 'N/A', '0', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(186, '2021-10-03 14:36:43', 'backend\\models\\Articulo\\Articulo', '34', 'Modificar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo', 'Che: experiencias comunicativas en torno a su vida y obra'),
(187, '2021-10-03 14:36:44', 'backend\\models\\Articulo\\Articulo', '34', 'Modificar', 'publico', 'N/A', '0', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo', 'Che: experiencias comunicativas en torno a su vida y obra'),
(188, '2021-10-03 14:37:53', 'backend\\models\\Articulo\\Articulo', '41', 'Modificar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(189, '2021-10-03 14:37:53', 'backend\\models\\Articulo\\Articulo', '41', 'Modificar', 'publico', 'N/A', '1', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(190, '2021-10-03 14:37:53', 'backend\\models\\Articulo\\Articulo', '42', 'Modificar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(191, '2021-10-03 14:37:53', 'backend\\models\\Articulo\\Articulo', '42', 'Modificar', 'publico', 'N/A', '1', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(192, '2021-10-03 14:37:53', 'backend\\models\\Articulo\\Articulo', '34', 'Modificar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo', 'Che: experiencias comunicativas en torno a su vida y obra'),
(193, '2021-10-03 14:37:53', 'backend\\models\\Articulo\\Articulo', '34', 'Modificar', 'publico', 'N/A', '1', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo', 'Che: experiencias comunicativas en torno a su vida y obra'),
(194, '2021-10-03 14:40:24', 'backend\\models\\Articulo\\ArticuloArchivo', '43', 'Insertar', 'id', 'N/A', '43', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(195, '2021-10-03 14:40:24', 'backend\\models\\Articulo\\ArticuloArchivo', '43', 'Insertar', 'id_articulo', 'N/A', '34', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(196, '2021-10-03 14:40:24', 'backend\\models\\Articulo\\ArticuloArchivo', '43', 'Insertar', 'id_archivo', 'N/A', '79', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(197, '2021-10-03 14:40:24', 'backend\\models\\Articulo\\ArticuloArchivo', '43', 'Insertar', 'nota', 'N/A', 'Esta es la nota nueva', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(198, '2021-10-03 14:40:24', 'backend\\models\\Articulo\\ArticuloArchivo', '43', 'Insertar', 'portada', 'N/A', '1', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(199, '2021-10-03 14:40:24', 'backend\\models\\Articulo\\ArticuloArchivo', '44', 'Insertar', 'id', 'N/A', '44', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(200, '2021-10-03 14:40:24', 'backend\\models\\Articulo\\ArticuloArchivo', '44', 'Insertar', 'id_articulo', 'N/A', '34', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(201, '2021-10-03 14:40:24', 'backend\\models\\Articulo\\ArticuloArchivo', '44', 'Insertar', 'id_archivo', 'N/A', '80', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(202, '2021-10-03 14:40:24', 'backend\\models\\Articulo\\ArticuloArchivo', '44', 'Insertar', 'nota', 'N/A', 'Hola', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(203, '2021-10-03 14:40:24', 'backend\\models\\Articulo\\ArticuloArchivo', '44', 'Insertar', 'portada', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo / Archivos', 'Che: experiencias comunicativas en torno a su vida y obra'),
(204, '2021-10-03 14:40:24', 'backend\\models\\Articulo\\Articulo', '34', 'Modificar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo', 'Che: experiencias comunicativas en torno a su vida y obra'),
(205, '2021-10-03 14:44:17', 'backend\\models\\Articulo\\ArticuloArchivo', '45', 'Insertar', 'id', 'N/A', '45', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo', 'Teletrabajo'),
(206, '2021-10-03 14:44:17', 'backend\\models\\Articulo\\ArticuloArchivo', '45', 'Insertar', 'id_articulo', 'N/A', '34', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo', 'Teletrabajo'),
(207, '2021-10-03 14:44:17', 'backend\\models\\Articulo\\ArticuloArchivo', '45', 'Insertar', 'id_archivo', 'N/A', '83', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo', 'Teletrabajo'),
(208, '2021-10-03 14:44:17', 'backend\\models\\Articulo\\ArticuloArchivo', '45', 'Insertar', 'nota', 'N/A', 'Esta es la nota nueva', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo', 'Teletrabajo'),
(209, '2021-10-03 14:44:17', 'backend\\models\\Articulo\\ArticuloArchivo', '45', 'Insertar', 'portada', 'N/A', '1', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo', 'Teletrabajo'),
(210, '2021-10-03 14:44:17', 'backend\\models\\Articulo\\ArticuloArchivo', '46', 'Insertar', 'id', 'N/A', '46', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo', 'Eric'),
(211, '2021-10-03 14:44:17', 'backend\\models\\Articulo\\ArticuloArchivo', '46', 'Insertar', 'id_articulo', 'N/A', '34', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo', 'Eric'),
(212, '2021-10-03 14:44:17', 'backend\\models\\Articulo\\ArticuloArchivo', '46', 'Insertar', 'id_archivo', 'N/A', '80', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo', 'Eric'),
(213, '2021-10-03 14:44:17', 'backend\\models\\Articulo\\ArticuloArchivo', '46', 'Insertar', 'nota', 'N/A', 'Hola', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo', 'Eric'),
(214, '2021-10-03 14:44:17', 'backend\\models\\Articulo\\ArticuloArchivo', '46', 'Insertar', 'portada', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo', 'Eric'),
(215, '2021-10-03 14:44:17', 'backend\\models\\Articulo\\Articulo', '34', 'Modificar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Coordinación Académica / Artículos / Modificar Artículo', 'Che: experiencias comunicativas en torno a su vida y obra'),
(216, '2021-10-04 13:26:37', 'backend\\models\\Galeria\\GaleriaVo', '12', 'Insertar', 'id_galeria_vo', 'N/A', '12', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/Eric.png'),
(217, '2021-10-04 13:26:37', 'backend\\models\\Galeria\\GaleriaVo', '12', 'Insertar', 'id_archivo', 'N/A', 'uploads/Eric.png', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/Eric.png'),
(218, '2021-10-04 13:26:37', 'backend\\models\\Galeria\\GaleriaVo', '12', 'Insertar', 'tipo', 'N/A', '1', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/Eric.png'),
(219, '2021-10-04 13:26:37', 'backend\\models\\Galeria\\GaleriaVo', '12', 'Insertar', 'genero', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/Eric.png'),
(220, '2021-10-04 13:26:37', 'backend\\models\\Galeria\\GaleriaVo', '12', 'Insertar', 'tipo_archivo', 'N/A', '1', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/Eric.png'),
(221, '2021-10-04 13:26:37', 'backend\\models\\Galeria\\GaleriaVo', '12', 'Insertar', 'publico', 'N/A', '1', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/Eric.png'),
(222, '2021-10-04 13:26:37', 'backend\\models\\Galeria\\GaleriaVo', '12', 'Insertar', 'nota', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/Eric.png'),
(223, '2021-10-04 19:40:10', 'backend\\models\\User\\User', '63', 'Modificar', 'status', '10', '9', '56', '::1', 'Administrador', 'Administración / Usuarios / Eliminar Usuario', 'comentario'),
(224, '2021-10-04 19:40:19', 'backend\\models\\User\\AuthItem', 'no ahi', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Rol', 'no ahi'),
(225, '2021-10-11 16:51:12', 'backend\\models\\Archivo\\Archivo', '102', 'Modificar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'aaaa'),
(226, '2021-10-11 16:51:12', 'backend\\models\\Archivo\\Archivo', '102', 'Modificar', 'etiqueta', 'nueva ;', 'otra ; prueba ;', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'aaaa'),
(227, '2021-10-12 22:36:25', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'id_noticia', 'N/A', '57', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(228, '2021-10-12 22:36:25', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(229, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'publico', 'N/A', '0', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(230, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'titulo_noticia', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(231, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'fecha', 'N/A', '1902-08-29', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(232, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'referencia', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(233, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'descripcion', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(234, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'cuerpo', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(235, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'etiqueta', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(236, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'autor', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(237, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'contacto', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(238, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'fuente', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(239, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'id_noticia', 'N/A', '57', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(240, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(241, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'publico', 'N/A', '0', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(242, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'titulo_noticia', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(243, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'fecha', 'N/A', '1902-08-29', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(244, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'referencia', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(245, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'descripcion', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(246, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'cuerpo', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(247, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'etiqueta', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(248, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'autor', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(249, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'contacto', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(250, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'fuente', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(251, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'id_noticia', 'N/A', '57', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(252, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(253, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'publico', 'N/A', '0', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(254, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'titulo_noticia', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(255, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'fecha', 'N/A', '1902-08-29', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(256, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'referencia', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(257, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'descripcion', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(258, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'cuerpo', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(259, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'etiqueta', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(260, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'autor', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(261, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'contacto', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(262, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Update', 'fuente', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(263, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Modificar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia', '1'),
(264, '2021-10-12 22:36:26', 'backend\\models\\Noticia\\Noticia', '57', 'Modificar', 'publico', 'N/A', '0', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia', '1'),
(265, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\NoticiaArchivo', '57', 'Update', 'id', 'N/A', '79', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(266, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\NoticiaArchivo', '57', 'Update', 'id_noticia', 'N/A', '57', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(267, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\NoticiaArchivo', '57', 'Update', 'id_archivo', 'N/A', '81', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(268, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\NoticiaArchivo', '57', 'Update', 'nota', 'N/A', '3', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(269, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\NoticiaArchivo', '57', 'Update', 'portada', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(270, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\NoticiaArchivo', '57', 'Update', 'id', 'N/A', '80', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(271, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\NoticiaArchivo', '57', 'Update', 'id_noticia', 'N/A', '57', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(272, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\NoticiaArchivo', '57', 'Update', 'id_archivo', 'N/A', '79', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(273, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\NoticiaArchivo', '57', 'Update', 'nota', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(274, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\NoticiaArchivo', '57', 'Update', 'portada', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(275, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\NoticiaArchivo', '57', 'Update', 'id', 'N/A', '81', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(276, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\NoticiaArchivo', '57', 'Update', 'id_noticia', 'N/A', '57', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(277, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\NoticiaArchivo', '57', 'Update', 'id_archivo', 'N/A', '80', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(278, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\NoticiaArchivo', '57', 'Update', 'nota', 'N/A', '2', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1'),
(279, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\NoticiaArchivo', '57', 'Update', 'portada', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', '1');
INSERT INTO `tbl_audit_entry` (`audit_entry_id`, `audit_entry_timestamp`, `audit_entry_model_name`, `audit_entry_model_id`, `audit_entry_operation`, `audit_entry_field_name`, `audit_entry_old_value`, `audit_entry_new_value`, `audit_entry_user_id`, `audit_entry_ip`, `audit_entry_user_name`, `place`, `title`) VALUES
(280, '2021-10-12 22:37:47', 'backend\\models\\Noticia\\Noticia', '57', 'Modificar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia', '1'),
(281, '2021-10-12 22:37:48', 'backend\\models\\Noticia\\Noticia', '57', 'Modificar', 'publico', 'N/A', '0', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia', '1'),
(282, '2021-10-12 22:44:08', 'backend\\models\\Noticia\\NoticiaArchivo', '59', 'Insertar', 'id', 'N/A', '82', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia - Archivo Asociado', 'Nueva borrar'),
(283, '2021-10-12 22:44:08', 'backend\\models\\Noticia\\NoticiaArchivo', '59', 'Insertar', 'id_noticia', 'N/A', '59', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia - Archivo Asociado', 'Nueva borrar'),
(284, '2021-10-12 22:44:08', 'backend\\models\\Noticia\\NoticiaArchivo', '59', 'Insertar', 'id_archivo', 'N/A', '79', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia - Archivo Asociado', 'Nueva borrar'),
(285, '2021-10-12 22:44:08', 'backend\\models\\Noticia\\NoticiaArchivo', '59', 'Insertar', 'nota', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia - Archivo Asociado', 'Nueva borrar'),
(286, '2021-10-12 22:44:08', 'backend\\models\\Noticia\\NoticiaArchivo', '59', 'Insertar', 'portada', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia - Archivo Asociado', 'Nueva borrar'),
(287, '2021-10-12 22:44:08', 'backend\\models\\Noticia\\Noticia', '59', 'Insertar', 'id_noticia', 'N/A', '59', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia', 'Nueva borrar'),
(288, '2021-10-12 22:44:08', 'backend\\models\\Noticia\\Noticia', '59', 'Insertar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia', 'Nueva borrar'),
(289, '2021-10-12 22:44:08', 'backend\\models\\Noticia\\Noticia', '59', 'Insertar', 'publico', 'N/A', '0', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia', 'Nueva borrar'),
(290, '2021-10-12 22:44:08', 'backend\\models\\Noticia\\Noticia', '59', 'Insertar', 'titulo_noticia', 'N/A', 'Nueva borrar', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia', 'Nueva borrar'),
(291, '2021-10-12 22:44:08', 'backend\\models\\Noticia\\Noticia', '59', 'Insertar', 'fecha', 'N/A', '1800-02-1', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia', 'Nueva borrar'),
(292, '2021-10-12 22:44:08', 'backend\\models\\Noticia\\Noticia', '59', 'Insertar', 'referencia', 'N/A', 'Nueva borrar', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia', 'Nueva borrar'),
(293, '2021-10-12 22:44:08', 'backend\\models\\Noticia\\Noticia', '59', 'Insertar', 'descripcion', 'N/A', 'Nueva borrar', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia', 'Nueva borrar'),
(294, '2021-10-12 22:44:08', 'backend\\models\\Noticia\\Noticia', '59', 'Insertar', 'cuerpo', 'N/A', 'Nueva borrar', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia', 'Nueva borrar'),
(295, '2021-10-12 22:44:08', 'backend\\models\\Noticia\\Noticia', '59', 'Insertar', 'etiqueta', 'N/A', 'Nueva borrar', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia', 'Nueva borrar'),
(296, '2021-10-12 22:44:08', 'backend\\models\\Noticia\\Noticia', '59', 'Insertar', 'autor', 'N/A', 'Nueva borrar', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia', 'Nueva borrar'),
(297, '2021-10-12 22:44:09', 'backend\\models\\Noticia\\Noticia', '59', 'Insertar', 'contacto', 'N/A', 'Nueva borrar', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia', 'Nueva borrar'),
(298, '2021-10-12 22:44:09', 'backend\\models\\Noticia\\Noticia', '59', 'Insertar', 'fuente', 'N/A', 'Nueva borrar', '56', '::1', 'Administrador', 'Inicio / Noticias / Crear Noticia', 'Nueva borrar'),
(299, '2021-10-13 00:24:43', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Insertar', 'id', 'N/A', '17', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Crear Correspondencia - Archivo Asociado', '2'),
(300, '2021-10-13 00:24:43', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Insertar', 'id_correspondencia', 'N/A', '14', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Crear Correspondencia - Archivo Asociado', '2'),
(301, '2021-10-13 00:24:43', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Insertar', 'id_archivo', 'N/A', '83', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Crear Correspondencia - Archivo Asociado', '2'),
(302, '2021-10-13 00:24:43', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Insertar', 'nota', 'N/A', '2', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Crear Correspondencia - Archivo Asociado', '2'),
(303, '2021-10-13 00:24:43', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Insertar', 'portada', 'N/A', '1', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Crear Correspondencia - Archivo Asociado', '2'),
(304, '2021-10-13 00:24:43', 'backend\\models\\Correspondencia\\Correspondencia', '14', 'Insertar', 'id_correspondencia', 'N/A', '14', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Crear Correspondencia', '2'),
(305, '2021-10-13 00:24:43', 'backend\\models\\Correspondencia\\Correspondencia', '14', 'Insertar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Crear Correspondencia', '2'),
(306, '2021-10-13 00:24:43', 'backend\\models\\Correspondencia\\Correspondencia', '14', 'Insertar', 'publico', 'N/A', '0', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Crear Correspondencia', '2'),
(307, '2021-10-13 00:24:44', 'backend\\models\\Correspondencia\\Correspondencia', '14', 'Insertar', 'titulo', 'N/A', '2', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Crear Correspondencia', '2'),
(308, '2021-10-13 00:24:44', 'backend\\models\\Correspondencia\\Correspondencia', '14', 'Insertar', 'descripcion', 'N/A', '2', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Crear Correspondencia', '2'),
(309, '2021-10-13 00:24:44', 'backend\\models\\Correspondencia\\Correspondencia', '14', 'Insertar', 'cuerpo', 'N/A', '2', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Crear Correspondencia', '2'),
(310, '2021-10-13 00:24:44', 'backend\\models\\Correspondencia\\Correspondencia', '14', 'Insertar', 'destinatario', 'N/A', '2', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Crear Correspondencia', '2'),
(311, '2021-10-13 00:24:44', 'backend\\models\\Correspondencia\\Correspondencia', '14', 'Insertar', 'remitente', 'N/A', '2', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Crear Correspondencia', '2'),
(312, '2021-10-13 00:24:44', 'backend\\models\\Correspondencia\\Correspondencia', '14', 'Insertar', 'fecha', 'N/A', '1800-02-1', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Crear Correspondencia', '2'),
(313, '2021-10-13 00:47:50', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'id', 'N/A', '18', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(314, '2021-10-13 00:47:50', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'id_correspondencia', 'N/A', '14', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(315, '2021-10-13 00:47:50', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'id_archivo', 'N/A', '83', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(316, '2021-10-13 00:47:50', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'nota', 'N/A', '2', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(317, '2021-10-13 00:47:50', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'portada', 'N/A', '1', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(318, '2021-10-13 00:47:50', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'id', 'N/A', '19', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(319, '2021-10-13 00:47:50', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'id_correspondencia', 'N/A', '14', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(320, '2021-10-13 00:47:50', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'id_archivo', 'N/A', '80', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(321, '2021-10-13 00:47:50', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'nota', 'N/A', '3', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(322, '2021-10-13 00:47:50', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'portada', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(323, '2021-10-13 00:47:50', 'backend\\models\\Correspondencia\\Correspondencia', '14', 'Modificar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia', '2'),
(324, '2021-10-13 00:47:50', 'backend\\models\\Correspondencia\\Correspondencia', '14', 'Modificar', 'publico', 'N/A', '0', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia', '2'),
(325, '2021-10-13 00:48:15', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'id', 'N/A', '20', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(326, '2021-10-13 00:48:15', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'id_correspondencia', 'N/A', '14', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(327, '2021-10-13 00:48:15', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'id_archivo', 'N/A', '83', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(328, '2021-10-13 00:48:15', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'nota', 'N/A', '2', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(329, '2021-10-13 00:48:15', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'portada', 'N/A', '1', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(330, '2021-10-13 00:48:15', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'id', 'N/A', '21', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(331, '2021-10-13 00:48:15', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'id_correspondencia', 'N/A', '14', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(332, '2021-10-13 00:48:15', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'id_archivo', 'N/A', '80', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(333, '2021-10-13 00:48:15', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'nota', 'N/A', '3', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(334, '2021-10-13 00:48:15', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '14', 'Modificar', 'portada', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', '2'),
(335, '2021-10-13 00:48:15', 'backend\\models\\Correspondencia\\Correspondencia', '14', 'Modificar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia', '2'),
(336, '2021-10-13 00:48:15', 'backend\\models\\Correspondencia\\Correspondencia', '14', 'Modificar', 'publico', 'N/A', '0', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia', '2'),
(337, '2021-10-21 00:14:37', 'backend\\models\\Archivo\\Archivo', '103', 'Insertar', 'id_archivo', 'N/A', '103', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Audio'),
(338, '2021-10-21 00:14:37', 'backend\\models\\Archivo\\Archivo', '103', 'Insertar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Audio'),
(339, '2021-10-21 00:14:37', 'backend\\models\\Archivo\\Archivo', '103', 'Insertar', 'titulo_archivo', 'N/A', 'Audio', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Audio'),
(340, '2021-10-21 00:14:37', 'backend\\models\\Archivo\\Archivo', '103', 'Insertar', 'tipo_archivo', 'N/A', '2', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Audio'),
(341, '2021-10-21 00:14:37', 'backend\\models\\Archivo\\Archivo', '103', 'Insertar', 'autor_archivo', 'N/A', 'Juan', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Audio'),
(342, '2021-10-21 00:14:37', 'backend\\models\\Archivo\\Archivo', '103', 'Insertar', 'fuente', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Audio'),
(343, '2021-10-21 00:14:37', 'backend\\models\\Archivo\\Archivo', '103', 'Insertar', 'etiqueta', 'N/A', 'otra ;', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Audio'),
(344, '2021-10-21 00:14:37', 'backend\\models\\Archivo\\Archivo', '103', 'Insertar', 'descripcion_archivo', 'N/A', 'Nuevo Audio', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Audio'),
(345, '2021-10-21 00:14:37', 'backend\\models\\Archivo\\Archivo', '103', 'Insertar', 'url_archivo', 'N/A', 'uploads/2021-10-2121633.mp3', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Audio'),
(346, '2021-10-21 00:14:37', 'backend\\models\\Archivo\\Archivo', '103', 'Insertar', 'fecha', 'N/A', '1950-03-2', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Audio'),
(347, '2021-10-21 00:14:37', 'backend\\models\\Archivo\\Archivo', '103', 'Insertar', 'etapa', 'N/A', 'Adolescencia', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Audio'),
(348, '2021-10-21 00:20:36', 'backend\\models\\Archivo\\Archivo', '104', 'Insertar', 'id_archivo', 'N/A', '104', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video'),
(349, '2021-10-21 00:20:36', 'backend\\models\\Archivo\\Archivo', '104', 'Insertar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video'),
(350, '2021-10-21 00:20:36', 'backend\\models\\Archivo\\Archivo', '104', 'Insertar', 'titulo_archivo', 'N/A', 'Video', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video'),
(351, '2021-10-21 00:20:37', 'backend\\models\\Archivo\\Archivo', '104', 'Insertar', 'tipo_archivo', 'N/A', '3', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video'),
(352, '2021-10-21 00:20:37', 'backend\\models\\Archivo\\Archivo', '104', 'Insertar', 'autor_archivo', 'N/A', 'Pedro', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video'),
(353, '2021-10-21 00:20:37', 'backend\\models\\Archivo\\Archivo', '104', 'Insertar', 'fuente', 'N/A', 'Buena Fuente', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video'),
(354, '2021-10-21 00:20:37', 'backend\\models\\Archivo\\Archivo', '104', 'Insertar', 'etiqueta', 'N/A', 'prueba ;', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video'),
(355, '2021-10-21 00:20:37', 'backend\\models\\Archivo\\Archivo', '104', 'Insertar', 'descripcion_archivo', 'N/A', 'Nuevo Video', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video'),
(356, '2021-10-21 00:20:37', 'backend\\models\\Archivo\\Archivo', '104', 'Insertar', 'url_archivo', 'N/A', 'uploads/2021-10-2118254.mp4', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video'),
(357, '2021-10-21 00:20:37', 'backend\\models\\Archivo\\Archivo', '104', 'Insertar', 'fecha', 'N/A', '1968-06-4', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video'),
(358, '2021-10-21 00:20:37', 'backend\\models\\Archivo\\Archivo', '104', 'Insertar', 'etapa', 'N/A', 'Posterior a 1967', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video'),
(359, '2021-10-21 00:21:26', 'backend\\models\\Archivo\\Archivo', '104', 'Modificar', 'revisado', 'N/A', '1', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Video'),
(360, '2021-10-24 09:12:45', 'backend\\models\\Archivo\\Archivo', '104', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Archivos / Eliminar Archivo', 'Video'),
(361, '2021-10-24 10:12:32', 'backend\\models\\Archivo\\Archivo', '100', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Archivos / Eliminar Archivo', 'Trasteando'),
(362, '2021-10-24 10:13:21', 'backend\\models\\Etiqueta\\Etiqueta', '7', 'Insertar', 'id', 'N/A', '7', '56', '::1', 'Administrador', 'Administración / Etiquetas / Crear Etiqueta', 'Portada'),
(363, '2021-10-24 10:13:21', 'backend\\models\\Etiqueta\\Etiqueta', '7', 'Insertar', 'etiqueta', 'N/A', 'Portada', '56', '::1', 'Administrador', 'Administración / Etiquetas / Crear Etiqueta', 'Portada'),
(364, '2021-10-24 10:13:31', 'backend\\models\\Etiqueta\\Etiqueta', '8', 'Insertar', 'id', 'N/A', '8', '56', '::1', 'Administrador', 'Administración / Etiquetas / Crear Etiqueta', 'Che'),
(365, '2021-10-24 10:13:31', 'backend\\models\\Etiqueta\\Etiqueta', '8', 'Insertar', 'etiqueta', 'N/A', 'Che', '56', '::1', 'Administrador', 'Administración / Etiquetas / Crear Etiqueta', 'Che'),
(366, '2021-10-24 10:14:12', 'backend\\models\\Etiqueta\\Etiqueta', '9', 'Insertar', 'id', 'N/A', '9', '56', '::1', 'Administrador', 'Administración / Etiquetas / Crear Etiqueta', 'Ernesto Guevara'),
(367, '2021-10-24 10:14:12', 'backend\\models\\Etiqueta\\Etiqueta', '9', 'Insertar', 'etiqueta', 'N/A', 'Ernesto Guevara', '56', '::1', 'Administrador', 'Administración / Etiquetas / Crear Etiqueta', 'Ernesto Guevara'),
(368, '2021-10-24 10:14:35', 'backend\\models\\Etiqueta\\Etiqueta', '10', 'Insertar', 'id', 'N/A', '10', '56', '::1', 'Administrador', 'Administración / Etiquetas / Crear Etiqueta', 'Juventud'),
(369, '2021-10-24 10:14:35', 'backend\\models\\Etiqueta\\Etiqueta', '10', 'Insertar', 'etiqueta', 'N/A', 'Juventud', '56', '::1', 'Administrador', 'Administración / Etiquetas / Crear Etiqueta', 'Juventud'),
(370, '2021-10-24 10:36:31', 'backend\\models\\Etiqueta\\Etiqueta', '11', 'Insertar', 'id', 'N/A', '11', '56', '::1', 'Administrador', 'Administración / Etiquetas / Crear Etiqueta', 'Ernesto \"Che\" Guevara'),
(371, '2021-10-24 10:36:31', 'backend\\models\\Etiqueta\\Etiqueta', '11', 'Insertar', 'etiqueta', 'N/A', 'Ernesto \"Che\" Guevara', '56', '::1', 'Administrador', 'Administración / Etiquetas / Crear Etiqueta', 'Ernesto \"Che\" Guevara'),
(372, '2021-10-24 10:36:45', 'backend\\models\\Etiqueta\\Etiqueta', '12', 'Insertar', 'id', 'N/A', '12', '56', '::1', 'Administrador', 'Administración / Etiquetas / Crear Etiqueta', 'Centro Estudios'),
(373, '2021-10-24 10:36:46', 'backend\\models\\Etiqueta\\Etiqueta', '12', 'Insertar', 'etiqueta', 'N/A', 'Centro Estudios', '56', '::1', 'Administrador', 'Administración / Etiquetas / Crear Etiqueta', 'Centro Estudios'),
(374, '2021-10-24 10:37:15', 'backend\\models\\Etiqueta\\Etiqueta', '13', 'Insertar', 'id', 'N/A', '13', '56', '::1', 'Administrador', 'Administración / Etiquetas / Crear Etiqueta', 'Ministro de Economía'),
(375, '2021-10-24 10:37:15', 'backend\\models\\Etiqueta\\Etiqueta', '13', 'Insertar', 'etiqueta', 'N/A', 'Ministro de Economía', '56', '::1', 'Administrador', 'Administración / Etiquetas / Crear Etiqueta', 'Ministro de Economía'),
(376, '2021-10-24 11:05:59', 'backend\\models\\Archivo\\Archivo', '79', 'Modificar', 'titulo_archivo', 'Leo', 'Portada', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Portada'),
(377, '2021-10-24 11:05:59', 'backend\\models\\Archivo\\Archivo', '79', 'Modificar', 'autor_archivo', 'Leo', 'Patricia Navarro', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Portada'),
(378, '2021-10-24 11:05:59', 'backend\\models\\Archivo\\Archivo', '79', 'Modificar', 'etiqueta', 'Leo', 'Portada ; Ernesto Guevara ; Centro Estudios ;', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Portada'),
(379, '2021-10-24 11:06:00', 'backend\\models\\Archivo\\Archivo', '79', 'Modificar', 'descripcion_archivo', 'Leo', 'Aviador', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Portada'),
(380, '2021-10-24 11:06:00', 'backend\\models\\Archivo\\Archivo', '79', 'Modificar', 'etapa', 'No definida', 'No Definida', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Portada'),
(381, '2021-10-24 11:06:55', 'backend\\models\\Archivo\\Archivo', '80', 'Modificar', 'titulo_archivo', 'Eric', 'Galería', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Galería'),
(382, '2021-10-24 11:06:56', 'backend\\models\\Archivo\\Archivo', '80', 'Modificar', 'autor_archivo', 'Eric', 'Eric Janero', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Galería'),
(383, '2021-10-24 11:06:56', 'backend\\models\\Archivo\\Archivo', '80', 'Modificar', 'etiqueta', 'Eric', 'Che ; Centro Estudios ;', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Galería'),
(384, '2021-10-24 11:06:56', 'backend\\models\\Archivo\\Archivo', '80', 'Modificar', 'descripcion_archivo', 'Eric se te quedaron los audifonos', 'Galería de Pruebas', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Galería'),
(385, '2021-10-24 11:24:24', 'backend\\models\\Archivo\\Archivo', '85', 'Modificar', 'titulo_archivo', 'hgfds', 'Aeroplano', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Aeroplano'),
(386, '2021-10-24 11:24:24', 'backend\\models\\Archivo\\Archivo', '85', 'Modificar', 'autor_archivo', 'hgfds', 'N/A', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Aeroplano'),
(387, '2021-10-24 11:24:24', 'backend\\models\\Archivo\\Archivo', '85', 'Modificar', 'fuente', 'gfd', 'N/A', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Aeroplano'),
(388, '2021-10-24 11:24:24', 'backend\\models\\Archivo\\Archivo', '85', 'Modificar', 'etiqueta', 'hgfd, fghj, ghjk', 'Che ; Ernesto Guevara ;', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Aeroplano'),
(389, '2021-10-24 11:24:24', 'backend\\models\\Archivo\\Archivo', '85', 'Modificar', 'descripcion_archivo', 'afsdf', 'Aeroplano', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Aeroplano'),
(390, '2021-10-24 11:24:24', 'backend\\models\\Archivo\\Archivo', '85', 'Modificar', 'fecha', '2021-09-02', '1942-09-02', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Aeroplano'),
(391, '2021-10-24 11:24:24', 'backend\\models\\Archivo\\Archivo', '85', 'Modificar', 'etapa', 'Posterior a 1967', 'Infancia', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Aeroplano'),
(392, '2021-10-24 11:24:45', 'backend\\models\\Archivo\\Archivo', '99', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Archivos / Eliminar Archivo', '123'),
(393, '2021-10-24 11:24:52', 'backend\\models\\Archivo\\Archivo', '102', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Archivos / Eliminar Archivo', 'aaaa'),
(394, '2021-10-24 11:28:25', 'backend\\models\\Archivo\\Archivo', '87', 'Modificar', 'titulo_archivo', 'Che', 'Guerrillero Heroico', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Guerrillero Heroico'),
(395, '2021-10-24 11:28:25', 'backend\\models\\Archivo\\Archivo', '87', 'Modificar', 'autor_archivo', 'Korda', 'Alberto Korda.', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Guerrillero Heroico'),
(396, '2021-10-24 11:28:25', 'backend\\models\\Archivo\\Archivo', '87', 'Modificar', 'etiqueta', 'foto', 'Ernesto Guevara ;', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Guerrillero Heroico'),
(397, '2021-10-24 11:30:46', 'backend\\models\\Archivo\\Archivo', '83', 'Modificar', 'etiqueta', 'institucional', 'Centro Estudios ;', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Teletrabajo'),
(398, '2021-10-24 11:30:46', 'backend\\models\\Archivo\\Archivo', '83', 'Modificar', 'descripcion_archivo', 'Jóvenes del Centro de Estudios Che Guevara aprovechan las ventajas de las nuevas tecnologías y continúan desarrolando proyectos a pesar de las limitaciones por COVID. ', 'Jóvenes del Centro de Estudios Che Guevara aprovechan las ventajas de las nuevas tecnologías y continúan desarrollando proyectos a pesar de las limitaciones por COVID. ', '56', '::1', 'Administrador', 'Archivos / Modificar Archivo', 'Teletrabajo'),
(399, '2021-10-24 11:37:37', 'backend\\models\\Archivo\\Archivo', '105', 'Insertar', 'id_archivo', 'N/A', '105', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video Tejetrabajo'),
(400, '2021-10-24 11:37:37', 'backend\\models\\Archivo\\Archivo', '105', 'Insertar', 'revisado', 'N/A', '0', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video Tejetrabajo'),
(401, '2021-10-24 11:37:37', 'backend\\models\\Archivo\\Archivo', '105', 'Insertar', 'titulo_archivo', 'N/A', 'Video Tejetrabajo', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video Tejetrabajo'),
(402, '2021-10-24 11:37:37', 'backend\\models\\Archivo\\Archivo', '105', 'Insertar', 'tipo_archivo', 'N/A', '3', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video Tejetrabajo'),
(403, '2021-10-24 11:37:37', 'backend\\models\\Archivo\\Archivo', '105', 'Insertar', 'autor_archivo', 'N/A', 'Centro Estudios', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video Tejetrabajo'),
(404, '2021-10-24 11:37:37', 'backend\\models\\Archivo\\Archivo', '105', 'Insertar', 'fuente', 'N/A', 'Centro Estudios', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video Tejetrabajo'),
(405, '2021-10-24 11:37:38', 'backend\\models\\Archivo\\Archivo', '105', 'Insertar', 'etiqueta', 'N/A', 'Centro Estudios ;', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video Tejetrabajo'),
(406, '2021-10-24 11:37:38', 'backend\\models\\Archivo\\Archivo', '105', 'Insertar', 'descripcion_archivo', 'N/A', 'Demostrando las posibilidades del teletrabajo.', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video Tejetrabajo'),
(407, '2021-10-24 11:37:38', 'backend\\models\\Archivo\\Archivo', '105', 'Insertar', 'url_archivo', 'N/A', 'uploads/2021-10-2436775.mp4', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video Tejetrabajo'),
(408, '2021-10-24 11:37:38', 'backend\\models\\Archivo\\Archivo', '105', 'Insertar', 'fecha', 'N/A', '2021-05-1', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video Tejetrabajo'),
(409, '2021-10-24 11:37:38', 'backend\\models\\Archivo\\Archivo', '105', 'Insertar', 'etapa', 'N/A', 'Posterior a 1967', '56', '::1', 'Administrador', 'Archivos / Crear Archivo', 'Video Tejetrabajo'),
(410, '2021-10-24 11:38:35', 'backend\\models\\Noticia\\Noticia', '59', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Eliminar Noticia', 'Nueva borrar'),
(411, '2021-10-24 11:38:40', 'backend\\models\\Noticia\\Noticia', '58', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Eliminar Noticia', 'La buena'),
(412, '2021-10-24 11:38:45', 'backend\\models\\Noticia\\Noticia', '57', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Eliminar Noticia', '1'),
(413, '2021-10-24 11:38:50', 'backend\\models\\Noticia\\Noticia', '56', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Eliminar Noticia', 'gsdfgsdf'),
(414, '2021-10-24 11:38:55', 'backend\\models\\Noticia\\Noticia', '55', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Eliminar Noticia', 'asdf'),
(415, '2021-10-24 11:39:00', 'backend\\models\\Noticia\\Noticia', '54', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Eliminar Noticia', 'Taller de Animación'),
(416, '2021-10-24 11:39:05', 'backend\\models\\Noticia\\Noticia', '53', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Eliminar Noticia', 'asdf'),
(417, '2021-10-24 11:39:10', 'backend\\models\\Noticia\\Noticia', '52', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Eliminar Noticia', 'asdf'),
(418, '2021-10-24 11:39:14', 'backend\\models\\Noticia\\Noticia', '51', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Eliminar Noticia', 'asfdsfgdghfjk'),
(419, '2021-10-24 11:39:19', 'backend\\models\\Noticia\\Noticia', '50', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Eliminar Noticia', 'asfdsfgdghfjk'),
(420, '2021-10-24 11:39:24', 'backend\\models\\Noticia\\Noticia', '48', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Eliminar Noticia', 's'),
(421, '2021-10-24 11:39:33', 'backend\\models\\Noticia\\Noticia', '45', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Eliminar Noticia', 'Leo termina la tesis'),
(422, '2021-10-24 11:39:51', 'backend\\models\\Noticia\\NoticiaArchivo', '49', 'Modificar', 'id', 'N/A', '83', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', 'Taller de Animación'),
(423, '2021-10-24 11:39:51', 'backend\\models\\Noticia\\NoticiaArchivo', '49', 'Modificar', 'id_noticia', 'N/A', '49', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', 'Taller de Animación'),
(424, '2021-10-24 11:39:51', 'backend\\models\\Noticia\\NoticiaArchivo', '49', 'Modificar', 'id_archivo', 'N/A', '81', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', 'Taller de Animación'),
(425, '2021-10-24 11:39:51', 'backend\\models\\Noticia\\NoticiaArchivo', '49', 'Modificar', 'nota', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', 'Taller de Animación'),
(426, '2021-10-24 11:39:51', 'backend\\models\\Noticia\\NoticiaArchivo', '49', 'Modificar', 'portada', 'N/A', '1', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia - Archivo Asociado', 'Taller de Animación'),
(427, '2021-10-24 11:39:51', 'backend\\models\\Noticia\\Noticia', '49', 'Modificar', 'revisado', '1', '0', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia', 'Taller de Animación'),
(428, '2021-10-24 11:39:51', 'backend\\models\\Noticia\\Noticia', '49', 'Modificar', 'publico', '1', '0', '56', '::1', 'Administrador', 'Inicio / Noticias / Modificar Noticia', 'Taller de Animación'),
(429, '2021-10-24 11:41:19', 'backend\\models\\GestionDocumental\\GestionDocumental', '1', 'Modificar', 'descripcion', 'Nueva Descripcion', 'Portada del la Colección Documental', '56', '::1', 'Administrador', 'Coordinación Académica / Colección Documental / Colección Documental - Portada / Modificar Portada', 'Portada'),
(430, '2021-10-24 11:43:11', 'backend\\models\\Revista\\Paradigma', '1', 'Modificar', 'descripcion', 'DescripciónDescripción\r\nDescripciónDescripción\r\nDescripciónDescripciónDescripción\r\nDescripciónDescripciónDescripciónDescripción', 'Descripción de la sección Paradigma visible desde el home del sitio', '56', '::1', 'Administrador', 'Inicio / Paradigma / Paradigma - Inicio / Modificar Paradigma - Inicio', 'Inicio'),
(431, '2021-10-24 11:43:11', 'backend\\models\\Revista\\Paradigma', '1', 'Modificar', 'enlace', 'UrlDescripciónDescripciónDescripciónDescripciónDescripción', 'https://localhost.com/centro_che/backend/web/index.php?r=paradigma%2Fupdate&id=1', '56', '::1', 'Administrador', 'Inicio / Paradigma / Paradigma - Inicio / Modificar Paradigma - Inicio', 'Inicio'),
(432, '2021-10-24 11:44:03', 'backend\\models\\Quienes\\Quienes', '1', 'Modificar', 'descripcion', 'Descripción del quienes somos inicio', 'Descripción del quienes somos inicio visible desde el home del sitio.', '56', '::1', 'Administrador', 'Inicio / Quiénes Somos / Quiénes Somos - Inicio / Modificar Quiénes Somos - Inicio', 'Inicio'),
(433, '2021-10-24 11:45:03', 'backend\\models\\Quienes\\QuienesDetalle', '1', 'Modificar', 'descripcion', 'asd', 'Vista detallada del quiénes somos.', '56', '::1', 'Administrador', 'Inicio / Quiénes Somos / Quiénes Somos - Detalles / Modificar Quiénes Somos - Detalles', 'Detalles'),
(434, '2021-10-24 11:46:54', 'backend\\models\\Proyecto\\Proyecto', '1', 'Modificar', 'enlace', 'cheguevaralibros.com', 'https://cheguevaralibros.com/che', '56', '::1', 'Administrador', 'Coordinación Académica / Proyecto Editorial / Proyecto Editorial - Portada / Modificar Proyecto Editorial - Portada', 'Portada'),
(435, '2021-10-24 11:47:21', 'backend\\models\\CursoOnline\\CursoOnline', '15', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Coordinación Académica / Cursos Online / Eliminar Curso Online', 'gdsf'),
(436, '2021-10-24 11:47:33', 'backend\\models\\Programacion\\Programacion', '2', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Proyectos Alternativos / Programación Cultural / Eliminar Programación Cultural', '321'),
(437, '2021-10-24 11:47:37', 'backend\\models\\Programacion\\Programacion', '1', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Proyectos Alternativos / Programación Cultural / Eliminar Programación Cultural', '123'),
(438, '2021-10-24 11:47:46', 'backend\\models\\Exposicion\\Exposicion', '17', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Proyectos Alternativos / Exposiciones / Eliminar Exposición', 'rango'),
(439, '2021-10-24 11:47:50', 'backend\\models\\Exposicion\\Exposicion', '16', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Proyectos Alternativos / Exposiciones / Eliminar Exposición', 'mes'),
(440, '2021-10-24 11:47:54', 'backend\\models\\Exposicion\\Exposicion', '15', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Proyectos Alternativos / Exposiciones / Eliminar Exposición', '3'),
(441, '2021-10-24 11:47:59', 'backend\\models\\Exposicion\\Exposicion', '14', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Proyectos Alternativos / Exposiciones / Eliminar Exposición', '2'),
(442, '2021-10-24 11:48:04', 'backend\\models\\Exposicion\\Exposicion', '13', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Proyectos Alternativos / Exposiciones / Eliminar Exposición', '1'),
(443, '2021-10-24 11:48:08', 'backend\\models\\Exposicion\\Exposicion', '12', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Proyectos Alternativos / Exposiciones / Eliminar Exposición', '1'),
(444, '2021-10-24 11:48:12', 'backend\\models\\Exposicion\\Exposicion', '11', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Proyectos Alternativos / Exposiciones / Eliminar Exposición', 'asf'),
(445, '2021-10-24 11:48:17', 'backend\\models\\Exposicion\\Exposicion', '10', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Proyectos Alternativos / Exposiciones / Eliminar Exposición', 'asdf'),
(446, '2021-10-24 11:48:55', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '9', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Eliminar Producto Audiovisual', 'sadf'),
(447, '2021-10-24 11:49:00', 'backend\\models\\ProductoAudiovisual\\ProductoAudiovisual', '8', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Proyectos Alternativos / Productos Audiovisuales / Eliminar Producto Audiovisual', 'sadf'),
(448, '2021-10-24 11:49:14', 'backend\\models\\Hecho\\Hecho', '10', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Vida y Obra / Cronología / Eliminar Hecho', '1'),
(449, '2021-10-24 11:49:23', 'backend\\models\\Correspondencia\\Correspondencia', '14', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia', '2'),
(450, '2021-10-24 11:49:28', 'backend\\models\\Correspondencia\\Correspondencia', '13', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia', '1'),
(451, '2021-10-24 11:49:37', 'backend\\models\\Escrito\\Escrito', '1', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Vida y Obra / Escritos / Eliminar Escrito', 'asdf'),
(452, '2021-10-24 11:50:06', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '12', 'Modificar', 'id', 'N/A', '22', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', 'Carta de Calixto García al Che'),
(453, '2021-10-24 11:50:06', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '12', 'Modificar', 'id_correspondencia', 'N/A', '12', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', 'Carta de Calixto García al Che'),
(454, '2021-10-24 11:50:06', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '12', 'Modificar', 'id_archivo', 'N/A', '83', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', 'Carta de Calixto García al Che'),
(455, '2021-10-24 11:50:06', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '12', 'Modificar', 'nota', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', 'Carta de Calixto García al Che'),
(456, '2021-10-24 11:50:06', 'backend\\models\\Correspondencia\\CorrespondenciaArchivo', '12', 'Modificar', 'portada', 'N/A', '1', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia - Archivo Asociado', 'Carta de Calixto García al Che'),
(457, '2021-10-24 11:50:06', 'backend\\models\\Correspondencia\\Correspondencia', '12', 'Modificar', 'revisado', '1', '0', '56', '::1', 'Administrador', 'Vida y Obra / Correspondencia / Modificar Correspondencia', 'Carta de Calixto García al Che'),
(458, '2021-10-24 11:50:27', 'backend\\models\\Discurso\\Discurso', '5', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Vida y Obra / Discursos y Entrevistas / Eliminar Discurso o Entrevista', 'Mira'),
(459, '2021-10-24 11:50:47', 'backend\\models\\Discurso\\DiscursoArchivo', '6', 'Modificar', 'id', 'N/A', '13', '56', '::1', 'Administrador', 'Vida y Obra / Discursos y Entrevistas / Modificar Discurso o Entrevista - Archivo Asociado', 'Entrevista al Che por Jorge Ricardo Masetti'),
(460, '2021-10-24 11:50:47', 'backend\\models\\Discurso\\DiscursoArchivo', '6', 'Modificar', 'id_discurso', 'N/A', '6', '56', '::1', 'Administrador', 'Vida y Obra / Discursos y Entrevistas / Modificar Discurso o Entrevista - Archivo Asociado', 'Entrevista al Che por Jorge Ricardo Masetti'),
(461, '2021-10-24 11:50:47', 'backend\\models\\Discurso\\DiscursoArchivo', '6', 'Modificar', 'id_archivo', 'N/A', '80', '56', '::1', 'Administrador', 'Vida y Obra / Discursos y Entrevistas / Modificar Discurso o Entrevista - Archivo Asociado', 'Entrevista al Che por Jorge Ricardo Masetti'),
(462, '2021-10-24 11:50:47', 'backend\\models\\Discurso\\DiscursoArchivo', '6', 'Modificar', 'nota', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Vida y Obra / Discursos y Entrevistas / Modificar Discurso o Entrevista - Archivo Asociado', 'Entrevista al Che por Jorge Ricardo Masetti'),
(463, '2021-10-24 11:50:47', 'backend\\models\\Discurso\\DiscursoArchivo', '6', 'Modificar', 'portada', 'N/A', '1', '56', '::1', 'Administrador', 'Vida y Obra / Discursos y Entrevistas / Modificar Discurso o Entrevista - Archivo Asociado', 'Entrevista al Che por Jorge Ricardo Masetti'),
(464, '2021-10-24 11:50:47', 'backend\\models\\Discurso\\Discurso', '6', 'Modificar', 'revisado', '1', '0', '56', '::1', 'Administrador', 'Vida y Obra / Discursos y Entrevistas / Modificar Discurso o Entrevista', 'Entrevista al Che por Jorge Ricardo Masetti'),
(465, '2021-10-24 11:51:30', 'backend\\models\\Galeria\\GaleriaVo', '13', 'Insertar', 'id_galeria_vo', 'N/A', '13', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/2021-10-2436775.mp4'),
(466, '2021-10-24 11:51:30', 'backend\\models\\Galeria\\GaleriaVo', '13', 'Insertar', 'id_archivo', 'N/A', 'uploads/2021-10-2436775.mp4', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/2021-10-2436775.mp4'),
(467, '2021-10-24 11:51:30', 'backend\\models\\Galeria\\GaleriaVo', '13', 'Insertar', 'tipo', 'N/A', '3', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/2021-10-2436775.mp4'),
(468, '2021-10-24 11:51:30', 'backend\\models\\Galeria\\GaleriaVo', '13', 'Insertar', 'genero', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/2021-10-2436775.mp4'),
(469, '2021-10-24 11:51:30', 'backend\\models\\Galeria\\GaleriaVo', '13', 'Insertar', 'tipo_archivo', 'N/A', '3', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/2021-10-2436775.mp4'),
(470, '2021-10-24 11:51:30', 'backend\\models\\Galeria\\GaleriaVo', '13', 'Insertar', 'publico', 'N/A', '1', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/2021-10-2436775.mp4'),
(471, '2021-10-24 11:51:31', 'backend\\models\\Galeria\\GaleriaVo', '13', 'Insertar', 'nota', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/2021-10-2436775.mp4'),
(472, '2021-10-24 11:51:56', 'backend\\models\\Galeria\\GaleriaVo', '14', 'Insertar', 'id_galeria_vo', 'N/A', '14', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/2021-10-2121633.mp3'),
(473, '2021-10-24 11:51:56', 'backend\\models\\Galeria\\GaleriaVo', '14', 'Insertar', 'id_archivo', 'N/A', 'uploads/2021-10-2121633.mp3', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/2021-10-2121633.mp3'),
(474, '2021-10-24 11:51:56', 'backend\\models\\Galeria\\GaleriaVo', '14', 'Insertar', 'tipo', 'N/A', '2', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/2021-10-2121633.mp3'),
(475, '2021-10-24 11:51:56', 'backend\\models\\Galeria\\GaleriaVo', '14', 'Insertar', 'genero', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/2021-10-2121633.mp3'),
(476, '2021-10-24 11:51:56', 'backend\\models\\Galeria\\GaleriaVo', '14', 'Insertar', 'tipo_archivo', 'N/A', '2', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/2021-10-2121633.mp3'),
(477, '2021-10-24 11:51:57', 'backend\\models\\Galeria\\GaleriaVo', '14', 'Insertar', 'publico', 'N/A', '1', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/2021-10-2121633.mp3'),
(478, '2021-10-24 11:51:57', 'backend\\models\\Galeria\\GaleriaVo', '14', 'Insertar', 'nota', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Vida y Obra / Galería / Insertar Archivo', 'uploads/2021-10-2121633.mp3'),
(479, '2021-10-24 11:53:25', 'backend\\models\\ProductoAudiovisual\\TipoProducto', '2', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Administración / Géneros de Productos Audiovisuales / Eliminar Género de Producto Audiovisual', 'Nuevo'),
(480, '2021-10-24 11:53:29', 'backend\\models\\ProductoAudiovisual\\TipoProducto', '1', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Administración / Géneros de Productos Audiovisuales / Eliminar Género de Producto Audiovisual', 'Nuevo'),
(481, '2021-10-24 11:53:33', 'backend\\models\\ProductoAudiovisual\\TipoProducto', '3', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Administración / Géneros de Productos Audiovisuales / Eliminar Género de Producto Audiovisual', 'Este es otro'),
(482, '2021-10-24 11:53:56', 'backend\\models\\ProductoAudiovisual\\TipoProducto', '4', 'Insertar', 'id', 'N/A', '4', '56', '::1', 'Administrador', 'Administración / Géneros de Productos Audiovisuales / Crear Género de Producto Audiovisual', 'Largometraje'),
(483, '2021-10-24 11:53:56', 'backend\\models\\ProductoAudiovisual\\TipoProducto', '4', 'Insertar', 'tipo_producto', 'N/A', 'Largometraje', '56', '::1', 'Administrador', 'Administración / Géneros de Productos Audiovisuales / Crear Género de Producto Audiovisual', 'Largometraje'),
(484, '2021-10-24 11:54:08', 'backend\\models\\taller\\TipoTaller', '2', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Administración / Tipos de Proyectos Comunitarios / Eliminar Tipo de Proyecto Comunitario', 'Ejemplo'),
(485, '2021-10-24 11:54:13', 'backend\\models\\taller\\TipoTaller', '4', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Administración / Tipos de Proyectos Comunitarios / Eliminar Tipo de Proyecto Comunitario', 'Nuevo'),
(486, '2021-10-24 11:54:19', 'backend\\models\\taller\\TipoTaller', '6', 'Eliminar', 'N/A', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Administración / Tipos de Proyectos Comunitarios / Eliminar Tipo de Proyecto Comunitario', 'Nombre'),
(487, '2021-10-24 11:54:29', 'backend\\models\\taller\\TipoTaller', '7', 'Insertar', 'id', 'N/A', '7', '56', '::1', 'Administrador', 'Administración / Tipos de Proyectos Comunitarios / Crear Tipo de Proyecto Comunitario', 'Fotografía'),
(488, '2021-10-24 11:54:30', 'backend\\models\\taller\\TipoTaller', '7', 'Insertar', 'tipo', 'N/A', 'Fotografía', '56', '::1', 'Administrador', 'Administración / Tipos de Proyectos Comunitarios / Crear Tipo de Proyecto Comunitario', 'Fotografía'),
(489, '2021-10-24 11:55:00', 'backend\\models\\Taller\\TallerArchivo', '16', 'Modificar', 'id', 'N/A', '18', '56', '::1', 'Administrador', 'Proyectos Alternativos / Proyectos Comunitarios / Modificar Proyecto Comunitario - Archivo Asociado', 'Cerámica hoy'),
(490, '2021-10-24 11:55:00', 'backend\\models\\Taller\\TallerArchivo', '16', 'Modificar', 'id_taller', 'N/A', '16', '56', '::1', 'Administrador', 'Proyectos Alternativos / Proyectos Comunitarios / Modificar Proyecto Comunitario - Archivo Asociado', 'Cerámica hoy'),
(491, '2021-10-24 11:55:00', 'backend\\models\\Taller\\TallerArchivo', '16', 'Modificar', 'id_archivo', 'N/A', '81', '56', '::1', 'Administrador', 'Proyectos Alternativos / Proyectos Comunitarios / Modificar Proyecto Comunitario - Archivo Asociado', 'Cerámica hoy'),
(492, '2021-10-24 11:55:00', 'backend\\models\\Taller\\TallerArchivo', '16', 'Modificar', 'nota', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Proyectos Alternativos / Proyectos Comunitarios / Modificar Proyecto Comunitario - Archivo Asociado', 'Cerámica hoy'),
(493, '2021-10-24 11:55:00', 'backend\\models\\Taller\\TallerArchivo', '16', 'Modificar', 'portada', 'N/A', 'N/A', '56', '::1', 'Administrador', 'Proyectos Alternativos / Proyectos Comunitarios / Modificar Proyecto Comunitario - Archivo Asociado', 'Cerámica hoy'),
(494, '2021-10-24 11:55:00', 'backend\\models\\Taller\\Taller', '16', 'Modificar', 'publico', '1', '0', '56', '::1', 'Administrador', 'Proyectos Alternativos / Proyectos Comunitarios / Modificar Proyecto Comunitario', 'Cerámica hoy'),
(495, '2021-10-24 11:55:00', 'backend\\models\\Taller\\Taller', '16', 'Modificar', 'revisado', '1', '0', '56', '::1', 'Administrador', 'Proyectos Alternativos / Proyectos Comunitarios / Modificar Proyecto Comunitario', 'Cerámica hoy'),
(496, '2021-10-30 19:34:00', 'backend\\models\\Articulo\\ArticuloArchivo', '34', 'Modificar', 'id', 'N/A', '47', '5', '::1', 'Leonardo', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo Asociado', 'Che Guevara: experiencias comunicativas en torno a su vida y obra'),
(497, '2021-10-30 19:34:00', 'backend\\models\\Articulo\\ArticuloArchivo', '34', 'Modificar', 'id_articulo', 'N/A', '34', '5', '::1', 'Leonardo', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo Asociado', 'Che Guevara: experiencias comunicativas en torno a su vida y obra'),
(498, '2021-10-30 19:34:00', 'backend\\models\\Articulo\\ArticuloArchivo', '34', 'Modificar', 'id_archivo', 'N/A', '83', '5', '::1', 'Leonardo', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo Asociado', 'Che Guevara: experiencias comunicativas en torno a su vida y obra'),
(499, '2021-10-30 19:34:00', 'backend\\models\\Articulo\\ArticuloArchivo', '34', 'Modificar', 'nota', 'N/A', 'Esta es la nota nueva', '5', '::1', 'Leonardo', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo Asociado', 'Che Guevara: experiencias comunicativas en torno a su vida y obra'),
(500, '2021-10-30 19:34:00', 'backend\\models\\Articulo\\ArticuloArchivo', '34', 'Modificar', 'portada', 'N/A', '1', '5', '::1', 'Leonardo', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo Asociado', 'Che Guevara: experiencias comunicativas en torno a su vida y obra'),
(501, '2021-10-30 19:34:00', 'backend\\models\\Articulo\\ArticuloArchivo', '34', 'Modificar', 'id', 'N/A', '48', '5', '::1', 'Leonardo', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo Asociado', 'Che Guevara: experiencias comunicativas en torno a su vida y obra');
INSERT INTO `tbl_audit_entry` (`audit_entry_id`, `audit_entry_timestamp`, `audit_entry_model_name`, `audit_entry_model_id`, `audit_entry_operation`, `audit_entry_field_name`, `audit_entry_old_value`, `audit_entry_new_value`, `audit_entry_user_id`, `audit_entry_ip`, `audit_entry_user_name`, `place`, `title`) VALUES
(502, '2021-10-30 19:34:00', 'backend\\models\\Articulo\\ArticuloArchivo', '34', 'Modificar', 'id_articulo', 'N/A', '34', '5', '::1', 'Leonardo', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo Asociado', 'Che Guevara: experiencias comunicativas en torno a su vida y obra'),
(503, '2021-10-30 19:34:00', 'backend\\models\\Articulo\\ArticuloArchivo', '34', 'Modificar', 'id_archivo', 'N/A', '80', '5', '::1', 'Leonardo', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo Asociado', 'Che Guevara: experiencias comunicativas en torno a su vida y obra'),
(504, '2021-10-30 19:34:00', 'backend\\models\\Articulo\\ArticuloArchivo', '34', 'Modificar', 'nota', 'N/A', 'Hola', '5', '::1', 'Leonardo', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo Asociado', 'Che Guevara: experiencias comunicativas en torno a su vida y obra'),
(505, '2021-10-30 19:34:00', 'backend\\models\\Articulo\\ArticuloArchivo', '34', 'Modificar', 'portada', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Coordinación Académica / Artículos / Modificar Artículo - Archivo Asociado', 'Che Guevara: experiencias comunicativas en torno a su vida y obra'),
(506, '2021-10-30 19:34:00', 'backend\\models\\Articulo\\Articulo', '34', 'Modificar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Coordinación Académica / Artículos / Modificar Artículo', 'Che Guevara: experiencias comunicativas en torno a su vida y obra'),
(507, '2021-10-30 19:34:00', 'backend\\models\\Articulo\\Articulo', '34', 'Modificar', 'titulo', 'Che: experiencias comunicativas en torno a su vida y obra', 'Che Guevara: experiencias comunicativas en torno a su vida y obra', '5', '::1', 'Leonardo', 'Coordinación Académica / Artículos / Modificar Artículo', 'Che Guevara: experiencias comunicativas en torno a su vida y obra'),
(508, '2021-10-30 19:34:00', 'backend\\models\\Articulo\\Articulo', '34', 'Modificar', 'fecha', '2021-09-01', '2020-10-01', '5', '::1', 'Leonardo', 'Coordinación Académica / Artículos / Modificar Artículo', 'Che Guevara: experiencias comunicativas en torno a su vida y obra'),
(509, '2021-11-09 18:16:56', 'backend\\models\\Hecho\\HechoArchivo', '11', 'Insertar', 'id', 'N/A', '18', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Crear Hecho - Archivo Asociado', 'Nuevo'),
(510, '2021-11-09 18:16:56', 'backend\\models\\Hecho\\HechoArchivo', '11', 'Insertar', 'id_hecho', 'N/A', '11', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Crear Hecho - Archivo Asociado', 'Nuevo'),
(511, '2021-11-09 18:16:56', 'backend\\models\\Hecho\\HechoArchivo', '11', 'Insertar', 'id_archivo', 'N/A', '81', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Crear Hecho - Archivo Asociado', 'Nuevo'),
(512, '2021-11-09 18:16:56', 'backend\\models\\Hecho\\HechoArchivo', '11', 'Insertar', 'nota', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Crear Hecho - Archivo Asociado', 'Nuevo'),
(513, '2021-11-09 18:16:56', 'backend\\models\\Hecho\\HechoArchivo', '11', 'Insertar', 'portada', 'N/A', '1', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Crear Hecho - Archivo Asociado', 'Nuevo'),
(514, '2021-11-09 18:16:56', 'backend\\models\\Hecho\\Hecho', '11', 'Insertar', 'id_hecho', 'N/A', '11', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Crear Hecho', 'Nuevo'),
(515, '2021-11-09 18:16:56', 'backend\\models\\Hecho\\Hecho', '11', 'Insertar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Crear Hecho', 'Nuevo'),
(516, '2021-11-09 18:16:56', 'backend\\models\\Hecho\\Hecho', '11', 'Insertar', 'publico', 'N/A', '0', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Crear Hecho', 'Nuevo'),
(517, '2021-11-09 18:16:56', 'backend\\models\\Hecho\\Hecho', '11', 'Insertar', 'titulo', 'N/A', 'Nuevo', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Crear Hecho', 'Nuevo'),
(518, '2021-11-09 18:16:56', 'backend\\models\\Hecho\\Hecho', '11', 'Insertar', 'descripcion', 'N/A', 'fg', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Crear Hecho', 'Nuevo'),
(519, '2021-11-09 18:16:56', 'backend\\models\\Hecho\\Hecho', '11', 'Insertar', 'cuerpo', 'N/A', 'jhfgj', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Crear Hecho', 'Nuevo'),
(520, '2021-11-09 18:16:56', 'backend\\models\\Hecho\\Hecho', '11', 'Insertar', 'fecha', 'N/A', '1889-02-1', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Crear Hecho', 'Nuevo'),
(521, '2021-11-09 18:16:56', 'backend\\models\\Hecho\\Hecho', '11', 'Insertar', 'fecha_fin', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Crear Hecho', 'Nuevo'),
(522, '2021-11-09 18:16:56', 'backend\\models\\Hecho\\Hecho', '11', 'Insertar', 'tipo_fecha', 'N/A', '0', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Crear Hecho', 'Nuevo'),
(523, '2021-11-09 18:16:56', 'backend\\models\\Hecho\\Hecho', '11', 'Insertar', 'etapa', 'N/A', 'Anterior a 1928', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Crear Hecho', 'Nuevo'),
(524, '2021-11-09 18:26:20', 'backend\\models\\Hecho\\HechoArchivo', '11', 'Modificar', 'id', 'N/A', '19', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Modificar Hecho - Archivo Asociado', 'Nuevo'),
(525, '2021-11-09 18:26:20', 'backend\\models\\Hecho\\HechoArchivo', '11', 'Modificar', 'id_hecho', 'N/A', '11', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Modificar Hecho - Archivo Asociado', 'Nuevo'),
(526, '2021-11-09 18:26:20', 'backend\\models\\Hecho\\HechoArchivo', '11', 'Modificar', 'id_archivo', 'N/A', '81', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Modificar Hecho - Archivo Asociado', 'Nuevo'),
(527, '2021-11-09 18:26:20', 'backend\\models\\Hecho\\HechoArchivo', '11', 'Modificar', 'nota', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Modificar Hecho - Archivo Asociado', 'Nuevo'),
(528, '2021-11-09 18:26:20', 'backend\\models\\Hecho\\HechoArchivo', '11', 'Modificar', 'portada', 'N/A', '1', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Modificar Hecho - Archivo Asociado', 'Nuevo'),
(529, '2021-11-09 18:26:20', 'backend\\models\\Hecho\\Hecho', '11', 'Modificar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Modificar Hecho', 'Nuevo'),
(530, '2021-11-09 18:26:20', 'backend\\models\\Hecho\\Hecho', '11', 'Modificar', 'publico', 'N/A', '0', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Modificar Hecho', 'Nuevo'),
(531, '2021-11-09 18:26:20', 'backend\\models\\Hecho\\Hecho', '11', 'Modificar', 'fecha_fin', 'N/A', '1999-02-9', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Modificar Hecho', 'Nuevo'),
(532, '2021-11-09 18:26:21', 'backend\\models\\Hecho\\Hecho', '11', 'Modificar', 'tipo_fecha', 'N/A', '1', '5', '::1', 'Leonardo', 'Vida y Obra / Cronología / Modificar Hecho', 'Nuevo'),
(533, '2021-11-09 18:27:23', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Insertar', 'id', 'N/A', '23', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición - Archivo Asociado', 'Nuevo'),
(534, '2021-11-09 18:27:23', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Insertar', 'id_exposicion', 'N/A', '18', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición - Archivo Asociado', 'Nuevo'),
(535, '2021-11-09 18:27:23', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Insertar', 'id_archivo', 'N/A', '79', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición - Archivo Asociado', 'Nuevo'),
(536, '2021-11-09 18:27:23', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Insertar', 'nota', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición - Archivo Asociado', 'Nuevo'),
(537, '2021-11-09 18:27:23', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Insertar', 'portada', 'N/A', '1', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición - Archivo Asociado', 'Nuevo'),
(538, '2021-11-09 18:27:23', 'backend\\models\\Exposicion\\Exposicion', '18', 'Insertar', 'id_exposicion', 'N/A', '18', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición', 'Nuevo'),
(539, '2021-11-09 18:27:23', 'backend\\models\\Exposicion\\Exposicion', '18', 'Insertar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición', 'Nuevo'),
(540, '2021-11-09 18:27:23', 'backend\\models\\Exposicion\\Exposicion', '18', 'Insertar', 'publico', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición', 'Nuevo'),
(541, '2021-11-09 18:27:24', 'backend\\models\\Exposicion\\Exposicion', '18', 'Insertar', 'titulo', 'N/A', 'Nuevo', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición', 'Nuevo'),
(542, '2021-11-09 18:27:24', 'backend\\models\\Exposicion\\Exposicion', '18', 'Insertar', 'descripcion', 'N/A', 'sdfg', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición', 'Nuevo'),
(543, '2021-11-09 18:27:24', 'backend\\models\\Exposicion\\Exposicion', '18', 'Insertar', 'cuerpo', 'N/A', 'sdfg', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición', 'Nuevo'),
(544, '2021-11-09 18:27:24', 'backend\\models\\Exposicion\\Exposicion', '18', 'Insertar', 'enlace', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición', 'Nuevo'),
(545, '2021-11-09 18:27:24', 'backend\\models\\Exposicion\\Exposicion', '18', 'Insertar', 'tipo_fecha', 'N/A', '1', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición', 'Nuevo'),
(546, '2021-11-09 18:27:24', 'backend\\models\\Exposicion\\Exposicion', '18', 'Insertar', 'fecha', 'N/A', '1999-01-12', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición', 'Nuevo'),
(547, '2021-11-09 18:27:24', 'backend\\models\\Exposicion\\Exposicion', '18', 'Insertar', 'fecha_fin', 'N/A', '2000-04-22', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición', 'Nuevo'),
(548, '2021-11-09 18:27:24', 'backend\\models\\Exposicion\\Exposicion', '18', 'Insertar', 'entidad', 'N/A', 'sdfg', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición', 'Nuevo'),
(549, '2021-11-09 18:27:24', 'backend\\models\\Exposicion\\Exposicion', '18', 'Insertar', 'autor', 'N/A', 'asd', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Crear Exposición', 'Nuevo'),
(550, '2021-11-09 18:48:12', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id', 'N/A', '24', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(551, '2021-11-09 18:48:12', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_exposicion', 'N/A', '18', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(552, '2021-11-09 18:48:12', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_archivo', 'N/A', '79', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(553, '2021-11-09 18:48:12', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'nota', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(554, '2021-11-09 18:48:12', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'portada', 'N/A', '1', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(555, '2021-11-09 18:48:12', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(556, '2021-11-09 18:48:12', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'publico', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(557, '2021-11-09 18:48:12', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'tipo_fecha', '1', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(558, '2021-11-09 18:48:12', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'fecha_fin', '2000-04-22', 'N/A', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(559, '2021-11-09 18:48:32', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id', 'N/A', '25', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(560, '2021-11-09 18:48:32', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_exposicion', 'N/A', '18', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(561, '2021-11-09 18:48:32', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_archivo', 'N/A', '79', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(562, '2021-11-09 18:48:32', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'nota', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(563, '2021-11-09 18:48:32', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'portada', 'N/A', '1', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(564, '2021-11-09 18:48:32', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(565, '2021-11-09 18:48:33', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'publico', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(566, '2021-11-09 18:48:33', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'tipo_fecha', 'N/A', '4', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(567, '2021-11-09 18:48:33', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'fecha', '1999-01-12', '1999-01-01', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(568, '2021-11-09 18:48:33', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'fecha_fin', 'N/A', '1999-05-01', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(569, '2021-11-09 18:54:55', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id', 'N/A', '26', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(570, '2021-11-09 18:54:55', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_exposicion', 'N/A', '18', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(571, '2021-11-09 18:54:55', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_archivo', 'N/A', '79', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(572, '2021-11-09 18:54:55', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'nota', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(573, '2021-11-09 18:54:55', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'portada', 'N/A', '1', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(574, '2021-11-09 18:54:55', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(575, '2021-11-09 18:54:56', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'publico', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(576, '2021-11-09 18:55:08', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id', 'N/A', '27', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(577, '2021-11-09 18:55:08', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_exposicion', 'N/A', '18', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(578, '2021-11-09 18:55:08', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_archivo', 'N/A', '79', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(579, '2021-11-09 18:55:08', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'nota', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(580, '2021-11-09 18:55:08', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'portada', 'N/A', '1', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(581, '2021-11-09 18:55:08', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(582, '2021-11-09 18:55:08', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'publico', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(583, '2021-11-09 18:55:09', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'tipo_fecha', '4', '2', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(584, '2021-11-09 18:55:09', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'fecha_fin', '1999-05-01', 'N/A', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(585, '2021-11-09 19:04:57', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id', 'N/A', '28', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(586, '2021-11-09 19:04:57', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_exposicion', 'N/A', '18', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(587, '2021-11-09 19:04:57', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_archivo', 'N/A', '79', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(588, '2021-11-09 19:04:57', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'nota', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(589, '2021-11-09 19:04:57', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'portada', 'N/A', '1', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(590, '2021-11-09 19:04:57', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(591, '2021-11-09 19:04:57', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'publico', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(592, '2021-11-09 19:04:57', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'tipo_fecha', '2', '3', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(593, '2021-11-09 19:07:32', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id', 'N/A', '29', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(594, '2021-11-09 19:07:32', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_exposicion', 'N/A', '18', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(595, '2021-11-09 19:07:32', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_archivo', 'N/A', '79', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(596, '2021-11-09 19:07:32', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'nota', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(597, '2021-11-09 19:07:32', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'portada', 'N/A', '1', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(598, '2021-11-09 19:07:32', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(599, '2021-11-09 19:07:32', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'publico', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(600, '2021-11-09 19:07:33', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'tipo_fecha', '3', '2', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(601, '2021-11-09 19:07:57', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id', 'N/A', '30', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(602, '2021-11-09 19:07:57', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_exposicion', 'N/A', '18', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(603, '2021-11-09 19:07:57', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_archivo', 'N/A', '79', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(604, '2021-11-09 19:07:57', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'nota', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(605, '2021-11-09 19:07:57', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'portada', 'N/A', '1', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(606, '2021-11-09 19:07:57', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(607, '2021-11-09 19:07:57', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'publico', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(608, '2021-11-09 19:07:57', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'tipo_fecha', '2', '1', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(609, '2021-11-09 19:07:57', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'fecha_fin', 'N/A', '2000-01-3', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(610, '2021-11-09 19:11:09', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id', 'N/A', '31', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(611, '2021-11-09 19:11:09', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_exposicion', 'N/A', '18', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(612, '2021-11-09 19:11:09', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_archivo', 'N/A', '79', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(613, '2021-11-09 19:11:09', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'nota', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(614, '2021-11-09 19:11:09', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'portada', 'N/A', '1', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(615, '2021-11-09 19:11:09', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(616, '2021-11-09 19:11:09', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'publico', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(617, '2021-11-09 19:11:09', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'tipo_fecha', '1', '4', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(618, '2021-11-09 19:11:09', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'fecha_fin', '2000-01-03', '2000-01-01', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(619, '2021-11-09 19:11:44', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id', 'N/A', '32', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(620, '2021-11-09 19:11:44', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_exposicion', 'N/A', '18', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(621, '2021-11-09 19:11:44', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'id_archivo', 'N/A', '79', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(622, '2021-11-09 19:11:44', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'nota', 'N/A', 'N/A', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(623, '2021-11-09 19:11:44', 'backend\\models\\Exposicion\\ExposicionArchivo', '18', 'Modificar', 'portada', 'N/A', '1', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición - Archivo Asociado', 'Nuevo'),
(624, '2021-11-09 19:11:44', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'revisado', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(625, '2021-11-09 19:11:44', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'publico', 'N/A', '0', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(626, '2021-11-09 19:11:44', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'tipo_fecha', '4', '2', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo'),
(627, '2021-11-09 19:11:44', 'backend\\models\\Exposicion\\Exposicion', '18', 'Modificar', 'fecha_fin', '2000-01-01', 'N/A', '5', '::1', 'Leonardo', 'Proyectos Alternativos / Exposiciones / Modificar Exposición', 'Nuevo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `testimonio`
--

CREATE TABLE `testimonio` (
  `id_testimonio` bigint(20) UNSIGNED NOT NULL,
  `titulo` text COLLATE utf8_bin NOT NULL,
  `autor` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `fecha` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `tipo_fecha` smallint(6) DEFAULT NULL,
  `descripcion` text COLLATE utf8_bin NOT NULL,
  `cuerpo` text COLLATE utf8_bin NOT NULL,
  `revisado` tinyint(1) NOT NULL,
  `publico` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `testimonio`
--

INSERT INTO `testimonio` (`id_testimonio`, `titulo`, `autor`, `fecha`, `fecha_fin`, `tipo_fecha`, `descripcion`, `cuerpo`, `revisado`, `publico`) VALUES
(11, 'El Che un amigo hasta las últimas consecuencias ', 'Oscar Fernández Mel', '2021-02-27', NULL, NULL, 'Testimonio tomado del archivo documental del Centro de Estudios Che Guevara ', 'En la semana en que celebramos el #DíaInternacionalDeLosMuseos compartimos esta entrevista realizada por Alejandro Pico de @Radio La Minga a quien fue fundador del primer Museo dedicado al Che en Argentina y Suramérica, Eladio González. \r\nTras una visita a Cuba en 1992 en la que quedaron enamorados de la isla y su gente, él y su inseparable esposa Irene Perpiñal se empeñaron en ayudar del modo en que fuera posible a la lucha del pueblo cubano contra el bloqueo impuesto por el gobierno de Estados Unidos. \r\n(Estrellitas)\r\nEntre los acontecimientos ocurridos durante su estancia en Cuba, y que los marcaría para siempre, estuvieron los sucesos de Tarará: un grupo de seis criminales que trataban de salir ilegalmente del país había acribillados a tres oficiales de guardafronteras y herido de gravedad a un joven policía que acudió en auxilio de sus compañeros. Eladio donó su sangre a Rolando Pérez Quintosa, el joven sobreviviente, y entregó al padre de este una carta para cuando se recuperara. Lamentablemente unos días después Rolando murió, sin embargo la carta de Eladio fue publicada en la prensa cubana y las respuestas no  tardaron en llegar desde todas partes del país. En total Eladio e Irene recibieron 5000 cartas. \r\nConmovidos por lo que habían vivido se empeñaron en reunir toda la ayuda posible y fue así como enviaron a Cuba los primeros kilogramos de donaciones que, tras ser incluida su experiencia en el libro “Cuba existe es socialista y no está en coma” del arquitecto argentino Rodolfo Livingston, se incrementó a 3 toneladas por mes. A este proyecto le dieron el nombre de Chaubloqueo. \r\n(Estrellitas)\r\nEn 1996 fundaron en su casa de Caballito, Buenos Aires, el primer @Museo Che Guevara de Suramérica que, a manera de pintoresco y sui generis bazar, se dedica a divulgar la vida y la obra del rosarino heroico, y a difundir la tragedia que es el bloqueo impuesto a Cuba. En este pequeño espacio atesoran una amplia colección de fotografías, esculturas, artesanías, objetos personales, pósters, banderas… donadas por visitantes de todas partes del mundo, que muestran el modo en que el Che y su ejemplo se han integrado al imaginario colectivo y cotidiano de muchos. \r\nLos invitamos a escuchar esta apasionada entrevista con la que se comprende que  conservar la memoria es la mejor forma de mantenerla viva. (Manito y link)', 1, 1);

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
(4, 'Largometraje');

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
(3, 'Pintura'),
(7, 'Fotografía');

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
(11, 'Lisette Valdés Veitía ', 'Investigadora', 'liset@cubarte.cult.cu', 'Coordinación de Proyectos Alternativos');

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
(63, 'uno 1', 'uno ', 'comentario', 'NSHxDId2vh1P2HRSUgy5uUX3fgEPjJY0', '$2y$13$86Lu/OrA0aX8ZbknjCBzP.aEKXkzpMa6n8L9eGCHMuIgQuK.plAOa', NULL, 'uno@dos.tres', 9, 0, 0, 'NPmVC-viQCjUisljBBNMr0087FhsATKD_1633270278', 'gestor-de-contenidos');

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
  MODIFY `id_archivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `articulo_archivo`
--
ALTER TABLE `articulo_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `correspondencia`
--
ALTER TABLE `correspondencia`
  MODIFY `id_correspondencia` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `correspondencia_archivo`
--
ALTER TABLE `correspondencia_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `etiqueta_archivo`
--
ALTER TABLE `etiqueta_archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `etiqueta_coleccion_documental`
--
ALTER TABLE `etiqueta_coleccion_documental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `exposicion`
--
ALTER TABLE `exposicion`
  MODIFY `id_exposicion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `exposicion_archivo`
--
ALTER TABLE `exposicion_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `galeria_vo`
--
ALTER TABLE `galeria_vo`
  MODIFY `id_galeria_vo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `galeria_vo_archivo`
--
ALTER TABLE `galeria_vo_archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `gestion_documental`
--
ALTER TABLE `gestion_documental`
  MODIFY `id_gestion_documental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `gestion_documental_archivo`
--
ALTER TABLE `gestion_documental_archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `hecho`
--
ALTER TABLE `hecho`
  MODIFY `id_hecho` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `hecho_archivo`
--
ALTER TABLE `hecho_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id_noticia` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `noticia_archivo`
--
ALTER TABLE `noticia_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `producto_audiovisual`
--
ALTER TABLE `producto_audiovisual`
  MODIFY `id_producto_audiovisual` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto_audiovisual_archivo`
--
ALTER TABLE `producto_audiovisual_archivo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `quienes`
--
ALTER TABLE `quienes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `quienes_archivo`
--
ALTER TABLE `quienes_archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tbl_audit_entry`
--
ALTER TABLE `tbl_audit_entry`
  MODIFY `audit_entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=628;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipo_taller`
--
ALTER TABLE `tipo_taller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
