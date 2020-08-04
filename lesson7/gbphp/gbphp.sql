-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Авг 04 2020 г., 12:19
-- Версия сервера: 5.7.26
-- Версия PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `gbphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `items` json NOT NULL,
  `status` enum('заказан','оплачен','доставлен','') NOT NULL DEFAULT 'заказан'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `items`, `status`) VALUES
(1, 1, '{\"21\": {\"id\": 21, \"qty\": 2, \"info\": \"123\", \"name\": \"123\", \"price\": \"123\"}}', 'доставлен'),
(2, 1, '{\"21\": {\"id\": 21, \"qty\": 2, \"info\": \"123\", \"name\": \"123\", \"price\": \"123\"}}', 'оплачен'),
(3, 1, '{\"21\": {\"id\": 21, \"qty\": 2, \"info\": \"123\", \"name\": \"123\", \"price\": \"123\"}}', 'заказан'),
(4, 1, '{\"21\": {\"id\": 21, \"qty\": 1, \"info\": \"123\", \"name\": \"123\", \"price\": \"123\"}, \"22\": {\"id\": 22, \"qty\": 1, \"info\": \"123\", \"name\": \"john\", \"price\": \"555\"}, \"23\": {\"id\": 23, \"qty\": 3, \"info\": \"товар\", \"name\": \"товар\", \"price\": \"100\"}, \"24\": {\"id\": 24, \"qty\": 2, \"info\": \"товар2\", \"name\": \"товар2\", \"price\": \"1\"}}', 'оплачен'),
(5, 1, '{\"21\": {\"id\": 21, \"qty\": 1, \"info\": \"123321\", \"name\": \"123wq\", \"price\": \"123123\"}, \"22\": {\"id\": 22, \"qty\": 3, \"info\": \"123\", \"name\": \"john\", \"price\": \"555\"}, \"23\": {\"id\": 23, \"qty\": 6, \"info\": \"товар\", \"name\": \"товар\", \"price\": \"100\"}, \"25\": {\"id\": 25, \"qty\": 1, \"info\": \"товар3\", \"name\": \"товар3\", \"price\": \"1009\"}, \"29\": {\"id\": 29, \"qty\": 3, \"info\": \"товар7\", \"name\": \"товар7\", \"price\": \"343\"}, \"42\": {\"id\": 42, \"qty\": 1, \"info\": \"info\", \"name\": \"123wq\", \"price\": \"123\"}}', 'заказан'),
(6, 1, 'null', 'заказан'),
(7, 1, '{\"21\": {\"id\": \"21\", \"qty\": 1, \"info\": \"123321\", \"name\": \"123wq\", \"price\": \"123123\"}}', 'заказан'),
(8, 1, '{\"21\": {\"id\": \"21\", \"qty\": 1, \"info\": \"123321\", \"name\": \"123wq\", \"price\": \"123123\"}}', 'заказан'),
(9, 1, '{\"21\": {\"id\": \"21\", \"qty\": 1, \"info\": \"123321\", \"name\": \"123wq\", \"price\": \"123123\"}}', 'заказан'),
(10, 1, '{\"22\": {\"id\": \"22\", \"qty\": 1, \"info\": \"123\", \"name\": \"john\", \"price\": \"555\"}}', 'заказан'),
(11, 1, '{\"21\": {\"id\": \"21\", \"qty\": 10, \"info\": \"123321\", \"name\": \"123wq\", \"price\": \"123123\"}, \"26\": {\"id\": \"26\", \"qty\": 1, \"info\": \"товар4\", \"name\": \"товар4\", \"price\": \"989\"}, \"27\": {\"id\": \"27\", \"qty\": 10, \"info\": \"товар5\", \"name\": \"товар5\", \"price\": \"889\"}}', 'заказан'),
(12, 1, '{\"21\": {\"id\": \"21\", \"qty\": 1, \"info\": \"123321\", \"name\": \"123wq\", \"price\": \"123123\"}}', 'заказан'),
(13, 1, '{\"22\": {\"id\": \"22\", \"qty\": 1, \"info\": \"123\", \"name\": \"john\", \"price\": \"555\"}}', 'заказан'),
(14, 1, '[]', 'заказан'),
(15, 1, '{\"21\": {\"id\": \"21\", \"qty\": 3, \"info\": \"123321\", \"name\": \"123wq\", \"price\": \"123123\"}}', 'заказан'),
(16, 16, '[]', 'заказан'),
(17, 16, '{\"23\": {\"id\": \"23\", \"qty\": 3, \"info\": \"товар\", \"name\": \"товар\", \"price\": \"100\"}}', 'заказан'),
(18, 17, '{\"23\": {\"id\": \"23\", \"qty\": 3, \"info\": \"товар\", \"name\": \"товар\", \"price\": \"100\"}}', 'заказан'),
(19, 1, '{\"21\": {\"id\": 21, \"qty\": 2, \"info\": \"123\", \"name\": \"123\", \"price\": \"123\"}}', 'доставлен'),
(20, 20, '{\"21\": {\"id\": \"21\", \"qty\": 1, \"info\": \"rty3234\", \"name\": \"123wq\", \"price\": \"123123\"}}', 'заказан');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `goods_id` int(10) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `goods_id`, `comment`) VALUES
(1, 0, 'sdsdfsadf'),
(2, 3, 'sdsdfsadf'),
(3, 3, 'sdfsdf'),
(4, 1, 'sdfsdf'),
(5, 1, 'sdfsdf'),
(6, 1, 'sdfsdf'),
(7, 1, 'sdfsdf'),
(8, 1, 'sdfsdf'),
(9, 1, 'sdcsd'),
(10, 1, 'sdcsd'),
(11, 1, 'dfdfg'),
(12, 1, 'xvcvxc'),
(13, 1, 'xvcvxc'),
(14, 1, 'sdfs'),
(15, 1, 'sdfsdf'),
(16, 1, 'sdf'),
(17, 1, '111'),
(18, 1, '111'),
(19, 1, 'sdas'),
(20, 1, 'sdas'),
(21, 1, 'd'),
(22, 1, 'sdc'),
(23, 1, 'dfvdfv'),
(24, 1, '333'),
(25, 4, 'roomba'),
(26, 1, 'mmm'),
(27, 3, 'qwerty'),
(28, 3, 'qwerty'),
(29, 3, 'qwerty');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` varchar(30) NOT NULL,
  `info` text NOT NULL,
  `img` varchar(250) NOT NULL DEFAULT 'test.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `price`, `info`, `img`) VALUES
