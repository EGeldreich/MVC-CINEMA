<?php

namespace Controller;
use Model\Connect;
use Model\Manager\FilmManager;
use Model\Manager\PersonManager;
use Model\Manager\CharacterManager;
use Model\Manager\GenreManager;

class CinemaController {
    // ----- LISTS -----
    // FILM LIST
    public function filmList() {
        $filmManager = new FilmManager();
        $films = $filmManager->getFilms();
        require "view/filmList.php";
    }
    // ACTOR LIST
    public function actorList() {
        $actorManager = new PersonManager();
        $actors = $actorManager->getActors();
        require "view/actorList.php";
    }
    // DIRECTOR LIST
    public function directorList() {
        $directorManager = new PersonManager();
        $directors = $directorManager->getDirectors();
        require "view/directorList.php";
    }
    // CHARACTER LIST
    public function characterList() {
        $characterManager = new CharacterManager();
        $characters = $characterManager->getCharacters();
        require "view/characterList.php";
    }
    // GENRE LIST 
    public function genreList() {
        $genreManager = new GenreManager();
        $genres = $genreManager->getgenres();
        require "view/genreList.php";
    }
    // ----- DETAILS -----
    // FILM DETAILS
    public function filmDetails($id) {
        $filmManager = new FilmManager();
        $film = $filmManager->getFilm($id);
        $castings = $filmManager->getCastings($id);
        $directors = $filmManager->getDirectors($id);
        $genres = $filmManager->getGenres($id);
        require "view/filmDetails.php";
    }
    // PERSON DETAILS
    public function personDetails($id) {
        $personManager = new PersonManager();
        $isActor = $personManager->getisActor($id);
        $isDirector = $personManager->getisDirector($id);
        $played = $personManager->getPlayed($id);
        $person = $personManager->getPerson($id);
        $directed = $personManager->getDirected($id);
        require "view/personDetails.php";
    }
    // CHARACTER DETAILS
    public function characterDetails($id) {
        $characterManager = new CharacterManager();
        $character = $characterManager->getCharacter($id);
        $films = $characterManager->getFilms($id);
        $actors = $characterManager->getActors($id);
        require "view/characterDetails.php";
    }
}