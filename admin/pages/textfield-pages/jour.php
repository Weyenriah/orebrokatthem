<section class="textfield page" id="jour">
    <div class="textfield-header">
        <h2> Ändra på sida: Bli Jourhem </h2>
        <button type="button" id="code-help-jour" onclick="commandoCats()"> Kodhjälp </button>
    </div>
    <div id="commando-jour">
        <h3> Kortkommandon </h3>
        <p> &lt;br/&gt; = Enter (2  på rad för nytt stycke) <br/>
            &lt;i&gt; Text &lt;/i&gt; = <i>Kursiv text</i> <br/>
            &lt;b&gt; Text &lt;/b&gt; = <b>Fetstilad text</b> </p>
    </div>
    <div class="forms">
        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra Header </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('jour-header')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>
    </div>
</section>

<script>
    /* === SHOW AND HIDE CODE HELP === */
    function commandoCats() {
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