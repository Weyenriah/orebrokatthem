<?php require_once 'components/resources.php';

$news = $database->getNews();
?>
<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include('components/head.php') ?>

<body>
    <!-- Calls for navigation -->
    <?php include('components/navigation.php') ?>

    <!-- Specific heading to this page -->
    <header class="header">
        <h1>Välkommen</h1>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu ex in nulla feugiat sollicitudin. Morbi feugiat facilisis enim quis aliquet. Nunc eu massa sit amet nisl euismod sollicitudin at sit amet est. Fusce vitae rhoncus ante, quis mattis dui. Nunc commodo pellentesque tortor, a ultrices ligula tincidunt quis. Nunc imperdiet sapien id sapien interdum, nec interdum odio convallis. Vestibulum id odio tortor.
        </p>
    </header>

    <!-- Carousel -->
    <section class="carousel-container red-background" id="carousel">
        <div class="slide fade">
            <div class="image"> <img src="images/dollar.jpg"> </div>
            <div class="carousel-text">
                <h3> <img src="images/paw-icon.png"> Dollar </h3>
                <small> Född 2010 | Hane | Svart </small>
                <p>  Stor katt. Innekatt. Vill ha tryggt, snällt kattsällskap. Behöver mycket tid och tålamod. Kommer från samma hem som Dagmar och Disney. Kommer från Kumla.  </p>
                <a href="#">Läs mer om mig!</a>
            </div>
        </div>

        <div class="slide fade">
            <div class="image"> <img src="images/mollyblom.jpg"> </div>
            <div class="carousel-text">
                <h3> <img src="images/paw-icon.png"> Molly Blom </h3>
                <small> Född 2006 | Hona | Svart och vit </small>
                <p> Social och kelig. Van utekatt. Kommer från samma hem som sitt syskon Mimmi Blom. Inkom på grund av att ägare ska flytta till äldreboende och kan inte ta sina katter med sig. Kommer från Lindesberg.
                    Vill ha samma hem som sitt syskon Mimmi Blom. </p>
                <a href="#">Läs mer om mig!</a>
            </div>
        </div>

        <div class="slide fade">
            <div class="image"> <img src="images/ashild.jpg"> </div>
            <div class="carousel-text">
                <h3> <img src="images/paw-icon.png"> Åshild </h3>
                <small> Troligen född 2017 | Hona | Bruntigré med lite vitt </small>
                <p> Blyg och försiktig och behöver tid på sig att bli bekväm med människor.
                    Gått hemlös i Åmmeberg utanför Askersund. </p>
                <a href="#">Läs mer om mig!</a>
            </div>
        </div>

        <a onclick="changeSlide(-1)" class="previous"> <img src="images/arrow.png"> </a>
        <a onclick="changeSlide(1)" class="next"> <img src="images/arrow.png"> </a>
    </section>

    <!-- News flow -->
    <section class="white-background general-grid" id="newsflow">
        <h2> Nyheter </h2>
        <article class="white-paragraph" id="news-container">
            <?php foreach($news as $new) {

                $date = date('Y-m-d', strtotime($new['date']));
                ?>
                <section class="news-card">
                    <?php if ($new['image'] !== '') { ?>
                        <div class="news-img">
                            <img src="<?php echo(UPLOADS_FOLDER . 'images/' . $new['image']); ?>">
                        </div>
                    <?php } ?>
                    <h5 class="second-row-heading"> <?php echo($date); ?> </h5>
                    <p> <?php echo($new['news']); ?> </p>
                </section>
            <?php } ?>
        </article>
        <div id="hide-show">
            <button id="my-button" onclick="showNews()"> Visa mer </button>
        </div>
    </section>

    <section class="general-grid red-background" id="remember">
        <h2> Minneslunden </h2>
        <div class="all-remem" id="remember-container">
            <p class="red-paragraph"> Sov gott små vänner, vila nu, för smärtan är över <br/>
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
                <article class="remem-cat">
                    <div class="red-img-border">
                        <img src="images/ashild.jpg">
                    </div>
                    <div class="remem-cat-info">
                        <div class="cat-title remem-cat-title">
                            <img src="images/paw-icon.png">
                            <h3> Name </h3>
                        </div>
                        <small class="birth"> * Birth | </small>
                        <small class="birth"> Inkom | </small>
                        <small class="death"> Adopterad | </small>
                        <small class="death"> † Death  </small>
                        <p> Minnestext </p>
                    </div>
                </article>
            </div>
        </div>
        <div id="remem-hide-show">
            <button id="remem-button" onclick="showRemem()"> Visa mer </button>
        </div>
    </section>

    <!-- Calls for footer -->
    <?php include('components/footer.php') ?>

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