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
                <label for="catname"> Namn </label>
                <input type="text" name="catname" id="catname" placeholder="Kattens namn...">
            </div>
            <div class="info">
                <label for="age"> Ålder </label>
                <input type="text" name="age" id="age" placeholder="Kattens ålder (yyyy)">
            </div>

            <div class="info">
                <label for="gender"> Kön </label>
                <select name="gender">
                    <option value="1"> Hane </option>
                    <option value="0"> Hona </option>
                </select>
            </div>

            <div class="info">
                <label for="color"> Färg </label>
                <input type="text" name="color" id="color" placeholder="Kattens färg...">
            </div>
            <div class="info">
                <label for="desc"> Beskrivning </label>
                <textarea name="desc" id="desc" rows="6" cols="50"></textarea>
            </div>

            <div class="info">
                <label for="home"> Placering </label>
                <select name="home">
                    <option value="1"> Katthemmet </option>
                    <option value="0"> Jourhem </option>
                </select>
            </div>

            <div class="info">
                <label for="contact"> Kontakt för adoption </label>
                <input type="text" name="contact" id="contact" placeholder="E-postadress till kontakt...">
            </div>

            <!-- Hide or show cat on first page -->
            <div class="show-slide">
                <input type="checkbox" id="show" name="show-slide" value="show">
                <label for="show"> Visa på första sida</label>
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