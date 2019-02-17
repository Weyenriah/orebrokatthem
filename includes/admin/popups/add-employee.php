<div class="popup-container" id="popup-add-employee">
    <article class="small-container">
        <div class="header">
            <h2> Lägg till ny anställd </h2>
            <button type="button" onclick="hidePopupAddEmployee()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="popup-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <div class="file-input">
                <div class="divide-info">
                    <label for="human-image"> Välj Bild </label>
                    <small> Vid ingen bild blir det tomt. </small>
                </div>
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
                <label for="add-email"> E-post <span class="red-asterisk">*</span> </label>
                <input type="text" name="email" id="add-email" placeholder="Lägg till e-post...">
                <small> Det måste finnas en unik e-post. </small>
                <small> <span class="red-asterisk">*</span> Måste finnas. </small>
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