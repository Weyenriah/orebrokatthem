<div class="add-cat-container" id="popup-cat">
    <article class="add-cat">
        <div class="add-header">
            <h2> Lägg till ny Katt </h2>
            <button type="button" onclick="hidePopupCat()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="add-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <input type="file" name="cat-image" class="cat-image">

            <!-- Add cat information -->
            <div class="info">
                <label for="catname"> Namn </label>
                <input type="text" name="catname" id="catname" value="Kattens namn...">
            </div>
            <div class="info">
                <label for="age"> Ålder </label>
                <input type="text" name="age" id="age" value="Kattens ålder (yyyy)">
            </div>
            <div class="info">
                <label for="gender"> Kön </label>
                <input type="text" name="gender" id="gender" value="Kattens kön...">
            </div>
            <div class="info">
                <label for="color"> Färg </label>
                <input type="text" name="color" id="color" value="Kattens färg...">
            </div>
            <div class="info">
                <label for="desc"> Beskrivning </label>
                <textarea id="desc" rows="6" cols="50"></textarea>
            </div>

            <!-- Hide or show cat on first page -->
            <div class="show-in-slide">
                <div>
                    <input type="radio" id="show" name="show-in-slide" value="show">
                    <label for="show"> Visa på första sida</label>
                </div>
                <div>
                    <input type="radio" id="hide" name="show-in-slide" value="hide">
                    <label for="show"> Göm på första sidan </label>
                </div>
            </div>

            <button class="add-button" type="submit" name="add-cat"> Lägg till </button>
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