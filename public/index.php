<?php
require_once '../functions/load.php';

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
<?php include(APP_FOLDER . '/includes/head.php') ?>

<body id="body">
    <!-- Popup for cats -->
    <?php include(APP_FOLDER . '/includes/cat-page.php') ?>

    <!-- Calls for navigation -->
    <?php include(APP_FOLDER . '/includes/navigation.php') ?>

    <!-- Specific heading to this page -->
    <header class="header">
        <h1>Välkommen</h1>
        <p> <?php echo(nl2br($database->getContent('home-header'))); ?> </p>
    </header>

    <!-- Carousel -->
    <section class="carousel-container text-box blue-background" id="carousel">
        <?php
        foreach($slideCats as $slideCat) {
            $images = $database->getCatImages($slideCat['id']);
        ?>
            <div class="slide fade blue-paragraph" id="cat-<?php echo($slideCat['id']); ?>">
                <article class="carousel-style" id="cat-<?php echo($slideCat['id']); ?>">
                    <div class="image-carousel">
                        <img class="image-to-cat" src="<?php echo(BASE_URL . ((count($images) > 0) ? UPLOADS_FOLDER . 'images/' . $images[0]['image'] : "assets/images/cat-placeholder.jpg")); ?>">
                    </div>
                    <div class="carousel-text">
                        <div class="carousel-title">
                            <img src="<?php echo(BASE_URL) ?>assets/images/paw-icon.png">
                            <h3 class="cat-name"> <?php echo($slideCat['name']); ?> </h3>
                        </div>

                        <div class="small-carousel-info">
                            <small class="cat-age"> <?php echo($slideCat['age']) ?> </small>
                            <small class="cat-gender"> | <?php echo($slideCat['gender'] ? 'Hane': 'Hona') ?> </small>
                            <small class="color"> | <?php echo($slideCat['color']) ?> </small>
                        </div>
                        <?php $text = nl2br($slideCat['description']);
                        $exploded = preg_split('/(<br>)|(<br \/>)|(<br\/>)/m', $text, 2);
                        ?>
                        <p class="desc"> <?php echo($exploded[0]) ?> </p>
                        <p class="desc-long" hidden> <?php if(count($exploded) > 1) echo($exploded[1]); ?> </p>
                        <div class="cat-home">
                            <i class="fas fa-home"></i>
                            <p class="home-cat"> <?php echo($slideCat['home'] ? 'Jourhem' : 'Katthem') ?> </p>
                        </div>
                        <div class="carousel-link">
                            <button class="caro-read-more" type="button" onclick="showCat(<?php echo($slideCat['id']); ?>)"> Läs mer om mig! </button>
                        </div>
                    </div>
                </article>
            </div>
        <?php } ?>

        <div class="dots">
            <?php
            for($d = 1; $d <= count($slideCats); $d++) { ?>
                <span class="dot" onclick="currentSlide(<?php echo($d); ?>)"></span>
            <?php } ?>
        </div>
    </section>

    <!-- News flow -->
    <section class="general-grid text-box" id="newsflow">
        <h2> Nyheter </h2>
        <div class="paragraph-position news<?php if($expanded) echo(' expanded'); ?>" id="news-container">
            <?php foreach($news as $new) {

                $date = date('Y-m-d', strtotime($new['date']));
                ?>
                <article class="news-card">
                    <?php if ($new['image'] !== '') { ?>
                        <div class="news-img">
                            <img src="<?php echo(BASE_URL . UPLOADS_FOLDER . 'images/' . $new['image']); ?>">
                        </div>
                    <?php } ?>
                    <div class="news-info">
                        <h5 class="second-row-heading"> <?php echo($date); ?> </h5>
                        <p> <?php echo(nl2br($new['news'])); ?> </p>
                    </div>
                </article>
            <?php } ?>
            <div class="white-paragraph pagination">
                <?php if($newsPage > 0) { ?>
                    <div class="previous-page">
                        <a class="prev-arrow prev-arrow" href="?newspage=<?php echo $newsPage - 1 ?>#newsflow">
                            <i class="fas fa-angle-left"></i> Föregående
                        </a>
                    </div>
                <?php }
                if($newsPage < $newsPages - 1) { ?>
                    <div class="next-page">
                        <a class="next-arrow next-arrow" href="?newspage=<?php echo $newsPage + 1 ?>#newsflow">
                            Nästa <i class="fas fa-angle-right"></i>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="hide-show" id="hide-show">
            <button class="<?php if (count($news) < 2) echo('hidden'); ?>" id="my-button" onclick="showNews()"> <?php echo($expanded ? 'Dölj' : 'Visa mer') ?> </button>
        </div>
    </section>

    <!-- Have you found a cat -->
    <section class="general-grid text-box blue-background" id="found-cat">
        <h2> Har du hittat en katt? </h2>
        <div class="paragraph-position">
            <div class="decor-img">
                <img src="<?php echo(BASE_URL) ?>assets/images/ashild.jpg">
            </div>
            <strong> <?php echo(nl2br($database->getContent('found-important'))); ?> </strong>
            <p> <?php echo(nl2br($database->getContent('found-text'))); ?> </p>
            <div class="found-contact">
                <h3 class="second-row-heading"> Skicka in anmälan </h3>
                <a class="link-calibri" target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSedgA2l24ZJk6WMcGwPC_nVfs4PxgvFTStcVbs-FQ23IoQeNg/viewform?embedded=true&usp=embed_googleplus">
                    <i class="fas fa-external-link-alt"></i> Formulär för hittad katt
                </a>
            </div>
        </div>
    </section>

    <!-- Relocate cat -->
    <section class="general-grid text-box">
        <h2> Omplacering av katt </h2>
        <div class="paragraph-position">
            <strong> <?php echo(nl2br($database->getContent('relocate-important'))); ?> </strong>
            <p> <?php echo(nl2br($database->getContent('relocate-text'))); ?> </p>
            <div class="relocate-contact">
                <div class="">
                    <h3 class="second-row-heading"> Skicka in anmälan </h3>
                    <a class="link-calibri" target="_blank" href="https://docs.google.com/forms/d/e/1FAIpQLSfggjBksVu6Gkd33TYm4PMTHuMGIGJJHY62yV5tOfnfzLFXYA/viewform?embedded=true&usp=embed_googleplus">
                        <i class="fas fa-external-link-alt"></i> Formulär för omplacering
                    </a>
                </div>
                <div class="">
                    <h3 class="second-row-heading"> Behövs inte en omplacering längre? </h3>
                    <a class="link-calibri" href="mailto:info@orebrokatthem.com"><i class="fas fa-envelope"></i> info@orebrokatthem.com </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Remember Cats-flow -->
    <section class="general-grid text-box blue-background" id="remember">
        <h2> Minneslunden </h2>
        <div class="paragraph-position all-remem<?php echo(isset($_GET['remempage']) ? ' expanded' : '') ?>" id="remember-container">
            <p> <?php echo(nl2br($database->getContent('home-remember'))); ?> </p>
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
                                <img src="assets/images/paw-icon.png">
                                <h3> <?php echo($cat['name']) ?> </h3>
                            </div>
                            <div class="circle-of-cathome">
                                <h4 class="came"> <i>Inkom:</i> <?php echo($came) ?> | </h4>
                                <h4 class="adopted push-title"> <i>Adopterad:</i> <?php echo($adopted) ?> </h4>
                            </div>
                        </div>
                        <div class="img-info-remem">
                            <?php if ($cat['image'] !== '') { ?>
                                <div class="img-border remem-img">
                                    <img src="<?php echo(BASE_URL . UPLOADS_FOLDER . 'images/' . $cat['image']); ?>">
                                </div>
                            <?php } ?>
                            <div class="remem-cat-info">
                                <p> <?php echo(nl2br($cat['description'])) ?> </p>
                                <small class="cause-of-death"> <?php echo($cat['cause']) ?> </small>
                            </div>
                        </div>
                    </article>
                <?php } ?>
            </div>
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
        </div>
        <div class="hide-show" id="hide-show">
            <button class="<?php if (count($remember) < 2) echo('hidden'); ?>" id="remem-button" onclick="showRemem()"> <?php echo($expanded ? 'Dölj' : 'Visa mer') ?> </button>
        </div>
    </section>

    <!-- Calls for footer -->
    <?php include(APP_FOLDER . '/includes/footer.php') ?>

<script>
    // === CAROUSEL ===
    let slideIndex = 1;
    showSlides(slideIndex);
    // Changes slide every 4s
    setInterval(() => {
        // Make sure to not shift slide if the mouse is over it
        // "border-right-style" is used to determine of the mouse is over or not
        let mouseOverSlide = window.getComputedStyle(document.getElementById('carousel')).getPropertyValue('border-right-style') === 'hidden';
        if (!mouseOverSlide) {
            showSlides(slideIndex++);
        }
    }, 4000);

    // Shows right "current" slide
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slide = document.getElementsByClassName("slide");
        let dots = document.getElementsByClassName("dot");

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

        // Managing the dots
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active-dot", "");
        }

        slide[slideIndex - 1].style.display = "block";
        dots[slideIndex-1].className += " active-dot";
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