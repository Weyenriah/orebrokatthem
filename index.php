<?php require_once 'components/resources.php';
$slideCats = $database->getSlideCats();

// Pagination News
$newsPages = $database->countNewsPages();
// Get page
$newsPage = isset($_GET['newspage']) ? $_GET['newspage'] : 0;
// Get news
$news = $database->getNews($newsPage);

// Pagination (Minneslunden/remember cats)
$rememPages = $database->countRememberPages();
// Get page
$rememPage = isset($_GET['remempage']) ? $_GET['remempage'] : 0;
// Get rememberCats
$remember = $database->getRememberCats($rememPage);


$expanded = isset($_GET['remempage']) || isset($_GET['newspage']);
?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include(APP_FOLDER . '/components/head.php') ?>

<body id="body">
    <!-- Popup for cats -->
    <?php include(APP_FOLDER . '/cat-page.php') ?>

    <!-- Calls for navigation -->
    <?php include(APP_FOLDER . '/components/navigation.php') ?>

    <!-- Specific heading to this page -->
    <header class="header">
        <h1>Välkommen</h1>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu ex in nulla feugiat sollicitudin. Morbi feugiat facilisis enim quis aliquet. Nunc eu massa sit amet nisl euismod sollicitudin at sit amet est. Fusce vitae rhoncus ante, quis mattis dui. Nunc commodo pellentesque tortor, a ultrices ligula tincidunt quis. Nunc imperdiet sapien id sapien interdum, nec interdum odio convallis. Vestibulum id odio tortor.
        </p>
    </header>

    <!-- Carousel -->
    <section class="carousel-container blue-background" id="carousel">
        <?php
        foreach($slideCats as $slideCat) {
        ?>
            <div class="slide fade blue-paragraph" id="cat-<?php echo($slideCat['id']); ?>">
                <article class="carousel-style" id="cat-<?php echo($slideCat['id']); ?>">
                    <div class="image-carousel">
                        <img class="image-to-cat" src="<?php echo(UPLOADS_FOLDER . 'images/' . $slideCat['image']); ?>">
                    </div>
                    <div class="carousel-text">
                        <div class="carousel-title">
                            <img src="images/paw-icon.png">
                            <h3 class="cat-name"> <?php echo($slideCat['name']); ?> </h3>
                        </div>

                        <div class="small-carousel-info">
                            <small class="cat-age"> <?php echo($slideCat['age']) ?> </small>
                            <small class="cat-gender"> | <?php echo($slideCat['gender'] ? 'Hane': 'Hona') ?> </small>
                            <small class="color"> | <?php echo($slideCat['color']) ?> </small>
                        </div>
                        <p class="desc"> <?php echo(explode("<br/>", $slideCat['description'], 2)[0]) ?> </p>
                        <p class="desc-long" hidden> <?php echo(explode("<br/>", $slideCat['description'], 2)[1]) ?> </p>
                        <div class="carousel-link">
                            <button class="caro-read-more" type="button" onclick="showCat(<?php echo($slideCat['id']); ?>)"> Läs mer om mig! </button>
                        </div>
                    </div>
                </article>
            </div>
        <?php } ?>

        <a onclick="changeSlide(-1)" class="previous"> <img src="images/arrow.png"> </a>
        <a onclick="changeSlide(1)" class="next"> <img src="images/arrow.png"> </a>
    </section>

    <!-- News flow -->
    <section class="white-background general-grid" id="newsflow">
        <h2> Nyheter </h2>
        <div class="news white-paragraph<?php if($expanded) echo(' expanded'); ?>" id="news-container">
            <?php foreach($news as $new) {

                $date = date('Y-m-d', strtotime($new['date']));
                ?>
                <article class="news-card">
                    <?php if ($new['image'] !== '') { ?>
                        <div class="news-img">
                            <img src="<?php echo(UPLOADS_FOLDER . 'images/' . $new['image']); ?>">
                        </div>
                    <?php } ?>
                    <div class="news-info">
                        <h5 class="second-row-heading"> <?php echo($date); ?> </h5>
                        <p> <?php echo($new['news']); ?> </p>
                    </div>
                </article>
            <?php } ?>
            <div class="white-paragraph prev-next">
                <?php if($newsPage > 0) { ?>
                    <div class="previous-page">
                        <a class="prev-arrow prev-arrow-white" href="?newspage=<?php echo $newsPage - 1 ?>#newsflow">
                            <i class="fas fa-angle-left"></i> Föregående
                        </a>
                    </div>
                <?php }
                if($newsPage < $newsPages - 1) { ?>
                    <div class="next-page">
                        <a class="next-arrow next-arrow-white" href="?newspage=<?php echo $newsPage + 1 ?>#newsflow">
                            Nästa <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div id="hide-show">
            <button class="<?php if (count($news) < 2) echo('hidden'); ?>" id="my-button" onclick="showNews()"> <?php echo($expanded ? 'Dölj' : 'Visa mer') ?> </button>
        </div>
    </section>

    <!-- Minneslunden/Remember Cats -->
    <section class="general-grid blue-background" id="remember">
        <h2> Minneslunden </h2>
        <div class="all-remem<?php echo(isset($_GET['remempage']) ? ' expanded' : '') ?>" id="remember-container">
            <p class="blue-paragraph"> Sov gott små vänner, vila nu, för smärtan är över <br/>
                Era tappra små själar ej kämpa mer behöver <br/>
                <br/>
                Ni var så perfekta, alla underbara på sitt eget lilla sätt <br/>
                Att ni hamnade i fel händer, det känns inte rätt <br/>
                Och att vi ej hann er rädda det känns inte lätt <br/>
                <br/>
                Vi ville få ger er ett kärleksfullt hem <br/>
                som alla andra katter, ni är unika precis som dem <br/>
                Vem gjorde er så illa? Snälla säg oss vem <br/>
                <br/>
                Sov gott små vänner, vila nu, för smärtan är över <br/>
                Era tappra små själar ej kämpa mer behöver <br/>
                <br/>
                <i>I ert minne räddar vi fler</i> </p>
            <div class="all-remem-cats">
                <?php foreach($remember as $cat) {
                    $born = ($cat['born'] === null) ? '' : ('* ' . $cat['born'] . ' |');
                    $came = ($cat['came'] === null) ? '-' : date('Y-m-d', strtotime($cat['came']));
                    $adopted = ($cat['adopted'] === null) ? '-' : date('Y-m-d', strtotime($cat['adopted']));
                    $death = date('Y-m-d', strtotime($cat['death'])); ?>
                    <article class="remem-cat">
                        <div class="all-remem-title">
                            <div class="circle-of-life">
                                <h4 class="birth"> <?php echo($born) ?>  </h4>
                                <h4 class="death push-title">  † <?php echo($death) ?> </h4>
                            </div>
                            <div class="remem-cat-title">
                                <img src="images/paw-icon.png">
                                <h3> <?php echo($cat['name']) ?> </h3>
                            </div>
                            <div class="circle-of-cathome">
                                <h4 class="came"> <i>Inkom:</i> <?php echo($came) ?> | </h4>
                                <h4 class="adopted push-title"> <i>Adopterad:</i> <?php echo($adopted) ?> </h4>
                            </div>
                        </div>
                        <div class="img-info-remem">
                            <?php if ($cat['image'] !== '') { ?>
                                <div class="red-img-border remem-img">
                                    <img src="<?php echo(UPLOADS_FOLDER . 'images/' . $cat['image']); ?>">
                                </div>
                            <?php } ?>
                            <div class="remem-cat-info">
                                <p> <?php echo($cat['description']) ?> </p>
                                <small class="cause-of-death"> <?php echo($cat['cause']) ?> </small>
                            </div>
                        </div>
                    </article>
                <?php } ?>
            </div>
            <div class="blue-paragraph prev-next remem-pagination">
                <?php if($rememPage > 0) { ?>
                    <div class="previous-page">
                        <a class="prev-arrow prev-arrow-red" href="?remempage=<?php echo $rememPage - 1 ?>#remember">
                            <i class="fas fa-angle-left"></i> Föregående
                        </a>
                    </div>
                <?php }
                if($rememPage < $rememPages - 1) { ?>
                    <div class="next-page">
                        <a class="next-arrow next-arrow-red" href="?remempage=<?php echo $rememPage + 1 ?>#remember">
                            Nästa <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div id="blue-hide-show">
            <button class="<?php if (count($remember) < 2) echo('hidden'); ?>" id="remem-button" onclick="showRemem()"> <?php echo($expanded ? 'Dölj' : 'Visa mer') ?> </button>
        </div>
    </section>

    <!-- Calls for footer -->
    <?php include(APP_FOLDER . '/components/footer.php') ?>

<script>
    // === CAROUSEL ===
    let slideIndex = 1;
    showSlides(slideIndex);
    // Changes slide every 3s
    setInterval(() => {
        showSlides(slideIndex++);
    }, 3000);

    // Next/Previous controls
    function changeSlide(n) {
        showSlides(slideIndex += n);
    }

    function showSlides(n) {
        let i;
        let slide = document.getElementsByClassName("slide");

        // Adds display none on every slide to hide it
        for(i = 0; i < slide.length; i++) {
            slide[i].style.display = "none";
        }

        // If slideIndex is greater than slide.length, add 1
        if(slideIndex > slide.length) {
            slideIndex = 1;
        }
        // If slideIndex is less than 1, slideIndex equals to slide.length
        if(slideIndex < 1) {
            slideIndex = slide.length;
        }

        slide[slideIndex - 1].style.display = "block";
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
        popup.getElementsByClassName("desc")[0].textContent = cat.getElementsByClassName("desc")[0].textContent;

        /* Show popup */
        popup.style.display = "block";
        background.style.display = "block";
    }

    /* === HIDE POPUP === */
    function hideCat() {
        let popup = document.getElementById("cat-page");
        let background = document.getElementById("toned-down");

        popup.style.display = "none";
        background.style.display = "none";
    }

    // === HIDE AND SHOW CONTENT ===
    /* Hide and show/expand news flow */
    let container = document.getElementById('news-container');
    let buttonText = document.getElementById('my-button');

    /* Checks if container contains class expanded, "if" it'll remove the class "else" it'll add it */
    function showNews(){
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

    /* Hide and show/expand remember-cats part */
    let rememContainer = document.getElementById("remember-container");
    let rememButtonText = document.getElementById("remem-button");

    function showRemem() {
        if(rememContainer.classList.contains("expanded")) {
            rememContainer.classList.remove("expanded");
            /* Adds text so that the button is correct */
            rememButtonText.innerHTML = 'Visa mer';
        } else {
            rememContainer.classList.add("expanded");
            /* Adds text so that the button is correct */
            rememButtonText.innerHTML = 'Dölj';
        }
    }
</script>
</body>
</html>