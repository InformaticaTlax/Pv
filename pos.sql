-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-03-2023 a las 22:18:25
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
-- Base de datos: `pos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'Equipos electromecanicos', '2022-12-19 20:50:53'),
(2, 'Taladros', '2022-12-19 20:50:53'),
(3, 'Andamios', '2022-12-19 20:50:53'),
(4, 'Generadores de Energia', '2022-12-19 20:50:53'),
(5, 'Equipos de Construccion', '2022-12-19 20:50:53'),
(6, 'prueba categoria', '2022-12-26 19:57:05'),
(7, 'hules', '2023-03-29 19:50:37'),
(8, 'xx', '2023-03-29 19:58:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `ultima_compra`, `fecha`) VALUES
(1, 'Cliente1', 1515212, 'duldu@hotmail.com', '(111) 111-1111', 'calle 45 f 23', '2000-01-11', 23, '2023-03-29 13:25:38', '2023-03-29 19:25:38'),
(2, 'cliente2', 145454, 'cliente2@gmail.com', '(111) 111-1111', 'carre ra 1', '1992-05-22', 9, '2023-03-28 17:45:14', '2023-03-28 23:45:14'),
(3, 'Juridico', 1212221, 'dep@gmail.com', '(111) 111-1111', 'manuel xxx', '1999-01-15', 2, '2023-03-29 13:53:19', '2023-03-29 19:53:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(2, 1, '102', 'Plato Flotante para Allanadora', 'vistas/img/productos/102/940.jpg', 16, 4500, 6300, 12, '2023-03-22 20:56:06'),
(3, 1, '103', 'Compresor de Aire para pintura', 'vistas/img/productos/103/763.jpg', 3, 3000, 4200, 2, '2023-03-07 21:18:28'),
(4, 1, '104', 'Cortadora de Adobe sin Disco ', '', 28, 4000, 5600, 5, '2023-03-08 19:26:25'),
(5, 1, '105', 'Cortadora de Piso sin Disco ', 'vistas/img/productos/101/105.png', 18, 1540, 2156, 0, '2023-03-07 17:02:05'),
(6, 1, '106', 'Disco Punta Diamante ', '', 19, 1100, 1540, 1, '2023-03-08 19:26:25'),
(7, 1, '107', 'Extractor de Aire ', '', 19, 1540, 2156, 1, '2023-03-08 19:26:25'),
(8, 1, '108', 'Guada?adora ', 'vistas/img/productos/102/940.jpg', 19, 1540, 2156, 1, '2023-03-08 19:26:25'),
(9, 1, '109', 'Hidrolavadora El?ctrica ', '', 20, 2600, 3640, 0, '2022-12-12 23:23:38'),
(10, 1, '110', 'Hidrolavadora Gasolina', 'vistas/img/productos/108/163.jpg', 20, 2210, 3094, 0, '2022-12-22 18:08:15'),
(11, 1, '111', 'Motobomba a Gasolina', 'vistas/img/productos/108/163.jpg', 20, 2860, 4004, 0, '2022-12-22 18:08:12'),
(12, 1, '112', 'Motobomba El?ctrica', '', 20, 2400, 3360, 0, '2022-12-12 23:23:38'),
(13, 1, '113', 'Sierra Circular ', '', 20, 1100, 1540, 0, '2022-12-12 23:23:38'),
(14, 1, '114', 'Disco de tugsteno para Sierra circular', '', 20, 4500, 6300, 0, '2022-12-12 23:23:38'),
(15, 1, '115', 'Soldador Electrico ', 'vistas/img/productos/103/763.jpg', 20, 1980, 2772, 0, '2022-12-22 18:07:49'),
(16, 1, '116', 'Careta para Soldador', '', 20, 4200, 5880, 0, '2022-12-12 23:23:38'),
(17, 1, '117', 'Torre de iluminacion ', ' vistas/img/productos/106/635.jpg', 20, 1800, 2520, 0, '2022-12-22 18:08:01'),
(18, 2, '201', 'Martillo Demoledor de Piso 110V', '', 20, 5600, 7840, 0, '2022-12-12 23:23:38'),
(19, 2, '202', 'Muela o cincel martillo demoledor piso', '', 20, 9600, 13440, 0, '2022-12-12 23:23:38'),
(20, 2, '203', 'Taladro Demoledor de muro 110V', ' vistas/img/productos/106/635.jpg', 20, 3850, 5390, 0, '2022-12-22 18:08:03'),
(21, 2, '204', 'Muela o cincel martillo demoledor muro', '', 20, 9600, 13440, 0, '2022-12-12 23:23:38'),
(22, 2, '205', 'Taladro Percutor de 1/2 Madera y Metal', '', 20, 8000, 11200, 0, '2022-12-22 18:05:17'),
(23, 2, '206', 'Taladro Percutor SDS Plus 110V', '', 20, 3900, 5460, 0, '2022-12-12 23:23:38'),
(24, 2, '207', 'Taladro Percutor SDS Max 110V (Mineria)', '', 20, 4600, 6440, 0, '2022-12-12 23:23:38'),
(25, 3, '301', 'Andamio colgante', '', 20, 1440, 2016, 0, '2022-12-12 23:23:38'),
(26, 3, '302', 'Distanciador andamio colgante', '', 20, 1600, 2240, 0, '2022-12-12 23:23:38'),
(27, 3, '303', 'Marco andamio modular ', '', 20, 900, 1260, 0, '2022-12-12 23:23:38'),
(28, 3, '304', 'Marco andamio tijera', '', 20, 100, 140, 0, '2022-12-12 23:23:38'),
(29, 3, '305', 'Tijera para andamio', '', 20, 162, 226, 0, '2022-12-12 23:23:38'),
(30, 3, '306', 'Escalera interna para andamio', '', 20, 270, 378, 0, '2022-12-12 23:23:38'),
(31, 3, '307', 'Pasamanos de seguridad', '', 20, 75, 105, 0, '2022-12-12 23:23:38'),
(32, 3, '308', 'Rueda giratoria para andamio', '', 20, 168, 235, 0, '2022-12-12 23:23:38'),
(33, 3, '309', 'Arnes de seguridad', '', 20, 1750, 2450, 0, '2022-12-12 23:23:38'),
(34, 3, '310', 'Eslinga para arnes', '', 20, 175, 245, 0, '2022-12-12 23:23:38'),
(35, 3, '311', 'Plataforma Met?lica', '', 20, 420, 588, 0, '2022-12-12 23:23:38'),
(36, 4, '401', 'Planta Electrica Diesel 6 Kva', '', 20, 3500, 4900, 0, '2022-12-12 23:23:38'),
(37, 4, '402', 'Planta Electrica Diesel 10 Kva', '', 20, 3550, 4970, 0, '2022-12-12 23:23:38'),
(38, 4, '403', 'Planta Electrica Diesel 20 Kva', '', 20, 3600, 5040, 0, '2022-12-12 23:23:38'),
(39, 4, '404', 'Planta Electrica Diesel 30 Kva', '', 20, 3650, 5110, 0, '2022-12-12 23:23:38'),
(40, 4, '405', 'Planta Electrica Diesel 60 Kva', '', 20, 3700, 5180, 0, '2022-12-12 23:23:38'),
(41, 4, '406', 'Planta Electrica Diesel 75 Kva', '', 20, 3750, 5250, 0, '2022-12-12 23:23:38'),
(42, 4, '407', 'Planta Electrica Diesel 100 Kva', '', 20, 3800, 5320, 0, '2022-12-12 23:23:38'),
(43, 4, '408', 'Planta Electrica Diesel 120 Kva', '', 20, 3850, 5390, 0, '2022-12-12 23:23:38'),
(44, 5, '501', 'Escalera de Tijera Aluminio ', '', 20, 350, 490, 0, '2022-12-12 23:23:38'),
(45, 5, '502', 'Extension Electrica ', '', 20, 370, 518, 0, '2022-12-12 23:23:38'),
(46, 5, '503', 'Gato tensor', '', 20, 380, 532, 0, '2022-12-12 23:23:38'),
(47, 5, '504', 'Lamina Cubre Brecha ', '', 20, 380, 532, 0, '2022-12-12 23:23:38'),
(48, 5, '505', 'Llave de Tubo', '', 20, 480, 672, 0, '2022-12-12 23:23:38'),
(49, 5, '506', 'Manila por Metro', '', 20, 600, 840, 0, '2022-12-12 23:23:38'),
(50, 5, '507', 'Polea 2 canales', '', 20, 900, 1260, 0, '2022-12-12 23:23:38'),
(51, 5, '508', 'Tensor', '', 20, 100, 140, 0, '2022-12-12 23:23:38'),
(52, 5, '509', 'Bascula ', '', 20, 130, 182, 0, '2022-12-12 23:23:38'),
(53, 5, '510', 'Bomba Hidrostatica', '', 20, 770, 1078, 0, '2022-12-12 23:23:38'),
(54, 5, '511', 'Chapeta', '', 20, 660, 924, 0, '2022-12-12 23:23:38'),
(55, 5, '512', 'Cilindro muestra de concreto', '', 20, 400, 560, 0, '2022-12-12 23:23:38'),
(56, 5, '513', 'Cizalla de Palanca', '', 19, 450, 630, 1, '2023-03-29 15:48:19'),
(57, 5, '514', 'Cizalla de Tijera', '', 19, 580, 812, 1, '2023-03-29 15:48:19'),
(58, 5, '515', 'Coche llanta neumatica', '', 19, 420, 588, 1, '2023-03-29 15:48:19'),
(59, 5, '516', 'Cono slump', '', 20, 140, 196, 0, '2022-12-12 23:23:38'),
(60, 5, '517', 'Cortadora de Baldosin', '', 19, 930, 1302, 1, '2023-03-29 19:53:19'),
(61, 6, '601', 'Super prueba', 'vistas/img/productos/default/anonymous.png', 19, 1000, 1400, 1, '2023-03-28 23:45:14'),
(62, 6, '602', 'prueba decimales', 'vistas/img/productos/default/anonymous.png', 48, 9.99, 12.4875, 3, '2023-03-28 23:45:14'),
(63, 6, '603', 'niño', 'vistas/img/productos/603/314.jpg', 9, 12.5, 15.625, 1, '2023-03-28 20:18:48'),
(64, 2, '123456789123', 'libro 100 viajes -', '', 14, 25, 31.25, 3, '2023-03-29 19:53:19'),
(65, 8, '12121', 'dasdas', 'vistas/img/productos/default/anonymous.png', 5, 1, 1.5, 0, '2023-03-29 19:59:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `foto` text COLLATE utf8mb4_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(3, 'emma', 'prueba1', '$2a$07$asxx54ahjppf45sd87a5au1gjqdU.ybWXdMxoN7YGHb9SmYjSf9na', 'Vendedor', 'vistas/img/usuarios/prueba1/126.jpg', 1, '2023-03-29 13:57:07', '2023-03-29 19:57:07'),
(4, 'ana', 'ana', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'Administrador', 'vistas/img/usuarios/ana/436.png', 1, '2023-03-29 13:59:57', '2023-03-29 19:59:57'),
(11, '1', '1', '$2a$07$asxx54ahjppf45sd87a5au1gjqdU.ybWXdMxoN7YGHb9SmYjSf9na', 'Administrador', 'vistas/img/usuarios/1/335.jpg', 1, '2023-03-14 14:53:24', '2023-03-14 19:53:24'),
(12, '1', '2', '$2a$07$asxx54ahjppf45sd87a5auX91c3ek5uNnUyOm/iJ1UR2ZUPh99TDC', 'Especial', 'vistas/img/usuarios/2/727.jpg', 1, '2023-03-29 13:58:06', '2023-03-29 19:58:06'),
(13, 'Are', 'Are', '$2a$07$asxx54ahjppf45sd87a5auex1.eMmLQJbq7K3fXPzmWYKhUj/Zb8m', 'Especial', '', 1, '0000-00-00 00:00:00', '2023-03-14 19:47:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(5, 10001, 1, 4, '[{\"id\":\"2\",\"descripcion\":\"Plato Flotante para Allanadora\",\"cantidad\":\"1\",\"stock\":\"27\",\"precio\":\"6300\",\"total\":\"6300\"},{\"id\":\"3\",\"descripcion\":\"Compresor de Aire para pintura\",\"cantidad\":\"1\",\"stock\":\"4\",\"precio\":\"4200\",\"total\":\"4200\"},{\"id\":\"4\",\"descripcion\":\"Cortadora de Adobe sin Disco \",\"cantidad\":\"3\",\"stock\":\"30\",\"precio\":\"5600\",\"total\":\"16800\"}]', 0, 27300, 27300, 'Efectivo', '2023-03-07 17:04:52'),
(6, 10002, 2, 4, '[{\"id\":\"2\",\"descripcion\":\"Plato Flotante para Allanadora\",\"cantidad\":\"1\",\"stock\":\"26\",\"precio\":\"6300\",\"total\":\"6300\"},{\"id\":\"3\",\"descripcion\":\"Compresor de Aire para pintura\",\"cantidad\":\"1\",\"stock\":\"3\",\"precio\":\"4200\",\"total\":\"4200\"},{\"id\":\"4\",\"descripcion\":\"Cortadora de Adobe sin Disco \",\"cantidad\":\"1\",\"stock\":\"29\",\"precio\":\"5600\",\"total\":\"5600\"}]', 161, 16100, 16261, 'Efectivo', '2023-03-07 21:18:28'),
(7, 10003, 2, 4, '[{\"id\":\"4\",\"descripcion\":\"Cortadora de Adobe sin Disco \",\"cantidad\":\"1\",\"stock\":\"28\",\"precio\":\"5600\",\"total\":\"5600\"},{\"id\":\"6\",\"descripcion\":\"Disco Punta Diamante \",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"1540\",\"total\":\"1540\"},{\"id\":\"7\",\"descripcion\":\"Extractor de Aire \",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"2156\",\"total\":\"2156\"},{\"id\":\"8\",\"descripcion\":\"Guada?adora \",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"2156\",\"total\":\"2156\"}]', 0, 11452, 11452, 'Efectivo', '2023-03-08 19:26:25'),
(8, 10004, 1, 4, '[{\"id\":\"2\",\"descripcion\":\"Plato Flotante para Allanadora\",\"cantidad\":\"10\",\"stock\":\"16\",\"precio\":\"6300\",\"total\":\"63000\"}]', 0, 63000, 63000, 'TC-63000', '2023-03-14 23:31:34'),
(9, 10005, 1, 4, '[{\"id\":\"63\",\"descripcion\":\"niño\",\"cantidad\":\"1\",\"stock\":\"9\",\"precio\":\"15.625\",\"total\":\"15.625\"}]', 0, 15.625, 15.625, 'Efectivo', '2023-03-28 20:18:48'),
(10, 10006, 1, 4, '[{\"id\":\"62\",\"descripcion\":\"prueba decimales\",\"cantidad\":\"1\",\"stock\":\"49\",\"precio\":\"12.4875\",\"total\":\"12.4875\"}]', 0.124875, 12.4875, 12.6124, 'TC-1212', '2023-03-28 23:27:15'),
(11, 10006, 1, 4, '[{\"id\":\"62\",\"descripcion\":\"prueba decimales\",\"cantidad\":\"1\",\"stock\":\"49\",\"precio\":\"12.4875\",\"total\":\"12.4875\"}]', 0.124875, 12.4875, 12.6124, 'TC-1212', '2023-03-28 23:28:55'),
(12, 10007, 2, 4, '[{\"id\":\"62\",\"descripcion\":\"prueba decimales\",\"cantidad\":\"1\",\"stock\":\"48\",\"precio\":\"12.4875\",\"total\":\"12.49\"},{\"id\":\"61\",\"descripcion\":\"Super prueba\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"1400\",\"total\":\"1400\"}]', 0, 1412.49, 1412.49, 'TD-11', '2023-03-28 23:45:14'),
(13, 10008, 1, 4, '[{\"id\":\"58\",\"descripcion\":\"Coche llanta neumatica\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"588\",\"total\":\"588\"},{\"id\":\"57\",\"descripcion\":\"Cizalla de Tijera\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"812\",\"total\":\"812\"},{\"id\":\"56\",\"descripcion\":\"Cizalla de Palanca\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"630\",\"total\":\"630\"}]', 0, 2030, 2030, 'Efectivo', '2023-03-29 15:48:19'),
(14, 10009, 1, 4, '[{\"id\":\"64\",\"descripcion\":\"libro 100 viajes\",\"cantidad\":\"2\",\"stock\":\"8\",\"precio\":\"31.25\",\"total\":\"62.5\"}]', 0, 62.5, 62.5, 'TC-215151', '2023-03-29 19:25:38'),
(15, 10010, 3, 4, '[{\"id\":\"64\",\"descripcion\":\"libro 100 viajes -\",\"cantidad\":\"1\",\"stock\":\"14\",\"precio\":\"31.25\",\"total\":\"31.25\"},{\"id\":\"60\",\"descripcion\":\"Cortadora de Baldosin\",\"cantidad\":\"1\",\"stock\":\"19\",\"precio\":\"1302\",\"total\":\"1302\"}]', 0, 1333.25, 1333.25, 'TC-111', '2023-03-29 19:53:19');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
