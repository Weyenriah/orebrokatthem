<?php
require_once '../components/resources.php';

// Remove news
if (isset($_POST['removeNewsPost'])) {
    $removedNews = $database->deleteNewsPost($_POST['removeNewsPost']);
    $goToPage = 'news';
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
    <h2>Hantera Nyheter</h2>
    <button class="add-button-employee" type="button" onclick="showPopupNews()"> Lägg till </button>

    <div class="prev-next">
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

    <?php if (isset($removedNews)) { ?>
        <div class="removed">
            <p>
                <?php echo(($removedNews)? "Nyhet borttagen": "Kunde inte ta bort nyheten"); ?>
            </p>
        </div>
    <?php } ?>

    <div class="news">
        <?php
        foreach ($news as $new) {

        $date = date('Y-m-d', strtotime($new['date']));
        ?>
            <article class="new">
                <?php if ($new['image'] !== '') { ?>
                    <img class="news-img" src="<?php echo('../' . UPLOADS_FOLDER . 'images/' . $new['image']); ?>">
                <?php } ?>
                <div class="news-text">
                    <div class="change-news">
                        <button type="button"> <i class="fas fa-pencil-alt"></i> Ändra Nyhet </button>
                        <form method="post">
                            <button type="submit" formmethod="post" name="removeNewsPost" value="<?php echo($new['id']); ?>">
                                <i class="fas fa-times"></i> Ta bort Nyhet
                            </button>
                        </form>
                    </div>
                    <div class="news-information">
                        <h3> <?php echo($date) ?> </h3>
                        <p> <?php echo($new['news']) ?> </p>
                    </div>
                </div>
            </article>
        <?php } ?>
    </div>

    <div class="prev-next">
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