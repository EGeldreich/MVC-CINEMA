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

class ContentEditController {

    // EditList Page
    public function editList() {
        $personManager = new PersonManager();
        $persons = $personManager->getAllInfoPersons();

        $filmManager = new FilmManager();
        $films = $filmManager->getAllInfoFilms();

        $genreManager = new GenreManager();
        $genres = $genreManager->getGenresList();

        $characterManager = new CharacterManager();
        $characters = $characterManager->getCharacters();

        require "View/Content/editList.php";
    }
}