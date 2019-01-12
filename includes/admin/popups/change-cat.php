<div class="popup-container" id="popup-change-cat">
    <article class="small-container">
        <div class="header">
            <h2> Ändra Katt </h2>
            <button type="button" onclick="hidePopupChangeCat()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="popup-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <div class="file-input">
                <div class="file-title">
                    <label for="cat-image0"> Ändra bilder </label>
                </div>
                <div class="choose-file">
                    <input type="file" name="cat-image0">
                    <input type="file" name="cat-image1">
                    <input type="file" name="cat-image2">
                </div>

            </div>

            <!-- Change cat information -->
            <div class="info">
                <label for="change-catname"> Namn <span class="red-asterisk">*</span> </label>
                <input type="text" name="catname" id="change-catname" class="catname" value="Kattens namn...">
            </div>
            <div class="info">
                <label for="change-age"> Ålder <span class="red-asterisk">*</span> </label>
                <input type="text" name="age" class="age" id="change-age" value="Kattens ålder (yyyy)">
            </div>

            <div class="info">
                <label for="change-gender"> Kön <span class="red-asterisk">*</span> </label>
                <select class="gender" name="gender" id="change-gender">
                    <option value="1"> Hane </option>
                    <option value="0"> Hona </option>
                </select>
            </div>

            <div class="info">
                <label for="change-color"> Färg <span class="red-asterisk">*</span> </label>
                <input type="text" name="color" class="color" id="change-color" value="Kattens färg...">
            </div>
            <div class="info">
                <div class="divide-info">
                    <label for="change-desc-cat"> Beskrivning <span class="red-asterisk">*</span> </label>
                    <small> (<span id="change-desc-cat-counter" >0</span>/3000) </small>
                </div>
                <textarea name="desc" class="description" id="change-desc-cat" rows="6" cols="50" oninput="updateTextCounter('change-desc-cat-counter', this.value)"></textarea>
                <small> Text innan första DUBBEL-ENTER bör vara kortare än 320 tecken (visas i preview). </small>
            </div>

            <div class="info">
                <label for="change-home"> Placering <span class="red-asterisk">*</span> </label>
                <select name="home" class="home" id="change-home">
                    <option value="1"> Katthemmet </option>
                    <option value="0"> Jourhem </option>
                </select>
            </div>

            <div class="info">
                <label for="change-contact"> Kontakt för adoption <span class="red-asterisk">*</span> </label>
                <input type="text" name="contact" id="change-contact" class="contact" value="E-postadress till kontakt...">
                <small> <span class="red-asterisk">*</span> Måste finnas </small>
            </div>

            <!-- Hide or show cat on first page -->
            <div class="show-slide">
                <input type="checkbox" class="showcase" name="show-slide" id="change-show" value="show">
                <label for="change-show"> Visas i karusell </label>
            </div>

            <input class="id-field" type="text" name="id" hidden>

            <button class="popup-button" type="submit" name="change-cat"> Ändra </button>
        </form>
    </article>
</div>

<script>
    /* === HIDE POPUP === */
    function hidePopupChangeCat() {
        let popup = document.getElementById("popup-change-cat");

        popup.style.display = "none";
    }
</script>