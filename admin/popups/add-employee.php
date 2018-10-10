<div class="add-employee-container" id="popup-employee">
    <article class="add-employee">
        <div class="add-header">
            <h2> Lägg till ny anställd </h2>
            <button type="button" onclick="hidePopupEmployee()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="add-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <input type="file" name="human-image" class="human-image">

            <!-- Add cat information -->
            <div class="info">
                <label for="humanname"> Namn </label>
                <input type="text" name="humanname" id="humanname" value="Lägg till namn...">
            </div>

            <div class="info">
                <label for="title"> Yrkestitel </label>
                <input type="text" name="title" id="title" value="Lägg till titel...">
            </div>

            <div class="info">
                <label for="tele"> Telefonnummer </label>
                <input type="text" name="tele" id="tele" value="Lägg till telefonnummer...">
            </div>

            <div class="info">
                <label for="email"> E-post </label>
                <input type="text" name="email" id="email" value="Lägg till epost...">
            </div>

            <button class="add-button" type="submit" name="add-cat"> Lägg till </button>
        </form>
    </article>
</div>

<script>
    /* === HIDE POPUP === */
    function hidePopupEmployee() {
        let popup = document.getElementById("popup-employee");

        popup.style.display = "none";
    }
</script>