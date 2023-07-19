-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 19, 2023 at 11:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ambienteweb17/07`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarClaveCliente` (IN `pIdCliente` INT, IN `pContrasenna` VARCHAR(25))   BEGIN

	UPDATE clientes
	SET contrasenna = pContrasenna,
    contrasenna_temporal = 1
	WHERE Id = pIdCliente;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarClaveUsuario` (IN `pIdUsuario` INT, IN `pContrasenna` VARCHAR(25))   BEGIN

	UPDATE usuarios
	SET Contrasenna = pContrasenna
	WHERE IdUsuario = pIdUsuario;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarContrasenna` (IN `pIdCliente` INT, IN `pContrasenna` VARCHAR(25))   BEGIN
	UPDATE clientes
	SET contrasenna = pContrasenna,
    contrasenna_temporal = null
	WHERE Id = pIdCliente;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDatos` (IN `pCorreo` VARCHAR(50))   BEGIN

SELECT  id,
		Nombre,
        apellido,
        correo,
        direccion,
        ciudad,
        pais,
        contrasenna,
		activo
FROM 	clientes
WHERE 	correo = pCorreo
    AND activo = 1;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarUsuario` (IN `pNombre` VARCHAR(255), IN `pApellidos` VARCHAR(255), IN `pCorreo` VARCHAR(255), IN `pDireccion` VARCHAR(255), IN `pCiudad` VARCHAR(255), IN `pPais` VARCHAR(255), IN `pContrasenna` VARCHAR(255))   BEGIN

INSERT INTO clientes (`nombre`,`apellido`,`correo`,`direccion`,`ciudad`,`pais`,`contrasenna`,`activo`)
VALUES ( pNombre, pApellidos, pCorreo, pDireccion, pCiudad, pPais, pContrasenna, 1);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarCodigo` (IN `pCorreo` VARCHAR(50), IN `pCodigo` INT)   BEGIN

SELECT  id,
		Nombre,
        apellido,
        correo,
        direccion,
        ciudad,
        pais,
        contrasenna,
		activo
FROM 	clientes
	WHERE 	correo = pCorreo
		AND	Codigo = pCodigo
		AND activo = 1;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarSesion` (IN `pCorreo` VARCHAR(50), IN `pContrasenna` VARCHAR(25))   BEGIN

SELECT  id,
		Nombre,
        apellido,
        correo,
        direccion,
        ciudad,
        pais,
        contrasenna,
		activo,
        contrasenna_temporal
FROM 	clientes
WHERE 	correo = pCorreo
	AND	contrasenna = pContrasenna
    AND activo = 1;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `administrador`
--

CREATE TABLE `administrador` (
  `id` bigint(20) NOT NULL,
  `identificacion` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido1` varchar(255) NOT NULL,
  `apellido2` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contrasenna` varchar(255) NOT NULL,
  `activo` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carritos`
--

CREATE TABLE `carritos` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `contrasenna` varchar(255) NOT NULL,
  `activo` bit(1) NOT NULL,
  `contrasenna_temporal` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `correo`, `direccion`, `ciudad`, `pais`, `contrasenna`, `activo`, `contrasenna_temporal`) VALUES
(1, 'Michael', 'Arias', 'michaelarias980@gmail.com', 'San jose, Alajuelita', 'San José', 'Costa Rica', 'secreta', b'1', NULL),
(4, 'kenny', 'cardenas', 'kennycardenas@gmail.com', 'Cartago,Guarco', 'San José', 'Costa Rica', 'secreta', b'1', NULL),
(5, 'Michael', 'Arias', 'marias80378@ufide.ac.cr', 'Cartago,Guarco', 'San José', 'Costa Rica', '4413', b'1', NULL),
(12, 'Fabian', 'Montero Madrigal', 'fabianja0477@gmail.com', 'Barrio el Carmen', 'Coronado', 'Costa Rica', 'prohibida', b'1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_carritos`
--

CREATE TABLE `detalle_carritos` (
  `carrito_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad_productos` int(11) NOT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_facturas`
--

CREATE TABLE `detalle_facturas` (
  `factura_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad_productos` int(11) NOT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

CREATE TABLE `facturas` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `fecha_factura` date NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `cantidad_stock` int(11) NOT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sucursales`
--

CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `pais` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendedores`
--

CREATE TABLE `vendedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `sucursal_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_administrador_email` (`email`);

--
-- Indexes for table `carritos`
--
ALTER TABLE `carritos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_clientes_email` (`correo`);

--
-- Indexes for table `detalle_carritos`
--
ALTER TABLE `detalle_carritos`
  ADD PRIMARY KEY (`carrito_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indexes for table `detalle_facturas`
--
ALTER TABLE `detalle_facturas`
  ADD PRIMARY KEY (`factura_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indexes for table `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indexes for table `sucursales`
--
ALTER TABLE `sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sucursal_id` (`sucursal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sucursales`
--
ALTER TABLE `sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendedores`
--
ALTER TABLE `vendedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carritos`
--
ALTER TABLE `carritos`
  ADD CONSTRAINT `carritos_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Constraints for table `detalle_carritos`
--
ALTER TABLE `detalle_carritos`
  ADD CONSTRAINT `detalle_carritos_ibfk_1` FOREIGN KEY (`carrito_id`) REFERENCES `carritos` (`id`),
  ADD CONSTRAINT `detalle_carritos_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Constraints for table `detalle_facturas`
--
ALTER TABLE `detalle_facturas`
  ADD CONSTRAINT `detalle_facturas_ibfk_1` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`),
  ADD CONSTRAINT `detalle_facturas_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Constraints for table `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Constraints for table `vendedores`
--
ALTER TABLE `vendedores`
  ADD CONSTRAINT `vendedores_ibfk_1` FOREIGN KEY (`sucursal_id`) REFERENCES `sucursales` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
