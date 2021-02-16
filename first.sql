-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 16 2021 г., 13:28
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
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) NOT NULL,
  `id_parent_comments` bigint(20) NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `date_comments` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `id_parent_comments`, `comments`, `user_id`, `date_comments`) VALUES
(0, 0, NULL, NULL, '0000-00-00 00:00:00'),
(625, 0, 'Hello!', 29, '2021-02-16 13:22:19'),
(626, 0, 'Red hunt', 29, '2021-02-16 13:22:37'),
(627, 0, 'Follow butterfly', 29, '2021-02-16 13:23:07'),
(628, 625, 'go', 30, '2021-02-16 13:25:51'),
(629, 626, 'sun', 31, '2021-02-16 13:26:35'),
(630, 626, 'fly', 31, '2021-02-16 13:26:48');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
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
(29, 'workproject3006@gmail.com', '$2y$10$zaoN3iPAwbSgMlhMiCMXvOV/9/Bvs2bwxWO.9VlCd4wAG2L9djsN2', 'Quiter', 'q', NULL, NULL, NULL, '+(380)', '2021-02-14', './resources/images/usersImg/22.jpg'),
(30, 'r@mail.com', '$2y$10$FZDax6mdF5h6Qvzjky2T9em2ACS2WreVBNe63sd3u1uXjyPdtB/6.', 'Raisen', 'r', NULL, NULL, NULL, '+(380)', '2021-02-04', './resources/images/usersImg/cloud.jpg'),
(31, 's@gmail.com', '$2y$10$Mp.oHH0UPAVX3e2KoRfblu9GZIDwok/LFfd8DOdsoUDznRjYjlM7O', 'Sasha', 's', NULL, NULL, NULL, '+(380)', '2021-02-21', './resources/images/usersImg/mint.jpg'),
(32, 'jj@gmail', '$2y$10$RwPof0aVTCDAve8vWFJzIeLR7WiQgeQo/QhdVc.nm5XvoH8gQ7NMS', 'jf', 'jf', NULL, NULL, NULL, '+(380)', '2021-02-07', './resources/images/usersImg/fon.jpg'),
(33, 'k@gmail.com', '$2y$10$k2l.FTVEm/.hbdyt37jLc.TXcM4FB2MbAIeaUEqRO0/Uv8P3XfskW', 'kk', 'k', NULL, NULL, NULL, '+(380)', '2021-02-03', '/resources/images/Standart.png'),
(34, 'm@mail.com', '$2y$10$iTWjETYXhGlfRdPlhfo7DuwNV/4jAcFXmz3LaQMXbcBmjY4tPiSme', 'm', 'm', NULL, NULL, NULL, '+(380)m', '2021-02-11', '/resources/images/Standart.png'),
(35, 'n@mail.com', '$2y$10$X88jbYSxb6TuluLV4C18yuaBbwRfeM8dT3hc5Bmeo73GfMa/MZPGO', 'nn', 'nn', NULL, NULL, NULL, '+(380)', '2021-02-13', './resources/images/usersImg/trees.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_parent_coment` (`id_parent_comments`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=631;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_parent_comments`) REFERENCES `comments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
