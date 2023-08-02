-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 02, 2023 at 04:32 AM
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
-- Database: `ambienteweb01_08`
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `cargarCategorias` ()   BEGIN
SELECT * FROM categorias;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cargarProducto` (IN `pIdProducto` INT)   BEGIN
SELECT * FROM productos WHERE id = pIdProducto;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `cargarProductos` ()   BEGIN
SELECT * FROM productos;
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
  `descripcion` text DEFAULT NULL,
  `url_imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `url_imagen`) VALUES
(1, 'Celulares', 'Lo mejor en celulares', '..\\Views\\assets\\images\\cat1.jpg'),
(2, 'Laptops', 'Los mejores precios en laptops', '..\\Views\\assets\\images\\cat2.jpg'),
(3, 'Fragancias', 'Fragancias para hombre y mujer', '..\\Views\\assets\\images\\cat3.jpg'),
(4, 'Skincare', 'Productos de Skincare', '..\\Views\\assets\\images\\cat4.jpg'),
(5, 'Super Mercado', 'Productos que puede encontrar en un supermercado', '..\\Views\\assets\\images\\cat5.jpg'),
(6, 'Decoración de casa', 'Decore su casa con estos productos', '..\\Views\\assets\\images\\cat6.jpg'),
(7, 'Muebles', 'Lo necesario en muebles para su hogar', '..\\Views\\assets\\images\\cat7.jpg'),
(8, 'Tops', 'Tops para todas las edades', '..\\Views\\assets\\images\\cat8.jpg'),
(9, 'Vestidos de Mujer', 'Variedad en vestidos para mujer', '..\\Views\\assets\\images\\cat9.jpeg'),
(10, 'Zapatos de Mujer', 'Variedad en zapatos para mujer', '..\\Views\\assets\\images\\cat10.jpg'),
(11, 'Camisas de Hombre', 'Variedad en camisas para hombre', '..\\Views\\assets\\images\\cat11.jpg'),
(12, 'Zapatos de Hombre', 'Variedad en zapatos para hombre', '..\\Views\\assets\\images\\cat12.jpg'),
(13, 'Relojes de Hombre', 'Variedad en relojes para hombre', '..\\Views\\assets\\images\\cat13.jpg'),
(14, 'Relojes de Mujer', 'Variedad en relojes para mujer', '..\\Views\\assets\\images\\cat14.jpg'),
(15, 'Bolsos de Mujer', 'Variedad en bolsos para mujer', '..\\Views\\assets\\images\\cat15.jpg'),
(16, 'Joyería de Mujer', 'Variedad en joyería para mujer', '..\\Views\\assets\\images\\cat16.jpg'),
(17, 'Autos', 'Productos para su Auto', '..\\Views\\assets\\images\\cat17.jpg'),
(18, 'Motocicletas', 'Productos para su motocicleta', '..\\Views\\assets\\images\\cat18.jpg'),
(19, 'Luces', 'Los mejores precios en luces', '..\\Views\\assets\\images\\cat19.jpg'),
(20, 'Lentes de sol', 'Los mejores precios en lentes de sol', '..\\Views\\assets\\images\\cat20.jpg');

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
  `contrasenna_temporal` bit(1) DEFAULT NULL,
  `clientescol` varchar(45) DEFAULT NULL,
  `IdRoles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `correo`, `direccion`, `ciudad`, `pais`, `contrasenna`, `activo`, `contrasenna_temporal`, `clientescol`, `IdRoles`) VALUES
(1, 'Michael', 'Arias', 'michaelarias980@gmail.com', 'San jose, Alajuelita', 'San José', 'Costa Rica', 'secreta', b'1', NULL, NULL, 0),
(4, 'kenny', 'cardenas', 'kennycardenas@gmail.com', 'Cartago,Guarco', 'San José', 'Costa Rica', 'secreta', b'1', NULL, NULL, 0),
(5, 'Michael', 'Arias', 'marias80378@ufide.ac.cr', 'Cartago,Guarco', 'San José', 'Costa Rica', '4413', b'1', NULL, NULL, 0),
(12, 'Fabian', 'Montero Madrigal', 'fabianja0477@gmail.com', 'Barrio el Carmen', 'Coronado', 'Costa Rica', 'ufide', b'1', NULL, NULL, 0),
(13, 'Josue ', 'Torres', 'josue@gmail.com', 'Buenos aires barrio mulcaz', 'Buenos aires ', 'Argentina ', '12345', b'1', NULL, NULL, 0);

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
  `categoria_id` int(11) DEFAULT NULL,
  `url_imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `descripcion`, `cantidad_stock`, `categoria_id`, `url_imagen`) VALUES
