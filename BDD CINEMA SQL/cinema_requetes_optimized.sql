-- Création des index pour optimisation
CREATE INDEX IF NOT EXISTS idx_film_realisateur ON film(id_realisateur);
CREATE INDEX IF NOT EXISTS idx_film_date_sortie ON film(date_sortie);
CREATE INDEX IF NOT EXISTS idx_film_duree ON film(duree);
CREATE INDEX IF NOT EXISTS idx_casting_film_acteur ON casting(id_film, id_acteur);

-- 1. Informations détaillées d'un film
SELECT 
    f.id_film,
    f.titre,
    f.date_sortie,
    DATE_FORMAT(SEC_TO_TIME(f.duree * 60), '%H:%i') AS duree,
    CONCAT(p.prenom, ' ', p.nom) AS realisateur
FROM film f
    INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
    INNER JOIN personne p ON r.id_personne = p.id_personne;

-- 2. Films de plus de 2h15
SELECT 
    f.titre,
    DATE_FORMAT(SEC_TO_TIME(f.duree * 60), '%H:%i') AS duree
FROM film f
WHERE f.duree > 135
ORDER BY f.duree DESC;

-- 3. Filmographie d'un réalisateur
SELECT 
    CONCAT(p.prenom, ' ', p.nom) AS realisateur,
    f.titre,
    DATE_FORMAT(f.date_sortie, '%Y') AS annee_sortie
FROM film f
    INNER JOIN realisateur r ON f.id_realisateur = r.id_realisateur
    INNER JOIN personne p ON r.id_personne = p.id_personne
WHERE r.id_realisateur = 1;

-- 4. Statistiques des films par genre
SELECT 
    g.nom_genre,
    COUNT(gf.id_film) AS nombre_films
FROM genre g
    INNER JOIN genre_film gf ON g.id_genre = gf.id_genre
GROUP BY g.id_genre, g.nom_genre
ORDER BY nombre_films DESC;

-- 5. Statistiques des films par réalisateur
SELECT 
    CONCAT(p.prenom, ' ', p.nom) AS realisateur,
    COUNT(f.id_film) AS nombre_films
FROM personne p
    INNER JOIN realisateur r ON p.id_personne = r.id_personne
    INNER JOIN film f ON r.id_realisateur = f.id_realisateur
GROUP BY p.id_personne, p.prenom, p.nom
ORDER BY nombre_films DESC;

-- 6. Distribution complète d'un film
SELECT 
    f.titre,
    CONCAT(p.prenom, ' ', p.nom) AS acteur,
    p.sexe,
    pg.nom_personnage
FROM film f
    INNER JOIN casting c ON f.id_film = c.id_film
    INNER JOIN acteur a ON c.id_acteur = a.id_acteur
    INNER JOIN personnage pg ON c.id_personnage = pg.id_personnage
    INNER JOIN personne p ON a.id_personne = p.id_personne
WHERE f.id_film = 5;

-- 7. Filmographie d'un acteur
SELECT 
    CONCAT(p.prenom, ' ', p.nom) AS acteur,
    pg.nom_personnage,
    f.titre,
    f.date_sortie
FROM film f
    INNER JOIN casting c ON f.id_film = c.id_film
    INNER JOIN acteur a ON c.id_acteur = a.id_acteur
    INNER JOIN personnage pg ON c.id_personnage = pg.id_personnage
    INNER JOIN personne p ON a.id_personne = p.id_personne
WHERE a.id_acteur = 1
ORDER BY f.date_sortie DESC;

-- 8. Acteurs-Réalisateurs (version optimisée avec JOIN)
SELECT DISTINCT 
    CONCAT(p.prenom, ' ', p.nom) AS acteur_realisateur
FROM personne p
    INNER JOIN acteur a ON p.id_personne = a.id_personne
    INNER JOIN realisateur r ON p.id_personne = r.id_personne;

-- 9. Films récents (moins de 5 ans)
SELECT 
    f.titre,
    f.date_sortie
FROM film f
WHERE f.date_sortie > DATE_SUB(CURRENT_DATE(), INTERVAL 5 YEAR)
ORDER BY f.date_sortie DESC;

-- 10. Répartition des acteurs par genre
SELECT 
    SUM(p.sexe = 'Homme') AS nombre_acteurs,
    SUM(p.sexe = 'Femme') AS nombre_actrices
FROM acteur a
    INNER JOIN personne p ON a.id_personne = p.id_personne;

-- 11. Acteurs seniors (plus de 50 ans)
SELECT 
    CONCAT(p.prenom, ' ', p.nom) AS acteur,
    TIMESTAMPDIFF(YEAR, p.dateNaissance, CURRENT_DATE()) AS age
FROM personne p
    INNER JOIN acteur a ON p.id_personne = a.id_personne
WHERE TIMESTAMPDIFF(YEAR, p.dateNaissance, CURRENT_DATE()) > 50
ORDER BY age DESC;

-- 12. Acteurs prolifiques (3 films ou plus)
SELECT 
    CONCAT(p.prenom, ' ', p.nom) AS acteur,
    COUNT(c.id_film) AS nombre_films
FROM personne p
    INNER JOIN acteur a ON p.id_personne = a.id_personne
    INNER JOIN casting c ON a.id_acteur = c.id_acteur
GROUP BY p.id_personne, p.prenom, p.nom
HAVING nombre_films >= 3
ORDER BY nombre_films DESC;
