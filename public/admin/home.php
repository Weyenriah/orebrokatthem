<?php
require_once '../../functions/load.php';

require_once '../../functions/session.php';

if(!isset($_SESSION['user'])) {
    header('Location: ' . BASE_URL . 'admin');

    die();
}

/* if(isset($_POST['submit-banner'])) {
    // Max 1MB
    $max_file_size = 1048576;
    // Accepted file types
    $file_types = array('gif', 'jpg', 'png');
    // Map for uploading
    $upload_dir = realpath(dirname(__FILE__)) . '/images/';
    // Creates array for error messages
    $errors = array();

    $file_tmp = $_FILES['photo']['tmp_name'];
    $file_name = $_FILES['photo']['name'];
    $file_size = $_FILES['photo']['size'];
    $file_uniq = uniqid();

}*/

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
    <a href="logout.php" class="logout"> <i class="fas fa-sign-out-alt"></i> </a>
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
        <a href="#" onclick="showPage('cats')"> Katter </a>
    </div>
    <div class="pages">
        <a href="#" onclick="showPage('news')"> Nyheter </a>
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
    <hr/>
    <form class="banner-upload" method="post" enctype="multipart/form-data">
        <label for="banner-upload">
            Ladda upp banner
        </label>
        <input class="banner" type="file" name="banner">
        <input class="submit-banner" type="submit" name="submit-banner" value="Ladda upp">
    </form>
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

    showPage('<?php echo(isset($goToPage) ? $goToPage : 'cats'); ?>');
</script>
</html>

