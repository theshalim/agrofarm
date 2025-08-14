-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2025 at 03:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agrofarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounting`
--

CREATE TABLE `accounting` (
  `id` int(11) NOT NULL,
  `type` enum('Income','Expense') NOT NULL,
  `category` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounting`
--

INSERT INTO `accounting` (`id`, `type`, `category`, `amount`, `description`, `date`) VALUES
(1, 'Income', 'Fruits Sell and 2 Cow\'s sell', 66000.00, 'Fruits Sell and Cow sell', '2025-08-07'),
(2, 'Expense', 'Kitnashok for Farm', 66000.00, 'Kitnashok for Farm', '2025-08-07'),
(3, 'Expense', 'Employees Salary ', 66000.00, 'Staff Salary : 5 Employees.\r\n1. Rakib - 15000, 2. Sabbir- 20000, 3. Habib- 20000, 4. Mohor Ajad - 35000, 5. Abu Salek - 45000', '2025-08-07'),
(4, 'Income', 'Rice Sell.', 22960.00, 'Rice Sell.', '2025-08-21'),
(5, 'Expense', 'Medicine for Rice', 78000.00, 'Medicine for Rice field.', '2025-08-27'),
(6, 'Expense', 'Fish pona brought.', 100.00, 'Fish pona brought for big pond.', '2025-08-13'),
(11, 'Income', 'Fish Sales', 10000.00, 'Sale of tilapia fish', '2025-08-05'),
(12, 'Income', 'Veterinary', 2500.00, 'Vet check-up and medicine', '2025-08-04'),
(13, 'Income', 'Goat Sales', 12000.00, 'Sold 3 goats', '2025-08-03'),
(14, 'Income', 'Feed Purchase', 8000.00, 'Purchased cattle feed', '2025-08-02'),
(15, 'Income', 'Milk Sales', 15000.00, 'Sale of fresh cow milk', '2025-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cow_inventory`
--

CREATE TABLE `cow_inventory` (
  `id` int(11) NOT NULL,
  `cow_id` varchar(50) DEFAULT NULL,
  `name_description` varchar(255) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_price` decimal(10,2) DEFAULT NULL,
  `initial_weight` decimal(10,2) DEFAULT NULL,
  `status` enum('জীবিত','বিক্রি','মৃত্যু') DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `total_days` int(11) DEFAULT NULL,
  `feed_cost` decimal(10,2) DEFAULT NULL,
  `medicine_cost` decimal(10,2) DEFAULT NULL,
  `labor_cost` decimal(10,2) DEFAULT NULL,
  `other_cost` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `profit_loss` decimal(10,2) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cow_inventory`
--

INSERT INTO `cow_inventory` (`id`, `cow_id`, `name_description`, `purchase_date`, `purchase_price`, `initial_weight`, `status`, `sale_date`, `sale_price`, `total_days`, `feed_cost`, `medicine_cost`, `labor_cost`, `other_cost`, `total_cost`, `profit_loss`, `notes`) VALUES
(1, '1', 'Cow -1 ', '2025-01-01', 85000.00, 120.00, 'জীবিত', '2025-08-01', 180000.00, 212, 55000.00, 4500.00, 20000.00, 5000.00, 169500.00, 10500.00, '1 Number Cow'),
(2, '2', 'Cow -2', '2025-01-01', 120000.00, 180.00, 'জীবিত', '2025-08-01', 200000.00, 212, 60000.00, 10000.00, 20000.00, 1000.00, 211000.00, -11000.00, 'Cow no 2'),
(3, '4', 'Version 1', '2025-08-01', 350000.00, 454.00, 'জীবিত', '2025-08-08', 400000.00, 7, 5000.00, 1000.00, 2000.00, 2000.00, 360000.00, 40000.00, ''),
(5, 'C005', 'Brown Jersey Cow, 2 years old', '2025-04-12', 45000.00, 220.00, '', '2025-07-15', 60000.00, 94, 7500.00, 2000.00, 3000.00, 500.00, 58000.00, 2000.00, 'Sold to local dairy farm'),
(6, 'C006', 'Holstein Friesian, high milk yield', '2025-05-05', 50000.00, 250.00, '', NULL, NULL, 97, 8200.00, 1800.00, 3200.00, 400.00, 63400.00, NULL, 'Currently producing milk'),
(7, 'C007', 'Local breed cow, strong build', '2025-03-28', 38000.00, 210.00, '', '2025-06-20', 52000.00, 84, 7000.00, 1500.00, 2800.00, 600.00, 49900.00, 2100.00, 'Sold after fattening for Eid'),
(8, 'C008', 'Red Sindhi, calm nature', '2025-06-01', 46000.00, 230.00, '', NULL, NULL, 70, 6900.00, 1700.00, 2500.00, 400.00, 55000.00, NULL, 'Under growth and milk training'),
(9, 'C009', 'Sahiwal cow, good breeding quality', '2025-04-18', 55000.00, 260.00, '', '2025-07-25', 72000.00, 98, 8800.00, 1900.00, 3400.00, 500.00, 69600.00, 2400.00, 'Sold for breeding purpose'),
(10, 'C010', 'Black and white Friesian cross', '2025-05-20', 48000.00, 240.00, '', NULL, NULL, 82, 7600.00, 2100.00, 3100.00, 600.00, 61300.00, NULL, 'Milk production started last month');

-- --------------------------------------------------------

--
-- Table structure for table `dashboard_counts`
--

CREATE TABLE `dashboard_counts` (
  `id` int(11) NOT NULL,
  `cow_count` varchar(50) DEFAULT NULL,
  `goat_count` varchar(50) DEFAULT NULL,
  `fish_count` varchar(50) DEFAULT NULL,
  `fruit_count` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dashboard_counts`
--

INSERT INTO `dashboard_counts` (`id`, `cow_count`, `goat_count`, `fish_count`, `fruit_count`) VALUES
(1, '180', '250', '5', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `service_type` enum('Regular','Contractual','Daily basis') NOT NULL,
  `remuneration` decimal(10,2) NOT NULL,
  `joining_date` date NOT NULL,
  `status` enum('Active','Inactive') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `service_type`, `remuneration`, `joining_date`, `status`, `created_at`) VALUES
(1, 'Md. Shalim Reza', 'Regular', 15800.00, '2025-08-01', 'Inactive', '2025-08-06 21:56:03'),
(2, 'TH Fahim', 'Regular', 28000.00, '2025-08-07', 'Active', '2025-08-07 04:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendance`
--

CREATE TABLE `employee_attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `attendance_days` int(11) DEFAULT NULL,
  `leave_days` int(11) DEFAULT NULL,
  `absent_days` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_attendance`
--

INSERT INTO `employee_attendance` (`id`, `employee_id`, `year`, `month`, `attendance_days`, `leave_days`, `absent_days`, `remarks`, `created_at`) VALUES
(1, 1, 2025, 8, 16, 4, 8, '2 day weekly', '2025-08-07 23:00:14'),
(2, 1, 2025, 8, 18, 4, 6, '2 day weekly', '2025-08-07 23:06:17'),
(3, 3, 2025, 7, 25, 0, 5, 'Check', '2025-08-08 17:20:39');

-- --------------------------------------------------------

--
-- Table structure for table `employee_info`
--

CREATE TABLE `employee_info` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `guardian_name` varchar(255) DEFAULT NULL,
  `mother_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `marital_status` varchar(20) DEFAULT NULL,
  `nid` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `present_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `service_type` varchar(50) DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `salary_amount` decimal(10,2) DEFAULT NULL,
  `pay_structure` varchar(100) DEFAULT NULL,
  `overtime_rate` decimal(10,2) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `nid_doc` varchar(255) DEFAULT NULL,
  `appointment_letter` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `salary` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee_info`
--

INSERT INTO `employee_info` (`id`, `full_name`, `guardian_name`, `mother_name`, `dob`, `gender`, `marital_status`, `nid`, `phone`, `present_address`, `permanent_address`, `designation`, `department`, `service_type`, `join_date`, `end_date`, `status`, `salary_amount`, `pay_structure`, `overtime_rate`, `photo`, `nid_doc`, `appointment_letter`, `created_at`, `salary`) VALUES
(1, 'Shalim Reza', 'Ab. Kuddus', 'Rina Khatun', '0000-00-00', 'পুরুষ', 'অবিবাহিত', '4210018505', '01734898754', 'Dhaka', 'Kushtia', 'Principal Officer', 'মাছ', 'নিয়মিত', '2025-08-01', '0000-00-00', 'Active', 25000.00, 'মাসিক', 80.00, 'uploads/1754604964_Care.pdf', 'uploads/1754604964_download-pdf.pdf', 'uploads/1754604964_2 - Product_Recommendation_System_Using_Machine_Learning.pdf', '2025-08-07 22:16:04', 40000.00),
(3, 'Rajib Al Hasan', 'Shakib Bin Sadik', 'Rabeya Karim', '2003-01-01', 'পুরুষ', 'অবিবাহিত', '4210018506', '017348987543', 'Dhaka', 'Kushtia', 'Assistant General Manager', 'ছাগল', 'নিয়মিত', '2025-01-01', '0000-00-00', 'Active', 25000.00, 'মাসিক', 58.00, 'uploads/1754669560_ChatGPT Image Jun 24, 2025, 07_02_21 PM.png', 'uploads/1754669560_Poster for IDP2 (1).jpg', 'uploads/1754669560_WhatsApp Image 2025-08-08 at 15.46.21 (1).jpeg', '2025-08-08 16:12:40', 35000.00);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `event_date` date DEFAULT NULL,
  `registration_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fish_inventory`
--

CREATE TABLE `fish_inventory` (
  `id` int(11) NOT NULL,
  `fish_id` varchar(50) NOT NULL,
  `name_description` varchar(255) DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `purchase_price` decimal(10,2) DEFAULT NULL,
  `initial_weight` decimal(10,2) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `sale_date` date DEFAULT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `total_days` int(11) DEFAULT NULL,
  `feed_cost` decimal(10,2) DEFAULT NULL,
  `medicine_cost` decimal(10,2) DEFAULT NULL,
  `labor_cost` decimal(10,2) DEFAULT NULL,
  `other_cost` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `profit_loss` decimal(10,2) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fish_inventory`
--

INSERT INTO `fish_inventory` (`id`, `fish_id`, `name_description`, `purchase_date`, `purchase_price`, `initial_weight`, `status`, `sale_date`, `sale_price`, `total_days`, `feed_cost`, `medicine_cost`, `labor_cost`, `other_cost`, `total_cost`, `profit_loss`, `notes`, `created_at`) VALUES
(1, 'বোয়াল মাছ', 'বোয়াল মাছ (দেশি)', '2025-01-01', 50000.00, 180.00, 'জীবিত', '2025-08-01', 250000.00, 212, 80000.00, 20000.00, 25000.00, 10000.00, 185000.00, 65000.00, 'নতুন চাষাবাদ।', '2025-08-07 20:49:56'),
(2, '2', 'Telapia Fish', '2025-07-01', 1200.00, 3.00, 'জীবিত', '2025-07-31', 1890.00, 30, 200.00, 20.00, 100.00, 20.00, 1540.00, 350.00, '', '2025-08-09 15:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `garden_inventory`
--

CREATE TABLE `garden_inventory` (
  `id` int(11) NOT NULL,
  `garden_id` varchar(50) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `planting_date` date DEFAULT NULL,
  `harvest_date` date DEFAULT NULL,
  `quantity` decimal(10,2) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `cost` decimal(10,2) DEFAULT NULL,
  `sale_price` decimal(10,2) DEFAULT NULL,
  `fertilizer_cost` decimal(10,2) DEFAULT NULL,
  `labor_cost` decimal(10,2) DEFAULT NULL,
  `other_cost` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `profit_loss` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `garden_inventory`
--

INSERT INTO `garden_inventory` (`id`, `garden_id`, `item_name`, `category`, `planting_date`, `harvest_date`, `quantity`, `unit`, `cost`, `sale_price`, `fertilizer_cost`, `labor_cost`, `other_cost`, `total_cost`, `profit_loss`, `status`, `duration`, `notes`) VALUES
(1, '1', 'Banana', 'ফল', '2024-01-01', '2025-08-01', 100.00, '0', 40000.00, 258000.00, 5000.00, 20000.00, 5000.00, 70000.00, 188000.00, 'ফলপ্রসূ', 577, 'First Time'),
(2, '2', 'Rice', 'ফসল', '2025-04-01', '2025-07-31', 1500.00, '0', 250000.00, 350000.00, 100000.00, 200000.00, 100000.00, 650000.00, -300000.00, 'ফলপ্রসূ', 121, '');

-- --------------------------------------------------------

--
-- Table structure for table `goat_inventory`
--

CREATE TABLE `goat_inventory` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `breed` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `buy_price` decimal(10,2) DEFAULT NULL,
  `sell_price` decimal(10,2) DEFAULT NULL,
  `food_cost` decimal(10,2) DEFAULT NULL,
  `maintain_cost` decimal(10,2) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `buy_date` date DEFAULT NULL,
  `sell_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goat_inventory`
--

INSERT INTO `goat_inventory` (`id`, `name`, `breed`, `age`, `weight`, `buy_price`, `sell_price`, `food_cost`, `maintain_cost`, `location`, `date`, `remarks`, `buy_date`, `sell_date`) VALUES
(1, 'Goat Number 1', 'দেশি ', 8, 12, 12000.00, 18000.00, 0.00, 0.00, 'Farm', '2025-08-01', 'Check', NULL, NULL),
(2, 'Goat Number 2', 'দেশি ', 25, 25, 25000.00, 35000.00, 0.00, 0.00, 'Farm', '2025-08-09', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `livestock`
--

CREATE TABLE `livestock` (
  `id` int(11) NOT NULL,
  `type` enum('cow','goat','fish','crop') DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `message`, `created_at`) VALUES
(1, 'Message from Reza Sunny (theshalim01@gmail.com)', 'saasdfas', '2025-08-08 03:04:37'),
(2, 'Message from MD. RIZVI RAHMAN (rezasunny01@gmail.com)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2025-08-08 03:45:24'),
(3, 'Message from Reza Sunny13165464644 (theshalim01@gmail.com)', '+797979+79+7979+79+79+7979', '2025-08-08 06:21:32'),
(4, 'Message from Sadia ayman (sadiaayman@gmail.com)', 'bjsdjhfihdfihsidhfiuhsfiuhsi', '2025-08-08 08:35:16'),
(5, 'Message from Fahim  (theshalim01@gmail.com)', 'CXcZXVZXvzXcsdasfadsfasdfasdf', '2025-08-08 23:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `payment_method` varchar(50) NOT NULL,
  `payment_status` enum('unpaid','paid') DEFAULT 'unpaid',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `delivery_status` enum('pending','delivered') DEFAULT 'pending',
  `total_amount` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `product_id`, `customer_name`, `address`, `phone`, `quantity`, `unit`, `total_price`, `status`, `payment_method`, `payment_status`, `created_at`, `delivery_status`, `total_amount`, `order_date`) VALUES
(2, 3, 'Habib Wahid', 'Dhaka', '017348987542', 200, 'কেজি', 90000.00, 'delivered', 'Cash on Delivery', 'paid', '2025-08-09 11:10:14', 'pending', 0.00, '2025-08-09 11:08:43'),
(3, 2, 'Reza Sunny', 'Dhaka', '01734898754', 4, 'কেজি', 200.00, 'delivered', 'Cash on Delivery', 'paid', '2025-08-09 11:15:11', 'pending', 0.00, '2025-08-09 11:15:11'),
(4, 2, 'Emran', 'Dhaka', '01734898754', 3, 'কেজি', 150.00, 'delivered', 'Cash on Delivery', 'paid', '2025-08-09 11:15:25', 'pending', 0.00, '2025-08-09 11:15:25'),
(5, 3, 'Badol', 'Dhaka', '01734898754', 3, 'কেজি', 1350.00, 'delivered', 'Bkash', 'paid', '2025-08-09 11:15:43', 'pending', 0.00, '2025-08-09 11:15:43'),
(6, 2, 'Reza Sunny', 'Dhaka', '01734898754', 5, 'কেজি', 250.00, 'delivered', 'Cash on Delivery', 'paid', '2025-08-09 11:18:16', 'pending', 0.00, '2025-08-09 11:18:16'),
(7, 3, 'Reza Sunny', 'Dhaka', '01734898754', 5, 'কেজি', 2250.00, 'pending', 'Cash on Delivery', 'unpaid', '2025-08-09 11:18:39', 'pending', 0.00, '2025-08-09 11:18:39'),
(8, 3, 'রফিক করিম', 'Dhaka', '01734898754', 10, 'কেজি', 4500.00, 'pending', 'Nagad', 'unpaid', '2025-08-09 15:35:44', 'pending', 0.00, '2025-08-09 15:35:44'),
(9, 2, 'রফিক করিম', 'Dhaka', '01734898754', 20, 'কেজি', 1000.00, 'pending', 'Nagad', 'unpaid', '2025-08-09 15:36:09', 'pending', 0.00, '2025-08-09 15:36:09'),
(10, 4, 'হাবিবুর রহমান', 'Dhaka', '01734898754', 5, 'কেজি', 3750.00, 'pending', 'Cash on Delivery', 'unpaid', '2025-08-09 15:54:36', 'pending', 0.00, '2025-08-09 15:54:36'),
(11, 4, 'Reza Sunny', 'Dhaka', '01734898754', 1, 'কেজি', 750.00, 'pending', 'Cash on Delivery', 'unpaid', '2025-08-09 18:57:41', 'pending', 0.00, '2025-08-09 18:57:41'),
(12, 4, 'Reza Sunny', 'Dhaka', '01734898754', 3, 'কেজি', 2250.00, 'delivered', 'Cash on Delivery', 'paid', '2025-08-10 04:02:49', 'pending', 0.00, '2025-08-10 04:02:49'),
(13, 4, 'Reza Sunny', 'Dhaka', '01734898754', 1, 'কেজি', 750.00, 'delivered', 'Cash on Delivery', 'paid', '2025-08-10 06:16:31', 'pending', 0.00, '2025-08-10 06:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `unit`, `image_path`, `created_at`) VALUES
(2, 'তাজা সবজি', 50.00, 'কেজি', '../uploads/1754735522_Screenshot_3.png', '2025-08-09 10:32:02'),
(3, 'সিলভার কাপ মাছ', 450.00, 'কেজি', '../uploads/1754736416_Screenshot_3.png', '2025-08-09 10:46:56'),
(4, 'দেশি গরুর গোশত', 750.00, 'কেজি', '../uploads/1754754837_Screenshot_3.png', '2025-08-09 15:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reason` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `reason`, `password`, `role`, `created_at`) VALUES
(1, 'Reza Sunny', '01734898754', 'theshalim01@gmail.com', 'Admin', '$2y$10$r0HwBCrn5KU/dg5lNS4CA.XhrSGOZIg4B5M4LWYiKcFCjV9FR4gtS', 'user', '2025-08-06 21:12:34'),
(2, 'Reza Sunny', '01734898754', 'theshalim012@gmail.com', 'Admin2', '$2y$10$GY2MK/2ZcPUmmWgL6Aeh2OeormbqY51S.Wzu4VjnO8dS7DKt8Qln2', 'user', '2025-08-06 21:15:18'),
(3, 'Reza Sunny', '01734898754', 'theshalim0d1@gmail.com', 'asdfasd', '$2y$10$XLc3rCRWsH0HHwtVHVYe/Obl8Q8MAWRIYLW.c6LUi5sBcDguGDDJ.', 'user', '2025-08-06 21:19:20'),
(4, 'Reza Sunny', '01734898754', 'theshalifms01@gmail.com', 'asasdf', '$2y$10$KERK40JAnxMlCIz7xBwjuO1zt1qry5yjjo2zy7D3CRKu8g/5XNftC', 'user', '2025-08-06 21:21:14'),
(5, 'Shalim Reza', '01734898751', 'rezasunny01@gmail.com', 'Admin', '$2y$10$rprhcUc9J0MRoMSu5jpvZOMVjTcClqoNIlYoAGtxcPYeYFm5VmWmy', 'user', '2025-08-07 21:45:46'),
(6, 'Fahim', '01734898754', 'fahim@gmail.com', 'Learner', '$2y$10$mXkELf5SRjOvM6bnOOrKfezu0dazWinhtnQeysA.X1yxt/3jIri36', 'user', '2025-08-08 17:14:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounting`
--
ALTER TABLE `accounting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cow_inventory`
--
ALTER TABLE `cow_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dashboard_counts`
--
ALTER TABLE `dashboard_counts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `employee_info`
--
ALTER TABLE `employee_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fish_inventory`
--
ALTER TABLE `fish_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `garden_inventory`
--
ALTER TABLE `garden_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goat_inventory`
--
ALTER TABLE `goat_inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `livestock`
--
ALTER TABLE `livestock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounting`
--
ALTER TABLE `accounting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cow_inventory`
--
ALTER TABLE `cow_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dashboard_counts`
--
ALTER TABLE `dashboard_counts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_info`
--
ALTER TABLE `employee_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fish_inventory`
--
ALTER TABLE `fish_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `garden_inventory`
--
ALTER TABLE `garden_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `goat_inventory`
--
ALTER TABLE `goat_inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `livestock`
--
ALTER TABLE `livestock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_attendance`
--
ALTER TABLE `employee_attendance`
  ADD CONSTRAINT `employee_attendance_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee_info` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
