<div class="popup-container" id="popup-change-remember-cat">
    <article class="small-container">
        <div class="header">
            <h2> Ändra Katt i Minneslunden </h2>
            <button type="button" onclick="hidePopupChangeRememberCat()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="popup-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <div class="file-input">
                <label for="human-image"> Ändra Bild </label>
                <input type="file" name="cat-image">
            </div>

            <!-- Add cat information -->
            <div class="info">
                <label for="change-remem-catname"> Namn </label>
                <input type="text" class="catname" id="change-remem-catname" name="catname" value="Kattens namn...">
            </div>
            <div class="life">
                <div class="remem-info">
                    <label for="change-remem-born"> Född </label>
                    <input type="text" class="born" id="change-remem-born" name="born" value="(yyyy)">
                </div>
                <div class="remem-info">
                    <label for="change-remem-died"> Död </label>
                    <input type="text" class="died" id="change-remem-died" name="died" value="(yyyy-mm-dd)">
                </div>
            </div>
            <div class="life">
                <div class="remem-info">
                    <label for="change-remem-came"> Kom till katthem </label>
                    <input type="text" class="came" id="change-remem-came" name="came" value="(yyyy-mm-dd)">
                </div>
                <div class="remem-info">
                    <label for="change-remem-adopted"> Adopterad </label>
                    <input type="text" class="adopted" id="change-remem-adopted" name="adopted" value="(yyyy-mm-dd)">
                </div>
            </div>
            <div class="info">
                <label for="change-remem-desc"> Beskrivning </label>
                <textarea name="desc" class="desc" id="change-remem-desc" rows="6" cols="50"></textarea>
            </div>
            <div class="info">
                <label for="change-remem-cause"> Dödsorsak </label>
                <input type="text" class="cause" id="change-remem-cause" name="cause" value="Text här...">
            </div>

            <input class="id-field" type="text" name="id" hidden>

            <button class="popup-button" type="submit" name="change-remember-cat"> Lägg till </button>
        </form>
    </article>
</div>

<script>
    /* === HIDE POPUP === */
    function hidePopupChangeRememberCat() {
        let popup = document.getElementById("popup-change-remember-cat");

        popup.style.display = "none";
    }
</script>