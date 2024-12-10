<?php ob_start(); 
?>

<table>
    <thead>
        <tr>
            <th>Genres</th>
            <th>Films in this genre</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($genres as $genre) { ?>
                <tr>
                    <td><?= $genre['genre_name'] ?></td>
                    <td><?= $genre['number_of_films'] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

    $title = "TMH - Genres";
    $secondary_title = "Genres";
    $content = ob_get_clean();
    require_once "View/template.php";
    
?>