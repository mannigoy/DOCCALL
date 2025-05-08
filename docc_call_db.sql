--
-- Database: `docc_call_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointmentID` int(11) NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL,
  `status` enum('pending','approved','denied','completed','cancelled') DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointmentID`, `appointment_date`, `appointment_time`, `status`, `doctor_id`, `patient_id`, `reason`) VALUES
(1, '2025-05-29', '14:30:00', 'cancelled', 6, 8, 'bahog ilok'),
(2, '2025-05-20', '14:30:00', 'completed', 10, 8, 'gi danlak'),
(3, '2025-05-23', '10:30:00', 'completed', 10, 9, 'asfasfasf'),
(4, '2025-05-21', '14:00:00', 'denied', 10, 9, 'sip-on'),
(5, '2025-05-07', '15:30:00', 'cancelled', 10, 9, 'panuhot'),
(6, '2025-05-07', '15:00:00', 'denied', 10, 9, 'sagasgassg'),
(7, '2025-05-31', '15:30:00', 'completed', 10, 9, 'asfasfasf'),
(8, '2025-05-22', '14:30:00', 'pending', 19, 9, 'asfasf asfasf');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `licence_number` varchar(255) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `consultation_fee` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `licence_number`, `department`, `specialization`, `consultation_fee`) VALUES
(6, 'GH123DSFJAS', 'surgery', 'neurology', '450.00'),
(10, 'asdas214124', 'radiology', 'urology', '450.00'),
(19, 'asdas214124', 'surgery', 'endocrinology', '450.00');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `emergency_contact` varchar(20) DEFAULT NULL,
  `medical_history` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `emergency_contact`, `medical_history`) VALUES
(4, '09773761701', 'adasdaf'),
(5, '09773761701', 'asdaff'),
(7, '09773761701', 'nadagma'),
(8, '09123456789', 'asfasfag'),
(9, '09123456789', 'asfasfag'),
(11, '09123456789', 'none'),
(12, '09123456789', 'asfasgasg'),
(13, '09123456789', 'asfasgasg'),
(14, '09123456789', 'asfasgasg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `contact_num` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('admin','doctor','patient') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `birthdate`, `contact_num`, `email`, `password_hash`, `role`, `created_at`) VALUES
(1, NULL, NULL, NULL, NULL, 'emmanroy.pielago03@gmail.com', 'asdfghjkl', 'patient', '2025-05-06 23:53:48'),
(4, NULL, NULL, NULL, NULL, 'emmanroy.pielago25@gmail.com', '$2y$10$XU.TGLgYZzxEbzE2iHgGc.x6xyMwN9QDkQf2J4Jd1IP0R6VkWGeG.', 'patient', '2025-05-07 01:15:53'),
(5, 'emman', 'pielago', '2003-02-10', '09773761701', 'renie.pielago001@deped.gov.ph', '$2y$10$1la6t3bwrT1VYMYszzILs.984NFzxe5M/6ZrhzPerxtIv1F1MNvnC', 'patient', '2025-05-07 03:03:17'),
(6, 'emman', 'pielago', '2003-05-10', '09773761701', 'emmanroy.pielago12@gmail.com', '$2y$10$XlZtklXQXZGc13SZypt9qevohnAlJPWzyWOwBkH1hU9U.Ubg9GaL6', 'doctor', '2025-05-07 03:30:09'),
(7, 'emman', 'pielago', '2003-10-25', '09773761701', 'emmanroy.pielago26@gmail.com', '$2y$10$A8kitoKnDVTNrSf4y4ZBnOFF6HRtOjGQNphcs1EhHNGnmKioHznii', 'patient', '2025-05-07 06:54:31'),
(8, 'john ', 'doe', '2025-05-09', '09123456789', 'johndoe123@gmail.com', '$2y$10$kXYwAHXJ2sHdhiJGAlacAeBtYuF3iJo/jLhKX3JvX5/7NwPXzJ5YW', 'patient', '2025-05-07 08:00:48'),
(9, 'john ', 'doe', '2025-05-09', '09123456789', 'johndoe124@gmail.com', '$2y$10$9CcicfMsnyLbUQUBk.fhOe1CjQHIKI11I9yEOihEwHLplTk7/Hwi.', 'patient', '2025-05-07 08:01:24'),
(10, 'doctor', 'kwakwak', '2007-01-11', '09123456789', 'kwakwak@gmail.com', '$2y$10$aGPZZ7W75ReEPRUQ07R21efaIaVNpTyVhYdPWTCPWpcch6GGPQqhe', 'doctor', '2025-05-07 08:39:20'),
(11, 'rocky', 'decretales', '2005-07-22', '09123456789', 'rockydecretales@gmail.com', '$2y$10$vH15i1oLxL0A5poNLALB3.uq/lKvgrvKJNTHCMbkWcI7EXH8Kmn4i', 'patient', '2025-05-07 10:59:19'),
(12, 'Sample1', 'sample', '2019-02-07', '09123456789', 'sample@gmail.com', '$2y$10$Erua7Dp8vwT3r136geohXeuMFQKM8hcWsaa9cNx23KVcm6R3qX0cu', 'patient', '2025-05-07 11:02:57'),
(13, 'Sample1', 'sample', '2019-02-07', '09123456789', 'sample1@gmail.com', '$2y$10$k7Nj5MVzfR871b8UJ01Cd.6OiqCkm8skrhzWbEaLWYQ1TOXr8drbm', 'patient', '2025-05-07 11:04:07'),
(14, 'Sample2', 'sample', '2019-02-07', '09123456789', 'sample2@gmail.com', '$2y$10$AWs6PQ..gT68Pd7LQ2/4Kux/OihOuBtKy3gqozn8pOWDhaFnKD.Z.', 'patient', '2025-05-07 11:04:51'),
(19, 'jose', 'rizal', '2007-01-11', '09123456789', 'joserizal@gmail.com', '$2y$10$NlFQxivUVITofn9kFTFauef2w1eEIzFOgGQ1X9e5H4HXbVb5GyQzG', 'doctor', '2025-05-07 12:09:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentID`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`),
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`patient_id`);

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
