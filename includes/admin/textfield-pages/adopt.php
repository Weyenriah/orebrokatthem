<section class="textfield page" id="adopt">
    <div class="textfield-header">
        <h2> Ändra på sida: Adoptera </h2>
        <button type="button" id="code-help-adopt" onclick="commandoAdopt()"> Kodhjälp </button>
    </div>
    <div id="commando-adopt">
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
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('adopt-header')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>

        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra "Hur adopterar jag?" </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('adopt-how')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>
    </div>

    <div class="form">
        <div class="text-form">
            <label for="text"> Ändra listan i "Tips" </label>
            <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('adopt-tips')); ?></textarea>

            <button type="submit" value="Ändra"> Ändra </button>
        </div>
    </div>

    <div class="forms">
        <form class="form">
            <div class="text-form multiple">
                <h3> Ändra priser </h3>

                <label for="text"> Ändra "Katter upp till 12 år" </label>
                <textarea id="text" rows="1" cols="15"><?php echo($database->getContent('adopt-up-to')); ?></textarea>

                <label for="text"> Ändra "Två katter vid samtidig adoption" </label>
                <textarea id="text" rows="1" cols="15"><?php echo($database->getContent('adopt-two-cats')); ?></textarea>

                <label for="text"> Ändra "Katter 12 år eller äldre" </label>
                <textarea id="text" rows="1" cols="15"><?php echo($database->getContent('adopt-older')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>

        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra text i "Vad som ingår" </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('adopt-includes')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>
    </div>
</section>

<script>
    /* === SHOW AND HIDE CODE HELP === */
    function commandoAdopt() {
        let commando = document.getElementById('commando-adopt');
        let button = document.getElementsByClassName('code-help-adopt');

        if (commando.classList.contains('display-adopt')) {
            commando.classList.remove('display-adopt');
            button.classList.remove('active-button-adopt');
        } else {
            commando.classList.add('display-adopt');
            button.classList.add('active-button-adopt');
        }
    }
</script>