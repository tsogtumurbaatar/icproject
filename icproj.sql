-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2017 at 09:36 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25



CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(64) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `city_desc` varchar(255) DEFAULT NULL,
  `city_long` varchar(50) DEFAULT NULL,
  `city_lat` varchar(50) DEFAULT NULL
) ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `country_id`, `updated_at`, `created_at`, `city_desc`, `city_long`, `city_lat`) VALUES
(1, 'Sydney', 1, NULL, NULL, 'Sydney, NSW, Australia', '151.209900', '-33.865143'),
(2, 'Melbourne', 1, NULL, NULL, 'Melbourne, VIC, Australia', '144.946014', '-37.815018'),
(3, 'Brisbane', NULL, '2017-04-13', '2017-04-13', 'Brisbane, QLD, Australia', '153.021072', '-27.470125'),
(8, 'Perth', NULL, '2017-05-16', '2017-05-16', 'Perth, WA, Australia', '115.857048', '-31.953512'),
(9, 'Newcastle', NULL, '2017-05-19', '2017-05-19', 'Newcastle NSW, Australia', '151.778892', '-32.926696'),
(10, 'Adelaide', NULL, '2017-05-20', '2017-05-20', 'Adelaide SA, Australia', '138.599959', '-34.928621');

-- --------------------------------------------------------

--
-- Table structure for table `datapoint`
--

CREATE TABLE `datapoint` (
  `data_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `factor_id` int(11) NOT NULL,
  `segment_id` int(11) NOT NULL,
  `indicator_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `data_point` int(11) DEFAULT '0',
  `data_stat` int(11) NOT NULL DEFAULT '0'
) ;

--
-- Dumping data for table `datapoint`
--

