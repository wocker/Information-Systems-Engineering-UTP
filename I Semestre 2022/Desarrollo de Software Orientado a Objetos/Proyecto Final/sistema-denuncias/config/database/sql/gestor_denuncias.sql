-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-07-2022 a las 08:26:35
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestor_denuncias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` bigint(20) UNSIGNED NOT NULL,
  `nombre_categoria` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entidad_responsable` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`, `entidad_responsable`, `correo`, `created_at`, `updated_at`) VALUES
(2, 'Luminarias', 'Naturgy', 'soporte@naturgy.com.pa', '2022-07-13 21:29:09', '2022-07-21 06:13:24'),
(3, 'Seguridad Pública', 'Ministerio de Seguridad (MINSEG)', 'soporte@minseg.gob.pa', '2022-07-13 21:30:07', '2022-07-21 06:37:13'),
(4, 'Transporte', 'Autoridad del Tránsito y Transporte Terrestre (ATTT)', 'soporte@attt.gob.pa', '2022-07-13 21:31:16', '2022-07-21 06:37:45'),
(5, 'Agua Potable', 'Instituto de Acueductos y Alcantarillados Nacionales (IDAAN)', 'soporte@idaan.gob.pa', '2022-07-13 21:32:10', '2022-07-21 07:04:32'),
(6, 'Alcantarillado', 'Instituto de Acueductos y Alcantarillados Nacionales (IDAAN)', 'soporte@idaan.gob.pa', '2022-07-13 21:32:51', '2022-07-21 07:04:56'),
(7, 'Infraestructura Pública', 'Ministerio de Obras Públicas (MOP)', 'soporte@mop.gob.pa', '2022-07-13 21:33:33', '2022-07-21 06:14:00'),
(13, 'Delitos Comunes', 'Policia Nacional de Panamá', 'soporte@policia.gob.pa', '2022-07-21 07:08:28', '2022-07-21 07:08:28'),
(14, 'Incendios', 'Benemérito Cuerpo de Bomberos de la República de Panamá (BCB', 'soporte@bomberos.gob.pa', '2022-07-21 07:09:11', '2022-07-21 07:09:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadano`
--

