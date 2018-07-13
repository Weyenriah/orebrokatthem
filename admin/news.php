<?php
require_once '../components/resources.php';

$news = $database->getNews();


?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fontawesome-required CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="../images/favicon.png"/>

    <!-- General CSS -->
    <link rel="stylesheet" type="text/css" href="style/general.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="style/news.css">

    <!-- Webpage title -->
    <title>Admin: Örebro Katthem</title>
</head>
<body class="grid">
<header>
    <a href="index.php" class="header-title"> Administratör </a>
    <p class="logout"> <i class="fas fa-sign-out-alt"></i> </p>
</header>
<nav>
    <div class="pages">
        <a href="#" class="page"> <i class="fas fa-plus"></i> Lägg till ny Katt </a>
    </div>
    <div class="pages">
        <a href="#" class="page"> <i class="fas fa-plus"></i> Lägg till Nyhet </a>
    </div>
    <hr/>
    <h3> Hantera </h3>
    <div class="pages">
        <a href="cats.php" class="page"> Katter </a>
    </div>
    <div class="pages">
        <a href="news.php" class="page"> Nyheter </a>
    </div>
    <div class="pages">
        <a href="#" class="page"> Medlemmar </a>
    </div>
    <div class="pages">
        <a href="#" class="page"> Anställda </a>
    </div>
    <div class="pages">
        <a href="#" class="page"> <i class="fas fa-align-left"></i> Ändra textfält </a>
    </div>
</nav>
<section>
    <!--
    <form class="search-container" method="get">
        <label for="filter"> Filtrering: </label>
        <input placeholder="Kattnamn..." type="search" name="name">
        <button type="submit"> Sök </button>
    </form>
    <select id="filter">
        <option value="ao"> A-Ö </option>
        <option value="oa"> Ö-A </option>
        <option value="latest"> Senaste </option>
        <option value="earliest"> Tidigaste </option>
    </select>
    -->

    <div class="cats">
        <?php
        foreach ($news as $new) {
            ?>
            <article class="cat">
                <?php if ($new['image'] !== '') { ?>
                    <div class="cat-img">
                        <img src="<?php echo(UPLOADS_FOLDER . 'images/' . $new['image']); ?>">
                    </div>
                <?php } ?>
                <div class="cat-text">
                    <div class="change-cat">
                        <a href="#"> <i class="fas fa-times"></i> Ta bort nyhet </a>
                    </div>
                    <div class="cat-information">
                        <h3> <?php echo($new['date']) ?> </h3>
                        <p> <?php echo($new['news']) ?> </p>
                    </div>
                </div>
            </article>
        <?php } ?>
    </div>
</section>
</body>

</html>