INSERT INTO `datapoint` (`data_id`, `city_id`, `factor_id`, `segment_id`, `indicator_id`, `created_at`, `updated_at`, `data_point`, `data_stat`) VALUES
(1, 1, 1, 1, 1, NULL, NULL, 350, 1),
(2, 1, 1, 1, 2, NULL, NULL, 12, 2),
(3, 1, 1, 1, 3, NULL, NULL, 105, 5),
(4, 1, 1, 1, 4, NULL, NULL, 4, 1),
(5, 1, 1, 1, 5, NULL, NULL, 15, 2),
(6, 2, 1, 1, 1, NULL, NULL, 250, 1),
(7, 2, 1, 1, 2, NULL, NULL, 5, 1),
(8, 2, 1, 1, 3, NULL, NULL, 208, 5),
(9, 2, 1, 1, 4, NULL, NULL, 8, 2),
(10, 2, 1, 1, 5, NULL, NULL, 25, 3),
(11, 3, 1, 1, 1, NULL, NULL, 50, 1),
(12, 3, 1, 1, 2, NULL, NULL, 25, 3),
(13, 3, 1, 1, 3, NULL, NULL, 87, 5),
(14, 3, 1, 1, 4, NULL, NULL, 16, 0),
(15, 3, 1, 1, 5, NULL, NULL, 45, 5),
(16, 1, 1, 2, 6, NULL, NULL, 25, 5),
(17, 1, 1, 2, 7, NULL, NULL, 100, 3),
(18, 1, 1, 2, 8, NULL, NULL, 125, 1),
(19, 1, 1, 2, 9, NULL, NULL, 35, 5),
(20, 1, 1, 2, 10, NULL, NULL, 22, 3),
(21, 8, 1, 2, 6, NULL, NULL, 112, 2),
(22, 8, 1, 2, 7, NULL, NULL, 33, 1),
(23, 8, 1, 2, 8, NULL, NULL, 45, 5),
(24, 8, 1, 2, 9, NULL, NULL, 89, 3),
(25, 8, 1, 2, 10, NULL, NULL, 115, 5),
(26, 9, 1, 2, 6, NULL, NULL, 48, 5),
(27, 9, 1, 2, 7, NULL, NULL, 78, 1),
(28, 9, 1, 2, 8, NULL, NULL, 96, 2),
(29, 9, 1, 2, 9, NULL, NULL, 225, 3),
(30, 9, 1, 2, 10, NULL, NULL, 35, 5),
(31, 2, 1, 2, 6, NULL, NULL, 14, 1),
(32, 2, 1, 2, 7, NULL, NULL, 89, 2),
(33, 2, 1, 2, 8, NULL, NULL, 85, 4),
(34, 2, 1, 2, 9, NULL, NULL, 36, 5),
(35, 2, 1, 2, 10, NULL, NULL, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `diction_data`
--

CREATE TABLE `diction_data` (
  `id` int(11) NOT NULL,
  `indicator_id` int(11) DEFAULT NULL,
  `range1_min` int(11) DEFAULT NULL,
  `range1_max` int(11) DEFAULT NULL,
  `range2_min` int(11) DEFAULT NULL,
  `range2_max` int(11) DEFAULT NULL,
  `range3_min` int(11) DEFAULT NULL,
  `range3_max` int(11) DEFAULT NULL,
  `range4_min` int(11) DEFAULT NULL,
  `range4_max` int(11) DEFAULT NULL,
  `range5_min` int(11) DEFAULT NULL,
  `range5_max` int(11) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ;

--
-- Dumping data for table `diction_data`
--

INSERT INTO `diction_data` (`id`, `indicator_id`, `range1_min`, `range1_max`, `range2_min`, `range2_max`, `range3_min`, `range3_max`, `range4_min`, `range4_max`, `range5_min`, `range5_max`, `updated_at`, `created_at`) VALUES
(1, 1, 0, 1000, 1001, 2000, 2001, 3000, 3001, 4000, 4001, 10000, '2017-05-09', '2017-05-09'),
(3, 2, 0, 10, 11, 20, 21, 30, 31, 40, 41, 100, '2017-05-10', '2017-05-10'),
(4, 3, 0, 5, 6, 10, 11, 15, 16, 20, 21, 1000, '2017-05-10', '2017-05-10'),
(5, 4, 0, 5, 6, 10, 11, 15, 16, 20, 21, 1000, '2017-05-19', '2017-05-19'),
(6, 5, 0, 10, 11, 20, 21, 30, 31, 40, 41, 1000, '2017-05-19', '2017-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `factors`
--

CREATE TABLE `factors` (
  `factor_id` int(11) NOT NULL,
  `factor_name` varchar(64) DEFAULT NULL,
  `factor_desc` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ;

--
-- Dumping data for table `factors`
--

INSERT INTO `factors` (`factor_id`, `factor_name`, `factor_desc`, `created_at`, `updated_at`) VALUES
(1, 'Cultural assets', 'desciption', NULL, NULL),
(2, 'Human infrastructure', NULL, NULL, NULL),
(3, 'Networked markets', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `indicators`
--

CREATE TABLE `indicators` (
  `indicator_id` int(11) NOT NULL,
  `indicator_name` varchar(64) DEFAULT NULL,
  `indicator_desc` varchar(255) DEFAULT NULL,
  `segment_id` int(11) NOT NULL,
  `factor_id` int(11) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ;

--
-- Dumping data for table `indicators`
--

INSERT INTO `indicators` (`indicator_id`, `indicator_name`, `indicator_desc`, `segment_id`, `factor_id`, `updated_at`, `created_at`) VALUES
(1, 'Cinema & Film', 'desc', 1, 1, NULL, NULL),
(2, 'Cultural Festivals', NULL, 1, 1, NULL, NULL),
(3, 'Dance & Ballet', NULL, 1, 1, NULL, NULL),
(4, 'Public Art Galleries', NULL, 1, 1, NULL, NULL),
(5, 'Theatre & Plays', NULL, 1, 1, NULL, NULL),
(6, 'Global Airport Connections', NULL, 2, 1, NULL, NULL),
(7, 'Hotel Range', NULL, 2, 1, NULL, NULL),
(8, 'International Students', NULL, 2, 1, NULL, NULL),
(9, 'Languages', NULL, 2, 1, NULL, NULL),
(10, 'Visitor Information', NULL, 2, 1, NULL, NULL),
(11, 'Classical Music', NULL, 3, 1, NULL, NULL),
(12, 'Music Venues', NULL, 3, 1, NULL, NULL),
(13, 'Nightlife', NULL, 3, 1, NULL, NULL),
(14, 'Popular Music', NULL, 3, 1, NULL, NULL),
(15, 'Opera House', NULL, 3, 1, NULL, NULL),
(16, 'Arts Education', NULL, 4, 2, NULL, NULL),
(17, 'Business Education', NULL, 4, 2, NULL, NULL),
(18, 'Science & Engineering', NULL, 4, 2, NULL, NULL),
(19, 'Student Population', NULL, 4, 2, NULL, NULL),
(20, 'University Commercialization', NULL, 4, 2, NULL, NULL),
(21, 'Department Stores', NULL, 5, 2, NULL, NULL),
(22, 'Local Markets', NULL, 5, 2, NULL, NULL),
(23, 'Local Shopping', NULL, 5, 2, NULL, NULL),
(24, 'Retail Establishment', NULL, 5, 2, NULL, NULL),
(25, 'Small Retail Clusters', NULL, 5, 2, NULL, NULL),
(26, 'Hospitals', NULL, 6, 2, NULL, NULL),
(27, 'Infant Mortality Rate', NULL, 6, 2, NULL, NULL),
(28, 'Life Expectancy', NULL, 6, 2, NULL, NULL),
(29, 'Waiting Lists', NULL, 6, 2, NULL, NULL),
(30, 'General Medicine', NULL, 6, 2, NULL, NULL),
(31, 'Magazine Availability', NULL, 7, 3, NULL, NULL),
(32, 'Public Libraries', NULL, 7, 3, NULL, NULL),
(33, 'TV & Radio Networks', NULL, 7, 3, NULL, NULL),
(34, 'Underground Publications', NULL, 7, 3, NULL, NULL),
(35, 'Bookstores', NULL, 7, 3, NULL, NULL),
(36, 'Internet Users', NULL, 8, 3, NULL, NULL),
(37, 'Mobile Phone Network', NULL, 8, 3, NULL, NULL),
(38, 'Social Web 2.0 Media', NULL, 8, 3, NULL, NULL),
(39, 'Wireless Internet', NULL, 8, 3, NULL, NULL),
(40, 'Broadband Internet', NULL, 8, 3, NULL, NULL),
(41, 'Manufacturing Quality', NULL, 9, 3, NULL, NULL),
(42, 'Manufacturing Breadth', NULL, 9, 3, NULL, NULL),
(43, 'Publishing Industry', NULL, 9, 3, NULL, NULL),
(44, 'Trade Diversity', NULL, 9, 3, NULL, NULL),
(45, 'Industry Clusters', NULL, 9, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `segments`
--

CREATE TABLE `segments` (
  `segment_id` int(11) NOT NULL,
  `segment_name` varchar(64) DEFAULT NULL,
  `segment_desc` varchar(255) DEFAULT NULL,
  `factor_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ;

--
-- Dumping data for table `segments`
--

INSERT INTO `segments` (`segment_id`, `segment_name`, `segment_desc`, `factor_id`, `created_at`, `updated_at`) VALUES
(1, 'Arts & Culture', 'desc', 1, NULL, NULL),
(2, 'Cultural Exchange: Travel & Tourism', NULL, 1, NULL, NULL),
(3, 'Music & Performance', NULL, 1, NULL, NULL),
(4, 'Education, Science & Universities', NULL, 2, NULL, NULL),
(5, 'Retail & Shopping', NULL, 2, NULL, NULL),
(6, 'Health & Medicine', NULL, 2, NULL, NULL),
(7, 'Information, Media & Publishing', NULL, 3, NULL, NULL),
(8, 'Technology & Communications', NULL, 3, NULL, NULL),
(9, 'Industry & Manufacturing', NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `user_type` int(11) NOT NULL DEFAULT '0',
  `user_accept` int(11) DEFAULT '0',
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `remember_token`, `user_type`, `user_accept`, `created_at`, `updated_at`) VALUES
(1, 'tsogmongolia@gmail.com', 'tsog', '$2y$10$hdtLqPZK8p9EBkfZPKXKeO.gUQ2oOjhj/0QyzNXaHX5VKlUfMKexO', 'giXru4iok90WP10mx9KfPjLIMcJTRwJRm3Iin87aoFIGeTX1w1U7xU29V57X', 1, 1, '2017-04-06', '2017-04-06'),
(2, 'user1@yahoo.com', 'user1', '$2y$10$gsqkGAbLlK62dl44W/rNDeQ8Mo5D69jJq3UEbftwH8cBww6znixsa', 'Cr366QYEH7zC0XD8UJ24PLKy2wE49nGwiZnFZrTjRNf7RjTH5ySl14yJIf7F', 0, 0, '2017-05-20', '2017-05-20'),
(3, 'user2@yahoo.com', 'user2', '$2y$10$nMegOdLzpBTbqJdNez5fhulOFvP6xAsAE416FDJxC7p.m2XpxJX1e', 'bSpAtKKALa3gg4QP29LXYu6Te1ncAJsBvFxobtchxeBaqHroVgmXy1xWYkxu', 0, 1, '2017-05-22', '2017-05-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `datapoint`
--
ALTER TABLE `datapoint`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `diction_data`
--
ALTER TABLE `diction_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factors`
--
ALTER TABLE `factors`
  ADD PRIMARY KEY (`factor_id`);

--
-- Indexes for table `indicators`
--
ALTER TABLE `indicators`
  ADD PRIMARY KEY (`indicator_id`);

--
-- Indexes for table `segments`
--
ALTER TABLE `segments`
  ADD PRIMARY KEY (`segment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `datapoint`
--
ALTER TABLE `datapoint`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `diction_data`
--
ALTER TABLE `diction_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `factors`
--
ALTER TABLE `factors`
  MODIFY `factor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `indicators`
--
ALTER TABLE `indicators`
  MODIFY `indicator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `segments`
--
ALTER TABLE `segments`
  MODIFY `segment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
