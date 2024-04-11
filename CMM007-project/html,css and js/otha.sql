-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 11:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `otha`
--

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(6) UNSIGNED NOT NULL,
  `chefname` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `RecipeName` varchar(255) NOT NULL,
  `Ingredients` text NOT NULL,
  `Directions` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `chefname`, `category`, `RecipeName`, `Ingredients`, `Directions`, `created_at`) VALUES
(21, 'Giulia Scarpaleggia', 'Pork', 'Iberian pork ribs and breadcrumbs and asparagus', ' IBERIAN PORK SPARE RIBS\r\n600g of Iberian pork spare ribs\r\n1) sprig of rosemary\r\nPICKLED WHITE ASPARAGUS\r\n8) white asparagus spears, peeled\r\n700ml of vinegar\r\n400g of sugar\r\n7g of salt\r\nMUSTARD CRUMB\r\n300g of flatbread, (preferably Schüttelbrot), toasted\r\n3) tsp Dijon mustard, plus extra for brushing\r\nextra virgin olive oil to taste\r\nsalt to taste\r\npepper to taste\r\nTO SERVE\r\n8) asparagus spears, peeled', '1) To make the pickling liquor for the white asparagus, in a small saucepan heat the vinegar, sugar and salt until dissolved. Take off the heat and set aside\r\n700ml of vinegar\r\n400g of sugar\r\n7g of salt\r\n2)\r\nCut the white asparagus in half lengthways and place them in an airtight container. Cover with the cooled pickling liquor and leave to marinate for 1 hour\r\n8 white asparagus spears\r\n3)\r\nBlitz the flatbread to a crumb in a food processor. Mix through the mustard, olive oil and salt and pepper\r\n300g of flatbread, (preferably Schüttelbrot), toasted\r\n3 tsp Dijon mustard\r\nextra virgin olive oil to taste\r\nsalt to taste\r\npepper to taste\r\n4)\r\nPreheat a water bath to 65°C\r\n5)\r\nPut the ribs in a vacuum bag along with a sprig of rosemary, seal in a chamber sealer and cook in the water bath for 45 minutes\r\n6)\r\nOnce ready, open the bag and cut the ribs into individual portions. Brush with mustard, roll them in breadcrumbs and cook in a pan with a little olive oil until golden\r\n7)\r\nIn a saucepan of boiling water, blanch the green asparagus for 2 minutes and refresh in iced water\r\n8 asparagus spears, peeled\r\n8)\r\nTo plate, place the asparagus spears on the plate with a rib on top and to the side', '2024-04-09 11:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(200) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Role` enum('recipe_seeker','cook_chef') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Email`, `Age`, `Password`, `Role`) VALUES
(16, 'qqq', 'qqq@gmail.com', 6, 'ttt', 'cook_chef'),
(18, 'yyy', 'yyy@gmail.com', 55, 'yyy', 'recipe_seeker'),
(19, 'cvb', 'llm@gmail.com', 1, 'rrr', 'cook_chef'),
(20, 'bb', 'kd@gmail.com', 7, 'pugal', 'cook_chef'),
(21, '', 'svfsd', 0, 'sfdfsd', 'recipe_seeker'),
(22, 'sad', 'asd', 0, 'asd', 'recipe_seeker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
