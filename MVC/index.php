<?php

use Controller\CinemaController;

spl_autoload_register(function($class_name) {
    include $class_name.'.php';
});

$ctrlCinema = new CinemaController();

if(isset($_GET["action"])){
    switch ($_GET["action"]) {
        case "FilmList" : $ctrlCinema->filmList(); break;
        case "Film" : $ctrlCinema->filmDetails(); break;
        case "ActorList" : $ctrlCinema->actorList(); break;
        case "Actor" : $ctrlCinema->actorDetails(); break;
        case "DirectorList" : $ctrlCinema->directorList(); break;
        case "Director" : $ctrlCinema->directorDetails(); break;
        case "RoleList" : $ctrlCinema->roleList(); break;
        case "Role" : $ctrlCinema->roleDetails(); break;

    };
};