<?php
require_once 'components/resources.php';

$cats = $database->getCats();
?>

<!DOCTYPE html>
<html lang="sv">

<!-- Calls for head -->
<?php include('components/head.php') ?>

<body>
    <article id="cat-page">
        <button class="close-button" type="button" onclick="hideCat()"> <i class="fas fa-times"></i> </button>
        <hr/>
        <section class="cat-info">
            <div class="img">
                <img class="popup-slide" src="images/ashild.jpg">
                <img class="popup-slide" src="images/dollar.jpg">
                <img class="popup-slide" src="images/mollyblom.jpg">

                <div class="demos">
                    <div class="styling-demos">
                        <img class="demo" src="images/ashild.jpg" onclick="currentSlide(1)">
                    </div>
                    <div class="styling-demos">
                        <img class="demo" src="images/dollar.jpg" onclick="currentSlide(2)">
                    </div>
                    <div class="styling-demos">
                        <img class="demo" src="images/mollyblom.jpg" onclick="currentSlide(3)">
                    </div>
                </div>
            </div>

            <div class="cat-info-text">
                <div class="cat-title">
                    <img src="images/white-paw.png">
                    <h2 class="cat-name"> Name </h2>
                </div>
                <div class="small-info">
                    <small class="cat-age"> Ålder | </small>
                    <small class="cat-gender"> Kön | </small>
                    <small class="color"> Färg </small>
                </div>
                <p class="desc" style="white-space: pre-line;" > Text </p>
            </div>
        </section>
        <div class="adopt-me">
            <a href="#"> Adoptera mig! </a>
        </div>
    </article>
    <div id="toned-down" onclick="hideCat()"></div>
</body>

</html>

<script>
    /* Slide for cat images */
    let slideIndex = 1;
    showSlides(slideIndex);

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let x = document.getElementsByClassName("popup-slide");
        let changers = document.getElementsByClassName("demo");

        if(n > x.length) {
            slideIndex = 1;
        }
        if(n < 1) {
            slideIndex = x.length;
        }
        for(i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for(i = 0; i < x.length; i++) {
            changers[i].className = changers[i].className.replace(" opacity", "");
        }

        x[slideIndex-1].style.display = "block";
        changers[slideIndex-1].className += " opacity";
    }
</script>