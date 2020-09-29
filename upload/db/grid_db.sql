-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 29 2020 г., 20:08
-- Версия сервера: 5.6.47
-- Версия PHP: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `grid_new`
--

-- --------------------------------------------------------

--
-- Структура таблицы `gr_stages`
--

CREATE TABLE `gr_stages` (
  `id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `sum` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `price` float NOT NULL,
  `goal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gr_stages`
--

INSERT INTO `gr_stages` (`id`, `num`, `sum`, `start`, `end`, `price`, `goal`) VALUES
(1, 0, 477, '2020-07-04 14:22:30', '0000-00-00 00:00:00', 35, 6000),
(2, 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 40, 6000),
(3, 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 45, 6000),
(4, 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 50, 6000);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `type` tinytext NOT NULL,
  `src` mediumblob NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `sum` double NOT NULL,
  `name` varchar(40) NOT NULL,
  `rate` float NOT NULL,
  `status` varchar(20) NOT NULL,
  `lvl` smallint(11) NOT NULL,
  `cur` varchar(10) NOT NULL,
  `stage` smallint(11) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `adr` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `text` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `title` tinytext NOT NULL,
  `teaser` tinytext NOT NULL,
  `text` text NOT NULL,
  `img` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `name` tinytext NOT NULL,
  `value` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `options`
--

INSERT INTO `options` (`id`, `name`, `value`) VALUES
(4, 'with_fee', '10'),
(8, 'usdt_erc20_course', '0.98171168338261'),
(9, 'btc_course', '10042.936708187'),
(10, 'eth_course', '317.60762643799'),
(11, 'bch_course', '247.92204387714'),
(12, 'stage', '5'),
(13, 'bonPrice', '0.56'),
(14, 'bonAmount', '0'),
(15, 'bonStatus', 'on'),
(16, 'bonOneHand', '3000'),
(17, 'tok2_price', '0.46'),
(18, 'tok2_sum', '9.5'),
(19, 'tok2_goal', '60675.49782608754'),
(20, 'tok2OneHand', '100000'),
(21, 'gr_stage', '0'),
(38, 'max_with', '500');

-- --------------------------------------------------------

--
-- Структура таблицы `partners_marks`
--

CREATE TABLE `partners_marks` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `partner` int(11) NOT NULL,
  `coment` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `partner_programs`
--

CREATE TABLE `partner_programs` (
  `id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `real_start` datetime NOT NULL,
  `real_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `partner_programs`
--

INSERT INTO `partner_programs` (`id`, `start`, `end`, `real_start`, `real_end`) VALUES
(6, '2020-07-21 12:17:00', '2020-07-28 12:17:00', '2020-07-21 12:17:41', '2020-07-21 17:57:20'),
(7, '2020-07-22 11:00:00', '2020-07-31 23:59:00', '2020-07-22 00:13:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `ref_programs`
--

CREATE TABLE `ref_programs` (
  `id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `rates` tinytext NOT NULL,
  `rewards` tinytext NOT NULL,
  `real_start` datetime NOT NULL,
  `real_end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ref_programs`
--

INSERT INTO `ref_programs` (`id`, `start`, `end`, `rates`, `rewards`, `real_start`, `real_end`) VALUES
(1, '2020-07-02 13:24:00', '2020-07-02 13:29:33', 'a:7:{i:1;s:4:\"0.34\";i:2;s:4:\"0.17\";i:3;s:4:\"0.05\";i:4;s:4:\"0.06\";i:5;s:4:\"0.03\";i:6;s:4:\"0.04\";i:7;s:4:\"0.05\";}', 'a:4:{i:1;a:2:{s:6:\"amount\";s:2:\"10\";s:6:\"reward\";s:2:\"10\";}i:2;a:2:{s:6:\"amount\";s:3:\"100\";s:6:\"reward\";s:3:\"100\";}i:3;a:2:{s:6:\"amount\";s:4:\"1000\";s:6:\"reward\";s:4:\"1000\";}i:4;a:2:{s:6:\"amount\";s:5:\"10000\";s:6:\"reward\";s:5:\"10000\";}}', '2020-07-02 13:25:35', '2020-07-02 13:29:33'),
(2, '2020-07-07 10:19:00', '2020-07-07 11:23:00', 'a:7:{i:1;s:2:\"70\";i:2;s:2:\"60\";i:3;s:2:\"40\";i:4;s:2:\"20\";i:5;s:2:\"15\";i:6;s:2:\"10\";i:7;s:2:\"10\";}', 'a:4:{i:1;a:2:{s:6:\"amount\";s:1:\"2\";s:6:\"reward\";s:1:\"1\";}i:2;a:2:{s:6:\"amount\";s:1:\"4\";s:6:\"reward\";s:1:\"2\";}i:3;a:2:{s:6:\"amount\";s:1:\"8\";s:6:\"reward\";s:1:\"3\";}i:4;a:2:{s:6:\"amount\";s:2:\"19\";s:6:\"reward\";s:1:\"4\";}}', '2020-07-07 10:20:18', '2020-07-07 11:24:43'),
(3, '2020-07-07 11:24:00', '2020-07-07 13:24:00', 'a:7:{i:1;s:2:\"80\";i:2;s:2:\"70\";i:3;s:2:\"60\";i:4;s:2:\"50\";i:5;s:2:\"40\";i:6;s:2:\"30\";i:7;s:2:\"10\";}', 'a:4:{i:1;a:2:{s:6:\"amount\";s:1:\"2\";s:6:\"reward\";s:1:\"1\";}i:2;a:2:{s:6:\"amount\";s:1:\"4\";s:6:\"reward\";s:1:\"2\";}i:3;a:2:{s:6:\"amount\";s:1:\"8\";s:6:\"reward\";s:1:\"4\";}i:4;a:2:{s:6:\"amount\";s:2:\"16\";s:6:\"reward\";s:1:\"8\";}}', '2020-07-07 11:25:57', '2020-07-07 15:11:28'),
(4, '2020-07-07 15:11:00', '2020-07-07 16:11:00', 'a:7:{i:1;s:2:\"90\";i:2;s:2:\"80\";i:3;s:2:\"70\";i:4;s:2:\"60\";i:5;s:2:\"50\";i:6;s:2:\"40\";i:7;s:2:\"30\";}', 'a:4:{i:1;a:2:{s:6:\"amount\";s:1:\"2\";s:6:\"reward\";s:1:\"1\";}i:2;a:2:{s:6:\"amount\";s:1:\"4\";s:6:\"reward\";s:1:\"2\";}i:3;a:2:{s:6:\"amount\";s:1:\"8\";s:6:\"reward\";s:1:\"4\";}i:4;a:2:{s:6:\"amount\";s:2:\"16\";s:6:\"reward\";s:1:\"8\";}}', '2020-07-07 15:12:24', '2020-07-07 16:18:24'),
(5, '2020-07-07 16:18:00', '2020-07-07 16:22:00', 'a:7:{i:1;s:2:\"90\";i:2;s:2:\"80\";i:3;s:2:\"70\";i:4;s:2:\"60\";i:5;s:2:\"50\";i:6;s:2:\"40\";i:7;s:2:\"30\";}', 'a:4:{i:1;a:2:{s:6:\"amount\";s:1:\"2\";s:6:\"reward\";s:1:\"1\";}i:2;a:2:{s:6:\"amount\";s:1:\"4\";s:6:\"reward\";s:1:\"2\";}i:3;a:2:{s:6:\"amount\";s:1:\"8\";s:6:\"reward\";s:1:\"4\";}i:4;a:2:{s:6:\"amount\";s:2:\"16\";s:6:\"reward\";s:1:\"8\";}}', '2020-07-07 16:19:21', '2020-07-07 16:20:11'),
(6, '2020-07-07 18:00:00', '2020-08-04 18:00:00', 'a:7:{i:1;s:3:\"100\";i:2;s:2:\"70\";i:3;s:2:\"50\";i:4;s:2:\"30\";i:5;s:2:\"20\";i:6;s:2:\"10\";i:7;s:1:\"5\";}', 'a:4:{i:1;a:2:{s:6:\"amount\";s:5:\"15000\";s:6:\"reward\";s:3:\"500\";}i:2;a:2:{s:6:\"amount\";s:5:\"40000\";s:6:\"reward\";s:4:\"2000\";}i:3;a:2:{s:6:\"amount\";s:5:\"80000\";s:6:\"reward\";s:4:\"4000\";}i:4;a:2:{s:6:\"amount\";s:6:\"120000\";s:6:\"reward\";s:4:\"6000\";}}', '2020-07-07 17:09:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `stages`
--

CREATE TABLE `stages` (
  `id` int(11) NOT NULL,
  `num` tinyint(11) NOT NULL,
  `sum` double NOT NULL DEFAULT '0',
  `usd_sum` double NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `price` float NOT NULL,
  `goal` double NOT NULL DEFAULT '2500000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stages`
--

INSERT INTO `stages` (`id`, `num`, `sum`, `usd_sum`, `start`, `end`, `price`, `goal`) VALUES
(2, 0, 500000, 0, '2020-05-25 17:00:00', '2020-06-01 22:17:23', 0.1, 500000),
(3, 1, 500000, 0, '2020-06-01 22:17:23', '2020-06-12 00:10:38', 0.2, 500000),
(4, 2, 500000, 0, '2020-06-12 00:10:38', '2020-06-19 19:21:16', 0.3, 500000),
(5, 3, 499999.9999999998, 0, '2020-06-19 19:21:16', '2020-07-02 23:37:51', 0.4, 500000),
(6, 4, 500000, 229361.8160000001, '2020-07-02 23:37:51', '2020-07-23 23:07:15', 0.5, 500000),
(7, 5, 8604.182443617405, 4831.950000000001, '2020-07-23 23:07:15', '0000-00-00 00:00:00', 0.6, 500000),
(8, 6, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.7, 500000),
(9, 7, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.8, 500000),
(10, 8, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0.9, 500000),
(11, 9, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 500000),
(12, 10, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1.1, 500000),
(13, 11, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1.2, 500000),
(14, 12, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1.3, 500000),
(15, 13, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1.4, 500000),
(16, 14, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1.5, 500000),
(17, 15, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1.6, 500000),
(18, 16, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1.7, 500000),
(19, 17, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1.8, 500000),
(20, 18, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1.9, 500000),
(21, 19, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 2, 500000);

-- --------------------------------------------------------

--
-- Структура таблицы `tg_purchases`
--

CREATE TABLE `tg_purchases` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `user` int(11) NOT NULL,
  `sum` double NOT NULL,
  `adr` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` tinytext NOT NULL,
  `email` varchar(50) NOT NULL,
  `sponsor` int(11) NOT NULL,
  `balance` double NOT NULL,
  `bonus` double NOT NULL,
  `TOKbalance` double NOT NULL,
  `TOK_2balance` double NOT NULL,
  `gridPay` double NOT NULL,
  `gr_tok` int(11) NOT NULL,
  `gr_bon` double NOT NULL,
  `gr_usd` double NOT NULL,
  `ref_prog_sum` double NOT NULL,
  `ref_prog_max` double NOT NULL,
  `usd_to_tok_sum` double NOT NULL,
  `btcAdr` tinytext,
  `ethAdr` tinytext,
  `bchAdr` tinytext NOT NULL,
  `usdt_erc20Adr` tinytext NOT NULL,
  `with_btc` varchar(50) NOT NULL,
  `with_eth` varchar(50) NOT NULL,
  `with_usdt` varchar(50) NOT NULL,
  `with_usd` varchar(50) NOT NULL,
  `with_payeer` varchar(50) NOT NULL,
  `with_qiwi` varchar(50) NOT NULL,
  `with_advcash` varchar(50) NOT NULL,
  `with_pm` varchar(50) NOT NULL,
  `lang` tinytext NOT NULL,
  `chPasHash` tinytext NOT NULL,
  `ban_enter` tinyint(1) NOT NULL,
  `ban_width` tinyint(1) NOT NULL,
  `ban_deps` tinyint(1) NOT NULL,
  `img` tinytext NOT NULL,
  `role` int(11) NOT NULL,
  `bonOneHand` double NOT NULL,
  `tok2OneHand` double NOT NULL,
  `name` tinytext NOT NULL,
  `phone` tinytext NOT NULL,
  `contact` tinytext NOT NULL,
  `country` tinytext NOT NULL,
  `last_new` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `date`, `login`, `password`, `email`, `sponsor`, `balance`, `bonus`, `TOKbalance`, `TOK_2balance`, `gridPay`, `gr_tok`, `gr_bon`, `gr_usd`, `ref_prog_sum`, `ref_prog_max`, `usd_to_tok_sum`, `btcAdr`, `ethAdr`, `bchAdr`, `usdt_erc20Adr`, `with_btc`, `with_eth`, `with_usdt`, `with_usd`, `with_payeer`, `with_qiwi`, `with_advcash`, `with_pm`, `lang`, `chPasHash`, `ban_enter`, `ban_width`, `ban_deps`, `img`, `role`, `bonOneHand`, `tok2OneHand`, `name`, `phone`, `contact`, `country`, `last_new`) VALUES
(1, '2018-11-20 11:05:11', 'admin', '$2y$10$5lZawmg1q4p3TdyyD/KwA.MeiUM7g5zjdtgPZD1x9IUvDUR5O6qte', 'admin@gmail.com', 0, 515.73, 4558.15, 931.81, 4887.05, 1102.5, 1, 1, 31, 9583.485000000013, 0, 2486.2700000000004, '', '0x07175c6dc898d46796fc4938a8b83b72e3891df7', '', '', '', '', '', '1234567890', '', '', '', '', 'RU', '', 0, 0, 0, 'user1', 0, 2997.214285714286, 100000, '12123', '12323', ' ', 'a:2:{s:7:\"country\";s:2:\"ua\";s:12:\"country_long\";s:24:\"Ukraine (Україна)\";}', 0),
(2, '2020-05-05 22:12:19', 'tester1', '$2y$10$oyVUX9jn3MzOufTlL5duueWzJ8e2zhA/r3MNhdPuqDSCEur.4tu6K', 'ex@gmail.com', 1, 1279.1, 648, 1024.34, 60.81, 924561.12, 0, 0, 353, 0, 0, 120, '33Y7GZ1zfBHFdZdYBpzsu2AReCDAx3c493', '0xa48092d20c7e3d06e8f288de1c6faa056d9e055a', 'bitcoincash:qq2hctjmku3lf3ge5ey8t7d7jkjz5l3v8s77tfn2ej', '0x2f4b93684d03f2eebfbca05d2520933abef98f31', 'фцвфв', '', '', '', '', '', '4r56y', '', 'RU', '', 0, 0, 0, '', 0, 3000, 99986.95652173912, 'GG pre ale', '+380 (96) 69879879', '+380999999999', 'a:2:{s:7:\"country\";s:2:\"ua\";s:12:\"country_long\";s:24:\"Ukraine (Україна)\";}', 0),
(3, '2020-05-05 22:12:19', 'tester2', '$2y$10$oyVUX9jn3MzOufTlL5duueWzJ8e2zhA/r3MNhdPuqDSCEur.4tu6K', 'qqq@g.co', 2, 1101.35, 700, 997.35, 6.6, 130, 0, 0, 251, 0, 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 'RU', '', 0, 0, 0, '', 0, 3000, 99986.95652173912, 'GG pre ale', '+380 (96) 69879879', '+380999999999', 'a:2:{s:7:\"country\";s:2:\"de\";s:12:\"country_long\";s:21:\"Germany (Deutschland)\";}', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `verification`
--

CREATE TABLE `verification` (
  `id` int(11) UNSIGNED NOT NULL,
  `user` int(11) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `pasp_num` varchar(20) DEFAULT NULL,
  `pasp_given` varchar(60) DEFAULT NULL,
  `pasp_given_date` varchar(20) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `state` varchar(30) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `adres` varchar(30) DEFAULT NULL,
  `doc_img` tinytext,
  `bill_img` tinytext,
  `status` varchar(20) DEFAULT NULL,
  `coment` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `user` int(11) NOT NULL,
  `orig` varchar(20) NOT NULL,
  `cur` varchar(20) NOT NULL,
  `sum` double NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `hash` varchar(60) NOT NULL,
  `rate` float NOT NULL,
  `stage` smallint(11) NOT NULL,
  `fee` float NOT NULL,
  `coment` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `gr_stages`
--
ALTER TABLE `gr_stages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partners_marks`
--
ALTER TABLE `partners_marks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partner_programs`
--
ALTER TABLE `partner_programs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ref_programs`
--
ALTER TABLE `ref_programs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `stages`
--
ALTER TABLE `stages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `num` (`num`);

--
-- Индексы таблицы `tg_purchases`
--
ALTER TABLE `tg_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `verification`
--
ALTER TABLE `verification`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `gr_stages`
--
ALTER TABLE `gr_stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122765;

--
-- AUTO_INCREMENT для таблицы `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4123;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `partners_marks`
--
ALTER TABLE `partners_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `partner_programs`
--
ALTER TABLE `partner_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `ref_programs`
--
ALTER TABLE `ref_programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `stages`
--
ALTER TABLE `stages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `tg_purchases`
--
ALTER TABLE `tg_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3480;

--
-- AUTO_INCREMENT для таблицы `verification`
--
ALTER TABLE `verification`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=928;

--
-- AUTO_INCREMENT для таблицы `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8174;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
