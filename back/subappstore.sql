-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2015 a las 08:35:12
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `subappstore`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ayuda`
--

CREATE TABLE IF NOT EXISTS `ayuda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `movil` text COLLATE utf8_spanish2_ci NOT NULL,
  `web` text COLLATE utf8_spanish2_ci NOT NULL,
  `observaciones` text COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `ayuda`
--

INSERT INTO `ayuda` (`id`, `imagen`, `movil`, `web`, `observaciones`) VALUES
(1, 'imagen.png', 'MENSAJERÍA : Propia de Google , el cual permite que el dispositivo móvil este preparado para recibir distintos mesajes enviados desde la web.Este sistema entra en funcionamiento cuando el usuario presiona el botón de registrar usuario enviándose una solicitud de código único para la recepción de mensajes a los servidores de Google , este código será almacenado en la BD para poder gestionarlo posteriormente.<br/><br/> REGISTRO DE USUARIOS: Durante el registro de un usuario es necesario que se seleccione una imagen para poder ser usada como perfil del usuario al igual que una contraseña de mas de 8 caracteres , y distintos datos secundarios para poder mantener en contacto con el nuevo usuario.<br/><br/> LOGIN: La pantalla de login cuenta con los típicos campos de "usuario y contraseña" , al presionar click en botón de autenticación se enviará la clave al servidor para encriptarla , luego se comparará con el de la base de datos con ayuda de un sistema totalmente completo propio del framework Laravel .La autenticación correcta dará como resultado el acceso al sistema.<br/><br/>PRIMERA PANTALLA : la primera pantalla que se visualizará al autenticarse será la de un listado de productos que siguen en subasta y en orden descendente (Los últimos registrados son los primero en visualizar), cada item se visualizará con su imagen , precio base y nombre descriptivo del producto.MIS SUBASTAS:Esta pantalla tendrá que mostrar todas los productos que el usuario ha registrado desde que se registró.<br/><br/>MIS SUBASTAS GANADAS: Esta pantalla mostrará una lista de todas las subastas que ha ganado el usuario y que al presionar sobre una de ellas se mostrarán mas detalles de la subasta ganada.<br/><br/> ACERCA DE:Pantalla informativa de el funcionamiento y algunos objetivos de la organización<br/><br/>REGISTRAR PRODUCTOS:Se presenta un formulario con unos 5 campos en los que se encuentran el nombre,precio,descripciony algunas imagenes por seleccionar para poder dar en subasta un producto,se aceptan un máximo de 5 imágenes .<br/><br/>SUBASTA:Durante la subasta de un producto aparecerá un minutero que controlará el tiempo restante para seguir ofertando , este sera administrado desde el entorno web.Se podrá visualizar un listado de "conectados" y habrá una caja de texto en la que se ingrsará las nuevas subastas . La subasta termina cuando elminutero llegue a 0 y el dueño de  la mejor oferta será considerado el ganador del produco.', 'PANTALLA DE INICIO: La pantalla de inicio es una página informativa en la que observará las distintas categorias de productos de SubAppStore , Los enlaces para descargar el .apk<br/><br/>ACCESO AL SISTEMA:aumentando "/public" a la url en la que se visualiza la pantalla de inicio de mostrará un formulario de LOGIN para tener acceso al control del sistema ,en el cuál se validará a los usuarios administradores solamente.<br/><br/>PANTALLA PRINCIPAL:La primera pantalla que se visualiza al autenticarse un administrador es la del control del minutero , una lista de administradores registrados , las categorias de los productos , salas registradas(1 por cada producto registrado),control informativo de los objetivos de la aplicación y un ranking de los usuarios con mas monedas compradas.<br/><br/>REPORTES : Podemos contar con 4 principales reportes , uno en el que se visualiza los rangos en los que se encuentran los distintos productos , otro en el que se visualiza la cantidad de usuarios conectados a las subastas,el siguiente es el los usuarios con mayor cantidad de productos registrados,y el último de comparación de registros de productos de el día anterior y el día actual.<br/><br/>USUARIO Y PRODUCTOS : ambas pestañas mostrarán interfaces parecidas pero de distintas tablas una de usuarios y la otra de productos respectivamente en las que se podrá dar manetnimientos a sus registros desde los botones que se visualizan en la última columna de las tablas mostradas.<br/><br/>MENSAJES: esta es la ventana de administración de mensajería , en la que se enviará de manera personalizada o generalizada los mensajes a los usuarios registrados.(Eventos,Ofertas,etc)<br/><br/>AYUDA:Esta pestaña informará el funcionamiento del sistema web y móvil de la aplicación.', 'Esta página web esta desarrollada con el elnguaje de programación PHP en su versión 5.5 y con soporte para 5.4 , 5.3 y 5.2\nSe ha usado Jquery 2.0.1 , CSS3 y HTML 5 . Se utilizaron tecnologías como AJAX , JSON .\nUsando el framework Laravel 4.2 y Slim 2.4.2 para la gestión web . Muy aparte del lado de la aplicación móvil se ha desarrollado en el IDE Eclipse y el lenguaje de programación JAVA en su modalidad de Android.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Electrodomesticos', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Tecnologia', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Vestimenta', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Deportes', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Muebles', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Videojuegos y Consolas', '', '2015-05-02 17:10:06', '2015-05-02 21:14:42'),
(7, 'Otros', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conectados`
--

CREATE TABLE IF NOT EXISTS `conectados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `grupo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=196 ;

--
-- Volcado de datos para la tabla `conectados`
--

INSERT INTO `conectados` (`id`, `idusuario`, `estado`, `grupo`) VALUES
(165, 60, 1, '50CargadorGenericoUsb'),
(164, 60, 1, '50CargadorGenericoUsb');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripciones`
--

CREATE TABLE IF NOT EXISTS `descripciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mision` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vision` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `observaciones` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `funcionamiento` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_At` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `descripciones`
--

INSERT INTO `descripciones` (`id`, `mision`, `vision`, `observaciones`, `descripcion`, `funcionamiento`, `updated_at`, `created_At`) VALUES
(1, '* Lograr ser la mejor compañía comercializa-dora web de los tiempos en Perú , descentralizados lo mas pronto y expandir el comercio electrónico a todo el Perú.', '* Somos una compañía promovedora del comercio electrónico en Perú . Ofrecemos nuestros productos y compartir el de nuestros usuarios a través de una plataforma móvil ; aunque ofrecemos un sitio de subastas electrónicas , Subappstore también puede ser usada para comercializar sus productos tal y como si lo estuviese haciendo personalmente.', '* Puedes ganar dinero compartiendo nuestros enlaces.', 'Esta información es sobre la descripción de subappstore (¿quiénes somos?).\r\nxxxxxxxxxxxx', 'Subappstore es sumamente fácil de usar , con una sencilla forma de publicar tus productos y asignándole una semana para que la subasta o venta concluya , sin publicidad y menos aun sin privilegios de usuarios , etc.', '2015-05-10 01:33:20', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=75 ;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `grupo`, `imagen`, `estado`, `updated_at`, `created_at`) VALUES
(51, '46kkkk', 'kkkk.png', 1, NULL, NULL),
(58, '12LaptosHP', '12LaptosHP.png', 1, '2015-05-11 10:48:19', '2015-05-11 10:48:19'),
(48, '46jjjj', 'jjjj1.png', 1, NULL, NULL),
(47, '46jjjj', 'jjjj.png', 1, NULL, NULL),
(46, '46perrito', 'perrito.png', 1, NULL, NULL),
(45, '46gatito', 'gatito.png', 1, NULL, NULL),
(43, '45lentesdesol', 'lentesdesol.png', 1, NULL, NULL),
(42, '42chwnet', 'chwnet.png', 1, NULL, NULL),
(41, '42probando', 'probando.png', 1, NULL, NULL),
(40, '42panfrances', 'panfrances1.png', 1, NULL, NULL),
(39, '42panfrances', 'panfrances.png', 1, NULL, NULL),
(38, '1LaptopHP', '1LaptopHP1.png', 1, '2015-04-26 02:27:36', '2015-04-26 02:27:36'),
(31, '1gatita', '1gatita.png', 1, '2015-04-18 17:53:27', '2015-04-18 17:53:27'),
(32, '1gatita', '1gatita1.png', 1, '2015-04-18 17:53:27', '2015-04-18 17:53:27'),
(33, '20Gatooscuro', '20Gatooscuro.png', 1, '2015-04-18 18:18:26', '2015-04-18 18:18:26'),
(36, '20Gatooscuro', '20Gatooscuro3.png', 1, '2015-04-18 18:18:26', '2015-04-18 18:18:26'),
(35, '20Gatooscuro', '20Gatooscuro2.png', 1, '2015-04-18 18:18:26', '2015-04-18 18:18:26'),
(34, '20Gatooscuro', '20Gatooscuro1.png', 1, '2015-04-18 18:18:26', '2015-04-18 18:18:26'),
(37, '1LaptopHP', '1LaptopHP.png', 1, '2015-04-26 02:27:36', '2015-04-26 02:27:36'),
(52, '46kkkk', 'kkkk1.png', 1, NULL, NULL),
(53, '46cualquiercosa', '46cualquiercosa.png', 1, NULL, NULL),
(54, '46cualquiercosa', '46cualquiercosa1.png', 1, NULL, NULL),
(55, '46tuntun', '46tuntun.png', 1, NULL, NULL),
(56, '46tuntun', '46tuntun1.png', 1, NULL, NULL),
(57, '46yogurtgloria', '46yogurtgloria.png', 1, NULL, NULL),
(59, '20producto1', '20producto1.png', 1, '2015-05-18 18:56:02', '2015-05-18 18:56:02'),
(60, '50laptopdell', '50laptopdell.png', 1, '2015-05-19 02:56:18', '2015-05-19 02:56:18'),
(61, '50samsungs5mini', '50samsungs5mini.png', 1, NULL, NULL),
(62, '50SamsungS4miniLte', '50SamsungS4miniLte.png', 1, NULL, NULL),
(63, '50FIFA13-PS3', '50FIFA13-PS3.png', 1, NULL, NULL),
(64, '50GODOFWAR-OriginisCollection', '50GODOFWAR-OriginisCollection.png', 1, NULL, NULL),
(65, '50CargadorGenericoUsb', '50CargadorGenericoUsb.png', 1, NULL, NULL),
(68, '48packdelicor', '48packdelicor.png', 1, NULL, NULL),
(69, '48piscobotija', '48piscobotija.png', 1, NULL, NULL),
(70, '48sierraelectrica', '48sierraelectrica.png', 1, NULL, NULL),
(71, '61ositopanda', '61ositopanda.png', 1, NULL, NULL),
(72, '61televisorphillips', '61televisorphillips.png', 1, NULL, NULL),
(73, '61celularlg3', '61celularlg3.png', 1, NULL, NULL),
(74, '50mayonesa', '50mayonesa.png', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2015_02_09_012706_create_users_table', 2),
('2015_02_24_202130_create_productos_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `precio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `imagen` varchar(200) COLLATE utf8_unicode_ci DEFAULT 'noencontrado',
  `idcategoria` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `productos_nombre_unique` (`nombre`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=87 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `idusuario`, `nombre`, `descripcion`, `cantidad`, `precio`, `created_at`, `updated_at`, `imagen`, `idcategoria`) VALUES
(62, 46, 'gatito', 'kuas kuas', '1', '963.0', '2015-05-05 02:38:41', '2015-05-05 02:38:41', '46gatito', 4),
(63, 46, 'perrito', 'juas', '1', '36.0', '2015-05-05 02:42:58', '2015-05-05 02:42:58', '46perrito', 4),
(56, 1, 'Laptop HP', 'nueva', '1', '200', '2015-04-26 02:27:36', '2015-04-26 02:27:36', '1LaptopHP', 2),
(55, 20, 'Gato oscuro', 'Gato oscuro', '1', '220', '2015-04-26 18:18:26', '2015-04-24 18:18:26', '20Gatooscuro', 7),
(54, 1, 'gatita', 'gatita nueva', '1', '1000', '2015-04-26 01:53:27', '2015-05-11 10:46:48', '1gatita', 7),
(57, 42, 'pan frances', 'caliente', '1', '300', '2015-04-26 23:13:51', '2015-04-26 23:13:51', '42panfrances', 7),
(58, 42, 'probando', 'celular', '1', '2600', '2015-04-25 23:40:29', '2015-05-01 16:05:40', '42probando', 1),
(59, 42, 'chwnet', 'hhsdhuddud', '1', '3000', '2015-04-27 04:17:57', '2015-05-01 16:49:40', '42chwnet', 6),
(60, 45, 'lentes de sol', 'lentes de sol ray ban', '1', '50.0', '2015-05-02 05:17:01', '2015-05-02 05:17:01', '45lentesdesol', 5),
(67, 46, 'cualquiercosa', 'juad juad', '1', '963.0', '2015-05-05 06:20:29', '2015-05-05 06:20:29', '46cualquiercosa', 2),
(66, 46, 'kkkk', 'jjjjj', '1', '96.0', '2015-05-05 03:57:48', '2015-05-05 03:57:48', '46kkkk', 3),
(64, 46, 'jjjj', 'xgyhh', '1', '96.0', '2015-05-05 03:42:24', '2015-05-05 03:42:24', '46jjjj', 3),
(68, 46, 'tun tun', 'jias juas', '1', '963.0', '2015-05-05 06:24:57', '2015-05-05 06:24:57', '46tuntun', 1),
(69, 46, 'yogurt gloria', 'Es de un litro , y esta nuevo', '1', '20.0', '2015-05-07 10:53:21', '2015-05-07 10:53:21', '46yogurtgloria', 4),
(70, 1, '2 Laptos HP', 'Ambas nuevas , precio oferta por las 2', '2', '500', '2015-05-11 10:48:19', '2015-05-11 10:48:19', '12LaptosHP', 2),
(71, 20, 'producto1', 'nuevo producto', '1', '200.0', '2015-05-18 18:56:02', '2015-05-18 18:56:02', '20producto1', 8),
(72, 50, 'laptop dell', 'core i5, 4gb de ram, windows 8.1, procesador 1.8Ghz', '1', '1200.0', '2015-05-19 02:56:18', '2015-05-19 02:56:18', '50laptopdell', 2),
(73, 50, 'samsung s5 mini', 'estado 9/10', '1', '1200.0', '2015-05-23 02:45:40', '2015-05-23 02:45:40', '50samsungs5mini', 2),
(74, 50, 'Samsung S4 mini Lte', 'black edition\n1.5gb Ram\n8Gb memoria interna\nCamara frontal 1.5mp pa Selfie\nCamara trasera 8mp', '1', '650.0', '2015-05-27 18:41:36', '2015-05-27 18:41:36', '50SamsungS4miniLte', 2),
(75, 50, 'FIFA 13 - PS3', 'Usado pero es original', '1', '40.0', '2015-05-27 18:55:58', '2015-05-27 18:55:58', '50FIFA13-PS3', 6),
(76, 50, 'GOD OF WAR - Originis Collection', 'Usado pero original.\nContiene:\n-Chains of Olympus\n-Ghost of Sparta', '1', '40.0', '2015-05-27 18:57:46', '2015-05-27 18:57:46', '50GODOFWAR-OriginisCollection', 6),
(77, 50, 'Cargador Generico Usb', 'Estado: Nuevo\nCompatible con cualquier smarthphone con entrada micro usb', '1', '10.0', '2015-05-27 19:00:50', '2015-05-27 19:00:50', '50CargadorGenericoUsb', 2),
(80, 48, 'pack de licor', '1 vodka,3 rones , 16 cervezas alemanas y un pisco quebranta', '1', '200', '2015-05-28 07:55:27', '2015-05-28 07:55:27', '48packdelicor', 7),
(81, 48, 'pisco botija', 'tabernero', '1', '30.0', '2015-05-29 19:40:00', '2015-05-29 19:40:00', '48piscobotija', 7),
(82, 48, 'sierra electrica', 'usada 6 meses', '1', '180.0', '2015-05-30 05:36:33', '2015-05-30 05:36:33', '48sierraelectrica', 5),
(83, 61, 'osito panda', 'nuevo', '1', '15.0', '2015-05-30 05:50:40', '2015-05-30 05:50:40', '61ositopanda', 7),
(84, 61, 'televisor phillips', 'usado 7 meses', '1', '500.0', '2015-05-30 05:54:09', '2015-05-30 05:54:09', '61televisorphillips', 1),
(85, 61, 'celular lg 3', 'usado  3 meses', '1', '1500', '2015-05-30 18:55:35', '2015-05-30 18:55:35', '61celularlg3', 2),
(86, 50, 'mayonesa', '', '1', '10.0', '2015-06-02 02:32:24', '2015-06-02 02:32:24', '50mayonesa', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE IF NOT EXISTS `salas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idproducto` int(11) NOT NULL,
  `trestante` int(11) NOT NULL DEFAULT '604800',
  `iduserganador` int(11) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `grupo` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=53 ;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id`, `idproducto`, `trestante`, `iduserganador`, `precio`, `grupo`, `updated_at`, `created_at`, `estado`) VALUES
(36, 70, 0, 20, 700, '12LaptosHP', '2015-05-11 10:48:20', '2015-05-11 10:48:20', 1),
(28, 62, 0, 46, 963, '46gatito', NULL, NULL, 0),
(29, 63, 0, 46, 36, '46perrito', NULL, NULL, 0),
(30, 64, 0, 46, 96, '46jjjj', '2015-05-05 03:42:24', '2015-05-05 03:42:24', 0),
(26, 60, 0, 45, 50, '45lentesdesol', NULL, NULL, 1),
(21, 55, 0, 42, 290, '20Gatooscuro', '2015-04-18 18:18:26', '2015-04-18 18:18:26', 0),
(22, 56, 0, 50, 3500, '1LaptopHP', '2015-04-26 02:27:36', '2015-04-26 02:27:36', 0),
(23, 57, 0, 42, 10, '42panfrances', '2015-04-26 09:00:00', '2015-04-26 09:00:00', 0),
(24, 58, 0, 42, 50, '42probando', '2015-04-26 09:00:00', '2015-04-26 09:00:00', 0),
(25, 59, 0, 42, 30, '42chwnet', '2015-04-26 09:00:00', '2015-04-26 09:00:00', 0),
(20, 54, 0, 1, 120, '1gatita', '2015-04-18 17:53:27', '2015-04-18 17:53:27', 0),
(32, 66, 0, 50, 100, '46kkkk', '2015-05-05 03:57:48', '2015-05-05 03:57:48', 0),
(33, 67, 0, 46, 963, '46cualquiercosa', '2015-05-05 06:20:29', '2015-05-05 06:20:29', 0),
(34, 68, 0, 46, 963, '46tuntun', '2015-05-05 06:24:57', '2015-05-05 06:24:57', 0),
(35, 69, 0, 46, 20, '46yogurtgloria', '2015-05-07 10:53:21', '2015-05-07 10:53:21', 0),
(37, 71, 0, 20, 200, '20producto1', '2015-05-18 18:56:02', '2015-05-18 18:56:02', 0),
(38, 72, 0, 20, 1700, '50laptopdell', '2015-05-19 02:56:18', '2015-05-19 02:56:18', 0),
(39, 73, 0, 50, 1200, '50samsungs5mini', '2015-05-23 02:45:40', NULL, 0),
(40, 74, 0, 50, 650, '50SamsungS4miniLte', '2015-05-27 18:41:36', NULL, 0),
(41, 75, 0, 50, 40, '50FIFA13-PS3', '2015-05-27 18:55:58', NULL, 0),
(42, 76, 0, 50, 40, '50GODOFWAR-OriginisCollection', '2015-05-27 18:57:46', NULL, 0),
(43, 77, 0, 60, 36, '50CargadorGenericoUsb', '2015-05-27 19:00:50', NULL, 0),
(47, 81, 0, 48, 30, '48piscobotija', '2015-05-29 19:40:00', NULL, 0),
(46, 80, 0, 60, 200, '48packdelicor', '2015-05-28 07:55:27', NULL, 1),
(48, 82, 0, 48, 180, '48sierraelectrica', '2015-05-30 05:36:33', NULL, 0),
(49, 83, 0, 61, 15, '61ositopanda', '2015-05-30 05:50:40', NULL, 0),
(50, 84, 0, 61, 500, '61televisorphillips', '2015-05-30 05:54:09', NULL, 0),
(51, 85, 0, 45, 1500, '61celularlg3', '2015-05-30 18:55:35', NULL, 1),
(52, 86, 604800, 50, 10, '50mayonesa', '2015-06-02 02:32:24', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saldo`
--

CREATE TABLE IF NOT EXISTS `saldo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idusuario` int(11) NOT NULL,
  `oro` int(11) NOT NULL DEFAULT '0',
  `plata` int(11) DEFAULT '0',
  `bronce` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=53 ;

--
-- Volcado de datos para la tabla `saldo`
--

INSERT INTO `saldo` (`id`, `idusuario`, `oro`, `plata`, `bronce`) VALUES
(38, 45, 5000, 0, 0),
(37, 44, 5000, 0, 0),
(36, 43, 5000, 0, 0),
(35, 42, 5000, 0, 0),
(34, 1, 5000, 0, 0),
(33, 38, 5000, 0, 0),
(32, 20, 5060, 75, 0),
(31, 1, 5000, 0, 0),
(39, 46, 5000, 0, 0),
(40, 47, 5000, 0, 0),
(41, 48, 5000, 0, 0),
(42, 49, 5000, 0, 0),
(43, 50, 5000, 0, 0),
(44, 51, 5000, 0, 0),
(45, 52, 5000, 0, 0),
(46, 53, 5000, 0, 0),
(47, 56, 5000, 0, 0),
(48, 57, 0, 0, 0),
(49, 58, 0, 0, 0),
(50, 59, 0, 0, 0),
(51, 60, 0, 0, 0),
(52, 61, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE IF NOT EXISTS `tarjetas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `saldo` decimal(8,2) NOT NULL,
  `numero` bigint(16) NOT NULL,
  `clave` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`id`, `saldo`, `numero`, `clave`) VALUES
(1, '2165.75', 1111111111111111, 184),
(2, '14000.00', 3333333333333333, 139),
(3, '10000.00', 2222222222222222, 144),
(4, '20000.00', 4444444444444444, 345);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(600) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`),
  UNIQUE KEY `usuarios_usuario_unique` (`usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=62 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `codigo`, `nombres`, `apellidos`, `email`, `direccion`, `telefono`, `usuario`, `level`, `password`, `created_at`, `updated_at`) VALUES
(1, 'APA91bHkHzmRohdalDn_eYEpQtFwNlz1fSTxcXYiBf_p8CrzP7-nd4SwpKxkfVyUDx0cuo1zy-5kO9LqcZl4Edcv3qpFmjNOMo5AWAM1pxHUeWke54XIC5Lo2-37uf-o1jBKPh8d6E4rO6-1P3wc3XVSkE_sZ1ZRMg', 'Alberto', 'Castillo', 'acatillor@hotmail.com', 'Jr. Cascos 105 , Cocodrilos', 567543, 'albertoc', 1, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(38, NULL, 'pedro', 'conez alvarado', 'pedrito@hotmail.com', 'jr. la mar 187', 12345678, 'pedrito', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-04-18 16:02:28', '2015-04-18 16:02:28'),
(42, NULL, 'Pablo', 'Díaz P.', 'pablo@hotmail.com', 'Jr. Las casas', 234567, 'pablitoc', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-04-26 02:42:13', '2015-04-26 02:42:13'),
(20, '', 'cesar', 'pio espejo', 'cesar@hotmail.com', 'direccion2', 12777777, 'cesar123', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-03-15 11:46:16', '2015-04-18 08:33:48'),
(43, 'APA91bHRehVFmEPgi5qUKfs3A9u4Yq-yyhKFwb6kVfi4KQmy-xSJxlBUCLtPQAM9jp_-ArGd7HIaDL27jDdj7vZkW1TFw2oeg7MRvbYvwp_9cz4Gd3OguBaLxy7HLyXAIcaZbSpu4SHSKHTSPOHf5oGbrtBdVLZ2sQ', 'juan', 'valverde', 'juan@hotmail.com', 'jjjjjj', 9999999, 'juan', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-04-26 04:31:13', '0000-00-00 00:00:00'),
(44, 'APA91bHRehVFmEPgi5qUKfs3A9u4Yq-yyhKFwb6kVfi4KQmy-xSJxlBUCLtPQAM9jp_-ArGd7HIaDL27jDdj7vZkW1TFw2oeg7MRvbYvwp_9cz4Gd3OguBaLxy7HLyXAIcaZbSpu4SHSKHTSPOHf5oGbrtBdVLZ2sQ', 'frankk', 'allcca', 'hual@bbb.com', 'fgyhygg', 99999, 'rodolfo', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-04-26 04:39:26', '0000-00-00 00:00:00'),
(45, 'APA91bGCOTRFrJjodIgRd9_KTfcoMj29HyQ1I2mwUPhy7nek085M3mFN0b4q8cHMhD5NvhV4X-ksUUmnXOyHjGSG6ZUHmK2BL2iNOvrlqaqX4Pfc9ZHt3w7HpwNyBcvUSrksYfAaEfl78n7_GTYZ99HPl0Ya-_rFtQ', 'rodolfo', 'huallparimachi', 'adrians_10@hotmail.com', 'san juan', 991917936, 'rodolfo1', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-05-02 05:05:26', '0000-00-00 00:00:00'),
(46, 'APA91bFJh2VNNEwgNx5HmnpsfDPUc25Fbu8LU0iN-eZRyUsVqWa3oiMFNI2arbALXLPIbRq-RkTb1tiGmv8PLJ47vGNv5JQvPfisMX2HTtqNH_E8VTHSCoyHt7hgZz_vGR3m_jmlcacIJ3RgCMkAwzt2fGc_V7N5Dg', 'axel', 'vega allcca', 'axe_veg@hotmail.com', 'jr la costas 123', 963963655, 'axelvega', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-05-04 05:39:59', '2015-05-04 09:56:55'),
(47, NULL, 'Coraje', 'Domingo Salcedo', 'corajillo@outlook.com', 'Jr. Los Angeles', 555555, 'coraje', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-05-11 15:53:37', '2015-05-11 15:53:37'),
(48, 'APA91bGXeRa6qZrMNvSV0CTzpmRAogBRsw59p6bRKD-gOPlKe0O8NIJ5sKnXnEFf1DL4JGKdd2S0nqasRhGqUzlb4Gua-kdEm6lsoLDXiv0qYCoOYCvgpixTExWMaGhxn_Fn83pZ6aZ0Zjlw-LEr7xyiINPey6XTgA', 'Paola Diana', 'Alfaro Allcca', 'foquita_11_@hotmail.com', 'jr las casa 12345', 999635287, 'paola', 0, '$2y$10$G6oOjj/cQqstdN6t7MU8T.zoE4R/PFU5c/NjVmOt/67matEMb6Ug6', '2015-05-13 11:32:53', '0000-00-00 00:00:00'),
(49, 'APA91bFV28UZVx9-NYR5zg59Ow1q-WCiRCsGgv_K4v9IjrOkW4MzTycEfbyC7cIIbjGwgnJ2XHPVW9VH3xX7GG5XLZKsVFqHixetI0inEVK6KfDu6IQqjWd35xSbBQ6sGB05q3Xqa_ANxIZp8HznZ9WSO8RSsR7vgg', 'jurado1', 'jurado', 'jurado1@hotmail.com', 'av arequipa', 996385241, 'jurado1', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-05-14 09:16:18', '0000-00-00 00:00:00'),
(50, 'APA91bHfrEVoL19MgYismKMBeBc5T7HwdPbXADS23AZ2t-uZ0X4fEISuZ1BTSkU8vUIAzzETiexvELgU2sW5EwiosOhNgtIYehn9WgKBB7ENk3oYZ5jjk3gMMQ2vri0CiQcser1JvVv0rzEkyWqYA9Ef0gIyglaTVA', 'Jose Luis', 'Rodriguez', 'jlrch@outlook.com', 'Santiago de Surco', 947851201, 'chino', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-05-15 07:43:47', '2015-05-26 06:12:53'),
(51, 'APA91bFV28UZVx9-NYR5zg59Ow1q-WCiRCsGgv_K4v9IjrOkW4MzTycEfbyC7cIIbjGwgnJ2XHPVW9VH3xX7GG5XLZKsVFqHixetI0inEVK6KfDu6IQqjWd35xSbBQ6sGB05q3Xqa_ANxIZp8HznZ9WSO8RSsR7vgg', 'alexandra', 'castillo', 'alex@hotmail.com', 'jr los ángeles', 999635489, 'alexandra', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-05-16 10:01:15', '0000-00-00 00:00:00'),
(52, 'APA91bFV28UZVx9-NYR5zg59Ow1q-WCiRCsGgv_K4v9IjrOkW4MzTycEfbyC7cIIbjGwgnJ2XHPVW9VH3xX7GG5XLZKsVFqHixetI0inEVK6KfDu6IQqjWd35xSbBQ6sGB05q3Xqa_ANxIZp8HznZ9WSO8RSsR7vgg', 'diego', 'salazar', 'diefo@hotmail.com', 'jr los dias', 999635289, 'diego123', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-05-16 10:06:19', '0000-00-00 00:00:00'),
(53, 'APA91bFV28UZVx9-NYR5zg59Ow1q-WCiRCsGgv_K4v9IjrOkW4MzTycEfbyC7cIIbjGwgnJ2XHPVW9VH3xX7GG5XLZKsVFqHixetI0inEVK6KfDu6IQqjWd35xSbBQ6sGB05q3Xqa_ANxIZp8HznZ9WSO8RSsR7vgg', 'golum', 'alvarez', 'golum@hotmail.com', 'jr las casas', 963852756, 'golum', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-05-16 10:15:39', '0000-00-00 00:00:00'),
(56, 'APA91bFV28UZVx9-NYR5zg59Ow1q-WCiRCsGgv_K4v9IjrOkW4MzTycEfbyC7cIIbjGwgnJ2XHPVW9VH3xX7GG5XLZKsVFqHixetI0inEVK6KfDu6IQqjWd35xSbBQ6sGB05q3Xqa_ANxIZp8HznZ9WSO8RSsR7vgg', 'alfredo', 'castro', 'alfre@hotmail.com', 'jr las pasas', 963852742, 'juandias', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-05-16 10:55:52', '0000-00-00 00:00:00'),
(57, 'APA91bF7k4MklmP4eb7hK4KMkL0S2r0Na-osQX9vtDIPUwlqGFQELSUOVIDXgUqVlp62rjy18I9BMLqBqeYPUM2g9YrmVqOcYNgDQeYdidy2MAY40C_VBIE0l3q6R1m1bamYYxXgfwmK1gd27-ukdqXw6_eZlIkrWw', 'hhgh', 'ghuu', 'huikk@hjnn', 'vhikk', 999965238, 'huihcg', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-05-22 01:41:23', '0000-00-00 00:00:00'),
(58, 'APA91bGjJtHcnrx3P7lB734sTduw1U5MH6AU6F16S-lQ8ndtejKmQVr1_ZQyyyosnaTxF2tTKRUjm8OoNoOReupqkfL7jQkv8Qaqmg5ls5aEIQyNaSs6ftm-N-fuPQull3ml3e7QXEpHJBx0v2j4YUa8wFrRGkJZ1Q', 'juan', 'castillo rodas', 'juanjuan@hotmail.com', 'jr los reyes 166', 996352846, 'juanchoo', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-05-25 04:40:18', '0000-00-00 00:00:00'),
(59, 'APA91bEH8W_bkTAIqSadoUEQU6QTycxfA8uz_sMNOteKC3CcMOGYQJve-gUZDBM4y0YtGgOrglO1_NfYeTl_Yv-qIvzMVdEAtKd9pytaTB73tIEqar2nqIczSGUaIbddlYef2Ex8dKJ81mPb0YH1XqomzxMs5snxXQ', 'axel', 'danos danito', 'axxel@hotmail.com', 'jr los ángeles', 963636528, 'axxel', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-05-25 04:56:18', '0000-00-00 00:00:00'),
(61, 'APA91bGXeRa6qZrMNvSV0CTzpmRAogBRsw59p6bRKD-gOPlKe0O8NIJ5sKnXnEFf1DL4JGKdd2S0nqasRhGqUzlb4Gua-kdEm6lsoLDXiv0qYCoOYCvgpixTExWMaGhxn_Fn83pZ6aZ0Zjlw-LEr7xyiINPey6XTgA', 'frank', 'yupanqui', 'foquita_12_@hotmail.com', 'jr trilce 184', 947545270, 'fyupanquia', 0, '$2y$10$O0AOaJiE/ny78Bdh1mdm..A.uXTPkOSIbx4fLsnfrBr1kLkumAGFS', '2015-05-30 05:45:32', '0000-00-00 00:00:00'),
(60, 'APA91bGYuZv1T2-ic0HWb-N7hErr-t_keCM3ahE6Glmf2IgJYRg4LQc85Oue247mwKXMcmYlGYFjn0bqLVnSTffZsQwm6zjxvqGL0YXpGfaSmeXEhTKKNwkCBt39vSK3QZdvrZtLZBffRyEaXgo1dTBO-fGBT6OBFA', 'josephh', 'leonardo herrera', 'fyupanquia@outlook.com', 'jr las casad', 965284269, 'joseph', 0, '$2y$10$YE5Io/xYG0dG07.eZS2s2upRlAB00UnzfNK8YX0ClOWzjfG2jeXk.', '2015-05-25 05:05:24', '2015-05-26 05:53:41');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
