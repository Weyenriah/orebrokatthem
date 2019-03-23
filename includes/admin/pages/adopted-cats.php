<?php
require_once dirname(__FILE__).'/../../../functions/load.php';

// Remove Cat
if (isset($_POST['removeCat'])) {
    $removedCat = $database->deleteCat($_POST['removeCat']);
    $goToPage = 'adopted-cats';
}

$filter = array();

// Filter
$gender = 0; // Gender filter
if(isset($_GET['male'])) {
    $gender += 1;
    $filter[] = 'male=true';
    $goToPage = 'adopted-cats';
}
if (isset($_GET['female'])) {
    $gender += 2;
    $filter[] = 'female=true';
    $goToPage = 'adopted-cats';
}

$age = 0; // Age filter
if(isset($_GET['kitten'])) {
    $age += 1;
    $filter[] = 'kitten=true';
    $goToPage = 'adopted-cats';
}
if(isset($_GET['young'])) {
    $age += 2;
    $filter[] = 'young=true';
    $goToPage = 'adopted-cats';
}
if(isset($_GET['senior'])) {
    $age += 4;
    $filter[] = 'senior=true';
    $goToPage = 'adopted-cats';
}

// Search cats according to name
$name = "";

$search = isset($_GET['search']);
if($search) {
    $name = $_GET['search'];
    $filter[] = 'search=' . $name;
    $goToPage = 'adopted-cats';
}

/* Even if filter is empty, go to page */
if(isset($_GET['filter-button'])) {
    $goToPage = 'adopted-cats';
}

// Glue
$filterString = implode('&', $filter);

// Get cats from DB
$adoptedCats = $database->getAdoptedCats($gender, $name, $age);
?>

