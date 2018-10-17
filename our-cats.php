<?php
require_once 'components/resources.php';

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
if(isset($_GET['jourhome'])) {
    $living += 1;
    $filter[] = 'jourhome=true';
}
if (isset($_GET['cathome'])) {
    $living += 2;
    $filter[] = 'cathome=true';
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
$cats = $database->getCats($page, $gender, $living, $name);
$pages = $database->countCatPages($gender, $living, $name);

// Keep the expanded page throughout actions with cat flow
$expanded = isset($_GET['page']) || $search || isset($_GET['cathome']) ||
    isset($_GET['jourhome']) || isset($_GET['female']) || isset($_GET['male'])  ||
    count($cats) < 3;
?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include(APP_FOLDER . '/components/head.php') ?>

<body id="body">
<!-- Popup for cats -->
<?php include(APP_FOLDER . '/cat-page.php') ?>

<!-- Calls for main navigation -->
<?php include(APP_FOLDER . '/components/navigation.php') ?>

<!-- Specific heading to this page -->
<header class="header">
    <h1> Våra katter </h1>
    <p> <?php echo($database->getContent('ourcats-header')); ?> </p>
</header>

<section class="blue-background general-grid" id="our-cats">
    <!-- Filter -->
    <form method="GET" action="#our-cats" class="filter-search blue-paragraph">
        <div class="search-field">
            <div class="searches" id="search-form">
                <label for="search"> <i class="fas fa-search"></i> </label>
                <input type="search" name="search" id="search" placeholder="Sök efter katt..." aria-label="Sök" value="<?php echo($name) ?>">
                <button class="search-button" type="submit"> Sök </button>
            </div>

            <div class="filter">
                <button type="button" name="all-filters" class="filters" id="all-filters" onclick="filter()">
                    <i class="fas fa-sliders-h"></i>
                </button>
            </div>
        </div>
        <div id="filter-choices" class="<?php echo((isset($_GET['female']) || isset($_GET['male']) || isset($_GET['cathome']) || isset($_GET['jourhome'])) ? '' : 'not-display') ?>">
            <div class="filter-form" id="filter-form">
                    <span class="gender checkbox">
                        <h3 class="checkbox-title"> Kön </h3>
                        <input type="checkbox" name="female" <?php echo((isset($_GET['female'])) ? 'checked' : '')?> value="true" id="female">
                        <label for="female"> Hona </label>
                        <input type="checkbox" name="male" <?php echo((isset($_GET['male'])) ? 'checked' : '')?> value="true" id="male">
                        <label for="male"> Hane </label>
                    </span>

                    <span class="age checkbox">
                        <h3 class="checkbox-title"> Ålder </h3>
                        <input type="checkbox" name="kitten" value="true" id="kitten">
                        <label for="kitten"> Kattunge </label>
                        <input type="checkbox" name="young" value="true" id="young">
                        <label for="young"> Ungkatt </label>
                        <input type="checkbox" name="senior" value="true" id="senior">
                        <label for="senior"> Senior </label>
                    </span>

                    <span class="living checkbox">
                        <h3 class="checkbox-title"> Boende </h3>
                        <input type="checkbox" name="cathome" <?php echo((isset($_GET['cathome'])) ? 'checked' : '')?> value="true" id="cathome">
                        <label for="cathome"> Katthem </label>
                        <input type="checkbox" name="jourhome" <?php echo((isset($_GET['jourhome'])) ? 'checked' : '')?> value="true" id="jour">
                        <label for="jour"> Jourhem </label>
                    </span>

                <button class="filter-submit" type="submit" value="submit"> Filtrera </button>
            </div>
        </div>
    </form>
    <!-- Cat-cards -->
    <div class="blue-paragraph<?php if($expanded) echo(' expanded'); ?>" id="cats">
        <?php
        // If there is no cats echo this
        if(count($cats) < 1) {
            echo('Inga katter hittades');
        }

        // Checks if pagination exists
        $hasPrevOrNext = ($page < $pages - 1 && !$search) || ($page > 0 && !$search);

        foreach ($cats as $kittenPosition => $kitten) {

            ?>
            <div class="small-change">
                <article class="cat-style" id="cat-<?php echo($kitten['id']); ?>">
                    <div class="cat-img">
                        <img class="image-to-cat" src="<?php echo(UPLOADS_FOLDER . 'images/' . $kitten['image']); ?>">
                    </div>
                    <div class="cat-text">
                        <div class="cat-title">
                            <img src="images/paw-icon.png">
                            <h3 class="cat-name"> <?php echo($kitten['name']); ?> </h3>
                        </div>

                        <div class="small-info">
                            <small class="cat-age"> <?php echo($kitten['age']) ?> | </small>
                            <small class="cat-gender"> <?php echo($kitten['gender'] ? 'Hane': 'Hona') ?> | </small>
                            <small class="color"> <?php echo($kitten['color']) ?> </small>
                        </div>
                        <p class="desc"> <?php echo(explode("<br/>", $kitten['description'], 2)[0]) ?> </p>
                        <p class="desc-long" hidden> <?php echo(explode("<br/>", $kitten['description'], 2)[1]) ?> </p>
                        <div class="links">
                            <button class="read-more" type="button" onclick="showCat(<?php echo($kitten['id']); ?>)"> Läs mer om mig! </button>
                            <a class="adopt" href="mailto:<?php echo($kitten['contact']) ?>"> Adoptera mig! </a>
                        </div>
                    </div>
                </article>
            </div>
        <?php } ?>
        <div class="prev-next">
            <?php if($page > 0 && !$search) { ?>
                <div class="previous-page">
                    <a class="prev-arrow prev-arrow-white" href="?page=<?php echo $page - 1; if($filterString !== '') echo '&' . $filterString; ?>#our-cats">
                        <i class="fas fa-angle-left"></i> Föregående
                    </a>
                </div>
            <?php }
            if($page < $pages - 1 && !$search) { ?>
                <div class="next-page">
                    <a class="next-arrow next-arrow-white" href="?page=<?php echo $page + 1; if($filterString !== '') echo '&' . $filterString; ?>#our-cats">
                        Nästa <i class="fas fa-angle-right"></i>
                    </a>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- Hide/show content -->
    <div id="blue-hide-show">
        <button class="<?php if (count($cats) < 2) echo('hidden'); ?>" id="my-button" onclick="show()"> <?php echo($expanded ? 'Dölj' : 'Visa mer') ?> </button>
    </div>
</section>

<!-- Calls for footer -->
<?php include(APP_FOLDER . '/components/footer.php') ?>

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
        popup.getElementsByClassName("adopt")[0].href = cat.getElementsByClassName("adopt")[0].href;
        popup.getElementsByClassName("desc")[0].textContent = cat.getElementsByClassName("desc")[0].textContent + '\r\n' + cat.getElementsByClassName("desc-long")[0].textContent;

        /* Show popup */
        popup.style.display = "block";
        background.style.display = "block";
    }
</script>
</body>
</html>