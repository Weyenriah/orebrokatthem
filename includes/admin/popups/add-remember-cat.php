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
                <label for="remem-catname"> Namn </label>
                <input type="text" name="catname" id="remem-catname" placeholder="Kattens namn...">
            </div>
            <div class="beside-inputs">
                <div class="info">
                    <label for="remem-born"> Född </label>
                    <input type="text" name="born" id="remem-born" placeholder="(yyyy)">
                </div>
                <div class="info">
                    <label for="remem-died"> Död <span class="red-asterisk">*</span> </label>
                    <input type="text" name="died" id="remem-died" placeholder="(yyyy-mm-dd)">
                    <small> <span class="red-asterisk">*</span> Måste finnas. </small>
                </div>
            </div>
            <div class="beside-inputs">
                <div class="info">
                    <label for="remem-came"> Kom till katthem </label>
                    <input type="text" name="came" id="remem-came" placeholder="(yyyy-mm-dd)">
                </div>
                <div class="info">
                    <label for="remem-adopted"> Adopterad </label>
                    <input type="text" name="adopted" id="remem-adopted" placeholder="(yyyy-mm-dd)">
                </div>
            </div>
            <div class="info">
                <div class="divide-info">
                    <label for="remem-desc"> Beskrivning </label>
                    <small> (<span id="add-desc-remem-counter" >0</span>/3000) </small>
                </div>
                <textarea id="remem-desc" name="desc" class="desc" rows="6" cols="50" oninput="updateTextCounter('add-desc-remem-counter', this.value)"></textarea>
            </div>
            <div class="info">
                <label for="remem-cause"> Dödsorsak </label>
                <input type="text" name="cause" id="remem-cause" placeholder="Text här...">
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