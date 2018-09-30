<div class="add-news-container" id="popup-news">
    <article class="add-news">
        <div class="add-header">
            <h2> Lägg till Nyhet </h2>
            <button type="button" onclick="hidePopupNews()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="add-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <input type="file" name="cat-image" class="cat-image">

            <!-- Add cat information -->
            <div class="info">
                <label for="catname"> Datum </label>
                <input type="text" name="catname" id="catname" value="Skriv ett datum (yyyy-mm-dd)">
            </div>
            <div class="info">
                <label for="desc"> Beskrivning </label>
                <textarea id="desc" rows="6" cols="50"></textarea>
            </div>

            <button class="add-button" type="submit" name="add-cat"> Lägg till </button>
        </form>
    </article>
</div>

<script>
    /* === HIDE POPUP === */
    function hidePopupNews() {
        let popup = document.getElementById("popup-news");

        popup.style.display = "none";
    }
</script>