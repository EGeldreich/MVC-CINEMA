-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour cinemadb
CREATE DATABASE IF NOT EXISTS `cinemadb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cinemadb`;

-- Listage de la structure de la table cinemadb. acteur
CREATE TABLE IF NOT EXISTS `acteur` (
  `id_acteur` int(11) NOT NULL AUTO_INCREMENT,
  `id_personne` int(11) NOT NULL,
  PRIMARY KEY (`id_acteur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `acteur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinemadb.acteur : ~24 rows (environ)
/*!40000 ALTER TABLE `acteur` DISABLE KEYS */;
INSERT INTO `acteur` (`id_acteur`, `id_personne`) VALUES
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
	(24, 29);
/*!40000 ALTER TABLE `acteur` ENABLE KEYS */;

-- Listage de la structure de la table cinemadb. casting
CREATE TABLE IF NOT EXISTS `casting` (
  `id_film` int(11) NOT NULL,
  `id_acteur` int(11) NOT NULL,
  `id_personnage` int(11) NOT NULL,
  PRIMARY KEY (`id_film`,`id_acteur`,`id_personnage`),
  KEY `id_acteur` (`id_acteur`),
  KEY `id_personnage` (`id_personnage`),
  CONSTRAINT `casting_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `casting_ibfk_2` FOREIGN KEY (`id_acteur`) REFERENCES `acteur` (`id_acteur`),
  CONSTRAINT `casting_ibfk_3` FOREIGN KEY (`id_personnage`) REFERENCES `personnage` (`id_personnage`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinemadb.casting : ~27 rows (environ)
/*!40000 ALTER TABLE `casting` DISABLE KEYS */;
INSERT INTO `casting` (`id_film`, `id_acteur`, `id_personnage`) VALUES
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
	(6, 24, 27);
/*!40000 ALTER TABLE `casting` ENABLE KEYS */;

-- Listage de la structure de la table cinemadb. film
CREATE TABLE IF NOT EXISTS `film` (
  `id_film` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(100) NOT NULL,
  `date_sortie` date NOT NULL,
  `duree` int(11) NOT NULL,
  `synopsis` text,
  `note` decimal(3,1) DEFAULT NULL,
  `affiche` varchar(255) DEFAULT NULL,
  `id_realisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_film`),
  KEY `id_realisateur` (`id_realisateur`),
  CONSTRAINT `film_ibfk_1` FOREIGN KEY (`id_realisateur`) REFERENCES `realisateur` (`id_realisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinemadb.film : ~6 rows (environ)
/*!40000 ALTER TABLE `film` DISABLE KEYS */;
INSERT INTO `film` (`id_film`, `titre`, `date_sortie`, `duree`, `synopsis`, `note`, `affiche`, `id_realisateur`) VALUES
	(1, 'Inception', '2010-07-16', 148, 'Dom Cobb est un voleur expérimenté dans l\'art périlleux de l\'extraction : sa spécialité consiste à s\'approprier les secrets les plus précieux d\'un individu, enfouis au plus profond de son subconscient, pendant qu\'il rêve et que son esprit est particulièrement vulnérable.', 8.8, 'inception.jpg', 1),
	(2, 'The Dark Knight', '2008-07-18', 152, 'Batman entreprend de démanteler les dernières organisations criminelles de Gotham. Mais il se heurte bientôt à un nouveau génie du crime qui répand la terreur et le chaos dans la ville : le Joker.', 9.0, 'dark_knight.jpg', 1),
	(3, 'Pulp Fiction', '1994-10-14', 154, 'L\'odyssée sanglante et burlesque de petits malfrats dans la jungle de Hollywood à travers trois histoires qui s\'entremêlent.', 8.9, 'pulp_fiction.jpg', 3),
	(4, 'Titanic', '1997-12-19', 195, 'Southampton, 10 avril 1912. Le plus grand paquebot du monde, réputé pour son insubmersibilité, le Titanic, appareille pour son premier voyage. Quatre jours plus tard, il heurte un iceberg. À son bord, un artiste pauvre et une grande bourgeoise tombent amoureux.', 7.9, 'titanic.jpg', 4),
	(5, 'The Godfather', '1972-03-24', 175, 'En 1945, à New York, les Corleone sont une des cinq familles de la mafia. Don Vito Corleone, parrain de cette famille, marie sa fille à un bookmaker. Sollozzo, parrain de la famille Tattaglia, propose à Don Vito une association dans le trafic de drogue.', 9.2, 'godfather.jpg', 5),
	(6, 'Interstellar', '2014-11-07', 169, 'Dans un futur proche, la Terre est devenue hostile pour l\'homme. Les températures baissent, les récoltes disparaissent peu à peu. Cooper, un ancien pilote de la NASA devenu agriculteur, a deux enfants. Murphy, sa fille de dix ans, est persuadée que leur maison est hantée par un fantôme.', 8.6, 'interstellar.jpg', 1);
/*!40000 ALTER TABLE `film` ENABLE KEYS */;

-- Listage de la structure de la table cinemadb. genre
CREATE TABLE IF NOT EXISTS `genre` (
  `id_genre` int(11) NOT NULL AUTO_INCREMENT,
  `nom_genre` varchar(50) NOT NULL,
  PRIMARY KEY (`id_genre`),
  UNIQUE KEY `nom_genre` (`nom_genre`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinemadb.genre : ~15 rows (environ)
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` (`id_genre`, `nom_genre`) VALUES
	(1, 'Action'),
	(8, 'Animation'),
	(6, 'Aventure'),
	(3, 'Comédie'),
	(4, 'Drame'),
	(5, 'Fantastique'),
	(14, 'Guerre'),
	(12, 'Historique'),
	(10, 'Horreur'),
	(15, 'Musical'),
	(11, 'Policier'),
	(9, 'Romance'),
	(2, 'Science-Fiction'),
	(7, 'Thriller'),
	(13, 'Western');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;

-- Listage de la structure de la table cinemadb. genre_film
CREATE TABLE IF NOT EXISTS `genre_film` (
  `id_film` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  PRIMARY KEY (`id_film`,`id_genre`),
  KEY `id_genre` (`id_genre`),
  CONSTRAINT `genre_film_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  CONSTRAINT `genre_film_ibfk_2` FOREIGN KEY (`id_genre`) REFERENCES `genre` (`id_genre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Listage des données de la table cinemadb.genre_film : ~17 rows (environ)
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
	(4, 12);
/*!40000 ALTER TABLE `genre_film` ENABLE KEYS */;

-- Listage de la structure de la table cinemadb. personnage
CREATE TABLE IF NOT EXISTS `personnage` (
  `id_personnage` int(11) NOT NULL AUTO_INCREMENT,
  `nom_personnage` varchar(50) NOT NULL,
  PRIMARY KEY (`id_personnage`),
  UNIQUE KEY `nom_personnage` (`nom_personnage`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinemadb.personnage : ~27 rows (environ)
/*!40000 ALTER TABLE `personnage` DISABLE KEYS */;
INSERT INTO `personnage` (`id_personnage`, `nom_personnage`) VALUES
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
	(9, 'Le Joker'),
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
	(20, 'Vito Corleone');
/*!40000 ALTER TABLE `personnage` ENABLE KEYS */;

-- Listage de la structure de la table cinemadb. personne
CREATE TABLE IF NOT EXISTS `personne` (
  `id_personne` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `dateNaissance` date NOT NULL,
  PRIMARY KEY (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinemadb.personne : ~29 rows (environ)
/*!40000 ALTER TABLE `personne` DISABLE KEYS */;
INSERT INTO `personne` (`id_personne`, `nom`, `prenom`, `sexe`, `dateNaissance`) VALUES
	(1, 'Nolan', 'Christopher', 'Homme', '1970-07-30'),
	(2, 'Spielberg', 'Steven', 'Homme', '1946-12-18'),
	(3, 'Tarantino', 'Quentin', 'Homme', '1963-03-27'),
	(4, 'Cameron', 'James', 'Homme', '1954-08-16'),
	(5, 'Coppola', 'Francis Ford', 'Homme', '1939-04-07'),
	(6, 'DiCaprio', 'Leonardo', 'Homme', '1974-11-11'),
	(7, 'Winslet', 'Kate', 'Femme', '1975-10-05'),
	(8, 'Bale', 'Christian', 'Homme', '1974-01-30'),
	(9, 'Ledger', 'Heath', 'Homme', '1979-04-04'),
	(10, 'Murphy', 'Cillian', 'Homme', '1976-05-25'),
	(11, 'Cotillard', 'Marion', 'Femme', '1975-09-30'),
	(12, 'Gordon-Levitt', 'Joseph', 'Homme', '1981-02-17'),
	(13, 'Page', 'Ellen', 'Femme', '1987-02-21'),
	(14, 'Hardy', 'Tom', 'Homme', '1977-09-15'),
	(15, 'Watanabe', 'Ken', 'Homme', '1959-10-21'),
	(16, 'Travolta', 'John', 'Homme', '1954-02-18'),
	(17, 'Jackson', 'Samuel L.', 'Homme', '1948-12-21'),
	(18, 'Thurman', 'Uma', 'Femme', '1970-04-29'),
	(19, 'Willis', 'Bruce', 'Homme', '1955-03-19'),
	(20, 'Zane', 'Billy', 'Homme', '1966-02-24'),
	(21, 'Pacino', 'Al', 'Homme', '1940-04-25'),
	(22, 'Brando', 'Marlon', 'Homme', '1924-04-03'),
	(23, 'Caan', 'James', 'Homme', '1940-03-26'),
	(24, 'Keaton', 'Diane', 'Femme', '1946-01-05'),
	(25, 'McConaughey', 'Matthew', 'Homme', '1969-11-04'),
	(26, 'Hathaway', 'Anne', 'Femme', '1982-11-12'),
	(27, 'Damon', 'Matt', 'Homme', '1970-10-08'),
	(28, 'Chastain', 'Jessica', 'Femme', '1977-03-24'),
	(29, 'Caine', 'Michael', 'Homme', '1933-03-14');
/*!40000 ALTER TABLE `personne` ENABLE KEYS */;

-- Listage de la structure de la table cinemadb. realisateur
CREATE TABLE IF NOT EXISTS `realisateur` (
  `id_realisateur` int(11) NOT NULL AUTO_INCREMENT,
  `id_personne` int(11) NOT NULL,
  PRIMARY KEY (`id_realisateur`),
  KEY `id_personne` (`id_personne`),
  CONSTRAINT `realisateur_ibfk_1` FOREIGN KEY (`id_personne`) REFERENCES `personne` (`id_personne`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table cinemadb.realisateur : ~5 rows (environ)
/*!40000 ALTER TABLE `realisateur` DISABLE KEYS */;
INSERT INTO `realisateur` (`id_realisateur`, `id_personne`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4),
	(5, 5),
	(6, 6);
/*!40000 ALTER TABLE `realisateur` ENABLE KEYS */;

-- Listage de la structure de la vue cinemadb. v_casting_complet
-- Création d'une table temporaire pour palier aux erreurs de dépendances de VIEW
CREATE TABLE `v_casting_complet` (
	`titre` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`acteur` VARCHAR(101) NOT NULL COLLATE 'latin1_swedish_ci',
	`role` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Listage de la structure de la vue cinemadb. v_film_complet
-- Création d'une table temporaire pour palier aux erreurs de dépendances de VIEW
CREATE TABLE `v_film_complet` (
	`titre` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
	`date_sortie` DATE NOT NULL,
	`duree` INT(11) NOT NULL,
	`note` DECIMAL(3,1) NULL,
	`realisateur` VARCHAR(101) NOT NULL COLLATE 'latin1_swedish_ci',
	`genres` TEXT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Listage de la structure de la vue cinemadb. v_casting_complet
-- Suppression de la table temporaire et création finale de la structure d'une vue
DROP TABLE IF EXISTS `v_casting_complet`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_casting_complet` AS SELECT 
    f.titre,
    CONCAT(p.prenom, ' ', p.nom) as acteur,
    pe.nom_personnage as role
FROM FILM f
JOIN CASTING c ON f.id_film = c.id_film
JOIN ACTEUR a ON c.id_acteur = a.id_acteur
JOIN PERSONNE p ON a.id_personne = p.id_personne
JOIN PERSONNAGE pe ON c.id_personnage = pe.id_personnage
ORDER BY f.titre, p.nom ;

-- Listage de la structure de la vue cinemadb. v_film_complet
-- Suppression de la table temporaire et création finale de la structure d'une vue
DROP TABLE IF EXISTS `v_film_complet`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `v_film_complet` AS SELECT 
    f.titre,
    f.date_sortie,
    f.duree,
    f.note,
    CONCAT(p.prenom, ' ', p.nom) as realisateur,
    GROUP_CONCAT(DISTINCT g.nom_genre SEPARATOR ', ') as genres
FROM FILM f
JOIN REALISATEUR r ON f.id_realisateur = r.id_realisateur
JOIN PERSONNE p ON r.id_personne = p.id_personne
LEFT JOIN GENRE_FILM gf ON f.id_film = gf.id_film
LEFT JOIN GENRE g ON gf.id_genre = g.id_genre
GROUP BY f.id_film, f.date_sortie, f.duree, f.note, realisateur ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
