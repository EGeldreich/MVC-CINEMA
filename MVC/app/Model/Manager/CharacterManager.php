<?php

namespace Model\Manager\CharacterManager;
use Model\Connect;

class CharacterManager {
    public function getCharacters(){
        $pdo = Connect::seConnecter();
        $request = $pdo->query("
            SELECT movie_character_name
            FROM movie_character;
        ");
        $characters = $request->fetchAll();
        return $characters;
    }

    public function getCharacter(){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            SELECT movie_character_name
            FROM movie_character
            WHERE id_movie_character = :id;
        ");
        $request->execute(["id"->$id]);
        $characters = $request->fetch();
        return $characters;
    }
    public function getFilms(){
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
        $request->execute(["id"->$id]);
        $films = $request->fetchAll();
        return $films;
    }
    public function getActors(){
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
        $request->execute(["id"->$id]);
        $actors = $request->fetchAll();
        return $actors;
    }
}