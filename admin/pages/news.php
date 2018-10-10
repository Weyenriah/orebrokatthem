<?php
require_once '../components/resources.php';

$news = $database->getNews();


?>

<section class="page" id="news">
    <h2>Hantera Nyheter</h2>
    <div class="news">
        <?php
        foreach ($news as $new) {
            ?>
            <article class="new">
                <?php if ($new['image'] !== '') { ?>
                    <div class="news-img">
                        <img src="<?php echo(UPLOADS_FOLDER . 'images/' . $new['image']); ?>">
                    </div>
                <?php } ?>
                <div class="news-text">
                    <div class="change-news">
                        <a href="#"> <i class="fas fa-pencil-alt"></i> Ändra Nyhet </a>
                        <a href="#"> <i class="fas fa-times"></i> Ta bort nyhet </a>
                    </div>
                    <div class="news-information">
                        <h3> <?php echo($new['date']) ?> </h3>
                        <p> <?php echo($new['news']) ?> </p>
                    </div>
                </div>
            </article>
        <?php } ?>
    </div>
</section>