-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 01 2021 г., 19:41
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
-- База данных: `store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `baskets`
--

CREATE TABLE `baskets` (
  `id` int(4) NOT NULL,
  `user_id` int(2) NOT NULL,
  `product_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `baskets`
--

INSERT INTO `baskets` (`id`, `user_id`, `product_id`) VALUES
(1, 4, 2),
(2, 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(2) NOT NULL,
  `name` varchar(32) NOT NULL,
  `category_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `category_id`) VALUES
(1, 'smartphones', 7),
(2, 'laptops', 7),
(3, 'motorcycles', 8),
(4, 'cars', 8),
(5, 'sneakers', 9),
(6, 't-shirts', 10),
(7, 'digital technology', 0),
(8, 'transport', 0),
(9, 'footwear', 0),
(10, 'clothes', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(2) NOT NULL,
  `name` varchar(32) NOT NULL,
  `price` int(8) NOT NULL,
  `quantity` int(4) NOT NULL,
  `category_id` int(2) NOT NULL,
  `path` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `quantity`, `category_id`, `path`) VALUES
(1, 'laptop', 700, 10, 2, 'images/laptop.jpg'),
(2, 'iphone', 300, 9, 1, 'images/iphone.jpg'),
(3, 'morando', 2500, 4, 3, 'images/morando_moto.jpg'),
(4, 'bm', 2400, 5, 3, 'images/bm_moto.jpg'),
(5, 'mark2', 3000, 8, 4, 'images/mark2.jpg'),
(6, 'sport-sneakers', 120, 20, 5, 'images/sport-sneakers.jpg'),
(7, 'white-tshirt', 90, 15, 6, 'images/white-tshirt.jpg'),
(8, 'amd_intel_cards', 550, 10, 2, 'images/amd.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `purchases`
--

CREATE TABLE `purchases` (
  `id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `date_purchase` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `purchases`
--

INSERT INTO `purchases` (`id`, `user_id`, `product_id`, `date_purchase`) VALUES
(1, 1, 5, '2021-03-24'),
(2, 3, 4, '2021-02-10'),
(3, 3, 2, '2021-02-15');

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
  `name` varchar(16) NOT NULL,
  `surname` varchar(16) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(256) NOT NULL,
  `registration_date` date NOT NULL,
  `status_id` int(2) NOT NULL,
  `banned` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `registration_date`, `status_id`, `banned`) VALUES
(1, 'Alexandra', 'Clubia', 'alexa@example.com', '$2y$10$FKKLM0cow395NtNKJ7gJp.47oR/PCuy.Wyva1n8lzyC9qrWRp5s3e', '2021-03-21', 1, 0),
(2, 'Lary', 'King', 'lary@example.com', '$2y$10$ZRTBizNf69wEOJV22m5jnu92KF0dWPP1R06r5YnQi.mt5E/kPK0mO', '2021-03-22', 1, 0),
(3, 'Ted', 'Mosby', 'ted@example.com', '$2y$10$FrpvNZaHG1x31eFYyVjxYOshmd5n.o7Ym603TfLkVwTtPuKECkR5m', '2021-03-22', 1, 0),
(4, 'Robin', 'Olsen', 'robin@example.com', '$2y$10$xcgjdMaUr/EVdwbdKqecJuKELi5OI1KeiBNdQMDEgr3trqdQCT9CO', '2021-03-22', 1, 0),
(5, 'Judy', 'Jackson', 'judy@example.com', '$2y$10$wvhtJFlcQvzsLExUsEufg.PC3EtdUyGLoOIcOThW77XdrGsdc5xLK', '2021-03-22', 2, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `purchases`
--
ALTER TABLE `purchases`
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
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
