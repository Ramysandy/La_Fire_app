-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 16, 2025 at 12:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_category` varchar(100) NOT NULL,
  `item_photo` varchar(255) DEFAULT NULL,
  `item_value` decimal(10,2) DEFAULT NULL,
  `item_notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item_name`, `item_category`, `item_photo`, `item_value`, `item_notes`, `created_at`) VALUES
(1, 'Laptop', 'Electronics', 'uploads/67836e4fa19de_laptop.jpg', 2000.00, 'Damaged Contain Important Data', '2025-01-12 07:25:03'),
(2, 'Sofa', 'Furniture', 'uploads/67836e8cbc5cc_sofa__.jpg', 1000.00, 'Burnt and Damaged ', '2025-01-12 07:26:04'),
(3, 'Coat', 'Clothing', 'uploads/67836ea80e09a_coat.jpg', 500.00, 'Burnt', '2025-01-12 07:26:32'),
(4, 'Tab', 'Electronics', 'uploads/67836ecd97a68_tab.jpg', 999.00, 'Good', '2025-01-12 07:27:09'),
(5, 'Table', 'Furniture', 'uploads/67837054ef7fb_dining table.jpg', 1200.00, 'Not good', '2025-01-12 07:33:40'),
(6, 'Bed', 'Furniture', 'uploads/6783708aea948_bed.jpeg', 1799.00, 'Damaged', '2025-01-12 07:34:34'),
(7, 'Passport', 'Documents', 'uploads/678370cbd9118_passport.jpg', 0.00, 'Document Lost ', '2025-01-12 07:35:39'),
(8, 'Chair', 'Furniture', 'uploads/6783710958886_chair.jpg', 800.00, 'Good', '2025-01-12 07:36:41'),
(9, 'TV', 'Electronics', 'uploads/67837132a54ac_tv.jpg', 1800.00, 'Not Working', '2025-01-12 07:37:22'),
(10, 'SSN', 'Documents', 'uploads/6783714c033e5_ssndoc.jpg', 0.00, 'Lost', '2025-01-12 07:37:48'),
(12, 'Bed', 'Furniture', 'uploads/default.jpeg', 2000.00, 'Not Good', '2025-01-12 07:44:41'),
(13, 'Monitor', 'Electronics', 'uploads/678376e5aea71_monitor.jpg', 3000.00, 'Damaged', '2025-01-12 08:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `fetched_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `name`, `type`, `latitude`, `longitude`, `description`, `fetched_at`) VALUES
(1, 'Unknown', 'shelters', 34.14233450, -118.23407200, 'No details available.', '2025-01-12 12:40:39'),
(2, 'Kaiser Foundation Hospital Mental Health Center', 'medical', 34.06689730, -118.24340190, 'No details available.', '2025-01-12 12:40:41'),
(3, 'Unknown', 'food', 34.06621170, -118.21925110, 'No details available.', '2025-01-12 12:40:44'),
(4, 'Philippe The Original', 'food', 34.05967380, -118.23694100, 'No details available.', '2025-01-12 12:40:44'),
(5, 'Bistro de la Gare', 'food', 34.11489450, -118.15748770, 'No details available.', '2025-01-12 12:40:44'),
(6, 'Round Table Pizza', 'food', 34.11324890, -118.15127440, 'No details available.', '2025-01-12 12:40:44'),
(7, 'Patakan', 'food', 34.11766120, -118.15088890, 'No details available.', '2025-01-12 12:40:44'),
(8, 'The Barkley', 'food', 34.10443350, -118.15230480, 'No details available.', '2025-01-12 12:40:44'),
(9, 'Golden China', 'food', 34.11349310, -118.15142010, 'No details available.', '2025-01-12 12:40:44'),
(10, 'Mike and Anne\'s', 'food', 34.11603500, -118.15545770, 'No details available.', '2025-01-12 12:40:44'),
(11, 'Ai', 'food', 34.11420420, -118.15057410, 'No details available.', '2025-01-12 12:40:44'),
(12, 'Charlie\'s Trio', 'food', 34.09835000, -118.15567700, 'No details available.', '2025-01-12 12:40:44'),
(13, 'Empress Pavilion', 'food', 34.06668240, -118.23726690, 'No details available.', '2025-01-12 12:40:44'),
(14, 'El Cholo Spanish Cafe', 'food', 34.12934620, -118.15003110, 'No details available.', '2025-01-12 12:40:44'),
(15, 'Nikka Fish & Grill', 'food', 34.14684610, -118.14946270, 'No details available.', '2025-01-12 12:40:44'),
(16, 'Russell\'s', 'food', 34.14643630, -118.15035810, 'No details available.', '2025-01-12 12:40:44'),
(17, 'Monterey Hill Steakhouse', 'food', 34.05995310, -118.16299390, 'No details available.', '2025-01-12 12:40:44'),
(18, 'Luminarias', 'food', 34.06054390, -118.16189100, 'No details available.', '2025-01-12 12:40:44'),
(19, 'My Taco', 'food', 34.11435960, -118.18255650, 'No details available.', '2025-01-12 12:40:44'),
(20, 'Houston\'s', 'food', 34.14028270, -118.14717920, 'No details available.', '2025-01-12 12:40:44'),
(21, 'Mi Piace', 'food', 34.14592110, -118.14986080, 'No details available.', '2025-01-12 12:40:44'),
(22, 'Maestro', 'food', 34.14670100, -118.14810120, 'No details available.', '2025-01-12 12:40:44'),
(23, 'Cheval Bistro', 'food', 34.14520070, -118.15242290, 'No details available.', '2025-01-12 12:40:44'),
(24, 'Kabuki', 'food', 34.14541430, -118.15256620, 'No details available.', '2025-01-12 12:40:44'),
(25, 'The Melting Pot', 'food', 34.14549820, -118.15256620, 'No details available.', '2025-01-12 12:40:44'),
(26, 'AUX DELICES', 'food', 34.14556420, -118.15091630, 'No details available.', '2025-01-12 12:40:44'),
(27, 'Noodle World Alhambra', 'food', 34.14558180, -118.15103390, 'No details available.', '2025-01-12 12:40:44'),
(28, 'City Thai', 'food', 34.14468270, -118.15022580, 'No details available.', '2025-01-12 12:40:44'),
(29, 'Fig Sprout', 'food', 34.14468610, -118.14905630, 'No details available.', '2025-01-12 12:40:44'),
(30, 'Il Fornaio', 'food', 34.14630120, -118.15124200, 'No details available.', '2025-01-12 12:40:44'),
(31, 'Polka', 'food', 34.12543840, -118.23161730, 'No details available.', '2025-01-12 12:40:44'),
(32, 'New York Deli', 'food', 34.14631430, -118.14908330, 'No details available.', '2025-01-12 12:40:44'),
(33, 'A\'Float Sushi', 'food', 34.14598650, -118.14856210, 'No details available.', '2025-01-12 12:40:44'),
(34, 'Blaze Pizza', 'food', 34.20484530, -118.19987600, 'No details available.', '2025-01-12 12:40:44'),
(35, 'Slater\'s 50/50', 'food', 34.14691340, -118.14910600, 'No details available.', '2025-01-12 12:40:44'),
(36, 'La Estrella', 'food', 34.15441290, -118.15039940, 'No details available.', '2025-01-12 12:40:44'),
(37, 'ANTIGUA BREAD', 'food', 34.09543720, -118.15825190, 'No details available.', '2025-01-12 12:40:44'),
(38, 'ALBERTOS', 'food', 34.09492450, -118.15232060, 'No details available.', '2025-01-12 12:40:44'),
(39, 'Chiguacle', 'food', 34.05709700, -118.23862860, 'No details available.', '2025-01-12 12:40:44'),
(40, 'O2 Sushi pasadena', 'food', 34.14602060, -118.14529580, 'No details available.', '2025-01-12 12:40:44'),
(41, 'Tiffany\'s Coffee', 'food', 34.14601670, -118.14494440, 'No details available.', '2025-01-12 12:40:44'),
(42, 'Central Park Restaurant', 'food', 34.14190360, -118.15065570, 'No details available.', '2025-01-12 12:40:44'),
(43, 'Happy Trails Catering Inc', 'food', 34.14211000, -118.15063920, 'No details available.', '2025-01-12 12:40:44'),
(44, 'Eagle Rock Noode & Grill', 'food', 34.13689140, -118.18948090, 'No details available.', '2025-01-12 12:40:44'),
(45, 'Golden Forest Mongolian BBQ', 'food', 34.13683140, -118.18950230, 'No details available.', '2025-01-12 12:40:44'),
(46, 'Dog Haus Biergarten', 'food', 34.14479360, -118.14838210, 'No details available.', '2025-01-12 12:40:44'),
(47, 'Korean BBQ', 'food', 34.21618870, -118.22414090, 'No details available.', '2025-01-12 12:40:44'),
(48, 'Chicken Day', 'food', 34.21896600, -118.23061000, 'No details available.', '2025-01-12 12:40:44'),
(49, 'Sakana Sushi', 'food', 34.21885170, -118.23045400, 'No details available.', '2025-01-12 12:40:44'),
(50, 'Big Mama\'s & Papa\'s Pizzeria', 'food', 34.20577450, -118.22844590, 'No details available.', '2025-01-12 12:40:44'),
(51, 'Zeke\'s Smoke House', 'food', 34.20524970, -118.22565150, 'No details available.', '2025-01-12 12:40:44'),
(52, 'New Moon', 'food', 34.20469970, -118.22437980, 'No details available.', '2025-01-12 12:40:44'),
(53, 'El Charro, Mexican Restaurant', 'food', 34.20486710, -118.22558190, 'No details available.', '2025-01-12 12:40:44'),
(54, 'Pho22', 'food', 34.20507160, -118.22630660, 'No details available.', '2025-01-12 12:40:44'),
(55, 'Valeu Espetos', 'food', 34.20508050, -118.22634980, 'No details available.', '2025-01-12 12:40:44'),
(56, 'Giuseppe\'s Pizzeria Montrose', 'food', 34.20658730, -118.23155050, 'No details available.', '2025-01-12 12:40:44'),
(57, 'Cibo Thai', 'food', 34.20811040, -118.23426330, 'No details available.', '2025-01-12 12:40:44'),
(58, 'ZEN', 'food', 34.22206540, -118.23696690, 'No details available.', '2025-01-12 12:40:44'),
(59, 'Garden Grill', 'food', 34.21778260, -118.22822280, 'No details available.', '2025-01-12 12:40:44'),
(60, 'Tibet Nepal House', 'food', 34.14751580, -118.14970460, 'No details available.', '2025-01-12 12:40:44'),
(61, 'Pocha', 'food', 34.11750780, -118.18585500, 'No details available.', '2025-01-12 12:40:44'),
(62, 'Coco\'s Bakery', 'food', 34.11760050, -118.18793900, 'No details available.', '2025-01-12 12:40:44'),
(63, 'Nick\'s Cafe', 'food', 34.06604350, -118.23314930, 'No details available.', '2025-01-12 12:40:44'),
(64, 'Hong Kong BBQ', 'food', 34.06266810, -118.23833750, 'No details available.', '2025-01-12 12:40:44'),
(65, 'Hop Woo BBQ & Seafood Restaurant', 'food', 34.06356730, -118.23791100, 'No details available.', '2025-01-12 12:40:44'),
(66, 'Yang Chow Restaurant', 'food', 34.06284830, -118.23829200, 'No details available.', '2025-01-12 12:40:44'),
(67, 'Foo Chow', 'food', 34.06588460, -118.23820050, 'A scene from Rush Hour 2 was filmed here.', '2025-01-12 12:40:44'),
(68, 'Burgerlords', 'food', 34.06526950, -118.23720300, 'No details available.', '2025-01-12 12:40:44'),
(69, 'Eden Garden Bar & Grill', 'food', 34.14776860, -118.14659700, 'No details available.', '2025-01-12 12:40:44'),
(70, 'Sizzler', 'food', 34.14132410, -118.22182820, 'No details available.', '2025-01-12 12:40:44'),
(71, 'Sage Vegan Bistro', 'food', 34.14647760, -118.15143600, 'No details available.', '2025-01-12 12:40:44'),
(72, 'Sushi Roku', 'food', 34.14640190, -118.15185690, 'No details available.', '2025-01-12 12:40:44'),
(73, 'Fogo de Chão', 'food', 34.14565520, -118.14577400, 'No details available.', '2025-01-12 12:40:44'),
(74, 'Hawg Heaven BBQ', 'food', 34.14595070, -118.14781770, 'No details available.', '2025-01-12 12:40:44'),
(75, 'Pizza Hut', 'food', 34.13231980, -118.14755590, 'No details available.', '2025-01-12 12:40:44'),
(76, 'All About Poke', 'food', 34.20611800, -118.21735600, 'No details available.', '2025-01-12 12:40:44'),
(77, 'Pho Season', 'food', 34.21589530, -118.22584790, 'No details available.', '2025-01-12 12:40:44'),
(78, 'Poke Salad Bar', 'food', 34.14557610, -118.15082780, 'No details available.', '2025-01-12 12:40:44'),
(79, 'Fridas Tacos', 'food', 34.14543070, -118.15121540, 'No details available.', '2025-01-12 12:40:44'),
(80, 'Spin Fish Poke House', 'food', 34.14517540, -118.15122070, 'No details available.', '2025-01-12 12:40:44'),
(81, 'Pie \'n\' Cone', 'food', 34.13895740, -118.21033850, 'Casual dining, pizza and ice cream.', '2025-01-12 12:40:44'),
(82, 'Father Nature', 'food', 34.14614190, -118.15234230, 'No details available.', '2025-01-12 12:40:44'),
(83, 'BAD Sushi', 'food', 34.14781570, -118.14981120, 'No details available.', '2025-01-12 12:40:44'),
(84, 'Tokyo Chick', 'food', 34.14597080, -118.14567170, 'No details available.', '2025-01-12 12:40:44'),
(85, 'Galanga', 'food', 34.13876770, -118.14718280, 'No details available.', '2025-01-12 12:40:44'),
(86, 'The Little Jewel of New Orleans', 'food', 34.06008610, -118.23819420, 'No details available.', '2025-01-12 12:40:44'),
(87, 'Oo-Kook Tofu & BBQ', 'food', 34.08816040, -118.14691460, 'No details available.', '2025-01-12 12:40:44'),
(88, 'Las Anitas', 'food', 34.05803150, -118.23757450, 'No details available.', '2025-01-12 12:40:44'),
(89, 'El Paseo Inn', 'food', 34.05749100, -118.23776980, 'No details available.', '2025-01-12 12:40:44'),
(90, 'La Golondrina Cafe', 'food', 34.05769650, -118.23793770, 'No details available.', '2025-01-12 12:40:44'),
(91, 'Union Street Sandwich', 'food', 34.14687860, -118.14814480, 'No details available.', '2025-01-12 12:40:44'),
(92, 'Pacific Restaurant', 'food', 34.06383990, -118.23771700, 'No details available.', '2025-01-12 12:40:44'),
(93, 'Sàigòn Noodle Restaurant', 'food', 34.14633320, -118.14870440, 'No details available.', '2025-01-12 12:40:44'),
(94, 'Maple', 'food', 34.20104980, -118.20967470, 'No details available.', '2025-01-12 12:40:44'),
(95, 'Kamara', 'food', 34.06100670, -118.24091720, 'No details available.', '2025-01-12 12:40:44'),
(96, 'Montrose Town Kitchen & Grill', 'food', 34.20527190, -118.22761470, 'No details available.', '2025-01-12 12:40:44'),
(97, 'Oriel Wine Bar', 'food', 34.06267800, -118.23633800, 'No details available.', '2025-01-12 12:40:44'),
(98, 'Tortas Mexico', 'food', 34.14736840, -118.15025600, 'No details available.', '2025-01-12 12:40:44'),
(99, 'Prawn Coastal', 'food', 34.14615370, -118.15168320, 'No details available.', '2025-01-12 12:40:44'),
(100, 'Phoenix Bakery', 'food', 34.06594840, -118.23666200, 'No details available.', '2025-01-12 12:40:44'),
(101, 'Hop Louies', 'food', 34.06540950, -118.23774520, 'No details available.', '2025-01-12 12:40:44'),
(102, 'Broadway Cuisine', 'food', 34.06442300, -118.23747000, 'No details available.', '2025-01-12 12:40:44'),
(103, 'Lemon Poppy Kitchen', 'food', 34.11227740, -118.23562970, 'No details available.', '2025-01-12 12:40:44'),
(104, 'Blossom', 'food', 34.06566260, -118.23738100, 'No details available.', '2025-01-12 12:40:44'),
(105, 'Ramen of York by Silverlake Ramen', 'food', 34.12130520, -118.20515600, 'No details available.', '2025-01-12 12:40:44'),
(106, 'Great Maple', 'food', 34.14564530, -118.14446100, 'No details available.', '2025-01-12 12:40:44'),
(107, 'Blaze Pizza', 'food', 34.15656630, -118.15155570, 'No details available.', '2025-01-12 12:40:44'),
(108, 'Stella\'s Pizza Kitchen', 'food', 34.19874320, -118.18855360, 'No details available.', '2025-01-12 12:40:44'),
(109, 'Chuck E. Cheese', 'food', 34.14136590, -118.22481600, 'No details available.', '2025-01-12 12:40:44'),
(110, 'Unknown', 'food', 34.20127110, -118.19260640, 'No details available.', '2025-01-12 12:40:44'),
(111, 'Birdie', 'food', 34.10952150, -118.19333300, 'No details available.', '2025-01-12 12:40:44'),
(112, 'Full House Seafood', 'food', 34.06621770, -118.23802300, 'No details available.', '2025-01-12 12:40:44'),
(113, 'Triple Beam Pizza', 'food', 34.11057650, -118.19029140, 'Serves wine', '2025-01-12 12:40:44'),
(114, 'Full Moon House', 'food', 34.06607770, -118.23766890, 'No details available.', '2025-01-12 12:40:44'),
(115, 'Goldburger', 'food', 34.11943200, -118.19589040, 'No details available.', '2025-01-12 12:40:44'),
(116, 'Taylor\'s Steakhouse', 'food', 34.20374790, -118.19810700, 'No details available.', '2025-01-12 12:40:44'),
(117, 'Unknown', 'food', 34.20436010, -118.19937770, 'No details available.', '2025-01-12 12:40:44'),
(118, 'Sakuri', 'food', 34.20451650, -118.19975720, 'No details available.', '2025-01-12 12:40:44'),
(119, 'Kokoroll Cafe', 'food', 34.21782300, -118.22744290, 'No details available.', '2025-01-12 12:40:44'),
(120, 'PHO 87', 'food', 34.06734000, -118.23565530, 'No details available.', '2025-01-12 12:40:44'),
(121, 'Twohey\'s', 'food', 34.12084760, -118.15000170, 'No details available.', '2025-01-12 12:40:44'),
(122, 'Ichiban Japanese Restaurant', 'food', 34.20235020, -118.19417130, 'No details available.', '2025-01-12 12:40:44'),
(123, 'Classy Cut', 'food', 34.20432210, -118.22281320, 'No details available.', '2025-01-12 12:40:44'),
(124, 'Hikari Sushi', 'food', 34.20451760, -118.22296810, 'No details available.', '2025-01-12 12:40:44'),
(125, 'Thai', 'food', 34.05855720, -118.23882910, 'No details available.', '2025-01-12 12:40:44'),
(126, 'LASA', 'food', 34.06151890, -118.23947270, 'No details available.', '2025-01-12 12:40:44'),
(127, 'Howlin\' Ray\'s', 'food', 34.06154780, -118.23971150, 'No details available.', '2025-01-12 12:40:44'),
(128, 'Hello Pizza', 'food', 34.21782240, -118.22729460, 'No details available.', '2025-01-12 12:40:44'),
(129, 'Hawaiian BBQ', 'food', 34.11722150, -118.15078990, 'No details available.', '2025-01-12 12:40:44'),
(130, 'Sorriso Ristorante & Bar', 'food', 34.14564000, -118.14945850, 'No details available.', '2025-01-12 12:40:44'),
(131, 'Bar Celona', 'food', 34.14551520, -118.14958250, 'No details available.', '2025-01-12 12:40:44'),
(132, 'Jumak', 'food', 34.14666130, -118.14909100, 'No details available.', '2025-01-12 12:40:44'),
(133, 'Unknown', 'food', 34.14299330, -118.23544130, 'No details available.', '2025-01-12 12:40:44'),
(134, 'India\'s Flavor', 'food', 34.19864300, -118.22967900, 'No details available.', '2025-01-12 12:40:44'),
(135, 'Cindy\'s Diner', 'food', 34.13898040, -118.19847730, 'No details available.', '2025-01-12 12:40:44'),
(136, 'Casa Bianca Pizza Pie', 'food', 34.13920320, -118.20281060, 'No details available.', '2025-01-12 12:40:44'),
(137, 'Café Beaujolais', 'food', 34.13913790, -118.20417620, 'No details available.', '2025-01-12 12:40:44'),
(138, 'HomeState', 'food', 34.10926480, -118.19386300, 'No details available.', '2025-01-12 12:40:44'),
(139, 'Wax Paper', 'food', 34.06131930, -118.23855120, 'No details available.', '2025-01-12 12:40:44'),
(140, 'Blaze Pizza', 'food', 34.11355000, -118.15015240, 'No details available.', '2025-01-12 12:40:44'),
(141, 'Sushi Stop', 'food', 34.14552580, -118.14921680, 'No details available.', '2025-01-12 12:40:44'),
(142, 'Golden Fortune Express', 'food', 34.22056240, -118.23499430, 'No details available.', '2025-01-12 12:40:44'),
(143, 'Homeboy Diner', 'food', 34.05367370, -118.24302910, 'Cafe on the 2nd floor of City Hall, staffed by at-risk youth.', '2025-01-12 12:40:44'),
(144, 'Majordomo', 'food', 34.06909650, -118.22615270, 'No details available.', '2025-01-12 12:40:44'),
(145, 'Sushi Monster', 'food', 34.20655400, -118.23143830, 'No details available.', '2025-01-12 12:40:44'),
(146, 'Joselito\'s Mexican Food', 'food', 34.20628260, -118.22981390, 'No details available.', '2025-01-12 12:40:44'),
(147, 'Pepe\'s Mexican Food', 'food', 34.20525230, -118.22740380, 'No details available.', '2025-01-12 12:40:44'),
(148, 'Sake Sushi Bar & Lounge', 'food', 34.20522340, -118.22724150, 'No details available.', '2025-01-12 12:40:44'),
(149, 'Ocean View Bar & Grill', 'food', 34.20647950, -118.22784510, 'No details available.', '2025-01-12 12:40:44'),
(150, 'Blue Fish Sushi', 'food', 34.20544830, -118.22697420, 'No details available.', '2025-01-12 12:40:44'),
(151, 'Cracking Crab', 'food', 34.20517220, -118.22692280, 'No details available.', '2025-01-12 12:40:44'),
(152, 'Black Cow Cafe', 'food', 34.20529770, -118.22596080, 'No details available.', '2025-01-12 12:40:44'),
(153, 'Star Cafe', 'food', 34.20525630, -118.22578160, 'No details available.', '2025-01-12 12:40:44'),
(154, 'King Hua', 'food', 34.09111310, -118.14531330, 'No details available.', '2025-01-12 12:40:44'),
(155, 'El Sol Mexican Restaurant', 'food', 34.21289080, -118.24159090, 'No details available.', '2025-01-12 12:40:44'),
(156, 'Little Ripper', 'food', 34.12654230, -118.23222800, 'No details available.', '2025-01-12 12:40:44'),
(157, 'Tatsu Ramen', 'food', 34.14012350, -118.14788870, 'No details available.', '2025-01-12 12:40:44'),
(158, 'Daddy\'s Chicken Shack', 'food', 34.14377070, -118.15073950, 'No details available.', '2025-01-12 12:40:44'),
(159, 'The Pie Hole', 'food', 34.14609000, -118.14922070, 'No details available.', '2025-01-12 12:40:44'),
(160, 'Bone Kettle', 'food', 34.14708090, -118.14909400, 'No details available.', '2025-01-12 12:40:44'),
(161, 'Burro\'s Breakfast Burritos', 'food', 34.06612780, -118.21222930, 'No details available.', '2025-01-12 12:40:44'),
(162, 'Blair\'s', 'food', 34.13902870, -118.21012050, 'No details available.', '2025-01-12 12:40:44'),
(163, 'Big Mama\'s & Papa\'s Pizzeria', 'food', 34.13891600, -118.21327120, 'No details available.', '2025-01-12 12:40:44'),
(164, 'Mama M Sushi', 'food', 34.14779880, -118.14981590, 'No details available.', '2025-01-12 12:40:44'),
(165, 'Pearl Thai', 'food', 34.14741140, -118.14989310, 'No details available.', '2025-01-12 12:40:44'),
(166, 'Again Cafe x Chibiscus', 'food', 34.14429850, -118.15323260, 'No details available.', '2025-01-12 12:40:44'),
(167, 'Cena Vegan', 'food', 34.07905220, -118.21870170, 'No details available.', '2025-01-12 12:40:44'),
(168, 'China in the Box', 'food', 34.11918440, -118.19727030, 'No details available.', '2025-01-12 12:40:44'),
(169, 'P.F. Chang\'s', 'food', 34.14546390, -118.14457200, 'No details available.', '2025-01-12 12:40:44'),
(170, 'My Vegan', 'food', 34.13970300, -118.20582080, 'No details available.', '2025-01-12 12:40:44'),
(171, 'My Vegan', 'food', 34.13440020, -118.14772150, 'No details available.', '2025-01-12 12:40:44'),
(172, 'Eagle Rock Public House', 'food', 34.13968800, -118.20201550, 'No details available.', '2025-01-12 12:40:44'),
(173, 'The Raymond Restaurant', 'food', 34.12443620, -118.14974490, 'No details available.', '2025-01-12 12:40:44'),
(174, 'Arroyo Chop House', 'food', 34.13635790, -118.14712160, 'No details available.', '2025-01-12 12:40:44'),
(175, 'Parkway Grill', 'food', 34.13706510, -118.14699220, 'No details available.', '2025-01-12 12:40:44'),
(176, 'Entre Nous French Bistro', 'food', 34.14482410, -118.15303890, 'No details available.', '2025-01-12 12:40:44'),
(177, 'Union', 'food', 34.14689790, -118.14965590, 'No details available.', '2025-01-12 12:40:44'),
(178, 'Chef Tony', 'food', 34.14561260, -118.15030520, 'No details available.', '2025-01-12 12:40:44'),
(179, 'Hippo', 'food', 34.11049000, -118.19038760, 'No details available.', '2025-01-12 12:40:44'),
(180, 'Guisados', 'food', 34.13596980, -118.14762520, 'No details available.', '2025-01-12 12:40:44'),
(181, 'Holi Organic Indian Takeout', 'food', 34.13936930, -118.21283510, 'No details available.', '2025-01-12 12:40:44'),
(182, 'Sushi Enya', 'food', 34.14561800, -118.14768700, 'No details available.', '2025-01-12 12:40:44'),
(183, 'Osawa', 'food', 34.14721620, -118.14909500, 'No details available.', '2025-01-12 12:40:44'),
(184, 'Chado Tea Room', 'food', 34.14732230, -118.14908100, 'No details available.', '2025-01-12 12:40:44'),
(185, 'Today Starts Here', 'food', 34.06519270, -118.23817000, 'No details available.', '2025-01-12 12:40:44'),
(186, 'Mason\'s Dumpling Shop', 'food', 34.11054180, -118.19190300, 'No details available.', '2025-01-12 12:40:44'),
(187, 'Pizza Hut', 'food', 34.09523960, -118.20848330, 'No details available.', '2025-01-12 12:40:44'),
(188, 'Las Cazuelas Restaurant', 'food', 34.10983800, -118.19269670, 'No details available.', '2025-01-12 12:40:44'),
(189, 'Otoño', 'food', 34.10994420, -118.19248420, 'No details available.', '2025-01-12 12:40:44'),
(190, 'Antojitos Mexicanos El Paisa', 'food', 34.11030830, -118.19215010, 'No details available.', '2025-01-12 12:40:44'),
(191, 'Unknown', 'food', 34.10502860, -118.18402980, 'No details available.', '2025-01-12 12:40:44'),
(192, 'Villas Tacos', 'food', 34.12029890, -118.20735440, 'No details available.', '2025-01-12 12:40:44'),
(193, 'Won Kok Restaurant', 'food', 34.06171360, -118.23766470, 'No details available.', '2025-01-12 12:40:44'),
(194, 'Pearl River Deli', 'food', 34.06516970, -118.23808150, 'No details available.', '2025-01-12 12:40:44'),
(195, 'Charcoal Kitchen', 'food', 34.14455630, -118.23475800, 'Catering, Wedding Catering, Restaurant, Shawarma Wraps', '2025-01-12 12:40:44'),
(196, 'Ichijiku Sushi', 'food', 34.10950060, -118.19336800, 'No details available.', '2025-01-12 12:40:44'),
(197, 'Rockbird', 'food', 34.14294900, -118.23982120, 'No details available.', '2025-01-12 12:40:44'),
(198, 'China Food Express', 'food', 34.14284030, -118.24002420, 'No details available.', '2025-01-12 12:40:44'),
(199, 'Amboy Quality Meats & Delicious Burgers', 'food', 34.06136190, -118.23971030, 'No details available.', '2025-01-12 12:40:44'),
(200, 'Chifa', 'food', 34.12366460, -118.22096440, 'No details available.', '2025-01-12 12:40:44'),
(201, 'ETA', 'food', 34.10931790, -118.19302560, 'No details available.', '2025-01-12 12:40:44'),
(202, 'Golden Tree', 'food', 34.05967770, -118.23950750, 'No details available.', '2025-01-12 12:40:44'),
(203, 'Villa\'s Tacos', 'food', 34.10860040, -118.19694250, 'No details available.', '2025-01-12 12:40:44'),
(204, 'Toto\'s BBQ', 'food', 34.12547660, -118.23144360, 'No details available.', '2025-01-12 12:40:44'),
(205, 'Malbec Market', 'food', 34.13926220, -118.20219070, 'No details available.', '2025-01-12 12:40:44'),
(206, 'East Garden Restaurant', 'food', 34.06172790, -118.23970710, 'No details available.', '2025-01-12 12:40:44'),
(207, 'Maciel’s Plant-Based Butcher Shop', 'food', 34.11829540, -118.18952030, 'No details available.', '2025-01-12 12:40:44'),
(208, 'SATO Ramen House', 'food', 34.14515160, -118.14868390, 'No details available.', '2025-01-12 12:40:44'),
(209, 'Lokals Only Community Kitchen', 'food', 34.05930020, -118.24079480, 'No details available.', '2025-01-12 12:40:44'),
(210, 'Lokals Only', 'food', 34.05946930, -118.24046220, 'No details available.', '2025-01-12 12:40:44'),
(211, 'Dave\'s Hot Chicken', 'food', 34.14256130, -118.23563190, 'No details available.', '2025-01-12 12:40:44'),
(212, 'HOLDAAK Fried Chicken', 'food', 34.12102040, -118.20522950, 'No details available.', '2025-01-12 12:40:44'),
(213, 'Jugos Azteca', 'food', 34.12074930, -118.20220590, 'No details available.', '2025-01-12 12:40:44'),
(214, 'The Bucket', 'food', 34.12718880, -118.21854150, 'No details available.', '2025-01-12 12:40:44'),
(215, 'The Pot Thai Cafe', 'food', 34.13620790, -118.21625650, 'No details available.', '2025-01-12 12:40:44'),
(216, 'Eagle Rock Kabob', 'food', 34.13612440, -118.21604180, 'No details available.', '2025-01-12 12:40:44'),
(217, 'Bee Wali\'s', 'food', 34.13430140, -118.21531160, 'No details available.', '2025-01-12 12:40:44'),
(218, 'Hayat BBQ', 'food', 34.12435790, -118.22018520, 'No details available.', '2025-01-12 12:40:44'),
(219, 'Génesis Restaurante & Pupuseria', 'food', 34.09252520, -118.22452370, 'No details available.', '2025-01-12 12:40:44'),
(220, 'Five Star Chinese Food', 'food', 34.07350620, -118.21400490, 'No details available.', '2025-01-12 12:40:44'),
(221, 'Little Rodeo Mexican Restaurant', 'food', 34.07362160, -118.20372460, 'No details available.', '2025-01-12 12:40:44'),
(222, 'The Village Mart & Deli', 'food', 34.06931180, -118.19479560, 'No details available.', '2025-01-12 12:40:44'),
(223, 'Roberto\'s Family Restaurant', 'food', 34.07339070, -118.20856190, 'No details available.', '2025-01-12 12:40:44'),
(224, 'El Huarachito', 'food', 34.07357770, -118.20988000, 'No details available.', '2025-01-12 12:40:44'),
(225, 'Maracas Cafe & Catering', 'food', 34.07359310, -118.20634160, 'No details available.', '2025-01-12 12:40:44'),
(226, 'Kailey\'s Restaurant Salvadorean & Mexican Food', 'food', 34.07368730, -118.20241460, 'No details available.', '2025-01-12 12:40:44'),
(227, 'La Grande Orange', 'food', 34.14133270, -118.14856930, 'No details available.', '2025-01-12 12:40:44'),
(228, 'Unknown', 'food', 34.14291150, -118.23349150, 'No details available.', '2025-01-12 12:40:44'),
(229, 'Rosty Peruvian Food', 'food', 34.10856500, -118.19530620, '\"Rosty\" is a Peruvian restaurant located in Highland Park, Los Angeles. Serving up delicious seafood and soup dishes, this gem offers vegan and vegetarian options, making it a crowd-pleaser.', '2025-01-12 12:40:44'),
(230, 'Urban Pocha', 'food', 34.14477020, -118.15073420, 'No details available.', '2025-01-12 12:40:44'),
(231, 'Brooklyn Square', 'food', 34.14476690, -118.15094480, 'No details available.', '2025-01-12 12:40:44'),
(232, 'Patxi\'s Pizza', 'food', 34.06644810, -118.20566030, 'Chicago deep dish pizza. Delivery and pick up service only; no seating.', '2025-01-12 12:40:44'),
(233, 'Gus & Andy\'s Kitchen & Bar', 'food', 34.20527340, -118.22535510, 'No details available.', '2025-01-12 12:40:44'),
(234, 'Haruya Ramen', 'food', 34.08088290, -118.15223580, 'No details available.', '2025-01-12 12:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `user_claims`
--

CREATE TABLE `user_claims` (
  `claim_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('In Progress','Approved','Rejected') DEFAULT 'In Progress',
  `items_claimed` text DEFAULT NULL,
  `total_value` decimal(10,2) DEFAULT 0.00,
  `progress_percentage` int(11) DEFAULT 0,
  `progress_link` varchar(255) DEFAULT NULL,
  `contact_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_claims`
--

INSERT INTO `user_claims` (`claim_id`, `user_id`, `status`, `items_claimed`, `total_value`, `progress_percentage`, `progress_link`, `contact_link`, `created_at`, `updated_at`) VALUES
(1, 0, 'Approved', 'Sofa', 2000.00, 100, 'https://www.amazon.com/', 'https://www.amazon.com/', '2025-01-13 03:54:25', '2025-01-13 03:54:25'),
(2, 0, 'In Progress', 'Sofa2', 2000.00, 45, 'https://www.amazon.com/', 'https://www.amazon.com/', '2025-01-13 04:03:00', '2025-01-13 04:03:00'),
(3, 0, 'Rejected', 'sofa3', 3000.00, 80, 'https://www.amazon.com/', 'https://www.amazon.com/', '2025-01-13 09:25:57', '2025-01-13 09:25:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_claims`
--
ALTER TABLE `user_claims`
  ADD PRIMARY KEY (`claim_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `user_claims`
--
ALTER TABLE `user_claims`
  MODIFY `claim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
