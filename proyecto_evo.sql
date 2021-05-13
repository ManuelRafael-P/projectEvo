-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2021 a las 05:07:42
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

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
  `COLOR_NAME` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `ORDER_STATUS` varchar(250) NOT NULL,
  `REGISTRATION_DATE` date NOT NULL,
  `DELIVERY_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `PRODUCT_ID` varchar(250) NOT NULL,
  `PRODUCT_CATEGORY_ID` int(11) NOT NULL,
  `PRODUCT_NAME` varchar(250) NOT NULL,
  `PRODUCT_DESCRIPTION` varchar(250) NOT NULL,
  `STOCK_SIZE_XXS` int(3) NOT NULL,
  `STOCK_SIZE_XS` int(3) NOT NULL,
  `STOCK_SIZE_S` int(3) NOT NULL,
  `STOCK_SIZE_M` int(3) NOT NULL,
  `STOCK_SIZE_L` int(3) NOT NULL,
  `STOCK_SIZE_XL` int(3) NOT NULL,
  `STOCK_SIZE_XXL` int(3) NOT NULL,
  `COLOR_ID` int(11) NOT NULL,
  `PRODUCT_IMAGE_1` varchar(200) NOT NULL,
  `PRODUCT_IMAGE_2` varchar(200) NOT NULL,
  `PRODUCT_IMAGE_3` varchar(200) NOT NULL,
  `PRODUCT_IMAGE_4` varchar(200) NOT NULL,
  `CREATION_DATE` date NOT NULL,
  `PRODUCT_PRICE` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_category`
--

CREATE TABLE `product_category` (
  `PRODUCT_CATEGORY_ID` int(11) NOT NULL,
  `PRODUCT_CATEGORY_NAME` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(0, 'manuelrafael2097@gmail.com', 'f79153ac5651ec71', '$2y$10$uO8O.jI2GH6ek3GuLr9hU.NvFSzAWAKCWIL8tj7UelCSqhehF3YUe', '1618789101');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `SALE_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL,
  `TRANSACTION_KEY` varchar(250) NOT NULL,
  `PAYPAL_DATA` text NOT NULL,
  `DATE` date NOT NULL,
  `MAIL` varchar(5000) NOT NULL,
  `TOTAL` decimal(60,0) NOT NULL,
  `STATUS` varchar(250) NOT NULL
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
  `QUANTIY_SOLD` int(11) NOT NULL,
  `SALE_DATE` date NOT NULL,
  `UNIT_PRICE` int(11) NOT NULL,
  `SALE_DETAIL_TOTAL` int(11) NOT NULL
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
  `USER_TYPE` char(1) NOT NULL,
  `USER_ACCOUNT_VERIFIED` char(1) NOT NULL,
  `USER_REGISTRATION_DATE` date NOT NULL DEFAULT current_timestamp(),
  `USER_UPDATED_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`USER_ID`, `USER_NAMES`, `USER_SURNAMES`, `USER_EMAIL`, `USER_PASSWORD`, `USER_ADDRESS`, `USER_PHONE`, `USER_TYPE`, `USER_ACCOUNT_VERIFIED`, `USER_REGISTRATION_DATE`, `USER_UPDATED_DATE`) VALUES
(1, 'Manuel', 'Rafael', 'manuelrafael2097@gmail.com', '202cb962ac59075b964b07152d234b70', 'Av.Comas', '111123456', '1', '1', '0000-00-00', '0000-00-00');

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