CREATE TABLE `ciudadano` (
  `id_ciudadano` bigint(20) UNSIGNED NOT NULL,
  `nombre_ciudadano` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_ciudadano` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar_reside` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo_electronico` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ciudadano`
--

INSERT INTO `ciudadano` (`id_ciudadano`, `nombre_ciudadano`, `apellido_ciudadano`, `lugar_reside`, `telefono`, `correo_electronico`, `created_at`, `updated_at`) VALUES
(1, 'Johel Heraclio', 'Batista Cárdenas', 'Ciudad del Saber, Calle Evelio Lara, Edificio 137-A', '+507 6481-6907', 'johel.batista@utp.ac.pa', '2022-07-13 21:42:18', '2022-07-22 06:17:42'),
(3, 'Lourdes', 'Jaramillo', 'Ciudad de Panamá', '6673-3578', 'lourdes.jaramillo@utp.ac.pa', '2022-07-21 05:47:10', '2022-07-21 05:47:10'),
(4, 'Heraclio Euclides', 'Batista Osorio', 'Balboa, Ancón, Calle George W. Goethals, Casa 2265B', '+507 6920-4843', 'heraclio.batista@gmail.com', '2022-07-21 07:05:49', '2022-07-21 07:05:49'),
(5, 'Rolando Esteban', 'Riley Rodríguez', 'Villa Cáceres', '+507 6058-7434', 'rolando.riley@utp.ac.pa', '2022-07-21 07:07:44', '2022-07-21 07:07:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `denuncia`
--

CREATE TABLE `denuncia` (
  `id_denuncia` bigint(20) UNSIGNED NOT NULL,
  `id_ciudadano` bigint(20) UNSIGNED NOT NULL,
  `id_provincia` bigint(20) UNSIGNED NOT NULL,
  `id_categoria` bigint(20) UNSIGNED NOT NULL,
  `desc_denuncia` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estatus_denuncia` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar_denuncia` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_denuncia` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `denuncia`
--

INSERT INTO `denuncia` (`id_denuncia`, `id_ciudadano`, `id_provincia`, `id_categoria`, `desc_denuncia`, `estatus_denuncia`, `lugar_denuncia`, `fecha_denuncia`, `created_at`, `updated_at`) VALUES
(3, 1, 8, 6, 'Muchas Aguas Residuales', 'P', 'Ancón, Balboa', '2022-07-20', '2022-07-14 01:56:51', '2022-07-21 05:44:22'),
(21, 1, 8, 4, 'Falta de Garantías Constitucionales', 'P', 'República de Panamá', '2022-07-22', '2022-07-21 05:45:10', '2022-07-21 05:46:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` bigint(20) UNSIGNED NOT NULL,
  `nombre_provincia` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `nombre_provincia`, `created_at`, `updated_at`) VALUES
(1, 'Bocas del Toro', '2022-07-13 21:35:17', '2022-07-18 21:57:51'),
(2, 'Chiriquí', '2022-07-13 21:35:24', '2022-07-13 21:35:29'),
(3, 'Coclé', '2022-07-13 21:35:41', '2022-07-13 21:35:45'),
(4, 'Colón', '2022-07-13 21:35:58', '2022-07-13 21:36:00'),
(5, 'Darién', '2022-07-13 21:36:10', '2022-07-13 21:36:13'),
(6, 'Herrera', '2022-07-13 21:36:24', '2022-07-13 21:36:26'),
(7, 'Los Santos', '2022-07-13 21:36:34', '2022-07-13 21:36:36'),
(8, 'Panamá', '2022-07-13 21:36:44', '2022-07-13 21:36:46'),
(9, 'Panamá Oeste', '2022-07-13 21:36:54', '2022-07-13 21:36:56'),
(10, 'Veraguas', '2022-07-13 21:37:05', '2022-07-13 21:37:07'),
(11, 'C. Emberá', '2022-07-13 21:38:05', '2022-07-13 21:38:08'),
(12, 'C. Guna Yala', '2022-07-13 21:38:17', '2022-07-13 21:38:19'),
(13, 'C. Ngäbe-Buglé', '2022-07-13 21:38:38', '2022-07-13 21:38:40'),
(14, 'C. Naso Tjër Di', '2022-07-13 21:38:54', '2022-07-13 21:38:57'),
(15, 'C. Guna de Madugandi', '2022-07-13 21:39:10', '2022-07-13 21:39:12'),
(16, 'C. Guna de Wargandí', '2022-07-13 21:39:26', '2022-07-13 21:39:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `nombre_usuario` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_usuario` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo_usuario` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel_usuario` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `correo_usuario`, `cel_usuario`, `created_at`, `updated_at`) VALUES
(1, 'Johel Heraclio', 'Batista Cárdenas', 'johel.batista@utp.ac.pa', '+507 6920-4843', '2022-07-13 21:40:33', '2022-07-22 06:18:27'),
(3, 'Sistema', '311', 'admin@gestor.com', '311', '2022-07-18 01:34:00', '2022-07-22 06:18:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_ciudadano`
--

CREATE TABLE `usuario_ciudadano` (
  `id_usuario_ciudadano` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_ciudadano` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `ciudadano`
--
ALTER TABLE `ciudadano`
  ADD PRIMARY KEY (`id_ciudadano`);

--
-- Indices de la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD PRIMARY KEY (`id_denuncia`,`id_ciudadano`,`id_provincia`,`id_categoria`),
  ADD KEY `id_ciudadano` (`id_ciudadano`),
  ADD KEY `id_provincia` (`id_provincia`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_provincia`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuario_ciudadano`
--
ALTER TABLE `usuario_ciudadano`
  ADD PRIMARY KEY (`id_usuario_ciudadano`,`id_usuario`,`id_ciudadano`),
  ADD KEY `model_has_permissions_permission_id_foreign` (`id_usuario`),
  ADD KEY `id_ciudadano` (`id_ciudadano`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `ciudadano`
--
ALTER TABLE `ciudadano`
  MODIFY `id_ciudadano` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `denuncia`
--
ALTER TABLE `denuncia`
  MODIFY `id_denuncia` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario_ciudadano`
--
ALTER TABLE `usuario_ciudadano`
  MODIFY `id_usuario_ciudadano` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `denuncia`
--
ALTER TABLE `denuncia`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_ciudadano_1` FOREIGN KEY (`id_ciudadano`) REFERENCES `ciudadano` (`id_ciudadano`),
  ADD CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`);

--
-- Filtros para la tabla `usuario_ciudadano`
--
ALTER TABLE `usuario_ciudadano`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `usuario_ciudadano_ibfk_1` FOREIGN KEY (`id_ciudadano`) REFERENCES `ciudadano` (`id_ciudadano`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
