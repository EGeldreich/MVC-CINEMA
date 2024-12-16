<?php

// See CinemaController for info about this
namespace Model\Manager;
use Model\Connect;

class EditManager {

    // Edit Person
    public function addGenre($genreName){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            INSERT INTO genre (genre_name)
            VALUES (:genreName);
        ");
        $request->execute(["genreName" => $genreName]);
    }

    // EDIT PERSON
    public function editPerson($person) {
        $pdo = Connect::seConnecter();
        // Create new person
        $request = $pdo->prepare("
            UPDATE person
            SET 
                last_name = :lastname,
                first_name = :firstname,
                sex = :personGenre,
                birth_date = :birthDate
            WHERE id_person = :id_person;
        ");
        $request->execute([
            "lastname" => $person['lastname'],
            "firstname" => $person['firstname'],
            "personGenre" => $person['personGenre'],
            "birthDate" => $person['birthDate'],
            "id_person" => $person['id']
        ]);
    
        return $person['id'];
    }
}