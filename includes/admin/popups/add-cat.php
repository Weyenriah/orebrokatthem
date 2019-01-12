<div class="popup-container" id="popup-cat">
    <article class="small-container">
        <div class="header">
            <h2> Lägg till ny Katt </h2>
            <button type="button" onclick="hidePopupCat()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="popup-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <div class="file-input">
                <div class="divide-info">
                    <label for="cat-image0"> Välj bilder bilder </label>
                    <small> Vid ingen bild visas en exempelbild. </small>
                </div>
                <div class="choose-file">
                    <input type="file" name="cat-image0">
                    <input type="file" name="cat-image1">
                    <input type="file" name="cat-image2">
                </div>
            </div>

            <!-- Add cat information -->
            <div class="info">
                <label for="add-catname"> Namn <span class="red-asterisk">*</span> </label>
                <input type="text" name="catname" id="add-catname" placeholder="Kattens namn...">
            </div>
            <div class="info">
                <label for="add-age"> Ålder <span class="red-asterisk">*</span> </label>
                <input type="text" name="age" id="add-age" placeholder="Kattens ålder (yyyy)">
            </div>

            <div class="info">
                <label for="add-gender"> Kön <span class="red-asterisk">*</span> </label>
                <select name="gender" id="add-gender">
                    <option value="1"> Hane </option>
                    <option value="0"> Hona </option>
                </select>
            </div>

            <div class="info">
                <label for="add-color"> Färg <span class="red-asterisk">*</span> </label>
                <input type="text" name="color" id="add-color" placeholder="Kattens färg...">
            </div>
            <div class="info">
                <div class="divide-info">
                    <label for="add-desc-cat"> Beskrivning <span class="red-asterisk">*</span> </label>
                    <small> (<span id="add-desc-cat-counter" >0</span>/3000) </small>
                </div>
                <textarea name="desc" id="add-desc-cat" rows="6" cols="50" oninput="updateTextCounter('add-desc-cat-counter', this.value)"></textarea>
                <small> Text innan första DUBBEL-ENTER bör vara kortare än 320 tecken (visas i preview). </small>
            </div>

            <div class="info">
                <label for="add-home"> Placering <span class="red-asterisk">*</span> </label>
                <select name="home" id="add-home">
                    <option value="1"> Katthemmet </option>
                    <option value="0"> Jourhem </option>
                </select>
            </div>

            <div class="info">
                <label for="add-contact"> Kontakt för adoption <span class="red-asterisk">*</span> </label>
                <input type="text" name="contact" id="add-contact" placeholder="E-postadress till kontakt...">
                <small> <span class="red-asterisk">*</span> Måste finnas. </small>
            </div>

            <!-- Hide or show cat on first page -->
            <div class="show-slide">
                <input type="checkbox" id="add-show" name="show-slide" value="show">
                <label for="add-show"> Visas i karusell </label>
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