<?php
require_once '../components/resources.php';

// Remove Cat
if (isset($_POST['removeCat'])) {
    $removed = $database->deleteCat($_POST['removeCat']);
    $goToPage = 'news';
}

// Pagination Cats
$catsPages = $database->countCats();
// Get page
$catsPage = isset($_GET['catspage']) ? $_GET['catspage'] : 0;

// Get cats from DB
$cats = $database->getCats($catsPage);

?>

<section class="page" id="cats">
    <h2>Hantera Katter</h2>
    <?php if (isset($removed)) {
        echo(($removed)? "Katt borttagen": "Kunde inte ta bort katten");
    } ?>
    <div class="cats">
        <?php
        foreach ($cats as $cat) {
        ?>
        <article class="cat">
            <?php if ($cat['image'] !== '') { ?>
                <div class="cat-img">
                    <img src="<?php echo(UPLOADS_FOLDER . 'images/' . $cat['image']); ?>">
                </div>
            <?php } ?>
            <div class="cat-text">
                <div class="change-cat">
                    <button type="button"> <i class="fas fa-pencil-alt"></i> Ändra katt </button>
                    <form method="post">
                        <button type="submit" formmethod="post" name="removeCat" value="<?php echo($cat['id']); ?>"> <i class="fas fa-times"></i> Ta bort nyhet </button>
                    </form>
                </div>
                <div class="cat-information">
                    <h3> <?php echo($cat['name']) ?> </h3>
                    <small> <?php echo($cat['age']) ?> | <?php echo($cat['gender'] ? 'Hane': 'Hona') ?> | <?php echo($cat['color']) ?> </small>
                    <p> <?php echo($cat['description']) ?> </p>
                </div>
            </div>
        </article>
        <?php } ?>
    </div>
    <div class="prev-next">
        <?php if($catsPage > 0) { ?>
            <div class="previous-page">
                <a class="prev-arrow prev-arrow-white" href="?catspage=<?php echo $catsPage - 1 ?>#catsflow">
                    <i class="fas fa-angle-left"></i> Föregående
                </a>
            </div>
        <?php }
        if($catsPage < $catsPages - 1) { ?>
            <div class="next-page">
                <a class="next-arrow next-arrow-white" href="?catspage=<?php echo $catsPage + 1 ?>#catsflow">
                    Nästa <i class="fas fa-angle-right"></i>
                </a>
            </div>
        <?php } ?>
    </div>
</section>