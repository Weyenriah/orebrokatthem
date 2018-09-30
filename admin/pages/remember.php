<?php
require_once '../components/resources.php';

$rememCats = $database->getRememberCats();

?>

<section class="page" id="remem-cats">
    <h2>Ändra Katter i Minneslunden</h2>
    <div class="remem-cats">
        <?php
        foreach ($rememCats as $rememCat) {
            $born = ($rememCat['born'] === null) ? '' : ('* ' . $rememCat['born'] . ' |');
            $came = ($rememCat['came'] === null) ? '-' : date('Y-m-d', strtotime($rememCat['came']));
            $adopted = ($rememCat['adopted'] === null) ? '-' : date('Y-m-d', strtotime($rememCat['adopted']));
            $death = date('Y-m-d', strtotime($rememCat['death']));
            ?>
            <article class="remem-cat">
                <?php if ($rememCat['image'] !== '') { ?>
                    <div class="remem-cat-img">
                        <img src="<?php echo(UPLOADS_FOLDER . 'images/' . $rememCat['image']); ?>">
                    </div>
                <?php } ?>
                <div class="remem-cat-text">
                    <div class="change-remem-cat">
                        <a href="#"> <i class="fas fa-pencil-alt"></i> Ändra katt </a>
                        <a href="#"> <i class="fas fa-times"></i> Ta bort katt </a>
                    </div>
                    <div class="remem-cat-information">
                        <small> <?php echo($born) ?> † <?php echo($death) ?> </small>
                        <h3> <?php echo($rememCat['name']) ?> </h3>
                        <small> <?php echo($came) ?> | <?php echo($adopted) ?> </small>
                        <p> <?php echo($rememCat['description']) ?> </p>
                        <small class="cause"> <?php echo($rememCat['cause']) ?> </small>
                    </div>
                </div>
            </article>
        <?php } ?>
    </div>
</section>