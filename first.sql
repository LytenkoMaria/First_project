-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 12 2021 г., 17:41
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
-- Структура таблицы `coments`
--

CREATE TABLE `coments` (
  `id` bigint(20) NOT NULL,
  `id_parent_coment` bigint(20) NOT NULL,
  `coment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `date_coment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `coments`
--

INSERT INTO `coments` (`id`, `id_parent_coment`, `coment`, `user_id`, `date_coment`) VALUES
(0, 0, NULL, NULL, '0000-00-00 00:00:00'),
(529, 0, 'hello', 29, '2021-12-02 17:31:08'),
(530, 0, 'Wow', 30, '2021-12-02 17:31:48'),
(531, 529, 'Cry', 30, '2021-12-02 17:32:00'),
(532, 0, 'Frozen!!!!!', 31, '2021-12-02 17:32:44'),
(533, 529, 'drop', 31, '2021-12-02 17:32:55'),
(534, 531, 'drible', 31, '2021-12-02 17:33:03'),
(535, 531, 'Errorsssss', 29, '2021-12-02 17:35:05'),
(536, 532, 'find', 29, '2021-12-02 17:35:14'),
(537, 534, 'fire', 29, '2021-12-02 17:35:21'),
(538, 530, 'pop', 29, '2021-12-02 17:35:28');

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
(29, 'q@gmail.com', '$2y$10$zaoN3iPAwbSgMlhMiCMXvOV/9/Bvs2bwxWO.9VlCd4wAG2L9djsN2', 'Quiter', 'q', NULL, NULL, NULL, '+(380)', '2021-02-14', './resources/images/usersImg/22.jpg'),
(30, 'r@mail.com', '$2y$10$FZDax6mdF5h6Qvzjky2T9em2ACS2WreVBNe63sd3u1uXjyPdtB/6.', 'Raisen', 'r', NULL, NULL, NULL, '+(380)', '2021-02-04', './resources/images/usersImg/cloud.jpg'),
(31, 's@gmail.com', '$2y$10$Mp.oHH0UPAVX3e2KoRfblu9GZIDwok/LFfd8DOdsoUDznRjYjlM7O', 'Sasha', 's', NULL, NULL, NULL, '+(380)', '2021-02-21', './resources/images/usersImg/mint.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `coments`
--
ALTER TABLE `coments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `id_parent_coment` (`id_parent_coment`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `coments`
--
ALTER TABLE `coments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=539;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `coments`
--
ALTER TABLE `coments`
  ADD CONSTRAINT `coments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `coments_ibfk_2` FOREIGN KEY (`id_parent_coment`) REFERENCES `coments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
