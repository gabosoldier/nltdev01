-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-01-2020 a las 17:42:22
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `racuzalab`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aerix`
--

CREATE TABLE `aerix` (
  `id` int(11) NOT NULL,
  `dev_id` varchar(10) NOT NULL,
  `temperatura` decimal(5,2) DEFAULT NULL,
  `luz` decimal(5,2) DEFAULT NULL,
  `humedad` decimal(5,2) DEFAULT NULL,
  `amoniaco` int(11) DEFAULT NULL,
  `uv` decimal(5,2) DEFAULT NULL,
  `fecha` varchar(15) DEFAULT NULL,
  `hora` varchar(15) DEFAULT NULL,
  `disp_tipo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aerix`
--

INSERT INTO `aerix` (`id`, `dev_id`, `temperatura`, `luz`, `humedad`, `amoniaco`, `uv`, `fecha`, `hora`, `disp_tipo_id`) VALUES
(1, 'NL01O0001', '23.59', '131.97', '36.13', 0, '0.01', '21/01/2020', '05:01:00', 1),
(2, 'NL01O0001', '23.54', '130.24', '35.55', 0, '0.00', '21/01/2020', '05:01:00', 1),
(3, 'NL01O0001', '23.69', '133.34', '35.00', 0, '0.00', '21/01/2020', '06:01:00', 1),
(4, 'NL01O0001', '23.69', '132.70', '34.55', 0, '0.00', '21/01/2020', '06:01:00', 1),
(5, 'NL01O0001', '23.67', '132.53', '34.53', 0, '0.00', '21/01/2020', '06:01:00', 1),
(6, 'NL01O0001', '23.68', '134.26', '34.53', 0, '0.00', '21/01/2020', '06:01:00', 1),
(7, 'NL01O0001', '23.68', '134.26', '34.53', 0, '0.00', '21/01/2020', '06:01:00', 1),
(8, 'NL01O0001', '25.17', '113.60', '33.19', 0, '0.00', '23/01/2020', '09:01:00', 1),
(9, 'NL01O0001', '24.01', '33.02', '44.53', 0, '0.00', '24/01/2020', '02:01:00', 1),
(10, 'NL01O0001', '24.88', '8.00', '41.00', 0, '0.00', '25/01/2020', '01:01:00', 1),
(11, 'NL01O0001', '25.07', '7.96', '40.29', 0, '0.00', '25/01/2020', '01:01:00', 1),
(12, 'NL01O0001', '25.50', '4.00', '36.08', 0, '0.00', '25/01/2020', '03:01:00', 1),
(13, 'NL01O0001', '25.50', '4.00', '36.08', 0, '0.00', '25/01/2020', '03:01:00', 1),
(14, 'NL01O0001', '25.50', '4.00', '36.00', 0, '0.00', '25/01/2020', '03:01:00', 1),
(15, 'NL01O0001', '25.50', '4.00', '35.95', 0, '0.00', '25/01/2020', '04:01:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `id` varchar(10) NOT NULL,
  `id_nombre` int(11) NOT NULL,
  `seccion` varchar(20) NOT NULL,
  `fecha` varchar(10) DEFAULT NULL,
  `hora` varchar(10) DEFAULT NULL,
  `usuario_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dispositivo`
--

INSERT INTO `dispositivo` (`id`, `id_nombre`, `seccion`, `fecha`, `hora`, `usuario_id`) VALUES
('NL01O0001', 1, 'Norte', '25/01/2020', '04:01:00', 'admin'),
('NL01P0001', 2, 'Sur', '24/01/2020', '02:01:00', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `disp_tipo`
--

CREATE TABLE `disp_tipo` (
  `id` int(11) NOT NULL,
  `dispositivo_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `disp_tipo`
--

