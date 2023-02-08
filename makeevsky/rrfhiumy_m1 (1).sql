-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 27 2023 г., 14:59
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rrfhiumy_m1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `name_category` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'Ford'),
(2, 'Opel'),
(3, 'Mazda'),
(4, 'Fiat');

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id_menu` tinyint NOT NULL,
  `name_menu` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `text_menu` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id_menu`, `name_menu`, `text_menu`) VALUES
(1, 'О нас', 'Сайт посвящен автомобилям'),
(2, 'Контакты:', 'Социальные сети\r\nАдрес\r\nПочта'),
(3, 'Реклама', 'О сотрудничестве\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `statii`
--

CREATE TABLE `statii` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `text` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `date` date NOT NULL,
  `img_src` varchar(255) NOT NULL,
  `cat` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `statii`
--

INSERT INTO `statii` (`id`, `title`, `description`, `text`, `date`, `img_src`, `cat`) VALUES
(1, 'История развития Ford', 'Эта статья посвящается Ford Motor Company ', 'Ford Motor Company, «Форд мотор компани» — американская автомобилестроительная компания. Четвёртый в мире производитель автомобилей по объёму выпуска за весь период существования. Штаб-квартира компании располагается в городе Дирборн в пригороде Детройта в штате Мичиган.Компания основана в Детройте в 1903 году Генри Фордом, который создал её, получив на развитие бизнеса $28 000 от пяти инвесторов.', '2023-01-02', 'image/ford.jpg', 1),
(2, 'Прозводитель Opel', 'Opel Automobile GmbH (ˈ´oːpəl) — немецкий производитель автомобилей, штаб-квартира расположена в Рюссельсхайме.', 'Компания берёт начало с 1862г. — 21 января Адам Опель открыл фабрику по производству швейных машин. Свой первый автомобиль компания выпустила в 1899г.  под маркой «Opel-Lutzmann»', '2022-11-17', 'image/opel.jgp', 2),
(3, 'О Mazde', 'Mazda Motor Corporation, Mazda (рус. «Ма́зда») — японская автомобилестроительная компания, выпускающая автомобили «Мазда». Штаб-квартира расположена в посёлке Футю, уезд Аки, префектура Хиросима, Япония.', 'В 1920 году совместно с группой инвесторов обанкротившуюся строительную компанию Abemaki приобрёл сын простого рыбака, Дзюдзиро Мацуда. Основной продукцией предприятия стали изделия из пробкового дерева, компанию назвали Toyo Cork Kogyo Ltd., и в 1921 году Мацуда стал её президентом. В середине 1920-х годов компания расширила ассортимент продукции механизированными инструментами, и слово «Cork» — «пробка» — удалили из названия в 1927 году. В 1931 году компания начала выпуск трициклов, получивших большую популярность', '2022-07-11', 'image/mazda.jpg', 3),
(4, 'Итальянская Fiat', 'FIAT (акроним от Fabbrica Italiana Automobili Torino с итал. — «Итальянская автомобильная фабрика Турина») — итальянская компания — производитель автомобилей (производит автомобили, двигатели), финансовое и производственное объединение. Штаб-квартира расположена в Турине (регион Пьемонт).\r\n\r\n', 'Концерн «Fiat Group» был образован 1 февраля 2007 года из компании «Fiat Auto S.p.A.». С 1 января 2011 года «Fiat Group» разделился на две дочерние компании по двум секторам: «Fiat SpA» (легковой транспорт) и «Fiat Industrial» (промышленный транспорт).\r\n\r\nВ январе 2014 года, после консолидации 100 % акций американской Chrysler, совет директоров Fiat принял решение о создании новой единой автомобилестроительной компании Fiat Chrysler Automobiles со штаб-квартирой в Нидерландах.', '2022-11-13', 'image/fiat.jpg', 4),
(5, 'Японская Toyota', 'Toyota Motor Corporation, Toyota, по-русски чаще пишется Тойота — крупнейшая японская автомобилестроительная корпорация, также предоставляющая финансовые услуги и имеющая несколько дополнительных направлений в бизнесе.\r\n', ' Является крупнейшей автомобилестроительной публичной компанией в мире, а также крупнейшей публичной компанией в Японии. Главный офис компании находится в городе Тоёта, префектура Айти, Япония. В списке крупнейших публичных компаний мира Forbes Global 2000 за 2022 год Toyota Motor заняла 10-е место, а в списке Fortune Global 500 — 13-е место.\r\n\r\n\r\nToyota 2000GT\r\n\r\nToyota Mirai\r\n\r\nToyota GR Supra\r\n\r\nToyota Hilux\r\n\r\nToyota Avalon\r\n\r\nToyota Yaris\r\n\r\nToyota GR86\r\n\r\nToyota GR Super Sport Concept\r\nToyota Motor Corporation является основным членом Toyota Group. С этой компанией в основном ассоциируется бренд Toyota. Свою деятельность компания начинала с выпуска автоматических ткацких станков.\r\n\r\n', '2022-11-13', 'image/toyota.jpg', 5),
(6, 'sdsdsd', 'sdsdsdsd', 'sdsdsds', '2023-01-27', 'image/suzuki.jpeg', 2);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Индексы таблицы `statii`
--
ALTER TABLE `statii`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` tinyint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `statii`
--
ALTER TABLE `statii`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
