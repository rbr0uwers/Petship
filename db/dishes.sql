-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 21. Apr 2021 um 11:18
-- Server-Version: 10.4.18-MariaDB
-- PHP-Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `dannys`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `dishes`
--

CREATE TABLE `dishes` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `description` text NOT NULL,
  `img_url` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `dishes`
--

INSERT INTO `dishes` (`id`, `name`, `price`, `description`, `img_url`) VALUES
(0000000001, 'Jam - Apricot', '6.78', 'Aliquam erat volutpat. In congue. Etiam justo.', 'http://dummyimage.com/658x441.png/5fa2dd/ffffff'),
(0000000002, 'Ice Cream Bar - Rolo Cone', '9.12', 'Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', 'http://dummyimage.com/611x371.png/ff4444/ffffff'),
(0000000003, 'Red Cod Fillets - 225g', '7.89', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus.', 'http://dummyimage.com/670x359.png/dddddd/000000'),
(0000000004, 'Cucumber - English', '15.62', 'Phasellus in felis. Donec semper sapien a libero.', 'http://dummyimage.com/737x366.png/cc0000/ffffff'),
(0000000005, 'Wine - Dubouef Macon - Villages', '9.05', 'Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla.', 'http://dummyimage.com/696x303.png/ff4444/ffffff'),
(0000000006, 'Baking Soda', '14.77', 'Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem.', 'http://dummyimage.com/728x311.png/cc0000/ffffff'),
(0000000007, 'Mace Ground', '16.24', 'Etiam vel augue. Vestibulum rutrum rutrum neque.', 'http://dummyimage.com/597x323.png/cc0000/ffffff'),
(0000000008, 'Kahlua', '16.04', 'In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc.', 'http://dummyimage.com/651x437.png/cc0000/ffffff'),
(0000000009, 'Gatorade - Lemon Lime', '19.52', 'Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 'http://dummyimage.com/617x305.png/ff4444/ffffff'),
(0000000010, 'Salmon - Fillets', '15.34', 'Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus.', 'http://dummyimage.com/559x366.png/cc0000/ffffff'),
(0000000011, 'Cheese - Ermite Bleu', '9.41', 'Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus.', 'http://dummyimage.com/558x339.png/dddddd/000000'),
(0000000012, 'Mustard - Pommery', '13.54', 'Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue.', 'http://dummyimage.com/526x347.png/5fa2dd/ffffff'),
(0000000013, 'Grapes - Red', '16.21', 'Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo.', 'http://dummyimage.com/771x371.png/5fa2dd/ffffff'),
(0000000014, 'Rice Paper', '19.93', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor.', 'http://dummyimage.com/556x370.png/dddddd/000000'),
(0000000015, 'Fish - Artic Char, Cold Smoked', '17.54', 'Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla.', 'http://dummyimage.com/618x319.png/cc0000/ffffff'),
(0000000016, 'Bagels Poppyseed', '7.66', 'Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus.', 'http://dummyimage.com/642x329.png/5fa2dd/ffffff'),
(0000000017, 'Mace Ground', '19.44', 'Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia. Aenean sit amet justo. Morbi ut odio.', 'http://dummyimage.com/591x377.png/dddddd/000000'),
(0000000018, 'Oil - Grapeseed Oil', '9.55', 'Nulla tellus. In sagittis dui vel nisl.', 'http://dummyimage.com/505x432.png/dddddd/000000'),
(0000000019, 'Beer - Guiness', '14.54', 'Phasellus in felis. Donec semper sapien a libero. Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla.', 'http://dummyimage.com/501x316.png/ff4444/ffffff'),
(0000000020, 'Longos - Chicken Wings', '12.46', 'Sed ante. Vivamus tortor.', 'http://dummyimage.com/672x429.png/dddddd/000000'),
(0000000021, 'Tea - Herbal Orange Spice', '17.45', 'Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc.', 'http://dummyimage.com/610x325.png/ff4444/ffffff'),
(0000000022, 'Cleaner - Lime Away', '18.25', 'Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio.', 'http://dummyimage.com/741x397.png/dddddd/000000'),
(0000000023, 'Soho Lychee Liqueur', '10.19', 'Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', 'http://dummyimage.com/559x346.png/dddddd/000000'),
(0000000024, 'Cheese - Brie, Triple Creme', '18.38', 'Fusce consequat. Nulla nisl. Nunc nisl.', 'http://dummyimage.com/530x343.png/5fa2dd/ffffff'),
(0000000025, 'Mikes Hard Lemonade', '15.56', 'Sed accumsan felis. Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio.', 'http://dummyimage.com/504x392.png/dddddd/000000'),
(0000000026, 'Asparagus - Green, Fresh', '13.57', 'Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla.', 'http://dummyimage.com/584x391.png/5fa2dd/ffffff'),
(0000000027, 'Piping Jelly - All Colours', '17.10', 'Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis.', 'http://dummyimage.com/550x393.png/cc0000/ffffff'),
(0000000028, 'Mushrooms - Black, Dried', '12.29', 'Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula.', 'http://dummyimage.com/559x373.png/cc0000/ffffff'),
(0000000029, 'Bread Crumbs - Panko', '8.26', 'Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh. In hac habitasse platea dictumst.', 'http://dummyimage.com/768x430.png/cc0000/ffffff'),
(0000000030, 'Quail - Jumbo Boneless', '13.00', 'In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum.', 'http://dummyimage.com/573x311.png/dddddd/000000'),
(0000000031, 'Coffee Caramel Biscotti', '19.59', 'Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique.', 'http://dummyimage.com/529x330.png/cc0000/ffffff'),
(0000000032, 'Bread Sour Rolls', '8.09', 'Pellentesque eget nunc. Donec quis orci eget orci vehicula condimentum. Curabitur in libero ut massa volutpat convallis.', 'http://dummyimage.com/794x427.png/ff4444/ffffff'),
(0000000033, 'Buffalo - Tenderloin', '18.92', 'Ut tellus. Nulla ut erat id mauris vulputate elementum. Nullam varius. Nulla facilisi.', 'http://dummyimage.com/557x366.png/ff4444/ffffff'),
(0000000034, 'Fish - Scallops, Cold Smoked', '16.32', 'Aliquam non mauris. Morbi non lectus.', 'http://dummyimage.com/686x364.png/dddddd/000000'),
(0000000035, 'Cheese - Cheddar, Mild', '18.35', 'Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus.', 'http://dummyimage.com/748x338.png/dddddd/000000'),
(0000000036, 'Appetizer - Shrimp Puff', '7.78', 'Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus.', 'http://dummyimage.com/731x412.png/cc0000/ffffff'),
(0000000037, 'Veal - Brisket, Provimi,bnls', '12.89', 'Nunc rhoncus dui vel sem. Sed sagittis.', 'http://dummyimage.com/538x302.png/dddddd/000000'),
(0000000038, 'Soup - Campbells Mac N Cheese', '18.48', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis.', 'http://dummyimage.com/594x375.png/5fa2dd/ffffff'),
(0000000039, 'Soup - Knorr, Country Bean', '10.02', 'Nulla justo. Aliquam quis turpis eget elit sodales scelerisque.', 'http://dummyimage.com/614x427.png/5fa2dd/ffffff'),
(0000000040, 'Chicken - Whole', '18.56', 'Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio. Curabitur convallis. Duis consequat dui nec nisi volutpat eleifend.', 'http://dummyimage.com/750x444.png/ff4444/ffffff'),
(0000000041, 'Flavouring Vanilla Artificial', '5.47', 'In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt.', 'http://dummyimage.com/792x422.png/ff4444/ffffff'),
(0000000042, 'Petit Baguette', '9.69', 'Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum.', 'http://dummyimage.com/653x415.png/dddddd/000000'),
(0000000043, 'Wine - Magnotta, White', '10.40', 'Nam dui. Proin leo odio, porttitor id, consequat in, consequat ut, nulla. Sed accumsan felis.', 'http://dummyimage.com/589x396.png/dddddd/000000'),
(0000000044, 'Paper - Brown Paper Mini Cups', '12.46', 'Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', 'http://dummyimage.com/770x320.png/ff4444/ffffff'),
(0000000045, 'Sultanas', '12.10', 'In hac habitasse platea dictumst. Etiam faucibus cursus urna. Ut tellus.', 'http://dummyimage.com/549x380.png/dddddd/000000'),
(0000000046, 'Wine - White, Lindemans Bin 95', '10.98', 'Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede. Morbi porttitor lorem id ligula. Suspendisse ornare consequat lectus.', 'http://dummyimage.com/575x301.png/ff4444/ffffff'),
(0000000047, 'Seedlings - Mix, Organic', '18.72', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis.', 'http://dummyimage.com/602x361.png/ff4444/ffffff'),
(0000000048, 'Plate Pie Foil', '7.07', 'Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc.', 'http://dummyimage.com/715x441.png/5fa2dd/ffffff'),
(0000000049, 'Butter - Salted', '15.78', 'Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo. Maecenas pulvinar lobortis est.', 'http://dummyimage.com/509x428.png/5fa2dd/ffffff'),
(0000000050, 'Wine - Barolo Fontanafredda', '8.24', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante.', 'http://dummyimage.com/640x368.png/dddddd/000000');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