INSERT INTO `disp_tipo` (`id`, `dispositivo_id`) VALUES
(19, 'NL01O0001'),
(20, 'NL01O0001'),
(21, 'NL01O0001'),
(22, 'NL01O0001'),
(23, 'NL01O0001'),
(25, 'NL01O0001'),
(26, 'NL01O0001'),
(27, 'NL01O0001'),
(28, 'NL01O0001'),
(30, 'NL01O0001'),
(66, 'NL01O0001'),
(68, 'NL01O0001'),
(69, 'NL01O0001'),
(70, 'NL01O0001'),
(71, 'NL01O0001'),
(72, 'NL01O0001'),
(73, 'NL01O0001'),
(1, 'NL01P0001'),
(2, 'NL01P0001'),
(3, 'NL01P0001'),
(4, 'NL01P0001'),
(5, 'NL01P0001'),
(6, 'NL01P0001'),
(7, 'NL01P0001'),
(8, 'NL01P0001'),
(9, 'NL01P0001'),
(10, 'NL01P0001'),
(11, 'NL01P0001'),
(12, 'NL01P0001'),
(13, 'NL01P0001'),
(14, 'NL01P0001'),
(15, 'NL01P0001'),
(16, 'NL01P0001'),
(17, 'NL01P0001'),
(18, 'NL01P0001'),
(24, 'NL01P0001'),
(29, 'NL01P0001'),
(31, 'NL01P0001'),
(32, 'NL01P0001'),
(33, 'NL01P0001'),
(34, 'NL01P0001'),
(35, 'NL01P0001'),
(36, 'NL01P0001'),
(37, 'NL01P0001'),
(38, 'NL01P0001'),
(39, 'NL01P0001'),
(40, 'NL01P0001'),
(41, 'NL01P0001'),
(42, 'NL01P0001'),
(43, 'NL01P0001'),
(44, 'NL01P0001'),
(45, 'NL01P0001'),
(46, 'NL01P0001'),
(47, 'NL01P0001'),
(48, 'NL01P0001'),
(49, 'NL01P0001'),
(50, 'NL01P0001'),
(51, 'NL01P0001'),
(52, 'NL01P0001'),
(53, 'NL01P0001'),
(54, 'NL01P0001'),
(55, 'NL01P0001'),
(56, 'NL01P0001'),
(57, 'NL01P0001'),
(58, 'NL01P0001'),
(59, 'NL01P0001'),
(60, 'NL01P0001'),
(61, 'NL01P0001'),
(62, 'NL01P0001'),
(63, 'NL01P0001'),
(64, 'NL01P0001'),
(65, 'NL01P0001'),
(67, 'NL01P0001');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `odorix`
--

