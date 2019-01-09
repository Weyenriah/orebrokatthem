<div class="popup-container" id="popup-add-news">
    <article class="small-container">
        <div class="header">
            <h2> Lägg till Nyhet </h2>
            <button type="button" onclick="hidePopupNews()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="popup-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <div class="file-input">
                <label for="human-image"> Välj Bild </label>
                <input type="file" name="news-image">
            </div>

            <!-- Add news information -->
            <div class="info">
                <label for="add-desc-news"> Beskrivning </label>
                <textarea name="desc" id="add-desc-news" rows="6" cols="50"></textarea>
            </div>

            <button class="popup-button" type="submit" name="add-news"> Lägg till </button>
        </form>
    </article>
</div>

<script>
    /* === HIDE POPUP === */
    function hidePopupNews() {
        let popup = document.getElementById("popup-add-news");

        popup.style.display = "none";
    }
</script>