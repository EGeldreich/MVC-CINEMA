<?php ob_start(); ?>
<h1 class="oswald">Add content</h1>

<div class="form-list flex-row">
    <button class="active form-list_button" id="person">Add Person</button>
    <button class="form-list_button" id="genre">Add Genre</button>
    <button class="form-list_button" id="film">Add Film</button>
    <button class="form-list_button" id="character">Add Character</button>
    <button class="form-list_button" id="casting">Add Casting</button>

</div>
<div class="container">
    <!-- PERSON -->
    <div class="forms person-form person-form_container raleway">
        <form class="form flex-column" method="post" action="index.php?action=AddPerson">
            <div class="form-block flex-column">
    
                <div class="form-line flex-row">
                    <div class="input-and-label flex-column">
                        <label for="firstname">First name</label>
                        <input type="text" id="firstname" name="firstname" placeholder="First name" required>
                    </div>
    
                    <div class="input-and-label flex-column">
                        <label for="lastname">Last name</label>
                        <input type="text" id="lastname" name="lastname" placeholder="Last name" required>
                    </div>
                </div>
    
                <div class="form-line flex-row">
                    <div class="input-and-label flex-column">
                        <label for="personGenre">Genre</label>
                        <select name="personGenre" id="personGenre" size="1" required>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
    
                    <div class="input-and-label flex-column">
                        <label for="birthDate">Birthdate</label>
                        <input type="date" id="birthDate" name="birthDate" required>
                    </div>
                </div>  
    
                <div class="form-line flex-row">
                    <div class="input-and-label flex-column">
                        <label for="picture">Picture URL</label>
                        <input type="text" id="picture" name="picture" placeholder="Picture URL" required>
                    </div>
                </div>
    
                <div class="form-line flex-row">
                <fieldset>
                        <legend>Person role</legend>
                        <div class="roles-field flex-row">
                            <div class="roles-field_roles">
                                <input type="checkbox" class="role-checkbox" id="actor" name="role[]" value="actor"/>
                                <label for="actor">Actor</label>
                            </div>
                            <div class="roles-field_roles">
                                <input type="checkbox" class="role-checkbox" id="director" name="role[]" value="director"/>
                                <label for="director">Director</label>
                            </div>
                        </div>
                    </fieldset>
                </div>
    
            </div>
            <input type="submit" value="Add Person" name="submitPerson">
        </form>
    </div>
    
    <!-- GENRE -->
    <div class="forms hidden genre-form genre-form_container raleway">
        <form class="form flex-column" method="post" action="index.php?action=AddGenre">
        <div class="form-block flex-column">   
            <div class="input-and-label flex-column">
                    <label for="gname">New Genre</label>
                    <input type="text" id="gname" name="gname" placeholder="Genre name" required>
                </div>
            </div>
            <input type="submit" value="Add Genre" name="submitGenre">
        </form>
    </div>
    
    <!-- FILM -->
    <div class="forms hidden film-form film-form_container raleway">
        <form class="form flex-column" method="post" action="index.php?action=AddFilm">
            <div class="form-block-line flex-row">
                <div class="form-block flex-column"> 
        
                    <div class="form-line flex-row">
                        <div class="input-and-label flex-column">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" placeholder="Title" required>
                        </div>
                    </div>
        
                    <div class="form-line flex-row">
                        <div class="input-and-label flex-column">
                            <label for="director">Director</label>
                            <select name="director" id="director" size="1" required>
                                <?php foreach($directors as $director){ ?>
                                    <option value='<?= $director['id_director'] ?>'><?= $director['director'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
        
                    <div class="form-line flex-row">
                        <div class="input-and-label flex-column">
                            <label for="releaseDate">Release Date</label>
                            <input type="date" id="releaseDate" name="releaseDate" required>
                        </div>
                    </div>
        
                    <div class="form-line flex-row">
                        <div class="input-and-label flex-column">
                            <label for="duration">Duration</label>
                            <input class="input_half-size"type="text" id="duration" name="duration" placeholder="Duration, in minutes" required>
                        </div>
        
                        <div class="input-and-label flex-column">
                            <label for="rating">Rating</label>
                            <input class="input_half-size" type="text" id="rating" name="rating" placeholder="Rating, 0 through 10." required>
                        </div>
                    </div>
        
                    <div class="form-line flex-row">
                        <div class="input-and-label flex-column">
                            <label for="poster">Poster</label>
                            <input type="text" id="poster" name="poster" placeholder="Poster URL" required>
                        </div>
                    </div>
    
                </div>
        
                <div class="form-block flex-column"> 
                    <fieldset>
                        <legend>This film genres</legend>
                        <div class="genres-field flex-column">
                            <?php foreach($genres as $genre){ ?>
                                <div class="genres-field_genres">
                                    <input type="checkbox" class="genre-checkbox" name="genre[]" value='<?= $genre['genre_name'] ?>'/>
                                    <label for='genre'><?= $genre['genre_name'] ?></label>
                                </div>
                            <?php } ?>
                        </div>
                    </fieldset>
                </div>
                
                <div class="form-block flex-column"> 
                    <div class="input-and-label flex-column">
                        <label for="synopsis">Synopsis</label>
                        <textarea id="synopsis" name="synopsis" placeholder="Synopsis of the movie"></textarea>
                    </div>
                </div>
            </div>
            <input type="submit" value="Add Film" name="submitFilm">
        </form>
    </div>
    
    <!-- CHARACTER -->
    <div class="forms hidden character-form character-form_container raleway">
        <form class="form flex-column" method="post" action="index.php?action=AddCharacter">
            <div class="form-block flex-column">   
                <div class="input-and-label flex-column">
                    <label for="cname">New Character</label>
                    <input type="text" id="cname" name="cname" placeholder="Character name" required>
                </div>
            </div>  
            <input type="submit" value="Add Character" name="submit">
        </form>
    </div>
    
    <!-- CASTING -->
    <div class="forms hidden casting-form casting-form_container raleway">
        <form class="flex-column form" method="post" action="index.php?action=AddCasting">
            <div class="form-block flex-column">
    
                <div class="form-line flex-row">
                    <div class="input-and-label flex-column">
                        <label for="actor">Actor</label>
                        <select name="actor" id="actor" size="1" required>
                            <?php foreach($actors as $actor){ ?>
                                <option value='<?= $actor['id_actor'] ?>'><?= $actor['actor'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
    
                    <p>is playing</p>
    
                    <div class="input-and-label flex-column">
                        <label for="character">Character</label>
                        <select name="character" id="character" size="1" required>
                            <?php foreach($characters as $character){ ?>
                                <option value='<?= $character['name'] ?>'><?= $character['name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
    
                    <p>in</p>
    
                    <div class="input-and-label flex-column">
                        <label for="film">Film</label>
                        <select name="film" id="film" size="1" required>
                            <?php foreach($films as $film){ ?>
                                <option value='<?= $film['title'] ?>'><?= $film['title']?>, <?= substr($film['release_date'], 0, 4) ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
    
            </div>
            <input type="submit" value="Add Casting" name="submit">
        </form>
    </div>
</div>

<?php

    $title = "TMH - Add Content";
    $content = ob_get_clean();
    require_once "View/template.php";
    
?>
