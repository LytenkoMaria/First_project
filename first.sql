-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 17 2021 г., 14:23
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
(647, 0, 'eeeeeee', 73, '2021-02-17 13:46:57'),
(648, 0, 'aaaaaaaaaaaa', 73, '2021-02-17 13:46:59'),
(649, 647, 'ffffffffffffffffff', 73, '2021-02-17 13:47:02'),
(650, 649, 'ddddddddddd', 73, '2021-02-17 13:47:07');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `token` char(40) DEFAULT NULL,
  `verified_at` datetime DEFAULT NULL,
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

INSERT INTO `users` (`id`, `email`, `password`, `token`, `verified_at`, `name`, `surname`, `country`, `region`, `city`, `phone`, `date`, `picture`) VALUES
(30, 'r@mail.com', '$2y$10$FZDax6mdF5h6Qvzjky2T9em2ACS2WreVBNe63sd3u1uXjyPdtB/6.', '1', NULL, 'Raisen', 'r', NULL, NULL, NULL, '+(380)', '2021-02-04', './resources/images/usersImg/cloud.jpg'),
(31, 's@gmail.com', '$2y$10$Mp.oHH0UPAVX3e2KoRfblu9GZIDwok/LFfd8DOdsoUDznRjYjlM7O', NULL, NULL, 'Sasha', 's', NULL, NULL, NULL, '+(380)', '2021-02-21', './resources/images/usersImg/mint.jpg'),
(32, 'jj@gmail', '$2y$10$RwPof0aVTCDAve8vWFJzIeLR7WiQgeQo/QhdVc.nm5XvoH8gQ7NMS', NULL, NULL, 'jf', 'jf', NULL, NULL, NULL, '+(380)', '2021-02-07', './resources/images/usersImg/fon.jpg'),
(33, 'k@gmail.com', '$2y$10$k2l.FTVEm/.hbdyt37jLc.TXcM4FB2MbAIeaUEqRO0/Uv8P3XfskW', NULL, NULL, 'kk', 'k', NULL, NULL, NULL, '+(380)', '2021-02-03', '/resources/images/Standart.png'),
(34, 'm@mail.com', '$2y$10$iTWjETYXhGlfRdPlhfo7DuwNV/4jAcFXmz3LaQMXbcBmjY4tPiSme', NULL, NULL, 'm', 'm', NULL, NULL, NULL, '+(380)m', '2021-02-11', '/resources/images/Standart.png'),
(35, 'n@mail.com', '$2y$10$X88jbYSxb6TuluLV4C18yuaBbwRfeM8dT3hc5Bmeo73GfMa/MZPGO', NULL, NULL, 'nn', 'nn', NULL, NULL, NULL, '+(380)', '2021-02-13', './resources/images/usersImg/trees.png'),
(36, 'b@gmail.com', '$2y$10$fjN0oWngE2JRhh6jsCTXq.xYwNbv28F1bNLN47HehcQURwq12WmWS', NULL, NULL, 'b', 'b', NULL, NULL, NULL, '+(380)989979054', '2021-02-04', '/resources/images/Standart.png'),
(37, 'z@mail.com', '$2y$10$JbZujw2os5D0NBcLtR.gHew0H.z2Hpkg1fBWE2vvZEKhNUO2yBlZ.', 'f42b5b253c90bc6033ef1f43af42b0896e0f4472', '2021-02-17 17:38:46', 'z', 'z', NULL, NULL, NULL, '+(380)755454545', '2021-02-07', '/resources/images/Standart.png'),
(38, 'zz@mail.com', '$2y$10$dauqtt2PLx9inCfIgCnvces057ha5g1W5L3Dhq5xmH59wpVgn1Phe', '0b7ebca64d9b206b4bc3450796eac7ce4adae340', NULL, 'z', 'z', NULL, NULL, NULL, '+(380)544554545', '2021-02-04', '/resources/images/Standart.png'),
(72, 'q@gmail.com', '$2y$10$ivnNf2eXCSHHpKhcg71NCeVMIlw2nSmDMRLHGOqZejnwd5BEAgGKO', '4bf8e65f56e77b9d18a8c72b2305e99ef3abfb63', NULL, 'q', 'q', NULL, NULL, NULL, '+(380)9899790', '2021-02-18', '/resources/images/Standart.png'),
(73, 'workproject3006@gmail.com', '$2y$10$whV8KgkvuXo17YgujgFAAuWpIwNX1mp1adhtfyY6Y8Mf4KBhauT7a', '1', '2021-02-17 13:44:25', 'Wor', 'w', NULL, NULL, NULL, '+(380)', '2021-02-25', './resources/images/usersImg/22.jpg'),
(74, 'u@gmail.com', '$2y$10$QyyLLtAgs35CwX1XngKDx.2rkoNZjl1bhmZU04lyNNGFIZ89nUnB.', '5efc6c8631ff8ab248e99df499cee8781eec9982', NULL, 'u', 'u', NULL, NULL, NULL, '+(380)544554545', '2021-02-25', '/resources/images/Standart.png');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=651;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

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
