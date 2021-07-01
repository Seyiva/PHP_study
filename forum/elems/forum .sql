-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 01 2021 г., 19:03
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
-- База данных: `forum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(4) NOT NULL,
  `datemessage` datetime NOT NULL,
  `message` text NOT NULL,
  `theme_id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `datemessage`, `message`, `theme_id`, `user_id`) VALUES
(1, '2021-03-20 19:50:08', 'How do you meet ?', 1, 4),
(2, '2021-03-20 20:39:44', 'This is good serial...', 1, 2),
(3, '2021-03-21 10:06:10', 'It\'s cool sound..', 3, 5),
(4, '2021-03-21 10:43:26', 'Save my secret ', 1, 5),
(5, '2021-03-21 10:47:39', 'I think this question will remain without answer..', 4, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `statuses`
--

CREATE TABLE `statuses` (
  `id` int(2) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'user'),
(2, 'moderator'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `themes`
--

CREATE TABLE `themes` (
  `id` int(4) NOT NULL,
  `theme` varchar(64) NOT NULL,
  `note` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `datenote` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `themes`
--

INSERT INTO `themes` (`id`, `theme`, `note`, `user_id`, `datenote`) VALUES
(1, 'How I meet your mother ?', 'sdfzzfd qwefsfda ', 6, '2021-03-17 19:27:33'),
(3, 'When will we be together ? ', 'We will be together oee..', 2, '2021-03-19 13:23:22'),
(4, 'Why people are meeting ?', 'When i was young...', 2, '2021-03-20 09:26:08'),
(5, 'When have we will be  ?', 'What is happen...', 2, '2021-03-20 09:30:22');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(64) NOT NULL,
  `name` varchar(32) NOT NULL,
  `surname` varchar(32) NOT NULL,
  `registration_date` date NOT NULL,
  `banned` int(2) NOT NULL,
  `status_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `birth_date`, `email`, `name`, `surname`, `registration_date`, `banned`, `status_id`) VALUES
(1, 'user12', '$2y$10$.1XBpIGcUfE25wtVtR0.juZkcnJhZUB8s8Ya4gspyQh65OL.AxYHK', '1999-05-04', 'one@example.com', 'Mary', 'Olsen', '2021-03-15', 0, 3),
(2, 'user11', '$2y$10$w9VJfL092EJMgkZM1Vscw.N8fyfoZNH8t3F2vfB.QBg7Tz.9uPVbi', '1985-02-14', 'second@example.com', 'Lindsy', 'Willson', '2021-03-15', 0, 1),
(3, 'user13', '$2y$10$DpuGa/Q7qCPrYGYl8HabTeBPY.vTY1xCsHQwfSpPzbwu0kvIhMVa.', '1990-01-14', 'fifty@example.com', 'Nora', 'Jackson', '2021-03-15', 0, 2),
(4, 'user14', '$2y$10$3ltw4BcEZoBoeHnJUomwo.fcfUv7hd5C3ZEfrGujFrhVt./7d98U2', '1997-01-14', 'three@example.com', 'Harry', 'Jackson', '2021-03-15', 0, 1),
(5, 'user15', '$2y$10$5CZwh8bh7x27itXcsjCvTerb0LaUW/5a8bBdtjECMYpv5sCGpYJnq', '1998-07-16', 'second@example.com', 'Reymond', 'Clubia', '2021-03-15', 0, 1),
(6, 'user16', '$2y$10$rLInexkOBQWGCFKTP6oHouVQut/4XFEfGpLz7Kz0vAn8ZFiT4zz9S', '2001-04-16', 'fifty@example.com', 'Jango', 'Freedom', '2021-03-17', 0, 1),
(7, 'user17', '$2y$10$ieJ.zlhj1TfRdB32sl4D8uh24y7CQ/U24B5a7yuX0blKu3CUSgfIC', '2000-09-20', 'second@example.com', 'Rick', 'Oldren', '2021-03-21', 0, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
