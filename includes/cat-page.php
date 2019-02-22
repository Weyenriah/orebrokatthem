<div id="cat-page">
    <button class="close-button" type="button" onclick="hideCat()"> <i class="fas fa-times"></i> </button>
    <hr/>
    <section class="cat-info">
        <!-- Information connects through JS on our-cats.php and index.php -->
            <!-- Images, see slide -->
            <div class="img">
                <img class="popup-slide" src="" alt="En bild på en katt">
                <img class="popup-slide" src="" alt="">
                <img class="popup-slide" src="" alt="">

                <div class="demos">
                    <div class="styling-demos">
                        <img class="demo" src="" onclick="currentPicSlide(1)" alt="En bild på en katt">
                    </div>
                    <div class="styling-demos">
                        <img class="demo" src="" onclick="currentPicSlide(2)" alt="">
                    </div>
                    <div class="styling-demos">
                        <img class="demo" src="" onclick="currentPicSlide(3)" alt="">
                    </div>
                </div>
            </div>
            <div class="cat-title">
                <img src="<?php echo(BASE_URL) ?>assets/images/paw-icon.png" alt="">
                <h2 class="cat-name"> Name </h2>
            </div>
            <div class="small-info">
                <small class="cat-age"> Ålder | </small>
                <small class="cat-gender"> Kön | </small>
                <small class="color"> Färg </small>
            </div>
            <p class="desc" style="white-space: pre-line;" > Text </p>
            <div class="cat-home">
                <i class="fas fa-home"></i>
                <p class="home-popup"> Hem </p>
            </div>
    </section>
    <div class="adopt-me">
        <h4 class="second-row-heading"> Vill du adoptera mig? Maila! </h4>
        <p class="adopt-me-mail"></p>
        <p class="adopt-me-tele"> </p>
    </div>
</div>
<div id="toned-down" onclick="hideCat()"></div>

<script>
    /* === SHOWS CAT IMAGES === */
    let slidePicIndex = 1;
    showPicSlides(slidePicIndex);

    function currentPicSlide(n) {
        showPicSlides(slidePicIndex = n);
    }

    function showPicSlides(n) {
        let i;
        let x = document.getElementsByClassName("popup-slide");
        let changers = document.getElementsByClassName("demo");

        if(n > x.length) {
            slidePicIndex = 1;
        }
        if(n < 1) {
            slidePicIndex = x.length;
        }
        for(i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        for(i = 0; i < x.length; i++) {
            changers[i].className = changers[i].className.replace(" opacity", "");
        }

        x[slidePicIndex-1].style.display = "block";
        changers[slidePicIndex-1].className += " opacity";
    }

    /* === HIDE POPUP === */
    function hideCat() {
        let popup = document.getElementById("cat-page");
        let background = document.getElementById("toned-down");

        popup.style.display = "none";
        background.style.display = "none";
    }
</script>