<?php
    $jourListitems = $database->getJourList();
?>
<section class="textfield page" id="jour">
    <div class="textfield-header">
        <h2> Ändra på sida: Bli Jourhem </h2>
        <button type="button" id="code-help-jour" onclick="commandoJour()"> Kodhjälp </button>
    </div>
    <div id="commando-jour">
        <h3> Kortkommandon </h3>
        <p> &lt;br/&gt; = Enter (2  på rad för nytt stycke) <br/>
            &lt;i&gt; Text &lt;/i&gt; = <i>Kursiv text</i> <br/>
            &lt;b&gt; Text &lt;/b&gt; = <b>Fetstilad text</b> <br/>
            &lt;h5&gt; Text &lt;/h5&gt; = Rubrik <br/>
            &lt;p&gt; Text &lt;/p&gt; = Text efter rubrik </p>
    </div>
    <div class="forms">
        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra Header </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('jour-header')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>

        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra "Hur är det att vara jourhem?" </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('jour-how')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>
    </div>

    <div class="not-forms">
        <div class="list-handler">
            <h3> Ändra listan i "Tips för dig med skygg jourhemskatt" </h3>
            <ol>
                <?php foreach($jourListitems as $jourListitem) { ?>
                    <li>
                        <div class="change-list">
                            <a href="#"> <i class="fas fa-pencil-alt"></i> </a>
                            <a href="#"> <i class="fas fa-times"></i> </a>
                        </div>
                        <h5 class="adjust-main-left"> <?php echo($jourListitem['title']) ?> </h5>
                        <p class="adjust-main-left"> <?php echo($jourListitem['content']) ?> </p>
                    </li>
                <?php } ?>
            </ol>
            <button type="button" class="add-to-list" onclick="showPopupAddListJour(); topFunction();"> Lägg till i listan </button>
        </div>
    </div>

    <div class="forms">
        <form class="form">
            <div class="text-form multiple">
                <h3> Ändra kontaktinformation för "Anmälning" </h3>
                <label for="name"> Namn </label>
                <input type="text" id="name" value="<?php echo($database->getContent('jour-contact-name')); ?>">

                <label for="tele"> Telefonnummer </label>
                <input type="text" id="tele" value="<?php echo($database->getContent('jour-contact-tele')); ?>">

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>
    </div>
</section>

<script>
    /* === SHOW AND HIDE CODE HELP === */
    function commandoJour() {
        let commando = document.getElementById('commando-jour');
        let button = document.getElementsByClassName('code-help-jour');

        if (commando.classList.contains('display-jour')) {
            commando.classList.remove('display-jour');
            button.classList.remove('active-button-jour');
        } else {
            commando.classList.add('display-jour');
            button.classList.add('active-button-jour');
        }
    }

    /* === SHOW CAT-POPUP === */
    function showPopupAddListJour() {
        let popup = document.getElementById('add-list-jour');

        popup.style.display = 'block';
    }

    /* === SCROLL TO TOP === */
    function topFunction() {
        document.body.scrollTop = 0; // For Safari
        document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
    }
</script>