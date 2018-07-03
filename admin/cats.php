<?php
require_once '../components/resources.php';

$cats = $database->getCats();
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
    <link rel="stylesheet" type="text/css" href="style/cats.css">

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
        <a href="#" class="page"> Nyheter </a>
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
    <h2> Filtrering: </h2>
    <form>
        <div>
            <input type="radio" name="filter" value="A-Ö" id="ao" checked>
            <label for="ao"> A - Ö </label>
        </div>
        <div>
            <input type="radio" name="filter" value="Ö-A" id="oa">
            <label for="oa"> Ö - A </label>
        </div>
        <div>
            <input type="radio" name="filter" value="Senast" id="latest">
            <label for="latest"> Senast inlagda först </label>
        </div>
        <div>
            <input type="radio" name="filter" value="Tidigast" id="earlier">
            <label for="earlier"> Tidigast inlagda först </label>
        </div>
        <input class="search" type="text" placeholder="Sök efter katt...">
    </form>

    <?php
    switch (isset($_POST['radio'])) {
        case $_POST['radio'] == 'latest':
            $cat = "SELECT * FROM cats ORDER BY id ASC";
            break;

        case $_POST['radio'] == 'earlier':
            $cat = "SELECT * FROM cats ORDER BY id DESC";
            break;
    }

    var_dump($_POST['radio']);

    ?>

    <div class="cats">
        <?php
        foreach ($cats as $cat) {
        ?>
        <article class="cat">
            <?php if ($cat['image'] !== '') { ?>
                <div class="cat-img">
                    <img src="<?php echo(UPLOADS_FOLDER . 'images/' . $cat['image']); ?>">
                </div>
            <?php } ?>
            <div class="cat-text">
                <div class="change-cat">
                    <a href="#"> <i class="fas fa-pencil-alt"></i> Ändra katt </a>
                    <a href="#"> <i class="fas fa-times"></i> Ta bort katt </a>
                </div>
                <div class="cat-information">
                    <h3> <?php echo($cat['name']) ?> </h3>
                    <small> <?php echo($cat['age']) ?> | <?php echo($cat['gender'] ? 'Hane': 'Hona') ?> | <?php echo($cat['color']) ?> </small>
                    <p> <?php echo($cat['description']) ?> </p>
                </div>
            </div>
        </article>
        <?php } ?>
    </div>
</section>
</body>

</html>