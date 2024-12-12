<?php

// See CinemaController for info about this
namespace Model\Manager;
use Model\Connect;

class CharacterManager {

    // Get all the characters
    public function getCharacters(){
        $pdo = Connect::seConnecter();
        $request = $pdo->query("
            SELECT character_name AS name
            FROM movie_character;
        ");
        $characters = $request->fetchAll();
        return $characters;
    }

    // Get info about a specific character
    public function getCharacter($id){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            SELECT character_name
            FROM movie_character
            WHERE id_movie_character = :id;
        ");
        $request->execute(["id" => $id]);
        $characters = $request->fetch();
        return $characters;
    }

    // Get list of films in which a character appeared
    public function getFilms($id){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            SELECT
                f.title,
                f.release_date,
                f.rating
            FROM film f
                INNER JOIN casting c ON f.id_film = c.id_film
                INNER JOIN movie_character mc ON c.id_movie_character = mc.id_movie_character
            WHERE mc.id_movie_character = :id;
        ");
        $request->execute(["id" => $id]);
        $films = $request->fetchAll();
        return $films;
    }

    // Get list of actors that played that role
    public function getActors($id){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            SELECT
                CONCAT(p.first_name, ' ', p.last_name) AS actor
            FROM person p
                INNER JOIN actor a ON p.id_person = a.id_person
                INNER JOIN casting c ON a.id_actor = c.id_actor
                INNER JOIN movie_character mc ON c.id_movie_character = mc.id_movie_character
            WHERE mc.id_movie_character = :id;
        ");
        $request->execute(["id" => $id]);
        $actors = $request->fetchAll();
        return $actors;
    }
}