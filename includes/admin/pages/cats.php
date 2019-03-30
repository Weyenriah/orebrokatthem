<?php
require_once dirname(__FILE__).'/../../../functions/load.php';

// Pagination Cats
$catsPages = $database->countAdminCatPages();
// Get page
$catsPage = 0;

if(isset($_GET['catspage'])) {
    $catsPage = $_GET['catspage'];
    $goToPage = 'cats';
}

// Get cats from DB
$cats = $database->getAdminCats($catsPage);

?>

<section class="page" id="cats">
    <h2 class="page-title">Hantera Katter</h2>
    <button class="add-button" type="button" onclick="showPopupCats()"> Lägg till </button>
    <!-- Pagination -->
    <div class="pagination">
        <?php if($catsPage > 0) { ?>
            <div class="previous-page">
                <a class="prev-arrow" href="?catspage=<?php echo $catsPage - 1 ?>#catsflow">
                    <i class="fas fa-angle-left"></i> Föregående
                </a>
            </div>
        <?php }
        if($catsPage < $catsPages - 1) { ?>
            <div class="next-page">
                <a class="next-arrow" href="?catspage=<?php echo $catsPage + 1 ?>#catsflow">
                    Nästa <i class="fas fa-angle-right"></i>
                </a>
            </div>
        <?php } ?>
    </div>
    <!-- Removed/Added/Changed Text -->
    <?php if(isset($removedCat)) { ?>
        <div class="removed">
            <p>
                <?php echo(($removedCat)? "Katt borttagen" : "Kunde inte ta bort katten"); ?>
            </p>
        </div>
    <?php }

    if(isset($addCat)) { ?>
        <div class="added">
            <p>
                <?php if($addCat === true) {
                    echo("Katt tillagd!");
                } ?>
            </p>
        </div>
        <div class="removed">
            <p>
                <?php if($addCat === false) {
                    echo("Kunde inte lägga till katten");
                } ?>
            </p>
        </div>
    <?php }

    if(isset($changeCat)) { ?>
        <div class="added">
            <p>
                <?php if($changeCat === true) {
                    echo("Katt ändrad!");
                } ?>
            </p>
        </div>
        <div class="removed">
            <p>
                <?php if($changeCat === false) {
                    echo("Katten kunde inte ändras");
                } ?>
            </p>
        </div>
    <?php } ?>

    <!-- Show Cat-flow -->
    <div class="page-display">
    <?php
    foreach ($cats as $cat) {

        $images = $database->getCatImages($cat['id']);
        ?>
        <article class="cat" id="cat-<?php echo($cat['id']) ?>">
            <div class="cat-display-images">
                <div class="cat-img big-cat-img">
                    <img src="<?php echo(BASE_URL . ((count($images) > 0) ? UPLOADS_FOLDER . 'images/' . $images[0]['image'] : "assets/images/cat-placeholder.jpg"));  ?>" alt="En bild på en katt">
                </div>
                <div class="small-cat-pics">
                    <div class="cat-img">
                        <img src="<?php echo(BASE_URL . ((count($images) > 1) ? UPLOADS_FOLDER . 'images/' . $images[1]['image'] : "assets/images/cat-placeholder.jpg"));  ?>" alt="">
                    </div>
                    <div class="cat-img">
                        <img src="<?php echo(BASE_URL . ((count($images) > 2) ? UPLOADS_FOLDER . 'images/' . $images[2]['image'] : "assets/images/cat-placeholder.jpg"));  ?>" alt="">
                    </div>
                </div>
            </div>
            <div class="cat-text">
                <div class="two-buttons-fix">
                    <button class="two-buttons" type="button" onclick="showPopupChangeCat(<?php echo($cat['id']) ?>)">
                        <i class="fas fa-pencil-alt"></i> Ändra Katt
                    </button>
                    <form method="post">
                        <button class="two-buttons" type="submit" formmethod="post" name="removeCat" value="<?php echo($cat['id']); ?>">
                            <i class="fas fa-times"></i> Ta bort Katt
                        </button>
                    </form>
                </div>
                <div class="cat-information">
                    <h3 class="catname"><?php echo($cat['name']) ?></h3>
                    <small>
                        <span class="age"><?php echo($cat['age']) ?></span>
                        | <span class="cat-gender"><?php if($cat['gender'] === 1) {
                                echo('Hane');
                            } else {
                                echo('Hona');
                            } ?></span>
                        | <span class="color"><?php echo($cat['color']) ?></span>
                    </small>
                    <!-- Hidden element for JavaScript -->
                    <span class="gender" hidden><?php echo($cat['gender']) ?></span>
                    <p class="description"><?php echo(nl2br($cat['description'])) ?></p>
                    <div class="contact-cat">
                        <div class="admin-icons">
                            <div class="cat-home">
                                <i class="fas fa-home"></i>
                                <p>
                                    <?php
                                    if($cat['home'] === 1) {
                                        echo('Katthemmet');
                                    } else {
                                        echo('Jourhem');
                                    } ?>
                                </p>
                            </div>
                            <p>Status: <?php echo($cat['hide'] ? 'Visas ej' : 'Visas') ?></p>
                        </div>

                        <!-- Hidden element for JavaScript -->
                        <span class="home" hidden><?php echo($cat['home']); ?></span>
                        <div class="admin-icons">
                            <i class="fas fa-envelope"></i>
                            <a class="cat-contact" href="mailto:<?php echo($cat['contact']); ?>"><?php echo($cat['contact']); ?></a>
                            <br/>
                            <p class="cat-contact-tele"><?php echo($cat['contact_tele'] ? '<i class="fas fa-phone"></i>' . $cat['contact_tele'] : 'Nummer till kontaktperson finns ej') ?></p>
                        </div>
                    </div>
                    <p class="showcase">
                        <?php if($cat['showcase'] === 1) {
                            echo('Visas i karusellen');
                        } ?>
                    </p>
                    <!-- Hidden element for JavaScript -->
                    <span class="showcase-cat" hidden><?php echo($cat['showcase']) ?></span>
                    <span class="adopted-checker" hidden><?php echo($cat['adopted_cat']); ?></span>
                    <span class="hide-cat" hidden><?php echo($cat['hide']); ?></span>
                </div>
            </div>
        </article>
    <?php } ?>
    </div>
    <!-- Pagination -->
    <div class="pagination">
        <?php if($catsPage > 0) { ?>
            <div class="previous-page">
                <a class="prev-arrow" href="?catspage=<?php echo $catsPage - 1 ?>#catsflow">
                    <i class="fas fa-angle-left"></i> Föregående
                </a>
            </div>
        <?php }
        if($catsPage < $catsPages - 1) { ?>
            <div class="next-page">
                <a class="next-arrow" href="?catspage=<?php echo $catsPage + 1 ?>#catsflow">
                    Nästa <i class="fas fa-angle-right"></i>
                </a>
            </div>
        <?php } ?>
    </div>
