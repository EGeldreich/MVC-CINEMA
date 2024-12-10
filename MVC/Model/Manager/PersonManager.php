<?php

namespace Model\Manager;
use Model\Connect;

class PersonManager {
    public function getDirectors(){
        $pdo = Connect::seConnecter();
        $request = $pdo->query("
            SELECT CONCAT(p.first_name, ' ', p.last_name) AS director
            FROM person p
            INNER JOIN director d ON p.id_person = d.id_person;
        ");
        $directors = $request->fetchAll();
        return $directors;
    }
    public function getActors(){
        $pdo = Connect::seConnecter();
        $request = $pdo->query("
            SELECT CONCAT(p.first_name, ' ', p.last_name) AS actor
            FROM person p
            INNER JOIN actor a ON p.id_person = a.id_person;
        ");
        $actors = $request->fetchAll();
        return $actors;
    }

    public function getPerson(){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            SELECT 
                CONCAT(p.first_name, ' ', p.last_name) AS person,
                p.sex,
                p.birth_date
            FROM person p
            WHERE p.id_person = :id;
        ");
        $request->execute(["id"->$id]);
        $person = $request->fetch();
        return $actors;
    }
    public function getDirected(){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            SELECT
                f.title,
                f.release_date,
                f.rating
            FROM film f
                INNER JOIN director d ON f.id_director = d.id_director
                INNER JOIN person p ON d.id_person = p.id_person
            WHERE p.id_person = :id;
        ");
        $request->execute(["id"->$id]);
        $directed = $request->fetchAll();
        return $directed;
    }
    public function getPlayed(){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
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
        ");
        $request->execute(["id"->$id]);
        $played = $request->fetchAll();
        return $played;
    }
}