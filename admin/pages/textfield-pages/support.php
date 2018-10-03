<section class="textfield page" id="support">
    <div class="textfield-header">
        <h2> Ändra på sida: Stöd Oss </h2>
        <button type="button" id="code-help-support" onclick="commandoSupport()"> Kodhjälp </button>
    </div>
    <div id="commando-support">
        <h3> Kortkommandon </h3>
        <p> &lt;br/&gt; = Enter (2  på rad för nytt stycke) <br/>
            &lt;i&gt; Text &lt;/i&gt; = <i>Kursiv text</i> <br/>
            &lt;b&gt; Text &lt;/b&gt; = <b>Fetstilad text</b> <br/>
            &lt;li&gt; Text &lt;/li&gt; = Ny punkt i lista <br/>
            &lt;small&gt; Text &lt;/small&gt; = <small> Mindre text </small> <br/> </p>
    </div>
    <div class="forms">
        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra Header </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('support-header')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>

        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra "Bli Medlem" </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('support-member')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
    </div>
    </form>
    </div>

    <div class="forms">
        <form class="form">
            <div class="text-form multiple">
                <h3> Ändra kontaktinformation för "Anmälning" </h3>
                <label for="name"> Namn </label>
                <input type="text" id="name" value="<?php echo($database->getContent('support-insurance-name')); ?>">

                <label for="email"> E-post </label>
                <input type="text" id="email" value="<?php echo($database->getContent('support-insurance-email')); ?>">

                <label for="tele"> Telefonnummer </label>
                <input type="text" id="tele" value="<?php echo($database->getContent('support-insurance-tele')); ?>">

                <label for="availab"> Tillgänglighet </label>
                <input type="text" id="availab" value="<?php echo($database->getContent('support-insurance-availab')); ?>">

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>
    </div>

    <div class="forms">
        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra önskelista för katter </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('support-catneed')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>

        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra önskelista för personalen </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('support-humanneed')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>
    </div>
</section>

<script>
    /* === SHOW AND HIDE CODE HELP === */
    function commandoSupport() {
        let commando = document.getElementById('commando-support');
        let button = document.getElementsByClassName('code-help-support');

        if (commando.classList.contains('display-support')) {
            commando.classList.remove('display-support');
            button.classList.remove('active-button-support');
        } else {
            commando.classList.add('display-support');
            button.classList.add('active-button-support');
        }
    }
</script>