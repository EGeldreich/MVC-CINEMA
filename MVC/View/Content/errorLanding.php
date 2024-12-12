<?php ob_start(); ?>
<h1 class="oswald">Shit happened</h1>


<?php

    $title = "TMH - Genres";
    $content = ob_get_clean();
    require_once "../template.php";
    
?>