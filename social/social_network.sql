-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 01 2021 г., 19:37
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `social_network`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(4) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(4) NOT NULL,
  `datecomment` datetime NOT NULL,
  `wall_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `conversation`
--

CREATE TABLE `conversation` (
  `id` int(4) NOT NULL,
  `first` int(2) NOT NULL,
  `second` int(2) NOT NULL,
  `last_message_id` int(2) NOT NULL,
  `sender` int(2) NOT NULL,
  `first_delete` int(2) NOT NULL,
  `second_delete` int(2) NOT NULL,
  `unread` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int(2) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Russia'),
(2, 'Ukraina '),
(3, 'Belarus'),
(4, 'Canada'),
(5, 'Germany'),
(6, 'Italy'),
(7, 'America'),
(8, 'France');

-- --------------------------------------------------------

--
-- Структура таблицы `friends`
--

CREATE TABLE `friends` (
  `id` int(4) NOT NULL,
  `user1_id` int(2) NOT NULL,
  `user2_id` int(2) NOT NULL,
  `relations_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `friends`
--

INSERT INTO `friends` (`id`, `user1_id`, `user2_id`, `relations_id`) VALUES
(1, 4, 2, 2),
(2, 3, 1, 2),
(3, 4, 1, 2),
(4, 5, 7, 2),
(5, 5, 2, 3),
(6, 5, 4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `addressee_id` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `dt_message` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `addressee_id`, `message`, `dt_message`) VALUES
(1, 5, 7, 'Привет , смотрел новый фильм?', '2021-04-04 16:20:26'),
(2, 7, 5, 'Привет, какой именно?', '2021-04-05 19:29:19'),
(3, 5, 8, 'Пойдем ?', '2021-04-05 19:33:07'),
(4, 5, 8, 'Куда? ', '2021-04-05 19:46:09'),
(5, 5, 7, 'Однажды в Голливуде', '2021-04-04 20:23:13');

-- --------------------------------------------------------

--
-- Структура таблицы `relations`
--

CREATE TABLE `relations` (
  `id` int(2) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `relations`
--

INSERT INTO `relations` (`id`, `name`) VALUES
(1, 'not_friends'),
(2, 'friends'),
(3, 'request_sent'),
(4, 'rejected'),
(5, 'awaiting_confirmation');

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int(2) NOT NULL,
  `name` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `name` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `birth_date` date NOT NULL,
  `registration_date` date NOT NULL,
  `status_id` int(2) NOT NULL,
  `banned` int(2) NOT NULL,
  `country_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `birth_date`, `registration_date`, `status_id`, `banned`, `country_id`) VALUES
(1, 'Rona', 'Collins', 'rona@example.com', '$2y$10$.YpekcL4GJN4.jzSqwsNpuvIAuN0mKfK2iG3pnVUAE3QCjras/YC.', '2000-06-20', '2021-03-28', 1, 0, 7),
(2, 'Robin', 'Olsen', 'robin@example.com', '$2y$10$u4Vgf8qvnJPrKTodiB2YAenygmlESNLG6gcVPmSzIPdDg1U4DEbsq', '2005-08-03', '2021-03-28', 1, 0, 4),
(3, 'Ted', 'Jackson', 'tedy@example.com', '$2y$10$7nfIlM/hJn0ZaxvZErTHZuBDd/M.Za/BvKu880PNimWslVuTmJ/PO', '2000-09-04', '2021-03-28', 1, 0, 7),
(4, 'Mary', 'Willson', 'mary@example.com', '$2y$10$AgCr/Qd.Nkj6.hsjEgvtkei.Hhn0s7ydvnqHchneHSUDM.PaRckRi', '2010-08-03', '2021-03-28', 1, 0, 8),
(5, 'Alexandra', 'Clubia', 'alexa@example.com', '$2y$10$fGvOpqpbpsLNp19EoshlLeyu3FimiEpZ4BuwqUMovnhMsyO0b5RD6', '2000-09-04', '2021-03-29', 1, 0, 6),
(6, 'Dmitro', 'Palmer', 'mitro@example.ua', '$2y$10$Z6aC7A9tWKPHo2rVoLv.UO0.x8wd1MvgJd21a/ezRL9smb.Gaqwju', '1990-12-08', '2021-03-29', 1, 0, 2),
(7, 'Sergio ', 'Crazy', 'serg@example.com', '$2y$10$5cN1XY7NeNd2lFGzy1h3Wu/zrqQHkQvqc5GktAffikB5E2o6t2d8q', '1994-01-25', '2021-03-29', 1, 0, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `walls`
--

CREATE TABLE `walls` (
  `id` int(2) NOT NULL,
  `note` text NOT NULL,
  `author_id` int(2) NOT NULL,
  `datenote` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `walls`
--
ALTER TABLE `walls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `friends`
--
ALTER TABLE `friends`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `relations`
--
ALTER TABLE `relations`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `walls`
--
ALTER TABLE `walls`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
