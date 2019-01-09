<div class="popup-container" id="popup-change-news">
    <article class="small-container">
        <div class="header">
            <h2> Ändra Nyhet </h2>
            <button type="button" onclick="hidePopupChangeNews()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="popup-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <div class="file-input">
                <label for="human-image"> Ändra Bild </label>
                <input type="file" name="news-image">
            </div>

            <!-- Add news information -->
            <div class="info">
                <label for="change-desc-news"> Beskrivning </label>
                <textarea name="desc" id="change-desc-news" rows="6" cols="50"></textarea>
            </div>

            <input class="id-field" type="text" name="id" hidden>

            <button class="popup-button" type="submit" name="change-news"> Ändra </button>
        </form>
    </article>
</div>

<script>
    /* === HIDE POPUP === */
    function hidePopupChangeNews() {
        let popup = document.getElementById("popup-change-news");

        popup.style.display = "none";
    }
</script>