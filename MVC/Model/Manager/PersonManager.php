<?php

// See CinemaController for info about this
namespace Model\Manager;
use Model\Connect;

// Handle all queries related to persons
class PersonManager {

    // Get all informations
    public function getAllInfoPersons(){
        $pdo = Connect::seConnecter();
        $request = $pdo->query("
            SELECT
                p.first_name,
                p.last_name,
                p.sex,
                p.birth_date,
                p.id_person
            FROM person p
            ORDER BY p.last_name;
        ");
        $persons = $request->fetchAll();
        return $persons;
    }

    // Get the list of all persons and their birthdate
    public function getPersons(){
        $pdo = Connect::seConnecter();
        $request = $pdo->query("
            SELECT CONCAT(p.first_name, ' ', p.last_name) AS person, p.birth_date
            FROM person p;
        ");
        $persons = $request->fetchAll();
        return $persons;
    }

    // Get the list of directors and return it as $directors
    public function getDirectors(){
        $pdo = Connect::seConnecter();
        $request = $pdo->query("
            SELECT
                CONCAT(p.first_name, ' ', p.last_name) AS director,
                d.id_director
            FROM person p
            INNER JOIN director d ON p.id_person = d.id_person
            ORDER BY p.last_name;
        ");
        $directors = $request->fetchAll();
        return $directors;
    }

    // Get the list of actors and return it as $actors
    public function getActors(){
        $pdo = Connect::seConnecter();
        $request = $pdo->query("
            SELECT CONCAT(p.first_name, ' ', p.last_name) AS actor
            FROM person p
            INNER JOIN actor a ON p.id_person = a.id_person
            ORDER BY p.last_name;
        ");
        $actors = $request->fetchAll();
        return $actors;
    }

    // Get the details about a specified person
    public function getPerson($id){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            SELECT 
                CONCAT(p.first_name, ' ', p.last_name) AS person,
                p.sex,
                p.birth_date
            FROM person p
            WHERE p.id_person = :id;
        ");
        $request->execute(["id" => $id]);
        $person = $request->fetch();
        return $person;
    }

    // Check if a person is an actor or not, return 0 or 1 accordingly
    public function getIsActor($id){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            SELECT EXISTS (
                SELECT
                    p.id_person
                FROM person p
                    INNER JOIN actor a ON p.id_person = a.id_person
                WHERE p.id_person = :id
            ) AS is_actor;
        ");
        $request->execute(["id" => $id]);
        $isActor = $request->fetch();
        return $isActor;
    }

    // Check if a person is a director or not, return 0 or 1 accordingly
    public function getIsDirector($id){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            SELECT EXISTS (
                SELECT
                    p.id_person
                FROM person p
                    INNER JOIN director d ON p.id_person = d.id_person
                WHERE p.id_person = :id
            ) AS is_director;
        ");
        $request->execute(["id" => $id]);
        $isDirector = $request->fetch();
        return $isDirector;
    }

    // Get list of films directed by a specific person
    public function getDirected($id){
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
        $request->execute(["id" => $id]);
        $directed = $request->fetchAll();
        return $directed;
    }

    // Get list of films in which a specific person as played
    public function getPlayed($id){
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
        $request->execute(["id" => $id]);
        $played = $request->fetchAll();
        return $played;
    }
}