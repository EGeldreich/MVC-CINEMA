<?php ob_start(); ?>
<h1 class="oswald">Add content</h1>

<div class="form-list flex-row">
    <button class="active form-list_button" id="editPerson">Edit Person</button>
    <button class="form-list_button" id="editGenre">Edit Genre</button>
    <button class="form-list_button" id="editFilm">Edit Film</button>
    <button class="form-list_button" id="editCharacter">Edit Character</button>
    <button class="form-list_button" id="editCasting">Edit Casting</button>
</div>

<!-- PERSONS -->
 <div class="edit-person forms">
    <ol class="edit-person_list edit-form flex-column">
        <?php foreach($persons as $person){ ?>
            <li class="form person-entry flex-column">
                <form class="edit-form_entry" action='index.php?action=editPerson&id=<?= ($person['id_person']) ?>'>
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
                    </div>
                </form>
            </li>
        <?php } ?>
    </ol>
 </div>

<?php

    $title = "TMH - Edit Content";
    $content = ob_get_clean();
    require_once "View/template.php";
    
?>
