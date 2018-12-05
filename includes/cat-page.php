<article id="cat-page">
    <button class="close-button" type="button" onclick="hideCat()"> <i class="fas fa-times"></i> </button>
    <hr/>
    <section class="cat-info">
        <div class="img">
            <img class="popup-slide" src="../storage/images/ashild.jpg">
            <img class="popup-slide" src="../storage/images/dollar.jpg">
            <img class="popup-slide" src="../storage/images/mollyblom.jpg">

            <div class="demos">
                <div class="styling-demos">
                    <img class="demo" src="../storage/images/ashild.jpg" onclick="currentPicSlide(1)">
                </div>
                <div class="styling-demos">
                    <img class="demo" src="../storage/images/dollar.jpg" onclick="currentPicSlide(2)">
                </div>
                <div class="styling-demos">
                    <img class="demo" src="../storage/images/mollyblom.jpg" onclick="currentPicSlide(3)">
                </div>
            </div>
        </div>

        <div class="cat-info-text">
            <div class="cat-title">
                <img src="assets/images/paw-icon.png">
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
        <a class="adopt" href="mailto:"> Adoptera mig! </a>
    </div>
</article>
<div id="toned-down" onclick="hideCat()"></div>

<script type="text/javascript">
    /* Slide for cat images */
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