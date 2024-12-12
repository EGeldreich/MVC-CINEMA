<?php ob_start(); ?>


<section class="film-info flex-column">
    <h3 class="film-info_genres">
        <?php
            foreach($genres as $genre){
                echo $genre['genre_name'].' ';
            }
        ?>
    </h3>

    <h1 class="film-info_title oswald"><?= $film['title'] ?></h1>

    <div class="film-info_data flex-row">
        <p><?= $film['duration'] ?></p>
        <strong><?= $film['rating'] ?></strong>
        <p><?= $film['release_date'] ?></p>
    </div>

    <p class="film-info_synopsis"><?= $film['synopsis'] ?></p>
</section>

<section class="film-staff flex-row">
    <article class="film-staff_directors">
        <p>Directed by</p>
        <div class="director_cards flex-row">
            <?php
                foreach($directors as $director){ ?>
                        <div class='director_card'>
                            <img
                                class='director_img'
                                src='https://picsum.photos/90/112'
                                alt='<?= $director['first_name'] ?> <?= $director['last_name'] ?>' />
                            <p class="director_card_name">
                                <?= $director['first_name'] ?>
                                <br>
                                <?= $director['last_name'] ?>
                            </p>
                        </div>
                <?php } ?>
        </div>
    </article>
    <article class="film-staff_castings">
        <p>Casting</p>
        <div class="casting_cards flex-row">
            <?php
                foreach($castings as $casting){ ?>
                        <div class='casting_card'>
                            <img
                                class='casting_img'
                                src='https://picsum.photos/90/112'
                                alt='<?= $casting['first_name'] ?> <?= $casting['last_name'] ?>' />
                            <p class="casting_card_role">
                            <?= $casting['character_name'] ?>
                            </p>
                            <p class="casting_card_name">
                                <?= $casting['first_name'] ?>
                                <br>
                                <?= $casting['last_name'] ?>
                            </p>
                        </div>
                <?php } ?>
        </div>
    </article>

</section>

<?php

    $title = 'TMH '.$film['title'];
    $secondary_title = $film['title'];
    $content = ob_get_clean();
    require_once "view/template.php";

?>