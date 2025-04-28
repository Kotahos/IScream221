-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 25 2025 г., 08:05
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `is221`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fio` varchar(120) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(120) NOT NULL,
  `all_sum` float NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `fio`, `address`, `phone`, `email`, `all_sum`, `created`) VALUES
(1, 'Мякишева Юлия', 'Ленина 137Б', '89134356096', 'yu.myakischeva@yandex.ru', 280, '2025-04-24 21:26:16');

-- --------------------------------------------------------

--
-- Структура таблицы `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `count_item` int(11) NOT NULL,
  `price_item` float NOT NULL,
  `sum_item` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `count_item`, `price_item`, `sum_item`) VALUES
(1, 1, 8, 1, 140, 140),
(2, 1, 9, 1, 140, 140);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(120) NOT NULL,
  `price` float NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `created`, `updated`) VALUES
(3, 'БонПари Джунгли', 'Вкусное банановое желе снаружи - нежнейший пломбир внутри!', '\\assets\\images\\6.png', 120, '2025-04-24 21:06:36', '2025-04-24 21:06:36'),
(4, 'Льдинка со вкусом Вишни', 'Насыщеный вкус вишни и потрясающее охлаждение в жаркий день', '\\assets\\images\\7.png', 130, '2025-04-24 21:06:36', '2025-04-24 21:06:36'),
(5, 'Магнат Шоколадный-Трюфель', 'Хрустящая глазурь, вкусный шоколадный вкус с мягким трюфилем', '\\assets\\images\\8.png', 140, '2025-04-24 21:06:36', '2025-04-24 21:06:36'),
(6, 'Экзо Пина Колада', 'фруктовое мороженое с дерзким вкусом знаменитого тропического коктейля.', '\\assets\\images\\9.png', 150, '2025-04-24 21:06:36', '2025-04-24 21:06:36'),
(7, 'Мороженое в вафле', 'Нежная вафля, а внутри нежный пломбир с шоколадной начинкой', '\\assets\\images\\14.png', 140, '2025-04-24 21:06:36', '2025-04-24 21:06:36'),
(8, 'НейроМороженое Вишня', 'Новинка которая удивит любого ребенка, со вкусом Вишни в рожке!)', '\\assets\\images\\11.png', 140, '2025-04-24 21:06:36', '2025-04-24 21:06:36'),
(9, 'Нейромороженое Фисташка-Вишня', 'Новинка которая удивит любого ребенка, со вкусом Фисташки и Вишни в рожке!)', '\\assets\\images\\12.png', 140, '2025-04-24 21:06:36', '2025-04-24 21:06:36'),
(10, 'Персик на палочке', 'Вкуснейший персик-мороженое в жаркий день', '\\assets\\images\\15.png', 140, '2025-04-24 21:06:36', '2025-04-24 21:06:36');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `token`, `is_verified`, `created_at`, `address`, `phone`, `avatar`) VALUES
(1, 'kotahos', 'fdsgdsfgdf@adsfdsrgfd', '$2y$10$BZMJnKi8xmEijQIPa/t0deUD.PpobtZN66a5weEFywaUuWmjDfHcG', '', 1, '2025-04-25 07:24:21', 'Тухочевского 32', '89999999999', ''),
(2, 'kotahos', 'fdsgdsfgdf@adsfdsrgfd', '$2y$10$ZoSUQGNsOZ0gAX58VI2UWenLpSIWBTbbY9OX821.sSm9qWZBJTY0G', '1f2b258980cf2bcbfb2e63c693f4dd4f', 0, '2025-04-25 08:23:21', 'Тухочевского 32', '89999999999', ''),
(4, 'gsaibers', 'veydenerti@gufum.com', '$2y$10$a8Nz5ohsfr/GzP2EM2Q8Au/3/I7XUqSGZYzQsooNVSP84GJH5fqVS', '', 1, '2025-04-25 08:59:34', '', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
