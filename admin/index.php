<?php
require_once '../components/resources.php';
?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include(APP_FOLDER . '/admin/components/admin-head.php') ?>

<body class="grid">
    <!-- Popup for cats -->
    <?php include(APP_FOLDER . '/admin/popups/add-cat.php') ?>

    <header>
        <a href="index.php" class="header-title"> Administratör </a>
        <p class="logout"> <i class="fas fa-sign-out-alt"></i> </p>
    </header>
    <nav>
        <div class="pages">
            <a href="#" class="page" onclick="showPopup()"> <i class="fas fa-plus"></i> Lägg till ny Katt </a>
        </div>
        <div class="pages">
            <a href="#" class="page"> <i class="fas fa-plus"></i> Lägg till Nyhet </a>
        </div>
        <hr/>
        <h3> Hantera </h3>
        <div class="pages">
            <a href="news.php" class="page"> Nyheter </a>
        </div>
        <div class="pages">
            <a href="cats.php" class="page"> Katter </a>
        </div>
        <div class="pages">
            <a href="#" class="page"> Anställda </a>
        </div>
        <div class="pages">
            <a href="#" class="page"> Medlemmar </a>
        </div>
        <div class="pages">
            <a href="#" class="page"> Katter i minneslunden </a>
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