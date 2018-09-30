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

    <!-- Popup for news -->
    <?php include(APP_FOLDER . '/admin/popups/add-news.php') ?>

    <header>
        <a href="index.php" class="header-title"> Administratör </a>
        <p class="logout"> <i class="fas fa-sign-out-alt"></i> </p>
    </header>
    <nav>
        <div class="pages">
            <a href="#" class="page" onclick="showPopupCats()">
                <i class="fas fa-plus"></i> Lägg till ny Katt
            </a>
        </div>
        <div class="pages">
            <a href="#" class="page" onclick="showPopupNews()">
                <i class="fas fa-plus"></i> Lägg till Nyhet
            </a>
        </div>
        <hr/>
        <h3> Hantera </h3>
        <div class="pages">
            <a href="#" class="page" onclick="showNewsFlow()"> Nyheter </a>
        </div>
        <div class="pages">
            <a href="#" class="page" onclick="showCatFlow()"> Katter </a>
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

    <!-- Page for welcome -->
    <?php include(APP_FOLDER . '/admin/pages/welcome.php') ?>

    <!-- Page for cat-flow -->
    <?php include(APP_FOLDER . '/admin/pages/cats.php') ?>

    <!-- Page for news-flow -->
    <?php include(APP_FOLDER . '/admin/pages/news.php') ?>

</body>

</html>

<script>
    /* === SHOW CAT-POPUP === */
    function showPopupCats() {
        let popup = document.getElementById('popup-cat');

        popup.style.display = 'block';
    }

    /* === SHOW NEWS-POPUP === */
    function showPopupNews() {
        let popup = document.getElementById('popup-news');

        popup.style.display = 'block';
    }

    /* === SHOW CAT-FLOW === */
    function showCatFlow() {
        let page = document.getElementById('cats');
        let otherPage = document.getElementById('news');
        let main = document.getElementById('welcome');

        page.style.display = 'block';
        otherPage.style.display = 'none';
        main.style.display = 'none';
    }

    /* === SHOW NEWS-FLOW === */
    function showNewsFlow() {
        let page = document.getElementById('news');
        let otherPage = document.getElementById('cats');
        let main = document.getElementById('welcome');

        page.style.display = 'block';
        otherPage.style.display = 'none';
        main.style.display = 'none';
    }
</script>