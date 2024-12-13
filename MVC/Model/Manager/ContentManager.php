<?php

// See CinemaController for info about this
namespace Model\Manager;
use Model\Connect;

class ContentManager {

    // Add NEW GENRE
    public function addGenre($genreName){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            INSERT INTO genre (genre_name)
            VALUES (:genreName);
        ");
        $request->execute(["genreName" => $genreName]);
    }

    // ADD PERSON
    public function addPerson($person) {
        $pdo = Connect::seConnecter();
        // Create new person
        $request = $pdo->prepare("
            INSERT INTO person (last_name, first_name, sex, birth_date)
            VALUES (:lastname, :firstname, :personGenre, :birthDate)
        ");
        $request->execute([
            "lastname" => $person['lastname'],
            "firstname" => $person['firstname'],
            "personGenre" => $person['personGenre'],
            "birthDate" => $person['birthDate']
        ]);
    
        $lastPersonId = $pdo->lastInsertId();

        // Create new roles for that person
    
        foreach ($person['roles'] as $role) {
            // set $table according to roles content
            $table = $role === 'actor' ? 'actor' : 'director';
            
            $sql = "INSERT INTO $table (id_person) VALUES (:lastpersonid)";
            $roleRequest = $pdo->prepare($sql);
            $roleRequest->execute(["lastpersonid" => $lastPersonId]);
        }
    
        return $lastPersonId;
    }

    // ADD FILM
    public function addFilm($film){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            INSERT INTO film
                (title, release_date, duration, synopsis, rating, poster, id_director)
            VALUES
                (:title,
                :releaseDate,
                :duration,
                :synopsis,
                :rating,
                :poster,
                :idDirector);
        ");
        $request->execute([
            "title" => $film['title'],
            "releaseDate" => $film['releaseDate'],
            "duration" => $film['duration'],
            "synopsis" => $film['synopsis'],
            "rating" => $film['rating'],
            "poster" => $film['poster'],
            "idDirector" => $film['idDirector'],
        ]);

        $lastFilmId = $pdo->lastInsertId();

        // Add genres for the film
        foreach ($film['genres'] as $genre) {
            // set $table according to roles content
            
            $idRequest = $pdo->prepare("
            SELECT id_genre
            FROM genre
            WHERE genre_name = :genre;
            ");
            $idRequest->execute(["genre" => $genre]);
            $genreId = $idRequest->fetchColumn();

            $roleRequest = $pdo->prepare("
                INSERT INTO genre_film (id_film, id_genre)
                VALUES (:idfilm, :idgenre)
            ");
            $roleRequest->execute([
                "idfilm" => $lastFilmId,
                "idgenre" => $genreId
            ]);
        }

        return $lastFilmId;
    }
}