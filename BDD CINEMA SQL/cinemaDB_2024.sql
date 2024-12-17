-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Database structure listing for cinemadb
-- CREATE DATABASE IF NOT EXISTS `cinemadb` /*!40100 DEFAULT CHARACTER SET latin1 */;
-- USE `cinemadb`;
CREATE DATABASE IF NOT EXISTS `cinema_emmanuel` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cinema_emmanuel`;

-- Table structure for cinemadb.actor
CREATE TABLE IF NOT EXISTS `actor` (
  `id_actor` int(11) NOT NULL AUTO_INCREMENT,
  `id_person` int(11) NOT NULL,
  PRIMARY KEY (`id_actor`),
  KEY `id_person` (`id_person`),
  CONSTRAINT `actor_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- Data listing for cinemadb.actor: ~40 rows
/*!40000 ALTER TABLE `actor` DISABLE KEYS */;
INSERT INTO `actor` (`id_actor`, `id_person`) VALUES
	(1, 6),
	(2, 7),
	(3, 8),
	(4, 9),
	(5, 10),
	(6, 11),
	(7, 12),
	(8, 13),
	(9, 14),
	(10, 15),
	(11, 16),
	(12, 17),
	(13, 18),
	(14, 19),
	(15, 20),
	(16, 21),
	(17, 22),
	(18, 23),
	(19, 24),
	(20, 25),
	(21, 26),
	(22, 27),
	(23, 28),
	(24, 29),
	(25, 33),
	(26, 34),
	(27, 35),
	(28, 36),
	(29, 39),
	(30, 40),
	(31, 41),
	(32, 42),
	(33, 47),
	(34, 48),
	(35, 50),
	(36, 51),
	(37, 52),
	(38, 54),
	(39, 56),
	(40, 57);
/*!40000 ALTER TABLE `actor` ENABLE KEYS */;

