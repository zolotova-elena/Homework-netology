-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 06 2018 г., 23:59
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
(1, 'fjklkjhgfdshjklkjhgfdsghjklkjhgf', '3', 'block', '2018-11-25 14:53:26', ',kmjnhgbfvcdxs', 'gdfdfhj@ff.ru', 1),
(6, 'jkkjewrt', '4', 'wait', '2018-12-02 19:42:16', 'ertypoiuytrew', 'jgrngtg@nrjfr.ru', 3),
(7, 'wrtykjhfd', 'grtgtrtgtg', 'show', '2018-12-02 19:42:23', 'wertrewrt', 'jgrngtg@nrjfr.ru', 1),
(8, 'erj,jhgfdfg', 'frgh', 'block', '2018-12-02 19:42:30', '1236543213454', 'jgrngtg@nrjfr.ru', 1),
(9, 'erj,jhgfdfg rtrt ggte  egw', '3', 'show', '2018-12-02 19:42:58', 'ajhgfdfghj', 'jgrngtg@nrjfr.ru', 1),
(10, 'gregw54ytgtg', '', 'wait', '2018-12-04 19:17:52', 'кпкепеп', 'jgrngtg@nrjfr.ru', 3);

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
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
