<section class="textfield page" id="adopt">
    <div class="textfield-header">
        <h2> Ändra på sida: Adoptera </h2>
        <button type="button" id="code-help-adopt" onclick="commandoAdopt()"> Kodhjälp </button>
    </div>
    <div id="commando-adopt">
        <h3> Kortkommandon </h3>
        <p> &lt;br/&gt; = Enter (2  på rad för nytt stycke) <br/>
            &lt;i&gt; Text &lt;/i&gt; = <i>Kursiv text</i> <br/>
            &lt;b&gt; Text &lt;/b&gt; = <b>Fetstilad text</b> </p>
    </div>
    <div class="forms">
        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra Header </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('adopt-header')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>

            <div class="text-form">
                <label for="text"> Ändra text i "Hur adopterar jag?" </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('adopt-how')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>
    </div>

    <div class="not-form">
        <h3> Ändra listan i "Tips" </h3>
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