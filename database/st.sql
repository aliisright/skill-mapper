-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 17, 2018 at 11:04 PM
-- Server version: 5.6.38
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `st`
--

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) UNSIGNED NOT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `parentskill_childskill`
--

CREATE TABLE `parentskill_childskill` (
  `id` int(11) UNSIGNED NOT NULL,
  `parentskill_id` int(11) DEFAULT NULL,
  `childskill_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parentskill_childskill`
--

INSERT INTO `parentskill_childskill` (`id`, `parentskill_id`, `childskill_id`) VALUES
(1, 1, 2),
(2, 1, 10),
(3, 1, 11),
(4, 1, 13),
(5, 1, 14),
(6, 10, 15),
(7, 10, 16),
(8, 13, 17),
(9, 14, 18);

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` int(11) UNSIGNED NOT NULL,
  `score` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `score`) VALUES
(1, 'nul'),
(2, 'débutant'),
(3, 'intermédiaire'),
(4, 'avancé'),
(5, 'expert');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) DEFAULT NULL,
  `level` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `path`, `level`, `created_at`, `updated_at`) VALUES
(1, 'HTML', 'http://creersonsiteweb.net/images/html.png', 1, NULL, '2018-02-28 13:55:41'),
(2, 'CSS', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3d/CSS.3.svg/2000px-CSS.3.svg.png', 2, NULL, '2018-02-28 13:55:45'),
(10, 'PHP', 'http://www.pngall.com/wp-content/uploads/2016/05/PHP-Logo.png', 2, NULL, '2018-03-07 10:27:14'),
(11, 'Java', 'https://upload.wikimedia.org/wikipedia/fr/thumb/2/2e/Java_Logo.svg/550px-Java_Logo.svg.png', 2, NULL, '2018-03-07 10:27:27'),
(13, 'Python', 'https://www.softwarehamilton.com/wp-content/uploads/2017/04/python-logo.png', 2, NULL, '2018-03-07 10:28:03'),
(14, 'Javascript', 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/99/Unofficial_JavaScript_logo_2.svg/480px-Unofficial_JavaScript_logo_2.svg.png', 2, NULL, '2018-03-07 10:28:05'),
(15, 'Laravel', 'https://seeklogo.com/images/L/laravel-framework-logo-C10176EC8C-seeklogo.com.png', 3, NULL, '2018-03-07 10:28:49'),
(16, 'Symfony', 'https://symfony.com/logos/symfony_black_03.png', 3, NULL, '2018-03-07 10:28:50'),
(17, 'Django', 'http://big.info/wp-content/uploads/2016/07/django.png', 3, NULL, '2018-03-07 10:29:01'),
(18, 'NodeJS', 'http://lnwebworks.com/sites/default/files/node.png', 3, NULL, '2018-03-07 10:29:21');

-- --------------------------------------------------------

--
-- Table structure for table `skill_goals`
--

CREATE TABLE `skill_goals` (
  `id` int(11) UNSIGNED NOT NULL,
  `goal` varchar(255) NOT NULL,
  `description` text,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skill_goals`
--

INSERT INTO `skill_goals` (`id`, `goal`, `description`, `skill_id`) VALUES
(6, 'premier goal HTML', NULL, 1),
(8, 'premier goal CSS', NULL, 2),
(12, '2e goal HTML', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skill_states`
--

CREATE TABLE `skill_states` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skill_states`
--

INSERT INTO `skill_states` (`id`, `name`) VALUES
(1, 'locked'),
(2, 'unlocked'),
(3, 'validated');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nickname` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nickname`, `email`, `password`, `first_name`, `last_name`, `created_at`, `updated_at`) VALUES
(26, 'ali', 'alihasan.me@me.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, '2018-03-13 16:09:13', NULL),
(27, 'aliso', 'aliso@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, '0000-00-00 00:00:00', NULL),
(28, '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL, NULL, '0000-00-00 00:00:00', NULL),
(29, 'aloo', 'aloo@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, '0000-00-00 00:00:00', NULL),
(30, 'aliiiiii', 'aliooo@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, '0000-00-00 00:00:00', NULL),
(31, 'lolo', 'lolo@mail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', NULL, NULL, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_skill`
--

CREATE TABLE `user_skill` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `state_id` int(11) UNSIGNED NOT NULL,
  `score_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_skill`
--

INSERT INTO `user_skill` (`id`, `user_id`, `skill_id`, `state_id`, `score_id`, `created_at`, `updated_at`) VALUES
(97, 26, 1, 3, 2, '2018-03-13 16:09:13', '2018-04-19 08:51:40'),
(98, 26, 2, 2, 3, '2018-03-13 16:09:13', '2018-04-19 08:51:28'),
(99, 26, 10, 3, 3, '2018-03-13 16:09:13', '2018-04-19 08:51:58'),
(100, 26, 11, 2, 1, '2018-03-13 16:09:13', '2018-04-19 08:51:28'),
(101, 26, 13, 2, 1, '2018-03-13 16:09:13', '2018-04-19 08:51:28'),
(102, 26, 14, 2, 1, '2018-03-13 16:09:13', '2018-04-19 08:51:28'),
(103, 26, 15, 3, 1, '2018-03-13 16:09:13', '2018-04-19 08:52:05'),
(104, 26, 16, 2, 1, '2018-03-13 16:09:13', '2018-04-19 08:51:58'),
(105, 26, 17, 1, 1, '2018-03-13 16:09:13', NULL),
(106, 26, 18, 1, 1, '2018-03-13 16:09:13', '2018-04-19 08:51:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_skillgoal`
--

CREATE TABLE `user_skillgoal` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skillgoal_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_skillgoal`
--

INSERT INTO `user_skillgoal` (`id`, `user_id`, `skillgoal_id`, `created_at`, `updated_at`) VALUES
(3, 26, 6, '2018-03-14 11:17:56', '2018-03-15 10:58:20'),
(5, 26, 8, '2018-03-14 11:27:03', '2018-03-15 10:58:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parentskill_childskill`
--
ALTER TABLE `parentskill_childskill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `childskill_id` (`childskill_id`),
  ADD KEY `parentskill_id` (`parentskill_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`);

--
-- Indexes for table `skill_goals`
--
ALTER TABLE `skill_goals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `skill_states`
--
ALTER TABLE `skill_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_skill`
--
ALTER TABLE `user_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `skill_id` (`skill_id`),
  ADD KEY `score_id` (`score_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `user_skillgoal`
--
ALTER TABLE `user_skillgoal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `skillgoal_id` (`skillgoal_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parentskill_childskill`
--
ALTER TABLE `parentskill_childskill`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `skill_goals`
--
ALTER TABLE `skill_goals`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `skill_states`
--
ALTER TABLE `skill_states`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_skill`
--
ALTER TABLE `user_skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `user_skillgoal`
--
ALTER TABLE `user_skillgoal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `parentskill_childskill`
--
ALTER TABLE `parentskill_childskill`
  ADD CONSTRAINT `parentskill_childskill_ibfk_1` FOREIGN KEY (`parentskill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `parentskill_childskill_ibfk_2` FOREIGN KEY (`childskill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`level`) REFERENCES `levels` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `skill_goals`
--
ALTER TABLE `skill_goals`
  ADD CONSTRAINT `skill_goals_ibfk_1` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_skill`
--
ALTER TABLE `user_skill`
  ADD CONSTRAINT `user_skill_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_skill_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_skill_ibfk_3` FOREIGN KEY (`score_id`) REFERENCES `scores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_skill_ibfk_4` FOREIGN KEY (`state_id`) REFERENCES `skill_states` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_skillgoal`
--
ALTER TABLE `user_skillgoal`
  ADD CONSTRAINT `user_skillgoal_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_skillgoal_ibfk_2` FOREIGN KEY (`skillgoal_id`) REFERENCES `skill_goals` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
