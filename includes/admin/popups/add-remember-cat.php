<div class="popup-container" id="popup-remember-cat">
    <article class="small-container">
        <div class="header">
            <h2> Lägg till ny Katt i Minneslunden </h2>
            <button type="button" onclick="hidePopupRememberCat()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="popup-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <div class="file-input">
                <label for="human-image"> Välj Bild </label>
                <input type="file" name="cat-image">
            </div>

            <!-- Add cat information -->
            <div class="info">
                <label for="catname"> Namn </label>
                <input type="text" name="catname" id="catname" placeholder="Kattens namn...">
            </div>
            <div class="life">
                <div class="remem-info">
                    <label for="born"> Född </label>
                    <input type="text" name="born" id="born" placeholder="(yyyy)">
                </div>
                <div class="remem-info">
                    <label for="died"> Död </label>
                    <input type="text" name="died" id="died" placeholder="(yyyy-mm-dd)">
                </div>
            </div>
            <div class="life">
                <div class="remem-info">
                    <label for="came"> Kom till katthem </label>
                    <input type="text" name="came" id="came" placeholder="(yyyy-mm-dd)">
                </div>
                <div class="remem-info">
                    <label for="adopted"> Adopterad </label>
                    <input type="text" name="adopted" id="adopted" placeholder="(yyyy-mm-dd)">
                </div>
            </div>
            <div class="info">
                <label for="desc"> Beskrivning </label>
                <textarea id="desc" name="desc" class="desc" rows="6" cols="50"></textarea>
            </div>
            <div class="info">
                <label for="cause"> Dödsorsak </label>
                <input type="text" name="cause" id="cause" placeholder="Text här...">
            </div>

            <button class="popup-button" type="submit" name="add-remember-cat"> Lägg till </button>
        </form>
    </article>
</div>

<script>
    /* === HIDE POPUP === */
    function hidePopupRememberCat() {
        let popup = document.getElementById("popup-remember-cat");

        popup.style.display = "none";
    }
</script>