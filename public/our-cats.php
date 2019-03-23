<?php
require_once dirname(__FILE__).'/../functions/load.php';

// Reverse cat page flow
$reversed = isset($_GET['oa']) ? $_GET['oa'] === "true" : false;

// Get page
$page = isset($_GET['page']) ? $_GET['page'] : 0;

$filter = array();

// Filter
$gender = 0; // Gender filter
if(isset($_GET['male'])) {
    $gender += 1;
    $filter[] = 'male=true';
}
if (isset($_GET['female'])) {
    $gender += 2;
    $filter[] = 'female=true';
}

$living = 0; // Living filter
if (isset($_GET['cathome'])) {
    $living += 1;
    $filter[] = 'cathome=true';
}
if(isset($_GET['jourhome'])) {
    $living += 2;
    $filter[] = 'jourhome=true';
}

$age = 0; // Age filter
if(isset($_GET['kitten'])) {
    $age += 1;
    $filter[] = 'kitten=true';
}
if(isset($_GET['young'])) {
    $age += 2;
    $filter[] = 'young=true';
}
if(isset($_GET['senior'])) {
    $age += 4;
    $filter[] = 'senior=true';
}

// Search cats according to name
$name = "";

$search = isset($_GET['search']) && $_GET['search'] != '';
if($search) {
    $name = $_GET['search'];
    $filter[] = 'search=' . $name;
}

// Glue
$filterString = implode('&', $filter);

// Get cats
$cats = $database->getCats($page, $gender, $living, $name, $age);
$pages = $database->countCatPages($gender, $living, $name, $age);

// Keep the expanded page throughout actions with cat flow
$expanded = isset($_GET['page']) || $search || isset($_GET['cathome']) ||
    isset($_GET['jourhome']) || isset($_GET['female']) || isset($_GET['male'])  ||
    count($cats) < 3;
?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include(APP_FOLDER . '/includes/head.php') ?>

<body id="body">
<!-- Popup for cats -->
<?php include(APP_FOLDER . '/includes/cat-page.php') ?>

<!-- Calls for main navigation -->
<?php include(APP_FOLDER . '/includes/navigation.php') ?>

<!-- Specific heading to this page -->
<header class="header">
    <h1> Våra katter </h1>
    <p> <?php echo(nl2br($database->getContent('ourcats-header'))); ?> </p>
</header>

