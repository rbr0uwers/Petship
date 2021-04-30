-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 30. Apr 2021 um 16:54
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
-- Datenbank: `cr11_petadoption_ronnybrouwers`
--
CREATE DATABASE IF NOT EXISTS `cr11_petadoption_ronnybrouwers` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_petadoption_ronnybrouwers`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `address`
--

CREATE TABLE `address` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `street` varchar(100) NOT NULL,
  `zip` char(4) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `address`
--

INSERT INTO `address` (`id`, `street`, `zip`, `city`) VALUES
(0000000001, '93109 Northland Alley', '8047', 'Graz'),
(0000000002, '0 Dennis Lane', '8160', 'Kumberg'),
(0000000003, '8748 Buell Way', '5071', 'Salzburg'),
(0000000004, '7579 Hazelcrest Avenue', '5271', 'Burgkirchen'),
(0000000005, '3 La Follette Plaza', '8243', 'Schäffern'),
(0000000006, '45685 Esker Alley', '3282', 'St. Anton an der Jeßnitz'),
(0000000007, '7 Manufacturers Alley', '5071', 'Salzburg'),
(0000000008, '94572 Center Parkway', '8160', 'Kumberg'),
(0000000009, '56683 Pleasure Junction', '8243', 'Schäffern'),
(0000000010, '6469 Goodland Hill', '4210', 'Altenberg bei Linz'),
(0000000011, '6 Heffernan Place', '9421', 'Wolfsberg'),
(0000000012, '9351 Dwight Place', '5271', 'Burgkirchen'),
(0000000013, '3445 Elmside Crossing', '8453', 'Großklein'),
(0000000014, '34 West Avenue', '4174', 'Niederwaldkirchen'),
(0000000015, '23820 Doe Crossing Drive', '9580', 'Villach'),
(0000000026, 'dsfasdf 123', '1234', 'Vienna'),
(0000000027, 'asdfdsf', '1234', 'asdf'),
(0000000028, 'Wallenstein Str.20', '1200', 'Wien'),
(0000000029, 'Am Schloss 22', '3400', 'Hortenstein');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pet`
--

CREATE TABLE `pet` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `birthdate` date NOT NULL,
  `breed` varchar(50) NOT NULL,
  `size` enum('small','large') NOT NULL,
  `aid` int(10) UNSIGNED ZEROFILL NOT NULL,
  `uid` int(10) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `pet`
--

INSERT INTO `pet` (`id`, `name`, `image`, `description`, `birthdate`, `breed`, `size`, `aid`, `uid`) VALUES
(0000000016, 'Marika', '608c14925bc05.jpg', 'Suspendisse potenti. In eleifend quam a odio. In hac habitasse platea dictumst. Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem. Quisque ut erat. Curabitur gravida nisi at nibh.', '2005-09-17', 'Monkey, rhesus', 'large', 0000000001, NULL),
(0000000017, 'Sholom', '608c156990ee3.jpg', 'Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo. Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam.', '2010-12-14', 'Openbill stork', 'large', 0000000002, NULL),
(0000000018, 'Filia', '608c15e4e4755.jpg', 'Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.', '2015-12-15', 'Cat, european wild', 'large', 0000000003, NULL),
(0000000019, 'Ugo', '608c1691d66fb.jpg', 'Cras in purus eu magna vulputate luctus. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus vestibulum sagittis sapien. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue.', '2013-10-12', 'Toddy cat', 'small', 0000000004, NULL),
(0000000020, 'Pauletta', '608c1658f120b.jpg', 'Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo. In hac habitasse platea dictumst.', '2007-09-28', 'Bleu, red-cheeked cordon', 'small', 0000000005, NULL),
(0000000021, 'Cash', '608c16fbac8d4.jpg', 'Maecenas pulvinar lobortis est. Phasellus sit amet erat. Nulla tempus. Vivamus in felis eu sapien cursus vestibulum. Proin eu mi.', '2016-08-07', 'Otter, canadian river', 'large', 0000000006, NULL),
(0000000023, 'Samantha', '608c1728d58d6.jpg', 'Cras non velit nec nisi vulputate nonummy. Maecenas tincidunt lacus at velit. Vivamus vel nulla eget eros elementum pellentesque. Quisque porta volutpat erat. Quisque erat eros, viverra eget, congue eget, semper rutrum, nulla. Nunc purus. Phasellus in felis.', '2016-12-31', 'Stork, woolly-necked', 'large', 0000000008, NULL),
(0000000024, 'Fayth', '608c175880cff.jpg', 'Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti.', '2007-08-05', 'Hartebeest, red', 'large', 0000000009, NULL),
(0000000026, 'Kalila', '608c1782ae89f.jpg', 'Aenean sit amet justo. Morbi ut odio. Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices.', '2010-05-05', 'Tortoise, burmese black mountain', 'large', 0000000011, NULL),
(0000000027, 'Reamonn', '608c17e34f789.jpg', 'Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est.', '2013-03-19', 'Lemur, brown', 'small', 0000000012, NULL),
(0000000028, 'Suzette', '608c18229eddc.jpg', 'Cras mi pede, malesuada in, imperdiet et, commodo vulputate, justo. In blandit ultrices enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue. Vivamus metus arcu, adipiscing molestie, hendrerit at, vulputate vitae, nisl. Aenean lectus. Pellentesque eget nunc.', '2011-02-15', 'Gecko, bent-toed', 'large', 0000000013, NULL),
(0000000029, 'Candace', '608c1851325e5.jpg', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum.', '2005-05-27', 'Fox, savanna', 'small', 0000000014, NULL),
(0000000030, 'Daniele', '608c18b1d2e11.jpg', 'Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat. In congue. Etiam justo.', '2006-12-06', 'Eastern cottontail rabbit', 'small', 0000000015, NULL),
(0000000035, 'Olivette', '608c1951c1e88.jpg', 'Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet. Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl.', '2018-07-26', 'Malay squirrel', 'small', 0000000028, NULL),
(0000000036, 'Antonia', '608c19c039030.jpg', 'Vivamus in felis eu sapien cursus vestibulum. Proin eu mi. Nulla ac enim. In tempor, turpis nec euismod scelerisque, quam turpis adipiscing lorem, vitae mattis nibh ligula nec sem. Duis aliquam convallis nunc. Proin at turpis a pede posuere nonummy. Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue.', '2020-01-07', 'Glider, feathertail', 'small', 0000000029, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `fName`, `lName`, `email`, `password`, `status`) VALUES
(0000000001, 'John', 'Doe', 'j.doe@acme.com', '$2y$10$N4FT/vnJaEsMScofv.H5J.8Wjo7s6o6dtSoq3LHAnYbtTRmNknC3q', 'admin');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `pet`
--
ALTER TABLE `pet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `aid` (`aid`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `address`
--
ALTER TABLE `address`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT für Tabelle `pet`
--
ALTER TABLE `pet`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `pet`
--
ALTER TABLE `pet`
  ADD CONSTRAINT `FK_pet_address` FOREIGN KEY (`aid`) REFERENCES `address` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_pet_user` FOREIGN KEY (`uid`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
