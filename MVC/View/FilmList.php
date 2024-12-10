<?php ob_start(); 
?>

<!-- <p> Il y a films</p> -->

<table>
    <thead>
        <tr>
            <th>TITLE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($films as $film) { ?>
                <tr>
                    <td><?= $film['titre'] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

    $title = "All movies";
    $secondary_title = "All movies";
    $content = ob_get_clean();
    require "View/Template.php";
    
?>