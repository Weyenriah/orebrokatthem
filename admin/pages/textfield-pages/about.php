<section class="textfield page" id="about">
    <div class="textfield-header">
        <h2> Ändra på sida: Om Oss </h2>
        <button type="button" id="code-help-about" onclick="commandoAbout()"> Kodhjälp </button>
    </div>
    <div id="commando-about">
        <h3> Kortkommandon </h3>
        <p> &lt;br/&gt; = Enter (2  på rad för nytt stycke) <br/>
            &lt;i&gt; Text &lt;/i&gt; = <i>Kursiv text</i> <br/>
            &lt;b&gt; Text &lt;/b&gt; = <b>Fetstilad text</b> <br/>
            &lt;li&gt; Text &lt;/li&gt; = Ny punkt i lista </p>
    </div>
    <div class="forms">
        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra Header </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('about-header')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>

        <form class="form">
            <div class="text-form multiple">
                <h3> Ändra besöksinfo för "Kontakta oss" </h3>
                <label for="text"> Adress </label>
                <textarea id="text" rows="4" cols="50"><?php echo($database->getContent('about-visit')); ?></textarea>

                <label for="tele"> Telefonnummer </label>
                <input type="text" id="tele" value="<?php echo($database->getContent('about-visit-tele')); ?>">

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>

        <form class="form">
            <div class="text-form multiple">
                <h3> Ändra kontaktinformation för "Anmälning av hemlös katt" under "Kontakta oss" </h3>
                <label for="name"> Namn </label>
                <input type="text" id="name" value="<?php echo($database->getContent('about-tell-name')); ?>">

                <label for="tele"> Telefonnummer </label>
                <input type="text" id="tele" value="<?php echo($database->getContent('about-tell-tele')); ?>">

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>

        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra text för "Adoptera katt" under "Kontakta oss" </label>
                <textarea id="text" rows="4" cols="50"><?php echo($database->getContent('about-adopt-info')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>

        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra kraven i "Bli volontär" </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('about-vol-demands')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>

            <div class="text-form multiple">
                <h3> Ändra kontaktinformation för "Bli Volontär" </h3>
                <label for="tele"> Telefonnummer </label>
                <input type="text" id="tele" value="<?php echo($database->getContent('about-vol-tele')); ?>">

                <label for="email"> E-post </label>
                <input type="text" id="email" value="<?php echo($database->getContent('about-vol-email')); ?>">

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>
    </div>
</section>

<script>
    /* === SHOW AND HIDE CODE HELP === */
    function commandoAbout() {
        let commando = document.getElementById('commando-about');
        let button = document.getElementsByClassName('code-help-about');

        if (commando.classList.contains('display-about')) {
            commando.classList.remove('display-about');
            button.classList.remove('active-button-about');
        } else {
            commando.classList.add('display-about');
            button.classList.add('active-button-about');
        }
    }
</script>