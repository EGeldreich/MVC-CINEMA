<?php

// See CinemaController for info about this
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
                LEFT JOIN genre_film gf ON g.id_genre = gf.id_genre
            GROUP BY g.id_genre, g.genre_name
            ORDER BY number_of_films DESC;
        ");
        $genres = $request->fetchAll();
        return $genres;
    }

    public function getGenresList(){
        $pdo = Connect::seConnecter();
        $request = $pdo->query("
            SELECT genre_name
            FROM genre
        ");
        $genres = $request->fetchAll(\PDO::FETCH_COLUMN);
        return $genres;
    }

    public function getAllInfoGenres(){
        $pdo = Connect::seConnecter();
        $request = $pdo->query("
            SELECT 
                g.genre_name,
                g.id_genre
            FROM genre g
            ORDER BY g.genre_name;
        ");
        $genres = $request->fetchAll();
        return $genres;
    }
}