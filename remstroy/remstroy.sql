-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 27 2026 г., 06:49
-- Версия сервера: 5.7.39
-- Версия PHP: 8.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `remstroy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `question` text NOT NULL,
  `status` enum('new','in_progress','done') DEFAULT 'new',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `question`, `status`, `created_at`) VALUES
(3, 'Иванов Иван Иванович', '89999999999', 'dfgs', 'done', '2026-04-23 23:46:15'),
(4, 'Иванов Иван Иванович', '89999999999', '12edwasd', 'done', '2026-04-23 23:56:12'),
(5, 'Иванов Иван Иванович', '89999999999', '12edwasd', 'done', '2026-04-23 23:56:17'),
(6, 'Иванов Иван Иванович', '89999999999', '12edwasd', 'in_progress', '2026-04-23 23:56:23'),
(7, 'Иванов Иван Иванович', '89999999999', '12edwasd', 'done', '2026-04-23 23:56:30'),
(8, 'Иванов Иван Иванович', '89999999999', '23r', 'in_progress', '2026-04-23 23:56:41'),
(9, 'Иванов Иван Иванович', '89999999999', '13ва3', 'done', '2026-04-23 23:59:28'),
(10, 'Иванов Иван Иванович', '89999999999', 'цауцауц', 'in_progress', '2026-04-24 00:04:00'),
(11, 'Иванов Иван Иванович', '89999999999', 'ацуацуац', 'done', '2026-04-24 00:04:47'),
(12, 'Иванов Иван Иванович', '89999999999', 'цуацуацуа', 'in_progress', '2026-04-24 00:04:56'),
(13, 'Иванов Иван Иванович', '89999999999', '23r', 'done', '2026-04-24 00:05:03'),
(14, 'Иванов Иван Иванович', '89999999999', 'ацуауац', 'in_progress', '2026-04-24 00:05:22'),
(15, 'Иванов Иван Иванович', '89999999999', 'авпмави', 'done', '2026-04-24 00:06:52'),
(16, 'Иванов Иван Иванович', '89999999999', 'мывыв', 'done', '2026-04-24 00:07:21'),
(17, 'Иванов Иван Иванович', '89999999999', 'ываывав', 'done', '2026-04-24 00:07:33'),
(18, 'Иванов Иван Иванович', '89999999999', 'ВЫФВ', 'done', '2026-04-24 00:10:06'),
(19, 'Иванов Иван Иванович', '89999999999', 'ацуцу', 'in_progress', '2026-04-24 00:17:43'),
(20, 'Иванов Иван Иванович', '89999999999', 'уцацуцу', 'done', '2026-04-24 00:18:18'),
(21, 'Иванов Иван Иванович', '89999999999', 'авмимм', 'done', '2026-04-24 00:18:32');

-- --------------------------------------------------------

--
-- Структура таблицы `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `created_at`) VALUES
(4, 'sdffffffffffffsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsd', 'ffffsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsd', '2026-04-26 15:43:48'),
(5, 'екурукерукерук', NULL, '2026-04-26 16:18:32'),
(6, 'екурукерукерук', NULL, '2026-04-26 16:19:02'),
(7, 'екурукерукерук', 'ваысваывфафыыыыыыыыыыыыыыыыыыыыыыыыыы', '2026-04-26 16:19:38'),
(8, 'екурукерукерук', NULL, '2026-04-26 16:19:46'),
(9, 'екурукерукерук', NULL, '2026-04-26 16:20:17'),
(10, 'екурукерукерук', NULL, '2026-04-26 16:20:32');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
