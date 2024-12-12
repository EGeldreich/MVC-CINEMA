<?php ob_start(); ?>
<h1 class="oswald">Add content</h1>

<div class="form-list flex-row">
    <button id="addGenre">Add Genre</button>
    <button id="addFilm">Add Film</button>
    <button id="addPerson">Add Person</button>
    <button id="addCasting">Add Casting</button>

</div>
<!-- Genre -->
<div class="genre-form">
    <form method="post" action="index.php?action=addGenre">
        <label for="gname">New Genre</label>
        <input type="text" id="gname" name="gname" placeholder="Genre name" required>

        <input type="submit" value="Submit" name="submit">
    </form>
</div>
<!-- Person -->
<div class="person-form">
    <form method="post" action="index.php?action=addPerson">
        <label for="firstname">First name</label>
        <input type="text" id="firstname" name="firstname" placeholder="First name" required>
        
        <label for="lastname">Last name</label>
        <input type="text" id="lastname" name="lastname" placeholder="Last name" required>

        <label for="persongenre">Genre</label>
        <select name="persongenre" id="persongenre" size="1">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <label for="birthdate">Birthdate</label>
        <input type="date" id="birthdate" name="birthdate">

        <input type="submit" value="Submit" name="submit">
    </form>
</div>
<!-- Film -->
<!-- Casting -->

<?php

    $title = "TMH - Genres";
    $content = ob_get_clean();
    require_once "View/template.php";
    
?>