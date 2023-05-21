-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql211.byetcluster.com
-- Generation Time: May 21, 2023 at 03:41 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_34104575_lis`
--

-- --------------------------------------------------------

--
-- Table structure for table `labs`
--

CREATE TABLE `labs` (
  `lab_id` int(11) NOT NULL,
  `lab_name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labs`
--

INSERT INTO `labs` (`lab_id`, `lab_name`, `address`, `contact_number`, `email`) VALUES
(1, 'ABC Pathology Lab', '456 Street, City', '9876543210', 'lab@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_name`, `sex`, `age`, `contact_number`, `email`, `address`, `date`) VALUES
(2, 'Muhamad Waqas', 'male', 37, '03327082287', 'waqasmkn@gmail.com', 'Tariq Colony Mamukanjan', NULL),
(24, 'Ali', 'male', 30, '03331234567', 'abc@gmail.com', 'Faisalabad ', '2023-05-15'),
(25, 'Ameen', 'male', 50, '03346788888', 'abc@gmail.com', 'Chak 509 gb', '2023-05-15'),
(19, 'Babar Naveed', 'male', 36, '03326740649', 'babarnaveed012@gmail.com', 'Mureed wala', '2023-05-13'),
(20, 'Babar Naveed', 'male', 36, '03326740649', 'babarnaveed012@gmail.com', 'Mureed wala', '2023-05-13'),
(21, 'babar', 'male', 37, '03321234567', 'abcdef@gmail.com', 'Muridwala', '2023-05-14'),
(22, 'Kamran Ashraf', 'male', 39, '03333333333', 'kashraf@gmail.com', 'Faislaabad', '2023-05-14'),
(23, 'sdasdasdasd', 'male', 45, '03337082287', 'waqasmalikusa@gmail.com', 'dsd', '2023-05-15'),
(26, 'Shamela kiran', 'female', 35, '00000000000', 'babarnaveed012@gmail.com', 'M.w', '2023-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `test_id` int(11) DEFAULT NULL,
  `result_value` varchar(255) DEFAULT NULL,
  `normal_range` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `patient_id`, `test_id`, `result_value`, `normal_range`) VALUES
(1, 2, 1, '5.5', '8.5 TO 10.8'),
(2, 2, 2, '8.5', '10.00 to 12.00'),
(3, 2, 1, '5.5', '8.5 TO 10.8'),
(4, 2, 2, '5.5', '8.5 TO 10.8'),
(5, 2, 3, '5.5', '10.00 to 12.00'),
(6, 2, 20, '5.5', 'No specific value ranges. It is a test to identify bacteria or other organisms in the urine and dete'),
(7, 20, 1, '12.3', 'No specific value range, as it includes multiple blood components such as red blood cells, white blo'),
(8, 21, 1, '5.5', 'No specific value range, as it includes multiple blood components such as red blood cells, white blo'),
(9, 21, 2, '8.5', 'Sodium (Na): 135-145 mmol/L ,Potassium (K): 3.5-5.0 mmol/L,Chloride (Cl): 96-106 mmol/L,Bicarbonate '),
(10, 22, 4, '60 mL', 'Blood Urea Nitrogen (BUN): 7-20 mg/dL,Creatinine: 0.6-1.3 mg/dL,Estimated Glomerular Filtration Rate'),
(11, 22, 5, '34 mg/dL', 'Total Cholesterol: <200 mg/dL,Triglycerides: <150 mg/dL,High-Density Lipoprotein (HDL) Cholesterol: '),
(12, 23, 3, '60 mL', 'Total Bilirubin: 0.3-1.2 mg/dL,Direct Bilirubin: 0.0-0.3 mg/dL,Alanine Aminotransferase (ALT): 0-45 '),
(13, 23, 7, 'red and blood cells', 'Various parameters are evaluated, including pH, specific gravity, protein, glucose, ketones, red and'),
(14, 24, 1, '2.4', 'No specific value range, as it includes multiple blood components such as red blood cells, white blo'),
(15, 24, 2, '110', 'Sodium (Na): 135-145 mmol/L ,Potassium (K): 3.5-5.0 mmol/L,Chloride (Cl): 96-106 mmol/L,Bicarbonate '),
(16, 25, 1, '8.6', 'No specific value range, as it includes multiple blood components such as red blood cells, white blo'),
(17, 25, 2, '125 mmol/l', 'Sodium (Na): 135-145 mmol/L ,Potassium (K): 3.5-5.0 mmol/L,Chloride (Cl): 96-106 mmol/L,Bicarbonate '),
(18, 26, 3, '0.6 0.3 0.3 46 42 310', 'Total Bilirubin: 0.3-1.2 mg/dL,Direct Bilirubin: 0.0-0.3 mg/dL,Alanine Aminotransferase (ALT): 0-45 ');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `test_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `test_name` varchar(255) DEFAULT NULL,
  `test_description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`test_id`, `patient_id`, `test_name`, `test_description`, `price`) VALUES
(1, 2, 'Complete Blood Count (CBC)', 'dsdsd', '150.00'),
(3, 2, 'Liver Function Tests (LFTs)', 'sdsd', '800.00'),
(2, 2, 'Basic Metabolic Panel (BMP)', 'abcccc', '450.00'),
(1, 21, 'Complete Blood Count (CBC)', 'cbc', '950.00'),
(2, 21, 'Basic Metabolic Panel (BMP)', 'bmp', '850.00'),
(4, 22, 'Kidney Function Tests (KFTs)', 'KFTs', '350.00'),
(13, 22, 'Prothrombin Time (PT)', 'PT', '750.00'),
(3, 23, 'Liver Function Tests (LFTs)', 'LFTs', '650.00'),
(7, 23, 'Urinalysis', 'u', '350.00'),
(1, 24, 'Complete Blood Count (CBC)', 'Cbc', '950.00'),
(2, 24, 'Basic Metabolic Panel (BMP)', 'Bmp', '850.00'),
(1, 25, 'Complete Blood Count (CBC)', 'Cbc', '950.00'),
(2, 25, 'Basic Metabolic Panel (BMP)', 'Bmp', '850.00'),
(3, 26, 'Liver Function Tests (LFTs)', 'Lft', '650.00'),
(2, 0, 'Basic Metabolic Panel (BMP)', 'Bmp', '850.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@123.com', 'admin', '2023-05-14 07:06:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`lab_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `fk_patient_id` (`patient_id`),
  ADD KEY `fk_test_id` (`test_id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD KEY `fk_patient_id` (`patient_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `labs`
--
ALTER TABLE `labs`
  MODIFY `lab_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
