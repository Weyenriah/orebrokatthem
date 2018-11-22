<div class="add-employee-container" id="popup-add-employee">
    <article class="add-employee">
        <div class="add-header">
            <h2> Lägg till ny anställd </h2>
            <button type="button" onclick="hidePopupAddEmployee()"> <i class="fas fa-times"></i> </button>
        </div>

        <form class="add-form" method="POST" enctype="multipart/form-data">
            <!-- Add picture -->
            <input type="file" name="human-image" class="human-image">

            <div class="show-employee">
                <input type="checkbox" id="show" name="show" value="show" checked>
                <label for="show"> Visa på hemsidan </label>
            </div>

            <!-- Add cat information -->
            <div class="info">
                <label for="human-name"> Namn </label>
                <input type="text" name="human-name" id="human-name" placeholder="Lägg till namn...">
            </div>

            <div class="info">
                <label for="title"> Yrkestitel </label>
                <input type="text" name="title" id="title" placeholder="Lägg till titel...">
            </div>

            <div class="info">
                <label for="tele"> Telefonnummer </label>
                <input type="text" name="tele" id="tele" placeholder="Lägg till telefonnummer...">
            </div>

            <div class="info">
                <label for="email"> E-post </label>
                <input type="text" name="email" id="email" placeholder="Lägg till epost...">
            </div>

            <div class="login-or-not">
                <input type="checkbox" id="login" name="login" value="login" onclick="showPassword()">
                <label for="login"> Inloggsbehörigheter </label>
            </div>

            <div class="info" id="can-login">
                <label for="password"> Lösenord </label>
                <input type="password" name="password" id="password" placeholder="Skriv in lösenord">
            </div>

            <button class="add-button" type="submit" name="add-employee"> Lägg till </button>
        </form>
    </article>
</div>

<script>
    /* === HIDE POPUP === */
    function hidePopupAddEmployee() {
        let popup = document.getElementById("popup-add-employee");

        popup.style.display = "none";
    }

    function showPassword() {
        let password = document.getElementById('can-login');
        let checkbox = document.getElementById('login');

        if(checkbox.checked) {
            password.style.display = "block";
        } else {
            password.style.display = "none";
        }
    }
</script>