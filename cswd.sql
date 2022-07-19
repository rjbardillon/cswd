-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 03:21 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cswd`
--

-- --------------------------------------------------------

--
-- Table structure for table `pwd_data`
--

CREATE TABLE `pwd_data` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `registration_type` enum('New ID','Renewal ID','Lost ID','Transfer','Change Information') NOT NULL,
  `pwd_number` varchar(20) DEFAULT NULL,
  `date_applied` date NOT NULL,
  `pwd_last_name` varchar(128) NOT NULL,
  `pwd_first_name` varchar(128) NOT NULL,
  `pwd_middle_name` varchar(128) DEFAULT NULL,
  `pwd_suffix` varchar(20) DEFAULT NULL,
  `type_of_disability` set('Deaf/Hard of Hearing','Intellectual Disability','Learning Disability','Mental Disability','Physical Disablity (Orthopedic)','Psychosocial Disability','Speech and Language Impairment','Visual Disability','Cancer (RA11215)','Rare Disease (RA10747)') DEFAULT NULL,
  `medical_condition` varchar(1000) DEFAULT NULL,
  `cause_of_disability` set('Congenital/Inborn','Acquired') DEFAULT NULL,
  `congenital_inborn` set('Autism','ADHD','Cerebral Palsy','Down Syndrome') DEFAULT NULL,
  `acquired` set('Chronic Illness','Cerebral Palsy','Injury') DEFAULT NULL,
  `status_of_disability` enum('Permanent','Temporary') NOT NULL,
  `houseno_street_subdivision_address` varchar(200) DEFAULT NULL,
  `barangay` enum('Aplaya','Balibago','Caingin','Dila','Dita','Don Jose','Ibaba','Kanluran','Labas','Macabling','Malitlit','Malusak','Market Area','Pook','Pulong Santa Cruz','Santo Domingo','Sinalhan','Tagapo') NOT NULL,
  `city_municipality` varchar(128) NOT NULL DEFAULT 'CITY OF SANTA ROSA',
  `province` varchar(128) NOT NULL DEFAULT 'LAGUNA',
  `region` varchar(128) NOT NULL DEFAULT 'IV-A (CALABARZON)',
  `landline` varchar(15) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `date_of_birth` date NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `religion` varchar(128) NOT NULL,
  `civil_status` enum('Single','Separated','Cohabitation','Married','Widow') NOT NULL,
  `educational_attainment` enum('None','Kindergarten','Elementary','Junior High School','Senior High School','College','Vocational','Post Graduate Program') NOT NULL,
  `is_voter` enum('Yes','No','17 Below') NOT NULL,
  `employment_status` enum('Employed','Unemployed','Self-employed','Student') NOT NULL,
  `income` enum('Less than 10,000','10,000 - 20, 000','21,000 - 40,000','41,000 - 100,000','More than 100,000') DEFAULT NULL,
  `category_of_employment` enum('Government','Private') DEFAULT NULL,
  `nature_of_employment` enum('Permanent/Regular','Emergency','Seasonal','Casual') DEFAULT NULL,
  `occupation` enum('Managers','Professionals','Technician & Associate Professionals','Clerical Support Workers','Service & Sales Workers','Skilled Agricultural, Forestry & Fishery Workers','Craft & Related Trade Workers','Plant & Machine Operators & Assemblers','Elementary Occupations') DEFAULT NULL,
  `other_occupation` varchar(128) DEFAULT NULL,
  `is_4ps_beneficiary` enum('Yes','No') NOT NULL,
  `blood_type` enum('A+','A-','B+','B-','AB+','AB-','O+','O-') DEFAULT NULL,
  `organization_affiliated` varchar(128) DEFAULT NULL,
  `contact_person` varchar(128) DEFAULT NULL,
  `office_address` varchar(128) DEFAULT NULL,
  `office_telephone_number` varchar(128) DEFAULT NULL,
  `sss_number` varchar(128) DEFAULT NULL,
  `gsis_number` varchar(128) DEFAULT NULL,
  `psn_number` varchar(128) DEFAULT NULL,
  `philhealth_number` varchar(128) DEFAULT NULL,
  `philhealth_member_type` enum('PhilHealth Member',' PhilHealth Member-Dependent') DEFAULT NULL,
  `father_last_name` varchar(128) DEFAULT NULL,
  `father_first_name` varchar(128) DEFAULT NULL,
  `father_middle_name` varchar(128) DEFAULT NULL,
  `mother_last_name` varchar(128) DEFAULT NULL,
  `mother_first_name` varchar(128) DEFAULT NULL,
  `mother_middle_name` varchar(128) DEFAULT NULL,
  `guardian_last_name` varchar(128) DEFAULT NULL,
  `guardian_first_name` varchar(128) DEFAULT NULL,
  `guardian_middle_name` varchar(128) DEFAULT NULL,
  `guardian_relationship` varchar(128) DEFAULT NULL,
  `guardian_contact_number` varchar(128) DEFAULT NULL,
  `accomplished_by` enum('Applicant','Guardian','Representative') NOT NULL,
  `name_of_accomplisher` varchar(128) NOT NULL,
  `name_of_physician` varchar(128) NOT NULL,
  `license_number` varchar(128) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pwd_data`
