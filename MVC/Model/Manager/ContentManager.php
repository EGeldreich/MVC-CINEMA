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
            VALUES (DEFAULT, :lastname, :firstname, :personGenre, :birthDate)
        ");
        $request->execute([
            "lastname" => $person['lastname'],
            "firstname" => $person['firstname'],
            "personGenre" => $person['personGenre'],
            "birthDate" => $person['birthDate']
        ]);
    }

    // ADD FILM
    public function addFilm($film){
        $pdo = Connect::seConnecter();
        $request = $pdo->prepare("
            INSERT INTO film
                (id_film, title, release_date, duration, synopsis, rating, poster, id_director)
            VALUES
                (DEFAULT,
                :title,
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
    }
}