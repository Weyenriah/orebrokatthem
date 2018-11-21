<div class="add-news-container" id="popup-add-news">
    <article class="add-news">
        <div class="add-header">
            <h2> Lägg till Nyhet </h2>
            <button type="button" onclick="hidePopupNews()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="add-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <input type="file" name="news-image" class="news-image">

            <!-- Add cat information -->
            <div class="info">
                <label for="desc"> Beskrivning </label>
                <textarea name="desc" id="desc" rows="6" cols="50"></textarea>
            </div>

            <button class="add-button" type="submit" name="add-news"> Lägg till </button>
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