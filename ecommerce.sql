-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2018 a las 06:25:40
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ecommerce`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo1` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo2` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo3` text COLLATE utf8_spanish_ci NOT NULL,
  `estilo` text COLLATE utf8_spanish_ci NOT NULL,
  `decha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `ruta`, `imagen`, `titulo1`, `titulo2`, `titulo3`, `estilo`, `decha`) VALUES
(1, 'sin-categoria', 'vistas/img/banner/default.jpg', '{\r\n	\"texto\": \"OFERTAS ESPECIALES\",\r\n	\"color\": \"#fff\"\r\n}', '{\r\n	\"texto\": \"50% off\",\r\n	\"color\": \"#fff\"\r\n}', '{\r\n	\"texto\": \"Termina el 31 de Agosto\",\r\n	\"color\": \"#fff\"\r\n}', 'textoDer', '2018-08-01 05:43:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `ruta`, `fecha`) VALUES
(1, 'Rolls', 'rolls', '0000-00-00 00:00:00'),
(2, 'Hot Rolls ', 'hot-rolls', '2018-07-28 21:18:48'),
(3, 'Rolls Vegetarianos', 'rolls-vegetarianos', '2018-07-28 21:18:58'),
(4, 'Rolls sin Arroz', 'rolls-sin-arroz', '2018-07-28 21:19:19'),
(5, 'Rolls Especiales', 'rolls-especiales', '2018-07-28 21:20:32'),
(6, 'Promociones', 'promociones', '2018-07-28 21:20:32'),
(7, 'Agregados', 'agregados', '2018-07-28 21:26:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `id` int(11) NOT NULL,
  `barraSuperior` text COLLATE utf8_spanish_ci NOT NULL,
  `textoSuperior` text COLLATE utf8_spanish_ci NOT NULL,
  `colorFondo` text COLLATE utf8_spanish_ci NOT NULL,
  `colorTexto` text COLLATE utf8_spanish_ci NOT NULL,
  `logo` text COLLATE utf8_spanish_ci NOT NULL,
  `icono` text COLLATE utf8_spanish_ci NOT NULL,
  `redesSociales` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id`, `barraSuperior`, `textoSuperior`, `colorFondo`, `colorTexto`, `logo`, `icono`, `redesSociales`, `fecha`) VALUES
(1, '#000000', '#ffffff', '#47bac1', '#ffffff', 'vistas/img/plantilla/logo.png', 'vistas/img/plantilla/icono.png', '[{\r\n	\"red\": \"fa-facebook\",\r\n	\"estilo\": \"facebookBlanco\",\r\n	\"url\": \"http://facebook.com/\"\r\n}, {\r\n	\"red\": \"fa-youtube\",\r\n	\"estilo\": \"youtubeBlanco\",\r\n	\"url\": \"http://youtube.com/\"\r\n}, {\r\n	\"red\": \"fa-twitter\", \r\n	\"estilo\": \"twitterBlanco\",\r\n	\"url\": \"http://twitter.com/\" \r\n}, {\r\n	\"red\": \"fa-google-plus\",\r\n	\"estilo\": \"googleBlanco\",\r\n	\"url\": \"http://google.com/\"\r\n}, {\r\n	\"red\": \"fa-instagram\",\r\n	\"estilo\": \"instagramBlanco\",\r\n	\"url\": \"http://instagram.com/\"\r\n}\r\n\r\n]', '2018-07-29 22:02:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `titular` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `detalles` text COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  `portada` text COLLATE utf8_spanish_ci NOT NULL,
  `vistas` int(11) NOT NULL,
  `ventas` int(11) NOT NULL,
  `ofertadoPorCategoria` int(11) NOT NULL,
  `ofertadoPorSubCategoria` int(11) NOT NULL,
  `oferta` int(11) NOT NULL,
  `precioOferta` float NOT NULL,
  `descuentoOferta` int(11) NOT NULL,
  `imgOferta` text COLLATE utf8_spanish_ci NOT NULL,
  `finOferta` datetime NOT NULL,
  `nuevo` int(11) NOT NULL,
  `peso` float NOT NULL,
  `entrega` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `id_subcategoria`, `tipo`, `ruta`, `titulo`, `titular`, `descripcion`, `detalles`, `precio`, `portada`, `vistas`, `ventas`, `ofertadoPorCategoria`, `ofertadoPorSubCategoria`, `oferta`, `precioOferta`, `descuentoOferta`, `imgOferta`, `finOferta`, `nuevo`, `peso`, `entrega`, `fecha`) VALUES
