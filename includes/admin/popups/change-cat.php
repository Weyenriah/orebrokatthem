<div class="popup-container" id="popup-change-cat">
    <article class="small-container">
        <div class="header">
            <h2> Ändra Katt </h2>
            <button type="button" onclick="hidePopupChangeCat()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="popup-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <div class="file-input">
                <label for="cat-image0"> Ändra bilder </label>
                <div class="choose-file">
                    <input type="file" name="cat-image0">
                    <input type="file" name="cat-image1">
                    <input type="file" name="cat-image2">
                </div>
            </div>

            <!-- Add cat information -->
            <div class="info">
                <label for="change-catname"> Namn </label>
                <input type="text" name="catname" id="change-catname" class="catname" value="Kattens namn...">
            </div>
            <div class="info">
                <label for="change-age"> Ålder </label>
                <input type="text" name="age" class="age" id="change-age" value="Kattens ålder (yyyy)">
            </div>

            <div class="info">
                <label for="change-gender"> Kön </label>
                <select class="gender" name="gender" id="change-gender">
                    <option value="1"> Hane </option>
                    <option value="0"> Hona </option>
                </select>
            </div>

            <div class="info">
                <label for="change-color"> Färg </label>
                <input type="text" name="color" class="color" id="change-color" value="Kattens färg...">
            </div>
            <div class="info">
                <label for="change-desc-cat"> Beskrivning </label>
                <textarea name="desc" class="description" id="change-desc-cat" rows="6" cols="50"></textarea>
            </div>

            <div class="info">
                <label for="change-home"> Placering </label>
                <select name="home" class="home" id="change-home">
                    <option value="1"> Katthemmet </option>
                    <option value="0"> Jourhem </option>
                </select>
            </div>

            <div class="info">
                <label for="change-contact"> Kontakt för adoption </label>
                <input type="text" name="contact" id="change-contact" class="contact" value="E-postadress till kontakt...">
            </div>

            <!-- Hide or show cat on first page -->
            <div class="show-slide">
                <input type="checkbox" class="showcase" name="show-slide" id="change-show" value="show">
                <label for="change-show"> Visa på första sida</label>
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