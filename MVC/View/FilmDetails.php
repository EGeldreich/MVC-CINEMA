<?php ob_start(); ?>

<div class="film-info flex-row">
    <!-- GENRES HERE-->
    <p><?= $film['duration'] ?></p>
    <strong><?= $film['rating'] ?></strong>
    <p><?= $film['release_date'] ?></p>
</div>

<p><?= $film['synopsis'] ?></p>

<?php

    $title = 'TMH '.$film['title'];
    $secondary_title = $film['title'];
    $content = ob_get_clean();
    require_once "view/template.php";

?>