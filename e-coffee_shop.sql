-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Φιλοξενητής: localhost
-- Χρόνος δημιουργίας: 31 Δεκ 2013 στις 09:42:38
-- Έκδοση διακομιστή: 5.6.12-log
-- Έκδοση PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `e-coffee shop`
--
CREATE DATABASE IF NOT EXISTS `e-coffee shop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `e-coffee shop`;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varbinary(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Άδειασμα δεδομένων του πίνακα `customers`
--

INSERT INTO `customers` (`id`, `name`, `surname`, `username`, `password`) VALUES
(8, 'Ago', 'Ago', 'check', '}=sS*��o�b');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `history_table`
--

CREATE TABLE IF NOT EXISTS `history_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shop_id` varchar(200) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `product_category` varchar(200) NOT NULL,
  `product_info` varchar(200) NOT NULL,
  `product_price` double NOT NULL,
  `user_name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `price` double NOT NULL,
  `description` text,
  `category` varchar(20) NOT NULL,
  `inShop` varchar(20) NOT NULL,
  `orders` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Άδειασμα δεδομένων του πίνακα `items`
--

INSERT INTO `items` (`name`, `price`, `description`, `category`, `inShop`, `orders`) VALUES
('french coffee', 6.5, 'the best coffee (at least for the French)', 'Hot beverages', 'Adsa', 1),
('greek coffee', 3.5, 'the best greek product (except feta and maybe mousaka)', 'Hot beverages', 'Adsa', 3),
('Hydrochloric acid', 12, 'guaranteed to melt your brain', 'Spirits', 'Adsa', 10);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `shop_owners`
--

CREATE TABLE IF NOT EXISTS `shop_owners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varbinary(200) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `shop_name` varchar(25) NOT NULL,
  `shop_address` varchar(20) NOT NULL,
  `phone_number_fax` int(11) NOT NULL,
  `shop_description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--

-- ����: `e-coffee shop`

--
 
CREATE TABLE IF NOT EXISTS `pending_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `shop_name` varchar(200) NOT NULL,
  `item` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `rway` varchar(200) NOT NULL,
  `pway` varchar(200) NOT NULL,
  `details` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;


--
-- Άδειασμα δεδομένων του πίνακα `shop_owners`
--

INSERT INTO `shop_owners` (`id`, `name`, `surname`, `username`, `password`, `e_mail`, `shop_name`, `shop_address`, `phone_number_fax`, `shop_description`) VALUES
(7, 'Ago', 'Ago', 'check', '}=sS*��o�b', 'ago@ago.gr', 'Adsa', 'dasda', 1234567890, 'dgsdgfssdfgsdfg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
