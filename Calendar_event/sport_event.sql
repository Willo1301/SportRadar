-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2025 at 04:28 PM
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
-- Database: `sport_event`
--
CREATE DATABASE IF NOT EXISTS `sport_event` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sport_event`;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `day` varchar(30) NOT NULL,
  `sport` varchar(30) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `date`, `time`, `day`, `sport`, `img`) VALUES
(1, 'Salzburg vs Sturm', '2025-11-15', '18:30:00', 'Saturday', 'Football', 'https://media.istockphoto.com/id/1044232478/vector/november-15-calendar-icon.jpg?s=612x612&w=0&k=20&c=7Jse_SczEo6SOIAICQOztx4KnoZgngaInS8MJNWPSpQ='),
(2, 'KAC vs Capitals', '2025-11-22', '19:00:00', 'Saturday', 'Ice Hockey', 'https://thumbs.dreamstime.com/b/november-red-white-color-calendar-page-black-outline-date-simple-vector-illustration-297568611.jpg'),
(6, 'BC Vienna vs Gunners', '2025-11-30', '16:00:00', 'Sunday', 'Basketball', 'https://media.istockphoto.com/id/1167516004/vector/november-30-daily-calendar-icon-in-flat-design-style.jpg?s=612x612&w=0&k=20&c=39gqct62Cf6OpZpdHvJFMnWySSl5xwvlmm71iLpB7yU='),
(10, 'Vienna vs kapfenberg Bulls', '2025-11-23', '19:00:00', 'Sunday', 'Basketball', 'https://media.istockphoto.com/id/1070585088/vector/november-23-calendar-date-design.jpg?s=612x612&amp;w=0&amp;k=20&amp;c=ridjs-Jx-sUMYVHWWlGnuw71DhBquS0cUL66rmpfHUg='),
(13, 'Graz vs Gunners', '2025-11-19', '20:00:00', 'Wednesday', 'Basketball', 'https://www.scottwintersblog.com/wp-content/uploads/2017/11/DATE-11-19.jpg'),
(14, 'Vienna vs Graz', '2025-11-26', '20:00:00', 'Wednesday', 'Basketball', 'https://img.freepik.com/premium-vector/26th-november-calendar-icon-november-26-calendar-date-month-icon-vector-illustrator_1206424-7401.jpg?w=360');

-- --------------------------------------------------------

--
-- Table structure for table `event_team`
--

CREATE TABLE `event_team` (
  `fk_event_id` int(11) DEFAULT NULL,
  `fk_team_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_city` varchar(30) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `sport` varchar(30) NOT NULL,
  `genre` varchar(30) NOT NULL,
  `players` varchar(255) DEFAULT NULL,
  `standings` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_city`, `name`, `sport`, `genre`, `players`, `standings`) VALUES
(1, 'Salzburg', 'FC Red Bull Salzburg', 'Football', 'Male', 'John Mellberg, Frans Krätzig, Maurits Kjærgaard, Tim Trummer, Aleksa Terzić, Mamady Diambou, Salko Hamzić, Jannik Schuster, Mads Bidstrup, Soumaila Diabate, Stefan Lainer.', 1),
(2, 'Graz', 'SK Sturm Graz', 'Football', 'Male', 'Matteo Bignetti, Otar Kiteishvili, Tomi Horvat, Jon Gorenc Stanković, Seedy Jatta, Elias Lorenz, Jacob-Peter Hödl, Alexandar Borkovic, Niklas Geyrhofer, Stefan Hierländer, Dimitri Lavalée.', 3),
(3, 'Klagenfurt am Wörthersee', 'EC KAC', 'Ice Hockey', 'Male', 'Raphael Herburger, Jesper Jensen Aabo, Christoph Brandner, Thomas Koch, Nick Petersen, Clemens Unterweger.', 5),
(4, 'Vienna', 'Vienna Capitals', 'Ice Hockey', 'Male', 'Linden Vey, Mitch Hults, Carter Souch, Simon Bourque, Leon Wallner, Randy Gazzola.', 11),
(7, 'Vienna', 'BC Vienna', 'Basketball', 'Male', 'Souley Boum, Rasid Mahalbasic, Gregor Glas, Lovre Runjic, Samuel Hunter', 8),
(8, 'Oberwart', 'Gunners', 'Basketball', 'Male', 'Sebastian Käferle, Daniel Köppel, Edi Patekar, Nate Louis, Horst Leitner', 1),
(11, 'kapfenberg', 'kapfenberg Bulls', 'Basketball', 'Male', 'Nemanja Krstić, David Vötsch, Tobias Schrittwieser, Vitaliy Zotov, Simon Okoro.', 5),
(12, 'Graz', 'UBSC Graz', 'Basketball', 'Male', 'Ervin Dragšič, Elias Podany, Tevin Brewer, Nic Lynch, Chase Paar.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `venue_id` int(11) NOT NULL,
  `indoor_outdoor` varchar(30) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `event_city` varchar(30) DEFAULT NULL,
  `fk_event_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_team`
--
ALTER TABLE `event_team`
  ADD KEY `fk_event_id` (`fk_event_id`),
  ADD KEY `fk_team_id` (`fk_team_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`venue_id`),
  ADD KEY `fk_event_id` (`fk_event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `venue_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_team`
--
ALTER TABLE `event_team`
  ADD CONSTRAINT `event_team_ibfk_1` FOREIGN KEY (`fk_event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `event_team_ibfk_2` FOREIGN KEY (`fk_team_id`) REFERENCES `team` (`team_id`);

--
-- Constraints for table `venue`
--
ALTER TABLE `venue`
  ADD CONSTRAINT `venue_ibfk_1` FOREIGN KEY (`fk_event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
