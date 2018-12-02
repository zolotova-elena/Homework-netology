-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 02 2018 г., 23:28
-- Версия сервера: 5.6.38
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `diplom-php1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` text NOT NULL,
  `status` text NOT NULL,
  `question_dateCreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `question_authorName` varchar(255) NOT NULL,
  `question_authorEmail` varchar(255) NOT NULL,
  `id_topic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`, `status`, `question_dateCreate`, `question_authorName`, `question_authorEmail`, `id_topic`) VALUES
(1, 'fjklkjhgfdshjklkjhgfdsghjklkjhgf', 'ghrgsrs', 'show', '2018-11-25 14:53:26', '3456786543', 'gdfdfhj@ff.ru', 3),
(2, 'tjuhhyjuj', 'hdghgjrhurgbghjdbfhfbdugbgifhbgsgrtigdfnkjfgbdiuhgiuhtijnfgbkjfgrtiughffjkhuihgjingfjkth', 'show', '2018-11-25 14:53:29', 'gjggg', 'gdfdfhj@ff.ru', 1),
(6, 'jkkjewrt', '', 'wait', '2018-12-02 19:42:16', 'ertypoiuytrew', 'jgrngtg@nrjfr.ru', 2),
(7, 'wrtykjhfd', '', 'show', '2018-12-02 19:42:23', 'wertrewrt', 'jgrngtg@nrjfr.ru', 2),
(8, 'erj,jhgfdfg', 'frgh', 'block', '2018-12-02 19:42:30', '1236543213454', 'jgrngtg@nrjfr.ru', 1),
(9, 'erj,jhgfdfg', 'ertyuiopoiuyt', 'show', '2018-12-02 19:42:58', 'ajhgfdfghj', 'jgrngtg@nrjfr.ru', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `topic`
--

CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `topic_creator` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `topic`
--

INSERT INTO `topic` (`id`, `topic_name`, `topic_creator`) VALUES
(1, 'IT', 1),
(3, 'PHP', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(10, 'ad', '523af537946b79c4f8369ed39ba78605'),
(13, 'ad', 'decb4fccd7305abeb1216938678cf316');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id_topic`);

--
-- Индексы таблицы `topic`
--
ALTER TABLE `topic`
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
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
