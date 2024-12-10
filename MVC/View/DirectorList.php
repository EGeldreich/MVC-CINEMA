<?php ob_start(); 
?>

<table>
    <thead>
        <tr>
            <th>Directors</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($directors as $director) { ?>
                <tr>
                    <td><?= $director['director'] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

    $title = "TMH - Directors";
    $secondary_title = "Directors";
    $content = ob_get_clean();
    require_once "View/template.php";
    
?>