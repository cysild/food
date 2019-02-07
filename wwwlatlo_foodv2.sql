-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 07, 2019 at 09:49 AM
-- Server version: 5.5.61-38.13-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wwwlatlo_foodv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `items` text,
  `total` float DEFAULT NULL,
  `points` float DEFAULT NULL,
  `type` enum('P','T') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_management_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `items`, `total`, `points`, `type`, `created_at`, `updated_at`, `shop_management_id`) VALUES
(1, '[{\"product_name\":\"test\",\"product_price\":\"10\",\"product_id\":\"4\",\"product_quantity\":2,\"unique_key\":1543931600414},{\"product_name\":\"test\",\"product_price\":\"12\",\"product_id\":\"3\",\"product_quantity\":2,\"unique_key\":1543931602506},{\"product_name\":\"   test\",\"product_price\":\"12\",\"product_id\":\"3\",\"product_quantity\":1,\"unique_key\":1543931610586},{\"product_name\":\"   test123\",\"product_price\":\"10\",\"product_id\":\"5\",\"product_quantity\":1,\"unique_key\":1543931612995}]', 66, NULL, 'T', '2018-12-04 08:23:38', '2018-12-04 08:23:38', 1),
(2, '[{\"product_name\":\"   test\",\"product_price\":\"1\",\"product_id\":\"4\",\"product_quantity\":1,\"unique_key\":1543931793909},{\"product_name\":\"   test\",\"product_price\":\"10\",\"product_id\":\"3\",\"product_quantity\":1,\"unique_key\":1543931794562}]', 110, 10, 'P', '2018-12-04 08:26:45', '2018-12-04 08:26:45', 1),
(3, '[{\"product_name\":\"   test\",\"product_price\":\"12\",\"product_id\":\"3\",\"product_quantity\":1,\"unique_key\":1543990566586},{\"product_name\":\"   test12\",\"product_price\":\"10\",\"product_id\":\"4\",\"product_quantity\":1,\"unique_key\":1543990568114}]', 22, NULL, 'T', '2018-12-05 06:14:59', '2018-12-05 06:14:59', 1),
(4, '[{\"product_name\":\"test12\",\"product_price\":\"10\",\"product_id\":\"4\",\"product_quantity\":1,\"unique_key\":1543990858902},{\"product_name\":\"test\",\"product_price\":\"12\",\"product_id\":\"3\",\"product_quantity\":1,\"unique_key\":1543990859728}]', 22, NULL, 'T', '2018-12-05 06:19:46', '2018-12-05 06:19:46', 1),
(5, '[{\"product_name\":\"test12\",\"product_price\":\"10\",\"product_id\":\"4\",\"product_quantity\":1,\"unique_key\":1543991158987}]', 10, NULL, 'T', '2018-12-05 06:24:45', '2018-12-05 06:24:45', 1),
(6, '[{\"product_name\":\"test\",\"product_price\":\"12\",\"product_id\":\"3\",\"product_quantity\":1,\"unique_key\":1543991903441},{\"product_name\":\"test12\",\"product_price\":\"10\",\"product_id\":\"4\",\"product_quantity\":1,\"unique_key\":1543991904051}]', 22, NULL, 'T', '2018-12-05 06:37:11', '2018-12-05 06:37:11', 1),
(7, '[{\"product_name\":\"   Gajrella Hot\",\"product_price\":\"10\",\"product_id\":\"6\",\"product_quantity\":1,\"unique_key\":1544071075866}]', 10, NULL, 'T', '2018-12-06 04:39:27', '2018-12-06 04:39:27', 1),
(8, '[{\"product_name\":\"   Tandoori Chicken (Leg)\",\"product_price\":\"65\",\"product_id\":\"13\",\"product_quantity\":1,\"unique_key\":1544071330215}]', 65, NULL, 'T', '2018-12-06 04:40:57', '2018-12-06 04:40:57', 1),
(9, '[{\"product_name\":\"   Malekhu Ko Machha\",\"product_price\":\"10.99\",\"product_id\":\"23\",\"product_quantity\":1,\"unique_key\":1544081006263},{\"product_name\":\"   Goan Fish Curry\",\"product_price\":\"10\",\"product_id\":\"24\",\"product_quantity\":1,\"unique_key\":1544081007003}]', 20.99, NULL, 'T', '2018-12-06 07:25:40', '2018-12-06 07:25:40', 1),
(10, '[{\"product_name\":\"   Malekhu Ko Machha\",\"product_price\":\"10.99\",\"product_id\":\"23\",\"product_quantity\":1,\"unique_key\":1544081006263},{\"product_name\":\"   Goan Fish Curry\",\"product_price\":\"10\",\"product_id\":\"24\",\"product_quantity\":1,\"unique_key\":1544081007003}]', 20.99, NULL, 'T', '2018-12-06 07:25:40', '2018-12-06 07:25:40', 1),
(11, '[{\"product_name\":\"   Malekhu Ko Machha\",\"product_price\":\"10.99\",\"product_id\":\"23\",\"product_quantity\":1,\"unique_key\":1544081006263},{\"product_name\":\"   Goan Fish Curry\",\"product_price\":\"10\",\"product_id\":\"24\",\"product_quantity\":1,\"unique_key\":1544081007003}]', 20.99, NULL, 'T', '2018-12-06 07:26:32', '2018-12-06 07:26:32', 1),
(12, '[{\"product_name\":\"   Malekhu Ko Machha\",\"product_price\":\"10.99\",\"product_id\":\"23\",\"product_quantity\":1,\"unique_key\":1544081006263},{\"product_name\":\"   Goan Fish Curry\",\"product_price\":\"10\",\"product_id\":\"24\",\"product_quantity\":1,\"unique_key\":1544081007003}]', 20.99, NULL, 'T', '2018-12-06 07:26:34', '2018-12-06 07:26:34', 1),
(13, '[{\"product_name\":\"   Malekhu Ko Machha\",\"product_price\":\"10.99\",\"product_id\":\"23\",\"product_quantity\":1,\"unique_key\":1544081006263},{\"product_name\":\"   Goan Fish Curry\",\"product_price\":\"10\",\"product_id\":\"24\",\"product_quantity\":1,\"unique_key\":1544081007003}]', 20.99, NULL, 'T', '2018-12-06 07:26:34', '2018-12-06 07:26:34', 1),
(14, '[{\"product_name\":\"   Malekhu Ko Machha\",\"product_price\":\"10.99\",\"product_id\":\"23\",\"product_quantity\":1,\"unique_key\":1544081006263},{\"product_name\":\"   Goan Fish Curry\",\"product_price\":\"10\",\"product_id\":\"24\",\"product_quantity\":1,\"unique_key\":1544081007003}]', 20.99, NULL, 'T', '2018-12-06 07:26:32', '2018-12-06 07:26:32', 1),
(15, '[{\"product_name\":\"   Malekhu Ko Machha\",\"product_price\":\"10.99\",\"product_id\":\"23\",\"product_quantity\":1,\"unique_key\":1544081006263},{\"product_name\":\"   Goan Fish Curry\",\"product_price\":\"10\",\"product_id\":\"24\",\"product_quantity\":1,\"unique_key\":1544081007003}]', 20.99, NULL, 'T', '2018-12-06 07:28:14', '2018-12-06 07:28:14', 1),
(16, '[{\"product_name\":\"Salmon Tak Tak\",\"product_price\":\"11.95\",\"product_id\":\"22\",\"product_quantity\":1,\"unique_key\":1544081842136},{\"product_name\":\"Shakes\",\"product_price\":\"15\",\"product_id\":\"9\",\"product_quantity\":1,\"unique_key\":1544081843228}]', 26.95, NULL, 'T', '2018-12-06 07:36:07', '2018-12-06 07:36:07', 1),
(17, '[{\"product_name\":\"Shakes\",\"product_price\":\"15\",\"product_id\":\"9\",\"product_quantity\":1,\"unique_key\":1544081995967}]', 15, NULL, 'T', '2018-12-06 07:38:49', '2018-12-06 07:38:49', 1),
(18, '[{\"product_name\":\"   Gajrella Hot\",\"product_price\":\"10\",\"product_id\":\"6\",\"product_quantity\":1,\"unique_key\":1544082242598},{\"product_name\":\"   Gulab Jamun Hot\",\"product_price\":\"7\",\"product_id\":\"7\",\"product_quantity\":1,\"unique_key\":1544082243073}]', 17, NULL, 'T', '2018-12-06 07:42:53', '2018-12-06 07:42:53', 1),
(19, '[{\"product_name\":\"   French Fries\",\"product_price\":\"4\",\"product_id\":\"57\",\"product_quantity\":1,\"unique_key\":1544095510431},{\"product_name\":\"   Veg Cutlet\",\"product_price\":\"5\",\"product_id\":\"58\",\"product_quantity\":\"2\",\"unique_key\":1544095511958}]', 14, NULL, 'T', '2018-12-06 11:23:56', '2018-12-06 11:23:56', 3),
(20, '[{\"product_name\":\"   Dinner for 4 (Family Meal B)\",\"product_price\":\"60\",\"product_id\":\"12\",\"product_quantity\":1,\"unique_key\":1544095959563}]', 60, NULL, 'T', '2018-12-06 11:31:19', '2018-12-06 11:31:19', 1),
(21, '[{\"product_name\":\"   Gajrella Hot\",\"product_price\":\"10\",\"product_id\":\"6\",\"product_quantity\":1,\"unique_key\":1544096037283},{\"product_name\":\"   Dinner for 2 (Family Meal A)\",\"product_price\":\"50\",\"product_id\":\"11\",\"product_quantity\":1,\"unique_key\":1544096041259},{\"product_name\":\"   Tandoori Chicken (Leg)\",\"product_price\":\"65\",\"product_id\":\"13\",\"product_quantity\":1,\"unique_key\":1544096045439}]', 125, NULL, 'T', '2018-12-06 11:34:39', '2018-12-06 11:34:39', 1),
(22, '[{\"product_name\":\"   Gajrella Hot\",\"product_price\":\"10\",\"product_id\":\"6\",\"product_quantity\":1,\"unique_key\":1544096358055},{\"product_name\":\"   Gulab Jamun Hot\",\"product_price\":\"7\",\"product_id\":\"7\",\"product_quantity\":1,\"unique_key\":1544096358493}]', 170, 10, 'P', '2018-12-06 11:39:04', '2018-12-06 11:39:04', 1),
(23, '[{\"product_name\":\"   Shakes\",\"product_price\":\"15\",\"product_id\":\"9\",\"product_quantity\":1,\"unique_key\":1544097080202},{\"product_name\":\"   Dinner for 2 (Family Meal A)\",\"product_price\":\"50\",\"product_id\":\"11\",\"product_quantity\":1,\"unique_key\":1544097082244}]', 65, NULL, 'T', '2018-12-06 11:51:57', '2018-12-06 11:51:57', 1),
(24, '[{\"product_name\":\"   Dinner for 2 (Family Meal A)\",\"product_price\":\"50\",\"product_id\":\"11\",\"product_quantity\":1,\"unique_key\":1544101118993},{\"product_name\":\"   Dinner for 4 (Family Meal B)\",\"product_price\":\"60\",\"product_id\":\"12\",\"product_quantity\":\"1\",\"unique_key\":1544101122304},{\"product_name\":\"   Naan\",\"product_price\":\"3\",\"product_id\":\"29\",\"product_quantity\":1,\"unique_key\":1544101163868},{\"product_name\":\"   Hakka Noodles\",\"product_price\":\"10\",\"product_id\":\"49\",\"product_quantity\":1,\"unique_key\":1544101171485}]', 123, NULL, 'T', '2018-12-06 13:00:04', '2018-12-06 13:00:04', 1),
(25, '[{\"product_name\":\"Garlic and Coriander Naan\",\"product_price\":\"2.5\",\"product_id\":\"101\",\"product_quantity\":1,\"unique_key\":1544105707533}]', 2.5, NULL, 'T', '2018-12-06 14:17:21', '2018-12-06 14:17:21', 3),
(26, '[{\"product_name\":\"Garlic and Coriander Naan\",\"product_price\":\"2.5\",\"product_id\":\"101\",\"product_quantity\":1,\"unique_key\":1544105707533}]', 2.5, NULL, 'T', '2018-12-06 14:17:21', '2018-12-06 14:17:21', 3),
(27, '[{\"product_name\":\"Garlic and Coriander Naan\",\"product_price\":\"2.5\",\"product_id\":\"101\",\"product_quantity\":1,\"unique_key\":1544105707533}]', 2.5, NULL, 'T', '2018-12-06 14:17:21', '2018-12-06 14:17:21', 3),
(28, '[{\"product_name\":\"   Lassi\",\"product_price\":\"1.99\",\"product_id\":\"111\",\"product_quantity\":1,\"unique_key\":1544105873055},{\"product_name\":\"   Golgappa Water\",\"product_price\":\"2.49\",\"product_id\":\"114\",\"product_quantity\":1,\"unique_key\":1544105874915}]', 4.48, NULL, 'T', '2018-12-06 14:18:48', '2018-12-06 14:18:48', 3),
(29, '[{\"product_name\":\"Shakes\",\"product_price\":\"15\",\"product_id\":\"9\",\"product_quantity\":1,\"unique_key\":1544434982312},{\"product_name\":\"Salmon Tak Tak\",\"product_price\":\"11.95\",\"product_id\":\"22\",\"product_quantity\":1,\"unique_key\":1544434983203}]', 26.95, NULL, 'T', '2018-12-10 09:45:16', '2018-12-10 09:45:16', 1),
(30, '[{\"product_name\":\"   Gajrella Hot\",\"product_price\":\"10\",\"product_id\":\"6\",\"product_quantity\":1,\"unique_key\":1544442051295},{\"product_name\":\"   Apple Juice\",\"product_price\":\"5\",\"product_id\":\"38\",\"product_quantity\":1,\"unique_key\":1544442057174}]', 15, NULL, 'T', '2018-12-10 11:42:16', '2018-12-10 11:42:16', 1),
(31, '[{\"product_name\":\"   Gajrella Hot\",\"product_price\":\"10\",\"product_id\":\"6\",\"product_quantity\":2,\"unique_key\":1544782941330},{\"product_name\":\"   Gulab Jamun Hot\",\"product_price\":\"7\",\"product_id\":\"7\",\"product_quantity\":2,\"unique_key\":1544782942775}]', 4080, 100, 'P', '2018-12-14 04:59:40', '2018-12-14 04:59:40', 1),
(32, '[{\"product_name\":\"   Lacha Parantha\",\"product_price\":\"4\",\"product_id\":\"32\",\"product_quantity\":1,\"unique_key\":1544783404890},{\"product_name\":\"   Vegetable Biryani\",\"product_price\":\"13\",\"product_id\":\"33\",\"product_quantity\":1,\"unique_key\":1544783405450}]', 0, 900, 'P', '2018-12-14 05:00:27', '2018-12-14 05:00:27', 1),
(33, '[{\"product_name\":\"   French Fries\",\"product_price\":\"4\",\"product_id\":\"57\",\"product_quantity\":1,\"unique_key\":1544790298494},{\"product_name\":\"   Veg Cutlet\",\"product_price\":\"5\",\"product_id\":\"58\",\"product_quantity\":1,\"unique_key\":1544790299059},{\"product_name\":\"   Paneer Cutlet\",\"product_price\":\"10\",\"product_id\":\"59\",\"product_quantity\":1,\"unique_key\":1544790299819}]', 1235, 50, 'P', '2018-12-14 12:28:30', '2018-12-14 12:28:30', 3),
(34, '[{\"product_name\":\"   French Fries\",\"product_price\":\"4\",\"product_id\":\"57\",\"product_quantity\":1,\"unique_key\":1544790595733},{\"product_name\":\"   Veg Cutlet\",\"product_price\":\"5\",\"product_id\":\"58\",\"product_quantity\":1,\"unique_key\":1544790596553}]', 0, 900, 'P', '2018-12-14 12:32:17', '2018-12-14 12:32:17', 3),
(35, '[{\"product_name\":\"   Gajrella Hot\",\"product_price\":\"10\",\"product_id\":\"6\",\"product_quantity\":1,\"unique_key\":1548972890749},{\"product_name\":\"   Dinner for 2 (Family Meal A)\",\"product_price\":\"50\",\"product_id\":\"11\",\"product_quantity\":1,\"unique_key\":1548972901344},{\"product_name\":\"   Tandoori Chicken (Leg)\",\"product_price\":\"65\",\"product_id\":\"13\",\"product_quantity\":1,\"unique_key\":1548972906227},{\"product_name\":\"   Dahi Bhalla\",\"product_price\":\"5\",\"product_id\":\"26\",\"product_quantity\":1,\"unique_key\":1548972917023}]', 130, NULL, 'T', '2019-01-31 22:16:35', '2019-01-31 22:16:35', 1),
(36, '[{\"product_name\":\"   Gajrella Hot\",\"product_price\":\"10\",\"product_id\":\"6\",\"product_quantity\":1,\"unique_key\":1548972890749},{\"product_name\":\"   Dinner for 2 (Family Meal A)\",\"product_price\":\"50\",\"product_id\":\"11\",\"product_quantity\":1,\"unique_key\":1548972901344},{\"product_name\":\"   Tandoori Chicken (Leg)\",\"product_price\":\"65\",\"product_id\":\"13\",\"product_quantity\":1,\"unique_key\":1548972906227},{\"product_name\":\"   Dahi Bhalla\",\"product_price\":\"5\",\"product_id\":\"26\",\"product_quantity\":1,\"unique_key\":1548972917023}]', 130, NULL, 'T', '2019-01-31 22:16:37', '2019-01-31 22:16:37', 1),
(37, '[{\"product_name\":\"   Gajrella Hot\",\"product_price\":\"10\",\"product_id\":\"6\",\"product_quantity\":1,\"unique_key\":1548972890749},{\"product_name\":\"   Dinner for 2 (Family Meal A)\",\"product_price\":\"50\",\"product_id\":\"11\",\"product_quantity\":1,\"unique_key\":1548972901344},{\"product_name\":\"   Tandoori Chicken (Leg)\",\"product_price\":\"65\",\"product_id\":\"13\",\"product_quantity\":1,\"unique_key\":1548972906227},{\"product_name\":\"   Dahi Bhalla\",\"product_price\":\"5\",\"product_id\":\"26\",\"product_quantity\":1,\"unique_key\":1548972917023}]', 130, NULL, 'T', '2019-01-31 22:16:39', '2019-01-31 22:16:39', 1),
(38, '[{\"product_name\":\"   Alfredo Pasta\",\"product_price\":\"12\",\"product_id\":\"51\",\"product_quantity\":1,\"unique_key\":1548976482346},{\"product_name\":\"   Macaroni Pasta\",\"product_price\":\"12\",\"product_id\":\"52\",\"product_quantity\":1,\"unique_key\":1548976484845},{\"product_name\":\"   Schezwan Noodles\",\"product_price\":\"15\",\"product_id\":\"50\",\"product_quantity\":2,\"unique_key\":1548976487050},{\"product_name\":\"   Hakka Noodles\",\"product_price\":\"10\",\"product_id\":\"49\",\"product_quantity\":1,\"unique_key\":1548976487577},{\"product_name\":\"   Mini Combo with Paneer Butter Masala\",\"product_price\":\"15\",\"product_id\":\"48\",\"product_quantity\":1,\"unique_key\":1548976490027},{\"product_name\":\"   Sweet & Corn Soup\",\"product_price\":\"6\",\"product_id\":\"56\",\"product_quantity\":3,\"unique_key\":1548976501864}]', 97, NULL, 'T', '2019-01-31 23:17:30', '2019-01-31 23:17:30', 1),
(39, '[{\"product_name\":\"   Alfredo Pasta\",\"product_price\":\"12\",\"product_id\":\"51\",\"product_quantity\":1,\"unique_key\":1548976482346},{\"product_name\":\"   Macaroni Pasta\",\"product_price\":\"12\",\"product_id\":\"52\",\"product_quantity\":1,\"unique_key\":1548976484845},{\"product_name\":\"   Schezwan Noodles\",\"product_price\":\"15\",\"product_id\":\"50\",\"product_quantity\":2,\"unique_key\":1548976487050},{\"product_name\":\"   Hakka Noodles\",\"product_price\":\"10\",\"product_id\":\"49\",\"product_quantity\":1,\"unique_key\":1548976487577},{\"product_name\":\"   Mini Combo with Paneer Butter Masala\",\"product_price\":\"15\",\"product_id\":\"48\",\"product_quantity\":1,\"unique_key\":1548976490027},{\"product_name\":\"   Sweet & Corn Soup\",\"product_price\":\"6\",\"product_id\":\"56\",\"product_quantity\":3,\"unique_key\":1548976501864}]', 97, NULL, 'T', '2019-01-31 23:17:32', '2019-01-31 23:17:32', 1),
(40, '[{\"product_name\":\"   Alfredo Pasta\",\"product_price\":\"12\",\"product_id\":\"51\",\"product_quantity\":\"2\",\"unique_key\":1549262992528},{\"product_name\":\"   Cream Of Tomato Soup\",\"product_price\":\"10\",\"product_id\":\"53\",\"product_quantity\":1,\"unique_key\":1549262995112}]', 34, NULL, 'T', '2019-02-04 06:48:47', '2019-02-04 06:48:47', 1),
(41, '[{\"product_name\":\"   Alfredo Pasta\",\"product_price\":\"12\",\"product_id\":\"51\",\"product_quantity\":\"2\",\"unique_key\":1549262992528},{\"product_name\":\"   Cream Of Tomato Soup\",\"product_price\":\"10\",\"product_id\":\"53\",\"product_quantity\":1,\"unique_key\":1549262995112}]', 34, NULL, 'T', '2019-02-04 06:48:47', '2019-02-04 06:48:47', 1),
(42, '[{\"product_name\":\"Cream of Tomato Soup\",\"product_price\":\"4\",\"product_id\":\"62\",\"product_quantity\":1,\"unique_key\":1549265046686}]', 4, NULL, 'T', '2019-02-04 07:26:41', '2019-02-04 07:26:41', 3),
(43, '[{\"product_name\":\"Cream of Tomato Soup\",\"product_price\":\"4\",\"product_id\":\"62\",\"product_quantity\":1,\"unique_key\":1549265046686}]', 4, NULL, 'T', '2019-02-04 07:26:43', '2019-02-04 07:26:43', 3);

