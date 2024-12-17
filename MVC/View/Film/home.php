<?php ob_start(); ?>

<section class="home_hero flex-column">
    <div class="home_hero_filter"></div>
    <div class="home_hero_text-content flex-column">
        <h1 class="oswald">
            Seek informartions about your
            <br>favorites movies in the <span class="main-color">Hub</span>
        </h1>
        <p>
        Rate movies. Find out everything about them.
        <br>Seek out your next favorites.
        </p>
    </div>

    <form class="search-form">
        <input type="text" class="search" placeholder="Search for a movie, actor, director ...">
        <i class="input-icon fa-solid fa-magnifying-glass"></i>
        <ul class="suggestions">
        </ul>
    </form>
</section>
<div class="container separator">

    <section class="home_genres card-section">
        <h2 class="section-title oswald">Genres</h2>
        <div class="home_cards flex-row">
            <?php foreach($genres as $genre) { ?>
                <!-- CHANGE LINK -->
                <a href="" class="card-link">
                    <article class="home-card home-card__square">
                        <!-- CHANGE FOR GENRE IMG -->
                        <img class="home-card_img" src='https://picsum.photos/400' alt="">
                        <div class="home-card_filter"></div>
                        <p class="home-card_info home-card_name oswald"><?= $genre['genre_name']?></p>
                    </article>
                </a>
            <?php } ?>
        </div>
    </section>

    <section class="home_films card-section">
        <h2 class="section-title oswald">Our <span class="main-color">best rated</span> movies</h2>
        <div class="home_cards flex-row">
            <?php foreach($films as $film) { ?>
                <!-- CHANGE LINK -->
                <a href='index.php?action=Film&id=<?= $film['id_film']?>' class="card-link">
                    <article class="home-card home-card__rectangle">
                        <!-- CHANGE FOR FILM IMG -->
                        <img class="home-card_img" src='https://picsum.photos/400' alt="">
                        <div class="home-card_filter home-card_filter__bottom"></div>
                        <p class="home-card_info home-card_director"><?= $film['director']?></p>
                        <p class="home-card_info home-card_rating"><?= $film['rating']?></p>
                    </article>
                </a>
            <?php } ?>
        </div>
    </section>

    <section class="home_push card-section">
        <article class="home_push_content flex-row">
            <div class="home_push_text flex-column">
                <h2 class="section-title oswald">Movies directed by <span class="main-color"><?= $filmsDirector[0]['director'] ?></span></h2>
                <p>Nobis quaerat molestiae ducimus ex, ad, optio ipsa, tempore ullam nostrum officia corrupti aut aperiam. Quas dignissimos eligendi voluptas natus eos a.</p>
                <a class="home_push_btn" href='index.php?action=Person&id=<?= $filmsDirector[0]['id_person']?>'>
                    See more
                </a>
            </div>
            <div class="home_push_posters flex-row">
                <div class="home_push_filter"></div>
                <?php foreach($filmsDirector as $film) { ?>
                    <img class="home_push_poster" src='https://picsum.photos/300/444' alt="">
                <?php } ?>
            </div>
        </article>
    </section>

    <section class="home_actors card-section">
        <h2 class="section-title oswald">Actors</h2>
        <div class="home_cards flex-row">
            <?php foreach($actors as $actor) { ?>
                <!-- CHANGE LINK -->
                <a href="" class="card-link">
                    <article class="home-card home-card__square">
                        <!-- CHANGE FOR GENRE IMG -->
                        <img class="home-card_img" src='https://picsum.photos/400' alt="">
                        <div class="home-card_filter"></div>
                        <p class="home-card_info home-card_name oswald"><?= $actor['actor']?></p>
                    </article>
                </a>
                <?php } ?>
            </div>
    </section>

    <section class="home_directors card-section">
        <h2 class="section-title oswald">Directors</h2>
        <div class="home_cards flex-row">
            <?php foreach($directors as $director) { ?>
                <!-- CHANGE LINK -->
                <a href="" class="card-link">
                    <article class="home-card home-card__square">
                        <!-- CHANGE FOR GENRE IMG -->
                        <img class="home-card_img" src='https://picsum.photos/400' alt="">
                        <div class="home-card_filter"></div>
                        <p class="home-card_info home-card_name oswald"><?= $director['director']?></p>
                    </article>
                </a>
                <?php } ?>
            </div>
    </section>
    
</div>
<?php
    $title = "TMH - Movies";
    $content = ob_get_clean();
    require_once "View/template.php";
?>