<section class="page" id="adopted-cats">
    <h2 class="page-title">Se/Hantera Adopterade katter</h2>

    <!-- Filter -->
    <form method="GET" action="#adopted-cats" class="paragraph-position filter-search">
        <div class="search-field">
            <div class="searches" id="search-form">
                <label for="search"> <i class="fas fa-search"></i> </label>
                <input type="search" name="search" id="search" placeholder="Sök efter katt..." aria-label="Sök" value="<?php echo($name) ?>">
                <button class="admin-filter-search-button search-button" type="submit"> Sök </button>
            </div>

            <div class="filter">
                <button type="button" name="all-filters" class="filters" id="all-filters" onclick="filter()">
                    <i class="fas fa-sliders-h"></i>
                </button>
            </div>
        </div>
        <div id="filter-choices" class="<?php echo((isset($_GET['female']) || isset($_GET['male']) || isset($_GET['kitten']) || isset($_GET['young'])|| isset($_GET['senior'])) ? '' : 'not-display') ?>">
            <div class="filter-form" id="filter-form">
                <div class="gender checkbox">
                    <h3 class="checkbox-title"> Kön </h3>
                    <input type="checkbox" name="female" <?php echo((isset($_GET['female'])) ? 'checked' : '')?> value="true" id="female">
                    <label for="female"> Hona </label>
                    <input type="checkbox" name="male" <?php echo((isset($_GET['male'])) ? 'checked' : '')?> value="true" id="male">
                    <label for="male"> Hane </label>
                </div>

                <div class="age checkbox">
                    <h3 class="checkbox-title"> Ålder </h3>
                    <input type="checkbox" name="kitten" <?php echo((isset($_GET['kitten'])) ? 'checked' : '')?> value="true" id="kitten">
                    <label for="kitten"> Kattunge </label>
                    <input type="checkbox" name="young" <?php echo((isset($_GET['young'])) ? 'checked' : '')?> value="true" id="young">
                    <label for="young"> Vuxen </label>
                    <input type="checkbox" name="senior" <?php echo((isset($_GET['senior'])) ? 'checked' : '')?> value="true" id="senior">
                    <label for="senior"> Senior </label>
                </div>

                <button class="admin-filter-search-button filter-button" type="submit" name="filter-button" value="submit"> Filtrera </button>
            </div>
        </div>
    </form>
    <!-- Removed/Added/Changed Text -->
    <?php if(isset($removedCat)) { ?>
    <div class="removed">
        <p>
            <?php echo(($removedCat)? "Katt borttagen" : "Kunde inte ta bort katten"); ?>
        </p>
    </div>
    <?php } ?>

    <div class="page-display">
        <?php
        // If there is no cats echo this
        if(count($adoptedCats) < 1) {
            echo('Inga katter hittades');
        }

        foreach ($adoptedCats as $adoptedCat) {

            $images = $database->getCatImages($adoptedCat['id']);

            $adoptedDate = $adoptedCat['adopted_cat'];
            $newAdoptedDate = date("Y-m-d", strtotime($adoptedDate));
            ?>
            <article class="cat" id="cat-<?php echo($adoptedCat['id']) ?>">
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
                        <button class="two-buttons" type="button" onclick="showPopupChangeCat(<?php echo($adoptedCat['id']) ?>); whenAdopted()">
                            <i class="fas fa-pencil-alt"></i> Ändra Katt
                        </button>
                        <form method="post">
                            <button class="two-buttons" type="submit" formmethod="post" name="removeCat" value="<?php echo($adoptedCat['id']); ?>">
                                <i class="fas fa-times"></i> Ta bort Katt
                            </button>
                        </form>
                    </div>
                    <div class="cat-information">
                        <h3 class="catname"><?php echo($adoptedCat['name']) ?></h3>
                        <small>
                            <span class="age"><?php echo($adoptedCat['age']) ?></span>
                            | <span class="cat-gender"><?php if($adoptedCat['gender'] === 1) {
                                    echo('Hane');
                                } else {
                                    echo('Hona');
                                } ?></span>
                            | <span class="color"><?php echo($adoptedCat['color']) ?></span>
                        </small>
                        <!-- Hidden element for JavaScript -->
                        <span class="gender" hidden><?php echo($adoptedCat['gender']) ?></span>
                        <p class="description"><?php echo(nl2br($adoptedCat['description'])) ?></p>
                        <div class="contact-cat">
                            <div class="cat-home">
                                <i class="fas fa-home"></i>
                                <p>
                                    <?php echo('Adopterad: ') ?> <span class="adopted-checker"> <?php echo($newAdoptedDate) ?></span>
                                </p>
                            </div>
                            <!-- Hidden element for JavaScript -->
                            <span class="home" hidden><?php echo($adoptedCat['home']); ?></span>
                            <span class="showcase-cat" hidden><?php echo($adoptedCat['showcase']) ?></span>

                            <div class="admin-icons">
                                <i class="fas fa-envelope"></i>
                                <a class="cat-contact" href="mailto:<?php echo($adoptedCat['contact']); ?>"><?php echo($adoptedCat['contact']); ?></a>
                                <br/>
                                <p class="cat-contact-tele"><?php echo($adoptedCat['contact_tele'] ? '<i class="fas fa-phone"></i>' . $adoptedCat['contact_tele'] : 'Nummer till kontaktperson finns ej') ?></p>
                            </div>
                        </div>

                    </div>
                </div>
            </article>
        <?php } ?>
    </div>
</section>

<script>
    // === HIDE AND SHOW FILTER CHOICES ===
    let element = document.getElementById('filter-choices');

    function filter() {
        if (element.classList.contains("not-display")) {
            element.classList.remove("not-display");
        } else {
            element.classList.add("not-display");
        }
    }

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

        popup.getElementsByClassName('id-field')[0].value = id;

        popup.style.display = 'block';

        /* Scrolls up to top when button is clicked */
        window.scroll(0, 0);

        updateTextCounter('change-desc-cat-counter', cat.getElementsByClassName("description")[0].textContent);
    }

    function whenAdopted() {
        let popup = document.getElementById('popup-change-cat');

        let popupContainer = document.getElementsByClassName('cat-container')[0];

        if(popup.getElementsByClassName('adopted')[0].checked) {
            popupContainer.classList.add('change-popup');

        }

        if(popupContainer.classList.contains('change-popup')) {
            popupContainer.getElementsByClassName('showcase')[0].disabled = true;
        }

    }
</script>