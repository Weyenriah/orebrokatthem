<?php
require_once '../components/resources.php';

// Remove news
if (isset($_POST['removeRememberCat'])) {
    $removedRemember = $database->deleteRememberCat($_POST['removeRememberCat']);
    $goToPage = 'remem-cats';
}

// Pagination (Minneslunden/remember cats)
$rememPages = $database->countRememberPages();
// Get page
$rememPage = 0;

if(isset($_GET['remempage'])) {
    $rememPage = $_GET['remempage'];
    $goToPage = 'remem-cats';
}

$rememCats = $database->getRememberCats($rememPage);

?>

<section class="page" id="remem-cats">
    <h2>Hantera Katter i Minneslunden</h2>

    <button class="add-button-remember" type="button" onclick="showPopupRememberCat()"> Lägg till </button>

    <div class="prev-next">
        <?php if($rememPage > 0) { ?>
            <div class="previous-page">
                <a class="prev-arrow" href="?remempage=<?php echo $rememPage - 1 ?>#remember">
                    <i class="fas fa-angle-left"></i> Föregående
                </a>
            </div>
        <?php }
        if($rememPage < $rememPages - 1) { ?>
            <div class="next-page">
                <a class="next-arrow" href="?remempage=<?php echo $rememPage + 1 ?>#remember">
                    Nästa <i class="fas fa-angle-right"></i>
                </a>
            </div>
        <?php } ?>
    </div>

    <?php if (isset($removedRemember)) { ?>
        <div class="removed">
            <p>
                <?php echo(($removedRemember) ? "Katt borttagen" : "Kunde inte ta bort katten"); ?>
            </p>
        </div>
    <?php } ?>

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
                    <img class="remem-cat-img" src="<?php echo('../' . UPLOADS_FOLDER . 'images/' . $rememCat['image']); ?>">
                <?php } ?>
                <div class="remem-cat-text">
                    <div class="change-remem-cat">
                        <button type="button"> <i class="fas fa-pencil-alt"></i> Ändra Katt </button>
                        <form method="post">
                            <button type="submit" formmethod="post" name="removeRememberCat" value="<?php echo($rememCat['id']); ?>">
                                <i class="fas fa-times"></i> Ta bort Katt
                            </button>
                        </form>
                    </div>
                    <div class="remem-cat-information">
                        <small> <?php echo($born) ?> † <?php echo($death) ?> </small>
                        <h3> <?php echo($rememCat['name']) ?> </h3>
                        <small> Kom till katthem: <?php echo($came) ?> | Adopterad: <?php echo($adopted) ?> </small>
                        <p> <?php echo($rememCat['description']) ?> </p>
                        <small class="cause"> <?php echo($rememCat['cause']) ?> </small>
                    </div>
                </div>
            </article>
        <?php } ?>
    </div>

    <div class="prev-next">
        <?php if($rememPage > 0) { ?>
            <div class="previous-page">
                <a class="prev-arrow" href="?remempage=<?php echo $rememPage - 1 ?>#remember">
                    <i class="fas fa-angle-left"></i> Föregående
                </a>
            </div>
        <?php }
        if($rememPage < $rememPages - 1) { ?>
            <div class="next-page">
                <a class="next-arrow" href="?remempage=<?php echo $rememPage + 1 ?>#remember">
                    Nästa <i class="fas fa-angle-right"></i>
                </a>
            </div>
        <?php } ?>
    </div>
</section>

<script>
    /* === SHOW NEW CAT-POPUP === */
    function showPopupRememberCat() {
        let popup = document.getElementById('popup-remember-cat');

        popup.style.display = 'block';
    }
</script>