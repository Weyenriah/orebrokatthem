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
            <input type="radio" name="filter" value="A-Ö" id="ao">
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

    <div class="cats">
        <article class="cat">
            <div class="cat-img">

            </div>
            <div class="cat-text">
                <div class="change-cat">
                    <a href="#"> <i class="fas fa-pencil-alt"></i> Ändra katt </a>
                    <a href="#"> <i class="fas fa-times"></i> Ta bort katt </a>
                </div>
                <div class="cat-information">
                    <h3> Namn </h3>
                    <small> Stuff | Stuff | Stuff </small>
                    <p> Text </p>
                </div>
            </div>
        </article>
        <article class="cat">
            <div class="cat-img">

            </div>
            <div class="cat-text">
                <div class="change-cat">
                    <a href="#"> <i class="fas fa-pencil-alt"></i> Ändra katt </a>
                    <a href="#"> <i class="fas fa-times"></i> Ta bort katt </a>
                </div>
                <div class="cat-information">
                    <h3> Namn </h3>
                    <small> Stuff | Stuff | Stuff </small>
                    <p> Text </p>
                </div>
            </div>
        </article>
        <article class="cat">
            <div class="cat-img">

            </div>
            <div class="cat-text">
                <div class="change-cat">
                    <a href="#"> <i class="fas fa-pencil-alt"></i> Ändra katt </a>
                    <a href="#"> <i class="fas fa-times"></i> Ta bort katt </a>
                </div>
                <div class="cat-information">
                    <h3> Namn </h3>
                    <small> Stuff | Stuff | Stuff </small>
                    <p> Text </p>
                </div>
            </div>
        </article>
    </div>
</section>
</body>

</html>