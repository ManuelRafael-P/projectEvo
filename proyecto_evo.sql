-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2021 a las 05:07:36
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
(21, 'Blanco', '2021-06-14 23:55:13', '2021-06-14 23:55:13');

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
('P0000006', 1, 6, 'Boyfriend', 'Material Sauve y stresh. ¡Disponible en cuatro colores!, combinalas como quieras.', 2, 2, 2, 2, 2, 2, 2, 'P0000006-1.jpg', 'P0000006-2.jpg', 'P0000006-3.jpg', 'P0000006-4.jpg', 45, '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
('P0000007', 1, 7, 'Boyfriend', 'Material Sauve y stresh. ¡Disponible en cuatro colores!, combinalas como quieras.', 2, 2, 2, 2, 2, 2, 2, 'P0000007-1.jpg', 'P0000007-2.jpg', 'P0000007-3.jpg', 'P0000007-4.jpg', 45, '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
('P0000008', 1, 8, 'Boyfriend', 'Material Sauve y stresh. ¡Disponible en cuatro colores!, combinalas como quieras.', 2, 2, 2, 2, 2, 2, 2, 'P0000008-1.jpg', 'P0000008-2.jpg', 'P0000008-3.jpg', 'P0000008-4.jpg', 45, '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
('P0000009', 1, 5, 'Clasica', 'Material Rígido. En tus tonos favoritos, Denim100%', 2, 2, 2, 2, 2, 2, 2, 'P0000009-1.jpg', 'P0000009-2.jpg', 'P0000009-3.jpg', 'P0000009-4.jpg', 40, '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
('P0000010', 1, 6, 'Clasica', 'Material Rígido. En tus tonos favoritos, Denim100%', 2, 2, 2, 2, 2, 2, 2, 'P0000010-1.jpg', 'P0000010-2.jpg', 'P0000010-3.jpg', 'P0000010-4.jpg', 40, '2021-06-14 23:55:13', '2021-06-14 23:55:13'),
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
('P0000045', 1, 19, 'Crop Fringes', 'Disponible en colores, colores suaves para que puedas combinarlo como quieras en esta temporada.', 2, 2, 2, 2, 2, 2, 2, 'P0000045-1.jpg', 'P0000045-2.jpg', 'P0000045-3.jpg', 'P0000045-4.jpg', 50, '2021-06-15 19:51:48', '2021-06-15 19:52:07'),
('P0000046', 1, 20, 'Crop Fringes', 'Disponible en colores, colores suaves para que puedas combinarlo como quieras en esta temporada.', 2, 2, 2, 2, 2, 2, 2, 'P0000046-1.jpg', 'P0000046-2.jpg', 'P0000046-3.jpg', 'P0000046-4.jpg', 50, '2021-06-15 19:53:20', '2021-06-15 19:53:36'),
('P0000047', 1, 21, 'Crop Fringes', 'Disponible en colores, colores suaves para que puedas combinarlo como quieras en esta temporada.', 2, 2, 2, 2, 2, 2, 2, 'P0000047-1.jpg', 'P0000047-2.jpg', 'P0000047-3.jpg', 'P0000047-4.jpg', 50, '2021-06-15 19:54:28', '2021-06-15 19:54:45'),
('P0000048', 1, 2, 'Crop Fringes', 'Disponible en colores, colores suaves para que puedas combinarlo como quieras en esta temporada.', 2, 2, 2, 2, 2, 2, 2, 'P0000048-1.jpg', 'P0000048-2.jpg', 'P0000048-3.jpg', 'P0000048-4.jpg', 50, '2021-06-15 19:55:35', '2021-06-15 19:55:53'),
('P0000049', 1, 6, 'Parkas', 'Listas para acompañarte toda esta estación otoño-invierno. Material: Jean y tela, forrado con tela peluche.', 2, 2, 2, 2, 2, 2, 2, 'P0000049-1.jpg', 'P0000049-2.jpg', 'P0000049-3.jpg', 'P0000049-4.jpg', 65, '2021-06-15 19:57:02', '2021-06-15 19:57:19'),
('P0000050', 1, 7, 'Parkas', 'Listas para acompañarte toda esta estación otoño-invierno. Material: Jean y tela, forrado con tela peluche.', 2, 2, 2, 2, 2, 2, 2, 'P0000050-1.jpg', 'P0000050-2.jpg', 'P0000050-3.jpg', 'P0000050-4.jpg', 65, '2021-06-15 19:58:48', '2021-06-15 19:59:06'),
('P0000051', 1, 1, 'Parkas', 'Listas para acompañarte toda esta estación otoño-invierno. Material: Jean y tela, forrado con tela peluche.', 2, 2, 2, 2, 2, 2, 2, 'P0000051-1.jpg', 'P0000051-2.jpg', 'P0000051-3.jpg', 'P0000051-4.jpg', 65, '2021-06-15 19:59:52', '2021-06-15 20:00:14');

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
  `SIZE_SOLD` char(5) NOT NULL,
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