-- Table structure for cinemadb.casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int(11) NOT NULL,
  `id_actor` int(11) NOT NULL,
  `id_movie_character` int(11) NOT NULL,
  PRIMARY KEY (`id_film`,`id_actor`,`id_movie_character`),
  KEY `id_actor` (`id_actor`),
  KEY `id_movie_character` (`id_movie_character`),
  CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`id_actor`) REFERENCES `actor` (`id_actor`),
  CONSTRAINT `casting_ibfk_3` FOREIGN KEY (`id_movie_character`) REFERENCES `movie_character` (`id_movie_character`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data listing for cinemadb.casting: ~49 rows
/*!40000 ALTER TABLE `casting` DISABLE KEYS */;
INSERT INTO `casting` (`id_film`, `id_actor`, `id_movie_character`) VALUES
	(1, 1, 1),
	(4, 1, 16),
	(4, 2, 17),
	(2, 3, 8),
	(2, 4, 9),
	(1, 5, 6),
	(2, 5, 10),
	(1, 6, 2),
	(1, 7, 3),
	(1, 8, 4),
	(1, 9, 5),
	(1, 10, 7),
	(3, 11, 12),
	(3, 12, 13),
	(3, 13, 14),
	(3, 14, 15),
	(4, 15, 18),
	(5, 16, 19),
	(5, 17, 20),
	(5, 18, 21),
	(5, 19, 22),
	(6, 20, 23),
	(6, 21, 24),
	(6, 22, 25),
	(6, 23, 26),
	(2, 24, 11),
	(6, 24, 27),
	(7, 25, 28),
	(7, 26, 29),
	(9, 28, 32),
	(10, 29, 34),
	(11, 31, 36),
	(11, 32, 37),
	(12, 30, 38),
	(12, 31, 39),
	(13, 33, 40),
	(13, 34, 41),
	(14, 35, 42),
	(14, 36, 43),
	(15, 37, 44),
	(16, 38, 45),
	(17, 40, 46),
	(18, 38, 47),
	(18, 39, 48),
	(19, 38, 49),
	(20, 35, 50);
/*!40000 ALTER TABLE `casting` ENABLE KEYS */;

-- Table structure for cinemadb.film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `release_date` date NOT NULL,
  `duration` int(11) NOT NULL,
  `synopsis` text,
  `rating` decimal(3,1) DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL,
  `id_director` int(11) NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `id_director` (`id_director`),
  CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_director`) REFERENCES `director` (`id_director`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Data listing for cinemadb.film: ~20 rows
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `title`, `release_date`, `duration`, `synopsis`, `rating`, `poster`, `id_director`) VALUES
	(1, 'Inception', '2010-07-16', 148, 'Dom Cobb is a skilled thief, the absolute best in the dangerous art of extraction, stealing valuable secrets from deep within the subconscious during the dream state when the mind is at its most vulnerable.', 8.8, 'inception.jpg', 1),
	(2, 'The Dark Knight', '2008-07-18', 152, 'Batman sets out to dismantle the remaining criminal organizations that plague Gotham. However, he soon finds himself prey to a reign of chaos unleashed by a rising criminal mastermind known to the terrified citizens of Gotham as the Joker.', 9.0, 'dark_knight.jpg', 1),
	(3, 'Pulp Fiction', '1994-10-14', 154, 'The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.', 8.9, 'pulp_fiction.jpg', 3),
	(4, 'Titanic', '1997-12-19', 195, 'Southampton, April 10, 1912. The largest ship ever built, deemed unsinkable, the Titanic sets sail on its maiden voyage. Four days later, it hits an iceberg. On board, a poor artist and a high-society woman fall in love.', 7.9, 'titanic.jpg', 4),
	(5, 'The Godfather', '1972-03-24', 175, 'In 1945 New York City, the Corleone crime family is one of the five families. Don Vito Corleone marries off his daughter to a bookmaker. Sollozzo, head of the Tattaglia family, proposes a drug business partnership to Don Vito.', 9.2, 'godfather.jpg', 5),
	(6, 'Interstellar', '2014-11-07', 169, 'In a future where Earth has become hostile to human life, crops are failing, and mankind faces extinction. Cooper, a former NASA pilot turned farmer, must leave his family to join an expedition through a wormhole in search of a new home for humanity.', 8.6, 'interstellar.jpg', 1),
	(7, 'Dune', '2021-09-15', 155, 'Paul Atreides, a brilliant and gifted young man born into a great destiny, must travel to the most dangerous planet in the universe to ensure the future of his family and his people.', 8.0, 'dune.jpg', 8),
	(8, 'The Grand Budapest Hotel', '2014-03-06', 99, 'The adventures of Gustave H, a legendary concierge at a famous European hotel between the wars, and Zero Moustafa, the lobby boy who becomes his most trusted friend.', 8.1, 'grand_budapest.jpg', 9),
	(9, 'Taxi Driver', '1976-02-08', 114, 'A mentally unstable veteran works as a nighttime taxi driver in New York City, where the perceived decadence and sleaze fuels his urge for violent action.', 8.3, 'taxi_driver.jpg', 7),
	(10, 'Fight Club', '1999-10-15', 139, 'An insomniac office worker and a devil-may-care soap maker form an underground fight club that evolves into much more.', 8.8, 'fight_club.jpg', 10),
	(11, 'La La Land', '2016-12-09', 128, 'While pursuing their dreams in Los Angeles, a jazz pianist and an aspiring actress fall in love while attempting to reconcile their aspirations for the future.', 8.0, 'la_la_land.jpg', 11),
	(12, 'Barbie', '2023-07-21', 114, 'Barbie, who lives in Barbieland, is expelled from the land for not being a perfect-looking doll. She then ventures into the human world to find true happiness.', 7.0, 'barbie.jpg', 12),
	(13, 'Raiders of the Lost Ark', '1981-06-12', 115, 'Archaeologist and adventurer Indiana Jones is hired by the U.S. government to find the Ark of the Covenant before the Nazis can obtain its awesome powers.', 8.4, 'raiders.jpg', 13),
	(14, 'A Star Is Born', '2018-10-05', 136, 'A seasoned musician discovers and falls in love with a struggling artist. As her career takes off, his personal issues and alcoholism begin to overshadow their relationship.', 7.6, 'star_is_born.jpg', 1),
	(15, 'The Whale', '2022-12-09', 117, 'A reclusive, morbidly obese English teacher attempts to reconnect with his estranged teenage daughter for one last chance at redemption.', 7.7, 'whale.jpg', 14),
	(16, 'Top Gun: Maverick', '2022-05-27', 130, 'After more than thirty years of service as a top naval aviator, Pete "Maverick" Mitchell is where he belongs, pushing the envelope as a courageous test pilot.', 8.3, 'top_gun_maverick.jpg', 15),
	(17, 'Everything Everywhere All at Once', '2022-03-25', 139, 'A Chinese immigrant gets unwittingly embroiled in an epic adventure where she must connect different versions of herself in the parallel universe to stop someone who intends to harm the multiverse.', 7.9, 'everything.jpg', 16),
	(18, 'Edge of Tomorrow', '2014-06-06', 113, 'A military officer is brought into an alien war against an extraterrestrial enemy who can reset the day and know the future. When he is enabled with the same power, he teams up with a Special Forces warrior to try and end the war.', 7.9, 'edge_of_tomorrow.jpg', 15),
	(19, 'Ready Player One', '2018-03-29', 140, 'In 2045, the world is on the brink of chaos and collapse. People find salvation in the OASIS, an expansive virtual reality universe created by James Halliday.', 7.4, 'ready_player_one.jpg', 13),
	(20, 'The Fabelmans', '2022-11-23', 151, 'Growing up in post-World War II era Arizona, young Sammy Fabelman aspires to become a filmmaker as he reaches adolescence, but he discovers a shattering family secret that will alter the course of his life forever.', 7.6, 'fabelmans.jpg', 13);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Table structure for cinemadb.genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genre`),
  UNIQUE KEY `genre_name` (`genre_name`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Data listing for cinemadb.genre: ~15 rows
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`id_genre`, `genre_name`) VALUES
	(1, 'Action'),
	(8, 'Animation'),
	(6, 'Adventure'),
	(3, 'Comedy'),
	(4, 'Drama'),
	(5, 'Fantasy'),
	(14, 'War'),
	(12, 'Historical'),
	(10, 'Horror'),
	(15, 'Musical'),
	(11, 'Crime'),
	(9, 'Romance'),
	(2, 'Science Fiction'),
	(7, 'Thriller'),
	(13, 'Western');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Table structure for cinemadb.genre_film
