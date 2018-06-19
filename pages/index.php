<!DOCTYPE html>
<html lang="sv">

<?php include('../components/head.php') ?>

<body>

    <?php include('../components/navigation.php') ?>

    <header class="header">
        <h1>Välkommen</h1>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu ex in nulla feugiat sollicitudin. Morbi feugiat facilisis enim quis aliquet. Nunc eu massa sit amet nisl euismod sollicitudin at sit amet est. Fusce vitae rhoncus ante, quis mattis dui. Nunc commodo pellentesque tortor, a ultrices ligula tincidunt quis. Nunc imperdiet sapien id sapien interdum, nec interdum odio convallis. Vestibulum id odio tortor.
        </p>
    </header>

    <section class="carousel-container red-background">
        <div class="slide fade">
            <div class="image"> <img src="../images/dollar.jpg"> </div>
            <div class="carousel-text">
                <h3> <img src="../images/paw-icon.png"> Dollar </h3>
                <small> Född 2010 | Hane | Svart </small>
                <p>  Stor katt. Innekatt. Vill ha tryggt, snällt kattsällskap. Behöver mycket tid och tålamod. Kommer från samma hem som Dagmar och Disney. Kommer från Kumla.  </p>
                <a href="#">Läs mer om mig!</a>
            </div>
        </div>

        <div class="slide fade">
            <div class="image"> <img src="../images/mollyblom.jpg"> </div>
            <div class="carousel-text">
                <h3> <img src="../images/paw-icon.png"> Molly Blom </h3>
                <small> Född 2006 | Hona | Svart och vit </small>
                <p> Social och kelig. Van utekatt. Kommer från samma hem som sitt syskon Mimmi Blom. Inkom på grund av att ägare ska flytta till äldreboende och kan inte ta sina katter med sig. Kommer från Lindesberg.
                    Vill ha samma hem som sitt syskon Mimmi Blom. </p>
                <a href="#">Läs mer om mig!</a>
            </div>
        </div>

        <div class="slide fade">
            <div class="image"> <img src="../images/ashild.jpg"> </div>
            <div class="carousel-text">
                <h3> <img src="../images/paw-icon.png"> Åshild </h3>
                <small> Troligen född 2017 | Hona | Bruntigré med lite vitt </small>
                <p> Blyg och försiktig och behöver tid på sig att bli bekväm med människor.
                    Gått hemlös i Åmmeberg utanför Askersund. </p>
                <a href="#">Läs mer om mig!</a>
            </div>
        </div>

        <a onclick="changeSlide(-1)" class="previous"> <img src="../images/arrow.png"> </a>
        <a onclick="changeSlide(1)" class="next"> <img src="../images/arrow.png"> </a>
    </section>

    <section class="newsflow">
        <h3> Nyheter </h3>
        <article class="news">
            <section class="news-text">
                <h4> 16 Juni, 2018 </h4>
                <p> Idag flyttade Larissa in på katthemmet! Du kan läsa mer om henne här. </p>
            </section>
            <img class="news-image" src="../images/larissa.jpg">
        </article>
    </section>

    <?php include('../components/footer.php') ?>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);
    setInterval(() => {
        // if (!hasMoved){
        showSlides(slideIndex++);
    }, 3000);

    // Next/Previous controls
    function changeSlide(n) {
        showSlides(slideIndex += n);
    }

    function showSlides(n) {
        let i;
        let slide = document.getElementsByClassName("slide");

        for(i = 0; i < slide.length; i++) {
            slide[i].style.display = "none";
        }

        if(slideIndex > slide.length) {
            slideIndex = 1;
        }
        if(slideIndex < 1) {
            slideIndex = slide.length;
        }

        slide[slideIndex - 1].style.display = "block";
    }
</script>
</body>
</html>