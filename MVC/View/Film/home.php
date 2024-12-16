<?php ob_start(); ?>

<section class="hero flex-column">
    <div class="hero_filter"></div>
    <div class="hero_text-content flex-column">
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

    <section class="genres card-section">
        <h2 class="section-title oswald">Genres</h2>
        <div class="genre_cards flex-row">
            <?php foreach($genres as $genre) { ?>
                <article class="genre-card">
                    <!-- CHANGE FOR GENRE IMG -->
                    <img class="genre-card_img" src='https://picsum.photos/400' alt="">
                    <div class="genre-card_filter"></div>
                    <p class="genre-card_name oswald"><?= $genre['genre_name']?></p>
                </article>
            <?php } ?>
        </div>
    </section>

</div>
<?php
    $title = "TMH - Movies";
    $content = ob_get_clean();
    require_once "View/template.php";
?>