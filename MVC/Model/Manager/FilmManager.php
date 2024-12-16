<?php

// See CinemaController for info about this
namespace Model\Manager;
use Model\Connect;

class FilmManager {

    // Get all informations about all films
    public function getAllInfoFilms(){
        $pdo = Connect::seConnecter();
        $request = $pdo->query("
            SELECT 
                f.id_film,
                f.title,
                f.release_date,
                f.rating,
                f.duration,
                f.synopsis,
                CONCAT(p.first_name, ' ', p.last_name) AS director
            FROM film f
                INNER JOIN director d ON f.id_director = d.id_director
                INNER JOIN person p ON d.id_person = p.id_person
        ");
        $films = $request->fetchAll();
        return $films;
    }

    // Get list of films, return it as $films
    public function getFilms(){
        $pdo = Connect::seConnecter();
        $request = $pdo->query("
            SELECT id_film, title, release_date, rating
            FROM film
            ORDER BY rating DESC;
        ");
        $films = $request->fetchAll();
        return $films;
    }

    // Get details for a specific film
    public function getFilm($id){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            SELECT 
                f.id_film,
                f.title,
                f.release_date,
                f.rating,
                DATE_FORMAT(SEC_TO_TIME(f.duration * 60), '%H:%i') AS duration,
                f.synopsis
            FROM film f
            WHERE f.id_film = :id;
        ");
        $request->execute(['id' => $id]);
        $film = $request->fetch();
        return $film;
    }

    // Get list of directors for a specific film
    public function getDirectors($id){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            SELECT 
                p.first_name,
                p.last_name
            FROM film f
                INNER JOIN director d ON f.id_director = d.id_director
                INNER JOIN person p ON d.id_person = p.id_person
            WHERE f.id_film = :id;
        ");
        $request->execute(["id" => $id]);
        $directors = $request->fetchAll();
        return $directors;
    }

    // Get casting information for a specific film
    public function getCastings($id){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            SELECT 
                p.first_name,
                p.last_name,
                mc.character_name
            FROM film f
                INNER JOIN casting c ON f.id_film = c.id_film
                INNER JOIN actor a ON c.id_actor = a.id_actor
                INNER JOIN movie_character mc ON c.id_movie_character = mc.id_movie_character
                INNER JOIN person p ON a.id_person = p.id_person
            WHERE f.id_film = :id;
        ");
        $request->execute(["id" => $id]);
        $castings = $request->fetchAll();
        return $castings;
    }

    // Get list of genres for a specific film
    public function getGenres($id){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            SELECT g.genre_name
            FROM genre g
                INNER JOIN genre_film gf ON g.id_genre = gf.id_genre
                INNER JOIN film f ON gf.id_film = f.id_film
            WHERE f.id_film = :id;
        ");
        $request->execute(["id" => $id]);
        $genres = $request->fetchAll();
        return $genres;
    }
}