<?php ob_start(); ?>

<h1 class="oswald"><?= $person['person'] ?></h1>

<div class="job">
    <?php
        if($isActor[0]==1){
            echo "<p>Actor</p>";
        }
    ?>
    <?php
        if($isDirector[0]==1){
            echo "<p>Director</p>";
        }
    ?>
</div>


<?php

    $title = "TMH - Actors";
    $content = ob_get_clean();
    require_once "View/template.php";
    
?>