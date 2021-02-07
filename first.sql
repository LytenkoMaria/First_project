-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 07 2021 г., 14:13
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
  `coment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `date_coment` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `coments`
--

INSERT INTO `coments` (`id`, `id_parent_coment`, `coment`, `user_id`, `date_coment`) VALUES
(20, 4, 'Grows', 4, '0000-00-00 00:00:00'),
(21, 4, 'Send', 4, '0000-00-00 00:00:00'),
(22, 6, 'Join', 6, '0000-00-00 00:00:00'),
(23, 6, 'Flour', 6, '0000-00-00 00:00:00'),
(43, 8, 'Goodness', 8, '0000-00-00 00:00:00'),
(44, 8, 'aa', 8, '0000-00-00 00:00:00'),
(45, 8, 'q', 8, '0000-00-00 00:00:00'),
(46, 8, 'ss', 8, '2021-05-02 18:12:11'),
(47, 8, 'd', 8, '2021-05-02 18:15:43'),
(48, 5, 'Lol', 5, '2021-07-02 14:12:53');

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
(4, 'r@mail.com', '$2y$10$7xNMxuhk/LeSqSVosSTkau5UEfI0dzBtFR7CZ19Nje0mlDbDlY4se', 'Vika', 'r', NULL, NULL, NULL, '+(380)', '2021-02-27', './resources/images/usersImg/trees.png'),
(5, 'q@gmail.com', '$2y$10$9P4h9QxrvjJ74HR8FEqdYew6xB4uP2suSIWmRXTn26U/n5d5asWGa', 'Petro', 'q', NULL, NULL, NULL, '+(380)', '2021-02-25', './resources/images/usersImg/mint.jpg'),
(6, 's@gmail.com', '$2y$10$6nRwx6c.t3Rqxy8wOXD5H.IGqPds7qJr1IVV8xuVH9U5os/1o7rFS', 'Saha', 's', NULL, NULL, NULL, '+(380)', '2021-02-17', './resources/images/usersImg/22.jpg'),
(7, 'e@gmail.com', '$2y$10$AbtCeeoqBnnTbn/jsbTNqOY/waBc8A3wV1u3CgTItiRD7zif8wo5i', 'e', 'e', NULL, NULL, NULL, '+(380)', '2021-02-18', './resources/images/usersImg/mint.jpg'),
(8, 'g@mail.com', '$2y$10$OkLohRYa7rMzUQkwyGRoauqoruUuZ5R26aSNHZbOwv789foiy4yha', 'Gregori', 'g', NULL, NULL, NULL, '+(380)', '2021-02-26', './resources/images/usersImg/cloud.jpg'),
(9, 'sds@gmail.com', '$2y$10$rKG3kT.Eov/mccfp.ifCweSNYj2XrmMv6qKuaVCxP.x8ZK4a9zdP2', 'sds', 'sds', NULL, NULL, NULL, '+(380)', '2021-02-26', './resources/images/usersImg/22.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `coments`
--
ALTER TABLE `coments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `coments`
--
ALTER TABLE `coments`
  ADD CONSTRAINT `coments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