-- --------------------------------------------------------

--
-- Table structure for table `client_details`
--

CREATE TABLE `client_details` (
  `id` int(11) NOT NULL,
  `name` varchar(245) DEFAULT NULL,
  `address` text,
  `contact` varchar(145) DEFAULT NULL,
  `email` varchar(245) DEFAULT NULL,
  `note` text,
  `delivery_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_details`
--

INSERT INTO `client_details` (`id`, `name`, `address`, `contact`, `email`, `note`, `delivery_date`, `created_at`, `updated_at`) VALUES
(1, 'test', NULL, '7777778898', 'cysild@gmail.com', 'acxsac', NULL, '2018-12-04 08:23:38', '2018-12-04 08:23:38'),
(2, 'test123', 'Line1: - line1 Address Line2:- line2 City\r\nsfcvv', '7777778898', 'cysild@gmail.com', NULL, '2018-12-04', '2018-12-04 08:26:45', '2018-12-04 08:26:45'),
(3, 'sam', NULL, '2323232332', 'admin@imalive.in', 'dsad', NULL, '2018-12-05 06:14:59', '2018-12-05 06:14:59'),
(4, 'sa', NULL, '2323232332', 'admin@imalive.in', 'xd', NULL, '2018-12-05 06:19:46', '2018-12-05 06:19:46'),
(5, 'sam', NULL, '2323232332', 'admin@imalive.in', 'sadas', NULL, '2018-12-05 06:24:45', '2018-12-05 06:24:45'),
(6, 'sam', NULL, '2323232332', 'admin@imalive.in', 'dasd', NULL, '2018-12-05 06:37:11', '2018-12-05 06:37:11'),
(7, 'dev', NULL, '9090909090', 'dev@gmail.com', 'test', NULL, '2018-12-06 04:39:27', '2018-12-06 04:39:27'),
(8, 'dev', NULL, '34343434343', 'dec@gmail.com', 'nite', NULL, '2018-12-06 04:40:57', '2018-12-06 04:40:57'),
(9, 'test', NULL, '7777778898', 'scsc@gmail.com', 'axdsacdxc', NULL, '2018-12-06 07:26:20', '2018-12-06 07:26:20'),
(10, 'test', NULL, '7777778898', 'scsc@gmail.com', 'axdsacdxc', NULL, '2018-12-06 07:26:20', '2018-12-06 07:26:20'),
(11, 'test', NULL, '7777778898', 'scsc@gmail.com', 'axdsacdxc', NULL, '2018-12-06 07:27:06', '2018-12-06 07:27:06'),
(12, 'test', NULL, '7777778898', 'scsc@gmail.com', 'axdsacdxc', NULL, '2018-12-06 07:27:06', '2018-12-06 07:27:06'),
(13, 'test', NULL, '7777778898', 'cysild@gmail.com', NULL, NULL, '2018-12-06 07:28:18', '2018-12-06 07:28:18'),
(14, 'Ajay', NULL, '2412341234', 'test@gmail.com', 'sdfasdfsadf', NULL, '2018-12-06 07:36:07', '2018-12-06 07:36:07'),
(15, 'scsxa', NULL, '9952440271', 'admin@gghsh.com', 'sacd', NULL, '2018-12-06 07:38:49', '2018-12-06 07:38:49'),
(16, 'scvdsv', NULL, '89878787', 'ad@gma.com', NULL, NULL, '2018-12-06 07:42:53', '2018-12-06 07:42:53'),
(17, 'dhana', NULL, '9090909090', 'dhana@gmail.com', 'TEST', NULL, '2018-12-06 11:23:56', '2018-12-06 11:23:56'),
(18, 'sandhiya', NULL, '8989898989', 'san@gmail.com', 'Test', NULL, '2018-12-06 11:31:20', '2018-12-06 11:31:20'),
(19, 'Roger', NULL, '12345678', 'roger@gmai.com', NULL, NULL, '2018-12-06 11:34:39', '2018-12-06 11:34:39'),
(20, 'yamuna', '33,4th cross road', '9898989898', 'yamuna@gmail.com', NULL, '2018-12-20', '2018-12-06 11:39:04', '2018-12-06 11:39:04'),
(21, 'Roger', NULL, '12345678', 'roger@gmai.com', 'Test', NULL, '2018-12-06 11:51:57', '2018-12-06 11:51:57'),
(22, 'Roger', NULL, '123456', 'roger@gmai.com', NULL, NULL, '2018-12-06 13:00:04', '2018-12-06 13:00:04'),
(23, 'LatLon   Technologies', NULL, '7373200255', 'paulashok@hotmail.com', 'Need lot of veggies added', NULL, '2018-12-06 14:17:28', '2018-12-06 14:17:28'),
(24, 'LatLon   Technologies', NULL, '7373200255', 'paulashok@hotmail.com', 'Need lot of veggies added', NULL, '2018-12-06 14:17:30', '2018-12-06 14:17:30'),
(25, 'LatLon   Technologies', NULL, '7373200255', 'paulashok@hotmail.com', 'Need lot of veggies added', NULL, '2018-12-06 14:17:31', '2018-12-06 14:17:31'),
(26, 'LatLon   Technologies', NULL, '7373200255', 'paulashok@hotmail.com', 'Need lot of veggies added', NULL, '2018-12-06 14:18:50', '2018-12-06 14:18:50'),
(27, 'test', NULL, '7777778898', 'cysild@gmail.com', 'test', NULL, '2018-12-10 09:45:16', '2018-12-10 09:45:16'),
(28, 'J C Roger', NULL, '9894888842', 'rogeranto@gmail.com', 'Teake', NULL, '2018-12-10 11:42:16', '2018-12-10 11:42:16'),
(29, 'Ajay', 'Main Road,Thambaram', '2412341234', 'bharani@latlontechnologies.com', NULL, '2018-12-14', '2018-12-14 04:59:40', '2018-12-14 04:59:40'),
(30, 'Ajay', 'Main Road,Thambaram', '2412341234', 'bharani@latlontechnologies.com', NULL, '2018-12-20', '2018-12-14 05:00:27', '2018-12-14 05:00:27'),
(31, 'test', 'Line1: - line1 Address Line2:- line2 City\r\nsfcvv', '7777778898', 'cysild@gmail.com', NULL, '2018-12-14', '2018-12-14 12:28:30', '2018-12-14 12:28:30'),
(32, 'test', 'Line1: - line1 Address Line2:- line2 City\r\nsfcvv', '7777778898', 'cysild@gmail.com', NULL, '2018-12-14', '2018-12-14 12:32:17', '2018-12-14 12:32:17'),
(33, 'Manjot', NULL, '4373887315', 'test11@gmail.com', 'Tytfffgjcbvk', NULL, '2019-01-31 22:16:35', '2019-01-31 22:16:35'),
(34, 'Manjot', NULL, '4373887315', 'test11@gmail.com', 'Tytfffgjcbvk', NULL, '2019-01-31 22:16:37', '2019-01-31 22:16:37'),
(35, 'Manjot', NULL, '4373887315', 'test11@gmail.com', 'Tytfffgjcbvk', NULL, '2019-01-31 22:16:39', '2019-01-31 22:16:39'),
(36, 'Hi', NULL, '07777777777', 'raghuluks5@gmail.com', 'Hi', NULL, '2019-01-31 23:17:30', '2019-01-31 23:17:30'),
(37, 'Hi', NULL, '07777777777', 'raghuluks5@gmail.com', 'Hi', NULL, '2019-01-31 23:17:32', '2019-01-31 23:17:32'),
(38, 'cyril', NULL, '1234567890', 'cysild@gmail.com', 'Test', NULL, '2019-02-04 06:48:47', '2019-02-04 06:48:47'),
(39, 'cyril', NULL, '1234567890', 'cysild@gmail.com', 'Test', NULL, '2019-02-04 06:48:47', '2019-02-04 06:48:47'),
(40, 'cyril', NULL, '14632486215', 'cysild@gmail.com', 'hfg', NULL, '2019-02-04 07:26:41', '2019-02-04 07:26:41'),
(41, 'cyril', NULL, '14632486215', 'cysild@gmail.com', 'hfg', NULL, '2019-02-04 07:26:43', '2019-02-04 07:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `food_category`
--

CREATE TABLE `food_category` (
  `id` int(11) NOT NULL,
  `name` varchar(245) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0',
  `is_parent` int(11) DEFAULT NULL,
  `description` text,
  `updated_by` int(11) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shop_management_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_category`
--

INSERT INTO `food_category` (`id`, `name`, `status`, `is_parent`, `description`, `updated_by`, `is_delete`, `created_by`, `created_at`, `updated_at`, `shop_management_id`) VALUES
(1, 'Chaats', NULL, NULL, NULL, 4, 0, 4, '2018-12-04 08:18:16', '2018-12-05 11:45:34', 1),
(2, 'Chinees', NULL, NULL, NULL, 4, 0, 4, '2018-12-04 08:18:24', '2018-12-05 11:45:38', 1),
(3, 'Veg', NULL, 2, NULL, 4, 0, 4, '2018-12-04 08:18:32', '2018-12-05 11:45:43', 1),
(4, 'Non Veg', NULL, 2, NULL, 4, 0, 4, '2018-12-04 08:18:47', '2018-12-05 11:45:47', 1),
(5, 'Desserts', 1, NULL, NULL, 4, 0, 4, '2018-12-05 11:44:11', '2018-12-05 11:46:09', 1),
(6, 'Beverages', 1, NULL, NULL, 4, 0, 4, '2018-12-05 11:48:05', '2018-12-05 11:48:10', 1),
(7, 'Meals', 1, NULL, NULL, NULL, 0, 4, '2018-12-05 11:50:32', '2018-12-05 11:50:32', 1),
(8, 'Specialities', 1, NULL, NULL, 4, 0, 4, '2018-12-05 11:57:12', '2018-12-06 04:48:16', 1),
(9, 'Tandoori Chicken', 1, 8, NULL, 4, 0, 4, '2018-12-05 11:57:31', '2018-12-05 11:57:36', 1),
(10, 'Chaats', 1, 8, NULL, 4, 0, 4, '2018-12-05 11:59:37', '2018-12-05 11:59:54', 1),
(11, 'Jalfrazi', 1, NULL, NULL, NULL, 0, 4, '2018-12-05 12:24:59', '2018-12-05 12:24:59', 1),
(12, 'Chef Fish and Seafood', 1, NULL, NULL, 4, 0, 4, '2018-12-05 12:32:14', '2018-12-05 12:34:02', 1),
(13, 'Side orders', 1, NULL, NULL, NULL, 0, 4, '2018-12-06 04:05:17', '2018-12-06 04:05:17', 1),
(14, 'Breads', 1, NULL, NULL, NULL, 0, 4, '2018-12-06 04:07:14', '2018-12-06 04:07:14', 1),
(15, 'Biryani', 1, NULL, NULL, NULL, 0, 4, '2018-12-06 04:09:53', '2018-12-06 04:09:53', 1),
(16, 'Gurkhali', 1, NULL, NULL, NULL, 0, 4, '2018-12-06 04:12:24', '2018-12-06 04:12:24', 1),
(17, 'Fresh Juices', 1, NULL, NULL, NULL, 0, 4, '2018-12-06 05:08:29', '2018-12-06 05:08:29', 1),
(18, 'Appetiser', 1, NULL, NULL, NULL, 0, 4, '2018-12-06 05:23:44', '2018-12-06 05:23:44', 1),
(19, 'Matho', 1, NULL, NULL, NULL, 0, 4, '2018-12-06 05:25:54', '2018-12-06 05:25:54', 1),
(20, 'Khakhra', 1, NULL, NULL, NULL, 0, 4, '2018-12-06 05:27:24', '2018-12-06 05:27:24', 1),
(21, 'Dry Cake', 1, NULL, NULL, NULL, 0, 4, '2018-12-06 05:28:40', '2018-12-06 05:28:40', 1),
(22, 'Combos', 1, NULL, NULL, NULL, 0, 4, '2018-12-06 05:30:17', '2018-12-06 05:30:17', 1),
(23, 'Noodles', 1, NULL, NULL, NULL, 0, 4, '2018-12-06 05:31:46', '2018-12-06 05:31:46', 1),
(24, 'Pastas', 1, NULL, NULL, NULL, 0, 4, '2018-12-06 05:32:57', '2018-12-06 05:32:57', 1),
(25, 'Soups', 1, NULL, NULL, NULL, 0, 4, '2018-12-06 05:36:42', '2018-12-06 05:36:42', 1),
(26, 'Quick Bites', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 09:46:16', '2018-12-06 09:46:16', 3),
(27, 'Soups', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 09:48:21', '2018-12-06 09:48:21', 3),
(28, 'Pastas', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 09:49:52', '2018-12-06 09:49:52', 3),
(29, 'Main Course', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 09:51:49', '2018-12-06 09:51:49', 3),
(30, 'Veg Main Course', 1, 29, NULL, NULL, 0, 6, '2018-12-06 09:52:15', '2018-12-06 09:52:15', 3),
(31, 'Desserts', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 10:00:31', '2018-12-06 10:00:31', 3),
(32, 'Thick Shakes', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 10:01:44', '2018-12-06 10:01:44', 3),
(33, 'Meals', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 10:05:16', '2018-12-06 10:05:16', 3),
(34, 'Tandoori Starters', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 10:07:55', '2018-12-06 10:07:55', 3),
(35, 'Rice', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 10:11:13', '2018-12-06 10:11:13', 3),
(36, 'Naan', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 10:13:29', '2018-12-06 10:13:29', 3),
(37, 'Side Orders', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 10:16:58', '2018-12-06 10:16:58', 3),
(38, 'Thalis', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 10:20:38', '2018-12-06 10:20:38', 3),
(39, 'Beverages', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 10:22:03', '2018-12-06 10:22:03', 3),
(40, 'Appetiser', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 10:25:12', '2018-12-06 10:25:12', 3),
(41, 'Gurkha Vegetarian Main', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 10:56:45', '2018-12-06 10:56:45', 3),
(42, 'Gurkha Grilled Specialties', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 11:04:47', '2018-12-06 11:04:47', 3),
(43, 'Rogan Josh', 1, NULL, NULL, NULL, 0, 6, '2018-12-06 11:06:48', '2018-12-06 11:06:48', 3);

-- --------------------------------------------------------

--
-- Table structure for table `food_category_sub`
--

CREATE TABLE `food_category_sub` (
  `id` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  `is_delete` tinyint(4) DEFAULT NULL,
  `food_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `id` int(11) NOT NULL,
  `name` varchar(245) DEFAULT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `item_description` text,
  `type` enum('v','n') DEFAULT 'v',
  `image` varchar(245) DEFAULT NULL,
  `is_delete` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `food_category_id` int(11) NOT NULL,
  `main_category` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`id`, `name`, `status`, `item_description`, `type`, `image`, `is_delete`, `created_at`, `updated_at`, `food_category_id`, `main_category`, `shop_id`) VALUES
(1, 'test', 1, NULL, 'n', '154393136730165.jpg', 1, '2018-12-04 08:19:33', '2018-12-04 08:19:38', 1, 1, 1),
(2, 'test', 1, NULL, 'n', '154393136712550.jpg', 1, '2018-12-04 08:19:33', '2018-12-04 08:19:42', 1, 1, 1),
(3, 'test', 0, NULL, 'n', '', 1, '2018-12-04 08:19:33', '2018-12-05 12:30:29', 1, 1, 1),
(4, 'test12', 0, NULL, 'n', NULL, 1, '2018-12-04 08:21:21', '2018-12-05 12:30:24', 1, 1, 1),
(5, 'test123', 0, NULL, 'n', NULL, 1, '2018-12-04 08:21:35', '2018-12-05 12:30:19', 3, 2, 1),
(6, 'Gajrella Hot', 1, NULL, 'v', '1544010862900003250.jpg', 0, '2018-12-05 11:45:17', '2018-12-05 11:54:23', 5, 5, 1),
(7, 'Gulab Jamun Hot', 1, NULL, 'v', '154401089587338519.jpg', 0, '2018-12-05 11:46:41', '2018-12-05 11:54:55', 5, 5, 1),
(8, 'Bengali Rasgulla', 1, NULL, 'v', NULL, 0, '2018-12-05 11:47:20', '2018-12-05 11:47:20', 5, 5, 1),
(9, 'Shakes', 1, NULL, 'v', '1544010957339427135.jpg', 0, '2018-12-05 11:48:45', '2018-12-05 11:55:58', 6, 6, 1),
(10, 'Lassi', 1, NULL, 'v', NULL, 0, '2018-12-05 11:49:26', '2018-12-05 11:49:26', 6, 6, 1),
(11, 'Dinner for 2 (Family Meal A)', 1, NULL, 'v', NULL, 0, '2018-12-05 11:51:04', '2018-12-05 11:51:04', 7, 7, 1),
(12, 'Dinner for 4 (Family Meal B)', 1, NULL, 'v', NULL, 0, '2018-12-05 11:51:34', '2018-12-05 11:51:34', 7, 7, 1),
(13, 'Tandoori Chicken (Leg)', 1, NULL, 'v', NULL, 0, '2018-12-05 11:57:59', '2018-12-06 04:56:27', 8, 8, 1),
(14, 'Tandoori Chicken (Half)', 1, NULL, 'v', NULL, 0, '2018-12-05 11:58:21', '2018-12-06 04:48:32', 8, 8, 1),
(15, 'Samosa Chaat', 1, NULL, 'v', NULL, 0, '2018-12-05 12:02:10', '2018-12-06 04:56:52', 8, 8, 1),
(16, 'Samosa Chaat', 0, NULL, 'v', NULL, 1, '2018-12-05 12:02:18', '2018-12-05 12:15:07', 10, 8, 1),
(17, 'Samosa Chaat', 0, NULL, 'v', NULL, 1, '2018-12-05 12:02:43', '2018-12-05 12:14:55', 10, 8, 1),
(18, 'Pani Puri', 1, NULL, 'v', NULL, 0, '2018-12-05 12:15:44', '2018-12-06 04:57:19', 8, 8, 1),
(19, 'Aloo Tikki Chaat', 1, NULL, 'v', NULL, 0, '2018-12-05 12:17:02', '2018-12-06 04:57:38', 8, 8, 1),
(20, 'Veg Jalfrazi', 1, NULL, 'v', NULL, 0, '2018-12-05 12:25:21', '2018-12-05 12:25:21', 11, 11, 1),
(21, 'Chicken Jalfrazi', 1, NULL, 'v', NULL, 0, '2018-12-05 12:26:25', '2018-12-05 12:26:25', 11, 11, 1),
(22, 'Salmon Tak Tak', 1, NULL, 'v', '15440748251381737595.jpg', 0, '2018-12-05 12:32:38', '2018-12-06 05:40:26', 12, 12, 1),
(23, 'Malekhu Ko Machha', 1, NULL, 'v', NULL, 0, '2018-12-05 12:32:57', '2018-12-05 12:32:57', 12, 12, 1),
(24, 'Goan Fish Curry', 1, NULL, 'v', NULL, 0, '2018-12-05 12:33:17', '2018-12-05 12:33:17', 12, 12, 1),
(25, 'King Prawn Khursani', 1, NULL, 'v', NULL, 0, '2018-12-05 12:33:37', '2018-12-05 12:33:37', 12, 12, 1),
(26, 'Dahi Bhalla', 1, NULL, 'v', NULL, 0, '2018-12-06 04:05:47', '2018-12-06 04:05:47', 13, 13, 1),
(27, 'Raita', 1, NULL, 'v', NULL, 0, '2018-12-06 04:06:12', '2018-12-06 04:06:12', 13, 13, 1),
(28, 'Plain Yoghurt', 1, NULL, 'v', NULL, 0, '2018-12-06 04:06:38', '2018-12-06 04:06:38', 13, 13, 1),
(29, 'Naan', 1, NULL, 'v', NULL, 0, '2018-12-06 04:07:46', '2018-12-06 04:07:46', 14, 14, 1),
(30, 'Plain Naan', 1, NULL, 'v', NULL, 0, '2018-12-06 04:08:09', '2018-12-06 04:08:09', 14, 14, 1),
(31, 'Tandoori Roti', 1, NULL, 'v', '15440701131043050815.jpg', 0, '2018-12-06 04:08:35', '2018-12-06 04:21:53', 14, 14, 1),
(32, 'Lacha Parantha', 1, NULL, 'v', NULL, 0, '2018-12-06 04:08:58', '2018-12-06 04:08:58', 14, 14, 1),
(33, 'Vegetable Biryani', 1, NULL, 'v', NULL, 0, '2018-12-06 04:10:16', '2018-12-06 04:10:16', 15, 15, 1),
(34, 'Chicken Biryani', 1, NULL, 'v', NULL, 0, '2018-12-06 04:10:33', '2018-12-06 04:10:33', 15, 15, 1),
(35, 'Lamb Biryani', 1, NULL, 'v', NULL, 0, '2018-12-06 04:10:54', '2018-12-06 04:10:54', 15, 15, 1),
(36, 'Chicken Gurkhali', 1, NULL, 'v', NULL, 0, '2018-12-06 04:13:45', '2018-12-06 04:13:45', 16, 16, 1),
(37, 'Seebass Gurkhali', 1, NULL, 'v', NULL, 0, '2018-12-06 04:14:13', '2018-12-06 04:14:13', 16, 16, 1),
(38, 'Apple Juice', 1, NULL, 'v', NULL, 0, '2018-12-06 05:08:52', '2018-12-06 05:08:52', 17, 17, 1),
(39, 'Plain Poppadom', 1, NULL, 'v', NULL, 0, '2018-12-06 05:24:02', '2018-12-06 05:24:02', 18, 18, 1),
(40, 'Kesar Pista Matho', 1, NULL, 'v', NULL, 0, '2018-12-06 05:26:24', '2018-12-06 05:26:24', 19, 19, 1),
(41, 'Kesar Pista Matho', 1, NULL, 'v', NULL, 1, '2018-12-06 05:26:24', '2018-12-06 05:26:54', 19, 19, 1),
(42, 'Golden Dryfruit Matho', 1, NULL, 'v', NULL, 0, '2018-12-06 05:27:09', '2018-12-06 05:27:09', 19, 19, 1),
(43, 'Ghee Sada Khakhra (500gms)', 1, NULL, 'v', NULL, 0, '2018-12-06 05:27:40', '2018-12-06 05:27:40', 20, 20, 1),
(44, 'Jeera Khakhra (500gms)', 1, NULL, 'v', NULL, 0, '2018-12-06 05:28:01', '2018-12-06 05:28:01', 20, 20, 1),
(45, 'Double Chocolate Cake', 1, NULL, 'v', NULL, 0, '2018-12-06 05:29:05', '2018-12-06 05:29:05', 21, 21, 1),
(46, 'Marble Cake', 1, NULL, 'v', NULL, 0, '2018-12-06 05:29:28', '2018-12-06 05:29:28', 21, 21, 1),
(47, 'Mini Combo with Chana', 1, NULL, 'v', NULL, 0, '2018-12-06 05:30:36', '2018-12-06 05:30:36', 22, 22, 1),
(48, 'Mini Combo with Paneer Butter Masala', 1, NULL, 'v', NULL, 0, '2018-12-06 05:30:58', '2018-12-06 05:30:58', 22, 22, 1),
(49, 'Hakka Noodles', 1, NULL, 'v', '15440748731125707979.jpg', 0, '2018-12-06 05:32:06', '2018-12-06 05:41:13', 23, 23, 1),
(50, 'Schezwan Noodles', 1, NULL, 'v', NULL, 0, '2018-12-06 05:32:42', '2018-12-06 05:32:42', 23, 23, 1),
(51, 'Alfredo Pasta', 1, NULL, 'v', NULL, 0, '2018-12-06 05:35:02', '2018-12-06 05:35:02', 24, 24, 1),
(52, 'Macaroni Pasta', 1, NULL, 'v', NULL, 0, '2018-12-06 05:36:22', '2018-12-06 05:36:22', 24, 24, 1),
(53, 'Cream Of Tomato Soup', 1, NULL, 'v', NULL, 0, '2018-12-06 05:37:05', '2018-12-06 05:37:05', 25, 25, 1),
(54, 'Hot & Sour Soup', 1, NULL, 'v', NULL, 0, '2018-12-06 05:37:30', '2018-12-06 05:37:30', 25, 25, 1),
(55, 'Manchow Soup', 1, NULL, 'v', NULL, 0, '2018-12-06 05:38:10', '2018-12-06 05:38:10', 25, 25, 1),
(56, 'Sweet & Corn Soup', 1, NULL, 'v', NULL, 0, '2018-12-06 05:38:25', '2018-12-06 05:38:25', 25, 25, 1),
(57, 'French Fries', 1, NULL, 'v', NULL, 0, '2018-12-06 09:46:39', '2018-12-06 09:46:39', 26, 26, 3),
(58, 'Veg Cutlet', 1, NULL, 'v', NULL, 0, '2018-12-06 09:46:55', '2018-12-06 09:46:55', 26, 26, 3),
(59, 'Paneer Cutlet', 1, NULL, 'v', NULL, 0, '2018-12-06 09:47:11', '2018-12-06 09:47:11', 26, 26, 3),
(60, 'Paneer Pakora', 1, NULL, 'v', NULL, 0, '2018-12-06 09:47:25', '2018-12-06 09:47:25', 26, 26, 3),
(61, 'Garlic Bread', 1, NULL, 'v', NULL, 0, '2018-12-06 09:47:40', '2018-12-06 09:47:40', 26, 26, 3),
(62, 'Cream of Tomato Soup', 1, NULL, 'v', '1544094661534123411.jpg', 0, '2018-12-06 09:48:40', '2018-12-06 11:11:02', 27, 27, 3),
(63, 'Sweet corn Soup', 1, NULL, 'v', NULL, 0, '2018-12-06 09:48:54', '2018-12-06 09:48:54', 27, 27, 3),
(64, 'Veg Noodles Soup', 1, NULL, 'v', NULL, 0, '2018-12-06 09:49:08', '2018-12-06 09:49:08', 27, 27, 3),
(65, 'Veg Talumein Soup', 1, NULL, 'v', NULL, 0, '2018-12-06 09:49:28', '2018-12-06 09:49:28', 27, 27, 3),
(66, 'Veg Red Penne Pasta', 1, NULL, 'v', '15440950781164760316.jpg', 0, '2018-12-06 09:50:11', '2018-12-06 11:17:58', 28, 28, 3),
(67, 'Veg White Penne Pasta', 1, NULL, 'v', NULL, 0, '2018-12-06 09:51:17', '2018-12-06 09:51:17', 28, 28, 3),
(68, 'Veg Manchurian Gravy', 1, NULL, 'v', NULL, 0, '2018-12-06 09:52:42', '2018-12-06 09:56:09', 29, 29, 3),
(69, 'Chilli Paneer Gravy', 1, NULL, 'v', NULL, 0, '2018-12-06 09:52:56', '2018-12-06 09:55:59', 29, 29, 3),
(70, 'Chana Masala', 1, NULL, 'v', NULL, 0, '2018-12-06 09:53:11', '2018-12-06 09:55:52', 29, 29, 3),
(71, 'Cheese Badam Pasanda', 1, NULL, 'v', NULL, 0, '2018-12-06 09:53:42', '2018-12-06 09:55:42', 29, 29, 3),
(72, 'Paneer Begum Bahar', 1, NULL, 'v', NULL, 0, '2018-12-06 09:58:44', '2018-12-06 09:58:44', 29, 29, 3),
(73, 'Palak Paneer', 1, NULL, 'v', NULL, 0, '2018-12-06 09:59:08', '2018-12-06 09:59:08', 29, 29, 3),
(74, 'Veg Kofta', 1, NULL, 'v', NULL, 0, '2018-12-06 09:59:27', '2018-12-06 09:59:27', 29, 29, 3),
(75, 'Stuffed Tomato', 1, NULL, 'v', NULL, 0, '2018-12-06 09:59:50', '2018-12-06 09:59:50', 29, 29, 3),
(76, 'Rasgulla (2 Pcs)', 1, NULL, 'v', NULL, 0, '2018-12-06 10:00:51', '2018-12-06 10:00:51', 31, 31, 3),
(77, 'Vanilla Shake', 1, NULL, 'v', NULL, 0, '2018-12-06 10:02:11', '2018-12-06 10:02:11', 32, 32, 3),
(78, 'Strawberry Shake', 1, NULL, 'v', NULL, 0, '2018-12-06 10:02:42', '2018-12-06 10:02:42', 32, 32, 3),
(79, 'Mango Shake', 1, NULL, 'v', NULL, 0, '2018-12-06 10:03:04', '2018-12-06 10:03:04', 32, 32, 3),
(80, 'Dark Secret Shake', 1, NULL, 'v', NULL, 0, '2018-12-06 10:03:28', '2018-12-06 10:03:28', 32, 32, 3),
(81, 'Chocolate Shake', 1, NULL, 'v', NULL, 0, '2018-12-06 10:03:59', '2018-12-06 10:03:59', 32, 32, 3),
(82, 'Paneer Butter Masala + 1 Naan', 1, NULL, 'v', NULL, 0, '2018-12-06 10:05:34', '2018-12-06 10:05:34', 33, 33, 3),
(83, 'Soya Tawa Chaap + Chole + 1 Naan', 1, NULL, 'v', NULL, 0, '2018-12-06 10:05:50', '2018-12-06 10:05:50', 33, 33, 3),
(84, 'Paneer Butter Masala + Dal Tadka + 1 Naan', 1, NULL, 'v', NULL, 0, '2018-12-06 10:06:10', '2018-12-06 10:06:10', 33, 33, 3),
(85, 'Tawa Chicken Bonless + 1 Naan', 1, NULL, 'v', NULL, 0, '2018-12-06 10:06:53', '2018-12-06 10:06:53', 33, 33, 3),
(86, 'Hariyali Paneer Tikka', 1, NULL, 'v', NULL, 0, '2018-12-06 10:08:17', '2018-12-06 10:08:17', 34, 34, 3),
(87, 'Khashi Chops', 1, NULL, 'v', NULL, 0, '2018-12-06 10:08:33', '2018-12-06 10:08:33', 34, 34, 3),
(88, 'Dill Tikka Salmon', 1, NULL, 'v', NULL, 0, '2018-12-06 10:08:48', '2018-12-06 10:08:48', 34, 34, 3),
(89, 'Hariyali Pudina Tikka', 1, NULL, 'v', NULL, 0, '2018-12-06 10:09:10', '2018-12-06 10:09:10', 34, 34, 3),
(90, 'Malai Chicken Tikka', 1, NULL, 'v', NULL, 0, '2018-12-06 10:09:53', '2018-12-06 10:09:53', 34, 34, 3),
(91, 'Fish Tikka Starter', 1, NULL, 'v', NULL, 0, '2018-12-06 10:10:27', '2018-12-06 10:10:27', 34, 34, 3),
(92, 'Boiled Rice', 1, NULL, 'v', NULL, 0, '2018-12-06 10:11:34', '2018-12-06 10:11:34', 35, 35, 3),
(93, 'Pilau Rice', 1, NULL, 'v', NULL, 0, '2018-12-06 10:11:52', '2018-12-06 10:11:52', 35, 35, 3),
(94, 'Peas Pilau Rice', 1, NULL, 'v', NULL, 0, '2018-12-06 10:12:10', '2018-12-06 10:12:10', 35, 35, 3),
(95, 'Mushroom Rice', 1, NULL, 'v', NULL, 0, '2018-12-06 10:12:31', '2018-12-06 10:12:31', 35, 35, 3),
(96, 'Egg Fried Rice', 1, NULL, 'v', NULL, 0, '2018-12-06 10:12:53', '2018-12-06 10:12:53', 35, 35, 3),
(97, 'Garlic Rice', 1, NULL, 'v', NULL, 0, '2018-12-06 10:13:10', '2018-12-06 10:13:10', 35, 35, 3),
(98, 'Roti', 1, NULL, 'v', NULL, 0, '2018-12-06 10:13:53', '2018-12-06 10:13:53', 36, 36, 3),
(99, 'Plain Naan', 1, NULL, 'v', NULL, 0, '2018-12-06 10:14:13', '2018-12-06 10:14:13', 36, 36, 3),
(100, 'Pesawari Naan', 1, NULL, 'v', NULL, 0, '2018-12-06 10:14:35', '2018-12-06 10:14:35', 36, 36, 3),
(101, 'Garlic and Coriander Naan', 1, NULL, 'v', '1544095351325062383.jpg', 0, '2018-12-06 10:14:54', '2018-12-06 11:22:31', 36, 36, 3),
(102, 'Butter Naan', 1, NULL, 'v', NULL, 0, '2018-12-06 10:15:13', '2018-12-06 10:15:13', 36, 36, 3),
(103, 'Keema Naan', 1, NULL, 'v', NULL, 0, '2018-12-06 10:16:00', '2018-12-06 10:16:00', 36, 36, 3),
(104, 'Dahi Bhalla (5pcs)', 1, NULL, 'v', NULL, 0, '2018-12-06 10:17:25', '2018-12-06 10:17:25', 37, 37, 3),
(105, 'Raita', 1, NULL, 'v', NULL, 0, '2018-12-06 10:17:48', '2018-12-06 10:17:48', 37, 37, 3),
(106, 'Plain Yoghurt', 1, NULL, 'v', NULL, 0, '2018-12-06 10:18:19', '2018-12-06 10:18:19', 37, 37, 3),
(107, 'Thandi Kheer', 1, NULL, 'v', NULL, 0, '2018-12-06 10:18:52', '2018-12-06 10:18:52', 31, 31, 3),
(108, 'Thandi Rasmalai', 1, NULL, 'v', NULL, 0, '2018-12-06 10:19:14', '2018-12-06 10:19:14', 31, 31, 3),
(109, 'Thali Musafir', 1, NULL, 'v', NULL, 0, '2018-12-06 10:20:59', '2018-12-06 10:20:59', 38, 38, 3),
(110, 'Thali Tosa', 1, NULL, 'v', NULL, 0, '2018-12-06 10:21:14', '2018-12-06 10:21:14', 38, 38, 3),
(111, 'Lassi', 1, NULL, 'v', NULL, 0, '2018-12-06 10:22:31', '2018-12-06 10:22:31', 39, 39, 3),
(112, 'Bottle Water', 1, NULL, 'v', NULL, 0, '2018-12-06 10:22:55', '2018-12-06 10:22:55', 39, 39, 3),
(113, 'Masala Chai', 1, NULL, 'v', NULL, 0, '2018-12-06 10:23:11', '2018-12-06 10:23:11', 39, 39, 3),
(114, 'Golgappa Water', 1, NULL, 'v', NULL, 0, '2018-12-06 10:23:31', '2018-12-06 10:23:31', 39, 39, 3),
(115, 'Plain Poppadom', 1, NULL, 'v', NULL, 0, '2018-12-06 10:25:34', '2018-12-06 10:25:34', 40, 40, 3),
(116, 'Spicy Poppadom', 1, NULL, 'v', NULL, 0, '2018-12-06 10:25:51', '2018-12-06 10:25:51', 40, 40, 3),
(117, 'Chutney Tray', 1, NULL, 'v', NULL, 0, '2018-12-06 10:26:08', '2018-12-06 10:26:08', 40, 40, 3),
(118, 'Prawn Crackers', 1, NULL, 'v', NULL, 0, '2018-12-06 10:26:23', '2018-12-06 10:26:23', 40, 40, 3),
(119, 'Jhaneko Tadka Dall Main', 1, NULL, 'v', NULL, 0, '2018-12-06 10:57:10', '2018-12-06 10:57:10', 41, 41, 3),
(120, 'Gurkha Aloo Main', 1, NULL, 'v', NULL, 0, '2018-12-06 10:58:02', '2018-12-06 10:58:02', 41, 41, 3),
(121, 'Gurkha Aloo Main', 1, NULL, 'v', NULL, 1, '2018-12-06 10:59:06', '2018-12-06 11:01:34', 41, 41, 3),
(122, 'Saag Makai Main', 1, NULL, 'v', NULL, 0, '2018-12-06 11:01:02', '2018-12-06 11:01:02', 41, 41, 3),
(123, 'Gurkha Junction Mixed Grill', 1, NULL, 'v', NULL, 0, '2018-12-06 11:05:16', '2018-12-06 11:05:16', 42, 42, 3),
(124, 'Chicken Tikka Shaslik', 1, NULL, 'v', NULL, 0, '2018-12-06 11:06:05', '2018-12-06 11:06:05', 42, 42, 3),
(125, 'Veg Rogan Josh', 1, NULL, 'v', NULL, 0, '2018-12-06 11:07:08', '2018-12-06 11:07:08', 43, 43, 3),
(126, 'Chicken Rogan Josh', 1, NULL, 'v', NULL, 0, '2018-12-06 11:07:26', '2018-12-06 11:07:26', 43, 43, 3),
(127, 'Lamb Rogan Josh', 1, NULL, 'v', NULL, 0, '2018-12-06 11:07:44', '2018-12-06 11:07:44', 43, 43, 3);

-- --------------------------------------------------------

--
-- Table structure for table `food_meta`
--

CREATE TABLE `food_meta` (
  `id` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `on_party` tinyint(2) DEFAULT NULL,
  `on_takeaway` tinyint(2) DEFAULT NULL,
  `points` float DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `food_items_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `food_meta`
--

INSERT INTO `food_meta` (`id`, `price`, `on_party`, `on_takeaway`, `points`, `created_by`, `created_at`, `updated_at`, `food_items_id`) VALUES
(1, 12, 1, 1, 10, 4, '2018-12-04 08:19:33', '2018-12-04 08:19:33', 1),
(2, 12, 1, 1, 10, 4, '2018-12-04 08:19:33', '2018-12-04 08:19:33', 2),
(3, 12, 1, 1, 10, 4, '2018-12-04 08:19:33', '2018-12-04 08:19:33', 3),
(4, 10, 1, 1, 1, 4, '2018-12-04 08:21:21', '2018-12-04 08:21:21', 4),
(5, 10, 1, 1, 1, 4, '2018-12-04 08:21:35', '2018-12-04 08:21:35', 5),
(6, 10, 1, 1, 10, 4, '2018-12-05 11:45:17', '2018-12-05 11:45:17', 6),
(7, 7, 1, 1, 7, 4, '2018-12-05 11:46:41', '2018-12-05 12:29:05', 7),
(8, 8, 1, 1, 8, 4, '2018-12-05 11:47:20', '2018-12-05 11:47:20', 8),
(9, 15, 1, 1, 15, 4, '2018-12-05 11:48:45', '2018-12-05 11:48:45', 9),
(10, 5, 1, 1, 7, 4, '2018-12-05 11:49:26', '2018-12-05 11:49:26', 10),
(11, 50, 1, 1, 45, 4, '2018-12-05 11:51:04', '2018-12-05 11:51:04', 11),
(12, 60, 1, 1, 55, 4, '2018-12-05 11:51:34', '2018-12-05 11:51:34', 12),
(13, 65, 1, 1, 60, 4, '2018-12-05 11:57:59', '2018-12-05 11:57:59', 13),
(14, 45, 1, 1, 35, 4, '2018-12-05 11:58:21', '2018-12-05 11:58:21', 14),
(15, 5, 1, 1, 5, 4, '2018-12-05 12:02:29', '2018-12-05 12:02:29', 15),
(16, 5, 1, 1, 5, 4, '2018-12-05 12:02:46', '2018-12-05 12:02:46', 16),
(17, 5, 1, 1, 5, 4, '2018-12-05 12:03:16', '2018-12-05 12:03:16', 17),
(18, 4, 1, 1, 5, 4, '2018-12-05 12:15:44', '2018-12-05 12:15:44', 18),
(19, 3, 1, 1, 3, 4, '2018-12-05 12:17:02', '2018-12-05 12:17:02', 19),
(20, 6.95, 1, 1, 6.95, 4, '2018-12-05 12:25:21', '2018-12-05 12:25:21', 20),
(21, 7.95, 1, 1, 7.95, 4, '2018-12-05 12:26:25', '2018-12-05 12:26:25', 21),
(22, 11.95, 1, 1, 11.95, 4, '2018-12-05 12:32:38', '2018-12-05 12:32:38', 22),
(23, 10.99, 1, 1, 10.99, 4, '2018-12-05 12:32:57', '2018-12-05 12:32:57', 23),
(24, 10, 1, 1, 10, 4, '2018-12-05 12:33:17', '2018-12-05 12:33:17', 24),
(25, 12.99, 1, 1, 12.99, 4, '2018-12-05 12:33:37', '2018-12-05 12:33:37', 25),
(26, 5, 1, 1, 5, 4, '2018-12-06 04:05:47', '2018-12-06 04:05:47', 26),
(27, 4.99, 1, 1, 4.99, 4, '2018-12-06 04:06:12', '2018-12-06 04:06:12', 27),
(28, 4.49, 1, 1, 4.49, 4, '2018-12-06 04:06:38', '2018-12-06 04:06:38', 28),
(29, 3, 1, 1, 3, 4, '2018-12-06 04:07:46', '2018-12-06 04:07:46', 29),
(30, 2.59, 1, 1, 2.59, 4, '2018-12-06 04:08:09', '2018-12-06 04:08:09', 30),
(31, 1.69, 1, 1, 1.69, 4, '2018-12-06 04:08:35', '2018-12-06 04:08:35', 31),
(32, 4, 1, 1, 4, 4, '2018-12-06 04:08:58', '2018-12-06 04:08:58', 32),
(33, 13, 1, 1, 13, 4, '2018-12-06 04:10:16', '2018-12-06 04:10:16', 33),
(34, 14, 1, 1, 14, 4, '2018-12-06 04:10:33', '2018-12-06 04:10:33', 34),
(35, 14, 1, 1, 14, 4, '2018-12-06 04:10:54', '2018-12-06 04:10:54', 35),
(36, 9, 1, 1, 9, 4, '2018-12-06 04:13:45', '2018-12-06 04:13:45', 36),
(37, 10.95, 1, 1, 11, 4, '2018-12-06 04:14:13', '2018-12-06 04:14:13', 37),
(38, 5, 1, 1, 5, 4, '2018-12-06 05:08:52', '2018-12-06 05:08:52', 38),
(39, 5, 1, 1, 5, 4, '2018-12-06 05:24:02', '2018-12-06 05:24:02', 39),
(40, 4, 1, 1, 4, 4, '2018-12-06 05:26:24', '2018-12-06 05:26:24', 40),
(41, 4, 1, 1, 4, 4, '2018-12-06 05:26:24', '2018-12-06 05:26:24', 41),
(42, 6, 1, 1, 6, 4, '2018-12-06 05:27:09', '2018-12-06 05:27:09', 42),
(43, 2, 1, 1, 2, 4, '2018-12-06 05:27:40', '2018-12-06 05:27:40', 43),
(44, 4, 1, 1, 4, 4, '2018-12-06 05:28:01', '2018-12-06 05:28:01', 44),
(45, 5, 1, 1, 5, 4, '2018-12-06 05:29:05', '2018-12-06 05:29:05', 45),
(46, 4, 1, 1, 4, 4, '2018-12-06 05:29:28', '2018-12-06 05:29:28', 46),
(47, 10, 1, 1, 10, 4, '2018-12-06 05:30:36', '2018-12-06 05:30:36', 47),
(48, 15, 1, 1, 15, 4, '2018-12-06 05:30:58', '2018-12-06 05:30:58', 48),
(49, 10, 1, 1, 10, 4, '2018-12-06 05:32:06', '2018-12-06 05:35:49', 49),
(50, 15, 1, 1, 15, 4, '2018-12-06 05:32:42', '2018-12-06 05:32:42', 50),
(51, 12, 1, 1, 13, 4, '2018-12-06 05:35:02', '2018-12-06 05:35:02', 51),
(52, 12, 1, 1, 12, 4, '2018-12-06 05:36:22', '2018-12-06 05:36:22', 52),
(53, 10, 1, 1, 10, 4, '2018-12-06 05:37:05', '2018-12-06 05:37:05', 53),
(54, 5, 1, 1, 5, 4, '2018-12-06 05:37:30', '2018-12-06 05:37:30', 54),
(55, 4, 1, 1, 4, 4, '2018-12-06 05:38:10', '2018-12-06 05:38:10', 55),
(56, 6, 1, 1, 6, 4, '2018-12-06 05:38:25', '2018-12-06 05:38:25', 56),
(57, 4, 1, 1, 4, 6, '2018-12-06 09:46:39', '2018-12-06 09:46:39', 57),
(58, 5, 1, 1, 5, 6, '2018-12-06 09:46:55', '2018-12-06 09:46:55', 58),
(59, 10, 1, 1, 10, 6, '2018-12-06 09:47:11', '2018-12-06 09:47:11', 59),
(60, 4, 1, 1, 5, 6, '2018-12-06 09:47:25', '2018-12-06 09:47:25', 60),
(61, 7, 1, 1, 7, 6, '2018-12-06 09:47:40', '2018-12-06 09:47:40', 61),
(62, 4, 1, 1, 4, 6, '2018-12-06 09:48:40', '2018-12-06 09:48:40', 62),
(63, 3, 1, NULL, 3, 6, '2018-12-06 09:48:54', '2018-12-06 09:48:54', 63),
(64, 2, 1, 1, 2, 6, '2018-12-06 09:49:09', '2018-12-06 09:49:09', 64),
(65, 4, 1, 1, 4, 6, '2018-12-06 09:49:28', '2018-12-06 09:49:28', 65),
(66, 10, 1, 1, 10, 6, '2018-12-06 09:50:11', '2018-12-06 09:50:17', 66),
(67, 15, 1, 1, 15, 6, '2018-12-06 09:51:17', '2018-12-06 09:51:17', 67),
(68, 14, 1, 1, 14, 6, '2018-12-06 09:52:42', '2018-12-06 09:52:42', 68),
(69, 12, 1, 1, 12, 6, '2018-12-06 09:52:56', '2018-12-06 09:52:56', 69),
(70, 11, 1, 1, 11, 6, '2018-12-06 09:53:11', '2018-12-06 09:53:11', 70),
(71, 4, 1, 1, 2, 6, '2018-12-06 09:53:42', '2018-12-06 09:53:42', 71),
(72, 10, 1, 1, 10, 6, '2018-12-06 09:58:45', '2018-12-06 09:58:45', 72),
(73, 12, 1, 1, 12, 6, '2018-12-06 09:59:08', '2018-12-06 09:59:08', 73),
(74, 14, 1, 1, 14, 6, '2018-12-06 09:59:27', '2018-12-06 09:59:27', 74),
(75, 9, 1, 1, 9, 6, '2018-12-06 09:59:50', '2018-12-06 09:59:50', 75),
(76, 8, 1, 1, 8, 6, '2018-12-06 10:00:51', '2018-12-06 10:00:51', 76),
(77, 7.45, 1, 1, 7.45, 6, '2018-12-06 10:02:11', '2018-12-06 10:02:11', 77),
(78, 7, 1, 1, 7, 6, '2018-12-06 10:02:42', '2018-12-06 10:02:42', 78),
(79, 6, 1, 1, 6, 6, '2018-12-06 10:03:04', '2018-12-06 10:03:04', 79),
(80, 8, 1, 1, 8, 6, '2018-12-06 10:03:28', '2018-12-06 10:03:28', 80),
(81, 3, 1, 1, 3, 6, '2018-12-06 10:03:59', '2018-12-06 10:03:59', 81),
(82, 45, 1, 1, 45, 6, '2018-12-06 10:05:34', '2018-12-06 10:05:34', 82),
(83, 25, 1, 1, 25, 6, '2018-12-06 10:05:53', '2018-12-06 10:05:53', 83),
(84, 55, 1, 1, 55, 6, '2018-12-06 10:06:10', '2018-12-06 10:06:10', 84),
(85, 14, 1, 1, 14, 6, '2018-12-06 10:06:53', '2018-12-06 10:06:53', 85),
(86, 12, 1, 1, 12, 6, '2018-12-06 10:08:17', '2018-12-06 10:08:17', 86),
(87, 8, 1, 1, 8, 6, '2018-12-06 10:08:33', '2018-12-06 10:08:33', 87),
(88, 8, 1, 1, 8, 6, '2018-12-06 10:08:48', '2018-12-06 10:08:48', 88),
(89, 4.95, 1, 1, 4.95, 6, '2018-12-06 10:09:10', '2018-12-06 10:09:10', 89),
(90, 4.95, 1, 1, 4.95, 6, '2018-12-06 10:09:53', '2018-12-06 10:09:53', 90),
(91, 3.95, 1, 1, 3.95, 6, '2018-12-06 10:10:27', '2018-12-06 10:10:27', 91),
(92, 1.95, 1, 1, 1.95, 6, '2018-12-06 10:11:34', '2018-12-06 10:11:34', 92),
(93, 2, 1, 1, 2, 6, '2018-12-06 10:11:52', '2018-12-06 10:11:52', 93),
(94, 2.5, 1, 1, 2.5, 6, '2018-12-06 10:12:11', '2018-12-06 10:12:11', 94),
(95, 2.5, 1, 1, 2.5, 6, '2018-12-06 10:12:31', '2018-12-06 10:12:31', 95),
(96, 3, 1, 1, 3, 6, '2018-12-06 10:12:53', '2018-12-06 10:12:53', 96),
(97, 2.5, 1, 1, 2.5, 6, '2018-12-06 10:13:10', '2018-12-06 10:13:10', 97),
(98, 1.5, 1, 1, 1.5, 6, '2018-12-06 10:13:53', '2018-12-06 10:13:53', 98),
(99, 1.95, 1, 1, 1.95, 6, '2018-12-06 10:14:13', '2018-12-06 10:14:13', 99),
(100, 2.5, 1, 1, 2.5, 6, '2018-12-06 10:14:35', '2018-12-06 10:14:35', 100),
(101, 2.5, 1, 1, 2.5, 6, '2018-12-06 10:14:54', '2018-12-06 10:14:54', 101),
(102, 2.5, 1, 1, 2.5, 6, '2018-12-06 10:15:13', '2018-12-06 10:15:13', 102),
(103, 2.5, 1, 1, 2.5, 6, '2018-12-06 10:16:00', '2018-12-06 10:16:00', 103),
(104, 6.49, 1, 1, 6.49, 6, '2018-12-06 10:17:25', '2018-12-06 10:17:25', 104),
(105, 4.99, 1, 1, 4.99, 6, '2018-12-06 10:17:48', '2018-12-06 10:17:48', 105),
(106, 2, 1, 1, 2, 6, '2018-12-06 10:18:19', '2018-12-06 10:18:19', 106),
(107, 2, 1, 1, 2, 6, '2018-12-06 10:18:52', '2018-12-06 10:18:52', 107),
(108, 3, 1, 1, 3, 6, '2018-12-06 10:19:14', '2018-12-06 10:19:14', 108),
(109, 12, 1, 1, 12, 6, '2018-12-06 10:20:59', '2018-12-06 10:20:59', 109),
(110, 11, 1, 1, 11, 6, '2018-12-06 10:21:14', '2018-12-06 10:21:14', 110),
(111, 1.99, 1, 1, 1.99, 6, '2018-12-06 10:22:31', '2018-12-06 10:22:31', 111),
(112, 2.99, 1, 1, 2.99, 6, '2018-12-06 10:22:55', '2018-12-06 10:22:55', 112),
(113, 3, 1, 1, 3, 6, '2018-12-06 10:23:11', '2018-12-06 10:23:11', 113),
(114, 2.49, 1, 1, 2.49, 6, '2018-12-06 10:23:31', '2018-12-06 10:23:31', 114),
(115, 0.5, 1, 1, 0.5, 6, '2018-12-06 10:25:34', '2018-12-06 10:25:34', 115),
(116, 0.75, 1, 1, 0.75, 6, '2018-12-06 10:25:51', '2018-12-06 10:25:51', 116),
(117, 1.75, 1, 1, 1.75, 6, '2018-12-06 10:26:08', '2018-12-06 10:26:08', 117),
(118, 1.5, 1, 1, 1.5, 6, '2018-12-06 10:26:23', '2018-12-06 10:26:23', 118),
(119, 6.95, 1, 1, 6.95, 6, '2018-12-06 10:57:10', '2018-12-06 10:57:10', 119),
(120, 6.95, 1, 1, 6.95, 6, '2018-12-06 10:58:09', '2018-12-06 10:58:09', 120),
(121, 6.95, 1, 1, 6.95, 6, '2018-12-06 10:59:41', '2018-12-06 10:59:41', 121),
(122, 6.95, 1, 1, 6.95, 6, '2018-12-06 11:01:13', '2018-12-06 11:01:13', 122),
(123, 13.95, 1, 1, 13.95, 6, '2018-12-06 11:05:21', '2018-12-06 11:05:21', 123),
(124, 9.95, 1, 1, 9.95, 6, '2018-12-06 11:06:05', '2018-12-06 11:06:05', 124),
(125, 6.95, 1, 1, 6.95, 6, '2018-12-06 11:07:08', '2018-12-06 11:07:08', 125),
(126, 7.95, 1, 1, 7.95, 6, '2018-12-06 11:07:26', '2018-12-06 11:07:26', 126),
(127, 8.95, 1, 1, 8.95, 6, '2018-12-06 11:07:44', '2018-12-06 11:07:44', 127);

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `key` varchar(250) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `member_points`
--

CREATE TABLE `member_points` (
  `id` int(11) NOT NULL,
  `starting_value` int(11) NOT NULL,
  `ending_value` int(11) NOT NULL,
  `points_value` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `shop_id` int(11) DEFAULT NULL,
  `is_delete` tinyint(2) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member_points`
--

INSERT INTO `member_points` (`id`, `starting_value`, `ending_value`, `points_value`, `status`, `shop_id`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 0, 25, 50, 1, 1, 0, '2018-12-04 08:25:15', '2018-12-14 04:47:30'),
(2, 25, 50, 65, 1, 1, 0, '2018-12-06 11:36:22', '2018-12-14 04:47:40'),
(3, 50, 75, 100, 1, 1, 0, '2018-12-06 11:36:30', '2018-12-14 04:48:01'),
(4, 1, 25, 50, 1, 3, 0, '2018-12-06 11:37:04', '2018-12-14 12:25:03'),
(5, 25, 50, 65, 1, 3, 0, '2018-12-06 11:37:12', '2018-12-14 12:26:54'),
(6, 51, 75, 100, 1, 3, 0, '2018-12-06 11:37:24', '2018-12-14 12:25:49'),
(7, 75, 100, 120, 1, 1, 0, '2018-12-06 12:12:01', '2018-12-14 04:48:09'),
(8, 100, 125, 122, 1, 1, 0, '2018-12-06 12:12:25', '2018-12-14 04:48:19'),
(9, 125, 150, 126, 1, 1, 0, '2018-12-06 12:12:41', '2018-12-14 04:48:28'),
(10, 76, 100, 120, 1, 3, 0, '2018-12-06 12:15:06', '2018-12-14 12:25:55'),
(11, 101, 125, 122, 1, 3, 0, '2018-12-06 12:15:19', '2018-12-14 12:26:06'),
(12, 126, 150, 126, 1, 3, 0, '2018-12-06 12:15:29', '2018-12-14 12:26:19'),
(13, 151, 175, 150, 1, 3, 0, '2018-12-06 12:15:44', '2018-12-14 12:26:28'),
(14, 150, 175, 150, 1, 1, 0, '2018-12-06 12:16:24', '2018-12-14 04:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(245) DEFAULT NULL,
  `order_on` timestamp NULL DEFAULT NULL,
  `status` enum('o','c','p') NOT NULL DEFAULT 'o',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cart_id` int(11) NOT NULL,
  `cart_shop_management_id` int(11) NOT NULL,
  `user_details_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `order_on`, `status`, `created_at`, `updated_at`, `cart_id`, `cart_shop_management_id`, `user_details_id`) VALUES
(1, '1T2E7L1', '2018-12-04 08:23:38', 'o', '2018-12-04 08:23:38', '2018-12-04 08:23:38', 1, 1, 1),
(2, '1PN8VH2', '2018-12-04 08:26:45', 'o', '2018-12-04 08:26:45', '2018-12-04 08:26:45', 2, 1, 2),
(3, '1TZYNN3', '2018-12-05 06:14:59', 'o', '2018-12-05 06:14:59', '2018-12-05 06:14:59', 3, 1, 3),
(4, '1TJYTM4', '2018-12-05 06:19:46', 'o', '2018-12-05 06:19:46', '2018-12-05 06:19:46', 4, 1, 4),
(5, '1TMQGL5', '2018-12-05 06:24:45', 'o', '2018-12-05 06:24:45', '2018-12-05 06:24:45', 5, 1, 5),
(6, '1T1PKH6', '2018-12-05 06:37:11', 'o', '2018-12-05 06:37:11', '2018-12-05 06:37:11', 6, 1, 6),
(7, '1TX5GA7', '2018-12-06 04:39:27', 'o', '2018-12-06 04:39:27', '2018-12-06 04:39:27', 7, 1, 7),
(8, '1TIWSF8', '2018-12-06 04:40:57', 'o', '2018-12-06 04:40:57', '2018-12-06 04:40:57', 8, 1, 8),
(9, '1TQ4AO10', '2018-12-06 07:27:06', 'o', '2018-12-06 07:27:06', '2018-12-06 07:27:06', 10, 1, 10),
(10, '1TBPOQ12', '2018-12-06 07:27:07', 'o', '2018-12-06 07:27:07', '2018-12-06 07:27:07', 13, 1, 12),
(11, '1TSITL11', '2018-12-06 07:27:07', 'o', '2018-12-06 07:27:07', '2018-12-06 07:27:07', 14, 1, 11),
(12, '1T4K1J13', '2018-12-06 07:28:32', 'o', '2018-12-06 07:28:32', '2018-12-06 07:28:32', 15, 1, 13),
(13, '1TX2W314', '2018-12-06 07:36:07', 'o', '2018-12-06 07:36:07', '2018-12-06 07:36:07', 16, 1, 14),
(14, '1T6EY815', '2018-12-06 07:38:49', 'o', '2018-12-06 07:38:49', '2018-12-06 07:38:49', 17, 1, 15),
(15, '1TWHU416', '2018-12-06 07:42:53', 'o', '2018-12-06 07:42:53', '2018-12-06 07:42:53', 18, 1, 16),
(16, '3TEUCL17', '2018-12-06 11:23:56', 'o', '2018-12-06 11:23:56', '2018-12-06 11:23:56', 19, 3, 17),
(17, '1TC2O018', '2018-12-06 11:31:20', 'o', '2018-12-06 11:31:20', '2018-12-06 11:31:20', 20, 1, 18),
(18, '1T27XY19', '2018-12-06 11:34:39', 'o', '2018-12-06 11:34:39', '2018-12-06 11:34:39', 21, 1, 19),
(19, '1PIGJK20', '2018-12-06 11:39:04', 'c', '2018-12-06 11:39:04', '2018-12-07 04:44:42', 22, 1, 20),
(20, '1T3STV21', '2018-12-06 11:51:57', 'o', '2018-12-06 11:51:57', '2018-12-06 11:51:57', 23, 1, 21),
(21, '1TQMMI22', '2018-12-06 13:00:04', 'c', '2018-12-06 13:00:04', '2018-12-07 04:43:06', 24, 1, 22),
(22, '3TAMRN25', '2018-12-06 14:17:42', 'o', '2018-12-06 14:17:42', '2018-12-06 14:17:42', 26, 3, 25),
(23, '3TVWXP24', '2018-12-06 14:17:37', 'o', '2018-12-06 14:17:38', '2018-12-06 14:17:38', 27, 3, 24),
(24, '3TOYUU23', '2018-12-06 14:17:37', 'o', '2018-12-06 14:17:38', '2018-12-06 14:17:38', 25, 3, 23),
(25, '3TA27V26', '2018-12-06 14:18:50', 'o', '2018-12-06 14:18:50', '2018-12-06 14:18:50', 28, 3, 26),
(26, '1T9NQX27', '2018-12-10 09:45:16', 'o', '2018-12-10 09:45:16', '2018-12-10 09:45:16', 29, 1, 27),
(27, '1T2G7F28', '2018-12-10 11:42:16', 'o', '2018-12-10 11:42:16', '2018-12-10 11:42:16', 30, 1, 28),
(28, '1PF9SR29', '2018-12-14 04:59:40', 'o', '2018-12-14 04:59:40', '2018-12-14 04:59:40', 31, 1, 29),
(29, '1PQAUL30', '2018-12-14 05:00:27', 'o', '2018-12-14 05:00:27', '2018-12-14 05:00:27', 32, 1, 30),
(30, '3PD53R31', '2018-12-14 12:28:30', 'o', '2018-12-14 12:28:30', '2018-12-14 12:28:30', 33, 3, 31),
(31, '3PMDL132', '2018-12-14 12:32:17', 'o', '2018-12-14 12:32:17', '2018-12-14 12:32:17', 34, 3, 32),
(32, '1TKVGN33', '2019-01-31 22:16:35', 'o', '2019-01-31 22:16:35', '2019-01-31 22:16:35', 35, 1, 33),
(33, '1TL1FM34', '2019-01-31 22:16:37', 'o', '2019-01-31 22:16:37', '2019-01-31 22:16:37', 36, 1, 34),
(34, '1TUGKA35', '2019-01-31 22:16:39', 'o', '2019-01-31 22:16:39', '2019-01-31 22:16:39', 37, 1, 35),
(35, '1TEY2T36', '2019-01-31 23:17:30', 'o', '2019-01-31 23:17:30', '2019-01-31 23:17:30', 38, 1, 36),
(36, '1T9GLI37', '2019-01-31 23:17:32', 'o', '2019-01-31 23:17:32', '2019-01-31 23:17:32', 39, 1, 37),
(37, '1TWJPH38', '2019-02-04 06:48:47', 'o', '2019-02-04 06:48:47', '2019-02-04 06:48:47', 40, 1, 38),
(38, '1TKZOJ39', '2019-02-04 06:48:47', 'o', '2019-02-04 06:48:47', '2019-02-04 06:48:47', 41, 1, 39),
(39, '3TNON740', '2019-02-04 07:26:41', 'o', '2019-02-04 07:26:41', '2019-02-04 07:26:41', 42, 3, 40),
(40, '3TDA2441', '2019-02-04 07:26:43', 'o', '2019-02-04 07:26:43', '2019-02-04 07:26:43', 43, 3, 41);

-- --------------------------------------------------------

--
-- Table structure for table `recommend`
--

CREATE TABLE `recommend` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `items` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommend`
--

INSERT INTO `recommend` (`id`, `shop_id`, `items`, `created_at`, `updated_at`) VALUES
(1, 1, '[\"9\",\"22\"]', '2018-12-04 08:19:54', '2018-12-06 05:41:41'),
(2, 3, '[\"58\",\"62\"]', '2018-12-06 11:11:10', '2019-01-31 05:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'shop\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `shop_management`
--

CREATE TABLE `shop_management` (
  `id` int(11) NOT NULL,
  `name` varchar(245) DEFAULT NULL,
  `address` text,
  `is_enable` tinyint(4) DEFAULT NULL,
  `contact` varchar(100) DEFAULT NULL,
  `contact1` varchar(100) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_management`
--

INSERT INTO `shop_management` (`id`, `name`, `address`, `is_enable`, `contact`, `contact1`, `is_delete`, `created_at`, `updated_at`, `users_id`) VALUES
(1, 'White Castle', '2 Battersea Rise, London SW11 1ED, UK', 1, '7777778898', '7778889998', 1, '2018-12-04 08:17:23', '2018-12-06 09:31:21', 4),
(2, 'testtest', 'Main Road,Thambaram', 1, '9876543210', '02412341234', 1, '2018-12-06 07:30:29', '2018-12-06 07:30:29', 5),
(3, 'Clos Maggiore', '44 King St, \r\nLondon -UK', 1, '2073799695', '2073799690', 1, '2018-12-06 09:30:26', '2018-12-06 09:30:26', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(195) DEFAULT NULL,
  `email` varchar(195) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@food.com', '$2y$10$kONp0/hG7gy/nbQ.j77ZnumxaaofGtXspnZtpX2H0OBzPnWmQIeQ2', 'C0vKLBHUvH3SP7jR7sziuzTrdLWRqWAD6iB42VVc5SDjL9tpUQuX1abE5soy', NULL, NULL),
(4, 'Kiran', 'castle@food.com', '$2y$10$d2njb9HPlIoSG/Qy6HcbfeX4MXdeKcKTXnwv/ToPz4vYid0xn/G2y', 'mtGTjSqKxHfSHeM7JatZ0Gsm25dyStk2w2CncpU7UQWTS3VCHyuPhYNxVSW6', '2018-12-04 08:17:23', '2018-12-07 06:08:24'),
(5, 'test', 'test@gmail.com', '$2y$10$eGKFc4QXk0JrkXoltRatfOCWuluNhPNtV8R/iiMBRBFG9VPd1SwJa', NULL, '2018-12-06 07:30:29', '2018-12-06 07:30:29'),
(6, 'Edvin', 'maggiore@food.com', '$2y$10$pVE1DSAFgTQDcqBAzLEDtexOKKoV/OEkdrcCXtL6UCVbjANhehWOy', '5GEmaztYJrTONPe2RgHS4wl5GBwDeXTkSo7wDSSWRPGVkKDwqZw54UijAWwN', '2018-12-06 09:30:26', '2018-12-06 09:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `users_has_roles`
--

CREATE TABLE `users_has_roles` (
  `users_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `shop_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_has_roles`
--

INSERT INTO `users_has_roles` (`users_id`, `roles_id`, `shop_id`) VALUES
(1, 1, NULL),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`,`shop_management_id`);

--
-- Indexes for table `client_details`
--
ALTER TABLE `client_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_category`
--
ALTER TABLE `food_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_food_category_shop_management1_idx` (`shop_management_id`);

--
-- Indexes for table `food_category_sub`
--
ALTER TABLE `food_category_sub`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_food_category_type_food_category1_idx` (`food_category_id`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`id`,`food_category_id`),
  ADD KEY `fk_food_items_food_category1_idx` (`food_category_id`);

--
-- Indexes for table `food_meta`
--
ALTER TABLE `food_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_food_meta_food_items_idx` (`food_items_id`);

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_points`
--
ALTER TABLE `member_points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`,`cart_id`,`cart_shop_management_id`),
  ADD KEY `fk_orders_cart1_idx` (`cart_id`,`cart_shop_management_id`),
  ADD KEY `fk_orders_user_details1_idx` (`user_details_id`);

--
-- Indexes for table `recommend`
--
ALTER TABLE `recommend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_management`
--
ALTER TABLE `shop_management`
  ADD PRIMARY KEY (`id`,`users_id`),
  ADD KEY `fk_shop_management_users1_idx` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_has_roles`
--
ALTER TABLE `users_has_roles`
  ADD PRIMARY KEY (`users_id`,`roles_id`),
  ADD KEY `fk_users_has_roles_roles1_idx` (`roles_id`),
  ADD KEY `fk_users_has_roles_users1_idx` (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `client_details`
--
ALTER TABLE `client_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `food_category`
--
ALTER TABLE `food_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `food_category_sub`
--
ALTER TABLE `food_category_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `food_meta`
--
ALTER TABLE `food_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_points`
--
ALTER TABLE `member_points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `recommend`
--
ALTER TABLE `recommend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop_management`
--
ALTER TABLE `shop_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_category`
--
ALTER TABLE `food_category`
  ADD CONSTRAINT `fk_food_category_shop_management1` FOREIGN KEY (`shop_management_id`) REFERENCES `shop_management` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `food_category_sub`
--
ALTER TABLE `food_category_sub`
  ADD CONSTRAINT `fk_food_category_type_food_category1` FOREIGN KEY (`food_category_id`) REFERENCES `food_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `food_items`
--
ALTER TABLE `food_items`
  ADD CONSTRAINT `fk_food_items_food_category1` FOREIGN KEY (`food_category_id`) REFERENCES `food_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `food_meta`
--
ALTER TABLE `food_meta`
  ADD CONSTRAINT `fk_food_meta_food_items` FOREIGN KEY (`food_items_id`) REFERENCES `food_items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_user_details1` FOREIGN KEY (`user_details_id`) REFERENCES `client_details` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `shop_management`
--
ALTER TABLE `shop_management`
  ADD CONSTRAINT `fk_shop_management_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users_has_roles`
--
ALTER TABLE `users_has_roles`
  ADD CONSTRAINT `fk_users_has_roles_roles1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_has_roles_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
