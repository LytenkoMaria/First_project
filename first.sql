-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 01 2021 г., 21:08
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `first`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Surname` varchar(30) NOT NULL,
  `Country` varchar(30) DEFAULT NULL,
  `Region` varchar(30) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `Phone` varchar(15) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `Email`, `Password`, `Name`, `Surname`, `Country`, `Region`, `City`, `Phone`, `Date`) VALUES
(1, 'q', '$2y$10$qE25ZBAffO5kVilCo2pyNuKhi1.FylL5HtgiW2QnTa8Hsr5YZnpaa', 'q', 'q', 'q', 'q', 'q', 'q', '0000-00-00'),
(2, 'w', '$2y$10$kPT8svq2dW7zAoYX8LFbxud3dP81xQAvZhd/ACvTAXSfFEsGPYuU6', 'w', 'w', NULL, NULL, NULL, '+(380)544554545', '2021-02-25'),
(3, 'e', '$2y$10$w1xDYPv5umDY0.OS6DBczO6RnMo1RQZJg0y16PLPP34jIPZnh4Ow6', 'e', 'e', NULL, NULL, NULL, '+(380)544554545', '2021-02-27');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
