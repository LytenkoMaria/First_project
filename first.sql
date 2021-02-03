-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 03 2021 г., 11:29
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
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `country` varchar(30) DEFAULT NULL,
  `region` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `date` date NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `surname`, `country`, `region`, `city`, `phone`, `date`, `picture`) VALUES
(1, 'q', '$2y$10$qE25ZBAffO5kVilCo2pyNuKhi1.FylL5HtgiW2QnTa8Hsr5YZnpaa', 'q', 'q', 'q', 'q', 'q', 'q', '0000-00-00', 'cloud.jpg'),
(2, 'w', '$2y$10$kPT8svq2dW7zAoYX8LFbxud3dP81xQAvZhd/ACvTAXSfFEsGPYuU6', 'w', 'w', NULL, NULL, NULL, '+(380)544554545', '2021-02-25', 'cloud.jpg'),
(3, 'e', '$2y$10$w1xDYPv5umDY0.OS6DBczO6RnMo1RQZJg0y16PLPP34jIPZnh4Ow6', 'e', 'e', NULL, NULL, NULL, '+(380)544554545', '2021-02-27', 'cloud.jpg'),
(4, 'r@mail.com', '$2y$10$7xNMxuhk/LeSqSVosSTkau5UEfI0dzBtFR7CZ19Nje0mlDbDlY4se', 'r', 'r', NULL, NULL, NULL, '+(380)989979054', '2021-02-27', 'W:/domains/First/resources/images/usersImg/arecaceae-leaf-white-green-palm-leaves-material-green-leaf-png-clip-art.png'),
(5, 'q@gmail.com', '$2y$10$9P4h9QxrvjJ74HR8FEqdYew6xB4uP2suSIWmRXTn26U/n5d5asWGa', 'q', 'q', NULL, NULL, NULL, '+(380)989979054', '2021-02-25', 'W:/domains/First/resources/images/usersImg/list.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
