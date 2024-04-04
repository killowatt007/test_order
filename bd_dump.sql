-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 04 2024 г., 14:00
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mirdomhx_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--
-- Создание: Апр 04 2024 г., 07:09
-- Последнее обновление: Апр 04 2024 г., 10:59
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `total_price` float NOT NULL,
  `description` text NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `total_price`, `description`, `buyer_id`, `status`) VALUES
(1, 1000.5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor тест incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, тест', 1, 'pending'),
(2, 2000, 'Etiam tempor orci eu lobortis. Faucibus ornare suspendisse sed nisi. Sit amet venenatis urna cursus', 1, 'payd'),
(3, 5500, 'Auctor augue mauris augue neque gravida in fermentum et. Eleifend mi in nulla posuere sollicitudin', 2, 'pending'),
(4, 550, 'Feugiat in fermentum posuere urna nec. Tempus quam pellentesque nec nam aliquam sem et tortor. Ornare aenean euismod elementum nisi quis eleifend quam adipiscing vitae', 2, 'payd'),
(12, 200, 'Новое описание заказа!', 1, 'pending');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
