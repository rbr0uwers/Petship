-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 24. Apr 2021 um 14:01
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
-- Datenbank: `CR10-RonnyBrouwers-BigLibrary`
--
CREATE DATABASE IF NOT EXISTS `CR10-RonnyBrouwers-BigLibrary` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `CR10-RonnyBrouwers-BigLibrary`;

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
(0000000001, 'Darkness on the Edge of Town', 'https://hips.hearstapps.com/esq.h-cdn.co/assets/cm/15/07/54da4f80dd7af_-_springsteen-darkness-edge-l-30776928.jpg', '939882294-6', 'Fusce consequat. Nulla nisl. Nunc nisl.', '2009-06-13', 0, 'cd', 0000000005),
(0000000002, 'Phases and Stages', 'https://hips.hearstapps.com/esq.h-cdn.co/assets/cm/15/05/54cb1f91dd0e3_-_willie-nelson-phases-stages-2009-lg-90129818.jpg', '090130573-1', 'Duis consequat dui nec nisi volutpat eleifend.', '2019-12-22', 1, 'cd', 0000000003),
(0000000003, 'To Kill a Mockingbird', 'https://cdn.lifehack.org/wp-content/uploads/2015/03/50-anniversary-cover1.jpg', '387082462-X', 'Vivamus vestibulum sagittis sapien.', '2019-06-08', 0, 'book', 0000000001),
(0000000004, 'The Godfather', 'https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_.jpg', '175582512-9', 'Etiam pretium iaculis justo. In hac habitasse platea dictumst.', '2017-08-11', 0, 'dvd', 0000000003),
(0000000005, 'Rumours ', 'https://img.buzzfeed.com/buzzfeed-static/static/2017-07/12/10/asset/buzzfeed-prod-fastlane-03/sub-buzz-10383-1499869515-10.jpg', '544353230-8', 'Vivamus tortor.', '2014-04-16', 0, 'cd', 0000000007),
(0000000006, 'Do the Right Thing', 'https://musicart.xboxlive.com/7/e50b1100-0000-0000-0000-000000000002/504/image.jpg', '629969551-X', 'Curabitur gravida nisi at nibh.', '2006-08-23', 1, 'dvd', 0000000001),
(0000000007, '1984', 'https://cdn.lifehack.org/wp-content/uploads/2015/03/1984.jpg', '544090093-4', 'Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.', '2017-07-15', 1, 'book', 0000000010),
(0000000008, 'Citizen Kane', 'https://images-na.ssl-images-amazon.com/images/I/91zcYtPPMOL._SY679_.jpg', '892277151-8', 'Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', '2019-05-28', 0, 'dvd', 0000000010),
(0000000009, 'Harry Potter and the Philosopher\'s Stone', 'https://cdn.lifehack.org/wp-content/uploads/2015/03/harry_potter_and_the_Sorcerers_stone_adult_usa.jpg', '491978166-0', 'Vestibulum rutrum rutrum neque. Aenean auctor gravida sem. Praesent id massa id nisl venenatis lacinia.', '2009-01-25', 1, 'book', 0000000003),
(0000000010, 'C\'est Si Bon ', 'https://img.buzzfeed.com/buzzfeed-static/static/2017-07/12/11/asset/buzzfeed-prod-fastlane-03/sub-buzz-16239-1499872338-1.jpg', '247519464-2', 'Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis.', '2020-07-17', 0, 'cd', 0000000004),
(0000000011, 'The Lord of the Rings', 'https://cdn.lifehack.org/wp-content/uploads/2015/03/9780618640157_custom-s6-c30.jpg', '576403633-X', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Proin interdum mauris non ligula pellentesque ultrices. Phasellus id sapien in sapien iaculis congue.', '2015-07-31', 0, 'book', 0000000009),
(0000000012, 'Is This It', 'https://img.buzzfeed.com/buzzfeed-static/static/2017-07/12/12/asset/buzzfeed-prod-fastlane-03/sub-buzz-20678-1499877453-1.jpg', '090840491-3', 'Quisque id justo sit amet sapien dignissim vestibulum.', '2013-02-23', 0, 'cd', 0000000010),
(0000000013, 'The Great Gatsby', 'https://cdn.lifehack.org/wp-content/uploads/2015/03/Penguin-2.jpg', '018435669-5', 'Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci. Mauris lacinia sapien quis libero.', '2012-05-31', 1, 'book', 0000000001),
(0000000014, 'Pride and Prejudice', 'https://cdn.lifehack.org/wp-content/uploads/2015/03/pride_and_prejudice_book_cover_by_fourblackbirds-d533108.png', '984937023-8', 'Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl.', '2017-02-24', 1, 'book', 0000000005),
(0000000015, 'The Diary Of A Young Girl', 'https://cdn.lifehack.org/wp-content/uploads/2015/03/diary-of-anne-frank-postcard-front_0.jpg', '561361622-1', 'Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante.', '2014-05-31', 0, 'book', 0000000001),
(0000000016, 'Before Sunrise', 'https://images-na.ssl-images-amazon.com/images/I/91nT75kyfmL._SL1500_.jpg', '971322155-9', 'Maecenas rhoncus aliquam lacus.', '2009-11-28', 0, 'dvd', 0000000007),
(0000000017, 'The Book Thief', 'https://cdn.lifehack.org/wp-content/uploads/2015/03/71h2sjik5al-_sl1380_.jpg', '181635668-9', 'Maecenas ut massa quis augue luctus tincidunt. Nulla mollis molestie lorem.', '2020-01-26', 0, 'book', 0000000001),
(0000000018, 'Boyhood', 'https://bloximages.chicago2.vip.townnews.com/tucson.com/content/tncms/assets/v3/editorial/2/1c/21c68bbe-08cb-11e4-9c3a-0019bb2963f4/53bf8f0e9775b.image.jpg', '072858108-6', 'Morbi non quam nec dui luctus rutrum.', '2009-07-03', 1, 'dvd', 0000000007),
(0000000019, '2001: A Space Odyssey', 'https://upload.wikimedia.org/wikipedia/en/1/11/2001_A_Space_Odyssey_%281968%29.png', '051776954-9', 'Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam vel augue.', '2013-08-28', 0, 'dvd', 0000000004),
(0000000020, 'The Rules of the Game', 'https://images-na.ssl-images-amazon.com/images/I/514quGu-sYL._SY445_.jpg', '104323308-3', 'Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus.', '2018-11-20', 0, 'dvd', 0000000001),
(0000000021, 'Fahrenheit 451', 'https://cdn.lifehack.org/wp-content/uploads/2015/03/tumblr_nd4wnpO3ZS1tv8vcro1_r1_1280.jpg', '380474465-6', 'In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '2007-01-22', 1, 'book', 0000000010),
(0000000022, 'Toy Story', 'https://www.labels4kids.com/media/catalog/product/t/o/toy_story_collection_cover_standard_cover_art.jpg', '437659282-X', 'Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo.', '2008-10-16', 1, 'dvd', 0000000007),
(0000000023, 'Psycho', 'https://i.pinimg.com/originals/71/18/35/7118350d182be5c06b1c9a6f5b2450a8.jpg', '604792349-6', 'Proin at turpis a pede posuere nonummy.', '2011-03-04', 0, 'dvd', 0000000010),
(0000000024, 'Hotel California', 'https://img.buzzfeed.com/buzzfeed-static/static/2017-07/12/10/asset/buzzfeed-prod-fastlane-02/sub-buzz-32276-1499868759-3.jpg', '319578883-7', 'Morbi quis tortor id nulla ultrices aliquet. Maecenas leo odio, condimentum id, luctus nec, molestie sed, justo.', '2014-01-20', 1, 'cd', 0000000009),
(0000000025, 'Jane Eyre', 'https://cdn.lifehack.org/wp-content/uploads/2015/03/cvr9781416500247_9781416500247_hr.jpg', '702029209-7', 'Donec quis orci eget orci vehicula condimentum.', '2010-07-03', 1, 'book', 0000000004);

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
  MODIFY `mid` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT für Tabelle `publisher`
--
ALTER TABLE `publisher`
  MODIFY `pid` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
