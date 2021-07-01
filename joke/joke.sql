-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 01 2021 г., 19:35
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
-- База данных: `joke`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(2) NOT NULL,
  `login` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `login`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(2) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Социальные'),
(2, 'Международные'),
(3, 'Научные');

-- --------------------------------------------------------

--
-- Структура таблицы `jokes`
--

CREATE TABLE `jokes` (
  `id` int(4) NOT NULL,
  `name` varchar(16) NOT NULL,
  `joke` text NOT NULL,
  `status` int(2) NOT NULL,
  `datenote` timestamp NOT NULL,
  `category_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `jokes`
--

INSERT INTO `jokes` (`id`, `name`, `joke`, `status`, `datenote`, `category_id`) VALUES
(1, 'Baby', 'В Германии дизайнерам, фрилансерам и творческим людям во время карантина делают выплаты по 5000 евро. Потому что в Германии очень хорошо знают, что будет, если расстроенный художник поменяет профессию.\r\n', 1, '2021-02-26 21:10:11', 1),
(2, 'Girl', 'В торговом зале прохаживались две женшины и два ребенка. Мать двух пацанов и ее сестра. Старшему - лет пятнадцать, младшему лет шесть. Мирно так гуляли, пока случайно старшего не задел проходящий мимо мужик. Он же не знал, что аутистов трогать нельзя! И началось! Парень орал как', 1, '2021-02-28 06:10:08', 3),
(3, 'Boy', 'Сопоставляя исторический опыт экономического развития Японии и России, можно прийти к парадоксальному выводу, что полезные ископаемые не так уж и полезны.\r\nНу, по крайней мере, далеко не всем.', 1, '2021-02-14 23:08:06', 3),
(4, 'Frau', 'Обратился в медучреждение за справкой об оказанной платной услуге.\r\nОбъясняю в регистратуре (на ресепшене?):\r\n- Я ваш клиент. Мне нужна справка.\r\nДевушка пытается меня поправить:\r\n- Не клиент, а пациент.\r\n- Ну, нет, говорю. Раз через кассу меня пропустили, я автоматически превратился в клиента, поэтому справку не прошу, а требую.\r\nУлыбается…', 1, '2021-02-28 06:18:00', 1),
(5, 'Franchesko', '- Анжелочка, что будете - чай, кофе, вино?\r\n- Ах, Николай, давайте без прелюдий, я к вам уже возбуждённая пришла...', 1, '2021-02-28 10:11:11', 1),
(6, 'Jayson', '1. “Вам рыбу или удочку?” — спросила бортпроводница. 2. Сосед только сегодня вернулся домой после празднования Нового года, сказал жене, что его напугали петарды. 3. Чтобы заснуть вечером после трудового дня, нужно полчаса-час, а утром после будильника – одна минута. 4. А вы пользуетесь какими-нибудь средствами контрацепции, кроме своего характера? 5. Парень с девушкой приходят […]', 1, '2021-03-03 10:50:41', 1),
(8, 'Niky', '1. К счастью, любое несчастье кончается. К несчастью, со счастьем та же фигня. 2. Хотел утопить свои проблемы в алкоголе. Плавают … 3. – Когда сильно тяжело, нужно сжать зубы в кулак! – От таких слов волосы стынут в жилах. 4. – Давай, Сережа, ты больше в компьютер свой не будешь играть? – Легко! Даже […]', 0, '2021-03-03 10:54:44', 2),
(9, 'Freddy', 'Мужик разглядывает 5-тысячную купюру на просвет, не фальшивая ли ?\r\nПоявляется ГАИшник.\r\n-Вы не на машине ?\r\n-Нет.\r\n- Жаль.\r\n\r\n/', 0, '2021-03-04 12:26:15', 1),
(10, 'Lindsy', 'Go adfmam mfasl;km a asm ;lkam alksm lkfmsladgn lmwefmjwslm  ', 0, '2021-06-28 09:33:38', 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `jokes`
--
ALTER TABLE `jokes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `jokes`
--
ALTER TABLE `jokes`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
