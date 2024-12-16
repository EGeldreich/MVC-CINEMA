<?php

use Controller\CinemaController;
use Controller\ContentAddController;
use Controller\ContentEditController;

spl_autoload_register(function($class_name) {
    // Convert namespace separators to directory separators
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $class_name) . '.php';
    // Set the base directory for class files
    $base_dir = __DIR__ . DIRECTORY_SEPARATOR;
    // Create the full path
    $file_path = $base_dir . $file;
    
    if (file_exists($file_path)) {
        require_once $file_path;
    }
});

$ctrlCinema = new CinemaController();
$ctrlContentAdd = new ContentAddController();
$ctrlContentEdit = new ContentEditController();

$id = (isset($_GET["id"])) ? $_GET["id"] : NULL;

if(isset($_GET["action"])){
    switch ($_GET["action"]) {
        case "FilmList" : $ctrlCinema->filmList(); break;
        case "Film" : $ctrlCinema->filmDetails($id); break;
        case "ActorList" : $ctrlCinema->actorList(); break;
        case "DirectorList" : $ctrlCinema->directorList(); break;
        case "Person" : $ctrlCinema->personDetails($id); break;
        case "GenreList" : $ctrlCinema->genreList(); break;
        case "Genre" : $ctrlCinema->genreDetails($id); break;
        case "CharacterList" : $ctrlCinema->characterList(); break;
        case "Character" : $ctrlCinema->characterDetails($id); break;

        case "FormList" : $ctrlContentAdd->formList(); break;
        case "AddPerson" : $ctrlContentAdd->addPerson(); break;
        case "AddGenre" : $ctrlContentAdd->addGenre(); break;
        case "AddFilm" : $ctrlContentAdd->addFilm(); break;
        case "AddCasting" : $ctrlContentAdd->addCasting(); break;

        case "EditList" : $ctrlContentEdit->editList(); break;
        case "EditPerson" : $ctrlContentEdit->editPerson($id); break;
        case "EditGenre" : $ctrlContentEdit->editGenre($id); break;
        case "EditFilm" : $ctrlContentEdit->editFilm($id); break;
        case "EditCasting" : $ctrlContentEdit->editCasting($id); break;
    };
} else {
    $ctrlCinema->home();
};
