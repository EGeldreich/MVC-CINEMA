<?php

namespace Controller;
use Model\Connect;
use Model\Manager\FilmManager;
use Model\Manager\PersonManager;
use Model\Manager\CharacterManager;

class CinemaController {
    // ----- LISTS -----
    // FILM LIST
    public function filmList() {
        $filmManager = new FilmManager();
        $films = $filmManager->getFilms();
        require "view/FilmList.php";
    }
    // ACTOR LIST
    public function actorList() {
        $actorManager = new PersonManager();
        $actors = $actorManager->getActors();
        require "view/ActorList.php";
    }
    // DIRECTOR LIST
    public function directorList() {
        $directorManager = new PersonManager();
        $directors = $directorManager->getDirectors();
        require "view/DirectorList.php";
    }
    // CHARACTER LIST
    public function characterList() {
        $characterManager = new CharacterManager();
        $characters = $characterManager->getCharacters();
        require "view/CharacterList.php";
    }
    // ----- DETAILS -----
    // FILM DETAILS
    public function filmDetails() {
        $filmManager = new FilmManager();
        $film = $filmManager->getFilm();
        $castings = $filmManager->getCastings();
        require "view/FilmDetails.php";
    }
    // PERSON DETAILS
    public function personDetails() {
        $personManager = new PersonManager();
        $person = $personManager->getPerson();
        $directed = $personManager->getDirected();
        $played = $personManager->getPlayed();
        require "view/PersonDetails.php";
    }
    // CHARACTER DETAILS
    public function characterDetails() {
        $characterManager = new CharacterManager();
        $character = $characterManager->getCharacter();
        $films = $characterManager->getFilms();
        $actors = $characterManager->getActors();
        require "view/CharacterDetails.php";
    }
}