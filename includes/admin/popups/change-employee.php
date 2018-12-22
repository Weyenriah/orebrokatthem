<div class="change-employee-container" id="popup-change-employee">
    <article class="change-employee">
        <div class="change-header">
            <h2> Ändra anställd </h2>
            <button type="button" onclick="hidePopupChangeEmployee()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="change-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <input type="file" name="human-image" class="human-image">

            <div class="show-employee">
                <input type="checkbox" class="show-employ" id="show" name="show" value="show">
                <label for="show"> Visa på hemsidan </label>
            </div>

            <!-- Add cat information -->
            <div class="info">
                <label for="human-name"> Namn </label>
                <input type="text" name="human-name" class="human-name" id="human-name" value="Lägg till namn...">
            </div>

            <div class="info">
                <label for="human-title"> Yrkestitel </label>
                <input type="text" name="human-title" class="human-title" id="human-title" value="Lägg till titel...">
            </div>

            <div class="info">
                <label for="tele"> Telefonnummer </label>
                <input type="text" name="tele" class="tele" id="tele" value="Lägg till telefonnummer...">
            </div>

            <div class="info">
                <label for="email"> E-post </label>
                <input type="text" name="email" class="email" id="email" value="Lägg till epost...">
            </div>


            <div class="login-or-not">
                <input type="checkbox" class="log-in" id="log-in" name="log-in" value="log-in" onclick="showChangePassword(true)">
                <label for="log-in"> Inloggsbehörigheter </label>
            </div>

            <div class="info" id="logged-in">
                <label for="password">Byt lösenord </label>
                <input type="text" class="password" name="password" id="password" placeholder="Skriv in nytt lösenord">
            </div>

            <input class="id-field" type="text" name="id" hidden>

            <button class="change-button" type="submit" name="change-employee"> Lägg till </button>
        </form>
    </article>
</div>

<script>
    /* === HIDE POPUP === */
    function hidePopupChangeEmployee() {
        let popup = document.getElementById("popup-change-employee");

        popup.style.display = "none";
    }

    function showChangePassword(userAction) {
        let password = document.getElementById('logged-in');
        let checkbox = document.getElementById('log-in');

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