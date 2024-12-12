<?php ob_start(); ?>
<h1 class="oswald">Characters</h1>
<table>
    <thead>
        <tr>
            <th>Characters</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($characters as $character) { ?>
                <tr>
                    <td><?= $character['name'] ?></td>
                </tr>
            <?php } ?>
    </tbody>
</table>

<?php

    $title = "TMH - Characters";
    $content = ob_get_clean();
    require_once "View/template.php";
    
?>