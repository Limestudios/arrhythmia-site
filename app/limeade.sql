-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 16, 2014 at 05:17 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `limeade`
--
CREATE DATABASE IF NOT EXISTS `limeade` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `limeade`;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `posted_on` datetime NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `color` char(7) DEFAULT '#000000',
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `setting_name` varchar(20) NOT NULL,
  `setting_value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`id`, `setting_name`, `setting_value`) VALUES
(1, 'theme', '{\r\n   "theme": {\r\n      "default": "1",\r\n      "light": "0",\r\n      "dark": "0"\r\n   }\r\n}'),
(2, 'navbar', '{\r\n   "navbar": {\r\n      "1": {\r\n         "Home": "index"\r\n      },\r\n      "2": {\r\n         "About US": "about"\r\n      },\r\n      "3": {\r\n         "Contact US": "contact"\r\n      },\r\n      "4": {\r\n         "devide": "null"\r\n      },\r\n      "5": {\r\n         "Github Repo": "https://github.com/Limestudios/limeade"\r\n      },\r\n      "6": {\r\n         "Liam''s Github": "https://github.com/Limestudios"\r\n      },\r\n      "7": {\r\n         "Patrick''s Github": "https://github.com/pburtchaell"\r\n      }\r\n   }\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard User', ''),
(2, 'Administrator', '{\r\n"admin": 1,\r\n"moderator": 1\r\n}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `email_code` varchar(64) NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `email`, `email_code`, `joined`, `group`, `active`) VALUES
(4, 'charles', '0a57ceaf1b87f4cc18246d3177fe11b92e585998951ec9ecf9c35385469d01be', '×>0yûâ†ü÷…•gMs×S[Ê4v«—q†Ê\0,\r·', 'Ms. Egan', 'charles@email.com', '66e0f45528852b6b963376a1775f7078', '2013-11-18 14:11:15', 1, 1),
(5, 'liam', '0b0f2ab95d79d7f353ed45625b4793d988a14947323a18618bf6df62e5b07889', 'Xe!^%¬P^ZIC5–ÀÔ§1', 'Liam Craver', 'test@gmail.com', '2e764f62c9a152540e45fb6653071e27', '2013-11-18 21:05:21', 2, 1),
(6, 'zoe', '5d81432a84675b861b0c22b12330e156f18a597f903c336b4e9d87bc1241c9f9', 'îhø®1[Žîð¤KubhÌWÂ˜ã¾/s', 'Zoe Zollinger', 'zoezollinger24@gmail.com', 'f19f0e710061fcbc442b48b39a3dad5b', '2013-11-18 21:34:34', 1, 1),
(8, 'tim', 'c29cfddf2d1b2553eff3c2c0fb6ee1b5fd7cfa5b25f63f75e01b2193e1688908', 'èn¼>~åNú„4Ïù\0pËÿÙÃ™*þ»“}/²¶', 'Tim Maver', 'idk@gmail.com', 'cc4aac88339ceb4f5c7c8f690dc47b3d', '2013-11-21 05:58:51', 1, 1),
(9, 'dudemanwill', 'bd0ea117428388e84cfe8b9235bde47e45e7884aebda33f2970c303b9564f759', 'ìTÿ8ý¤N\Z}Ù  ëÿ-#&¦A»°Æ`&NêŸ', 'William Cespedes', 'dudemanwill@gmail.com', 'e4f78e872e02a10d4c49273eef634a2e', '2013-11-21 14:09:28', 1, 1),
(10, 'limestudios', '9f7e07c23fc02d98598318e6c14e390c5802b5a2dfa87826d8885bf750777983', ';ëCfG@-ÀQí–(Ð4™9\n¼ãs\Z¢¾‰œ|¥o×', 'Liam Craver', 'studios.lime@gmail.com', '9facaf01e4a5aa769d41f11543591539', '2013-11-22 23:12:10', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
