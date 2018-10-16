<?php
require_once '../components/resources.php';

$cats = $database->getCats();

?>

<section class="page" id="cats">
    <h2>Hantera Katter</h2>
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
                    <button href="#"> <i class="fas fa-pencil-alt"></i> Ändra katt </button>
                    <button href="#"> <i class="fas fa-times"></i> Ta bort katt </button>
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