<?php
require_once '../components/resources.php';

if (isset($_POST['removeCat'])) {
    $removed = $database->deleteCat($_POST['removeCat']);
    $goToPage = 'news';
}

$cats = $database->getCats();

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
</section>