(21, '123wq', '123123', 'rty3234', '123'),
(22, 'john', '555', '123', '123'),
(23, 'товар', '100', 'товар', 'товар'),
(24, 'товар2', '1', 'товар2', 'товар2'),
(25, 'товар3', '1009', 'товар3', 'товар3'),
(26, 'товар4', '989', 'товар4', 'товар4'),
(27, 'товар5', '889', 'товар5', 'товар5'),
(28, 'товар6', '555', 'товар6', 'товар6'),
(29, 'товар7', '343', 'товар7', 'товар7'),
(34, '321', '312', '312', 'test.png'),
(35, 'Евгений', '555', 'info', 'test.png'),
(36, 'john', '123', '312', 'test.png'),
(37, '123', '123', 'info', 'test.png'),
(38, '123wq', '999', 'info', 'test.png'),
(39, 'Евгений', '123', '312', 'test.png'),
(40, 'Евгений', '555', 'info', 'test.png'),
(41, 'admin', '888', 'info', 'test.png'),
(42, '123wq', '123', 'info', 'test.png'),
(43, '123wq', '555', '123', 'test.png'),
(44, '333', '333', '333', 'test.png'),
(45, 'john', '555', '123321', 'test.png'),
(46, 'Евгений', '555', 'info', 'test.png'),
(47, 'eee', '333', 'eee', 'test.png'),
(48, '123wq', '123', '123321', 'test.png'),
(49, 'john', '999', '123321', 'test.png'),
(50, '123', '123', 'info', 'test.png'),
(51, '123', '123', 'info', 'test.png'),
(52, '123', '123', 'info', 'test.png'),
(53, '123', '123', 'info', 'test.png'),
(54, 'Евгений', '1233', 'rf2rfer', 'test.png'),
(55, '123', '999', '123321', 'test.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fio` varchar(50) NOT NULL COMMENT 'Фио',
  `login` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT '0' COMMENT '0 - uesr, 1 - admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `fio`, `login`, `password`, `is_admin`) VALUES
(16, 'Eugene', 'Eugene', '$2y$10$.VbF4M0patj1Lj4z/eXj5uv8pJy7IOMV1xCrtprVxV.CfqoPlvkaa', 1),
(17, 'John', 'John', '$2y$10$5fGGx4AdipqFbeJWdOH6je5bv6qv6UWCWJiJDQxTIcBTlJxL1u20y', 0),
(18, 'John', 'john', '$2y$10$JWfeRnhlMbqNkkXpV9YMD.EClbX4R3.AD3wJxMWN9SZQ.DFqkBdgy', 0),
(19, 'John', 'john', '$2y$10$Xdy64yHyKk1Ygt/KCuPJkuQycNLB.iRX74GcUlYiG4IqAWU7GxgI.', 0),
(20, 'Sarah', 'Sarah', '$2y$10$hGUpNkA95Q.SxduM7f5rKOg8/XiqfyyDarCafwZjs2C9fKG7UhBje', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`login`) USING BTREE;

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
