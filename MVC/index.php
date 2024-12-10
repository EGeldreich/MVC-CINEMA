<?php

use app\Controller\CinemaController;

spl_autoload_register(function($class_name) {
    include $class_name.'.php';
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
        case "RoleList" : $ctrlCinema->roleList(); break;
        case "Role" : $ctrlCinema->roleDetails(); break;
    };
};

require_once "app/View/Template.php";