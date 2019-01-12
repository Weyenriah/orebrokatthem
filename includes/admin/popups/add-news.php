<div class="popup-container" id="popup-add-news">
    <article class="small-container">
        <div class="header">
            <h2> Lägg till Nyhet </h2>
            <button type="button" onclick="hidePopupNews()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="popup-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <div class="file-input">
                <div class="divide-info">
                    <label for="human-image"> Välj Bild </label>
                    <small> Vid ingen bild blir det tomt. </small>
                </div>
                <input type="file" name="news-image">
            </div>

            <!-- Add news information -->
            <div class="info">
                <div class="divide-info">
                    <label for="add-desc-news"> Beskrivning </label>
                    <small> <span id="add-desc-news-counter" >0</span>/255 </small>
                </div>
                <textarea name="desc" id="add-desc-news" rows="6" cols="50"  oninput="updateTextCounter('add-desc-news-counter', this.value)"></textarea>
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