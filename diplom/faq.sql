-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 25 2018 г., 22:43
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
-- База данных: `diplom-php`
--

-- --------------------------------------------------------

--
-- Структура таблицы `questions`
--

CREATE TABLE `questions` (
  `id_questions` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` text NOT NULL,
  `status` text NOT NULL,
  `question_dateCreate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `question_authorName` varchar(255) NOT NULL,
  `question_authorEmail` varchar(255) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `id_u` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `questions`
--

INSERT INTO `questions` (`id_questions`, `question`, `answer`, `status`, `question_dateCreate`, `question_authorName`, `question_authorEmail`, `id_topic`, `id_u`) VALUES
(2, 'tjuhhyjuj', 'hdghgjrhurgbghjdbfhfbdugbgifhbgsgrtigdfnkjfgbdiuhgiuhtijnfgbkjfgrtiughffjkhuihgjingfjkth', 'wait', '2018-11-25 17:53:26', 'gjggg', 'gdfdfhj@ff.ru', 1, 1),
(3, 'tjuhhyjuj', 'hdghgjrhurgbghjdbfhfbdugbgifhbgsgrtigdfnkjfgbdiuhgiuhtijnfgbkjfgrtiughffjkhuihgjingfjkth', 'wait', '2018-11-25 17:53:29', 'gjggg', 'gdfdfhj@ff.ru', 1, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id_questions`),
  ADD KEY `id_topic` (`id_topic`),
  ADD KEY `id_user` (`id_u`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `questions`
--
ALTER TABLE `questions`
  MODIFY `id_questions` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`id_topic`) REFERENCES `tem` (`id_topic`),
  ADD CONSTRAINT `questions_ibfk_2` FOREIGN KEY (`id_u`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
