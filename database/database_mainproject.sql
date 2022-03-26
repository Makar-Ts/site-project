-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 26 2022 г., 22:33
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

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

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `img` varchar(512) NOT NULL,
  `name` varchar(512) NOT NULL,
  `author` varchar(256) NOT NULL,
  `rate` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`ID`, `img`, `name`, `author`, `rate`) VALUES
(1, 'https://i1.mybook.io/p/x378/book_covers/7e/52/7e52faa2-b57c-48f9-81ed-be051b483b6a.jpg', 'Вот оно, счастье', 'Найлл Уильямз', 4),
(2, 'https://i3.mybook.io/p/x378/book_covers/27/64/2764b5c0-80e6-44dc-b52e-79688853d107.jpg', 'Экономика. Для тех, кто про нее не может слышать', 'Сергей Нечаев', 5),
(3, 'https://i2.mybook.io/p/x378/book_covers/a5/c3/a5c36ad8-b336-41e4-89a6-d606327a0426.jpg', 'Я, редактор. Настольная книга для всех, кто работает в медиа', 'Николай Кононов', 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
