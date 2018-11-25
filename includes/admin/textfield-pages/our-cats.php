<section class="textfield page" id="our-cats">
    <div class="textfield-header">
        <h2> Ändra på sida: Våra Katter </h2>
        <button type="button" id="code-help-cats" onclick="commandoCats()"> Kodhjälp </button>
    </div>
    <div id="commando-cats">
        <h3> Kortkommandon </h3>
        <p> &lt;br/&gt; = Enter (2  på rad för nytt stycke) <br/>
            &lt;i&gt; Text &lt;/i&gt; = <i>Kursiv text</i> <br/>
            &lt;b&gt; Text &lt;/b&gt; = <b>Fetstilad text</b> </p>
    </div>
    <div class="forms">
        <form class="form">
            <div class="text-form">
                <label for="text"> Ändra Header </label>
                <textarea id="text" rows="10" cols="50"><?php echo($database->getContent('ourcats-header')); ?></textarea>

                <button type="submit" value="Ändra"> Ändra </button>
            </div>
        </form>
    </div>
</section>

<script>
    /* === SHOW AND HIDE CODE HELP === */
    function commandoCats() {
        let commando = document.getElementById('commando-cats');
        let button = document.getElementsByClassName('code-help-cats');

        if (commando.classList.contains('display-cats')) {
            commando.classList.remove('display-cats');
            button.classList.remove('active-button-cats');
        } else {
            commando.classList.add('display-cats');
            button.classList.add('active-button-cats');
        }
    }
</script>