(1, 1, 0, 'fisico', 'kani-roll', 'Kani Roll', 'Lorem ipsum', 'Kanikama, queso crema, palta, envuelto en sesamo o ciboulette', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 3400, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 1, 0, 0, '', '0000-00-00 00:00:00', 1, 1, 10, '2018-08-14 20:14:21'),
(2, 1, 0, 'fisico', 'especial-ebi-palta', 'Especial Ebi Palta', 'Lorem ipsum', 'Camaron, queso crema, ciboulette, envuelto en palta', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4200, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 1, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:18:16'),
(3, 1, 0, 'fisico', 'especial-ebi-salmon', 'Especial Ebi Salmon', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 3400, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:18:18'),
(4, 1, 0, 'fisico', 'tako-ebi-palta', 'Tako Ebi Palta ', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4200, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:18:21'),
(5, 1, 0, 'fisico', 'california-tori', 'California Tori', 'Lorem ipsum', 'Lorem ipsum dolor sit', '{\"Opcion\":[\"Sesamo\",\"Ciboulette\"]}', 4200, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 1, 10, '2018-08-14 20:18:23'),
(6, 1, 0, 'fisico', 'cheese-tori-furai', 'Cheese Tori Furai', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 3400, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:18:25'),
(7, 1, 0, 'fisico', 'california-ebi', 'California Ebi', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 3600, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 1, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:18:28'),
(8, 2, 0, 'fisico', 'tori-roll', 'Tori Roll', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 3600, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 1, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:18:30'),
(9, 2, 0, 'fisico', 'ebi-hot-roll', 'Ebi Hot Roll ', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4000, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:18:32'),
(10, 2, 0, 'fisico', 'sake-hot-roll', 'Sake Hot Roll', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4000, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 1, 10, '2018-08-14 20:18:34'),
(11, 2, 0, 'fisico', 'kani-hot-roll', 'Kani Hot Roll', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4000, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 1, 10, '2018-08-14 20:18:39'),
(12, 2, 0, 'fisico', 'tori-premmium-hot-roll', 'Tori Premmium Hot Roll', 'Lorem ipsum', 'Lorem ipsum dolor sit', '{\"Opcion\":[\"Tempura\",\"Panko\"]}', 4200, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 1, 10, '2018-08-14 20:18:41'),
(13, 2, 0, 'fisico', 'ebi-sake-hot-roll', 'Ebi Sake Hot Roll', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4600, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 1, 0, 1, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:18:42'),
(14, 2, 0, 'fisico', 'pollo-ebi-furai', 'Pollo Ebi Furai', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4200, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:18:47'),
(15, 3, 0, 'fisico', 'zukkini-roll', 'Zukkini Roll', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4500, 'vistas/img/productos/accesorios/accesorio04.jpg', 1, 0, 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-15 03:48:25'),
(16, 3, 0, 'fisico', 'kinoko-roll', 'Kinoko Roll', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4200, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:18:53'),
(17, 3, 0, 'fisico', 'tenohira-roll', 'Tenohira Roll', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4500, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:18:54'),
(18, 4, 0, 'fisico', 'ebi-oriental-roll', 'Ebi Oriental Roll', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4300, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:18:59'),
(19, 4, 0, 'fisico', 'tori-oriental-roll', 'Tori Oriental Roll', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4000, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 1, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:19:00'),
(20, 4, 0, 'fisico', 'kinoko-oriental-roll', 'Kinoko Oriental Roll', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4000, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 1, 10, '2018-08-14 20:19:03'),
(21, 5, 0, 'fisico', 'chiri-tori-roll', 'Chiri Tori Roll', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4500, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:19:05'),
(22, 5, 0, 'fisico', 'acevichado', 'Acevichado', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4800, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:19:06'),
(23, 5, 0, 'fisico', 'chimichurri', 'Chimichurri', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4600, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 1, 1, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:19:09'),
(24, 7, 0, 'fisico', 'gyosas-cerdo', 'Gyosas de Cerdo', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 3000, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 1, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:19:21'),
(25, 7, 0, 'fisico', 'gyosas-pollo', 'Gyosas de Pollo', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 3000, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 1, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:19:23'),
(26, 7, 0, 'fisico', 'gyosas-camaron', 'Gyosas de Camaron', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 3000, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 1, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:19:26'),
(27, 7, 0, 'fisico', 'sake-furai', 'Sake Furai', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 3200, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 1, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 1, 1, 10, '2018-08-14 20:19:29'),
(28, 7, 0, 'fisico', 'tori-furai', 'Tori Furai', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 3200, 'vistas/img/productos/accesorios/accesorio04.jpg', 0, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-14 20:19:30'),
(29, 7, 0, 'fisico', 'ebi-furai', 'Ebi Furai', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 3200, 'vistas/img/productos/accesorios/accesorio04.jpg', 6, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-15 01:15:21'),
(30, 7, 0, 'fisico', 'sashimi-salmon', 'Sashimi Salmon', 'Lorem ipsum', 'Lorem ipsum dolor sit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 4000, 'vistas/img/productos/accesorios/accesorio04.jpg', 2, 0, 0, 0, 0, 0, 0, '', '0000-00-00 00:00:00', 0, 1, 10, '2018-08-15 01:15:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `imgFondo` text COLLATE utf8_spanish_ci NOT NULL,
  `tipoSlide` text COLLATE utf8_spanish_ci NOT NULL,
  `imgProducto` text COLLATE utf8_spanish_ci NOT NULL,
  `estiloImgProducto` text COLLATE utf8_spanish_ci NOT NULL,
  `estiloTextoSlide` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo1` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo2` text COLLATE utf8_spanish_ci NOT NULL,
  `titulo3` text COLLATE utf8_spanish_ci NOT NULL,
  `boton` text COLLATE utf8_spanish_ci NOT NULL,
  `url` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `slide`
--

INSERT INTO `slide` (`id`, `imgFondo`, `tipoSlide`, `imgProducto`, `estiloImgProducto`, `estiloTextoSlide`, `titulo1`, `titulo2`, `titulo3`, `boton`, `url`, `fecha`) VALUES
(1, 'vistas/img/slide/slide1/img1.jpg', 'slideOpcion1', 'vistas/img/slide/default/img_default.png', '{\"top\":\"15%\", \"right\": \"10%\", \"width\": \"45%\", \"left\": \"\"}', '{\"top\":\"20%\", \"right\": \"\", \"width\": \"40%\", \"left\": \"10%\"}', '{\"texto\":\"Lorem Ipsum\", \"color\": \"#333\"}', '{\"texto\":\"Lorem ipsum dolor sit\", \"color\": \"#777\"}', '{\"texto\":\"Lorem ipsum dolor sit\", \"color\": \"#888\"}', '<button class=\"btn btn-default backColor text-uppercase\">\r\n								\r\n								VER PRODUCTO <span class=\"fa fa-chevron-right\"></span>\r\n\r\n							</button>', '#', '2018-07-26 00:50:48'),
(2, 'vistas/img/slide/slide1/img2.jpg', 'slideOpcion2', 'vistas/img/slide/default/img_default.png', '{\"top\":\"5%\", \"right\": \"\", \"width\": \"25%\", \"left\": \"15%\"}', '{\"top\":\"20%\", \"right\": \"15%\", \"width\": \"40%\", \"left\": \"\"}', '{\"texto\":\"Lorem Ipsum\", \"color\": \"#333\"}', '{\"texto\":\"Lorem ipsum dolor sit\", \"color\": \"#777\"}', '{\"texto\":\"Lorem ipsum dolor sit\", \"color\": \"#888\"}', '<button class=\"btn btn-default backColor text-uppercase\">\r\n								\r\n								VER PRODUCTO <span class=\"fa fa-chevron-right\"></span>\r\n\r\n							</button>', '#', '2018-07-26 00:50:52'),
(3, 'vistas/img/slide/slide1/img3.jpg', 'slideOpcion1', 'vistas/img/slide/default/img_default.png', '{\"top\":\"15%\", \"right\": \"10%\", \"width\": \"45%\", \"left\": \"\"}', '{\"top\":\"20%\", \"right\": \"\", \"width\": \"40%\", \"left\": \"10%\"}', '{\"texto\":\"Lorem Ipsum\", \"color\": \"#333\"}', '{\"texto\":\"Lorem ipsum dolor sit\", \"color\": \"#777\"}', '{\"texto\":\"Lorem ipsum dolor sit\", \"color\": \"#888\"}', '<button class=\"btn btn-default backColor text-uppercase\">\r\n								\r\n								VER PRODUCTO <span class=\"fa fa-chevron-right\"></span>\r\n\r\n							</button>', '#', '2018-07-26 00:50:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE `subcategorias` (
  `id` int(11) NOT NULL,
  `subcategoria` text COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`id`, `subcategoria`, `id_categoria`, `ruta`, `fecha`) VALUES
(1, 'Kani Roll', 1, 'kani-roll', '0000-00-00 00:00:00'),
(2, 'Especial Ebi Palta', 1, 'esp-ebi-palta', '0000-00-00 00:00:00'),
(3, 'Tori Roll', 1, 'tori-roll', '0000-00-00 00:00:00'),
(4, 'Especial Ebi Salmon', 1, 'esp-ebi-salmon', '0000-00-00 00:00:00'),
(5, 'Tako Ebi Palta', 1, 'tako-ebi-palta', '0000-00-00 00:00:00'),
(6, 'California Tori', 1, 'california-tori', '0000-00-00 00:00:00'),
(7, 'Cheese Tori Furai', 1, 'cheese-tori-furai', '0000-00-00 00:00:00'),
(8, 'California Ebi', 1, 'california-ebi', '0000-00-00 00:00:00'),
(9, 'Ebi Hot Roll', 1, 'ebi-hot-roll', '0000-00-00 00:00:00'),
(10, 'Zukkini Roll', 2, 'zukkini-roll', '0000-00-00 00:00:00'),
(11, 'Kinoko Roll', 2, 'kinoko-roll', '0000-00-00 00:00:00'),
(12, 'Tenohira Roll', 2, 'tenohira-roll', '0000-00-00 00:00:00'),
(13, 'Ebi Oriental Roll', 3, 'ebi-oriental-roll', '0000-00-00 00:00:00'),
(14, 'Tori Oriental Roll', 3, 'tori-oriental-roll', '0000-00-00 00:00:00'),
(15, 'Kinoko Oriental Roll', 3, 'kinoko-oriental-roll', '0000-00-00 00:00:00'),
(16, 'Chiri Tori Roll', 4, 'chiri-tori-roll', '0000-00-00 00:00:00'),
(17, 'Acevichado', 4, 'acevichado', '0000-00-00 00:00:00'),
(18, 'Chimichurri', 4, 'chimichurri', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `plantilla`
--
ALTER TABLE `plantilla`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
