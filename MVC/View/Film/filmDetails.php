<?php ob_start(); ?>

<div class="details container">

    <section class="film-info flex-column">
        <h3 class="film-info_genres flex-row">
            <?php
                foreach($genres as $genre){
                    echo "<p>".$genre['genre_name']."</p>";
                }
            ?>
        </h3>
    
        <h1 class="film-info_title oswald"><?= $film['title'] ?></h1>
    
        <div class="film-info_data flex-row">
            <p><?= $film['duration'] ?></p>
            <strong class="main-color"><?= $film['rating'] ?></strong>
            <p><?= substr($film['release_date'],0 ,4) ?></p>
        </div>
    
        <p class="film-info_synopsis"><?= $film['synopsis'] ?></p>
    </section>
    
    <section class="film-staff flex-row">

        <article class="film-staff_directors">
            <p class="film-staff_title main-color">Directed by</p>
            <div class="director_cards flex-row">
                <div class='film-staff_card flex-column'>
                    <p class="film-staff_card_name">
                        <?= $director['first_name'] ?>
                        <?= $director['last_name'] ?>
                    </p>
                    <img
                        class='director_img'
                        src='https://picsum.photos/90/112'
                        alt='<?= $director['first_name'] ?> <?= $director['last_name'] ?>' />
                </div>
            </div>
        </article>

        <article class="film-staff_castings">
            <p class="film-staff_title main-color">Casting</p>
            <div class="casting_cards flex-row">
                <?php
                    foreach($castings as $casting){ ?>
                            <div class='film-staff_card flex-column'>
                                <p class="film-staff_card_name">
                                    <?= $casting['first_name'] ?>
                                    <?= $casting['last_name'] ?>
                                </p>
                                <img
                                src='https://picsum.photos/90/112'
                                alt='<?= $casting['first_name'] ?> <?= $casting['last_name'] ?>' />
                                <p class="casting-card_role">
                                    <?= $casting['character_name'] ?>
                                </p>
                            </div>
                    <?php } ?>
            </div>
        </article>
    
    </section>
</div>

<?php

    $title = 'TMH '.$film['title'];
    $secondary_title = $film['title'];
    $content = ob_get_clean();
    require_once "view/template.php";

?>