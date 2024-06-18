-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 18 2024 г., 15:24
-- Версия сервера: 8.0.30
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `barshik`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bin`
--

CREATE TABLE `bin` (
  `id_bin` int NOT NULL,
  `id_user` int NOT NULL,
  `into_bin` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cathegories`
--

CREATE TABLE `cathegories` (
  `id_category` int NOT NULL,
  `name_category` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cathegories`
--

INSERT INTO `cathegories` (`id_category`, `name_category`) VALUES
(1, 'красная'),
(3, 'желтая'),
(4, 'темно-зеленая'),
(7, 'зеленая');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int NOT NULL,
  `id_user` int NOT NULL,
  `date_order` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_order` int NOT NULL DEFAULT '1',
  `sum_order` decimal(10,0) NOT NULL,
  `bonus_minus` decimal(10,0) DEFAULT NULL,
  `bonus_plus` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `id_user`, `date_order`, `status_order`, `sum_order`, `bonus_minus`, `bonus_plus`) VALUES
(4, 1, '2024-05-31 06:10:23', 1, '2664', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `order_row`
--

CREATE TABLE `order_row` (
  `id_order_row` int NOT NULL,
  `id_order` int NOT NULL,
  `id_product` int NOT NULL,
  `amount_products` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `order_row`
--

INSERT INTO `order_row` (`id_order_row`, `id_order`, `id_product`, `amount_products`) VALUES
(5, 4, 3, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id_product` int NOT NULL,
  `name_product` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc_product` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cathegory_prod` int NOT NULL,
  `price_product` decimal(10,0) NOT NULL,
  `image_product` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `desc_product`, `id_cathegory_prod`, `price_product`, `image_product`) VALUES
(1, 'Крутая ягода', 'эта ягода невероятно крута', 4, '10', 'darkgreen.png'),
(2, 'Классный лимон', 'с приятной кислинкой', 3, '1000000', 'yellow.png'),
(3, 'Сочный арбуз', 'черный рынок на армянском арбузе', 1, '666', 'red.png'),
(6, 'Классный лимон 2', '-----------------', 3, '7800', 'yellow.png'),
(8, 'Лаймовая свежесть', 'освежает', 7, '300', 'green.png'),
(9, 'тест', 'аывпывп', 1, '23223', 'red.png');

-- --------------------------------------------------------

--
-- Структура таблицы `status_orders`
--

CREATE TABLE `status_orders` (
  `id_status` int NOT NULL,
  `name_status` varchar(60) NOT NULL DEFAULT 'создан'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `status_orders`
--

INSERT INTO `status_orders` (`id_status`, `name_status`) VALUES
(1, 'создан'),
(2, 'готовим'),
(3, 'доставка'),
(4, 'выполнен');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `email_user` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_user` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonuses_active` decimal(10,0) NOT NULL,
  `user_photo` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no_photo.png',
  `status` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `email_user`, `password_user`, `bonuses_active`, `user_photo`, `status`) VALUES
(1, 'emma.nias@yandex.ru', 'elka5', '0', '1.jpg', 'user'),
(2, 'admin@admin.ru', 'admin', '0', 'no_photo.png', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `bin`
--
ALTER TABLE `bin`
  ADD PRIMARY KEY (`id_bin`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `cathegories`
--
ALTER TABLE `cathegories`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `order_row`
--
ALTER TABLE `order_row`
  ADD PRIMARY KEY (`id_order_row`),
  ADD KEY `id_order` (`id_order`,`id_product`),
  ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_cathegory_prod` (`id_cathegory_prod`);

--
-- Индексы таблицы `status_orders`
--
ALTER TABLE `status_orders`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `id_user` (`email_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `bin`
--
ALTER TABLE `bin`
  MODIFY `id_bin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `cathegories`
--
ALTER TABLE `cathegories`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `order_row`
--
ALTER TABLE `order_row`
  MODIFY `id_order_row` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `status_orders`
--
ALTER TABLE `status_orders`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `bin`
--
ALTER TABLE `bin`
  ADD CONSTRAINT `bin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `order_row`
--
ALTER TABLE `order_row`
  ADD CONSTRAINT `order_row_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_row_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_cathegory_prod`) REFERENCES `cathegories` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
