<?php ob_start(); ?>

<p> Il y a <?php $request->rowCount() ?> films</p>

<table>
    <thead>
        <tr>
            <th>TITLE</th>
            <th>RELEASE</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($request->fetchAll() as $film) {
                "<tr>
                    <td>".$film['title']."</td>
                    <td>".$film['release_date']."</td>
                    <td>".$film['rating']."</td>
                </tr>";
            } ?>
    </tbody>
</table>

<?php
    $title = "All movies";
    $secondary_title = "All movies";
    $content = ob_get_clean();
    require "view/template.php";
?>