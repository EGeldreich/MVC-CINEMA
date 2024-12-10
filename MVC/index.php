<?php

use Controller\CinemaController;

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

$id = (isset($_GET["id"])) ? $_GET["id"] : NULL;

if(isset($_GET["action"])){
    switch ($_GET["action"]) {
        case "FilmList" : $ctrlCinema->filmList(); break;
        case "Film" : $ctrlCinema->filmDetails(); break;
        case "ActorList" : $ctrlCinema->actorList(); break;
        case "Actor" : $ctrlCinema->actorDetails(); break;
        case "DirectorList" : $ctrlCinema->directorList(); break;
        case "Director" : $ctrlCinema->directorDetails(); break;
        case "GenreList" : $ctrlCinema->genreList(); break;
        case "Genre" : $ctrlCinema->genreDetails(); break;
    };
};