CREATE TABLE IF NOT EXISTS `genre_film` (
  `id_film` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  PRIMARY KEY (`id_film`,`id_genre`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `genre_film_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `genre_film_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data listing for cinemadb.genre_film: ~47 rows
/*!40000 ALTER TABLE `genre_film` DISABLE KEYS */;
INSERT INTO `genre_film` (`id_film`, `id_genre`) VALUES
	(1, 1),
	(2, 1),
	(1, 2),
	(6, 2),
	(2, 4),
	(3, 4),
	(4, 4),
	(5, 4),
	(6, 4),
	(6, 6),
	(1, 7),
	(3, 7),
	(4, 9),
	(2, 11),
	(3, 11),
	(5, 11),
	(4, 12),
	(7, 1),
	(7, 2),
	(7, 6),
	(8, 3),
	(8, 6),
	(9, 4),
	(9, 7),
	(10, 4),
	(10, 7),
	(11, 4),
	(11, 9),
	(11, 15),
	(12, 3),
	(12, 6),
	(12, 5),
	(13, 1),
	(13, 6),
	(14, 4),
	(14, 9),
	(14, 15),
	(15, 4),
	(16, 1),
	(16, 4),
	(17, 1),
	(17, 3),
	(17, 2),
	(18, 1),
	(18, 2),
	(18, 6),
	(19, 1),
	(19, 2),
	(19, 6),
	(20, 4),
	(20, 12);
/*!40000 ALTER TABLE `genre_film` ENABLE KEYS */;

-- Table structure for cinemadb.movie_character
CREATE TABLE IF NOT EXISTS `movie_character` (
  `id_movie_character` int(11) NOT NULL AUTO_INCREMENT,
  `character_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id_movie_character`),
  UNIQUE KEY `character_name` (`character_name`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- Data listing for cinemadb.movie_character: ~50 rows
/*!40000 ALTER TABLE `movie_character` DISABLE KEYS */;
INSERT INTO `movie_character` (`id_movie_character`, `character_name`) VALUES
	(11, 'Alfred Pennyworth'),
	(4, 'Ariadne'),
	(3, 'Arthur'),
	(8, 'Bruce Wayne/Batman'),
	(15, 'Butch Coolidge'),
	(18, 'Cal Hockley'),
	(1, 'Dom Cobb'),
	(24, 'Dr. Amelia Brand'),
	(25, 'Dr. Mann'),
	(5, 'Eames'),
	(10, 'Harvey Dent'),
	(16, 'Jack Dawson'),
	(23, 'Joseph Cooper'),
	(13, 'Jules Winnfield'),
	(22, 'Kay Adams'),
	(9, 'The Joker'),
	(2, 'Mal Cobb'),
	(14, 'Mia Wallace'),
	(19, 'Michael Corleone'),
	(26, 'Murphy Cooper'),
	(27, 'Professor Brand'),
	(6, 'Robert Fischer'),
	(17, 'Rose DeWitt Bukater'),
	(7, 'Saito'),
	(21, 'Sonny Corleone'),
	(12, 'Vincent Vega'),
	(20, 'Vito Corleone'),
	(28, 'Paul Atreides'),
	(29, 'Chani'),
	(30, 'M. Gustave'),
	(31, 'Zero Moustafa'),
	(32, 'Travis Bickle'),
	(33, 'Betsy'),
	(34, 'Tyler Durden'),
	(35, 'The Narrator'),
	(36, 'Sebastian'),
	(37, 'Mia'),
	(38, 'Barbie'),
	(39, 'Ken'),
	(40, 'Indiana Jones'),
	(41, 'Marion Ravenwood'),
	(42, 'Jackson Maine'),
	(43, 'Ally'),
	(44, 'Charlie'),
	(45, 'Pete Mitchell'),
	(46, 'Evelyn Wang'),
	(47, 'William Cage'),
	(48, 'Rita Vrataski'),
	(49, 'Wade Watts'),
	(50, 'Sammy Fabelman');
/*!40000 ALTER TABLE `movie_character` ENABLE KEYS */;

-- Table structure for cinemadb.person
CREATE TABLE IF NOT EXISTS `person` (
  `id_person` int(11) NOT NULL AUTO_INCREMENT,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `birth_date` date NOT NULL,
  `picture` varchar(255) NOT NULL,
  PRIMARY KEY (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- Data listing for cinemadb.person: ~59 rows
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` (`id_person`, `last_name`, `first_name`, `sex`, `birth_date`, `picture`) VALUES
	(1, 'Nolan', 'Christopher', 'Male', '1970-07-30', 'picture.jpg'),
	(2, 'Spielberg', 'Steven', 'Male', '1946-12-18', 'picture.jpg'),
	(3, 'Tarantino', 'Quentin', 'Male', '1963-03-27', 'picture.jpg'),
	(4, 'Cameron', 'James', 'Male', '1954-08-16', 'picture.jpg'),
	(5, 'Coppola', 'Francis Ford', 'Male', '1939-04-07', 'picture.jpg'),
	(6, 'DiCaprio', 'Leonardo', 'Male', '1974-11-11', 'picture.jpg'),
	(7, 'Winslet', 'Kate', 'Female', '1975-10-05', 'picture.jpg'),
	(8, 'Bale', 'Christian', 'Male', '1974-01-30', 'picture.jpg'),
	(9, 'Ledger', 'Heath', 'Male', '1979-04-04', 'picture.jpg'),
	(10, 'Murphy', 'Cillian', 'Male', '1976-05-25', 'picture.jpg'),
	(11, 'Cotillard', 'Marion', 'Female', '1975-09-30', 'picture.jpg'),
	(12, 'Gordon-Levitt', 'Joseph', 'Male', '1981-02-17', 'picture.jpg'),
	(13, 'Page', 'Ellen', 'Female', '1987-02-21', 'picture.jpg'),
	(14, 'Hardy', 'Tom', 'Male', '1977-09-15', 'picture.jpg'),
	(15, 'Watanabe', 'Ken', 'Male', '1959-10-21', 'picture.jpg'),
	(16, 'Travolta', 'John', 'Male', '1954-02-18', 'picture.jpg'),
	(17, 'Jackson', 'Samuel L.', 'Male', '1948-12-21', 'picture.jpg'),
	(18, 'Thurman', 'Uma', 'Female', '1970-04-29', 'picture.jpg'),
	(19, 'Willis', 'Bruce', 'Male', '1955-03-19', 'picture.jpg'),
	(20, 'Zane', 'Billy', 'Male', '1966-02-24', 'picture.jpg'),
	(21, 'Pacino', 'Al', 'Male', '1940-04-25', 'picture.jpg'),
	(22, 'Brando', 'Marlon', 'Male', '1924-04-03', 'picture.jpg'),
	(23, 'Caan', 'James', 'Male', '1940-03-26', 'picture.jpg'),
	(24, 'Keaton', 'Diane', 'Female', '1946-01-05', 'picture.jpg'),
	(25, 'McConaughey', 'Matthew', 'Male', '1969-11-04', 'picture.jpg'),
	(26, 'Hathaway', 'Anne', 'Female', '1982-11-12', 'picture.jpg'),
	(27, 'Damon', 'Matt', 'Male', '1970-10-08', 'picture.jpg'),
	(28, 'Chastain', 'Jessica', 'Female', '1977-03-24', 'picture.jpg'),
	(29, 'Caine', 'Michael', 'Male', '1933-03-14', 'picture.jpg'),
	(30, 'Scorsese', 'Martin', 'Male', '1942-11-17', 'picture.jpg'),
	(31, 'Villeneuve', 'Denis', 'Male', '1967-10-03', 'picture.jpg'),
	(32, 'Anderson', 'Wes', 'Male', '1969-05-01', 'picture.jpg'),
	(33, 'Chalamet', 'Timothée', 'Male', '1995-12-27', 'picture.jpg'),
	(34, 'Zendaya', 'Coleman', 'Female', '1996-09-01', 'picture.jpg'),
	(35, 'Phoenix', 'Joaquin', 'Male', '1974-10-28', 'picture.jpg'),
	(36, 'De Niro', 'Robert', 'Male', '1943-08-17', 'picture.jpg'),
	(37, 'Hanks', 'Tom', 'Male', '1956-07-09', 'picture.jpg'),
	(38, 'Portman', 'Natalie', 'Female', '1981-06-09', 'picture.jpg'),
	(39, 'Pitt', 'Brad', 'Male', '1963-12-18', 'picture.jpg'),
	(40, 'Robbie', 'Margot', 'Female', '1990-07-02', 'picture.jpg'),
	(41, 'Gosling', 'Ryan', 'Male', '1980-11-12', 'picture.jpg'),
	(42, 'Stone', 'Emma', 'Female', '1988-11-06', 'picture.jpg'),
	(43, 'Fincher', 'David', 'Male', '1962-08-28', 'picture.jpg'),
	(44, 'Chazelle', 'Damien', 'Male', '1985-01-19', 'picture.jpg'),
	(45, 'Gerwig', 'Greta', 'Female', '1983-08-04', 'picture.jpg'),
	(46, 'Spielberg', 'Steven', 'Male', '1946-12-18', 'picture.jpg'),
	(47, 'Ford', 'Harrison', 'Male', '1942-07-13', 'picture.jpg'),
	(48, 'Allen', 'Karen', 'Female', '1951-10-05', 'picture.jpg'),
	(49, 'Roberts', 'Julia', 'Female', '1967-10-28', 'picture.jpg'),
	(50, 'Cooper', 'Bradley', 'Male', '1975-01-05', 'picture.jpg'),
	(51, 'Gaga', 'Lady', 'Female', '1986-03-28', 'picture.jpg'),
	(52, 'Fraser', 'Brendan', 'Male', '1968-12-03', 'picture.jpg'),
	(53, 'Aronofsky', 'Darren', 'Male', '1969-02-12', 'picture.jpg'),
	(54, 'Cruise', 'Tom', 'Male', '1962-07-03', 'picture.jpg'),
	(55, 'Kosinski', 'Joseph', 'Male', '1974-05-03', 'picture.jpg'),
	(56, 'Blunt', 'Emily', 'Female', '1983-02-23', 'picture.jpg'),
	(57, 'Yeoh', 'Michelle', 'Female', '1962-08-06', 'picture.jpg'),
	(58, 'Kwan', 'Daniel', 'Male', '1988-02-10', 'picture.jpg'),
	(59, 'Scheinert', 'Daniel', 'Male', '1987-06-07', 'picture.jpg');
/*!40000 ALTER TABLE `person` ENABLE KEYS */;

-- Table structure for cinemadb.director
CREATE TABLE IF NOT EXISTS `director` (
  `id_director` int(11) NOT NULL AUTO_INCREMENT,
  `id_person` int(11) NOT NULL,
  PRIMARY KEY (`id_director`),
  KEY `id_person` (`id_person`),
  CONSTRAINT `director_ibfk_1` FOREIGN KEY (`id_person`) REFERENCES `person` (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Data listing for cinemadb.director: ~17 rows
/*!40000 ALTER TABLE `director` DISABLE KEYS */;
INSERT INTO `director` (`id_director`, `id_person`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4),
	(5, 5),
	(6, 6),
	(7, 30),
	(8, 31),
	(9, 32),
	(10, 43),
	(11, 44),
	(12, 45),
	(13, 46),
	(14, 53),
	(15, 55),
	(16, 58),
	(17, 59);
/*!40000 ALTER TABLE `director` ENABLE KEYS */;

-- View structure for view cinemadb.v_complete_casting
CREATE TABLE IF NOT EXISTS `v_casting_complet` (
  `title` VARCHAR(100) NOT NULL,
  `actor` VARCHAR(101) NOT NULL,
  `character_name` VARCHAR(50) NOT NULL
) ENGINE=MyISAM;

-- View structure for view cinemadb.v_complete_film
CREATE TABLE IF NOT EXISTS `v_film_complet` (
  `title` VARCHAR(100) NOT NULL,
  `release_date` DATE NOT NULL,
  `duration` INT(11) NOT NULL,
  `rating` DECIMAL(3,1) NULL,
  `director` VARCHAR(101) NOT NULL,
  `genres` TEXT NULL
) ENGINE=MyISAM;

-- View structure for view cinemadb.v_complete_casting
DROP TABLE IF EXISTS `v_casting_complet`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_casting_complet` AS SELECT 
    f.title,
    CONCAT(p.first_name, ' ', p.last_name) as actor,
    mc.character_name
FROM FILM f
JOIN CASTING cs ON f.id_film = cs.id_film
JOIN ACTOR a ON cs.id_actor = a.id_actor
JOIN PERSON p ON a.id_person = p.id_person
JOIN movie_character mc ON cs.id_movie_character = mc.id_movie_character;

-- View structure for view cinemadb.v_complete_film
DROP TABLE IF EXISTS `v_film_complet`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_film_complet` AS SELECT 
    f.title,
    f.release_date,
    f.duration,
    f.rating,
    CONCAT(p.first_name, ' ', p.last_name) as director,
    GROUP_CONCAT(DISTINCT g.genre_name SEPARATOR ', ') as genres
FROM FILM f
JOIN DIRECTOR d ON f.id_director = d.id_director
JOIN PERSON p ON d.id_person = p.id_person
LEFT JOIN GENRE_FILM gf ON f.id_film = gf.id_film
LEFT JOIN GENRE g ON gf.id_genre = g.id_genre
GROUP BY f.id_film;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
