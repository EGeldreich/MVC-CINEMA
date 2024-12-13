<?php

// CinemaController handles the corresponding requests, asked from index.php and answered by the according Manager

namespace Controller; // The namespace is a domain in which variable names must be unique

// Calls the namespaces from other files
use Model\Connect;
use Model\Manager\FilmManager;
use Model\Manager\PersonManager;
use Model\Manager\CharacterManager;
use Model\Manager\GenreManager;
use Model\Manager\ContentManager;

// Create CinemaController Class
class CinemaController {
    // ----- LISTS -----
    // FILM LIST
    public function filmList() {
        $filmManager = new FilmManager();
        $films = $filmManager->getFilms();
        require "View/Film/filmList.php";
    }
    // ACTOR LIST
    public function actorList() {
        $actorManager = new PersonManager();
        $actors = $actorManager->getActors();
        require "View/Person/actorList.php";
    }
    // DIRECTOR LIST
    public function directorList() {
        $directorManager = new PersonManager();
        $directors = $directorManager->getDirectors();
        require "View/Person/directorList.php";
    }
    // CHARACTER LIST
    public function characterList() {
        $characterManager = new CharacterManager();
        $characters = $characterManager->getCharacters();
        require "View/Character/characterList.php";
    }
    // GENRE LIST 
    public function genreList() {
        $genreManager = new GenreManager();
        $genres = $genreManager->getGenres();
        require "View/Film/genreList.php";
    }
    // ----- DETAILS -----
    // FILM DETAILS
    public function filmDetails($id) {
        $filmManager = new FilmManager();
        $film = $filmManager->getFilm($id);
        $castings = $filmManager->getCastings($id);
        $directors = $filmManager->getDirectors($id);
        $genres = $filmManager->getGenres($id);
        require "View/Film/filmDetails.php";
    }
    // PERSON DETAILS
    public function personDetails($id) {
        $personManager = new PersonManager();
        $isActor = $personManager->getisActor($id);
        $isDirector = $personManager->getisDirector($id);
        $played = $personManager->getPlayed($id);
        $person = $personManager->getPerson($id);
        $directed = $personManager->getDirected($id);
        require "View/Person/personDetails.php";
    }
    // CHARACTER DETAILS
    public function characterDetails($id) {
        $characterManager = new CharacterManager();
        $character = $characterManager->getCharacter($id);
        $films = $characterManager->getFilms($id);
        $actors = $characterManager->getActors($id);
        require "View/Character/characterDetails.php";
    }

    // ----- FORMS ------
    public function formList() {
        $personManager = new PersonManager();
        $directors = $personManager->getDirectors();
        $actors = $personManager->getActors();
        $genreManager = new GenreManager();
        $genres = $genreManager->getGenres();
        $filmManager = new FilmManager();
        $films = $filmManager->getFilms();
        $characterManager = new CharacterManager();
        $characters = $characterManager->getCharacters();
        require "View/Content/formList.php";
    }
    // ADD GENRE
    public function addGenre() {
        // Check if the form has been correctly submitted
        if(isset($_POST['submitGenre'])){
            // Sanitize the input
            $genreName = filter_input(INPUT_POST, "gname", FILTER_SANITIZE_SPECIAL_CHARS);

            if($genreName){ // IF sanitize returns a correct variable
                $contentManager = new ContentManager();
                $addGenre = $contentManager->addGenre($genreName);
                header('location: index.php?action=GenreList');
                exit();
            } else {
                header('location: ./View/Content/errorLanding.php?error=bad_input');
                exit();
            }
        }
    }
    // ADD PERSON
    public function addPerson() {
        // Check if the form has been correctly submitted
        if(isset($_POST['submitPerson'])){

            // Sanitize the input
            $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_SPECIAL_CHARS);
            $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_SPECIAL_CHARS);
            $personGenre = filter_input(INPUT_POST, "personGenre", FILTER_SANITIZE_SPECIAL_CHARS);
            $birthDate = filter_input(INPUT_POST, "birthDate", FILTER_SANITIZE_SPECIAL_CHARS);

            $allowedRoles = ['actor', 'director'];
            $submittedRoles = filter_input(INPUT_POST, 'role', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];
            $roles = array_intersect($submittedRoles, $allowedRoles);
            
            // Validate date format
            if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $birthDate)) {
                // Invalid date format
                header('location: ./View/Content/errorLanding.php?error=invalid_date');
                exit();
            }

            if($firstname && $lastname && $personGenre && $birthDate && $roles){ // IF sanitize returns a correct variable
                $person = [
                    "firstname" => $firstname,
                    "lastname" => $lastname,
                    "personGenre" => $personGenre,
                    "birthDate" => $birthDate,
                    "roles" => $roles
                ];

                $contentManager = new ContentManager();
                $idperson = $contentManager->addPerson($person);
                header('location: index.php?action=Person&id='.$idperson);
                exit();
            } else {
                header('location: ./View/Content/errorLanding.php?error=missing_fields');
                exit();
            }
        }
    }
    // ADD FILM
    public function addFilm() {
        // Check if the form has been correctly submitted
        if(isset($_POST['submitFilm'])){

            // Sanitize the input
            $title = filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS);
            $releaseDate = filter_input(INPUT_POST, "releaseDate", FILTER_SANITIZE_SPECIAL_CHARS);
            $duration = filter_input(INPUT_POST, "duration", FILTER_VALIDATE_INT);
            $director = filter_input(INPUT_POST, "director", FILTER_VALIDATE_INT);
            $rating = filter_input(INPUT_POST, "rating", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $poster = filter_input(INPUT_POST, "poster", FILTER_SANITIZE_SPECIAL_CHARS);
            $synopsis = filter_input(INPUT_POST, "synopsis", FILTER_SANITIZE_SPECIAL_CHARS);

            $genreManager = new GenreManager();
            $allowedGenres = $genreManager->getGenresList();
            $submittedGenres = filter_input(INPUT_POST, 'genre', FILTER_DEFAULT, FILTER_REQUIRE_ARRAY) ?? [];
            $genres = array_intersect($submittedGenres, $allowedGenres);

            // Validate date format
            if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $releaseDate)) {
                // Invalid date format
                header('location: ./View/Content/errorLanding.php?error=invalid_date');
                exit();
            }

            if($title && $releaseDate && $duration && $director && $rating && $poster && $synopsis && $genres){
                // IF sanitize returns a correct variable and if director is a known person
                $film = [
                    "title" => $title,
                    "releaseDate" => $releaseDate,
                    "duration" => $duration,
                    "idDirector" => $director,
                    "rating" => $rating,
                    "poster" => $poster,
                    "synopsis" => $synopsis,
                    "genres" => $genres
                ];
                
                $contentManager = new ContentManager();
                $idfilm = $contentManager->addFilm($film);
                header('location: index.php?action=Film&id='.$idfilm);
                exit();

            } else {
                // header('location: ./View/Content/errorLanding.php');
            }
        }
    }
}