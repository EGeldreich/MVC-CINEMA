<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./Public/css/base.css">
    <link rel="stylesheet" href="./Public/css/forms.css">
    <link rel="stylesheet" href="./Public/css/lists.css">
    <link rel="stylesheet" href="./Public/css/home.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="./Public/js/script.js" defer></script>

    <title><?= $title ?></title>
</head>
<body>
    <header class="container">
            <nav class="navbar flex-row raleway">
                <div class="navbar_left flex-row">
                    <a href="index.php" class="logo oswald">The Movie <span class="main-color">Hub</span></a>
                    <div class="navbar_left_main flex-row">
                        <a href="index.php?action=FilmList">Movies</a>
                        <a href="index.php?action=GenreList">Genres</a>
                        <a href="index.php?action=ActorList">Actors</a>
                        <a href="index.php?action=DirectorList">Directors</a>
                        <a href="index.php?action=CharacterList">Characters</a>
                    </div>
                </div>
                <div class="navbar_right flex-row">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <a href="index.php?action=FormList">Add content</a>
                    <a href="index.php?action=EditList">Edit content</a>
                </div>
            </nav>
    </header>
    <main class="raleway">
        <?= $content ?>
    </main>
</body>
</html>