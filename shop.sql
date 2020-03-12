-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Mar 2020, 12:12
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `shop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `categoriesID` int(10) NOT NULL,
  `categories_name` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`categoriesID`, `categories_name`) VALUES
(1, 'Komputery'),
(2, 'Laptopy'),
(3, 'Ultrabooki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(1) NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `status_id`, `order_date`) VALUES
(13, 10, 1, '2020-02-13 00:00:46'),
(14, 10, 3, '2020-02-13 07:37:40'),
(15, 10, 1, '2020-02-13 07:42:05'),
(16, 13, 3, '2020-02-13 15:14:57'),
(20, 10, 1, '2020-02-13 19:47:28'),
(21, 10, 2, '2020-03-11 15:17:35'),
(22, 13, 1, '2020-03-12 12:08:59');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders_address`
--

CREATE TABLE `orders_address` (
  `order_address_id` int(255) NOT NULL,
  `imie` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nazwisko` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adres` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `kod` varchar(6) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `miejscowosc` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `telefon` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `orders_address`
--

INSERT INTO `orders_address` (`order_address_id`, `imie`, `nazwisko`, `email`, `adres`, `kod`, `miejscowosc`, `telefon`, `order_id`) VALUES
(9, 'Jan', 'Kowalski', 'dmnecc@gmail.com', 'Kra', '34-654', 'Męcina', '456321987', 13),
(10, 'Damian', 'Leśnik', 'asd@gemail.com', 'Kraków', 'sdfsdf', 'Kraków', '234235345', 14),
(11, 'asd', 'asd', 'sad@dfgf.pl', 'asfd', '34-650', 'Kraków', '233454353', 15),
(12, 'Jan', 'Tucha', 'asd@gmail.com', 'Olejwa 2/3', '54-687', 'Gdańsk', '234354564', 16),
(13, 'Tomasz', 'Jasica', 'tom@gmail.com', 'karmelicka 5', '30-555', 'Kraków', '235436457', 20),
(14, 'Jan', 'kowalski', 'admin@gmail.com', 'Kraków 67', '35-800', 'Kraków', '968432123', 21),
(15, 'Jan', 'Kowalski', 'kowalski@gmail.com', 'Kraów', '35-700', 'Kraków', '254233676', 22);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_items`
--

CREATE TABLE `order_items` (
  `order_items_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `order_item_quantity` int(2) NOT NULL,
  `order_item_price` float NOT NULL,
  `order_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `order_items`
--

INSERT INTO `order_items` (`order_items_id`, `product_id`, `order_id`, `order_item_quantity`, `order_item_price`, `order_total`) VALUES
(2, 2, 11, 1, 2100, 2100),
(3, 3, 12, 1, 3500, 3500),
(4, 4, 12, 2, 2500, 5000),
(5, 2, 13, 1, 2100, 2100),
(6, 5, 14, 1, 5000, 5000),
(7, 2, 15, 2, 2100, 4200),
(8, 5, 16, 1, 5000, 5000),
(9, 3, 16, 1, 3500, 3500),
(10, 4, 16, 1, 2500, 2500),
(11, 6, 20, 1, 3000, 3000),
(12, 8, 21, 2, 1500, 3000),
(13, 2, 22, 3, 2100, 6300);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `order_status`
--

CREATE TABLE `order_status` (
  `status_id` int(1) NOT NULL,
  `status_description` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `order_status`
--

INSERT INTO `order_status` (`status_id`, `status_description`) VALUES
(1, 'Nowe'),
(2, 'W realizacji'),
(3, 'Wysłane'),
(4, 'Zakończone'),
(5, 'Anulowane');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product`
--

CREATE TABLE `product` (
  `product_id` int(10) NOT NULL,
  `product_name` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product_amount` int(10) NOT NULL,
  `parameters_id` int(10) NOT NULL,
  `product_price` float NOT NULL,
  `categoriesID` int(11) NOT NULL,
  `product_img` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_amount`, `parameters_id`, `product_price`, `categoriesID`, `product_img`) VALUES
(2, 'Komputer fsdf-34IO', 3, 1, 2100, 1, 'Koala.jpg'),
(3, 'Acer', 5, 5, 3500, 2, 'lenovo-laptop-thinkpad-yoga-silver-back.png'),
(4, 'Asus', 2, 6, 2500, 3, 'Desert.jpg'),
(5, 'Komputer 123', 3, 7, 5000, 1, 'Koala.jpg'),
(6, 'Komputer dell', 3, 7, 3000, 1, 'Koala.jpg'),
(7, 'Komputer x', 3, 7, 2000, 1, 'Koala.jpg'),
(8, 'Resax', 1, 8, 1500, 2, 'Desert.jpg');

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `product_desc`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `product_desc` (
`product_id` int(10)
,`product_name` varchar(256)
,`product_amount` int(10)
,`product_price` float
,`product_img` varchar(256)
,`categoriesID` int(11)
,`parameters_id` int(10)
,`proccessor` varchar(30)
,`ram_amount` varchar(10)
,`drive_type` enum('SSD','HDD')
,`drive_size` varchar(10)
,`screen_size` varchar(10)
,`screen_resolution` varchar(20)
,`os` varchar(20)
,`graphics_card` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product_parameters`
--

CREATE TABLE `product_parameters` (
  `parameters_id` int(10) NOT NULL,
  `proccessor` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `ram_amount` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `drive_type` enum('SSD','HDD') COLLATE utf8_bin DEFAULT NULL,
  `drive_size` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `screen_size` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `screen_resolution` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `os` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `graphics_card` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `product_parameters`
--

INSERT INTO `product_parameters` (`parameters_id`, `proccessor`, `ram_amount`, `drive_type`, `drive_size`, `screen_size`, `screen_resolution`, `os`, `graphics_card`) VALUES
(1, 'Intel i5 4950', '4 GB', 'HDD', '500 GB', NULL, NULL, 'Windows 10', 'GTX 1050ti'),
(3, 'i5', '8 GB', 'SSD', '256GB', '15,6\"', '1920x1080', 'Windows 10', 'Nvidia GTX 1050'),
(4, 'i7', '8', '', '128GB', '', '', '', ''),
(5, 'i7', '8', '', '128GB', '', '', '', ''),
(6, 'i3', '4GB', 'SSD', '128GB', '14&quot;', '', 'brak', ''),
(7, 'i7', '16', '', '500 GB', '15', 'FullHD', 'brak', ''),
(8, 'i5', '8 GB', 'SSD', '512 GB', '14&quot;', '1920x1080', 'Windows 10', 'Intel HD');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `session`
--

CREATE TABLE `session` (
  `ID_session` int(10) UNSIGNED NOT NULL,
  `ID_user` int(10) UNSIGNED NOT NULL,
  `id` varchar(64) COLLATE utf8_bin NOT NULL,
  `ip` varchar(39) COLLATE utf8_bin DEFAULT NULL,
  `web` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `session`
--

INSERT INTO `session` (`ID_session`, `ID_user`, `id`, `ip`, `web`, `time`) VALUES
(10, 9, '9faa8fdee4c1cf222708f6801594d7f86d32d3a8df4ce0910232d96630501cd6', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '2018-02-12 14:52:36'),
(11, 11, 'e69ca5c16ddb05c6be87f864aaac1888e18f9b6d8184905b980894d337f5c668', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '2018-03-20 20:06:43'),
(23, 12, '3c5c2747ee3a9993cb9381af6fcc996ca00cdb6118c701866a976969d327ed1e', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.186 Safari/537.36', '2018-03-21 22:10:35'),
(36, 14, '00e02a38798b7f8cb1b0233f516f3871744ddbf2c8c34e58bdce339d56224182', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.100 Safari/537.36', '2020-02-13 16:31:06'),
(48, 10, 'd964f27c1f65274250d6bbb21e62ff0acef6c9df245808d362285524ec702e97', '::1', 'Mozilla/5.0 (Linux; Android 5.0; SM-G900P Build/LRX21T) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Mobile Safari/537.36', '2020-03-12 04:29:18'),
(49, 13, '5566bc3a2b142ee2a7dcda934b5ced2f5980e46521bd7d6957e8c4d42f3eb202', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.122 Safari/537.36 OPR/67.0.3575.53', '2020-03-12 11:08:13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `ID_user` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `type` enum('admin','user') COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`ID_user`, `email`, `password`, `type`) VALUES
(10, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(11, 'elo@gmail.com', '4bf7fa58be2df552ba406387cb36d926', 'user'),
(13, 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'user'),
(14, 'user@onet.pl', 'ee11cbb19052e40b07aac0ca060c23ee', 'user');

-- --------------------------------------------------------

--
-- Struktura widoku `product_desc`
--
DROP TABLE IF EXISTS `product_desc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product_desc`  AS  select `p`.`product_id` AS `product_id`,`p`.`product_name` AS `product_name`,`p`.`product_amount` AS `product_amount`,`p`.`product_price` AS `product_price`,`p`.`product_img` AS `product_img`,`p`.`categoriesID` AS `categoriesID`,`pp`.`parameters_id` AS `parameters_id`,`pp`.`proccessor` AS `proccessor`,`pp`.`ram_amount` AS `ram_amount`,`pp`.`drive_type` AS `drive_type`,`pp`.`drive_size` AS `drive_size`,`pp`.`screen_size` AS `screen_size`,`pp`.`screen_resolution` AS `screen_resolution`,`pp`.`os` AS `os`,`pp`.`graphics_card` AS `graphics_card` from (`product` `p` join `product_parameters` `pp` on(`p`.`parameters_id` = `pp`.`parameters_id`)) ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoriesID`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `fk_orders_userid` (`user_id`),
  ADD KEY `fk_order_status` (`status_id`);

--
-- Indeksy dla tabeli `orders_address`
--
ALTER TABLE `orders_address`
  ADD PRIMARY KEY (`order_address_id`),
  ADD KEY `fk_order_id_addr` (`order_id`);

--
-- Indeksy dla tabeli `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_items_id`),
  ADD KEY `fk_orders_id` (`order_id`),
  ADD KEY `fk_orders_product_id` (`product_id`);

--
-- Indeksy dla tabeli `order_status`
--
ALTER TABLE `order_status`
  ADD UNIQUE KEY `order_code` (`status_id`);

--
-- Indeksy dla tabeli `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_parameters_id` (`parameters_id`),
  ADD KEY `categoriesID` (`categoriesID`);

--
-- Indeksy dla tabeli `product_parameters`
--
ALTER TABLE `product_parameters`
  ADD PRIMARY KEY (`parameters_id`);

--
-- Indeksy dla tabeli `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`ID_session`),
  ADD KEY `fkIDu` (`ID_user`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `categoriesID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT dla tabeli `orders_address`
--
ALTER TABLE `orders_address`
  MODIFY `order_address_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT dla tabeli `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_items_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `product_parameters`
--
ALTER TABLE `product_parameters`
  MODIFY `parameters_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `session`
--
ALTER TABLE `session`
  MODIFY `ID_session` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `ID_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_status` FOREIGN KEY (`status_id`) REFERENCES `order_status` (`status_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_userid` FOREIGN KEY (`user_id`) REFERENCES `user` (`ID_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `orders_address`
--
ALTER TABLE `orders_address`
  ADD CONSTRAINT `fk_order_id_addr` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
