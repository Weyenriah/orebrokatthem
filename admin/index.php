<?php
    require_once '../components/resources.php';
?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include(APP_FOLDER . '/admin/components/admin-head.php') ?>

<body class="grid">
    <!-- Include every page that's needed -->
    <?php include(APP_FOLDER . '/admin/pages/include-pages.php') ?>

    <header>
        <a href="index.php" class="header-title"> Administratör </a>
        <p class="logout"> <i class="fas fa-sign-out-alt"></i> </p>
    </header>
    <nav>
        <div class="popups">
            <a href="#" onclick="showPopupCats()">
                <i class="fas fa-plus"></i> Lägg till ny Katt
            </a>
        </div>
        <div class="popups">
            <a href="#" onclick="showPopupNews()">
                <i class="fas fa-plus"></i> Lägg till Nyhet
            </a>
        </div>
        <hr/>
        <h3> Hantera </h3>
        <div class="pages">
            <a href="#" class="page-link" onclick="showPage('cats')"> Katter </a>
        </div>
        <div class="pages">
            <a href="#" class="page-link" onclick="showPage('news')"> Nyheter </a>
        </div>
        <div class="pages">
            <a href="#" onclick="showPage('employees')"> Anställda </a>
        </div>
        <div class="pages">
            <a href="#" onclick="showPage('remem-cats')"> Katter i minneslunden </a>
        </div>
        <div class="pages">
            <a href="#" id="text" onclick="showPopupNav()"> <i class="fas fa-align-left"></i> Ändra textfält </a>
        </div>
        <div id="popup-nav">
            <div class="pages">
                <a href="#" onclick="showPage('home')"> Hem </a>
            </div>
            <div class="pages">
                <a href="#" onclick="showPage('adopt')"> Adoptera </a>
            </div>
            <div class="pages">
                <a href="#" onclick="showPage('our-cats')"> Våra Katter </a>
            </div>
            <div class="pages">
                <a href="#" onclick="showPage('jour')"> Bli Jourhem </a>
            </div>
            <div class="pages">
                <a href="#" onclick="showPage('about')"> Om Oss </a>
            </div>
            <div class="pages">
                <a href="#" onclick="showPage('support')"> Stöd Oss </a>
            </div>
            <div class="pages">
                <a href="#" onclick="showPage('footer')"> Footer </a>
            </div>
        </div>
    </nav>
</body>

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

    /* === SHOW NEWS-POPUP === */
    function showPopupNav() {
        let popup = document.getElementById('popup-nav');
        let link = document.getElementById('text');

        if(popup.classList.contains('popup-nav-show')) {
            popup.classList.remove('popup-nav-show');
            link.classList.remove('link-selected');
        } else {
            popup.classList.add('popup-nav-show');
            link.classList.add('link-selected');
        }
    }

    /* === SHOW CAT-FLOW === */
    function showPage(pageName) {
        let pages = document.getElementsByClassName('page');

        /* Adds display = none om every page */
        for (let i = 0; i < pages.length; i++) {
            pages[i].style.display = 'none';
        }

        /* Changes display to block */
        document.getElementById(pageName).style.display = 'block';
    }

    showPage('<?php echo(isset($goToPage)? $goToPage: 'welcome'); ?>');
</script>
</html>

