-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-02-2025 a las 17:02:33
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rainapi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_02_14_025014_tb_registros', 1),
(6, '2025_02_20_021719_tb_admin', 2),
(7, '2025_02_20_023210_tb_empleados', 2),
(8, '2025_02_20_023234_tb_usuarios', 2),
(9, '2025_02_20_023244_tb_mantenimiento', 2),
(10, '2025_02_20_023251_tb_roles', 2),
(11, '2025_02_20_024056_tb_compras', 3),
(12, '2025_02_20_024106_tb_dispositivos', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `appat` varchar(255) NOT NULL,
  `apmat` varchar(255) NOT NULL,
  `fn` date NOT NULL,
  `genero` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL DEFAULT 1,
  `intentos_fallidos` int(11) NOT NULL DEFAULT 0,
  `bloqueado_hasta` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_compras`
--

CREATE TABLE `tb_compras` (
  `id_venta` bigint(20) UNSIGNED NOT NULL,
  `fventa` date NOT NULL,
  `monto` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_dispositivo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_dispositivos`
--

CREATE TABLE `tb_dispositivos` (
  `id_dispositivo` bigint(20) UNSIGNED NOT NULL,
  `finstalacion` date NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_empleados`
--

CREATE TABLE `tb_empleados` (
  `id_empleado` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `appat` varchar(255) NOT NULL,
  `apmat` varchar(255) NOT NULL,
  `fn` date NOT NULL,
  `genero` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL DEFAULT 2,
  `intentos_fallidos` int(11) NOT NULL DEFAULT 0,
  `bloqueado_hasta` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mantenimiento`
--

CREATE TABLE `tb_mantenimiento` (
  `id_mantenimiento` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `trabajo` varchar(255) NOT NULL,
  `id_empleado` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_registros`
--

CREATE TABLE `tb_registros` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL,
  `intentos_fallidos` int(11) NOT NULL DEFAULT 0,
  `bloqueado_hasta` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tb_registros`
--

INSERT INTO `tb_registros` (`id_user`, `nombre`, `email`, `password`, `rol`, `intentos_fallidos`, `bloqueado_hasta`, `created_at`, `updated_at`) VALUES
(1, 'Valeria', 'val@example.com', 'val', 0, 1, NULL, NULL, NULL),
(2, 'Admin', 'admin@example.com', 'admin123', 0, 0, NULL, NULL, NULL),
(4, 'Pancha', 'pancha@gmail.com', '1234', 2, 0, NULL, NULL, NULL),
(5, 'Val', 'vr@gmail.com', 'val123', 1, 0, NULL, NULL, NULL),
(6, 'Cris', 'cris@gmail.com', 'cris', 1, 0, NULL, NULL, NULL),
(7, 'Vinicio', 'vini@gmail.com', '12345', 2, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id_rol` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `appat` varchar(255) NOT NULL,
  `apmat` varchar(255) NOT NULL,
  `fn` date NOT NULL,
  `genero` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL DEFAULT 3,
  `intentos_fallidos` int(11) NOT NULL DEFAULT 0,
  `bloqueado_hasta` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `tb_admin_email_unique` (`email`);

--
-- Indices de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  ADD PRIMARY KEY (`id_venta`);

--
-- Indices de la tabla `tb_dispositivos`
--
ALTER TABLE `tb_dispositivos`
  ADD PRIMARY KEY (`id_dispositivo`);

--
-- Indices de la tabla `tb_empleados`
--
ALTER TABLE `tb_empleados`
  ADD PRIMARY KEY (`id_empleado`),
  ADD UNIQUE KEY `tb_empleados_email_unique` (`email`);

--
-- Indices de la tabla `tb_mantenimiento`
--
ALTER TABLE `tb_mantenimiento`
  ADD PRIMARY KEY (`id_mantenimiento`);

--
-- Indices de la tabla `tb_registros`
--
ALTER TABLE `tb_registros`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `tb_registros_email_unique` (`email`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `tb_usuarios_email_unique` (`email`);

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
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_compras`
--
ALTER TABLE `tb_compras`
  MODIFY `id_venta` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_dispositivos`
--
ALTER TABLE `tb_dispositivos`
  MODIFY `id_dispositivo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_empleados`
--
ALTER TABLE `tb_empleados`
  MODIFY `id_empleado` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_mantenimiento`
--
ALTER TABLE `tb_mantenimiento`
  MODIFY `id_mantenimiento` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_registros`
--
ALTER TABLE `tb_registros`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id_rol` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
