<?php ob_start(); 
?>

<table>
    <thead>
        <tr>
            <th>Actors</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($actors as $actor) { ?>
                <tr>
                    <td><?= $actor['actor'] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

    $title = "TMH - Actors";
    $secondary_title = "Actors";
    $content = ob_get_clean();
    require_once "View/template.php";
    
?>