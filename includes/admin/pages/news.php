<?php
require_once dirname(__FILE__).'/../../../functions/load.php';

// Remove news
if (isset($_POST['removeNewsPost'])) {
    $removedNews = $database->deleteNewsPost($_POST['removeNewsPost']);
    $goToPage = 'news';
}

// Add news
if(isset($_POST['add-news'])) {
    //Security and checks files
    $desc = htmlentities(trim($_POST['desc']));
    $file = isset($_FILES['news-image']) ? $_FILES['news-image'] : null;
    // If everything is fine, add to database
    if(is_string($desc) == true && $desc !== '' && strlen($desc) < 10000) {
        $image = SaveFile($file);

        $newsAdded = $database->addNews($desc, $image);

        $goToPage = 'news';
    } else {
        $newsAdded = false;

        $goToPage = 'news';
    }
}

// Change news
if(isset($_POST['change-news'])) {
    //Security and checks files
    $id = $_POST['id'];
    $desc = htmlentities(trim($_POST['desc']));
    $file = isset($_FILES['news-image']) ? $_FILES['news-image'] : null;
    // If everything is fine, change in database
    if(is_string($desc) == true && $desc !== '' && strlen($desc) < 10000) {
        $image = SaveFile($file);

        $newsAdded = $database->changeNews($id, $desc, $image);

        $goToPage = 'news';
    } else {
        $newsAdded = false;

        $goToPage = 'news';
    }
}

// Pagination News
$newsPages = $database->countNewsPages();
// Get page
$newsPage = 0;

if(isset($_GET['newspage'])) {
    $newsPage = $_GET['newspage'];
    $goToPage = 'news';
}

// Get news
$news = $database->getNews($newsPage);

?>

<section class="page" id="news">
    <h2 class="page-title">Hantera Nyheter</h2>
    <button class="add-button" type="button" onclick="showPopupNews()"> Lägg till </button>
    <!-- Pagination -->
    <div class="pagination">
        <?php if($newsPage > 0) { ?>
            <div class="previous-page">
                <a class="prev-arrow" href="?newspage=<?php echo $newsPage - 1 ?>#newsflow">
                    <i class="fas fa-angle-left"></i> Föregående
                </a>
            </div>
        <?php }
        if($newsPage < $newsPages - 1) { ?>
            <div class="next-page">
                <a class="next-arrow" href="?newspage=<?php echo $newsPage + 1 ?>#newsflow">
                    Nästa <i class="fas fa-angle-right"></i>
                </a>
            </div>
        <?php } ?>
    </div>
    <!-- Added/Removed Text -->
    <?php if (isset($removedNews)) { ?>
        <div class="removed">
            <p>
                <?php echo(($removedNews) ? "Nyhet borttagen" : "Kunde inte ta bort nyheten"); ?>
            </p>
        </div>
    <?php } ?>
    <?php if (isset($newsAdded)) { ?>
        <div class="added">
            <p>
                <?php if($newsAdded == true) {
                    echo('Nyhet tillagd!');
                } ?>
            </p>
        </div>

        <div class="removed">
            <p>
                <?php if($newsAdded == false) {
                    echo('Nyhet kunde inte läggas till');
                } ?>
            </p>
        </div>
    <?php } ?>
    <!-- News-flow -->
    <div class="page-display">
        <?php
        foreach ($news as $new) {

        $date = date('Y-m-d', strtotime($new['date']));
        ?>
            <article class="new" id="news-<?php echo($new['id']) ?>">
                <?php if ($new['image'] !== '') { ?>
                    <div class="news-img">
                        <img src="<?php echo(BASE_URL . UPLOADS_FOLDER . 'images/' . $new['image']); ?>">
                    </div>
                <?php } ?>
                <div class="news-text">
                    <div class="two-buttons-fix">
                        <button class="two-buttons" type="button" onclick="showPopupChangeNews(<?php echo($new['id']) ?>)">
                            <i class="fas fa-pencil-alt"></i> Ändra Nyhet
                        </button>
                        <form method="post">
                            <button class="two-buttons" type="submit" formmethod="post" name="removeNewsPost" value="<?php echo($new['id']); ?>">
                                <i class="fas fa-times"></i> Ta bort Nyhet
                            </button>
                        </form>
                    </div>
                    <div class="news-information">
                        <h3> <?php echo($date) ?> </h3>
                        <p class="desc"><?php echo($new['news']) ?></p>
                    </div>
                </div>
            </article>
        <?php } ?>
    </div>
    <!-- Pagination -->
    <div class="pagination">
        <?php if($newsPage > 0) { ?>
            <div class="previous-page">
                <a class="prev-arrow" href="?newspage=<?php echo $newsPage - 1 ?>#newsflow">
                    <i class="fas fa-angle-left"></i> Föregående
                </a>
            </div>
        <?php }
        if($newsPage < $newsPages - 1) { ?>
            <div class="next-page">
                <a class="next-arrow" href="?newspage=<?php echo $newsPage + 1 ?>#newsflow">
                    Nästa <i class="fas fa-angle-right"></i>
                </a>
            </div>
        <?php } ?>
    </div>
</section>

<script>
    /* === SHOW CHANGE NEWS POPUP === */
    function showPopupChangeNews(id) {
        let popup = document.getElementById('popup-change-news');

        /* Selects the right newspost */
        let news = document.getElementById("news-" + id);

        /* Matches the information from popup with news */
        popup.getElementsByTagName("textarea")[0].value = news.getElementsByClassName("desc")[0].textContent;

        popup.getElementsByClassName('id-field')[0].value = id;

        popup.style.display = 'block';

        /* Scrolls up to top when button is clicked */
        window.scroll(0, 0);
    }
</script>