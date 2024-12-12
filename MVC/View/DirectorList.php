<?php ob_start(); ?>
<h1 class="oswald">Directors</h1>
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
    $content = ob_get_clean();
    require_once "View/template.php";
    
?>