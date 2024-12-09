-- 1 Informations d’un film (id_film) : titre, année, durée (au format HH:MM) et réalisateur
SELECT f.id_film, f.titre, f.date_sortie, DATE_FORMAT(SEC_TO_TIME(f.duree * 60), "%h:%i") AS duree, CONCAT(p.prenom, ' ', p.nom) AS realisateur
FROM film f
INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
INNER JOIN personne p ON r.id_personne = p.id_personne;

-- 2 Liste des films dont la durée excède 2h15 classés par durée (du + long au + court)
SELECT f.titre, DATE_FORMAT(SEC_TO_TIME(f.duree * 60), "%h:%i") AS duree
FROM film f
WHERE f.duree > 135
ORDER BY f.duree DESC;

-- 3 Liste des films d’un réalisateur (en précisant l’année de sortie)
SELECT CONCAT(p.prenom, ' ', p.nom) AS realisateur, f.titre, f.date_sortie
FROM film f
INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
INNER JOIN personne p ON r.id_personne = p.id_personne
WHERE r.id_realisateur = 1;

-- 4 Nombre de films par genre (classés dans l’ordre décroissant)
SELECT g.nom_genre, COUNT(gf.id_genre) AS nombre_film
FROM genre g
INNER JOIN genre_film gf
ON g.id_genre = gf.id_genre
GROUP BY g.id_genre
ORDER BY nombre_film DESC;

-- 5 Nombre de films par réalisateur (classés dans l’ordre décroissant)
SELECT CONCAT(p.prenom, ' ', p.nom) AS realisateur, COUNT(f.id_realisateur) AS nombre_film
FROM personne p
INNER JOIN realisateur r ON p.id_personne = r.id_personne
INNER JOIN film f ON r.id_realisateur = f.id_realisateur
GROUP BY r.id_realisateur
ORDER BY nombre_film DESC;

-- 6 Casting d’un film en particulier (id_film) : nom, prénom des acteurs + sexe
SELECT f.titre, CONCAT(p.prenom, ' ',p.nom) AS acteur, p.sexe, pg.nom_personnage
FROM film f
INNER JOIN casting c ON f.id_film = c.id_film
INNER JOIN acteur a ON c.id_acteur = a.id_acteur
INNER JOIN personnage pg ON c.id_personnage = pg.id_personnage
INNER JOIN personne p ON a.id_personne = p.id_personne
WHERE f.id_film = 5;


-- 7 Films tournés par un acteur en particulier (id_acteur) avec leur rôle et
-- l’année de sortie (du film le plus récent au plus ancien)
SELECT CONCAT(p.prenom, ' ',p.nom) AS acteur, pg.nom_personnage, f.titre, f.date_sortie
FROM film f
INNER JOIN casting c ON f.id_film = c.id_film
INNER JOIN acteur a ON c.id_acteur = a.id_acteur
INNER JOIN personnage pg ON c.id_personnage = pg.id_personnage
INNER JOIN personne p ON a.id_personne = p.id_personne
WHERE a.id_acteur = 1
ORDER BY f.date_sortie DESC;

-- 8 Liste des personnes qui sont à la fois acteurs et réalisateurs
SELECT CONCAT(p.prenom,' ',p.nom) AS acteurRealisateur
FROM personne p
WHERE p.id_personne IN (SELECT id_personne FROM acteur)
AND p.id_personne IN (SELECT id_personne FROM realisateur)
 

-- 9 Liste des films qui ont moins de 5 ans (classés du plus récent au plus ancien)
SELECT f.titre, f.date_sortie
FROM film f
WHERE TIMESTAMPDIFF(YEAR, f.date_sortie, CURRENT_DATE()) < 5
ORDER BY f.date_sortie DESC;

-- 10 Nombre d’hommes et de femmes parmi les acteurs
SELECT COUNT(CASE WHEN p.sexe = 'Homme' THEN 1 END) AS nbActeur, 
       COUNT(CASE WHEN p.sexe = 'Femme' THEN 1 END) AS nbActrice
FROM acteur a
INNER JOIN personne p ON a.id_personne = p.id_personne;

-- 11 Liste des acteurs ayant plus de 50 ans (âge révolu et non révolu)
SELECT CONCAT(p.prenom,' ',p.nom) AS fineWine, TIMESTAMPDIFF(YEAR, p.dateNaissance, CURRENT_DATE()) as age

FROM personne p
INNER JOIN acteur a ON p.id_personne = a.id_personne
WHERE TIMESTAMPDIFF(YEAR, p.dateNaissance, CURRENT_DATE()) > 50;

-- 12 Acteurs ayant joué dans 3 films ou plus
SELECT CONCAT(p.prenom,' ',p.nom) AS superStars, COUNT(c.id_acteur) AS nbFilms
FROM personne p
INNER JOIN acteur a ON p.id_personne = a.id_personne
INNER JOIN casting c ON a.id_acteur = c.id_acteur
GROUP BY p.id_personne
HAVING nbFilms >= 3;