</section>

<script>

    function showPopupChangeCat(id) {
        let popup = document.getElementById('popup-change-cat');

        /* Selects the right cat */
        let cat = document.getElementById("cat-" + id);

        /* Matches the information from popup with employee */
        popup.getElementsByClassName('catname')[0].value = cat.getElementsByClassName("catname")[0].textContent;
        popup.getElementsByClassName('age')[0].value = cat.getElementsByClassName("age")[0].textContent;
        popup.getElementsByClassName('gender')[0].value = cat.getElementsByClassName('gender')[0].textContent;
        popup.getElementsByClassName('color')[0].value = cat.getElementsByClassName("color")[0].textContent;
        popup.getElementsByClassName('description')[0].value = cat.getElementsByClassName("description")[0].textContent;
        popup.getElementsByClassName('home')[0].value = cat.getElementsByClassName('home')[0].textContent;
        popup.getElementsByClassName('contact')[0].value = cat.getElementsByClassName("cat-contact")[0].textContent;
        popup.getElementsByClassName('contact-tele')[0].value = cat.getElementsByClassName("cat-contact-tele")[0].textContent;
        popup.getElementsByClassName('showcase')[0].checked = cat.getElementsByClassName("showcase-cat")[0].textContent === '1';
        popup.getElementsByClassName('adopted')[0].checked = cat.getElementsByClassName("adopted-checker")[0].textContent !== '';
        popup.getElementsByClassName('adoptable')[0].checked = cat.getElementsByClassName("hide-cat")[0].textContent === '1';

        popup.getElementsByClassName('id-field')[0].value = id;

        popup.style.display = 'block';

        /* Scrolls up to top when button is clicked */
        window.scroll(0, 0);

        updateTextCounter('change-desc-cat-counter', cat.getElementsByClassName("description")[0].textContent);
    }
</script>