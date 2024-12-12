<?php ob_start(); ?>
<h1 class="oswald">Actors</h1>
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
    $content = ob_get_clean();
    require_once "View/template.php";
    
?>