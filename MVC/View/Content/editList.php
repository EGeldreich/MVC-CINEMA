<?php ob_start(); ?>
<h1 class="oswald">Edit content</h1>

<div class="form-list flex-row">
    <button class="active form-list_button" id="person">Edit Person</button>
    <button class="form-list_button" id="genre">Edit Genre</button>
    <button class="form-list_button" id="film">Edit Film</button>
    <button class="form-list_button" id="character">Edit Character</button>
    <button class="form-list_button" id="casting">Edit Casting</button>
</div>
<div class="container">
    <!-- PERSONS -->
     <div class="person-form person-edit_container forms">
        <ol class="edit-person_list edit-form flex-column">
            <?php foreach($persons as $person){ ?>
                <li class="form person-entry flex-column">
                    <form class="edit-form_entry" method="post" action='index.php?action=EditPerson&id=<?= ($person['id_person']) ?>'>
                        <div class="form-line flex-row">
                            <div class="input-and-label flex-column">
                                <label for="firstName">First Name</label>
                                <input type="text" id="firstName" name="firstName" value='<?= $person['first_name'] ?>' required>
                            </div>
    
                            <div class="input-and-label flex-column">
                                <label for="lastName">Last Name</label>
                                <input type="text" id="lastName" name="lastName" value='<?= $person['last_name'] ?>' required>
                            </div>
    
                            <div class="input-and-label flex-column">
                                <label for="personGenre">Genre</label>
                                <select name="personGenre" id="personGenre" size="1" required>
                                    <option
                                    <?php if($person['sex'] == 'Male'){ echo 'selected="selected"'; }; ?>
                                    value="Male">Male</option>
                                    <option
                                    <?php if($person['sex'] == 'Female'){ echo 'selected="selected"'; }; ?>
                                    value="Female">Female</option>
                                    <option
                                    <?php if($person['sex'] == 'Other'){ echo 'selected="selected"'; }; ?>
                                    value="Other">Other</option>
                                </select>
                            </div>
    
                            <div class="input-and-label flex-column">
                                <label for="birthDate">Birthdate</label>
                                <input type="date" id="birthDate" name="birthDate" value='<?= $person['birth_date'] ?>' required>
                            </div>
    
                            <input type="submit" value="Edit Person" name="editPerson">
                            <input class="del-btn" type="submit" value="Delete" name="delPerson">
                        </div>
                    </form>
                </li>
            <?php } ?>
        </ol>
     </div>
    
     <!-- GENRES -->
     <div class="genre-form genre-edit_container forms hidden">
        <ol class="edit-genre_list edit-form flex-column">
            <?php foreach($genres as $genre){ ?>
                <li class="form genre-entry flex-column">
                    <form class="edit-form_entry" method="post" action='index.php?action=EditGenre&id=<?= ($genre['id_genre']) ?>'>
                        <div class="form-line flex-row">
                            <div class="input-and-label flex-column">
                                <label for="genreName">Genre Name</label>
                                <input type="text" id="genreName" name="genreName" value='<?= $genre['genre_name'] ?>' required>
                            </div>
    
                            <input type="submit" value="Edit Genre" name="editGenre">
                            <input class="del-btn" type="submit" value="Delete" name="delGenre">
                        </div>
                    </form>
                </li>
            <?php } ?>
        </ol>
     </div>
</div>


<?php

    $title = "TMH - Edit Content";
    $content = ob_get_clean();
    require_once "View/template.php";
    
?>
