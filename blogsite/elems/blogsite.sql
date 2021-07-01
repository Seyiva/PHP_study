-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 01 2021 г., 18:48
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
-- База данных: `blogsite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `dateart` timestamp NOT NULL,
  `nameart` varchar(128) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `dateart`, `nameart`, `text`) VALUES
(1, '2021-01-09 06:16:18', 'Новая схема и проверка на профессионализм.', 'Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста '),
(2, '2021-01-09 09:39:21', 'Как часто вы играете в футбол?', 'Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста '),
(3, '2021-01-09 06:16:18', 'Новая схема и проверка на профессионализм.', 'Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста Много текста '),
(11, '2021-01-11 07:39:04', 'ggeagwefs', 'weafewewf'),
(12, '2021-01-11 07:41:41', 'Какое тут название', 'GSEgf wegagag wgeawg wg3wegwe geg'),
(13, '2021-01-11 07:42:33', 'argtret e', 'ratger'),
(14, '2021-01-11 09:17:38', 'Какое тут название', 'asfdsa fasfs aefs'),
(15, '2021-01-11 09:22:15', 'Какое тут название', 'asfdsa fasfs aefs'),
(16, '2021-01-11 09:22:23', 'afafsfeasfgaes g', 'wfea sgsefwe weef '),
(17, '2021-01-11 09:25:41', 'wte atera gdera r', 'weara gd r efdwew s'),
(18, '2021-01-11 09:32:05', 'wef', 'wef'),
(19, '2021-01-11 09:33:02', 'afafsfeasfgaes gaegs', 'aesfsed'),
(20, '2021-01-11 09:33:38', 'afafsfeasfgaes gaegswES', 'aesfsed'),
(21, '2021-01-11 09:33:45', 'AEWR', 'EARSFG'),
(22, '2021-01-11 09:35:27', 'wefs', 'wafregs'),
(23, '2021-01-11 09:36:08', 'earger 4aewts', 'aersf '),
(24, '2021-01-11 09:39:17', 'wEFAS ', 'WEFS ACGWEF Q'),
(25, '2021-01-11 09:40:11', 'aeg', 'ears wwersf '),
(26, '2021-01-11 09:40:57', 'earw aeg trh ', 'ager ');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `url` varchar(64) NOT NULL,
  `textforpage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `title`, `url`, `textforpage`) VALUES
(1, 'Home', '/', 'It\'s index.php file'),
(2, 'Blog', 'blog', 'It\'s blog.php file'),
(3, 'About', 'about', 'It\'s about.php file'),
(7, 'Page not found', '404', 'It\'s top content 404 page\'s');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
