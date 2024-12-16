<?php

// CinemaController handles the corresponding requests, asked from index.php and answered by the according Manager

namespace Controller; // The namespace is a domain in which variable names must be unique

// Calls the namespaces from other files
use Model\Connect;
use Model\Manager\FilmManager;
use Model\Manager\PersonManager;
use Model\Manager\CharacterManager;
use Model\Manager\GenreManager;
use Model\Manager\EditManager;

class ContentEditController {

    // EditList Page
    public function editList() {
        $personManager = new PersonManager();
        $persons = $personManager->getAllInfoPersons();

        $filmManager = new FilmManager();
        $films = $filmManager->getAllInfoFilms();

        $genreManager = new GenreManager();
        $genres = $genreManager->getAllInfoGenres();

        $characterManager = new CharacterManager();
        $characters = $characterManager->getCharacters();

        require "View/Content/editList.php";
    }

    // EDIT PERSON
    public function editPerson($id) {
        // Check if the form has been correctly submitted
        if(isset($_POST['editPerson'])){

            // Sanitize the input
            $firstname = filter_input(INPUT_POST, "firstName", FILTER_SANITIZE_SPECIAL_CHARS);
            $lastname = filter_input(INPUT_POST, "lastName", FILTER_SANITIZE_SPECIAL_CHARS);
            $personGenre = filter_input(INPUT_POST, "personGenre", FILTER_SANITIZE_SPECIAL_CHARS);
            $birthDate = filter_input(INPUT_POST, "birthDate", FILTER_SANITIZE_SPECIAL_CHARS);
            
            // Validate date format
            if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $birthDate)) {
                // Invalid date format
                header('location: ./View/Content/errorLanding.php?error=invalid_date');
                exit();
            }

            if($firstname && $lastname && $personGenre && $birthDate){ // IF sanitize returns a correct variable
                $person = [
                    "firstname" => $firstname,
                    "lastname" => $lastname,
                    "personGenre" => $personGenre,
                    "birthDate" => $birthDate,
                    "id" => $id
                ];
                // Edit the values
                $editManager = new EditManager();
                $idperson = $editManager->editPerson($person);

                // Calls everything needed for the Person Details page
                $personManager = new PersonManager();
                $isActor = $personManager->getisActor($id);
                $isDirector = $personManager->getisDirector($id);
                $played = $personManager->getPlayed($id);
                $person = $personManager->getPerson($id);
                $directed = $personManager->getDirected($id);

                header('location: index.php?action=Person&id='.$idperson);
                exit();
            } else {
                header('location: ./View/Content/errorLanding.php?error=missing_fields');
                exit();
            }
        }
    }
}