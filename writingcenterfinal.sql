-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 02:13 PM
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
-- Database: `writingcenterfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointmentsfinal`
--

CREATE TABLE `appointmentsfinal` (
  `appointment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tutor_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` enum('pending','attended','cancelled') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `availabilityfinal`
--

CREATE TABLE `availabilityfinal` (
  `availability_id` int(11) NOT NULL,
  `tutor_id` int(11) DEFAULT NULL,
  `day_of_week` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `availabilityfinal`
--

INSERT INTO `availabilityfinal` (`availability_id`, `tutor_id`, `day_of_week`, `start_time`, `end_time`) VALUES
(1, 4, 'Monday', '16:36:00', '18:38:00'),
(2, 4, 'Monday', '16:16:00', '16:16:00'),
(3, 5, 'Monday', '10:45:00', '11:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `servicesfinal`
--

CREATE TABLE `servicesfinal` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicesfinal`
--

INSERT INTO `servicesfinal` (`service_id`, `service_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Essay Writing Assistance', 'Support and guidance for drafting, revising, and improving essays.', '2024-12-14 18:47:08', '2024-12-14 18:47:08'),
(2, 'Thesis and Dissertation Support', 'Assistance with structuring, researching, and writing theses or dissertations.', '2024-12-14 18:47:08', '2024-12-14 18:47:08'),
(3, 'Creative Writing Guidance', 'Feedback and strategies to enhance storytelling, poetry, and other creative works.', '2024-12-14 18:47:08', '2024-12-14 18:47:08'),
(4, 'Research Paper Help', 'Help with researching, outlining, and writing research papers for academic purposes.', '2024-12-14 18:47:08', '2024-12-14 18:47:08'),
(5, 'Grammar and Style Editing', 'Detailed editing to improve grammar, punctuation, and overall writing style.', '2024-12-14 18:47:08', '2024-12-14 18:47:08'),
(6, 'Peer Reviews and Feedback', 'Constructive feedback and suggestions for improvement from a peer perspective.', '2024-12-14 18:47:08', '2024-12-14 18:47:08'),
(7, 'Brainstorming and Idea Development', 'One-on-one sessions to help generate ideas and develop concepts for writing.', '2024-12-14 18:47:08', '2024-12-14 18:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `statisticsfinal`
--

CREATE TABLE `statisticsfinal` (
  `stat_id` int(11) NOT NULL,
  `total_students` int(11) DEFAULT 0,
  `total_tutors` int(11) DEFAULT 0,
  `total_appointments` int(11) DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutorsfinal`
--

CREATE TABLE `tutorsfinal` (
  `tutor_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','declined') NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tutorsfinal`
--

INSERT INTO `tutorsfinal` (`tutor_id`, `first_name`, `last_name`, `email`, `password`, `profile_image`, `status`, `created_at`) VALUES
(1, 'Henry', 'Owusu', 'henry@ashesi.edu.gh', '$2y$10$2j7lrV8v3tIKbReAR0Fk9.WnLkJ3FrDhWwqnS8jn2Q/ILkpLBJ5Pi', 'Blue and White Modern Simple Project Proposal (1).jpg', 'approved', '2024-12-14 20:19:27'),
(2, 'New', 'Tutor', 'tutor@gmail.com', '$2y$10$NHSymbcbspixnKIoSOXJVu/TBY/h82HmMco4D8SGOEIEDsvUY2FZ.', 'TaxNet.jpg', 'declined', '2024-12-15 13:03:32'),
(4, 'another', 'tutor', 'anothertutor@ashesi.edu.gh', '$2y$10$jjrg3gM0HKufT0L97wz7uedj71RmQQBE7bvjjhMjBkFurMoEzMAIq', 'Blue and White Modern Simple Project Proposal.jpg', 'approved', '2024-12-15 13:24:13'),
(5, 'Amma', 'Ntowaa', 'amma@ashesi.edu.gh', '$2y$10$zpnI477sV7UQDJ.wYU3XAe8VzKuWzqOd4dTSSnlPXmbq//70mTsym', 'zeee2.jpg', 'approved', '2024-12-16 17:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `usersfinal`
--

CREATE TABLE `usersfinal` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','admin') NOT NULL DEFAULT 'student',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usersfinal`
--

INSERT INTO `usersfinal` (`user_id`, `first_name`, `last_name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Zoie Maabena', 'Atakora-Nsiah', 'zoie.atakora@ashesi.edu.gh', '$2y$10$yLiQdh3plJrVbp0KM9.j4u6JDhx9xRvnG8stuvZHEmd7WJzC.7lWG', 'student', '2024-12-14 18:35:50'),
(2, 'Nicole', 'Tracy', 'nicole@ashesi.edu.gh', '$2y$10$0MuGx64nu5vr.BmYt4GlZ.jMUPafPsbbcfg9wwCFmVHuEajo3cGJO', 'student', '2024-12-14 19:22:04'),
(3, 'Jemima', 'Konadu', 'jemimakonadu@ashesi.edu.gh', '$2y$10$ypLHQxTSi4aj8Nv4crcBG.UJNhCigpIx8BH5GG4hp7LnrEJ5sukZC', 'student', '2024-12-16 17:37:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointmentsfinal`
--
ALTER TABLE `appointmentsfinal`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `tutor_id` (`tutor_id`),
  ADD KEY `fk_service` (`service_id`);

--
-- Indexes for table `availabilityfinal`
--
ALTER TABLE `availabilityfinal`
  ADD PRIMARY KEY (`availability_id`),
  ADD KEY `tutor_id` (`tutor_id`);

--
-- Indexes for table `servicesfinal`
--
ALTER TABLE `servicesfinal`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `statisticsfinal`
--
ALTER TABLE `statisticsfinal`
  ADD PRIMARY KEY (`stat_id`);

--
-- Indexes for table `tutorsfinal`
--
ALTER TABLE `tutorsfinal`
  ADD PRIMARY KEY (`tutor_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usersfinal`
--
ALTER TABLE `usersfinal`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointmentsfinal`
--
ALTER TABLE `appointmentsfinal`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `availabilityfinal`
--
ALTER TABLE `availabilityfinal`
  MODIFY `availability_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `servicesfinal`
--
ALTER TABLE `servicesfinal`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `statisticsfinal`
--
ALTER TABLE `statisticsfinal`
  MODIFY `stat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutorsfinal`
--
ALTER TABLE `tutorsfinal`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usersfinal`
--
ALTER TABLE `usersfinal`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointmentsfinal`
--
ALTER TABLE `appointmentsfinal`
  ADD CONSTRAINT `appointmentsfinal_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `usersfinal` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointmentsfinal_ibfk_2` FOREIGN KEY (`tutor_id`) REFERENCES `tutorsfinal` (`tutor_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_service` FOREIGN KEY (`service_id`) REFERENCES `servicesfinal` (`service_id`) ON DELETE CASCADE;

--
-- Constraints for table `availabilityfinal`
--
ALTER TABLE `availabilityfinal`
  ADD CONSTRAINT `availabilityfinal_ibfk_1` FOREIGN KEY (`tutor_id`) REFERENCES `tutorsfinal` (`tutor_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
