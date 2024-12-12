-- LISTS
    -- FILM
    SELECT title, release_date, rating
    FROM film
    ORDER BY rating;

    -- ACTOR
    SELECT CONCAT(p.first_name, ' ', p.last_name) AS actor
    FROM person p
    INNER JOIN actor a ON p.id_person = a.id_person;

    -- DIRECTOR
    SELECT CONCAT(p.first_name, ' ', p.last_name) AS director
    FROM person p
    INNER JOIN director d ON p.id_person = d.id_person;

    -- MOVIE CHARATERS
    SELECT movie_character_name
    FROM movie_character;

    -- GENRES
    SELECT 
        g.genre_name,
        COUNT(gf.id_film) AS number_of_films
    FROM genre g
        INNER JOIN genre_film gf ON g.id_genre = gf.id_genre
    GROUP BY g.id_genre, g.genre_name
    ORDER BY number_of_films DESC;
-- DETAILS
    -- FILM
        -- GENERAL
        SELECT 
            f.id_film,
            f.title,
            f.release_date,
            DATE_FORMAT(SEC_TO_TIME(f.duration * 60), '%H:%i') AS duration,
            f.synopsis,
            CONCAT(p.first_name, ' ', p.last_name) AS director
        FROM film f
            INNER JOIN director d ON f.id_director = d.id_director
            INNER JOIN person p ON d.id_person = p.id_person
        WHERE f.id_film = :id;
        -- CASTING
        SELECT 
            CONCAT(p.first_name, ' ', p.last_name) AS actor,
            mc.character_name
        FROM film f
            INNER JOIN casting c ON f.id_film = c.id_film
            INNER JOIN actor a ON c.id_actor = a.id_actor
            INNER JOIN movie_character mc ON c.id_movie_character = mc.id_movie_character
            INNER JOIN person p ON a.id_person = p.id_person
        WHERE f.id_film = :id;
        -- GENRES
        SELECT g.genre_name
        FROM genre g
            INNER JOIN genre_film gf ON g.id_genre = gf.id_genre
            INNER JOIN film f ON gf.id_film = f.id_film
        WHERE f.id_film = :id;

    --PERSON
        -- GENERAL
        SELECT 
            CONCAT(p.first_name, ' ', p.last_name) AS person,
            p.sex,
            p.birth_date
        FROM person p
        WHERE p.id_person = :id;
        -- DIRECTED
        SELECT
            f.title,
            f.release_date,
            f.rating
        FROM film f
            INNER JOIN director d ON f.id_director = d.id_director
            INNER JOIN person p ON d.id_person = p.id_person
        WHERE p.id_person = :id;
        -- PLAYED
        SELECT
            f.title,
            f.release_date,
            f.rating,
            mc.character_name
        FROM film f
            INNER JOIN casting c ON f.id_film = c.id_film
            INNER JOIN actor a ON c.id_actor = a.id_actor
            INNER JOIN person p ON a.id_person = p.id_person
            INNER JOIN movie_character mc ON c.id_movie_character = mc.id_movie_character
        WHERE p.id_person = :id;
        -- ACTOR ?
        SELECT EXISTS (
            SELECT
                p.id_person
            FROM person p
                INNER JOIN actor a ON p.id_person = a.id_person
            WHERE p.id_person = :id
        ) AS is_actor;
        -- DIRECTOR ?
        SELECT EXISTS (
            SELECT
                p.id_person
            FROM person p
                INNER JOIN director d ON p.id_person = d.id_person
            WHERE p.id_person = :id
        ) AS is_director;


    -- MOVIE CHARACTER
        -- GENERAL
        SELECT movie_character_name
        FROM movie_character
        WHERE id_movie_character = :id;
        -- FILMS
        SELECT
            f.title,
            f.release_date,
            f.rating
        FROM film f
            INNER JOIN casting c ON f.id_film = c.id_film
            INNER JOIN movie_character mc ON c.id_movie_character = mc.id_movie_character
        WHERE mc.id_movie_character = :id;
        -- ACTORS
        SELECT
            CONCAT(p.first_name, ' ', p.last_name) AS actor
        FROM person p
            INNER JOIN actor a ON p.id_person = a.id_person
            INNER JOIN casting c ON a.id_actor = c.id_actor
            INNER JOIN movie_character mc ON c.id_movie_character = mc.id_movie_character
        WHERE mc.id_movie_character = :id;





-- Création des index pour optimisation
CREATE INDEX IF NOT EXISTS idx_film_director ON film(id_director);
CREATE INDEX IF NOT EXISTS idx_film_release_date ON film(release_date);
CREATE INDEX IF NOT EXISTS idx_film_duration ON film(duration);
CREATE INDEX IF NOT EXISTS idx_casting_film_actor ON casting(id_film, id_actor);

-- 1. Informations détaillées d'un film
SELECT 
    f.id_film,
    f.title,
    f.release_date,
    DATE_FORMAT(SEC_TO_TIME(f.duration * 60), '%H:%i') AS duration,
    f.synopsis,
    CONCAT(p.first_name, ' ', p.last_name) AS director
