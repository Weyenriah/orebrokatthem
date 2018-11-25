<div class="change-remember-container" id="popup-change-remember-cat">
    <article class="change-remember">
        <div class="change-header">
            <h2> Ändra Katt i Minneslunden </h2>
            <button type="button" onclick="hidePopupChangeRememberCat()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="change-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <input type="file" name="cat-image" class="cat-image">

            <!-- Add cat information -->
            <div class="info">
                <label for="catname"> Namn </label>
                <input type="text" class="catname" name="catname" id="catname" value="Kattens namn...">
            </div>
            <div class="life">
                <div class="remem-info">
                    <label for="born"> Född </label>
                    <input type="text" class="born" name="born" id="born" value="(yyyy)">
                </div>
                <div class="remem-info">
                    <label for="died"> Död </label>
                    <input type="text" class="died" name="died" id="died" value="(yyyy-mm-dd)">
                </div>
            </div>
            <div class="life">
                <div class="remem-info">
                    <label for="came"> Kom till katthem </label>
                    <input type="text" class="came" name="came" id="came" value="(yyyy-mm-dd)">
                </div>
                <div class="remem-info">
                    <label for="adopted"> Adopterad </label>
                    <input type="text" class="adopted" name="adopted" id="adopted" value="(yyyy-mm-dd)">
                </div>
            </div>
            <div class="info">
                <label for="desc"> Beskrivning </label>
                <textarea id="desc" name="desc" class="desc" rows="6" cols="50"></textarea>
            </div>
            <div class="info">
                <label for="cause"> Dödsorsak </label>
                <input type="text" class="cause" name="cause" id="cause" value="Text här...">
            </div>

            <input class="id-field" type="text" name="id" hidden>

            <button class="change-button" type="submit" name="change-remember-cat"> Lägg till </button>
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