--

INSERT INTO `pwd_data` (`id`, `username`, `registration_type`, `pwd_number`, `date_applied`, `pwd_last_name`, `pwd_first_name`, `pwd_middle_name`, `pwd_suffix`, `type_of_disability`, `medical_condition`, `cause_of_disability`, `congenital_inborn`, `acquired`, `status_of_disability`, `houseno_street_subdivision_address`, `barangay`, `city_municipality`, `province`, `region`, `landline`, `mobile_number`, `email`, `date_of_birth`, `sex`, `religion`, `civil_status`, `educational_attainment`, `is_voter`, `employment_status`, `income`, `category_of_employment`, `nature_of_employment`, `occupation`, `other_occupation`, `is_4ps_beneficiary`, `blood_type`, `organization_affiliated`, `contact_person`, `office_address`, `office_telephone_number`, `sss_number`, `gsis_number`, `psn_number`, `philhealth_number`, `philhealth_member_type`, `father_last_name`, `father_first_name`, `father_middle_name`, `mother_last_name`, `mother_first_name`, `mother_middle_name`, `guardian_last_name`, `guardian_first_name`, `guardian_middle_name`, `guardian_relationship`, `guardian_contact_number`, `accomplished_by`, `name_of_accomplisher`, `name_of_physician`, `license_number`, `status`, `date`) VALUES
(1, 'rmbardillon', 'Transfer', NULL, '2022-07-18', 'Bardillon', 'Romeo Jr', 'Montealegre', '', 'Intellectual Disability,Learning Disability,Physical Disablity (Orthopedic),Speech and Language Impairment,Cancer (RA11215)', 'Masakit', 'Congenital/Inborn,Acquired', 'Autism,ADHD,Cerebral Palsy,Down Syndrome', 'Chronic Illness,Cerebral Palsy,Injury', 'Permanent', 'Block 7 Lot 2 Oak Street Rose Pointe Subdivision', 'Caingin', 'CITY OF SANTA ROSA', 'LAGUNA', 'IV-A (CALABARZON)', NULL, NULL, 'romsky.bardillon@gmail.com', '2001-07-30', 'Male', 'Catholic', 'Married', 'College', 'Yes', 'Student', NULL, NULL, NULL, NULL, NULL, 'No', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Applicant', 'Romeo Bardillon', 'Lebron James', '2307210', 'Pending', '2022-07-19 13:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `senior_citizen_data`
--

CREATE TABLE `senior_citizen_data` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `registration_type` enum('Bago','Lumipat','Magpapalit','Nawala') NOT NULL,
  `sr_citizen_num` bigint(20) NOT NULL,
  `sr_citizen_first_name` varchar(128) NOT NULL,
  `sr_citizen_middle_name` varchar(128) NOT NULL,
  `sr_citizen_last_name` varchar(128) NOT NULL,
  `sr_citizen_suffix` varchar(20) NOT NULL,
  `barangay` enum('Aplaya','Balibago','Caingin','Dila','Dita','Don Jose','Ibaba','Kanluran','Labas','Macabling','Malitlit','Malusak','Market Area','Pook','Pulong Santa Cruz','Santo Domingo','Sinalhan','Tagapo') NOT NULL,
  `tirahan` varchar(128) NOT NULL,
  `sex` enum('Male','Female') NOT NULL,
  `marital_status` enum('Single','Married','Widowed','Separated','Divorced') NOT NULL,
  `edad` varchar(128) NOT NULL,
  `date_of_birth` date NOT NULL,
  `lugar_ng_kapanganakan` varchar(128) NOT NULL,
  `telepono` varchar(15) NOT NULL,
  `relihiyon` varchar(128) NOT NULL,
  `hanapbuhay` varchar(128) NOT NULL,
  `pensyon` enum('Oo','Hindi') NOT NULL,
  `saan` varchar(128) NOT NULL,
  `magkano` varchar(128) NOT NULL,
  `pangalan_ng_asawa` varchar(128) NOT NULL,
  `edad_asawa` varchar(128) NOT NULL,
  `ilan_ang_anak` varchar(128) NOT NULL,
  `kasama` varchar(128) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `solo_parent_data`
--

CREATE TABLE `solo_parent_data` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `solo_parent_name` varchar(128) NOT NULL,
  `sex` varchar(128) NOT NULL,
  `date_of_birth` date NOT NULL,
  `place_of_birth` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `barangay` enum('Aplaya','Balibago','Caingin','Dila','Dita','Don Jose','Ibaba','Kanluran','Labas','Macabling','Malitlit','Malusak','Market Area','Pook','Pulong Santa Cruz','Santo Domingo','Sinalhan','Tagapo') NOT NULL,
  `educ_attainment` varchar(128) NOT NULL,
  `occupation` varchar(128) NOT NULL,
  `income` decimal(10,2) NOT NULL,
  `fam_income` decimal(10,2) NOT NULL,
  `tenurial` varchar(128) NOT NULL,
  `religion` varchar(128) NOT NULL,
  `contact_number` varchar(128) NOT NULL,
  `marital_status` enum('Single','Annulled','Widow','Married','Separated') NOT NULL,
  `classification_incidence` longtext NOT NULL,
  `classification_when` longtext NOT NULL,
  `problems` longtext NOT NULL,
  `family_resources` longtext NOT NULL,
  `date_applied` date NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solo_parent_data`
--

INSERT INTO `solo_parent_data` (`id`, `username`, `solo_parent_name`, `sex`, `date_of_birth`, `place_of_birth`, `address`, `barangay`, `educ_attainment`, `occupation`, `income`, `fam_income`, `tenurial`, `religion`, `contact_number`, `marital_status`, `classification_incidence`, `classification_when`, `problems`, `family_resources`, `date_applied`, `status`, `date`) VALUES
(1, 'mmdelrosario', 'Maria Leonora Theresa', 'Female', '2000-01-30', 'Santa Rosa', 'Santa Rosa', 'Balibago', 'College', 'N/A', '0.00', '0.00', 'N/A', 'N/A', '09760657071', 'Separated', 'N/A', 'N/A', 'N/A', 'N/A', '2022-07-18', 'Pending', '2022-07-19 13:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `solo_parent_family_composition`
--

CREATE TABLE `solo_parent_family_composition` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `relationship` varchar(128) NOT NULL,
  `age` varchar(128) NOT NULL,
  `civil_status` varchar(128) NOT NULL,
  `educ_attainment` varchar(128) NOT NULL,
  `occupation` varchar(128) NOT NULL,
  `monthly_income` decimal(10,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `solo_parent_family_composition`
--

INSERT INTO `solo_parent_family_composition` (`id`, `username`, `name`, `relationship`, `age`, `civil_status`, `educ_attainment`, `occupation`, `monthly_income`, `date`) VALUES
(1, 'mmdelrosario', 'Venice', 'Daughter', '6', 'Single', 'College', 'N/A', '0.00', '2022-07-19 13:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `sr-citizen-birthday-cash-gift`
--

CREATE TABLE `sr-citizen-birthday-cash-gift` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `middle_name` varchar(128) NOT NULL,
  `osca_id_number` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `barangay` enum('Aplaya','Balibago','Caingin','Dila','Dita','Don Jose','Ibaba','Kanluran','Labas','Macabling','Malitlit','Malusak','Market Area','Pook','Pulong Santa Cruz','Santo Domingo','Sinalhan','Tagapo') NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact_number` varchar(128) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sr-citizen-birthday-cash-incentive`
--

CREATE TABLE `sr-citizen-birthday-cash-incentive` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `middle_name` varchar(128) NOT NULL,
  `osca_id_number` varchar(128) NOT NULL,
  `address` varchar(128) NOT NULL,
  `barangay` enum('Aplaya','Balibago','Caingin','Dila','Dita','Don Jose','Ibaba','Kanluran','Labas','Macabling','Malitlit','Malusak','Market Area','Pook','Pulong Santa Cruz','Santo Domingo','Sinalhan','Tagapo') NOT NULL,
  `date_of_birth` date NOT NULL,
  `contact_number` varchar(128) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `typeOfDisability` set('Deaf/Hard of Hearing','Intellectual Disability','Learning Disability','Mental Disability','Physical Disablity (Orthopedic)','Psychosocial Disability','Speech and Language Impairment','Visual Disability','Cancer (RA11215)','Rare Disease (RA10747)') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `suffix` varchar(20) DEFAULT NULL,
  `first_name` varchar(128) NOT NULL,
  `middle_name` varchar(128) DEFAULT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `is_pwd` enum('Yes','No') NOT NULL DEFAULT 'No',
  `is_sr_citizen` enum('Yes','No') NOT NULL DEFAULT 'No',
  `is_solo_parent` enum('Yes','No') NOT NULL DEFAULT 'No',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `last_name`, `suffix`, `first_name`, `middle_name`, `email`, `password`, `is_pwd`, `is_sr_citizen`, `is_solo_parent`, `date`) VALUES
(1, 'rmbardillon', 'Bardillon', '', 'Romeo Jr', 'Montealegre', 'romsky.bardillon@gmail.com', '$2y$10$5IbMlSpi/p5tQAj7JXvbjebwI4Mlm6lyHJ/02LCA3URgj9dGlSIa.', 'Yes', 'No', 'No', '2022-07-19 13:21:08'),
(2, 'mmdelrosario', 'Del Rosario', '', 'Maria Christine', 'Montealegre', 'tintin@gmail.com', '$2y$10$jAd8dVkvQlAkQl4rGeowMO7qDpSq.MPwXdAS2f/QKbijL8EvqN62O', 'No', 'No', 'Yes', '2022-07-19 13:21:08'),
(3, 'asporlares', 'Porlares', '', 'Aaron', 'Sanchez', 'aaron.porlares@gmail.com', '$2y$10$zj64j.SJfQCSC1yUKqXlOOg9EUgdo8BvLmnavH8djeHHUzLosoX62', 'No', 'No', 'No', '2022-07-19 13:21:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pwd_data`
--
ALTER TABLE `pwd_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `senior_citizen_data`
--
ALTER TABLE `senior_citizen_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `solo_parent_data`
--
ALTER TABLE `solo_parent_data`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `solo_parent_family_composition`
--
ALTER TABLE `solo_parent_family_composition`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sr-citizen-birthday-cash-gift`
--
ALTER TABLE `sr-citizen-birthday-cash-gift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sr-citizen-birthday-cash-incentive`
--
ALTER TABLE `sr-citizen-birthday-cash-incentive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pwd_data`
--
ALTER TABLE `pwd_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `senior_citizen_data`
--
ALTER TABLE `senior_citizen_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solo_parent_data`
--
ALTER TABLE `solo_parent_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `solo_parent_family_composition`
--
ALTER TABLE `solo_parent_family_composition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sr-citizen-birthday-cash-gift`
--
ALTER TABLE `sr-citizen-birthday-cash-gift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sr-citizen-birthday-cash-incentive`
--
ALTER TABLE `sr-citizen-birthday-cash-incentive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
