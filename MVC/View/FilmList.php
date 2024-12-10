<?php ob_start(); 
?>

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
                    <td><a href="index.php?action=Film&id=1"><?= htmlspecialchars($film['title']) ?></a></td>
                    <td><?= $film['release_date'] ?></td>
                    <td><?= $film['rating'] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

    $title = "TMH - Movies";
    $secondary_title = "All movies";
    $content = ob_get_clean();
    require_once "View/template.php";
    
?>