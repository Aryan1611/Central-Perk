-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2019 at 02:14 PM
-- Server version: 5.7.26-0ubuntu0.18.10.1
-- PHP Version: 7.2.19-0ubuntu0.18.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(10) UNSIGNED NOT NULL,
  `food_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `food_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `address`, `remember_token`) VALUES
(1, 'a', 'a@a.c', 'qwerty', '9999999999', 'dfgyguf', NULL),
(2, 'b', 'b@b.c', 'qwerty', '9999999998', 'tyhjfd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `food_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serves` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contents` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food_name`, `category`, `price`, `quantity`, `description`, `serves`, `contents`) VALUES
(1, 'Joey\'s Meatball Sub', 'F.R.I.E.N.D.S Special', 99, 96, 'Taste the iconic meatball sub every F.R.I.E.N.D.S fan craves!!', '1 (Obviously! Joey doesn\'t share food!!', 'Non Veg'),
(2, 'Rachel\'s English Trifle', 'F.R.I.E.N.D.S Special', 399, 100, 'The classic english trifle... without the beef ofcourse!', '6', 'Non Veg'),
(3, 'The \"Moistmaker\" Sandwich', 'F.R.I.E.N.D.S Special', 69, 99, 'NO ONE SHOULD THROW AWAY THIS SANDWICH!!!', '1', 'Non Veg'),
(4, 'Little Bakery Cheesecake', 'F.R.I.E.N.D.S Special', 499, 49, 'A stolen Cheesecake tastes the best!', '4', 'Non Veg'),
(5, 'Monica\'s Lasagna', 'F.R.I.E.N.D.S Special', 199, 99, 'Devour Joey\'s favourite Lasagnas!', '2', 'Non Veg'),
(6, 'Caffè Americano', 'Beverages', 69, 300, 'Classic Caffè Americano', '1', 'Veg'),
(7, 'Café Latte', 'Beverages', 69, 300, 'Classic Café Latte', '1', 'Veg'),
(8, 'Cappuccino', 'Beverages', 69, 296, 'Classic Cappuccino', '1', 'Veg'),
(9, 'Espresso', 'Beverages', 69, 300, 'Classic Espresso', '1', 'Veg'),
(10, 'Flat White', 'Beverages', 69, 297, 'Classic Flat White', '1', 'Veg'),
(11, 'Long Black', 'Beverages', 69, 300, 'Classic Long Black', '1', 'Veg'),
(12, 'Macchiato', 'Beverages', 69, 300, 'Classic Macchiato', '1', 'Veg'),
(13, 'Classic Fries', 'Sides', 69, 200, 'The Classic Salted French Fries', '1-2', 'Veg'),
(14, 'Peri Peri Fries', 'Sides', 89, 200, 'Fries sprinkled with peri peri', '1-2', 'Veg'),
(15, 'Cheesy Fries', 'Sides', 109, 200, 'Fries topped with creamy cheese sauce', '1-2', 'Veg'),
(16, 'Cheese Overloaded Fries', 'Sides', 139, 200, 'Fries loaded with grated mozzarella and creamy cheese sauce', '2-3', 'Veg'),
(17, 'Chipotle Fries', 'Sides', 119, 200, 'Fries topped with tangy chipotle sauce', '1-2', 'Veg'),
(18, 'BBQ Fries', 'Sides', 119, 200, 'Fries topped with exotic BBQ sauce', '1-2', 'Veg'),
(19, 'Garlic Bread', 'Sides', 89, 200, 'Classic garlic bread sticks', '1-2', 'Veg'),
(20, 'Garlic Bread with Cheese', 'Sides', 109, 200, 'The name describes itself ;)', '1-2', 'Veg'),
(21, 'Simply Veg', 'Pizzas', 149, 200, 'Topped with onions, tomatoes, capsicum and golden corn', '2', 'Veg'),
(22, 'Plain Cheese', 'Pizzas', 149, 100, 'Pizza loaded with just Cheeeeeeeese', '2', 'Veg'),
(23, 'Shahi Paneer', 'Pizzas', 169, 100, 'Topped with paneer, onions and tomatoes', '2', 'Veg'),
(24, 'BBQ Chicken', 'Pizzas', 169, 100, 'Topped with BBQ chicken', '2', 'Non Veg'),
(25, 'Chicken Overloaded', 'Pizzas', 209, 100, 'Topped with BBQ chicken, Chicken Salami, Chicken Keema and Chicken Sausage', '2', 'Non Veg'),
(26, 'Mac N Cheese', 'Pastas', 129, 100, 'The Classic Mac N Cheese', '1-2', 'Veg'),
(27, 'White Alfredo', 'Pastas', 129, 100, 'Alfredo pasta topped with white pasta sauce and various veggies', '1-2', 'Veg'),
(28, 'Chicken White Alfredo', 'Pastas', 149, 100, 'Alfredo Pasta topped with white pasta sauce with various veggies and grated chicken', '1-2', 'Non Veg'),
(29, 'Chocolate', 'Shakes', 99, 100, 'Classic chocolate milkshake', '1', 'Veg'),
(30, 'Butterscotch', 'Shakes', 99, 100, 'Classic butterscotch milkshake', '1', 'Veg'),
(31, 'Strawberry', 'Shakes', 99, 100, 'Classic strawberry milkshake', '1', 'Veg'),
(32, 'Oreo', 'Shakes', 99, 100, 'Classic Oreo milkshake', '1', 'Veg'),
(33, 'Bottled Water (1/2 ltr)', 'Beverages', 20, 400, 'Seriously? Why to describe this?', '1', 'Veg'),
(34, 'Soft Drinks (1/2 ltr)', 'Beverages', 40, 200, 'Nope. Not describing this either', '1', 'Veg');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_29_192753_create_employees_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_10_15_111530_create_food_table', 1),
(6, '2019_10_19_095347_create_bill_table', 1),
(7, '2019_10_20_092314_create_cust_table', 1),
(8, '2019_10_24_184951_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `my_employees`
--

CREATE TABLE `my_employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doj` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `food_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `food_id`, `cust_id`, `food_name`, `price`, `quantity`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 1, 'Flat White', '69', 3, 475, 'pending', '2019-12-12 01:07:35', '2019-12-12 01:07:35'),
(2, 1, 5, 1, 'Monica\'s Lasagna', '199', 1, 475, 'pending', '2019-12-12 01:07:35', '2019-12-12 01:07:35'),
(3, 1, 3, 1, 'The \"Moistmaker\" Sandwich', '69', 1, 475, 'pending', '2019-12-12 01:07:35', '2019-12-12 01:07:35'),
(4, 2, 4, 1, 'Little Bakery Cheesecake', '499', 1, 499, 'pending', '2019-12-12 01:09:17', '2019-12-12 01:09:17'),
(5, 1, 8, 2, 'Cappuccino', '69', 4, 672, 'pending', '2019-12-12 01:11:28', '2019-12-12 01:11:28'),
(6, 1, 1, 2, 'Joey\'s Meatball Sub', '99', 4, 672, 'pending', '2019-12-12 01:11:28', '2019-12-12 01:11:28');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'aryan', 'aryan@example.com', '2019-12-12 06:21:48', '$2y$10$Vk7Z0TtoKKiJN5qur5uaOeGuTZKNC7Gl5qd13ctEdmV8FmbGyD.mi', NULL, '2019-12-12 00:51:48', '2019-12-12 00:51:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_employees`
--
ALTER TABLE `my_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `my_employees`
--
ALTER TABLE `my_employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
