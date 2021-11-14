-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2021 at 08:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Dark Cloud'),
(2, 'Heroes of the Storm'),
(3, 'The Last of Us'),
(4, 'Metroid Prime'),
(5, 'Elder Scrolls'),
(6, 'Fallout'),
(9, 'Delete Me'),
(24, 'Meow'),
(25, 'Woof');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, 1, 'Morgan Freeman', 'MorganFreeman@email.com', 'Example content', 'Approved', '2021-11-12'),
(4, 1, 'Morgan Freeman', 'MorganFreeman@email.com', 'I am Morgan Freeman, it is nice to meet you :)', 'Unapproved', '2021-11-12'),
(5, 1, 'Morgan Freeman', 'MorganFreeman@email.com', 'I am Morgan Freeman, it is nice to meet you :)', 'Approved', '2021-11-12'),
(6, 2, 'Kerrigan Fan 100', 'KerriganFan100@email.com', 'Kerrigan is amazing :)', 'Approved', '2021-11-12'),
(7, 2, 'ET', 'ET@gohome.com', 'I must go home :(', 'Approved', '2021-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 2, 'Abathur', 'Maximus Prime', '2021-11-13', 'Abathur.png', 'Abathur is the Evolution Master of Kerrigan\'s Swarm, works ceaselessly to improve the Zerg from the genetic level up.\r\n\r\nAbathur is a melee Support Hero from the StarCraft universe. \r\n\r\nAbathur is a unique Hero who can manipulate the battle from anywhere on the map. In doing so, he can help his team secure big advantages and shape the flow of battle.\r\n\r\nStrengths\r\nCan soak multiple lanes at once, creating an XP lead.\r\nExcellent synergy with specific Heroes like Illidan, Tracer or the Butcher.\r\nOne of the best split-pushing Heroes in the game.\r\nCan teleport anywhere on the map (provided there is vision) using Deep Tunnel.\r\nToxic Nest is excellent at spotting and dismounting enemies attempting to gank allies or sneak objectives.\r\n\r\nWeaknesses\r\nWeak early game.\r\nBody is extremely vulnerable if found.\r\nRequires very good multitasking and map awareness.\r\nTeam must adapt to Abathur\'s unique gameplay style in order to succeed.\r\nViability is very dependent on the map and team compositions.', 'Abathur, Heroes of the Storm, Evolution Master, Swarm, StarCraft, melee, support', 3, 'Published'),
(2, 2, 'Queen of Blades', 'Maximus Prime', '2021-11-13', 'Kerrigan.png', 'Sarah Kerrigan, the Queen of Blades, is a Melee Assassin Hero from the StarCraft universe. Once a Terran Ghost with formidable psionic abilities, Sarah Kerrigan was betrayed by her allies and transformed by the Zerg into the Queen of Blades. Now freed of the dark one\'s corruption, Kerrigan faces a threat that could destroy the galaxy itself.\r\n\r\nKerrigan is a combo Assassin who goes all in, diving into the enemy team.\r\n\r\nStrengths\r\nExcellent burst damage and crowd control\r\nStrong inititaition by means of Ravage Icon.png Ravage\r\nExcels at ganking\r\nDeceptively tanky due to Assimilation Icon.png Assimilation\r\nIncredible waveclear\r\n\r\nWeaknesses\r\nIncredibly vulnerable to crowd control\r\nVery reliant on ability cooldowns\r\nLow sustained damage\r\nHigh skill cap/learning curve\r\nLittle to no means of escape (without Psionic Shift Icon.png Psionic Shift)', 'Heroes of the Storm, Kerrigan, Queen of Blades, Zerg, StarCraft, Swarm, Melee, Assassin', 2, 'Published'),
(4, 1, 'Delete Me', 'Delete Me', '2021-11-13', '1-15554_abstract-gaming-wallpaper-4k.jpg', 'I need to be deleted hurry!', 'Delete Me', 0, 'Draft'),
(5, 2, 'Delete Me Quick', 'Really I needed to be deleted', '2021-11-13', '7390c4f7ea9a1686ce2caaef959554e5.jpg', 'DELETED!!!!!!!!!!!!!!!', 'Need to be...', 0, 'Draft'),
(11, 3, 'Update Me', 'Update', '2021-11-13', 'TheLastOfUs.png', 'UPDATE!!', 'Update', 0, 'Draft'),
(13, 1, 'Test', 'Test', '2021-11-13', 'TheLastOfUsPart2.png', 'Test', 'Test', 0, 'Draft'),
(18, 4, 'Moooo', 'oooo', '2021-11-13', 'DarkCloud.png', 'ooooooooooooooooo', 'ooooo', 0, 'Draft'),
(19, 5, 'Test Status', 'Me', '2021-11-13', 'HeroesOfTheStorm.png', 'Testin Status!!', 'Test', 0, 'Draft'),
(20, 3, 'Test 2', 'I am', '2021-11-14', 'DarkCloud.png', 'sadfas', 'dsa', 0, 'Draft'),
(21, 6, 'nn', 'nn', '2021-11-14', 'HeroesOfTheStorm.png', 'nn', 'nn', 0, 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `role` varchar(255) NOT NULL,
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `email`, `user_image`, `role`, `randSalt`) VALUES
(1, 'MaximusPrime', '123', 'Maximus', 'Prime', 'MaximusPrime@email.com', 'TheLastOfUs.png', 'Admin', ''),
(2, 'Bob_Newman', 'abc', 'Bob', 'Newman', 'BobNewman@email.com', 'TheLastOfUsPart2.png', 'Subscriber', ''),
(5, 'Morgan_Freeman', 'abc', 'Morgan', 'Freeman', 'MorganFreeman@email.com', 'V.png', 'Subscriber', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
