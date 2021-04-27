-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 27. Apr 2021 um 13:01
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
-- Datenbank: `crud_library`
--
CREATE DATABASE IF NOT EXISTS `crud_library` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `crud_library`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `author`
--

CREATE TABLE `author` (
  `aid` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `author`
--

INSERT INTO `author` (`aid`, `fname`, `lname`) VALUES
(0000000001, 'Gabriellia', 'Lavery'),
(0000000002, 'Janith', 'Bazoche'),
(0000000003, 'Glenda', 'Clewlow'),
(0000000004, 'Terri', 'Borzoni'),
(0000000005, 'Darryl', 'Dregan'),
(0000000006, 'Windy', 'Eakins'),
(0000000007, 'Thurston', 'Eustanch'),
(0000000008, 'Leonore', 'Hulls'),
(0000000009, 'Park', 'Downgate'),
(0000000010, 'Nikola', 'Heisman'),
(0000000011, 'Kelsey', 'Mowling'),
(0000000012, 'Eartha', 'Stonhouse'),
(0000000013, 'Kristin', 'Youthead'),
(0000000014, 'Deanna', 'Cleare'),
(0000000015, 'Harlen', 'Joliffe');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `media`
--

CREATE TABLE `media` (
  `mid` int(10) UNSIGNED ZEROFILL NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `isbn` char(13) NOT NULL,
  `description` text NOT NULL,
  `pub_date` date NOT NULL,
  `isAvailable` tinyint(1) NOT NULL,
  `type` enum('book','cd','dvd','') NOT NULL,
  `pid` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `media`
--

INSERT INTO `media` (`mid`, `title`, `image`, `isbn`, `description`, `pub_date`, `isAvailable`, `type`, `pid`) VALUES
(0000000001, 'Darkness on the Edge of Town', '6086b367bd05b.jpg', '939882294-6', 'Fusce consequat. Nulla nisl. Nunc nisl.', '2009-06-13', 0, 'cd', 0000000005),
(0000000002, 'Phases and Stages', '6086b38a31a94.jpg', '090130573-1', 'Duis consequat dui nec nisi volutpat eleifend.', '2019-12-22', 1, 'cd', 0000000003),
(0000000003, 'To Kill a Mockingbird', '6086b3ac8b428.jpg', '387082462-X', 'Vivamus vestibulum sagittis sapien.', '2019-06-08', 0, 'book', 0000000001),
(0000000004, 'The Godfather', '6086b3c27b1f6.jpg', '175582512-9', 'Etiam pretium iaculis justo. In hac habitasse platea dictumst.', '2017-08-11', 0, 'dvd', 0000000003),
(0000000005, 'Rumours ', '6086b3df0dd6a.jpg', '544353230-8', 'Vivamus tortor.', '2014-04-16', 0, 'cd', 0000000007),
(0000000006, 'Do the Right Thing', '6086b3ee712d0.jpg', '629969551-X', 'Curabitur gravida nisi at nibh.', '2006-08-23', 1, 'dvd', 0000000001),
(0000000007, '1984', '6086b4220c81b.jpg', '544090093-4', 'Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', '2017-07-15', 1, 'book', 0000000010),
(0000000008, 'Citizen Kane', '6086b432ea861.jpg', '892277151-8', 'Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '2019-05-28', 0, 'dvd', 0000000010),
(0000000009, 'Harry Potter and the Philosopher`s Stone', '6086b6e1bcc9b.jpg', '491978166-0', 'Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia.', '2009-01-25', 1, 'book', 0000000003),
(0000000010, 'C`est Si Bon ', '6086b71298d95.jpg', '247519464-2', 'Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis.', '2020-07-17', 0, 'cd', 0000000004),
(0000000011, 'The Lord of the Rings', '6086b744c1052.jpg', '576403633-X', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue.', '2015-07-31', 0, 'book', 0000000009),
(0000000012, 'Is This It', '6086b804ef2ca.jpg', '090840491-3', 'Quisque id justo sit amet sapien dignissim vestibulum.', '2013-02-23', 0, 'cd', 0000000010),
(0000000013, 'The Great Gatsby', '6086b8ecb25b6.jpg', '018435669-5', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', '2012-05-31', 1, 'book', 0000000001),
(0000000014, 'Pride and Prejudice', '6086b91d3a01f.png', '984937023-8', 'Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl.', '2017-02-24', 1, 'book', 0000000005),
(0000000015, 'The Diary Of A Young Girl', '6086b932bd8c1.jpg', '561361622-1', 'Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante.', '2014-05-31', 0, 'book', 0000000001),
(0000000016, 'Before Sunrise', '6086b94284672.jpg', '971322155-9', 'Maecenas rhoncus aliquam lacus.', '2009-11-28', 0, 'dvd', 0000000007),
(0000000017, 'The Book Thief', '6086b952ac53a.jpg', '181635668-9', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', '2020-01-26', 0, 'book', 0000000001),
(0000000018, 'Boyhood', '6086b960f343d.jpg', '072858108-6', 'Morbi non quam nec dui luctus rutrum.', '2009-07-03', 1, 'dvd', 0000000007),
(0000000019, '2001: A Space Odyssey', '6086b971def22.png', '051776954-9', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue.', '2013-08-28', 0, 'dvd', 0000000004),
(0000000020, 'The Rules of the Game', '6086b98d78b4b.jpg', '104323308-3', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', '2018-11-20', 0, 'dvd', 0000000001),
(0000000021, 'Fahrenheit 451', '6086b99b419cd.jpg', '380474465-6', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '2007-01-22', 1, 'book', 0000000010),
(0000000022, 'Toy Story', '6086b9a6b8bf7.jpg', '437659282-X', 'Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '2008-10-16', 1, 'dvd', 0000000007),
(0000000023, 'Psycho', '6086b9b50f0d7.jpg', '604792349-6', 'Proin at turpis a pede posuere nonummy.', '2011-03-04', 0, 'dvd', 0000000010),
(0000000024, 'Hotel California', '6086b9dd42df5.jpg', '319578883-7', 'Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo.', '2014-01-20', 1, 'cd', 0000000009),
(0000000025, 'Jane Eyre', '6086b2f4e8479.jpg', '702029209-7', 'Donec quis orci eget orci vehicula condimentum.', '2010-07-03', 1, 'book', 0000000004);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `media_author`
--

CREATE TABLE `media_author` (
  `mid` int(10) UNSIGNED ZEROFILL NOT NULL,
  `aid` int(10) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `media_author`
--

INSERT INTO `media_author` (`mid`, `aid`) VALUES
(0000000001, 0000000001),
(0000000001, 0000000002),
(0000000002, 0000000002),
(0000000002, 0000000003),
(0000000003, 0000000003),
(0000000003, 0000000004),
(0000000004, 0000000004),
(0000000004, 0000000005),
(0000000005, 0000000005),
(0000000005, 0000000006),
(0000000006, 0000000006),
(0000000006, 0000000007),
(0000000007, 0000000007),
(0000000007, 0000000008),
(0000000008, 0000000008),
(0000000008, 0000000009),
(0000000009, 0000000009),
(0000000009, 0000000010),
(0000000010, 0000000010),
(0000000010, 0000000011),
(0000000010, 0000000014),
(0000000011, 0000000011),
(0000000011, 0000000012),
(0000000011, 0000000015),
(0000000012, 0000000012),
(0000000012, 0000000013),
(0000000013, 0000000013),
(0000000014, 0000000014),
(0000000015, 0000000015),
(0000000016, 0000000001),
(0000000017, 0000000002),
(0000000018, 0000000003),
(0000000019, 0000000004),
(0000000020, 0000000005),
(0000000021, 0000000001),
(0000000022, 0000000002),
(0000000023, 0000000003),
(0000000024, 0000000004),
(0000000025, 0000000005);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `publisher`
--

CREATE TABLE `publisher` (
  `pid` int(10) UNSIGNED ZEROFILL NOT NULL,
  `name` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `size` enum('small','medium','big','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `publisher`
--

INSERT INTO `publisher` (`pid`, `name`, `street`, `zip`, `city`, `country`, `size`) VALUES
(0000000001, 'Hoppe and Sons', '350 Banding Pass', '92056', 'Oceanside', 'United States', 'big'),
(0000000002, 'Mills, Towne and Krajcik', '18 Dayton Pass', '77228', 'Houston', 'United States', 'big'),
(0000000003, 'Hagenes-Emmerich', '1616 Schmedeman Road', '58207', 'Grand Forks', 'United States', 'medium'),
(0000000004, 'Wiegand LLC', '8 Mockingbird Drive', '74116', 'Tulsa', 'United States', 'small'),
(0000000005, 'Orn LLC', '84 Raven Park', 'BH21', 'East End', 'United Kingdom', 'small'),
(0000000006, 'Davis, Gleichner and Moen', '6 Bartillon Street', '34282', 'Bradenton', 'United States', 'big'),
(0000000007, 'Wolff and Sons', '93374 Quincy Circle', '29220', 'Columbia', 'United States', 'medium'),
(0000000008, 'Gottlieb, Gutkowski and Towne', '3429 Starling Hill', '34642', 'Seminole', 'United States', 'medium'),
(0000000009, 'Murray Inc', '3 Sauthoff Drive', '23285', 'Richmond', 'United States', 'medium'),
(0000000010, 'Gleason LLC', '5 Dixon Parkway', '90071', 'Los Angeles', 'United States', 'small');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `uid` int(10) UNSIGNED ZEROFILL NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`uid`, `fName`, `lName`, `email`, `password`, `status`) VALUES
(0000000001, 'John', 'Doe', 'j.doe@acme.com', '$2y$10$N4FT/vnJaEsMScofv.H5J.8Wjo7s6o6dtSoq3LHAnYbtTRmNknC3q', 'user'),
(0000000002, 'Admin', 'McAdminface', 'admin@crud.com', '$2y$10$wMyh04NKI261HIDXW9n2LOkcWhV4fMn6sZqn/0.5WJfEEMtnVfW3i', 'admin');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`aid`);

--
-- Indizes für die Tabelle `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `fk_publisher` (`pid`);

--
-- Indizes für die Tabelle `media_author`
--
ALTER TABLE `media_author`
  ADD PRIMARY KEY (`mid`,`aid`),
  ADD KEY `fk_media_author_author` (`aid`);

--
-- Indizes für die Tabelle `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`pid`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `author`
--
ALTER TABLE `author`
  MODIFY `aid` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT für Tabelle `media`
--
ALTER TABLE `media`
  MODIFY `mid` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT für Tabelle `publisher`
--
ALTER TABLE `publisher`
  MODIFY `pid` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `fk_media_publisher` FOREIGN KEY (`pid`) REFERENCES `publisher` (`pid`);

--
-- Constraints der Tabelle `media_author`
--
ALTER TABLE `media_author`
  ADD CONSTRAINT `fk_media_author_author` FOREIGN KEY (`aid`) REFERENCES `author` (`aid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_media_author_media` FOREIGN KEY (`mid`) REFERENCES `media` (`mid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
