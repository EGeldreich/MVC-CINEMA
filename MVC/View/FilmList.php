<?php ob_start(); ?>
<h1 class="oswald">All movies</h1>
<table>
    <thead>
        <tr>
            <th>TITLE</th>
            <th>PARUTION</th>
            <th>RATING</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($films as $film) { ?>
                <tr>
                    <td><a href='index.php?action=Film&id=<?= ($film['id_film']) ?>'><?= ($film['title']) ?></a></td>
                    <td><?= $film['release_date'] ?></td>
                    <td><?= $film['rating'] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

    $title = "TMH - Movies";
    $content = ob_get_clean();
    require_once "View/template.php";
    
?>