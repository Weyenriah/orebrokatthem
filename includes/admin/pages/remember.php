<?php
require_once dirname(__FILE__).'/../../../functions/load.php';

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
    <h2 class="page-title">Hantera Katter i Minneslunden</h2>
    <button class="add-button" type="button" onclick="showPopupRememberCat()"> Lägg till </button>
    <!-- Pagination -->
    <div class="pagination">
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
    <!-- Removed/Added/Changed Text -->
    <?php if (isset($removedRemember)) { ?>
        <div class="removed">
            <p>
                <?php echo(($removedRemember) ? "Katt borttagen" : "Kunde inte ta bort katten"); ?>
            </p>
        </div>
    <?php }

    if(isset($addRememCat)) { ?>
        <div class="added">
            <p>
                <?php if($addRememCat === true) {
                    echo("Katt tillagd!");
                } ?>
            </p>
        </div>
        <div class="removed">
            <p>
                <?php if($addRememCat === false) {
                    echo("Kunde inte lägga till katten");
                } ?>
            </p>
        </div>
    <?php }

    if(isset($changeRememCat)) { ?>
        <div class="added">
            <p>
                <?php if($changeRememCat === true) {
                    echo("Katt ändrad!");
                } ?>
            </p>
        </div>
        <div class="removed">
            <p>
                <?php if($changeRememCat === false) {
                    echo("Katten kunde inte ändras");
                } ?>
            </p>
        </div>
    <?php } ?>
    <!-- Remember Cat-flow -->
    <div class="page-display">
        <?php
        foreach ($rememCats as $rememCat) {
            $born = ($rememCat['born'] === null) ? '-' : ($rememCat['born']);
            $came = ($rememCat['came'] === null) ? '-' : date('Y-m-d', strtotime($rememCat['came']));
            $adopted = ($rememCat['adopted'] === null) ? '-' : date('Y-m-d', strtotime($rememCat['adopted']));
            $death = date('Y-m-d', strtotime($rememCat['death']));
            ?>
            <article class="remem-cat" id="remember-<?php echo($rememCat['id']) ?>">
                <?php if ($rememCat['image'] !== '' && $rememCat['image'] !== NULL) { ?>
                    <div class="remem-cat-img">
                        <img src="<?php echo(BASE_URL . UPLOADS_FOLDER . 'images/' . $rememCat['image']); ?>" alt="Bild på en katt">
                    </div>
                <?php } ?>
                <div class="remem-cat-text">
                    <div class="two-buttons-fix">
                        <button class="two-buttons" type="button" onclick="showPopupChangeRememberCat(<?php echo($rememCat['id']) ?>)">
                            <i class="fas fa-pencil-alt"></i> Ändra Katt
                        </button>
                        <form method="post">
                            <button class="two-buttons" type="submit" formmethod="post" name="removeRememberCat" value="<?php echo($rememCat['id']); ?>">
                                <i class="fas fa-times"></i> Ta bort Katt
                            </button>
                        </form>
                    </div>
                    <div class="remem-cat-information">
                        <small> * <span class="born"><?php echo($born) ?></span> |
                            † <span class="died"><?php echo($death) ?></span> </small>
                        <h3 class="catname"><?php echo($rememCat['name']) ?></h3>
                        <small> Kom till katthem: <span class="came"><?php echo($came) ?></span> |
                            Adopterad: <span class="adopted"><?php echo($adopted) ?></span> </small>
                        <p class="desc"><?php echo($rememCat['description']) ?></p>
                        <small class="cause"><?php echo($rememCat['cause']) ?></small>
                    </div>
                </div>
            </article>
        <?php } ?>
    </div>
    <!-- Pagination -->
    <div class="pagination">
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

    /* === SHOW CHANGE CAT-POPUP === */
    function showPopupChangeRememberCat(id) {
        let popup = document.getElementById('popup-change-remember-cat');

        /* Selects the right newspost */
        let remember = document.getElementById("remember-" + id);

        console.log(remember);

        /* Matches the information from popup with employee */
        popup.getElementsByClassName('born')[0].value = remember.getElementsByClassName("born")[0].textContent;
        popup.getElementsByClassName('died')[0].value = remember.getElementsByClassName("died")[0].textContent;
        popup.getElementsByClassName('catname')[0].value = remember.getElementsByClassName("catname")[0].textContent;
        popup.getElementsByClassName('came')[0].value = remember.getElementsByClassName("came")[0].textContent;
        popup.getElementsByClassName('adopted')[0].value = remember.getElementsByClassName("adopted")[0].textContent;
        popup.getElementsByClassName('desc')[0].value = remember.getElementsByClassName("desc")[0].textContent;
        popup.getElementsByClassName('cause')[0].value = remember.getElementsByClassName("cause")[0].textContent;

        popup.getElementsByClassName('id-field')[0].value = id;

        popup.style.display = 'block';

        /* Scrolls up to top when button is clicked */
        window.scroll(0, 0);

        updateTextCounter('change-desc-remem-counter', remember.getElementsByClassName("desc")[0].textContent);
    }
</script>