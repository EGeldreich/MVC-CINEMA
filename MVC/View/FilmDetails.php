<?php ob_start(); ?>



<?php

    $title = "All movies";
    $secondary_title = "All movies";
    $content = ob_get_clean();
    require_once "view/template.php";

?>