FROM film f
    INNER JOIN director d ON f.id_director = d.id_director
    INNER JOIN person p ON d.id_person = p.id_person;

--1.2 Casting d’un film
SELECT 
    CONCAT(p.first_name, ' ', p.last_name) AS actor,
    mc.character_name
FROM film f
    INNER JOIN casting c ON f.id_film = c.id_film
    INNER JOIN actor a ON c.id_actor = a.id_actor
    INNER JOIN movie_character mc ON c.id_movie_character = mc.id_movie_character
    INNER JOIN person p ON a.id_person = p.id_person
WHERE f.id_film = 1;

-- 2. Films de plus de 2h15
SELECT 
    f.title,
    DATE_FORMAT(SEC_TO_TIME(f.duration * 60), '%H:%i') AS duration
FROM film f
WHERE f.duration > 135
ORDER BY f.duration DESC;

-- 3. Filmographie d'un réalisateur
SELECT 
    CONCAT(p.first_name, ' ', p.last_name) AS director,
    f.title,
    DATE_FORMAT(f.release_date, '%Y') AS release_year
FROM film f
    INNER JOIN director d ON f.id_director = d.id_director
    INNER JOIN person p ON d.id_person = p.id_person
WHERE d.id_director = 1;

-- 4. Statistiques des films par genre
SELECT 
    g.name AS genre_name,
    COUNT(gf.id_film) AS number_of_films
FROM genre g
    INNER JOIN movie_genre gf ON g.id_genre = gf.id_genre
GROUP BY g.id_genre, g.name
ORDER BY number_of_films DESC;

-- 5. Statistiques des films par réalisateur
SELECT 
    CONCAT(p.first_name, ' ', p.last_name) AS director,
    COUNT(f.id_film) AS number_of_films
FROM person p
    INNER JOIN director d ON p.id_person = d.id_person
    INNER JOIN film f ON d.id_director = f.id_director
GROUP BY p.id_person, p.first_name, p.last_name
ORDER BY number_of_films DESC;

-- 6. Distribution complète d'un film
SELECT 
    f.title,
    CONCAT(p.first_name, ' ', p.last_name) AS actor,
    p.sex,
    ch.name AS character_name
FROM film f
    INNER JOIN casting c ON f.id_film = c.id_film
    INNER JOIN actor a ON c.id_actor = a.id_actor
    INNER JOIN character ch ON c.id_character = ch.id_character
    INNER JOIN person p ON a.id_person = p.id_person
WHERE f.id_film = 5;

-- 7. Filmographie d'un acteur
SELECT 
    CONCAT(p.first_name, ' ', p.last_name) AS actor,
    ch.name AS character_name,
    f.title,
    f.release_date
FROM film f
    INNER JOIN casting c ON f.id_film = c.id_film
    INNER JOIN actor a ON c.id_actor = a.id_actor
    INNER JOIN character ch ON c.id_character = ch.id_character
    INNER JOIN person p ON a.id_person = p.id_person
WHERE a.id_actor = 1
ORDER BY f.release_date DESC;

-- 8. Acteurs-Réalisateurs (version optimisée avec JOIN)
SELECT DISTINCT 
    CONCAT(p.first_name, ' ', p.last_name) AS actor_director
FROM person p
    INNER JOIN actor a ON p.id_person = a.id_person
    INNER JOIN director d ON p.id_person = d.id_person;

-- 9. Films récents (moins de 5 ans)
SELECT 
    f.title,
    f.release_date
FROM film f
WHERE f.release_date > DATE_SUB(CURRENT_DATE(), INTERVAL 5 YEAR)
ORDER BY f.release_date DESC;

-- 10. Répartition des acteurs par genre
SELECT 
    SUM(p.sex = 'Male') AS male_actors,
    SUM(p.sex = 'Female') AS female_actors
FROM actor a
    INNER JOIN person p ON a.id_person = p.id_person;

-- 11. Acteurs seniors (plus de 50 ans)
SELECT 
    CONCAT(p.first_name, ' ', p.last_name) AS actor,
    TIMESTAMPDIFF(YEAR, p.birth_date, CURRENT_DATE()) AS age
FROM person p
    INNER JOIN actor a ON p.id_person = a.id_person
WHERE TIMESTAMPDIFF(YEAR, p.birth_date, CURRENT_DATE()) > 50
ORDER BY age DESC;

-- 12. Acteurs prolifiques (3 films ou plus)
SELECT 
    CONCAT(p.first_name, ' ', p.last_name) AS actor,
    COUNT(c.id_film) AS number_of_films
FROM person p
    INNER JOIN actor a ON p.id_person = a.id_person
    INNER JOIN casting c ON a.id_actor = c.id_actor
GROUP BY p.id_person, p.first_name, p.last_name
HAVING number_of_films >= 3
ORDER BY number_of_films DESC;
