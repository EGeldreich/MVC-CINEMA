<?php ob_start(); ?>
<div class="page-header ">
    <h1 class="oswald">All our <span class="main-color">movies</span></h1>

</div>

<section class="film_list page-list flex-column">
    <?php foreach($films as $film) { ?>
        <a href='index.php?action=Film&id=<?= $film['id_film'] ?>'>
        <article class="card film-card flex-row">
            <img class="card_img" src='<?= $film['poster']?>' alt='<?= $film['title'] ?> poster'>
            <div class="card_info flex-column">

                <div class="card_first-line flex-row">
                    <h4 class="card_title oswald">
                        <?= $film['title'] ?>
                    </h4>
                    <div class="card_stats flex-row">
                        <p>
                            <?= $film['duration'] ?>
                        </p>
                        <p class="rating">
                            <?= $film['rating'] ?>
                        </p>
                        <p>
                            <?= substr($film['release_date'],0 ,4) ?>
                        </p>
                    </div>
                </div>

                <p class="card_synopsis">
                    <?= $film['synopsis'] ?>
                </p>

                <div class="card_last-line flex-row">
                    <p>Director :</p>
                    <p class="card_director">                   
                        <?= $film['director'] ?>
                    </p>
                </div>
            </div>
    </article>
    <?php } ?>
</section>

<?php

    $title = "TMH - Movies";
    $content = ob_get_clean();
    require_once "View/template.php";
    
?>