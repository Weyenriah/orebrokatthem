<div class="popup-container" id="popup-cat">
    <article class="small-container">
        <div class="header">
            <h2> Lägg till ny Katt </h2>
            <button type="button" onclick="hidePopupCat()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="popup-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <div class="file-input">
                <label for="cat-image0"> Välj bilder </label>
                <div class="choose-file">
                    <input type="file" name="cat-image0">
                    <input type="file" name="cat-image1">
                    <input type="file" name="cat-image2">
                </div>
            </div>

            <!-- Add cat information -->
            <div class="info">
                <label for="add-catname"> Namn </label>
                <input type="text" name="catname" id="add-catname" placeholder="Kattens namn...">
            </div>
            <div class="info">
                <label for="add-age"> Ålder </label>
                <input type="text" name="age" id="add-age" placeholder="Kattens ålder (yyyy)">
            </div>

            <div class="info">
                <label for="add-gender"> Kön </label>
                <select name="gender" id="add-gender">
                    <option value="1"> Hane </option>
                    <option value="0"> Hona </option>
                </select>
            </div>

            <div class="info">
                <label for="add-color"> Färg </label>
                <input type="text" name="color" id="add-color" placeholder="Kattens färg...">
            </div>
            <div class="info">
                <label for="add-desc-cat"> Beskrivning </label>
                <textarea name="desc" id="add-desc-cat" rows="6" cols="50"></textarea>
            </div>

            <div class="info">
                <label for="add-home"> Placering </label>
                <select name="home" id="add-home">
                    <option value="1"> Katthemmet </option>
                    <option value="0"> Jourhem </option>
                </select>
            </div>

            <div class="info">
                <label for="add-contact"> Kontakt för adoption </label>
                <input type="text" name="contact" id="add-contact" placeholder="E-postadress till kontakt...">
            </div>

            <!-- Hide or show cat on first page -->
            <div class="show-slide">
                <input type="checkbox" id="add-show" name="show-slide" value="show">
                <label for="add-show"> Visa på första sida</label>
            </div>

            <button class="popup-button" type="submit" name="add-cat"> Lägg till </button>
        </form>
    </article>
</div>

<script>
    /* === HIDE POPUP === */
    function hidePopupCat() {
        let popup = document.getElementById("popup-cat");

        popup.style.display = "none";
    }
</script>