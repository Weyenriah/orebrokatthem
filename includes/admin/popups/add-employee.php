<div class="popup-container" id="popup-add-employee">
    <article class="small-container">
        <div class="header">
            <h2> Lägg till ny anställd </h2>
            <button type="button" onclick="hidePopupAddEmployee()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="popup-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <div class="file-input">
                <label for="human-image"> Välj Bild </label>
                <input type="file" name="human-image">
            </div>

            <div class="show-employee">
                <input type="checkbox" id="add-show-employee" name="add-show-employee" value="show" checked>
                <label for="add-show-employee"> Visa på hemsidan </label>
            </div>

            <!-- Add employee information -->
            <div class="info">
                <label for="add-human-name"> Namn </label>
                <input type="text" name="human-name" id="add-human-name" placeholder="Lägg till namn...">
            </div>

            <div class="info">
                <label for="add-title"> Yrkestitel </label>
                <input type="text" name="title" id="add-title" placeholder="Lägg till titel...">
            </div>

            <div class="info">
                <label for="add-tele"> Telefonnummer </label>
                <input type="text" name="tele" id="add-tele" placeholder="Lägg till telefonnummer...">
            </div>

            <div class="info">
                <label for="add-email"> E-post </label>
                <input type="text" name="email" id="add-email" placeholder="Lägg till epost...">
            </div>

            <div class="login-or-not">
                <input type="checkbox" id="add-login" name="login" value="login" onclick="showPassword()">
                <label for="add-login"> Inloggsbehörigheter </label>
            </div>

            <div class="info" id="can-login">
                <label for="add-password"> Lösenord </label>
                <input type="password" name="password" id="add-password" placeholder="Skriv in lösenord">
            </div>

            <button class="popup-button" type="submit" name="add-employee"> Lägg till </button>
        </form>
    </article>
</div>

<script>
    /* === HIDE POPUP === */
    function hidePopupAddEmployee() {
        let popup = document.getElementById("popup-add-employee");

        popup.style.display = "none";
    }

    /* === SHOW PASSWORD === */
    function showPassword() {
        let password = document.getElementById('can-login');
        let checkbox = document.getElementById('add-login');

        if(checkbox.checked) {
            password.style.display = "block";
        } else {
            password.style.display = "none";
        }
    }
</script>