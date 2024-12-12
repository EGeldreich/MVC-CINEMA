<?php

// See CinemaController for info about this
namespace Model\Manager;
use Model\Connect;

class ContentManager {

    // Add NEW GENRE
    public function addGenre($genreName){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            INSERT INTO genre (id_genre, genre_name)
            VALUES (DEFAULT, :genreName);
        ");
        $request->execute(["genreName" => $genreName]);
    }

    // ADD PERSON
    public function addPerson($person){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            INSERT INTO person (id_person, last_name, first_name, sex, birth_date)
            VALUES (DEFAULT, :lastname, :firstname, :persongenre, :birthdate)
        ");
        $request->execute([
            "lastname" => $person['lastname'],
            "firstname" => $person['firstname'],
            "persongenre" => $person['persongenre'],
            "birthdate" => $person['birthdate']
        ]);
    }
}