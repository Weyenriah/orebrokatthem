<section class="textfield page" id="footer">
    <div class="textfield-header">
        <h2> Ändra på sida: Footer </h2>
        <button type="button" id="code-help-footer" onclick="commandoFooter()"> Kodhjälp </button>
    </div>
    <div id="commando-footer">
        <h3> Kortkommandon </h3>
        <p> &lt;br/&gt; = Enter (2  på rad för nytt stycke) <br/>
            &lt;i&gt; Text &lt;/i&gt; = <i>Kursiv text</i> <br/>
            &lt;b&gt; Text &lt;/b&gt; = <b>Fetstilad text</b> </p>
    </div>
    <div class="forms">
        <form class="form">
            <div class="text-form multiple">
                <h3> Ändra "Kontakt" </h3>
                <label for="text"> Adress </label>
                <textarea id="text" rows="4" cols="50"><?php echo($database->getContent('footer-visit')); ?></textarea>

                <label for="email"> E-post </label>
                <input type="text" id="email" value="<?php echo($database->getContent('footer-visit-email')); ?>">

                <label for="tele"> Telefonnummer </label>
                <input type="text" id="tele" value="<?php echo($database->getContent('footer-visit-tele')); ?>">

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>

        <form class="form">
            <div class="text-form multiple">
                <h3> Ändra sociala medier-länkar </h3>
                <label for="fb"> Facebook </label>
                <input type="text" id="fb" value="<?php echo($database->getContent('footer-fb-link')); ?>">

                <label for="ig"> Instagram </label>
                <input type="text" id="ig" value="<?php echo($database->getContent('footer-ig-link')); ?>">

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>
    </div>
</section>

<script>
    /* === SHOW AND HIDE CODE HELP === */
    function commandoFooter() {
        let commando = document.getElementById('commando-footer');
        let button = document.getElementsByClassName('code-help-footer');

        if (commando.classList.contains('display-footer')) {
            commando.classList.remove('display-footer');
            button.classList.remove('active-button-footer');
        } else {
            commando.classList.add('display-footer');
            button.classList.add('active-button-footer');
        }
    }
</script>