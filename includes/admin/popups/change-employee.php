<div class="popup-container" id="popup-change-employee">
    <article class="small-container">
        <div class="header">
            <h2> Ändra anställd </h2>
            <button type="button" onclick="hidePopupChangeEmployee()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="popup-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <div class="file-input">
                <label for="human-image"> Ändra Bild </label>
                <input type="file" name="human-image">
            </div>

            <div class="show-employee">
                <input type="checkbox" class="show-employ" id="change-show-employee" name="show" value="show">
                <label for="change-show-employee"> Visa på hemsidan </label>
            </div>

            <!-- Change employee information -->
            <div class="info">
                <label for="change-human-name"> Namn </label>
                <input type="text" name="human-name" id="change-human-name" class="human-name" value="Lägg till namn...">
            </div>

            <div class="info">
                <label for="change-human-title"> Yrkestitel </label>
                <input type="text" name="human-title" class="human-title" id="change-human-title" value="Lägg till titel...">
            </div>

            <div class="info">
                <label for="change-tele"> Telefonnummer </label>
                <input type="text" name="tele" class="tele" id="change-tele" value="Lägg till telefonnummer...">
            </div>

            <div class="info">
                <label for="change-email"> E-post </label>
                <input type="text" name="email" class="email" id="change-email" value="Lägg till epost...">
            </div>


            <div class="login-or-not">
                <input type="checkbox" class="log-in" id="change-log-in" name="log-in" value="log-in" onclick="showChangePassword(true)">
                <label for="change-log-in"> Inloggsbehörigheter </label>
            </div>

            <div class="info" id="logged-in">
                <label for="change-password">Byt lösenord </label>
                <input type="password" class="password" id="change-password" name="password" placeholder="Skriv in nytt lösenord">
            </div>

            <input class="id-field" type="text" name="id" hidden>

            <button class="popup-button" type="submit" name="change-employee"> Ändra </button>
        </form>
    </article>
</div>

<script>
    /* === HIDE POPUP === */
    function hidePopupChangeEmployee() {
        let popup = document.getElementById("popup-change-employee");

        popup.style.display = "none";
    }
    /* === SHOW PASSWORD === */
    function showChangePassword(userAction) {
        let password = document.getElementById('logged-in');
        let checkbox = document.getElementById('change-log-in');

        if (userAction) {
            password.getElementsByTagName("label")[0].textContent = "Välj lösenord";
            password.getElementsByTagName("input")[0].placeholder = "Skriv in lösenord";
        } else {
            password.getElementsByTagName("label")[0].textContent = "Byt lösenord";
            password.getElementsByTagName("input")[0].placeholder = "Skriv in nytt lösenord";
        }

        if(checkbox.checked) {
            password.style.display = "block";
        } else {
            password.style.display = "none";
        }
    }
</script>