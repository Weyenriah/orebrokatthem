<div class="popup-container" id="popup-change-cat">
    <article class="small-container cat-container">
        <div class="header">
            <h2> Ändra Katt </h2>
            <button type="button" onclick="hidePopupChangeCat(); removeAdoptedStyle()"> <i class="fas fa-times"></i> </button>
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

            <div class="beside-inputs">
                <div class="info">
                    <label for="change-contact"> Mejl för kontaktperson <span class="red-asterisk">*</span> </label>
                    <input type="text" class="contact" name="contact" id="change-contact" placeholder="E-postadress till kontakt...">
                    <small> <span class="red-asterisk">*</span> Måste finnas. </small>
                </div>
                <div class="info">
                    <label for="change-contact-tele"> Nummer för kontaktperson </label>
                    <input type="text" class="contact-tele" name="contact-tele" id="change-contact-tele" placeholder="Telefonnummer till kontakt...">
                </div>
            </div>

            <!-- Hide or show cat on first page -->
            <div class="beside-inputs">
                <div class="show-slide">
                    <input type="checkbox" class="showcase" name="show-slide" id="change-show" value="show">
                    <label for="change-show"> Visas i karusell </label>
                </div>
                <div class="adopted-box">
                    <input type="checkbox" class="adopted" name="adopted" id="adopted" value="adopted">
                    <label for="adopted"> Adopterad </label>
                </div>
                <div class="not-adoptable">
                    <input type="checkbox" class="adoptable" id="change-adoptable" name="change-adoptable" value="hide">
                    <label for="change-adoptable"> Göm katt </label>
                </div>
            </div>

            <input class="id-field" type="text" name="id" hidden>

            <!-- When cat is adopted -->
            <div class="cat-written-info">
                <p class="catname"></p>
                <p class="catname"></p>
            </div>

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

    function removeAdoptedStyle() {
        let popupContainer = document.getElementsByClassName('cat-container')[0];

        popupContainer.classList.remove('change-popup');
    }
</script>