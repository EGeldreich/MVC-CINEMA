<?php

// CinemaController handles the corresponding requests, asked from index.php and answered by the according Manager

namespace Controller; // The namespace is a domain in which variable names must be unique

// Calls the namespaces from other files
use Model\Connect;
use Model\Manager\FilmManager;
use Model\Manager\PersonManager;
use Model\Manager\CharacterManager;
use Model\Manager\GenreManager;

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
}