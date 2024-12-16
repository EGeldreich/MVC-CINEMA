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

    // // ADD PERSON
    // public function addPerson($person) {
    //     $pdo = Connect::seConnecter();
    //     // Create new person
    //     $request = $pdo->prepare("
    //         INSERT INTO person (last_name, first_name, sex, birth_date)
    //         VALUES (:lastname, :firstname, :personGenre, :birthDate)
    //     ");
    //     $request->execute([
    //         "lastname" => $person['lastname'],
    //         "firstname" => $person['firstname'],
    //         "personGenre" => $person['personGenre'],
    //         "birthDate" => $person['birthDate']
    //     ]);
    
    //     $lastPersonId = $pdo->lastInsertId();

    //     // Create new roles for that person
    
    //     foreach ($person['roles'] as $role) {
    //         // set $table according to roles content
    //         $table = $role === 'actor' ? 'actor' : 'director';
            
    //         $sql = "INSERT INTO $table (id_person) VALUES (:lastpersonid)";
    //         $roleRequest = $pdo->prepare($sql);
    //         $roleRequest->execute(["lastpersonid" => $lastPersonId]);
    //     }
    
    //     return $lastPersonId;
    // }
}