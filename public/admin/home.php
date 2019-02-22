<?php
require_once dirname(__FILE__).'/../../functions/load.php';

require_once dirname(__FILE__).'/../../functions/session.php';

// Start session and stuff for login
if(!isset($_SESSION['user'])) {
    header('Location: ' . BASE_URL . 'admin');

    die();
}

?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include(APP_FOLDER . '/includes/admin/admin-head.php') ?>

<body class="grid">
<!-- Include every page that's needed -->
<?php include(APP_FOLDER . '/includes/admin/include-pages.php') ?>

<header>
    <a href="home.php" class="header-title"> Administratör </a>
    <div class="admin-login">
        <p><span>Inloggad:</span> <?php echo($database->getUserEmail($_SESSION['user'])); ?></p>
        <a href="logout.php" class="logout"> <i class="fas fa-sign-out-alt"></i> </a>
    </div>
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
    <div class="nav-links pages" id="adopted-link">
        <a href="#" onclick="showPage('adopted-cats')"> <i class="fas fa-archive"></i> Adopterade katter </a>
    </div>
    <hr/>
    <h3> Hantera </h3>
    <div class="nav-links pages" id="cats-link">
        <a href="#" onclick="showPage('cats')"> Katter </a>
    </div>
    <div class="nav-links pages" id="news-link">
        <a href="#" onclick="showPage('news')"> Nyheter </a>
    </div>
    <div class="nav-links pages" id="employees-link">
        <a href="#" onclick="showPage('employees')"> Anställda </a>
    </div>
    <div class="nav-links pages" id="remem-cats-link">
        <a href="#" onclick="showPage('remem-cats')"> Katter i minneslunden </a>
    </div>
    <!-- Handle textfields -->
    <div class="nav-links">
        <a href="#" id="text" onclick="showPopupNav()"> <i class="fas fa-align-left"></i> Ändra textfält </a>
    </div>
    <div id="popup-nav">
        <div class="nav-links pages" id="home-link">
            <a href="#" onclick="showPage('home')"> Hem </a>
        </div>
        <div class="nav-links pages" id="adopt-link">
            <a href="#" onclick="showPage('adopt')"> Adoptera </a>
        </div>
        <div class="nav-links pages" id="our-cats-link">
            <a href="#" onclick="showPage('our-cats')"> Våra Katter </a>
        </div>
        <div class="nav-links pages" id="jour-link">
            <a href="#" onclick="showPage('jour')"> Bli Jourhem </a>
        </div>
        <div class="nav-links pages" id="contactperson-link">
            <a href="#" onclick="showPage('contactperson')"> Bli Kontaktperson </a>
        </div>
        <div class="nav-links pages" id="about-link">
            <a href="#" onclick="showPage('about')"> Om Oss </a>
        </div>
        <div class="nav-links pages" id="support-link">
            <a href="#" onclick="showPage('support')"> Stöd Oss </a>
        </div>
        <div class="nav-links pages" id="footer-link">
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
        let popup = document.getElementById('popup-add-news');

        popup.style.display = 'block';
    }

    /* === SHOW -POPUP === */
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
        let links = document.getElementsByClassName('pages');

        /* Adds display = none om every page */
        for (let i = 0; i < pages.length; i++) {
            pages[i].style.display = 'none';
            links[i].classList.remove('marked');
        }

        /* Changes display to block */
        document.getElementById(pageName).style.display = 'block';
        document.getElementById(pageName+ '-link').classList.add('marked');
    }

    showPage('<?php echo(isset($goToPage) ? $goToPage : 'cats'); ?>');

    // Mark pages in nav
    <?php
    $pages = [
        'home',
        'adopt',
        'our-cats',
        'jour',
        'contactperson',
        'about',
        'support',
        'footer',
    ];

    if(isset($goToPage) && in_array($goToPage, $pages)) {
        echo('showPopupNav()');
    } ?>

    /* === COUNT VALUE IN TEXTAREA === */
    function updateTextCounter (id, val) {
        let counter = document.getElementById(id);
        counter.textContent = val.length;
    }
</script>
</html>

