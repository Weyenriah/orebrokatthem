<?php
require_once '../components/resources.php';

$cats = $database->getCats();

?>

<section class="cats" id="cats">
    <div class="cat">
        <?php
        foreach ($cats as $cat) {
        ?>
        <article class="a-cat">
            <?php if ($cat['image'] !== '') { ?>
                <div class="cat-img">
                    <img src="<?php echo(UPLOADS_FOLDER . 'images/' . $cat['image']); ?>">
                </div>
            <?php } ?>
            <div class="cat-text">
                <div class="change-cat">
                    <a href="#"> <i class="fas fa-pencil-alt"></i> Ändra katt </a>
                    <a href="#"> <i class="fas fa-times"></i> Ta bort katt </a>
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