CREATE TABLE `odorix` (
  `id` int(11) NOT NULL,
  `dev_id` varchar(10) NOT NULL,
  `uv` decimal(5,2) DEFAULT NULL,
  `temperatura` decimal(5,2) DEFAULT NULL,
  `pm10` decimal(5,2) DEFAULT NULL,
  `pm25` decimal(5,2) DEFAULT NULL,
  `ruido_min` decimal(5,2) DEFAULT NULL,
  `ruido_max` decimal(5,2) DEFAULT NULL,
  `luz` decimal(5,2) DEFAULT NULL,
  `ruido_prom` decimal(5,2) DEFAULT NULL,
  `humedad` decimal(5,2) DEFAULT NULL,
  `co2` decimal(6,2) DEFAULT NULL,
  `co` decimal(5,2) DEFAULT NULL,
  `bateria` int(11) DEFAULT NULL,
  `fecha` varchar(15) DEFAULT NULL,
  `hora` varchar(15) DEFAULT NULL,
  `disp_tipo_id` int(11) NOT NULL,
  `aqi` int(11) DEFAULT NULL,
  `aqi_msg` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `odorix`
--

INSERT INTO `odorix` (`id`, `dev_id`, `uv`, `temperatura`, `pm10`, `pm25`, `ruido_min`, `ruido_max`, `luz`, `ruido_prom`, `humedad`, `co2`, `co`, `bateria`, `fecha`, `hora`, `disp_tipo_id`, `aqi`, `aqi_msg`) VALUES
(3, 'NL01P0001', '0.01', '24.38', '13.23', '5.00', '47.00', '72.00', '55.62', '56.60', '30.92', '1.31', '991.58', 100, '20/01/2020', '09:01:00', 1, NULL, NULL),
(4, 'NL01P0001', '0.01', '24.31', '12.00', '5.00', '47.00', '64.00', '70.75', '55.55', '31.56', '1.29', '997.67', 100, '20/01/2020', '09:01:00', 1, NULL, NULL),
(5, 'NL01P0001', '0.01', '24.20', '12.33', '5.00', '48.00', '78.00', '66.00', '62.67', '31.76', '1.28', '962.37', 100, '20/01/2020', '10:01:00', 1, NULL, NULL),
(6, 'NL01P0001', '0.01', '24.20', '12.33', '5.00', '48.00', '78.00', '66.00', '62.67', '31.76', '1.28', '962.37', 100, '20/01/2020', '10:01:00', 1, NULL, NULL),
(7, 'NL01P0001', '0.00', '24.19', '12.08', '4.46', '46.00', '67.00', '54.83', '57.05', '32.08', '1.34', '803.17', 100, '20/01/2020', '10:01:00', 1, 67, 'Satisfactory'),
(8, 'NL01P0001', '0.00', '24.20', '12.38', '4.54', '50.00', '74.00', '54.83', '62.43', '31.72', '1.36', '802.73', 100, '20/01/2020', '10:01:00', 1, 68, 'Satisfactory'),
(9, 'NL01P0001', '0.00', '24.10', '21.04', '5.00', '46.00', '69.00', '54.54', '56.54', '33.96', '1.38', '717.58', 100, '20/01/2020', '10:01:00', 1, 69, 'Satisfactory'),
(10, 'NL01P0001', '0.00', '24.10', '16.71', '4.42', '46.00', '68.00', '51.83', '55.42', '34.41', '1.39', '700.58', 100, '20/01/2020', '10:01:00', 1, 69, 'Satisfactory'),
(11, 'NL01P0001', '0.00', '24.02', '12.92', '4.12', '45.00', '63.00', '45.00', '49.92', '38.22', '1.70', '483.23', 100, '21/01/2020', '12:01:00', 1, 85, 'Satisfactory'),
(12, 'NL01P0001', '0.00', '24.01', '13.28', '4.28', '45.00', '63.00', '45.00', '50.11', '37.96', '1.79', '486.48', 100, '21/01/2020', '12:01:00', 1, 89, 'Satisfactory'),
(13, 'NL01P0001', '0.00', '24.05', '12.96', '4.33', '45.00', '62.00', '0.00', '49.47', '40.09', '1.93', '500.29', 100, '21/01/2020', '12:01:00', 1, 96, 'Satisfactory'),
(14, 'NL01P0001', '0.00', '25.95', '11.31', '4.08', '45.00', '60.00', '56.00', '48.85', '41.64', '1.57', '484.00', 100, '21/01/2020', '02:01:00', 1, 78, 'Satisfactory'),
(15, 'NL01P0001', '0.01', '24.24', '16.56', '4.96', '48.00', '69.00', '139.00', '56.32', '32.68', '1.64', '837.24', 100, '21/01/2020', '03:01:00', 1, 82, 'Satisfactory'),
(16, 'NL01P0001', '0.01', '24.07', '11.81', '4.77', '49.00', '65.00', '146.00', '56.19', '33.37', '1.71', '944.38', 100, '21/01/2020', '04:01:00', 1, 85, 'Satisfactory'),
(17, 'NL01P0001', '0.01', '24.10', '11.85', '4.81', '51.00', '65.00', '148.08', '58.17', '33.14', '1.71', '807.35', 100, '21/01/2020', '06:01:00', 1, 85, 'Satisfactory'),
(18, 'NL01P0001', '0.01', '25.17', '9.83', '3.00', '49.00', '72.00', '133.52', '58.36', '32.60', '2.23', '999.99', 100, '23/01/2020', '09:01:00', 1, 103, 'Moderate'),
(19, 'NL01P0001', '0.01', '25.33', '20.68', '3.88', '51.00', '83.00', '130.24', '68.37', '34.75', '2.09', '924.32', 100, '23/01/2020', '10:01:00', 1, 101, 'Moderate'),
(20, 'NL01P0001', '0.01', '25.33', '13.85', '3.00', '51.00', '77.00', '126.00', '65.84', '35.20', '1.99', '796.81', 100, '23/01/2020', '10:01:00', 1, 99, 'Satisfactory'),
(21, 'NL01P0001', '0.01', '25.58', '12.35', '2.54', '47.00', '68.00', '126.00', '55.70', '38.22', '1.88', '710.38', 100, '23/01/2020', '10:01:00', 1, 94, 'Satisfactory'),
(22, 'NL01P0001', '0.01', '25.64', '10.92', '2.42', '48.00', '72.00', '125.46', '59.42', '37.39', '1.88', '697.46', 100, '23/01/2020', '10:01:00', 1, 94, 'Satisfactory'),
(23, 'NL01P0001', '0.01', '25.50', '11.40', '2.32', '48.00', '68.00', '122.80', '57.37', '35.55', '1.83', '671.92', 100, '23/01/2020', '10:01:00', 1, 91, 'Satisfactory'),
(24, 'NL01P0001', '0.01', '25.46', '10.13', '2.04', '48.00', '68.00', '122.58', '56.44', '35.48', '1.78', '642.29', 100, '23/01/2020', '10:01:00', 1, 89, 'Satisfactory'),
(25, 'NL01P0001', '0.01', '25.42', '9.60', '2.16', '48.00', '73.00', '127.32', '57.51', '35.67', '1.74', '611.64', 100, '23/01/2020', '10:01:00', 1, 87, 'Satisfactory'),
(26, 'NL01P0001', '0.01', '25.37', '9.76', '2.00', '48.00', '69.00', '123.96', '56.12', '36.38', '1.66', '583.44', 100, '23/01/2020', '10:01:00', 1, 83, 'Satisfactory'),
(27, 'NL01P0001', '0.01', '25.37', '9.76', '2.00', '48.00', '69.00', '123.96', '56.12', '36.38', '1.66', '583.44', 100, '23/01/2020', '10:01:00', 1, 83, 'Satisfactory'),
(28, 'NL01P0001', '0.01', '25.37', '9.76', '2.00', '48.00', '69.00', '123.96', '56.12', '36.38', '1.66', '583.44', 100, '23/01/2020', '10:01:00', 1, 83, 'Satisfactory'),
(29, 'NL01P0001', '0.01', '25.34', '9.96', '2.08', '48.00', '61.00', '122.56', '51.60', '35.72', '1.65', '560.68', 100, '23/01/2020', '10:01:00', 1, 82, 'Satisfactory'),
(30, 'NL01P0001', '0.01', '25.34', '9.96', '2.08', '48.00', '61.00', '122.56', '51.60', '35.72', '1.65', '560.68', 100, '23/01/2020', '10:01:00', 1, 82, 'Satisfactory'),
(31, 'NL01P0001', '0.01', '25.34', '9.96', '2.08', '48.00', '61.00', '122.56', '51.60', '35.72', '1.65', '560.68', 100, '23/01/2020', '10:01:00', 1, 82, 'Satisfactory'),
(32, 'NL01P0001', '0.01', '25.31', '11.12', '2.04', '47.00', '64.00', '126.50', '52.33', '35.83', '1.61', '570.62', 100, '23/01/2020', '10:01:00', 1, 80, 'Satisfactory'),
(33, 'NL01P0001', '0.01', '25.26', '10.27', '2.00', '47.00', '66.00', '129.00', '52.82', '36.25', '1.55', '550.12', 100, '23/01/2020', '10:01:00', 1, 77, 'Satisfactory'),
(34, 'NL01P0001', '0.01', '25.26', '10.27', '2.00', '47.00', '66.00', '129.00', '52.82', '36.25', '1.55', '550.12', 100, '23/01/2020', '10:01:00', 1, 77, 'Satisfactory'),
(35, 'NL01P0001', '0.01', '25.23', '9.04', '2.00', '47.00', '65.00', '128.73', '53.52', '35.36', '1.52', '552.58', 100, '23/01/2020', '10:01:00', 1, 76, 'Satisfactory'),
(36, 'NL01P0001', '0.01', '25.19', '14.79', '3.00', '47.00', '68.00', '127.17', '57.52', '35.74', '1.45', '542.54', 100, '23/01/2020', '10:01:00', 1, 72, 'Satisfactory'),
(37, 'NL01P0001', '0.01', '25.19', '14.79', '3.00', '47.00', '68.00', '127.17', '57.52', '35.74', '1.45', '542.54', 100, '23/01/2020', '10:01:00', 1, 72, 'Satisfactory'),
(38, 'NL01P0001', '0.01', '25.18', '17.20', '3.12', '47.00', '73.00', '128.04', '56.36', '35.93', '1.42', '533.68', 100, '23/01/2020', '10:01:00', 1, 71, 'Satisfactory'),
(39, 'NL01P0001', '0.01', '25.18', '17.20', '3.12', '47.00', '73.00', '128.04', '56.36', '35.93', '1.42', '533.68', 100, '23/01/2020', '10:01:00', 1, 71, 'Satisfactory'),
(40, 'NL01P0001', '0.01', '25.18', '17.20', '3.12', '47.00', '73.00', '128.04', '56.36', '35.93', '1.42', '533.68', 100, '23/01/2020', '10:01:00', 1, 71, 'Satisfactory'),
(41, 'NL01P0001', '0.01', '25.18', '15.29', '2.92', '48.00', '67.00', '127.00', '55.24', '37.09', '1.39', '538.92', 100, '23/01/2020', '10:01:00', 1, 69, 'Satisfactory'),
(42, 'NL01P0001', '0.01', '25.39', '11.20', '2.20', '48.00', '65.00', '125.00', '54.59', '40.78', '1.32', '498.68', 100, '23/01/2020', '10:01:00', 1, 66, 'Satisfactory'),
(43, 'NL01P0001', '0.01', '25.50', '12.58', '2.12', '48.00', '62.00', '125.00', '53.19', '41.24', '1.36', '488.00', 100, '23/01/2020', '10:01:00', 1, 68, 'Satisfactory'),
(44, 'NL01P0001', '0.01', '25.50', '12.58', '2.12', '48.00', '62.00', '125.00', '53.19', '41.24', '1.36', '488.00', 100, '23/01/2020', '10:01:00', 1, 68, 'Satisfactory'),
(45, 'NL01P0001', '0.01', '25.58', '11.65', '2.00', '48.00', '61.00', '125.00', '52.97', '40.94', '1.36', '484.65', 100, '23/01/2020', '10:01:00', 1, 68, 'Satisfactory'),
(46, 'NL01P0001', '0.01', '25.62', '11.64', '2.40', '48.00', '68.00', '121.96', '56.43', '41.00', '1.37', '482.08', 100, '23/01/2020', '10:01:00', 1, 68, 'Satisfactory'),
(47, 'NL01P0001', '0.01', '25.62', '11.64', '2.40', '48.00', '68.00', '121.96', '56.43', '41.00', '1.37', '482.08', 100, '23/01/2020', '10:01:00', 1, 68, 'Satisfactory'),
(48, 'NL01P0001', '0.01', '25.69', '11.76', '2.44', '47.00', '62.00', '121.24', '53.34', '40.94', '1.36', '489.88', 100, '23/01/2020', '11:01:00', 1, 68, 'Satisfactory'),
(49, 'NL01P0001', '0.01', '25.69', '11.76', '2.44', '47.00', '62.00', '121.24', '53.34', '40.94', '1.36', '489.88', 100, '23/01/2020', '11:01:00', 1, 68, 'Satisfactory'),
(50, 'NL01P0001', '0.01', '25.70', '11.25', '2.33', '48.00', '61.00', '122.75', '50.93', '38.48', '1.35', '486.08', 100, '23/01/2020', '11:01:00', 1, 67, 'Satisfactory'),
(51, 'NL01P0001', '0.01', '25.74', '11.15', '2.19', '47.00', '64.00', '123.00', '53.32', '39.73', '1.26', '499.19', 100, '23/01/2020', '11:01:00', 1, 63, 'Satisfactory'),
(52, 'NL01P0001', '0.01', '25.86', '10.92', '2.08', '47.00', '61.00', '119.00', '51.59', '39.27', '1.19', '477.73', 100, '23/01/2020', '11:01:00', 1, 59, 'Satisfactory'),
(53, 'NL01P0001', '0.01', '25.92', '13.17', '2.00', '48.00', '62.00', '117.50', '52.80', '39.90', '1.18', '468.42', 100, '23/01/2020', '11:01:00', 1, 59, 'Satisfactory'),
(54, 'NL01P0001', '0.01', '24.81', '9.96', '3.19', '48.00', '71.00', '106.62', '57.86', '42.70', '1.95', '912.23', 100, '24/01/2020', '02:01:00', 1, 97, 'Satisfactory');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubix`
--

CREATE TABLE `ubix` (
  `id` int(11) NOT NULL,
  `canal` varchar(10) NOT NULL,
  `temperatura` decimal(5,2) DEFAULT NULL,
  `humedad` decimal(5,2) DEFAULT NULL,
  `luz` decimal(5,2) DEFAULT NULL,
  `voltaje` decimal(5,2) DEFAULT NULL,
  `vibracion` decimal(5,2) DEFAULT NULL,
  `golpe` int(11) DEFAULT NULL,
  `wifi` int(11) DEFAULT NULL,
  `fecha` varchar(15) DEFAULT NULL,
  `hora` varchar(15) DEFAULT NULL,
  `disp_tipo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `path` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `password`, `nombre`, `cargo`, `correo`, `path`) VALUES
