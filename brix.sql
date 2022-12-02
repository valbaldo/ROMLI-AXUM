-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2022 a las 14:35:27
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
-- Base de datos: `brix`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `cod_postal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_articulo` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `costo` int(11) NOT NULL,
  `precio_produce` int(11) NOT NULL,
  `idalmacen` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `rubro` varchar(100) NOT NULL,
  `subrubro` varchar(100) NOT NULL,
  `stock_seguridad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos_muy_vendidos`
--

CREATE TABLE `articulos_muy_vendidos` (
  `id` int(11) NOT NULL,
  `idart` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `costo` int(11) NOT NULL,
  `subrubro` varchar(100) NOT NULL,
  `rubro` varchar(100) NOT NULL,
  `id_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` int(100) NOT NULL,
  `localidad` int(100) NOT NULL,
  `cod_postal` int(11) NOT NULL,
  `vendedor_encargado` int(11) NOT NULL,
  `nombre_local` int(100) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `mail` varchar(110) NOT NULL,
  `saldo` int(11) NOT NULL,
  `limitecred` int(11) NOT NULL,
  `DNI` varchar(11) NOT NULL,
  `canalventa` int(11) NOT NULL,
  `condicion_IVA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientesbaja`
--

CREATE TABLE `clientesbaja` (
  `codigo` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `mail` int(11) NOT NULL,
  `vendedor_encargado` int(11) NOT NULL,
  `id_telefono` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombre_local` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diasvisitados`
--

CREATE TABLE `diasvisitados` (
  `id` int(11) NOT NULL,
  `idcliente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `empvisita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentoventa`
--

CREATE TABLE `documentoventa` (
  `tipoventa` varchar(100) NOT NULL,
  `comprador` varchar(100) NOT NULL,
  `vendedor` varchar(100) NOT NULL,
  `fechaventa` datetime NOT NULL,
  `valor_total` int(100) NOT NULL,
  `furgon` varchar(100) NOT NULL,
  `estadoventa` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `furgones`
--

CREATE TABLE `furgones` (
  `id` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `cod_conductor` int(11) NOT NULL,
  `antiguedad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `localidad` varchar(100) NOT NULL,
  `cod_postal` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `canalventa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono_cliente`
--

CREATE TABLE `telefono_cliente` (
  `id` int(11) NOT NULL,
  `numtele` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono_proveedor`
--

CREATE TABLE `telefono_proveedor` (
  `id` int(11) NOT NULL,
  `numtele` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefono_usuarios`
--

CREATE TABLE `telefono_usuarios` (
  `id` int(11) NOT NULL,
  `numtele` int(11) NOT NULL,
  `usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `DNI` int(11) NOT NULL,
  `Antiguedad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `idventa` int(11) NOT NULL,
  `articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona`
--

CREATE TABLE `zona` (
  `codigopostal` int(11) NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_articulo`),
  ADD UNIQUE KEY `id_articulo` (`id_articulo`),
  ADD UNIQUE KEY `id_articulo_2` (`id_articulo`),
  ADD UNIQUE KEY `id_articulo_3` (`id_articulo`,`idalmacen`),
  ADD UNIQUE KEY `id_articulo_4` (`id_articulo`,`id_proveedor`);

--
-- Indices de la tabla `articulos_muy_vendidos`
--
ALTER TABLE `articulos_muy_vendidos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idart` (`idart`),
  ADD UNIQUE KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `clientesbaja`
--
ALTER TABLE `clientesbaja`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `diasvisitados`
--
ALTER TABLE `diasvisitados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documentoventa`
--
ALTER TABLE `documentoventa`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `furgones`
--
ALTER TABLE `furgones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `telefono_cliente`
--
ALTER TABLE `telefono_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telefono_proveedor`
--
ALTER TABLE `telefono_proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `telefono_usuarios`
--
ALTER TABLE `telefono_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `articulos_muy_vendidos`
--
ALTER TABLE `articulos_muy_vendidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientesbaja`
--
ALTER TABLE `clientesbaja`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `diasvisitados`
--
ALTER TABLE `diasvisitados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documentoventa`
--
ALTER TABLE `documentoventa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `furgones`
--
ALTER TABLE `furgones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telefono_cliente`
--
ALTER TABLE `telefono_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telefono_proveedor`
--
ALTER TABLE `telefono_proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telefono_usuarios`
--
ALTER TABLE `telefono_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
