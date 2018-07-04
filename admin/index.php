<?php
require_once '../components/resources.php';
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
    <link rel="stylesheet" type="text/css" href="style/admin-home.css">

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
        <h2>Välkommen!</h2>
        <p> Till vänster ser du varje sida som du kan ändra på. </p>
    </section>
</body>

</html>