<section class="text-box blue-background" id="our-cats">
    <!-- Filter -->
    <form method="GET" action="#our-cats" class="paragraph-position filter-search">
        <div class="search-field">
            <div class="searches" id="search-form">
                <label for="search"> <i class="fas fa-search"></i> </label>
                <input type="search" name="search" id="search" placeholder="Sök efter katt..." aria-label="Sök" value="<?php echo($name) ?>">
                <button class="button search-button" type="submit"> Sök </button>
            </div>

            <div class="filter">
                <button type="button" name="all-filters" class="filters" id="all-filters" onclick="filter()">
                    <i class="fas fa-sliders-h"></i>
                </button>
            </div>
        </div>
        <div id="filter-choices" class="<?php echo((isset($_GET['female']) || isset($_GET['male']) || isset($_GET['cathome']) || isset($_GET['jourhome'])) ? '' : 'not-display') ?>">
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

                    <div class="living checkbox">
                        <h3 class="checkbox-title"> Boende </h3>
                        <input type="checkbox" name="cathome" <?php echo((isset($_GET['cathome'])) ? 'checked' : '')?> value="true" id="cathome">
                        <label for="cathome"> Katthem </label>
                        <input type="checkbox" name="jourhome" <?php echo((isset($_GET['jourhome'])) ? 'checked' : '')?> value="true" id="jour">
                        <label for="jour"> Jourhem </label>
                    </div>

                <button class="button filter-button" type="submit" value="submit"> Filtrera </button>
            </div>
        </div>
    </form>
    <!-- Cat-cards -->
    <div class="paragraph-position" id="cats">
        <?php
        // If there is no cats echo this
        if(count($cats) < 1) {
            echo('Inga katter hittades');
        }

        // Checks if pagination exists
        $hasPrevOrNext = ($page < $pages - 1 && !$search) || ($page > 0 && !$search);

        foreach ($cats as $kittenPosition => $kitten) {
            if ($kitten['adopted_cat'] === NULL && $kitten['hide'] === 0) {

                $images = $database->getCatImages($kitten['id']);
                ?>
                <div class="small-change">
                    <article class="cat-style" id="cat-<?php echo($kitten['id']); ?>">
                        <div class="cat-img">
                            <img class="image-to-cat" alt="En bild på en katt"
                                 src="<?php echo(BASE_URL . ((count($images) > 0) ? UPLOADS_FOLDER . 'images/' . $images[0]['image'] : "assets/images/cat-placeholder.jpg")); ?>">
                            <img class="image-to-cat" alt=""
                                 src="<?php echo(BASE_URL . ((count($images) > 1) ? UPLOADS_FOLDER . 'images/' . $images[1]['image'] : "assets/images/cat-placeholder.jpg")); ?>"
                                 hidden>
                            <img class="image-to-cat" alt=""
                                 src="<?php echo(BASE_URL . ((count($images) > 2) ? UPLOADS_FOLDER . 'images/' . $images[2]['image'] : "assets/images/cat-placeholder.jpg")); ?>"
                                 hidden>
                        </div>
                        <div class="cat-text">
                            <div class="cat-title">
                                <img src="assets/images/paw-icon.png" alt="">
                                <h3 class="cat-name"> <?php echo($kitten['name']); ?> </h3>
                            </div>

                            <div class="small-info">
                                <small class="cat-age"> <?php echo($kitten['age']) ?> |</small>
                                <small class="cat-gender"> <?php echo($kitten['gender'] ? 'Hane' : 'Hona') ?> |</small>
                                <small class="color"> <?php echo($kitten['color']) ?> </small>
                            </div>
                            <?php $text = nl2br($kitten['description']);
                            $exploded = preg_split('/(<br>)|(<br \/>)|(<br\/>)/m', $text, 2);
                            ?>
                            <p class="desc"> <?php echo($exploded[0]) ?> </p>
                            <p class="desc-long" hidden> <?php if (count($exploded) > 1) echo($exploded[1]); ?> </p>
                            <div class="cat-home">
                                <i class="fas fa-home"></i>
                                <p class="home-cat"> <?php echo($kitten['home'] ? 'Katthem' : 'Jourhem') ?> </p>
                            </div>
                            <div class="links">
                                <button class="about-cat" type="button"
                                        onclick="showCat(<?php echo($kitten['id']); ?>); window.scrollTo(0, 0);"> Läs
                                    mer om mig!
                                </button>
                                <p class="adopt" hidden> <?php echo(displayEmail($kitten['contact'])); ?> </p>
                                <p class="adopt-tele"
                                   hidden> <?php echo($kitten['contact_tele'] ? '<i class="fas fa-phone"></i>' . $kitten['contact_tele'] : '') ?> </p>
                            </div>
                        </div>
                    </article>
                </div>
            <?php }
        }   ?>
        <div class="pagination">
            <?php if($page > 0 && !$search) { ?>
                <div class="previous-page">
                    <a class="prev-arrow prev-arrow" href="?page=<?php echo $page - 1; if($filterString !== '') echo '&' . $filterString; ?>#our-cats">
                        <i class="fas fa-angle-left"></i> Föregående
                    </a>
                </div>
            <?php }
            if($page < $pages - 1 && !$search) { ?>
                <div class="next-page">
                    <a class="next-arrow next-arrow" href="?page=<?php echo $page + 1; if($filterString !== '') echo '&' . $filterString; ?>#our-cats">
                        Nästa <i class="fas fa-angle-right"></i>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- Calls for footer -->
<?php include(APP_FOLDER . '/includes/footer.php') ?>

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

    // === HIDE AND SHOW CATS ===
    let container = document.getElementById('cats');
    let buttonText = document.getElementById('my-button');

    /* Checks if container contains class expanded, "if" it'll remove the class "else" it'll add it */
    function show() {
        if(container.classList.contains("expanded")) {
            container.classList.remove("expanded");
            /* Adds text so that the button is correct */
            buttonText.innerHTML = 'Visa mer';
        } else {
            container.classList.add("expanded");
            /* Adds text so that the button is correct */
            buttonText.innerHTML = 'Dölj';
        }
    }

    // == SHOW POPUP ===
    function showCat(id) {
        let popup = document.getElementById("cat-page");
        let background = document.getElementById("toned-down");

        let cat = document.getElementById("cat-" + id);

        /* Matches the information from popup with cat */
        popup.getElementsByClassName("cat-name")[0].textContent = cat.getElementsByClassName("cat-name")[0].textContent;
        popup.getElementsByClassName("cat-age")[0].textContent = cat.getElementsByClassName("cat-age")[0].textContent;
        popup.getElementsByClassName("cat-gender")[0].textContent = cat.getElementsByClassName("cat-gender")[0].textContent;
        popup.getElementsByClassName("color")[0].textContent = cat.getElementsByClassName("color")[0].textContent;
        popup.getElementsByClassName("adopt-me-mail")[0].innerHTML = cat.getElementsByClassName("adopt")[0].innerHTML;
        popup.getElementsByClassName("adopt-me-tele")[0].innerHTML = cat.getElementsByClassName("adopt-tele")[0].innerHTML;
        popup.getElementsByClassName("desc")[0].textContent = cat.getElementsByClassName("desc")[0].textContent + '\r\n' + cat.getElementsByClassName("desc-long")[0].textContent;
        popup.getElementsByClassName("popup-slide")[0].src = cat.getElementsByClassName("image-to-cat")[0].src;
        popup.getElementsByClassName("popup-slide")[1].src = cat.getElementsByClassName("image-to-cat")[1].src;
        popup.getElementsByClassName("popup-slide")[2].src = cat.getElementsByClassName("image-to-cat")[2].src;
        popup.getElementsByClassName("demo")[0].src = cat.getElementsByClassName("image-to-cat")[0].src;
        popup.getElementsByClassName("demo")[1].src = cat.getElementsByClassName("image-to-cat")[1].src;
        popup.getElementsByClassName("demo")[2].src = cat.getElementsByClassName("image-to-cat")[2].src;
        popup.getElementsByClassName("home-popup")[0].textContent = cat.getElementsByClassName("home-cat")[0].textContent;

        /* Show popup */
        popup.style.display = "block";
        background.style.display = "block";
    }
</script>
</body>
</html>