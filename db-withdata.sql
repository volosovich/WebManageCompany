-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Май 18 2016 г., 23:27
-- Версия сервера: 5.5.46-0ubuntu0.14.04.2
-- Версия PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `ettadb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cash` int(11) NOT NULL,
  `allcash` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61 ;

--
-- Дамп данных таблицы `company`
--

INSERT INTO `company` (`id`, `parent_id`, `name`, `cash`, `allcash`) VALUES
(1, 0, 'Microsoft', 100, 181),
(2, 0, 'Google', 10, 40),
(3, 0, 'Apple', 10, 20),
(4, 1, 'X-box', 10, 41),
(5, 1, 'Azure msft', 10, 20),
(6, 4, 'Stick xbox msft', 10, 21),
(7, 2, 'Boston GOOG', 10, 20),
(8, 2, 'Android GOOG', 10, 10),
(9, 3, 'Beats AAPL', 10, 10),
(36, 0, 'amazon', 111, 222),
(37, 36, 'books', 111, 111),
(50, 0, 'Free', 10, 50),
(51, 50, 'free 2', 10, 40),
(52, 51, 'free 3', 10, 30),
(53, 7, 'robot', 10, 10),
(54, 6, 'Button stick x-box msft', 11, 11),
(55, 5, 'vps azure msft', 10, 10),
(56, 60, 'bing msft', 10, 10),
(57, 4, 'Charge X-box MSFT', 10, 10),
(58, 52, 'free 4', 10, 20),
(59, 58, 'free 5', 10, 10),
(60, 1, 'windows MSFT', 10, 20);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `hash`) VALUES
(2, 'test', '$2y$10$Q7vSbRISvVqyrIOdWja0x.Jj2U0chq1A7fzTangHFTBYKXrd7P8mK');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
