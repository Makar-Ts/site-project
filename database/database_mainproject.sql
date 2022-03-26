-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Мар 26 2022 г., 12:33
-- Версия сервера: 5.7.34
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `database_mainproject`
--
CREATE DATABASE IF NOT EXISTS `database_mainproject` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `database_mainproject`;

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `ID` int(255) NOT NULL AUTO_INCREMENT,
  `img` varchar(512) NOT NULL,
  `name` varchar(512) NOT NULL,
  `author` varchar(256) NOT NULL,
  `rate` int(16) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Очистить таблицу перед добавлением данных `books`
--

TRUNCATE TABLE `books`;
--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`ID`, `img`, `name`, `author`, `rate`) VALUES
(1, 'https://i1.mybook.io/p/x378/book_covers/7e/52/7e52faa2-b57c-48f9-81ed-be051b483b6a.jpg', 'Вот оно, счастье', 'Найлл Уильямз', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