('admin', 'admin', 'admimnistrador nlt', 'administrador', 'admin@nlt.com', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aerix`
--
ALTER TABLE `aerix`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_aerix_disp_tipo1` (`disp_tipo_id`);

--
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dispositivo_usuario` (`usuario_id`),
  ADD KEY `id_nombre` (`id_nombre`);

--
-- Indices de la tabla `disp_tipo`
--
ALTER TABLE `disp_tipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_disp_tipo_dispositivo1` (`dispositivo_id`);

--
-- Indices de la tabla `odorix`
--
ALTER TABLE `odorix`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_odorix_disp_tipo1` (`disp_tipo_id`);

--
-- Indices de la tabla `ubix`
--
ALTER TABLE `ubix`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ubix_disp_tipo1` (`disp_tipo_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aerix`
--
ALTER TABLE `aerix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `disp_tipo`
--
ALTER TABLE `disp_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `odorix`
--
ALTER TABLE `odorix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `ubix`
--
ALTER TABLE `ubix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aerix`
--
ALTER TABLE `aerix`
  ADD CONSTRAINT `fk_aerix_disp_tipo1` FOREIGN KEY (`disp_tipo_id`) REFERENCES `disp_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD CONSTRAINT `dispositivo_ibfk_1` FOREIGN KEY (`id_nombre`) REFERENCES `disp_nombre` (`id`),
  ADD CONSTRAINT `fk_dispositivo_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `disp_tipo`
--
ALTER TABLE `disp_tipo`
  ADD CONSTRAINT `fk_disp_tipo_dispositivo1` FOREIGN KEY (`dispositivo_id`) REFERENCES `dispositivo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `odorix`
--
ALTER TABLE `odorix`
  ADD CONSTRAINT `fk_odorix_disp_tipo1` FOREIGN KEY (`disp_tipo_id`) REFERENCES `disp_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ubix`
--
ALTER TABLE `ubix`
  ADD CONSTRAINT `fk_ubix_disp_tipo1` FOREIGN KEY (`disp_tipo_id`) REFERENCES `disp_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
