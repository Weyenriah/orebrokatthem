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
            &lt;li&gt; Text &lt;/li&gt; = Ny punkt i lista <br/>
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

    <div class="form">
        <div class="text-form">
            <label for="text"> Ändra "Tips för dig med skygg jourhemskatt" </label>
            <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('jour-tips')); ?></textarea>

            <button type="submit" value="Ändra"> Ändra </button>
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
</script>