-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.27 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_multi_shop
CREATE DATABASE IF NOT EXISTS `db_multi_shop` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_multi_shop`;

-- Dumping structure for table db_multi_shop.tbl_cart_data
CREATE TABLE IF NOT EXISTS `tbl_cart_data` (
  `Session_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `productId` int NOT NULL,
  `Qty` int NOT NULL,
  KEY `Index 1` (`productId`),
  KEY `Session_id` (`Session_id`),
  CONSTRAINT `FK_tbl_cart_data_tbl_product` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table db_multi_shop.tbl_order_details
CREATE TABLE IF NOT EXISTS `tbl_order_details` (
  `orderNumber` varchar(50) NOT NULL DEFAULT '',
  `productId` int NOT NULL,
  `Qty` int NOT NULL,
  `paymentType` int NOT NULL,
  `FName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `LName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Email` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Mobile` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `addressLine_01` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `addressLine_02` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Country` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `City` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `State` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ZIPCode` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `FK_tbl_order_details_tbl_product` (`productId`) USING BTREE,
  KEY `orderNumber` (`orderNumber`) USING BTREE,
  KEY `FK_tbl_order_details_tbl_payment_types` (`paymentType`) USING BTREE,
  KEY `Index 4` (`Mobile`,`Email`),
  CONSTRAINT `FK_tbl_order_details_tbl_payment_types` FOREIGN KEY (`paymentType`) REFERENCES `tbl_payment_types` (`code`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_tbl_order_details_tbl_product` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table db_multi_shop.tbl_payment_types
CREATE TABLE IF NOT EXISTS `tbl_payment_types` (
  `code` int NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  KEY `Index 1` (`code`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table db_multi_shop.tbl_product
CREATE TABLE IF NOT EXISTS `tbl_product` (
  `productId` int NOT NULL,
  `productName` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `price` double(5,2) NOT NULL DEFAULT '0.00',
  `imagePath` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`productId`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

-- Data exporting was unselected.

-- Dumping structure for table db_multi_shop.tbl_stock
CREATE TABLE IF NOT EXISTS `tbl_stock` (
  `productId` int NOT NULL,
  `Stock` int NOT NULL,
  KEY `Index 2` (`productId`),
  CONSTRAINT `FK_tbl_stock_tbl_product` FOREIGN KEY (`productId`) REFERENCES `tbl_product` (`productId`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

-- Dumping structure for table db_multi_shop.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userName` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  KEY `Index 1` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Data exporting was unselected.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
