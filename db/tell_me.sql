-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2018 a las 06:41:18
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tell_me`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Terror', '2018-10-14 03:50:35', '2018-10-14 09:50:35', '2018-10-14 09:50:35'),
(2, 'Terror', '2018-10-14 09:50:43', '2018-10-14 09:50:43', NULL),
(3, '212121', '2018-10-14 21:03:38', '2018-10-15 03:03:38', '2018-10-15 03:03:38'),
(4, 'sdsdsd', '2018-10-15 03:23:14', '2018-10-15 03:23:14', NULL),
(5, '3333', '2018-10-15 03:23:18', '2018-10-15 03:23:18', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('arizul96@gmail.com', '$2y$10$HbSdP22cxlZaI8yYwj2.BuhHB5EuiT494g0Mipj2KP/Az5IMWI9X2', '2018-10-15 06:42:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `id_story` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `section`
--

INSERT INTO `section` (`id`, `id_story`, `name`, `description`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 'seccion 1', 'sdfsdf', 'https://i.ytimg.com/vi/IIjjrsepktA/maxresdefault.jpg', '2018-10-15 04:22:56', '2018-10-15 04:22:56', NULL),
(2, 8, 'Seccion 1', 'Descripción', 'https://66.media.tumblr.com/ef90e18fb5eedc435f6e303d33594ced/tumblr_inline_pgfk0jQ0UC1r63chl_540.gif', '2018-10-15 06:06:30', '2018-10-15 06:06:30', NULL),
(3, 6, 'df', 'fdfdfd', 'dfd', '2018-10-15 00:06:45', '2018-10-15 06:06:45', '2018-10-15 06:06:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `story`
--

CREATE TABLE `story` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `state` int(1) DEFAULT '1',
  `id_category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `story`
--

INSERT INTO `story` (`id`, `name`, `state`, `id_category`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'La carreta chillona', 1, 1, '2018-10-14 22:13:59', '2018-10-15 04:13:59', '2018-10-15 04:13:59'),
(2, 'sddsds', 1, 2, '2018-10-14 21:03:34', '2018-10-15 03:03:34', '2018-10-15 03:03:34'),
(3, 'sasaas', 1, 2, '2018-10-14 21:03:28', '2018-10-15 03:03:28', '2018-10-15 03:03:28'),
(4, 'wqqwwq', 1, 2, '2018-10-14 21:03:25', '2018-10-15 03:03:25', '2018-10-15 03:03:25'),
(5, 'wwwwwwwww', 1, 3, '2018-10-14 21:03:23', '2018-10-15 03:03:23', '2018-10-15 03:03:23'),
(6, 'historia', 1, 5, '2018-10-14 21:23:38', '2018-10-15 03:23:38', NULL),
(7, 'gg', 1, 2, '2018-10-14 23:28:35', '2018-10-15 05:28:35', '2018-10-15 05:28:35'),
(8, 'dddddd', 1, 2, '2018-10-15 05:28:40', '2018-10-15 05:28:40', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ariel Rodrigo Reyes', 'chepito@mail.com', '$2y$10$3f0yWszVUQ1dSoUFVoy.LeY5yj27BuD0Jk.2EdccITNlAIVEHhu4e', 'ob4RcZkaX7p1E3lqiHkZJdHeTfkGkwk3eAJlN5ZflW1ZfIrszccLFhEIK5sG', '2018-10-14 09:48:14', '2018-10-14 09:48:14'),
(2, 'Ariel Rodrigo Reyes', 'arizul96@gmail.com', '$2y$10$Jj1Eq5Nu0XhE3VUXC1LD/u23ofNsjL/PNht9uZBSoIoQvnFvU2XMm', 'grScY9xJ2oKpjCnpjUJNrtDu0dwHO2aHqk9rbcJdzq1KHLuXntt2IsQY4vY7', '2018-10-15 06:42:38', '2018-10-15 06:42:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_story` (`id_story`);

--
-- Indices de la tabla `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`id_story`) REFERENCES `story` (`id`);

--
-- Filtros para la tabla `story`
--
ALTER TABLE `story`
  ADD CONSTRAINT `story_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
