<div class="add-list-container" id="add-list-adopt">
    <article class="add-list">
        <div class="add-header">
            <h2> Lägg till Nytt Listobjekt </h2>
            <button type="button" onclick="hidePopupAddListAdopt()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="add-form" method="POST">
            <!-- Add cat information -->
            <div class="info">
                <label for="title"> Titel </label>
                <input type="text" name="title" id="title" value="En titel här...">
            </div>
            <div class="info">
                <label for="text"> Text </label>
                <textarea id="text" rows="6" cols="50"></textarea>
            </div>

            <button class="add-button" type="submit" name="add-list"> Lägg till </button>
        </form>
    </article>
</div>

<script>
    /* === HIDE POPUP === */
    function hidePopupAddListAdopt() {
        let popup = document.getElementById("add-list-adopt");

        popup.style.display = "none";
    }
</script>