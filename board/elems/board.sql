-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 01 2021 г., 18:52
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
-- База данных: `board`
--

-- --------------------------------------------------------

--
-- Структура таблицы `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(2) NOT NULL,
  `name` varchar(16) NOT NULL,
  `announce` varchar(64) NOT NULL,
  `detail` text NOT NULL,
  `datead` datetime NOT NULL,
  `rubric_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `advertisement`
--

INSERT INTO `advertisement` (`id`, `name`, `announce`, `detail`, `datead`, `rubric_id`) VALUES
(1, 'Lisbon', 'Хотите автомобиль ?', 'Бла бла бла Бла бла бла Бла бла бла Бла бла бла Бла бла бла Бла бла бла Бла бла бла Бла бла бла Бла бла бла ', '2021-03-09 22:01:09', 1),
(2, 'Armen', 'Арбузы', 'Кому арбузы , дыни , персики ? Кому арбузы , дыни , персики ? Кому арбузы , дыни , персики ? Кому арбузы , дыни , персики ?', '2021-03-09 18:44:50', 2),
(3, 'Jeny', 'Тур по Бали', 'Только у нас самые выгодные и лучшие условия!  Только у нас самые выгодные и лучшие условия!  Только у нас самые выгодные и лучшие условия! ', '2021-03-09 22:11:36', 3),
(4, 'Lindsy', 'К морю', 'Турция, Гавайи', '2021-03-09 22:18:07', 3),
(5, 'Mary', 'affa', 'wetacgdfeftertvrea ', '2021-07-01 18:51:41', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `rubric`
--

CREATE TABLE `rubric` (
  `id` int(2) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rubric`
--

INSERT INTO `rubric` (`id`, `name`) VALUES
(1, 'Авто'),
(2, 'Питание'),
(3, 'Туризм'),
(4, 'Недвижимость');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rubric`
--
ALTER TABLE `rubric`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `rubric`
--
ALTER TABLE `rubric`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
