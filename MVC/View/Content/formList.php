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

        <label for="personGenre">Genre</label>
        <select name="personGenre" id="personGenre" size="1" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
        </select>

        <label for="birthDate">Birthdate</label>
        <input type="date" id="birthDate" name="birthDate" required>

        <input type="submit" value="Submit" name="submit">
    </form>
</div>
<!-- Film -->
<div class="film-form">
    <form method="post" action="index.php?action=addFilm">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" placeholder="Title" required>
        
        <label for="releaseDate">Release Date</label>
        <input type="date" id="releaseDate" name="releaseDate" required>

        <label for="duration">Duration</label>
        <input type="date" id="duration" name="duration" required>

        <label for="director">Director</label>
        <input type="text" id="director" name="director" placeholder="Film Director" required>

        <label for="poster">Poster</label>
        <input type="text" id="poster" name="poster" placeholder="URL of the poster" required>

        <label for="synopsis">Synopsis</label>
        <input type="text-area" id="synopsis" name="synopsis" placeholder="Synopsis of the movie">

        <input type="submit" value="Submit" name="submit">
    </form>
</div>
<!-- Casting -->

<?php

    $title = "TMH - Genres";
    $content = ob_get_clean();
    require_once "View/template.php";
    
?>