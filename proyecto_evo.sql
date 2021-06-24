-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-06-2021 a las 02:32:40
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_evo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors`
--

CREATE TABLE `colors` (
  `COLOR_ID` int(11) NOT NULL,
  `COLOR_NAME` varchar(250) NOT NULL,
  `DT_REGISTRY` datetime NOT NULL DEFAULT current_timestamp(),
  `DT_UPDATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `colors`
--

INSERT INTO `colors` (`COLOR_ID`, `COLOR_NAME`, `DT_REGISTRY`, `DT_UPDATE`) VALUES
(1, 'Esparrago', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(2, 'Negro', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(3, 'Zanahoria', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(4, 'Negruzco', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(5, 'Turquesa', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(6, 'Celeste', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(7, 'Azul petroleo', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(8, 'Azul cobalto', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(9, 'ceruleo', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(10, 'Rojo', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(11, 'Ocre', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(12, 'Verde militar', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(13, 'Rosa', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(14, 'Azul acero', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(15, 'Carmin', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(16, 'Lavanda floral', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(17, 'Azul marino', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(18, 'Azul prusia', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(19, 'Malva', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(20, 'Nieve', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(21, 'Blanco', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(22, 'Woodland M81', '2021-06-23 10:16:06', '2021-06-23 19:05:30'),
(23, 'Gris', '2021-06-23 10:16:55', '2021-06-23 19:05:38'),
(24, 'Amatista', '2021-06-23 10:17:07', '2021-06-23 19:05:53'),
(25, 'Cian', '2021-06-23 10:17:21', '2021-06-23 19:05:58'),
(26, 'Marron', '2021-06-23 11:12:00', '2021-06-23 19:06:03'),
(27, 'Naranja', '2021-06-23 11:12:08', '2021-06-23 19:06:08'),
(28, 'Azul bebe', '2021-06-23 11:12:17', '2021-06-23 19:06:17'),
(29, 'Celeste crayola', '2021-06-23 11:12:30', '2021-06-23 19:06:23'),
(30, 'Celeste claro', '2021-06-23 18:43:20', '2021-06-23 19:06:28'),
(31, 'Verdeceledon', '2021-06-23 18:43:34', '2021-06-23 19:06:34'),
(32, 'Nieve blanco', '2021-06-23 18:43:46', '2021-06-23 19:06:38'),
(33, 'Dorado', '2021-06-23 18:44:01', '2021-06-23 19:06:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_detail`
--

CREATE TABLE `order_detail` (
  `ORDER_DETAIL_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `SALE_ID` int(11) NOT NULL,
  `USER_FULL_NAME` varchar(300) NOT NULL,
  `SHIPPING_ADDRESS` varchar(250) NOT NULL,
  `ORDER_STATUS` int(11) NOT NULL DEFAULT 0,
  `DELIVERY_DATE` date NOT NULL,
  `DT_REGISTRY` datetime NOT NULL DEFAULT current_timestamp(),
  `DT_UPDATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `PRODUCT_ID` varchar(250) NOT NULL,
  `PRODUCT_CATEGORY_ID` int(11) NOT NULL,
  `COLOR_ID` int(11) NOT NULL,
  `PRODUCT_NAME` varchar(250) NOT NULL,
  `PRODUCT_DESCRIPTION` varchar(250) NOT NULL,
  `STOCK_SIZE_XXS` int(11) NOT NULL,
  `STOCK_SIZE_XS` int(11) NOT NULL,
  `STOCK_SIZE_S` int(11) NOT NULL,
  `STOCK_SIZE_M` int(11) NOT NULL,
  `STOCK_SIZE_L` int(11) NOT NULL,
  `STOCK_SIZE_XL` int(11) NOT NULL,
  `STOCK_SIZE_XXL` int(11) NOT NULL,
  `PRODUCT_IMAGE_1` varchar(200) NOT NULL,
  `PRODUCT_IMAGE_2` varchar(200) NOT NULL,
  `PRODUCT_IMAGE_3` varchar(200) NOT NULL,
  `PRODUCT_IMAGE_4` varchar(200) NOT NULL,
  `PRODUCT_PRICE` int(11) NOT NULL,
  `DT_REGISTRY` datetime NOT NULL DEFAULT current_timestamp(),
  `DT_UPDATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`PRODUCT_ID`, `PRODUCT_CATEGORY_ID`, `COLOR_ID`, `PRODUCT_NAME`, `PRODUCT_DESCRIPTION`, `STOCK_SIZE_XXS`, `STOCK_SIZE_XS`, `STOCK_SIZE_S`, `STOCK_SIZE_M`, `STOCK_SIZE_L`, `STOCK_SIZE_XL`, `STOCK_SIZE_XXL`, `PRODUCT_IMAGE_1`, `PRODUCT_IMAGE_2`, `PRODUCT_IMAGE_3`, `PRODUCT_IMAGE_4`, `PRODUCT_PRICE`, `DT_REGISTRY`, `DT_UPDATE`) VALUES
('P0000001', 1, 1, 'Ariana', '¡Disponible en cuatro colores! Estilo crop bomber con capucha, estamos listas para engreirte con nuestros ultimos modelos.', 2, 2, 2, 2, 2, 2, 2, 'P0000001-1.jpg', 'P0000001-2.jpg', 'P0000001-3.jpg', 'P0000001-4.jpg', 40, '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
('P0000002', 1, 2, 'Ariana', '¡Disponible en cuatro colores! Estilo crop bomber con capucha, estamos listas para engreirte con nuestros ultimos modelos.', 2, 2, 2, 2, 2, 2, 2, 'P0000002-1.jpg', 'P0000002-2.jpg', 'P0000002-3.jpg', 'P0000002-4.jpg', 40, '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
('P0000003', 1, 3, 'Ariana', '¡Disponible en cuatro colores! Estilo crop bomber con capucha, estamos listas para engreirte con nuestros ultimos modelos.', 2, 2, 2, 2, 2, 2, 2, 'P0000003-1.jpg', 'P0000003-2.jpg', 'P0000003-3.jpg', 'P0000003-4.jpg', 40, '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
('P0000004', 1, 4, 'Ariana', '¡Disponible en cuatro colores! Estilo crop bomber con capucha, estamos listas para engreirte con nuestros ultimos modelos.', 2, 2, 2, 2, 2, 2, 2, 'P0000004-1.jpg', 'P0000004-2.jpg', 'P0000004-3.jpg', 'P0000004-4.jpg', 40, '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
('P0000005', 1, 5, 'Boyfriend', 'Material Sauve y stresh. ¡Disponible en cuatro colores!, combinalas como quieras.', 2, 2, 2, 2, 2, 2, 2, 'P0000005-1.jpg', 'P0000005-2.jpg', 'P0000005-3.jpg', 'P0000005-4.jpg', 45, '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
('P0000006', 1, 28, 'Boyfriend', 'Material Sauve y stresh. ¡Disponible en cuatro colores!, combinalas como quieras.', 2, 2, 2, 2, 2, 2, 2, 'P0000006-1.jpg', 'P0000006-2.jpg', 'P0000006-3.jpg', 'P0000006-4.jpg', 45, '2021-06-14 23:55:13', '2021-06-23 11:13:03'),
('P0000007', 1, 7, 'Boyfriend', 'Material Sauve y stresh. ¡Disponible en cuatro colores!, combinalas como quieras.', 2, 2, 2, 2, 2, 2, 2, 'P0000007-1.jpg', 'P0000007-2.jpg', 'P0000007-3.jpg', 'P0000007-4.jpg', 45, '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
('P0000008', 1, 8, 'Boyfriend', 'Material Sauve y stresh. ¡Disponible en cuatro colores!, combinalas como quieras.', 2, 2, 2, 2, 2, 2, 2, 'P0000008-1.jpg', 'P0000008-2.jpg', 'P0000008-3.jpg', 'P0000008-4.jpg', 45, '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
('P0000009', 1, 5, 'Clasica', 'Material Rígido. En tus tonos favoritos, Denim100%', 2, 2, 2, 2, 2, 2, 2, 'P0000009-1.jpg', 'P0000009-2.jpg', 'P0000009-3.jpg', 'P0000009-4.jpg', 40, '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
('P0000010', 1, 28, 'Clasica', 'Material Rígido. En tus tonos favoritos, Denim100%', 2, 2, 2, 2, 2, 2, 2, 'P0000010-1.jpg', 'P0000010-2.jpg', 'P0000010-3.jpg', 'P0000010-4.jpg', 40, '2021-06-14 23:55:13', '2021-06-23 11:13:33'),
('P0000011', 1, 9, 'Clasica', 'Material Rígido. En tus tonos favoritos, Denim100%', 2, 0, 2, 2, 2, 2, 2, 'P0000011-1.jpg', 'P0000011-2.jpg', 'P0000011-3.jpg', 'P0000011-4.jpg', 40, '2021-06-14 23:55:23', '2021-06-14 23:55:13'),
('P0000012', 1, 7, 'Clasica', 'Material Rígido. En tus tonos favoritos, Denim100%', 2, 2, 2, 2, 2, 2, 2, 'P0000012-1.jpg', 'P0000012-2.jpg', 'P0000012-3.jpg', 'P0000012-4.jpg', 40, '2021-06-15 19:00:18', '2021-06-15 19:00:40'),
('P0000013', 1, 10, 'Colors', 'Material Rígido. !Colores disponibles!Nuestras casacas clasicas de colores son una nueva opción para ti.', 2, 2, 2, 2, 2, 2, 2, 'P0000013-1.jpg', 'P0000013-2.jpg', 'P0000013-3.jpg', 'P0000013-4.jpg', 40, '2021-06-15 19:02:04', '2021-06-15 19:02:23'),
('P0000014', 1, 11, 'Colors', 'Material Rígido. !Colores disponibles!Nuestras casacas clasicas de colores son una nueva opción para ti.', 2, 2, 2, 2, 2, 2, 2, 'P0000014-1.jpg', 'P0000014-2.jpg', 'P0000014-3.jpg', 'P0000014-4.jpg', 40, '2021-06-15 19:03:30', '2021-06-15 19:03:53'),
('P0000015', 1, 12, 'Colors', 'Material Rígido. !Colores disponibles!Nuestras casacas clasicas de colores son una nueva opción para ti.', 2, 2, 2, 2, 2, 2, 2, 'P0000015-1.jpg', 'P0000015-2.jpg', 'P0000015-3.jpg', 'P0000015-4.jpg', 40, '2021-06-15 19:05:14', '2021-06-15 19:05:46'),
('P0000016', 1, 13, 'Colors', 'Material Rígido. !Colores disponibles!Nuestras casacas clasicas de colores son una nueva opción para ti.', 2, 2, 2, 2, 2, 2, 2, 'P0000016-1.jpg', 'P0000016-2.jpg', 'P0000016-3.jpg', 'P0000016-4.jpg', 40, '2021-06-15 19:07:40', '2021-06-15 19:08:00'),
('P0000017', 1, 14, 'Oversize', 'Material Stresh. Necesarios para toda ocasión. ¡Colores Disponibles!', 2, 2, 2, 2, 2, 2, 2, 'P0000017-1.jpg', 'P0000017-2.jpg', 'P0000017-3.jpg', 'P0000017-4.jpg', 50, '2021-06-15 19:09:06', '2021-06-15 19:09:30'),
('P0000018', 1, 8, 'Oversize', 'Material Stresh. Necesarios para toda ocasión. ¡Colores Disponibles!', 2, 2, 2, 2, 2, 2, 2, 'P0000018-1.jpg', 'P0000018-2.jpg', 'P0000018-3.jpg', 'P0000018-4.jpg', 50, '2021-06-15 19:10:48', '2021-06-15 19:11:07'),
('P0000019', 1, 7, 'Oversize', 'Material Stresh. Necesarios para toda ocasión. ¡Colores Disponibles!', 2, 2, 2, 2, 2, 2, 2, 'P0000019-1.jpg', 'P0000019-2.jpg', 'P0000019-3.jpg', 'P0000019-4.jpg', 50, '2021-06-15 19:12:08', '2021-06-15 19:12:27'),
('P0000020', 1, 8, 'Oversize Peluche', 'Material Jean Stresh, y lana carnero. Llegó esta nueva opción para ti, para este frio intenso, con felpa tela carnero.', 2, 2, 2, 2, 2, 2, 2, 'P0000020-1.jpg', 'P0000020-2.jpg', 'P0000020-3.jpg', 'P0000020-4.jpg', 60, '2021-06-15 19:13:58', '2021-06-15 19:14:19'),
('P0000021', 1, 6, 'Oversize Peluche', 'Material Jean Stresh, y lana carnero. Llegó esta nueva opción para ti, para este frio intenso, con felpa tela carnero.', 2, 2, 2, 2, 2, 2, 2, 'P0000021-1.jpg', 'P0000021-2.jpg', 'P0000021-3.jpg', 'P0000021-4.jpg', 60, '2021-06-15 19:15:56', '2021-06-15 19:16:19'),
('P0000022', 1, 7, 'Oversize Peluche', 'Material Jean Stresh, y lana carnero. Llegó esta nueva opción para ti, para este frio intenso, con felpa tela carnero.', 2, 2, 2, 2, 2, 2, 2, 'P0000022-1.jpg', 'P0000022-2.jpg', 'P0000022-3.jpg', 'P0000022-4.jpg', 60, '2021-06-15 19:17:31', '2021-06-15 19:17:58'),
('P0000023', 1, 9, 'Oversize Peluche', 'Material Jean Stresh, y lana carnero. Llegó esta nueva opción para ti, para este frio intenso, con felpa tela carnero.', 2, 2, 2, 2, 2, 2, 2, 'P0000023-1.jpg', 'P0000023-2.jpg', 'P0000023-3.jpg', 'P0000023-4.jpg', 60, '2021-06-15 19:18:59', '2021-06-15 19:19:23'),
('P0000024', 1, 15, 'Peluche', 'Material: Lana. Nueva Casaca Peluche, con forro de algodón. En cuatro colores disponibles!', 2, 2, 2, 2, 2, 2, 2, 'P0000024-1.jpg', 'P0000024-2.jpg', 'P0000024-3.jpg', 'P0000024-4.jpg', 55, '2021-06-15 19:20:35', '2021-06-15 19:20:59'),
('P0000025', 1, 11, 'Peluche', 'Material: Lana. Nueva Casaca Peluche, con forro de algodón. En cuatro colores disponibles!', 2, 2, 2, 2, 2, 2, 2, 'P0000025-1.jpg', 'P0000025-2.jpg', 'P0000025-3.jpg', 'P0000025-4.jpg', 55, '2021-06-15 19:22:16', '2021-06-15 19:22:41'),
('P0000026', 1, 2, 'Peluche', 'Material: Lana. Nueva Casaca Peluche, con forro de algodón. En cuatro colores disponibles!', 2, 2, 2, 2, 2, 2, 2, 'P0000026-1.jpg', 'P0000026-2.jpg', 'P0000026-3.jpg', 'P0000026-4.jpg', 55, '2021-06-15 19:23:47', '2021-06-15 19:24:05'),
('P0000027', 1, 16, 'Peluche', 'Material: Lana. Nueva Casaca Peluche, con forro de algodón. En cuatro colores disponibles!', 2, 2, 2, 2, 2, 2, 2, 'P0000027-1.jpg', 'P0000027-2.jpg', 'P0000027-3.jpg', 'P0000027-4.jpg', 55, '2021-06-15 19:24:56', '2021-06-15 19:25:13'),
('P0000028', 1, 17, 'Princesa', 'Material Rígido y tela nacional. Casaca Crop, ¡Disponible en cuatro colores!', 2, 2, 2, 2, 2, 2, 2, 'P0000028-1.jpg', 'P0000028-2.jpg', 'P0000028-3.jpg', 'P0000028-4.jpg', 45, '2021-06-15 19:26:21', '2021-06-15 19:26:43'),
('P0000029', 1, 6, 'Princesa', 'Material Rígido y tela nacional. Casaca Crop, ¡Disponible en cuatro colores!', 2, 2, 2, 2, 2, 2, 2, 'P0000029-1.jpg', 'P0000029-2.jpg', 'P0000029-3.jpg', 'P0000029-4.jpg', 45, '2021-06-15 19:27:43', '2021-06-15 19:28:05'),
('P0000030', 1, 9, 'Princesa', 'Material Rígido y tela nacional. Casaca Crop, ¡Disponible en cuatro colores!', 2, 2, 2, 2, 2, 2, 2, 'P0000030-1.jpg', 'P0000030-2.jpg', 'P0000030-3.jpg', 'P0000030-4.jpg', 45, '2021-06-15 19:28:58', '2021-06-15 19:29:19'),
('P0000031', 1, 8, 'Rafa', 'Material Rígido y tela nacional. Casaca Crop con lazo en la parte inferior.', 2, 2, 2, 2, 2, 2, 2, 'P0000031-1.jpg', 'P0000031-2.jpg', 'P0000031-3.jpg', 'P0000031-4.jpg', 45, '2021-06-15 19:30:21', '2021-06-15 19:30:39'),
('P0000032', 1, 17, 'Rafa', 'Material Rígido y tela nacional. Casaca Crop con lazo en la parte inferior.', 2, 2, 2, 2, 2, 2, 2, 'P0000032-1.jpg', 'P0000032-2.jpg', 'P0000032-3.jpg', 'P0000032-4.jpg', 45, '2021-06-15 19:31:43', '2021-06-15 19:32:01'),
('P0000033', 1, 6, 'Rafa', 'Material Rígido y tela nacional. Casaca Crop con lazo en la parte inferior.', 2, 2, 2, 2, 2, 2, 2, 'P0000033-1.jpg', 'P0000033-2.jpg', 'P0000033-3.jpg', 'P0000033-4.jpg', 45, '2021-06-15 19:32:58', '2021-06-15 19:33:16'),
('P0000034', 1, 14, 'Retro', 'Casaca Retro Oversize. Esta casaca crop infaltable en tu armario, disponible en cuatro colores. Material rígido, tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000034-1.jpg', 'P0000034-2.jpg', 'P0000034-3.jpg', 'P0000034-4.jpg', 50, '2021-06-15 19:34:33', '2021-06-15 19:35:00'),
('P0000035', 1, 2, 'Retro', 'Casaca Retro Oversize. Esta casaca crop infaltable en tu armario, disponible en cuatro colores. Material rígido, tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000035-1.jpg', 'P0000035-2.jpg', 'P0000035-3.jpg', 'P0000035-4.jpg', 50, '2021-06-15 19:35:59', '2021-06-15 19:36:35'),
('P0000036', 1, 6, 'Retro', 'Casaca Retro Oversize. Esta casaca crop infaltable en tu armario, disponible en cuatro colores. Material rígido, tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000036-1.jpg', 'P0000036-2.jpg', 'P0000036-3.jpg', 'P0000036-4.jpg', 50, '2021-06-15 19:37:28', '2021-06-15 19:37:46'),
('P0000037', 1, 8, 'Rose', 'Casaca Jean de tela rífida con bordado de flores tejido a mano.', 2, 2, 2, 2, 2, 2, 2, 'P0000037-1.jpg', 'P0000037-2.jpg', 'P0000037-3.jpg', 'P0000037-4.jpg', 45, '2021-06-15 19:39:17', '2021-06-15 19:39:38'),
('P0000038', 1, 17, 'Rose', 'Casaca Jean de tela rífida con bordado de flores tejido a mano.', 2, 2, 2, 2, 2, 2, 2, 'P0000038-1.jpg', 'P0000038-2.jpg', 'P0000038-3.jpg', 'P0000038-4.jpg', 45, '2021-06-15 19:40:41', '2021-06-15 19:41:03'),
('P0000039', 1, 6, 'Rose', 'Casaca Jean de tela rífida con bordado de flores tejido a mano.', 2, 2, 2, 2, 2, 2, 2, 'P0000039-1.jpg', 'P0000039-2.jpg', 'P0000039-3.jpg', 'P0000039-4.jpg', 45, '2021-06-15 19:42:21', '2021-06-15 19:42:37'),
('P0000040', 1, 6, 'Crop Cargo Jean', 'Casaca Crop disponible en cuatro colores, combinalos con baggy jeans!', 2, 2, 2, 2, 2, 2, 2, 'P0000040-1.jpg', 'P0000040-2.jpg', 'P0000040-3.jpg', 'P0000040-4.jpg', 40, '2021-06-15 19:44:25', '2021-06-15 19:44:51'),
('P0000041', 1, 9, 'Crop Cargo Jean', 'Casaca Crop disponible en cuatro colores, combinalos con baggy jeans!', 2, 2, 2, 2, 2, 2, 2, 'P0000041-1.jpg', 'P0000041-2.jpg', 'P0000041-3.jpg', 'P0000041-4.jpg', 40, '2021-06-15 19:45:55', '2021-06-15 19:46:13'),
('P0000042', 1, 18, 'Crop Denim', 'Crop denim en estilo clásico, para acompañarte en esta temporada. Trabajamos con denim nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000042-1.jpg', 'P0000042-2.jpg', 'P0000042-3.jpg', 'P0000042-4.jpg', 40, '2021-06-15 19:47:12', '2021-06-15 19:47:30'),
('P0000043', 1, 5, 'Crop Denim', 'Crop denim en estilo clásico, para acompañarte en esta temporada. Trabajamos con denim nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000043-1.jpg', 'P0000043-2.jpg', 'P0000043-3.jpg', 'P0000043-4.jpg', 40, '2021-06-15 19:48:18', '2021-06-15 19:48:40'),
('P0000044', 1, 6, 'Crop Denim', 'Crop denim en estilo clásico, para acompañarte en esta temporada. Trabajamos con denim nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000044-1.jpg', 'P0000044-2.jpg', 'P0000044-3.jpg', 'P0000044-4.jpg', 40, '2021-06-15 19:49:34', '2021-06-15 19:50:01'),
('P0000045', 1, 16, 'Crop Fringes', 'Disponible en colores, colores suaves para que puedas combinarlo como quieras en esta temporada.', 2, 2, 2, 2, 2, 2, 2, 'P0000045-1.jpg', 'P0000045-2.jpg', 'P0000045-3.jpg', 'P0000045-4.jpg', 50, '2021-06-15 19:51:48', '2021-06-23 18:42:21'),
('P0000046', 1, 20, 'Crop Fringes', 'Disponible en colores, colores suaves para que puedas combinarlo como quieras en esta temporada.', 2, 2, 2, 2, 2, 2, 2, 'P0000046-1.jpg', 'P0000046-2.jpg', 'P0000046-3.jpg', 'P0000046-4.jpg', 50, '2021-06-15 19:53:20', '2021-06-15 19:53:36'),
('P0000047', 1, 21, 'Crop Fringes', 'Disponible en colores, colores suaves para que puedas combinarlo como quieras en esta temporada.', 2, 2, 2, 2, 2, 2, 2, 'P0000047-1.jpg', 'P0000047-2.jpg', 'P0000047-3.jpg', 'P0000047-4.jpg', 50, '2021-06-15 19:54:28', '2021-06-15 19:54:45'),
('P0000048', 1, 2, 'Crop Fringes', 'Disponible en colores, colores suaves para que puedas combinarlo como quieras en esta temporada.', 2, 2, 2, 2, 2, 2, 2, 'P0000048-1.jpg', 'P0000048-2.jpg', 'P0000048-3.jpg', 'P0000048-4.jpg', 50, '2021-06-15 19:55:35', '2021-06-15 19:55:53'),
('P0000049', 1, 6, 'Parkas', 'Listas para acompañarte toda esta estación otoño-invierno. Material: Jean y tela, forrado con tela peluche.', 2, 2, 2, 2, 2, 2, 2, 'P0000049-1.jpg', 'P0000049-2.jpg', 'P0000049-3.jpg', 'P0000049-4.jpg', 65, '2021-06-15 19:57:02', '2021-06-15 19:57:19'),
('P0000050', 1, 7, 'Parkas', 'Listas para acompañarte toda esta estación otoño-invierno. Material: Jean y tela, forrado con tela peluche.', 2, 2, 2, 2, 2, 2, 2, 'P0000050-1.jpg', 'P0000050-2.jpg', 'P0000050-3.jpg', 'P0000050-4.jpg', 65, '2021-06-15 19:58:48', '2021-06-15 19:59:06'),
('P0000051', 1, 1, 'Parkas', 'Listas para acompañarte toda esta estación otoño-invierno. Material: Jean y tela, forrado con tela peluche.', 2, 2, 2, 2, 2, 2, 2, 'P0000051-1.jpg', 'P0000051-2.jpg', 'P0000051-3.jpg', 'P0000051-4.jpg', 65, '2021-06-15 19:59:52', '2021-06-15 20:00:14'),
('P0000052', 2, 22, 'Camuflado', 'Marca tu estilo!, combinalos como quieras, disponibles en todas las tallas.', 2, 2, 2, 2, 2, 2, 2, 'P0000052-1.jpg', 'P0000052-2.jpg', 'P0000052-3.jpg', 'P0000052-4.jpg', 60, '2021-06-23 10:19:50', '2021-06-23 10:20:21'),
('P0000053', 2, 13, 'Mia', 'Jogger y Polera afranelada, en colores disponibles.', 2, 2, 2, 2, 2, 2, 2, 'P0000053-1.jpg', 'P0000053-2.jpg', 'P0000053-3.jpg', 'P0000053-4.jpg', 55, '2021-06-23 10:21:49', '2021-06-23 10:22:07'),
('P0000054', 2, 2, 'Mia', 'Jogger y Polera afranelada, en colores disponibles.', 2, 2, 2, 2, 2, 2, 2, 'P0000054-1.jpg', 'P0000054-2.jpg', 'P0000054-3.jpg', 'P0000054-4.jpg', 55, '2021-06-23 10:23:09', '2021-06-23 10:24:50'),
('P0000055', 2, 20, 'Mia', 'Jogger y Polera afranelada, en colores disponibles.', 2, 2, 2, 2, 2, 2, 2, 'P0000055-1.jpg', 'P0000055-2.jpg', 'P0000055-3.jpg', 'P0000055-4.jpg', 55, '2021-06-23 10:24:42', '2021-06-23 10:25:21'),
('P0000056', 2, 12, 'Mia', 'Jogger y Polera afranelada, en colores disponibles.', 2, 2, 2, 2, 2, 2, 2, 'P0000056-1.jpg', 'P0000056-2.jpg', 'P0000056-3.jpg', 'P0000056-4.jpg', 55, '2021-06-23 10:26:09', '2021-06-23 10:26:33'),
('P0000057', 2, 23, 'TieDye', 'Úsalo para salir a la calle o estar en casa viendo tu peli favorita. Nuestro conjunto tie dye. En Cuatro colores disponibles', 2, 2, 2, 2, 2, 2, 2, 'P0000057-1.jpg', 'P0000057-2.jpg', 'P0000057-3.jpg', 'P0000057-4.jpg', 60, '2021-06-23 10:32:17', '2021-06-23 10:33:21'),
('P0000058', 2, 13, 'TieDye', 'Úsalo para salir a la calle o estar en casa viendo tu peli favorita. Nuestro conjunto tie dye. En Cuatro colores disponibles', 2, 2, 2, 2, 2, 2, 2, 'P0000058-1.jpg', 'P0000058-2.jpg', 'P0000058-3.jpg', 'P0000058-4.jpg', 60, '2021-06-23 10:33:04', '2021-06-23 10:33:40'),
('P0000059', 2, 24, 'TieDye', 'Úsalo para salir a la calle o estar en casa viendo tu peli favorita. Nuestro conjunto tie dye. En Cuatro colores disponibles', 2, 2, 2, 2, 2, 2, 2, 'P0000059-1.jpg', 'P0000059-2.jpg', 'P0000059-3.jpg', 'P0000059-4.jpg', 60, '2021-06-23 10:34:24', '2021-06-23 10:34:41'),
('P0000060', 2, 25, 'TieDye', 'Úsalo para salir a la calle o estar en casa viendo tu peli favorita. Nuestro conjunto tie dye. En Cuatro colores disponibles', 2, 2, 2, 2, 2, 2, 2, 'P0000060-1.jpg', 'P0000060-2.jpg', 'P0000060-3.jpg', 'P0000060-4.jpg', 60, '2021-06-23 10:35:13', '2021-06-23 10:35:41'),
('P0000061', 2, 21, 'TotalWhite', 'Para una ocasión formal o casual . Material tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000061-1.jpg', 'P0000061-2.jpg', 'P0000061-3.jpg', 'P0000061-4.jpg', 75, '2021-06-23 10:36:56', '2021-06-23 10:37:14'),
('P0000062', 3, 21, 'Baggy Colors', 'Tela rígido. Disponible en cuatro colores', 2, 2, 2, 2, 2, 2, 2, 'P0000062-1.jpg', 'P0000062-2.jpg', 'P0000062-3.jpg', 'P0000062-4.jpg', 40, '2021-06-23 15:34:37', '2021-06-23 15:35:31'),
('P0000063', 3, 26, 'Baggy Colors', 'Tela rígido. Disponible en cuatro colores', 2, 2, 2, 2, 2, 2, 2, 'P0000063-1.jpg', 'P0000063-2.jpg', 'P0000063-3.jpg', 'P0000063-4.jpg', 40, '2021-06-23 15:36:20', '2021-06-23 15:36:41'),
('P0000064', 3, 27, 'Baggy Colors', 'Tela rígido. Disponible en cuatro colores', 2, 2, 2, 2, 2, 2, 2, 'P0000064-1.jpg', 'P0000064-2.jpg', 'P0000064-3.jpg', 'P0000064-4.jpg', 40, '2021-06-23 15:38:45', '2021-06-23 15:39:03'),
('P0000065', 3, 2, 'Baggy Colors', 'Tela rígido. Disponible en cuatro colores', 2, 2, 2, 2, 2, 2, 2, 'P0000065-1.jpg', 'P0000065-2.jpg', 'P0000065-3.jpg', 'P0000065-4.jpg', 40, '2021-06-23 15:40:15', '2021-06-23 15:40:31'),
('P0000066', 3, 7, 'Baggy Jeans', 'Acompañalos con las casacas Monni Retro. Disponible en los cuatro colores de tela jeans. Material tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000066-1.jpg', 'P0000066-2.jpg', 'P0000066-3.jpg', 'P0000066-4.jpg', 40, '2021-06-23 15:41:38', '2021-06-23 15:41:56'),
('P0000067', 3, 28, 'Baggy Jeans', 'Acompañalos con las casacas Monni Retro. Disponible en los cuatro colores de tela jeans. Material tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000067-1.jpg', 'P0000067-2.jpg', 'P0000067-3.jpg', 'P0000067-4.jpg', 40, '2021-06-23 15:42:44', '2021-06-23 15:43:00'),
('P0000068', 3, 6, 'Baggy Jeans', 'Acompañalos con las casacas Monni Retro. Disponible en los cuatro colores de tela jeans. Material tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000068-1.jpg', 'P0000068-2.jpg', 'P0000068-3.jpg', 'P0000068-4.jpg', 40, '2021-06-23 15:43:46', '2021-06-23 15:44:07'),
('P0000069', 3, 9, 'Basico', 'Infaltables en tu armario. Material: Stres, tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000069-1.jpg', 'P0000069-2.jpg', 'P0000069-3.jpg', 'P0000069-4.jpg', 35, '2021-06-23 15:45:45', '2021-06-23 15:46:04'),
('P0000070', 3, 7, 'Basico', 'Infaltables en tu armario. Material: Stres, tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000070-1.jpg', 'P0000070-2.jpg', 'P0000070-3.jpg', 'P0000070-4.jpg', 35, '2021-06-23 15:46:58', '2021-06-23 15:47:19'),
('P0000071', 3, 28, 'Basico', 'Infaltables en tu armario. Material: Stres, tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000071-1.jpg', 'P0000071-2.jpg', 'P0000071-3.jpg', 'P0000071-4.jpg', 35, '2021-06-23 15:48:14', '2021-06-23 15:48:38'),
('P0000072', 3, 29, 'Basico', 'Infaltables en tu armario. Material: Stres, tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000072-1.jpg', 'P0000072-2.jpg', 'P0000072-3.jpg', 'P0000072-4.jpg', 35, '2021-06-23 15:49:24', '2021-06-23 15:49:49'),
('P0000073', 3, 28, 'Boyfriend', 'Jeans full rasgados, combinalos con tops y crops. Material: rígido. ', 2, 2, 2, 2, 2, 2, 2, 'P0000073-1.jpg', 'P0000073-2.jpg', 'P0000073-3.jpg', 'P0000073-4.jpg', 45, '2021-06-23 15:51:49', '2021-06-23 15:52:25'),
('P0000074', 3, 6, 'Boyfriend', 'Jeans full rasgados, combinalos con tops y crops. Material: rígido. ', 2, 2, 2, 2, 2, 2, 2, 'P0000074-1.jpg', 'P0000074-2.jpg', 'P0000074-3.jpg', 'P0000074-4.jpg', 45, '2021-06-23 15:53:19', '2021-06-23 15:53:42'),
('P0000075', 3, 8, 'Boyfriend', 'Jeans full rasgados, combinalos con tops y crops. Material: rígido. ', 2, 2, 2, 2, 2, 2, 2, 'P0000075-1.jpg', 'P0000075-2.jpg', 'P0000075-3.jpg', 'P0000075-4.jpg', 45, '2021-06-23 15:54:38', '2021-06-23 15:54:58'),
('P0000076', 3, 17, 'Boyfriend', 'Jeans full rasgados, combinalos con tops y crops. Material: rígido. ', 2, 2, 2, 2, 2, 2, 2, 'P0000076-1.jpg', 'P0000076-2.jpg', 'P0000076-3.jpg', 'P0000076-4.jpg', 45, '2021-06-23 15:55:42', '2021-06-23 15:56:03'),
('P0000077', 3, 6, 'Kiara', 'Nuevo en Monni!, Por que ustedes lo pidieron, Jean Kiara son taloneros y modelo colombiano. Material: Stresh.', 2, 2, 2, 2, 2, 2, 2, 'P0000077-1.jpg', 'P0000077-2.jpg', 'P0000077-3.jpg', 'P0000077-4.jpg', 40, '2021-06-23 15:57:25', '2021-06-23 15:57:43'),
('P0000078', 3, 17, 'Kiara', 'Nuevo en Monni!, Por que ustedes lo pidieron, Jean Kiara son taloneros y modelo colombiano. Material: Stresh.', 2, 2, 2, 2, 2, 2, 2, 'P0000078-1.jpg', 'P0000078-2.jpg', 'P0000078-3.jpg', 'P0000078-4.jpg', 40, '2021-06-23 16:41:33', '2021-06-23 16:41:49'),
('P0000079', 3, 7, 'Kiara', 'Nuevo en Monni!, Por que ustedes lo pidieron, Jean Kiara son taloneros y modelo colombiano. Material: Stresh.', 2, 2, 2, 2, 2, 2, 2, 'P0000079-1.jpg', 'P0000079-2.jpg', 'P0000079-3.jpg', 'P0000079-4.jpg', 40, '2021-06-23 16:42:25', '2021-06-23 16:42:40'),
('P0000080', 3, 8, 'Kiara', 'Nuevo en Monni!, Por que ustedes lo pidieron, Jean Kiara son taloneros y modelo colombiano. Material: Stresh.', 2, 2, 2, 2, 2, 2, 2, 'P0000080-1.jpg', 'P0000080-2.jpg', 'P0000080-3.jpg', 'P0000080-4.jpg', 40, '2021-06-23 16:43:53', '2021-06-23 16:44:11'),
('P0000081', 3, 9, 'Liceth', 'Nuevo en Monni!, Modelo Liceth, cuenta con levanta pompis y detalles de bordados. Material: Stresh, tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000081-1.jpg', 'P0000081-2.jpg', 'P0000081-3.jpg', 'P0000081-4.jpg', 45, '2021-06-23 16:45:23', '2021-06-23 16:45:39'),
('P0000082', 3, 29, 'Liceth', 'Nuevo en Monni!, Modelo Liceth, cuenta con levanta pompis y detalles de bordados. Material: Stresh, tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000082-1.jpg', 'P0000082-2.jpg', 'P0000082-3.jpg', 'P0000082-4.jpg', 45, '2021-06-23 16:46:18', '2021-06-23 16:46:32'),
('P0000083', 3, 2, 'Liceth', 'Nuevo en Monni!, Modelo Liceth, cuenta con levanta pompis y detalles de bordados. Material: Stresh, tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000083-1.jpg', 'P0000083-2.jpg', 'P0000083-3.jpg', 'P0000083-4.jpg', 45, '2021-06-23 16:47:50', '2021-06-23 16:48:04'),
('P0000084', 3, 17, 'Liceth', 'Nuevo en Monni!, Modelo Liceth, cuenta con levanta pompis y detalles de bordados. Material: Stresh, tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000084-1.jpg', 'P0000084-2.jpg', 'P0000084-3.jpg', 'P0000084-4.jpg', 45, '2021-06-23 16:48:44', '2021-06-23 16:49:02'),
('P0000085', 3, 29, 'Safrina', 'Jeans rasgados entallados, modelo colombiano con corte pretina. Material: Stresh.', 2, 2, 2, 2, 2, 2, 2, 'P0000085-1.jpg', 'P0000085-2.jpg', 'P0000085-3.jpg', 'P0000085-4.jpg', 45, '2021-06-23 16:49:54', '2021-06-23 16:50:10'),
('P0000086', 3, 2, 'Safrina', 'Jeans rasgados entallados, modelo colombiano con corte pretina. Material: Stresh.', 2, 2, 2, 2, 2, 2, 2, 'P0000086-1.jpg', 'P0000086-2.jpg', 'P0000086-3.jpg', 'P0000086-4.jpg', 45, '2021-06-23 16:50:52', '2021-06-23 16:51:10'),
('P0000087', 3, 9, 'Safrina', 'Jeans rasgados entallados, modelo colombiano con corte pretina. Material: Stresh.', 2, 2, 2, 2, 2, 2, 2, 'P0000087-1.jpg', 'P0000087-2.jpg', 'P0000087-3.jpg', 'P0000087-4.jpg', 45, '2021-06-23 16:52:29', '2021-06-23 16:52:49'),
('P0000088', 3, 6, 'Safrina', 'Jeans rasgados entallados, modelo colombiano con corte pretina. Material: Stresh.', 2, 2, 2, 2, 2, 2, 2, 'P0000088-1.jpg', 'P0000088-2.jpg', 'P0000088-3.jpg', 'P0000088-4.jpg', 45, '2021-06-23 16:53:25', '2021-06-23 16:53:42'),
('P0000089', 3, 29, 'Campana', 'Volvió lo retro!, Jeans campana, colores disponibles para ti.', 2, 2, 2, 2, 2, 2, 2, 'P0000089-1.jpg', 'P0000089-2.jpg', 'P0000089-3.jpg', 'P0000089-4.jpg', 45, '2021-06-23 16:55:14', '2021-06-23 16:55:30'),
('P0000090', 3, 9, 'Campana', 'Volvió lo retro!, Jeans campana, colores disponibles para ti.', 2, 2, 2, 2, 2, 2, 2, 'P0000090-1.jpg', 'P0000090-2.jpg', 'P0000090-3.jpg', 'P0000090-4.jpg', 45, '2021-06-23 17:00:13', '2021-06-23 17:00:30'),
('P0000091', 3, 6, 'Campana', 'Volvió lo retro!, Jeans campana, colores disponibles para ti.', 2, 2, 2, 2, 2, 2, 2, 'P0000091-1.jpg', 'P0000091-2.jpg', 'P0000091-3.jpg', 'P0000091-4.jpg', 45, '2021-06-23 17:01:08', '2021-06-23 17:01:25'),
('P0000092', 3, 17, 'Skinny', 'Infaltables en tu armario, combinalos como quieras. Tallas y colores jean disponibles', 2, 2, 2, 2, 2, 2, 2, 'P0000092-1.jpg', 'P0000092-2.jpg', 'P0000092-3.jpg', 'P0000092-4.jpg', 35, '2021-06-23 17:02:31', '2021-06-23 17:02:47'),
('P0000093', 3, 7, 'Skinny', 'Infaltables en tu armario, combinalos como quieras. Tallas y colores jean disponibles', 2, 2, 2, 2, 2, 2, 2, 'P0000093-1.jpg', 'P0000093-2.jpg', 'P0000093-3.jpg', 'P0000093-4.jpg', 35, '2021-06-23 17:03:42', '2021-06-23 17:03:57'),
('P0000094', 3, 29, 'Skinny', 'Infaltables en tu armario, combinalos como quieras. Tallas y colores jean disponibles', 2, 2, 2, 2, 2, 2, 2, 'P0000094-1.jpg', 'P0000094-2.jpg', 'P0000094-3.jpg', 'P0000094-4.jpg', 35, '2021-06-23 17:04:55', '2021-06-23 17:05:15'),
('P0000095', 3, 17, 'Zoyla', 'Semi fajero, con bordados. Cuenta con rasgado en la parte inferior.', 2, 2, 2, 2, 2, 2, 2, 'P0000095-1.jpg', 'P0000095-2.jpg', 'P0000095-3.jpg', 'P0000095-4.jpg', 45, '2021-06-23 17:06:38', '2021-06-23 17:06:57'),
('P0000096', 3, 2, 'Zoyla', 'Semi fajero, con bordados. Cuenta con rasgado en la parte inferior.', 2, 2, 2, 2, 2, 2, 2, 'P0000096-1.jpg', 'P0000096-2.jpg', 'P0000096-3.jpg', 'P0000096-4.jpg', 45, '2021-06-23 17:07:33', '2021-06-23 17:07:54'),
('P0000097', 3, 8, 'Zoyla', 'Semi fajero, con bordados. Cuenta con rasgado en la parte inferior.', 2, 2, 2, 2, 2, 2, 2, 'P0000097-1.jpg', 'P0000097-2.jpg', 'P0000097-3.jpg', 'P0000097-4.jpg', 45, '2021-06-23 17:08:34', '2021-06-23 17:08:52'),
('P0000098', 3, 6, 'Zoyla', 'Semi fajero, con bordados. Cuenta con rasgado en la parte inferior.', 2, 2, 2, 2, 2, 2, 2, 'P0000098-1.jpg', 'P0000098-2.jpg', 'P0000098-3.jpg', 'P0000098-4.jpg', 45, '2021-06-23 17:09:24', '2021-06-23 17:09:40'),
('P0000099', 3, 5, 'Mom Bordado', 'Mom Jeans en cólores básicos, bordado en la parte inferior.', 2, 2, 2, 2, 2, 2, 2, 'P0000099-1.jpg', 'P0000099-2.jpg', 'P0000099-3.jpg', 'P0000099-4.jpg', 50, '2021-06-23 17:11:07', '2021-06-23 17:11:24'),
('P0000100', 3, 9, 'Mom Bordado', 'Mom Jeans en cólores básicos, bordado en la parte inferior.', 2, 2, 2, 2, 2, 2, 2, 'P0000100-1.jpg', 'P0000100-2.jpg', 'P0000100-3.jpg', 'P0000100-4.jpg', 50, '2021-06-23 17:21:01', '2021-06-23 17:21:19'),
('P0000101', 3, 28, 'Mom Bordado', 'Mom Jeans en cólores básicos, bordado en la parte inferior.', 2, 2, 2, 2, 2, 2, 2, 'P0000101-1.jpg', 'P0000101-2.jpg', 'P0000101-3.jpg', 'P0000101-4.jpg', 50, '2021-06-23 17:22:19', '2021-06-23 17:22:34'),
('P0000102', 3, 29, 'Mom Margarita', 'Mom Jeansen colores básicos, costuras de margaritas en el jean y cuenta con bordado en la parte inferior.', 2, 2, 2, 2, 2, 2, 2, 'P0000102-1.jpg', 'P0000102-2.jpg', 'P0000102-3.jpg', 'P0000102-4.jpg', 50, '2021-06-23 17:23:46', '2021-06-23 17:24:02'),
('P0000103', 3, 9, 'Mom Margarita', 'Mom Jeansen colores básicos, costuras de margaritas en el jean y cuenta con bordado en la parte inferior.', 2, 2, 2, 2, 2, 2, 2, 'P0000103-1.jpg', 'P0000103-2.jpg', 'P0000103-3.jpg', 'P0000103-4.jpg', 50, '2021-06-23 17:25:17', '2021-06-23 17:25:36'),
('P0000104', 3, 28, 'Mom Margarita', 'Mom Jeansen colores básicos, costuras de margaritas en el jean y cuenta con bordado en la parte inferior.', 2, 2, 2, 2, 2, 2, 2, 'P0000104-1.jpg', 'P0000104-2.jpg', 'P0000104-3.jpg', 'P0000104-4.jpg', 50, '2021-06-23 17:26:10', '2021-06-23 17:26:26'),
('P0000105', 3, 6, 'Mom Rose', 'Mom Jeans bordados en colores básicos, cosura de rosas en la parte derecha del jean.', 2, 2, 2, 2, 2, 2, 2, 'P0000105-1.jpg', 'P0000105-2.jpg', 'P0000105-3.jpg', 'P0000105-4.jpg', 50, '2021-06-23 17:27:16', '2021-06-23 17:27:30'),
('P0000106', 3, 28, 'Mom Rose', 'Mom Jeans bordados en colores básicos, cosura de rosas en la parte derecha del jean.', 2, 2, 2, 2, 2, 2, 2, 'P0000106-1.jpg', 'P0000106-2.jpg', 'P0000106-3.jpg', 'P0000106-4.jpg', 50, '2021-06-23 17:28:11', '2021-06-23 17:28:31'),
('P0000107', 3, 9, 'Mom Rose', 'Mom Jeans bordados en colores básicos, cosura de rosas en la parte derecha del jean.', 2, 2, 2, 2, 2, 2, 2, 'P0000107-1.jpg', 'P0000107-2.jpg', 'P0000107-3.jpg', 'P0000107-4.jpg', 50, '2021-06-23 17:29:08', '2021-06-23 17:29:31'),
('P0000108', 3, 5, 'Mom Stefania', 'Mom Jeans con lazo para mejor ajuste y darle una mejor presentación, en cuatro colores disponibles. Material Rígido.', 2, 2, 2, 2, 2, 2, 2, 'P0000108-1.jpg', 'P0000108-2.jpg', 'P0000108-3.jpg', 'P0000108-4.jpg', 50, '2021-06-23 17:31:12', '2021-06-23 17:38:40'),
('P0000109', 3, 28, 'Mom Stefania', 'Mom Jeans con lazo para mejor ajuste y darle una mejor presentación, en cuatro colores disponibles. Material Rígido.', 2, 2, 2, 2, 2, 2, 2, 'P0000109-1.jpg', 'P0000109-2.jpg', 'P0000109-3.jpg', 'P0000109-4.jpg', 50, '2021-06-23 17:39:42', '2021-06-23 17:39:56'),
('P0000110', 3, 2, 'Mom Stefania', 'Mom Jeans con lazo para mejor ajuste y darle una mejor presentación, en cuatro colores disponibles. Material Rígido.', 2, 2, 2, 2, 2, 2, 2, 'P0000110-1.jpg', 'P0000110-2.jpg', 'P0000110-3.jpg', 'P0000110-4.jpg', 50, '2021-06-23 17:40:35', '2021-06-23 17:40:53'),
('P0000111', 4, 28, 'BFF', 'Jogger jean con rasgado. Material Stresh', 2, 2, 2, 2, 2, 2, 2, 'P0000111-1.jpg', 'P0000111-2.jpg', 'P0000111-3.jpg', 'P0000111-4.jpg', 45, '2021-06-23 18:45:23', '2021-06-23 18:45:42'),
('P0000112', 4, 9, 'BFF', 'Jogger jean con rasgado. Material Stresh', 2, 2, 2, 2, 2, 2, 2, 'P0000112-1.jpg', 'P0000112-2.jpg', 'P0000112-3.jpg', 'P0000112-4.jpg', 45, '2021-06-23 18:46:17', '2021-06-23 18:46:55'),
('P0000113', 4, 7, 'BFF', 'Jogger jean con rasgado. Material Stresh', 2, 2, 2, 2, 2, 2, 2, 'P0000113-1.jpg', 'P0000113-2.jpg', 'P0000113-3.jpg', 'P0000113-4.jpg', 45, '2021-06-23 18:47:33', '2021-06-23 18:47:50'),
('P0000114', 4, 6, 'BFF Jardinero', 'Jogger jean con rasgado, bordado en la parte superior para mejor ajuste. Material Stresh', 2, 2, 2, 2, 2, 2, 2, 'P0000114-1.jpg', 'P0000114-2.jpg', 'P0000114-3.jpg', 'P0000114-4.jpg', 50, '2021-06-23 18:48:42', '2021-06-23 18:49:04'),
('P0000115', 4, 9, 'BFF Jardinero', 'Jogger jean con rasgado, bordado en la parte superior para mejor ajuste. Material Stresh', 2, 2, 2, 2, 2, 2, 2, 'P0000115-1.jpg', 'P0000115-2.jpg', 'P0000115-3.jpg', 'P0000115-4.jpg', 50, '2021-06-23 18:49:45', '2021-06-23 18:50:00'),
('P0000116', 4, 7, 'BFF Jardinero', 'Jogger jean con rasgado, bordado en la parte superior para mejor ajuste. Material Stresh', 2, 2, 2, 2, 2, 2, 2, 'P0000116-1.jpg', 'P0000116-2.jpg', 'P0000116-3.jpg', 'P0000116-4.jpg', 50, '2021-06-23 18:50:40', '2021-06-23 18:51:02'),
('P0000117', 4, 9, 'Cargo', 'Jogger Cargo Jeans, disponible en cuatro tonos.', 2, 2, 2, 2, 2, 2, 2, 'P0000117-1.jpg', 'P0000117-2.jpg', 'P0000117-3.jpg', 'P0000117-4.jpg', 40, '2021-06-23 18:52:04', '2021-06-23 18:52:26'),
('P0000118', 4, 7, 'Cargo', 'Jogger Cargo Jeans, disponible en cuatro tonos.', 2, 2, 2, 2, 2, 2, 2, 'P0000118-1.jpg', 'P0000118-2.jpg', 'P0000118-3.jpg', 'P0000118-4.jpg', 40, '2021-06-23 18:53:04', '2021-06-23 18:53:27'),
('P0000119', 4, 6, 'Cargo', 'Jogger Cargo Jeans, disponible en cuatro tonos.', 2, 2, 2, 2, 2, 2, 2, 'P0000119-1.jpg', 'P0000119-2.jpg', 'P0000119-3.jpg', 'P0000119-4.jpg', 40, '2021-06-23 18:54:02', '2021-06-23 18:54:25'),
('P0000120', 4, 20, 'Mom', 'Jogger sueltos, en colores disponibles. Material rígido, tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000120-1.jpg', 'P0000120-2.jpg', 'P0000120-3.jpg', 'P0000120-4.jpg', 45, '2021-06-23 18:55:31', '2021-06-23 18:55:54'),
('P0000121', 4, 26, 'Mom', 'Jogger sueltos, en colores disponibles. Material rígido, tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000121-1.jpg', 'P0000121-2.jpg', 'P0000121-3.jpg', 'P0000121-4.jpg', 45, '2021-06-23 18:56:40', '2021-06-23 18:56:55'),
('P0000122', 4, 2, 'Mom', 'Jogger sueltos, en colores disponibles. Material rígido, tela nacional.', 2, 2, 2, 2, 2, 2, 2, 'P0000122-1.jpg', 'P0000122-2.jpg', 'P0000122-3.jpg', 'P0000122-4.jpg', 45, '2021-06-23 18:57:34', '2021-06-23 18:57:50'),
('P0000123', 4, 30, 'Mia', 'Jogger afranelado para mejor comodidad, Disponible en cuatro colores.', 2, 2, 2, 2, 2, 2, 2, 'P0000123-1.jpg', 'P0000123-2.jpg', 'P0000123-3.jpg', 'P0000123-4.jpg', 40, '2021-06-23 18:58:39', '2021-06-23 18:58:58'),
('P0000124', 4, 31, 'Mia', 'Jogger afranelado para mejor comodidad, Disponible en cuatro colores.', 2, 2, 2, 2, 2, 2, 2, 'P0000124-1.jpg', 'P0000124-2.jpg', 'P0000124-3.jpg', 'P0000124-4.jpg', 40, '2021-06-23 18:59:39', '2021-06-23 18:59:58'),
('P0000125', 4, 32, 'Mia', 'Jogger afranelado para mejor comodidad, Disponible en cuatro colores.', 2, 2, 2, 2, 2, 2, 2, 'P0000125-1.jpg', 'P0000125-2.jpg', 'P0000125-3.jpg', 'P0000125-4.jpg', 40, '2021-06-23 19:00:34', '2021-06-23 19:00:52'),
('P0000126', 4, 33, 'Mia', 'Jogger afranelado para mejor comodidad, Disponible en cuatro colores.', 2, 2, 2, 2, 2, 2, 2, 'P0000126-1.jpg', 'P0000126-2.jpg', 'P0000126-3.jpg', 'P0000126-4.jpg', 40, '2021-06-23 19:01:31', '2021-06-23 19:01:46'),
('P0000127', 4, 19, 'Mia', 'Jogger afranelado para mejor comodidad, Disponible en cuatro colores.', 2, 2, 2, 2, 2, 2, 2, 'P0000127-1.jpg', 'P0000127-2.jpg', 'P0000127-3.jpg', 'P0000127-4.jpg', 40, '2021-06-23 19:02:23', '2021-06-23 19:02:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_category`
--

CREATE TABLE `product_category` (
  `PRODUCT_CATEGORY_ID` int(11) NOT NULL,
  `PRODUCT_CATEGORY_NAME` varchar(100) NOT NULL,
  `DT_REGISTRY` datetime NOT NULL DEFAULT current_timestamp(),
  `DT_UPDATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `product_category`
--

INSERT INTO `product_category` (`PRODUCT_CATEGORY_ID`, `PRODUCT_CATEGORY_NAME`, `DT_REGISTRY`, `DT_UPDATE`) VALUES
(1, 'Casaca', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(2, 'Conjunto', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(3, 'Jean', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(4, 'Jogger', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(5, 'Overall', '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
(6, 'Short', '2021-06-14 23:55:13', '2021-06-14 23:55:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restpswd`
--

CREATE TABLE `restpswd` (
  `REST_PWD_ID` int(11) NOT NULL,
  `REST_EMAIL` text NOT NULL,
  `REST_SELECTOR` text NOT NULL,
  `REST_TOKEN` longtext NOT NULL,
  `REST_EXPIRE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `restpswd`
--

INSERT INTO `restpswd` (`REST_PWD_ID`, `REST_EMAIL`, `REST_SELECTOR`, `REST_TOKEN`, `REST_EXPIRE`) VALUES
(1, '2021monni@gmail.com', 'f829d07cfe0057c2', '$2y$10$D9DfabMrDLHuL4rRyCYr/uBIJtAcHgWIHB8L8DW0W6WCbL2RbV0ya', '1623800326');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `SALE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `TRANSACTION_KEY` varchar(250) NOT NULL,
  `PAYPAL_DATA` text NOT NULL,
  `MAIL` varchar(5000) NOT NULL,
  `TOTAL` decimal(60,0) NOT NULL,
  `STATUS` int(11) NOT NULL DEFAULT 0,
  `DT_REGISTRY` datetime NOT NULL DEFAULT current_timestamp(),
  `DT_UPDATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_detail`
--

CREATE TABLE `sales_detail` (
  `SALE_DETAIL_ID` int(11) NOT NULL,
  `SALE_ID` int(11) NOT NULL,
  `PRODUCT_ID` varchar(250) NOT NULL,
  `SIZE_SOLD` char(1) NOT NULL,
  `QUANTITY_SOLD` int(11) NOT NULL,
  `UNIT_PRICE` int(11) NOT NULL,
  `SALE_DETAIL_TOTAL` int(11) NOT NULL,
  `DT_REGISTRY` datetime NOT NULL DEFAULT current_timestamp(),
  `DT_UPDATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `USER_ID` int(11) NOT NULL,
  `USER_NAMES` varchar(250) NOT NULL,
  `USER_SURNAMES` varchar(250) NOT NULL,
  `USER_EMAIL` varchar(250) NOT NULL,
  `USER_PASSWORD` varchar(250) NOT NULL,
  `USER_ADDRESS` varchar(250) NOT NULL,
  `USER_PHONE` varchar(250) NOT NULL,
  `USER_TYPE` char(1) NOT NULL DEFAULT '1',
  `USER_ACCOUNT_VERIFIED` char(1) NOT NULL,
  `DT_REGISTRY` datetime NOT NULL DEFAULT current_timestamp(),
  `DT_UPDATE` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`USER_ID`, `USER_NAMES`, `USER_SURNAMES`, `USER_EMAIL`, `USER_PASSWORD`, `USER_ADDRESS`, `USER_PHONE`, `USER_TYPE`, `USER_ACCOUNT_VERIFIED`, `DT_REGISTRY`, `DT_UPDATE`) VALUES
(1, 'admin', 'monni', '2021monni@gmail.com', '0192023a7bbd73250516f069df18b500', 'Monni', '666666666', '1', '1', '2021-06-14 23:55:13', '2021-06-14 23:55:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`COLOR_ID`);

--
-- Indices de la tabla `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`ORDER_DETAIL_ID`),
  ADD KEY `USER_ID` (`USER_ID`),
  ADD KEY `SALE_ID` (`SALE_ID`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`PRODUCT_ID`),
  ADD KEY `PRODUCT_CATEGORY_ID` (`PRODUCT_CATEGORY_ID`),
  ADD KEY `COLOR_ID` (`COLOR_ID`);

--
-- Indices de la tabla `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`PRODUCT_CATEGORY_ID`);

--
-- Indices de la tabla `restpswd`
--
ALTER TABLE `restpswd`
  ADD PRIMARY KEY (`REST_PWD_ID`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`SALE_ID`),
  ADD KEY `USER_ID` (`USER_ID`);

--
-- Indices de la tabla `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD PRIMARY KEY (`SALE_DETAIL_ID`),
  ADD KEY `SALE_ID` (`SALE_ID`),
  ADD KEY `PRODUCT_ID` (`PRODUCT_ID`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`USER_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `restpswd`
--
ALTER TABLE `restpswd`
  MODIFY `REST_PWD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`SALE_ID`) REFERENCES `sales` (`SALE_ID`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`PRODUCT_CATEGORY_ID`) REFERENCES `product_category` (`PRODUCT_CATEGORY_ID`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`COLOR_ID`) REFERENCES `colors` (`COLOR_ID`);

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`USER_ID`);

--
-- Filtros para la tabla `sales_detail`
--
ALTER TABLE `sales_detail`
  ADD CONSTRAINT `sales_detail_ibfk_1` FOREIGN KEY (`SALE_ID`) REFERENCES `sales` (`SALE_ID`),
  ADD CONSTRAINT `sales_detail_ibfk_2` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `products` (`PRODUCT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
