<?php ob_start(); ?>
<h1 class="oswald">Add content</h1>

<div class="form-list flex-row">
    <button id="addGenre">Add Genre</button>
    <button id="addFilm">Add Film</button>
    <button id="addPerson">Add Person</button>
    <button id="addCasting">Add Casting</button>

</div>
<br>
<br>
<br>
<!-- Genre -->
<div class="genre-form">
    <form method="post" action="index.php?action=addGenre">
        <label for="gname">New Genre</label>
        <input type="text" id="gname" name="gname" placeholder="Genre name" required>

        <input type="submit" value="Submit" name="submit">
    </form>
</div>
<br>
<br>
<br>
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
<br>
<br>
<br>
<!-- Film -->
<div class="film-form">
    <form method="post" action="index.php?action=addFilm">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" placeholder="Title" required>
        
        <label for="releaseDate">Release Date</label>
        <input type="date" id="releaseDate" name="releaseDate" required>

        <label for="duration">Duration</label>
        <input type="text" id="duration" name="duration" placeholder="Duration, in minutes" required>

        <label for="director">Director</label>
        <select name="director" id="director" size="1" required>
            <?php foreach($directors as $director){ ?>
                <option value='<?= $director['id_director'] ?>'><?= $director['director'] ?></option>
            <?php } ?>
        </select>
        
        <fieldset>
            <legend>This film genres</legend>
            <?php foreach($genres as $genre){ ?>
                <div>
                    <input type="checkbox" class="genre-checkbox" name="genre" value='<?= $genre['genre_name'] ?>'/>
                    <label for='genre'><?= $genre['genre_name'] ?></label>
                </div>
            <?php } ?>
        </fieldset>
        
        <label for="rating">Rating</label>
        <input type="text" id="rating" name="rating" placeholder="Rating, 0 through 10." required>

        <label for="poster">Poster</label>
        <input type="text" id="poster" name="poster" placeholder="Poster URL" required>

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