(953, 'iPhone 9', '549.00', 'An apple mobile which is nothing like apple', 89, 1, 'https://i.dummyjson.com/data/products/1/1.jpg'),
(954, 'iPhone X', '899.00', 'SIM-Free, Model A19211 6.5-inch Super Retina HD display with OLED technology A12 Bionic chip with ...', 15, 1, 'https://i.dummyjson.com/data/products/2/1.jpg'),
(955, 'Samsung Universe 9', '1249.00', 'Samsung\'s new variant which goes beyond Galaxy to the Universe', 85, 1, 'https://i.dummyjson.com/data/products/3/1.jpg'),
(956, 'OPPOF19', '280.00', 'OPPO F19 is officially announced on April 2021.', 67, 1, 'https://i.dummyjson.com/data/products/4/1.jpg'),
(957, 'Huawei P30', '499.00', 'Huawei’s re-badged P30 Pro New Edition was officially unveiled yesterday in Germany and now the device has made its way to the UK.', 85, 1, 'https://i.dummyjson.com/data/products/5/1.jpg'),
(958, 'MacBook Pro', '1749.00', 'MacBook Pro 2021 with mini-LED display may launch between September, November', 96, 2, 'https://i.dummyjson.com/data/products/6/1.png'),
(959, 'Samsung Galaxy Book', '1499.00', 'Samsung Galaxy Book S (2020) Laptop With Intel Lakefield Chip, 8GB of RAM Launched', 92, 2, 'https://i.dummyjson.com/data/products/7/1.jpg'),
(960, 'Microsoft Surface Laptop 4', '1499.00', 'Style and speed. Stand out on HD video calls backed by Studio Mics. Capture ideas on the vibrant touchscreen.', 93, 2, 'https://i.dummyjson.com/data/products/8/1.jpg'),
(961, 'Infinix INBOOK', '1099.00', 'Infinix Inbook X1 Ci3 10th 8GB 256GB 14 Win10 Grey – 1 Year Warranty', 60, 2, 'https://i.dummyjson.com/data/products/9/1.jpg'),
(962, 'HP Pavilion 15-DK1056WM', '1099.00', 'HP Pavilion 15-DK1056WM Gaming Laptop 10th Gen Core i5, 8GB, 256GB SSD, GTX 1650 4GB, Windows 10', 17, 2, 'https://i.dummyjson.com/data/products/10/1.jpg'),
(963, 'perfume Oil', '13.00', 'Mega Discount, Impression of Acqua Di Gio by GiorgioArmani concentrated attar perfume Oil', 10, 3, 'https://i.dummyjson.com/data/products/11/1.jpg'),
(964, 'Brown Perfume', '40.00', 'Royal_Mirage Sport Brown Perfume for Men & Women - 120ml', 53, 3, 'https://i.dummyjson.com/data/products/12/1.jpg'),
(965, 'Fog Scent Xpressio Perfume', '13.00', 'Product details of Best Fog Scent Xpressio Perfume 100ml For Men cool long lasting perfumes for Men', 98, 3, 'https://i.dummyjson.com/data/products/13/1.jpg'),
(966, 'Non-Alcoholic Concentrated Perfume Oil', '120.00', 'Original Al Munakh® by Mahal Al Musk | Our Impression of Climate | 6ml Non-Alcoholic Concentrated Perfume Oil', 87, 3, 'https://i.dummyjson.com/data/products/14/1.jpg'),
(967, 'Eau De Perfume Spray', '30.00', 'Genuine  Al-Rehab spray perfume from UAE/Saudi Arabia/Yemen High Quality', 97, 3, 'https://i.dummyjson.com/data/products/15/1.jpg'),
(968, 'Hyaluronic Acid Serum', '19.00', 'L\'OrÃ©al Paris introduces Hyaluron Expert Replumping Serum formulated with 1.5% Hyaluronic Acid', 7, 4, 'https://i.dummyjson.com/data/products/16/1.png'),
(969, 'Tree Oil 30ml', '12.00', 'Tea tree oil contains a number of compounds, including terpinen-4-ol, that have been shown to kill certain bacteria,', 63, 4, 'https://i.dummyjson.com/data/products/17/1.jpg'),
(970, 'Oil Free Moisturizer 100ml', '40.00', 'Dermive Oil Free Moisturizer with SPF 20 is specifically formulated with ceramides, hyaluronic acid & sunscreen.', 100, 4, 'https://i.dummyjson.com/data/products/18/1.jpg'),
(971, 'Skin Beauty Serum.', '46.00', 'Product name: rorec collagen hyaluronic acid white face serum riceNet weight: 15 m', 58, 4, 'https://i.dummyjson.com/data/products/19/1.jpg'),
(972, 'Freckle Treatment Cream- 15gm', '70.00', 'Fair & Clear is Pakistan\'s only pure Freckle cream which helpsfade Freckles, Darkspots and pigments. Mercury level is 0%, so there are no side effects.', 15, 4, 'https://i.dummyjson.com/data/products/20/1.jpg'),
(973, '- Daal Masoor 500 grams', '20.00', 'Fine quality Branded Product Keep in a cool and dry place', 29, 5, 'https://i.dummyjson.com/data/products/21/1.png'),
(974, 'Elbow Macaroni - 400 gm', '14.00', 'Product details of Bake Parlor Big Elbow Macaroni - 400 gm', 25, 5, 'https://i.dummyjson.com/data/products/22/1.jpg'),
(975, 'Orange Essence Food Flavou', '14.00', 'Specifications of Orange Essence Food Flavour For Cakes and Baking Food Item', 88, 5, 'https://i.dummyjson.com/data/products/23/1.jpg'),
(976, 'cereals muesli fruit nuts', '46.00', 'original fauji cereal muesli 250gm box pack original fauji cereals muesli fruit nuts flakes breakfast cereal break fast faujicereals cerels cerel foji fouji', 72, 5, 'https://i.dummyjson.com/data/products/24/1.jpg'),
(977, 'Gulab Powder 50 Gram', '70.00', 'Dry Rose Flower Powder Gulab Powder 50 Gram • Treats Wounds', 89, 5, 'https://i.dummyjson.com/data/products/25/1.png'),
(978, 'Plant Hanger For Home', '41.00', 'Boho Decor Plant Hanger For Home Wall Decoration Macrame Wall Hanging Shelf', 65, 6, 'https://i.dummyjson.com/data/products/26/1.jpg'),
(979, 'Flying Wooden Bird', '51.00', 'Package Include 6 Birds with Adhesive Tape Shape: 3D Shaped Wooden Birds Material: Wooden MDF, Laminated 3.5mm', 53, 6, 'https://i.dummyjson.com/data/products/27/1.jpg'),
(980, '3D Embellishment Art Lamp', '20.00', '3D led lamp sticker Wall sticker 3d wall art light on/off button  cell operated (included)', 19, 6, 'https://i.dummyjson.com/data/products/28/1.jpg'),
(981, 'Handcraft Chinese style', '60.00', 'Handcraft Chinese style art luxury palace hotel villa mansion home decor ceramic vase with brass fruit plate', 57, 6, 'https://i.dummyjson.com/data/products/29/1.jpg'),
(982, 'Key Holder', '30.00', 'Attractive DesignMetallic materialFour key hooksReliable & DurablePremium Quality', 45, 6, 'https://i.dummyjson.com/data/products/30/1.jpg'),
(983, 'Mornadi Velvet Bed', '40.00', 'Mornadi Velvet Bed Base with Headboard Slats Support Classic Style Bedroom Furniture Bed Set', 72, 7, 'https://i.dummyjson.com/data/products/31/1.jpg'),
(984, 'Sofa for Coffe Cafe', '50.00', 'Ratttan Outdoor furniture Set Waterproof  Rattan Sofa for Coffe Cafe', 83, 7, 'https://i.dummyjson.com/data/products/32/1.jpg'),
(985, '3 Tier Corner Shelves', '700.00', '3 Tier Corner Shelves | 3 PCs Wall Mount Kitchen Shelf | Floating Bedroom Shelf', 24, 7, 'https://i.dummyjson.com/data/products/33/1.jpg'),
(986, 'Plastic Table', '50.00', 'V﻿ery good quality plastic table for multi purpose now in reasonable price', 36, 7, 'https://i.dummyjson.com/data/products/34/1.jpg'),
(987, '3 DOOR PORTABLE', '41.00', 'Material: Stainless Steel and Fabric  Item Size: 110 cm x 45 cm x 175 cm Package Contents: 1 Storage Wardrobe', 36, 7, 'https://i.dummyjson.com/data/products/35/1.jpg'),
(988, 'Sleeve Shirt Womens', '90.00', 'Cotton Solid Color Professional Wear Sleeve Shirt Womens Work Blouses Wholesale Clothing Casual Plain Custom Top OEM Customized', 95, 8, 'https://i.dummyjson.com/data/products/36/1.jpg'),
(989, 'ank Tops for Womens/Girls', '50.00', 'PACK OF 3 CAMISOLES ,VERY COMFORTABLE SOFT COTTON STUFF, COMFORTABLE IN ALL FOUR SEASONS', 8, 8, 'https://i.dummyjson.com/data/products/37/1.jpg'),
(990, 'sublimation plain kids tank', '100.00', 'sublimation plain kids tank tops wholesale', 20, 8, 'https://i.dummyjson.com/data/products/38/1.png'),
(991, 'Women Sweaters Wool', '600.00', '2021 Custom Winter Fall Zebra Knit Crop Top Women Sweaters Wool Mohair Cos Customize Crew Neck Women\' S Crop Top Sweater', 36, 8, 'https://i.dummyjson.com/data/products/39/1.jpg'),
(992, 'women winter clothes', '57.00', 'women winter clothes thick fleece hoodie top with sweat pantjogger women sweatsuit set joggers pants two piece pants set', 82, 8, 'https://i.dummyjson.com/data/products/40/1.jpg'),
(993, 'NIGHT SUIT', '55.00', 'NIGHT SUIT RED MICKY MOUSE..  For Girls. Fantastic Suits.', 63, 9, 'https://i.dummyjson.com/data/products/41/1.jpg'),
(994, 'Stiched Kurta plus trouser', '80.00', 'FABRIC: LILEIN CHEST: 21 LENGHT: 37 TROUSER: (38) :ARABIC LILEIN', 19, 9, 'https://i.dummyjson.com/data/products/42/1.png'),
(995, 'frock gold printed', '600.00', 'Ghazi fabric long frock gold printed ready to wear stitched collection (G992)', 1, 9, 'https://i.dummyjson.com/data/products/43/1.jpg'),
(996, 'Ladies Multicolored Dress', '79.00', 'This classy shirt for women gives you a gorgeous look on everyday wear and specially for semi-casual wears.', 30, 9, 'https://i.dummyjson.com/data/products/44/1.jpg'),
(997, 'Malai Maxi Dress', '50.00', 'Ready to wear, Unique design according to modern standard fashion, Best fitting ,Imported stuff', 78, 9, 'https://i.dummyjson.com/data/products/45/1.jpg'),
(998, 'women\'s shoes', '40.00', 'Close: Lace, Style with bottom: Increased inside, Sole Material: Rubber', 61, 10, 'https://i.dummyjson.com/data/products/46/1.webp'),
(999, 'Sneaker shoes', '120.00', 'Synthetic Leather Casual Sneaker shoes for Women/girls Sneakers For Women', 65, 10, 'https://i.dummyjson.com/data/products/47/1.jpg'),
(1000, 'Women Strip Heel', '40.00', 'Features: Flip-flops, Mid Heel, Comfortable, Striped Heel, Antiskid, Striped', 37, 10, 'https://i.dummyjson.com/data/products/48/1.jpg'),
(1001, 'Chappals & Shoe Ladies Metallic', '23.00', 'Womens Chappals & Shoe Ladies Metallic Tong Thong Sandal Flat Summer 2020 Maasai Sandals', 100, 10, 'https://i.dummyjson.com/data/products/49/1.jpg'),
(1002, 'Women Shoes', '36.00', '2020 New Arrivals Genuine Leather Fashion Trend Platform Summer Women Shoes', 59, 10, 'https://i.dummyjson.com/data/products/50/1.jpeg'),
(1003, 'half sleeves T shirts', '23.00', 'Many store is creating new designs and trend every month and every year. Daraz.pk have a beautiful range of men fashion brands', 36, 11, 'https://i.dummyjson.com/data/products/51/1.png'),
(1004, 'FREE FIRE T Shirt', '10.00', 'quality and professional print - It doesn\'t just look high quality, it is high quality.', 13, 11, 'https://i.dummyjson.com/data/products/52/1.png'),
(1005, 'printed high quality T shirts', '35.00', 'Brand: vintage Apparel ,Export quality', 44, 11, 'https://i.dummyjson.com/data/products/53/1.webp'),
(1006, 'Pubg Printed Graphic T-Shirt', '46.00', 'Product Description Features: 100% Ultra soft Polyester Jersey. Vibrant & colorful printing on front. Feels soft as cotton without ever cracking', 85, 11, 'https://i.dummyjson.com/data/products/54/1.jpg'),
(1007, 'Money Heist Printed Summer T Shirts', '66.00', 'Fabric Jercy, Size: M & L Wear Stylish Dual Stiched', 33, 11, 'https://i.dummyjson.com/data/products/55/1.jpg'),
(1008, 'Sneakers Joggers Shoes', '40.00', 'Gender: Men , Colors: Same as DisplayedCondition: 100% Brand New', 64, 12, 'https://i.dummyjson.com/data/products/56/1.jpg'),
(1009, 'Loafers for men', '47.00', 'Men Shoes - Loafers for men - Rubber Shoes - Nylon Shoes - Shoes for men - Moccassion - Pure Nylon (Rubber) Expot Quality.', 21, 12, 'https://i.dummyjson.com/data/products/57/1.jpg'),
(1010, 'formal offices shoes', '57.00', 'Pattern Type: Solid, Material: PU, Toe Shape: Pointed Toe ,Outsole Material: Rubber', 37, 12, 'https://i.dummyjson.com/data/products/58/1.jpg'),
(1011, 'Spring and summershoes', '20.00', 'Comfortable stretch cloth, lightweight body; ,rubber sole, anti-skid wear;', 93, 12, 'https://i.dummyjson.com/data/products/59/1.jpg'),
(1012, 'Stylish Casual Jeans Shoes', '58.00', 'High Quality ,Stylish design ,Comfortable wear ,FAshion ,Durable', 13, 12, 'https://i.dummyjson.com/data/products/60/1.jpg'),
(1013, 'Leather Straps Wristwatch', '120.00', 'Style:Sport ,Clasp:Buckles ,Water Resistance Depth:3Bar', 71, 13, 'https://i.dummyjson.com/data/products/61/1.jpg'),
(1014, 'Waterproof Leather Brand Watch', '46.00', 'Watch Crown With Environmental IPS Bronze Electroplating; Display system of 12 hours', 41, 13, 'https://i.dummyjson.com/data/products/62/1.jpg'),
(1015, 'Royal Blue Premium Watch', '50.00', 'Men Silver Chain Royal Blue Premium Watch Latest Analog Watch', 3, 13, 'https://i.dummyjson.com/data/products/63/1.jpg'),
(1016, 'Leather Strap Skeleton Watch', '46.00', 'Leather Strap Skeleton Watch for Men - Stylish and Latest Design', 6, 13, 'https://i.dummyjson.com/data/products/64/1.jpg'),
(1017, 'Stainless Steel Wrist Watch', '47.00', 'Stylish Watch For Man (Luxury) Classy Men\'s Stainless Steel Wrist Watch - Box Packed', 17, 13, 'https://i.dummyjson.com/data/products/65/1.jpg'),
(1018, 'Steel Analog Couple Watches', '35.00', 'Elegant design, Stylish ,Unique & Trendy,Comfortable wear', 62, 14, 'https://i.dummyjson.com/data/products/66/1.jpg'),
(1019, 'Fashion Magnetic Wrist Watch', '60.00', 'Buy this awesome  The product is originally manufactured by the company and it\'s a top selling product with a very reasonable', 17, 14, 'https://i.dummyjson.com/data/products/67/1.jpg'),
(1020, 'Stylish Luxury Digital Watch', '57.00', 'Stylish Luxury Digital Watch For Girls / Women - Led Smart Ladies Watches For Girls', 17, 14, 'https://i.dummyjson.com/data/products/68/1.jpg'),
(1021, 'Golden Watch Pearls Bracelet Watch', '47.00', 'Product details of Golden Watch Pearls Bracelet Watch For Girls - Golden Chain Ladies Bracelate Watch for Women', 37, 14, 'https://i.dummyjson.com/data/products/69/1.jpg'),
(1022, 'Stainless Steel Women', '35.00', 'Fashion Skmei 1830 Shell Dial Stainless Steel Women Wrist Watch Lady Bracelet Watch Quartz Watches Ladies', 54, 14, 'https://i.dummyjson.com/data/products/70/1.jpg'),
(1023, 'Women Shoulder Bags', '46.00', 'LouisWill Women Shoulder Bags Long Clutches Cross Body Bags Phone Bags PU Leather Hand Bags Large Capacity Card Holders Zipper Coin Purses Fashion Crossbody Bags for Girls Ladies', 84, 15, 'https://i.dummyjson.com/data/products/71/1.jpg'),
(1024, 'Handbag For Girls', '23.00', 'This fashion is designed to add a charming effect to your casual outfit. This Bag is made of synthetic leather.', 62, 15, 'https://i.dummyjson.com/data/products/72/1.jpg'),
(1025, 'Fancy hand clutch', '44.00', 'This fashion is designed to add a charming effect to your casual outfit. This Bag is made of synthetic leather.', 93, 15, 'https://i.dummyjson.com/data/products/73/1.jpg'),
(1026, 'Leather Hand Bag', '57.00', 'It features an attractive design that makes it a must have accessory in your collection. We sell different kind of bags for boys, kids, women, girls and also for unisex.', 12, 15, 'https://i.dummyjson.com/data/products/74/1.jpg'),
(1027, 'Seven Pocket Women Bag', '68.00', 'Seven Pocket Women Bag Handbags Lady Shoulder Crossbody Bag Female Purse Seven Pocket Bag', 4, 15, 'https://i.dummyjson.com/data/products/75/1.jpg'),
(1028, 'Silver Ring Set Women', '70.00', 'Jewelry Type:RingsCertificate Type:NonePlating:Silver PlatedShapeattern:noneStyle:CLASSICReligious', 27, 16, 'https://i.dummyjson.com/data/products/76/1.jpg'),
(1029, 'Rose Ring', '100.00', 'Brand: The Greetings Flower Colour: RedRing Colour: GoldenSize: Adjustable', 93, 16, 'https://i.dummyjson.com/data/products/77/1.jpg'),
(1030, 'Rhinestone Korean Style Open Rings', '30.00', 'Fashion Jewellery 3Pcs Adjustable Pearl Rhinestone Korean Style Open Rings For Women', 59, 16, 'https://i.dummyjson.com/data/products/78/thumbnail.jpg'),
(1031, 'Elegant Female Pearl Earrings', '30.00', 'Elegant Female Pearl Earrings Set Zircon Pearl Earings Women Party Accessories 9 Pairs/Set', 7, 16, 'https://i.dummyjson.com/data/products/79/1.jpg'),
(1032, 'Chain Pin Tassel Earrings', '45.00', 'Pair Of Ear Cuff Butterfly Long Chain Pin Tassel Earrings - Silver ( Long Life Quality Product)', 92, 16, 'https://i.dummyjson.com/data/products/80/1.jpg'),
(1033, 'Round Silver Frame Sun Glasses', '19.00', 'A pair of sunglasses can protect your eyes from being hurt. For car driving, vacation travel, outdoor activities, social gatherings,', 91, 20, 'https://i.dummyjson.com/data/products/81/1.jpg'),
(1034, 'Kabir Singh Square Sunglass', '50.00', 'Orignal Metal Kabir Singh design 2020 Sunglasses Men Brand Designer Sun Glasses Kabir Singh Square Sunglass', 27, 20, 'https://i.dummyjson.com/data/products/82/1.jpg'),
(1035, 'Wiley X Night Vision Yellow Glasses', '30.00', 'Wiley X Night Vision Yellow Glasses for Riders - Night Vision Anti Fog Driving Glasses - Free Night Glass Cover - Shield Eyes From Dust and Virus- For Night Sport Matches', 81, 20, 'https://i.dummyjson.com/data/products/83/1.jpg'),
(1036, 'Square Sunglasses', '28.00', 'Fashion Oversized Square Sunglasses Retro Gradient Big Frame Sunglasses For Women One Piece Gafas Shade Mirror Clear Lens 17059', 16, 20, 'https://i.dummyjson.com/data/products/84/1.jpg'),
(1037, 'LouisWill Men Sunglasses', '50.00', 'LouisWill Men Sunglasses Polarized Sunglasses UV400 Sunglasses Day Night Dual Use Safety Driving Night Vision Eyewear AL-MG Frame Sun Glasses with Free Box for Drivers', 25, 20, 'https://i.dummyjson.com/data/products/85/1.jpg'),
(1038, 'Bluetooth Aux', '25.00', 'Bluetooth Aux Bluetooth Car Aux Car Bluetooth Transmitter Aux Audio Receiver Handfree Car Bluetooth Music Receiver Universal 3.5mm Streaming A2DP Wireless Auto AUX Audio Adapter With Mic For Phone MP3', 37, 17, 'https://i.dummyjson.com/data/products/86/1.jpg'),
(1039, 't Temperature Controller Incubator Controller', '40.00', 'Both Heat and Cool Purpose, Temperature control range; -50 to +110, Temperature measurement accuracy; 0.1, Control accuracy; 0.1', 88, 17, 'https://i.dummyjson.com/data/products/87/1.jpg'),
(1040, 'TC Reusable Silicone Magic Washing Gloves', '29.00', 'TC Reusable Silicone Magic Washing Gloves with Scrubber, Cleaning Brush Scrubber Gloves Heat Resistant Pair for Cleaning of Kitchen, Dishes, Vegetables and Fruits, Bathroom, Car Wash, Pet Care and Multipurpose', 96, 17, 'https://i.dummyjson.com/data/products/88/1.jpg'),
(1041, 'Qualcomm original Car Charger', '40.00', 'best Quality CHarger , Highly Recommended to all best Quality CHarger , Highly Recommended to all', 3, 17, 'https://i.dummyjson.com/data/products/89/1.jpg'),
(1042, 'Cycle Bike Glow', '35.00', 'Universal fitment and easy to install no special wires, can be easily installed and removed. Fits most standard tyre air stem valves of road, mountain bicycles, motocycles and cars.Bright led will turn on w', 50, 17, 'https://i.dummyjson.com/data/products/90/1.jpg'),
(1043, 'Black Motorbike', '569.00', 'Engine Type:Wet sump, Single Cylinder, Four Stroke, Two Valves, Air Cooled with SOHC (Single Over Head Cam) Chain Drive Bore & Stroke:47.0 x 49.5 MM', 96, 18, 'https://i.dummyjson.com/data/products/91/1.jpg'),
(1044, 'HOT SALE IN EUROPE electric racing motorcycle', '920.00', 'HOT SALE IN EUROPE electric racing motorcycle electric motorcycle for sale adult electric motorcycles', 74, 18, 'https://i.dummyjson.com/data/products/92/1.jpg'),
(1045, 'Automatic Motor Gas Motorcycles', '1050.00', '150cc 4-Stroke Motorcycle Automatic Motor Gas Motorcycles Scooter motorcycles 150cc scooter', 13, 18, 'https://i.dummyjson.com/data/products/93/1.jpg'),
(1046, 'new arrivals Fashion motocross goggles', '900.00', 'new arrivals Fashion motocross goggles motorcycle motocross racing motorcycle', 82, 18, 'https://i.dummyjson.com/data/products/94/1.webp'),
(1047, 'Wholesale cargo lashing Belt', '930.00', 'Wholesale cargo lashing Belt Tie Down end Ratchet strap customized strap 25mm motorcycle 1500kgs with rubber handle', 31, 18, 'https://i.dummyjson.com/data/products/95/1.jpg'),
(1048, 'lighting ceiling kitchen', '30.00', 'Wholesale slim hanging decorative kid room lighting ceiling kitchen chandeliers pendant light modern', 95, 19, 'https://i.dummyjson.com/data/products/96/1.jpg'),
(1049, 'Metal Ceramic Flower', '35.00', 'Metal Ceramic Flower Chandelier Home Lighting American Vintage Hanging Lighting Pendant Lamp', 19, 19, 'https://i.dummyjson.com/data/products/97/1.jpg'),
(1050, '3 lights lndenpant kitchen islang', '34.00', '3 lights lndenpant kitchen islang dining room pendant rice paper chandelier contemporary led pendant light modern chandelier', 7, 19, 'https://i.dummyjson.com/data/products/98/1.jpg'),
(1051, 'American Vintage Wood Pendant Light', '46.00', 'American Vintage Wood Pendant Light Farmhouse Antique Hanging Lamp Lampara Colgante', 23, 19, 'https://i.dummyjson.com/data/products/99/1.jpg'),
(1052, 'Crystal chandelier maria theresa for 12 light', '47.00', 'Crystal chandelier maria theresa for 12 light', 66, 19, 'https://i.dummyjson.com/data/products/100/1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `IdRoles` int(11) NOT NULL,
  `NombreRol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`IdRoles`, `NombreRol`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`IdRoles`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carritos`
--
ALTER TABLE `carritos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1053;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `IdRoles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
