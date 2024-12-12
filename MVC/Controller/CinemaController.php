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
        $genres = $genreManager->getgenres();
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
        require "View/Content/formList.php";
    }
    // ADD GENRE
    public function addGenre() {
        // Check if the form has been correctly submitted
        if(isset($_POST['submit'])){
            // Sanitize the input
            $genreName = filter_input(INPUT_POST, "gname", FILTER_SANITIZE_SPECIAL_CHARS);

            if($genreName){ // IF sanitize returns a correct variable
                $contentManager = new ContentManager();
                $addGenre = $contentManager->addGenre($genreName);
                header('location: index.php?action=GenreList');
                exit();
            } else {
                header('location: ./View/Content/errorLanding.php');
            }
        }
    }
    // ADD PERSON
    public function addPerson() {
        // Check if the form has been correctly submitted
        if(isset($_POST['submit'])){
            // Sanitize the input
            $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_SPECIAL_CHARS);
            $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_SPECIAL_CHARS);
            $persongenre = filter_input(INPUT_POST, "persongenre", FILTER_SANITIZE_SPECIAL_CHARS);
            $birthdate = filter_input(INPUT_POST, "birthdate", FILTER_SANITIZE_SPECIAL_CHARS);
            var_dump($firstname, $lastname, $persongenre, $birthdate);

            if($firstname && $lastname && $persongenre && $birthdate){ // IF sanitize returns a correct variable
                $person = [
                    "firstname" => $firstname,
                    "lastname" => $lastname,
                    "persongenre" => $persongenre,
                    "birthdate" => $birthdate
                ];

                $contentManager = new ContentManager();
                $person = $contentManager->addPerson($person);
                header('location: index.php?action=ActorList');
                exit();
            } else {
                header('location: ./View/Content/errorLanding.php');
            }
        }
    }
}