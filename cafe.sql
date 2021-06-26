-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 06:15 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`, `amount`) VALUES
(2, 4, 2),
(2, 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Café', 'Los clásicos'),
(2, 'Bebidas calientes', 'Bebidas ricas y sanas'),
(3, 'Metodos artesanales', 'Bebidas preparadas con presición y cuidado de nuestros baristas'),
(4, 'Bebidas frias', 'Para disfrutar en días soleados'),
(5, 'Postres', 'Para deleitarse'),
(6, 'Panqués/Galletas/Scones', 'Para disfrutarlos al máximo'),
(7, 'Sandwiches', 'Sandwiches hechos con los ingredientes más finos'),
(8, 'Café en grano/Para la casa', 'Para los verdaderos amantes del café'),
(9, 'Hamburguesas', 'Prueba nuestra hamburguesa BBQ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `orders_status_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders_status`
--

CREATE TABLE `orders_status` (
  `id` int(11) NOT NULL,
  `status` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_status`
--

INSERT INTO `orders_status` (`id`, `status`) VALUES
(1, 'Pendiente'),
(2, 'Aceptada');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `stock` int(11) DEFAULT 10,
  `is_discarded` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `name`, `description`, `price`, `stock`, `is_discarded`) VALUES
(1, 1, 'Espresso', '60 ml de espresso. Dulce con un acidez ligero', 40, 10, 0),
(2, 1, 'Cortado', 'Espresso con leche texturizada 180 ml.', 48, 10, 0),
(3, 1, 'CHIQUITITO', 'Leche condensada, espresso y leche texturizada 240 ml.', 50, 10, 0),
(4, 1, 'Americano', 'Espresso con agua caliente 360 ml.', 48, 10, 0),
(5, 1, 'Cappuccino', 'Espresso con leche texturizada 360 ml.', 55, 10, 0),
(6, 1, 'Latte', 'Espresso con leche texturizada 480 ml.', 58, 10, 0),
(7, 1, 'Café con Leche', 'Espresso con agua caliente, y leche texturizada 480 ml.', 55, 10, 0),
(8, 1, 'Latte Vainilla', 'Espresso, vainilla, y leche texturizada 480 ml.', 60, 10, 0),
(9, 1, 'Mocha', 'Espresso, chocolate y leche texturizada 480 ml.', 60, 10, 0),
(10, 1, 'Latte Caramelo', 'Espresso, caramelo y leche texturizada 480 ml.', 60, 10, 0),
(11, 2, 'Matcha Latte', 'Puro Matcha latte hecho con matcha puro 480 ml.', 65, 10, 0),
(12, 2, 'Matcha Latte Dulce', 'Matcha latte hecho con matcha poquito endulzado 480 ml.', 65, 10, 0),
(13, 2, 'Doradita', 'Bebida con mezcla de especias con base de curcuma 360 ml.', 60, 10, 0),
(14, 2, 'Betabel', 'Latte Bebida con mezcla de especias con base de betabel 360 ml.', 60, 10, 0),
(15, 2, 'Té', 'Escoges el tipo de té', 50, 10, 0),
(16, 2, 'Chocolate', 'Caliente Chocolate estilo oaxaqueno con leche texturizada 480 ml.', 60, 10, 0),
(17, 2, 'Chai', 'Dulce Base de chai poco endulzado con leche texturizada 480 ml.', 65, 10, 0),
(18, 2, 'Chai Masala', 'Chai natural de especies 360 ml.', 55, 10, 0),
(19, 2, 'Chai Espresso', 'Base de chai poco endulzado, leche texturizada y espresso 480 ml.', 70, 10, 0),
(20, 2, 'Babyccino', 'Leche texturizada con sabor a tu elección 240 ml.', 40, 10, 0),
(21, 3, 'Aeropress', 'Café hecho en manera artesanal en el Aeropress 300 ml', 50, 10, 0),
(22, 3, 'Chemex', 'Café hecho en manera artesanal en el Chemex 300 ml', 50, 10, 0),
(23, 3, 'Prensa Francesa', 'Café hecho en manera artesanal en el Prensa Francesa 300 ml', 50, 10, 0),
(24, 3, 'Pour Over V60', 'Café hecho en manera artesanal en el Pour Over V60 300 ml', 50, 10, 0),
(25, 4, 'Cold Brew', 'Extracción en frío de café, el extracto mezclado con agua 480 ml', 50, 10, 0),
(26, 4, 'Botella Cold Brew', 'Extracto puro de cafe 250 ml', 150, 10, 0),
(27, 4, 'Espresso Tonic', 'Extracto puro de cafe 250 ml', 65, 10, 0),
(28, 4, 'Latte Frío en Botella', 'Latte frío en botella para tomar en casa 500 ml', 90, 10, 0),
(29, 4, 'Chocolate Frío', 'Chocolate estilo oaxaqueño con leche fria 480 ml', 60, 10, 0),
(30, 4, 'Latte Frio', 'Latte hecho con espresso o cold brew con leche 480 ml', 58, 10, 0),
(31, 4, 'Chai Dulce Frío', 'Base de Chai poco endulzado con leche fria 480 ml', 65, 10, 0),
(32, 4, 'Chai Masala Latte Frío', 'Chai natural de especias 480 ml', 60, 10, 0),
(33, 4, 'Matcha Frío', 'Matcha latte hecho con matcha con poco endulzante 480 ml', 65, 10, 0),
(34, 4, 'Frappé Cappuccino', 'Base frappé café con espresso, leche y hielos 480 ml', 70, 10, 0),
(35, 4, 'Frappé Chai', 'Base frappé chai con leche y hielos 480 ml', 70, 10, 0),
(36, 4, 'Frappé Matcha', 'Base frappé matcha con leche y hielos 480 ml', 70, 10, 0),
(37, 4, 'Topo Chico', 'Topo Chico Mineral 355 ml', 35, 10, 0),
(38, 4, 'Dominga Kombucha', 'Jugo mineral 355 ml', 105, 10, 0),
(39, 5, 'Pudín de Chía', 'Pudin de chía con leche de coco, toque de miel y frutos rojos', 60, 10, 0),
(40, 5, 'Yoghurt Orgánico con Granola', 'Yoghurt orgánico, frutos rojos y granola de la casa', 55, 10, 0),
(41, 5, 'Arroz con 3 Leches', 'Arroz con 3 Leches', 55, 10, 0),
(42, 5, 'Gelatina de Queso', 'Gelatina de Queso', 50, 10, 0),
(43, 5, 'Pay de Limón con Merengue', 'Pay de Limón con Merengue', 55, 10, 0),
(44, 5, 'Gajos de Toronja', 'Una toronja partida en gajos', 45, 10, 0),
(45, 6, 'Panqué de Plátano Rebanada', 'Panqué de Plátano Rebanada', 45, 10, 0),
(46, 6, 'Panqué de Matcha Rebanada', 'Panqué de Matcha Rebanada', 55, 10, 0),
(47, 6, 'Panqué de Nata Rebanada', 'Panqué de Nata Rebanada', 45, 10, 0),
(48, 6, 'Panqué de Yoghurt, limón y cardamomo Rebanada', 'Panqué de Yoghurt, limón y cardamomo Rebanada', 45, 10, 0),
(49, 6, 'Panqué de Plátano Completo', 'Panqué de Plátano', 270, 10, 0),
(50, 6, 'Panqué de Matcha Completo', 'Panqué de Matcha', 300, 10, 0),
(51, 6, 'Panqué de Nata Completo', 'Panqué de Nata', 270, 10, 0),
(52, 6, 'Panqué de Yoghurt, limón y cardamomo Completo', 'Panqué de Yoghurt, limón y cardamomo', 270, 10, 0),
(53, 6, 'Galleta Chispas de Chocolate', 'Galleta Chispas de Chocolate', 30, 10, 0),
(54, 6, 'Galleta de Avena', 'Galleta de Avena', 25, 10, 0),
(55, 6, 'Galleta de Dulce de Leche', 'Galleta de Dulce de Leche', 30, 10, 0),
(56, 6, 'Galleta de Nutella', 'Galleta de Nutella', 30, 10, 0),
(57, 6, 'Galletas de Nuez', 'Galletas de Nuez', 40, 10, 0),
(58, 6, 'Scones', 'Scones', 45, 10, 0),
(59, 7, 'Pan de Granos Aguacate', 'Pan de granos, aguacate, arúgula, queso feta, chile seco, aceite de oliva y sal de mar', 120, 10, 0),
(60, 7, 'Pan de Granos Hummus', 'Pan de granos, hummus, arúgula, aceite de oliva, jitomate y sal de mar', 105, 10, 0),
(61, 7, 'Croissant con Jamón de Pavo', 'Croissant con Jamón de Pavo', 75, 10, 0),
(62, 7, 'Pan Blanco', 'Pan blanco con jamón de pavo, panela, jitomate, lechuga y mayonesa chipotle', 110, 10, 0),
(63, 7, 'Bagel de Salmón', 'Bagel, salmón, alcaparras y queso crema', 115, 10, 0),
(64, 7, 'Cibatta Queso de Cabra', 'Cibatta con queso de cabra, pepino y tapenada', 95, 10, 0),
(65, 7, 'Baguette Tomates Rojos', 'Baguette con tomates rojos, mozzarela fresco y pesto de la casa', 100, 10, 0),
(66, 7, 'Baguette Jamón Serrano', 'Baguette cin jamón serrano, queso brie, mostaza dijon, aguacate, lechuga y aceite de oliva', 125, 10, 0),
(67, 8, 'Espresso Boca Del Monte - Café en Grano', 'Este es el café que usamos para nuestro espresso. viene del boca del monte, veracruz, es dulce, con un acidez presente, con notas de chocolate, almendra, y miel, es muy versátil, lo puedes usar para todos los métodos de preparación de café', 150, 10, 0),
(68, 8, 'Café con Jiribilla Veracruz', 'Del productor Marco Córdoba tenemos un café de un micro lote de la Finca Corahe, en Zentla, Veracruz, es café natural, secado en camas, de la variedad sarchimor, notas de sabor: caramelo, fresa y chocolate. Café con Jiribilla es el proyecto de Carlos de la Torre.', 195, 10, 0),
(69, 8, 'Café con Jiribilla Oaxaca', 'Del productor Salvador Moreno tenemos un café de la Finca el Zacatal, en Santa Cruz Acatepec, Oaxaca, es una mezcla de las variedades typica y bourbon, con proceso lavado, que típicamente deja una taza muy fresca y limpia en la boca, notas de sabor: toronja deshidratada, flor de naranja y ciruel', 195, 10, 0),
(70, 8, 'Café Finca Las Nieves', 'Este café es un bourbon natural, con notas de sabor: Cacao obscuro, cereza, fresa', 175, 10, 0),
(71, 8, 'Granola de la Casa', ' Una bolsa de 250 gramos de nuestra granola hecha en casa', 100, 10, 0),
(72, 8, 'Mama Pacha Chocolate en Barra', 'Mamá Pacha chocolate artesanal, Ingredientes: 75% cacao nativo, azúcar de coco 70 gramos', 125, 10, 0),
(73, 8, 'Tote Bag Chiquitito', 'Bolsa del café Chiquitito', 250, 10, 0),
(74, 9, 'Hamburguesa BBQ', 'Hamburguesa con salsa BBQ', 80, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `product_id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_id`, `path`) VALUES
(1, '../images/products/1.jpg'),
(2, '../images/products/2.jpg'),
(3, '../images/products/3.jpg'),
(4, '../images/products/4.jpg'),
(5, '../images/products/5.jpg'),
(6, '../images/products/6.jpg'),
(7, '../images/products/7.jpg'),
(8, '../images/products/8.jpg'),
(9, '../images/products/9.jpg'),
(10, '../images/products/10.jpg'),
(11, '../images/products/11.jpg'),
(12, '../images/products/12.jpg'),
(13, '../images/products/13.jpg'),
(14, '../images/products/14.jpg'),
(15, '../images/products/15.jpg'),
(16, '../images/products/16.jpg'),
(17, '../images/products/17.jpg'),
(18, '../images/products/18.jpg'),
(19, '../images/products/19.jpg'),
(20, '../images/products/20.jpg'),
(21, '../images/products/21.jpg'),
(22, '../images/products/22.jpg'),
(23, '../images/products/23.jpg'),
(24, '../images/products/24.jpg'),
(25, '../images/products/25.jpg'),
(26, '../images/products/26.jpg'),
(27, '../images/products/27.jpg'),
(28, '../images/products/28.jpg'),
(29, '../images/products/29.jpg'),
(30, '../images/products/30.jpg'),
(31, '../images/products/31.jpg'),
(32, '../images/products/32.jpg'),
(33, '../images/products/33.jpg'),
(34, '../images/products/34.jpg'),
(35, '../images/products/35.jpg'),
(36, '../images/products/36.jpg'),
(37, '../images/products/37.jpg'),
(38, '../images/products/38.jpg'),
(39, '../images/products/39.jpg'),
(40, '../images/products/40.jpg'),
(41, '../images/products/41.jpg'),
(42, '../images/products/42.jpg'),
(43, '../images/products/43.jpg'),
(44, '../images/products/44.jpg'),
(45, '../images/products/45.jpg'),
(46, '../images/products/46.jpg'),
(47, '../images/products/47.jpg'),
(48, '../images/products/48.jpg'),
(49, '../images/products/49.jpg'),
(50, '../images/products/50.jpg'),
(51, '../images/products/51.jpg'),
(52, '../images/products/52.jpg'),
(53, '../images/products/53.jpg'),
(54, '../images/products/54.jpg'),
(55, '../images/products/55.jpg'),
(56, '../images/products/56.jpg'),
(57, '../images/products/57.jpg'),
(58, '../images/products/58.jpg'),
(59, '../images/products/59.jpg'),
(60, '../images/products/60.jpg'),
(61, '../images/products/61.jpg'),
(62, '../images/products/62.jpg'),
(63, '../images/products/63.jpg'),
(64, '../images/products/64.jpg'),
(65, '../images/products/65.jpg'),
(66, '../images/products/66.jpg'),
(67, '../images/products/67.jpg'),
(68, '../images/products/68.jpg'),
(69, '../images/products/69.jpg'),
(70, '../images/products/70.jpg'),
(71, '../images/products/71.jpg'),
(72, '../images/products/72.jpg'),
(73, '../images/products/73.jpg'),
(74, '../images/products/74.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `transactions_status_id` int(11) DEFAULT 0,
  `funds` double DEFAULT NULL,
  `send_date` timestamp NULL DEFAULT current_timestamp(),
  `approval_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions_image`
--

CREATE TABLE `transactions_image` (
  `transactions_id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transactions_status`
--

CREATE TABLE `transactions_status` (
  `id` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions_status`
--

INSERT INTO `transactions_status` (`id`, `description`) VALUES
(0, 'pendiete'),
(1, 'aceptado'),
(2, 'rechazado');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_type_id` int(11) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `cellphone` varchar(10) DEFAULT NULL,
  `funds` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_type_id`, `first_name`, `last_name`, `email`, `password`, `cellphone`, `funds`) VALUES
(2, 0, 'Alan', 'Vázquez', 'halomortalxd@hotmail.com', 'Maincra420', '5586763176', 0),
(3, 0, 'Angel', 'López', 'angellopezgracia@gmail.com', 'Maincra421', '5557505717', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `description`) VALUES
(0, 'Usuario'),
(1, 'Cocinero'),
(2, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_id`,`product_id`,`amount`),
  ADD KEY `cart_product_id_idx` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_orders_status_idx` (`orders_status_id`);

--
-- Indexes for table `orders_status`
--
ALTER TABLE `orders_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_idx` (`category_id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`product_id`,`path`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`user_id`,`product_id`,`orders_id`),
  ADD KEY `transaction_user_id_idx` (`user_id`),
  ADD KEY `transaction_product_id_idx` (`product_id`),
  ADD KEY `ticket_orders_id_idx` (`orders_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_user_id_idx` (`user_id`),
  ADD KEY `transaction_transaction_status_id_idx` (`transactions_status_id`);

--
-- Indexes for table `transactions_image`
--
ALTER TABLE `transactions_image`
  ADD PRIMARY KEY (`transactions_id`,`path`);

--
-- Indexes for table `transactions_status`
--
ALTER TABLE `transactions_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`,`email`),
  ADD KEY `user_user_type_id_idx` (`user_type_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_orders_status` FOREIGN KEY (`orders_status_id`) REFERENCES `orders_status` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `product_image_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_orders_id` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transaction_transaction_status_id` FOREIGN KEY (`transactions_status_id`) REFERENCES `transactions_status` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `transactions_image`
--
ALTER TABLE `transactions_image`
  ADD CONSTRAINT `transaction_image_transaction_id` FOREIGN KEY (`transactions_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_user_type_id` FOREIGN KEY (`user_type_id`) REFERENCES `user_type` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
