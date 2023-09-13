-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: db
-- Время создания: Сен 13 2023 г., 10:36
-- Версия сервера: 8.0.34
-- Версия PHP: 8.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `exercise_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `transactions`
--

CREATE TABLE `transactions` (
  `id` int UNSIGNED NOT NULL,
  `transaction_date` date DEFAULT NULL,
  `check_number` int DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_date`, `check_number`, `description`, `amount`) VALUES
(226, '2021-01-04', 7777, 'Transaction 1', 150.43),
(227, '2021-01-05', NULL, 'Transaction 2', 700.25),
(228, '2021-01-06', NULL, 'Transaction 3', -1303.97),
(229, '2021-01-07', NULL, 'Transaction 4', 46.78),
(230, '2021-01-08', NULL, 'Transaction 5', 816.87),
(231, '2021-01-11', 1934, 'Transaction 6', -1002.53),
(232, '2021-01-12', 7307, 'Transaction 7', 532.22),
(233, '2021-01-13', 1352, 'Transaction 8', -704.59),
(234, '2021-01-14', NULL, 'Transaction 9', 98.04),
(235, '2021-01-15', NULL, 'Transaction 10', -204.56),
(236, '2021-01-25', NULL, 'Transaction 11', 1056.27),
(237, '2021-01-26', NULL, 'Transaction 12', 550.10),
(238, '2021-01-27', NULL, 'Transaction 13', -825.77),
(239, '2021-01-28', 4250, 'Transaction 14', 212.68),
(240, '2021-01-29', NULL, 'Transaction 15', 195.68),
(241, '2021-02-02', 9915, 'Transaction 16', -463.75),
(242, '2021-02-03', NULL, 'Transaction 17', 78.02),
(243, '2021-02-04', NULL, 'Transaction 18', 268.81),
(244, '2021-02-05', NULL, 'Transaction 19', 1360.55),
(245, '2021-02-08', NULL, 'Transaction 20', -594.46),
(246, '2021-02-09', 9125, 'Transaction 21', 467.39),
(247, '2021-02-10', NULL, 'Transaction 22', 39.49),
(248, '2021-02-11', 7929, 'Transaction 23', -81.87),
(249, '2021-02-12', NULL, 'Transaction 24', 255.64),
(250, '2021-02-12', NULL, 'Transaction 25', 13.51);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
