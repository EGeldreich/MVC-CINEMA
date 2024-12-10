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
    public function filmDetails() {
        $filmManager = new FilmManager();
        $film = $filmManager->getFilm();
        $castings = $filmManager->getCastings();
        $genres = $filmManager->getGenres();
        require "view/filmDetails.php";
    }
    // PERSON DETAILS
    public function personDetails() {
        $personManager = new PersonManager();
        $person = $personManager->getPerson();
        $directed = $personManager->getDirected();
        $played = $personManager->getPlayed();
        require "view/personDetails.php";
    }
    // CHARACTER DETAILS
    public function characterDetails() {
        $characterManager = new CharacterManager();
        $character = $characterManager->getCharacter();
        $films = $characterManager->getFilms();
        $actors = $characterManager->getActors();
        require "view/characterDetails.php";
    }
}