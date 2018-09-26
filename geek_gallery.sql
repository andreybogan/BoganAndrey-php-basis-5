-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 26 2018 г., 16:59
-- Версия сервера: 5.7.20
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `geek_gallery`
--
CREATE DATABASE IF NOT EXISTS `geek_gallery` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `geek_gallery`;

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id_img` tinyint(4) NOT NULL,
  `path` varchar(128) NOT NULL,
  `name` varchar(64) NOT NULL,
  `size` int(11) NOT NULL,
  `count` smallint(6) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id_img`, `path`, `name`, `size`, `count`) VALUES
(1, 'http://boganandrey-php-basis-5/images/big/8ca12b96d_000001f6.jpg', '8ca12b96d_000001f6.jpg', 109339, 0),
(2, 'http://boganandrey-php-basis-5/images/big/8ca12b96d_00000028.jpg', '8ca12b96d_00000028.jpg', 410576, 1),
(3, 'http://boganandrey-php-basis-5/images/big/8ca12b96d_00000035.jpg', '8ca12b96d_00000035.jpg', 505799, 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id_img`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id_img` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
