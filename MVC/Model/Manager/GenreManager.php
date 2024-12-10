<?php

namespace Model\Manager;
use Model\Connect;

class GenreManager {
    public function getGenres(){
        $pdo = Connect::seConnecter();
        $request = $pdo->query("
            SELECT 
                g.genre_name,
                COUNT(gf.id_film) AS number_of_films
            FROM genre g
                INNER JOIN genre_film gf ON g.id_genre = gf.id_genre
            GROUP BY g.id_genre, g.genre_name
            ORDER BY number_of_films DESC;
        ");
        $genres = $request->fetchAll();
        return $genres;
    }


    // public function getCastings(){
    //     $pdo = Connect::seConnecter();
    //     $request = $pdo->prepare("
    //         SELECT 
    //             CONCAT(p.first_name, ' ', p.last_name) AS actor,
    //             mc.character_name
    //         FROM film f
    //             INNER JOIN casting c ON f.id_film = c.id_film
    //             INNER JOIN actor a ON c.id_actor = a.id_actor
    //             INNER JOIN movie_character mc ON c.id_movie_character = mc.id_movie_character
    //             INNER JOIN person p ON a.id_person = p.id_person
    //         WHERE f.id_film = :id;
    //     ");
    //     $request->execute(["id" -> $id]);
    //     $castings = $request->fetchAll();
    //     return $castings;
    // }
}